<?php
/**
 * BooksPlugin
 *
 * @author            Claudio Foti
 *
 * @wordpress-plugin
 * Plugin Name:       BooksPlugin
 * Description:       Plugin that registers a custom post type called Books.
 * Version:           1.0.0
 * Author:            Claudio Foti
 */

function register_book_type(): void {
	$labels = array(
		'name'          => 'Books',
		'singular_name' => 'Book',
		'menu_name'     => 'Books',
		'add_new'       => 'Add New Book',
		'add_new_item'  => 'Add New Book',
		'new_item'      => 'New Book',
		'edit_item'     => 'Edit Book',
		'view_item'     => 'View Book',
		'all_items'     => 'All Books',
	);

	register_post_type( 'wis_book',
		array(
			'labels'            => $labels,
			'public'            => true,
			'has_archive'       => true,
			'show_in_rest'      => true,
			'rest_base'         => 'books',
			'supports'          => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
			'rewrite'           => array( 'slug' => 'books' )
		)
	);

	$labels = array(
		'name'              => _x( 'Genres', 'genre taxonomy general name' ),
		'singular_name'     => _x( 'Genre', 'genre taxonomy singular name' ),
		'search_items'      => __( 'Search Genres' ),
		'all_items'         => __( 'All Genres' ),
		'parent_item'       => __( 'Parent Genre' ),
		'parent_item_colon' => __( 'Parent Genre:' ),
		'edit_item'         => __( 'Edit Genre' ),
		'update_item'       => __( 'Update Genre' ),
		'add_new_item'      => __( 'Add New Genre' ),
		'new_item_name'     => __( 'New Genre Name' ),
		'menu_name'         => __( 'Genre' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
		'rest_base'         => 'genres',
		'rewrite'           => [ 'slug' => 'genres' ],
	);
	register_taxonomy( 'wis_genre', 'wis_book', $args );
}

add_action( 'init', 'register_book_type' );