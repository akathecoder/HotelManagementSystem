<?php
/**
 * Yatri_Bottom_Header_Hooks setup
 *
 * @package Yatri_Bottom_Header_Hooks
 * @since   1.0.0
 */

/**
 * Main Yatri_Bottom_Header_Hooks Class.
 *
 * @class Yatri_Bottom_Header_Hooks
 */
class Yatri_Bottom_Header_Hooks
{


    public function __construct()
    {
        add_filter('yatri_bottom_header', array($this, 'bottom_header'), 11);
    }


    public function bottom_header()
    {
        $show = (boolean)yatri_get_header_option('show_bottom_header');
        if ($show) {
            get_template_part('template-parts/header/header', 'bottom');
        }

    }


}

new Yatri_Bottom_Header_Hooks();