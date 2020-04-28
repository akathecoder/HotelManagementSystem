<?php 
/**
 * The Header for Optimizer
 *
 * Displays all of the <head> section and everything
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
/*OPTION DEFAULTS*/ 
global $optimizer;
$optimizer = optimizer_option_defaults();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo( 'charset' ); ?>" />	
<?php // Google Chrome Frame for IE ?>
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="profile" href="http://gmpg.org/xfn/11"/>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /> 
<?php wp_head(); ?>
</head>

<body <?php body_class();?>>
<!--HEADER-->
<div class="header_wrap layer_wrapper">
	<?php get_template_part('template_parts/head','type1'); ?>
</div><!--layer_wrapper class END-->

	<!--Slider START-->
		<?php if (is_home() && is_front_page()) { ?>
        
            <div id="slidera" class="layer_wrapper <?php if(!empty($optimizer['hide_mob_slide'])){ echo 'mobile_hide_slide';} ?>">
                <?php $slidertype = $optimizer['slider_type_id']; ?>
                <?php get_template_part('frontpage/slider',''.$slidertype.''); ?>
            </div> 
            
          <?php } ?> 
      <!--Slider END-->
