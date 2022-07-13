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
$page_title = isset($fields['page_title']) && $fields['page_title'] != "" ? $fields['page_title'] : "<p>" . get_the_title() . "</p>";
$page_description = isset($fields['page_description']) && $fields['page_description'] != "" ? $fields['page_description'] : "";
?>
<section id="post-<?php the_ID(); ?>-header" class="page-header">
	<div class="container">
		<div class="row">
			<div class="col heading-container">
				<h1><?php echo $page_title; ?></h1>
				<div class="description-header">
					<?php echo $page_description; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="header-overlay">
		<img src="<?php echo get_template_directory_uri() . '/assets/img/backgrounds/wave-bottom-white.svg'; ?>" alt="">
	</div>
	<div class="thumb-bground">
		<img src="<?php echo $featured_image; ?>" class="post-thumbnail">
	</div>
</section><!-- .page-header -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<?php the_content(); ?>
	</div>
</article>
