<?php

/**
 * bc_bonilaitfood functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bc_bonilaitfood
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bc_bonilaitfood_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on bc_bonilaitfood, use a find and replace
		* to change 'bc_bonilaitfood' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('bc_bonilaitfood', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' 	=> esc_html__('Primary', 'bc_bonilaitfood'),
			'menu-2_1' 	=> esc_html__('Footer left', 'bc_bonilaitfood'),
			'menu-2_2' 	=> esc_html__('Footer right', 'bc_bonilaitfood'),
			'menu-3' 	=> esc_html__('Mobile', 'bc_bonilaitfood'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'bc_bonilaitfood_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'bc_bonilaitfood_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bc_bonilaitfood_content_width()
{
	$GLOBALS['content_width'] = apply_filters('bc_bonilaitfood_content_width', 640);
}
add_action('after_setup_theme', 'bc_bonilaitfood_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bc_bonilaitfood_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'bc_bonilaitfood'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'bc_bonilaitfood'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'bc_bonilaitfood_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function bc_bonilaitfood_scripts()
{
	wp_enqueue_style('bc_bonilaitfood-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('bc_bonilaitfood-style', 'rtl', 'replace');

	wp_enqueue_style('bc_bonilaitfood-fontawesome', get_template_directory_uri() . '/assets/fonts/fontawesome/css/all.min.css');
	wp_enqueue_style('bc_bonilaitfood-aos-style', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
	wp_enqueue_style('bc_bonilaitfood-custom', get_template_directory_uri() . '/assets/css/custom.css');

	wp_enqueue_script('bc_bonilaitfood-aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js');
	wp_enqueue_script('bc_bonilaitfood-gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js');
	wp_enqueue_script('bc_bonilaitfood-gsap-scrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js');
	wp_enqueue_script('bc_bonilaitfood-gsap-custom-ease', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.0/CustomEase.min.js');
	wp_enqueue_script('bc_bonilaitfood-bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js');
	wp_enqueue_script('bc_bonilaitfood-animate-js', get_template_directory_uri() . '/assets/js/animate.js');
	wp_enqueue_script('bc_bonilaitfood-main-js', get_template_directory_uri() . '/assets/js/main.js');

	wp_enqueue_script('bc_bonilaitfood-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'bc_bonilaitfood_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Paramètres du site',
		'menu_title'	=> 'Paramètres',
		'menu_slug' 	=> 'site-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Partenaires',
		'menu_title'	=> 'Partenaires',
		'parent_slug'	=> 'site-general-settings',
	));
}

// Defer javascript files
function mind_defer_scripts($tag, $handle, $src)
{
	$defer = array(
		'bc_bonilaitfood-main-js',
	);
	if (in_array($handle, $defer)) {
		return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
	}

	return $tag;
}
add_filter('script_loader_tag', 'mind_defer_scripts', 10, 3);

add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);

function special_nav_class($classes, $item)
{
	if (in_array('current-menu-item', $classes)) {
		$classes[] = 'bc-active ';
	}
	return $classes;
}

// Shortcodes
include('shortcodes/shortcode-products.php');     // Shortcodes
include('shortcodes/shortcode-articles.php');     // Shortcodes
