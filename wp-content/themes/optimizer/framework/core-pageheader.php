<?php 
/**
 * The Individual Page Header Function for Optimizer
 *
 * Displays the page header on pages.
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
global $optimizer;?>	

   <?php if (is_single() || is_page()) {?>
   <?php $imgbg = get_post_meta( $post->ID, 'page_head', true ); ?>
	<!--Header for PAGE & POST-->
      <div class="page_head <?php if(!empty($optimizer['hide_mob_page_header'])) { ?> hide_mob_headerimg<?php } ?>">

      <!--The Page Title -->
          <div class="pagetitle_wrap">
              <h1 class="postitle"><?php the_title(); ?></h1>
          </div>
          
      </div>
      <!--page_head class END-->
       <?php } ?>
      
      
      <?php if (is_category()) {?>
      <!--Header for CATEGORY-->
      <div class="page_head<?php if(!category_description( )) { ?> has_cat_desc<?php } ?> <?php if(!empty($optimizer['hide_mob_page_header'])) { ?> hide_mob_headerimg<?php } ?>">

      
      <!--The Page Title -->
          <div class="pagetitle_wrap">
              <h1 class="postitle"><?php single_cat_title( '', true ); ?></h1>
               <?php echo category_description( ); ?> 
          </div>
          
      </div>
      <!--page_head class END-->
      <?php } ?>
	  
      
      <?php if (is_tag()) {?>
      <!--Header for TAGS-->
      <div class="page_head<?php if(!tag_description( )) { ?> has_tag_desc<?php } ?> <?php if(!empty($optimizer['hide_mob_page_header'])) { ?> hide_mob_headerimg<?php } ?>">

      
      <!--The Page Title -->
          <div class="pagetitle_wrap">
              <h1 class="postitle"><?php single_tag_title( '', true ); ?></h1>
               <?php echo tag_description( ); ?>  
          </div>
          
      </div>
      <!--page_head class END-->
      <?php } ?>
      
      
	  <?php if ( class_exists( 'WooCommerce' ) ) { //If Wooceommerce  ?>
		  <?php if ('product' == get_post_type()) {?>
          <!--Header for TAGS-->
          <div class="page_head<?php if(!category_description( )) { ?> has_cat_desc<?php } ?> <?php if(!empty($optimizer['hide_mob_page_header'])) { ?> hide_mob_headerimg<?php } ?>">

          <!--The Page Title -->
              <div class="pagetitle_wrap">
                  <h1 class="postitle"><?php echo woocommerce_page_title( '', true ); ?></h1> 
                  <?php if(!category_description()) { ?><?php echo category_description( ); ?><?php } ?>
              </div>
          </div>
          <!--page_head class END-->
          <?php } ?>
	  <?php } ?>