<?php

if (!class_exists('Yatra')) {
    return;
}

/**
 * Yatri Yatra Compatibility
 */
if (!class_exists('Yatri_Yatra')) :

    /**
     * Yatri Yatra Compatibility
     *
     * @since 1.0.0
     */
    class Yatri_Yatra
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
            remove_action('yatra_before_page_content', 'yatra_before_page_content_callback');
            remove_action('yatra_after_page_content', 'yatra_after_page_content_callback');

            add_action('yatra_before_page_content', array($this, 'output_content_wrapper'));
            add_action('yatra_after_page_content', array($this, 'output_content_wrapper_end'));


        }

        public function output_content_wrapper()
        {
            ?>
            <section class="wrapper block-grid site-content yatri_list_layout" id="main-content">
            <?php
            $main_wrap_class = 'yat-col-12 yat-col-md-12';
        if (!is_single()) {
            $class = 'yatra-page-wrapper ' . get_option('yatra_archive_template', 'template-default');
            $main_wrap_class = 'yat-col-12 yat-col-md-12';
            ?>
            <div id="yatra-page-wrapper" class="<?php echo esc_attr($class); ?>">
            <?php
        }
            ?>

            <div class="yat-container">
            <div class="yat-row">
        <div class="yatri-main-wrap <?php echo esc_attr($main_wrap_class); ?>" id="main-wrap">


        <div <?php yatri_main_wrap_inner_class(); ?>>
            <?php
        }

        /**
         * Close wrappers.
         */
        public function output_content_wrapper_end()
        {

            echo '</div></div>';

            if (is_single()) {
               // get_sidebar();
            }

            echo '</div></div>';
            if (!is_single()) {
                echo '</div>';
            }

            echo '</section>';
        }


    }

endif;

if (apply_filters('yatri_enable_yatra_integration', true)) {
    Yatri_Yatra::get_instance();
}
