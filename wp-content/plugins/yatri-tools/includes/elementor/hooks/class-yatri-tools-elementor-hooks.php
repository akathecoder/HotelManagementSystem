<?php

namespace Yatri_Tools_Elementor;


class Yatri_Tools_Elementor_Hooks
{

    private static $_instance = null;

    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct()
    {

        // Register Widget Styles
        add_action('wp_enqueue_scripts', [$this, 'widget_styles']);
        add_action('wp_enqueue_scripts', [$this, 'yte_enqueue_styles']);
        
        // Register widget scripts
        add_action('elementor/frontend/after_register_scripts', [$this, 'widget_scripts']);
        add_action('elementor/frontend/after_enqueue_scripts', [$this, 'yte_enqueue_scripts']);

        // Register widgets
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
    }


    public function widget_styles()
    {
        wp_register_style('yatri-tools-elementor-slickcss', YATRI_TOOLS_PLUGIN_URI . 'includes/elementor/assets/css/slick.min.css');
        wp_register_style('yatri-tools-elementor-slicktheme', YATRI_TOOLS_PLUGIN_URI . 'includes/elementor/assets/css/slick-theme.min.css');
        wp_register_style('yte-testimonial', YATRI_TOOLS_PLUGIN_URI . 'includes/elementor/assets/css/testimonial.css');
        wp_register_style('yte-team', YATRI_TOOLS_PLUGIN_URI . 'includes/elementor/assets/css/team.css');
        wp_register_style('yte-progressbar', YATRI_TOOLS_PLUGIN_URI . 'includes/elementor/assets/css/skillbar.css');
        wp_register_style('yte-counter', YATRI_TOOLS_PLUGIN_URI . 'includes/elementor/assets/css/counter.css');

        wp_register_style('yte-twentytwenty', YATRI_TOOLS_PLUGIN_URI . 'includes/elementor/assets/css/twentytwenty.css');

        // Common Stylings
        wp_register_style('yte-common', YATRI_TOOLS_PLUGIN_URI . 'includes/elementor/assets/css/common.css');
    }

    public function yte_enqueue_styles()
    {
        wp_enqueue_style('yte-common');
        wp_enqueue_style('yatri-tools-elementor-slickcss');
        wp_enqueue_style('yatri-tools-elementor-slicktheme');
        wp_enqueue_style('yte-testmonial');
        wp_enqueue_style('yte-team');
        wp_enqueue_style('yte-progressbar');
        wp_enqueue_style('yte-counter');
        wp_enqueue_style('yte-twentytwenty');

    }

    public function widget_scripts()
    {
        wp_register_script('yatri-tools-elementor-slickjs', YATRI_TOOLS_PLUGIN_URI . 'includes/elementor/assets/js/slick.min.js', ['jquery']);
        wp_register_script('yte-eventmovejs', YATRI_TOOLS_PLUGIN_URI . 'includes/elementor/assets/js/event.move.min.js', ['jquery']);
        wp_register_script('yte-twentytwentyjs', YATRI_TOOLS_PLUGIN_URI . 'includes/elementor/assets/js/twentytwenty.min.js', ['jquery']);

        wp_register_script('yte-testimonial', YATRI_TOOLS_PLUGIN_URI . 'includes/elementor/assets/js/testimonial.js', ['jquery'], false, true);

        wp_register_script('yte-counter', YATRI_TOOLS_PLUGIN_URI . 'includes/elementor/assets/js/counter.js', ['jquery'], false, true);
        wp_register_script('yte-appear', YATRI_TOOLS_PLUGIN_URI . 'includes/elementor/assets/js/appear.js', ['jquery'], false, true);
        wp_register_script('yte-skillbar', YATRI_TOOLS_PLUGIN_URI . 'includes/elementor/assets/js/skillbar.js', ['jquery', 'yte-appear'], false, true);

    }

    // enqueue frontend scripts
    public function yte_enqueue_scripts()
    {
        wp_enqueue_script('yte-testimonial');
        wp_enqueue_script('yte-appear');
        wp_enqueue_script('yte-skillbar');
        wp_enqueue_script('yatri-tools-elementor-slickjs');
        wp_enqueue_script('yte-eventmovejs');
        wp_enqueue_script('yte-twentytwentyjs');
    }

    public function register_widgets()
    {

        $widgets = yatri_tools_elementor_get_all_widgets();


        foreach ($widgets as $widget => $props) {


            // Including Plugin
            require_once(YATRI_TOOLS_ABSPATH . 'includes/elementor/widgets/class-yatri-tools-elementor-' . $widget . '-widget.php');

            // Register Widgets
            $class = sprintf('Yatri_Tools_Elementor\Widgets\%s', $props['class']);
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new $class);

        }
    }
}

Yatri_Tools_Elementor_Hooks::instance();
