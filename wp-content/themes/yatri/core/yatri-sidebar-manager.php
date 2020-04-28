<?php
/**
 * Sidebar Manager functions
 *
 * @package     Yatri
 * @author      Yatri
 * @copyright   Copyright (c) 2019, Yatri
 * @link        https://mantrabrain.com/
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Site Sidebar
 */
if (!function_exists('yatri_page_layout')) {

    /**
     * Site Sidebar
     *
     * Default 'right sidebar' for overall site.
     */
    function yatri_page_layout()
    {

        $yatri_sidebar = 'yatri_right_sidebar';

        if (yatri_is_archive_page()) {

            $yatri_sidebar = yatri_get_option('blog_archive_page_layout');

        } else if (is_singular() && !is_page()) {

            global $post;

            $post_id = isset($post->ID) ? $post->ID : '';

            $yatri_sidebar = yatri_get_option('single_post_layout');

            if ('' != $post_id) {

                $yatri_sidebar_meta = get_post_meta($post_id, 'yatri_sidebar_location', true);


                $yatri_sidebar = !is_null($yatri_sidebar_meta) && $yatri_sidebar_meta != '' && $yatri_sidebar_meta != 'default' ? $yatri_sidebar_meta : $yatri_sidebar;
            }


        } else if (is_home() && !is_front_page()) {

            $yatri_sidebar = 'yatri_left_sidebar';

        } else if (is_page()) {

            global $post;

            $post_id = isset($post->ID) ? $post->ID : '';

            $yatri_sidebar = yatri_get_option('page_layout');

            if ('' != $post_id) {

                $yatri_sidebar_meta = get_post_meta($post_id, 'yatri_sidebar_location', true);

                $yatri_sidebar = !is_null($yatri_sidebar_meta) && $yatri_sidebar_meta != '' && $yatri_sidebar_meta != 'default' ? $yatri_sidebar_meta : $yatri_sidebar;
            }

        } else if (
            is_page_template('templates/destination-template.php') ||
            is_page_template('templates/activity-template.php')
        ) {

            $yatri_sidebar = 'yatri_full_width';

        } else {


            $yatri_sidebar = 'yatri_right_sidebar';
        }


        return apply_filters('yatri_page_layout', $yatri_sidebar);
    }
}
