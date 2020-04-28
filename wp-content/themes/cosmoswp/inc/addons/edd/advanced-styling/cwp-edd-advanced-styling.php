<?php
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Customizer Options
 * @package CosmosWP
 */

if (!class_exists('CosmosWP_Edd_Advanced_Styling')) :

    class CosmosWP_Edd_Advanced_Styling {

        /**
         * Main Instance
         *
         * Insures that only one instance of CosmosWP_Edd_Advanced_Styling exists in memory at any one
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
                $instance = new CosmosWP_Edd_Advanced_Styling;
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
            add_filter( 'cosmoswp_dynamic_css', array( $this, 'dynamic_css' ),100 );
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

                /* product catalog options */
                'edd-show-downloads-per-row'           => 4,

                /* advanced styling */
                'edd-product-toolbar'                  => json_encode(array(
                    'background-color'      => '#f5f5f5',
                    'grid-list-color'       => '#999',
                    'grid-list-hover-color' => '#275cf6',
                )),
                'edd-product-box'                      => json_encode(array(
                    'title-font-size'        => '',
                    'title-color'            => '#333',
                    'title-hover-color'      => '#275cf6',
                    'price-font-size'        => '',
                    'price-color'            => '#333',
                    'price-hover-color'      => '#275cf6',
                    'content-font-size'      => '',
                    'content-color'          => '#333',
                    'categories-font-size'   => '#275cf6',
                    'categories-color'       => '#275cf6',
                    'categories-hover-color' => '#275cf6',
                    'tag-font-size'          => '14',
                    'tag-color'              => '#999',
                    'tag-hover-color'        => '#275cf6',
                )),
                'edd-product-button-styling'           => json_encode(array(
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
                            'top'         => '',
                            'right'       => '',
                            'bottom'      => '',
                            'left'        => '',
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
                'edd-product-pagination-color-options' => json_encode(array(
                    'background-color'       => '#f5f5f5',
                    'background-hover-color' => '#275cf6',
                    'text-color'             => '#333',
                    'text-hover-color'       => '#fff',
                )),
                'edd-product-navigation-styling'       => json_encode(array(
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
                            'top'         => '',
                            'right'       => '',
                            'bottom'      => '',
                            'left'        => '',
                            'cssbox_link' => true,
                        )
                    ),
                )),
                'edd-cart-table-bg-color'              => json_encode(array(
                    'background-color'          => '#fff',
                    'background-stripped-color' => '#fff',
                )),
                'edd-cart-table-border-color'          => json_encode(array(
                    'border-color' => '#ddd',
                )),
                'edd-cart-table-header-color-options'  => json_encode(array(
                    'background-color' => '#fff',
                    'text-color'       => '#333',
                )),
                'edd-cart-remove-text-color-options'   => json_encode(array(
                    'button-color'           => '#fff',
                    'button-hover-color'     => '#fff',
                    'background-color'       => '#fff',
                    'background-hover-color' => '#fff',
                )),
                /* error notice */
                'edd-notice-error-color-options'       => json_encode(array(
                    'background-color' => '#f2dede',
                    'text-color'       => '#a94442',
                    'border-color'     => '#ebccd1',
                )),

                /* info notice */
                'edd-notice-info-color-options'        => json_encode(array(
                    'background-color' => '#d9edf7',
                    'text-color'       => '#31708f',
                    'border-color'     => '#bce8f1',
                )),

                /* success notice */
                'edd-notice-success-color-options'     => json_encode(array(
                    'background-color' => '#dff0d8',
                    'text-color'       => '#3c763d',
                    'border-color'     => '#d6e9c6',
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
            $styling_defaults = $this->defaults();

            /*Woo Archive Elements Starts from here*/
            $wp_customize->add_section(
                new CosmosWP_WP_Customize_Section_H3( $wp_customize, 'cosmoswp_edd_panel_elements_seperator', array(
                        'title'    => esc_html__('EDD Option', 'cosmoswp'),
                        'priority' => 140,
                    )
                )
            );
            /**
             * Panel
             */
            $wp_customize->add_panel('edd-setting-panel', array(
                'title'    => esc_html__('Easy Digital Downloads', 'cosmoswp'),
                'priority' => 170,
            ));
            require_once COSMOSWP_PATH.'/inc/addons/edd/advanced-styling/cwp-edd-options.php';
            require_once COSMOSWP_PATH.'/inc/addons/edd/advanced-styling/cwp-edd-product-catalog.php';

        }

        /**
         * Get dynamic CSS
         * Add Panel Section control
         * @return array
         */
        public function get_dynamic_css(){
            $edd_dynamic_css['all']     = '';
            $edd_dynamic_css['tablet']  = '';
            $edd_dynamic_css['desktop'] = '';

            /* product box */
            $product_box = cosmoswp_get_theme_options('edd-product-box');
            $product_box = json_decode($product_box, true);

            /*product title*/
            $title_css = '';

            /*title color*/
            $title_color = cosmoswp_ifset($product_box['title-color']);
            if ($title_color) {
                $title_css .= 'color:' . $title_color . ';';
            }

            /*title font size*/
            $title_font_size = cosmoswp_ifset($product_box['title-font-size']);
            if ($title_font_size) {
                $title_css .= 'font-size:' . $title_font_size . 'px;';
            }
            if (!empty($title_css)) {
                $title_dynamic_css
                    = '
    .cwp-edd-active .edd-download .entry-title,
    .cwp-edd-active .edd-download .entry-title a{
    ' . $title_css . '
    }';
                $edd_dynamic_css['all'] .= $title_dynamic_css;
            }

            /*product title*/
            $title_hover_css = '';

            /*title color*/
            $title_hover_color = cosmoswp_ifset($product_box['title-hover-color']);
            if ($title_hover_color) {
                $title_hover_css .= 'color:' . $title_hover_color . ';';
            }
            if (!empty($title_css)) {
                $title_dynamic_hover_css
                    = '
    .cwp-edd-active .edd-download .entry-title:hover,
    .cwp-edd-active .edd-download .entry-title:hover a{
    ' . $title_hover_css . '
	}';
                $edd_dynamic_css['all'] .= $title_dynamic_hover_css;
            }

            /*price*/
            $price_css = '';

            /*price color*/
            $price_color = cosmoswp_ifset($product_box['price-color']);
            if ($price_color) {
                $price_css .= 'color:' . $price_color . ';';
            }

            /*price font size*/
            $price_font_size = cosmoswp_ifset($product_box['price-font-size']);
            if ($price_font_size) {
                $price_css .= 'font-size:' . $price_font_size . 'px;';
            }
            if (!empty($price_css)) {
                $price_dynamic_css
                    = '
    .cwp-edd-active .edd_download_purchase_form ul li,
    .cwp-edd-active .edd_download_purchase_form ul li label{
    ' . $price_css . '
    }';
                $edd_dynamic_css['all'] .= $price_dynamic_css;
            }

            /*price hover color*/
            $price_hover_css = '';
            $price_hover_color = cosmoswp_ifset($product_box['price-hover-color']);
            if ($price_hover_color) {
                $price_hover_css .= 'color:' . $price_hover_color . ';';
            }
            if (!empty($price_hover_css)) {
                $price_dynamic_hover_css
                    = '
    .cwp-edd-active .edd_download_purchase_form ul li:hover,
    .cwp-edd-active .edd_download_purchase_form ul li:hover label{
    ' . $price_hover_css . '
	}';
                $edd_dynamic_css['all'] .= $price_dynamic_hover_css;
            }

            /*product content*/
            $content_css = '';
            $content_color = cosmoswp_ifset($product_box['content-color']);
            if ($content_color) {
                $content_css .= 'color:' . $content_color . ';';
            }

            /*Content font size*/
            $content_font_size = cosmoswp_ifset($product_box['content-font-size']);
            if ($content_font_size) {
                $content_css .= 'font-size:' . $content_font_size . 'px;';
            }
            if (!empty($content_css)) {
                $content_dynamic_css
                    = '
    .cwp-edd-active .edd-download .entry-content, 
    .cwp-edd-active .edd-download .entry-content p, 
    .cwp-edd-active .edd-download .entry-excerpt,
    .cwp-edd-active .edd-download .entry-excerpt p{
    ' . $content_css . '
    }';
                $edd_dynamic_css['all'] .= $content_dynamic_css;
            }

            /*product categories*/
            $categories_css = '';

            /*cat color*/
            $categories_color = cosmoswp_ifset($product_box['categories-color']);
            if ($categories_color) {
                $categories_css .= 'color:' . $categories_color . ';';
            }

            /*font size*/
            $categories_font_size = cosmoswp_ifset($product_box['categories-font-size']);
            if ($categories_font_size) {
                $categories_css .= 'font-size:' . $categories_font_size . 'px;';
            }
            if (!empty($categories_css)) {
                $categories_dynamic_css
                    = '.cwp-edd-active .cwp-edd-cat a{
    ' . $categories_css . '
	}';
                $edd_dynamic_css['all'] .= $categories_dynamic_css;
            }

            /*cat hover color*/
            $categories_hover_css   = '';
            $categories_hover_color = cosmoswp_ifset($product_box['categories-hover-color']);
            if ($categories_hover_color) {
                $categories_hover_css .= 'color:' . $categories_hover_color . ';';
            }
            if (!empty($categories_hover_css)) {
                $categories_dynamic_hover_css
                    = '.cwp-edd-active .cwp-edd-cat a:hover {
    ' . $categories_hover_css . '
	}';
                $edd_dynamic_css['all'] .= $categories_dynamic_hover_css;
            }

            /*product tags*/
            $tags_css = '';

            /*tag color*/
            $tags_color = cosmoswp_ifset($product_box['tag-color']);
            if ($tags_color) {
                $tags_css .= 'color:' . $tags_color . ';';
            }
            
            /*tag font size*/
            $tags_font_size = cosmoswp_ifset($product_box['tag-font-size']);
            if ($tags_font_size) {
                $tags_css .= 'font-size:' . $tags_font_size . 'px;';
            }
            if (!empty($tags_css)) {
                $tags_dynamic_css
                    = '.cwp-edd-active .cwp-edd-tag a{
    ' . $tags_css . '
	}';
                $edd_dynamic_css['all'] .= $tags_dynamic_css;
            }
            
            /*tag hover color*/
            $tags_hover_css   = '';
            $tags_hover_color = cosmoswp_ifset($product_box['tag-hover-color']);
            if ($tags_hover_color) {
                $tags_hover_css .= 'color:' . $tags_hover_color . ';';
            }
            if (!empty($tags_hover_css)) {
                $tags_dynamic_hover_css
                    = '.cwp-edd-active .cwp-edd-tag a:hover {
    ' . $tags_hover_css . '
	}';
                $edd_dynamic_css['all'] .= $tags_dynamic_hover_css;
            }


            /* edd product button */
            $product_button_css     = '';
            $product_button_styling = cosmoswp_get_theme_options('edd-product-button-styling');
            $product_button_styling = json_decode($product_button_styling, true);
            
            /*txt color*/
            $product_button_text_color = cosmoswp_ifset($product_button_styling['normal-text-color']);
            if ($product_button_text_color) {
                $product_button_css .= 'color:' . $product_button_text_color . ';';
            }
            
            /*bg color*/
            $product_button_bg_color = cosmoswp_ifset($product_button_styling['normal-bg-color']);
            if ($product_button_bg_color) {
                $product_button_css .= 'background:' . $product_button_bg_color . ';';
            } else {
                $product_button_css .= 'background:transparent;';
            }
            
            /*border style*/
            $product_button_border_style = cosmoswp_ifset($product_button_styling['normal-border-style']);
            if ($product_button_border_style) {
                $product_button_css .= 'border-style:' . $product_button_border_style . ';';
            }
            
            /*border color*/
            $product_button_border_color = cosmoswp_ifset($product_button_styling['normal-border-color']);
            if ($product_button_border_color) {
                $product_button_css .= 'border-color:' . $product_button_border_color . ';';
            }
            
            /*border width*/
            $product_button_border_width = cosmoswp_cssbox_values_inline(cosmoswp_ifset($product_button_styling['normal-border-width']), 'desktop');
            if (strpos($product_button_border_width, 'px') !== false) {
                $product_button_css .= 'border-width:' . $product_button_border_width . ';';
            }
            
            /*border radius*/
            $product_button_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($product_button_styling['normal-border-radius']), 'desktop');
            if (strpos($product_button_border_radius, 'px') !== false) {
                $product_button_css .= 'border-radius:' . $product_button_border_radius . ';';
            }
            
            /*bx shadow*/
            $product_button_shadow_css = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($product_button_styling['normal-box-shadow-css']), 'desktop');
            if (strpos($product_button_shadow_css, 'px') !== false) {
                $product_button_shadow_color = cosmoswp_ifset($product_button_styling['normal-box-shadow-color']);
                $product_button_bx_shadow    = $product_button_shadow_css . ' ' . $product_button_shadow_color;
                $product_button_css          .= '-webkit-box-shadow:' . $product_button_bx_shadow . ';';
                $product_button_css          .= '-moz-box-shadow:' . $product_button_bx_shadow . ';';
                $product_button_css          .= 'box-shadow:' . $product_button_bx_shadow . ';';
            }

            if (!empty($product_button_css)) {
                $product_button_dynamic_css
                    = '
    .cwp-edd-active .edd-submit.button,
    .cwp-edd-active #edd-purchase-button,
    .cwp-edd-active .edd-submit,
    .cwp-edd-active .cwp-edd-cart-widget-wrapper .edd_checkout a{
    ' . $product_button_css . '
	}';
                $edd_dynamic_css['all'] .= $product_button_dynamic_css;
            }

            $product_button_hover_css = '';

            /*text color*/
            $product_button_hover_text_color = cosmoswp_ifset($product_button_styling['hover-text-color']);
            if ($product_button_hover_text_color) {
                $product_button_hover_css .= 'color:' . $product_button_hover_text_color . ';';
            }

            /*bg color*/
            $product_button_hover_bg_color = cosmoswp_ifset($product_button_styling['hover-bg-color']);
            if ($product_button_hover_bg_color) {
                $product_button_hover_css .= 'background-color:' . $product_button_hover_bg_color . ';';
            }

            /*border style*/
            $product_button_hover_border_style = cosmoswp_ifset($product_button_styling['hover-border-style']);
            if ($product_button_hover_border_style) {
                $product_button_hover_css .= 'border-style:' . $product_button_hover_border_style . ';';
            }

            /*border color*/
            $product_button_hover_border_color = cosmoswp_ifset($product_button_styling['hover-border-color']);
            if ($product_button_hover_border_color) {
                $product_button_hover_css .= 'border-color:' . $product_button_hover_border_color . ';';
            }

            /*border width*/
            $product_button_hover_border_width = cosmoswp_cssbox_values_inline(cosmoswp_ifset($product_button_styling['hover-border-width']), 'desktop');
            if (strpos($product_button_hover_border_width, 'px') !== false) {
                $product_button_hover_css .= 'border-width:' . $product_button_hover_border_width . ';';
            }

            /*border radius*/
            $product_button_hover_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($product_button_styling['hover-border-radius']), 'desktop');
            if (strpos($product_button_hover_border_radius, 'px') !== false) {
                $product_button_hover_css .= 'border-radius:' . $product_button_hover_border_radius . ';';
            }

            /*box shadow*/
            $product_button_hover_shadow_css = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($product_button_styling['hover-box-shadow-css']), 'desktop');
            if (strpos($product_button_hover_shadow_css, 'px') !== false) {
                $product_button_hover_shadow_color = cosmoswp_ifset($product_button_styling['hover-box-shadow-color']);
                $product_button_hover_bx_shadow    = $product_button_hover_shadow_css . ' ' . $product_button_hover_shadow_color;
                $product_button_hover_css          .= '-webkit-box-shadow:' . $product_button_hover_bx_shadow . ';';
                $product_button_hover_css          .= '-moz-box-shadow:' . $product_button_hover_bx_shadow . ';';
                $product_button_hover_css          .= 'box-shadow:' . $product_button_hover_bx_shadow . ';';
            }
            if (!empty($product_button_hover_css)) {
                $product_button_hover_dynamic_css
                    = '
    .cwp-edd-active .edd-submit.button:hover,
    .cwp-edd-active #edd-purchase-button:hover,
    .cwp-edd-active .edd-submit:hover,
    .cwp-edd-active .edd-submit.button:focus,
    .cwp-edd-active #edd-purchase-button:focus,
    .cwp-edd-active .edd-submit:focus,
    .cwp-edd-active .cwp-edd-cart-widget-wrapper .edd_checkout a:hover,
    .cwp-edd-active .cwp-edd-cart-widget-wrapper .edd_checkout a:focus{
		' . $product_button_hover_css . '
	}';
                $edd_dynamic_css['all'] .= $product_button_hover_dynamic_css;
            }

            /*checkout table*/
            $cart_table_css  = '';
            $edd_table_color = cosmoswp_get_theme_options('edd-cart-table-bg-color');
            $edd_table_color = json_decode($edd_table_color, true);

            $checkout_table_bg_color = cosmoswp_ifset($edd_table_color['background-color']);
            if (!empty($checkout_table_bg_color)) {
                $checkout_table_bg_dynamic_color
                    = '.cwp-edd-active #edd_checkout_cart,
                    .cwp-edd-active #edd_checkout_cart th, 
                    .cwp-edd-active #edd_checkout_cart td{
                 background-color:' . $checkout_table_bg_color . ';
            	}';
                $edd_dynamic_css['all'] .= $checkout_table_bg_dynamic_color;
            }

            $cart_table_text_color = cosmoswp_ifset($edd_table_color['text-color']);
            if (!empty($cart_table_text_color)) {
                $cart_table_css .= 'color:' . $cart_table_text_color . ';';
            }
            /* cart border */
            $wc_cart_border_color = cosmoswp_get_theme_options('edd-cart-table-border-color');
            $wc_cart_border_color = json_decode($wc_cart_border_color, true);

            $cart_table_border_color = cosmoswp_ifset($wc_cart_border_color['border-color']);
            if (!empty($cart_table_border_color)) {
                $cart_table_css .= 'border-color:' . $cart_table_border_color . ';';
            }

            if (!empty($cart_table_css)) {
                $cart_table_dynamic_color
                    = '.cwp-edd-active #edd_checkout_cart th,
.cwp-edd-active #edd_checkout_cart td{
    ' . $cart_table_css . ';
	}';
                $edd_dynamic_css['all'] .= $cart_table_dynamic_color;
            }


            /*table head*/
            $checkout_table_head_css   = '';
            $checkout_table_head_color = cosmoswp_get_theme_options('edd-cart-table-header-color-options');
            $checkout_table_head_color = json_decode($checkout_table_head_color, true);

            $checkout_table_head_bg_color = cosmoswp_ifset($checkout_table_head_color['background-color']);
            if (!empty($checkout_table_head_bg_color)) {
                $checkout_table_head_css .= 'background:' . $checkout_table_head_bg_color . ';';
            }

            $checkout_table_head_text_color = cosmoswp_ifset($checkout_table_head_color['text-color']);
            if (!empty($checkout_table_head_bg_color)) {
                $checkout_table_head_css .= 'color:' . $checkout_table_head_text_color . ';';
            }

            if (!empty($checkout_table_head_css)) {
                $checkout_table_head_dynamic_color
                    = '.cwp-edd-active #edd_checkout_cart .edd_cart_header_row th{
    ' . $checkout_table_head_css . ';
	}';
                $edd_dynamic_css['all'] .= $checkout_table_head_dynamic_color;
            }

            /* product remove icon */
            $product_remove_text_css   = '';
            $product_remove_text_color = cosmoswp_get_theme_options('edd-cart-remove-text-color-options');
            $product_remove_text_color = json_decode($product_remove_text_color, true);

            $product_remove_text_text_color = cosmoswp_ifset($product_remove_text_color['text-color']);
            if (!empty($product_remove_text_bg_color)) {
                $product_remove_text_css .= 'color:' . $product_remove_text_text_color . ' !important;';
            }

            if (!empty($product_remove_text_css)) {
                $product_remove_text_dynamic_color
                    = '.cwp-edd-active #edd_checkout_cart .edd_cart_remove_item_btn {
    ' . $product_remove_text_css . ';
	}';
                $edd_dynamic_css['all'] .= $product_remove_text_dynamic_color;
            }
            $product_remove_text_hover_css        = '';
            $product_remove_text_hover_text_color = cosmoswp_ifset($product_remove_text_color['text-hover-color']);
            if (!empty($product_remove_text_hover_bg_color)) {
                $product_remove_text_hover_css .= 'color:' . $product_remove_text_hover_text_color . ' !important;';
            }

            if (!empty($product_remove_text_hover_css)) {
                $product_remove_text_hover_dynamic_color
                    = '.cwp-edd-active #edd_checkout_cart .edd_cart_remove_item_btn:hover {
    ' . $product_remove_text_hover_css . ';
	}';
                $edd_dynamic_css['all'] .= $product_remove_text_hover_dynamic_color;
            }

            /* edd error message */
            $edd_error_message_css = '';

            /*error message color*/
            $edd_error_message_color = cosmoswp_get_theme_options('edd-notice-error-color-options');
            $edd_error_message_color = json_decode($edd_error_message_color, true);

            $edd_error_message_bg_color = cosmoswp_ifset($edd_error_message_color['background-color']);
            if ($edd_error_message_bg_color) {
                $edd_error_message_css .= 'background:' . $edd_error_message_bg_color . ';';
            }
            $edd_error_message_text_color = cosmoswp_ifset($edd_error_message_color['text-color']);
            if ($edd_error_message_text_color) {
                $edd_error_message_css .= 'color:' . $edd_error_message_text_color . ';';
            }
            $edd_error_message_border_color = cosmoswp_ifset($edd_error_message_color['border-color']);
            if ($edd_error_message_border_color) {
                $edd_error_message_css .= 'border-color:' . $edd_error_message_border_color . ';';
            }

            if (!empty($edd_error_message_css)) {
                $edd_error_message_dynamic_css
                    = '.cwp-edd-active .edd_form .edd-alert-error {
		' . $edd_error_message_css . '
	}';
                $edd_dynamic_css['all'] .= $edd_error_message_dynamic_css;
            }

            /* edd info message */
            $edd_info_message_css = '';

            /*info message color*/
            $edd_info_message_color = cosmoswp_get_theme_options('edd-notice-info-color-options');
            $edd_info_message_color = json_decode($edd_info_message_color, true);

            $edd_info_message_bg_color = cosmoswp_ifset($edd_info_message_color['background-color']);
            if ($edd_info_message_bg_color) {
                $edd_info_message_css .= 'background:' . $edd_info_message_bg_color . ';';
            }
            $edd_info_message_text_color = cosmoswp_ifset($edd_info_message_color['text-color']);
            if ($edd_info_message_text_color) {
                $edd_info_message_css .= 'color:' . $edd_info_message_text_color . ';';
            }
            $edd_info_message_border_color = cosmoswp_ifset($edd_info_message_color['border-color']);
            if ($edd_info_message_border_color) {
                $edd_info_message_css .= 'border-color:' . $edd_info_message_border_color . ';';
            }

            if (!empty($edd_info_message_css)) {
                $edd_info_message_dynamic_css
                    = '.cwp-edd-active .edd_form .edd-alert-info {
		' . $edd_info_message_css . '
	}';
                $edd_dynamic_css['all'] .= $edd_info_message_dynamic_css;
            }

            /* edd success message */
            $edd_success_message_css = '';

            /*success message color*/
            $edd_success_message_color = cosmoswp_get_theme_options('edd-notice-success-color-options');
            $edd_success_message_color = json_decode($edd_success_message_color, true);

            $edd_success_message_bg_color = cosmoswp_ifset($edd_success_message_color['background-color']);
            if ($edd_success_message_bg_color) {
                $edd_success_message_css .= 'background:' . $edd_success_message_bg_color . ';';
            }
            $edd_success_message_text_color = cosmoswp_ifset($edd_success_message_color['text-color']);
            if ($edd_success_message_text_color) {
                $edd_success_message_css .= 'color:' . $edd_success_message_text_color . ';';
            }
            $edd_success_message_border_color = cosmoswp_ifset($edd_success_message_color['border-color']);
            if ($edd_success_message_border_color) {
                $edd_success_message_css .= 'border-color:' . $edd_success_message_border_color . ';';
            }

            if (!empty($edd_success_message_css)) {
                $edd_success_message_dynamic_css
                    = '.cwp-edd-active .edd_form .edd-alert-success {
		' . $edd_success_message_css . '
	}';
                $edd_dynamic_css['all'] .= $edd_success_message_dynamic_css;
            }

            /*Edd Archive List media width*/
            $edd_list_image_width    = cosmoswp_get_theme_options('edd-archive-list-media-width');
            $edd_list_image_width    = json_decode($edd_list_image_width, true);
            $image_width_desktop_css = $edd_list_image_width['desktop'] . '%';
            $image_width_tablet_css  = $edd_list_image_width['tablet'] . '%';
            $image_width_css         = $edd_list_image_width['mobile'] . '%';
            if ($image_width_css) {
                $edd_list_image_width_all_dynamic_css
                    = '
    .cwp-edd-active .cosmoswp-edd-grid-row.cwp-list .edd-download .cwp-list-image-box.cwp-list-image-box {
         width:' . $image_width_css . ';
    }';
                $edd_dynamic_css['all'] .= $edd_list_image_width_all_dynamic_css;
            }
            if ($image_width_css) {
                $edd_list_content_width_all_dynamic_css
                    = '
     .cwp-edd-active .cosmoswp-edd-grid-row.cwp-list .edd-download .cwp-product-content {
 		 width: ' . $image_width_css . ';
 	}';
                $edd_dynamic_css['all'] .= $edd_list_content_width_all_dynamic_css;
            }

            /*for Tablet*/
            if ($image_width_tablet_css) {
                $edd_list_image_width_tablet_dynamic_css
                    = '
    .cwp-edd-active .cosmoswp-edd-grid-row.cwp-list .edd-download .cwp-list-image-box.cwp-list-image-box {
         width:' . $image_width_tablet_css . ';
    }';
                $edd_dynamic_css['tablet'] .= $edd_list_image_width_tablet_dynamic_css;


            }
            if ($image_width_tablet_css) {
                $edd_list_content_width_tablet_dynamic_css
                    = '
     .cwp-edd-active .cosmoswp-edd-grid-row.cwp-list .edd-download .cwp-product-content {
          width:calc(100% - ' . $image_width_tablet_css . ' - 30px);
     }';
                $edd_dynamic_css['tablet'] .= $edd_list_content_width_tablet_dynamic_css;
            }

            /*for Desktop*/
            if ($image_width_desktop_css) {
                $edd_list_image_width_desktop_dynamic_css
                    = '
    .cwp-edd-active .cosmoswp-edd-grid-row.cwp-list .edd-download .cwp-list-image-box.cwp-list-image-box {
         width:' . $image_width_desktop_css . ';
    }';
                $edd_dynamic_css['desktop'] .= $edd_list_image_width_desktop_dynamic_css;
            }
            if ($image_width_desktop_css) {
                $edd_list_content_width_desktop_dynamic_css
                    = '
     .cwp-edd-active .cosmoswp-edd-grid-row.cwp-list .edd-download .cwp-product-content {
          width:calc(100% - ' . $image_width_desktop_css . ' - 30px);
     }';
                $edd_dynamic_css['desktop'] .= $edd_list_content_width_desktop_dynamic_css;
            }

            /* product toolbar */
            $product_toolbar = cosmoswp_get_theme_options('edd-product-toolbar');
            $product_toolbar = json_decode($product_toolbar, true);

            /*toolbar bg color*/
            $toolbar_bg_color = cosmoswp_ifset($product_toolbar['background-color']);
            if (!empty($toolbar_bg_color)) {
                $toolbar_bg_color_css
                    = '.cwp-edd-archive-toolbar{
    background-color:' . $toolbar_bg_color . '!important;
	}';
                $edd_dynamic_css['all'] .= $toolbar_bg_color_css;
            }

            /*grid/list color*/
            $grid_list_color = cosmoswp_ifset($product_toolbar['grid-list-color']);
            if (!empty($grid_list_color)) {
                $grid_list_color_css
                    = '.cwp-edd-archive-toolbar .cwp-edd-view-switcher span.dashicons{
    color:' . $grid_list_color . ';
    border-color:' . $grid_list_color . '!important;
	}';
                $edd_dynamic_css['all'] .= $grid_list_color_css;
            }

            /*grid/list hover color*/
            $grid_list_hover_color = cosmoswp_ifset($product_toolbar['grid-list-hover-color']);
            if (!empty($grid_list_hover_color)) {
                $grid_list_color_hover_css
                    = '
    .cwp-edd-archive-toolbar .cwp-edd-view-switcher span.dashicons.active,
.cwp-edd-archive-toolbar .cwp-edd-view-switcher span.dashicons:hover{
    color:' . $grid_list_hover_color . '!important;
    border-color:' . $grid_list_hover_color . '!important;
	}';
                $edd_dynamic_css['all'] .= $grid_list_color_hover_css;
            }


            /* product navigation */
            $product_navigation_css       = '';
            $product_navigation_hover_css = '';

            /*border options*/
            $product_navigation_border = cosmoswp_get_theme_options('edd-product-navigation-styling');
            $product_navigation_border = json_decode($product_navigation_border, true);

            /*box shadow*/
            $product_navigationbx_shadow_css = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($product_navigation_border['box-shadow-css']), 'desktop');
            if (strpos($product_navigationbx_shadow_css, 'px') !== false) {
                $product_navigationbxshadow_color = cosmoswp_ifset($product_navigation_border['box-shadow-color']);
                $product_navigationbx_shadow      = $product_navigationbx_shadow_css . ' ' . $product_navigationbxshadow_color;
                $product_navigation_css           .= '-webkit-box-shadow:' . $product_navigationbx_shadow . ';';
                $product_navigation_css           .= '-moz-box-shadow:' . $product_navigationbx_shadow . ';';
                $product_navigation_css           .= 'box-shadow:' . $product_navigationbx_shadow . ';';
            }

            /*border style*/
            $product_navigation_border_style = cosmoswp_ifset($product_navigation_border['border-style']);
            if ('none' !== $product_navigation_border_style) {

                $product_navigation_css .= 'border-style:' . $product_navigation_border_style . ';';
                //border width
                $product_navigation_border_width = cosmoswp_cssbox_values_inline(cosmoswp_ifset($product_navigation_border['border-width']), 'desktop');
                if (strpos($product_navigation_border_width, 'px') !== false) {
                    $product_navigation_css .= 'border-width:' . $product_navigation_border_width . ';';
                }
                //border color
                $product_navigation_border_color = cosmoswp_ifset($product_navigation_border['border-color']);
                if ($product_navigation_border_color) {
                    $product_navigation_css .= 'border-color:' . $product_navigation_border_color . ';';
                }
            }

            /*border radius*/
            $product_navigation_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($product_navigation_border['border-radius']), 'desktop');
            if (strpos($product_navigation_border_radius, 'px') !== false) {
                $product_navigation_css .= 'border-radius:' . $product_navigation_border_radius . ';';
            }

            /*pagination color*/
            $product_pagination_color = cosmoswp_get_theme_options('edd-product-pagination-color-options');
            $product_pagination_color = json_decode($product_pagination_color, true);

            $pagination_bg_color = cosmoswp_ifset($product_pagination_color['background-color']);
            if ($pagination_bg_color) {
                $product_navigation_css .= 'background:' . $pagination_bg_color . ';';
            }
            $pagination_text_color = cosmoswp_ifset($product_pagination_color['text-color']);
            if ($pagination_text_color) {
                $product_navigation_css .= 'color:' . $pagination_text_color . ';';
            }

            /*concat product navigation css in all css*/
            if (!empty($product_navigation_css)) {
                $product_navigation_dynamic_css
                    = '
    .cwp-edd-active .cwp-edd-pagination .pagination .nav-links .page-numbers,
    .cwp-edd-active .edd_pagination .page-numbers{
		' . $product_navigation_css . '
	}';
                $edd_dynamic_css['all'] .= $product_navigation_dynamic_css;
            }

            $pagination_bg_hover_color = cosmoswp_ifset($product_pagination_color['background-hover-color']);
            if ($pagination_bg_hover_color) {
                $product_navigation_hover_css .= 'background:' . $pagination_bg_hover_color . ';';
                $edd_dynamic_css['all']
                    .= '  
    .cwp-edd-active .cwp-edd-pagination .pagination .nav-links .page-numbers.current,
    .cwp-edd-active .cwp-edd-pagination .pagination .nav-links .page-numbers:hover,
    .cwp-edd-active .cwp-edd-pagination .pagination .nav-links .page-numbers:focus,
    .cwp-edd-active .edd_pagination .page-numbers.current,
    .cwp-edd-active .edd_pagination .page-numbers:focus,
    .cwp-edd-active .edd_pagination .page-numbers:hover {
        border-color:' . $pagination_bg_hover_color . ';
    }';
            }
            $pagination_text_hover_color = cosmoswp_ifset($product_pagination_color['text-hover-color']);
            if ($pagination_text_hover_color) {
                $product_navigation_hover_css .= 'color:' . $pagination_text_hover_color . ';';
            }

            /*concat product navigation css in all css*/
            if (!empty($product_navigation_hover_css)) {
                $product_navigation_dynamic_hover_css
                    = '
    .cwp-edd-active .cwp-edd-pagination .pagination .nav-links .page-numbers.current,
    .cwp-edd-active .cwp-edd-pagination .pagination .nav-links .page-numbers:hover,
    .cwp-edd-active .cwp-edd-pagination .pagination .nav-links .page-numbers:focus,
    .cwp-edd-active .edd_pagination .page-numbers.current,
    .cwp-edd-active .edd_pagination .page-numbers:focus,
    .cwp-edd-active .edd_pagination .page-numbers:hover {
		' . $product_navigation_hover_css . '
	}';
                $edd_dynamic_css['all'] .= $product_navigation_dynamic_hover_css;
            }

            return $edd_dynamic_css;
        }
        /**
         * Callback functions for dynamic_css,
         * Add Woocommerce dynamic css
         *
         * @since    1.0.0
         * @access   public
         *
         * @param object $dynamic_css
         * @return array
         */
        public function dynamic_css( $dynamic_css ) {

            $edd_dynamic_css = $this->get_dynamic_css();
            if (is_array($dynamic_css) && !empty($dynamic_css)) {
                $all_css = array_merge_recursive($dynamic_css, $edd_dynamic_css);
                return $all_css;
            } else {
                return $edd_dynamic_css;
            }
        }
    }
endif;

/**
 * Create Instance for CosmosWP_Edd_Advanced_Styling
 *
 * @since    1.0.0
 * @access   public
 *
 * @param
 * @return object
 */
if (!function_exists('cosmoswp_edd_advanced_styling')) {

    function cosmoswp_edd_advanced_styling() {

        return CosmosWP_Edd_Advanced_Styling::instance();
    }

    cosmoswp_edd_advanced_styling()->run();
}