<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Codify
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses codify_header_style()
 */
function codify_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'codify_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'codify_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'codify_custom_header_setup' );

if ( ! function_exists( 'codify_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see codify_custom_header_setup().
	 */
	function codify_header_style() {
		wp_enqueue_style( 'codify-style', get_stylesheet_uri() );
		$breadcrumbs_spearator = get_theme_mod( 'breadcrumbs_spearator','' );
		$header_text_color = get_header_textcolor();
		$header_image       = get_header_image();
		$position = "absolute";
		$custom_css = '';
		$clip ="rect(1px, 1px, 1px, 1px)";
		if ( ! display_header_text() ) {
			$custom_css .= '.site-title, .site-description{
				position: '.$position.';
				clip: '.$clip.'; 
			}';
		} else{

			$custom_css .= '.site-title a, .site-description {
				color: #' . esc_attr($header_text_color) . ';			
			}';
		}
		if ( !empty( $header_image ) ){
			$custom_css .= '.main-header{
							background-image: url( '.esc_url( $header_image ).');
							}';
		}	
		if( !empty( $breadcrumbs_spearator ) ){
			$custom_css .= '.breadcrumbs ul li:before{
							content: "'. wp_kses_post( $breadcrumbs_spearator ) .'" ; 
							}'; // wp_kses_post is used to allowed value like <,> =>
		}	
		wp_add_inline_style( 'codify-style', $custom_css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'codify_header_style' );
