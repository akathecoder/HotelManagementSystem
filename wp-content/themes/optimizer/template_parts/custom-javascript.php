<?php 
/**
 * The Custom Javascript for Optimizer
 *
 * Loads the Custom Javascript of the template in the footer.
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
global $optimizer;?>

<?php if( 'static' == $optimizer['slider_type_id'] && empty($optimizer['head_transparent'])){ ?>
<script type="text/javascript">
	jQuery(window).load(function() {
		//STATIC SLIDER IMAGE FIXED
		var statimgheight = jQuery(".stat_has_img img").height();
		<?php if ( is_admin_bar_showing() ) { ?>var hheight = jQuery(".header").height() + 32;<?php }else{ ?>var hheight = jQuery(".header").height();<?php } ?>
		jQuery('.stat_bg').css({"background-position-y":hheight+"px", "top":hheight+"px"});
		jQuery('.stat_bg_overlay').css({ "top":hheight+"px"});
		});		
		jQuery(window).on('scroll', function() {
			var scrollTop = jQuery(this).scrollTop();
			var hheight = jQuery(".header").height();
				if ( !scrollTop ) {
					jQuery('.stat_bg').css({"background-position-y":hheight+"px"});
				}else{
					jQuery('.stat_bg').css({"background-position-y":"0px"});
				}
		});

</script>

<?php } ?>
<?php 
	  if($optimizer['static_textbox_bottom'] == '0'){
		  echo '<script>jQuery(".stat_content_inner").find("p:last").css({"marginBottom":"0"});</script>';
	  } 
?>