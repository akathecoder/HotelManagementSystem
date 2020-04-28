<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Footer Option Dynamic CSS
 */
$footer_dynamic_css['all']     = '';
$footer_dynamic_css['tablet'] = '';
$footer_dynamic_css['desktop'] = '';
/*Footer General*/
$footer_general_css            = '';
$footer_general_tablet_css     = '';
$footer_general_desktop_css    = '';

/* margin */
$footer_general_margin  = cosmoswp_get_theme_options('footer-general-margin');
$footer_general_margin  = json_decode($footer_general_margin,true);
// desktop margin 
$footer_general_margin_desktop = cosmoswp_cssbox_values_inline($footer_general_margin,'desktop');
if (strpos($footer_general_margin_desktop, 'px') !== false){
	$footer_general_desktop_css		.= 'margin:'.$footer_general_margin_desktop.';';
}
// tablet marign 
$footer_general_margin_tablet  = cosmoswp_cssbox_values_inline($footer_general_margin,'tablet');
if (strpos($footer_general_margin_tablet, 'px') !== false){
	$footer_general_tablet_css		.= 'margin:'.$footer_general_margin_tablet.';';
}
// mobile margin 
$footer_general_margin_mobile  = cosmoswp_cssbox_values_inline($footer_general_margin,'mobile');
if (strpos($footer_general_margin_mobile, 'px') !== false){
	$footer_general_css		.= 'margin:'.$footer_general_margin_mobile.';';
}

/* padding */
$footer_general_padding = cosmoswp_get_theme_options('footer-general-padding');
$footer_general_padding = json_decode($footer_general_padding,true);

// desktop padding
$footer_general_padding_desktop = cosmoswp_cssbox_values_inline($footer_general_padding,'desktop');
if (strpos($footer_general_padding_desktop, 'px') !== false){
	$footer_general_desktop_css		.= 'padding:'.$footer_general_padding_desktop.';';
}
//tablet padding
$footer_general_padding_tablet  = cosmoswp_cssbox_values_inline($footer_general_padding,'tablet');
if (strpos($footer_general_padding_tablet, 'px') !== false){
	$footer_general_tablet_css		.= 'padding:'.$footer_general_padding_tablet.';';
}
//mobile padding
$footer_general_padding_mobile  = cosmoswp_cssbox_values_inline($footer_general_padding,'mobile');
if (strpos($footer_general_padding_mobile, 'px') !== false){
	$footer_general_css		.= 'padding:'.$footer_general_padding_mobile.';';
}

//background
$footer_general_overlay_css  = '';
$footer_general_bg            = cosmoswp_get_theme_options('footer-general-background-options');
$footer_general_bg            = json_decode($footer_general_bg,true);
//bg color
$footer_general_bg_color      = cosmoswp_ifset($footer_general_bg['background-color']);
if ( $footer_general_bg_color ){
	$footer_general_css		.= 'background-color:'.$footer_general_bg_color.';';
}
//bg image
$footer_general_bg_image      = cosmoswp_ifset($footer_general_bg['background-image']);
if ( $footer_general_bg_image ){
	$footer_general_css		.= 'background-image:url('.esc_url( $footer_general_bg_image ).');';
	//bg size
	$footer_general_bg_size       = cosmoswp_ifset($footer_general_bg['background-size']);
	if ( $footer_general_bg_size ){
		$footer_general_css		.= 'background-size:'.$footer_general_bg_size.';';
		$footer_general_css		.= '-webkit-background-size:'.$footer_general_bg_size.';';
	}
	//bg position
	$footer_general_bg_position   = cosmoswp_ifset($footer_general_bg['background-position']);
	if ( $footer_general_bg_position ){
		$footer_general_css		.= 'background-position:'.str_replace('_',' ', $footer_general_bg_position).';';
	}
	//bg repeat
	$footer_general_bg_repeat     = cosmoswp_ifset($footer_general_bg['background-repeat']);
	if ( $footer_general_bg_repeat ){
		$footer_general_css		.= 'background-repeat:'.$footer_general_bg_repeat.';';
	}
	//bg repeat
	$footer_general_bg_attachment = cosmoswp_ifset($footer_general_bg['background-attachment']);
	if ( $footer_general_bg_attachment ){
		$footer_general_css		.= 'background-attachment:'.$footer_general_bg_attachment.';';
	}
	//bg overlay color
	$footer_general_enable_overlay   = cosmoswp_ifset($footer_general_bg['enable-overlay']);
	$footer_general_bg_overlay_color = cosmoswp_ifset($footer_general_bg['background-overlay-color']);
	if ( $footer_general_bg_overlay_color && $footer_general_enable_overlay){
        $footer_general_overlay_css		.= 'background:'.$footer_general_bg_overlay_color.';';
	}
}

//border options
$footer_general_border           = cosmoswp_get_theme_options('footer-general-border-styling');
$footer_general_border           = json_decode($footer_general_border,true);
//border shadow
$footer_general_bx_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($footer_general_border['box-shadow-css']),'desktop');
if (strpos($footer_general_bx_shadow_css, 'px') !== false) {
	$footer_general_bxshadow_color   = cosmoswp_ifset($footer_general_border['box-shadow-color']);
	$footer_general_bx_shadow        = $footer_general_bx_shadow_css.' '.$footer_general_bxshadow_color;
	$footer_general_css .=	'-webkit-box-shadow:'.$footer_general_bx_shadow.';';
	$footer_general_css .=	'-moz-box-shadow:'.$footer_general_bx_shadow.';';
	$footer_general_css .=	'box-shadow:'.$footer_general_bx_shadow.';';
}
//border style
$footer_general_border_style     = cosmoswp_ifset($footer_general_border['border-style']);
if ( 'none' !== $footer_general_border_style ){

	$footer_general_css .= 'border-style:'.$footer_general_border_style.';';
	//border width
	$footer_general_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($footer_general_border['border-width']),'desktop');
	if (strpos($footer_general_border_width, 'px') !== false) {
		$footer_general_css .= 'border-width:'.$footer_general_border_width.';';
	}
	//border color
	$footer_general_border_color     = cosmoswp_ifset($footer_general_border['border-color']);
	if ($footer_general_border_color){
		$footer_general_css .= 'border-color:'.$footer_general_border_color.';';
	}
}

//border radius
$footer_general_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($footer_general_border['border-radius']),'desktop');
if (strpos($footer_general_border_radius, 'px') !== false){
	$footer_general_css		.= 'border-radius:'.$footer_general_border_radius.';';
}

/* footer general overlay css */
if ( !empty($footer_general_overlay_css) ){
    $footer_general_overlay_dynamic_css = '.cwp-dynamic-footer.cwp-enable-overlay:after{
		'.$footer_general_overlay_css.'
	}';
    $footer_dynamic_css['all'] .= $footer_general_overlay_dynamic_css;
}

/* mobile css */
if ( !empty($footer_general_css) ){
	$footer_general_dynamic_css = '.cwp-dynamic-footer{
		'.$footer_general_css.'
	}';
	$footer_dynamic_css['all'] .= $footer_general_dynamic_css;
}

/* tablet css */
if ( !empty($footer_general_tablet_css) ){
	$footer_general_tablet_dynamic_css = '.cwp-dynamic-footer{
		'.$footer_general_tablet_css.'
	}';
	$footer_dynamic_css['tablet'] .= $footer_general_tablet_dynamic_css;
}

/* desktop css  */
if ( !empty($footer_general_desktop_css) ){
	$footer_general_desktop_dynamic_css = '.cwp-dynamic-footer{
		'.$footer_general_desktop_css.'
	}';
	$footer_dynamic_css['desktop'] .= $footer_general_desktop_dynamic_css;
}

// Footer General
/*Footer Sidebar Setting */
$footer_sidebar_setting_css            = '';
$footer_sidebar_setting_tablet_css     = '';
$footer_sidebar_setting_desktop_css    = '';

/* margin */
$footer_sidebar_setting_margin  = cosmoswp_get_theme_options('footer-sidebar-margin');
$footer_sidebar_setting_margin  = json_decode($footer_sidebar_setting_margin,true);
// desktop margin
$footer_sidebar_setting_margin_desktop = cosmoswp_cssbox_values_inline($footer_sidebar_setting_margin,'desktop');
if (strpos($footer_sidebar_setting_margin_desktop, 'px') !== false){
    $footer_sidebar_setting_desktop_css		.= 'margin:'.$footer_sidebar_setting_margin_desktop.';';
}
// tablet marign
$footer_sidebar_setting_margin_tablet  = cosmoswp_cssbox_values_inline($footer_sidebar_setting_margin,'tablet');
if (strpos($footer_sidebar_setting_margin_tablet, 'px') !== false){
    $footer_sidebar_setting_tablet_css		.= 'margin:'.$footer_sidebar_setting_margin_tablet.';';
}
// mobile margin
$footer_sidebar_setting_margin_mobile  = cosmoswp_cssbox_values_inline($footer_sidebar_setting_margin,'mobile');
if (strpos($footer_sidebar_setting_margin_mobile, 'px') !== false){
    $footer_sidebar_setting_css		.= 'margin:'.$footer_sidebar_setting_margin_mobile.';';
}

/* padding */
$footer_sidebar_setting_padding = cosmoswp_get_theme_options('footer-sidebar-padding');
$footer_sidebar_setting_padding = json_decode($footer_sidebar_setting_padding,true);

// desktop padding
$footer_sidebar_setting_padding_desktop = cosmoswp_cssbox_values_inline($footer_sidebar_setting_padding,'desktop');
if (strpos($footer_sidebar_setting_padding_desktop, 'px') !== false){
    $footer_sidebar_setting_desktop_css		.= 'padding:'.$footer_sidebar_setting_padding_desktop.';';
}
//tablet padding
$footer_sidebar_setting_padding_tablet  = cosmoswp_cssbox_values_inline($footer_sidebar_setting_padding,'tablet');
if (strpos($footer_sidebar_setting_padding_tablet, 'px') !== false){
    $footer_sidebar_setting_tablet_css		.= 'padding:'.$footer_sidebar_setting_padding_tablet.';';
}
//mobile padding
$footer_sidebar_setting_padding_mobile  = cosmoswp_cssbox_values_inline($footer_sidebar_setting_padding,'mobile');
if (strpos($footer_sidebar_setting_padding_mobile, 'px') !== false){
    $footer_sidebar_setting_css		.= 'padding:'.$footer_sidebar_setting_padding_mobile.';';
}

/* mobile css */
if ( !empty($footer_sidebar_setting_css) ){
    $footer_sidebar_setting_dynamic_css = '.cwp-dynamic-footer .widget{
		'.$footer_sidebar_setting_css.'
	}';
    $footer_dynamic_css['all'] .= $footer_sidebar_setting_dynamic_css;
}

/* tablet css */
if ( !empty($footer_sidebar_setting_tablet_css) ){
    $footer_sidebar_setting_tablet_dynamic_css = '.cwp-dynamic-footer .widget{
		'.$footer_sidebar_setting_tablet_css.'
	}';
    $footer_dynamic_css['tablet'] .= $footer_sidebar_setting_tablet_dynamic_css;
}

/* desktop css  */
if ( !empty($footer_sidebar_setting_desktop_css) ){
    $footer_sidebar_setting_desktop_dynamic_css = '.cwp-dynamic-footer .widget{
		'.$footer_sidebar_setting_desktop_css.'
	}';
    $footer_dynamic_css['desktop'] .= $footer_sidebar_setting_desktop_dynamic_css;
}

?><?php
/*Footer top*/
$footer_top_css         = '';
$footer_top_tablet_css  = '';
$footer_top_desktop_css = '';
$footer_top_height_option  = cosmoswp_get_theme_options('footer-top-height-option');
if ('custom' == $footer_top_height_option ){
	$footer_top_height = cosmoswp_get_theme_options('footer-top-height');
	$footer_top_height = json_decode($footer_top_height,true);
	if (!empty($footer_top_height['desktop'])){
		$footer_top_css   .= 'height:'.$footer_top_height['desktop'].'px;';
    }
}
else{
	$footer_top_css .= 'height:auto;';
}

/* margin */
$footer_top_margin         		= cosmoswp_get_theme_options('footer-top-margin');
$footer_top_margin          	= json_decode($footer_top_margin,true);
// desktop margin 
$footer_top_margin_desktop = cosmoswp_cssbox_values_inline($footer_top_margin,'desktop');
if (strpos($footer_top_margin_desktop, 'px') !== false){
	$footer_top_desktop_css		.= 'margin:'.$footer_top_margin_desktop.';';
}
// tablet marign 
$footer_top_margin_tablet  = cosmoswp_cssbox_values_inline($footer_top_margin,'tablet');
if (strpos($footer_top_margin_tablet, 'px') !== false){
	$footer_top_tablet_css		.= 'margin:'.$footer_top_margin_tablet.';';
}
// mobile margin 
$footer_top_margin_mobile  = cosmoswp_cssbox_values_inline($footer_top_margin,'mobile');
if (strpos($footer_top_margin_mobile, 'px') !== false){
	$footer_top_css		.= 'margin:'.$footer_top_margin_mobile.';';
}

/* padding */
$footer_top_padding          	= cosmoswp_get_theme_options('footer-top-padding');
$footer_top_padding          	= json_decode($footer_top_padding,true);
// desktop padding
$footer_top_padding_desktop = cosmoswp_cssbox_values_inline($footer_top_padding,'desktop');
if (strpos($footer_top_padding_desktop, 'px') !== false){
	$footer_top_desktop_css		.= 'padding:'.$footer_top_padding_desktop.';';
}
//tablet padding
$footer_top_padding_tablet  = cosmoswp_cssbox_values_inline($footer_top_padding,'tablet');
if (strpos($footer_top_padding_tablet, 'px') !== false){
	$footer_top_tablet_css		.= 'padding:'.$footer_top_padding_tablet.';';
}
//mobile padding
$footer_top_padding_mobile  = cosmoswp_cssbox_values_inline($footer_top_padding,'mobile');
if (strpos($footer_top_padding_mobile, 'px') !== false){
	$footer_top_css		.= 'padding:'.$footer_top_padding_mobile.';';
}

//background options
$footer_top_bg_options          = cosmoswp_get_theme_options('footer-top-bg-options');
if ( 'custom' == $footer_top_bg_options ){

    $footer_top_bg              = cosmoswp_get_theme_options('footer-top-background-options');
    $footer_top_bg              = json_decode($footer_top_bg, true);
    $footer_top_overlay_css = '';
	//bg color
	$footer_top_bg_color      = cosmoswp_ifset($footer_top_bg['background-color']);
	if ( $footer_top_bg_color ){
		$footer_top_css		.= 'background-color:'.$footer_top_bg_color.';';
	}
	//bg image
	$footer_top_bg_image      = cosmoswp_ifset($footer_top_bg['background-image']);
	if ( $footer_top_bg_image ){
		$footer_top_css		.= 'background-image:url('.esc_url( $footer_top_bg_image ).');';
		//bg size
		$footer_top_bg_size       = cosmoswp_ifset($footer_top_bg['background-size']);
		if ( $footer_top_bg_size ){
			$footer_top_css		.= 'background-size:'.$footer_top_bg_size.';';
			$footer_top_css		.= '-webkit-background-size:'.$footer_top_bg_size.';';
		}
		//bg position
		$footer_top_bg_position   = cosmoswp_ifset($footer_top_bg['background-position']);
		if ( $footer_top_bg_position ){
			$footer_top_css		.= 'background-position:'.str_replace('_',' ', $footer_top_bg_position).';';
		}
		//bg repeat
		$footer_top_bg_repeat     = cosmoswp_ifset($footer_top_bg['background-repeat']);
		if ( $footer_top_bg_repeat ){
			$footer_top_css		.= 'background-repeat:'.$footer_top_bg_repeat.';';
		}
		//bg attachment
		$footer_top_bg_attachment = cosmoswp_ifset($footer_top_bg['background-attachment']);
		if ( $footer_top_bg_attachment ){
			$footer_top_css		.= 'background-attachment:'.$footer_top_bg_attachment.';';	
		}

        //bg overlay color
        $footer_top_enable_overlay   = cosmoswp_ifset($footer_top_bg['enable-overlay']);
        $footer_top_bg_overlay_color = cosmoswp_ifset($footer_top_bg['background-overlay-color']);
        if ( $footer_top_bg_overlay_color && $footer_top_enable_overlay){
            $footer_top_overlay_css		.= 'background:'.$footer_top_bg_overlay_color.';';
        }
	}
}
//border options
$footer_top_border           = cosmoswp_get_theme_options('footer-top-border-styling');
$footer_top_border           = json_decode($footer_top_border,true);
//box shadow
$footer_top_bx_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($footer_top_border['box-shadow-css']),'desktop');
if (strpos($footer_top_bx_shadow_css, 'px') !== false) {
	$footer_top_bxshadow_color   = cosmoswp_ifset($footer_top_border['box-shadow-color']);
	$footer_top_bx_shadow        = $footer_top_bx_shadow_css.' '.$footer_top_bxshadow_color;
	$footer_top_css .=	'-webkit-box-shadow:'.$footer_top_bx_shadow.';';
	$footer_top_css .=	'-moz-box-shadow:'.$footer_top_bx_shadow.';';
	$footer_top_css .=	'box-shadow:'.$footer_top_bx_shadow.';';
}
//border style
$footer_top_border_style     = cosmoswp_ifset($footer_top_border['border-style']);
if ( 'none' !== $footer_top_border_style ){

	$footer_top_css .= 'border-style:'.$footer_top_border_style.';';
	//border width
	$footer_top_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($footer_top_border['border-width']),'desktop');
	if (strpos($footer_top_border_width, 'px') !== false) {
		$footer_top_css .= 'border-width:'.$footer_top_border_width.';';
	}
	//border color
	$footer_top_border_color     = cosmoswp_ifset($footer_top_border['border-color']);
	if ($footer_top_border_color){
		$footer_top_css .= 'border-color:'.$footer_top_border_color.';';
	}
}
//border radius
$footer_top_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($footer_top_border['border-radius']),'desktop');
if (strpos($footer_top_border_radius, 'px') !== false){
	$footer_top_css		.= 'border-radius:'.$footer_top_border_radius.';';
}
//concated top footer css in all css

/* footer general overlay css */
if ( !empty($footer_top_overlay_css) ){
    $footer_top_overlay_dynamic_css = '.cwp-dynamic-footer .cwp-top-footer.cwp-enable-overlay::after{
'.$footer_top_overlay_css.'
}';
    $footer_dynamic_css['all'] .= $footer_top_overlay_dynamic_css;
}

/* mobile css */
if ( !empty($footer_top_css) ){
	$footer_top_dynamic_css = '.cwp-top-footer{
		'.$footer_top_css.'
	}';
	$footer_dynamic_css['all'] .= $footer_top_dynamic_css;
}

/* tablet css */
if ( !empty($footer_top_tablet_css) ){
	$footer_top_tablet_dynamic_css = '.cwp-top-footer{
		'.$footer_top_tablet_css.'
	}';
	$footer_dynamic_css['tablet'] .= $footer_top_tablet_dynamic_css;
}

/* desktop css  */
if ( !empty($footer_top_desktop_css) ){
	$footer_top_desktop_dynamic_css = '.cwp-top-footer{
		'.$footer_top_desktop_css.'
	}';
	$footer_dynamic_css['desktop'] .= $footer_top_desktop_dynamic_css;
}

/*widget title*/
$ft_widget_title_css         = '';
$ft_widget_title_tablet_css  = '';
$ft_widget_title_desktop_css = '';

/* margin */
$widget_title_margin = cosmoswp_get_theme_options('footer-top-widget-title-margin');
$widget_title_margin = json_decode($widget_title_margin,true);
// desktop margin 
$widget_title_margin_desktop = cosmoswp_cssbox_values_inline($widget_title_margin,'desktop');
if (strpos($widget_title_margin_desktop, 'px') !== false){
	$ft_widget_title_desktop_css		.= 'margin:'.$widget_title_margin_desktop.';';
}
// tablet marign 
$widget_title_margin_tablet  = cosmoswp_cssbox_values_inline($widget_title_margin,'tablet');
if (strpos($widget_title_margin_tablet, 'px') !== false){
	$ft_widget_title_tablet_css		.= 'margin:'.$widget_title_margin_tablet.';';
}
// mobile margin 
$widget_title_margin_mobile  = cosmoswp_cssbox_values_inline($widget_title_margin,'mobile');
if (strpos($widget_title_margin_mobile, 'px') !== false){
	$ft_widget_title_css		.= 'margin:'.$widget_title_margin_mobile.';';
}

/* padding */
$widget_title_padding = cosmoswp_get_theme_options('footer-top-widget-title-padding');
$widget_title_padding = json_decode($widget_title_padding,true);
// desktop padding
$widget_title_padding_desktop = cosmoswp_cssbox_values_inline($widget_title_padding,'desktop');
if (strpos($widget_title_padding_desktop, 'px') !== false){
	$ft_widget_title_desktop_css		.= 'padding:'.$widget_title_padding_desktop.';';
}
//tablet padding
$widget_title_padding_tablet  = cosmoswp_cssbox_values_inline($widget_title_padding,'tablet');
if (strpos($widget_title_padding_tablet, 'px') !== false){
	$ft_widget_title_tablet_css		.= 'padding:'.$widget_title_padding_tablet.';';
}
//mobile padding
$widget_title_padding_mobile  = cosmoswp_cssbox_values_inline($widget_title_padding,'mobile');
if (strpos($widget_title_padding_mobile, 'px') !== false){
	$ft_widget_title_css		.= 'padding:'.$widget_title_padding_mobile.';';
}

$widget_title_typography_options = cosmoswp_get_theme_options('footer-top-widget-title-typography-options');
if ('custom' == $widget_title_typography_options){
	
	$widget_title_typography         = cosmoswp_get_theme_options('footer-top-widget-title-typography');
	$widget_title_typography         = json_decode($widget_title_typography,true);

	$widget_title_font_family     =  cosmoswp_font_family($widget_title_typography);
	if ( $widget_title_font_family ){
		$ft_widget_title_css .=  'font-family:'.$widget_title_font_family.';';
		$widget_title_font_weight     = cosmoswp_font_weight( $widget_title_typography );
		if ( $widget_title_font_weight ){
			$ft_widget_title_css .=  'font-weight:'.$widget_title_font_weight.';';
		}
		$widget_title_font_style      = cosmoswp_ifset($widget_title_typography['font-style']);
		if ( $widget_title_font_style ){
			$ft_widget_title_css .=  'font-style:'.$widget_title_font_style.';';
		}
		$widget_title_text_decoration = cosmoswp_ifset($widget_title_typography['text-decoration']);
		if ( $widget_title_text_decoration ){
			$ft_widget_title_css .=  'text-decoration:'.$widget_title_text_decoration.';';
		}
		$widget_title_text_transform  = cosmoswp_ifset($widget_title_typography['text-transform']);
		if ( $widget_title_text_transform ){
			$ft_widget_title_css .=  'text-transform:'.$widget_title_text_transform.';';
		}
		$widget_title_font_size       = cosmoswp_ifset($widget_title_typography['font-size']['mobile']);
		if ( $widget_title_font_size ){
			$ft_widget_title_css .=  'font-size:'.$widget_title_font_size.'px;';
		}
		$widget_title_line_height     = cosmoswp_ifset($widget_title_typography['line-height']['mobile']);
		if ( $widget_title_line_height ){
			$ft_widget_title_css .=  'line-height:'.$widget_title_line_height.'px;';
		}
		$widget_title_letter_spacing  = cosmoswp_ifset($widget_title_typography['letter-spacing']['mobile']);
		if ( $widget_title_letter_spacing ){
			$ft_widget_title_css .=  'letter-spacing:'.$widget_title_letter_spacing.'px;';
		}

		/* Widget title tablet css */
		$widget_title_tablet_font_size       = cosmoswp_ifset($widget_title_typography['font-size']['tablet']);
		if ( $widget_title_tablet_font_size ){
			$ft_widget_title_tablet_css .=  'font-size:'.$widget_title_tablet_font_size.'px;';
		}
		$widget_title_tablet_line_height     = cosmoswp_ifset($widget_title_typography['line-height']['tablet']);
		if ( $widget_title_tablet_line_height ){
			$ft_widget_title_tablet_css .=  'line-height:'.$widget_title_tablet_line_height.'px;';
		}
		$widget_title_tablet_letter_spacing  = cosmoswp_ifset($widget_title_typography['letter-spacing']['tablet']);
		if ( $widget_title_tablet_letter_spacing ){
			$ft_widget_title_tablet_css .=  'letter-spacing:'.$widget_title_tablet_letter_spacing.'px;';
		}

		/* Wdget title desktop tablet css */
		$widget_title_desktop_font_size       = cosmoswp_ifset($widget_title_typography['font-size']['desktop']);
		if ( $widget_title_desktop_font_size ){
			$ft_widget_title_desktop_css .=  'font-size:'.$widget_title_desktop_font_size.'px;';
		}
		$widget_title_desktop_line_height     = cosmoswp_ifset($widget_title_typography['line-height']['desktop']);
		if ( $widget_title_desktop_line_height ){
			$ft_widget_title_desktop_css .=  'line-height:'.$widget_title_desktop_line_height.'px;';
		}
		$widget_title_desktop_letter_spacing  = cosmoswp_ifset($widget_title_typography['letter-spacing']['desktop']);
		if ( $widget_title_desktop_letter_spacing ){
			$ft_widget_title_desktop_css .=  'letter-spacing:'.$widget_title_desktop_letter_spacing.'px;';
		}
	}
}
//border options
$widget_title_border           = cosmoswp_get_theme_options('footer-top-widget-title-border-styling');
$widget_title_border           = json_decode($widget_title_border,true);
$widget_title_border_style     = cosmoswp_ifset($widget_title_border['border-style']);
if ( 'none' !== $widget_title_border_style ){

	$ft_widget_title_css .= 'border-style:'.$widget_title_border_style.';';
	//border width
	$widget_title_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($widget_title_border['border-width']),'desktop');
	if (strpos($widget_title_border_width, 'px') !== false) {
		$ft_widget_title_css .= 'border-width:'.$widget_title_border_width.';';
	}
	//border color
	$widget_title_border_color     = cosmoswp_ifset($widget_title_border['border-color']);
	if ($widget_title_border_color){
		$ft_widget_title_css .= 'border-color:'.$widget_title_border_color.';';
	}
}
$widget_title_color = cosmoswp_get_theme_options('footer-top-widget-title-color');
if ($widget_title_color){
	$ft_widget_title_css .= 'color:'.$widget_title_color.';';
}

/* widget title mobile css */
if ( !empty( $ft_widget_title_css )){
	$widget_title_dynamic_css = '.cwp-top-footer .widget-title{
		'.$ft_widget_title_css.'
	}';
	$footer_dynamic_css['all'] .= $widget_title_dynamic_css;
}

/* widget title tablet css */
if ( !empty($ft_widget_title_tablet_css) ){
	$widget_title_tablet_dynamic_css = '.cwp-top-footer .widget-title{
		'.$ft_widget_title_tablet_css.'
	}';
	$footer_dynamic_css['tablet'] .= $widget_title_tablet_dynamic_css;
}

/* widget title desktop css  */
if ( !empty($ft_widget_title_desktop_css) ){
	$widget_title_desktop_dynamic_css = '.cwp-top-footer .widget-title{
		'.$ft_widget_title_desktop_css.'
	}';
	$footer_dynamic_css['desktop'] .= $widget_title_desktop_dynamic_css;
}

/*widget content*/
$widget_content_css = '';
$widget_content_tablet_css = '';
$widget_content_desktop_css = '';
$widget_content_typography_options = cosmoswp_get_theme_options('footer-top-widget-content-typography-options');
if ('custom' == $widget_content_typography_options){
	
	$widget_content_typography         = cosmoswp_get_theme_options('footer-top-widget-content-typography');
	$widget_content_typography         = json_decode($widget_content_typography,true);

    $widget_title_font_family     =  cosmoswp_font_family($widget_content_typography);
    if ( $widget_title_font_family ){
        $widget_content_css .=  'font-family:'.$widget_title_font_family.';';
        $widget_title_font_weight     = cosmoswp_font_weight( $widget_content_typography );
        if ( $widget_title_font_weight ){
            $widget_content_css .=  'font-weight:'.$widget_title_font_weight.';';
        }
        $widget_title_font_style      = cosmoswp_ifset($widget_content_typography['font-style']);
        if ( $widget_title_font_style ){
            $widget_content_css .=  'font-style:'.$widget_title_font_style.';';
        }
        $widget_title_text_decoration = cosmoswp_ifset($widget_content_typography['text-decoration']);
        if ( $widget_title_text_decoration ){
            $widget_content_css .=  'text-decoration:'.$widget_title_text_decoration.';';
        }
        $widget_title_text_transform  = cosmoswp_ifset($widget_content_typography['text-transform']);
        if ( $widget_title_text_transform ){
            $widget_content_css .=  'text-transform:'.$widget_title_text_transform.';';
        }
        $widget_title_font_size       = cosmoswp_ifset($widget_content_typography['font-size']['mobile']);
        if ( $widget_title_font_size ){
            $widget_content_css .=  'font-size:'.$widget_title_font_size.'px;';
        }
        $widget_title_line_height     = cosmoswp_ifset($widget_content_typography['line-height']['mobile']);
        if ( $widget_title_line_height ){
            $widget_content_css .=  'line-height:'.$widget_title_line_height.'px;';
        }
        $widget_title_letter_spacing  = cosmoswp_ifset($widget_content_typography['letter-spacing']['mobile']);
        if ( $widget_title_letter_spacing ){
            $widget_content_css .=  'letter-spacing:'.$widget_title_letter_spacing.'px;';
        }

        /* Widget title tablet css */
        $widget_title_tablet_font_size       = cosmoswp_ifset($widget_content_typography['font-size']['tablet']);
        if ( $widget_title_tablet_font_size ){
            $widget_content_tablet_css .=  'font-size:'.$widget_title_tablet_font_size.'px;';
        }
        $widget_title_tablet_line_height     = cosmoswp_ifset($widget_content_typography['line-height']['tablet']);
        if ( $widget_title_tablet_line_height ){
            $widget_content_tablet_css .=  'line-height:'.$widget_title_tablet_line_height.'px;';
        }
        $widget_title_tablet_letter_spacing  = cosmoswp_ifset($widget_content_typography['letter-spacing']['tablet']);
        if ( $widget_title_tablet_letter_spacing ){
            $widget_content_tablet_css .=  'letter-spacing:'.$widget_title_tablet_letter_spacing.'px;';
        }

        /* Wdget title desktop tablet css */
        $widget_title_desktop_font_size       = cosmoswp_ifset($widget_content_typography['font-size']['desktop']);
        if ( $widget_title_desktop_font_size ){
            $widget_content_desktop_css .=  'font-size:'.$widget_title_desktop_font_size.'px;';
        }
        $widget_title_desktop_line_height     = cosmoswp_ifset($widget_content_typography['line-height']['desktop']);
        if ( $widget_title_desktop_line_height ){
            $widget_content_desktop_css .=  'line-height:'.$widget_title_desktop_line_height.'px;';
        }
        $widget_title_desktop_letter_spacing  = cosmoswp_ifset($widget_content_typography['letter-spacing']['desktop']);
        if ( $widget_title_desktop_letter_spacing ){
            $widget_content_desktop_css .=  'letter-spacing:'.$widget_title_desktop_letter_spacing.'px;';
        }
    }
}
//border options
$widget_content_border           = cosmoswp_get_theme_options('footer-top-widget-content-border-styling');
$widget_content_border           = json_decode($widget_content_border,true);
$widget_content_border_style     = cosmoswp_ifset($widget_content_border['border-style']);
if ( 'none' !== $widget_content_border_style ){

	$widget_content_css .= 'border-style:'.$widget_content_border_style.';';
	//border width
	$widget_content_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($widget_content_border['border-width']),'desktop');
	if (strpos($widget_content_border_width, 'px') !== false) {
		$widget_content_css .= 'border-width:'.$widget_content_border_width.';';
	}
	//border color
	$widget_content_border_color     = cosmoswp_ifset($widget_content_border['border-color']);
	if ($widget_content_border_color){
		$widget_content_css .= 'border-color:'.$widget_content_border_color.';';
	}
}
/*Mobile css*/
if ( !empty( $widget_content_css )){
	$widget_content_dynamic_css = '.cwp-top-footer .widget, .cwp-top-footer .widget a{
		'.$widget_content_css.'
	}';
	$footer_dynamic_css['all'] .= $widget_content_dynamic_css;
}
/*Tablet css*/
if ( !empty( $widget_content_tablet_css )){
    $widget_content_dynamic_tablet_css = '.cwp-top-footer .widget, .cwp-top-footer .widget a{
		'.$widget_content_tablet_css.'
	}';
    $footer_dynamic_css['tablet'] .= $widget_content_dynamic_tablet_css;
}
/*Desktop Css*/
if ( !empty( $widget_content_desktop_css )){
    $widget_content_dynamic_desktop_css = '.cwp-top-footer .widget, .cwp-top-footer .widget a{
		'.$widget_content_desktop_css.'
	}';
    $footer_dynamic_css['desktop'] .= $widget_content_dynamic_desktop_css;
}
$widget_content_color_options = cosmoswp_get_theme_options('footer-top-widget-content-color-options');
$widget_content_color_options = json_decode($widget_content_color_options,true);

/* Widget text color */
$widget_content_text_color             = cosmoswp_ifset($widget_content_color_options['text-color']);
if ( !empty( $widget_content_text_color )){
    $widget_content_text_dynamic_css = '.cwp-top-footer .widget{
		color:'.$widget_content_text_color.';
	}';
    $footer_dynamic_css['all'] .= $widget_content_text_dynamic_css;
}
$widget_content_link_color        = cosmoswp_ifset($widget_content_color_options['link-color']);
if ( !empty( $widget_content_link_color )){
    $widget_content_link_dynamic_css = '.cwp-top-footer .widget a{
		color:'.$widget_content_link_color.';
	}';
    $footer_dynamic_css['all'] .= $widget_content_link_dynamic_css;
}
$widget_content_link_hover_color        = cosmoswp_ifset($widget_content_color_options['link-hover-color']);
if ( !empty( $widget_content_link_hover_color )){
    $widget_content_link_hover_dynamic_css = '.cwp-top-footer .widget a:hover{
		color:'.$widget_content_link_hover_color.';
	}';
    $footer_dynamic_css['all'] .= $widget_content_link_hover_dynamic_css;
}
?><?php 
/*footer main*/
$footer_main_css         = '';
$footer_main_tablet_css  = '';
$footer_main_desktop_css = '';
//height
$footer_main_height_option  = cosmoswp_get_theme_options('footer-main-height-option');
if ('custom' == $footer_main_height_option ){
	$footer_main_height = cosmoswp_get_theme_options('footer-main-height');
	$footer_main_height = json_decode($footer_main_height,true);
	if (!empty($footer_main_height['desktop'])){
		$footer_main_css   .= 'height:'.$footer_main_height['desktop'].'px;';
    }
}
else{
	$footer_main_css .= 'height:auto;';
}
/* margin */
$footer_main_margin = cosmoswp_get_theme_options('footer-main-margin');
$footer_main_margin = json_decode($footer_main_margin,true);
// desktop margin 
$footer_main_margin_desktop = cosmoswp_cssbox_values_inline($footer_main_margin,'desktop');
if (strpos($footer_main_margin_desktop, 'px') !== false){
	$footer_main_desktop_css		.= 'margin:'.$footer_main_margin_desktop.';';
}
// tablet marign 
$footer_main_margin_tablet  = cosmoswp_cssbox_values_inline($footer_main_margin,'tablet');
if (strpos($footer_main_margin_tablet, 'px') !== false){
	$footer_main_tablet_css		.= 'margin:'.$footer_main_margin_tablet.';';
}
// mobile margin 
$footer_main_margin_mobile  = cosmoswp_cssbox_values_inline($footer_main_margin,'mobile');
if (strpos($footer_main_margin_mobile, 'px') !== false){
	$footer_main_css		.= 'margin:'.$footer_main_margin_mobile.';';
}

/* padding */
$footer_main_padding = cosmoswp_get_theme_options('footer-main-padding');
$footer_main_padding = json_decode($footer_main_padding,true);
// desktop padding
$footer_main_padding_desktop = cosmoswp_cssbox_values_inline($footer_main_padding,'desktop');
if (strpos($footer_main_padding_desktop, 'px') !== false){
	$footer_main_desktop_css		.= 'padding:'.$footer_main_padding_desktop.';';
}
//tablet padding
$footer_main_padding_tablet  = cosmoswp_cssbox_values_inline($footer_main_padding,'tablet');
if (strpos($footer_main_padding_tablet, 'px') !== false){
	$footer_main_tablet_css		.= 'padding:'.$footer_main_padding_tablet.';';
}
//mobile padding
$footer_main_padding_mobile  = cosmoswp_cssbox_values_inline($footer_main_padding,'mobile');
if (strpos($footer_main_padding_mobile, 'px') !== false){
	$footer_main_css		.= 'padding:'.$footer_main_padding_mobile.';';
}

//background options
$footer_main_bg_options          = cosmoswp_get_theme_options('footer-main-bg-options');
if ( 'custom' == $footer_main_bg_options ){

	//background
	$footer_main_bg            = cosmoswp_get_theme_options('footer-main-background-options');
	$footer_main_bg            = json_decode($footer_main_bg,true);
    $footer_main_overlay_css   = '';
	//bg color
	$footer_main_bg_color      = cosmoswp_ifset($footer_main_bg['background-color']);
	if ( $footer_main_bg_color ){
		$footer_main_css		.= 'background-color:'.$footer_main_bg_color.';';
	}
	//bg image
	$footer_main_bg_image      = cosmoswp_ifset($footer_main_bg['background-image']);
	if ( $footer_main_bg_image ){
		$footer_main_css		.= 'background-image:url('.esc_url( $footer_main_bg_image ).');';
		//bg size
		$footer_main_bg_size       = cosmoswp_ifset($footer_main_bg['background-size']);
		if ( $footer_main_bg_size ){
			$footer_main_css		.= 'background-size:'.$footer_main_bg_size.';';
			$footer_main_css		.= '-webkit-background-size:'.$footer_main_bg_size.';';
		}
		//bg position
		$footer_main_bg_position   = cosmoswp_ifset($footer_main_bg['background-position']);
		if ( $footer_main_bg_position ){
			$footer_main_css		.= 'background-position:'.str_replace('_',' ', $footer_main_bg_position).';';
		}
		//bg repeat
		$footer_main_bg_repeat     = cosmoswp_ifset($footer_main_bg['background-repeat']);
		if ( $footer_main_bg_repeat ){
			$footer_main_css		.= 'background-repeat:'.$footer_main_bg_repeat.';';
		}
		//bg attachment
		$footer_main_bg_attachment = cosmoswp_ifset($footer_main_bg['background-attachment']);
		if ( $footer_main_bg_attachment ){
			$footer_main_css		.= 'background-attachment:'.$footer_main_bg_attachment.';';	
		}

        //bg overlay color
        $footer_main_enable_overlay   = cosmoswp_ifset($footer_main_bg['enable-overlay']);
        $footer_main_bg_overlay_color = cosmoswp_ifset($footer_main_bg['background-overlay-color']);
        if ( $footer_main_bg_overlay_color && $footer_main_enable_overlay){
            $footer_main_overlay_css		.= 'background:'.$footer_main_bg_overlay_color.';';
        }
	}
}
//border options
$footer_main_border           = cosmoswp_get_theme_options('footer-main-border-styling');
$footer_main_border           = json_decode($footer_main_border,true);
//box shadow
$footer_main_bx_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($footer_main_border['box-shadow-css']),'desktop');
if (strpos($footer_main_bx_shadow_css, 'px') !== false) {
	$footer_main_bxshadow_color   = cosmoswp_ifset($footer_main_border['box-shadow-color']);
	$footer_main_bx_shadow        = $footer_main_bx_shadow_css.' '.$footer_main_bxshadow_color;
	$footer_main_css .=	'-webkit-box-shadow:'.$footer_main_bx_shadow.';';
	$footer_main_css .=	'-moz-box-shadow:'.$footer_main_bx_shadow.';';
	$footer_main_css .=	'box-shadow:'.$footer_main_bx_shadow.';';
}
//border style
$footer_main_border_style     = cosmoswp_ifset($footer_main_border['border-style']);
if ( 'none' !== $footer_main_border_style ){

	$footer_main_css .= 'border-style:'.$footer_main_border_style.';';
	//border width
	$footer_main_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($footer_main_border['border-width']),'desktop');
	if (strpos($footer_main_border_width, 'px') !== false) {
		$footer_main_css .= 'border-width:'.$footer_main_border_width.';';
	}
	//border color
	$footer_main_border_color     = cosmoswp_ifset($footer_main_border['border-color']);
	if ($footer_main_border_color){
		$footer_main_css .= 'border-color:'.$footer_main_border_color.';';
	}
}
//border radius
$footer_main_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($footer_main_border['border-radius']),'desktop');
if (strpos($footer_main_border_radius, 'px') !== false){
	$footer_main_css		.= 'border-radius:'.$footer_main_border_radius.';';
}

/* mobile css */
/* footer main overlay css */
if ( !empty($footer_main_overlay_css) ){
    $footer_main_overlay_dynamic_css = '.cwp-dynamic-footer .cwp-main-footer.cwp-enable-overlay::after{
'.$footer_main_overlay_css.'
}';
    $footer_dynamic_css['all'] .= $footer_main_overlay_dynamic_css;
}

if ( !empty($footer_main_css) ){
	$footer_main_dynamic_css = '.cwp-main-footer{
		'.$footer_main_css.'
	}';
	$footer_dynamic_css['all'] .= $footer_main_dynamic_css;
}

/* tablet css */
if ( !empty($footer_main_tablet_css) ){
	$footer_main_tablet_dynamic_css = '.cwp-main-footer{
		'.$footer_main_tablet_css.'
	}';
	$footer_dynamic_css['tablet'] .= $footer_main_tablet_dynamic_css;
}

/* desktop css  */
if ( !empty($footer_main_desktop_css) ){
	$footer_main_desktop_dynamic_css = '.cwp-main-footer{
		'.$footer_main_desktop_css.'
	}';
	$footer_dynamic_css['desktop'] .= $footer_main_desktop_dynamic_css;
}

/*widget title*/
$fm_widget_title_css = '';
$fm_widget_title_tablet_css  = '';
$fm_widget_title_desktop_css = '';

/* margin */
$widget_title_margin = cosmoswp_get_theme_options('footer-main-widget-title-margin');
$widget_title_margin = json_decode($widget_title_margin,true);
// desktop margin 
$widget_title_margin_desktop = cosmoswp_cssbox_values_inline($widget_title_margin,'desktop');
if (strpos($widget_title_margin_desktop, 'px') !== false){
	$fm_widget_title_desktop_css		.= 'margin:'.$widget_title_margin_desktop.';';
}
// tablet marign 
$widget_title_margin_tablet  = cosmoswp_cssbox_values_inline($widget_title_margin,'tablet');
if (strpos($widget_title_margin_tablet, 'px') !== false){
	$fm_widget_title_tablet_css		.= 'margin:'.$widget_title_margin_tablet.';';
}
// mobile margin 
$widget_title_margin_mobile  = cosmoswp_cssbox_values_inline($widget_title_margin,'mobile');
if (strpos($widget_title_margin_mobile, 'px') !== false){
	$fm_widget_title_css		.= 'margin:'.$widget_title_margin_mobile.';';
}

/* padding */
$widget_title_padding = cosmoswp_get_theme_options('footer-main-widget-title-padding');
$widget_title_padding = json_decode($widget_title_padding,true);
// desktop padding
$widget_title_padding_desktop = cosmoswp_cssbox_values_inline($widget_title_padding,'desktop');
if (strpos($widget_title_padding_desktop, 'px') !== false){
	$fm_widget_title_desktop_css		.= 'padding:'.$widget_title_padding_desktop.';';
}
//tablet padding
$widget_title_padding_tablet  = cosmoswp_cssbox_values_inline($widget_title_padding,'tablet');
if (strpos($widget_title_padding_tablet, 'px') !== false){
	$fm_widget_title_tablet_css		.= 'padding:'.$widget_title_padding_tablet.';';
}
//mobile padding
$widget_title_padding_mobile  = cosmoswp_cssbox_values_inline($widget_title_padding,'mobile');
if (strpos($widget_title_padding_mobile, 'px') !== false){
	$fm_widget_title_css		.= 'padding:'.$widget_title_padding_mobile.';';
}

$widget_title_typography_options = cosmoswp_get_theme_options('footer-main-widget-title-typography-options');
if ('custom' == $widget_title_typography_options){
	
	$widget_title_typography         = cosmoswp_get_theme_options('footer-main-widget-title-typography');
	$widget_title_typography         = json_decode($widget_title_typography,true);

	$widget_title_font_family     =  cosmoswp_font_family($widget_title_typography);
	if ( $widget_title_font_family ){
		$fm_widget_title_css .=  'font-family:'.$widget_title_font_family.';';
		$widget_title_font_weight     = cosmoswp_font_weight( $widget_title_typography );
		if ( $widget_title_font_weight ){
			$fm_widget_title_css .=  'font-weight:'.$widget_title_font_weight.';';
		}
		$widget_title_font_style      = cosmoswp_ifset($widget_title_typography['font-style']);
		if ( $widget_title_font_style ){
			$fm_widget_title_css .=  'font-style:'.$widget_title_font_style.';';
		}
		$widget_title_text_decoration = cosmoswp_ifset($widget_title_typography['text-decoration']);
		if ( $widget_title_text_decoration ){
			$fm_widget_title_css .=  'text-decoration:'.$widget_title_text_decoration.';';
		}
		$widget_title_text_transform  = cosmoswp_ifset($widget_title_typography['text-transform']);
		if ( $widget_title_text_transform ){
			$fm_widget_title_css .=  'text-transform:'.$widget_title_text_transform.';';
		}
		$widget_title_font_size       = cosmoswp_ifset($widget_title_typography['font-size']['mobile']);
		if ( $widget_title_font_size ){
			$fm_widget_title_css .=  'font-size:'.$widget_title_font_size.'px;';
		}
		$widget_title_line_height     = cosmoswp_ifset($widget_title_typography['line-height']['mobile']);
		if ( $widget_title_line_height ){
			$fm_widget_title_css .=  'line-height:'.$widget_title_line_height.'px;';
		}
		$widget_title_letter_spacing  = cosmoswp_ifset($widget_title_typography['letter-spacing']['mobile']);
		if ( $widget_title_letter_spacing ){
			$fm_widget_title_css .=  'letter-spacing:'.$widget_title_letter_spacing.'px;';
		}

		/* Widget title tablet css */
		$widget_title_tablet_font_size       = cosmoswp_ifset($widget_title_typography['font-size']['tablet']);
		if ( $widget_title_tablet_font_size ){
			$fm_widget_title_tablet_css .=  'font-size:'.$widget_title_tablet_font_size.'px;';
		}
		$widget_title_tablet_line_height     = cosmoswp_ifset($widget_title_typography['line-height']['tablet']);
		if ( $widget_title_tablet_line_height ){
			$fm_widget_title_tablet_css .=  'line-height:'.$widget_title_tablet_line_height.'px;';
		}
		$widget_title_tablet_letter_spacing  = cosmoswp_ifset($widget_title_typography['letter-spacing']['tablet']);
		if ( $widget_title_tablet_letter_spacing ){
			$fm_widget_title_tablet_css .=  'letter-spacing:'.$widget_title_tablet_letter_spacing.'px;';
		}

		/* Wdget title desktop tablet css */
		$widget_title_desktop_font_size       = cosmoswp_ifset($widget_title_typography['font-size']['desktop']);
		if ( $widget_title_desktop_font_size ){
			$fm_widget_title_desktop_css .=  'font-size:'.$widget_title_desktop_font_size.'px;';
		}
		$widget_title_desktop_line_height     = cosmoswp_ifset($widget_title_typography['line-height']['desktop']);
		if ( $widget_title_desktop_line_height ){
			$fm_widget_title_desktop_css .=  'line-height:'.$widget_title_desktop_line_height.'px;';
		}
		$widget_title_desktop_letter_spacing  = cosmoswp_ifset($widget_title_typography['letter-spacing']['desktop']);
		if ( $widget_title_desktop_letter_spacing ){
			$fm_widget_title_desktop_css .=  'letter-spacing:'.$widget_title_desktop_letter_spacing.'px;';
		}
	}
}
//border options
$widget_title_border           = cosmoswp_get_theme_options('footer-main-widget-title-border-styling');
$widget_title_border           = json_decode($widget_title_border,true);
$widget_title_border_style     = cosmoswp_ifset($widget_title_border['border-style']);
if ( 'none' !== $widget_title_border_style ){

	$fm_widget_title_css .= 'border-style:'.$widget_title_border_style.';';
	//border width
	$widget_title_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($widget_title_border['border-width']),'desktop');
	if (strpos($widget_title_border_width, 'px') !== false) {
		$fm_widget_title_css .= 'border-width:'.$widget_title_border_width.';';
	}
	//border color
	$widget_title_border_color     = cosmoswp_ifset($widget_title_border['border-color']);
	if ($widget_title_border_color){
		$fm_widget_title_css .= 'border-color:'.$widget_title_border_color.';';
	}
}
$widget_title_color = cosmoswp_get_theme_options('footer-main-widget-title-color');
if ($widget_title_color){
	$fm_widget_title_css .= 'color:'.$widget_title_color.';';
}
/* mobile css */
if ( !empty( $fm_widget_title_css )){
	$widget_title_dynamic_css = '.cwp-main-footer .widget-title{
		'.$fm_widget_title_css.'
	}';
	$footer_dynamic_css['all'] .= $widget_title_dynamic_css;
}

/* widget title tablet css */
if ( !empty($fm_widget_title_tablet_css) ){
	$widget_title_tablet_dynamic_css = '.cwp-main-footer .widget-title{
		'.$fm_widget_title_tablet_css.'
	}';
	$footer_dynamic_css['tablet'] .= $widget_title_tablet_dynamic_css;
}

/* widget title desktop css  */
if ( !empty($fm_widget_title_desktop_css) ){
	$widget_title_desktop_dynamic_css = '.cwp-main-footer .widget-title{
		'.$fm_widget_title_desktop_css.'
	}';
	$footer_dynamic_css['desktop'] .= $widget_title_desktop_dynamic_css;
}

/*widget content*/
$widget_content_css = '';
$fm_widget_content_tablet_css = '';
$fm_widget_content_desktop_css = '';
$widget_content_typography_options = cosmoswp_get_theme_options('footer-main-widget-content-typography-options');
if ('custom' == $widget_content_typography_options){
	
	$widget_content_typography         = cosmoswp_get_theme_options('footer-main-widget-content-typography');
	$widget_content_typography         = json_decode($widget_content_typography,true);

    $widget_title_font_family     =  cosmoswp_font_family($widget_content_typography);
    if ( $widget_title_font_family ){
        $widget_content_css .=  'font-family:'.$widget_title_font_family.';';
        $widget_title_font_weight     = cosmoswp_font_weight( $widget_content_typography );
        if ( $widget_title_font_weight ){
            $widget_content_css .=  'font-weight:'.$widget_title_font_weight.';';
        }
        $widget_title_font_style      = cosmoswp_ifset($widget_content_typography['font-style']);
        if ( $widget_title_font_style ){
            $widget_content_css .=  'font-style:'.$widget_title_font_style.';';
        }
        $widget_title_text_decoration = cosmoswp_ifset($widget_content_typography['text-decoration']);
        if ( $widget_title_text_decoration ){
            $widget_content_css .=  'text-decoration:'.$widget_title_text_decoration.';';
        }
        $widget_title_text_transform  = cosmoswp_ifset($widget_content_typography['text-transform']);
        if ( $widget_title_text_transform ){
            $widget_content_css .=  'text-transform:'.$widget_title_text_transform.';';
        }
        $widget_title_font_size       = cosmoswp_ifset($widget_content_typography['font-size']['mobile']);
        if ( $widget_title_font_size ){
            $widget_content_css .=  'font-size:'.$widget_title_font_size.'px;';
        }
        $widget_title_line_height     = cosmoswp_ifset($widget_content_typography['line-height']['mobile']);
        if ( $widget_title_line_height ){
            $widget_content_css .=  'line-height:'.$widget_title_line_height.'px;';
        }
        $widget_title_letter_spacing  = cosmoswp_ifset($widget_content_typography['letter-spacing']['mobile']);
        if ( $widget_title_letter_spacing ){
            $widget_content_css .=  'letter-spacing:'.$widget_title_letter_spacing.'px;';
        }

        /* Widget title tablet css */
        $widget_title_tablet_font_size       = cosmoswp_ifset($widget_content_typography['font-size']['tablet']);
        if ( $widget_title_tablet_font_size ){
            $widget_content_tablet_css .=  'font-size:'.$widget_title_tablet_font_size.'px;';
        }
        $widget_title_tablet_line_height     = cosmoswp_ifset($widget_content_typography['line-height']['tablet']);
        if ( $widget_title_tablet_line_height ){
            $widget_content_tablet_css .=  'line-height:'.$widget_title_tablet_line_height.'px;';
        }
        $widget_title_tablet_letter_spacing  = cosmoswp_ifset($widget_content_typography['letter-spacing']['tablet']);
        if ( $widget_title_tablet_letter_spacing ){
            $widget_content_tablet_css .=  'letter-spacing:'.$widget_title_tablet_letter_spacing.'px;';
        }

        /* Wdget title desktop tablet css */
        $widget_title_desktop_font_size       = cosmoswp_ifset($widget_content_typography['font-size']['desktop']);
        if ( $widget_title_desktop_font_size ){
            $widget_content_desktop_css .=  'font-size:'.$widget_title_desktop_font_size.'px;';
        }
        $widget_title_desktop_line_height     = cosmoswp_ifset($widget_content_typography['line-height']['desktop']);
        if ( $widget_title_desktop_line_height ){
            $widget_content_desktop_css .=  'line-height:'.$widget_title_desktop_line_height.'px;';
        }
        $widget_title_desktop_letter_spacing  = cosmoswp_ifset($widget_content_typography['letter-spacing']['desktop']);
        if ( $widget_title_desktop_letter_spacing ){
            $widget_content_desktop_css .=  'letter-spacing:'.$widget_title_desktop_letter_spacing.'px;';
        }
    }
}

//border options
$widget_content_border           = cosmoswp_get_theme_options('footer-main-widget-content-border-styling');
$widget_content_border           = json_decode($widget_content_border,true);
$widget_content_border_style     = cosmoswp_ifset($widget_content_border['border-style']);
if ( 'none' !== $widget_content_border_style ){

	$widget_content_css .= 'border-style:'.$widget_content_border_style.';';
	//border width
	$widget_content_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($widget_content_border['border-width']),'desktop');
	if (strpos($widget_content_border_width, 'px') !== false) {
		$widget_content_css .= 'border-width:'.$widget_content_border_width.';';
	}
	//border color
	$widget_content_border_color     = cosmoswp_ifset($widget_content_border['border-color']);
	if ($widget_content_border_color){
		$widget_content_css .= 'border-color:'.$widget_content_border_color.';';
	}
}

/*Mobile css*/
if ( !empty( $widget_content_css )){
    $widget_content_dynamic_css = '.cwp-main-footer .widget, .cwp-main-footer .widget a{
		'.$widget_content_css.'
	}';
    $footer_dynamic_css['all'] .= $widget_content_dynamic_css;
}

/*Tablet css*/
if ( !empty( $widget_content_tablet_css )){
    $widget_content_dynamic_tablet_css = '.cwp-main-footer .widget, .cwp-main-footer .widget a{
		'.$widget_content_tablet_css.'
	}';
    $footer_dynamic_css['tablet'] .= $widget_content_dynamic_tablet_css;
}

/*Desktop css*/
if ( !empty( $widget_content_desktop_css )){
    $widget_content_dynamic_desktop_css = '.cwp-main-footer .widget, .cwp-main-footer .widget a{
		'.$widget_content_desktop_css.'
	}';
    $footer_dynamic_css['desktop'] .= $widget_content_dynamic_desktop_css;
}

$widget_content_color_options = cosmoswp_get_theme_options('footer-main-widget-content-color-options');
$widget_content_color_options = json_decode($widget_content_color_options,true);

/* Widget text color */
$widget_content_text_color             = cosmoswp_ifset($widget_content_color_options['text-color']);
if ( !empty( $widget_content_text_color )){
    $widget_content_text_dynamic_css = '.cwp-main-footer .widget{
		color:'.$widget_content_text_color.';
	}';
    $footer_dynamic_css['all'] .= $widget_content_text_dynamic_css;
}
$widget_content_link_color        = cosmoswp_ifset($widget_content_color_options['link-color']);
if ( !empty( $widget_content_link_color )){
    $widget_content_link_dynamic_css = '.cwp-main-footer .widget a{
		color:'.$widget_content_link_color.';
	}';
    $footer_dynamic_css['all'] .= $widget_content_link_dynamic_css;
}
$widget_content_link_hover_color        = cosmoswp_ifset($widget_content_color_options['link-hover-color']);
if ( !empty( $widget_content_link_hover_color )){
    $widget_content_link_hover_dynamic_css = '.cwp-main-footer .widget a:hover{
		color:'.$widget_content_link_hover_color.';
	}';
    $footer_dynamic_css['all'] .= $widget_content_link_hover_dynamic_css;
}
?><?php
/*footer bottom*/
$footer_bottom_css   = '';
$footer_bottom_tablet_css  = '';
$footer_bottom_desktop_css = '';
//height
$footer_bottom_height_option  = cosmoswp_get_theme_options('footer-bottom-height-option');
if ('custom' == $footer_bottom_height_option ){
	$footer_bottom_height = cosmoswp_get_theme_options('footer-bottom-height');
	$footer_bottom_height = json_decode($footer_bottom_height,true);
	if (!empty($footer_bottom_height['desktop'])){
		$footer_bottom_css   .= 'height:'.$footer_bottom_height['desktop'].'px;';
    }
}
else{
	$footer_bottom_css .= 'height:auto;';
}
/* margin */
$footer_bottom_margin = cosmoswp_get_theme_options('footer-bottom-margin');
$footer_bottom_margin = json_decode($footer_bottom_margin,true);
// desktop margin 
$footer_bottom_margin_desktop = cosmoswp_cssbox_values_inline($footer_bottom_margin,'desktop');
if (strpos($footer_bottom_margin_desktop, 'px') !== false){
	$footer_bottom_desktop_css		.= 'margin:'.$footer_bottom_margin_desktop.';';
}
// tablet marign 
$footer_bottom_margin_tablet  = cosmoswp_cssbox_values_inline($footer_bottom_margin,'tablet');
if (strpos($footer_bottom_margin_tablet, 'px') !== false){
	$footer_bottom_tablet_css		.= 'margin:'.$footer_bottom_margin_tablet.';';
}
// mobile margin 
$footer_bottom_margin_mobile  = cosmoswp_cssbox_values_inline($footer_bottom_margin,'mobile');
if (strpos($footer_bottom_margin_mobile, 'px') !== false){
	$footer_bottom_css		.= 'margin:'.$footer_bottom_margin_mobile.';';
}

/* padding */
$footer_bottom_padding = cosmoswp_get_theme_options('footer-bottom-padding');
$footer_bottom_padding = json_decode($footer_bottom_padding,true);

// desktop padding
$footer_bottom_padding_desktop = cosmoswp_cssbox_values_inline($footer_bottom_padding,'desktop');
if (strpos($footer_bottom_padding_desktop, 'px') !== false){
	$footer_bottom_desktop_css		.= 'padding:'.$footer_bottom_padding_desktop.';';
}
//tablet padding
$footer_bottom_padding_tablet  = cosmoswp_cssbox_values_inline($footer_bottom_padding,'tablet');
if (strpos($footer_bottom_padding_tablet, 'px') !== false){
	$footer_bottom_tablet_css		.= 'padding:'.$footer_bottom_padding_tablet.';';
}
//mobile padding
$footer_bottom_padding_mobile  = cosmoswp_cssbox_values_inline($footer_bottom_padding,'mobile');
if (strpos($footer_bottom_padding_mobile, 'px') !== false){
	$footer_bottom_css		.= 'padding:'.$footer_bottom_padding_mobile.';';
}
//background options
$footer_bottom_bg_options          = cosmoswp_get_theme_options('footer-bottom-bg-options');
if ( 'custom' == $footer_bottom_bg_options ){

	//background
	$footer_bottom_bg            = cosmoswp_get_theme_options('footer-bottom-background-options');
	$footer_bottom_bg            = json_decode($footer_bottom_bg,true);
    $footer_bottom_overlay_css   = '';
	//bg color
	$footer_bottom_bg_color      = cosmoswp_ifset($footer_bottom_bg['background-color']);
	if ( $footer_bottom_bg_color ){
		$footer_bottom_css		.= 'background-color:'.$footer_bottom_bg_color.';';
	}
	//bg image
	$footer_bottom_bg_image      = cosmoswp_ifset($footer_bottom_bg['background-image']);
	if ( $footer_bottom_bg_image ){
		$footer_bottom_css		.= 'background-image:url('.esc_url( $footer_bottom_bg_image ).');';
		//bg size
		$footer_bottom_bg_size       = cosmoswp_ifset($footer_bottom_bg['background-size']);
		if ( $footer_bottom_bg_size ){
			$footer_bottom_css		.= 'background-size:'.$footer_bottom_bg_size.';';
			$footer_bottom_css		.= '-webkit-background-size:'.$footer_bottom_bg_size.';';
		}
		//bg position
		$footer_bottom_bg_position   = cosmoswp_ifset($footer_bottom_bg['background-position']);
		if ( $footer_bottom_bg_position ){
			$footer_bottom_css		.= 'background-position:'.str_replace('_',' ', $footer_bottom_bg_position).';';
		}
		//bg repeat
		$footer_bottom_bg_repeat     = cosmoswp_ifset($footer_bottom_bg['background-repeat']);
		if ( $footer_bottom_bg_repeat ){
			$footer_bottom_css		.= 'background-repeat:'.$footer_bottom_bg_repeat.';';
		}
		//bg attachment
		$footer_bottom_bg_attachment = cosmoswp_ifset($footer_bottom_bg['background-attachment']);
		if ( $footer_bottom_bg_attachment ){
			$footer_bottom_css		.= 'background-attachment:'.$footer_bottom_bg_attachment.';';	
		}

        //bg overlay color
        $footer_bottom_enable_overlay   = cosmoswp_ifset($footer_bottom_bg['enable-overlay']);
        $footer_bottom_bg_overlay_color = cosmoswp_ifset($footer_bottom_bg['background-overlay-color']);
        if ( $footer_bottom_bg_overlay_color && $footer_bottom_enable_overlay){
            $footer_bottom_overlay_css		.= 'background:'.$footer_bottom_bg_overlay_color.';';
        }
	}
}
//border options
$footer_bottom_border           = cosmoswp_get_theme_options('footer-bottom-border-styling');
$footer_bottom_border           = json_decode($footer_bottom_border,true);
//box shadow
$footer_bottom_bx_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($footer_bottom_border['box-shadow-css']),'desktop');
if (strpos($footer_bottom_bx_shadow_css, 'px') !== false) {
	$footer_bottom_bxshadow_color   = cosmoswp_ifset($footer_bottom_border['box-shadow-color']);
	$footer_bottom_bx_shadow        = $footer_bottom_bx_shadow_css.' '.$footer_bottom_bxshadow_color;
	$footer_bottom_css .=	'-webkit-box-shadow:'.$footer_bottom_bx_shadow.';';
	$footer_bottom_css .=	'-moz-box-shadow:'.$footer_bottom_bx_shadow.';';
	$footer_bottom_css .=	'box-shadow:'.$footer_bottom_bx_shadow.';';
}
//border style
$footer_bottom_border_style     = cosmoswp_ifset($footer_bottom_border['border-style']);
if ( 'none' !== $footer_bottom_border_style ){

	$footer_bottom_css .= 'border-style:'.$footer_bottom_border_style.';';
	//border width
	$footer_bottom_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($footer_bottom_border['border-width']),'desktop');
	if (strpos($footer_bottom_border_width, 'px') !== false) {
		$footer_bottom_css .= 'border-width:'.$footer_bottom_border_width.';';
	}
	//border color
	$footer_bottom_border_color     = cosmoswp_ifset($footer_bottom_border['border-color']);
	if ($footer_bottom_border_color){
		$footer_bottom_css .= 'border-color:'.$footer_bottom_border_color.';';
	}
}

//border radius
$footer_bottom_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($footer_bottom_border['border-radius']),'desktop');
if (strpos($footer_bottom_border_radius, 'px') !== false){
	$footer_bottom_css		.= 'border-radius:'.$footer_bottom_border_radius.';';
}

/* mobile css */

/* footer main overlay css */
if ( !empty($footer_bottom_overlay_css) ){
    $footer_bottom_overlay_dynamic_css = '.cwp-dynamic-footer .cwp-bottom-footer.cwp-enable-overlay:after{
'.$footer_bottom_overlay_css.'
}';
    $footer_dynamic_css['all'] .= $footer_bottom_overlay_dynamic_css;
}

if ( !empty($footer_bottom_css) ){
	$footer_bottom_dynamic_css = '.cwp-bottom-footer{
		'.$footer_bottom_css.'
	}';
	$footer_dynamic_css['all'] .= $footer_bottom_dynamic_css;
}

/* tablet css */
if ( !empty($footer_bottom_tablet_css) ){
	$footer_bottom_tablet_dynamic_css = '.cwp-bottom-footer{
		'.$footer_bottom_tablet_css.'
	}';
	$footer_dynamic_css['tablet'] .= $footer_bottom_tablet_dynamic_css;
}

/* desktop css  */
if ( !empty($footer_bottom_desktop_css) ){
	$footer_bottom_desktop_dynamic_css = '.cwp-bottom-footer{
		'.$footer_bottom_desktop_css.'
	}';
	$footer_dynamic_css['desktop'] .= $footer_bottom_desktop_dynamic_css;
}

/*widget title*/
$fb_widget_title_css         = '';
$fb_widget_title_tablet_css  = '';
$fb_widget_title_desktop_css = '';

/* margin */
$widget_title_margin = cosmoswp_get_theme_options('footer-bottom-widget-title-margin');
$widget_title_margin = json_decode($widget_title_margin,true);
// desktop margin 
$widget_title_margin_desktop = cosmoswp_cssbox_values_inline($widget_title_margin,'desktop');
if (strpos($widget_title_margin_desktop, 'px') !== false){
	$fb_widget_title_desktop_css		.= 'margin:'.$widget_title_margin_desktop.';';
}
// tablet marign 
$widget_title_margin_tablet  = cosmoswp_cssbox_values_inline($widget_title_margin,'tablet');
if (strpos($widget_title_margin_tablet, 'px') !== false){
	$fb_widget_title_tablet_css		.= 'margin:'.$widget_title_margin_tablet.';';
}
// mobile margin 
$widget_title_margin_mobile  = cosmoswp_cssbox_values_inline($widget_title_margin,'mobile');
if (strpos($widget_title_margin_mobile, 'px') !== false){
	$fb_widget_title_css		.= 'margin:'.$widget_title_margin_mobile.';';
}

/* padding */
$widget_title_padding = cosmoswp_get_theme_options('footer-bottom-widget-title-padding');
$widget_title_padding = json_decode($widget_title_padding,true);
// desktop padding
$widget_title_padding_desktop = cosmoswp_cssbox_values_inline($widget_title_padding,'desktop');
if (strpos($widget_title_padding_desktop, 'px') !== false){
	$fb_widget_title_desktop_css		.= 'padding:'.$widget_title_padding_desktop.';';
}
//tablet padding
$widget_title_padding_tablet  = cosmoswp_cssbox_values_inline($widget_title_padding,'tablet');
if (strpos($widget_title_padding_tablet, 'px') !== false){
	$fb_widget_title_tablet_css		.= 'padding:'.$widget_title_padding_tablet.';';
}
//mobile padding
$widget_title_padding_mobile  = cosmoswp_cssbox_values_inline($widget_title_padding,'mobile');
if (strpos($widget_title_padding_mobile, 'px') !== false){
	$fb_widget_title_css		.= 'padding:'.$widget_title_padding_mobile.';';
}

$widget_title_typography_options = cosmoswp_get_theme_options('footer-bottom-widget-title-typography-options');
if ('custom' == $widget_title_typography_options){
	
	$widget_title_typography         = cosmoswp_get_theme_options('footer-bottom-widget-title-typography');
	$widget_title_typography         = json_decode($widget_title_typography,true);

	$widget_title_font_family     =  cosmoswp_font_family($widget_title_typography);
	if ( $widget_title_font_family ){
		$fb_widget_title_css .=  'font-family:'.$widget_title_font_family.';';
		$widget_title_font_weight     = cosmoswp_font_weight( $widget_title_typography );
		if ( $widget_title_font_weight ){
			$fb_widget_title_css .=  'font-weight:'.$widget_title_font_weight.';';
		}
		$widget_title_font_style      = cosmoswp_ifset($widget_title_typography['font-style']);
		if ( $widget_title_font_style ){
			$fb_widget_title_css .=  'font-style:'.$widget_title_font_style.';';
		}
		$widget_title_text_decoration = cosmoswp_ifset($widget_title_typography['text-decoration']);
		if ( $widget_title_text_decoration ){
			$fb_widget_title_css .=  'text-decoration:'.$widget_title_text_decoration.';';
		}
		$widget_title_text_transform  = cosmoswp_ifset($widget_title_typography['text-transform']);
		if ( $widget_title_text_transform ){
			$fb_widget_title_css .=  'text-transform:'.$widget_title_text_transform.';';
		}
		$widget_title_font_size       = cosmoswp_ifset($widget_title_typography['font-size']['mobile']);
		if ( $widget_title_font_size ){
			$fb_widget_title_css .=  'font-size:'.$widget_title_font_size.'px;';
		}
		$widget_title_line_height     = cosmoswp_ifset($widget_title_typography['line-height']['mobile']);
		if ( $widget_title_line_height ){
			$fb_widget_title_css .=  'line-height:'.$widget_title_line_height.'px;';
		}
		$widget_title_letter_spacing  = cosmoswp_ifset($widget_title_typography['letter-spacing']['mobile']);
		if ( $widget_title_letter_spacing ){
			$fb_widget_title_css .=  'letter-spacing:'.$widget_title_letter_spacing.'px;';
		}

		/* Widget title tablet css */
		$widget_title_tablet_font_size       = cosmoswp_ifset($widget_title_typography['font-size']['tablet']);
		if ( $widget_title_tablet_font_size ){
			$fb_widget_title_tablet_css .=  'font-size:'.$widget_title_tablet_font_size.'px;';
		}
		$widget_title_tablet_line_height     = cosmoswp_ifset($widget_title_typography['line-height']['tablet']);
		if ( $widget_title_tablet_line_height ){
			$fb_widget_title_tablet_css .=  'line-height:'.$widget_title_tablet_line_height.'px;';
		}
		$widget_title_tablet_letter_spacing  = cosmoswp_ifset($widget_title_typography['letter-spacing']['tablet']);
		if ( $widget_title_tablet_letter_spacing ){
			$fb_widget_title_tablet_css .=  'letter-spacing:'.$widget_title_tablet_letter_spacing.'px;';
		}

		/* Wdget title desktop tablet css */
		$widget_title_desktop_font_size       = cosmoswp_ifset($widget_title_typography['font-size']['desktop']);
		if ( $widget_title_desktop_font_size ){
			$fb_widget_title_desktop_css .=  'font-size:'.$widget_title_desktop_font_size.'px;';
		}
		$widget_title_desktop_line_height     = cosmoswp_ifset($widget_title_typography['line-height']['desktop']);
		if ( $widget_title_desktop_line_height ){
			$fb_widget_title_desktop_css .=  'line-height:'.$widget_title_desktop_line_height.'px;';
		}
		$widget_title_desktop_letter_spacing  = cosmoswp_ifset($widget_title_typography['letter-spacing']['desktop']);
		if ( $widget_title_desktop_letter_spacing ){
			$fb_widget_title_desktop_css .=  'letter-spacing:'.$widget_title_desktop_letter_spacing.'px;';
		}
	}
}
//border options
$widget_title_border           = cosmoswp_get_theme_options('footer-bottom-widget-title-border-styling');
$widget_title_border           = json_decode($widget_title_border,true);
$widget_title_border_style     = cosmoswp_ifset($widget_title_border['border-style']);
if ( 'none' !== $widget_title_border_style ){

	$fb_widget_title_css .= 'border-style:'.$widget_title_border_style.';';
	//border width
	$widget_title_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($widget_title_border['border-width']),'desktop');
	if (strpos($widget_title_border_width, 'px') !== false) {
		$fb_widget_title_css .= 'border-width:'.$widget_title_border_width.';';
	}
	//border color
	$widget_title_border_color     = cosmoswp_ifset($widget_title_border['border-color']);
	if ($widget_title_border_color){
		$fb_widget_title_css .= 'border-color:'.$widget_title_border_color.';';
	}
}
$widget_title_color = cosmoswp_get_theme_options('footer-bottom-widget-title-color');
if ($widget_title_color){
	$fb_widget_title_css .= 'color:'.$widget_title_color.';';
}

/* widget title mobile css */
if ( !empty( $fb_widget_title_css )){
	$widget_title_dynamic_css = '.cwp-bottom-footer .widget-title{
		'.$fb_widget_title_css.'
	}';
	$footer_dynamic_css['all'] .= $widget_title_dynamic_css;
}
/* widget title tablet css */
if ( !empty($fb_widget_title_tablet_css) ){
	$widget_title_tablet_dynamic_css = '.cwp-bottom-footer .widget-title{
		'.$fb_widget_title_tablet_css.'
	}';
	$footer_dynamic_css['tablet'] .= $widget_title_tablet_dynamic_css;
}

/* widget title desktop css  */
if ( !empty($fb_widget_title_desktop_css) ){
	$widget_title_desktop_dynamic_css = '.cwp-bottom-footer .widget-title{
		'.$fb_widget_title_desktop_css.'
	}';
	$footer_dynamic_css['desktop'] .= $widget_title_desktop_dynamic_css;
}

/*widget content*/
$widget_content_css = '';
$widget_content_typography_options = cosmoswp_get_theme_options('footer-bottom-widget-content-typography-options');
if ('custom' == $widget_content_typography_options){
	
	$widget_content_typography         = cosmoswp_get_theme_options('footer-bottom-widget-content-typography');
	$widget_content_typography         = json_decode($widget_content_typography,true);

    $widget_title_font_family     =  cosmoswp_font_family($widget_content_typography);
    if ( $widget_title_font_family ){
        $widget_content_css .=  'font-family:'.$widget_title_font_family.';';
        $widget_title_font_weight     = cosmoswp_font_weight( $widget_content_typography );
        if ( $widget_title_font_weight ){
            $widget_content_css .=  'font-weight:'.$widget_title_font_weight.';';
        }
        $widget_title_font_style      = cosmoswp_ifset($widget_content_typography['font-style']);
        if ( $widget_title_font_style ){
            $widget_content_css .=  'font-style:'.$widget_title_font_style.';';
        }
        $widget_title_text_decoration = cosmoswp_ifset($widget_content_typography['text-decoration']);
        if ( $widget_title_text_decoration ){
            $widget_content_css .=  'text-decoration:'.$widget_title_text_decoration.';';
        }
        $widget_title_text_transform  = cosmoswp_ifset($widget_content_typography['text-transform']);
        if ( $widget_title_text_transform ){
            $widget_content_css .=  'text-transform:'.$widget_title_text_transform.';';
        }
        $widget_title_font_size       = cosmoswp_ifset($widget_content_typography['font-size']['mobile']);
        if ( $widget_title_font_size ){
            $widget_content_css .=  'font-size:'.$widget_title_font_size.'px;';
        }
        $widget_title_line_height     = cosmoswp_ifset($widget_content_typography['line-height']['mobile']);
        if ( $widget_title_line_height ){
            $widget_content_css .=  'line-height:'.$widget_title_line_height.'px;';
        }
        $widget_title_letter_spacing  = cosmoswp_ifset($widget_content_typography['letter-spacing']['mobile']);
        if ( $widget_title_letter_spacing ){
            $widget_content_css .=  'letter-spacing:'.$widget_title_letter_spacing.'px;';
        }

        /* Widget title tablet css */
        $widget_title_tablet_font_size       = cosmoswp_ifset($widget_content_typography['font-size']['tablet']);
        if ( $widget_title_tablet_font_size ){
            $widget_content_tablet_css .=  'font-size:'.$widget_title_tablet_font_size.'px;';
        }
        $widget_title_tablet_line_height     = cosmoswp_ifset($widget_content_typography['line-height']['tablet']);
        if ( $widget_title_tablet_line_height ){
            $widget_content_tablet_css .=  'line-height:'.$widget_title_tablet_line_height.'px;';
        }
        $widget_title_tablet_letter_spacing  = cosmoswp_ifset($widget_content_typography['letter-spacing']['tablet']);
        if ( $widget_title_tablet_letter_spacing ){
            $widget_content_tablet_css .=  'letter-spacing:'.$widget_title_tablet_letter_spacing.'px;';
        }

        /* Widget title desktop tablet css */
        $widget_title_desktop_font_size       = cosmoswp_ifset($widget_content_typography['font-size']['desktop']);
        if ( $widget_title_desktop_font_size ){
            $widget_content_desktop_css .=  'font-size:'.$widget_title_desktop_font_size.'px;';
        }
        $widget_title_desktop_line_height     = cosmoswp_ifset($widget_content_typography['line-height']['desktop']);
        if ( $widget_title_desktop_line_height ){
            $widget_content_desktop_css .=  'line-height:'.$widget_title_desktop_line_height.'px;';
        }
        $widget_title_desktop_letter_spacing  = cosmoswp_ifset($widget_content_typography['letter-spacing']['desktop']);
        if ( $widget_title_desktop_letter_spacing ){
            $widget_content_desktop_css .=  'letter-spacing:'.$widget_title_desktop_letter_spacing.'px;';
        }
    }
}
//border options
$widget_content_border           = cosmoswp_get_theme_options('footer-bottom-widget-content-border-styling');
$widget_content_border           = json_decode($widget_content_border,true);
$widget_content_border_style     = cosmoswp_ifset($widget_content_border['border-style']);
if ( 'none' !== $widget_content_border_style ){

	$widget_content_css .= 'border-style:'.$widget_content_border_style.';';
	//border width
	$widget_content_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($widget_content_border['border-width']),'desktop');
	if (strpos($widget_content_border_width, 'px') !== false) {
		$widget_content_css .= 'border-width:'.$widget_content_border_width.';';
	}
	//border color
	$widget_content_border_color     = cosmoswp_ifset($widget_content_border['border-color']);
	if ($widget_content_border_color){
		$widget_content_css .= 'border-color:'.$widget_content_border_color.';';
	}
}

/*mobile css*/
if ( !empty( $widget_content_css )){
	$widget_content_dynamic_css = '.cwp-bottom-footer .widget, .cwp-bottom-footer .widget a{
		'.$widget_content_css.'
	}';
	$footer_dynamic_css['all'] .= $widget_content_dynamic_css;
}

/*tablet css*/
if ( !empty( $widget_content_tablet_css )){
    $widget_content_dynamic_tablet_css = '.cwp-bottom-footer .widget, .cwp-bottom-footer .widget a{
		'.$widget_content_tablet_css.'
	}';
    $footer_dynamic_css['tablet'] .= $widget_content_dynamic_tablet_css;
}

/*desktop css*/
if ( !empty( $widget_content_desktop_css )){
    $widget_content_dynamic_desktop_css = '.cwp-bottom-footer .widget, .cwp-bottom-footer .widget a{
		'.$widget_content_desktop_css.'
	}';
    $footer_dynamic_css['desktop'] .= $widget_content_dynamic_desktop_css;
}

$widget_content_color_options = cosmoswp_get_theme_options('footer-bottom-widget-content-color-options');
$widget_content_color_options = json_decode($widget_content_color_options,true);

/* Widget text color */
$widget_content_text_color             = cosmoswp_ifset($widget_content_color_options['text-color']);
if ( !empty( $widget_content_text_color )){
    $widget_content_text_dynamic_css = '.cwp-bottom-footer .widget{
		color:'.$widget_content_text_color.';
	}';
    $footer_dynamic_css['all'] .= $widget_content_text_dynamic_css;
}
$widget_content_link_color        = cosmoswp_ifset($widget_content_color_options['link-color']);
if ( !empty( $widget_content_link_color )){
    $widget_content_link_dynamic_css = '.cwp-bottom-footer .widget a{
		color:'.$widget_content_link_color.';
	}';
    $footer_dynamic_css['all'] .= $widget_content_link_dynamic_css;
}
$widget_content_link_hover_color        = cosmoswp_ifset($widget_content_color_options['link-hover-color']);
if ( !empty( $widget_content_link_hover_color )){
    $widget_content_link_hover_dynamic_css = '.cwp-bottom-footer .widget a:hover{
		color:'.$widget_content_link_hover_color.';
	}';
    $footer_dynamic_css['all'] .= $widget_content_link_hover_dynamic_css;
}
?><?php
/*Copyright*/
$footer_copyright_css         = '';
$footer_copyright_tablet_css  = '';
$footer_copyright_desktop_css = '';

/* margin */
$footer_copyright_margin = cosmoswp_get_theme_options('footer-copyright-margin');
$footer_copyright_margin = json_decode($footer_copyright_margin,true);
// desktop margin 
$footer_copyright_margin_desktop = cosmoswp_cssbox_values_inline($footer_copyright_margin,'desktop');
if (strpos($footer_copyright_margin_desktop, 'px') !== false){
	$footer_copyright_desktop_css		.= 'margin:'.$footer_copyright_margin_desktop.';';
}
// tablet marign 
$footer_copyright_margin_tablet  = cosmoswp_cssbox_values_inline($footer_copyright_margin,'tablet');
if (strpos($footer_copyright_margin_tablet, 'px') !== false){
	$footer_copyright_tablet_css		.= 'margin:'.$footer_copyright_margin_tablet.';';
}
// mobile margin 
$footer_copyright_margin_mobile  = cosmoswp_cssbox_values_inline($footer_copyright_margin,'mobile');
if (strpos($footer_copyright_margin_mobile, 'px') !== false){
	$footer_copyright_css		.= 'margin:'.$footer_copyright_margin_mobile.';';
}

/* padding */
$footer_copyright_padding = cosmoswp_get_theme_options('footer-copyright-padding');
$footer_copyright_padding = json_decode($footer_copyright_padding,true);
// desktop padding
$footer_copyright_padding_desktop = cosmoswp_cssbox_values_inline($footer_copyright_padding,'desktop');
if (strpos($footer_copyright_padding_desktop, 'px') !== false){
	$footer_copyright_desktop_css		.= 'padding:'.$footer_copyright_padding_desktop.';';
}
//tablet padding
$footer_copyright_padding_tablet  = cosmoswp_cssbox_values_inline($footer_copyright_padding,'tablet');
if (strpos($footer_copyright_padding_tablet, 'px') !== false){
	$footer_copyright_tablet_css		.= 'padding:'.$footer_copyright_padding_tablet.';';
}
//mobile padding
$footer_copyright_padding_mobile  = cosmoswp_cssbox_values_inline($footer_copyright_padding,'mobile');
if (strpos($footer_copyright_padding_mobile, 'px') !== false){
	$footer_copyright_css		.= 'padding:'.$footer_copyright_padding_mobile.';';
}


//typography
$copyright_typography_options = cosmoswp_get_theme_options('footer-copyright-typography-options');
if ('custom' == $copyright_typography_options){
	$copyright_typography         = cosmoswp_get_theme_options('footer-copyright-typography');
	$copyright_typography         = json_decode($copyright_typography,true);

	$copyright_font_family     =  cosmoswp_font_family($copyright_typography);
	if ( $copyright_font_family ){
		$footer_copyright_css .=  'font-family:'.$copyright_font_family.';';
		$copyright_font_weight     = cosmoswp_font_weight( $copyright_typography );
		if ( $copyright_font_weight ){
			$footer_copyright_css .=  'font-weight:'.$copyright_font_weight.';';
		}
		$copyright_font_style      = cosmoswp_ifset($copyright_typography['font-style']);
		if ( $copyright_font_style ){
			$footer_copyright_css .=  'font-style:'.$copyright_font_style.';';
		}
		$copyright_text_decoration = cosmoswp_ifset($copyright_typography['text-decoration']);
		if ( $copyright_text_decoration ){
			$footer_copyright_css .=  'text-decoration:'.$copyright_text_decoration.';';
		}
		$copyright_text_transform  = cosmoswp_ifset($copyright_typography['text-transform']);
		if ( $copyright_text_transform ){
			$footer_copyright_css .=  'text-transform:'.$copyright_text_transform.';';
		}
		$copyright_font_size       = cosmoswp_ifset($copyright_typography['font-size']['mobile']);
		if ( $copyright_font_size ){
			$footer_copyright_css .=  'font-size:'.$copyright_font_size.'px;';
		}
		$copyright_line_height     = cosmoswp_ifset($copyright_typography['line-height']['mobile']);
		if ( $copyright_line_height ){
			$footer_copyright_css .=  'line-height:'.$copyright_line_height.'px;';
		}
		$copyright_letter_spacing  = cosmoswp_ifset($copyright_typography['letter-spacing']['mobile']);
		if ( $copyright_letter_spacing ){
			$footer_copyright_css .=  'letter-spacing:'.$copyright_letter_spacing.'px;';
		}

		/* copyright tablet css */
		$copyright_tablet_font_size       = cosmoswp_ifset($copyright_typography['font-size']['tablet']);
		if ( $copyright_tablet_font_size ){
			$footer_copyright_tablet_css .=  'font-size:'.$copyright_tablet_font_size.'px;';
		}
		$copyright_tablet_line_height     = cosmoswp_ifset($copyright_typography['line-height']['tablet']);
		if ( $copyright_tablet_line_height ){
			$footer_copyright_tablet_css .=  'line-height:'.$copyright_tablet_line_height.'px;';
		}
		$copyright_tablet_letter_spacing  = cosmoswp_ifset($copyright_typography['letter-spacing']['tablet']);
		if ( $copyright_tablet_letter_spacing ){
			$footer_copyright_tablet_css .=  'letter-spacing:'.$copyright_tablet_letter_spacing.'px;';
		}

		/* copyright desktop tablet css */
		$copyright_desktop_font_size       = cosmoswp_ifset($copyright_typography['font-size']['desktop']);
		if ( $copyright_desktop_font_size ){
			$footer_copyright_desktop_css .=  'font-size:'.$copyright_desktop_font_size.'px;';
		}
		$copyright_desktop_line_height     = cosmoswp_ifset($copyright_typography['line-height']['desktop']);
		if ( $copyright_desktop_line_height ){
			$footer_copyright_desktop_css .=  'line-height:'.$copyright_desktop_line_height.'px;';
		}
		$copyright_desktop_letter_spacing  = cosmoswp_ifset($copyright_typography['letter-spacing']['desktop']);
		if ( $copyright_desktop_letter_spacing ){
			$footer_copyright_desktop_css .=  'letter-spacing:'.$copyright_desktop_letter_spacing.'px;';
		}
	}
}
$footer_copyright_text_color = cosmoswp_get_theme_options('footer-copyright-text-color');
if ($footer_copyright_text_color){
	$footer_copyright_css .= 'color:'.$footer_copyright_text_color.';';
}
//concated top footer css in all css
/* mobile css */
if ( !empty($footer_copyright_css) ){
	$footer_copyright_dynamic_css = '.cwp-footer-copyright{
		'.$footer_copyright_css.'
	}';
	$footer_dynamic_css['all'] .= $footer_copyright_dynamic_css;
}

/* tablet css */
if ( !empty($footer_copyright_tablet_css) ){
	$footer_copyright_tablet_dynamic_css = '.cwp-footer-copyright{
		'.$footer_copyright_tablet_css.'
	}';
	$footer_dynamic_css['tablet'] .= $footer_copyright_tablet_dynamic_css;
}

/* desktop css  */
if ( !empty($footer_copyright_desktop_css) ){
	$footer_copyright_desktop_dynamic_css = '.cwp-footer-copyright{
		'.$footer_copyright_desktop_css.'
	}';
	$footer_dynamic_css['desktop'] .= $footer_copyright_desktop_dynamic_css;
}?><?php
/*footer icon section */
$footer_icon_section_css         = '';
$footer_icon_section_tablet_css  = '';
$footer_icon_section_desktop_css = '';

/* margin */
$icon_section_margin = cosmoswp_get_theme_options('footer-social-icon-section-margin');
$icon_section_margin = json_decode($icon_section_margin,true);
// desktop margin 
$icon_section_margin_desktop = cosmoswp_cssbox_values_inline($icon_section_margin,'desktop');
if (strpos($icon_section_margin_desktop, 'px') !== false){
	$footer_icon_section_desktop_css		.= 'margin:'.$icon_section_margin_desktop.';';
}
// tablet marign 
$icon_section_margin_tablet  = cosmoswp_cssbox_values_inline($icon_section_margin,'tablet');
if (strpos($icon_section_margin_tablet, 'px') !== false){
	$footer_icon_section_tablet_css		.= 'margin:'.$icon_section_margin_tablet.';';
}
// mobile margin 
$icon_section_margin_mobile  = cosmoswp_cssbox_values_inline($icon_section_margin,'mobile');
if (strpos($icon_section_margin_mobile, 'px') !== false){
	$footer_icon_section_css		.= 'margin:'.$icon_section_margin_mobile.';';
}

/* padding */
$icon_section_padding = cosmoswp_get_theme_options('footer-social-icon-section-padding');
$icon_section_padding = json_decode($icon_section_padding,true);
// desktop padding
$icon_section_padding_desktop = cosmoswp_cssbox_values_inline($icon_section_padding,'desktop');
if (strpos($icon_section_padding_desktop, 'px') !== false){
	$footer_icon_section_desktop_css		.= 'padding:'.$icon_section_padding_desktop.';';
}
//tablet padding
$icon_section_padding_tablet  = cosmoswp_cssbox_values_inline($icon_section_padding,'tablet');
if (strpos($icon_section_padding_tablet, 'px') !== false){
	$footer_icon_section_tablet_css		.= 'padding:'.$icon_section_padding_tablet.';';
}
//mobile padding
$icon_section_padding_mobile  = cosmoswp_cssbox_values_inline($icon_section_padding,'mobile');
if (strpos($icon_section_padding_mobile, 'px') !== false){
	$footer_icon_section_css		.= 'padding:'.$icon_section_padding_mobile.';';
}

/* mobile css */
if ( !empty( $footer_icon_section_css )){
	$footer_icon_section_dynamic_css = '.cwp-footer-social-links{
		'.$footer_icon_section_css.'
	}';
	$footer_dynamic_css['all'] .= $footer_icon_section_dynamic_css;
}

/* tablet css */
if ( !empty($footer_icon_section_tablet_css) ){
	$footer_icon_section_tablet_dynamic_css = '.cwp-footer-social-links{
		'.$footer_icon_section_tablet_css.'
	}';
	$footer_dynamic_css['tablet'] .= $footer_icon_section_tablet_dynamic_css;
}

/* desktop css  */
if ( !empty($footer_icon_section_desktop_css) ){
	$footer_icon_section_desktop_dynamic_css = '.cwp-footer-social-links{
		'.$footer_icon_section_desktop_css.'
	}';
	$footer_dynamic_css['desktop'] .= $footer_icon_section_desktop_dynamic_css;
}

/*footer social individual icon*/
$individual_icon_css         = '';
$individual_icon_tablet_css  = '';
$individual_icon_desktop_css = '';
/* margin */
$individual_icon_margin = cosmoswp_get_theme_options('individual-footer-social-icon-margin');
$individual_icon_margin = json_decode($individual_icon_margin,true);
// desktop margin 
$individual_icon_margin_desktop = cosmoswp_cssbox_values_inline($individual_icon_margin,'desktop');
if (strpos($individual_icon_margin_desktop, 'px') !== false){
	$individual_icon_desktop_css		.= 'margin:'.$individual_icon_margin_desktop.';';
}
// tablet marign 
$individual_icon_margin_tablet  = cosmoswp_cssbox_values_inline($individual_icon_margin,'tablet');
if (strpos($individual_icon_margin_tablet, 'px') !== false){
	$individual_icon_tablet_css		.= 'margin:'.$individual_icon_margin_tablet.';';
}
// mobile margin 
$individual_icon_margin_mobile  = cosmoswp_cssbox_values_inline($individual_icon_margin,'mobile');
if (strpos($individual_icon_margin_mobile, 'px') !== false){
	$individual_icon_css		.= 'margin:'.$individual_icon_margin_mobile.';';
}

/* mobile css */
if ( !empty( $individual_icon_css )){
	$individual_icon_dynamic_css = '.cwp-footer-social-links ul li{
		'.$individual_icon_css.'
	}';
	$footer_dynamic_css['all'] .= $individual_icon_dynamic_css;
}

/* tablet css */
if ( !empty( $individual_icon_tablet_css )){
	$individual_icon_tablet_dynamic_css = '.cwp-footer-social-links ul li{
		'.$individual_icon_tablet_css.'
	}';
	$footer_dynamic_css['tablet'] .= $individual_icon_tablet_dynamic_css;
}

/* desktop css */
if ( !empty( $individual_icon_desktop_css )){
	$individual_icon_desktop_dynamic_css = '.cwp-footer-social-links ul li{
		'.$individual_icon_desktop_css.'
	}';
	$footer_dynamic_css['desktop'] .= $individual_icon_desktop_dynamic_css;
}

$footer_social_icon_css         = '';
$footer_social_icon_tablet_css  = '';
$footer_social_icon_desktop_css = '';

/* padding */
$individual_icon_padding = cosmoswp_get_theme_options('individual-footer-social-icon-padding');
$individual_icon_padding = json_decode($individual_icon_padding,true);
// desktop padding
$individual_icon_padding_desktop = cosmoswp_cssbox_values_inline($individual_icon_padding,'desktop');
if (strpos($individual_icon_padding_desktop, 'px') !== false){
	$footer_social_icon_desktop_css		.= 'padding:'.$individual_icon_padding_desktop.';';
}
//tablet padding
$individual_icon_padding_tablet  = cosmoswp_cssbox_values_inline($individual_icon_padding,'tablet');
if (strpos($individual_icon_padding_tablet, 'px') !== false){
	$footer_social_icon_tablet_css		.= 'padding:'.$individual_icon_padding_tablet.';';
}
//mobile padding
$individual_icon_padding_mobile  = cosmoswp_cssbox_values_inline($individual_icon_padding,'mobile');
if (strpos($individual_icon_padding_mobile, 'px') !== false){
	$footer_social_icon_css		.= 'padding:'.$individual_icon_padding_mobile.';';
}

/* icon size */
$social_icon_size = cosmoswp_get_theme_options('footer-social-icon-size');
$social_icon_size = json_decode($social_icon_size,true);
// desktop icon size 
$desktop_icon_size  = cosmoswp_ifset($social_icon_size['desktop']);
if (!empty( $desktop_icon_size )){
	$footer_social_icon_desktop_css		.= 'font-size:'.$desktop_icon_size.'px;';
}
// tablet icon size 
$tablet_icon_size  = cosmoswp_ifset($social_icon_size['tablet']);
if (!empty( $tablet_icon_size )){
	$footer_social_icon_tablet_css		.= 'font-size:'.$tablet_icon_size.'px;';
}
// mobile icon size 
$mobile_icon_size  = cosmoswp_ifset($social_icon_size['mobile']);
if (!empty( $mobile_icon_size )){
	$footer_social_icon_css		.= 'font-size:'.$mobile_icon_size.'px;';
}

/* icon radius	*/		
$social_icon_radius  = cosmoswp_get_theme_options('footer-social-icon-radius');
$social_icon_radius  = json_decode($social_icon_radius,true);
// desktop icon radius 
$desktop_icon_radius  = cosmoswp_ifset($social_icon_radius['desktop']);
if (!empty( $desktop_icon_radius )){
	$footer_social_icon_desktop_css		.= 'border-radius:'.$desktop_icon_radius.'px;';
}
// tablet icon radius 
$tablet_icon_radius  = cosmoswp_ifset($social_icon_radius['tablet']);
if (!empty( $tablet_icon_radius )){
	$footer_social_icon_tablet_css		.= 'border-radius:'.$tablet_icon_radius.'px;';
}
// mobile icon radius 
$mobile_icon_radius  = cosmoswp_ifset($social_icon_radius['mobile']);
if (!empty( $mobile_icon_radius )){
	$footer_social_icon_css		.= 'border-radius:'.$mobile_icon_radius.'px;';
}

/* icon width */
$social_icon_width 	= cosmoswp_get_theme_options( 'footer-social-icon-width');
$social_icon_width 	= json_decode($social_icon_width,true);
// desktop icon width 
$desktop_icon_width  = cosmoswp_ifset($social_icon_width['desktop']);
if (!empty( $desktop_icon_width )){
	$footer_social_icon_desktop_css		.= 'width:'.$desktop_icon_width.'px;';
}
// tablet icon width 
$tablet_icon_width  = cosmoswp_ifset($social_icon_width['tablet']);
if (!empty( $tablet_icon_width )){
	$footer_social_icon_tablet_css		.= 'width:'.$tablet_icon_width.'px;';
}
// mobile icon width 
$mobile_icon_width  = cosmoswp_ifset($social_icon_width['mobile']);
if (!empty( $mobile_icon_width )){
	$footer_social_icon_css		.= 'width:'.$mobile_icon_width.'px;';
}

//icon height
$social_icon_height = cosmoswp_get_theme_options('footer-social-icon-height');
$social_icon_height = json_decode($social_icon_height,true);
// desktop icon height 
$desktop_icon_height  = cosmoswp_ifset($social_icon_height['desktop']);
if (!empty( $desktop_icon_height )){
	$footer_social_icon_desktop_css		.= 'height:'.$desktop_icon_height.'px;';
}
// tablet icon height 
$tablet_icon_height  = cosmoswp_ifset($social_icon_height['tablet']);
if (!empty( $tablet_icon_height )){
	$footer_social_icon_tablet_css		.= 'height:'.$tablet_icon_height.'px;';
}
// mobile icon height 
$mobile_icon_height  = cosmoswp_ifset($social_icon_height['mobile']);
if (!empty( $mobile_icon_height )){
	$footer_social_icon_css		.= 'height:'.$mobile_icon_height.'px;';
}

//icon line height
$social_icon_line_height = cosmoswp_get_theme_options('footer-social-icon-line-height');
$social_icon_line_height = json_decode($social_icon_line_height,true);
// desktop icon line_height 
$desktop_icon_line_height  = cosmoswp_ifset($social_icon_line_height['desktop']);
if (!empty( $desktop_icon_line_height )){
	$footer_social_icon_desktop_css		.= 'line-height:'.$desktop_icon_line_height.'px;';
}
// tablet icon line_height 
$tablet_icon_line_height  = cosmoswp_ifset($social_icon_line_height['tablet']);
if (!empty( $tablet_icon_line_height )){
	$footer_social_icon_tablet_css		.= 'line-height:'.$tablet_icon_line_height.'px;';
}
// mobile icon line_height 
$mobile_icon_line_height  = cosmoswp_ifset($social_icon_line_height['mobile']);
if (!empty( $mobile_icon_line_height )){
	$footer_social_icon_css		.= 'line-height:'.$mobile_icon_line_height.'px;';
}

/* mobile css */
if ( !empty( $footer_social_icon_css )){
	$footer_social_icon_dynamic_css = '.cwp-footer-social-links ul li a{
		'.$footer_social_icon_css.'
	}';
	$footer_dynamic_css['all'] .= $footer_social_icon_dynamic_css;
}

/* tablet css */
if ( !empty( $footer_social_icon_tablet_css )){
	$footer_social_icon_tablet_dynamic_css = '.cwp-footer-social-links ul li a{
		'.$footer_social_icon_tablet_css.'
	}';
	$footer_dynamic_css['tablet'] .= $footer_social_icon_tablet_dynamic_css;
}

/* desktop css */
if ( !empty( $footer_social_icon_desktop_css )){
	$footer_social_icon_desktop_dynamic_css = '.cwp-footer-social-links ul li a{
		'.$footer_social_icon_desktop_css.'
	}';
	$footer_dynamic_css['desktop'] .= $footer_social_icon_desktop_dynamic_css;
}

$social_information          = cosmoswp_get_theme_options('footer_social');
$social_information_data 	 = json_decode($social_information,true);
$footer_social_icon_color_css = array();
if (is_array( $social_information_data )) {
	$footer_social_icon_color_css = array();
	foreach ($social_information_data as $data) {
		$social_icon      = cosmoswp_ifset($data['icon']);
		$icon_color       = cosmoswp_ifset($data['icon-color']);
		$icon_hover_color = cosmoswp_ifset($data['icon-hover-color']);
		$icon_bg          = cosmoswp_ifset($data['bg-color']);
		$icon_hover_bg    = cosmoswp_ifset($data['bg-hover-color']);
		$footer_social_icon_color_css[] ='
		.cwp-footer-social-links ul li.'.str_replace(' ','-',$social_icon ).' a{
			color:'.esc_attr( $icon_color).';
			background:'.esc_attr( $icon_bg).';
		}
		.cwp-footer-social-links ul li.'.str_replace(' ','-',$social_icon ).' a:hover,
		.cwp-footer-social-links ul li.'.str_replace(' ','-',$social_icon ).' a:focus{
			color:'.esc_attr( $icon_hover_color).';
			background:'.esc_attr( $icon_hover_bg).';
		}
		';
	}
}
if ( !empty( $footer_social_icon_color_css )){
	$footer_dynamic_css['all'] .= implode(" ",$footer_social_icon_color_css);
}?><?php
/* Footer Menu styling*/
$footer_menu_layout_css         = '';
$footer_menu_layout_tablet_css  = '';
$footer_menu_layout_desktop_css = '';

/* margin */
$footer_menu_margin = cosmoswp_get_theme_options('footer-menu-margin');
$footer_menu_margin = json_decode($footer_menu_margin,true);
// desktop margin 
$footer_menu_layout_margin_desktop = cosmoswp_cssbox_values_inline($footer_menu_margin,'desktop');
if (strpos($footer_menu_layout_margin_desktop, 'px') !== false){
	$footer_menu_layout_desktop_css		.= 'margin:'.$footer_menu_layout_margin_desktop.';';
}
// tablet marign 
$footer_menu_layout_margin_tablet  = cosmoswp_cssbox_values_inline($footer_menu_margin,'tablet');
if (strpos($footer_menu_layout_margin_tablet, 'px') !== false){
	$footer_menu_layout_tablet_css		.= 'margin:'.$footer_menu_layout_margin_tablet.';';
}
// mobile margin 
$footer_menu_layout_margin_mobile  = cosmoswp_cssbox_values_inline($footer_menu_margin,'mobile');
if (strpos($footer_menu_layout_margin_mobile, 'px') !== false){
	$footer_menu_layout_css		.= 'margin:'.$footer_menu_layout_margin_mobile.';';
}


/* padding */
$footer_menu_padding = cosmoswp_get_theme_options('footer-menu-padding');
$footer_menu_padding = json_decode($footer_menu_padding,true);
// desktop padding
$footer_menu_layout_padding_desktop = cosmoswp_cssbox_values_inline($footer_menu_padding,'desktop');
if (strpos($footer_menu_layout_padding_desktop, 'px') !== false){
	$footer_menu_layout_desktop_css		.= 'padding:'.$footer_menu_layout_padding_desktop.';';
}
//tablet padding
$footer_menu_layout_padding_tablet  = cosmoswp_cssbox_values_inline($footer_menu_padding,'tablet');
if (strpos($footer_menu_layout_padding_tablet, 'px') !== false){
	$footer_menu_layout_tablet_css		.= 'padding:'.$footer_menu_layout_padding_tablet.';';
}
//mobile padding
$footer_menu_layout_padding_mobile  = cosmoswp_cssbox_values_inline($footer_menu_padding,'mobile');
if (strpos($footer_menu_layout_padding_mobile, 'px') !== false){
	$footer_menu_layout_css		.= 'padding:'.$footer_menu_layout_padding_mobile.';';
}

/* mobile css */
if ( !empty( $footer_menu_layout_css )){
	$footer_menu_layout_dynamic_css = '.cwp-footer-navigation{
		'.$footer_menu_layout_css.'
	}';
	$footer_dynamic_css['all'] .= $footer_menu_layout_dynamic_css;
}

/* tablet css */
if ( !empty($footer_menu_layout_tablet_css) ){
	$footer_menu_layout_tablet_dynamic_css = '.cwp-footer-navigation{
		'.$footer_menu_layout_tablet_css.'
	}';
	$footer_dynamic_css['tablet'] .= $footer_menu_layout_tablet_dynamic_css;
}

/* desktop css  */
if ( !empty($footer_menu_layout_desktop_css) ){
	$footer_menu_layout_desktop_dynamic_css = '.cwp-footer-navigation{
		'.$footer_menu_layout_desktop_css.'
	}';
	$footer_dynamic_css['desktop'] .= $footer_menu_layout_desktop_dynamic_css;
}

// footer menu item styling
$footer_menu_css              = '';
$footer_menu_item_tablet_css  = '';
$footer_menu_item_desktop_css = '';

$footer_menu_styling   = cosmoswp_get_theme_options('footer-menu-styling');
$footer_menu_styling   = json_decode($footer_menu_styling,true);
//txt color
$footer_menu_txt_color     = cosmoswp_ifset($footer_menu_styling['normal-text-color']);
if ( $footer_menu_txt_color ){
	$footer_menu_css .= 'color:'.$footer_menu_txt_color.';';
}
//bg color
$footer_menu_bg_color      = cosmoswp_ifset($footer_menu_styling['normal-bg-color']);
if ( $footer_menu_bg_color ){
	$footer_menu_css .= 'background-color:'.$footer_menu_bg_color.';';
}
//border style
$footer_menu_border_style      = cosmoswp_ifset($footer_menu_styling['normal-border-style']);
if ( $footer_menu_border_style ){
	$footer_menu_css .= 'border-style:'.$footer_menu_border_style.';';
}
//border color
$footer_menu_border_color      = cosmoswp_ifset($footer_menu_styling['normal-border-color']);
if ( $footer_menu_border_color ){
	$footer_menu_css .= 'border-color:'.$footer_menu_border_color.';';
}
//border width
$footer_menu_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($footer_menu_styling['normal-border-width']),'desktop');
if (strpos($footer_menu_border_width, 'px') !== false) {
	$footer_menu_css .= 'border-width:'.$footer_menu_border_width.';';
}
//border radius
$footer_menu_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($footer_menu_styling['normal-border-radius']),'desktop');
if (strpos($footer_menu_border_radius, 'px') !== false){
	$footer_menu_css		.= 'border-radius:'.$footer_menu_border_radius.';';
}
//typography
$footer_menu_typography_options = cosmoswp_get_theme_options('footer-menu-typography-options');
if ('custom' == $footer_menu_typography_options){
	$footer_menu_typography         = cosmoswp_get_theme_options('footer-menu-typography');
	$footer_menu_typography         = json_decode($footer_menu_typography,true);

	$footer_menu_font_family     =  cosmoswp_font_family($footer_menu_typography);
	if ( $footer_menu_font_family ){
		$footer_menu_css .=  'font-family:'.$footer_menu_font_family.';';
		$footer_menu_font_weight     = cosmoswp_font_weight( $footer_menu_typography );
		if ( $footer_menu_font_weight ){
			$footer_menu_css .=  'font-weight:'.$footer_menu_font_weight.';';
		}
		$footer_menu_font_style      = cosmoswp_ifset($footer_menu_typography['font-style']);
		if ( $footer_menu_font_style ){
			$footer_menu_css .=  'font-style:'.$footer_menu_font_style.';';
		}
		$footer_menu_text_decoration = cosmoswp_ifset($footer_menu_typography['text-decoration']);
		if ( $footer_menu_text_decoration ){
			$footer_menu_css .=  'text-decoration:'.$footer_menu_text_decoration.';';
		}
		$footer_menu_text_transform  = cosmoswp_ifset($footer_menu_typography['text-transform']);
		if ( $footer_menu_text_transform ){
			$footer_menu_css .=  'text-transform:'.$footer_menu_text_transform.';';
		}
		$footer_menu_font_size       = cosmoswp_ifset($footer_menu_typography['font-size']['mobile']);
		if ( $footer_menu_font_size ){
			$footer_menu_css .=  'font-size:'.$footer_menu_font_size.'px;';
		}
		$footer_menu_line_height     = cosmoswp_ifset($footer_menu_typography['line-height']['mobile']);
		if ( $footer_menu_line_height ){
			$footer_menu_css .=  'line-height:'.$footer_menu_line_height.'px;';
		}
		$footer_menu_letter_spacing  = cosmoswp_ifset($footer_menu_typography['letter-spacing']['mobile']);
		if ( $footer_menu_letter_spacing ){
			$footer_menu_css .=  'letter-spacing:'.$footer_menu_letter_spacing.'px;';
		}

		/* footer menu tablet css */
		$footer_menu_tablet_font_size       = cosmoswp_ifset($footer_menu_typography['font-size']['tablet']);
		if ( $footer_menu_tablet_font_size ){
			$footer_menu_item_tablet_css .=  'font-size:'.$footer_menu_tablet_font_size.'px;';
		}
		$footer_menu_tablet_line_height     = cosmoswp_ifset($footer_menu_typography['line-height']['tablet']);
		if ( $footer_menu_tablet_line_height ){
			$footer_menu_item_tablet_css .=  'line-height:'.$footer_menu_tablet_line_height.'px;';
		}
		$footer_menu_tablet_letter_spacing  = cosmoswp_ifset($footer_menu_typography['letter-spacing']['tablet']);
		if ( $footer_menu_tablet_letter_spacing ){
			$footer_menu_item_tablet_css .=  'letter-spacing:'.$footer_menu_tablet_letter_spacing.'px;';
		}

		/* footer menu desktop tablet css */
		$footer_menu_desktop_font_size       = cosmoswp_ifset($footer_menu_typography['font-size']['desktop']);
		if ( $footer_menu_desktop_font_size ){
			$footer_menu_item_desktop_css .=  'font-size:'.$footer_menu_desktop_font_size.'px;';
		}
		$footer_menu_desktop_line_height     = cosmoswp_ifset($footer_menu_typography['line-height']['desktop']);
		if ( $footer_menu_desktop_line_height ){
			$footer_menu_item_desktop_css .=  'line-height:'.$footer_menu_desktop_line_height.'px;';
		}
		$footer_menu_desktop_letter_spacing  = cosmoswp_ifset($footer_menu_typography['letter-spacing']['desktop']);
		if ( $footer_menu_desktop_letter_spacing ){
			$footer_menu_item_desktop_css .=  'letter-spacing:'.$footer_menu_desktop_letter_spacing.'px;';
		}
	}
}

/* margin */
$footer_menu_item_margin = cosmoswp_get_theme_options('footer-menu-item-margin');
$footer_menu_item_margin = json_decode($footer_menu_item_margin,true);
// desktop margin 
$footer_menu_item_margin_desktop = cosmoswp_cssbox_values_inline($footer_menu_item_margin,'desktop');
if (strpos($footer_menu_item_margin_desktop, 'px') !== false){
	$footer_menu_item_desktop_css		.= 'margin:'.$footer_menu_item_margin_desktop.';';
}
// tablet marign 
$footer_menu_item_margin_tablet  = cosmoswp_cssbox_values_inline($footer_menu_item_margin,'tablet');
if (strpos($footer_menu_item_margin_tablet, 'px') !== false){
	$footer_menu_item_tablet_css		.= 'margin:'.$footer_menu_item_margin_tablet.';';
}
// mobile margin 
$footer_menu_item_margin_mobile  = cosmoswp_cssbox_values_inline($footer_menu_item_margin,'mobile');
if (strpos($footer_menu_item_margin_mobile, 'px') !== false){
	$footer_menu_css		.= 'margin:'.$footer_menu_item_margin_mobile.';';
}

/* padding */
$footer_menu_item_padding = cosmoswp_get_theme_options('footer-menu-item-padding');
$footer_menu_item_padding = json_decode($footer_menu_item_padding,true);
// desktop padding
$footer_menu_item_padding_desktop = cosmoswp_cssbox_values_inline($footer_menu_item_padding,'desktop');
if (strpos($footer_menu_item_padding_desktop, 'px') !== false){
	$footer_menu_item_desktop_css		.= 'padding:'.$footer_menu_item_padding_desktop.';';
}
//tablet padding
$footer_menu_item_padding_tablet  = cosmoswp_cssbox_values_inline($footer_menu_item_padding,'tablet');
if (strpos($footer_menu_item_padding_tablet, 'px') !== false){
	$footer_menu_item_tablet_css		.= 'padding:'.$footer_menu_item_padding_tablet.';';
}
//mobile padding
$footer_menu_item_padding_mobile  = cosmoswp_cssbox_values_inline($footer_menu_item_padding,'mobile');
if (strpos($footer_menu_item_padding_mobile, 'px') !== false){
	$footer_menu_css		.= 'padding:'.$footer_menu_item_padding_mobile.';';
}

/* mobile css */
if ( !empty( $footer_menu_css )){
	$footer_menu_dynamic_css = '.cwp-footer-navigation li a{
		'.$footer_menu_css.'
	}';
	$footer_dynamic_css['all'] .= $footer_menu_dynamic_css;
}

/* tablet css */
if ( !empty($footer_menu_item_tablet_css) ){
	$footer_menu_item_tablet_dynamic_css = '.cwp-footer-navigation li a{
		'.$footer_menu_item_tablet_css.'
	}';
	$footer_dynamic_css['tablet'] .= $footer_menu_item_tablet_dynamic_css;
}

/* desktop css  */
if ( !empty($footer_menu_item_desktop_css) ){
	$footer_menu_item_desktop_dynamic_css = '.cwp-footer-navigation li a{
		'.$footer_menu_item_desktop_css.'
	}';
	$footer_dynamic_css['desktop'] .= $footer_menu_item_desktop_dynamic_css;
}

/* hover secondary menu item styling */
$footer_menu_hover_css = '';	
//txt color
$footer_menu_hover_txt_color     = cosmoswp_ifset($footer_menu_styling['hover-text-color']);
if ( $footer_menu_hover_txt_color ){
	$footer_menu_hover_css .= 'color:'.$footer_menu_hover_txt_color.';';
}
//bg color
$footer_menu_hover_bg_color      = cosmoswp_ifset($footer_menu_styling['hover-bg-color']);
if ( $footer_menu_hover_bg_color ){
	$footer_menu_hover_css .= 'background-color:'.$footer_menu_hover_bg_color.';';
}
//border style
$footer_menu_hover_border_style      = cosmoswp_ifset($footer_menu_styling['hover-border-style']);
if ( $footer_menu_hover_border_style ){
	$footer_menu_hover_css .= 'border-style:'.$footer_menu_hover_border_style.';';
}
//border color
$footer_menu_hover_border_color      = cosmoswp_ifset($footer_menu_styling['hover-border-color']);
if ( $footer_menu_hover_border_color ){
	$footer_menu_hover_css .= 'border-color:'.$footer_menu_hover_border_color.';';
}
//border width
$footer_menu_hover_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($footer_menu_styling['hover-border-width']),'desktop');
if (strpos($footer_menu_hover_border_width, 'px') !== false) {
	$footer_menu_hover_css .= 'border-width:'.$footer_menu_hover_border_width.';';
}
//border radius
$footer_menu_hover_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($footer_menu_styling['hover-border-radius']),'desktop');
if (strpos($footer_menu_hover_border_radius, 'px') !== false){
	$footer_menu_hover_css		.= 'border-radius:'.$footer_menu_hover_border_radius.';';
}
if ( !empty( $footer_menu_hover_css )){
	$footer_menu_hover_dynamic_css = '.cwp-footer-navigation li a:hover,
	.cwp-footer-navigation li a:focus{
		'.$footer_menu_hover_css.'
	}';
	$footer_dynamic_css['all'] .= $footer_menu_hover_dynamic_css;
}

/* footer menu active item styling */
$footer_menu_active_css = '';	
//txt color
$footer_menu_active_txt_color     = cosmoswp_ifset($footer_menu_styling['active-text-color']);
if ( $footer_menu_active_txt_color ){
	$footer_menu_active_css .= 'color:'.$footer_menu_active_txt_color.';';
}
//bg color
$footer_menu_active_bg_color      = cosmoswp_ifset($footer_menu_styling['active-bg-color']);
if ( $footer_menu_active_bg_color ){
	$footer_menu_active_css .= 'background-color:'.$footer_menu_active_bg_color.';';
}
//border style
$footer_menu_active_border_style      = cosmoswp_ifset($footer_menu_styling['active-border-style']);
if ( $footer_menu_active_border_style ){
	$footer_menu_active_css .= 'border-style:'.$footer_menu_active_border_style.';';
}
//border color
$footer_menu_active_border_color      = cosmoswp_ifset($footer_menu_styling['active-border-color']);
if ( $footer_menu_active_border_color ){
	$footer_menu_active_css .= 'border-color:'.$footer_menu_active_border_color.';';
}
//border width
$footer_menu_active_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($footer_menu_styling['active-border-width']),'desktop');
if (strpos($footer_menu_active_border_width, 'px') !== false) {
	$footer_menu_active_css .= 'border-width:'.$footer_menu_active_border_width.';';
}
//border radius
$footer_menu_active_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($footer_menu_styling['active-border-radius']),'desktop');
if (strpos($footer_menu_active_border_radius, 'px') !== false){
	$footer_menu_active_css		.= 'border-radius:'.$footer_menu_active_border_radius.';';
}
if ( !empty( $footer_menu_active_css )){
	$footer_menu_active_dynamic_css = '.cwp-footer-navigation li.active a,
	.cwp-footer-navigation li.current-menu-item a{
		'.$footer_menu_active_css.'
	}';
	$footer_dynamic_css['all'] .= $footer_menu_active_dynamic_css;
}

$footer_menu_title_css         = '';
$footer_menu_title_tablet_css  = '';
$footer_menu_title_desktop_css = '';

/* margin */
$footer_menu_title_margin = cosmoswp_get_theme_options('footer-menu-title-margin');
$footer_menu_title_margin = json_decode($footer_menu_title_margin,true);
// desktop margin 
$footer_menu_title_margin_desktop = cosmoswp_cssbox_values_inline($footer_menu_title_margin,'desktop');
if (strpos($footer_menu_title_margin_desktop, 'px') !== false){
	$footer_menu_title_desktop_css		.= 'margin:'.$footer_menu_title_margin_desktop.';';
}
// tablet marign 
$footer_menu_title_margin_tablet  = cosmoswp_cssbox_values_inline($footer_menu_title_margin,'tablet');
if (strpos($footer_menu_title_margin_tablet, 'px') !== false){
	$footer_menu_title_tablet_css		.= 'margin:'.$footer_menu_title_margin_tablet.';';
}
// mobile margin 
$footer_menu_title_margin_mobile  = cosmoswp_cssbox_values_inline($footer_menu_title_margin,'mobile');
if (strpos($footer_menu_title_margin_mobile, 'px') !== false){
	$footer_menu_title_css		.= 'margin:'.$footer_menu_title_margin_mobile.';';
}


/* padding */
$footer_menu_title_padding = cosmoswp_get_theme_options('footer-menu-title-padding');
$footer_menu_title_padding = json_decode($footer_menu_title_padding,true);
// desktop padding
$footer_menu_title_padding_desktop = cosmoswp_cssbox_values_inline($footer_menu_title_padding,'desktop');
if (strpos($footer_menu_title_padding_desktop, 'px') !== false){
	$footer_menu_title_desktop_css		.= 'padding:'.$footer_menu_title_padding_desktop.';';
}
//tablet padding
$footer_menu_title_padding_tablet  = cosmoswp_cssbox_values_inline($footer_menu_title_padding,'tablet');
if (strpos($footer_menu_title_padding_tablet, 'px') !== false){
	$footer_menu_title_tablet_css		.= 'padding:'.$footer_menu_title_padding_tablet.';';
}
//mobile padding
$footer_menu_title_padding_mobile  = cosmoswp_cssbox_values_inline($footer_menu_title_padding,'mobile');
if (strpos($footer_menu_title_padding_mobile, 'px') !== false){
	$footer_menu_title_css		.= 'padding:'.$footer_menu_title_padding_mobile.';';
}

/* color */
$footer_menu_title_color = cosmoswp_get_theme_options('footer-menu-title-color');
if ($footer_menu_title_color){
	$footer_menu_title_css .= 'color:'.$footer_menu_title_color.';';
}

$footer_menu_title_typography_options = cosmoswp_get_theme_options('footer-menu-title-typography-options');
if ('custom' == $footer_menu_title_typography_options){
	
	$footer_menu_title_typography         = cosmoswp_get_theme_options('footer-menu-title-typography');
	$footer_menu_title_typography         = json_decode($footer_menu_title_typography,true);

	$footer_menu_title_font_family     =  cosmoswp_font_family($footer_menu_title_typography);
	if ( $footer_menu_title_font_family ){
		$footer_menu_title_css .=  'font-family:'.$footer_menu_title_font_family.';';
		$footer_menu_title_font_weight     = cosmoswp_font_weight( $footer_menu_title_typography );
		if ( $footer_menu_title_font_weight ){
			$footer_menu_title_css .=  'font-weight:'.$footer_menu_title_font_weight.';';
		}
		$footer_menu_title_font_style      = cosmoswp_ifset($footer_menu_title_typography['font-style']);
		if ( $footer_menu_title_font_style ){
			$footer_menu_title_css .=  'font-style:'.$footer_menu_title_font_style.';';
		}
		$footer_menu_title_text_decoration = cosmoswp_ifset($footer_menu_title_typography['text-decoration']);
		if ( $footer_menu_title_text_decoration ){
			$footer_menu_title_css .=  'text-decoration:'.$footer_menu_title_text_decoration.';';
		}
		$footer_menu_title_text_transform  = cosmoswp_ifset($footer_menu_title_typography['text-transform']);
		if ( $footer_menu_title_text_transform ){
			$footer_menu_title_css .=  'text-transform:'.$footer_menu_title_text_transform.';';
		}
		$footer_menu_title_font_size       = cosmoswp_ifset($footer_menu_title_typography['font-size']['mobile']);
		if ( $footer_menu_title_font_size ){
			$footer_menu_title_css .=  'font-size:'.$footer_menu_title_font_size.'px;';
		}
		$footer_menu_title_line_height     = cosmoswp_ifset($footer_menu_title_typography['line-height']['mobile']);
		if ( $footer_menu_title_line_height ){
			$footer_menu_title_css .=  'line-height:'.$footer_menu_title_line_height.'px;';
		}
		$footer_menu_title_letter_spacing  = cosmoswp_ifset($footer_menu_title_typography['letter-spacing']['mobile']);
		if ( $footer_menu_title_letter_spacing ){
			$footer_menu_title_css .=  'letter-spacing:'.$footer_menu_title_letter_spacing.'px;';
		}


		/* footer menu tablet css */
		$footer_menu_title_tablet_font_size       = cosmoswp_ifset($footer_menu_title_typography['font-size']['tablet']);
		if ( $footer_menu_title_tablet_font_size ){
			$footer_menu_title_tablet_css .=  'font-size:'.$footer_menu_title_tablet_font_size.'px;';
		}
		$footer_menu_title_tablet_line_height     = cosmoswp_ifset($footer_menu_title_typography['line-height']['tablet']);
		if ( $footer_menu_title_tablet_line_height ){
			$footer_menu_title_tablet_css .=  'line-height:'.$footer_menu_title_tablet_line_height.'px;';
		}
		$footer_menu_title_tablet_letter_spacing  = cosmoswp_ifset($footer_menu_title_typography['letter-spacing']['tablet']);
		if ( $footer_menu_title_tablet_letter_spacing ){
			$footer_menu_title_tablet_css .=  'letter-spacing:'.$footer_menu_title_tablet_letter_spacing.'px;';
		}

		/* footer menu desktop tablet css */
		$footer_menu_title_desktop_font_size       = cosmoswp_ifset($footer_menu_title_typography['font-size']['desktop']);
		if ( $footer_menu_title_desktop_font_size ){
			$footer_menu_title_desktop_css .=  'font-size:'.$footer_menu_title_desktop_font_size.'px;';
		}
		$footer_menu_title_desktop_line_height     = cosmoswp_ifset($footer_menu_title_typography['line-height']['desktop']);
		if ( $footer_menu_title_desktop_line_height ){
			$footer_menu_title_desktop_css .=  'line-height:'.$footer_menu_title_desktop_line_height.'px;';
		}
		$footer_menu_title_desktop_letter_spacing  = cosmoswp_ifset($footer_menu_title_typography['letter-spacing']['desktop']);
		if ( $footer_menu_title_desktop_letter_spacing ){
			$footer_menu_title_desktop_css .=  'letter-spacing:'.$footer_menu_title_desktop_letter_spacing.'px;';
		}
	}
}
$footer_menu_title_border           = cosmoswp_get_theme_options('footer-menu-title-border-styling');
$footer_menu_title_border           = json_decode($footer_menu_title_border,true);
$footer_menu_title_border_style     = cosmoswp_ifset($footer_menu_title_border['border-style']);
if ( 'none' !== $footer_menu_title_border_style ){

	$footer_menu_title_css .= 'border-style:'.$footer_menu_title_border_style.';';
	//border width
	$footer_menu_title_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($footer_menu_title_border['border-width']),'desktop');
	if (strpos($footer_menu_title_border_width, 'px') !== false) {
		$footer_menu_title_css .= 'border-width:'.$footer_menu_title_border_width.';';
	}
	//border color
	$footer_menu_title_border_color     = cosmoswp_ifset($footer_menu_title_border['border-color']);
	if ($footer_menu_title_border_color){
		$footer_menu_title_css .= 'border-color:'.$footer_menu_title_border_color.';';
	}
}

/* mobile css */
if ( !empty( $footer_menu_title_css )){
	$footer_menu_title_dynamic_css = '.cwp-footer-menu-title{
		'.$footer_menu_title_css.'
	}';
	$footer_dynamic_css['all'] .= $footer_menu_title_dynamic_css;
}

/* tablet css */
if ( !empty($footer_menu_title_tablet_css) ){
	$footer_menu_title_tablet_dynamic_css = '.cwp-footer-menu-title{
		'.$footer_menu_title_tablet_css.'
	}';
	$footer_dynamic_css['tablet'] .= $footer_menu_title_tablet_dynamic_css;
}

/* desktop css  */
if ( !empty($footer_menu_title_desktop_css) ){
	$footer_menu_title_desktop_dynamic_css = '.cwp-footer-menu-title{
		'.$footer_menu_title_desktop_css.'
	}';
	$footer_dynamic_css['desktop'] .= $footer_menu_title_desktop_dynamic_css;
}?><?php 
/*html*/
$footer_html_css         = '';
$footer_html_tablet_css  = '';
$footer_html_desktop_css = '';

/* margin */
$footer_html_margin = cosmoswp_get_theme_options('footer-html-margin');
$footer_html_margin = json_decode($footer_html_margin,true);
// desktop margin 
$html_margin_desktop = cosmoswp_cssbox_values_inline($footer_html_margin,'desktop');
if (strpos($html_margin_desktop, 'px') !== false){
	$footer_html_desktop_css		.= 'margin:'.$html_margin_desktop.';';
}
// tablet marign 
$html_margin_tablet  = cosmoswp_cssbox_values_inline($footer_html_margin,'tablet');
if (strpos($html_margin_tablet, 'px') !== false){
	$footer_html_tablet_css		.= 'margin:'.$html_margin_tablet.';';
}
// mobile margin 
$html_margin_mobile  = cosmoswp_cssbox_values_inline($footer_html_margin,'mobile');
if (strpos($html_margin_mobile, 'px') !== false){
	$footer_html_css		.= 'margin:'.$html_margin_mobile.';';
}

/* padding */
$footer_html_padding = cosmoswp_get_theme_options('footer-html-padding');
$footer_html_padding = json_decode($footer_html_padding,true);
// desktop padding
$html_padding_desktop = cosmoswp_cssbox_values_inline($footer_html_padding,'desktop');
if (strpos($html_padding_desktop, 'px') !== false){
	$footer_html_desktop_css		.= 'padding:'.$html_padding_desktop.';';
}
//tablet padding
$html_padding_tablet  = cosmoswp_cssbox_values_inline($footer_html_padding,'tablet');
if (strpos($html_padding_tablet, 'px') !== false){
	$footer_html_tablet_css		.= 'padding:'.$html_padding_tablet.';';
}
//mobile padding
$html_padding_mobile  = cosmoswp_cssbox_values_inline($footer_html_padding,'mobile');
if (strpos($html_padding_mobile, 'px') !== false){
	$footer_html_css		.= 'padding:'.$html_padding_mobile.';';
}

/*mobile css */
if ( !empty( $footer_html_css )){
	$footer_html_dynamic_css = '.cwp-footer-custom-html {
		'.$footer_html_css.'
	}';
	$footer_dynamic_css['all'] .= $footer_html_dynamic_css;
}

/* tablet css */
if ( !empty($footer_html_tablet_css) ){
	$footer_html_tablet_dynamic_css = '.cwp-footer-custom-html {
		'.$footer_html_tablet_css.'
	}';
	$footer_dynamic_css['tablet'] .= $footer_html_tablet_dynamic_css;
}
/* desktop css */
if ( !empty($footer_html_desktop_css) ){
	$footer_html_desktop_dynamic_css = '.cwp-footer-custom-html {
		'.$footer_html_desktop_css.'
	}';
	$footer_dynamic_css['desktop'] .= $footer_html_desktop_dynamic_css;
}



//typography
$footer_html_typography_css = '';
$html_typography_options = cosmoswp_get_theme_options('footer-html-typography-options');
if ('custom' == $html_typography_options){
	$html_typography         = cosmoswp_get_theme_options('footer-html-typography');
	$html_typography         = json_decode($html_typography,true);


	$html_font_style      = cosmoswp_ifset($html_typography['font-style']);
	if ( $html_font_style ){
		$footer_html_typography_css .=  'font-style:'.$html_font_style.';';
	}
	$html_text_decoration = cosmoswp_ifset($html_typography['text-decoration']);
	if ( $html_text_decoration ){
		$footer_html_typography_css .=  'text-decoration:'.$html_text_decoration.';';
	}
	$html_text_transform  = cosmoswp_ifset($html_typography['text-transform']);
	if ( $html_text_transform ){
		$footer_html_typography_css .=  'text-transform:'.$html_text_transform.';';
	}
}
$footer_html_text_color = cosmoswp_get_theme_options('footer-html-text-color');
if ($footer_html_text_color){
	$footer_html_typography_css .= 'color:'.$footer_html_text_color.';';
}

/*mobile css */
if ( !empty( $footer_html_typography_css )){
	$footer_html_dynamic_css = '.cwp-footer-custom-html, .cwp-footer-custom-html *{
		'.$footer_html_typography_css.'
	}';
	$footer_dynamic_css['all'] .= $footer_html_dynamic_css;
}

/*Footer Sidebar 1*/
$footer_sidebar1_css            = '';
$footer_sidebar1_tablet_css     = '';
$footer_sidebar1_desktop_css    = '';

/* margin */
$footer_sidebar1_margin  = cosmoswp_get_theme_options('footer-sidebar-1-margin');
$footer_sidebar1_margin  = json_decode($footer_sidebar1_margin,true);
// desktop margin
$footer_sidebar1_margin_desktop = cosmoswp_cssbox_values_inline($footer_sidebar1_margin,'desktop');
if (strpos($footer_sidebar1_margin_desktop, 'px') !== false){
    $footer_sidebar1_desktop_css		.= 'margin:'.$footer_sidebar1_margin_desktop.';';
}
// tablet marign
$footer_sidebar1_margin_tablet  = cosmoswp_cssbox_values_inline($footer_sidebar1_margin,'tablet');
if (strpos($footer_sidebar1_margin_tablet, 'px') !== false){
    $footer_sidebar1_tablet_css		.= 'margin:'.$footer_sidebar1_margin_tablet.';';
}
// mobile margin
$footer_sidebar1_margin_mobile  = cosmoswp_cssbox_values_inline($footer_sidebar1_margin,'mobile');
if (strpos($footer_sidebar1_margin_mobile, 'px') !== false){
    $footer_sidebar1_css		.= 'margin:'.$footer_sidebar1_margin_mobile.';';
}

/* padding */
$footer_sidebar1_padding = cosmoswp_get_theme_options('footer-sidebar-1-padding');
$footer_sidebar1_padding = json_decode($footer_sidebar1_padding,true);

// desktop padding
$footer_sidebar1_padding_desktop = cosmoswp_cssbox_values_inline($footer_sidebar1_padding,'desktop');
if (strpos($footer_sidebar1_padding_desktop, 'px') !== false){
    $footer_sidebar1_desktop_css		.= 'padding:'.$footer_sidebar1_padding_desktop.';';
}
//tablet padding
$footer_sidebar1_padding_tablet  = cosmoswp_cssbox_values_inline($footer_sidebar1_padding,'tablet');
if (strpos($footer_sidebar1_padding_tablet, 'px') !== false){
    $footer_sidebar1_tablet_css		.= 'padding:'.$footer_sidebar1_padding_tablet.';';
}
//mobile padding
$footer_sidebar1_padding_mobile  = cosmoswp_cssbox_values_inline($footer_sidebar1_padding,'mobile');
if (strpos($footer_sidebar1_padding_mobile, 'px') !== false){
    $footer_sidebar1_css		.= 'padding:'.$footer_sidebar1_padding_mobile.';';
}

/* mobile css */
if ( !empty($footer_sidebar1_css) ){
    $footer_sidebar1_dynamic_css = '.cwp-footer-sidebar-1 .widget{
		'.$footer_sidebar1_css.'
	}';
    $footer_dynamic_css['all'] .= $footer_sidebar1_dynamic_css;
}


/* tablet css */
if ( !empty($footer_sidebar1_tablet_css) ){
    $footer_sidebar1_tablet_dynamic_css = '.cwp-footer-sidebar-1 .widget{
		'.$footer_sidebar1_tablet_css.'
	}';
    $footer_dynamic_css['tablet'] .= $footer_sidebar1_tablet_dynamic_css;
}


/* desktop css  */
if ( !empty($footer_sidebar1_desktop_css) ){
    $footer_sidebar1_desktop_dynamic_css = '.cwp-footer-sidebar-1 .widget{
		'.$footer_sidebar1_desktop_css.'
	}';
    $footer_dynamic_css['desktop'] .= $footer_sidebar1_desktop_dynamic_css;
}


/*Footer Sidebar 2*/
$footer_sidebar2_css            = '';
$footer_sidebar2_tablet_css     = '';
$footer_sidebar2_desktop_css    = '';

/* margin */
$footer_sidebar2_margin  = cosmoswp_get_theme_options('footer-sidebar-2-margin');
$footer_sidebar2_margin  = json_decode($footer_sidebar2_margin,true);
// desktop margin
$footer_sidebar2_margin_desktop = cosmoswp_cssbox_values_inline($footer_sidebar2_margin,'desktop');
if (strpos($footer_sidebar2_margin_desktop, 'px') !== false){
    $footer_sidebar2_desktop_css		.= 'margin:'.$footer_sidebar2_margin_desktop.';';
}
// tablet marign
$footer_sidebar2_margin_tablet  = cosmoswp_cssbox_values_inline($footer_sidebar2_margin,'tablet');
if (strpos($footer_sidebar2_margin_tablet, 'px') !== false){
    $footer_sidebar2_tablet_css		.= 'margin:'.$footer_sidebar2_margin_tablet.';';
}
// mobile margin
$footer_sidebar2_margin_mobile  = cosmoswp_cssbox_values_inline($footer_sidebar2_margin,'mobile');
if (strpos($footer_sidebar2_margin_mobile, 'px') !== false){
    $footer_sidebar2_css		.= 'margin:'.$footer_sidebar2_margin_mobile.';';
}

/* padding */
$footer_sidebar2_padding = cosmoswp_get_theme_options('footer-sidebar-2-padding');
$footer_sidebar2_padding = json_decode($footer_sidebar2_padding,true);

// desktop padding
$footer_sidebar2_padding_desktop = cosmoswp_cssbox_values_inline($footer_sidebar2_padding,'desktop');
if (strpos($footer_sidebar2_padding_desktop, 'px') !== false){
    $footer_sidebar2_desktop_css		.= 'padding:'.$footer_sidebar2_padding_desktop.';';
}
//tablet padding
$footer_sidebar2_padding_tablet  = cosmoswp_cssbox_values_inline($footer_sidebar2_padding,'tablet');
if (strpos($footer_sidebar2_padding_tablet, 'px') !== false){
    $footer_sidebar2_tablet_css		.= 'padding:'.$footer_sidebar2_padding_tablet.';';
}
//mobile padding
$footer_sidebar2_padding_mobile  = cosmoswp_cssbox_values_inline($footer_sidebar2_padding,'mobile');
if (strpos($footer_sidebar2_padding_mobile, 'px') !== false){
    $footer_sidebar2_css		.= 'padding:'.$footer_sidebar2_padding_mobile.';';
}

/* mobile css */
if ( !empty($footer_sidebar2_css) ){
    $footer_sidebar2_dynamic_css = '.cwp-footer-sidebar-2 .widget{
		'.$footer_sidebar2_css.'
	}';
    $footer_dynamic_css['all'] .= $footer_sidebar2_dynamic_css;
}


/* tablet css */
if ( !empty($footer_sidebar2_tablet_css) ){
    $footer_sidebar2_tablet_dynamic_css = '.cwp-footer-sidebar-2 .widget{
		'.$footer_sidebar2_tablet_css.'
	}';
    $footer_dynamic_css['tablet'] .= $footer_sidebar2_tablet_dynamic_css;
}


/* desktop css  */
if ( !empty($footer_sidebar2_desktop_css) ){
    $footer_sidebar2_desktop_dynamic_css = '.cwp-footer-sidebar-2 .widget{
		'.$footer_sidebar2_desktop_css.'
	}';
    $footer_dynamic_css['desktop'] .= $footer_sidebar2_desktop_dynamic_css;
}

/*Footer sidebar-3*/
$footer_sidebar3_css            = '';
$footer_sidebar3_tablet_css     = '';
$footer_sidebar3_desktop_css    = '';

/* margin */
$footer_sidebar3_margin  = cosmoswp_get_theme_options('footer-sidebar-3-margin');
$footer_sidebar3_margin  = json_decode($footer_sidebar3_margin,true);
// desktop margin
$footer_sidebar3_margin_desktop = cosmoswp_cssbox_values_inline($footer_sidebar3_margin,'desktop');
if (strpos($footer_sidebar3_margin_desktop, 'px') !== false){
    $footer_sidebar3_desktop_css		.= 'margin:'.$footer_sidebar3_margin_desktop.';';
}
// tablet marign
$footer_sidebar3_margin_tablet  = cosmoswp_cssbox_values_inline($footer_sidebar3_margin,'tablet');
if (strpos($footer_sidebar3_margin_tablet, 'px') !== false){
    $footer_sidebar3_tablet_css		.= 'margin:'.$footer_sidebar3_margin_tablet.';';
}
// mobile margin
$footer_sidebar3_margin_mobile  = cosmoswp_cssbox_values_inline($footer_sidebar3_margin,'mobile');
if (strpos($footer_sidebar3_margin_mobile, 'px') !== false){
    $footer_sidebar3_css		.= 'margin:'.$footer_sidebar3_margin_mobile.';';
}

/* padding */
$footer_sidebar3_padding = cosmoswp_get_theme_options('footer-sidebar-3-padding');
$footer_sidebar3_padding = json_decode($footer_sidebar3_padding,true);

// desktop padding
$footer_sidebar3_padding_desktop = cosmoswp_cssbox_values_inline($footer_sidebar3_padding,'desktop');
if (strpos($footer_sidebar3_padding_desktop, 'px') !== false){
    $footer_sidebar3_desktop_css		.= 'padding:'.$footer_sidebar3_padding_desktop.';';
}
//tablet padding
$footer_sidebar3_padding_tablet  = cosmoswp_cssbox_values_inline($footer_sidebar3_padding,'tablet');
if (strpos($footer_sidebar3_padding_tablet, 'px') !== false){
    $footer_sidebar3_tablet_css		.= 'padding:'.$footer_sidebar3_padding_tablet.';';
}
//mobile padding
$footer_sidebar3_padding_mobile  = cosmoswp_cssbox_values_inline($footer_sidebar3_padding,'mobile');
if (strpos($footer_sidebar3_padding_mobile, 'px') !== false){
    $footer_sidebar3_css		.= 'padding:'.$footer_sidebar3_padding_mobile.';';
}

/* mobile css */
if ( !empty($footer_sidebar3_css) ){
    $footer_sidebar3_dynamic_css = '.cwp-footer-sidebar-3 .widget{
		'.$footer_sidebar3_css.'
	}';
    $footer_dynamic_css['all'] .= $footer_sidebar3_dynamic_css;
}


/* tablet css */
if ( !empty($footer_sidebar3_tablet_css) ){
    $footer_sidebar3_tablet_dynamic_css = '.cwp-footer-sidebar-3 .widget{
		'.$footer_sidebar3_tablet_css.'
	}';
    $footer_dynamic_css['tablet'] .= $footer_sidebar3_tablet_dynamic_css;
}


/* desktop css  */
if ( !empty($footer_sidebar3_desktop_css) ){
    $footer_sidebar3_desktop_dynamic_css = '.cwp-footer-sidebar-3 .widget{
		'.$footer_sidebar3_desktop_css.'
	}';
    $footer_dynamic_css['desktop'] .= $footer_sidebar3_desktop_dynamic_css;
}

/*Footer sidebar-4*/
$footer_sidebar4_css            = '';
$footer_sidebar4_tablet_css     = '';
$footer_sidebar4_desktop_css    = '';

/* margin */
$footer_sidebar4_margin  = cosmoswp_get_theme_options('footer-sidebar-4-margin');
$footer_sidebar4_margin  = json_decode($footer_sidebar4_margin,true);
// desktop margin
$footer_sidebar4_margin_desktop = cosmoswp_cssbox_values_inline($footer_sidebar4_margin,'desktop');
if (strpos($footer_sidebar4_margin_desktop, 'px') !== false){
    $footer_sidebar4_desktop_css		.= 'margin:'.$footer_sidebar4_margin_desktop.';';
}
// tablet marign
$footer_sidebar4_margin_tablet  = cosmoswp_cssbox_values_inline($footer_sidebar4_margin,'tablet');
if (strpos($footer_sidebar4_margin_tablet, 'px') !== false){
    $footer_sidebar4_tablet_css		.= 'margin:'.$footer_sidebar4_margin_tablet.';';
}
// mobile margin
$footer_sidebar4_margin_mobile  = cosmoswp_cssbox_values_inline($footer_sidebar4_margin,'mobile');
if (strpos($footer_sidebar4_margin_mobile, 'px') !== false){
    $footer_sidebar4_css		.= 'margin:'.$footer_sidebar4_margin_mobile.';';
}

/* padding */
$footer_sidebar4_padding = cosmoswp_get_theme_options('footer-sidebar-4-padding');
$footer_sidebar4_padding = json_decode($footer_sidebar4_padding,true);

// desktop padding
$footer_sidebar4_padding_desktop = cosmoswp_cssbox_values_inline($footer_sidebar4_padding,'desktop');
if (strpos($footer_sidebar4_padding_desktop, 'px') !== false){
    $footer_sidebar4_desktop_css		.= 'padding:'.$footer_sidebar4_padding_desktop.';';
}
//tablet padding
$footer_sidebar4_padding_tablet  = cosmoswp_cssbox_values_inline($footer_sidebar4_padding,'tablet');
if (strpos($footer_sidebar4_padding_tablet, 'px') !== false){
    $footer_sidebar4_tablet_css		.= 'padding:'.$footer_sidebar4_padding_tablet.';';
}
//mobile padding
$footer_sidebar4_padding_mobile  = cosmoswp_cssbox_values_inline($footer_sidebar4_padding,'mobile');
if (strpos($footer_sidebar4_padding_mobile, 'px') !== false){
    $footer_sidebar4_css		.= 'padding:'.$footer_sidebar4_padding_mobile.';';
}

/* mobile css */
if ( !empty($footer_sidebar4_css) ){
    $footer_sidebar4_dynamic_css = '.cwp-footer-sidebar-4 .widget{
		'.$footer_sidebar4_css.'
	}';
    $footer_dynamic_css['all'] .= $footer_sidebar4_dynamic_css;
}

/* tablet css */
if ( !empty($footer_sidebar4_tablet_css) ){
    $footer_sidebar4_tablet_dynamic_css = '.cwp-footer-sidebar-4 .widget{
		'.$footer_sidebar4_tablet_css.'
	}';
    $footer_dynamic_css['tablet'] .= $footer_sidebar4_tablet_dynamic_css;
}

/* desktop css  */
if ( !empty($footer_sidebar4_desktop_css) ){
    $footer_sidebar4_desktop_dynamic_css = '.cwp-footer-sidebar-4 .widget{
		'.$footer_sidebar4_desktop_css.'
	}';
    $footer_dynamic_css['desktop'] .= $footer_sidebar4_desktop_dynamic_css;
}

/*Footer sidebar-5*/
$footer_sidebar5_css            = '';
$footer_sidebar5_tablet_css     = '';
$footer_sidebar5_desktop_css    = '';

/* margin */
$footer_sidebar5_margin  = cosmoswp_get_theme_options('footer-sidebar-5-margin');
$footer_sidebar5_margin  = json_decode($footer_sidebar5_margin,true);
// desktop margin
$footer_sidebar5_margin_desktop = cosmoswp_cssbox_values_inline($footer_sidebar5_margin,'desktop');
if (strpos($footer_sidebar5_margin_desktop, 'px') !== false){
    $footer_sidebar5_desktop_css		.= 'margin:'.$footer_sidebar5_margin_desktop.';';
}
// tablet marign
$footer_sidebar5_margin_tablet  = cosmoswp_cssbox_values_inline($footer_sidebar5_margin,'tablet');
if (strpos($footer_sidebar5_margin_tablet, 'px') !== false){
    $footer_sidebar5_tablet_css		.= 'margin:'.$footer_sidebar5_margin_tablet.';';
}
// mobile margin
$footer_sidebar5_margin_mobile  = cosmoswp_cssbox_values_inline($footer_sidebar5_margin,'mobile');
if (strpos($footer_sidebar5_margin_mobile, 'px') !== false){
    $footer_sidebar5_css		.= 'margin:'.$footer_sidebar5_margin_mobile.';';
}

/* padding */
$footer_sidebar5_padding = cosmoswp_get_theme_options('footer-sidebar-5-padding');
$footer_sidebar5_padding = json_decode($footer_sidebar5_padding,true);

// desktop padding
$footer_sidebar5_padding_desktop = cosmoswp_cssbox_values_inline($footer_sidebar5_padding,'desktop');
if (strpos($footer_sidebar5_padding_desktop, 'px') !== false){
    $footer_sidebar5_desktop_css		.= 'padding:'.$footer_sidebar5_padding_desktop.';';
}
//tablet padding
$footer_sidebar5_padding_tablet  = cosmoswp_cssbox_values_inline($footer_sidebar5_padding,'tablet');
if (strpos($footer_sidebar5_padding_tablet, 'px') !== false){
    $footer_sidebar5_tablet_css		.= 'padding:'.$footer_sidebar5_padding_tablet.';';
}
//mobile padding
$footer_sidebar5_padding_mobile  = cosmoswp_cssbox_values_inline($footer_sidebar5_padding,'mobile');
if (strpos($footer_sidebar5_padding_mobile, 'px') !== false){
    $footer_sidebar5_css		.= 'padding:'.$footer_sidebar5_padding_mobile.';';
}

/* mobile css */
if ( !empty($footer_sidebar5_css) ){
    $footer_sidebar5_dynamic_css = '.cwp-footer-sidebar-5 .widget{
		'.$footer_sidebar5_css.'
	}';
    $footer_dynamic_css['all'] .= $footer_sidebar5_dynamic_css;
}

/* tablet css */
if ( !empty($footer_sidebar5_tablet_css) ){
    $footer_sidebar5_tablet_dynamic_css = '.cwp-footer-sidebar-5 .widget{
		'.$footer_sidebar5_tablet_css.'
	}';
    $footer_dynamic_css['tablet'] .= $footer_sidebar5_tablet_dynamic_css;
}

/* desktop css  */
if ( !empty($footer_sidebar5_desktop_css) ){
    $footer_sidebar5_desktop_dynamic_css = '.cwp-footer-sidebar-5 .widget{
		'.$footer_sidebar5_desktop_css.'
	}';
    $footer_dynamic_css['desktop'] .= $footer_sidebar5_desktop_dynamic_css;
}

/*Footer sidebar-6*/
$footer_sidebar6_css            = '';
$footer_sidebar6_tablet_css     = '';
$footer_sidebar6_desktop_css    = '';

/* margin */
$footer_sidebar6_margin  = cosmoswp_get_theme_options('footer-sidebar-6-margin');
$footer_sidebar6_margin  = json_decode($footer_sidebar6_margin,true);
// desktop margin
$footer_sidebar6_margin_desktop = cosmoswp_cssbox_values_inline($footer_sidebar6_margin,'desktop');
if (strpos($footer_sidebar6_margin_desktop, 'px') !== false){
    $footer_sidebar6_desktop_css		.= 'margin:'.$footer_sidebar6_margin_desktop.';';
}
// tablet marign
$footer_sidebar6_margin_tablet  = cosmoswp_cssbox_values_inline($footer_sidebar6_margin,'tablet');
if (strpos($footer_sidebar6_margin_tablet, 'px') !== false){
    $footer_sidebar6_tablet_css		.= 'margin:'.$footer_sidebar6_margin_tablet.';';
}
// mobile margin
$footer_sidebar6_margin_mobile  = cosmoswp_cssbox_values_inline($footer_sidebar6_margin,'mobile');
if (strpos($footer_sidebar6_margin_mobile, 'px') !== false){
    $footer_sidebar6_css		.= 'margin:'.$footer_sidebar6_margin_mobile.';';
}

/* padding */
$footer_sidebar6_padding = cosmoswp_get_theme_options('footer-sidebar-6-padding');
$footer_sidebar6_padding = json_decode($footer_sidebar6_padding,true);

// desktop padding
$footer_sidebar6_padding_desktop = cosmoswp_cssbox_values_inline($footer_sidebar6_padding,'desktop');
if (strpos($footer_sidebar6_padding_desktop, 'px') !== false){
    $footer_sidebar6_desktop_css		.= 'padding:'.$footer_sidebar6_padding_desktop.';';
}
//tablet padding
$footer_sidebar6_padding_tablet  = cosmoswp_cssbox_values_inline($footer_sidebar6_padding,'tablet');
if (strpos($footer_sidebar6_padding_tablet, 'px') !== false){
    $footer_sidebar6_tablet_css		.= 'padding:'.$footer_sidebar6_padding_tablet.';';
}
//mobile padding
$footer_sidebar6_padding_mobile  = cosmoswp_cssbox_values_inline($footer_sidebar6_padding,'mobile');
if (strpos($footer_sidebar6_padding_mobile, 'px') !== false){
    $footer_sidebar6_css		.= 'padding:'.$footer_sidebar6_padding_mobile.';';
}

/* mobile css */
if ( !empty($footer_sidebar6_css) ){
    $footer_sidebar6_dynamic_css = '.cwp-footer-sidebar-6 .widget{
		'.$footer_sidebar6_css.'
	}';
    $footer_dynamic_css['all'] .= $footer_sidebar6_dynamic_css;
}

/* tablet css */
if ( !empty($footer_sidebar6_tablet_css) ){
    $footer_sidebar6_tablet_dynamic_css = '.cwp-footer-sidebar-6 .widget{
		'.$footer_sidebar6_tablet_css.'
	}';
    $footer_dynamic_css['tablet'] .= $footer_sidebar6_tablet_dynamic_css;
}

/* desktop css  */
if ( !empty($footer_sidebar6_desktop_css) ){
    $footer_sidebar6_desktop_dynamic_css = '.cwp-footer-sidebar-6 .widget{
		'.$footer_sidebar6_desktop_css.'
	}';
    $footer_dynamic_css['desktop'] .= $footer_sidebar6_desktop_dynamic_css;
}

/*Footer sidebar-7*/
$footer_sidebar7_css            = '';
$footer_sidebar7_tablet_css     = '';
$footer_sidebar7_desktop_css    = '';

/* margin */
$footer_sidebar7_margin  = cosmoswp_get_theme_options('footer-sidebar-7-margin');
$footer_sidebar7_margin  = json_decode($footer_sidebar7_margin,true);
// desktop margin
$footer_sidebar7_margin_desktop = cosmoswp_cssbox_values_inline($footer_sidebar7_margin,'desktop');
if (strpos($footer_sidebar7_margin_desktop, 'px') !== false){
    $footer_sidebar7_desktop_css		.= 'margin:'.$footer_sidebar7_margin_desktop.';';
}
// tablet marign
$footer_sidebar7_margin_tablet  = cosmoswp_cssbox_values_inline($footer_sidebar7_margin,'tablet');
if (strpos($footer_sidebar7_margin_tablet, 'px') !== false){
    $footer_sidebar7_tablet_css		.= 'margin:'.$footer_sidebar7_margin_tablet.';';
}
// mobile margin
$footer_sidebar7_margin_mobile  = cosmoswp_cssbox_values_inline($footer_sidebar7_margin,'mobile');
if (strpos($footer_sidebar7_margin_mobile, 'px') !== false){
    $footer_sidebar7_css		.= 'margin:'.$footer_sidebar7_margin_mobile.';';
}

/* padding */
$footer_sidebar7_padding = cosmoswp_get_theme_options('footer-sidebar-7-padding');
$footer_sidebar7_padding = json_decode($footer_sidebar7_padding,true);

// desktop padding
$footer_sidebar7_padding_desktop = cosmoswp_cssbox_values_inline($footer_sidebar7_padding,'desktop');
if (strpos($footer_sidebar7_padding_desktop, 'px') !== false){
    $footer_sidebar7_desktop_css		.= 'padding:'.$footer_sidebar7_padding_desktop.';';
}
//tablet padding
$footer_sidebar7_padding_tablet  = cosmoswp_cssbox_values_inline($footer_sidebar7_padding,'tablet');
if (strpos($footer_sidebar7_padding_tablet, 'px') !== false){
    $footer_sidebar7_tablet_css		.= 'padding:'.$footer_sidebar7_padding_tablet.';';
}
//mobile padding
$footer_sidebar7_padding_mobile  = cosmoswp_cssbox_values_inline($footer_sidebar7_padding,'mobile');
if (strpos($footer_sidebar7_padding_mobile, 'px') !== false){
    $footer_sidebar7_css		.= 'padding:'.$footer_sidebar7_padding_mobile.';';
}

/* mobile css */
if ( !empty($footer_sidebar7_css) ){
    $footer_sidebar7_dynamic_css = '.cwp-footer-sidebar-7 .widget{
		'.$footer_sidebar7_css.'
	}';
    $footer_dynamic_css['all'] .= $footer_sidebar7_dynamic_css;
}

/* tablet css */
if ( !empty($footer_sidebar7_tablet_css) ){
    $footer_sidebar7_tablet_dynamic_css = '.cwp-footer-sidebar-7 .widget{
		'.$footer_sidebar7_tablet_css.'
	}';
    $footer_dynamic_css['tablet'] .= $footer_sidebar7_tablet_dynamic_css;
}

/* desktop css  */
if ( !empty($footer_sidebar7_desktop_css) ){
    $footer_sidebar7_desktop_dynamic_css = '.cwp-footer-sidebar-7 .widget{
		'.$footer_sidebar7_desktop_css.'
	}';
    $footer_dynamic_css['desktop'] .= $footer_sidebar7_desktop_dynamic_css;
}

/*Footer sidebar-8*/
$footer_sidebar8_css            = '';
$footer_sidebar8_tablet_css     = '';
$footer_sidebar8_desktop_css    = '';

/* margin */
$footer_sidebar8_margin  = cosmoswp_get_theme_options('footer-sidebar-8-margin');
$footer_sidebar8_margin  = json_decode($footer_sidebar8_margin,true);
// desktop margin
$footer_sidebar8_margin_desktop = cosmoswp_cssbox_values_inline($footer_sidebar8_margin,'desktop');
if (strpos($footer_sidebar8_margin_desktop, 'px') !== false){
    $footer_sidebar8_desktop_css		.= 'margin:'.$footer_sidebar8_margin_desktop.';';
}
// tablet marign
$footer_sidebar8_margin_tablet  = cosmoswp_cssbox_values_inline($footer_sidebar8_margin,'tablet');
if (strpos($footer_sidebar8_margin_tablet, 'px') !== false){
    $footer_sidebar8_tablet_css		.= 'margin:'.$footer_sidebar8_margin_tablet.';';
}
// mobile margin
$footer_sidebar8_margin_mobile  = cosmoswp_cssbox_values_inline($footer_sidebar8_margin,'mobile');
if (strpos($footer_sidebar8_margin_mobile, 'px') !== false){
    $footer_sidebar8_css		.= 'margin:'.$footer_sidebar8_margin_mobile.';';
}

/* padding */
$footer_sidebar8_padding = cosmoswp_get_theme_options('footer-sidebar-8-padding');
$footer_sidebar8_padding = json_decode($footer_sidebar8_padding,true);

// desktop padding
$footer_sidebar8_padding_desktop = cosmoswp_cssbox_values_inline($footer_sidebar8_padding,'desktop');
if (strpos($footer_sidebar8_padding_desktop, 'px') !== false){
    $footer_sidebar8_desktop_css		.= 'padding:'.$footer_sidebar8_padding_desktop.';';
}
//tablet padding
$footer_sidebar8_padding_tablet  = cosmoswp_cssbox_values_inline($footer_sidebar8_padding,'tablet');
if (strpos($footer_sidebar8_padding_tablet, 'px') !== false){
    $footer_sidebar8_tablet_css		.= 'padding:'.$footer_sidebar8_padding_tablet.';';
}
//mobile padding
$footer_sidebar8_padding_mobile  = cosmoswp_cssbox_values_inline($footer_sidebar8_padding,'mobile');
if (strpos($footer_sidebar8_padding_mobile, 'px') !== false){
    $footer_sidebar8_css		.= 'padding:'.$footer_sidebar8_padding_mobile.';';
}

/* mobile css */
if ( !empty($footer_sidebar8_css) ){
    $footer_sidebar8_dynamic_css = '.cwp-footer-sidebar-8 .widget{
		'.$footer_sidebar8_css.'
	}';
    $footer_dynamic_css['all'] .= $footer_sidebar8_dynamic_css;
}

/* tablet css */
if ( !empty($footer_sidebar8_tablet_css) ){
    $footer_sidebar8_tablet_dynamic_css = '.cwp-footer-sidebar-8 .widget{
		'.$footer_sidebar8_tablet_css.'
	}';
    $footer_dynamic_css['tablet'] .= $footer_sidebar8_tablet_dynamic_css;
}

/* desktop css  */
if ( !empty($footer_sidebar8_desktop_css) ){
    $footer_sidebar8_desktop_dynamic_css = '.cwp-footer-sidebar-8 .widget{
		'.$footer_sidebar8_desktop_css.'
	}';
    $footer_dynamic_css['desktop'] .= $footer_sidebar8_desktop_dynamic_css;
}