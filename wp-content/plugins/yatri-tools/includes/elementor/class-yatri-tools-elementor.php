<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly


final class Yatri_Tools_Elementor
{


    private $elementor_min_required_version = '2.0.0';


    private $php_min_required_version = '7.0';


    public function __construct()
    {

        add_action('plugins_loaded', array($this, 'setup'));

    }

    public function setup()
    {

        if (!defined('YATRI_TOOLS_ELEMENTOR_CATEGORY')) {
            define('YATRI_TOOLS_ELEMENTOR_CATEGORY', 'yatri-tools-elementor-elements');
        }

        // Register Custom Category
        add_action('elementor/elements/categories_registered', [$this, 'add_elementor_widget_categories']);

        // Check if Elementor installed and activated
        if (!did_action('elementor/loaded')) {
            return;
        }

        // Check for required Elementor version
        if (!version_compare(ELEMENTOR_VERSION, $this->elementor_min_required_version, '>=')) {
            add_action('admin_notices', array($this, 'admin_notice_minimum_elementor_version'));
            return;
        }

        // Check for required PHP version
        if (version_compare(PHP_VERSION, $this->php_min_required_version, '<')) {
            add_action('admin_notices', array($this, 'admin_notice_minimum_php_version'));
            return;
        }

        // Say hello to my little friend - Helper
        require_once(YATRI_TOOLS_ABSPATH . 'includes/elementor/yatri-tools-elementor-functions.php');

        // From the depths, a magical window has opened including our plugin!
        require_once(YATRI_TOOLS_ABSPATH . 'includes/elementor/hooks/class-yatri-tools-elementor-hooks.php');


        $this->load_library();
    }


    public function admin_notice_minimum_elementor_version()
    {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
        /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'yatri-tools'),
            '<strong>' . esc_html__('Yatri Tools Elementor', 'yatri-tools') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'yatri-tools') . '</strong>',
            $this->elementor_min_required_version
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required PHP version.
     *
     * @since 1.0.0
     * @access public
     */
    public function admin_notice_minimum_php_version()
    {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
        /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'yatri-tools'),
            '<strong>' . esc_html__('Yatri Tools Elementor', 'yatri-tools') . '</strong>',
            '<strong>' . esc_html__('PHP', 'yatri-tools') . '</strong>',
            $this->php_min_required_version
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Plugin Category
     *
     * Creating category for Yatri Tools Elementor
     *
     * @since 1.0.0
     * @access public
     */
    function add_elementor_widget_categories($elements_manager)
    {

        // Theme branding
        if (function_exists('yatri_theme_branding')) {

            $brand = yatri_theme_branding();
        } else {

            $brand = 'Yatri';
        }
        $elements_manager->add_category(
            YATRI_TOOLS_ELEMENTOR_CATEGORY,
            [
                'title' => $brand . ' ' . __('Widgets', 'yatri-tools'),
                'icon' => 'fas fa-ghost',
            ], 1
        );
    }


    public function load_library()
    {
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', __NAMESPACE__ . '\analog_fail_load');
            return;
        } elseif (!version_compare(get_bloginfo('version'), '5.0', '>=')) {
            add_action('admin_notices', __NAMESPACE__ . '\analog_fail_wp_version');
            return;
        }

        require_once(YATRI_TOOLS_ABSPATH . 'includes/elementor/class-yatri-tools-elementor-helper.php');
    }
}

new Yatri_Tools_Elementor();
