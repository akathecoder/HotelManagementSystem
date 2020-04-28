<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CosmosWP
 */
$breadcrumb_before_content = cosmoswp_get_theme_options('breadcrumb-before-content');
get_header();
do_action('cosmoswp_action_before_blog');
if ($breadcrumb_before_content) {
    do_action('cosmoswp_action_breadcrumb');
}
do_action('cosmoswp_action_blog');
do_action('cosmoswp_action_after_blog');
get_footer();



