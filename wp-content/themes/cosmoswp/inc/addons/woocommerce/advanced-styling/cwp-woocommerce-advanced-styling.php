<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Customizer Options
 * @package CosmosWP
 */

if (!class_exists('CosmosWP_WooCommerce_Advanced_Styling')) :

    class CosmosWP_WooCommerce_Advanced_Styling {

        /**
         * Main Instance
         *
         * Insures that only one instance of CosmosWP_WooCommerce_Advanced_Styling exists in memory at any one
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
                $instance = new CosmosWP_WooCommerce_Advanced_Styling;
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
            add_filter('cosmoswp_dynamic_css', array($this, 'dynamic_css'), 100);


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

                'cwc-general-color-options'          => json_encode(array(
                    'on-sale-bg'         => '#4cdf98',
                    'on-sale-color'      => '#fff',
                    'out-of-stock-bg'    => '#444',
                    'out-of-stock-color' => '#fff',
                    'rating-color'       => '#f37224',
                )),
                'cwc-product-toolbar'                => json_encode(array(
                    'background-color'      => '#f5f5f5',
                    'grid-list-color'       => '#999',
                    'grid-list-hover-color' => '#275cf6',
                )),
                'cwc-product-box'                    => json_encode(array(
                    'categories-color'       => '#275cf6',
                    'categories-hover-color' => '#1949d4',
                    'title-color'            => '#202020',
                    'title-hover-color'      => '#275cf6',
                    'deleted-price-color'    => '#aaa',
                    'price-color'            => '#275cf6',
                    'content-color'          => '#333',
                )),
                'cwc-product-button-styling'                  => json_encode(array(
                    'normal-text-color'       => '#fff',
                    'normal-bg-color'         => '#275cf6',
                    'normal-border-style'     => 'solid',
                    'normal-border-color'     => '#275cf6',
                    'normal-border-width'     => array(
                        'desktop' => array(
                            'top'         => '1',
                            'right'       => '1',
                            'bottom'      => '1',
                            'left'        => '1',
                            'cssbox_link' => true
                        )
                    ),
                    'normal-border-radius'    => array(
                        'desktop' => array(
                            'top'         => '3',
                            'right'       => '3',
                            'bottom'      => '3',
                            'left'        => '3',
                            'cssbox_link' => true
                        )
                    ),
                    'normal-box-shadow-color' => '',
                    'normal-box-shadow-css'   => array(
                        'desktop' => array(
                            'x'           => '',
                            'Y'           => '',
                            'BLUR'        => '',
                            'SPREAD'      => '',
                            'cssbox_link' => true
                        )
                    ),
                    'hover-text-color'        => '#fff',
                    'hover-bg-color'          => '#1949d4',
                    'hover-border-style'      => 'solid',
                    'hover-border-color'      => '#1949d4',
                    'hover-border-width'      => array(
                        'desktop' => array(
                            'top'         => '1',
                            'right'       => '1',
                            'bottom'      => '1',
                            'left'        => '1',
                            'cssbox_link' => true
                        )
                    ),
                    'hover-border-radius'     => array(
                        'desktop' => array(
                            'top'         => '3',
                            'right'       => '3',
                            'bottom'      => '3',
                            'left'        => '3',
                            'cssbox_link' => true
                        )
                    ),
                    'hover-box-shadow-color'  => '',
                    'hover-box-shadow-css'    => array(
                        'desktop' => array(
                            'x'           => '',
                            'Y'           => '',
                            'BLUR'        => '',
                            'SPREAD'      => '',
                            'cssbox_link' => true
                        )
                    ),
                )),
                'cwc-product-navigation-styling'              => json_encode(array(
                    'border-style'     => 'none',
                    'border-color'     => '',
                    'box-shadow-color' => '',
                    'border-width'     => array(
                        'desktop' => array(
                            'top'         => '',
                            'right'       => '',
                            'bottom'      => '',
                            'left'        => '',
                            'cssbox_link' => true,
                        )
                    ),
                    'box-shadow-css'   => array(
                        'desktop' => array(
                            'x'           => '',
                            'Y'           => '',
                            'BLUR'        => '',
                            'SPREAD'      => '',
                            'cssbox_link' => true,
                        )
                    ),
                    'border-radius'    => array(
                        'desktop' => array(
                            'top'         => '3',
                            'right'       => '3',
                            'bottom'      => '3',
                            'left'        => '3',
                            'cssbox_link' => true,
                        )
                    ),
                )),
                'cwc-product-pagination-color-options'        => json_encode(array(
                    'background-color'       => '#f5f5f5',
                    'background-hover-color' => '#275cf6',
                    'text-color'             => '#333',
                    'text-hover-color'       => '#fff',
                )),
                'cwc-single-product-tab-bg-color-options'     => json_encode(array(
                    'background-color'       => '#f5f5f5',
                    'background-hover-color' => '#fff',
                )),
                'cwc-single-product-tab-text-color-options'   => json_encode(array(
                    'tab-list-color'       => '#999',
                    'tab-list-hover-color' => '#333',
                )),
                'cwc-single-product-tab-border-color-options' => json_encode(array(
                    'tab-border-color' => '#ddd',
                )),
                'cwc-cart-table-bg-color'                     => json_encode(array(
                    'background-color'          => '#fff',
                    'background-stripped-color' => '#fff',
                )),
                'cwc-cart-table-border-color'                 => json_encode(array(
                    'border-color' => '#dddddd',
                )),
                'cwc-cart-table-header-color-options'         => json_encode(array(
                    'background-color' => '#fff',
                    'text-color'       => '#333',
                )),
                'cwc-cart-remove-button-color-options'        => json_encode(array(
                    'background-color'       => '#f5f5f5',
                    'background-hover-color' => '#fb0909',
                    'icon-color'             => '#999',
                    'icon-hover-color'       => '#fff',
                )),
                /* checkout button */
                'cwc-checkout-button-styling'                 => json_encode(array(
                    'normal-text-color'       => '#fff',
                    'normal-bg-color'         => '#275cf6',
                    'normal-border-style'     => 'solid',
                    'normal-border-color'     => '#275cf6',
                    'normal-border-width'     => array(
                        'desktop' => array(
                            'top'         => '1',
                            'right'       => '1',
                            'bottom'      => '1',
                            'left'        => '1',
                            'cssbox_link' => true
                        )
                    ),
                    'normal-border-radius'    => array(
                        'desktop' => array(
                            'top'         => '3',
                            'right'       => '3',
                            'bottom'      => '3',
                            'left'        => '3',
                            'cssbox_link' => true
                        )
                    ),
                    'normal-box-shadow-color' => '',
                    'normal-box-shadow-css'   => array(
                        'desktop' => array(
                            'x'           => '',
                            'Y'           => '',
                            'BLUR'        => '',
                            'SPREAD'      => '',
                            'cssbox_link' => true
                        )
                    ),
                    'hover-text-color'        => '#fff',
                    'hover-bg-color'          => '#275cf6',
                    'hover-border-style'      => 'solid',
                    'hover-border-color'      => '#275cf6',
                    'hover-border-width'      => array(
                        'desktop' => array(
                            'top'         => '1',
                            'right'       => '1',
                            'bottom'      => '1',
                            'left'        => '1',
                            'cssbox_link' => true
                        )
                    ),
                    'hover-border-radius'     => array(
                        'desktop' => array(
                            'top'         => '3',
                            'right'       => '3',
                            'bottom'      => '3',
                            'left'        => '3',
                            'cssbox_link' => true
                        )
                    ),
                    'hover-box-shadow-color'  => '#275cf6',
                    'hover-box-shadow-css'    => array(
                        'desktop' => array(
                            'x'           => '',
                            'Y'           => '',
                            'BLUR'        => '',
                            'SPREAD'      => '',
                            'cssbox_link' => true
                        )
                    ),
                )),
                /* error notice */
                'cwc-notice-error-color-options'              => json_encode(array(
                    'background-color' => '#f8d7da',
                    'text-color'       => '#721c24',
                    'icon-color'       => '#721c24',
                )),
                'cwc-notice-error-border-box'                 => json_encode(array(
                    'border-style'     => 'solid',
                    'border-color'     => '#f5c6cb',
                    'box-shadow-color' => '',
                    'border-width'     => array(
                        'desktop' => array(
                            'top'         => '2',
                            'right'       => '0',
                            'bottom'      => '0',
                            'left'        => '0',
                            'cssbox_link' => true,
                        )
                    ),
                    'box-shadow-css'   => array(
                        'desktop' => array(
                            'x'           => '',
                            'Y'           => '',
                            'BLUR'        => '',
                            'SPREAD'      => '',
                            'cssbox_link' => true,
                        )
                    ),
                    'border-radius'    => array(
                        'desktop' => array(
                            'top'         => '',
                            'right'       => '',
                            'bottom'      => '',
                            'left'        => '',
                            'cssbox_link' => true,
                        )
                    ),
                )),

                /* info notice */
                'cwc-notice-info-color-options'               => json_encode(array(
                    'background-color' => '#d1ecf1',
                    'text-color'       => '#0c5460',
                    'icon-color'       => '#0c5460',
                )),
                'cwc-notice-info-border-box'                  => json_encode(array(
                    'border-style'     => 'solid',
                    'border-color'     => '#bee5eb',
                    'box-shadow-color' => '',
                    'border-width'     => array(
                        'desktop' => array(
                            'top'         => '2',
                            'right'       => '0',
                            'bottom'      => '0',
                            'left'        => '0',
                            'cssbox_link' => true,
                        )
                    ),
                    'box-shadow-css'   => array(
                        'desktop' => array(
                            'x'           => '',
                            'Y'           => '',
                            'BLUR'        => '',
                            'SPREAD'      => '',
                            'cssbox_link' => true,
                        )
                    ),
                    'border-radius'    => array(
                        'desktop' => array(
                            'top'         => '',
                            'right'       => '',
                            'bottom'      => '',
                            'left'        => '',
                            'cssbox_link' => true,
                        )
                    ),
                )),

                /* success notice */
                'cwc-notice-success-color-options'            => json_encode(array(
                    'background-color' => '#d4edda',
                    'text-color'       => '#155724',
                    'icon-color'       => '#155724',
                )),
                'cwc-notice-success-border-box'               => json_encode(array(
                    'border-style'     => 'solid',
                    'border-color'     => '#c3e6cb',
                    'box-shadow-color' => '',
                    'border-width'     => array(
                        'desktop' => array(
                            'top'         => '2',
                            'right'       => '0',
                            'bottom'      => '0',
                            'left'        => '0',
                            'cssbox_link' => true,
                        )
                    ),
                    'box-shadow-css'   => array(
                        'desktop' => array(
                            'x'           => '',
                            'Y'           => '',
                            'BLUR'        => '',
                            'SPREAD'      => '',
                            'cssbox_link' => true,
                        )
                    ),
                    'border-radius'    => array(
                        'desktop' => array(
                            'top'         => '',
                            'right'       => '',
                            'bottom'      => '',
                            'left'        => '',
                            'cssbox_link' => true,
                        )
                    ),
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
         * @param object $wp_customize
         * @return void
         */
        public function customize_register($wp_customize) {
            $styling_defaults = $this->defaults();

            /* Woocommerce Options */
            /**
             * Customize Options
             **/
             require COSMOSWP_PATH.'/inc/addons/woocommerce/advanced-styling/cwp-woocommerce-options.php';

        }

        /**
         * Get dynamic CSS
         * Add Panel Section control
         * @return array
         */
        public function get_dynamic_css(){
            /*
            * WooCommerce Related Dynamic Css
             *  */
            $wc_dynamic_css['all']     = '';
            $wc_dynamic_css['tablet'] = '';
            $wc_dynamic_css['desktop'] = '';

            /* Wc general color options */
            $wc_general_color            = cosmoswp_get_theme_options('cwc-general-color-options');
            $wc_general_color            = json_decode($wc_general_color,true);

            /*on sale bg color*/
            $on_sale_bg_color      = cosmoswp_ifset($wc_general_color['on-sale-bg']);
            if ( !empty($on_sale_bg_color) ){
                $on_sale_bg_css = '.cwp-woocommerce-active	span.onsale,
.cwp-woocommerce-active	span.onsale:after,
.cwp-woocommerce-active span.wc-block-grid__product-onsale,
.cwp-woocommerce-active span.wc-block-grid__product-onsale:after{
    background-color:'.$on_sale_bg_color.';
	}';
                $wc_dynamic_css['all'] .= $on_sale_bg_css;
            }

            /*on sale color*/
            $on_sale_color      = cosmoswp_ifset($wc_general_color['on-sale-color']);
            if ( !empty($on_sale_color) ){
                $on_sale_color_css = '.cwp-woocommerce-active span.onsale,
                .cwp-woocommerce-active .wc-block-grid__product-onsale{
    color:'.$on_sale_color.';
	}';
                $wc_dynamic_css['all'] .= $on_sale_color_css;
            }

            /*out of stock bg color*/
            $out_of_stock_bg_color      = cosmoswp_ifset($wc_general_color['out-of-stock-bg']);
            if ( !empty($out_of_stock_bg_color) ){
                $out_of_stock_bg_css = '.cwp-woocommerce-active div.product .out-of-stock,
    .cwp-woocommerce-active	div.product .out-of-stock:after{
    background-color:'.$out_of_stock_bg_color.' !important;
	}';
                $wc_dynamic_css['all'] .= $out_of_stock_bg_css;
            }

            /*out of stock color*/
            $out_of_stock_color      = cosmoswp_ifset($wc_general_color['out-of-stock-color']);
            if ( !empty($out_of_stock_color) ){
                $out_of_stock_color_css = '.cwp-woocommerce-active div.product .out-of-stock{
    color:'.$out_of_stock_color.';
	}';
                $wc_dynamic_css['all'] .= $out_of_stock_color_css;
            }

            /*rating*/
            $rating_color      = cosmoswp_ifset($wc_general_color['rating-color']);
            if ( !empty($rating_color) ){
                $rating_color_css = '.cwp-woocommerce-active .star-rating, .cwp-woocommerce-active .comment-form-rating a,
                .cwp-woocommerce-active .wc-block-grid .star-rating .rating:before,
                .cwp-woocommerce-active .wc-block-grid .comment-form-rating a{
    color:'.$rating_color.';
	}';
                $wc_dynamic_css['all'] .= $rating_color_css;
            }

            /* product toolbar */
            $product_toolbar            = cosmoswp_get_theme_options('cwc-product-toolbar');
            $product_toolbar            = json_decode($product_toolbar,true);

            /*toolbar bg color*/
            $toolbar_bg_color      = cosmoswp_ifset($product_toolbar['background-color']);
            if ( !empty($toolbar_bg_color) ){
                $toolbar_bg_color_css = '.cwp-woo-archive-toolbar{
    background-color:'.$toolbar_bg_color.'!important;
	}';
                $wc_dynamic_css['all'] .= $toolbar_bg_color_css;
            }

            /*grid/list color*/
            $grid_list_color      = cosmoswp_ifset($product_toolbar['grid-list-color']);
            if ( !empty($grid_list_color) ){
                $grid_list_color_css = '.cwp-woo-archive-toolbar .cwp-woo-view-switcher span.dashicons{
    color:'.$grid_list_color.';
    border-color:'.$grid_list_color.'!important;
	}';
                $wc_dynamic_css['all'] .= $grid_list_color_css;
            }

            /*grid/list hover color*/
            $grid_list_hover_color      = cosmoswp_ifset($product_toolbar['grid-list-hover-color']);
            if ( !empty($grid_list_hover_color) ){
                $grid_list_color_hover_css = '.cwp-woo-archive-toolbar .cwp-woo-view-switcher span.dashicons.active,
.cwp-woo-archive-toolbar .cwp-woo-view-switcher span.dashicons:hover{
    color:'.$grid_list_hover_color.'!important;
    border-color:'.$grid_list_hover_color.'!important;
	}';
                $wc_dynamic_css['all'] .= $grid_list_color_hover_css;
            }

            /* product box */
            $product_box            = cosmoswp_get_theme_options('cwc-product-box');
            $product_box            = json_decode($product_box,true);

            /*product categories*/
            $categories_css  = '';

            /*cat color*/
            $categories_color      = cosmoswp_ifset($product_box['categories-color']);
            if ( $categories_color ){
                $categories_css .= 'color:'.$categories_color.';';
            }

            /*cat font size*/
            $categories_font_size     = cosmoswp_ifset($product_box['categories-font-size']);
            if ( $categories_font_size ){
                $categories_css .= 'font-size:'.$categories_font_size.'px;';
            }
            if ( !empty($categories_css) ){
                $categories_dynamic_css = '.cwp-woocommerce-active .cwp-woo-cat a{
    '.$categories_css.'
	}';
                $wc_dynamic_css['all'] .= $categories_dynamic_css;
            }

            /*cat hover color*/
            $categories_hover_css  = '';
            $categories_hover_color      = cosmoswp_ifset($product_box['categories-hover-color']);
            if ( $categories_hover_color ){
                $categories_hover_css .= 'color:'.$categories_hover_color.';';
            }
            if ( !empty($categories_hover_css) ){
                $categories_dynamic_hover_css = '.cwp-woocommerce-active .cwp-woo-cat a:hover {
    '.$categories_hover_css.'
	}';
                $wc_dynamic_css['all'] .= $categories_dynamic_hover_css;
            }
            
            /*product title*/
            $title_css  = '';
            
            /*title color*/
            $title_color      = cosmoswp_ifset($product_box['title-color']);
            if ( $title_color ){
                $title_css .= 'color:'.$title_color.';';
            }
            
            /*title font size*/
            $title_font_size     = cosmoswp_ifset($product_box['title-font-size']);
            if ( $title_font_size ){
                $title_css .= 'font-size:'.$title_font_size.'px;';
            }
            if ( !empty($title_css) ){
                $title_dynamic_css = '.cwp-woocommerce-active div.product .entry-title,
                .cwp-woocommerce-active div.product .entry-title a,
                .cwp-woocommerce-active .wc-block-grid .wc-block-grid__product-title{
                    '.$title_css.'
                	}';
                $wc_dynamic_css['all'] .= $title_dynamic_css;
            }
            
            /*title hover color*/
            $title_hover_css  = '';
            $title_hover_color      = cosmoswp_ifset($product_box['title-hover-color']);
            if ( $title_hover_color ){
                $title_hover_css .= 'color:'.$title_hover_color.';';
            }
            if ( !empty($title_hover_css) ){
                $title_dynamic_hover_css = '
                .cwp-woocommerce-active div.product .entry-title a:hover,
                .cwp-woocommerce-active .wc-block-grid .wc-block-grid__product-title:hover{
                    '.$title_hover_css.'
                	}';
                $wc_dynamic_css['all'] .= $title_dynamic_hover_css;
            }
            
            /*deleted price*/
            $deleted_price_css  = '';
            
            /*deleted color*/
            $deleted_price_color      = cosmoswp_ifset($product_box['deleted-price-color']);
            if ( $deleted_price_color ){
                $deleted_price_css .= 'color:'.$deleted_price_color.';';
            }
            
            /*deleted price*/
            $deleted_price_font_size     = cosmoswp_ifset($product_box['deleted-price-font-size']);
            if ( $deleted_price_font_size ){
                $deleted_price_css .= 'font-size:'.$deleted_price_font_size.'px;';
            }
            if ( !empty($deleted_price_css) ){
                $deleted_dynamic_css = '.cwp-woocommerce-active .price del .amount,
                .cwp-woocommerce-active .wc-block-grid .price del .amount{
    '.$deleted_price_css.'
	}';
                $wc_dynamic_css['all'] .= $deleted_dynamic_css;
            }
            
            /*price*/
            $price_css  = '';
            
            /*price color*/
            $price_color      = cosmoswp_ifset($product_box['price-color']);
            if ( $price_color ){
                $price_css .= 'color:'.$price_color.';';
            }
            
            /*price font size*/
            $price_font_size     = cosmoswp_ifset($product_box['price-font-size']);
            if ( $price_font_size ){
                $price_css .= 'font-size:'.$price_font_size.'px;';
            }
            if ( !empty($price_css) ){
                $price_dynamic_css = '.cwp-woocommerce-active .price .amount,
                .cwp-woocommerce-active .wc-block-grid .price .amount{
    '.$price_css.'
	}';
                $wc_dynamic_css['all'] .= $price_dynamic_css;
            }
            
            /*content*/
            $content_css  = '';
            
            /*Content color*/
            $content_color      = cosmoswp_ifset($product_box['content-color']);
            if ( $content_color ){
                $content_css .= 'color:'.$content_color.';';
            }
            
            /*Content font size*/
            $content_font_size     = cosmoswp_ifset($product_box['content-font-size']);
            if ( $content_font_size ){
                $content_css .= 'font-size:'.$content_font_size.'px;';
            }
            if ( !empty($content_css) ){
                $content_dynamic_css = '.cwp-woocommerce-active .cwp-single-summary-content p, .cwp-woocommerce-active .cwp-product-content .entry-excerpt, .cwp-woocommerce-active .cwp-product-content .entry-content{
    '.$content_css.'
	}';
                $wc_dynamic_css['all'] .= $content_dynamic_css;
            }

            /* woocommerce product button */
            $product_button_css  = '';
            $product_button_styling   = cosmoswp_get_theme_options('cwc-product-button-styling');
            $product_button_styling   = json_decode($product_button_styling,true);
            
            /*text color*/
            $product_button_text_color     = cosmoswp_ifset($product_button_styling['normal-text-color']);
            if ( $product_button_text_color ){
                $product_button_css .= 'color:'.$product_button_text_color.';';
            }

            /*bg color*/
            $product_button_bg_color      = cosmoswp_ifset($product_button_styling['normal-bg-color']);
            if ( $product_button_bg_color ){
                $product_button_css .= 'background:'.$product_button_bg_color.';';
            }
            else{
                $product_button_css .= 'background:transparent;';
            }

            /*border style*/
            $product_button_border_style      = cosmoswp_ifset($product_button_styling['normal-border-style']);
            if ( $product_button_border_style ){
                $product_button_css .= 'border-style:'.$product_button_border_style.';';
            }

            /*border color*/
            $product_button_border_color      = cosmoswp_ifset($product_button_styling['normal-border-color']);
            if ( $product_button_border_color ){
                $product_button_css .= 'border-color:'.$product_button_border_color.';';
            }

            /*border width*/
            $product_button_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($product_button_styling['normal-border-width']),'desktop');
            if (strpos($product_button_border_width, 'px') !== false) {
                $product_button_css .= 'border-width:'.$product_button_border_width.';';
            }

            /*border radius*/
            $product_button_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($product_button_styling['normal-border-radius']),'desktop');
            if (strpos($product_button_border_radius, 'px') !== false){
                $product_button_css		.= 'border-radius:'.$product_button_border_radius.';';
            }
            /*bx shadow*/
            $product_button_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($product_button_styling['normal-box-shadow-css']),'desktop');
            if (strpos($product_button_shadow_css, 'px') !== false) {
                $product_button_shadow_color = cosmoswp_ifset($product_button_styling['normal-box-shadow-color']);
                $product_button_bx_shadow    = $product_button_shadow_css.' '.$product_button_shadow_color;
                $product_button_css          .=	'-webkit-box-shadow:'.$product_button_bx_shadow.';';
                $product_button_css          .=	'-moz-box-shadow:'.$product_button_bx_shadow.';';
                $product_button_css          .=	'box-shadow:'.$product_button_bx_shadow.';';
            }

            if ( !empty($product_button_css) ){
                $product_button_dynamic_css = '
    .woocommerce #respond input#submit,
    .woocommerce a.button,
    .woocommerce button.button,
    .woocommerce input.button,
    .woocommerce .added_to_cart,
    .cwp-woocommerce-active .wc-block-grid .add_to_cart_button{
    '.$product_button_css.'
	}';
                $wc_dynamic_css['all'] .= $product_button_dynamic_css;
            }

            $product_button_hover_css = '';

            /*text color*/
            $product_button_hover_txt_color     = cosmoswp_ifset($product_button_styling['hover-text-color']);
            if ( $product_button_hover_txt_color ){
                $product_button_hover_css .= 'color:'.$product_button_hover_txt_color.';';
            }

            /*bg color*/
            $product_button_hover_bg_color      = cosmoswp_ifset($product_button_styling['hover-bg-color']);
            if ( $product_button_hover_bg_color ){
                $product_button_hover_css .= 'background-color:'.$product_button_hover_bg_color.';';
            }

            /*border style*/
            $product_button_hover_border_style      = cosmoswp_ifset($product_button_styling['hover-border-style']);
            if ( $product_button_hover_border_style ){
                $product_button_hover_css .= 'border-style:'.$product_button_hover_border_style.';';
            }

            /*border color*/
            $product_button_hover_border_color      = cosmoswp_ifset($product_button_styling['hover-border-color']);
            if ( $product_button_hover_border_color ){
                $product_button_hover_css .= 'border-color:'.$product_button_hover_border_color.';';
            }

            /*border width*/
            $product_button_hover_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($product_button_styling['hover-border-width']),'desktop');
            if (strpos($product_button_hover_border_width, 'px') !== false) {
                $product_button_hover_css .= 'border-width:'.$product_button_hover_border_width.';';
            }

            /*border radius*/
            $product_button_hover_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($product_button_styling['hover-border-radius']),'desktop');
            if (strpos($product_button_hover_border_radius, 'px') !== false){
                $product_button_hover_css		.= 'border-radius:'.$product_button_hover_border_radius.';';
            }

            /*bx shadow*/
            $product_button_hover_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($product_button_styling['hover-box-shadow-css']),'desktop');
            if (strpos($product_button_hover_shadow_css, 'px') !== false) {
                $product_button_hover_shadow_color = cosmoswp_ifset($product_button_styling['hover-box-shadow-color']);
                $product_button_hover_bx_shadow    = $product_button_hover_shadow_css.' '.$product_button_hover_shadow_color;
                $product_button_hover_css          .=	'-webkit-box-shadow:'.$product_button_hover_bx_shadow.';';
                $product_button_hover_css          .=	'-moz-box-shadow:'.$product_button_hover_bx_shadow.';';
                $product_button_hover_css          .=	'box-shadow:'.$product_button_hover_bx_shadow.';';
            }
            if ( !empty( $product_button_hover_css )){
                $product_button_hover_dynamic_css = '
    .woocommerce #respond input#submit:hover,
    .woocommerce a.button:hover,
    .woocommerce button.button:hover,
    .woocommerce input.button:hover,
    .woocommerce .added_to_cart:hover,
    .cwp-woocommerce-active .wc-block-grid .add_to_cart_button:hover{
		'.$product_button_hover_css.'
	}';
                $wc_dynamic_css['all'] .= $product_button_hover_dynamic_css;
            }



            /* woocommerce checkout button */
            $checkout_button_css  = '';
            $checkout_button_styling   = cosmoswp_get_theme_options('cwc-checkout-button-styling');
            $checkout_button_styling   = json_decode($checkout_button_styling,true);

            /*txt color*/
            $checkout_button_txt_color     = cosmoswp_ifset($checkout_button_styling['normal-text-color']);
            if ( $checkout_button_txt_color ){
                $checkout_button_css .= 'color:'.$checkout_button_txt_color.';';
            }

            /*bg color*/
            $checkout_button_bg_color      = cosmoswp_ifset($checkout_button_styling['normal-bg-color']);
            if ( $checkout_button_bg_color ){
                $checkout_button_css .= 'background:'.$checkout_button_bg_color.';';
            }
            else{
                $checkout_button_css .= 'background:transparent;';
            }

            /*border style*/
            $checkout_button_border_style      = cosmoswp_ifset($checkout_button_styling['normal-border-style']);
            if ( $checkout_button_border_style ){
                $checkout_button_css .= 'border-style:'.$checkout_button_border_style.';';
            }

            /*border color*/
            $checkout_button_border_color      = cosmoswp_ifset($checkout_button_styling['normal-border-color']);
            if ( $checkout_button_border_color ){
                $checkout_button_css .= 'border-color:'.$checkout_button_border_color.';';
            }

            /*border width*/
            $checkout_button_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($checkout_button_styling['normal-border-width']),'desktop');
            if (strpos($checkout_button_border_width, 'px') !== false) {
                $checkout_button_css .= 'border-width:'.$checkout_button_border_width.';';
            }

            /*border radius*/
            $checkout_button_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($checkout_button_styling['normal-border-radius']),'desktop');
            if (strpos($checkout_button_border_radius, 'px') !== false){
                $checkout_button_css		.= 'border-radius:'.$checkout_button_border_radius.';';
            }

            /*bx shadow*/
            $checkout_button_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($checkout_button_styling['normal-box-shadow-css']),'desktop');
            if (strpos($checkout_button_shadow_css, 'px') !== false) {
                $checkout_button_shadow_color = cosmoswp_ifset($checkout_button_styling['normal-box-shadow-color']);
                $checkout_button_bx_shadow    = $checkout_button_shadow_css.' '.$checkout_button_shadow_color;
                $checkout_button_css          .=	'-webkit-box-shadow:'.$checkout_button_bx_shadow.';';
                $checkout_button_css          .=	'-moz-box-shadow:'.$checkout_button_bx_shadow.';';
                $checkout_button_css          .=	'box-shadow:'.$checkout_button_bx_shadow.';';
            }

            if ( !empty($checkout_button_css) ){
                $checkout_button_dynamic_css = '
    .woocommerce #respond input#submit.alt, 
    .woocommerce a.button.alt, 
    .woocommerce button.button.alt, 
    .woocommerce input.button.alt,
    .woocommerce #respond input#submit.alt.disabled, 
    .woocommerce a.button.alt.disabled, 
    .woocommerce button.button.alt.disabled, 
    .woocommerce input.button.alt.disabled {
    '.$checkout_button_css.'
	}';
                $wc_dynamic_css['all'] .= $checkout_button_dynamic_css;
            }

            $checkout_button_hover_css = '';

            /*txt color*/
            $checkout_button_hover_txt_color     = cosmoswp_ifset($checkout_button_styling['hover-text-color']);
            if ( $checkout_button_hover_txt_color ){
                $checkout_button_hover_css .= 'color:'.$checkout_button_hover_txt_color.';';
            }

            /*bg color*/
            $checkout_button_hover_bg_color      = cosmoswp_ifset($checkout_button_styling['hover-bg-color']);
            if ( $checkout_button_hover_bg_color ){
                $checkout_button_hover_css .= 'background-color:'.$checkout_button_hover_bg_color.';';
            }

            /*border style*/
            $checkout_button_hover_border_style      = cosmoswp_ifset($checkout_button_styling['hover-border-style']);
            if ( $checkout_button_hover_border_style ){
                $checkout_button_hover_css .= 'border-style:'.$checkout_button_hover_border_style.';';
            }

            /*border color*/
            $checkout_button_hover_border_color      = cosmoswp_ifset($checkout_button_styling['hover-border-color']);
            if ( $checkout_button_hover_border_color ){
                $checkout_button_hover_css .= 'border-color:'.$checkout_button_hover_border_color.';';
            }

            /*border width*/
            $checkout_button_hover_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($checkout_button_styling['hover-border-width']),'desktop');
            if (strpos($checkout_button_hover_border_width, 'px') !== false) {
                $checkout_button_hover_css .= 'border-width:'.$checkout_button_hover_border_width.';';
            }

            /*border radius*/
            $checkout_button_hover_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($checkout_button_styling['hover-border-radius']),'desktop');
            if (strpos($checkout_button_hover_border_radius, 'px') !== false){
                $checkout_button_hover_css		.= 'border-radius:'.$checkout_button_hover_border_radius.';';
            }

            /*bx shadow*/
            $checkout_button_hover_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($checkout_button_styling['hover-box-shadow-css']),'desktop');
            if (strpos($checkout_button_hover_shadow_css, 'px') !== false) {
                $checkout_button_hover_shadow_color = cosmoswp_ifset($checkout_button_styling['hover-box-shadow-color']);
                $checkout_button_hover_bx_shadow    = $checkout_button_hover_shadow_css.' '.$checkout_button_hover_shadow_color;
                $checkout_button_hover_css          .=	'-webkit-box-shadow:'.$checkout_button_hover_bx_shadow.';';
                $checkout_button_hover_css          .=	'-moz-box-shadow:'.$checkout_button_hover_bx_shadow.';';
                $checkout_button_hover_css          .=	'box-shadow:'.$checkout_button_hover_bx_shadow.';';
            }
            if ( !empty( $checkout_button_hover_css )){
                $checkout_button_hover_dynamic_css = '
    .woocommerce #respond input#submit.alt:hover, 
    .woocommerce a.button.alt:hover, 
    .woocommerce button.button.alt:hover, 
    .woocommerce input.button.alt:hover,
    .woocommerce #respond input#submit.alt.disabled:hover, 
    .woocommerce a.button.alt.disabled:hover, 
    .woocommerce button.button.alt.disabled:hover, 
    .woocommerce input.button.alt.disabled:hover{
		'.$checkout_button_hover_css.'
	}';
                $wc_dynamic_css['all'] .= $checkout_button_hover_dynamic_css;
            }


            /* product navigation */
            $product_navigation_css = '';
            $product_navigation_hover_css = '';

            /*border options*/
            $product_navigation_border           = cosmoswp_get_theme_options('cwc-product-navigation-styling');
            $product_navigation_border           = json_decode($product_navigation_border,true);

            /*box shadow*/
            $product_navigationbx_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($product_navigation_border['box-shadow-css']),'desktop');
            if (strpos($product_navigationbx_shadow_css, 'px') !== false) {
                $product_navigationbxshadow_color   = cosmoswp_ifset($product_navigation_border['box-shadow-color']);
                $product_navigationbx_shadow        = $product_navigationbx_shadow_css.' '.$product_navigationbxshadow_color;
                $product_navigation_css .=	'-webkit-box-shadow:'.$product_navigationbx_shadow.';';
                $product_navigation_css .=	'-moz-box-shadow:'.$product_navigationbx_shadow.';';
                $product_navigation_css .=	'box-shadow:'.$product_navigationbx_shadow.';';
            }

            /*border style*/
            $product_navigation_border_style     = cosmoswp_ifset($product_navigation_border['border-style']);
            if ( 'none' !== $product_navigation_border_style ){

                $product_navigation_css .= 'border-style:'.$product_navigation_border_style.';';
                //border width
                $product_navigation_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($product_navigation_border['border-width']),'desktop');
                if (strpos($product_navigation_border_width, 'px') !== false) {
                    $product_navigation_css .= 'border-width:'.$product_navigation_border_width.';';
                }
                //border color
                $product_navigation_border_color     = cosmoswp_ifset($product_navigation_border['border-color']);
                if ($product_navigation_border_color){
                    $product_navigation_css .= 'border-color:'.$product_navigation_border_color.';';
                }
            }

            /*border radius*/
            $product_navigation_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($product_navigation_border['border-radius']),'desktop');
            if (strpos($product_navigation_border_radius, 'px') !== false){
                $product_navigation_css		.= 'border-radius:'.$product_navigation_border_radius.';';
            }

            /*pagination color*/
            $product_pagination_color            = cosmoswp_get_theme_options('cwc-product-pagination-color-options');
            $product_pagination_color            = json_decode($product_pagination_color,true);

            $pagination_bg_color      = cosmoswp_ifset($product_pagination_color['background-color']);
            if ($pagination_bg_color){
                $product_navigation_css .= 'background:'.$pagination_bg_color.';';
            }
            $pagination_text_color      = cosmoswp_ifset($product_pagination_color['text-color']);
            if ($pagination_text_color){
                $product_navigation_css .= 'color:'.$pagination_text_color.';';
            }

            /*concat product navigation css in all css*/
            if ( !empty($product_navigation_css) ){
                $product_navigation_dynamic_css = '.cwp-woocommerce-active nav.woocommerce-pagination ul li a,
.cwp-woocommerce-active nav.woocommerce-pagination ul li span {
		'.$product_navigation_css.'
	}';
                $wc_dynamic_css['all'] .= $product_navigation_dynamic_css;
            }

            $pagination_bg_hover_color      = cosmoswp_ifset($product_pagination_color['background-hover-color']);
            if ($pagination_bg_hover_color){
                $product_navigation_hover_css .= 'background:'.$pagination_bg_hover_color.';';
                $wc_dynamic_css['all'] .= '  .cwp-woocommerce-active nav.woocommerce-pagination ul li a:focus,
    .cwp-woocommerce-active nav.woocommerce-pagination ul li a:hover,
    .cwp-woocommerce-active nav.woocommerce-pagination ul li span.current {
        border-color:'.$pagination_bg_hover_color.';
    }';
            }
            $pagination_text_hover_color      = cosmoswp_ifset($product_pagination_color['text-hover-color']);
            if ($pagination_text_hover_color){
                $product_navigation_hover_css .= 'color:'.$pagination_text_hover_color.';';

            }

            /*concat product navigation css in all css*/
            if ( !empty($product_navigation_hover_css) ){
                $product_navigation_dynamic_hover_css = '
    .cwp-woocommerce-active nav.woocommerce-pagination ul li a:focus,
    .cwp-woocommerce-active nav.woocommerce-pagination ul li a:hover,
    .cwp-woocommerce-active nav.woocommerce-pagination ul li span.current {
		'.$product_navigation_hover_css.'
	}';
                $wc_dynamic_css['all'] .= $product_navigation_dynamic_hover_css;
            }

            /* single products tabs */
            $single_product_tab_bg_color            = cosmoswp_get_theme_options('cwc-single-product-tab-bg-color-options');
            $single_product_tab_bg_color            = json_decode($single_product_tab_bg_color,true);

            $tab_lists_bg_color      = cosmoswp_ifset($single_product_tab_bg_color['background-color']);
            if ( !empty($tab_lists_bg_color) ){
                $tab_lists_bg_dynamic_color = '
    .cwp-woocommerce-active .cosmoswp-woo-single-grid-row .product .woocommerce-tabs.wc-tabs-wrapper li,
    .cwp-woocommerce-active .cosmoswp-woo-single-grid-row .product .woocommerce-tabs .panel{
		background-color:'.$tab_lists_bg_color.' ;
	}';
                $wc_dynamic_css['all'] .= $tab_lists_bg_dynamic_color;
            }

            $tab_lists_bg_hover_color      = cosmoswp_ifset($single_product_tab_bg_color['background-hover-color']);
            if ( !empty($tab_lists_bg_hover_color) ){
                $tab_lists_bg_dynamic_hover_color = '
    .cwp-woocommerce-active .cosmoswp-woo-single-grid-row .product .woocommerce-tabs.wc-tabs-wrapper li.active,
    .cwp-woocommerce-active .cosmoswp-woo-single-grid-row .product .woocommerce-tabs.wc-tabs-wrapper li:hover,
    .cwp-woocommerce-active .cosmoswp-woo-single-grid-row .product .woocommerce-tabs .panel{
        background-color:'.$tab_lists_bg_hover_color.';
    }';
                $wc_dynamic_css['all'] .= $tab_lists_bg_dynamic_hover_color;
            }
            if ( !empty($tab_lists_bg_hover_color) ){
                $tab_lists_active_before_box_shadow_color = '
    .cwp-woocommerce-active .cosmoswp-woo-single-grid-row .product .woocommerce-tabs ul.tabs li.active:before,
    .cwp-woocommerce-active .cosmoswp-woo-single-grid-row .product .woocommerce-tabs ul.tabs li:hover:before{
        box-shadow: 2px 2px 0 '.$tab_lists_bg_hover_color.';
        -webkit-box-shadow: 2px 2px 0 '.$tab_lists_bg_hover_color.';
    }';
                $wc_dynamic_css['all'] .= $tab_lists_active_before_box_shadow_color;
            }
            if ( !empty($tab_lists_bg_hover_color) ){
                $tab_lists_active_after_box_shadow_color = '
    .cwp-woocommerce-active .cosmoswp-woo-single-grid-row .product .woocommerce-tabs ul.tabs li.active:after,
    .cwp-woocommerce-active .cosmoswp-woo-single-grid-row .product .woocommerce-tabs ul.tabs li:hover:after {
        box-shadow: -2px 2px 0 '.$tab_lists_bg_hover_color.';
		-webkit-box-shadow: -2px 2px 0 '.$tab_lists_bg_hover_color.';
	}';
                $wc_dynamic_css['all'] .= $tab_lists_active_after_box_shadow_color;
            }

            $single_product_tab_color            = cosmoswp_get_theme_options('cwc-single-product-tab-text-color-options');
            $single_product_tab_color            = json_decode($single_product_tab_color,true);

            $tab_lists_text_color      = cosmoswp_ifset($single_product_tab_color['tab-list-color']);
            if ( !empty($tab_lists_text_color) ){
                $tab_lists_text_dynamic_color = '.cwp-woocommerce-active .cosmoswp-woo-single-grid-row .product .woocommerce-tabs.wc-tabs-wrapper li a{
		color:'.$tab_lists_text_color.' ;
	}';
                $wc_dynamic_css['all'] .= $tab_lists_text_dynamic_color;
            }

            $tab_lists_text_hover_color      = cosmoswp_ifset($single_product_tab_color['tab-list-hover-color']);
            if ( !empty($tab_lists_text_hover_color) ){
                $tab_lists_text_dynamic_hover_color = '.cwp-woocommerce-active .cosmoswp-woo-single-grid-row .product .woocommerce-tabs.wc-tabs-wrapper li:hover a,
    .cwp-woocommerce-active .cosmoswp-woo-single-grid-row .product .woocommerce-tabs.wc-tabs-wrapper li.active a{
		color:'.$tab_lists_text_hover_color.' ;
	}';
                $wc_dynamic_css['all'] .= $tab_lists_text_dynamic_hover_color;
            }

            $single_product_tab_border_color            = cosmoswp_get_theme_options('cwc-single-product-tab-border-color-options');
            $single_product_tab_border_color            = json_decode($single_product_tab_border_color,true);

            $tab_lists_border_color      = cosmoswp_ifset($single_product_tab_border_color['tab-border-color']);
            if ( !empty($tab_lists_border_color) ){
                $tab_lists_border_dynamic_color = '
    .cwp-woocommerce-active .cosmoswp-woo-single-grid-row .product .woocommerce-tabs.wc-tabs-wrapper li,
    .cwp-woocommerce-active.wc-single-vertical-tab .cosmoswp-woo-single-grid-row .product .woocommerce-tabs.wc-tabs-wrapper li,
    .cwp-woocommerce-active.wc-single-vertical-tab .cosmoswp-woo-single-grid-row .product .woocommerce-tabs.wc-tabs-wrapper li.active,
    .cwp-woocommerce-active .cosmoswp-woo-single-grid-row .product .woocommerce-tabs .wc-tabs:before,
    .cwp-woocommerce-active .cosmoswp-woo-single-grid-row .product .woocommerce-tabs ul.tabs li::after, 
    .cwp-woocommerce-active .cosmoswp-woo-single-grid-row .product .woocommerce-tabs ul.tabs li::before,
    .cwp-woocommerce-active .cosmoswp-woo-single-grid-row .product .woocommerce-tabs .panel{
    border-color: '.$tab_lists_border_color.';
	}';
                $wc_dynamic_css['all'] .= $tab_lists_border_dynamic_color;
            }

            /*cart table*/
            $cart_table_css = '';
            $wc_cart_bg_color            = cosmoswp_get_theme_options('cwc-cart-table-bg-color');
            $wc_cart_bg_color            = json_decode($wc_cart_bg_color,true);

            $cart_table_bg_color      = cosmoswp_ifset($wc_cart_bg_color['background-color']);
            if ( !empty($cart_table_bg_color) ){
                $cart_table_css .= 'background:'.$cart_table_bg_color.';';
            }

            /* cart border */
            $wc_cart_border_color            = cosmoswp_get_theme_options('cwc-cart-table-border-color');
            $wc_cart_border_color            = json_decode($wc_cart_border_color,true);

            $cart_table_border_color      = cosmoswp_ifset($wc_cart_border_color['border-color']);
            if ( !empty($cart_table_border_color) ){
                $cart_table_css .= 'border-color:'.$cart_table_border_color.';';
            }

            if ( !empty($cart_table_css) ){
                $cart_table_dynamic_color = '
    .cwp-woocommerce-active table.shop_table, 
    .cwp-woocommerce-active table.shop_table td,
    .cwp-woocommerce-active table.shop_table tfoot td,
    .cwp-woocommerce-active table.shop_table tfoot th,
    .cwp-woocommerce-active .cart-collaterals table.shop_table th,
    .cwp-woocommerce-active .cart-collaterals table.shop_table td{
    '.$cart_table_css.';
	}';
                $wc_dynamic_css['all'] .= $cart_table_dynamic_color;
            }

            /*table head*/
            $cart_table_head_css = '';
            $wc_cart_table_head_color            = cosmoswp_get_theme_options('cwc-cart-table-header-color-options');
            $wc_cart_table_head_color            = json_decode($wc_cart_table_head_color,true);

            $cart_table_head_bg_color      = cosmoswp_ifset($wc_cart_table_head_color['background-color']);
            if ( !empty($cart_table_head_bg_color) ){
                $cart_table_head_css .= 'background:'.$cart_table_head_bg_color.';';
            }

            $cart_table_head_text_color      = cosmoswp_ifset($wc_cart_table_head_color['text-color']);
            if ( !empty($cart_table_head_bg_color) ){
                $cart_table_head_css .= 'color:'.$cart_table_head_text_color.';';
            }

            if ( !empty($cart_table_head_css) ){
                $cart_table_head_dynamic_color = '.cwp-woocommerce-active table.shop_table thead{
    '.$cart_table_head_css.';
	}';
                $wc_dynamic_css['all'] .= $cart_table_head_dynamic_color;
            }

            /* product remove icon */
            $product_remove_icon_css = '';
            $product_remove_icon_color            = cosmoswp_get_theme_options('cwc-cart-remove-button-color-options');
            $product_remove_icon_color            = json_decode($product_remove_icon_color,true);

            $product_remove_icon_bg_color      = cosmoswp_ifset($product_remove_icon_color['background-color']);
            if ( !empty($product_remove_icon_bg_color) ){
                $product_remove_icon_css .= 'background:'.$product_remove_icon_bg_color.';';
            }

            $product_remove_icon_text_color      = cosmoswp_ifset($product_remove_icon_color['icon-color']);
            if ( !empty($product_remove_icon_bg_color) ){
                $product_remove_icon_css .= 'color:'.$product_remove_icon_text_color.' !important;';
            }

            if ( !empty($product_remove_icon_css) ){
                $product_remove_icon_dynamic_color = '.cwp-woocommerce-active table.shop_table .remove{
    '.$product_remove_icon_css.';
	}';
                $wc_dynamic_css['all'] .= $product_remove_icon_dynamic_color;
            }
            $product_remove_icon_hover_css = '';
            $product_remove_icon_hover_bg_color      = cosmoswp_ifset($product_remove_icon_color['background-hover-color']);
            if ( !empty($product_remove_icon_hover_bg_color) ){
                $product_remove_icon_hover_css .= 'background:'.$product_remove_icon_hover_bg_color.';';
            }

            $product_remove_icon_hover_text_color      = cosmoswp_ifset($product_remove_icon_color['icon-hover-color']);
            if ( !empty($product_remove_icon_hover_bg_color) ){
                $product_remove_icon_hover_css .= 'color:'.$product_remove_icon_hover_text_color.' !important;';
            }

            if ( !empty($product_remove_icon_hover_css) ){
                $product_remove_icon_hover_dynamic_color = '.cwp-woocommerce-active table.shop_table .remove:hover{
    '.$product_remove_icon_hover_css.';
	}';
                $wc_dynamic_css['all'] .= $product_remove_icon_hover_dynamic_color;
            }

            /* error message */
            $error_message_css = '';

            /*error message color*/
            $error_message_color            = cosmoswp_get_theme_options('cwc-notice-error-color-options');
            $error_message_color            = json_decode($error_message_color,true);

            $error_message_bg_color      = cosmoswp_ifset($error_message_color['background-color']);
            if ($error_message_bg_color){
                $error_message_css .= 'background:'.$error_message_bg_color.';';
            }
            $error_message_text_color      = cosmoswp_ifset($error_message_color['text-color']);
            if ($error_message_text_color){
                $error_message_css .= 'color:'.$error_message_text_color.';';
            }

            /*border options*/
            $error_message_border           = cosmoswp_get_theme_options('cwc-notice-error-border-box');
            $error_message_border           = json_decode($error_message_border,true);

            /*box shadow*/
            $error_messagebx_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($error_message_border['box-shadow-css']),'desktop');
            if (strpos($error_messagebx_shadow_css, 'px') !== false) {
                $error_messagebxshadow_color   = cosmoswp_ifset($error_message_border['box-shadow-color']);
                $error_messagebx_shadow        = $error_messagebx_shadow_css.' '.$error_messagebxshadow_color;
                $error_message_css .=	'-webkit-box-shadow:'.$error_messagebx_shadow.';';
                $error_message_css .=	'-moz-box-shadow:'.$error_messagebx_shadow.';';
                $error_message_css .=	'box-shadow:'.$error_messagebx_shadow.';';
            }

            /*border style*/
            $error_message_border_style     = cosmoswp_ifset($error_message_border['border-style']);
            if ( 'none' !== $error_message_border_style ){

                $error_message_css .= 'border-style:'.$error_message_border_style.';';
                //border width
                $error_message_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($error_message_border['border-width']),'desktop');
                if (strpos($error_message_border_width, 'px') !== false) {
                    $error_message_css .= 'border-width:'.$error_message_border_width.';';
                }
                //border color
                $error_message_border_color     = cosmoswp_ifset($error_message_border['border-color']);
                if ($error_message_border_color){
                    $error_message_css .= 'border-color:'.$error_message_border_color.';';
                }
            }

            /*border radius*/
            $error_message_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($error_message_border['border-radius']),'desktop');
            if (strpos($error_message_border_radius, 'px') !== false){
                $error_message_css		.= 'border-radius:'.$error_message_border_radius.';';
            }

            /*concat error message css in all css*/
            if ( !empty($error_message_css) ){
                $error_message_dynamic_css = '.cwp-woocommerce-active .woocommerce-error {
		'.$error_message_css.'
	}';
                $wc_dynamic_css['all'] .= $error_message_dynamic_css;
            }

            /*icon color*/
            $error_message_icon_color      = cosmoswp_ifset($error_message_color['icon-color']);
            if ($error_message_icon_color){
                $error_message_dynamic_css = '.cwp-woocommerce-active .woocommerce-error:before {
		 color:'.$error_message_icon_color.';
	}';
                $wc_dynamic_css['all'] .= $error_message_dynamic_css;

            }

            /* Information message */
            $information_message_css = '';

            /*information message color*/
            $information_message_color            = cosmoswp_get_theme_options('cwc-notice-info-color-options');
            $information_message_color            = json_decode($information_message_color,true);

            $information_message_bg_color      = cosmoswp_ifset($information_message_color['background-color']);
            if ($information_message_bg_color){
                $information_message_css .= 'background:'.$information_message_bg_color.';';
            }
            $information_message_text_color      = cosmoswp_ifset($information_message_color['text-color']);
            if ($information_message_text_color){
                $information_message_css .= 'color:'.$information_message_text_color.';';
            }

            /*border options*/
            $information_message_border           = cosmoswp_get_theme_options('cwc-notice-info-border-box');
            $information_message_border           = json_decode($information_message_border,true);

            /*box shadow*/
            $information_messagebx_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($information_message_border['box-shadow-css']),'desktop');
            if (strpos($information_messagebx_shadow_css, 'px') !== false) {
                $information_messagebxshadow_color   = cosmoswp_ifset($information_message_border['box-shadow-color']);
                $information_messagebx_shadow        = $information_messagebx_shadow_css.' '.$information_messagebxshadow_color;
                $information_message_css .=	'-webkit-box-shadow:'.$information_messagebx_shadow.';';
                $information_message_css .=	'-moz-box-shadow:'.$information_messagebx_shadow.';';
                $information_message_css .=	'box-shadow:'.$information_messagebx_shadow.';';
            }

            /*border style*/
            $information_message_border_style     = cosmoswp_ifset($information_message_border['border-style']);
            if ( 'none' !== $information_message_border_style ){

                $information_message_css .= 'border-style:'.$information_message_border_style.';';
                //border width
                $information_message_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($information_message_border['border-width']),'desktop');
                if (strpos($information_message_border_width, 'px') !== false) {
                    $information_message_css .= 'border-width:'.$information_message_border_width.';';
                }
                //border color
                $information_message_border_color     = cosmoswp_ifset($information_message_border['border-color']);
                if ($information_message_border_color){
                    $information_message_css .= 'border-color:'.$information_message_border_color.';';
                }
            }

            /*border radius*/
            $information_message_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($information_message_border['border-radius']),'desktop');
            if (strpos($information_message_border_radius, 'px') !== false){
                $information_message_css		.= 'border-radius:'.$information_message_border_radius.';';
            }

            /*concated error message css in all css*/
            if ( !empty($information_message_css) ){
                $information_message_dynamic_css = '.cwp-woocommerce-active .woocommerce-info {
		'.$information_message_css.'
	}';
                $wc_dynamic_css['all'] .= $information_message_dynamic_css;
            }

            /*icon color*/
            $information_message_icon_color      = cosmoswp_ifset($information_message_color['icon-color']);
            if ($information_message_icon_color){
                $information_message_dynamic_css = '.cwp-woocommerce-active .woocommerce-info:before {
		 color:'.$information_message_icon_color.';
	}';
                $wc_dynamic_css['all'] .= $information_message_dynamic_css;

            }
            /* Success message */
            $success_message_css = '';

            /*Success message color*/
            $success_message_color            = cosmoswp_get_theme_options('cwc-notice-success-color-options');
            $success_message_color            = json_decode($success_message_color,true);

            $success_message_bg_color      = cosmoswp_ifset($success_message_color['background-color']);
            if ($success_message_bg_color){
                $success_message_css .= 'background:'.$success_message_bg_color.';';
            }
            $success_message_text_color      = cosmoswp_ifset($success_message_color['text-color']);
            if ($success_message_text_color){
                $success_message_css .= 'color:'.$success_message_text_color.';';
            }

            /*border options*/
            $success_message_border           = cosmoswp_get_theme_options('cwc-notice-success-border-box');
            $success_message_border           = json_decode($success_message_border,true);

            /*box shadow*/
            $success_messagebx_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($success_message_border['box-shadow-css']),'desktop');
            if (strpos($success_messagebx_shadow_css, 'px') !== false) {
                $success_messagebxshadow_color   = cosmoswp_ifset($success_message_border['box-shadow-color']);
                $success_messagebx_shadow        = $success_messagebx_shadow_css.' '.$success_messagebxshadow_color;
                $success_message_css .=	'-webkit-box-shadow:'.$success_messagebx_shadow.';';
                $success_message_css .=	'-moz-box-shadow:'.$success_messagebx_shadow.';';
                $success_message_css .=	'box-shadow:'.$success_messagebx_shadow.';';
            }

            /*border style*/
            $success_message_border_style     = cosmoswp_ifset($success_message_border['border-style']);
            if ( 'none' !== $success_message_border_style ){

                $success_message_css .= 'border-style:'.$success_message_border_style.';';
                /*border width*/
                $success_message_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($success_message_border['border-width']),'desktop');
                if (strpos($success_message_border_width, 'px') !== false) {
                    $success_message_css .= 'border-width:'.$success_message_border_width.';';
                }
                /*border color*/
                $success_message_border_color     = cosmoswp_ifset($success_message_border['border-color']);
                if ($success_message_border_color){
                    $success_message_css .= 'border-color:'.$success_message_border_color.';';
                }
            }

            /*border radius*/
            $success_message_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($success_message_border['border-radius']),'desktop');
            if (strpos($success_message_border_radius, 'px') !== false){
                $success_message_css		.= 'border-radius:'.$success_message_border_radius.';';
            }

            /*concat error message css in all css*/
            if ( !empty($success_message_css) ){
                $success_message_dynamic_css = '.cwp-woocommerce-active .woocommerce-message {
		'.$success_message_css.'
	}';
                $wc_dynamic_css['all'] .= $success_message_dynamic_css;
            }

            /*icon color*/
            $success_message_icon_color      = cosmoswp_ifset($success_message_color['icon-color']);
            if ($success_message_icon_color){
                $success_message_dynamic_css = '.cwp-woocommerce-active .woocommerce-message:before {
         color:'.$success_message_icon_color.';
    }';
                $wc_dynamic_css['all'] .= $success_message_dynamic_css;

            }

            /*Image Width color*/
            $woocommerce_list_image_width      = cosmoswp_get_theme_options('cwc-archive-list-media-width');
            $woocommerce_list_image_width      = json_decode($woocommerce_list_image_width,true);
            $image_width_desktop_css = $woocommerce_list_image_width['desktop'].'%';
            $image_width_tablet_css  = $woocommerce_list_image_width['tablet'].'%';
            $image_width_css         = $woocommerce_list_image_width['mobile'].'%';
            if ($image_width_css){
                $woocommerce_list_image_width_all_dynamic_css = '
    .cwp-woocommerce-active .cosmoswp-woo-archive-grid-row.cwp-list .product .cwp-list-image-box.cwp-list-image-box {
         width:'.$image_width_css.';
    }';
                $wc_dynamic_css['all'] .= $woocommerce_list_image_width_all_dynamic_css;


            }
            if ($image_width_css){
                $woocommerce_list_content_width_all_dynamic_css = '
     .cwp-woocommerce-active .cosmoswp-woo-archive-grid-row.cwp-list .product .cwp-product-content {
 		 width:calc(100% - '.$image_width_css.' - 30px);
 	}';
                $wc_dynamic_css['all'] .= $woocommerce_list_content_width_all_dynamic_css;

            }


            /*for Tablet*/
            if ($image_width_tablet_css){
                $woocommerce_list_image_width_tablet_dynamic_css = '
    .cwp-woocommerce-active .cosmoswp-woo-archive-grid-row.cwp-list .product .cwp-list-image-box.cwp-list-image-box {
         width:'.$image_width_tablet_css.';
    }';
                $wc_dynamic_css['tablet'] .= $woocommerce_list_image_width_tablet_dynamic_css;
            }
            if ($image_width_tablet_css){
                $woocommerce_list_content_width_tablet_dynamic_css = '
     .cwp-woocommerce-active .cosmoswp-woo-archive-grid-row.cwp-list .product .cwp-product-content {
          width:calc(100% - '.$image_width_tablet_css.' - 30px);
     }';
                $wc_dynamic_css['tablet'] .= $woocommerce_list_content_width_tablet_dynamic_css;
            }

            /*for Desktop*/
            if ($image_width_desktop_css){
                $woocommerce_list_image_width_desktop_dynamic_css = '
    .cwp-woocommerce-active .cosmoswp-woo-archive-grid-row.cwp-list .product .cwp-list-image-box.cwp-list-image-box {
         width:'.$image_width_desktop_css.';
    }';
                $wc_dynamic_css['desktop'] .= $woocommerce_list_image_width_desktop_dynamic_css;
            }
            if ($image_width_desktop_css){
                $woocommerce_list_content_width_desktop_dynamic_css = '
     .cwp-woocommerce-active .cosmoswp-woo-archive-grid-row.cwp-list .product .cwp-product-content {
          width:calc(100% - '.$image_width_desktop_css.' - 30px);
     }';
                $wc_dynamic_css['desktop'] .= $woocommerce_list_content_width_desktop_dynamic_css;
            }
            return $wc_dynamic_css;
        }

        /**
         * Callback functions for dynamic_css,
         * Add Woocommerce dynamic css
         *
         * @since    1.0.0
         * @access   public
         *
         * @param object $dynamic_css
         * @return array|string
         */
        public function dynamic_css($dynamic_css) {
            $wc_dynamic_css = $this->get_dynamic_css();
            if (is_array($dynamic_css) && !empty($dynamic_css)) {
                $all_css = array_merge_recursive($dynamic_css, $wc_dynamic_css);
                return $all_css;
            } else {
                return $wc_dynamic_css;
            }
        }
    }
endif;

/**
 * Create Instance for CosmosWP_WooCommerce_Advanced_Styling
 *
 * @since    1.0.0
 * @access   public
 *
 * @param
 * @return object
 */
if (!function_exists('cosmoswp_woocommerce_advanced_styling')) {

    function cosmoswp_woocommerce_advanced_styling() {

        return CosmosWP_WooCommerce_Advanced_Styling::instance();
    }

    cosmoswp_woocommerce_advanced_styling()->run();
}