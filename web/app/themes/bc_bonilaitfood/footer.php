<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bc_bonilaitfood
 */


$general_fields = get_fields('options');
$fields = get_fields();
if (isset($fields['page_footer']['footer_type'])) {
	get_template_part('template-parts/footer/' . $fields['page_footer']['footer_type']);
}
?>
<div class="content-top-footer">
<?php
if (isset($fields['page_footer']) && $fields['page_footer']['footer_image']) {
?>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="footer-title">
					<?php echo(isset($fields['page_footer']['footer_title']) && $fields['page_footer']['footer_title'] != "" ? $fields['page_footer']['footer_title'] : ""); ?>
				</h3>
			</div>
		</div>
		<div class="row swap-on-mobile">
			<div class="col-12 col-lg-6 col-xl-9">
				<div class="footer-content">
					<?php echo(isset($fields['page_footer']['footer_content']) && $fields['page_footer']['footer_content'] != "" ? $fields['page_footer']['footer_content'] : ""); ?>
				</div>
			</div>
			<div class="col-12 col-lg-6 col-xl-3 margin-lg-0b margin-sm-50b margin-lg-0t margin-sm-50t">
				<div class="footer-illustration">
					<img src="<?php echo(isset($fields['page_footer']['footer_image']) && $fields['page_footer']['footer_image'] != "" ? $fields['page_footer']['footer_image']['url'] : ""); ?>" alt="<?php echo(isset($fields['page_footer']['footer_image']) && $fields['page_footer']['footer_image'] != "" ? $fields['page_footer']['footer_image']['title'] : ""); ?>">
				</div>
			</div>
		</div>
	</div>

<?php
}
?>
</div>
<footer>
	<div class="footer-container">
		<div class="site-branding">
			<?php the_custom_logo(); ?>
		</div><!-- .site-branding -->
		<div class="general-informations">
			<div class="adresse">
				<?php echo isset($general_fields['general_informations']['adresse']) ? $general_fields['general_informations']['adresse'] : ""; ?>
			</div>
			<div class="sub-footer-container">
				<div class="copyright">
					© <?php bloginfo('name'); ?>
				</div>
				<div class="development_by">
					<a href="https://www.blue-com.fr/" target="_blank" title="Agence de communication éco-responsable"><span>Site réalisé par </span><img src="<?php echo esc_url(get_template_directory_uri() . "/assets/img/logo-blue-com.svg"); ?>"></a>
				</div>
			</div>
		</div>
		<!-- <div class="footer-menu-container"> -->
		<?php
		wp_nav_menu(array(
			'theme_location' => 'menu-2_1',
			'menu_id'        => 'footer-menu-left',
			'container_class' => 'footer-menu-left-container',
		));
		?>
		<?php
		wp_nav_menu(array(
			'theme_location' => 'menu-2_2',
			'menu_id'        => 'footer-menu-right',
			'container_class' => 'footer-menu-right-container',
		));
		?>
		<!-- </div> -->
		<div class="partners">
			<?php
			if (isset($general_fields['partners'])) {
				foreach ($general_fields['partners'] as $partner) {
					if ($partner['featured'] === false) {
			?>
						<div class="partner">
							<?php
                            if (isset($partner['link'])) {
							?>
							<a href="<?php echo isset($partner['link']['url']) ? $partner['link']['url'] : ""; ?>" target="<?php echo isset($partner['link']['target']) ? $partner['link']['target'] : ""; ?>" title="<?php echo isset($partner['link']['title']) ? $partner['link']['title'] : ""; ?>">
								<img src="<?php echo $partner['logo']['url']; ?>" alt="<?php echo $partner['logo']['title']; ?>" style="height: <?php echo $partner['height']; ?>px;">
							</a>
							<?php
                            }
							else {
							?>
							<img src="<?php echo $partner['logo']['url']; ?>" alt="<?php echo $partner['name']; ?>" style="height: <?php echo $partner['height']; ?>px;">
							<?php
							}
							?>
						</div>
			<?php
					}
				}
			}
			?>
		</div>
	</div>

</footer>
<?php wp_footer(); ?>
</body>

</html>