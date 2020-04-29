<?php
/**
 * Codify Theme Customizer Config
 *
 * @package Codify
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

/**
 * Customizer Config
 */
if ( ! class_exists( 'Codify_Customizer_Config' ) ) {

	/**
	 * Customizer Fields Loader
	 *
	 * @since 1.0.0
	 */
	class Codify_Customizer_Config {

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
			add_filter( 'kirki/config', array($this, 'codify_kirki_configuration') );
			add_action( 'customize_register', array($this,'codify_customizer_sections') );
			add_action( 'init', array($this,'codify_customizer_function') );
			add_filter( 'kirki_telemetry', '__return_false' );

		}	

		/**
		 * Configuration for Kirki Framework
		 */
		public function codify_kirki_configuration() {
			return array(
				'url_path' => CODIFY_INC_URI . '/kirki/',
			);
		}

		public function codify_customizer_sections( $wp_customize ){

			require CODIFY_CUSTOMIZER_DIR . '/customizer-section.php' ;

			    $wp_customize->add_panel( 'theme_option', array(
			        'priority'    => 10,
			        'title'       => esc_html__( 'Theme Options', 'codify' ),
			    ) );

				$wp_customize->add_section( new Codify_Customize_Section( $wp_customize, 'header_settings',
					array(
						'title'    => esc_html__( 'Header', 'codify' ),
						'panel'    => 'theme_option',
						'priority' => 10,
					)
				) );
				$wp_customize->add_section( new Codify_Customize_Section( $wp_customize, 'top_header_section',
					array(
						'title'    => esc_html__( 'Top Header', 'codify' ),
						'description'	=> esc_html__( 'To change header address, top menu, date, social icon etc..', 'codify' ),
						'section'  => 'header_settings',
						'panel'    => 'theme_option',
						'priority' => 10,
					)
				) );		
				$wp_customize->add_section( new Codify_Customize_Section( $wp_customize, 'main_header_section',
					array(
						'title'			=> esc_html__( 'Header', 'codify' ),
						'priority'		=> 20,		
						'section'  => 'header_settings',
						'panel'    => 'theme_option',
					)
				) );

				$wp_customize->add_section( new Codify_Customize_Section( $wp_customize, 'header_navigation_section',
					array(
						'title'			=> esc_html__( 'Navigation', 'codify' ),
						'priority'		=> 20,		
						'section'  => 'header_settings',
						'panel'    => 'theme_option',
					)
				) );
				$wp_customize->add_section( new Codify_Customize_Section( $wp_customize, 'header_breadcrumbs_section',
					array(
						'title'			=> esc_html__( 'Breadcrumbs', 'codify' ),
						'priority'		=> 20,		
						'section'  => 'header_settings',
						'panel'    => 'theme_option',
					)
				) );								

				$wp_customize->add_section( 'general_section', array(
					'title'			=> esc_html__( 'General Settings', 'codify' ),
					'priority'		=> 25,		
			        'panel'          => 'theme_option',
				) );				

				$wp_customize->add_section( 'archive_post_section', array(
					'title'			=> esc_html__( 'Archive Settings', 'codify' ),
					'priority'		=> 30,		
			        'panel'         => 'theme_option',
				) );					

				$wp_customize->add_section( 'single_post_section', array(
					'title'			=> esc_html__( 'Single Post Settings', 'codify' ),
					'priority'		=> 40,		
			        'panel'         => 'theme_option',
				) );				

				$wp_customize->add_section( 'footer_section', array(
					'title'			=> esc_html__( 'Footer Settings', 'codify' ),
					'priority'		=> 50,		
			        'panel'          => 'theme_option',
				) );
				$wp_customize->add_section( 'scrool_to_top_section', array(
					'title'			=> esc_html__( 'Scroll to Top', 'codify' ),
					'priority'		=> 60,		
			        'panel'          => 'theme_option',
				) );

				$wp_customize->add_section( new Codify_Customize_Section( $wp_customize, 
					'layout_option',
					array(
						'title'    => esc_html__( 'Layout Options', 'codify' ),
						'panel'    => 'theme_option',
						'priority' => 5,
					)
				) );	
				$wp_customize->add_section( new Codify_Customize_Section( $wp_customize, 'sidebar_section',
					array(
						'title'    => esc_html__( 'Sidebar Settings', 'codify' ),
						'section'  => 'layout_option',
						'panel'    => 'theme_option',
						'priority' => 10,
					)
				) );
				$wp_customize->add_section( new Codify_Customize_Section( $wp_customize, 'container_section',
					array(
						'title'    => esc_html__( 'Layout Settings', 'codify' ),
						'section'  => 'layout_option',
						'panel'    => 'theme_option',
						'priority' => 10,
					)
				) );	

				$wp_customize->add_section( new Codify_Customize_Section( $wp_customize, 
					'typography_option',
					array(
						'title'    => esc_html__( 'Typography Options', 'codify' ),
						'panel'    => 'theme_option',
						'priority' => 5,
					)
				) );	
				$wp_customize->add_section( new Codify_Customize_Section( $wp_customize, 'color_section',
					array(
						'title'    => esc_html__( 'Color Settings', 'codify' ),
						'section'  => 'typography_option',
						'panel'    => 'theme_option',
						'priority' => 10,
					)
				) );	
				$wp_customize->add_section( new Codify_Customize_Section( $wp_customize, 'font_section',
					array(
						'title'    => esc_html__( 'Font Family Settings', 'codify' ),
						'section'  => 'typography_option',
						'panel'    => 'theme_option',
						'priority' => 10,
					)
				) );																											

		}	
		/**
		 * Include Customizer Configuration files.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function codify_customizer_function() {
			require CODIFY_CUSTOMIZER_DIR . '/class-customizer-fields.php' ;
			require CODIFY_CUSTOMIZER_DIR . '/helper.php' ;			
		}		
			
	}
}

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Codify_Customizer_Config::get_instance();