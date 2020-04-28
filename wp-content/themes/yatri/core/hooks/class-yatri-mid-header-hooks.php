<?php
/**
 * Yatri_Mid_Header_Hooks setup
 *
 * @package Yatri_Mid_Header_Hooks
 * @since   1.0.0
 */

/**
 * Main Yatri_Mid_Header_Hooks Class.
 *
 * @class Yatri_Mid_Header_Hooks
 */
class Yatri_Mid_Header_Hooks
{


    public function __construct()
    {
        add_action('yatri_mid_header', array($this, 'mid_header_part'), 11);

    }


    public function mid_header_part()
    {

        $show = (boolean)yatri_get_header_option('show_mid_header');
        if ($show) {
            get_template_part('template-parts/header/header', 'mid');
        }


    }


}

new Yatri_Mid_Header_Hooks();