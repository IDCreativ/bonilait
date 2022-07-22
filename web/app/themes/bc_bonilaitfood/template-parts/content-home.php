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
$page_title = isset($fields['page_header']['page_title']) && $fields['page_header']['page_title'] != "" ? $fields['page_header']['page_title'] : "<p>" . get_the_title() . "</p>";
$page_description = isset($fields['page_header']['page_description']) && $fields['page_header']['page_description'] != "" ? $fields['page_header']['page_description'] : "";
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
						<a href="<?php echo $fields['page_header']['page_cta_link']['url']; ?>" target="<?php echo $fields['page_header']['page_cta_link']['target']; ?>" class="btn btn-secondary text-light text-uppercase"><?php echo $fields['page_header']['page_cta_link']['title']; ?></a>
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
		<svg
			class="wave-bottom"
			data-name="wave-bottom"
			xmlns="http://www.w3.org/2000/svg"
			viewBox="0 0 1600 200"
		>
			<path
				class="cls-1"
				d="M1600,8.8c-224.5,27.5-449.4,62.4-676.1,91.1C849.8,109,775.5,118.1,701,126.1,626.5,133.5,551.8,141,476.8,146s-150.1,9.2-225.5,10.4q-20.4.45-40.8.6H155.8q-65.4-.6-131.1-3.9c-8.2-.4-16.5-.9-24.7-1.4V210H1600Z"
			/>
		</svg>
	</div>
	<div class="thumb-bground">
		<img src="<?php echo $featured_image; ?>" class="post-thumbnail">
	</div>
</section><!-- .page-header -->
<section class="home-description">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6 col-xl-3 margin-lg-0b margin-sm-50b margin-lg-0t margin-sm-50t">
				<div class="home-header-illustration">
					<?php
						if (isset($fields['home_gallery'])) {
					?>
							<img class="image-base" src="<?php echo $fields['home_gallery'][0]['url']; ?>" alt="<?php echo $fields['home_gallery'][0]['alt']; ?>">
					<?php
							if (isset($fields['home_gallery'][1])) {
					?>
								<img class="image-corner" src="<?php echo $fields['home_gallery'][1]['url']; ?>" alt="<?php echo $fields['home_gallery'][1]['alt']; ?>">
					<?php
							}
						}
					?>
				</div>
			</div>
			<div class="col-12 col-lg-6 col-xl-9">
				<div class="header-content">
					<h2 class="header-title">
						<?php echo(isset($fields['home_title']) && $fields['home_title'] != "" ? $fields['home_title'] : ""); ?>
					</h2>
					<?php echo(isset($fields['home_description']) && $fields['home_description'] != "" ? $fields['home_description'] : ""); ?>
					
    				<?php
						if (isset($fields['home_call_to_action']) && $fields['home_call_to_action'] !== "") {
					?>
							<a
								class="btn btn-secondary btn-sm text-light text-uppercase"
								href="<?php echo isset($fields['home_call_to_action']['url']) ? $fields['home_call_to_action']['url'] : ""; ?>"
								target="<?php echo isset($fields['home_call_to_action']['target']) ? $fields['home_call_to_action']['target'] : ""; ?>"
								title="<?php echo isset($fields['home_call_to_action']['title']) ? $fields['home_call_to_action']['title'] : ""; ?>"
							>
								<?php echo isset($fields['home_call_to_action']['title']) ? $fields['home_call_to_action']['title'] : ""; ?>
							</a>
					<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="top-home-products">
	<div class="header-wave-block">
		<svg
			class="wave-block"
			data-name="wave-block"
			xmlns="http://www.w3.org/2000/svg"
			viewBox="0 0 1600 118.21"
		>
			<path
				class="wave-tertiary"
				d="M1600,111.41c-90.39,5.4-181.22,2.65-272.18-3.64C1120.34,93.22,912.08,61,702.17,38.42,649.68,33,597.1,27.6,544.42,23.23c-52.7-3.91-105.48-7.8-158.38-9.54s-105.87-2.73-158.88-1Q147.65,14.67,68.17,24,34.07,28.12,0,33.85V130H1600Z"
			/>
		</svg>
	</div>
</section>
<section class="home-products">
	<div class="container">
		<div class="products-title">
			<div class="container">
				<h2>APPLICATION <strong>PRODUIT</strong></h2>
			</div>
		</div>
		<?php echo do_shortcode('[homeProducts]'); ?>
	</div>
</section>
<section class="home-gammes">
	<div class="bg-home-schema bg-1">
		<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/backgrounds/home-schema.svg'); ?>" alt="">
	</div>
	<div class="bg-home-schema bg-2">
		<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/backgrounds/home-schema-pointilles.svg'); ?>" alt="">
	</div>
	<div class="bg-home-schema bg-3">
		<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/backgrounds/home-gammes.svg'); ?>" alt="">
	</div>
	<div class="gammes-content">
		<?php
		if (isset($fields['gammes'])) {
			$gammeCounter = 1;
			$gammesTotal = count($fields['gammes']);
			foreach ($fields['gammes'] as $gamme) {
				switch ($gammeCounter) {
					case 1:
						$circlePosition = 'top-center';
						break;
					case 2:
						$circlePosition = 'center-right';
						break;
					case 3:
						$circlePosition = 'bottom-center';
						break;
					case 4:
						$circlePosition = 'center-left';
						break;
				}
		?>
			<div class="gamme-wrapper wrapper-<?php echo $gamme['gamme_display']; ?> <?php echo $circlePosition; ?>">
				<div class="gamme-description">
					<?php echo $gamme['gamme_content']; ?>
				</div>
				<div class="gamme-title">
					<?php echo $gamme['gamme_title']; ?>
				</div>
			</div>
		<?php
				$gammeCounter++;
			}
		}
		else {
			echo "On n'affiche rien";
		}
		?>
	</div>
</section>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_content(); ?>
</article>