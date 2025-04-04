<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>

<?php
$books = get_posts( [ 'post_type' => 'wis_book' ] );

if ( ! empty( $attributes['numberOfBooks'] ) && $attributes['numberOfBooks'] > 0 ) {
	$books = array_slice( $books, 0, $attributes['numberOfBooks'] );
}
?>

<h2>Books</h2>
<ul <?php echo get_block_wrapper_attributes(); ?>>
	<?php foreach ( $books as $book ) { ?>
		<li><?php esc_html_e( $book->post_title ); ?></li>
	<?php } ?>
</ul>
