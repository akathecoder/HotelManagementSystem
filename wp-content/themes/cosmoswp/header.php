<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CosmosWP
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php cosmoswp_html_class(); ?> <?php language_attributes(); ?><?php cosmoswp_schema_markup('html'); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="cwp-offcanvas-body-wrapper" <?php cosmoswp_vertical_header_main_wrap_classes(); ?>>
    <a class="skip-link screen-reader-text" href="#cwp-main"><?php esc_html_e( 'Skip to content', 'cosmoswp' ); ?></a>

    <div class="cwp-menu-wrapper">
            <?php
            do_action('cosmoswp_before_main_wrap');
            ?>
        <div id="cwp-main-wrap" <?php cosmoswp_main_wrap_classes();
        cosmoswp_main_wrap_scroll_data() ?>>
            <?php
            /**
             * cosmoswp_action_before_header hook
             * @since CosmosWP 1.0.0
             *
             * @hooked cosmoswp_skip_to_content - 10
             */
            do_action('cosmoswp_action_before_header');

            /**
             * cosmoswp_action_header hook
             * @since CosmosWP 1.0.0
             *
             * @hooked cosmoswp_header - 10
             */
            do_action('cosmoswp_action_header');

            /**
             * cosmoswp_action_after_header hook
             * @since CosmosWP 1.0.0
             *
             * @hooked null
             */
            do_action('cosmoswp_action_after_header');
            ?>
            <main id="cwp-main" <?php cosmoswp_main_classes(); ?> <?php cosmoswp_schema_markup('main'); ?>>
                <?php do_action('cosmoswp_action_page_header'); ?>

