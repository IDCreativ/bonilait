<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bc_bonilaitfood
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	if (function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<div id="breadcrumbs"><div class="container">', '</div></div>');
	}
	?>
	<div class="container mb-50">
		<div class="row">
			<div class="col">
				<div class="above-title-search">
					<?php esc_html_e('Erreur 404', 'bc_bonilaitfood'); ?>
				</div>
				<div class="title-search">
					<?php esc_html_e('Oups ! Cette page est introuvable.', 'bc_bonilaitfood'); ?>
				</div>
			</div>
		</div>
		<div class="row my-5">
			<div class="col">
				<div class="">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="bc_bonilaitfood-buttons "><a href="<?php echo the_permalink($post->ID); ?>"><button class="bc_bonilaitfood-buttons btn btn-white rounded-pill"><i class="fal fa-long-arrow-left left"></i>Retour à l'accueil</button></a></div>
			</div>
		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
