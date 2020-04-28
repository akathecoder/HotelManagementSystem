<?php
/**
 * Yatri_Footer_Hooks setup
 *
 * @package Yatri_Footer_Hooks
 * @since   1.0.0
 */

/**
 * Main Yatri_Footer_Hooks Class.
 *
 * @class Yatri_Footer_Hooks
 */
class Yatri_Footer_Hooks
{

    public function __construct()
    {
        add_action('yatri_top_footer', array($this, 'top_footer'));

    }


    function top_footer()
    {
        $show = (boolean)yatri_get_header_option('show_footer_widgets');
        if ($show) {
            get_template_part('template-parts/footer/top-footer', '');
        }

    }


}

new Yatri_Footer_Hooks();