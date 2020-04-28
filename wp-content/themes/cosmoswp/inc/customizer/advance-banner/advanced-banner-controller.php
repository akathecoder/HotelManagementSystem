<?php
/**
 * Header Builder and Customizer Options
 * @package CosmosWP
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('CosmosWP_Advanced_Banner_Controller')) :

    class CosmosWP_Advanced_Banner_Controller {

        /**
         * Main Instance
         *
         * Insures that only one instance of CosmosWP_Advanced_Banner_Controller exists in memory at any one
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
                $instance = new CosmosWP_Advanced_Banner_Controller;
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

            add_action('cosmoswp_default_theme_options', array($this, 'add_defaults'));
            add_action('customize_register', array($this, 'customize_register'));
            if(is_admin()){
                add_action('load-post.php', array($this, 'init_metabox'));
                add_action('load-post-new.php', array($this, 'init_metabox'));
            }
            add_filter('cosmoswp_banner-section-display', array($this, 'customize_banner_section_display'),900);

        }
        /**
         * Meta box initialization.
         */
        public function init_metabox() {
            add_action( 'add_meta_boxes', array( $this, 'add_metabox'  ) );
            add_action( 'save_post',      array( $this, 'save_metabox' ), 10, 2 );
        }

        /**
         * Adds the meta box.
         */
        public function add_metabox() {
            add_meta_box(
                'cosmoswp_banner_options_layout',
                __( 'Site Banner', 'cosmoswp' ),
                array( $this, 'render_metabox' ),
                'post',
                'side',
                'low'
            );
            add_meta_box(
                'cosmoswp_banner_options_layout',
                __( 'Site Banner', 'cosmoswp' ),
                array( $this, 'render_metabox' ),
                'page',
                'side',
                'low'
            );
        }

        /**
         * Renders the meta box.
         */
        public function render_metabox( $post ) {

            $cosmoswp_site_layout_value = get_post_meta($post->ID, 'cosmoswp_banner_options_layout', true);
            $cosmoswp_site_layout_options = cosmoswp_singular_post_page_banner_option();
            $cosmoswp_site_layout         = 'default';
            if( !cosmoswp_is_null_or_empty($cosmoswp_site_layout_value) ){
                $cosmoswp_site_layout = $cosmoswp_site_layout_value;
            }
            //true ensures you get just one value instead of an array
            wp_nonce_field( basename( __FILE__ ), 'cosmoswp_advanced_banner_meta_nonce' );
            ?>
            <div class="cosmowp-custom-meta components-base-control">
                <div class="components-base-control__field">
                    <label class="components-base-control__label"><?php echo esc_html__('Banner Options', 'cosmoswp'); ?></label>
                    <select name="cosmoswp_banner_options_layout" id="cosmoswp_banner_options_layout"
                            class="components-select-control__input">
                        <?php foreach ($cosmoswp_site_layout_options as $key => $value) { ?>
                            <option value="<?php echo esc_attr($key); ?>" <?php selected($key, $cosmoswp_site_layout); ?>><?php echo $value; ?></option>
                        <?php } // end foreach ?>
                    </select>
                </div>
                <?php do_action('cosmoswp_banner_meta_fields',$post );?>
            </div>
            <?php
        }


        /**
         * Handles saving the meta box.
         *
         * @param int     $post_id Post ID.
         * @param WP_Post $post    Post object.
         * @return null
         */
        public function save_metabox( $post_id, $post ) {

            /*
              * A Guide to Writing Secure Themes – Part 4: Securing Post Meta
              *https://make.wordpress.org/themes/2015/06/09/a-guide-to-writing-secure-themes-part-4-securing-post-meta/
              * */
            if (
                !isset( $_POST[ 'cosmoswp_advanced_banner_meta_nonce' ] ) ||
                !wp_verify_nonce( $_POST[ 'cosmoswp_advanced_banner_meta_nonce' ], basename( __FILE__ ) ) || /*Protecting against unwanted requests*/
                ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || /*Dealing with autosaves*/
                ! current_user_can( 'edit_post', $post_id )/*Verifying access rights*/
            ){
                return;
            }

            if ('page' == $_POST['post_type']) {
                if (!current_user_can( 'edit_page', $post_id ) )
                    return $post_id;
            }
            elseif (!current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }

            //Execute this saving function
            //Banner layout
            if( isset( $_POST['cosmoswp_banner_options_layout'] )){
                $old = get_post_meta( $post_id, 'cosmoswp_banner_options_layout', true );
                $new = esc_attr( $_POST['cosmoswp_banner_options_layout'] );
                if ($new && $new != $old) {
                    update_post_meta( $post_id, 'cosmoswp_banner_options_layout', $new );
                }
                elseif ('' == $new && $old) {
                    delete_post_meta( $post_id,'cosmoswp_banner_options_layout', $old );
                }
            }

            do_action('cosmoswp_banner_save_meta_fields',$post_id, $post, $_POST);
        }


        /**
         * Callback functions for cosmoswp_default_theme_options,
         * Add Blog defaults values
         *
         * @since    1.0.0
         * @access   public
         *
         * @param array $default_options
         * @return array
         */
        public function add_defaults( $default_options ) {
            $this_defaults = array(
                'cosmoswp-banner-options-page'          => 'default',
                'cosmoswp-banner-options-post'          => 'default',

            );
            return array_merge( $default_options, $this_defaults );
        }

        /**
         * Callback functions for customize_register,
         * Add control for Adv. Banner
         *
         * @since    1.0.0
         * @access   public
         *
         * @param WP_Customize_Manager $wp_customize
         * @return void
         */
        public function customize_register( $wp_customize ) {

            $adv_banner_defaults = $this->add_defaults(array());

            /*Page Banner setting Section*/
            $wp_customize->add_section('cosmoswp-banner-setting-page', array(
                'title'    => esc_html__('Banner Setting', 'cosmoswp'),
                'priority' => 190,
                'panel'    => cosmoswp_page_builder()->panel,
            ));

            /*Post Banner Setting Section */
            $wp_customize->add_section('cosmoswp-banner-setting-post', array(
                'title'    => esc_html__('Banner Setting', 'cosmoswp'),
                'priority' => 190,
                'panel'    => cosmoswp_post_builder()->panel,
            ));

            /*Page Banner Options*/
            $wp_customize->add_setting('cosmoswp-banner-options-page', array(
                'default'           => $adv_banner_defaults['cosmoswp-banner-options-page'],
                'sanitize_callback' => 'cosmoswp_sanitize_select'
            ));
            $choices = cosmoswp_singular_post_page_banner_option();
            $wp_customize->add_control('cosmoswp-banner-options-page', array(
                'label'           => esc_html__('Banner Options', 'cosmoswp'),
                'choices'         => $choices,
                'section'         => 'cosmoswp-banner-setting-page',
                'settings'        => 'cosmoswp-banner-options-page',
                'type'            => 'select'
            ));


            /*Post Banner Options*/
            $wp_customize->add_setting('cosmoswp-banner-options-post', array(
                'default'           => $adv_banner_defaults['cosmoswp-banner-options-post'],
                'sanitize_callback' => 'cosmoswp_sanitize_select'
            ));
            $choices = cosmoswp_singular_post_page_banner_option();
            $wp_customize->add_control('cosmoswp-banner-options-post', array(
                'label'           => esc_html__('Banner Options', 'cosmoswp'),
                'choices'         => $choices,
                'section'         => 'cosmoswp-banner-setting-post',
                'settings'        => 'cosmoswp-banner-options-post',
                'type'            => 'select'
            ));
        }

        /**
         *  Call back function for cosmoswp_general_setting_layout_body_class
         *  Change Site Layout Manually(post/page)
         *
         * @since    1.0.0
         * @access   public
         *
         * @param $banner_options string
         * @return string
         */
        public function customize_banner_section_display( $banner_options ){

            if( is_singular() ){
                if(is_singular('page' )){
                    $banner_options_page = cosmoswp_get_theme_options('cosmoswp-banner-options-page');
                    if( 'default' != $banner_options_page ){
                        $banner_options = $banner_options_page;
                    }
                }
                else {
                    $banner_options_post    = cosmoswp_get_theme_options('cosmoswp-banner-options-post');

                    if( 'default' != $banner_options_post ){
                        $banner_options = $banner_options_post;
                    }
                }
                $cosmoswp_site_layout_value = get_post_meta(get_the_ID(), 'cosmoswp_banner_options_layout', true);
                if( $cosmoswp_site_layout_value && 'default' != $cosmoswp_site_layout_value  ){
                    $banner_options = $cosmoswp_site_layout_value;
                }
            }
            return apply_filters('cosmoswp_banner_section_display', $banner_options );
        }
    }

endif;

/**
 * Create Instance for CosmosWP_Advanced_Banner_Controller
 *
 * @since    1.0.0
 * @access   public
 *
 * @param
 * @return object
 */
if (!function_exists('cosmoswp_advanced_banner_controller')) {

    function cosmoswp_advanced_banner_controller() {

        return CosmosWP_Advanced_Banner_Controller::instance();
    }

    cosmoswp_advanced_banner_controller()->run();
}