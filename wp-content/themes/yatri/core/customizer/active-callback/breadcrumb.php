<?php
if (!function_exists('yatri_is_breadcrumb_enabled')) {

    function yatri_is_breadcrumb_enabled()
    {
        $show = (boolean)yatri_get_header_option('show_breadcrumb');

        if ($show) {

            return true;
        }
        return false;

    }
}