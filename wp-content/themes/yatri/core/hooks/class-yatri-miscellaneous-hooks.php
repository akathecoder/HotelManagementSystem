<?php
/**
 * Yatri_Miscellaneous_Hooks setup
 *
 * @package Yatri_Miscellaneous_Hooks
 * @since   1.0.0
 */

/**
 * Main Yatri_Miscellaneous_Hooks Class.
 *
 * @class Yatri_Miscellaneous_Hooks
 */
class Yatri_Miscellaneous_Hooks
{


    public function __construct()
    {
        add_filter('the_title', array($this, 'yatri_remove_pipe'));
        add_filter('document_title_parts', array($this, 'yatri_remove_title_pipe'));
        add_filter('post_class', array($this, 'post_class'));
        add_filter('kses_allowed_protocols', array($this, 'ss_allow_skype_protocol'));
        add_action('mantrabrain_theme_fontawesome_list', array($this, 'font_awesome'));


    }


    public function font_awesome()
    {
        return Mantrabrain_Theme_Helper::font_awesome_icon_list();
    }

    public function ss_allow_skype_protocol($protocols)
    {
        $protocols[] = 'skype';
        return $protocols;
    }

    function yatri_remove_title_pipe($title)
    {
        $title['title'] = $this->yatri_remove_pipe($title['title'], true);
        return $title;
    }


    function yatri_remove_pipe($title, $force = false)
    {
        if ($force || (is_page() && !is_front_page())) {

            $title = str_replace("\|", "&exception", $title);
            $arr = explode('|', $title);

            $title = str_replace('&exception', '|', $arr[0]);
        }

        return $title;

    }

    public function post_class($classes)
    {

        # Add no thumbnail class when its search page
        if (yatri_is_search_page() && ('post' !== get_post_type() && !has_post_thumbnail())) {
            $classes[] = 'no-thumbnail';
        }
        return $classes;
    }


}

new Yatri_Miscellaneous_Hooks();