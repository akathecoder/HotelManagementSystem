<?php

if (!function_exists('yatri_is_bottom_footer_enabled')) {

    function yatri_is_bottom_footer_enabled()
    {
        $show_bottom_footer = (boolean)yatri_get_header_option('show_bottom_footer');

        if ($show_bottom_footer) {

            return true;
        }
        return false;

    }
}
if (!function_exists('yatri_is_bottom_footer_copyright_enabled')) {

    function yatri_is_bottom_footer_copyright_enabled()
    {
        if (!yatri_is_bottom_footer_enabled()) {

            return false;
        }

        $sections = yatri_get_bottom_footer_sections(true);

        if (is_array($sections)) {

            $all_keys = wp_list_pluck($sections, 'section');

            if (in_array('copyright', $all_keys)) {

                return true;
            }

            return false;
        }
        return false;

    }
}

if (!function_exists('yatri_is_bottom_footer_social_enabled')) {

    function yatri_is_bottom_footer_social_enabled()
    {
        if (!yatri_is_bottom_footer_enabled()) {

            return false;
        }

        $sections = yatri_get_bottom_footer_sections(true);

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

if (!function_exists('yatri_is_bottom_footer_button_enabled')) {

    function yatri_is_bottom_footer_button_enabled()
    {
        if (!yatri_is_bottom_footer_enabled()) {

            return false;
        }

        $sections = yatri_get_bottom_footer_sections(true);

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
if (!function_exists('yatri_is_bottom_footer_office_info_enabled')) {

    function yatri_is_bottom_footer_office_info_enabled()
    {
        if (!yatri_is_bottom_footer_enabled()) {

            return false;
        }

        $sections = yatri_get_bottom_footer_sections(true);

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

if (!function_exists('yatri_is_bottom_footer_social_icons_enabled')) {

    function yatri_is_bottom_footer_social_icons_enabled()
    {
        if (!yatri_is_bottom_footer_enabled()) {

            return false;
        }

        $sections = yatri_get_bottom_footer_sections(true);

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
// bottom Header Offcanvas Callback

// Toop Header Nav Enabled
if (!function_exists('yatri_is_bottom_footer_navigation_menu_enabled')) {

    function yatri_is_bottom_footer_navigation_menu_enabled()
    {
        if (!yatri_is_bottom_footer_enabled()) {

            return false;
        }

        $sections = yatri_get_bottom_footer_sections(true);

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


if (!function_exists('yatri_is_bottom_footer_custom_html_enabled')) {

    function yatri_is_bottom_footer_custom_html_enabled()
    {
        if (!yatri_is_bottom_footer_enabled()) {

            return false;
        }

        $sections = yatri_get_bottom_footer_sections(true);

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
