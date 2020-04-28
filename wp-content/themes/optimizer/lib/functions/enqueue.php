<?php
/**
 * The CSS/JS ENQUEUE functions for OPTIMIZER
 *
 * Stores all the ENQUEUE Functions of the template.
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
 
/****************** LOAD THEME CSS & JS (FRONT-END) ******************/
function optimizer_css_js() { 
	if ( !is_admin() ) {
		//**********LOAD THEME CSS**********
		wp_enqueue_style( 'optimizer-style', get_stylesheet_uri());
		wp_enqueue_style( 'optimizer-style-core', get_template_directory_uri().'/style_core.css', 'style_core');
		wp_enqueue_style('optimizer-icons',get_template_directory_uri().'/assets/fonts/font-awesome.css', 'font_awesome' );
		wp_enqueue_style('optimizer-animated_css',get_template_directory_uri().'/assets/css/animate.min.css', 'animated_css' );
		if ( is_rtl() ) { 
			wp_enqueue_style('optimizer-rtl_css',get_template_directory_uri().'/assets/css/rtl.css', 'rtl_css' ); 
		}
		//**********LOAD THEME JS**********
		wp_enqueue_script('hoverIntent');
		wp_enqueue_script('optimizer_js',get_template_directory_uri().'/assets/js/optimizer.js', array('jquery'), true);
		wp_enqueue_script('optimizer_otherjs',get_template_directory_uri().'/assets/js/other.js', array('jquery'), true);
		global $optimizer; if ( ! empty ( $optimizer['post_lightbox_id'] ) ) {wp_enqueue_script('optimizer_lightbox',get_template_directory_uri().'/assets/js/magnific-popup.js', array('jquery'), true);}
		
		//Load Coment Reply Javascript
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
		
		if ( is_page() || is_single() ) {
			//Load Gallery Javascript
			global $optimizer; global $post; $content = $post->post_content; 
			if (!empty( $optimizer['post_gallery_id'] ) && has_shortcode( $content, 'gallery' ) ) {
				wp_enqueue_script('optimizer_gallery',get_template_directory_uri().'/assets/js/gallery.js', array('jquery'), true);
			}
		}
		
	}
}	
add_action('wp_enqueue_scripts', 'optimizer_css_js');


/****************** DYNAMIC CSS & JS ******************/
//Include Dynamic Stylesheet 
if ( !is_admin() ) {
	require(get_template_directory() . '/template_parts/custom-style.php');
}

//Load RAW Java Scripts 
add_action('wp_footer', 'optimizer_load_js');
function optimizer_load_js() {
if ( !is_admin() ) {
	require(get_template_directory() . '/template_parts/custom-javascript.php');
}
}

/****************** ADMIN CSS & JS ******************/
//Load ADMIN CSS & JS SCRIPTS
function optimizer_admin_cssjs($hook) {
		wp_enqueue_style('adminFontAwesome',get_template_directory_uri().'/assets/fonts/font-awesome.css');
      wp_enqueue_style( 'optimizer_backend', get_template_directory_uri() . '/assets/css/backend.css' );
      global $current_user;$user_id = $current_user->ID;
		if ( ! get_user_meta($user_id, 'optimizer_brave_ignore') && current_user_can('edit_theme_options') ) { 
         wp_enqueue_script( 'optimizer_admin', get_template_directory_uri() . '/assets/js/admin.js' );
      }
		//WIDGETS
		if( 'widgets.php' == $hook || 'post.php' == $hook ){
			wp_enqueue_style( 'wp-color-picker' );        
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_script( 'optimizer_widgets', get_template_directory_uri() . '/assets/js/widgets.js' );
		}
}
add_action( 'admin_enqueue_scripts', 'optimizer_admin_cssjs' );

?>