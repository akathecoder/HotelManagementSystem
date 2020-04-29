<?php
/**
 * Elementor Compatibility File.
 *
 * @package Codify
 */

// If plugin - 'Elementor' not exist then return.
if ( ! class_exists( '\Elementor\Plugin' )  ) {
	return;
}

/**
 * Elementor Compatibility
 */
if ( ! class_exists( 'Codify_Elementor' ) ) :

	/**
	 * Elementor Compatibility
	 *
	 * @since 1.0.0
	 */
	class Codify_Elementor {

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			// Add Theme Support for Header Footer Elementor
			add_action( 'after_setup_theme', array( $this, 'theme_support' ) );

			// Override Header  and Footer templates.
			add_action( 'init', array( $this, 'support' ) );

			add_action( 'body_class', array( $this, 'elementor_default_setting' ) );
			
		}
		public function theme_support() {
			add_theme_support( 'header-footer-elementor' );
		}

		/**
		 * Add header and footer support
		 */
		public function support() {
			if ( function_exists( 'hfe_header_enabled' ) && hfe_header_enabled() ) {
				remove_action( 'codify_action_header', 'codify_top_header', 10 );
				remove_action( 'codify_action_header', 'codify_main_header', 20 );
				add_action( 'codify_action_header', 'hfe_render_header' );
			}
			if ( function_exists( 'hfe_header_enabled' ) && hfe_footer_enabled() ) {
				remove_action( 'codify_action_footer', 'codify_footer', 10 );
				add_action( 'codify_action_footer', 'hfe_render_footer' );
			}
		}	

		/**
		 * Elementor Content layout set as Page Builder
		 *
		 * @return void
		 * @since  1.0.2
		 */
		function elementor_default_setting( $classes ) {
			global $post;
			if ( is_singular() ){
				if ( Codify_Elementor::is_elementor_activated( $post->ID ) ) {
					$classes[] = 'codify-edited-page-builder';
				}
			}
			return $classes;
		}	


		/**
		 * Check is elementor activated.
		 *
		 * @param int $id Post/Page Id.
		 * @return boolean
		 */
		public static function is_elementor_activated( $id ) {
			return \Elementor\Plugin::$instance->db->is_built_with_elementor( $id );
		}	

		/**
		 * Check if Elementor Editor is open.
		 *
		 * @since  1.2.7
		 *
		 * @return boolean True IF Elementor Editor is loaded, False If Elementor Editor is not loaded.
		 */
		private function is_elementor_editor() {
			if ( ( isset( $_REQUEST['action'] ) && 'elementor' == $_REQUEST['action'] ) ||
				isset( $_REQUEST['elementor-preview'] )
			) {
				return true;
			}

			return false;
		}					

	}
Codify_Elementor::get_instance();	

endif;