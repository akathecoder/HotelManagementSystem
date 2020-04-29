<?php
/**
 * Codify functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Codify
 */

if ( ! function_exists( 'codify_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function codify_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Codify, use a find and replace
		 * to change 'codify' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'codify', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'codify' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'codify_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 60,
			'width'       => 240,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		
		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );	

		// Starter Content
		add_theme_support( 'starter-content', array(
			'widgets' => array(
				'blog_sidebar' => array('search', 'archives', 'calendar', 'categories', 'meta', 'recent-comments', 'recent-posts' ),
				'page_sidebar' => array('search', 'archives', 'calendar', 'categories', 'meta', 'recent-comments', 'recent-posts' ),

			),
		));
	}
endif;
add_action( 'after_setup_theme', 'codify_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function codify_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'codify_content_width', 640 );
}
add_action( 'after_setup_theme', 'codify_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function codify_scripts() {

	wp_enqueue_style( 'codify-fonts', codify_fonts_url(), array(), null );

	// Load fontawesome
	wp_enqueue_style( 'codify-font-awesome', get_template_directory_uri().'/assets/css/font-awesome.min.css', array(), '4.7.0' );
		

	// Meanmenu Css
	wp_enqueue_style( 'meanmenu-css', get_template_directory_uri().'/assets/css/meanmenu.css', array(), '1.0.0' );

	wp_enqueue_style( 'codify-style', get_stylesheet_uri() );
	wp_enqueue_style( 'codify-responsive', get_template_directory_uri().'/assets/css/responsive.css', array(), '1.0.0' );

	if ( true == get_theme_mod( 'enable_sticky_sidebar', true ) ):

		wp_enqueue_script( 'ResizeSensor-js', get_template_directory_uri() .'/assets/js/ResizeSensor.js', array(), 'v2.0.8', true );

		wp_enqueue_script( 'theia-sticky-sidebar-js', get_template_directory_uri() .'/assets/js/theia-sticky-sidebar.js', array(), 'v1.7.0', true );	
	endif;

	wp_enqueue_script( 'codify-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'codify-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	// Load meanmenu
	wp_enqueue_script( 'meanmenu', get_template_directory_uri().'/assets/js/jquery.meanmenu.js', array('jquery'), false, true );

	if ( true == get_theme_mod( 'enable_sticky_header', true ) ):
	// Sticky Header Js
		wp_enqueue_script( 'StickyHeader', get_template_directory_uri().'/assets/js/StickyHeader.js', array('jquery'), false, true );
	endif; 

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'codify-custom', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery') , '1.0.0', true);	

}
add_action( 'wp_enqueue_scripts', 'codify_scripts' );


/**
 * Define constants
 */

// Root path/URI.
define( 'CODIFY_DIR', trailingslashit( get_template_directory() ) );
define( 'CODIFY_URI', trailingslashit( get_template_directory_uri() ) );

// Include path/URI.
define( 'CODIFY_INC_DIR', CODIFY_DIR . '/includes' );
define( 'CODIFY_INC_URI', CODIFY_URI . '/includes' );

// Customizer path.
define( 'CODIFY_CUSTOMIZER_DIR', CODIFY_INC_DIR . '/customizer' );

// Hook path.
define( 'CODIFY_HOOK_DIR', CODIFY_INC_DIR . '/hook' );

// compatibility path.
define( 'CODIFY_COMPATIBILITY_DIR', CODIFY_INC_DIR . '/compatibility' );

// Theme version.
$codify_theme = wp_get_theme();
define( 'CODIFY_THEME_VERSION', $codify_theme->get( 'Version' ) );

/**
 * Add Kirki customizer library file
 */
require CODIFY_INC_DIR . '/kirki/kirki.php';

/**
 * Kirki Customizer additions.
 */
require CODIFY_CUSTOMIZER_DIR .'/class-customizer-config.php';

/**
 * Basic Structure 
 */
require_once CODIFY_HOOK_DIR . '/structure.php';

/**
 * Custom Hook 
 */
require_once CODIFY_HOOK_DIR . '/extra.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require CODIFY_HOOK_DIR .'/custom-function.php';

/**
 * Implement the Helper Function.
 */
require CODIFY_INC_DIR .'/helper-function.php';

/**
 * Implement the Custom Header feature.
 */
require CODIFY_INC_DIR .'/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require CODIFY_INC_DIR .'/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require CODIFY_INC_DIR .'/template-functions.php';

/**
 * Customizer additions.
 */
require CODIFY_INC_DIR .'/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require CODIFY_INC_DIR .'/jetpack.php';
}

/**
 * Metabox.
 */
require  CODIFY_INC_DIR . '/metabox.php';


/**
 * Sidebar Function 
 */
require_once CODIFY_HOOK_DIR . '/class-sidebar.php';

/**
 * Compatibility  
 */
require_once CODIFY_COMPATIBILITY_DIR . '/elementor.php';
require_once CODIFY_COMPATIBILITY_DIR . '/elementor-pro.php';
require_once CODIFY_COMPATIBILITY_DIR . '/beaver-themer.php';
require_once CODIFY_COMPATIBILITY_DIR . '/woocommerce/class-woocommerce.php';