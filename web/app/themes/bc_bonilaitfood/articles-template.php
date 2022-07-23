<?php
/*
Template Name: Articles template
Template Post Type: post, page, product
*/
get_header('home');

?>
<main id="archive" class="site-main">
    <?php
    while (have_posts()) :
        the_post();

        get_template_part('template-parts/content', 'newspage');

    endwhile; // End of the loop.
    ?>
</main><!-- #main -->
<?php
get_footer();
