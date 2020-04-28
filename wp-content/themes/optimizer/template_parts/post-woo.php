<?php 
/**
 * Posts Layout 1 for Optimizer
 *
 * Displays The Posts in Layout 1 
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
global $optimizer;?>

    <div class="lay1">
        <div class="center">
        

            <div class="lay1_wrap">
			<?php if (class_exists('Woocommerce')) { ?>
			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>
					<?php woocommerce_product_loop_start(); ?>
    
                    <?php woocommerce_product_subcategories(); ?>
    
                    <?php while ( have_posts() ) : the_post(); ?>
                    
                    		<?php wc_get_template_part( 'content', 'product' ); ?>
    
                    <?php endwhile; // end of the loop. ?>
    
                    <?php woocommerce_product_loop_end(); ?>
                    
               <?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>
            
            <?php } ?>
              
            </div><!--lay1_wrap class end-->
        

        
        <?php wp_reset_postdata(); ?>
       </div><!--center class end-->
    </div><!--lay1 class end-->