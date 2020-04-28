<?php
/**
 * Yatri_Bottom_Footer_Hooks setup
 *
 * @package Yatri_Bottom_Footer_Hooks
 * @since   1.0.0
 */

/**
 * Main Yatri_Bottom_Footer_Hooks Class.
 *
 * @class Yatri_Bottom_Footer_Hooks
 */
class Yatri_Bottom_Footer_Hooks
{


    public function __construct()
    {
        add_action('yatri_bottom_footer', array($this, 'bottom_footer'));
    }


    function bottom_footer()
    {
        $show = (boolean)yatri_get_option('show_bottom_footer');
        if ($show) {
            get_template_part('template-parts/footer/bottom-footer', '');
        }

    }


}

new Yatri_Bottom_Footer_Hooks();