<?php
/*Required Helper File*/
require COSMOSWP_PATH.'/inc/addons/woocommerce/helper.php';

if (!class_exists('CosmosWP_WooCommerce')) :

    class CosmosWP_WooCommerce {

        /**
         * Main Instance
         *
         * Insures that only one instance of CosmosWP_WooCommerce exists in memory at any one
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
                $instance = new CosmosWP_WooCommerce;
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
            if(cosmoswp_is_woocommerce_active()){
                $this->load_file();

                /*Add dedicated widget for woocommerce*/
                add_filter('widgets_init', array($this, 'cosmoswp_woo_widget_init'));

                /*Add dedicated class for woocommerce*/
                add_filter('body_class', array($this, 'woocommerce_body_class'));

                /*show/hide "Description" text from single product */
                add_filter('woocommerce_product_description_heading', array($this, 'product_description_setting'), 10);
                /*show hide "Additional information" text from single product*/
                add_filter('woocommerce_product_additional_information_heading', array($this, 'product_additional_information_heading_setting'), 10);

                /*remove common hooks*/
                add_action('init', array($this, 'remove_common_hooks'), 10);

                add_action('woocommerce_before_main_content', array($this, 'woocommerce_output_content_wrapper'), 10);
                add_action('woocommerce_after_main_content', array($this, 'woocommerce_output_content_wrapper_end'), 10);

                /*remove archive elements*/
                add_action('init', array($this, 'remove_archive_elements'), 10);

                /*add woocommerce archive elements*/
                $this->add_archive_elements();

                /*remove single elements*/
                add_action('init', array($this, 'remove_single_elements'), 10);

                /*add woocommerce single elements*/
                $this->add_single_elements();

                /*add woocommerce_shop_loop_subcategory_title*/
                add_action('woocommerce_shop_loop_subcategory_title', array($this, 'woocommerce_template_loop_category_title'), 10);

                /*add woocommerce theme sidebar*/
                add_action('cosmoswp_woo_primary_sidebar', array($this, 'primary_sidebar'), 10);
                add_action('cosmoswp_woo_secondary_sidebar', array($this, 'secondary_sidebar'), 10);
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

            require COSMOSWP_PATH.'/inc/addons/woocommerce/archive/cwp-woocommerce-archive.php';
            require COSMOSWP_PATH.'/inc/addons/woocommerce/single/cwp-woocommerce-single.php';
            require COSMOSWP_PATH.'/inc/addons/woocommerce/advanced-styling/cwp-woocommerce-advanced-styling.php';
            require COSMOSWP_PATH.'/inc/addons/woocommerce/cart/cart.php';
        }

        /**
         * Add 'woocommerce-active' class to the body tag
         *
         * @param  array $classes css classes applied to the body tag.
         * @return void
         */
        public function cosmoswp_woo_widget_init( $classes ) {
            $description = esc_html__('Displays widgets in Primary Sidebar','cosmoswp');
            register_sidebar(array(
                'name'          => esc_html__('Woo Primary Sidebar', 'cosmoswp'),
                'id'            => 'cosmoswp-woo-primary-sidebar',
                'description'   => $description,
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<div class="wa-title-action-wrapper clearfix"><h3 class="widget-title">',
                'after_title'   => '</h3></div>',
            ));
            $description = esc_html__('Displays widgets in Secondary Sidebar','cosmoswp');
            register_sidebar(array(
                'name'          => esc_html__('Woo Secondary Sidebar', 'cosmoswp'),
                'id'            => 'cosmoswp-woo-secondary-sidebar',
                'description'   => $description,
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<div class="wa-title-action-wrapper clearfix"><h3 class="widget-title">',
                'after_title'   => '</h3></div>',
            ));
        }

        /**
         * Add 'woocommerce-active' class to the body tag
         *
         * @param  array $classes css classes applied to the body tag.
         * @return array $classes modified to include 'woocommerce-active' class
         */
        public function woocommerce_body_class($classes) {
            if (cosmoswp_is_woocommerce_active()) {
                $classes[] = 'cwp-woocommerce-active';
                $wc_tabs_design = cosmoswp_get_theme_options('cwc-single-tab-design');
                if ('default' != $wc_tabs_design) {
                    if (is_product()) {
                        $classes[] = esc_attr('wc-single-vertical-tab');
                    }
                }
                $show_tab_content_heading = cosmoswp_get_theme_options('cwc-single-tab-show-content-heading');
                if (!$show_tab_content_heading) {
                    if (is_product()) {
                        $classes[] = esc_attr('wc-tab-hide-review-heading');
                    }
                }
            }

            return $classes;
        }

        /**
         * Hide product tab content heading
         *
         * @param  array $heading heading of description.
         * @return array $heading modified
         */
        public function product_description_setting($heading) {
            $show_tab_content_heading = cosmoswp_get_theme_options('cwc-single-tab-show-content-heading');
            if ($show_tab_content_heading) {
                return $heading;
            }
            else {
                return false;
            }
        }

        /**
         * Hide tab additional heading
         *
         * @param  array $heading heading of description.
         * @return array $heading modified
         */
        public function product_additional_information_heading_setting($heading) {
            $show_tab_content_heading = cosmoswp_get_theme_options('cwc-single-tab-show-content-heading');
            if ($show_tab_content_heading) {
                return $heading;
            }
            else {
                return false;
            }
        }

        /**
         * Woocommerce wrapper start.
         *
         * @since 1.0.0
         */
        function before_main_content() {
            do_action('cosmoswp_action_before_page');
            do_action('cosmoswp_action_breadcrumb');
        }

        /**
         * Woocommerce wrapper end.
         *
         * @since 1.0.0
         */
        function after_main_content() {
            do_action('cosmoswp_action_after_page');
        }

        /**
         * Remove Common Hooks.
         *
         * @since 1.0.0
         */
        public function remove_common_hooks() {
            remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
            remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
            remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
            remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

            /*Remove category title hook to add own html and title*/
            remove_action('woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10);
        }

        /**
         * Remove elements.
         *
         * @since 1.0.0
         */
        public function remove_archive_elements() {

            remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
            remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

            remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
            remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

            remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
            remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
            remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
            remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
            remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
            remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
        }

        public function remove_single_elements() {

            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
        }

        /**
         * Add elements.
         *
         * @since 1.0.0
         */
        public function add_archive_elements() {
            add_action('woocommerce_shop_loop_item_title', array($this, 'woocommerce_template_loop_product_title'), 10);

        }

        /**
         * Add elements.
         *
         * @since 1.0.0
         */
        public function add_single_elements() {
            add_filter('woocommerce_upsell_display_args', array($this, 'woocommerce_upsell_display_args'), 10);
            add_filter('woocommerce_output_related_products_args', array($this, 'woocommerce_output_related_products_args'), 10);

        }

        function woocommerce_template_loop_product_title() {
            global $product;

            ?>
            <div class="entry-header cwp-elements">
                <?php
                $link = apply_filters('woocommerce_loop_product_link', get_the_permalink(), $product);
                the_title('<h2 class="entry-title"><a href="' . esc_url($link) . '" rel="bookmark">', '</a></h2>');
                ?>
            </div><!-- .entry-header -->
            <?php
        }

        /**
         * Output the related products.
         */
        function woocommerce_upsell_display_args($args) {

            $args['columns']        = cosmoswp_get_theme_options('cwc-single-upsell-col');
            $args['posts_per_page'] = cosmoswp_get_theme_options('cwc-single-upsell-number');
            return $args;

        }

        /**
         * Output the related products.
         */
        function woocommerce_output_related_products_args($args) {

            $args['columns']        = cosmoswp_get_theme_options('cwc-single-related-col');
            $args['posts_per_page'] = cosmoswp_get_theme_options('cwc-single-related-number');
            return $args;

        }


        /**
         * Woocommerce wrapper start.
         *
         * @since 1.0.0
         */
        function woocommerce_output_content_wrapper() {
            echo '<div class="cosmoswp-woocommerce cwp-content-wrapper">';
        }

        /**
         * Woocommerce wrapper end.
         *
         * @since 1.0.0
         */
        function woocommerce_output_content_wrapper_end() {
            echo '</div><!-- .cosmoswp-woocommerce -->';
        }

        /**
         * Show the subcategory title in the product loop.
         * Original function wp-content\plugins\woocommerce\includes\wc-template-functions.php line 1128
         * @param object $category Category object.
         */
        function woocommerce_template_loop_category_title( $category ) {
            ?>
            <h2 class="woocommerce-loop-category__title entry-title">
                <?php
                echo esc_html( $category->name );

                if ( $category->count > 0 ) {
                    echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">' . esc_html( $category->count ) . esc_html__( 'Products','cosmoswp' ).'</mark>', $category ); // WPCS: XSS ok.
                }
                ?>
            </h2>
            <?php
        }

        /**
         * Primary Sidebar
         *
         * @since 1.0.0
         */
        function primary_sidebar() {

            $global_widget_title_align   = cosmoswp_get_theme_options('global-widget-title-align');
            $global_widget_content_align = cosmoswp_get_theme_options('global-widget-content-align');
            $cwc_archive_psp_sm     = cosmoswp_get_theme_options('cwc-archive-psp-sm');
            do_action('cosmoswp_action_before_sidebar');
            ?>
            <div class="cwp-sidebar<?php echo esc_attr($cwc_archive_psp_sm?' cwc-archive-psp-sm-wrap':'')?>" data-widget-title="<?php echo esc_attr($global_widget_title_align); ?>"
                 data-widget-content="<?php echo esc_attr($global_widget_content_align); ?>">
                <?php
                if( $cwc_archive_psp_sm){
                    echo '<a class="cwc-archive-psp-sm cwc-archive-psp-sm-toggle" href="#">'.wp_kses_post(cosmoswp_get_theme_options('cwc-archive-psp-sm-close-text')).'</a>';
                }
                if (is_active_sidebar('cosmoswp-woo-primary-sidebar')) {
                    dynamic_sidebar('cosmoswp-woo-primary-sidebar');
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
                if (is_active_sidebar('cosmoswp-woo-secondary-sidebar')) {
                    dynamic_sidebar('cosmoswp-woo-secondary-sidebar');
                }
                ?>
            </div>
            <?php
            do_action('cosmoswp_action_after_sidebar');
        }
    }
endif;

/**
 * Create Instance for CosmosWP_WooCommerce
 *
 * @since    1.0.0
 * @access   public
 *
 * @param
 * @return object
 */
if (!function_exists('cosmoswp_woocommerce')) {

    function cosmoswp_woocommerce() {

        return CosmosWP_WooCommerce::instance();
    }

    cosmoswp_woocommerce()->run();
}