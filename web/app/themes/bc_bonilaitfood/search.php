<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package bc_bonilaitfood
 */

get_header();
?>
<main id="search" class="site-main">
	<?php
	if (function_exists('yoast_breadcrumb')) {
		yoast_breadcrumb('<div id="breadcrumbs"><div class="container">', '</div></div>');
	}
	?>
	<?php
	if (have_posts()) :
	?>
		<div class="container">
			<div class="row">
				<div class="col d-flex justify-content-between align-items-center flex-md-row flex-column">
					<div>
						<div class="above-title-search">
							<?php esc_html_e('Page de recherche', 'bc_bonilaitfood'); ?>
						</div>
						<div class="title-search">
							<?php printf(esc_html__('Résultats de recherche pour : %s', 'bc_bonilaitfood'), '<span>' . get_search_query() . '</span>'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<?php
				/* Start the Loop */
				while (have_posts()) :
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part('template-parts/content', 'search');

				endwhile;
				?>
			</div>
		</div>
	<?php

	else :
	?>
		<div class="container">
			<div class="row">
				<div class="col d-flex justify-content-between align-items-center flex-md-row flex-column">
					<div>
						<div class="above-title-search">
							<?php esc_html_e('Page de recherche', 'bc_bonilaitfood'); ?>
						</div>
						<div class="title-search">
							<?php printf(esc_html__('Résultats de recherche pour : %s', 'bc_bonilaitfood'), '<span>' . get_search_query() . '</span>'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<?php
				get_template_part('template-parts/content', 'none');
				?>
			</div>
		</div>
	<?php
	endif;
	?>
</main><!-- #main -->
<?php
get_footer();
