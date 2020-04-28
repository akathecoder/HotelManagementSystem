<?php

class Yatri_WooCommerce_Dynamic_Style
{
    public function __construct()
    {
        add_filter('yatri_all_dynamic_css', array($this, 'woo_css'));
    }

    public function woo_css($css)
    {
        $woo_css = ' ';

        $primary_color = esc_attr(yatri_get_option('primary_color'));

        $secondary_color = esc_attr(yatri_get_option('secondary_color'));

        if ($primary_color != '#4285f4') {

            $woo_css .= '
            
            .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit,
            .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt,
            .woocommerce div.product .woocommerce-tabs ul.tabs li{
                background-color:' . $primary_color . ';
            }
            
            ';
        }
        if ($secondary_color != '#0b51c5') {

            $woo_css .= '
            .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit:hover,
            .woocommerce span.onsale
            {
              background-color:' . $secondary_color . ';
            }
            .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus,
            .woocommerce #reviews #comments ol.commentlist li img.avatar,
            .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt:hover,
            .woocommerce a.button:disabled:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled[disabled]:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled[disabled]:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled[disabled]:hover{
             
             background:' . $secondary_color . ';

            }
            .woocommerce nav.woocommerce-pagination ul li,
            .woocommerce div.product .woocommerce-tabs ul.tabs li,
            .woocommerce div.product .woocommerce-tabs ul.tabs::before{
                border-color:' . $secondary_color . ';
            }
            .woocommerce ul.products li.product .price{
                color:' . $secondary_color . ';
            }
            .woocommerce-cart .cart-collaterals .cart_totals tr td, .woocommerce-cart .cart-collaterals .cart_totals tr th, .woocommerce-checkout .cart-collaterals .cart_totals tr td, .woocommerce-checkout .cart-collaterals .cart_totals tr th, #add_payment_method .cart-collaterals .cart_totals tr td, #add_payment_method .cart-collaterals .cart_totals tr th{
                border-top-color:' . $secondary_color . ';
            }
            
            ';
        }

        $css .= $woo_css;

        return $css;
    }

}

new Yatri_WooCommerce_Dynamic_Style();