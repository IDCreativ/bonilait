<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bc_bonilaitfood
 */

if (!is_sticky()) {
?>
<div class="actu-card">
	<a href="<?php echo the_permalink(); ?>">
		<div class="actu-card-archive">
			<div class="thumb-wrapper">
				<img src="<?php echo has_post_thumbnail() ? wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[0] : get_template_directory_uri() . "/assets/img/default/default-thumb.jpg"; ?>" class="" alt="<?php echo get_the_title(); ?>">
			</div>
			<div class="infos-wrapper">
				<div>
					<span class="the-date"><?php echo get_the_date('F Y'); ?></span>
					<h5 class="actu-card-title"><?php echo get_the_title(); ?></h5>
					<p>
						<?php echo mb_substr(get_the_excerpt(), 0, 100) . ' ...'; ?>
					</p>
				</div>
			</div>
		</div>
	</a>
</div>
<?php
}