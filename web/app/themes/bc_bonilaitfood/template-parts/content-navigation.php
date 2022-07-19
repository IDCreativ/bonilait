<?php
$general_fields = get_fields('options');
?>
<div id="menu-wrapper-mobile">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'menu-3',
        'menu_id'        => 'mobile-menu',
        'container_class' => 'main-menu-container',
    ));
    ?>
</div>
<div class="toggle-wrapper">
    <div id="toggleMenu" class="toggle">
        <span class="line line-1"></span>
        <span class="line line-2"></span>
        <span class="line line-3"></span>
    </div>
</div>
<div id="search-form">
    <?php get_template_part('template-parts/content', 'searchform'); ?>
</div>
<!-- Topbar -->
<div id="above-nav">
    <div class="container above-nav-container p-0">
        <div class="row">
            <div class="col above-nav-items">
                <div class="contact-nav">
                    <div id="nav-social-wrapper">
                        <?php echo do_shortcode('[wpml_language_selector_widget]'); ?>
                    </div>
                    <div class="phone-number">
                        <span><?php echo isset($general_fields['general_informations']['telephone']) ? $general_fields['general_informations']['telephone'] : ""; ?></span>
                    </div>
                    <div class="contact">
                        <i class="fal fa-envelope"></i>
                        <span class="ms-2">Contact</span>
                    </div>
                </div>
                <div id="show-searchform" class="toggle-search search-nav">
                    <img src="<?php echo esc_url(get_template_directory_uri() . "/assets/img/search.svg"); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<nav id="main-navigation">
    <div class="nav-container">
        <div class="site-branding">
            <?php the_custom_logo(); ?>
        </div><!-- .site-branding -->
        <div id="menu-wrapper">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
                'container_class' => 'main-menu-container',
            ));
            ?>
        </div>
        <div class="site-partners">
            <?php
            if (isset($general_fields['partners'])) {
                foreach ($general_fields['partners'] as $partner) {
                    if ($partner['featured'] ==  true) {
            ?>
                        <img src="<?php echo $partner['logo']['url']; ?>" alt="" style="max-height: <?php echo $partner['height']; ?>px;">
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</nav>