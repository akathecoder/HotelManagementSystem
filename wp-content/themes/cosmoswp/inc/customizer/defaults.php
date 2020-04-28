<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 *  Default Theme layout options
 *
 * @since CosmosWP 1.0.0
 *
 * @param null
 * @return array $cosmoswp_theme_layout
 *
 */
if (!function_exists('cosmoswp_get_default_theme_options')) :
    function cosmoswp_get_default_theme_options() {

        $default_theme_options = array(

            /*Header top options*/
            'header-top-options' => 'hide',
            'ajax-show-more'     => '',
            'ajax-no-more'       => '',
        );

        return apply_filters('cosmoswp_default_theme_options', $default_theme_options);
    }

    cosmoswp_get_default_theme_options();
endif;

/**
 * Get theme options
 *
 * @since CosmosWP 1.0.0
 *
 * @param null
 * @return mixed cosmoswp_theme_options
 *
 */
if (!function_exists('cosmoswp_get_theme_options')) :
    function cosmoswp_get_theme_options($key = '') {
        if (!empty($key)) {
            $cosmoswp_default_theme_options = cosmoswp_get_default_theme_options();
            $cosmoswp_get_theme_options     = get_theme_mod($key, isset($cosmoswp_default_theme_options[$key])?$cosmoswp_default_theme_options[$key]:'');
            return apply_filters( 'cosmoswp_'.$key, $cosmoswp_get_theme_options );
        }
        return false;
    }
endif;