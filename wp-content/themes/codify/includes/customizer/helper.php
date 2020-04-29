<?php 
/**
 * Helper functions used for customizer
 *
 * @package Codify
 */

if ( !function_exists( 'codify_menu_list' ) ):
	/**
	 * Provides an array of Menu slug => name for dropdown.
	 *
	 * @return array
	 */
	function codify_menu_list() {

		$all_menus            = get_terms( array(
			'taxonomy'   => 'nav_menu',
			'hide_empty' => true,
		) );
		$menu_options         = array();
		$menu_options['none'] = esc_html__( 'None', 'codify' );

		foreach ( $all_menus as $menu_item ) {
			$menu_options[ $menu_item->slug ] = esc_html( $menu_item->name );
		}

		return $menu_options;

	}
endif;
