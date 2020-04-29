<?php 
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package Codify
 */

if ( ! function_exists( 'codify_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
	function codify_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
	}
endif;

add_action( 'codify_action_doctype', 'codify_doctype', 10 );

if ( ! function_exists( 'codify_head' ) ) :
	/**
	 * Header Code.
	 *
	 * @since 1.0.0
	 */
	function codify_head() {
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    
	<?php
	}
endif;
add_action( 'codify_action_head', 'codify_head', 10 );

if ( ! function_exists( 'codify_page_start' ) ) :
	/**
	 * Page Start.
	 *
	 * @since 1.0.0
	 */
	function codify_page_start() {
	?>
    <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'codify' ); ?></a>
    <?php
	}
endif;
add_action( 'codify_action_before', 'codify_page_start' );

if ( ! function_exists( 'codify_page_end' ) ) :
	/**
	 * Page End.
	 *
	 * @since 1.0.0
	 */
	function codify_page_end() {
	?></div><!-- #page --><?php
	}
endif;
add_action( 'codify_action_after', 'codify_page_end' );

if ( ! function_exists( 'codify_content_start' ) ) :
	/**
	 * Content Start.
	 *
	 * @since 1.0.0
	 */
	function codify_content_start() {
	?><div id="content" class="site-content"><div class="container"><?php
	}
endif;
add_action( 'codify_action_before_content', 'codify_content_start' );


if ( ! function_exists( 'codify_content_end' ) ) :
	/**
	 * Content End.
	 *
	 * @since 1.0.0
	 */
	function codify_content_end() {
	?></div><!-- .container --></div><!-- #content --><?php
	}
endif;
add_action( 'codify_action_after_content', 'codify_content_end' );


if ( ! function_exists( 'codify_header_start' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function codify_header_start() {
	?><header itemtype="<?php echo esc_url( 'https://schema.org/WPHeader' );?>" itemscope="itemscope" id="masthead" <?php codify_header_classes(); ?> role="banner"><?php
	}
endif;
add_action( 'codify_action_before_header', 'codify_header_start' );

if ( ! function_exists( 'codify_header_end' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function codify_header_end() {
	?></header><!-- #masthead -->
	<?php
	}
endif;
add_action( 'codify_action_after_header', 'codify_header_end' );



if ( ! function_exists( 'codify_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function codify_footer_start() {
	?><footer id="colophon" class="site-footer" role="contentinfo"><div class="site-info">
	<?php
	}
endif;
add_action( 'codify_action_before_footer', 'codify_footer_start' );


if ( ! function_exists( 'codify_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function codify_footer_end() {
	?></div><!-- .site-info --></footer><!-- #colophon -->
	<?php
	}
endif;
add_action( 'codify_action_after_footer', 'codify_footer_end' );