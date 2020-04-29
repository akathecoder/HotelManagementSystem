<?php
/**
 * Helper functions.
 *
 * @package Codify
 */

if ( ! function_exists( 'codify_fonts_url' ) ) {
	/**
	 * Register Google fonts.
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function codify_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Lora, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Poppins: on or off', 'codify' ) ) {
			$fonts[] = 'Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
		}
		
		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), '//fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
}

if ( ! function_exists( 'codify_custom_logo' ) ) :
	/**
	 *
	 * Mobile Logo
	 */	
	function codify_custom_logo ( $html ) {

	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$url = network_site_url();
	$html = '';
	$html .= sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
	        esc_url( $url  ),
	        wp_get_attachment_image( $custom_logo_id, 'full', false, array(
	            'class'    => 'desktop-custom-logo',
	        ) )
	    );
	$mobile_site_logo = get_theme_mod( 'mobile_site_logo', '' );
	$show_mobile_logo = get_theme_mod( 'show_mobile_logo', false );
	
	if ( true == $show_mobile_logo ):
		if ( !empty( $mobile_site_logo ) ){
			$html .= sprintf( '<a href="%1$s" class="codify-mobile-logo" rel="home" itemprop="url">%2$s</a>',
		        esc_url( $url  ),
		        wp_get_attachment_image( $mobile_site_logo, 'full', false, array(
		            'class'    => 'mobile-custom-logo',
		        ) )
		    );	
		}
	endif; 

	return $html;    
	}

endif; 	
add_filter( 'get_custom_logo',  'codify_custom_logo' );

if ( ! function_exists( 'codify_woocommerce_active' ) ) :

	/**
	 * Check if WooCommerce is active.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Active status.
	 */
	function codify_woocommerce_active() {
		$output = false;

		if ( class_exists( 'WooCommerce' ) ) {
			$output = true;
		}

		return $output;
	}

endif;

/**
 * Function to get Header Classes
 */
if ( ! function_exists( 'codify_header_classes' ) ) {

	/**
	 * Function to get Header Classes
	 *
	 * @since 1.0.0
	 */
	function codify_header_classes() {

		$main_header_style = get_theme_mod( 'main_header_style', 'style1' );

		$classes[] = 'header-wrapper-' . $main_header_style;

		$classes = array_unique( apply_filters( 'codify_header_class', $classes ) );

		$classes = array_map( 'sanitize_html_class', $classes );

		echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
	}
}

/**
 * Function to get Sidbar Classes
 */
if ( ! function_exists( 'codify_sidebar_classes' ) ) {

	/**
	 * Function to get Header Classes
	 *
	 * @since 1.0.0
	 */
	function codify_sidebar_classes() {

		$title_layout = get_theme_mod( 'title_layout', 'style1' );

		$classes[] = 'widget-area';

		$classes[] = 'widget-title-' . $title_layout;

		$classes = array_unique( apply_filters( 'codify_sidebar_widget_class', $classes ) );

		$classes = array_map( 'sanitize_html_class', $classes );

		echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
	}
}

if ( ! function_exists( 'codify_posts_navigation' ) ) :

	/**
	 * Posts navigation.
	 *
	 * @since 1.0.0
	 */
	function codify_posts_navigation() {
		$pagination = get_theme_mod( 'pagination', 'default' );
		if( 'default' == $pagination){
			the_posts_navigation();	
		} else{
			the_posts_pagination( array(
				'mid_size' => 5,
				'prev_text' => esc_html__( 'PREV', 'codify' ),
				'next_text' => esc_html__( 'NEXT', 'codify' ),
				) );
		} 	

	}
endif;

add_action( 'codify_action_posts_navigation', 'codify_posts_navigation' );

/**
 * Schema for <body> tag.
 */
if ( ! function_exists( 'codify_schema_body' ) ) :

	/**
	 * Adds schema tags to the body classes.
	 *
	 * @since 1.0.0
	 */
	function codify_schema_body() {

		// Check conditions.
		$is_blog = ( is_home() || is_archive() || is_attachment() || is_tax() || is_single() ) ? true : false;

		// Set up default itemtype.
		$itemtype = 'WebPage';

		// Get itemtype for the blog.
		$itemtype = ( $is_blog ) ? 'Blog' : $itemtype;

		// Get itemtype for search results.
		$itemtype = ( is_search() ) ? 'SearchResultsPage' : $itemtype;
		// Get the result.
		$result = apply_filters( 'codify_schema_body_itemtype', $itemtype );

		// Return our HTML.
		echo apply_filters( 'codify_schema_body', "itemtype='https://schema.org/" . esc_attr( $result ) . "' itemscope='itemscope'" );
	}
endif;

/**
 * Schema for <body> tag.
 */
if ( ! function_exists( 'codify_sidebar_current_layout' ) ) :
   /**
     * 
     *
     * @since 1.0.0
     */
    function codify_sidebar_current_layout() { ?>
        <?php global $post;
        $sidebar_layout  = '';
        $sidebar_options = '';
            switch ( true ) {
                case  ( is_singular( 'page' ) ) :                    
                    $sidebar_options = get_post_meta( $post->ID, 'sidebar_options', true );
                    if ( isset( $sidebar_options ) && ! empty( $sidebar_options ) && 'customizer_setting' !== $sidebar_options ) {
                        $sidebar_layout = $sidebar_options;                                
                    } elseif ( codify_woocommerce_active() && ( is_checkout() || is_cart() || is_account_page() || is_shop() ) ) { 
                        $sidebar_layout = get_theme_mod( 'woo_sidebar', 'right_sidebar' );
                    }
                    else{
                         $sidebar_layout = get_theme_mod( 'page_sidebar', 'right_sidebar' );
                    }                
                break;
                case ( is_singular() ):
                    if ( isset( $sidebar_options ) && ! empty( $sidebar_options ) && 'customizer_setting' !== $sidebar_options ) {
                        $sidebar_layout = $sidebar_options;                                
                    } elseif(  codify_woocommerce_active() && is_product() ){
                         $sidebar_layout = get_theme_mod( 'woo_sidebar', 'right_sidebar' );
                    }else{
                         $sidebar_layout = get_theme_mod( 'post_sidebar', 'right_sidebar' );
                    }                
                break; 
                case ( is_archive() || is_home() ):   
                    if ( codify_woocommerce_active() && is_woocommerce() ) {
                        $sidebar_layout = get_theme_mod( 'woo_sidebar', 'right_sidebar' );
                    }else{
                       $sidebar_layout = get_theme_mod( 'blog_sidebar', 'right_sidebar' ); 
                    }

                break;
                case ( is_search() ):
                	$sidebar_layout = get_theme_mod( 'search_sidebar', 'right_sidebar' ); 
                	break;
                default:
                    $sidebar_layout = get_theme_mod( 'blog_sidebar', 'right_sidebar' );            
            } 
            return apply_filters( 'codify_sidebar_layout', $sidebar_layout );     
    }
endif;
