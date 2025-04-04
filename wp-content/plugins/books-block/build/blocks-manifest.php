<?php
// This file is generated. Do not modify it manually.
return array(
	'books-block' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'wis/books-block',
		'version' => '1.0.0',
		'title' => 'Books Block',
		'category' => 'widgets',
		'icon' => 'book',
		'description' => 'Block that displays a list of books from the books post type.',
		'example' => array(
			
		),
		'attributes' => array(
			'numberOfBooks' => array(
				'type' => 'number'
			)
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'books-block',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	)
);
