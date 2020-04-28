<?php
 /**
 * The WOOCOMMERCE functions for OPTIMIZER
 *
 * Stores all the Woocommerce functions of the template.
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */

//DETECT Woocommerce SHOP PAGES
function optimizer_shop_page_title() { 
return false; 
} 
add_filter('woocommerce_show_page_title', 'optimizer_shop_page_title');

function optimizer_is_woocommerce_page () {
        if(  function_exists ( "is_woocommerce" ) && is_woocommerce()){
                return true;
        }
        $woocommerce_keys   =   array ( "woocommerce_shop_page_id" ,
                                        "woocommerce_terms_page_id" ,
                                        "woocommerce_cart_page_id" ,
                                        "woocommerce_checkout_page_id" ,
                                        "woocommerce_pay_page_id" ,
                                        "woocommerce_thanks_page_id" ,
                                        "woocommerce_myaccount_page_id" ,
                                        "woocommerce_edit_address_page_id" ,
                                        "woocommerce_view_order_page_id" ,
                                        "woocommerce_change_password_page_id" ,
                                        "woocommerce_logout_page_id" ,
                                        "woocommerce_lost_password_page_id" ) ;
        foreach ( $woocommerce_keys as $wc_page_id ) {
                if ( get_the_ID () == get_option ( $wc_page_id , 0 ) ) {
                        return true ;
                }
        }
        return false;
}



 /**
 * WOOCOMMERCE SHOP PAGE
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);	
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

add_action('woocommerce_before_main_content', 'optimizer_woo_wrapper_start', 10);
function optimizer_woo_wrapper_start() { ?>
<?php $optimizer = optimizer_option_defaults(); ?>
    <div class="page_wrap layer_wrapper">
    	<?php if(is_shop() || ( !empty($optimizer['woo_cat_header']) && (is_product_category() || is_product_tag()) )) { ?>
        <!--CUSTOM PAGE HEADER STARTS-->
        	<?php $shoppageid = get_option( 'woocommerce_shop_page_id' ); $show_pgheader = get_post_meta( $shoppageid, 'show_page_header', true); if (empty($show_pgheader)){ ?>
            	<?php get_template_part('framework/core','pageheader'); ?>
            <?php } ?>
        <!--CUSTOM PAGE HEADER ENDS-->
        <?php } ?>
        
        
				<?php 
				//NO SIDEBAR LOGIC
				$nosidebar ='has_sidebar';
				$shopsidebar = $optimizer['shop_sidebar_id'];
				$hidesidebar = get_post_meta(get_the_ID(), 'hide_sidebar', true);
				$sidebar = get_post_meta(get_the_ID(), 'sidebar', true);
				
				$shoppageid = get_option( 'woocommerce_shop_page_id' );

                if(!is_active_sidebar( 'sidebar' ) ){ 
					$nosidebar = 'no_sidebar'; 
                 }    
				?>
                <?php $page_template = get_post_meta( get_option( 'woocommerce_shop_page_id' ), '_wp_page_template', true ); if($page_template =='template_parts/page-leftsidebar_template.php'){ $sidebar_pos = 'left_sidebar';}else{ $sidebar_pos = ''; }?>
        <div id="content">
            <div class="center">
                <div class="single_wrap <?php echo $nosidebar; ?> <?php echo $sidebar_pos; ?>">
                    
                    <div class="single_post">

<?php }




add_action('woocommerce_after_main_content', 'optimizer_woo_wrapper_end', 10);
function optimizer_woo_wrapper_end() {?>
  </div></div> <?php get_sidebar(); ?> </div></div></div>
<?php }

?>