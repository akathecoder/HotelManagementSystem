<?php

if (!function_exists('yatri_is_footer_widgets_enabled')) {

    function yatri_is_footer_widgets_enabled()
    {
        $show_bottom_footer = (boolean)yatri_get_header_option('show_footer_widgets');

        if ($show_bottom_footer) {

            return true;
        }
        return false;

    }
}
