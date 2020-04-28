<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('cosmoswp_header_layout_if_horizontal')) :

    /**
     * Check if header layout normal
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_header_layout_if_horizontal() {
        $option_list    = array('normal', 'cwp-overlay-fixed');
        $choosed_option = cosmoswp_get_theme_options('header-position-options');
        if ( in_array( $choosed_option, $option_list ) ) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_sidebar_1_custom_widget_setting')) :

    /**
     * Check if header layout normal
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_footer_sidebar_1_custom_widget_setting() {
        if ('custom' == cosmoswp_get_theme_options('footer-sidebar-1-widget-setting-option')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_header_layout_if_horizontal_and_sticky_enable')) :

    /**
     * Check if header layout normal & sticky not disable
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_header_layout_if_horizontal_and_sticky_enable() {
        $header_layout_options = cosmoswp_get_theme_options('header-position-options');
        $sticky_header_options = cosmoswp_get_theme_options('sticky-header-options');
        if (('normal' == $header_layout_options || 'cwp-overlay-fixed' == $header_layout_options) && ($sticky_header_options != 'disable')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_sticky_header_color_options_enable')) :

    /**
     * Check if Sticky Header Color Enabled
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_sticky_header_color_options_enable() {
        $header_layout_options = cosmoswp_get_theme_options('header-position-options');
        $sticky_header_options = cosmoswp_get_theme_options('sticky-header-options');
        $sticky_header_color_options = cosmoswp_get_theme_options('enable-sticky-header-color-options');
        if (('normal' == $header_layout_options || 'cwp-overlay-fixed' == $header_layout_options) &&
            $sticky_header_options != 'disable' && $sticky_header_color_options ) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_header_layout_if_horizontal_and_scrollup_down')) :

    /**
     * Check if header layout normal & sticky not disable/normal
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_header_layout_if_horizontal_and_scrollup_down() {
        $header_layout_options = cosmoswp_get_theme_options('header-position-options');
        $sticky_header_options = cosmoswp_get_theme_options('sticky-header-options');
        if (('normal' == $header_layout_options) || ('cwp-overlay-fixed' == $header_layout_options)) {
            if (($sticky_header_options == 'scroll-down') || ($sticky_header_options == 'scroll-up')) {

                return true;
            }
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_header_layout_if_vertical')) :

    /**
     * Check if header layout vertical
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_header_layout_if_vertical() {
        if ('vertical-header' == cosmoswp_get_theme_options('header-position-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_sticky_header_if_scroll_down_up')) :

    /**
     * Check if sticky header scroll-down or scroll-up
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_sticky_header_if_scroll_down_up() {
        $sticky_header_options = cosmoswp_get_theme_options('sticky-header-options');
        if (('scroll-down' == $sticky_header_options ||
                'scroll-up' == $sticky_header_options) && ('disable' != $sticky_header_options)
        ) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_main_height_if_custom')) :

    /**
     * Check if main height if custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_footer_main_height_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('footer-main-height-option')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_top_widget_title_typography_if_custom')) :

    /**
     * Check if footer top typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_footer_top_widget_title_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('footer-top-widget-title-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_menu_title_typography_if_custom')) :

    /**
     * Check if footer menu title typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_footer_menu_title_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('footer-menu-title-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_top_widget_content_typography_if_custom')) :

    /**
     * Check if footer main typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_footer_top_widget_content_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('footer-top-widget-content-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_general_bg_option_color')) :

    /**
     * Check if footer main typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_footer_general_bg_option_color() {
        if ('color' == cosmoswp_get_theme_options('footer-general-bg-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_general_bg_option_image')) :

    /**
     * Check if footer main typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_footer_general_bg_option_image() {
        if ('image' == cosmoswp_get_theme_options('footer-general-bg-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_general_bg_enable_overlay')) :

    /**
     * Check if footer main typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_footer_general_bg_enable_overlay() {
        if (true == cosmoswp_get_theme_options('enable-footer-general-bg-overlay-color')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_main_widget_title_typography_if_custom')) :

    /**
     * Check if footer main typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_footer_main_widget_title_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('footer-main-widget-title-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_main_widget_content_typography_if_custom')) :

    /**
     * Check if footer main typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_footer_main_widget_content_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('footer-main-widget-content-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_bottom_widget_title_typography_if_custom')) :

    /**
     * Check if footer bottom typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_footer_bottom_widget_title_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('footer-bottom-widget-title-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_bottom_widget_content_typography_if_custom')) :

    /**
     * Check if footer bottom typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_footer_bottom_widget_content_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('footer-bottom-widget-content-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_check_if_advertisment_image')) :

    /**
     * Check if advertisment image
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_check_if_advertisment_image() {
        $cosmoswp_customizer_all_values = cosmoswp_get_theme_options();
        if ('image' == get_theme_mod('advertisement-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_check_if_advertisment_custom')) :

    /**
     * Check if advertisment custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_check_if_advertisment_custom() {
        $cosmoswp_customizer_all_values = cosmoswp_get_theme_options();
        if ('custom' == get_theme_mod('advertisement-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_menu_indicator_if_text_or_both')) :

    /**
     * Check if menu Indicator Text
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_menu_indicator_if_text_or_both() {
        $option_list    = array('text', 'both');
        $choosed_option = get_theme_mod('menu-icon-open-icon-options');
        if ( in_array( $choosed_option, $option_list ) ) {
        	return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_menu_close_indicator_if_text_or_both')) :

    /**
     * Check if menu Indicator Text
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_menu_close_indicator_if_text_or_both() {
        $option_list    = array('text', 'both');
        $choosed_option = get_theme_mod('menu-icon-close-icon-options');
        if ( in_array( $choosed_option, $option_list ) ) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_menu_indicator_if_icon_or_both')) :

    /**
     * Check if DD menu Indicator Icon
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_menu_indicator_if_icon_or_both() {
        $option_list    = array('icon', 'both');
        $choosed_option = cosmoswp_get_theme_options('menu-icon-open-icon-options');
        if (in_array($choosed_option, $option_list)) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_menu_close_indicator_if_icon_or_both')) :

    /**
     * Check if DD menu Indicator Icon
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_menu_close_indicator_if_icon_or_both() {
        $option_list    = array('icon', 'both');
        $choosed_option = cosmoswp_get_theme_options('menu-icon-close-icon-options');
        if (in_array($choosed_option, $option_list)) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_menu_indicator_if_both')) :

    /**
     * Check if menu Indicator Both
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_menu_indicator_if_both() {

        if ('both' == cosmoswp_get_theme_options('menu-icon-open-icon-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_menu_close_indicator_if_both')) :

    /**
     * Check if menu Indicator Both
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_menu_close_indicator_if_both() {

        if ('both' == cosmoswp_get_theme_options('menu-icon-close-icon-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_menu_icon_typography_if_custom')) :

    /**
     * Check if menu typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_menu_icon_typography_if_custom() {

        if (('custom' == cosmoswp_get_theme_options('menu-open-icon-typography-options')) && ('icon' != cosmoswp_get_theme_options('menu-icon-open-icon-options'))) {

            return true;
        }
        return false;
    }
endif;


if (!function_exists('cosmoswp_menu_close_typography_if_custom')) :

    /**
     * Check if menu typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_menu_close_typography_if_custom() {

        if (('custom' == cosmoswp_get_theme_options('menu-icon-close-text-typography-options')) && ('icon' != cosmoswp_get_theme_options('menu-icon-close-icon-options'))) {

            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_off_canvas_indicator_if_text_or_both')) :

    /**
     * Check if off Canvas Indicator Text or both
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_off_canvas_indicator_if_text_or_both() {
        $option_list    = array('text', 'both');
        $choosed_option = get_theme_mod('off-canvas-open-icon-options');
        if (in_array($choosed_option, $option_list)) {

            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_off_canvas_close_indicator_if_text_or_both')) :

    /**
     * Check if off Canvas Indicator Text or both
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_off_canvas_close_indicator_if_text_or_both() {
        $option_list    = array('text', 'both');
        $choosed_option = get_theme_mod('off-canvas-close-icon-options');
        if (in_array($choosed_option, $option_list)) {

            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_off_canvas_indicator_if_icon_or_both')) :

    /**
     * Check if off Canvas Indicator Icon
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_off_canvas_indicator_if_icon_or_both() {
        $option_list    = array('icon', 'both');
        $choosed_option = cosmoswp_get_theme_options('off-canvas-open-icon-options');
        if (in_array($choosed_option, $option_list)) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_off_canvas_close_indicator_if_icon_or_both')) :

    /**
     * Check if off Canvas Indicator Icon
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_off_canvas_close_indicator_if_icon_or_both() {
        $option_list    = array('icon', 'both');
        $choosed_option = cosmoswp_get_theme_options('off-canvas-close-icon-options');
        if (in_array($choosed_option, $option_list)) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_off_canvas_indicator_if_both')) :

    /**
     * Check if off Canvas Indicator Both
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_off_canvas_indicator_if_both() {

        if ('both' == cosmoswp_get_theme_options('off-canvas-open-icon-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_off_canvas_icon_typography_if_custom')) :

    /**
     * Check if menu typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_off_canvas_icon_typography_if_custom() {

        if (('custom' == cosmoswp_get_theme_options('off-canvas-open-text-typography-options')) && ('icon' != cosmoswp_get_theme_options('off-canvas-open-icon-options'))) {

            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_off_canvas_close_icon_typography_if_custom')) :

    /**
     * Check if menu typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_off_canvas_close_icon_typography_if_custom() {

        if (('custom' == cosmoswp_get_theme_options('off-canvas-close-text-typography-options')) && ('icon' != cosmoswp_get_theme_options('off-canvas-close-icon-options'))) {

            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_dd_search_typography_if_custom')) :

    /**
     * Check if dd search typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_dd_search_typography_if_custom() {

        if ('custom' == cosmoswp_get_theme_options('dd-search-typography-options')) {

            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_normal_search_typography_if_custom')) :

    /**
     * Check if normal search typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_normal_search_typography_if_custom() {

        if ('custom' == cosmoswp_get_theme_options('normal-search-typography-options')) {

            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_top_header_bg_if_color')) :

    /**
     * Check if top header bg options color
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_top_header_bg_if_color() {
        $cosmoswp_customizer_all_values = cosmoswp_get_theme_options('top-header-background-options');
        if ('color' == get_theme_mod('top-header-background-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_top_header_bg_if_image')) :

    /**
     * Check if top header bg options image
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_top_header_bg_if_image() {
        $cosmoswp_customizer_all_values = cosmoswp_get_theme_options();
        if ('image' == get_theme_mod('top-header-background-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_main_header_bg_if_color')) :

    /**
     * Check if main header bg options color
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_main_header_bg_if_color() {
        $cosmoswp_customizer_all_values = cosmoswp_get_theme_options();
        if ('color' == get_theme_mod('main-header-background-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_main_header_bg_if_image')) :

    /**
     * Check if main header bg options image
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_main_header_bg_if_image() {
        $cosmoswp_customizer_all_values = cosmoswp_get_theme_options();
        if ('image' == get_theme_mod('main-header-background-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_bottom_header_bg_if_color')) :

    /**
     * Check if bottom header bg options color
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_bottom_header_bg_if_color() {
        $cosmoswp_customizer_all_values = cosmoswp_get_theme_options();
        if ('color' == get_theme_mod('bottom-header-background-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_bottom_header_bg_if_image')) :

    /**
     * Check if bottom header bg options image
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_bottom_header_bg_if_image() {
        $cosmoswp_customizer_all_values = cosmoswp_get_theme_options();
        if ('image' == get_theme_mod('bottom-header-background-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_responsive_menu_if_custom_breakpoints')) :

    /**
     * Check if custom break points
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_responsive_menu_if_custom_breakpoints() {
        $cosmoswp_customizer_all_values = cosmoswp_get_theme_options();
        if ('custom' == $cosmoswp_customizer_all_values['responsive-menu-breakpoints']) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_responsive_menu_style_if_off_canvas')) :

    /**
     * Check if responsive menu style off canvas
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_responsive_menu_style_if_off_canvas() {
        $cosmoswp_customizer_all_values = cosmoswp_get_theme_options();
        if ('off-canvas' == $cosmoswp_customizer_all_values['responsive-menu-style']) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_responsive_menu_style_if_dropdown')) :

    /**
     * Check if responsive menu style dropdown
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_responsive_menu_style_if_dropdown() {
        $cosmoswp_customizer_all_values = cosmoswp_get_theme_options();
        if ('dropdown' == $cosmoswp_customizer_all_values['responsive-menu-style']) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_responsive_menu_style_if_full_screen')) :

    /**
     * Check if responsive menu style full screen
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_responsive_menu_style_if_full_screen() {
        $cosmoswp_customizer_all_values = cosmoswp_get_theme_options();
        if ('full-screen' == $cosmoswp_customizer_all_values['responsive-menu-style']) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_if_default_header_top')) :

    /**
     * Check if header top default
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_if_default_header_top() {
        $cosmoswp_customizer_all_values = cosmoswp_get_theme_options();
        if ('default' == $cosmoswp_customizer_all_values['header-top-options']) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_if_html_header_top')) :

    /**
     * Check if header top html
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_if_html_header_top() {
        $cosmoswp_customizer_all_values = cosmoswp_get_theme_options();
        if ('html' == $cosmoswp_customizer_all_values['header-top-options']) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_if_not_hide_header_top')) :

    /**
     * Check if header top not hide
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_if_not_hide_header_top() {
        $cosmoswp_customizer_all_values = cosmoswp_get_theme_options();
        if ('hide' != $cosmoswp_customizer_all_values['header-top-options']) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_if_display_header_top_post')) :

    /**
     * Check if header top default and post display not hide
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_if_display_header_top_post() {
        $cosmoswp_customizer_all_values = cosmoswp_get_theme_options();
        if ('default' == $cosmoswp_customizer_all_values['header-top-options'] &&
            'hide' != $cosmoswp_customizer_all_values['header-top-posts-display-options']
        ) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_if_not_hide_copyright_layout')) :

    /**
     * Check if not hide copyright
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_if_not_hide_copyright_layout() {
        $cosmoswp_customizer_all_values = cosmoswp_get_theme_options();
        if ('hide' != $cosmoswp_customizer_all_values['footer-copyright-layout-option']) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_if_custom_power_text')) :

    /**
     * Check if custom power text
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_if_custom_power_text() {
        $cosmoswp_customizer_all_values = cosmoswp_get_theme_options();
        if ('hide' != $cosmoswp_customizer_all_values['footer-copyright-layout-option'] &&
            'custom' == $cosmoswp_customizer_all_values['footer-power-text-option']
        ) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_active_callback_front_page_header')) :

    /**
     * Check if front-page-header
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for front-page-header*/
    function cosmoswp_active_callback_front_page_header() {
        if (1 != cosmoswp_get_theme_options('front-page-hide-content')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_header_top_bg_if_custom')) :

    /**
     * Check if header top bg custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for front-page-header*/
    function cosmoswp_header_top_bg_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('header-top-bg-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_global_sidebar_widget_bg_if_custom')) :

    /**
     * Custom Global sidebar Widget
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for global-sidebar-widget*/
    function cosmoswp_global_sidebar_widget_bg_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('global-sidebar-widget-bg-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_top_bg_if_custom')) :

    /**
     * Check if footer top bg custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for front-page-footer*/
    function cosmoswp_footer_top_bg_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('footer-top-bg-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_header_top_height_if_custom')) :

    /**
     * Check if header top height
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for header top height*/
    function cosmoswp_header_top_height_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('header-top-height-option')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_top_height_if_custom')) :

    /**
     * Check if footer top height
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for footer top height*/
    function cosmoswp_footer_top_height_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('footer-top-height-option')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_header_main_height_if_custom')) :

    /**
     * Check if header main height
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for header main height*/
    function cosmoswp_header_main_height_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('header-main-height-option')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_header_main_bg_if_custom')) :

    /**
     * Check if headar main bg custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for header main bg */
    function cosmoswp_header_main_bg_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('header-main-bg-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_main_bg_if_custom')) :

    /**
     * Check if footer main bg custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for footer main bg */
    function cosmoswp_footer_main_bg_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('footer-main-bg-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_header_bottom_height_if_custom')) :

    /**
     * Check if header bottom height custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for header bottom height*/
    function cosmoswp_header_bottom_height_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('header-bottom-height-option')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_bottom_height_if_custom')) :

    /**
     * Check if footer bottom height custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for footer bottom height*/
    function cosmoswp_footer_bottom_height_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('footer-bottom-height-option')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_header_bottom_bg_if_custom')) :

    /**
     * Check if header bottom bg custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for header bg custom*/
    function cosmoswp_header_bottom_bg_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('header-bottom-bg-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_bottom_bg_if_custom')) :

    /**
     * Check if footer bottom bg custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for footer bg custom*/
    function cosmoswp_footer_bottom_bg_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('footer-bottom-bg-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_secondary_menu_if_custom_menu')) :

    /**
     * Check if front-page-header
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for front-page-header*/
    function cosmoswp_secondary_menu_if_custom_menu() {
        if ('custom' == cosmoswp_get_theme_options(cosmoswp_header_builder()->secondary_menu)) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_primary_menu_if_custom_menu')) :

    /**
     * Check if primary menu custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for primary menu selector*/
    function cosmoswp_primary_menu_if_custom_menu() {
        if ('custom' == cosmoswp_get_theme_options(cosmoswp_header_builder()->primary_menu)) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_menu_typography_if_custom_selected')) :

    /**
     * Check if footer menu Typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for Sticky footer Typography  menu*/
    function cosmoswp_footer_menu_typography_if_custom_selected() {
        if ('custom' == cosmoswp_get_theme_options('footer-menu-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_site_title_typography_if_custom')) :

    /**
     * Check if site title typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for site title typography options*/
    function cosmoswp_site_title_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('site-identity-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_secondary_menu_typography_if_custom')) :

    /**
     * Check if secondary menu typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for sconday menu typography options*/
    function cosmoswp_secondary_menu_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('secondary-menu-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_secondary_submenu_typography_if_custom')) :

    /**
     * Check if secondary submenu item  typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for sconday submenu item typography options*/
    function cosmoswp_secondary_submenu_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('secondary-menu-submenu-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_primary_menu_typography_if_custom')) :

    /**
     * Check if primary menu typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for secondary menu typography options*/
    function cosmoswp_primary_menu_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('primary-menu-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_primary_submenu_typography_if_custom')) :

    /**
     * Check if primary submenu item  typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for primary submenu item typography options*/
    function cosmoswp_primary_submenu_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('primary-menu-submenu-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_button_one_typography_if_custom')) :

    /**
     * Check if button one typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for button one typography options*/
    function cosmoswp_button_one_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('button-one-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_site_button_typography_if_custom')) :

    /**
     * Check if button one typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for typography options*/
    function cosmoswp_site_button_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('site-button-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_copyright_typography_if_custom')) :

    /**
     * Check if copyright typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for copyright typography options*/
    function cosmoswp_copyright_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('footer-copyright-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_contact_info_title_typography_if_custom')) :

    /**
     * Check if contact-info title typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for contact-info typography options*/
    function cosmoswp_contact_info_title_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('contact-info-title-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_contact_info_subtitle_typography_if_custom')) :

    /**
     * Check if contact-info subtitle typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for contact-info typography options*/
    function cosmoswp_contact_info_subtitle_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('contact-info-subtitle-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_html_typography_if_custom')) :

    /**
     * Check if html1 typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for html1 typography options*/
    function cosmoswp_html_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('html-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_html_typography_if_custom')) :

    /**
     * Check if footer html typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for footer html typography options*/
    function cosmoswp_footer_html_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('footer-html-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_validate_category_not_empty')) {

    /**
     * Validate Category is not empty
     *
     * @since cosmoswp 1.0.0
     *
     * @param $validity
     * @param $value
     * @return mixed
     *
     */
    function cosmoswp_validate_category_not_empty($validity, $value) {
        $terms = get_terms(
            array(
                'taxonomy'   => 'category',
                'hide_empty' => true,
            )
        );
        if (($value == 'from-category') && (empty($terms) || is_wp_error($terms))) {
            $validity->add('required', esc_html__('Category is empty', 'cosmoswp'));
        }
        return $validity;
    }
}

if (!function_exists('cosmoswp_global_widget_title_typography_if_custom')) :

    /**
     * Check if widget title typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for widget title typography options*/
    function cosmoswp_global_widget_title_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('global-widget-title-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_global_widget_content_typography_if_custom')) :

    /**
     * Check if widget content typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for widget content typography options*/
    function cosmoswp_global_widget_content_typography_if_custom() {
        if ('custom' == cosmoswp_get_theme_options('global-widget-content-typography-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_display_style_fixed')) :

    /**
     * Check if footer display style fixed
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for footer display style*/
    function cosmoswp_footer_display_style_fixed() {
        if ('fixed-footer' == cosmoswp_get_theme_options('footer-display-style')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_button_one_enable_icon')) :

    /**
     * Enable Button one icon
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for Icon properties style*/
    function cosmoswp_button_one_enable_icon() {
        if ( cosmoswp_get_theme_options('button-one-enable-icon')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_banner_section_display_enable')) :

    /**
     * Enable Banner in main content area
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for banner section in main content area */
    function cosmoswp_banner_section_display_enable() {
        $banner_image_display = cosmoswp_get_theme_options('banner-section-display');
        if ('hide' != $banner_image_display && !empty($banner_image_display)) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_single_custom_banner_title_display_enable')) :

    /**
     * Check banner enabled & Single custom title
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for single banner custom title  in main content area */
    function cosmoswp_single_custom_banner_title_display_enable() {
        $banner_image_display = cosmoswp_get_theme_options('banner-section-display');
        $single_title_options = cosmoswp_get_theme_options('single-banner-section-title');
        if ('hide' != $banner_image_display && $single_title_options == 'custom-title') {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_single_custom_banner_title_tag_active')) :

    /**
     * Check banner enabled & Single custom title
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for single banner custom title  in main content area */
    function cosmoswp_single_custom_banner_title_tag_active() {
        $banner_image_display = cosmoswp_get_theme_options('banner-section-display');
        $single_title_options = cosmoswp_get_theme_options('single-banner-section-title');
        if ('hide' != $banner_image_display && ($single_title_options == 'custom-title' || $single_title_options == 'default' )) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_banner_section_display_color')) :

    /**
     * Enable Banner in main content area
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for banner section in main content area */
    function cosmoswp_banner_section_display_color() {
        $banner_image_display = cosmoswp_get_theme_options('banner-section-display');
        if ('color' == $banner_image_display) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_custom_video_header_pages')) :
    /**
     * Enable Banner video in every pages
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for banner video in all page of the site */
    function cosmoswp_custom_video_header_pages($active) {
        $banner_section_display = cosmoswp_get_theme_options('banner-section-display');
        if ('video' == $banner_section_display) {
            return true;
        }
        return false;
    }

endif;

if (!function_exists('cosmoswp_banner_section_display_image')) :

    /**
     * Enable Banner and set background image main content
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for banner section when background image set in main content area */
    function cosmoswp_banner_section_display_image() {
        $banner_section_display = cosmoswp_get_theme_options('banner-section-display');
        $banner_condition       = array('normal-image', 'bg-image', 'video');
        if (in_array($banner_section_display, $banner_condition)) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_enable_banner_image_option_bg_image')) :

    /**
     * Enable Banner and set background image main content
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for banner section when background image set in main content area */
    function cosmoswp_enable_banner_image_option_bg_image() {
        $banner_section_display = cosmoswp_get_theme_options('banner-section-display');
        if ('bg-image' == $banner_section_display) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_enable_overlay_active')) :

    /**
     * Overlay Enable Callback
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for banner section when background image and overlay*/
    function cosmoswp_enable_overlay_active() {
        $banner_section_display = cosmoswp_get_theme_options('banner-section-display');
        $overlay_not_display    = array('hide', 'color');
        if (!in_array($banner_section_display, $overlay_not_display)) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_banner_height_activecallback')) :

    /**
     * Video banner height callback
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for video banner  */
    function cosmoswp_banner_height_activecallback() {
        $banner_section_display = cosmoswp_get_theme_options('banner-section-display');
        $banner_condition       = array('video', 'color','bg-image');
        if (in_array($banner_section_display, $banner_condition)) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_breadcrumb_activecallback')) :

    /**
     * Breadcreumb not hidden callback
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for bredcrumb not hidden  */
    function cosmoswp_breadcrumb_activecallback() {
        $breadcrumb_enable = cosmoswp_get_theme_options('cosmoswp-breadcrumb-options');
        if ('disable' != $breadcrumb_enable) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_breadcrumb_With_banner_activecallback')) :

    /**
     * Breadcreumb not hidden callback
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for bredcrumb not hidden  */
    function cosmoswp_breadcrumb_With_banner_activecallback() {
        $breadcrumb_enable = cosmoswp_get_theme_options('cosmoswp-breadcrumb-options');
        if ('disable' != $breadcrumb_enable) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_post_pagination_activecallback')) :

    /**
     * Post Default Pagination callback
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for post pagination not hidden  */
    function cosmoswp_post_pagination_activecallback() {
        $post_pagination_option = cosmoswp_get_theme_options('post-navigation-options');
        if ('default' == $post_pagination_option) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_blog_pagination_active')) :

    /**
     * Blog Pagination active
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for blog pagination not disable  */
    function cosmoswp_blog_pagination_active() {
        $blog_pagination_option = cosmoswp_get_theme_options('blog-navigation-options');
        $option_list            = array('disable', 'default');
        if (!in_array($blog_pagination_option, $option_list)) {

            return true;
        }
        return false;
    }
endif;


if (!function_exists('cosmoswp_blog_layout_column')) :

    /**
     * Blog Pagination active
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for blog pagination not disable  */
    function cosmoswp_blog_layout_column() {
        $blog_layout_option = cosmoswp_get_theme_options('blog-post-view-layout');
        if ($blog_layout_option == 'column-layout') {

            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_blog_numeric_pagination_activecallback')) :

    /**
     * Blog Numeric Pagination callback
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for blog pagination not hidden  */
    function cosmoswp_blog_numeric_pagination_activecallback() {
        $blog_pagination_option = cosmoswp_get_theme_options('blog-navigation-options');
        if ('numeric' == $blog_pagination_option) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_blog_default_pagination_activecallback')) :

    /**
     * Blog Default Pagination callback
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    /*active callback function for blog pagination not hidden  */
    function cosmoswp_blog_default_pagination_activecallback() {
        $blog_pagination_option = cosmoswp_get_theme_options('blog-navigation-options');
        if ('default' == $blog_pagination_option) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_sidebar_2_align')) :

    /**
     * Check if footer sidebar 2 align custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_footer_sidebar_2_align() {
        if ('custom' == cosmoswp_get_theme_options('footer-sidebar-2-widget-setting-option')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_sidebar_3_align')) :

    /**
     * Check if footer sidebar 3 align custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_footer_sidebar_3_align() {
        if ('custom' == cosmoswp_get_theme_options('footer-sidebar-3-widget-setting-option')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_sidebar_4_align')) :

    /**
     * Check if footer sidebar 4 align custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_footer_sidebar_4_align() {
        if ('custom' == cosmoswp_get_theme_options('footer-sidebar-4-widget-setting-option')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_sidebar_5_align')) :

    /**
     * Check if footer sidebar 5 align custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_footer_sidebar_5_align() {
        if ('custom' == cosmoswp_get_theme_options('footer-sidebar-5-widget-setting-option')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_sidebar_6_align')) :

    /**
     * Check if footer sidebar 6 align custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_footer_sidebar_6_align() {
        if ('custom' == cosmoswp_get_theme_options('footer-sidebar-6-widget-setting-option')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_sidebar_7_align')) :

    /**
     * Check if footer sidebar 7 align custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_footer_sidebar_7_align() {
        if ('custom' == cosmoswp_get_theme_options('footer-sidebar-7-widget-setting-option')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_footer_sidebar_8_align')) :

    /**
     * Check if footer sidebar 8 align custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_footer_sidebar_8_align() {
        if ('custom' == cosmoswp_get_theme_options('footer-sidebar-8-widget-setting-option')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_scroll_top_indicator_if_text_or_both')) :

    /**
     * Check if Scroll Top Indicator Text
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_scroll_top_indicator_if_text_or_both() {
        $option_list    = array('text', 'both');
        $choosed_option = get_theme_mod('scroll-top-icon-options');
        if ( in_array( $choosed_option, $option_list ) ) {
            return true;
        }
        return false;
    }
endif;


if (!function_exists('cosmoswp_scroll_top_indicator_if_both')) :

    /**
     * Check if Scroll Top Indicator Both
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_scroll_top_indicator_if_both() {

        if ('both' == cosmoswp_get_theme_options('scroll-top-icon-options')) {
            return true;
        }
        return false;
    }
endif;

if (!function_exists('cosmoswp_scroll_top_indicator_if_icon_or_both')) :

    /**
     * Check if Scroll Top Indicator Icon
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_scroll_top_indicator_if_icon_or_both() {
        $option_list    = array('icon', 'both');
        $choosed_option = cosmoswp_get_theme_options('scroll-top-icon-options');
        if (in_array($choosed_option, $option_list)) {
            return true;
        }
        return false;
    }
endif;



if (!function_exists('cosmoswp_scroll_top_indicator_if_custom')) :

    /**
     * Check if Scroll Top typography custom
     *
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_scroll_top_indicator_if_custom() {

        if (('custom' == cosmoswp_get_theme_options('scroll-top-icon-typography-options')) && ('icon' != cosmoswp_get_theme_options('scroll-top-icon-options'))) {

            return true;
        }
        return false;
    }
endif;