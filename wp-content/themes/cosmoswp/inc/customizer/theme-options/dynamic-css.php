<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Appearance Option Dynamic CSS
 */
/* Appearance Style array */
$theme_option_dynamic_css['all']     = '';
$theme_option_dynamic_css['tablet'] = '';
$theme_option_dynamic_css['desktop'] = '';

/* Button Empty variable */
$site_button_css                        = '';
$site_button_css_except_default_search         = '';
$site_button_tablet_css                 = '';
$site_button_tablet_css_except_default_search  = '';
$site_button_desktop_css                = '';
$site_button_desktop_css_except_default_search = '';
$site_button_hover_css                  = '';

/* Button Styling */
$site_button_styling   = cosmoswp_get_theme_options('site-button-styling');
$site_button_styling   = json_decode( $site_button_styling,true );

//Text color
$site_txt_color     = cosmoswp_ifset($site_button_styling['normal-text-color']);
if ( $site_txt_color ){
	$site_button_css .= 'color:'.$site_txt_color.';';
}

//bg color
$site_bg_color      = cosmoswp_ifset($site_button_styling['normal-bg-color']);
if ( $site_bg_color ){
	$site_button_css .= 'background:'.$site_bg_color.';';
}
else{
	$site_button_css .= 'background:transparent;';
}

//border style
$site_border_style      = cosmoswp_ifset($site_button_styling['normal-border-style']);
if ( $site_border_style ){
	$site_button_css .= 'border-style:'.$site_border_style.';';
}

//border color
$site_border_color      = cosmoswp_ifset($site_button_styling['normal-border-color']);
if ( $site_border_color ){
	$site_button_css .= 'border-color:'.$site_border_color.';';
}

//border width
$site_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($site_button_styling['normal-border-width']),'desktop');
if (strpos($site_border_width, 'px') !== false) {
	$site_button_css .= 'border-width:'.$site_border_width.';';
}

//border radius
$site_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($site_button_styling['normal-border-radius']),'desktop');
if (strpos($site_border_radius, 'px') !== false){
	$site_button_css		.= 'border-radius:'.$site_border_radius.';';
}

//bx shadow
$site_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($site_button_styling['normal-box-shadow-css']),'desktop');
if (strpos($site_shadow_css, 'px') !== false) {
	$site_shadow_color = cosmoswp_ifset($site_button_styling['normal-box-shadow-color']);
	$site_bx_shadow    = $site_shadow_css.' '.$site_shadow_color;
	$site_button_css          .=	'-webkit-box-shadow:'.$site_bx_shadow.';';
	$site_button_css          .=	'-moz-box-shadow:'.$site_bx_shadow.';';
	$site_button_css          .=	'box-shadow:'.$site_bx_shadow.';';
}


//typography
$site_button_typography_options = cosmoswp_get_theme_options('site-button-typography-options');
if ('custom' == $site_button_typography_options){
    $site_button_typography         = cosmoswp_get_theme_options('site-button-typography');
    $site_button_typography         = json_decode($site_button_typography,true);

    $site_button_font_family     =  cosmoswp_font_family($site_button_typography);
    if ( $site_button_font_family ){
        $site_button_css_except_default_search .=  'font-family:'.$site_button_font_family.';';
        $site_button_font_weight     = cosmoswp_font_weight( $site_button_typography );
        if ( $site_button_font_weight ){
            $site_button_css_except_default_search .=  'font-weight:'.$site_button_font_weight.';';
        }
        $site_button_font_style      = cosmoswp_ifset($site_button_typography['font-style']);
        if ( $site_button_font_style ){
            $site_button_css_except_default_search .=  'font-style:'.$site_button_font_style.';';
        }
        $site_button_text_decoration = cosmoswp_ifset($site_button_typography['text-decoration']);
        if ( $site_button_text_decoration ){
            $site_button_css_except_default_search .=  'text-decoration:'.$site_button_text_decoration.';';
        }
        $site_button_text_transform  = cosmoswp_ifset($site_button_typography['text-transform']);
        if ( $site_button_text_transform ){
            $site_button_css_except_default_search .=  'text-transform:'.$site_button_text_transform.';';
        }
        $site_button_font_size       = cosmoswp_ifset($site_button_typography['font-size']['mobile']);
        if ( $site_button_font_size ){
            $site_button_css_except_default_search .=  'font-size:'.$site_button_font_size.'px;';
        }
        $site_button_line_height     = cosmoswp_ifset($site_button_typography['line-height']['mobile']);
        if ( $site_button_line_height ){
            $site_button_css_except_default_search .=  'line-height:'.$site_button_line_height.'px;';
        }
        $site_button_letter_spacing  = cosmoswp_ifset($site_button_typography['letter-spacing']['mobile']);
        if ( $site_button_letter_spacing ){
            $site_button_css_except_default_search .=  'letter-spacing:'.$site_button_letter_spacing.'px;';
        }

        /* copyright tablet css */
        $site_button_tablet_font_size       = cosmoswp_ifset($site_button_typography['font-size']['tablet']);
        if ( $site_button_tablet_font_size ){
            $site_button_tablet_css_except_default_search .=  'font-size:'.$site_button_tablet_font_size.'px;';
        }
        $site_button_tablet_line_height     = cosmoswp_ifset($site_button_typography['line-height']['tablet']);
        if ( $site_button_tablet_line_height ){
            $site_button_tablet_css_except_default_search .=  'line-height:'.$site_button_tablet_line_height.'px;';
        }
        $site_button_tablet_letter_spacing  = cosmoswp_ifset($site_button_typography['letter-spacing']['tablet']);
        if ( $site_button_tablet_letter_spacing ){
            $site_button_tablet_css_except_default_search .=  'letter-spacing:'.$site_button_tablet_letter_spacing.'px;';
        }

        /* copyright desktop tablet css */
        $site_button_desktop_font_size       = cosmoswp_ifset($site_button_typography['font-size']['desktop']);
        if ( $site_button_desktop_font_size ){
            $site_button_desktop_css_except_default_search .=  'font-size:'.$site_button_desktop_font_size.'px;';
        }
        $site_button_desktop_line_height     = cosmoswp_ifset($site_button_typography['line-height']['desktop']);
        if ( $site_button_desktop_line_height ){
            $site_button_desktop_css_except_default_search .=  'line-height:'.$site_button_desktop_line_height.'px;';
        }
        $site_button_desktop_letter_spacing  = cosmoswp_ifset($site_button_typography['letter-spacing']['desktop']);
        if ( $site_button_desktop_letter_spacing ){
            $site_button_desktop_css_except_default_search .=  'letter-spacing:'.$site_button_desktop_letter_spacing.'px;';
        }
    }
}

/* margin */
$site_button_margin = cosmoswp_get_theme_options('site-button-margin');
$site_button_margin = json_decode($site_button_margin,true);

// desktop margin 
$site_button_margin_desktop = cosmoswp_cssbox_values_inline($site_button_margin,'desktop');
if (strpos($site_button_margin_desktop, 'px') !== false){
	$site_button_desktop_css_except_default_search		.= 'margin:'.$site_button_margin_desktop.';';
}

// tablet margin 
$site_button_margin_tablet  = cosmoswp_cssbox_values_inline($site_button_margin,'tablet');
if (strpos($site_button_margin_tablet, 'px') !== false){
	$site_button_tablet_css_except_default_search		.= 'margin:'.$site_button_margin_tablet.';';
}

// mobile margin 
$site_button_margin_mobile  = cosmoswp_cssbox_values_inline($site_button_margin,'mobile');
if (strpos($site_button_margin_mobile, 'px') !== false){
	$site_button_css_except_default_search		.= 'margin:'.$site_button_margin_mobile.';';
}

/* padding */
$site_button_padding = cosmoswp_get_theme_options('site-button-padding');
$site_button_padding = json_decode($site_button_padding,true);

// desktop padding
$site_button_padding_desktop = cosmoswp_cssbox_values_inline($site_button_padding,'desktop');
if (strpos($site_button_padding_desktop, 'px') !== false){
	$site_button_desktop_css_except_default_search		.= 'padding:'.$site_button_padding_desktop.';';
}

//tablet padding
$site_button_padding_tablet  = cosmoswp_cssbox_values_inline($site_button_padding,'tablet');
if (strpos($site_button_padding_tablet, 'px') !== false){
	$site_button_tablet_css_except_default_search		.= 'padding:'.$site_button_padding_tablet.';';
}

//mobile padding
$site_button_padding_mobile  = cosmoswp_cssbox_values_inline($site_button_padding,'mobile');
if (strpos($site_button_padding_mobile, 'px') !== false){
	$site_button_css_except_default_search		.= 'padding:'.$site_button_padding_mobile.';';
}


/*site button margin and padding */
/* mobile css */
if ( !empty( $site_button_css_except_default_search )){
	$site_button_margin_padding_dynamic_css = '
	.cosmoswp-btn, 
	#cwp-main-wrap .comments-area .submit,
	#cwp-main-wrap form:not(.search-form) input[type="submit"]{
		'.$site_button_css_except_default_search.'
	}';
	$theme_option_dynamic_css['all'] .= $site_button_margin_padding_dynamic_css;
}

/* tablet css */
if ( !empty($site_button_tablet_css_except_default_search) ){
	$site_button_tablet_margin_padding_dynamic_css = '
	.cosmoswp-btn, 
	#cwp-main-wrap .comments-area .submit,
	#cwp-main-wrap form:not(.search-form) input[type="submit"]{
		'.$site_button_tablet_css_except_default_search.'
	}';
	$theme_option_dynamic_css['tablet'] .= $site_button_tablet_margin_padding_dynamic_css;
}

/* desktop css */
if ( !empty($site_button_desktop_css_except_default_search) ){
	$site_button_desktop_margin_padding_dynamic_css = '
	.cosmoswp-btn, 
	#cwp-main-wrap .comments-area .submit,
	#cwp-main-wrap form:not(.search-form) input[type="submit"]{
		'.$site_button_desktop_css_except_default_search.'
	}';
	$theme_option_dynamic_css['desktop'] .= $site_button_desktop_margin_padding_dynamic_css;
}

/* mobile css */
if ( !empty( $site_button_css )){
	$site_button_dynamic_css = '
	.cosmoswp-btn, 
	#cwp-main-wrap .comments-area .submit,
	#cwp-main-wrap form:not(.search-form) input[type="submit"]{
		'.$site_button_css.'
	}';
	$theme_option_dynamic_css['all'] .= $site_button_dynamic_css;
}

/* tablet css */
if ( !empty($site_button_tablet_css) ){
	$site_button_tablet_dynamic_css = '
	.cosmoswp-btn, 
	#cwp-main-wrap .comments-area .submit,
	#cwp-main-wrap form:not(.search-form) input[type="submit"]{
		'.$site_button_tablet_css.'
	}';
	$theme_option_dynamic_css['tablet'] .= $site_button_tablet_dynamic_css;
}

/* desktop css */
if ( !empty($site_button_desktop_css) ){
	$site_button_desktop_dynamic_css = '
	.cosmoswp-btn, 
	#cwp-main-wrap .comments-area .submit,
	#cwp-main-wrap form:not(.search-form) input[type="submit"]
	{
		'.$site_button_desktop_css.'
	}';
	$theme_option_dynamic_css['desktop'] .= $site_button_desktop_dynamic_css;
}

$site_button_hover_css = '';	

//txt color
$site_hover_txt_color     = cosmoswp_ifset($site_button_styling['hover-text-color']);
if ( $site_hover_txt_color ){
	$site_button_hover_css .= 'color:'.$site_hover_txt_color.';';
}

//bg color
$site_hover_bg_color      = cosmoswp_ifset($site_button_styling['hover-bg-color']);
if ( $site_hover_bg_color ){
	$site_button_hover_css .= 'background-color:'.$site_hover_bg_color.';';
}

//border style
$site_hover_border_style      = cosmoswp_ifset($site_button_styling['hover-border-style']);
if ( $site_hover_border_style ){
	$site_button_hover_css .= 'border-style:'.$site_hover_border_style.';';
}

//border color
$site_hover_border_color      = cosmoswp_ifset($site_button_styling['hover-border-color']);
if ( $site_hover_border_color ){
	$site_button_hover_css .= 'border-color:'.$site_hover_border_color.';';
}

//border width
$site_hover_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($site_button_styling['hover-border-width']),'desktop');
if (strpos($site_hover_border_width, 'px') !== false) {
	$site_button_hover_css .= 'border-width:'.$site_hover_border_width.';';
}

//border radius
$site_hover_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($site_button_styling['hover-border-radius']),'desktop');
if (strpos($site_hover_border_radius, 'px') !== false){
	$site_button_hover_css		.= 'border-radius:'.$site_hover_border_radius.';';
}

//bx shadow
$site_hover_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($site_button_styling['hover-box-shadow-css']),'desktop');
if (strpos($site_hover_shadow_css, 'px') !== false) {
	$site_hover_shadow_color = cosmoswp_ifset($site_button_styling['hover-box-shadow-color']);
	$site_hover_bx_shadow    = $site_hover_shadow_css.' '.$site_hover_shadow_color;
	$site_button_hover_css          .=	'-webkit-box-shadow:'.$site_hover_bx_shadow.';';
	$site_button_hover_css          .=	'-moz-box-shadow:'.$site_hover_bx_shadow.';';
	$site_button_hover_css          .=	'box-shadow:'.$site_hover_bx_shadow.';';
}	
if ( !empty( $site_button_hover_css )){
	$site_button_hover_dynamic_css = '
	.cosmoswp-btn:hover, 
	.cosmoswp-btn:focus,
	#cwp-main-wrap form:not(.search-form) input[type="submit"]:hover, 
	#cwp-main-wrap form:not(.search-form) input[type="submit"]:focus{
		'.$site_button_hover_css.'
	}';
	$theme_option_dynamic_css['all'] .= $site_button_hover_dynamic_css;
}?><?php
/* global sidebar */
$cosmoswp_sidebar_css         = '';
$cosmoswp_sidebar_tablet_css  = '';
$cosmoswp_sidebar_desktop_css = '';

/* sidebar padding */
$global_sidebar_padding = cosmoswp_get_theme_options('global-sidebar-padding');
$global_sidebar_padding = json_decode($global_sidebar_padding,true);

// desktop padding
$cosmoswp_sidebar_padding_desktop = cosmoswp_cssbox_values_inline($global_sidebar_padding,'desktop');
if (strpos($cosmoswp_sidebar_padding_desktop, 'px') !== false){
	$cosmoswp_sidebar_desktop_css		.= 'padding:'.$cosmoswp_sidebar_padding_desktop.';';
}

//tablet padding
$cosmoswp_sidebar_padding_tablet  = cosmoswp_cssbox_values_inline($global_sidebar_padding,'tablet');
if (strpos($cosmoswp_sidebar_padding_tablet, 'px') !== false){
	$cosmoswp_sidebar_tablet_css		.= 'padding:'.$cosmoswp_sidebar_padding_tablet.';';
}

//mobile padding
$cosmoswp_sidebar_padding_mobile  = cosmoswp_cssbox_values_inline($global_sidebar_padding,'mobile');
if (strpos($cosmoswp_sidebar_padding_mobile, 'px') !== false){
	$cosmoswp_sidebar_css		.= 'padding:'.$cosmoswp_sidebar_padding_mobile.';';
}

$global_sidebar_bg_option            = cosmoswp_get_theme_options('global-sidebar-background-options');
$global_sidebar_bg_option            = json_decode($global_sidebar_bg_option,true);

//bg color
$global_sidebar_bg_color      = cosmoswp_ifset($global_sidebar_bg_option['background-color']);
if ( $global_sidebar_bg_color ){
	$cosmoswp_sidebar_css		.= 'background-color:'.$global_sidebar_bg_color.';';
}
/* mobile */
if ( !empty( $cosmoswp_sidebar_css )){
	$cosmoswp_sidebar_dynamic_css = '.cwp-sidebar{
		'.$cosmoswp_sidebar_css.'
	}';
	$theme_option_dynamic_css['all'] .= $cosmoswp_sidebar_dynamic_css;
}

/* tablet css */
if ( !empty($cosmoswp_sidebar_tablet_css) ){
	$cosmoswp_sidebar_tablet_dynamic_css = '.cwp-sidebar{
		'.$cosmoswp_sidebar_tablet_css.'
	}';
	$theme_option_dynamic_css['tablet'] .= $cosmoswp_sidebar_tablet_dynamic_css;
}

/* desktop css  */
if ( !empty($cosmoswp_sidebar_desktop_css) ){
	$cosmoswp_sidebar_desktop_dynamic_css = '.cwp-sidebar{
		'.$cosmoswp_sidebar_desktop_css.'
	}';
	$theme_option_dynamic_css['desktop'] .= $cosmoswp_sidebar_desktop_dynamic_css;
}

/*widget content*/
$cosmoswp_sidebar_widget_css         = '';
$cosmoswp_sidebar_widget_tablet_css  = '';
$cosmoswp_sidebar_widget_desktop_css = '';
$widget_content_typography_options = cosmoswp_get_theme_options('global-widget-content-typography-options');
if ('custom' == $widget_content_typography_options){
	
	$widget_content_typography         = cosmoswp_get_theme_options('global-widget-content-typography');
	$widget_content_typography         = json_decode($widget_content_typography,true);

	$widget_content_font_style      = cosmoswp_ifset($widget_content_typography['font-style']);
	if ( $widget_content_font_style ){
		$cosmoswp_sidebar_widget_css .=  'font-style:'.$widget_content_font_style.';';
	}
	$widget_content_text_decoration = cosmoswp_ifset($widget_content_typography['text-decoration']);
	if ( $widget_content_text_decoration ){
		$cosmoswp_sidebar_widget_css .=  'text-decoration:'.$widget_content_text_decoration.';';
	}
	$widget_content_text_transform  = cosmoswp_ifset($widget_content_typography['text-transform']);
	if ( $widget_content_text_transform ){
		$cosmoswp_sidebar_widget_css .=  'text-transform:'.$widget_content_text_transform.';';
	}
}

//border options
$widget_content_border           = cosmoswp_get_theme_options('global-widget-content-border-styling');
$widget_content_border           = json_decode($widget_content_border,true);
$widget_content_border_style     = cosmoswp_ifset($widget_content_border['border-style']);
if ( 'none' !== $widget_content_border_style ){

	$cosmoswp_sidebar_widget_css .= 'border-style:'.$widget_content_border_style.';';
	//border width
	$widget_content_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($widget_content_border['border-width']),'desktop');
	if (strpos($widget_content_border_width, 'px') !== false) {
		$cosmoswp_sidebar_widget_css .= 'border-width:'.$widget_content_border_width.';';
	}
	//border color
	$widget_content_border_color     = cosmoswp_ifset($widget_content_border['border-color']);
	if ($widget_content_border_color){
		$cosmoswp_sidebar_widget_css .= 'border-color:'.$widget_content_border_color.';';
	}
}

/* widget margin */
$widget_content_margin = cosmoswp_get_theme_options('global-widget-content-margin');
$widget_content_margin = json_decode($widget_content_margin,true);

// desktop margin 
$cosmoswp_sidebar_widget_margin_desktop = cosmoswp_cssbox_values_inline($widget_content_margin,'desktop');
if (strpos($cosmoswp_sidebar_widget_margin_desktop, 'px') !== false){
	$cosmoswp_sidebar_widget_desktop_css		.= 'margin:'.$cosmoswp_sidebar_widget_margin_desktop.';';
}

// tablet marign 
$cosmoswp_sidebar_widget_margin_tablet  = cosmoswp_cssbox_values_inline($widget_content_margin,'tablet');
if (strpos($cosmoswp_sidebar_widget_margin_tablet, 'px') !== false){
	$cosmoswp_sidebar_widget_tablet_css		.= 'margin:'.$cosmoswp_sidebar_widget_margin_tablet.';';
}

// mobile margin 
$cosmoswp_sidebar_widget_margin_mobile  = cosmoswp_cssbox_values_inline($widget_content_margin,'mobile');
if (strpos($cosmoswp_sidebar_widget_margin_mobile, 'px') !== false){
	$cosmoswp_sidebar_widget_css		.= 'margin:'.$cosmoswp_sidebar_widget_margin_mobile.';';
}

/* wisget padding*/
$widget_content_padding = cosmoswp_get_theme_options('global-widget-content-padding');
$widget_content_padding = json_decode($widget_content_padding,true);

// desktop padding
$cosmoswp_sidebar_widget_padding_desktop = cosmoswp_cssbox_values_inline($widget_content_padding,'desktop');
if (strpos($cosmoswp_sidebar_widget_padding_desktop, 'px') !== false){
	$cosmoswp_sidebar_widget_desktop_css		.= 'padding:'.$cosmoswp_sidebar_widget_padding_desktop.';';
}

//tablet padding
$cosmoswp_sidebar_widget_padding_tablet  = cosmoswp_cssbox_values_inline($widget_content_padding,'tablet');
if (strpos($cosmoswp_sidebar_widget_padding_tablet, 'px') !== false){
	$cosmoswp_sidebar_widget_tablet_css		.= 'padding:'.$cosmoswp_sidebar_widget_padding_tablet.';';
}
//mobile padding
$cosmoswp_sidebar_widget_padding_mobile  = cosmoswp_cssbox_values_inline($widget_content_padding,'mobile');
if (strpos($cosmoswp_sidebar_widget_padding_mobile, 'px') !== false){
	$cosmoswp_sidebar_widget_css		.= 'padding:'.$cosmoswp_sidebar_widget_padding_mobile.';';
}

$widget_content_color = cosmoswp_get_theme_options('global-widget-content-color');
if ($widget_content_color){
	$cosmoswp_sidebar_widget_css .= 'color:'.$widget_content_color.';';
}

/* mobile css */
if ( !empty( $cosmoswp_sidebar_widget_css )){
	$widget_content_dynamic_css = '.cwp-sidebar .widget{
		'.$cosmoswp_sidebar_widget_css.'
	}';
	$theme_option_dynamic_css['all'] .= $widget_content_dynamic_css;
}

/* tablet css */
if ( !empty($cosmoswp_sidebar_widget_tablet_css) ){
	$cosmoswp_sidebar_widget_tablet_dynamic_css = '.cwp-sidebar .widget{
		'.$cosmoswp_sidebar_widget_tablet_css.'
	}';
	$theme_option_dynamic_css['tablet'] .= $cosmoswp_sidebar_widget_tablet_dynamic_css;
}

/* desktop css  */
if ( !empty($cosmoswp_sidebar_widget_desktop_css) ){
	$cosmoswp_sidebar_widget_desktop_dynamic_css = '.cwp-sidebar .widget{
		'.$cosmoswp_sidebar_widget_desktop_css.'
	}';
	$theme_option_dynamic_css['desktop'] .= $cosmoswp_sidebar_widget_desktop_dynamic_css;
}

/*widget title*/
$cosmoswp_widget_title_css         = '';
$cosmoswp_widget_title_tablet_css  = '';
$cosmoswp_widget_title_desktop_css = '';

/*Margin*/
$cosmoswp_widget_title_margin = cosmoswp_get_theme_options('global-widget-title-margin');
$cosmoswp_widget_title_margin = json_decode($cosmoswp_widget_title_margin,true);

// desktop margin 
$cosmoswp_widget_title_margin_desktop = cosmoswp_cssbox_values_inline($cosmoswp_widget_title_margin,'desktop');
if (strpos($cosmoswp_widget_title_margin_desktop, 'px') !== false){
	$cosmoswp_widget_title_desktop_css		.= 'margin:'.$cosmoswp_widget_title_margin_desktop.';';
}

// tablet marign 
$cosmoswp_widget_title_margin_tablet  = cosmoswp_cssbox_values_inline($cosmoswp_widget_title_margin,'tablet');
if (strpos($cosmoswp_widget_title_margin_tablet, 'px') !== false){
	$cosmoswp_widget_title_tablet_css		.= 'margin:'.$cosmoswp_widget_title_margin_tablet.';';
}

// mobile margin 
$cosmoswp_widget_title_margin_mobile  = cosmoswp_cssbox_values_inline($cosmoswp_widget_title_margin,'mobile');
if (strpos($cosmoswp_widget_title_margin_mobile, 'px') !== false){
	$cosmoswp_widget_title_css		.= 'margin:'.$cosmoswp_widget_title_margin_mobile.';';
}

/* padding */
$cosmoswp_widget_title_padding = cosmoswp_get_theme_options('global-widget-title-padding');
$cosmoswp_widget_title_padding = json_decode($cosmoswp_widget_title_padding,true);

// desktop padding
$cosmoswp_widget_title_padding_desktop = cosmoswp_cssbox_values_inline($cosmoswp_widget_title_padding,'desktop');
if (strpos($cosmoswp_widget_title_padding_desktop, 'px') !== false){
	$cosmoswp_widget_title_desktop_css		.= 'padding:'.$cosmoswp_widget_title_padding_desktop.';';
}

//tablet padding
$cosmoswp_widget_title_padding_tablet  = cosmoswp_cssbox_values_inline($cosmoswp_widget_title_padding,'tablet');
if (strpos($cosmoswp_widget_title_padding_tablet, 'px') !== false){
	$cosmoswp_widget_title_tablet_css		.= 'padding:'.$cosmoswp_widget_title_padding_tablet.';';
}

//mobile padding
$cosmoswp_widget_title_padding_mobile  = cosmoswp_cssbox_values_inline($cosmoswp_widget_title_padding,'mobile');
if (strpos($cosmoswp_widget_title_padding_mobile, 'px') !== false){
	$cosmoswp_widget_title_css		.= 'padding:'.$cosmoswp_widget_title_padding_mobile.';';
}

$widget_title_typography_options = cosmoswp_get_theme_options('global-widget-title-typography-options');
if ('custom' == $widget_title_typography_options){
	
	$widget_title_typography         = cosmoswp_get_theme_options('global-widget-title-typography');
	$widget_title_typography         = json_decode($widget_title_typography,true);

	$widget_title_font_family     =  cosmoswp_font_family($widget_title_typography);
	if ( $widget_title_font_family ){
		$cosmoswp_widget_title_css .=  'font-family:'.$widget_title_font_family.';';
		$widget_title_font_weight     = cosmoswp_font_weight( $widget_title_typography );
		if ( $widget_title_font_weight ){
			$cosmoswp_widget_title_css .=  'font-weight:'.$widget_title_font_weight.';';
		}
		$widget_title_font_style      = cosmoswp_ifset($widget_title_typography['font-style']);
		if ( $widget_title_font_style ){
			$cosmoswp_widget_title_css .=  'font-style:'.$widget_title_font_style.';';
		}
		$widget_title_text_decoration = cosmoswp_ifset($widget_title_typography['text-decoration']);
		if ( $widget_title_text_decoration ){
			$cosmoswp_widget_title_css .=  'text-decoration:'.$widget_title_text_decoration.';';
		}
		$widget_title_text_transform  = cosmoswp_ifset($widget_title_typography['text-transform']);
		if ( $widget_title_text_transform ){
			$cosmoswp_widget_title_css .=  'text-transform:'.$widget_title_text_transform.';';
		}
		$widget_title_font_size       = cosmoswp_ifset($widget_title_typography['font-size']['mobile']);
		if ( $widget_title_font_size ){
			$cosmoswp_widget_title_css .=  'font-size:'.$widget_title_font_size.'px;';
		}
		$widget_title_line_height     = cosmoswp_ifset($widget_title_typography['line-height']['mobile']);
		if ( $widget_title_line_height ){
			$cosmoswp_widget_title_css .=  'line-height:'.$widget_title_line_height.'px;';
		}
		$widget_title_letter_spacing  = cosmoswp_ifset($widget_title_typography['letter-spacing']['mobile']);
		if ( $widget_title_letter_spacing ){
			$cosmoswp_widget_title_css .=  'letter-spacing:'.$widget_title_letter_spacing.'px;';
		}

		/* Widget title tablet css */
		$widget_title_tablet_font_size       = cosmoswp_ifset($widget_title_typography['font-size']['tablet']);
		if ( $widget_title_tablet_font_size ){
			$cosmoswp_widget_title_tablet_css .=  'font-size:'.$widget_title_tablet_font_size.'px;';
		}
		$widget_title_tablet_line_height     = cosmoswp_ifset($widget_title_typography['line-height']['tablet']);
		if ( $widget_title_tablet_line_height ){
			$cosmoswp_widget_title_tablet_css .=  'line-height:'.$widget_title_tablet_line_height.'px;';
		}
		$widget_title_tablet_letter_spacing  = cosmoswp_ifset($widget_title_typography['letter-spacing']['tablet']);
		if ( $widget_title_tablet_letter_spacing ){
			$cosmoswp_widget_title_tablet_css .=  'letter-spacing:'.$widget_title_tablet_letter_spacing.'px;';
		}

		/* Wdget title desktop tablet css */
		$widget_title_desktop_font_size       = cosmoswp_ifset($widget_title_typography['font-size']['desktop']);
		if ( $widget_title_desktop_font_size ){
			$cosmoswp_widget_title_desktop_css .=  'font-size:'.$widget_title_desktop_font_size.'px;';
		}
		$widget_title_desktop_line_height     = cosmoswp_ifset($widget_title_typography['line-height']['desktop']);
		if ( $widget_title_desktop_line_height ){
			$cosmoswp_widget_title_desktop_css .=  'line-height:'.$widget_title_desktop_line_height.'px;';
		}
		$widget_title_desktop_letter_spacing  = cosmoswp_ifset($widget_title_typography['letter-spacing']['desktop']);
		if ( $widget_title_desktop_letter_spacing ){
			$cosmoswp_widget_title_desktop_css .=  'letter-spacing:'.$widget_title_desktop_letter_spacing.'px;';
		}
	}
}

//border options
$widget_title_border           = cosmoswp_get_theme_options('global-widget-title-border-styling');
$widget_title_border           = json_decode($widget_title_border,true);
$widget_title_border_style     = cosmoswp_ifset($widget_title_border['border-style']);
if ( 'none' !== $widget_title_border_style ){

	$cosmoswp_widget_title_css .= 'border-style:'.$widget_title_border_style.';';

	//border width
	$widget_title_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($widget_title_border['border-width']),'desktop');
	if (strpos($widget_title_border_width, 'px') !== false) {
		$cosmoswp_widget_title_css .= 'border-width:'.$widget_title_border_width.';';
	}

	//border color
	$widget_title_border_color     = cosmoswp_ifset($widget_title_border['border-color']);
	if ($widget_title_border_color){
		$cosmoswp_widget_title_css .= 'border-color:'.$widget_title_border_color.';';
	}
}

$widget_title_color = cosmoswp_get_theme_options('global-widget-title-color');
if ($widget_title_color){
	$cosmoswp_widget_title_css .= 'color:'.$widget_title_color.';';
}

/* widget title mobile css */
if ( !empty( $cosmoswp_widget_title_css )){
	$widget_title_dynamic_css = '.cwp-sidebar .widget .widget-title{
		'.$cosmoswp_widget_title_css.'
	}';
	$theme_option_dynamic_css['all'] .= $widget_title_dynamic_css;
}

/* widget title tablet css */
if ( !empty($cosmoswp_widget_title_tablet_css) ){
	$cosmoswp_widget_title_tablet_dynamic_css = '.cwp-sidebar .widget .widget-title{
		'.$cosmoswp_widget_title_tablet_css.'
	}';
	$theme_option_dynamic_css['tablet'] .= $cosmoswp_widget_title_tablet_dynamic_css;
}

/* widget title desktop css  */
if ( !empty($cosmoswp_widget_title_desktop_css) ){
	$cosmoswp_widget_title_desktop_dynamic_css = '.cwp-sidebar .widget .widget-title{
		'.$cosmoswp_widget_title_desktop_css.'
	}';
	$theme_option_dynamic_css['desktop'] .= $cosmoswp_widget_title_desktop_dynamic_css;
}

/* Widget Link Color*/
$widget_link_color = cosmoswp_get_theme_options('global-widget-link-color');
if ($widget_link_color){
	$cosmoswp_widget_link_css = 'color:'.$widget_link_color.';';
}

/* widget title mobile css */
if ( !empty( $cosmoswp_widget_link_css )){
	$widget_link_dynamic_css = '.cwp-sidebar .widget a, .cwp-sidebar .widget li a{
		'.$cosmoswp_widget_link_css.'
	}';
	$theme_option_dynamic_css['all'] .= $widget_link_dynamic_css;
}

$breadcrumb_color_options      = cosmoswp_get_theme_options( 'breadcrumb-color-options' );
$breadcrumb_color_options      = json_decode( $breadcrumb_color_options, true );

$breadcrumb_text_color = cosmoswp_ifset( $breadcrumb_color_options['text-color'] );
if ( $breadcrumb_text_color ) {
    $theme_option_dynamic_css['all'] .= '.cwp-banner .breadcrumbs,
			    .woocommerce .cwp-banner .woocommerce-breadcrumb{
			        color:' . $breadcrumb_text_color . ';
			    }';
}
$breadcrumb_link_color = cosmoswp_ifset( $breadcrumb_color_options['link-color'] );
if ( $breadcrumb_link_color ) {
    $theme_option_dynamic_css['all'] .= '.cwp-banner .breadcrumbs a,.cwp-breadcrumbs a,
			    .woocommerce .cwp-banner .woocommerce-breadcrumb a{
			        color:' . $breadcrumb_link_color . ';
			    }';
}
$breadcrumb_link_hover_color = cosmoswp_ifset( $breadcrumb_color_options['link-hover-color'] );
if ( $breadcrumb_link_hover_color ) {
    $theme_option_dynamic_css['all'] .= '.cwp-banner .breadcrumbs a:hover,
			    .woocommerce .cwp-banner .woocommerce-breadcrumb a:hover,.cwp-breadcrumbs a:hover {
			        color:' . $breadcrumb_link_hover_color . ';
			    }';
}

/*Scroll Top Icon Styling*/
$scroll_top_icon_size_css         = '';
$scroll_top_icon_size_tablet_css  = '';
$scroll_top_icon_size_desktop_css = '';

$scroll_top_button_css              = '';
$scroll_top_button_tablet_css       = '';
$scroll_top_button_desktop_css      = '';

$scroll_top_icon_hover_css        =  '';

/* icon size */
$scroll_top_icon_size = cosmoswp_get_theme_options('scroll-top-icon-size-responsive');
$scroll_top_icon_size = json_decode($scroll_top_icon_size,true);

// desktop icon size
$desktop_icon_size  = cosmoswp_ifset($scroll_top_icon_size['desktop']);
if (!empty( $desktop_icon_size )){
    $scroll_top_icon_size_desktop_css	.= 'font-size:'.$desktop_icon_size.'px;';
}
// tablet icon size
$tablet_icon_size  = cosmoswp_ifset($scroll_top_icon_size['tablet']);
if (!empty( $tablet_icon_size )){
    $scroll_top_icon_size_tablet_css	.= 'font-size:'.$tablet_icon_size.'px;';
}
// mobile icon size
$mobile_icon_size  = cosmoswp_ifset($scroll_top_icon_size['mobile']);
if (!empty( $mobile_icon_size )){
    $scroll_top_icon_size_css	 .= 'font-size:'.$mobile_icon_size.'px;';
}

/* mobile css */
if ( !empty( $scroll_top_icon_size_css )){
    $scroll_top_icon_size_dynamic_css = '.cwp-scroll-to-top i{
                    '.$scroll_top_icon_size_css.'
                }';
    $theme_option_dynamic_css['all'] .= $scroll_top_icon_size_dynamic_css;
}
/* tablet css */
if ( !empty($scroll_top_icon_size_tablet_css) ){
    $scroll_top_icon_size_tablet_dynamic_css = '.cwp-scroll-to-top i{
                    '.$scroll_top_icon_size_tablet_css.'
                }';
    $theme_option_dynamic_css['tablet'] .= $scroll_top_icon_size_tablet_dynamic_css;
}
/* desktop css */
if ( !empty($scroll_top_icon_size_desktop_css) ){
    $scroll_top_icon_size_desktop_dynamic_css = '.cwp-scroll-to-top i{
                    '.$scroll_top_icon_size_desktop_css.'
                }';
    $theme_option_dynamic_css['desktop'] .= $scroll_top_icon_size_desktop_dynamic_css;
}

/*Scroll top button css*/
/* Button Height*/
$scoll_top_icon_options = cosmoswp_get_theme_options('scroll-top-icon-options');
$scroll_top_button_height = cosmoswp_get_theme_options('scroll-top-button-height');
$scroll_top_button_height = json_decode($scroll_top_button_height,true);

// desktop icon size
$desktop_icon_size  = cosmoswp_ifset($scroll_top_button_height['desktop']);
if (!empty( $desktop_icon_size )){
    $scroll_top_button_desktop_css	.= 'height:'.$desktop_icon_size.'px;';
    if ('icon' == $scoll_top_icon_options) {
        $scroll_top_button_desktop_css	.= 'line-height:'.$desktop_icon_size.'px;';
    }
}
// tablet icon size
$tablet_icon_size  = cosmoswp_ifset($scroll_top_button_height['tablet']);
if (!empty( $tablet_icon_size )){
    $scroll_top_button_tablet_css	.= 'height:'.$tablet_icon_size.'px;';
    if ('icon' == $scoll_top_icon_options) {
        $scroll_top_button_tablet_css	.= 'line-height:'.$desktop_icon_size.'px;';
    }
}
// mobile icon size
$mobile_icon_size  = cosmoswp_ifset($scroll_top_button_height['mobile']);
if (!empty( $mobile_icon_size )){
    $scroll_top_button_css	 .= 'height:'.$mobile_icon_size.'px;';
    if ('icon' == $scoll_top_icon_options) {
        $scroll_top_button_css	.= 'line-height:'.$desktop_icon_size.'px;';
    }
}

/*Scroll Top Button width size */
$scroll_top_button_width = cosmoswp_get_theme_options('scroll-top-button-width');
$scroll_top_button_width = json_decode($scroll_top_button_width,true);

// desktop icon size
$desktop_icon_size  = cosmoswp_ifset($scroll_top_button_width['desktop']);
if (!empty( $desktop_icon_size )){
    $scroll_top_button_desktop_css	.= 'width:'.$desktop_icon_size.'px;';
}
// tablet icon size
$tablet_icon_size  = cosmoswp_ifset($scroll_top_button_width['tablet']);
if (!empty( $tablet_icon_size )){
    $scroll_top_button_tablet_css	.= 'width:'.$tablet_icon_size.'px;';
}
// mobile icon size
$mobile_icon_size  = cosmoswp_ifset($scroll_top_button_width['mobile']);
if (!empty( $mobile_icon_size )){
    $scroll_top_button_css	 .= 'width:'.$mobile_icon_size.'px;';
}

$scroll_top_icon_styling   = cosmoswp_get_theme_options('scroll-top-icon-styling');

$scroll_top_icon_styling   = json_decode($scroll_top_icon_styling,true);
//txt color
$scroll_top_icon_txt_color     = cosmoswp_ifset($scroll_top_icon_styling['normal-text-color']);
if ( $scroll_top_icon_txt_color ){
    $scroll_top_button_css .= 'color:'.$scroll_top_icon_txt_color.';';
}
//bg color
$scroll_top_icon_bg_color      = cosmoswp_ifset($scroll_top_icon_styling['normal-bg-color']);
if ( $scroll_top_icon_bg_color ){
    $scroll_top_button_css .= 'background:'.$scroll_top_icon_bg_color.';';
}
else{
    $scroll_top_button_css .= 'background:transparent;';
}
//border style
$scroll_top_icon_border_style      = cosmoswp_ifset($scroll_top_icon_styling['normal-border-style']);
if ( $scroll_top_icon_border_style ){
    $scroll_top_button_css .= 'border-style:'.$scroll_top_icon_border_style.';';
}

if($scroll_top_button_css !== 'none') {
    //border color
    $scroll_top_icon_border_color = cosmoswp_ifset($scroll_top_icon_styling['normal-border-color']);
    if ($scroll_top_icon_border_color) {
        $scroll_top_button_css .= 'border-color:' . $scroll_top_icon_border_color . ';';
    }
    //border width
    $scroll_top_icon_border_width = cosmoswp_cssbox_values_inline(isset($scroll_top_icon_styling['normal-border-width']), 'desktop');
    if (strpos($scroll_top_icon_border_width, 'px') !== false) {
        $scroll_top_button_css .= 'border-width:' . $scroll_top_icon_border_width . ';';
    }
}

//border radius
$scroll_top_icon_border_radius = cosmoswp_cssbox_values_inline($scroll_top_icon_styling['normal-border-radius'], 'desktop');
if (strpos($scroll_top_icon_border_radius, 'px') !== false) {
    $scroll_top_button_css .= 'border-radius:' . $scroll_top_icon_border_radius . ';';
}
//bx shadow
$scroll_top_icon_shadow_css = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($scroll_top_icon_styling['normal-box-shadow-css']), 'desktop');
if (strpos($scroll_top_icon_shadow_css, 'px') !== false) {
    $scroll_top_icon_shadow_color = cosmoswp_ifset($scroll_top_icon_styling['normal-box-shadow-color']);
    $scroll_top_icon_bx_shadow    = $scroll_top_icon_shadow_css . ' ' . $scroll_top_icon_shadow_color;
    $scroll_top_button_css        .= '-webkit-box-shadow:' . $scroll_top_icon_bx_shadow . ';';
    $scroll_top_button_css        .= '-moz-box-shadow:' . $scroll_top_icon_bx_shadow . ';';
    $scroll_top_button_css        .= 'box-shadow:' . $scroll_top_icon_bx_shadow . ';';
}

/* margin */
$scroll_top_icon_margin = cosmoswp_get_theme_options('scroll-top-icon-margin');
$scroll_top_icon_margin = json_decode($scroll_top_icon_margin,true);
// desktop margin
$scroll_top_icon_margin_desktop = cosmoswp_cssbox_values_inline($scroll_top_icon_margin,'desktop');
if (strpos($scroll_top_icon_margin_desktop, 'px') !== false){
    $scroll_top_button_desktop_css		.= 'margin:'.$scroll_top_icon_margin_desktop.';';
}
// tablet marign
$scroll_top_icon_margin_tablet  = cosmoswp_cssbox_values_inline($scroll_top_icon_margin,'tablet');
if (strpos($scroll_top_icon_margin_tablet, 'px') !== false){
    $scroll_top_button_tablet_css		.= 'margin:'.$scroll_top_icon_margin_tablet.';';
}
// mobile margin
$scroll_top_icon_margin_mobile  = cosmoswp_cssbox_values_inline($scroll_top_icon_margin,'mobile');
if (strpos($scroll_top_icon_margin_mobile, 'px') !== false){
    $scroll_top_button_css		.= 'margin:'.$scroll_top_icon_margin_mobile.';';
}


/* padding */
$scroll_top_icon_padding = cosmoswp_get_theme_options('scroll-top-icon-padding');
$scroll_top_icon_padding = json_decode($scroll_top_icon_padding,true);
// desktop padding
$scroll_top_icon_padding_desktop = cosmoswp_cssbox_values_inline($scroll_top_icon_padding,'desktop');
if (strpos($scroll_top_icon_padding_desktop, 'px') !== false){
    $scroll_top_button_desktop_css		.= 'padding:'.$scroll_top_icon_padding_desktop.';';
}
//tablet padding
$scroll_top_icon_padding_tablet  = cosmoswp_cssbox_values_inline($scroll_top_icon_padding,'tablet');
if (strpos($scroll_top_icon_padding_tablet, 'px') !== false){
    $scroll_top_button_tablet_css		.= 'padding:'.$scroll_top_icon_padding_tablet.';';
}
//mobile padding
$scroll_top_icon_padding_mobile  = cosmoswp_cssbox_values_inline($scroll_top_icon_padding,'mobile');
if (strpos($scroll_top_icon_padding_mobile, 'px') !== false){
    $scroll_top_button_css		.= 'padding:'.$scroll_top_icon_padding_mobile.';';
}

//typography
$scroll_top_icon_typography_options = cosmoswp_get_theme_options('scroll-top-icon-typography-options');
if ('custom' == $scroll_top_icon_typography_options && ('text' == $scoll_top_icon_options || 'both' == $scoll_top_icon_options)){
    $scroll_top_icon_typography         = cosmoswp_get_theme_options('scroll-top-icon-typography');
    $scroll_top_icon_typography         = json_decode($scroll_top_icon_typography,true);

    $scroll_top_icon_font_family     =  cosmoswp_font_family($scroll_top_icon_typography);
    if ( $scroll_top_icon_font_family ){
        $scroll_top_button_css .=  'font-family:'.$scroll_top_icon_font_family.';';
        $scroll_top_icon_font_weight     = cosmoswp_font_weight( $scroll_top_icon_typography );
        if ( $scroll_top_icon_font_weight ){
            $scroll_top_button_css .=  'font-weight:'.$scroll_top_icon_font_weight.';';
        }
        $scroll_top_icon_font_style      = cosmoswp_ifset($scroll_top_icon_typography['font-style']);
        if ( $scroll_top_icon_font_style ){
            $scroll_top_button_css .=  'font-style:'.$scroll_top_icon_font_style.';';
        }
        $scroll_top_icon_text_decoration = cosmoswp_ifset($scroll_top_icon_typography['text-decoration']);
        if ( $scroll_top_icon_text_decoration ){
            $scroll_top_button_css .=  'text-decoration:'.$scroll_top_icon_text_decoration.';';
        }
        $scroll_top_icon_text_transform  = cosmoswp_ifset($scroll_top_icon_typography['text-transform']);
        if ( $scroll_top_icon_text_transform ){
            $scroll_top_button_css .=  'text-transform:'.$scroll_top_icon_text_transform.';';
        }
        $scroll_top_icon_font_size       = cosmoswp_ifset($scroll_top_icon_typography['font-size']['mobile']);
        if ( $scroll_top_icon_font_size ){
            $scroll_top_button_css .=  'font-size:'.$scroll_top_icon_font_size.'px;';
        }
        $scroll_top_icon_line_height     = cosmoswp_ifset($scroll_top_icon_typography['line-height']['mobile']);
        if ( $scroll_top_icon_line_height ){
            $scroll_top_button_css .=  'line-height:'.$scroll_top_icon_line_height.'px;';
        }
        $scroll_top_icon_letter_spacing  = cosmoswp_ifset($scroll_top_icon_typography['letter-spacing']['mobile']);
        if ( $scroll_top_icon_letter_spacing ){
            $scroll_top_button_css .=  'letter-spacing:'.$scroll_top_icon_letter_spacing.'px;';
        }


        /* menu icon tablet css */
        $scroll_top_icon_tablet_font_size       = cosmoswp_ifset($scroll_top_icon_typography['font-size']['tablet']);
        if ( $scroll_top_icon_tablet_font_size ){
            $scroll_top_button_tablet_css .=  'font-size:'.$scroll_top_icon_tablet_font_size.'px;';
        }
        $scroll_top_icon_tablet_line_height     = cosmoswp_ifset($scroll_top_icon_typography['line-height']['tablet']);
        if ( $scroll_top_icon_tablet_line_height ){
            $scroll_top_button_tablet_css .=  'line-height:'.$scroll_top_icon_tablet_line_height.'px;';
        }
        $scroll_top_icon_tablet_letter_spacing  = cosmoswp_ifset($scroll_top_icon_typography['letter-spacing']['tablet']);
        if ( $scroll_top_icon_tablet_letter_spacing ){
            $scroll_top_button_tablet_css .=  'letter-spacing:'.$scroll_top_icon_tablet_letter_spacing.'px;';
        }

        /* menu icon desktop tablet css */
        $scroll_top_icon_desktop_font_size       = cosmoswp_ifset($scroll_top_icon_typography['font-size']['desktop']);
        if ( $scroll_top_icon_desktop_font_size ){
            $scroll_top_button_desktop_css .=  'font-size:'.$scroll_top_icon_desktop_font_size.'px;';
        }
        $scroll_top_icon_desktop_line_height     = cosmoswp_ifset($scroll_top_icon_typography['line-height']['desktop']);
        if ( $scroll_top_icon_desktop_line_height ){
            $scroll_top_button_desktop_css .=  'line-height:'.$scroll_top_icon_desktop_line_height.'px;';
        }
        $scroll_top_icon_desktop_letter_spacing  = cosmoswp_ifset($scroll_top_icon_typography['letter-spacing']['desktop']);
        if ( $scroll_top_icon_desktop_letter_spacing ){
            $scroll_top_button_desktop_css .=  'letter-spacing:'.$scroll_top_icon_desktop_letter_spacing.'px;';
        }
    }

}

/* mobile css */
if ( !empty( $scroll_top_button_css )){
    $scroll_top_icon_dynamic_css = '.cwp-scroll-to-top{
                    '.$scroll_top_button_css.'
                }';
    $theme_option_dynamic_css['all'] .= $scroll_top_icon_dynamic_css;
}
/* tablet css */
if ( !empty($scroll_top_button_tablet_css) ){
    $scroll_top_icon_tablet_dynamic_css = '.cwp-scroll-to-top{
                    '.$scroll_top_button_tablet_css.'
                }';
    $theme_option_dynamic_css['tablet'] .= $scroll_top_icon_tablet_dynamic_css;
}
/* desktop css */
if ( !empty($scroll_top_button_desktop_css) ){
    $scroll_top_icon_desktop_dynamic_css = '.cwp-scroll-to-top{
		            '   .$scroll_top_button_desktop_css.'
	            }';
    $theme_option_dynamic_css['desktop'] .= $scroll_top_icon_desktop_dynamic_css;
}


//txt color
$scroll_top_icon_hover_txt_color     = cosmoswp_ifset($scroll_top_icon_styling['hover-text-color']);
if ( $scroll_top_icon_hover_txt_color ){
    $scroll_top_icon_hover_css .= 'color:'.$scroll_top_icon_hover_txt_color.';';
}
//bg color
$scroll_top_icon_hover_bg_color      = cosmoswp_ifset($scroll_top_icon_styling['hover-bg-color']);
if ( $scroll_top_icon_hover_bg_color ){
    $scroll_top_icon_hover_css .= 'background:'.$scroll_top_icon_hover_bg_color.';';
}
//border style
$scroll_top_icon_hover_border_style      = cosmoswp_ifset($scroll_top_icon_styling['hover-border-style']);
if ( $scroll_top_icon_hover_border_style ){
    $scroll_top_icon_hover_css .= 'border-style:'.$scroll_top_icon_hover_border_style.';';
}
//border color
$scroll_top_icon_hover_border_color      = cosmoswp_ifset($scroll_top_icon_styling['hover-border-color']);
if ( $scroll_top_icon_hover_border_color ){
    $scroll_top_icon_hover_css .= 'border-color:'.$scroll_top_icon_hover_border_color.';';
}
//border width
$scroll_top_icon_hover_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($scroll_top_icon_styling['hover-border-width']),'desktop');
if (strpos($scroll_top_icon_hover_border_width, 'px') !== false) {
    $scroll_top_icon_hover_css .= 'border-width:'.$scroll_top_icon_hover_border_width.';';
}
//border radius
$scroll_top_icon_hover_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($scroll_top_icon_styling['hover-border-radius']),'desktop');
if (strpos($scroll_top_icon_hover_border_radius, 'px') !== false){
    $scroll_top_icon_hover_css		.= 'border-radius:'.$scroll_top_icon_hover_border_radius.';';
}
//bx shadow
$scroll_top_icon_hover_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($scroll_top_icon_styling['hover-box-shadow-css']),'desktop');
if (strpos($scroll_top_icon_hover_shadow_css, 'px') !== false) {
    $scroll_top_icon_hover_shadow_color  = cosmoswp_ifset($scroll_top_icon_styling['hover-box-shadow-color']);
    $scroll_top_icon_hover_bx_shadow     = $scroll_top_icon_hover_shadow_css.' '.$scroll_top_icon_hover_shadow_color;
    $scroll_top_icon_hover_css .=	'-webkit-box-shadow:'.$scroll_top_icon_hover_bx_shadow.';';
    $scroll_top_icon_hover_css .=	'-moz-box-shadow:'.$scroll_top_icon_hover_bx_shadow.';';
    $scroll_top_icon_hover_css .=	'box-shadow:'.$scroll_top_icon_hover_bx_shadow.';';
}
if ( !empty( $scroll_top_icon_hover_css )){
    $scroll_top_icon_search_hover_dynamic_css = '.cwp-scroll-to-top:hover{
		        '.$scroll_top_icon_hover_css.'
	        }';
    $theme_option_dynamic_css['all'] .= $scroll_top_icon_search_hover_dynamic_css;
}