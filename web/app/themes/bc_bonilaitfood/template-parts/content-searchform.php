<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bc_bonilaitfood
 */

?>
<div class="container">
	<div class="row">
		<div class="col">
			<form class="bc-widget-search" role="search" method="get" id="searchform-<?php echo esc_attr(rand(0, 1000)); ?>" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="input-group rounded-pill">
					<input type="text" class="form-control form-control-lg border-primary input-search-start ps-5" placeholder="<?php esc_attr_e( 'Rechercher ...', 'kappa' ); ?>" aria-describedby="button-search" value="" name="s" title="<?php esc_attr_e( 'Recherche pour :', 'kappa' ); ?>">
					<button class="input-group-text bg-primary text-light border-primary input-search-end px-4" id="basic-addon2"><i class="fal fa-search fa-fw"></i></button>
				</div>
			</form>
		</div>
	</div>
</div>
