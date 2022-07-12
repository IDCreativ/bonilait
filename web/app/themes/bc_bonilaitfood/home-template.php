<?php
/*
Template Name: Home template
Template Post Type: post, page, product
*/
get_header('home');

?>
<main id="home">
<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'home' );

	endwhile; // End of the loop.
	?>
</main>
<?php
get_footer();
