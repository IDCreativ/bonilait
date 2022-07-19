<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bc_bonilaitfood
 */
$general_fields = get_fields('options');
$fields = get_fields();
if (has_post_thumbnail()) {
	$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[0];
} else {
	$featured_image = get_template_directory_uri() . '/assets/img/default/default-thumb.jpg';
}
$page_title = isset($fields['page_title']) && $fields['page_title'] != "" ? $fields['page_title'] : "<p>" . get_the_title() . "</p>";
$page_description = isset($fields['page_description']) && $fields['page_description'] != "" ? $fields['page_description'] : "";
?>
<section id="post-<?php the_ID(); ?>-header" class="home-header">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-5 heading-container">
				<h1><?php echo $page_title; ?></h1>
				<div class="description-header">
					<?php echo $page_description; ?>
				</div>
				<?php
				if (isset($fields['page_cta_link']) && $fields['page_cta_link']['url'] != "") {
				?>
					<div class="cta-header">
						<a href="<?php echo $fields['page_cta_link']['url']; ?>" target="<?php echo $fields['page_cta_link']['target']; ?>" class="btn btn-secondary text-light text-uppercase"><?php echo $fields['page_cta_link']['title']; ?></a>
					</div>
				<?php
				}
				?>
			</div>
			<div class="col col-lg-7 cards-container">
				<?php
				if (isset($fields['home_cards']['card'])) {
					foreach ($fields['home_cards']['card'] as $card) {
				?>
					<div class="card card-header-home <?php echo $card['card_background_color'] ? "card-bg-" . $card['card_background_color'] : ""; ?>">
						<img src="<?php echo $card['card_picto']['url']; ?>" class="card-img-home" alt="<?php echo $card['card_picto']['title']; ?>">
						<div class="card-body">
							<h3 class="card-title"><?php echo $card['card_title']; ?></h3>
							<div class="card-text"><?php echo $card['card_description']; ?></div>
						</div>
					</div>
				<?php
					}
				}
				?>
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