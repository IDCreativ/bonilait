<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bc_bonilaitfood
 */
$title = get_the_title();
$display_title = strlen($title) < 40 ? $title : substr($title, 0, 40) . ' ...';
$featured_image = has_post_thumbnail() ? wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' )[0] : get_template_directory_uri() . "/assets/img/default/default-thumb.jpg";
?>
<div class="col-md-6 search-cards">
	<div class="card border-0 mb-4 rounded-0">
		<a href="<?php echo get_post_permalink(); ?>">
			<img src="<?php echo $featured_image; ?>" class="card-img-top" alt="<?php echo $display_title; ?>">
		</a>
		<div class="card-body">
			<div class="date"><?php echo get_the_date( 'd/m/Y' ); ?></div>
			<h5 class="card-title"><a href="<?php echo get_post_permalink(); ?>"><?php echo $display_title; ?></a></h5>
		</div>
	</div>
</div>
