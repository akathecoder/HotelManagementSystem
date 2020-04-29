<?php
/**
 * Codify Theme Customizer Fields
 *
 * @package  Codify
 */

/**
 * Customizer Loader
 */
if ( ! class_exists( 'Codify_Customizer_Int' ) ) {

	/**
	 * Customizer Fields Loader
	 *
	 * @since 1.0.0
	 */
	class Codify_Customizer_Int {

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
		 */
		public function __construct() {

			/**
			 * Customizer
			 */
			add_filter( 'kirki/fields', array($this,'codify_general_setting') );
		}

		public function codify_general_setting( $fields ){

			require CODIFY_CUSTOMIZER_DIR . '/options-top-header.php' ;
			require CODIFY_CUSTOMIZER_DIR . '/options-main-header.php' ;
			require CODIFY_CUSTOMIZER_DIR . '/options-main-navigation.php' ;
			require CODIFY_CUSTOMIZER_DIR . '/options-breadcrumb.php';
			require CODIFY_CUSTOMIZER_DIR . '/options-general.php';
			require CODIFY_CUSTOMIZER_DIR . '/options-archive.php';
			require CODIFY_CUSTOMIZER_DIR . '/options-single-post.php' ;
			require CODIFY_CUSTOMIZER_DIR . '/options-main-footer.php' ;
			require CODIFY_CUSTOMIZER_DIR . '/options-scoll_to_top.php' ;
			require CODIFY_CUSTOMIZER_DIR . '/options-sidebar.php' ;
			require CODIFY_CUSTOMIZER_DIR . '/options-container.php';
			require CODIFY_CUSTOMIZER_DIR . '/options-color.php';
			require CODIFY_CUSTOMIZER_DIR . '/options-font.php';


			return $fields;
		}		
	}
}

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Codify_Customizer_Int::get_instance();