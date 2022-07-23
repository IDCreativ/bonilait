<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bc_bonilaitfood
 */
get_header();
// while( have_posts() ) : the_post();
wp_reset_query();
the_post();
$fields = get_fields('page_header');
var_dump($fields);
var_dump($post->ID);
if (has_post_thumbnail($post->ID)) {
	$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[0];
} else {
	$featured_image = get_template_directory_uri() . '/assets/img/default/default-thumb.jpg';
}
$page_title = isset($fields['page_header']['page_title']) && $fields['page_header']['page_title'] != "" ? $fields['page_header']['page_title'] : "<p>" . get_the_title() . "</p>";
$page_description = isset($fields['page_header']['page_description']) && $fields['page_header']['page_description'] != "" ? $fields['page_header']['page_description'] : "";
// endwhile;
?>
<section id="post-<?php the_ID(); ?>-header" class="page-header">
	<div class="container">
		<div class="row">
			<div class="col heading-container">
				<h1>
					<?php echo $page_title; ?>
					<small><?php _e('Actualités', 'text-domain'); ?></small>
				</h1>
				<div class="picto-header">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/h1-wave.svg'); ?>" alt="">
				</div>
				<div class="description-header">
					<?php echo $page_description; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="header-overlay">
		<svg class="wave-bottom" data-name="wave-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1600 200">
			<path class="cls-1" d="M1600,8.8c-224.5,27.5-449.4,62.4-676.1,91.1C849.8,109,775.5,118.1,701,126.1,626.5,133.5,551.8,141,476.8,146s-150.1,9.2-225.5,10.4q-20.4.45-40.8.6H155.8q-65.4-.6-131.1-3.9c-8.2-.4-16.5-.9-24.7-1.4V210H1600Z" />
		</svg>
	</div>
	<div class="thumb-bground">
		<img src="<?php echo $featured_image; ?>" class="post-thumbnail">
	</div>
</section><!-- .page-header -->
<main id="archive" class="site-main">
	<?php
	get_template_part('template-parts/content', 'newspage');
	?>
</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
