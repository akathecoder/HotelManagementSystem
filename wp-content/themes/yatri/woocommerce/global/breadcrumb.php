<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!empty($breadcrumb)) {

    echo $wrap_before;

    foreach ($breadcrumb as $key => $crumb) {

        echo $before;

        $rel = '';

        $woo_breadcrumb_type = yatri_get_option('woo_breadcrumb_type');

        if ('woo_default' != $woo_breadcrumb_type) {

            $rel = $key == 0 ? 'home' : '';

            $crumb[0] = $key == 0 ? esc_html(yatri_get_option('breadcrumb_home_text')) : $crumb[0];
        }

        if (!empty($crumb[1]) && sizeof($breadcrumb) !== $key + 1) {

            echo '<a href="' . esc_url($crumb[1]) . '" rel="' . esc_attr($rel) . '"><span>' . esc_html($crumb[0]) . '</span></a>';

        } else {
            echo esc_html($crumb[0]);
        }

        echo $after;

        if (sizeof($breadcrumb) !== $key + 1) {
            echo $delimiter;
        }
    }

    echo $wrap_after;

}
