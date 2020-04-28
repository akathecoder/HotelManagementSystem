<?php
/**
 * Elementor Compatibility File.
 *
 * @package Astra
 */

namespace Elementor;

// If plugin - 'Elementor' not exist then return.
if (!class_exists('\Elementor\Plugin')) {
    return;
}

/**
 * Astra Elementor Compatibility
 */
if (!class_exists('Yatri_Elementor')) :

    /**
     * Astra Elementor Compatibility
     *
     * @since 1.0.0
     */
    class Yatri_Elementor
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
                self::$instance = new self;
            }
            return self::$instance;
        }

        /**
         * Constructor
         */
        public function __construct()
        {
            add_action('wp', array($this, 'elementor_default_setting'), 20);
            add_action('elementor/preview/init', array($this, 'elementor_default_setting'));
            add_action('elementor/preview/enqueue_styles', array($this, 'elementor_overlay_zindex'));
        }

        /**
         * Elementor Content layout set as Page Builder
         *
         * @return void
         * @since  1.0.2
         */
        function elementor_default_setting()
        {

            if (false == yatri_enable_page_builder_compatibility() || 'post' == get_post_type()) {
                return;
            }


            // don't modify post meta settings if we are not on Elementor's edit page.
            if (!$this->is_elementor_editor()) {
                return;
            }

            global $post;

            $id = yatri_get_post_id();

            $page_builder_flag = '';//get_post_meta($id, 'yatri_pb_usage_flag', true);

            if (isset($post) && empty($page_builder_flag) && (is_admin() || is_singular())) {

                if (empty($post->post_content) && $this->is_elementor_activated($id)) {

                    update_post_meta($id, 'yatri_pb_usage_flag', 'used');
                    update_post_meta($id, 'yatri_sidebar_location', 'yatri_full_width_100');
                    update_post_meta($id, 'yatri_page_breadcrumb_option', 'disable');
                    update_post_meta($id, 'yatri_page_title_enable', 'no');
                    update_post_meta($id, 'yatri_page_featured_image_enable', 'no');


                    add_filter('yatri_page_title_enable', '__return_false');
                    add_filter('yatri_page_featured_image_enable', '__return_false');
                }
            }
        }


        function elementor_overlay_zindex()
        {

            // return if we are not on Elementor's edit page.
            if (!$this->is_elementor_editor()) {
                return;
            }

            ?>
            <style type="text/css" id="yatri-elementor-overlay-css">
                .elementor-editor-active .elementor-element > .elementor-element-overlay {
                    z-index: 9999;
                }
            </style>

            <?php
        }


        function is_elementor_activated($id)
        {
            if (version_compare(ELEMENTOR_VERSION, '1.5.0', '<')) {
                return ('builder' === Plugin::$instance->db->get_edit_mode($id));
            } else {
                return Plugin::$instance->db->is_built_with_elementor($id);
            }
        }

        /**
         * Check if Elementor Editor is open.
         *
         * @since  1.2.7
         *
         * @return boolean True IF Elementor Editor is loaded, False If Elementor Editor is not loaded.
         */
        private function is_elementor_editor()
        {
            if ((isset($_REQUEST['action']) && 'elementor' == $_REQUEST['action']) ||
                isset($_REQUEST['elementor-preview'])
            ) {
                return true;
            }

            return false;
        }

    }

endif;

/**
 * Kicking this off by calling 'get_instance()' method
 */
Yatri_Elementor::get_instance();
