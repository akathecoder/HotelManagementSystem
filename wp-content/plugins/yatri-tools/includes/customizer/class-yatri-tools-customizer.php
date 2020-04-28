<?php

class Yatri_Tools_Customizer
{
    private static $instance = null;

    public static function get_instance()
    {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function __construct()
    {
        add_action('customize_register', array($this, 'customizer'));

    }

    public function customizer($wp_customize)
    {
        if (class_exists('Yatri_Core')) {

            include_once "controls/class-yatri-tools-customizer-control-prebuilt-header-templates.php";

            $wp_customize->register_panel_type('Yatri_Tools_Prebuilt_Header_Templates');

            include_once "prebuilt-header/prebuilt-header.php";


        }
    }

}

Yatri_Tools_Customizer::get_instance();