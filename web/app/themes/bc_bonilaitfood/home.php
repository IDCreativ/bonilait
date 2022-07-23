<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bc_bonilaitfood
 */
get_header();
$fields = get_fields();
if (has_post_thumbnail()) {
	$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[0];
} else {
	$featured_image = get_template_directory_uri() . '/assets/img/default/default-thumb.jpg';
}
$page_title = isset($fields['page_header']['page_title']) && $fields['page_header']['page_title'] != "" ? $fields['page_header']['page_title'] : "<p>" . get_the_title() . "</p>";
$page_description = isset($fields['page_header']['page_description']) && $fields['page_header']['page_description'] != "" ? $fields['page_header']['page_description'] : "";

$sticky = get_option('sticky_posts');
$actu_featured = new WP_Query(array(
	'post_type'         => 'post',
	'posts_per_page'    => 1,
));
$actus_not_featured = new WP_Query(array(
	'post_type'         => 'post',
	'posts_per_page'    => -1,
));
?>
<section id="post-<?php the_ID(); ?>-header" class="page-header">
	<div class="container">
		<div class="row">
			<div class="col heading-container">
				<h1>
					<?php _e('Actualités', 'text-domain'); ?>
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
	<?php if (have_posts()) : ?>
		<section id="actus-grid">
			<div class="container">
				<div class="row row-sticky">
					<?php
					while ($actu_featured->have_posts()) : $actu_featured->the_post();
						if (!is_sticky()) {
					?>
							<div class="actu-card-sticky">
								<a href="<?php echo the_permalink(); ?>">
									<div class="actu-card-single">
										<div class="thumb-wrapper sticky-image">
											<img src="<?php echo $featured_image; ?>" class="" alt="<?php echo $title; ?>">
										</div>
										<div class="infos-wrapper">
											<div>
												<span class="the-date"><?php echo get_the_date('F Y'); ?></span>
												<h5 class="actu-card-title"><?php echo get_the_title(); ?></h5>
												<p>
													<?php echo mb_substr(get_the_excerpt(), 0, 100) . ' ...'; ?>
												</p>
											</div>
											<button class="btn btn-secondary btn-sm">
												<?php _e('En savoir plus', 'text-domain'); ?>
											</button>
										</div>
									</div>
								</a>
							</div>
					<?php
						}
					endwhile;

                    wp_reset_postdata();
					?>
				</div>
				<div class="row row-actu">
					<?php
					/* Start the Loop */
					while ($actus_not_featured->have_posts()) :
						$actus_not_featured->the_post();

						get_template_part('template-parts/content', 'category');

					endwhile;

                    wp_reset_postdata();

					the_posts_navigation();

				else :
					?>
					<section id="actualites-archives">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<h1><?php _e('Recherche', 'text-domain'); ?></h1>
								</div>
								<div class="col-md-6 d-flex justify-content-md-end align-items-center">
									<div id="categories" class="">
										<select class="custom-select select-cat" id="inputGroupSelect01" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
											<option value=""><?php _e('Catégories', 'text-domain'); ?></option>
											<?php
											$all_categories = get_categories();
											foreach ($all_categories as $categories_item) {
												$categorylink = get_category_link($categories_item);
											?>
												<option value="<?php echo esc_url($categorylink); ?>"><?php echo $categories_item->name; ?></option>
											<?Php
											}
											?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</section><!-- .page-header -->
					<section id="actus-grid">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="row">
									<?php
									get_template_part('template-parts/content', 'none');

								endif;
									?>
									</div>
								</div>
					</section>
</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
