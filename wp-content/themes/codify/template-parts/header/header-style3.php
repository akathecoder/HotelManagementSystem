<?php
/**
 * Theme Header 
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Codify
 */

?>	
<div class="main-header header-style3">
	<div class="container">	
		<?php
		/**
		 * Hook - codify_site_navigation
		 *
		 * @hooked codify_action_site_navigation - 10
		 */
		do_action( 'codify_action_site_navigation' );	

		/**
		 * Hook - codify_action_header_button
		 *
		 * @hooked codify_header_button - 10
		 */
		do_action( 'codify_action_header_button' );

		/**
		 * Hook - codify_site_branding
		 *
		 * @hooked codify_action_site_branding - 10
		 */
		do_action( 'codify_action_site_branding' );			
		?>
	</div>
</div>

			
