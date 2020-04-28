<?php
/**
 * CosmosWP functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CosmosWP
 * @subpackage CosmosWP
 */


/*Define Constants for this theme*/
define( 'COSMOSWP_VERSION', '1.1.2' );
define( 'COSMOSWP_THEME_NAME', 'cosmoswp' );
define( 'COSMOSWP_PATH', get_template_directory() );
define( 'COSMOSWP_URL', get_template_directory_uri() );
define( 'COSMOSWP_SCRIPT_PREFIX', ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min' );
/**
 * Require init.
 */
require trailingslashit( COSMOSWP_PATH ).'inc/init.php';