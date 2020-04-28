<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * CosmosWP Theme Customizer.
 *
 * @package CosmosWP
 * @subpackage CosmosWP
 */

require cosmoswp_file_directory('inc/customizer/defaults.php');
require cosmoswp_file_directory('inc/customizer/options.php');
require cosmoswp_file_directory('inc/customizer/sanitize.php');
require cosmoswp_file_directory('inc/customizer/callback.php');
require cosmoswp_file_directory('inc/customizer/selective-refresh.php');

/*Upgrade to pro*/
if( !function_exists('run_cosmoswp_pro')){
    require cosmoswp_file_directory('inc/customizer/customizer-pro/class-customize.php');
}

/*general setting*/
require cosmoswp_file_directory('inc/customizer/general-setting/general-setting-controller.php');

/*Customizer Builder*/
require cosmoswp_file_directory('inc/library/customizer-builder/class-customizer-builder.php');

/*Header Builder*/
require cosmoswp_file_directory('inc/customizer/header-options/header-builder.php');

/*Advanced Banner*/
require cosmoswp_file_directory('inc/customizer/advance-banner/advanced-banner-controller.php');

/*Main Content */
require cosmoswp_file_directory('inc/customizer/main-content/main-content-controller.php');

/*Footer Builder*/
require cosmoswp_file_directory('inc/customizer/footer-options/footer-builder.php');

/*Blog Builder*/
require cosmoswp_file_directory('inc/customizer/blog-options/blog-builder.php');

/*Post Controller*/
require cosmoswp_file_directory('inc/customizer/post-options/post-builder.php');

/*Page Builder*/
require cosmoswp_file_directory('inc/customizer/page-options/page-builder.php');

/*Theme Options Controller*/
require cosmoswp_file_directory('inc/customizer/theme-options/theme-option-controller.php');

/**
 * Adding different options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cosmoswp_customize_register( $wp_customize ) {

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.logo-title',
			'render_callback' => 'cosmoswp_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.logo-tagline',
			'render_callback' => 'cosmoswp_customize_partial_blogdescription',
		) );

		/*customize_partial_header
		Create array of every setting inside "cosmoswp_header'
		that is responsible for change of html inside #cwp-header-wrap
		*/
		$cosmoswp_header_settings = array(
			'header-top-bg-options',
			'header-top-background-options',

			'header-main-enable-box-width',
			'header-main-bg-options',
			'header-main-background-options',

			'header-bottom-bg-options',
			'header-bottom-background-options',

			/*Header Builder*/
			'cosmoswp_header_builder_section_controller',

			/*Site Identity*/
			'site-logo-position',
			'site-identity-sorting',
			'site-identity-align',

			/*Primary Menu*/
			'primary_menu',
			'primary-menu-custom-menu',
			'primary-menu-disable-sub-menu',
			'primary-menu-align',
			'primary-menu-submenu-display-options',

			/*Secondary Menu*/
			'secondary-menu-custom-menu',
			'secondary-menu-disable-sub-menu',
			'secondary-menu-align',
			'secondary-menu-submenu-display-options',

			/*Social*/
			'header-social-icon-data',
			'header-social-icon-align',

			/*Dropdown Search*/
			'dd-search-placeholder',
			'dd-search-icon-align',
			'dd-search-form-align',

			/*Normal Search*/
			'normal-search-placeholder',

			/*Button One*/
			'button-one-text',
			'button-one-enable-icon',
			'button-one-icon',
			'button-one-icon-position',
			'button-one-url',
			'button-one-open-link-new-tab',
			'button-one-align',
            'button-one-class-name',

			/*Contact Information*/
			'contact-information-data',
			'contact-information-align',

			/*HTML*/
			'html-container',
			'html-container',

			/*Menu Icon*/
			'menu-icon-open-icon-options',
			'menu-open-text',
			'menu-open-icon',
			'menu-icon-open-icon-position',
			'menu-open-icon-align',

            /*Menu Close Icon*/
            'menu-icon-close-icon-options',
            'menu-close-text',
            'menu-close-icon',
            'menu-icon-close-icon-position',
            'menu-icon-close-icon-align',

			/*Sticky Header*/
			'sticky-header-options',
			'sticky-header-animation-options',
			'sticky-header-trigger-height',
			'sticky-header-include-top',
			'sticky-header-include-main',
			'sticky-header-include-bottom',
			'sticky-header-mobile-enable',

		);

        $cosmoswp_header_settings = apply_filters('cosmoswp_customize_partial_header_setting',$cosmoswp_header_settings);

		$wp_customize->selective_refresh->add_partial( 'cosmoswp_header', array(
			'selector'        => '#cwp-header-wrap',
			'settings'        => $cosmoswp_header_settings,
			'render_callback' => 'cosmoswp_customize_partial_header',
		) );

		/*FOOTER OPTIONS*/
		$cosmoswp_footer_settings = array(

			cosmoswp_footer_builder()->builder_section_controller,

			'footer-general-background-options',

			/*footer top*/
			'footer-top-bg-options',
			'footer-top-background-options',
			'footer-top-widget-title-align',
			'footer-top-widget-content-align',

			/*footer main*/
			'footer-main-bg-options',
			'footer-main-background-options',
			'footer-main-widget-title-align',
			'footer-main-widget-content-align',

			/*footer bottom*/
			'footer-bottom-bg-options',
			'footer-bottom-background-options',
			'footer-bottom-widget-title-align',
			'footer-bottom-widget-content-align',

			/*footer menu*/
			'footer-menu-title',
			'footer-menu-custom-menu',
			'footer-menu-display-position',
			'footer-menu-align',
			'footer-menu-title-align',

			/*footer social*/
			'footer_social',
			'footer-social-icon-align',

			/*copyright*/
			'footer_copyright',
			'footer-copyright-align',

			/*Html*/
			'footer-html-container',

		);
        $cosmoswp_footer_settings = apply_filters('cosmoswp_customize_partial_footer_setting',$cosmoswp_footer_settings);

        $wp_customize->selective_refresh->add_partial( 'cosmoswp_footer', array(
			'selector'        => '#cwp-footer-wrap',
			'settings'        => $cosmoswp_footer_settings,
			'render_callback' => 'cosmoswp_customize_partial_footer',
		) );

		/*MAIN CONTENT*/
		/*Banner*/
		$cosmoswp_page_header_settings = array(

			'banner-section-display',
			'single-banner-section-title',
			'single-custom-banner-title',
			'single-banner-title-tag',
			'banner-section-title-align',
			'banner-section-content-position',
			'enable-banner-overlay-color',
		);

        $wp_customize->selective_refresh->add_partial( 'cosmoswp_main_content', array(
			'selector'        => '#cwp-page-header-wrap',
			'settings'        => $cosmoswp_page_header_settings,
			'render_callback' => 'cosmoswp_customize_partial_page_header',
			'container_inclusive' => true,
		) );
	}

	$defaults = cosmoswp_get_default_theme_options();

	require cosmoswp_file_directory('inc/customizer/custom-controls.php');

}
add_action( 'customize_register', 'cosmoswp_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cosmoswp_customize_preview_js() {
    wp_enqueue_script( 'cosmoswp-customizer', COSMOSWP_URL . '/assets/js/customizer.js', array( 'customize-preview','customize-selective-refresh','wp-custom-header' ), '1.1.2', true );
	wp_localize_script( 'cosmoswp-customizer', 'cwp_general', array(
		'ajaxurl'          => admin_url( 'admin-ajax.php' ),
		'wpnonce'          => wp_create_nonce( 'cwp_general_nonce' ),
	) );

}
add_action( 'customize_preview_init', 'cosmoswp_customize_preview_js' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cosmoswp_customize_controls_scripts() {

    if (defined('GUTENTOR_URL')) {
        wp_enqueue_style(
            'fontawesome', // Handle.
            GUTENTOR_URL . '/assets/library/fontawesome/css/all' . GUTENTOR_SCRIPT_PREFIX . '.css',
            array(),
            '5'
        );
    }
    else{
        /*Font-Awesome-master*/
        wp_enqueue_style('fontawesome', COSMOSWP_URL . '/assets/library/Font-Awesome/css/all' . COSMOSWP_SCRIPT_PREFIX . '.css', array(), '5.8.1');
    }

    wp_enqueue_style( 'cosmoswp-general', COSMOSWP_URL . '/inc/customizer/custom-controls/assets/custom-controls.min.css' );

	wp_enqueue_script(
	    'cosmoswp-general',
        COSMOSWP_URL. '/inc/customizer/custom-controls/assets/custom-controls' . COSMOSWP_SCRIPT_PREFIX . '.js',
        array( 'jquery','wp-color-picker','customize-base','jquery-ui-core','jquery-ui-slider','jquery-ui-sortable','jquery-ui-draggable'),
        COSMOSWP_VERSION,
        true
    );
    wp_localize_script( 'cosmoswp-general', 'cwp_general', array(
		'ajaxurl'          => admin_url( 'admin-ajax.php' ),
		'wpnonce'          => wp_create_nonce( 'cwp_general_nonce' ),
	) );

	wp_localize_script( 'cosmoswp-general', 'cosmoswpLocalize', array( 
		'colorPalettes' => cosmoswp_default_color_palettes() ) 
	);
	wp_enqueue_script( 'cosmoswp-customizer-backend', COSMOSWP_URL . '/assets/js/customizer-backend.js', array( 'jquery', 'customize-controls' ), '1.0.0', true );

}
add_action( 'customize_controls_enqueue_scripts', 'cosmoswp_customize_controls_scripts', 1 );

function cosmoswp_export_header_video_settings( $response, $selective_refresh, $partials ) {
    if ( isset( $partials['cosmoswp_main_content'] ) ) {
        $response['custom_header_settings'] = get_header_video_settings();
    }

    return $response;
}

add_filter( 'customize_render_partials_response','cosmoswp_export_header_video_settings', 10, 3 );
