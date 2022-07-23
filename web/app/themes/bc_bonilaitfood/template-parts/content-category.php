<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bc_bonilaitfood
 */
$title = get_the_title();
$excerpt = get_the_excerpt();
$excerpt = mb_substr($excerpt, 0, 100) . ' ...';
$featured_image = has_post_thumbnail() ? wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[0] : get_template_directory_uri() . "/assets/img/default/default-thumb.jpg";

if (!is_sticky()) {
?>
<div class="actu-card">
	<a href="<?php echo the_permalink(); ?>">
		<div class="actu-card-archive">
			<div class="thumb-wrapper">
				<img src="<?php echo $featured_image; ?>" class="" alt="<?php echo $title; ?>">
			</div>
			<div class="infos-wrapper">
				<div>
					<span class="the-date"><?php echo get_the_date('F Y'); ?></span>
					<h5 class="actu-card-title"><?php echo $title; ?></h5>
					<p>
						<?php echo $excerpt; ?>
					</p>
				</div>
			</div>
		</div>
	</a>
</div>
<?php
}