<?php
$partners = get_fields('options');
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
                foreach ($partners['partners'] as $partner) {
                    if ($partner['featured'] ==  true) {
            ?>
                <img src="<?php echo $partner['logo']['url']; ?>" alt="" style="max-height: <?php echo $partner['height']; ?>px;">
            <?php
                    }
                }
            ?>
        </div>
    </div>
</nav>