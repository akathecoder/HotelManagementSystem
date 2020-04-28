<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * WooCommerce Archive Customizer Options
 * @package CosmosWP
 */

if (!class_exists('CosmosWP_WooCommerce_Archive')) :

    class CosmosWP_WooCommerce_Archive {

        /**
         * Panel ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $panel = 'cosmoswp-woocommerce-archive';

        /**
         * Section ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $section = 'cosmoswp-woocommerce-archive';

        /**
         * Main Instance
         *
         * Insures that only one instance of CosmosWP_WooCommerce_Archive exists in memory at any one
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
                $instance = new CosmosWP_WooCommerce_Archive;
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

            add_action('cosmoswp_action_woocommerce_archive', array($this, 'display_woo_archive'), 110);

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
                'cwp-woo-archive-sidebar'    => 'ct-ps',

                'cwc-archive-show-grid-list'     => 1,

                'cwc-archive-default-view'       => 'grid',

                'cwc-archive-psp-sm'            => 1,
                'cwc-archive-psp-sm-open-text'  => 'Filter »',
                'cwc-archive-psp-sm-close-text' => 'Close X',

                'cwc-archive-show-result-number' => 1,
                'cwc-archive-show-sort-bar'      => 1,
                'cwc-archive-excerpt-length'     => 9,
                'cwc-archive-elements-align'     => 'cwp-text-center',
                'cwc-archive-elements'           => array('image', 'cat', 'title', 'price', 'rating', 'cart'),
                'cwc-archive-list-media-width'   => json_encode(array(
                    'desktop' => '40',
                    'tablet'  => '40',
                    'mobile'  => '40',
                )),
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
         * @param WP_Customize_Manager $wp_customize
         * @return void
         */
        public function customize_register($wp_customize) {

            $defaults = $this->defaults();

            /*Woo Archive Elements Starts from here*/
            $wp_customize->add_section(
                new CosmosWP_WP_Customize_Section_H3( $wp_customize, 'cosmoswp_woo_panel_elements_seperator', array(
                        'title'    => esc_html__('WooCommerce Option', 'cosmoswp'),
                        'priority' => 110,
                    )
                )
            );

            /**
             * Panel
             */
            $wp_customize->add_panel($this->panel, array(
                'title'    => esc_html__('WooCommerce Archive', 'cosmoswp'),
                'priority' => 115,
            ));

            /**
             * Section
             */
            $wp_customize->add_section( $this->section, array(
                'title'    => esc_html__(' Main Content', 'cosmoswp'),
                'priority' => 230,
                'panel'    => $this->panel,
            ));

            /* Woo Elements */
            require COSMOSWP_PATH.'/inc/addons/woocommerce/archive/main-content.php';

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
        public function display_woo_archive() {
            $sidebar = cosmoswp_get_theme_options('cwp-woo-archive-sidebar');
            ?>
            <!-- Start of .blog-content-->
            <div class="cwp-page cwp-content-wrapper <?php echo esc_attr('cwp-'.$sidebar) ?> <?php cosmoswp_blog_main_wrap_classes(); ?>" id="cwp-blog-main-content-wrapper">
                <?php
                echo '<div class="grid-container"><div class="grid-row">';
                cosmoswp_sidebar_template($sidebar,'cwp-woo-archive');
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
 * Create Instance for CosmosWP_WooCommerce_Archive
 *
 * @since    1.0.0
 * @access   public
 *
 * @param
 * @return object
 */
if (!function_exists('cosmoswp_woocommerce_archive')) {

    function cosmoswp_woocommerce_archive() {

        return CosmosWP_WooCommerce_Archive::instance();
    }

    cosmoswp_woocommerce_archive()->run();
}