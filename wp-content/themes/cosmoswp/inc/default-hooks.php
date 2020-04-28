<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('cosmoswp_custom_header_setup')) {

    /**
     * Set up the WordPress core custom header feature.
     */
    function cosmoswp_custom_header_setup() {
        add_theme_support('custom-header', apply_filters('cosmoswp_custom_header_args', array(
            'default-image' => COSMOSWP_URL . '/assets/img/default-banner.jpg',
            'width'         => 1920,
            'height'        => 1280,
            'flex-height'   => true,
            'header-text'   => false,
            'flex-width'    => true,
            'video'         => true
        )));
        register_default_headers(array(
            'default-image' => array(
                'url'           => '%s/assets/img/default-banner.jpg',
                'thumbnail_url' => '%s/assets/img/default-banner.jpg',
                'description'   => __('Default Header Image', 'cosmoswp'),
            ),
        ));
    }

    add_action('after_setup_theme', 'cosmoswp_custom_header_setup');
}

if (!function_exists('cosmoswp_body_classes')) {

    /**
     * Adds custom classes to the array of body classes.
     *
     * @param array $classes Classes for the body element.
     * @return array
     */
    function cosmoswp_body_classes($classes) {
        // Adds a class of hfeed to non-singular pages.
        if (!is_singular()) {
            $classes[] = 'hfeed';
        }

        return $classes;
    }

    add_filter('body_class', 'cosmoswp_body_classes');
}

if (!function_exists('cosmoswp_pingback_header')) {

    /**
     * Add a pingback url auto-discovery header for singularly identifiable articles.
     */
    function cosmoswp_pingback_header() {
        if (is_singular() && pings_open()) {
            echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
        }
    }

    add_action('wp_head', 'cosmoswp_pingback_header');
}

if (!function_exists('cosmoswp_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function cosmoswp_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on CosmosWP, use a find and replace
         * to change 'cosmoswp' to the name of your theme in all the template files.
         */
        load_theme_textdomain('cosmoswp', get_template_directory() . '/languages');

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
        set_post_thumbnail_size(340, 240, true);

        // Adding excerpt for page
        add_post_type_support('page', 'excerpt');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'top-menu'              => esc_html__('Top Menu', 'cosmoswp'),
                'header-primary-menu'   => esc_html__('Header Primary Menu', 'cosmoswp'),
                'header-secondary-menu' => esc_html__('Header Secondary Menu', 'cosmoswp'),
                'footer-menu'           => esc_html__('Footer Menu ( Support First Level Only )', 'cosmoswp')
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
            )
        );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 190,
                'width'       => 190,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('cosmoswp_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add support for Block Styles.
        add_theme_support('wp-block-styles');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Add support for editor styles.
        add_theme_support('editor-styles');

        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');

        // Add custom editor font sizes.
        add_theme_support(
            'editor-font-sizes',
            array(
                array(
                    'name'      => __('Xtra Small', 'cosmoswp'),
                    'shortName' => __('XS', 'cosmoswp'),
                    'size'      => 14,
                    'slug'      => 'small',
                ),
                array(
                    'name'      => __('Small', 'cosmoswp'),
                    'shortName' => __('S', 'cosmoswp'),
                    'size'      => 16,
                    'slug'      => 'small',
                ),
                array(
                    'name'      => __('Normal', 'cosmoswp'),
                    'shortName' => __('N', 'cosmoswp'),
                    'size'      => 18,
                    'slug'      => 'normal',
                ),
                array(
                    'name'      => __('Medium', 'cosmoswp'),
                    'shortName' => __('M', 'cosmoswp'),
                    'size'      => 24,
                    'slug'      => 'normal',
                ),
                array(
                    'name'      => __('Large', 'cosmoswp'),
                    'shortName' => __('L', 'cosmoswp'),
                    'size'      => 28,
                    'slug'      => 'large',
                ),
                array(
                    'name'      => __('Xtra Large', 'cosmoswp'),
                    'shortName' => __('XL', 'cosmoswp'),
                    'size'      => 32,
                    'slug'      => 'huge',
                ),
            )
        );

        /*woocommerce support*/
        add_theme_support('woocommerce');
        /*Set up the woocommerce Gallery Lightbox*/
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

	    /*block press support*/
	    add_theme_support( 'gutentor' );

	    /*enable yoast seo*/
        add_theme_support('yoast-seo-breadcrumbs');

        /**
         * Set the content width in pixels, based on the theme's design and stylesheet.
         *
         * Priority 0 to make it available to lower priority callbacks.
         *
         * @global int $content_width
         */
        $GLOBALS['content_width'] = apply_filters('cosmoswp_content_width', 640);
    }

    add_action('after_setup_theme', 'cosmoswp_setup');
endif;

if (!function_exists('cosmoswp_scripts')) {
	/**
	 * Enqueue scripts and styles.
	 */
	function cosmoswp_scripts() {

        if (defined('GUTENTOR_URL')) {
            wp_enqueue_style(
                'fontawesome', // Handle.
                GUTENTOR_URL . '/assets/library/fontawesome/css/all' . GUTENTOR_SCRIPT_PREFIX . '.css',
                array(),
                '5'
            );
        }
        else{
            /*Font-Awesome-master*/
            wp_enqueue_style('fontawesome', COSMOSWP_URL . '/assets/library/Font-Awesome/css/all' . COSMOSWP_SCRIPT_PREFIX . '.css', array(), COSMOSWP_VERSION);
        }
        wp_style_add_data( 'fontawesome', 'rtl', 'replace' );

        /*jquery-scrollbar*/
        if (cosmoswp_is_scrollbar_js()) {
            wp_enqueue_style('jquery-scrollbar', COSMOSWP_URL . '/assets/library/jquery.scrollbar-gh-pages/jquery.scrollbar' . COSMOSWP_SCRIPT_PREFIX . '.css', array(), '1.0.0');
            wp_style_add_data( 'jquery-scrollbar', 'rtl', 'replace' );
            wp_enqueue_script('jquery-scrollbar', COSMOSWP_URL . '/assets/library/jquery.scrollbar-gh-pages/jquery.scrollbar' . COSMOSWP_SCRIPT_PREFIX . '.js', array(), '1.0.0', true );
        }

        /*Custom Grid*/
		wp_enqueue_style('wpness-grid', COSMOSWP_URL . '/assets/library/wpness-grid/wpness-grid' . COSMOSWP_SCRIPT_PREFIX . '.css', array(), '1.0.0');
        wp_style_add_data( 'wpness-grid', 'rtl', 'replace' );
        
        wp_enqueue_style('cosmoswp-style', COSMOSWP_URL . '/style' . COSMOSWP_SCRIPT_PREFIX . '.css', array(), COSMOSWP_VERSION );
        wp_style_add_data( 'cosmoswp-style', 'rtl', 'replace' );

		/*theme custom js*/
		wp_enqueue_script('cosmoswp-custom', COSMOSWP_URL . '/assets/js/cosmoswp' . COSMOSWP_SCRIPT_PREFIX . '.js', apply_filters('cosmoswp_js_dep',array('jquery')), COSMOSWP_VERSION, true );

		global $wp_query;
		$paged         = (get_query_var('paged') > 1) ? get_query_var('paged') : 1;
		$max_num_pages = $wp_query->max_num_pages;

		$ajax_show_more          = cosmoswp_get_theme_options('ajax-show-more');
		$ajax_no_more            = cosmoswp_get_theme_options('ajax-no-more');
		$blog_navigation_options = cosmoswp_get_theme_options('blog-navigation-options');

		wp_localize_script('cosmoswp-custom', 'cosmoswp', array(
			'ajaxurl'           => admin_url('admin-ajax.php'),
			'loadMoreGif'       => COSMOSWP_URL . '/assets/img/ajax-loader.gif',
			'paged'             => $paged,
			'max_num_pages'     => $max_num_pages,
			'next_posts'        => next_posts($max_num_pages, false),
			'show_more'         => $ajax_show_more,
			'no_more_posts'     => $ajax_no_more,
			'pagination_option' => $blog_navigation_options
		));

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
	add_action('wp_enqueue_scripts', 'cosmoswp_scripts');

}

if (!function_exists('cosmoswp_admin_scripts')) {

    /**
     * cosmoswp_admin_scripts
     * @param $hook
     */
    function cosmoswp_admin_scripts($hook) {

	    if ('widgets.php' == $hook || cosmoswp_is_edit_page()) {
            wp_enqueue_media();
            if (defined('GUTENTOR_URL')) {
                wp_enqueue_style(
                    'fontawesome', // Handle.
                    GUTENTOR_URL . '/assets/library/fontawesome/css/all' . GUTENTOR_SCRIPT_PREFIX . '.css',
                    array(),
                    '5'
                );
            }
            else{
                /*Font-Awesome-master*/
                wp_enqueue_style('fontawesome', COSMOSWP_URL . '/assets/library/Font-Awesome/css/all' . COSMOSWP_SCRIPT_PREFIX . '.css', array(), COSMOSWP_VERSION);
            }
            wp_style_add_data( 'fontawesome', 'rtl', 'replace' );

            wp_enqueue_script( 'wp-color-picker' );
		    wp_enqueue_style( 'wp-color-picker' );
		    wp_enqueue_script('cosmoswp-admin', COSMOSWP_URL . '/assets/js/cosmoswp-admin' . COSMOSWP_SCRIPT_PREFIX . '.js', '', COSMOSWP_VERSION, true );
        }

    }
    add_action('admin_enqueue_scripts', 'cosmoswp_admin_scripts');
}

if (!function_exists('cosmoswp_header_layout_class')) {
    /**
     * add class to body
     */
    function cosmoswp_header_layout_class($classes) {

        /*general setting layout*/
        $general_setting_layout = apply_filters( 'cosmoswp_general_setting_layout_body_class', cosmoswp_get_theme_options('general-setting-layout') );
        if (!empty($general_setting_layout)) {
            $classes[] = esc_attr($general_setting_layout);
        }

        /*general setting layout*/
        $general_content_layout = apply_filters( 'cosmoswp_general_content_layout_body_class', cosmoswp_get_theme_options('general-content-layout') );
        if (!empty($general_content_layout)) {
            $classes[] = esc_attr($general_content_layout);
        }

        /*header position options*/
        $header_position_options = cosmoswp_get_theme_options('header-position-options');
        if (!empty($header_position_options) && ('normal' != $header_position_options)) {
            $classes[] = esc_attr($header_position_options);
        }

        /*header general layout*/
        if ('normal' == $header_position_options || 'cwp-overlay-fixed' == $header_position_options) {
            $header_layout = apply_filters( 'cosmoswp_header_layout_body_class', cosmoswp_get_theme_options('header-general-width') );
            if ($header_layout != 'inherit') {
                $classes[] = esc_attr($header_layout);
            }
        }
        $footer_layout = apply_filters( 'cosmoswp_footer_layout_body_class', cosmoswp_get_theme_options('footer-general-layout') );
        if (!empty($footer_layout) && ('inherit' != $footer_layout)) {
            $classes[] = esc_attr($footer_layout);
        }
        $footer_display_style = cosmoswp_get_theme_options('footer-display-style');
        if (!empty($footer_display_style) && ('cwp-normal-footer' != $footer_display_style)) {
            $classes[] = esc_attr($footer_display_style);
        }

        $banner_display_option = cosmoswp_get_theme_options('banner-section-display');
        if ('hide' != $banner_display_option && (!empty($banner_display_option))) {
            $classes[] = esc_attr('cwp-has-banner');
        }
        return $classes;
    }

    add_filter('body_class', 'cosmoswp_header_layout_class');
}

if (!function_exists('cosmoswp_main_wrapper_class')) {

    /**
     * Add class to dynamic header wrapper
     * @param $classes
     * @return array
     */
    function cosmoswp_main_wrapper_class($classes) {

        $header_position_options = cosmoswp_get_theme_options('header-position-options');
        if (!empty($header_position_options) && ('cwp-vertical-header' == $header_position_options)) {
            $vertical_header_position = cosmoswp_get_theme_options('vertical-header-position');
            if (!empty($vertical_header_position)) {
                if ($vertical_header_position == 'cwp-vertical-header-left') {
                    $classes[] = 'cwp-vertical-body-content-left';
                }
                elseif ($vertical_header_position == 'cwp-vertical-header-right') {
                    $classes[] = 'cwp-vertical-body-content-right';
                }
            }
        }
        return $classes;
    }

    add_filter('cosmoswp_main_wrap_classes', 'cosmoswp_main_wrapper_class');
}

if (!function_exists('cosmoswp_header_top_class')) {

    /**
     * add class to header top
     * cosmoswp_header_top_class
     * @param $classes
     * @return array
     */
    function cosmoswp_header_top_class($classes) {

        $sticky_header_top = cosmoswp_get_theme_options('sticky-header-include-top');
        if ($sticky_header_top == false) {
            $classes[] = 'cwp-sticky-disable';
        }
        $header_top_bg                = cosmoswp_get_theme_options('header-top-background-options');
        $header_top_bg                = json_decode($header_top_bg, true);
        $header_top_bg_enable_overlay = cosmoswp_ifset($header_top_bg['enable-overlay']);
        if (true == $header_top_bg_enable_overlay) {
            $classes[] = 'cwp-enable-overlay';
        }
        return $classes;
    }

    add_filter('cosmoswp_header_top_classes', 'cosmoswp_header_top_class');
}

if (!function_exists('cosmoswp_header_main_class')) {

    /**
     * add class to header main
     * cosmoswp_header_main_class
     * @param $classes
     * @return array
     */
    function cosmoswp_header_main_class($classes) {

        $sticky_header_top = cosmoswp_get_theme_options('sticky-header-include-main');
        if ($sticky_header_top == false) {
            $classes[] = 'cwp-sticky-disable';
        }
        $header_main_bg                = cosmoswp_get_theme_options('header-main-background-options');
        $header_main_bg                = json_decode($header_main_bg, true);
        $header_main_bg_enable_overlay = cosmoswp_ifset($header_main_bg['enable-overlay']);
        if (true == $header_main_bg_enable_overlay) {
            $classes[] = 'cwp-enable-overlay';
        }
        return $classes;
    }

    add_filter('cosmoswp_header_main_classes', 'cosmoswp_header_main_class');
}

if (!function_exists('cosmoswp_header_bottom_class')) {

    /**
     * add class to header bottom
     * @param $classes
     * @return array
     */
    function cosmoswp_header_bottom_class($classes) {

        $sticky_header_top = cosmoswp_get_theme_options('sticky-header-include-bottom');
        if ($sticky_header_top == false) {
            $classes[] = 'cwp-sticky-disable';
        }
        $header_bottom_bg                = cosmoswp_get_theme_options('header-bottom-background-options');
        $header_bottom_bg                = json_decode($header_bottom_bg, true);
        $header_bottom_bg_enable_overlay = cosmoswp_ifset($header_bottom_bg['enable-overlay']);
        if (true == $header_bottom_bg_enable_overlay) {
            $classes[] = 'cwp-enable-overlay';
        }
        return $classes;
    }

    add_filter('cosmoswp_header_bottom_classes', 'cosmoswp_header_bottom_class');
}

if (!function_exists('cosmoswp_header_wrapper_class')) {

    /**
     * add class to header bottom
     * @param $classes
     * @return array
     */
    function cosmoswp_header_wrapper_class($classes) {

        $sticky_header_top = cosmoswp_get_theme_options('sticky-header-mobile-enable');
        if ($sticky_header_top == false) {
            $classes[] = 'cwp-sticky-disable';
        }
        $sticky_header_options   = cosmoswp_get_theme_options('sticky-header-options');
        $header_position_options = cosmoswp_get_theme_options('header-position-options');
        if (!empty($header_position_options) && ($header_position_options != 'cwp-vertical-header')) {
            $classes[] = 'cwp-horizontal-header';
        }
        $remove_sticky = array('cwp-vertical-header','cwp-overlay-transparent');
        if (!empty($header_position_options) && !in_array($header_position_options,$remove_sticky)) {
            if ($sticky_header_options == 'normal') {
                $classes[] = 'cwp-header-sticky';
            }
            $sticky_header_animation = cosmoswp_get_theme_options('sticky-header-animation-options');
            if (!empty($sticky_header_animation) && ('none' != $sticky_header_animation)) {
                $classes[] = $sticky_header_animation;
            }
        }
        if('cwp-vertical-header' == $header_position_options){
            $vertical_header_position = cosmoswp_get_theme_options('vertical-header-position');
            if (!empty($vertical_header_position)) {
                $classes[] = $vertical_header_position;
            }
        }
        $header_general_bg                = cosmoswp_get_theme_options('header-general-background-options');
        $header_general_bg                = json_decode($header_general_bg, true);
        $header_general_bg_enable_overlay = cosmoswp_ifset($header_general_bg['enable-overlay']);
        if (true == $header_general_bg_enable_overlay) {
            $classes[] = 'cwp-enable-overlay';
        }
        return $classes;
    }

    add_filter('cosmoswp_header_wrap_classes', 'cosmoswp_header_wrapper_class');
}

if (!function_exists('cosmoswp_vertical_header_classes')) {

    /**
     *  cosmoswp_vertical_header_classes
     * add class to header bottom
     * @param $classes
     * @return array
     */
    function cosmoswp_vertical_header_classes($classes) {

        $header_position = cosmoswp_get_theme_options('header-position-options');
        $site_layout     = cosmoswp_get_theme_options('general-setting-layout');
        if ($header_position == 'cwp-vertical-header' && $site_layout == 'cwp-boxed-width-body') {
            $classes[] = 'cwp-vertical-header-wrap';
        }
        return $classes;
    }

    add_filter('cosmoswp_vertical_header_main_wrap_classes', 'cosmoswp_vertical_header_classes');
}

if (!function_exists('cosmoswp_get_menu_id_by_location')) {

    /* *
     * Get nav menu id by location
     *
     *  @param $location
     */
    function cosmoswp_get_menu_id_by_location($location) {
        // Get all locations
        $locations = get_nav_menu_locations();
        // Get object id by location
        if (array_key_exists($location, $locations)) {
            $term_id = $locations[$location];
            return $term_id;
        } else {
            return 0;
        }
    }
}

if (!function_exists('cosmoswp_main_header_classes')) {

    /**
     *  cosmoswp_main_header_classes
     * add class to header bottom
     * @param $classes
     * @return array
     */
    function cosmoswp_main_header_classes($classes) {

        $header_main_boxwidth = cosmoswp_get_theme_options('header-main-enable-box-width');
        $header_general_width = cosmoswp_get_theme_options('header-general-width');
        if ($header_main_boxwidth && $header_general_width != 'cwp-boxed-width-header') {
            $classes[] = 'cwp-box-width';
        }
        return $classes;
    }

    add_filter('cosmoswp_header_wrap_classes', 'cosmoswp_main_header_classes');
}

if (!function_exists('cosmoswp_main_add_classes')) {

    /**
     *  cosmoswp_main_header_classes
     * add class to header bottom
     * @param $classes
     * @return array
     */
    function cosmoswp_main_add_classes($classes) {

        $main_body_general_bg                = cosmoswp_get_theme_options('main-content-general-background-options');
        $main_body_general_bg                = json_decode($main_body_general_bg, true);
        $main_body_general_bg_enable_overlay = cosmoswp_ifset($main_body_general_bg['enable-overlay']);
        if (true == $main_body_general_bg_enable_overlay) {
            $classes[] = 'cwp-enable-overlay';
        }
        return $classes;
    }

    add_filter('cosmoswp_main_classes', 'cosmoswp_main_add_classes');
}

if (!function_exists('cosmoswp_footer_general_wrap_classes')) {

    /**
     *  cosmoswp_footer_wrap_classes
     * add class to header bottom
     * @param $classes
     * @return array
     */
    function cosmoswp_footer_general_wrap_classes($classes) {

        $footer_general_bg                = cosmoswp_get_theme_options('footer-general-background-options');
        $footer_general_bg                = json_decode($footer_general_bg, true);
        $footer_general_bg_enable_overlay = cosmoswp_ifset($footer_general_bg['enable-overlay']);
        if (true == $footer_general_bg_enable_overlay) {
            $classes[] = 'cwp-enable-overlay';
        }
        return $classes;
    }

    add_filter('cosmoswp_footer_wrap_classes', 'cosmoswp_footer_general_wrap_classes');
}


if (!function_exists('cosmoswp_footer_top_add_classes')) {

    /**
     *  cosmoswp_footer_wrap_classes
     * add class to header bottom
     * @param $classes
     * @return array
     */
    function cosmoswp_footer_top_add_classes($classes) {

        $footer_top_bg                = cosmoswp_get_theme_options('footer-top-background-options');
        $footer_top_bg                = json_decode($footer_top_bg, true);
        $footer_top_bg_enable_overlay = cosmoswp_ifset($footer_top_bg['enable-overlay']);
        if (true == $footer_top_bg_enable_overlay) {
            $classes[] = 'cwp-enable-overlay';
        }
        return $classes;
    }

    add_filter('cosmoswp_footer_top_wrap_classes', 'cosmoswp_footer_top_add_classes');
}

if (!function_exists('cosmoswp_footer_main_add_classes')) {

    /**
     *  cosmoswp_footer_wrap_classes
     * add class to header bottom
     * @param $classes
     * @return array
     */
    function cosmoswp_footer_main_add_classes($classes) {

        $footer_main_bg                = cosmoswp_get_theme_options('footer-main-background-options');
        $footer_main_bg                = json_decode($footer_main_bg, true);
        $footer_main_bg_enable_overlay = cosmoswp_ifset($footer_main_bg['enable-overlay']);
        if (true == $footer_main_bg_enable_overlay) {
            $classes[] = 'cwp-enable-overlay';
        }
        return $classes;
    }

    add_filter('cosmoswp_footer_main_wrap_classes', 'cosmoswp_footer_main_add_classes');
}


if (!function_exists('cosmoswp_footer_bottom_add_classes')) {

    /**
     *  cosmoswp_footer_wrap_classes
     * add class to header bottom
     * @param $classes
     * @return array
     */
    function cosmoswp_footer_bottom_add_classes($classes) {

        $footer_bottom_bg                = cosmoswp_get_theme_options('footer-bottom-background-options');
        $footer_bottom_bg                = json_decode($footer_bottom_bg, true);
        $footer_bottom_bg_enable_overlay = cosmoswp_ifset($footer_bottom_bg['enable-overlay']);
        if (true == $footer_bottom_bg_enable_overlay) {
            $classes[] = 'cwp-enable-overlay';
        }
        return $classes;
    }

    add_filter('cosmoswp_footer_bottom_wrap_classes', 'cosmoswp_footer_bottom_add_classes');
}


if (!function_exists('cosmoswp_blog_add_grid_classes')) {

    /**
     *  cosmoswp_blog_grid_classes
     * add class blog
     * @param $classes
     * @return array
     */
    function cosmoswp_blog_add_grid_classes($classes) {

        $blog_layout        = cosmoswp_get_theme_options('blog-post-view-layout');
        $blog_column_number = cosmoswp_get_theme_options('blog-column-number');
        if ('column-layout' == $blog_layout && $blog_column_number ) {
            $classes[] = cosmoswp_get_grid_class($blog_column_number);
        }
        return $classes;
    }

    add_filter('cosmoswp_blog_grid_classes', 'cosmoswp_blog_add_grid_classes');
}


