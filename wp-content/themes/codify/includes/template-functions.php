<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Codify
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function codify_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	$layout_style = get_theme_mod( 'layout_style', 'wide' );

	// Boxed layout
	if ( 'boxed' == $layout_style ) {
		$classes[] = 'boxed-layout';
	}
	// Separate layout
	if ( 'separate' == $layout_style ) {
		$classes[] = 'separate-layout';
		if ( get_theme_mod( 'content_box_shadow', true ) ) {
			$classes[] = 'boxed-layout-boxshadow';
		}
	}	

	$site_layout = get_theme_mod( 'site_layout', 'full-width' );

	$classes[] = 'codify-' . esc_attr($site_layout);

	return $classes;
}
add_filter( 'body_class', 'codify_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function codify_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'codify_pingback_header' );
