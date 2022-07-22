<?php
// Products accueil
function homeProducts_function()
{
?>
    <div class="products">
        <?php
        $args = array(
            'post_type'         => 'produits',
            'posts_per_page'    => -1,
            'meta_key'  => 'product_position',
            'orderby'   => 'meta_value',
            'order'     => 'ASC',
        );
        $the_query = new WP_Query($args);

        while ($the_query->have_posts()) : $the_query->the_post();
            $fields = get_fields();
            $picto = isset($fields['product_picto']) ? $fields['product_picto']['url'] : "";
            $pictoTitle = isset($fields['product_picto']) ? $fields['product_picto']['title'] : "";
        ?>
            <a href="<?php the_permalink(); ?>">
                <div class="card product-card">
                    <div class="card-body">
                        <div class="picto-wrapper">
                            <img src="<?php echo $picto; ?>" alt="<?php echo $pictoTitle; ?>">
                        </div>
                            <div class="product-infos">
                                <h3><?php echo get_the_title(); ?></h3>
                            </div>
                    </div>
                </div>
            </a>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>

<?php
}
add_shortcode('homeProducts', 'homeProducts_function');
