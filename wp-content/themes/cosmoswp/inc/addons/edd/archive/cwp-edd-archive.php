<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Edd Archive Customizer Options
 * @package CosmosWP
 */

if (!class_exists('CosmosWP_Edd_Archive')) :

    class CosmosWP_Edd_Archive {

        /**
         * Panel ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $panel = 'cosmoswp-edd-archive';

        /**
         * Section ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $section = 'cosmoswp-edd-archive';

        /**
         * Main Instance
         *
         * Insures that only one instance of CosmosWP_Edd_Archive exists in memory at any one
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
                $instance = new CosmosWP_Edd_Archive;
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

            add_filter('cosmoswp_default_theme_options', array($this, 'defaults'));
            add_action('customize_register', array($this, 'customize_register'), 100);

            add_action('cosmoswp_action_edd_archive', array($this, 'display_edd_archive'), 100);
        }

        /**
         * Callback functions for cosmoswp_default_theme_options,
         * Add Header Builder defaults values
         *
         * @since    1.0.0
         * @access   public
         *
         * @param array $default_options
         * @return array
         */
        public function defaults($default_options = array()) {
            $defaults = array(

                /*Sidebar*/
                'cwp-edd-archive-sidebar'    => 'ct-ps',

                'edd-archive-main-title'          => esc_html__('Edd', 'cosmoswp'),
                'edd-archive-default-view'        => 'cwp-grid',
                'edd-archive-show-sort-bar'       => 1,
                'edd-archive-show-grid-list'      => 1,
                'edd-archive-excerpt-length'      => 9,
                'edd-archive-grid-elements-align' => 'cwp-text-center',
                'edd-archive-list-elements-align' => 'cwp-text-left',
                'edd-archive-grid-elements'       => array('image', 'cats', 'title', 'price', 'cart'),
                'edd-archive-list-elements'       => array('cats', 'title', 'price', 'excerpt', 'cart'),
                'edd-archive-list-media-width'    => json_encode(array(
                    'desktop' => '40',
                    'tablet'  => '40',
                    'mobile'  => '100',
                )),
                'edd-archive-content-length'      => '',
                'edd-navigation-options'          => 'numeric'

            );
            return array_merge($default_options, $defaults);
        }


        /**
         * Callback functions for customize_register,
         * Add Panel Section control
         *
         * @since    1.0.0
         * @access   public
         *
         * @param object $wp_customize
         * @return void
         */
        public function customize_register($wp_customize) {

            $defaults = $this->defaults();
            /**
             * Panel
             */
            $wp_customize->add_panel($this->panel, array(
                'title'    => esc_html__('Edd Archive', 'cosmoswp'),
                'priority' => 150,
            ));

            /**
             * Section
             */
            $wp_customize->add_section( $this->section, array(
                'title'    => esc_html__(' Main Content', 'cosmoswp'),
                'priority' => 230,
                'panel'    => $this->panel,
            ));


            /* Edd Elements */
            require COSMOSWP_PATH.'/inc/addons/edd/archive/main-content.php';

        }

        /**
         * Callback Function for cosmoswp_action_woocommerce_archive
         * Display WooCommerce Archive Page/Shop Content
         *
         * @since    1.0.0
         * @access   public
         *
         * @return void
         */
        public function display_edd_archive() {
            $sidebar = cosmoswp_get_theme_options('cwp-edd-archive-sidebar');
            ?>
            <!-- Start of .blog-content-->
            <div class="cwp-page cwp-content-wrapper <?php echo esc_attr('cwp-'.$sidebar) ?> <?php cosmoswp_blog_main_wrap_classes(); ?>" id="cwp-blog-main-content-wrapper">
                <?php
                echo '<div class="grid-container"><div class="grid-row">';
                cosmoswp_sidebar_template($sidebar,'cwp-edd-archive');
                echo '</div>';/*.grid-row*/
                echo '</div>';/*.grid-container*/
                ?>
            </div>
            <!-- End of .blog-content -->
            <?php
        }
    }
endif;

/**
 * Create Instance for CosmosWP_Edd_Archive
 *
 * @since    1.0.0
 * @access   public
 *
 * @param
 * @return object
 */
if (!function_exists('cosmoswp_edd_archive')) {

    function cosmoswp_edd_archive() {

        return CosmosWP_Edd_Archive::instance();
    }

    cosmoswp_edd_archive()->run();
}