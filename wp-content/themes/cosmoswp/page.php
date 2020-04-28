<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CosmosWP
 */
$breadcrumb_before_content = cosmoswp_get_theme_options('breadcrumb-before-content');
get_header();
do_action('cosmoswp_action_before_page');
if ($breadcrumb_before_content) {
    do_action('cosmoswp_action_breadcrumb');
}
do_action('cosmoswp_action_page');
do_action('cosmoswp_action_after_page');
get_footer();