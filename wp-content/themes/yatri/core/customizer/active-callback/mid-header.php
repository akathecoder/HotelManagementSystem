<?php

if (!function_exists('yatri_is_mid_header_enabled')) {

    function yatri_is_mid_header_enabled()
    {
        $show_mid_header = (boolean)yatri_get_header_option('show_mid_header');

        if ($show_mid_header) {

            return true;
        }
        return false;

    }
}

if (!function_exists('yatri_is_mid_header_social_enabled')) {

    function yatri_is_mid_header_social_enabled()
    {
        if (!yatri_is_mid_header_enabled()) {

            return false;
        }

        $sections = yatri_get_mid_header_sections(true);

        if (is_array($sections)) {

            $all_keys = wp_list_pluck($sections, 'section');

            if (in_array('social_icons', $all_keys)) {

                return true;
            }

            return false;
        }
        return false;

    }
}

if (!function_exists('yatri_is_mid_header_branding_enabled')) {

    function yatri_is_mid_header_branding_enabled()
    {
        if (!yatri_is_mid_header_enabled()) {

            return false;
        }

        $sections = yatri_get_mid_header_sections(true);

        if (is_array($sections)) {

            $all_keys = wp_list_pluck($sections, 'section');

            if (in_array('site_branding', $all_keys)) {

                return true;
            }

            return false;
        }
        return false;

    }
}

if (!function_exists('yatri_is_mid_header_branding_logo_title_enabled')) {

    function yatri_is_mid_header_branding_logo_title_enabled()
    {
        if (!yatri_is_mid_header_enabled()) {

            return false;
        }
        if (!yatri_is_mid_header_branding_enabled()) {

            return false;
        }

        $identity = yatri_get_option('mid_header_site_identity');

        if ('logo-title-text' == $identity) {
            return true;
        }
        return false;

    }
}

if (!function_exists('yatri_is_mid_header_search_form_enabled')) {

    function yatri_is_mid_header_search_form_enabled()
    {
        if (!yatri_is_mid_header_enabled()) {

            return false;
        }

        $sections = yatri_get_mid_header_sections(true);

        if (is_array($sections)) {

            $all_keys = wp_list_pluck($sections, 'section');

            if (in_array('search_form', $all_keys)) {

                return true;
            }

            return false;
        }
        return false;

    }
}
if (!function_exists('yatri_is_mid_header_button_enabled')) {

    function yatri_is_mid_header_button_enabled()
    {
        if (!yatri_is_mid_header_enabled()) {

            return false;
        }

        $sections = yatri_get_mid_header_sections(true);

        if (is_array($sections)) {

            $all_keys = wp_list_pluck($sections, 'section');

            if (in_array('button', $all_keys)) {

                return true;
            }

            return false;
        }
        return false;

    }
}
if (!function_exists('yatri_is_mid_header_office_info_enabled')) {

    function yatri_is_mid_header_office_info_enabled()
    {
        if (!yatri_is_mid_header_enabled()) {

            return false;
        }

        $sections = yatri_get_mid_header_sections(true);

        if (is_array($sections)) {

            $all_keys = wp_list_pluck($sections, 'section');

            if (in_array('office_information', $all_keys)) {

                return true;
            }

            return false;
        }
        return false;

    }
}

if (!function_exists('yatri_is_mid_header_social_icons_enabled')) {

    function yatri_is_mid_header_social_icons_enabled()
    {
        if (!yatri_is_mid_header_enabled()) {

            return false;
        }

        $sections = yatri_get_mid_header_sections(true);

        if (is_array($sections)) {

            $all_keys = wp_list_pluck($sections, 'section');

            if (in_array('social_icons', $all_keys)) {

                return true;
            }

            return false;
        }
        return false;

    }
}
// Top Header Offcanvas Callback
if (!function_exists('yatri_is_mid_header_offcanvas_enabled')) {

    function yatri_is_mid_header_offcanvas_enabled()
    {
        if (!yatri_is_mid_header_enabled()) {

            return false;
        }

        $sections = yatri_get_mid_header_sections(true);

        if (is_array($sections)) {

            $all_keys = wp_list_pluck($sections, 'section');

            if (in_array('offcanvas_menu', $all_keys)) {

                return true;
            }

            return false;
        }
        return false;

    }
}
// Toop Header Nav Enabled
if (!function_exists('yatri_is_mid_header_navigation_menu_enabled')) {

    function yatri_is_mid_header_navigation_menu_enabled()
    {
        if (!yatri_is_mid_header_enabled()) {

            return false;
        }

        $sections = yatri_get_mid_header_sections(true);

        if (is_array($sections)) {

            $all_keys = wp_list_pluck($sections, 'section');

            if (in_array('menu', $all_keys)) {

                return true;
            }

            return false;
        }
        return false;

    }
}

if (!function_exists('yatri_is_mid_header_is_offcanvas_type_nav')) {

    function yatri_is_mid_header_is_offcanvas_type_nav()
    {
        if (!yatri_is_mid_header_enabled()) {

            return false;
        }

        if (!yatri_is_mid_header_offcanvas_enabled()) {
            return false;
        }
        $offcanvas_type = yatri_get_option('mid_header_offcanvas_menu_type');

        if ($offcanvas_type == 'menu') {

            return true;
        }
        return false;

    }
}


if (!function_exists('yatri_is_mid_header_is_offcanvas_type_sidebar')) {

    function yatri_is_mid_header_is_offcanvas_type_sidebar()
    {
        if (!yatri_is_mid_header_enabled()) {

            return false;
        }
        if (!yatri_is_mid_header_offcanvas_enabled()) {

            return false;
        }
        $offcanvas_type = yatri_get_option('mid_header_offcanvas_menu_type');

        if ($offcanvas_type == 'sidebar') {

            return true;
        }
        return false;

    }
}
if (!function_exists('yatri_logo_on_header_is_not_mid')) {

    function yatri_logo_on_header_is_not_mid()
    {
        if (!yatri_is_mid_header_enabled()) {

            return false;
        }
        if (!yatri_is_mid_header_branding_enabled()) {

            return false;
        }
        $logo_on_header = yatri_get_option('logo_on_header');

        if ($logo_on_header == 'mid') {

            return false;
        }
        return true;

    }
}
if (!function_exists('yatri_is_mid_header_custom_html_enabled')) {

    function yatri_is_mid_header_custom_html_enabled()
    {
        if (!yatri_is_mid_header_enabled()) {

            return false;
        }

        $sections = yatri_get_mid_header_sections(true);

        if (is_array($sections)) {

            $all_keys = wp_list_pluck($sections, 'section');

            if (in_array('custom_html', $all_keys)) {

                return true;
            }

            return false;
        }
        return false;

    }
}
