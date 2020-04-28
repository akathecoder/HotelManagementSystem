<?php
/**
 * check if WooCommerce activated
 */
if (!function_exists('cosmoswp_is_woocommerce_active')) {

    function cosmoswp_is_woocommerce_active() {
        return class_exists('WooCommerce') ? true : false;
    }
}

/**
 * Checks if the current page is a product archive
 * @return boolean
 */
/**
 * check if WooCommerce activated
 */
if (!function_exists('cosmoswp_is_woocommerce_archive')) {
    function cosmoswp_is_woocommerce_archive() {
        if (cosmoswp_is_woocommerce_active()) {
            if (is_shop() || is_product_taxonomy() || is_product_category() || is_product_tag()) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
}


/**
 * Woo Archive Elements Sorting
 *
 * @since CosmosWP 1.0.0
 *
 * @param null
 * @return array $cosmoswp_woo_archive_elements_sorting
 *
 */
if (!function_exists('cosmoswp_woo_archive_elements_sorting')) :
    function cosmoswp_woo_archive_elements_sorting() {
        $cosmoswp_woo_archive_elements_sorting = array(
            'cat'     => esc_html__('Category', 'cosmoswp'),
            'title'   => esc_html__('Title', 'cosmoswp'),
            'image'   => esc_html__('Image', 'cosmoswp'),
            'price'   => esc_html__('Price', 'cosmoswp'),
            'rating'  => esc_html__('Rating', 'cosmoswp'),
            'excerpt' => esc_html__('Excerpt', 'cosmoswp'),
            'content' => esc_html__('Content', 'cosmoswp'),
            'cart'    => esc_html__('Add To Cart', 'cosmoswp'),
        );
        return apply_filters('cosmoswp_woo_archive_elements_sorting', $cosmoswp_woo_archive_elements_sorting);
    }
endif;

/**
 * Woo Single Tab Design
 *
 * @since CosmosWP 1.0.0
 *
 * @param null
 * @return array $cosmoswp_woo_single_tab_design
 *
 */
if (!function_exists('cosmoswp_woo_single_tab_design')) :
    function cosmoswp_woo_single_tab_design() {
        $cosmoswp_woo_single_tab_design = array(
            'default'                => esc_html__('Default', 'cosmoswp'),
            'wc-single-vertical-tab' => esc_html__('Vertical', 'cosmoswp'),
        );
        return apply_filters('cosmoswp_woo_single_tab_design', $cosmoswp_woo_single_tab_design);
    }
endif;

/**
 * Woo Single Elements Sorting
 *
 * @since CosmosWP 1.0.0
 *
 * @param null
 * @return array $cosmoswp_woo_single_elements
 *
 */
if (!function_exists('cosmoswp_woo_single_elements')) :
    function cosmoswp_woo_single_elements() {
        $cosmoswp_woo_single_elements = array(
            'title'    => esc_html__('Title', 'cosmoswp'),
            'rating'   => esc_html__('Rating', 'cosmoswp'),
            'price'    => esc_html__('Price', 'cosmoswp'),
            'excerpt'  => esc_html__('Excerpt', 'cosmoswp'),
            'cart'     => esc_html__('Add To Cart', 'cosmoswp'),
            'metadata' => esc_html__('Metadata', 'cosmoswp'),
        );
        return apply_filters('cosmoswp_woo_single_elements', $cosmoswp_woo_single_elements);
    }
endif;

/**
 * Woo Check if Mobile Primary sidebar popup enabled
 *
 * @since CosmosWP 1.1.2
 *
 * @param null
 * @return boolean
 *
 */
if (!function_exists('cosmoswp_is_wc_archive_psp_sm')) :
    function cosmoswp_is_wc_archive_psp_sm() {
        return cosmoswp_get_theme_options('cwc-archive-psp-sm');
    }
endif;