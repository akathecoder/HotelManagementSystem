<?php

defined('ABSPATH') || exit;

/**
 * Yatri_WooCommerce_Hooks class.
 */
class Yatri_WooCommerce_Hooks
{

    /**
     * Theme init.
     */
    public static function init()
    {
        // Remove default wrappers.
        remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
        remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end');

        // Add custom wrappers.
        add_action('woocommerce_before_main_content', array(__CLASS__, 'output_content_wrapper'), 10);
        add_action('woocommerce_after_main_content', array(__CLASS__, 'output_content_wrapper_end'), 10);

        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);


        // Declare theme support for features.
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');

        add_action('template_redirect', array(__CLASS__, 'woo_dynamic_hooks_filter'));

        add_action('yatri_dynamic_sidebar', array(__CLASS__, 'sidebar'));

        add_filter('body_class', array(__CLASS__, 'body_class'));

    }

    public static function body_class($class)
    {

        if (function_exists('is_woocommerce') && is_woocommerce()) {

            if (($key = array_search('yatri-blog-archive-page', $class)) !== false) {
                unset($class[$key]);
            }
            if (($key = array_search('yatri-single-post', $class)) !== false) {
                unset($class[$key]);
            }
            $layouts = array_keys(yatri_layout_options());
            foreach ($layouts as $layout_key) {

                if (($key = array_search($layout_key . '_layout', $class)) !== false) {
                    unset($class[$key]);
                }
            }
        }
        return $class;
    }

    public static function sidebar($sidebar)
    {
        if (is_product_taxonomy() || is_shop()) {
            $sidebar = 'yatri-woo-shop-sidebar';
        } else if (is_product()) {
            $sidebar = 'yatri-woo-single-sidebar';

        }
        return $sidebar;
    }

    public static function woo_dynamic_hooks_filter()
    {
        $show_woo_breadcrumb = yatri_get_option('show_woo_breadcrumb');

        $woo_breadcrumb_type = yatri_get_option('woo_breadcrumb_type');

        if (function_exists('is_woocommerce') && is_woocommerce()) {

            remove_action('yatri_breadcrumb', 'yatri_breadcrumb');

            if ($show_woo_breadcrumb && $woo_breadcrumb_type == 'theme_default') {

                remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

                add_action('yatri_breadcrumb', array(__CLASS__, 'breadcrumb'));


            } else if ($show_woo_breadcrumb && $woo_breadcrumb_type == 'woo_default') {

                remove_action('yatri_breadcrumb_area', 'yatri_breadcrumb_part');

            } else if (!$show_woo_breadcrumb) {

                remove_action('yatri_breadcrumb_area', 'yatri_breadcrumb_part');

                remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
            }
        }

    }


    static function breadcrumb()
    {
        woocommerce_breadcrumb(
            array(
                'wrap_before' => '<nav role="navigation" aria-label="' . esc_attr__('Breadcrumbs', 'yatri') . '" class="yatri-woo-breadcrumb-nav breadcrumb-trail breadcrumbs"><ul class="trail-items">',
                'wrap_after' => '</ul></nav>',
                'before' => '<li class="trail-item">',
                'after' => '</li>',
                'delimiter' => '',
            )
        );

    }

    /**
     * Open wrappers.
     */
    public static function output_content_wrapper()
    {
        ?>
        <section class="wrapper block-grid site-content yatri_list_layout" id="main-content">
        <div class="yat-container">
        <div class="yat-row">
        <div class="yatri-main-wrap yat-col-12 yat-col-md-8" id="main-wrap">
            <div <?php yatri_main_wrap_inner_class(); ?>>
        <?php
    }

    /**
     * Close wrappers.
     */
    public static function output_content_wrapper_end()
    {

        echo '</div></div>';

        get_sidebar();

        echo '</div></div></section>';
    }
}

Yatri_WooCommerce_Hooks::init();
