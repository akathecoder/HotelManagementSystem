<?php

if (!function_exists('yatri_logo_has_assigned_on_top_header')) {

    function yatri_logo_has_assigned_on_top_header()
    {
        $logo_on_header = yatri_get_option('logo_on_header');

        if ($logo_on_header == 'top') {

            return true;
        }
        return false;

    }
}


if (!function_exists('yatri_logo_has_assigned_on_mid_header')) {

    function yatri_logo_has_assigned_on_mid_header()
    {
        $logo_on_header = yatri_get_option('logo_on_header');

        if ($logo_on_header == 'mid') {

            return true;
        }
        return false;

    }
}

if (!function_exists('yatri_logo_has_assigned_on_bottom_header')) {

    function yatri_logo_has_assigned_on_bottom_header()
    {
        $logo_on_header = yatri_get_option('logo_on_header');

        if ($logo_on_header == 'bottom') {

            return true;
        }
        return false;

    }
}
