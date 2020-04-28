<?php


if (!function_exists('yatri_is_not_both_sidebar')) {

    function yatri_is_not_both_sidebar($control)
    {
        if (yatri_get_option('global_sidebar') == 'both') {
            return false;
        } else {
            return true;
        }
    }
}

if (!function_exists('yatri_is_main_boxed_layout')) {

    function yatri_is_main_boxed_layout($control)
    {
        if (yatri_get_option('main_layout') == 'boxed') {
            return true;
        } else {
            return false;
        }
    }
}
if (!function_exists('yatri_is_main_full_width_layout')) {

    function yatri_is_main_full_width_layout($control)
    {
        if (yatri_get_option('main_layout') == 'full_width') {
            return true;
        } else {
            return false;
        }
    }
}
// Archive Page Callback
if (!function_exists('yatri_blog_archive_page_has_thumbnail')) :

    function yatri_blog_archive_page_has_thumbnail($control)
    {
        $yatri_blog_archive_page_content_order = yatri_blog_archive_page_content_order('blog_archive_page_content_order');

        if (is_array($yatri_blog_archive_page_content_order)) {

            if (isset($yatri_blog_archive_page_content_order['thumbnail'])) {

                $disable = isset($yatri_blog_archive_page_content_order['thumbnail']['disable']) ? (boolean)$yatri_blog_archive_page_content_order['thumbnail']['disable'] : false;

                if ($disable) {
                    return false;
                } else {
                    return true;
                }
            }
            return false;
        }
        return false;


    }

endif;

if (!function_exists('yatri_blog_archive_page_has_meta')) :

    function yatri_blog_archive_page_has_meta($control)
    {
        $yatri_blog_archive_page_content_order = yatri_blog_archive_page_content_order('blog_archive_page_content_order');

        if (is_array($yatri_blog_archive_page_content_order)) {

            if (isset($yatri_blog_archive_page_content_order['post_meta'])) {

                $disable = isset($yatri_blog_archive_page_content_order['post_meta']['disable']) ? (boolean)$yatri_blog_archive_page_content_order['post_meta']['disable'] : false;

                if ($disable) {

                    return false;
                } else {
                    return true;
                }
            }
            return false;
        }
        return false;


    }

endif;

if (!function_exists('yatri_blog_archive_page_has_custom_excerpt')) :

    function yatri_blog_archive_page_has_custom_excerpt($control)
    {
        $excerpt_type = yatri_get_option('blog_archive_page_excerpt_type');

        if ($excerpt_type == 'custom' || empty($excerpt_type)) {

            return true;
        }
        return false;


    }

endif;

// End of Archive Page Callback
// Start of Single Post Callback
if (!function_exists('yatri_single_post_has_related_posts')) :

    function yatri_single_post_has_related_posts($control)
    {
        $yatri_single_post_content_order = yatri_single_post_content_order(false);

        if (is_array($yatri_single_post_content_order)) {

            if (isset($yatri_single_post_content_order['related_posts'])) {

                $disable = isset($yatri_single_post_content_order['related_posts']['disable']) ? (boolean)$yatri_single_post_content_order['related_posts']['disable'] : false;

                if ($disable) {

                    return false;
                } else {
                    return true;
                }
            }
            return false;
        }
        return false;


    }

endif;

if (!function_exists('yatri_single_post_related_posts_has_custom_excerpt')) :

    function yatri_single_post_related_posts_has_custom_excerpt($control)
    {
        $excerpt_type = yatri_get_option('single_post_related_posts_excerpt_type');

        if ($excerpt_type == 'custom' || empty($excerpt_type)) {

            return true;
        }
        return false;


    }

endif;


require_once "active-callback/logo-and-branding.php";
require_once "active-callback/breadcrumb.php";
require_once "active-callback/top-header.php";
require_once "active-callback/mid-header.php";
require_once "active-callback/bottom-header.php";
require_once "active-callback/footer-widgets.php";
require_once "active-callback/bottom-footer.php";