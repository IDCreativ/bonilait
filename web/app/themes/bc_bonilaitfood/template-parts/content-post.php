<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bc_bonilaitfood
 */
$fields = get_fields();
if (has_post_thumbnail()) {
	$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[0];
} else {
	$featured_image = get_template_directory_uri() . '/assets/img/default/default-thumb.jpg';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<?php the_content(); ?>
	</div>
</article>