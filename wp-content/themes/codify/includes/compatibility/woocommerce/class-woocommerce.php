<?php
/**
 * WooCommerce Compatibility.
 *
 * @package Codify
 */

// If plugin - 'WooCommerce' not exist then return.
if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

/**
 * Codify WooCommerce Compatibility
 */
if ( ! class_exists( 'Codify_Woocommerce' ) ) :

	/**
	 * Codify WooCommerce Compatibility
	 *
	 * @since 1.0.0
	 */
	class Codify_Woocommerce {

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
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			require_once CODIFY_COMPATIBILITY_DIR . '/woocommerce/woocommerce-functions.php';
			add_action( 'after_setup_theme', array( $this, 'woocommerce_setup' ) );
			add_filter( 'codify_schema_body', array( $this, 'remove_body_schema' ) );
			add_action( 'widgets_init', array( $this, 'woocommerce_widgets_init' ), 15 );
			add_action( 'wp', array( $this, 'woocommerce_init' ), 1 );			
		}

		/**
		 * Setup theme
		 */
		function woocommerce_setup() {

			add_theme_support( 'woocommerce' );
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );

		}


		/**
		 * Remove body schema when using WooCommerce template.
		 * 
		 */
		public function remove_body_schema( $schema ) {
			if ( is_woocommerce() ) {
				$schema = '';
			}

			return $schema;
		}	
		/**
		 * Store widgets init.
		 */
		function woocommerce_widgets_init() {
			register_sidebar( apply_filters('codify_woo_sidebar',array(
				'name'          => esc_html__( 'Woocommerce Sidebar', 'codify' ),
				'id'            => 'woo_sidebar',
				'description'   => esc_html__( 'This sidebar will be used on Single Product page.', 'codify' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title"><span>',
				'after_title'   => '</span></h2>',
				)
			));
		}	
		/**
		 * Remove Woo-Commerce Default actions
		 */
		function woocommerce_init() {
			// Remove Breadcrumb
			remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );	
			remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
			remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
		}
	}
Codify_Woocommerce::get_instance();
endif;

	

