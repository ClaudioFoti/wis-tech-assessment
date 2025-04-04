/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import {__} from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import {InspectorControls, useBlockProps} from '@wordpress/block-editor';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

import apiFetch from '@wordpress/api-fetch';
import {useEffect, useState} from '@wordpress/element';

import {__experimentalNumberControl, PanelBody} from '@wordpress/components';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({attributes, setAttributes}) {
    const {numberOfBooks} = attributes;

    const [books, setBooks] = useState([]);

    useEffect(() => {
        apiFetch({path: '/wp/v2/books'}).then((response) => {
            setBooks(response);
        });
    }, []);

    if (!books) {
        return (
            <p {...useBlockProps()}>
                {__('Loading books...')}
            </p>
        );
    }

    let booksList = books.map((book) => {
        return <li key={book.id}>{book.title.rendered}</li>;
    });

    if (typeof numberOfBooks !== "undefined" && numberOfBooks > 0) {
        booksList = booksList.slice(0, numberOfBooks);
    }

    return (
        <>
            <InspectorControls>
                <PanelBody title={__('Settings', 'books-block')}>
                    <__experimentalNumberControl
                        label={__(
                            'Number of books to display',
                            'books-block'
                        )}
                        value={numberOfBooks || ''}
                        min={0}
                        max={books.length}
                        onChange={(value) => {
                            if (value >= 0) {
                                setAttributes({numberOfBooks: parseInt(value)});
                            }
                        }}
                    />
                </PanelBody>
            </InspectorControls>
            <p {...useBlockProps()}>
                <h2>{__('Books',)}</h2>
                <ul>
                    {booksList}
                </ul>
            </p>
        </>
    );

}
