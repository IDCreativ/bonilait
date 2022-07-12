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
<div id="toggle-menu-wrapper" class="toggle-wrapper">
    <div id="toggleMenu" class="toggle">
        <span class="line line-1"></span>
        <span class="line line-2"></span>
        <span class="line line-3"></span>
    </div>
</div>
<nav id="main-navigation">
    <div class="nav-container">
        <div id="menu-wrapper">
            <div id="nav-social-wrapper">
                <?php
                if (isset($general_fields['reseaux_sociaux']) && !empty($general_fields['reseaux_sociaux'])) {
                    foreach ($general_fields['reseaux_sociaux'] as $social) {
                ?>
                    <a href="<?php echo $social['social_link']['url']; ?>" target="<?php echo $social['social_link']['target']; ?>">
                        <img class="social-picto" src="<?php echo $social['social_picto']['url']; ?>" alt="<?php echo $social['social_link']['title']; ?>">
                    </a>
                <?php
                    }
                }
                ?>
            </div>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
                'container_class' => 'main-menu-container',
            ));
            ?>
        </div>
    </div>
</nav>