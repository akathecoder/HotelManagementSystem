<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Codify
 */

?>
	<?php 
	/**
	 * Hook - codify_action_doctype.
	 *
	 * @hooked codify_doctype -  10
	 */
	do_action( 'codify_action_doctype' );
	?>

<head>
	<?php 
	/**
	 * Hook - codify_action_head
	 *
	 * @hooked codify_head - 10
	 */
	do_action( 'codify_action_head' );
	?>

	<?php wp_head(); ?>

</head>

<body <?php codify_schema_body(); ?><?php body_class(); ?>>
	<?php 
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} ?>
	<?php 
	/**
	 * Hook - codify_action_before
	 *
	 * @hooked codify_page_start - 10
	 */
	do_action( 'codify_action_before' );

	/**
	 * Hook - codify_action_before_header
	 *
	 * @hooked codify_header_start - 10
	 */
	do_action( 'codify_action_before_header' );

	/**
	 * Hook - codify_action_header
	 *
	 * @hooked codify_top_header - 10
	 */
	do_action( 'codify_action_header' );


	/**
	 * Hook - codify_action_after_header
	 *
	 * @hooked codify_header_end - 10
	 */
	do_action( 'codify_action_after_header' );

	/**
	 * Hook - codify_action_before_content
	 *
	 * @hooked codify_content_start - 10
	 */
	do_action( 'codify_action_before_content' );			
	?>