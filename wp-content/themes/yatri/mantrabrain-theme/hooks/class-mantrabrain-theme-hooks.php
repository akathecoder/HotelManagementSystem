<?php
if (!class_exists('Mantrabrain_Theme_Hooks')) {
    class Mantrabrain_Theme_Hooks
    {

        public function __construct()
        {
            add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));
            add_action('customize_controls_enqueue_scripts', array($this, 'controls_scripts'));


        }

        public function controls_scripts()
        {
            wp_enqueue_style('mantrabrain-select2-css', get_template_directory_uri() . '/mantrabrain-theme/assets/lib/select2/css/select2.min.css', null);
            wp_enqueue_script('mantrabrain-select2-js', get_template_directory_uri() . '/mantrabrain-theme/assets/lib/select2/js/select2.min.js', array(), '', true);
            // Extended Customizer Assets - Panel extended.
            wp_enqueue_style('mantrabrain-theme-extend-customizer-css', get_template_directory_uri() . '/mantrabrain-theme/assets/admin/css/extend-customizer.css', null);
            wp_enqueue_script('mantrabrain-theme-extend-customizer-js', get_template_directory_uri() . '/mantrabrain-theme/assets/admin/js/extend-customizer.js', array(), '', true);
            wp_enqueue_script('mantrabrain-main-customizer-js', get_template_directory_uri() . '/mantrabrain-theme/assets/admin/js/customizer.js', array( 'customize-controls', 'mantrabrain-select2-js'), '', true);

        }

        public function admin_scripts($hook)
        {


            if (is_admin()) {
                wp_enqueue_style('wp-color-picker');
                wp_enqueue_script('wp-color-picker');
            }
            if ('widgets.php' === $hook) {

                wp_enqueue_script('underscore');

                wp_enqueue_style('mantrabrain-theme-admin-style', get_template_directory_uri() . '/mantrabrain-theme/assets/admin/css/mantrabrain-theme-admin.css', array());

                wp_enqueue_media();

                wp_enqueue_script('mantrabrain-theme-admin-script', get_template_directory_uri() . '/mantrabrain-theme/assets/admin/js/mantrabrain-theme-admin.js', array('jquery'));

            }
        }

    }
}