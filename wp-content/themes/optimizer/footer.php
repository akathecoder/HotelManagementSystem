<?php 
/**
 * The Footer for Optimizer
 *
 * Displays the footer area of the template.
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
global $optimizer;?>

	<?php /*To Top Button */?>
	<a class="to_top <?php if (empty ($optimizer['totop_id'])) { ?>hide_totop<?php } ?>"><i class="fa-angle-up fa-2x"></i></a>



<!--Footer Start-->
<div class="footer_wrap layer_wrapper <?php if(!empty($optimizer['hide_mob_footwdgt'])){ echo 'mobile_hide_footer';} ?>">

<div id="footer"<?php if (!empty ($optimizer['copyright_center'])) { ?> class="footer_center"<?php } ?>>
    <div class="center">
    <?php if ( is_active_sidebar( 'foot_sidebar' ) ) { ?>
        <!--Footer Widgets START-->
        <div class="widgets">
        	<ul>
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar( 'foot_sidebar' ) ) : ?><?php endif; ?>
        	</ul>
        </div>
        <!--Footer Widgets END-->
	<?php } ?>
        
    </div>
        <!--Copyright Footer START-->
            <div id="copyright" class="soc_right<?php if (!empty ($optimizer['copyright_center'])) { ?> copyright_center<?php } ?>">
                <div class="center">
                
                    <!--Site Copyright Text START-->
                    	<div class="copytext"><?php if (!empty ($optimizer['footer_text_id'])) { ?><?php $foot = html_entity_decode($optimizer['footer_text_id']); $foot = stripslashes($foot); echo do_shortcode($foot); ?><?php } ?></div>
                    <!--Site Copyright Text END-->
               
               <div class="foot_right_wrap"> 
						<!--FOOTER MENU START-->   
                        <?php if (!empty ($optimizer['footmenu_id']) || is_customize_preview()) { ?>
                        <div id="footer_menu" class="<?php if (empty ($optimizer['footmenu_id'])) echo 'hide_footmenu'; ?>"><?php wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'footer', 'depth' => '1') ); ?></div>
                        <?php } ?>
                        <!--FOOTER MENU END-->
                
                    <!--SOCIAL ICONS START-->
                      <div class="foot_soc"><?php if ($optimizer['social_bookmark_pos'] == 'footer') { ?><?php get_template_part('framework/core','social'); ?><?php } ?></div>
                    <!--SOCIAL ICONS END-->
                </div>
                
                </div><!--Center END-->

            </div>
        <!--Copyright Footer END-->
</div>
<!--Footer END-->



    
</div><!--layer_wrapper class END-->


<?php wp_footer(); ?>
</body>
</html>