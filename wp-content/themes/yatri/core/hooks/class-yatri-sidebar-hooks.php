<?php
/**
 * Yatri_Sidebar_Hooks setup
 *
 * @package Yatri_Sidebar_Hooks
 * @since   1.0.0
 */

/**
 * Main Yatri_Sidebar_Hooks Class.
 *
 * @class Yatri_Sidebar_Hooks
 */
class Yatri_Sidebar_Hooks
{

    public function __construct()
    {

        add_action('yatri_before_main_wrap', array($this, 'before_main_wrap'));
        add_action('yatri_after_main_wrap', array($this, 'after_main_wrap'));

    }

    public function before_main_wrap()
    {
        $layout = yatri_page_layout();

        if ('yatri_left_sidebar' == $layout || 'yatri_both_sidebar' == $layout) {

            get_sidebar('left');
        }
    }

    public function after_main_wrap()
    {
        $layout = yatri_page_layout();

        if ('yatri_right_sidebar' == $layout || 'yatri_both_sidebar' == $layout) {

            get_sidebar();
        }
    }

}

new Yatri_Sidebar_Hooks();