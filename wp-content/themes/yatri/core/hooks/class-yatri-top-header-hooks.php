<?php
/**
 * Yatri_Top_Header_Hooks setup
 *
 * @package Yatri_Top_Header_Hooks
 * @since   1.0.0
 */

/**
 * Main Yatri_Top_Header_Hooks Class.
 *
 * @class Yatri_Top_Header_Hooks
 */
class Yatri_Top_Header_Hooks
{


    public function __construct()
    {
        add_action('yatri_top_header', array($this, 'top_header_part'), 11);

    }


    public function top_header_part()
    {

        $show_top_header = (boolean)yatri_get_header_option('show_top_header');
        if ($show_top_header) {
            get_template_part('template-parts/header/header', 'top');
        }


    }


}

new Yatri_Top_Header_Hooks();