<?php 
/**
 * Woocommerce Hooks and Filter
 * @package Codify
 */

if ( !function_exists( 'codify_woocommerce_placeholder_img_src' ) ):
/**
 * Get the codify's placeholder image URL for products.
 *
 * @return string
 */
function codify_woocommerce_placeholder_img_src( $image_size = '' ) {

	if($image_size == ''){
		return apply_filters( 'woocommerce_placeholder_img_src', esc_url(get_template_directory_uri()) . '/img/sidebar-left.png' );
	} else {

		$size           = codify_get_image_size($image_size);
		$size['width']  = isset( $size['width'] ) ? $size['width'] : '';
		$size['height'] = isset( $size['height'] ) ? $size['height'] : '';


		return apply_filters( 'woocommerce_placeholder_img_src', esc_url(get_template_directory_uri()) . '/assest/img/placeholder.-'.$size['width'].'x'.$size['height'].'.png' );
	}
}
endif;
if ( !function_exists( 'codify_get_image_size' ) ):
    /** Image Size */
    function codify_get_image_size( $name ) {
    	global $_wp_additional_image_sizes;

    	if ( isset( $_wp_additional_image_sizes[$name] ) )
    		return $_wp_additional_image_sizes[$name];

    	return false;
    }
endif;

if ( !function_exists( 'codify_add_to_favorite_icon' ) ):
    /*
    * Wishlist Icon
    */
    function codify_add_to_favorite_icon() {
        if( ! function_exists( 'YITH_WCWL' ) ) {
            return;
        }
        global $product, $post;
        $current_product = $product;
        $product_id = $current_product->get_id();
        $product_type = $current_product->get_type();
        echo '<a href="'.esc_url( add_query_arg( 'add_to_wishlist', $product_id ) ) .'" class="single_add_to_wishlist"><i class="fa fa-heart"></i></a>';
    }
endif;
add_action( 'codify_loop_after_thumbnail', 'codify_add_to_favorite_icon', 10 );

if ( !function_exists( 'codify_quick_view_icon' ) ):
    /*
    * Quick View Icon
    */
    function codify_quick_view_icon() {
        if( ! function_exists( 'yith_wcqv_init' ) ) {
            return;
        }
        global $product;
        $product_id = $product->get_id();    
        echo '<a href="#" class="btn yith-wcqv-button" data-product_id="'.absint($product_id).'"><i class="fa fa-eye" aria-hidden="true"></i></a>';
    }
endif;
add_action( 'codify_loop_after_thumbnail', 'codify_quick_view_icon', 15 );


if ( !function_exists( 'codify_add_to_cart_button' ) ):
    /**
    * Cart Button
    */
    function codify_add_to_cart_button() {
        woocommerce_template_loop_add_to_cart();
    }
endif;
add_action( 'codify_loop_after_thumbnail', 'codify_add_to_cart_button', 5 );


if ( !function_exists( 'codify_loop_item_title' ) ):
    /**
    * Entry Header Title for Product
    */
    function codify_loop_item_title() {
        echo '<header class="entry-header"><a href="' . esc_url( get_permalink() ) . '"><h3 class="entry-title">' . esc_html(get_the_title() ). '</h3></a></header>';
    }
endif;
add_action( 'woocommerce_shop_loop_item_title', 'codify_loop_item_title', 10 );

if ( !function_exists( 'codify_related_products_limit' ) ):
    /**
     * Change number of related products output
     */ 
    function codify_related_products_limit() {
      global $product;
        
        $args['posts_per_page'] = 6;
        return $args;
    }
endif; 
if ( !function_exists( 'codify_related_products_args' ) ):
    /*
    * Related Products
    */
    function codify_related_products_args( $args ) {
        $args['posts_per_page'] = 4; // 4 related products
        $args['columns'] = 2; // arranged in 2 columns
        return $args;
    }
endif;
add_filter( 'woocommerce_output_related_products_args', 'codify_related_products_args' );