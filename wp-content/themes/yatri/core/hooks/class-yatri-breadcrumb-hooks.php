<?php
/**
 * Yatri_Breadcrumb_Hooks setup
 *
 * @package Yatri_Breadcrumb_Hooks
 * @since   1.0.0
 */

/**
 * Main Yatri_Breadcrumb_Hooks Class.
 *
 * @class Yatri_Breadcrumb_Hooks
 */
class Yatri_Breadcrumb_Hooks
{


    public function __construct()
    {
        add_filter('breadcrumb_trail_items', array($this, 'modify_breadcrumb'));
        add_filter('breadcrumb_trail_args', array($this, 'breadcrumb_trail_args'));
        add_filter('breadcrumb_trail_labels', array($this, 'breadcrumb_trail_labels'));
        add_action('yatri_breadcrumb_area', 'yatri_breadcrumb_part');
        add_action('yatri_breadcrumb', 'yatri_breadcrumb');
    }


    function modify_breadcrumb($crumb)
    {

        $i = count($crumb) - 1;
        $title = $crumb[$i];

        $crumb[$i] = $title;

        return $crumb;
    }

    function breadcrumb_trail_args($args)
    {

        $args['show_on_front'] = (boolean)yatri_get_header_option('show_breadcrumb_on_homepage');

        return $args;
    }

    function breadcrumb_trail_labels($labels)
    {
        $labels['home'] = esc_html(yatri_get_option('breadcrumb_home_text'));

        return $labels;


    }

}

new Yatri_Breadcrumb_Hooks();