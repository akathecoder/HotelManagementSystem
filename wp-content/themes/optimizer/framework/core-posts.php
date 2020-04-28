<?php

function optimizer_posts($optimizer_posts_layout='1', $optimizer_posts_type='post', $optimizer_posts_count='6', $category='', $navigation='numbered'){
?>
	<?php  
	if(!empty($category) && $optimizer_posts_type == 'post'){	$blogcat = $category;	$optimizer_posts_blogcats =implode(',', $blogcat);	}else{	$optimizer_posts_blogcats = '';	}
	//AJAX DATA
	if(isset($_REQUEST['layout'])){			$optimizer_posts_layout = absint($_REQUEST['layout']);	}
	if(isset($_REQUEST['type'])){			$optimizer_posts_type = strip_tags($_REQUEST['type']);	}
	if(isset($_REQUEST['count'])){			$optimizer_posts_count = absint($_REQUEST['count']);	}
	if(isset($_REQUEST['category'])){		$optimizer_posts_blogcats = strip_tags($_REQUEST['category']);	}
	if(isset($_REQUEST['nextpage'])){		$optimizer_posts_currentpage = absint($_REQUEST['nextpage']);	}else{	$optimizer_posts_currentpage = 1;	}
	
	
	
		//THE QUERY
		if(is_category() || is_tag() || is_search() || is_author() || is_archive() ){
			global $wp_query;
			$widget_query = $wp_query;
		}else{
		$args = array(
			'post_type' => $optimizer_posts_type,
			'post_status' => 'publish',
			'cat' => ''.$optimizer_posts_blogcats.'',
			'paged' => get_query_var( 'page', $optimizer_posts_currentpage ),
			'posts_per_page' => ''.$optimizer_posts_count.'');
		$widget_query = new WP_Query( $args );
		}
	?>
    
    
	<!-----------------------------------LAYOUT 1-------------------------------------------->
	<?php if($optimizer_posts_layout == '1') { ?>
            <div class="lay1_wrap">
            	<div class="lay1_wrap_ajax">
            
				  <?php if($widget_query->have_posts()): ?><?php while($widget_query->have_posts()): ?><?php $widget_query->the_post(); ?>
                  
                      <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
                                 
       
                  <!--POST THUMBNAIL START-->
                      <div class="post_image">
                      
                      	<!--Post Image Hover-->
                          <div class="img_hover"></div>
                          
                          <!--CALL POST IMAGE-->
                          <?php if ( has_post_thumbnail() ) : ?>
                          
                          <div class="imgwrap">    
                              <div class="icon_wrap animated fadeInUp">
                                	<a class="imgzoom" href="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full'); echo $image[0]; ?>" title="<?php esc_attr_e('Preview','optimizer'); ?>" data-title="<?php the_title(); ?>"><i class="fa fa-search"></i></a>

                              		<a href="<?php the_permalink();?>" title="<?php esc_attr_e('Read More','optimizer'); ?>"><i class="fa fa-plus"></i></a>
                              </div>                 
                          <a href="<?php the_permalink();?>"><?php the_post_thumbnail('optimizer_thumb'); ?></a>
                          </div>
                          
                          
                          <?php elseif(!optimizer_gallery_thumb() == ''): ?>
                          <div class="imgwrap">       
                              <div class="icon_wrap animated fadeInUp">
                                	<a class="imgzoom" href="<?php echo optimizer_gallery_thumb('optimizer_thumb'); ?>" title="<?php esc_attr_e('Preview','optimizer'); ?>" data-title="<?php the_title(); ?>"><i class="fa fa-search"></i></a>
                              		<a href="<?php the_permalink();?>" title="<?php esc_attr_e('Read More','optimizer'); ?>"><i class="fa fa-plus"></i></a>
                              </div>            
                          <a href="<?php the_permalink();?>"><img alt="<?php the_title(); ?>" src="<?php echo optimizer_gallery_thumb('optimizer_thumb'); ?>" /></a>		
                          </div>
                          
                          <?php elseif(!optimizer_first_image() == ''): ?>
                          <div class="imgwrap">       
                              <div class="icon_wrap animated fadeInUp">
                                	<a class="imgzoom" href="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full'); echo $image[0]; ?>" title="<?php esc_attr_e('Preview','optimizer'); ?>" data-title="<?php the_title(); ?>"><i class="fa fa-search"></i></a>
                              		<a href="<?php the_permalink();?>" title="<?php esc_attr_e('Read More','optimizer'); ?>"><i class="fa fa-plus"></i></a>
                              </div>            
                          <a href="<?php the_permalink();?>"><img alt="<?php the_title(); ?>" src="<?php echo optimizer_first_image('optimizer_thumb'); ?>" /></a>		
                          </div>
                          
                          <?php else : ?>
                          <div class="imgwrap">
							<div class="icon_wrap animated fadeInUp">
                              		<a href="<?php the_permalink();?>" title="<?php esc_attr_e('Read More','optimizer'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                          <a href="<?php the_permalink();?>"><img src="<?php echo optimizer_placeholder_image();?>" alt="<?php the_title_attribute(); ?>" class="thn_thumbnail"/></a></div>   
                                   
                          <?php endif; ?>
                          
                          <!--POST CONTENT-->
                          <div class="post_content">
                          <h2 class="postitle"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                          	<?php if ( class_exists( 'WooCommerce' ) ) { ?>
                            	<?php if($optimizer_posts_type == 'product') { ?>
                      				<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
                                	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
                                <?php } ?>
                      		<?php } ?>
                          </h2>
                          </div>
                          
                      </div>
                    <!--POST THUMBNAIL END-->  

                      </div>
              <?php endwhile ?> 
				<?php wp_reset_postdata(); ?>
              <?php endif ?>
             </div><!--lay1_wrap_ajax END-->
            </div><!--lay1_wrap class END-->
	<?php } ?>
    


 	<!-- - - - - - - - - - - - - - - - - - - - LAYOUT 2 - - - - - - - - - - - - - - - - - - - -->
	<?php if($optimizer_posts_layout == '2') { ?>
      
		<div class="lay2_wrap">
            	<div class="lay2_wrap_ajax">
            
				<?php if($widget_query->have_posts()): ?><?php while($widget_query->have_posts()): ?><?php $widget_query->the_post(); ?>
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
            
 
            <!--POST THUMBNAIL START-->
                <div class="post_image">
                
                      		<!--Woocommerce Stuff-->
                          	<?php if ( class_exists( 'WooCommerce' ) ) { ?>
                            	<?php if($type == 'product') { ?>
                                	<?php do_action( 'optimizer_inside_front_post_thumb' ); ?>
                                <?php } ?>
                      		<?php } ?> 
                            <!--Woocommerce Stuff END-->
                            
                     <!--CALL TO POST IMAGE-->
                    <?php if ( has_post_thumbnail() ) : ?>
                    
                    <div class="imgwrap">  
                    <div class="img_hover">
                        <div class="icon_wrap animated fadeInUp">
                                	<a class="imgzoom" href="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full'); echo $image[0]; ?>" title="<?php esc_attr_e('Preview','optimizer'); ?>" data-title="<?php the_title(); ?>"><i class="fa fa-search"></i></a>
                              		<a href="<?php the_permalink();?>" title="<?php esc_attr_e('Read More','optimizer'); ?>"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>                    
                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail('medium'); ?></a></div>
                    
                    <?php elseif(!optimizer_gallery_thumb() == ''): ?>
                    <div class="imgwrap"> 
                    <div class="img_hover">
                        <div class="icon_wrap animated fadeInUp">
                                	<a class="imgzoom" href="<<?php echo optimizer_gallery_thumb('optimizer_thumb'); ?>" title="<?php esc_attr_e('Preview','optimizer'); ?>" data-title="<?php the_title(); ?>"><i class="fa fa-search"></i></a>
                              		<a href="<?php the_permalink();?>" title="<?php esc_attr_e('Read More','optimizer'); ?>"><i class="fa fa-plus"></i></a>

                        </div>
                    </div>                     
                    <a href="<?php the_permalink();?>"><img alt="<?php the_title(); ?>" src="<?php echo optimizer_gallery_thumb('optimizer_thumb'); ?>" /></a></div>
                    
                    <?php elseif(!optimizer_first_image() == ''): ?>
                    <div class="imgwrap"> 
                    <div class="img_hover">
                        <div class="icon_wrap animated fadeInUp">
                                	<a class="imgzoom" href="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full'); echo $image[0]; ?>" title="<?php esc_attr_e('Preview','optimizer'); ?>" data-title="<?php the_title(); ?>"><i class="fa fa-search"></i></a>
                              		<a href="<?php the_permalink();?>" title="<?php esc_attr_e('Read More','optimizer'); ?>"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>                     
                    <a href="<?php the_permalink();?>"><img alt="<?php the_title(); ?>" src="<?php echo optimizer_first_image('optimizer_thumb'); ?>" /></a></div>
                    <?php else : ?>
                    
                    <div class="imgwrap">
                    <div class="img_hover">
                        <div class="icon_wrap animated fadeInUp">
                              		<a href="<?php the_permalink();?>" title="<?php esc_attr_e('Read More','optimizer'); ?>"><i class="fa fa-plus"></i></a>

                        </div>
                    </div>
                    <a href="<?php the_permalink();?>"><img src="<?php echo optimizer_placeholder_image();?>" alt="<?php the_title_attribute(); ?>" class="thn_thumbnail" width="500" height="350" /></a></div>   
                             
                    <?php endif; ?>
                    <div class="post_content">
                    <h2 class="postitle"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                     <?php optimizer_excerpt('optimizer_excerptlength_teaser', 'optimizer_excerptmore'); ?> 
                     <?php do_action( 'optimizer_after_post_content' ); ?>
                          <!--Woocommerce Stuff-->
                          	<?php if ( class_exists( 'WooCommerce' ) ) { ?>
                            	<?php if($type == 'product') { ?>
                                	<?php do_action( 'optimizer_after_front_post' ); ?>
                                <?php } ?>
                      		<?php } ?>
                            <!--Woocommerce Stuff END-->
                            
                    </div>
                </div>
           <!--POST THUMBNAIL END-->     

                
            </div>
            <?php endwhile ?> 
				<?php wp_reset_postdata(); ?>
            <?php endif ?>
            </div><!--lay2_wrap_ajax END-->
		</div><!--lay2_wrap class end-->
	<?php } ?>
    
        
    

	<!-----------------------------------LAYOUT 4-------------------------------------------->
	<?php if($optimizer_posts_layout == '4') { ?>
    <div class="lay4pagifix<?php if (!is_active_sidebar( 'sidebar' ) ) { ?> no_sidebar<?php } ?>">
		<div class="lay4_wrap">
			<div class="lay4_wrap_ajax">
                <div class="lay4_inner">
					<?php if($widget_query->have_posts()): ?><?php while($widget_query->have_posts()): ?><?php $widget_query->the_post(); ?>
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 

                <!--POST THUMBNAIL START-->
                        <div class="post_image">
                             <!--CALL TO POST IMAGE-->
                            <?php if ( has_post_thumbnail() ) : ?>
                            <div class="imgwrap">
                            <a href="<?php the_permalink();?>"><?php the_post_thumbnail('medium'); ?></a></div>
                            
                            
                            <?php elseif(!optimizer_gallery_thumb() == ''): ?>
            
                            <div class="imgwrap">
                            <a href="<?php the_permalink();?>"><img alt="<?php the_title(); ?>" src="<?php echo optimizer_gallery_thumb('optimizer_thumb'); ?>" /></a></div>
                            
                            
                            <?php elseif(!optimizer_first_image() == ''): ?>
            
                            <div class="imgwrap">
                            <a href="<?php the_permalink();?>"><img alt="<?php the_title(); ?>" src="<?php echo optimizer_first_image('optimizer_thumb'); ?>" /></a></div>
                        
                            <?php else : ?>
                            
                            <div class="imgwrap">
                            <a href="<?php the_permalink();?>"><img src="<?php echo optimizer_placeholder_image();?>" alt="<?php the_title_attribute(); ?>" class="optimizer_thumbnail"/></a></div>   
                                     
                            <?php endif; ?>
                        </div>
                 <!--POST THUMBNAIL END-->

                    <!--POST CONTENT START-->
                        <div class="post_content">
                            <h2 class="postitle"><a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                            
                         <!--META INFO START-->   
                            <div class="single_metainfo">
                            	<!--DATE-->
                                <i class="fa-calendar"></i><a class="comm_date"><?php the_time( get_option('date_format') ); ?></a>
                                <!--AUTHOR-->
                                <i class="fa-user"></i><?php global $authordata; $post_author = "<a class='auth_meta' href=\"".get_author_posts_url( $authordata->ID, $authordata->user_nicename )."\">".get_the_author()."</a>\r\n"; echo $post_author; ?>
                                <!--COMMENTS COUNT-->
                                <i class="fa-comments"></i><?php if (!empty($post->post_password)) { ?>
                            <?php } else { ?><div class="meta_comm"><?php comments_popup_link( __('0 Comment', 'optimizer'), __('1 Comment', 'optimizer'), __('% Comments', 'optimizer'), '', __('Off' , 'optimizer')); ?></div><?php } ?>
                            	<!--CATEGORY-->
                              	<i class="fa-th-list"></i><div class="catag_list"><?php the_category(', '); ?></div>
                            </div>
                         <!--META INFO START-->  
                         
                            <?php optimizer_excerpt('optimizer_excerptlength_teaser', 'optimizer_excerptmore'); ?>
                            
                          	<?php if ( class_exists( 'WooCommerce' ) ) { ?>
                            	<?php if($optimizer_posts_type == 'product') { ?>
                      				<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
                                	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
                                <?php } ?>
                      		<?php } ?>
                            
                        </div>
                    <!--POST CONTENT END-->
					<!--Read More Button-->
                    <div class="blog_mo"><a href="<?php the_permalink();?>">+ <?php _e('Read More', 'optimizer'); ?></a></div>
                    
                </div>
                <?php endwhile ?> 
    				<?php wp_reset_postdata(); ?>
                <?php endif ?>
                </div><!--lay4_inner class END-->
            
            </div><!--lay4_wrap_ajax class END-->
    	</div><!--lay4_wrap class END-->
             
     		<?php /*LOAD THE PAGINATION INSIDE LAYOUT5 */?> 
            <?php if(isset($_REQUEST['nextpage'])){		exit();		} ?>
			<?php optimizer_pagination($navigation, $widget_query); ?>
       </div>
            
                <!--SIDEBAR START-->    
                <?php if(isset($_REQUEST['nextpage'])){		exit();		} ?>   
					<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
                        <div id="sidebar" class="home_sidebar">
                            <div class="widgets">  
                                    <?php dynamic_sidebar( 'sidebar' ); ?>
                             </div>
                         </div>
                    <?php endif; ?>

            	<!--SIDEBAR END--> 
	<?php } ?>   


<?php if(isset($_REQUEST['nextpage'])){		exit();		} ?>


		<?php if($optimizer_posts_layout == '1') { optimizer_pagination($navigation, $widget_query); } ?>
		<?php 			
			if(is_category() || is_tag() || is_search() || is_author() || is_archive() ){}else{		
			//REGISTER and ENQUEUE AJAX PAGINATION SCRIPT
			wp_register_script( 'optimizer-pagination',get_template_directory_uri().'/assets/js/pagination.js', array('jquery'), true);
			// Localize the script with new data
			$pagiajax = array(
				'ajaxurl' => admin_url('admin-ajax.php'),
			);
			wp_localize_script( 'optimizer-pagination', 'postsq', $pagiajax );
			wp_enqueue_script( 'optimizer-pagination' );
			}
		?>

<?php } ?>
<?php
add_action('wp_ajax_nopriv_optimizer_posts', 'optimizer_posts');
add_action('wp_ajax_optimizer_posts', 'optimizer_posts'); ?>