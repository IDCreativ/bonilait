<?php

// Articles accueil
function lastArticles_function()
{
    $actu_featured = new WP_Query(array(
        'post_type'         => 'post',
        'posts_per_page'    => 1,
    ));
    $actus_not_featured = new WP_Query(array(
        'post_type'         => 'post',
        'posts_per_page'    => -1,
    ));
?>
    <section id="actus-grid">
        <div class="container">
            <div class="row row-sticky">
                <?php
                while ($actu_featured->have_posts()) : $actu_featured->the_post();
                    if (is_sticky()) {
                ?>
                        <div class="actu-card-sticky">
                            <a href="<?php echo the_permalink(); ?>">
                                <div class="actu-card-single">
                                    <div class="thumb-wrapper sticky-image">
                                        <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]; ?>" class="" alt="<?php echo get_the_title(); ?>">
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

                the_posts_navigation(); ?>
            </div>
        </div>
    </section>
<?php
}
add_shortcode('lastArticles', 'lastArticles_function');
