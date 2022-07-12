<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bc_bonilaitfood
 */
$general_fields = get_fields('options');

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div id="home-anchor"></div>
	<div class="container">
		<?php the_content(); ?>
	</div>
</article>