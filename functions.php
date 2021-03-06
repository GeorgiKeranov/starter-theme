<?php
/**
 * Starter Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Starter_Theme
 */

define( 'STARTER_THEME_DIR', get_template_directory() );

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'starter_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function starter_theme_setup() {
		// Boot the carbon fields package for custom fields
		require_once( 'vendor/autoload.php' );
		\Carbon_Fields\Carbon_Fields::boot();

		// Add custom field options to the theme
		function starter_theme_add_custom_options_to_theme() {
			include_once(STARTER_THEME_DIR . '/custom-options/post-meta.php');
			include_once(STARTER_THEME_DIR . '/custom-options/theme-options.php');
		}
		add_action( 'carbon_fields_register_fields', 'starter_theme_add_custom_options_to_theme' );

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Starter Theme, use a find and replace
		 * to change 'starter-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'starter-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu' => esc_html__( 'Menu', 'starter-theme' ),
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
				'starter_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

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
endif;
add_action( 'after_setup_theme', 'starter_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function starter_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'starter_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'starter_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function starter_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'starter-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'starter-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'starter_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function starter_theme_scripts() {
	wp_enqueue_style( 'starter-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'starter-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'starter-theme-script', get_template_directory_uri() . '/scripts.js', array( 'jquery' ), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'starter_theme_scripts' );

/**
 * Attach custom options for the theme
 */
function starter_theme_custom_options() {
	include_once( STARTER_THEME_DIR . '/custom-options/post-types.php' );
	include_once( STARTER_THEME_DIR . '/custom-options/taxonomies.php' );
	include_once( STARTER_THEME_DIR . '/custom-options/shortcodes.php' );
}
add_action( 'init', 'starter_theme_custom_options', 0 );

/**
 * Add static pages, menus, custom field data in the database on the theme install.
 * This is done to save time with creating manually the same pages and menus every time.
 */
require STARTER_THEME_DIR . '/inc/setup-static-data-in-database.php';

/**
 * Load dynamically logo for the theme
 */
require STARTER_THEME_DIR . '/inc/logo-dynamic.php';

/**
 * Disable guttenberg editor for certain templates
 */
require STARTER_THEME_DIR . '/inc/disable-gutenberg.php';

/**
 * Disable classic editor for certain templates
 */
require STARTER_THEME_DIR . '/inc/disable-classic-editor.php';

/**
 * Add customizations on admin pages
 */
require STARTER_THEME_DIR . '/inc/admin-page-customization.php';
