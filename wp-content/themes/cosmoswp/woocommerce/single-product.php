<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @version 2.0.0
 *
 * @package CosmosWP
 */

$breadcrumb_before_content = cosmoswp_get_theme_options('breadcrumb-before-content');
get_header();
do_action('cosmoswp_action_before_woocommerce_single');
if ($breadcrumb_before_content) {
    do_action('cosmoswp_action_breadcrumb');
}
do_action('cosmoswp_action_woocommerce_single');
do_action('cosmoswp_action_after_woocommerce_single');
get_footer();