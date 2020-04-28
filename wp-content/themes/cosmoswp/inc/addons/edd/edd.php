<?php
/*Required Helper File*/
require COSMOSWP_PATH.'/inc/addons/edd/helper.php';

if (!class_exists('CosmosWP_Edd')) :

    class CosmosWP_Edd {

        /**
         * Main Instance
         *
         * Insures that only one instance of CosmosWP_Edd exists in memory at any one
         * time. Also prevents needing to define globals all over the place.
         *
         * @since    1.0.0
         * @access   public
         *
         * @return object
         */
        public static function instance() {

            // Store the instance locally to avoid private static replication
            static $instance = null;

            // Only run these methods if they haven't been ran previously
            if (null === $instance) {
                $instance = new CosmosWP_Edd;
            }

            // Always return the instance
            return $instance;
        }

        /**
         *  Run functionality with hooks
         *
         * @since    1.0.0
         * @access   public
         *
         * @return void
         */
        public function run() {
            if( cosmoswp_is_edd_active()){
                $this->load_file();

                add_filter('widgets_init', array($this, 'cosmoswp_edd_widget_init'));

                add_filter('body_class', array($this, 'edd_body_class'));

                /*remove common hooks*/
                add_action('init', array($this, 'remove_common_hooks'), 10);

                /*add theme sidebar*/
                add_action('cosmoswp_edd_primary_sidebar', array($this, 'primary_sidebar'), 10);
                add_action('cosmoswp_edd_secondary_sidebar', array($this, 'secondary_sidebar'), 10);
            }
        }

        /**
         *  Load required files
         *
         * @since    1.0.0
         * @access   public
         *
         * @return void
         */
        public function load_file(){
            /**
             * Require EDD file
             */
            require COSMOSWP_PATH.'/inc/addons/edd/archive/cwp-edd-archive.php';
            require COSMOSWP_PATH.'/inc/addons/edd/single/cwp-edd-single.php';
            require COSMOSWP_PATH.'/inc/addons/edd/advanced-styling/cwp-edd-advanced-styling.php';
            require COSMOSWP_PATH.'/inc/addons/edd/cart/cart.php';

        }

        /**
         * Remove Common Hooks.
         *
         * @since 1.0.0
         */
        public function remove_common_hooks() {
            remove_action('edd_sidebar', 'edd_get_sidebar', 10);
        }

        /**
         * Add 'edd-active' class to the body tag
         *
         * @return array $classes modified to include 'edd-active' class
         */
        public function cosmoswp_edd_widget_init() {
            $description = esc_html__('Displays widgets in Primary Sidebar','cosmoswp');
            register_sidebar(array(
                'name'          => esc_html__('Edd Primary Sidebar', 'cosmoswp'),
                'id'            => 'cosmoswp-edd-primary-sidebar',
                'description'   => $description,
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<div class="wa-title-action-wrapper clearfix"><h3 class="widget-title">',
                'after_title'   => '</h3></div>',
            ));
            $description = esc_html__('Displays widgets in Secondary Sidebar', 'cosmoswp');
            register_sidebar(array(
                'name'          => esc_html__('Edd Secondary Sidebar', 'cosmoswp'),
                'id'            => 'cosmoswp-edd-secondary-sidebar',
                'description'   => $description,
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<div class="wa-title-action-wrapper clearfix"><h3 class="widget-title">',
                'after_title'   => '</h3></div>',
            ));
        }

        /**
         * Add 'edd-active' class to the body tag
         *
         * @param  array $classes css classes applied to the body tag.
         * @return array $classes modified to include 'edd-active' class
         */
        public function edd_body_class($classes) {
            $classes[] = 'cwp-edd-active';
            if (cosmoswp_is_edd_page()) {
                $classes[] = 'cwp-edd-page';
            }

            return $classes;
        }

        /**
         * Primary Sidebar
         *
         * @since 1.0.0
         */
        function primary_sidebar() {

            $global_widget_title_align   = cosmoswp_get_theme_options('global-widget-title-align');
            $global_widget_content_align = cosmoswp_get_theme_options('global-widget-content-align');
            do_action('cosmoswp_action_before_sidebar');
            ?>
            <div class="cwp-sidebar" data-widget-title="<?php echo esc_attr($global_widget_title_align); ?>"
                 data-widget-content="<?php echo esc_attr($global_widget_content_align); ?>">
                <?php
                if (is_active_sidebar('cosmoswp-edd-primary-sidebar')) {
                    dynamic_sidebar('cosmoswp-edd-primary-sidebar');
                }
                ?>
            </div>
            <?php
            do_action('cosmoswp_action_after_sidebar');
        }

        /**
         * Secondary Sidebar
         *
         * @since 1.0.0
         */
        function secondary_sidebar() {
            $global_widget_title_align   = cosmoswp_get_theme_options('global-widget-title-align');
            $global_widget_content_align = cosmoswp_get_theme_options('global-widget-content-align');
            do_action('cosmoswp_action_before_sidebar');
            ?>
            <div class="cwp-sidebar" data-widget-title="<?php echo esc_attr($global_widget_title_align); ?>"
                 data-widget-content="<?php echo esc_attr($global_widget_content_align); ?>">
                <?php
                if (is_active_sidebar('cosmoswp-edd-secondary-sidebar')) {
                    dynamic_sidebar('cosmoswp-edd-secondary-sidebar');
                }
                ?>
            </div>
            <?php
            do_action('cosmoswp_action_after_sidebar');
        }
    }

endif;

/**
 * Create Instance for CosmosWP_Edd
 *
 * @since    1.0.0
 * @access   public
 *
 * @param
 * @return object
 */
if (!function_exists('cosmoswp_edd')) {

    function cosmoswp_edd() {

        return CosmosWP_Edd::instance();
    }

    cosmoswp_edd()->run();
}