<?php

defined('ABSPATH') || exit;

/**
 * Yatri_WooCommerce_Hooks class.
 */
class Yatri_WooCommerce_Customizer
{
    private static $instance = null;


    public static function get_instance()
    {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;

    }

    /**
     * Theme init.
     */
    public function __construct()
    {
        add_action('customize_register', array($this, 'add_sections'));
        add_filter('yatri_default_theme_options', array($this, 'init_default_woo'));


    }

    public function init_default_woo($defaults)
    {

        $woo_defaults = $this->default_customizer();

        $defaults = array_merge($defaults, $woo_defaults);

        return $defaults;
    }

    public function default_customizer()
    {

        $defaults['show_woo_breadcrumb'] = true;
        $defaults['woo_breadcrumb_type'] = 'theme_default';

        return $defaults;
    }

    public function add_sections($wp_customize)
    {
        $default = $this->default_customizer();

        $wp_customize->add_section(
            'yatri_woocommerce_breadcrumb',
            array(
                'title' => esc_html__('Breadcrumb', 'yatri'),
                'priority' => 5,
                'panel' => 'woocommerce',
            )
        );
        include_once "breadcrumb/breadcrumb.php";

    }

}

Yatri_WooCommerce_Customizer::get_instance();
