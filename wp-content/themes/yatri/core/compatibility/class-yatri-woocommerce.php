<?php

if (!class_exists('WooCommerce')) {
    return;
}

/**
 * Yatri WooCommerce Compatibility
 */
if (!class_exists('Yatri_Woocommerce')) :

    /**
     * Yatri WooCommerce Compatibility
     *
     * @since 1.0.0
     */
    class Yatri_Woocommerce
    {

        /**
         * Member Variable
         *
         * @var object instance
         */
        private static $instance;

        /**
         * Initiator
         */
        public static function get_instance()
        {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Constructor
         */
        public function __construct()
        {

            require_once "woocommerce/class-yatri-woocommerce-hooks.php";
            require_once "woocommerce/class-yatri-woocommerce-customizer.php";
            require_once "woocommerce/class-yatri-woocommerce-dynamic-style.php";

            add_filter('woocommerce_enqueue_styles', array($this, 'woo_filter_style'));
            add_action('widgets_init', array($this, 'woo_widgets_init'));
            add_action('customize_register', array($this, 'move_default_options'));


        }

        function woo_widgets_init()
        {
            register_sidebar(
                apply_filters(
                    'yatri_woocommerce_shop_sidebar_init',
                    array(
                        'name' => esc_html__('WooCommerce Sidebar', 'yatri'),
                        'id' => 'yatri-woo-shop-sidebar',
                        'description' => esc_html__('This sidebar will be used on Product archive, Cart, Checkout and My Account pages.', 'yatri'),
                        'before_widget' => '<div id="%1$s" class="widget %2$s">',
                        'after_widget' => '</div>',
                        'before_title' => '<h2 class="widget-title">',
                        'after_title' => '</h2>',
                    )
                )
            );
            register_sidebar(
                apply_filters(
                    'yatri_woocommerce_single_sidebar_init',
                    array(
                        'name' => esc_html__('Product Sidebar', 'yatri'),
                        'id' => 'yatri-woo-single-sidebar',
                        'description' => esc_html__('This sidebar will be used on Single Product page.', 'yatri'),
                        'before_widget' => '<div id="%1$s" class="widget %2$s">',
                        'after_widget' => '</div>',
                        'before_title' => '<h2 class="widget-title">',
                        'after_title' => '</h2>',
                    )
                )
            );
        }

        function move_default_options($wp_customize)
        {

            // priority
            $wp_customize->get_panel('woocommerce')->priority = 20;

        }


        function woo_filter_style($styles)
        {


            $file_prefix = '';
            $dir_name = (SCRIPT_DEBUG) ? 'unminified' : 'minified';

            $css_uri = YATRI_THEME_URI . 'assets/css/';

            $styles = array(
                'woocommerce-layout' => array(
                    'src' => $css_uri . 'woocommerce-layout' . $file_prefix . '.css',
                    'deps' => '',
                    'version' => YATRI_THEME_VERSION,
                    'media' => 'all',
                    'has_rtl' => true,
                ),
                'woocommerce-smallscreen' => array(
                    'src' => $css_uri . 'woocommerce-smallscreen' . $file_prefix . '.css',
                    'deps' => 'woocommerce-layout',
                    'version' => YATRI_THEME_VERSION,
                    'media' => 'only screen and (max-width: ' . apply_filters('woocommerce_style_smallscreen_breakpoint', '768px') . ')',
                    'has_rtl' => true,
                ),
                'woocommerce-general' => array(
                    'src' => $css_uri . 'woocommerce' . $file_prefix . '.css',
                    'deps' => '',
                    'version' => YATRI_THEME_VERSION,
                    'media' => 'all',
                    'has_rtl' => true,
                ),

            );


            return $styles;
        }


    }

endif;

if (apply_filters('yatri_enable_woocommerce_integration', true)) {
    Yatri_Woocommerce::get_instance();
}
