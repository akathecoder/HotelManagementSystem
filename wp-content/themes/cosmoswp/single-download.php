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
do_action('cosmoswp_action_before_edd_single');
if ($breadcrumb_before_content) {
    do_action('cosmoswp_action_breadcrumb');
}
do_action('cosmoswp_action_edd_single');
do_action('cosmoswp_action_after_edd_single', get_the_ID());
get_footer();