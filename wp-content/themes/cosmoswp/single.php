<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cosmoswp
 */

$breadcrumb_before_content = cosmoswp_get_theme_options('breadcrumb-before-content');
get_header();
do_action('cosmoswp_action_before_post');
if ($breadcrumb_before_content) {
    do_action('cosmoswp_action_breadcrumb');
}
do_action('cosmoswp_action_single_post', get_the_ID());
do_action('cosmoswp_action_after_post', get_the_ID());
get_footer();