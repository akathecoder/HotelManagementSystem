<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Header Dynamic CSS
 */
/* device type */
$local_dynamic_css['all']     = '';
$local_dynamic_css['tablet'] = '';
$local_dynamic_css['desktop'] = '';
/*Header General*/
$header_general_desktop_css   = '';
$header_general_tablet_css    = '';
$header_general_css           = '';
//margin
$header_general_margin         = cosmoswp_get_theme_options('header-general-margin');
$header_general_margin         = json_decode($header_general_margin,true);
// desktop margin 
$header_general_margin_desktop = cosmoswp_cssbox_values_inline($header_general_margin,'desktop');
if (strpos($header_general_margin_desktop, 'px') !== false){
	$header_general_desktop_css		.= 'margin:'.$header_general_margin_desktop.';';
}
// tablet marign 
$header_general_margin_tablet  = cosmoswp_cssbox_values_inline($header_general_margin,'tablet');
if (strpos($header_general_margin_tablet, 'px') !== false){
	$header_general_tablet_css		.= 'margin:'.$header_general_margin_tablet.';';
}
// mobile margin 
$header_general_margin_mobile  = cosmoswp_cssbox_values_inline($header_general_margin,'mobile');
if (strpos($header_general_margin_mobile, 'px') !== false){
	$header_general_css		.= 'margin:'.$header_general_margin_mobile.';';
}
//padding
$header_general_padding         = cosmoswp_get_theme_options('header-general-padding');
$header_general_padding         = json_decode($header_general_padding,true);
// desktop padding
$header_general_padding_desktop = cosmoswp_cssbox_values_inline($header_general_padding,'desktop');
if (strpos($header_general_padding_desktop, 'px') !== false){
	$header_general_desktop_css		.= 'padding:'.$header_general_padding_desktop.';';
}
//tablet padding
$header_general_padding_tablet  = cosmoswp_cssbox_values_inline($header_general_padding,'tablet');
if (strpos($header_general_padding_tablet, 'px') !== false){
	$header_general_tablet_css		.= 'padding:'.$header_general_padding_tablet.';';
}
//mobile padding
$header_general_padding_mobile  = cosmoswp_cssbox_values_inline($header_general_padding,'mobile');
if (strpos($header_general_padding_mobile, 'px') !== false){
	$header_general_css		.= 'padding:'.$header_general_padding_mobile.';';
}
//background
$header_general_bg            = cosmoswp_get_theme_options('header-general-background-options');
$header_general_bg            = json_decode($header_general_bg,true);
$header_general_overlay_css   = '';
//bg color
$header_general_bg_color      = cosmoswp_ifset($header_general_bg['background-color']);
if ( $header_general_bg_color ){
	$header_general_css		.= 'background-color:'.$header_general_bg_color.';';
}
//bg image
$header_general_bg_image      = cosmoswp_ifset($header_general_bg['background-image']);
if ( $header_general_bg_image ){
	$header_general_css		.= 'background-image:url('.esc_url( $header_general_bg_image ).');';
	//bg size
	$header_general_bg_size       = cosmoswp_ifset($header_general_bg['background-size']);
	if ( $header_general_bg_size ){
		$header_general_css		.= 'background-size:'.$header_general_bg_size.';';
		$header_general_css		.= '-webkit-background-size:'.$header_general_bg_size.';';
	}
	//bg position
	$header_general_bg_position   = cosmoswp_ifset($header_general_bg['background-position']);
	if ( $header_general_bg_position ){
		$header_general_css		.= 'background-position:'.str_replace('_',' ', $header_general_bg_position).';';
	}
	//bg repeat
	$header_general_bg_repeat     = cosmoswp_ifset($header_general_bg['background-repeat']);
	if ( $header_general_bg_repeat ){
		$header_general_css		.= 'background-repeat:'.$header_general_bg_repeat.';';
	}
	//bg repeat
	$header_general_bg_attachment = cosmoswp_ifset($header_general_bg['background-attachment']);
	if ( $header_general_bg_attachment ){
		$header_general_css		.= 'background-attachment:'.$header_general_bg_attachment.';';	
	}
    //bg overlay color
    $header_general_enable_overlay   = cosmoswp_ifset($header_general_bg['enable-overlay']);
    $header_general_bg_overlay_color = cosmoswp_ifset($header_general_bg['background-overlay-color']);
    if ( $header_general_bg_overlay_color && $header_general_enable_overlay){
        $header_general_overlay_css		.= 'background:'.$header_general_bg_overlay_color.';';
    }
}
//border options
$header_general_border           = cosmoswp_get_theme_options('header-general-border-styling');
$header_general_border           = json_decode($header_general_border,true);
//border shadow
$header_general_bx_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($header_general_border['box-shadow-css']),'desktop');
if (strpos($header_general_bx_shadow_css, 'px') !== false) {
	$header_general_bxshadow_color   = cosmoswp_ifset($header_general_border['box-shadow-color']);
	$header_general_bx_shadow        = $header_general_bx_shadow_css.' '.$header_general_bxshadow_color;
	$header_general_css .=	'-webkit-box-shadow:'.$header_general_bx_shadow.';';
	$header_general_css .=	'-moz-box-shadow:'.$header_general_bx_shadow.';';
	$header_general_css .=	'box-shadow:'.$header_general_bx_shadow.';';
}
//border style
$header_general_border_style     = cosmoswp_ifset($header_general_border['border-style']);
if ( 'none' !== $header_general_border_style ){

	$header_general_css .= 'border-style:'.$header_general_border_style.';';
	//border width
	$header_general_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($header_general_border['border-width']),'desktop');
	if (strpos($header_general_border_width, 'px') !== false) {
		$header_general_css .= 'border-width:'.$header_general_border_width.';';
	}
	//border color
	$header_general_border_color     = cosmoswp_ifset($header_general_border['border-color']);
	if ($header_general_border_color){
		$header_general_css .= 'border-color:'.$header_general_border_color.';';
	}
}
//border radius
$header_general_border_radius     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($header_general_border['border-radius']),'desktop');
if (strpos($header_general_border_radius, 'px') !== false) {
	$header_general_css .= 'border-radius:'.$header_general_border_radius.';';
}
/* headaer general overlay css */
if ( !empty($header_general_overlay_css) ){
    $header_general_overlay_dynamic_css = '.cwp-dynamic-header.cwp-enable-overlay:after{
		'.$header_general_overlay_css.'
	}';
    $local_dynamic_css['all'] .= $header_general_overlay_dynamic_css;
}
if ( !empty($header_general_css) ){
	$header_general_dynamic_css = '.cwp-dynamic-header{
		'.$header_general_css.'
	}';
	$local_dynamic_css['all'] .= $header_general_dynamic_css;
}

$vertical_header_css = '';
$vertical_header_width  = cosmoswp_get_theme_options('vertical-header-width');
if ( $vertical_header_width ){
	$vertical_header_css .= 'width: '.$vertical_header_width.'px;';
}
if ( $header_general_bg_color ){
	$vertical_header_css .= 'background-color: '.$header_general_bg_color.';';
}
if (strpos($header_general_margin_desktop, 'px') !== false){
	$vertical_header_css		.= 'margin:'.$header_general_margin_desktop.';';
}
if (strpos($header_general_padding_desktop, 'px') !== false){
	$vertical_header_css		.= 'padding:'.$header_general_padding_desktop.';';
}
if ( !empty($vertical_header_css) ){
	$vertical_header_dynamic_css = '.cwp-vertical-header .cwp-dynamic-header {
		'.$vertical_header_css.'
	}';

	$local_dynamic_css['desktop'] .= $vertical_header_dynamic_css;
}
if ( !empty($vertical_header_width) ){
	$left_push_vertical_header_dynamic_css = '.cwp-vertical-header.cwp-show-menu-sidebar .cwp-left-push .cwp-vertical-header-left {
		left:'.$vertical_header_width.'px;
	}';

	$local_dynamic_css['desktop'] .= $left_push_vertical_header_dynamic_css;

	$left_push_vertical_right_header = '.cwp-vertical-header.cwp-show-menu-sidebar .cwp-left-push .cwp-vertical-header-right {
		right:-'.$vertical_header_width.'px;
	}';

	$local_dynamic_css['desktop'] .= $left_push_vertical_right_header;

	$right_push_vertical_header_dynamic_css = '.cwp-vertical-header.cwp-show-menu-sidebar .cwp-right-push .cwp-vertical-header-right {
		right:'.$vertical_header_width.'px;
	}';

	$local_dynamic_css['desktop'] .= $right_push_vertical_header_dynamic_css;

	$right_push_vertical_left_header = '.cwp-vertical-header.cwp-show-menu-sidebar .cwp-right-push .cwp-vertical-header-left {
		left:-'.$vertical_header_width.'px;
	}';

	$local_dynamic_css['desktop'] .= $right_push_vertical_left_header;
}

$vertical_header_position_left_css = '';
if ( $vertical_header_width ){
	$vertical_header_position_left_css .= 'margin-left: '.$vertical_header_width.'px;';
	$vertical_header_position_left_css .= 'max-width: calc(100% - '.$vertical_header_width.'px);';
}
if ( !empty($vertical_header_position_left_css) ){
	$vertical_header_position_left_dynamic_css = '
	.cwp-vertical-header .cwp-vertical-body-content-left .cwp-body-main-wrap,
	.cwp-vertical-header .cwp-vertical-body-content-left .cwp-dynamic-footer {
		'.$vertical_header_position_left_css.'
	}';
	$local_dynamic_css['desktop'] .= $vertical_header_position_left_dynamic_css;
}
$vertical_header_position_right_css = '';
if ( $vertical_header_width ){
	$vertical_header_position_right_css .= 'margin-right: '.$vertical_header_width.'px;';
	$vertical_header_position_right_css .= 'max-width: calc(100% - '.$vertical_header_width.'px);';
}
if ( !empty($vertical_header_position_right_css) ){
	$vertical_header_position_right_dynamic_css = '
	.cwp-vertical-header .cwp-vertical-body-content-right .cwp-body-main-wrap,
	.cwp-vertical-header .cwp-vertical-body-content-right .cwp-dynamic-footer {
		'.$vertical_header_position_right_css.'
	}';
	$local_dynamic_css['desktop'] .= $vertical_header_position_right_dynamic_css;
}

$sticky_header_css = '';
$sticky_main_header_text_css = '';
$sticky_header_bg_color  = cosmoswp_get_theme_options('sticky-header-bg-color');
if ($sticky_header_bg_color){
	$sticky_header_css .= 'background: '.$sticky_header_bg_color.';';
}
if ( !empty($sticky_header_css) ){
	$sticky_header_dynamic_css = '
	.cwp-dynamic-header.cwp-scroll-down-sticky,
	.cwp-dynamic-header.cwp-scroll-up-sticky,
	.cwp-dynamic-header.cwp-header-sticky.sticky-color{
		'.$sticky_header_css.'
	}';
	$local_dynamic_css['all'] .= $sticky_header_dynamic_css;
}

$sticky_main_header_text_css = '';
// sticky main header text color
$sticky_main_header_text_color  = cosmoswp_get_theme_options('sticky-main-header-text-color');
if ( !empty($sticky_main_header_text_color) ){
    $sticky_main_header_text_dynamic_css = '.sticky-color .cwp-main-header *,
    .sticky-color .cwp-main-header .site-description{
    color:'.$sticky_main_header_text_color.';
    }';
    $local_dynamic_css['all'] .= $sticky_main_header_text_dynamic_css;
}

// sticky main header link color
$sticky_main_header_link_color = '';
$sticky_main_header_link_color  = cosmoswp_get_theme_options('sticky-main-header-link-color');

if ( !empty($sticky_main_header_link_color) ){
    $sticky_main_header_link_dynamic_css = '.sticky-color .cwp-main-header a:not(.btn), .sticky-color .cwp-main-header .site-title a{
    color:'.$sticky_main_header_link_color.';
}';
    $local_dynamic_css['all'] .= $sticky_main_header_link_dynamic_css;
}

// sticky main header link hover color
$sticky_main_header_link_hover_color = '';
$sticky_main_header_link_hover_color  = cosmoswp_get_theme_options('sticky-main-header-link-color');
if ( !empty($sticky_main_header_link_hover_color) ){
    $sticky_main_header_link_hover_dynamic_css = '.sticky-color .cwp-main-header a:not(.btn):hover,.sticky-color .cwp-main-header .site-title a:hover {
    color:'.$sticky_main_header_link_hover_color.';
}';
    $local_dynamic_css['all'] .= $sticky_main_header_link_hover_dynamic_css;
}

$sticky_main_header_menu_css = '';
$sticky_main_header_menu_color   = cosmoswp_get_theme_options('sticky-main-header-menu-color-options');
$sticky_main_header_menu_color   = json_decode($sticky_main_header_menu_color,true);
//txt color
$sth_text_color     = cosmoswp_ifset($sticky_main_header_menu_color['normal-text-color']);
if ( $sth_text_color ){
    $sticky_main_header_menu_css .= 'color:'.$sth_text_color.';';
}
//bg color
$sth_bg_color      = cosmoswp_ifset($sticky_main_header_menu_color['normal-bg-color']);
if ( $sth_bg_color ){
    $sticky_main_header_menu_css .= 'background-color:'.$sth_bg_color.';';
}
//border color
$sth_border_color      = cosmoswp_ifset($sticky_main_header_menu_color['normal-border-color']);
if ( $sth_border_color ){
    $sticky_main_header_menu_css .= 'border-color:'.$sth_border_color.';';
}

/* sticky main header menu normal css*/
if ( !empty($sticky_main_header_menu_css) ){
    $sticky_top_header_menu_dynamic_css = '.sticky-color .cwp-main-header .cwp-primary-menu li a,
.sticky-color .cwp-main-header ul li a{
'.$sticky_main_header_menu_css.'
}';
    $local_dynamic_css['all'] .= $sticky_top_header_menu_dynamic_css;
}

$sticky_main_header_menu_hover_css = '';
$sticky_main_header_menu_color   = cosmoswp_get_theme_options('sticky-main-header-menu-color-options');
$sticky_main_header_menu_color   = json_decode($sticky_main_header_menu_color,true);
//txt color
$sth_text_hover_color     = cosmoswp_ifset($sticky_main_header_menu_color['hover-text-color']);
if ( $sth_text_hover_color ){
    $sticky_main_header_menu_hover_css .= 'color:'.$sth_text_hover_color.';';
}
//bg color
$sth_bg_hover_color      = cosmoswp_ifset($sticky_main_header_menu_color['hover-bg-color']);
if ( $sth_bg_hover_color ){
    $sticky_main_header_menu_hover_css .= 'background-color:'.$sth_bg_hover_color.';';
}
//border color
$sth_border_hover_color      = cosmoswp_ifset($sticky_main_header_menu_color['hover-border-color']);
if ( $sth_border_hover_color ){
    $sticky_main_header_menu_hover_css .= 'border-color:'.$sth_border_hover_color.';';
}

/* sticky main header menu hover css*/
if ( !empty($sticky_main_header_menu_hover_css) ){
    $sticky_main_header_menu_hover_dynamic_css = '.sticky-color .cwp-main-header .cwp-primary-menu li a:hover,
.sticky-color .cwp-main-header ul li a:hover,
.sticky-color .cwp-main-header .cwp-primary-menu li a:focus,
.sticky-color .cwp-main-header ul li a:focus,
.sticky-color .cwp-main-header ul li.current_page_item a{
'.$sticky_main_header_menu_hover_css.'
}';
    $local_dynamic_css['all'] .= $sticky_main_header_menu_hover_dynamic_css;
}


$sticky_top_header_text_css = '';
// sticky top header text color
$sticky_top_header_text_color  = cosmoswp_get_theme_options('sticky-top-header-text-color');
if ( !empty($sticky_top_header_text_color) ){
    $sticky_top_header_text_dynamic_css = '.sticky-color .cwp-top-header *, .sticky-color .cwp-top-header .site-description{
color:'.$sticky_top_header_text_color.';
}';
    $local_dynamic_css['all'] .= $sticky_top_header_text_dynamic_css;
}

// sticky top header link color
$sticky_top_header_link_color = '';
$sticky_top_header_link_color  = cosmoswp_get_theme_options('sticky-top-header-link-color');

if ( !empty($sticky_top_header_link_color) ){
    $sticky_top_header_link_dynamic_css = '.sticky-color .cwp-top-header a, .sticky-color .cwp-top-header a .site-title{
color:'.$sticky_top_header_link_color.';
}';
    $local_dynamic_css['all'] .= $sticky_top_header_link_dynamic_css;
}

// sticky top header link hover color
$sticky_top_header_link_hover_color = '';
$sticky_top_header_link_hover_color  = cosmoswp_get_theme_options('sticky-top-header-link-color');
if ( !empty($sticky_top_header_link_hover_color) ){
    $sticky_top_header_link_hover_dynamic_css = '.sticky-color .cwp-top-header a:hover, .sticky-color .cwp-top-header a:hover .site-title{
color:'.$sticky_top_header_link_hover_color.';
}';
    $local_dynamic_css['all'] .= $sticky_top_header_link_hover_dynamic_css;
}

$sticky_top_header_menu_css = '';
$sticky_top_header_menu_color   = cosmoswp_get_theme_options('sticky-top-header-menu-color-options');
$sticky_top_header_menu_color   = json_decode($sticky_top_header_menu_color,true);
//txt color
$sth_text_color     = cosmoswp_ifset($sticky_top_header_menu_color['normal-text-color']);
if ( $sth_text_color ){
    $sticky_top_header_menu_css .= 'color:'.$sth_text_color.';';
}
//bg color
$sth_bg_color      = cosmoswp_ifset($sticky_top_header_menu_color['normal-bg-color']);
if ( $sth_bg_color ){
    $sticky_top_header_menu_css .= 'background-color:'.$sth_bg_color.';';
}
//border color
$sth_border_color      = cosmoswp_ifset($sticky_top_header_menu_color['normal-border-color']);
if ( $sth_border_color ){
    $sticky_top_header_menu_css .= 'border-color:'.$sth_border_color.';';
}

/* sticky top header menu normal css*/
if ( !empty($sticky_top_header_menu_css) ){
    $sticky_top_header_menu_dynamic_css = '.sticky-color .cwp-top-header .cwp-primary-menu li a,
.sticky-color .cwp-top-header ul li a{
'.$sticky_top_header_menu_css.'
}';
    $local_dynamic_css['all'] .= $sticky_top_header_menu_dynamic_css;
}

$sticky_top_header_menu_hover_css = '';
$sticky_top_header_menu_color   = cosmoswp_get_theme_options('sticky-top-header-menu-color-options');
$sticky_top_header_menu_color   = json_decode($sticky_top_header_menu_color,true);
//txt color
$sth_text_hover_color     = cosmoswp_ifset($sticky_top_header_menu_color['hover-text-color']);
if ( $sth_text_hover_color ){
    $sticky_top_header_menu_hover_css .= 'color:'.$sth_text_hover_color.';';
}
//bg color
$sth_bg_hover_color      = cosmoswp_ifset($sticky_top_header_menu_color['hover-bg-color']);
if ( $sth_bg_hover_color ){
    $sticky_top_header_menu_hover_css .= 'background-color:'.$sth_bg_hover_color.';';
}
//border color
$sth_border_hover_color      = cosmoswp_ifset($sticky_top_header_menu_color['hover-border-color']);
if ( $sth_border_hover_color ){
    $sticky_top_header_menu_hover_css .= 'border-color:'.$sth_border_hover_color.';';
}

/* sticky top header menu hover css*/
if ( !empty($sticky_top_header_menu_hover_css) ){
    $sticky_top_header_menu_hover_dynamic_css = '.sticky-color .cwp-top-header .cwp-primary-menu li a:hover,
.sticky-color .cwp-top-header ul li a:hover,
.sticky-color .cwp-top-header .cwp-primary-menu li a:focus,
.sticky-color .cwp-top-header ul li a:focus{
'.$sticky_top_header_menu_hover_css.'
}';
    $local_dynamic_css['all'] .= $sticky_top_header_menu_hover_dynamic_css;
}


$sticky_bottom_header_text_css = '';
// sticky bottom header text color
$sticky_bottom_header_text_color  = cosmoswp_get_theme_options('sticky-bottom-header-text-color');
if ( !empty($sticky_bottom_header_text_color) ){
    $sticky_bottom_header_text_dynamic_css = '.sticky-color .cwp-bottom-header *, .sticky-color .botttom-header .site-description{
color:'.$sticky_bottom_header_text_color.';
}';
    $local_dynamic_css['all'] .= $sticky_bottom_header_text_dynamic_css;
}

// sticky bottom header link color
$sticky_bottom_header_link_color = '';
$sticky_bottom_header_link_color  = cosmoswp_get_theme_options('sticky-bottom-header-link-color');

if ( !empty($sticky_bottom_header_link_color) ){
    $sticky_bottom_header_link_dynamic_css = '.sticky-color .cwp-bottom-header a, .sticky-color .cwp-bottom-header a .site-title{
color:'.$sticky_bottom_header_link_color.';
}';
    $local_dynamic_css['all'] .= $sticky_bottom_header_link_dynamic_css;
}

// sticky bottom header link hover color
$sticky_bottom_header_link_hover_color = '';
$sticky_bottom_header_link_hover_color  = cosmoswp_get_theme_options('sticky-bottom-header-link-color');
if ( !empty($sticky_bottom_header_link_hover_color) ){
    $sticky_bottom_header_link_hover_dynamic_css = '.sticky-color .cwp-bottom-header a:hover,.sticky-color .cwp-bottom-header a:hover .site-title{
color:'.$sticky_bottom_header_link_hover_color.';
}';
    $local_dynamic_css['all'] .= $sticky_bottom_header_link_hover_dynamic_css;
}

$sticky_bottom_header_menu_css = '';
$sticky_bottom_header_menu_color   = cosmoswp_get_theme_options('sticky-bottom-header-menu-color-options');
$sticky_bottom_header_menu_color   = json_decode($sticky_bottom_header_menu_color,true);
//txt color
$sth_text_color     = cosmoswp_ifset($sticky_bottom_header_menu_color['normal-text-color']);
if ( $sth_text_color ){
    $sticky_bottom_header_menu_css .= 'color:'.$sth_text_color.';';
}
//bg color
$sth_bg_color      = cosmoswp_ifset($sticky_bottom_header_menu_color['normal-bg-color']);
if ( $sth_bg_color ){
    $sticky_bottom_header_menu_css .= 'background-color:'.$sth_bg_color.';';
}
//border color
$sth_border_color      = cosmoswp_ifset($sticky_bottom_header_menu_color['normal-border-color']);
if ( $sth_border_color ){
    $sticky_bottom_header_menu_css .= 'border-color:'.$sth_border_color.';';
}

/* sticky bottom header menu normal css*/
if ( !empty($sticky_bottom_header_menu_css) ){
    $sticky_bottom_header_menu_dynamic_css = '.sticky-color .cwp-bottom-header .cwp-primary-menu li a,
.sticky-color .cwp-bottom-header ul li a{
'.$sticky_bottom_header_menu_css.'
}';
    $local_dynamic_css['all'] .= $sticky_bottom_header_menu_dynamic_css;
}

$sticky_bottom_header_menu_hover_css = '';
$sticky_bottom_header_menu_color   = cosmoswp_get_theme_options('sticky-bottom-header-menu-color-options');
$sticky_bottom_header_menu_color   = json_decode($sticky_bottom_header_menu_color,true);
//txt color
$sth_text_hover_color     = cosmoswp_ifset($sticky_bottom_header_menu_color['hover-text-color']);
if ( $sth_text_hover_color ){
    $sticky_bottom_header_menu_hover_css .= 'color:'.$sth_text_hover_color.';';
}
//bg color
$sth_bg_hover_color      = cosmoswp_ifset($sticky_bottom_header_menu_color['hover-bg-color']);
if ( $sth_bg_hover_color ){
    $sticky_bottom_header_menu_hover_css .= 'background-color:'.$sth_bg_hover_color.';';
}
//border color
$sth_border_hover_color      = cosmoswp_ifset($sticky_bottom_header_menu_color['hover-border-color']);
if ( $sth_border_hover_color ){
    $sticky_bottom_header_menu_hover_css .= 'border-color:'.$sth_border_hover_color.';';
}

/* sticky bottom header menu hover css*/
if ( !empty($sticky_bottom_header_menu_hover_css) ){
    $sticky_bottom_header_menu_hover_dynamic_css = '.sticky-color .cwp-bottom-header .cwp-primary-menu li a:hover,
.sticky-color .cwp-bottom-header ul li a:hover,
.sticky-color .cwp-bottom-header .cwp-primary-menu li a:focus,
.sticky-color .cwp-bottom-header ul li a:focus{
'.$sticky_bottom_header_menu_hover_css.'
}';
    $local_dynamic_css['all'] .= $sticky_bottom_header_menu_hover_dynamic_css;
}



// desktop css 
if ( !empty($header_general_desktop_css) ){
	$header_general_desktop_dynamic_css = '.cwp-dynamic-header{
		'.$header_general_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $header_general_desktop_dynamic_css;
}

// tablet css 
if ( !empty($header_general_tablet_css) ){
	$header_general_tablet_dynamic_css = '.cwp-dynamic-header{
		'.$header_general_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $header_general_tablet_dynamic_css;
}

/*Header top*/
$header_top_css         = '';
$header_top_tablet_css  = '';
$header_top_desktop_css = '';

$header_top_height_option  = cosmoswp_get_theme_options('header-top-height-option');
if ('custom' == $header_top_height_option ){
	$header_top_height      = cosmoswp_get_theme_options('top-header-height');
	$header_top_height      = json_decode($header_top_height,true);
	$header_top_desktop_css .= 'height:'.$header_top_height['desktop'].'px;';
	$header_top_tablet_css  .= 'height:'.$header_top_height['tablet'].'px;';
	$header_top_css         .= 'height:'.$header_top_height['mobile'].'px;';
}
else{
	$header_top_desktop_css .= 'height:auto;';
	$header_top_tablet_css  .= 'height:auto;';
	$header_top_css         .= 'height:auto;';
}
/* margin */
$header_top_margin         		= cosmoswp_get_theme_options('top-header-margin');
$header_top_margin          	= json_decode($header_top_margin,true);

// desktop margin 
$header_top_margin_desktop = cosmoswp_cssbox_values_inline($header_top_margin,'desktop');
if (strpos($header_top_margin_desktop, 'px') !== false){
	$header_top_desktop_css		.= 'margin:'.$header_top_margin_desktop.';';
}
// tablet marign 
$header_top_margin_tablet  = cosmoswp_cssbox_values_inline($header_top_margin,'tablet');
if (strpos($header_top_margin_tablet, 'px') !== false){
	$header_top_tablet_css		.= 'margin:'.$header_top_margin_tablet.';';
}
// mobile margin 
$header_top_margin_mobile  = cosmoswp_cssbox_values_inline($header_top_margin,'mobile');
if (strpos($header_top_margin_mobile, 'px') !== false){
	$header_top_css		.= 'margin:'.$header_top_margin_mobile.';';
}

/* padding */
$header_top_padding          	= cosmoswp_get_theme_options('top-header-padding');
$header_top_padding          	= json_decode($header_top_padding,true);

// desktop padding
$header_top_padding_desktop = cosmoswp_cssbox_values_inline($header_top_padding,'desktop');
if (strpos($header_top_padding_desktop, 'px') !== false){
	$header_top_desktop_css		.= 'padding:'.$header_top_padding_desktop.';';
}
//tablet padding
$header_top_padding_tablet  = cosmoswp_cssbox_values_inline($header_top_padding,'tablet');
if (strpos($header_top_padding_tablet, 'px') !== false){
	$header_top_tablet_css		.= 'padding:'.$header_top_padding_tablet.';';
}
//mobile padding
$header_top_padding_mobile  = cosmoswp_cssbox_values_inline($header_top_padding,'mobile');
if (strpos($header_top_padding_mobile, 'px') !== false){
	$header_top_css		.= 'padding:'.$header_top_padding_mobile.';';
}
//background options
$header_top_bg_options          = cosmoswp_get_theme_options('header-top-bg-options');
if ( 'custom' == $header_top_bg_options ){

	$header_top_bg            = cosmoswp_get_theme_options('header-top-background-options');
	$header_top_bg            = json_decode($header_top_bg,true);
    $header_top_overlay_css  = '';
	//bg color
	$header_top_bg_color      = cosmoswp_ifset($header_top_bg['background-color']);
	if ( $header_top_bg_color ){
		$header_top_css		.= 'background-color:'.$header_top_bg_color.';';
	}
	//bg image
	$header_top_bg_image      = cosmoswp_ifset($header_top_bg['background-image']);
	if ( $header_top_bg_image ){
		$header_top_css		.= 'background-image:url('.esc_url( $header_top_bg_image ).');';
		//bg size
		$header_top_bg_size       = cosmoswp_ifset($header_top_bg['background-size']);
		if ( $header_top_bg_size ){
			$header_top_css		.= 'background-size:'.$header_top_bg_size.';';
			$header_top_css		.= '-webkit-background-size:'.$header_top_bg_size.';';
		}
		//bg position
		$header_top_bg_position   = cosmoswp_ifset($header_top_bg['background-position']);
		if ( $header_top_bg_position ){
			$header_top_css		.= 'background-position:'.str_replace('_',' ', $header_top_bg_position).';';
		}
		//bg repeat
		$header_top_bg_repeat     = cosmoswp_ifset($header_top_bg['background-repeat']);
		if ( $header_top_bg_repeat ){
			$header_top_css		.= 'background-repeat:'.$header_top_bg_repeat.';';
		}
		//bg attachment
		$header_top_bg_attachment = cosmoswp_ifset($header_top_bg['background-attachment']);
		if ( $header_top_bg_attachment ){
			$header_top_css		.= 'background-attachment:'.$header_top_bg_attachment.';';	
		}

        //bg overlay color
        $header_top_enable_overlay   = cosmoswp_ifset($header_top_bg['enable-overlay']);
        $header_top_bg_overlay_color = cosmoswp_ifset($header_top_bg['background-overlay-color']);
        if ( $header_top_bg_overlay_color && $header_top_enable_overlay){
            $header_top_overlay_css		.= 'background:'.$header_top_bg_overlay_color.';';
        }
	}
}
//border options
$header_top_border           = cosmoswp_get_theme_options('header-top-border-styling');
$header_top_border           = json_decode($header_top_border,true);
//box shadow
$header_top_bx_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($header_top_border['box-shadow-css']),'desktop');
if (strpos($header_top_bx_shadow_css, 'px') !== false) {
	$header_top_bxshadow_color   = cosmoswp_ifset($header_top_border['box-shadow-color']);
	$header_top_bx_shadow        = $header_top_bx_shadow_css.' '.$header_top_bxshadow_color;
	$header_top_css .=	'-webkit-box-shadow:'.$header_top_bx_shadow.';';
	$header_top_css .=	'-moz-box-shadow:'.$header_top_bx_shadow.';';
	$header_top_css .=	'box-shadow:'.$header_top_bx_shadow.';';
}
//border style
$header_top_border_style     = cosmoswp_ifset($header_top_border['border-style']);
if ( 'none' !== $header_top_border_style ){

	$header_top_css .= 'border-style:'.$header_top_border_style.';';
	//border width
	$header_top_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($header_top_border['border-width']),'desktop');
	if (strpos($header_top_border_width, 'px') !== false) {
		$header_top_css .= 'border-width:'.$header_top_border_width.';';
	}
	//border color
	$header_top_border_color     = cosmoswp_ifset($header_top_border['border-color']);
	if ($header_top_border_color){
		$header_top_css .= 'border-color:'.$header_top_border_color.';';
	}
}
//border radius
$header_top_border_tl_radius = cosmoswp_ifset($header_top_border['border-radius']['desktop']['top']);
if ( $header_top_border_tl_radius ){
	$header_top_css .= 'border-top-left-radius:'.$header_top_border_tl_radius.'px;';
}
$header_top_border_tr_radius = cosmoswp_ifset($header_top_border['border-radius']['desktop']['right']);
if ( $header_top_border_tr_radius ){
	$header_top_css .= 'border-top-right-radius:'.$header_top_border_tr_radius.'px;';
}
$header_top_border_br_radius = cosmoswp_ifset($header_top_border['border-radius']['desktop']['bottom']);
if ( $header_top_border_br_radius ){
	$header_top_css .= 'border-bottom-right-radius:'.$header_top_border_br_radius.'px;';
}
$header_top_border_bl_radius = cosmoswp_ifset($header_top_border['border-radius']['desktop']['left']);
if ( $header_top_border_bl_radius ){
	$header_top_css .= 'border-bottom-left-radius:'.$header_top_border_br_radius.'px;';
}
//concated top header css in all css

if ( !empty($header_top_overlay_css) ){
    $header_top_overlay_dynamic_css = '.cwp-dynamic-header .cwp-top-header.cwp-enable-overlay::after{
		'.$header_top_overlay_css.'
	}';
    $local_dynamic_css['all'] .= $header_top_overlay_dynamic_css;
}

if ( !empty($header_top_css) ){
	$header_top_dynamic_css = '.cwp-top-header{
		'.$header_top_css.'
	}';
	$local_dynamic_css['all'] .= $header_top_dynamic_css;
}

// tablet css 
if ( !empty($header_top_tablet_css) ){
	$header_top_tablet_dynamic_css = '.cwp-top-header{
		'.$header_top_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $header_top_tablet_dynamic_css;
}

// desktop css 
if ( !empty($header_top_desktop_css) ){
	$header_top_desktop_dynamic_css = '.cwp-top-header{
		'.$header_top_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $header_top_desktop_dynamic_css;
}
?><?php 
/*Header main*/
$header_main_css         = '';
$header_main_tablet_css  = '';
$header_main_desktop_css = '';
//height
$header_main_height_option  = cosmoswp_get_theme_options('header-main-height-option');
if ('custom' == $header_main_height_option ){
	$header_main_height      = cosmoswp_get_theme_options('header-main-height');
	$header_main_height      = json_decode($header_main_height,true);
	$header_main_desktop_css .= 'height:'.$header_main_height['desktop'].'px;';
	$header_main_tablet_css  .= 'height:'.$header_main_height['tablet'].'px;';
	$header_main_css         .= 'height:'.$header_main_height['mobile'].'px;';
}
else{
	$header_main_desktop_css .= 'height:auto;';
	$header_main_tablet_css  .= 'height:auto;';
	$header_main_css         .= 'height:auto;';
}
//margin
$header_main_margin = cosmoswp_get_theme_options('header-main-margin');
$header_main_margin = json_decode($header_main_margin,true);

// desktop margin 
$header_main_margin_desktop = cosmoswp_cssbox_values_inline($header_main_margin,'desktop');
if (strpos($header_main_margin_desktop, 'px') !== false){
	$header_main_desktop_css		.= 'margin:'.$header_main_margin_desktop.';';
}
// tablet marign 
$header_main_margin_tablet  = cosmoswp_cssbox_values_inline($header_main_margin,'tablet');
if (strpos($header_main_margin_tablet, 'px') !== false){
	$header_main_tablet_css		.= 'margin:'.$header_main_margin_tablet.';';
}
// mobile margin 
$header_main_margin_mobile  = cosmoswp_cssbox_values_inline($header_main_margin,'mobile');
if (strpos($header_main_margin_mobile, 'px') !== false){
	$header_main_css		.= 'margin:'.$header_main_margin_mobile.';';
}


//padding
$header_main_padding = cosmoswp_get_theme_options('header-main-padding');
$header_main_padding = json_decode($header_main_padding,true);

// desktop padding
$header_main_padding_desktop = cosmoswp_cssbox_values_inline($header_main_padding,'desktop');
if (strpos($header_main_padding_desktop, 'px') !== false){
	$header_main_desktop_css		.= 'padding:'.$header_main_padding_desktop.';';
}
//tablet padding
$header_main_padding_tablet  = cosmoswp_cssbox_values_inline($header_main_padding,'tablet');
if (strpos($header_main_padding_tablet, 'px') !== false){
	$header_main_tablet_css		.= 'padding:'.$header_main_padding_tablet.';';
}
//mobile padding
$header_main_padding_mobile  = cosmoswp_cssbox_values_inline($header_main_padding,'mobile');
if (strpos($header_main_padding_mobile, 'px') !== false){
	$header_main_css		.= 'padding:'.$header_main_padding_mobile.';';
}
//background options
$header_main_bg_options          = cosmoswp_get_theme_options('header-main-bg-options');
if ( 'custom' == $header_main_bg_options ){

	//background
	$header_main_bg            = cosmoswp_get_theme_options('header-main-background-options');
	$header_main_bg            = json_decode($header_main_bg,true);
    $header_main_overlay_css   = '';
	//bg color
	$header_main_bg_color      = cosmoswp_ifset($header_main_bg['background-color']);
	if ( $header_main_bg_color ){
		$header_main_css		.= 'background-color:'.$header_main_bg_color.';';
	}
	//bg image
	$header_main_bg_image      = cosmoswp_ifset($header_main_bg['background-image']);
	if ( $header_main_bg_image ){
		$header_main_css		.= 'background-image:url('.esc_url( $header_main_bg_image ).');';
		//bg size
		$header_main_bg_size       = cosmoswp_ifset($header_main_bg['background-size']);
		if ( $header_main_bg_size ){
			$header_main_css		.= 'background-size:'.$header_main_bg_size.';';
			$header_main_css		.= '-webkit-background-size:'.$header_main_bg_size.';';
		}
		//bg position
		$header_main_bg_position   = cosmoswp_ifset($header_main_bg['background-position']);
		if ( $header_main_bg_position ){
			$header_main_css		.= 'background-position:'.str_replace('_',' ', $header_main_bg_position).';';

        }
		//bg repeat
		$header_main_bg_repeat     = cosmoswp_ifset($header_main_bg['background-repeat']);
		if ( $header_main_bg_repeat ){
			$header_main_css		.= 'background-repeat:'.$header_main_bg_repeat.';';
		}
		//bg attachment
		$header_main_bg_attachment = cosmoswp_ifset($header_main_bg['background-attachment']);
		if ( $header_main_bg_attachment ){
			$header_main_css		.= 'background-attachment:'.$header_main_bg_attachment.';';	
		}

        //bg overlay color
        $header_main_enable_overlay   = cosmoswp_ifset($header_main_bg['enable-overlay']);
        $header_main_bg_overlay_color = cosmoswp_ifset($header_main_bg['background-overlay-color']);
        if ( $header_main_bg_overlay_color && $header_main_enable_overlay){
            $header_main_overlay_css		.= 'background:'.$header_main_bg_overlay_color.';';
        }
	}
}
//border options
$header_main_border           = cosmoswp_get_theme_options('header-main-border-styling');
$header_main_border           = json_decode($header_main_border,true);
//box shadow
$header_main_bx_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($header_main_border['box-shadow-css']),'desktop');
if (strpos($header_main_bx_shadow_css, 'px') !== false) {
	$header_main_bxshadow_color   = cosmoswp_ifset($header_main_border['box-shadow-color']);
	$header_main_bx_shadow        = $header_main_bx_shadow_css.' '.$header_main_bxshadow_color;
	$header_main_css .=	'-webkit-box-shadow:'.$header_main_bx_shadow.';';
	$header_main_css .=	'-moz-box-shadow:'.$header_main_bx_shadow.';';
	$header_main_css .=	'box-shadow:'.$header_main_bx_shadow.';';
}
//border style
$header_main_border_style     = cosmoswp_ifset($header_main_border['border-style']);
if ( 'none' !== $header_main_border_style ){

	$header_main_css .= 'border-style:'.$header_main_border_style.';';
	//border width
	$header_main_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($header_main_border['border-width']),'desktop');
	if (strpos($header_main_border_width, 'px') !== false) {
		$header_main_css .= 'border-width:'.$header_main_border_width.';';
	}
	//border color
	$header_main_border_color     = cosmoswp_ifset($header_main_border['border-color']);
	if ($header_main_border_color){
		$header_main_css .= 'border-color:'.$header_main_border_color.';';
	}
}
//border radius
$header_main_border_tl_radius = cosmoswp_ifset($header_main_border['border-radius']['desktop']['top']);
if ( $header_main_border_tl_radius ){
	$header_main_css .= 'border-top-left-radius:'.$header_main_border_tl_radius.'px;';
}
$header_main_border_tr_radius = cosmoswp_ifset($header_main_border['border-radius']['desktop']['right']);
if ( $header_main_border_tr_radius ){
	$header_main_css .= 'border-top-right-radius:'.$header_main_border_tr_radius.'px;';
}
$header_main_border_br_radius = cosmoswp_ifset($header_main_border['border-radius']['desktop']['bottom']);
if ( $header_main_border_br_radius ){
	$header_main_css .= 'border-bottom-right-radius:'.$header_main_border_br_radius.'px;';
}
$header_main_border_bl_radius = cosmoswp_ifset($header_main_border['border-radius']['desktop']['left']);
if ( $header_main_border_bl_radius ){
	$header_main_css .= 'border-bottom-left-radius:'.$header_main_border_br_radius.'px;';
}


if ( !empty($header_main_overlay_css) ){
    $header_main_overlay_dynamic_css = '.cwp-dynamic-header .cwp-main-header.cwp-enable-overlay::after{
'.$header_main_overlay_css.'
}';
    $local_dynamic_css['all'] .= $header_main_overlay_dynamic_css;
}
if ( !empty($header_main_css) ){
	$header_main_dynamic_css = '.cwp-main-header{
		'.$header_main_css.'
	}';
	$local_dynamic_css['all'] .= $header_main_dynamic_css;
}

// tablet css 
if ( !empty($header_main_tablet_css) ){
	$header_main_tablet_dynamic_css = '.cwp-main-header{
		'.$header_main_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $header_main_tablet_dynamic_css;
}


// desktop css 
if ( !empty($header_main_desktop_css) ){
	$header_main_desktop_dynamic_css = '.cwp-main-header{
		'.$header_main_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $header_main_desktop_dynamic_css;
}
?><?php
/*Header Bottom*/
$header_bottom_css   = '';
$header_bottom_tablet_css  = '';
$header_bottom_desktop_css = '';
//height
$header_bottom_height_option  = cosmoswp_get_theme_options('header-bottom-height-option');
if ('custom' == $header_bottom_height_option ){
	$header_bottom_height = cosmoswp_get_theme_options('header-bottom-height');
	$header_bottom_height = json_decode($header_bottom_height,true);
	
	$header_bottom_desktop_css .= 'height:'.$header_bottom_height['desktop'].'px;';
	$header_bottom_tablet_css  .= 'height:'.$header_bottom_height['tablet'].'px;';
	$header_bottom_css         .= 'height:'.$header_bottom_height['mobile'].'px;';
}
else{
	$header_bottom_desktop_css .= 'height:auto;';
	$header_bottom_tablet_css  .= 'height:auto;';
	$header_bottom_css         .= 'height:auto;';
}
//margin
$header_bottom_margin = cosmoswp_get_theme_options('header-bottom-margin');
$header_bottom_margin = json_decode($header_bottom_margin,true);

// desktop margin 
$header_bottom_margin_desktop = cosmoswp_cssbox_values_inline($header_bottom_margin,'desktop');
if (strpos($header_bottom_margin_desktop, 'px') !== false){
	$header_bottom_desktop_css		.= 'margin:'.$header_bottom_margin_desktop.';';
}
// tablet marign 
$header_bottom_margin_tablet  = cosmoswp_cssbox_values_inline($header_bottom_margin,'tablet');
if (strpos($header_bottom_margin_tablet, 'px') !== false){
	$header_bottom_tablet_css		.= 'margin:'.$header_bottom_margin_tablet.';';
}
// mobile margin 
$header_bottom_margin_mobile  = cosmoswp_cssbox_values_inline($header_bottom_margin,'mobile');
if (strpos($header_bottom_margin_mobile, 'px') !== false){
	$header_bottom_css		.= 'margin:'.$header_bottom_margin_mobile.';';
}

//padding
$header_bottom_padding = cosmoswp_get_theme_options('header-bottom-padding');
$header_bottom_padding = json_decode($header_bottom_padding,true);

// desktop padding
$header_bottom_padding_desktop = cosmoswp_cssbox_values_inline($header_bottom_padding,'desktop');
if (strpos($header_bottom_padding_desktop, 'px') !== false){
	$header_bottom_desktop_css		.= 'padding:'.$header_bottom_padding_desktop.';';
}
//tablet padding
$header_bottom_padding_tablet  = cosmoswp_cssbox_values_inline($header_bottom_padding,'tablet');
if (strpos($header_bottom_padding_tablet, 'px') !== false){
	$header_bottom_tablet_css		.= 'padding:'.$header_bottom_padding_tablet.';';
}
//mobile padding
$header_bottom_padding_mobile  = cosmoswp_cssbox_values_inline($header_bottom_padding,'mobile');
if (strpos($header_bottom_padding_mobile, 'px') !== false){
	$header_bottom_css		.= 'padding:'.$header_bottom_padding_mobile.';';
}

//background options
$header_bottom_bg_options          = cosmoswp_get_theme_options('header-bottom-bg-options');
if ( 'custom' == $header_bottom_bg_options ){

	//background
	$header_bottom_bg            = cosmoswp_get_theme_options('header-bottom-background-options');
	$header_bottom_bg            = json_decode($header_bottom_bg,true);
    $header_bottom_overlay_css   = '';
	//bg color
	$header_bottom_bg_color      = cosmoswp_ifset($header_bottom_bg['background-color']);
	if ( $header_bottom_bg_color ){
		$header_bottom_css		.= 'background-color:'.$header_bottom_bg_color.';';
	}
	//bg image
	$header_bottom_bg_image      = cosmoswp_ifset($header_bottom_bg['background-image']);
	if ( $header_bottom_bg_image ){
		$header_bottom_css		.= 'background-image:url('.esc_url( $header_bottom_bg_image ).');';
		//bg size
		$header_bottom_bg_size       = cosmoswp_ifset($header_bottom_bg['background-size']);
		if ( $header_bottom_bg_size ){
			$header_bottom_css		.= 'background-size:'.$header_bottom_bg_size.';';
			$header_bottom_css		.= '-webkit-background-size:'.$header_bottom_bg_size.';';
		}
		//bg position
		$header_bottom_bg_position   = cosmoswp_ifset($header_bottom_bg['background-position']);
		if ( $header_bottom_bg_position ){
			$header_bottom_css		.= 'background-position:'.str_replace('_',' ', $header_bottom_bg_position).';';
		}
		//bg repeat
		$header_bottom_bg_repeat     = cosmoswp_ifset($header_bottom_bg['background-repeat']);
		if ( $header_bottom_bg_repeat ){
			$header_bottom_css		.= 'background-repeat:'.$header_bottom_bg_repeat.';';
		}
		//bg attachment
		$header_bottom_bg_attachment = cosmoswp_ifset($header_bottom_bg['background-attachment']);
		if ( $header_bottom_bg_attachment ){
			$header_bottom_css		.= 'background-attachment:'.$header_bottom_bg_attachment.';';	
		}

        //bg overlay color
        $header_bottom_enable_overlay   = cosmoswp_ifset($header_bottom_bg['enable-overlay']);
        $header_bottom_bg_overlay_color = cosmoswp_ifset($header_bottom_bg['background-overlay-color']);
        if ( $header_bottom_bg_overlay_color && $header_bottom_enable_overlay){
            $header_bottom_overlay_css		.= 'background:'.$header_bottom_bg_overlay_color.';';
        }
	}
}
//border options
$header_bottom_border           = cosmoswp_get_theme_options('header-bottom-border-styling');
$header_bottom_border           = json_decode($header_bottom_border,true);
//box shadow
$header_bottom_bx_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($header_bottom_border['box-shadow-css']),'desktop');
if (strpos($header_bottom_bx_shadow_css, 'px') !== false) {
	$header_bottom_bxshadow_color   = cosmoswp_ifset($header_bottom_border['box-shadow-color']);
	$header_bottom_bx_shadow        = $header_bottom_bx_shadow_css.' '.$header_bottom_bxshadow_color;
	$header_bottom_css .=	'-webkit-box-shadow:'.$header_bottom_bx_shadow.';';
	$header_bottom_css .=	'-moz-box-shadow:'.$header_bottom_bx_shadow.';';
	$header_bottom_css .=	'box-shadow:'.$header_bottom_bx_shadow.';';
}
//border style
$header_bottom_border_style     = cosmoswp_ifset($header_bottom_border['border-style']);
if ( 'none' !== $header_bottom_border_style ){

	$header_bottom_css .= 'border-style:'.$header_bottom_border_style.';';
	//border width
	$header_bottom_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($header_bottom_border['border-width']),'desktop');
	if (strpos($header_bottom_border_width, 'px') !== false) {
		$header_bottom_css .= 'border-width:'.$header_bottom_border_width.';';
	}
	//border color
	$header_bottom_border_color     = cosmoswp_ifset($header_bottom_border['border-color']);
	if ($header_bottom_border_color){
		$header_bottom_css .= 'border-color:'.$header_bottom_border_color.';';
	}
}
//border radius
$header_bottom_border_tl_radius = cosmoswp_ifset($header_bottom_border['border-radius']['desktop']['top']);
if ( $header_bottom_border_tl_radius ){
	$header_bottom_css .= 'border-top-left-radius:'.$header_bottom_border_tl_radius.'px;';
}
$header_bottom_border_tr_radius = cosmoswp_ifset($header_bottom_border['border-radius']['desktop']['right']);
if ( $header_bottom_border_tr_radius ){
	$header_bottom_css .= 'border-top-right-radius:'.$header_bottom_border_tr_radius.'px;';
}
$header_bottom_border_br_radius = cosmoswp_ifset($header_bottom_border['border-radius']['desktop']['bottom']);
if ( $header_bottom_border_br_radius ){
	$header_bottom_css .= 'border-bottom-right-radius:'.$header_bottom_border_br_radius.'px;';
}
$header_bottom_border_bl_radius = cosmoswp_ifset($header_bottom_border['border-radius']['desktop']['left']);
if ( $header_bottom_border_bl_radius ){
	$header_bottom_css .= 'border-bottom-left-radius:'.$header_bottom_border_br_radius.'px;';
}

if ( !empty($header_bottom_overlay_css) ){
    $header_bottom_overlay_dynamic_css = '.cwp-dynamic-header .cwp-bottom-header.cwp-enable-overlay::after{
'.$header_bottom_overlay_css.'
}';
    $local_dynamic_css['all'] .= $header_bottom_overlay_dynamic_css;
}

if ( !empty($header_bottom_css) ){
	$header_bottom_dynamic_css = '.cwp-bottom-header{
		'.$header_bottom_css.'
	}';
	$local_dynamic_css['all'] .= $header_bottom_dynamic_css;
}



// tablet css 
if ( !empty($header_bottom_tablet_css) ){
	$header_bottom_tablet_dynamic_css = '.cwp-bottom-header{
		'.$header_bottom_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $header_bottom_tablet_dynamic_css;
}

// desktop css 
if ( !empty($header_bottom_desktop_css) ){
	$header_bottom_desktop_dynamic_css = '.cwp-bottom-header{
		'.$header_bottom_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $header_bottom_desktop_dynamic_css;
}?><?php

/*logo max width*/
$site_logo_width      = cosmoswp_get_theme_options('site-logo-max-width');
$site_logo_width      = json_decode($site_logo_width,true);

// desktop css
if ( isset($site_logo_width['desktop']) && !empty($site_logo_width['desktop']) && $site_logo_width['desktop'] != null){
    $site_logo_width_desktop = 'max-width:'.$site_logo_width['desktop'].'px;';
    $site_logo_width_desktop_css = '.cwp-logo .custom-logo-link {
		'.$site_logo_width_desktop.'
	}';
    $local_dynamic_css['desktop'] .= $site_logo_width_desktop_css;
}


// tablet css
if ( isset($site_logo_width['tablet']) && !empty($site_logo_width['tablet']) && $site_logo_width['tablet'] != null){
    $site_logo_width_tablet  = 'max-width:'.$site_logo_width['tablet'].'px;';
    $site_logo_width_tablet_css = '.cwp-logo .custom-logo-link {
		'.$site_logo_width_tablet.'
	}';
    $local_dynamic_css['tablet'] .= $site_logo_width_tablet_css;
}

// mobile css
if ( isset($site_logo_width['mobile']) && !empty($site_logo_width['mobile']) && $site_logo_width['mobile'] != null){
    $site_logo_width_mobile  = 'max-width:'.$site_logo_width['mobile'].'px;';
    $site_logo_width_mobile_css = '.cwp-logo .custom-logo-link {
		'.$site_logo_width_mobile.'
	}';
    $local_dynamic_css['all'] .= $site_logo_width_mobile_css;
}

/*site identity options*/
$site_identity_margin_padding = '';
$site_identity_tablet_css     = '';
$site_identity_desktop_css    = '';

/* margin */
$site_identity_margin = cosmoswp_get_theme_options('site-identity-margin');
$site_identity_margin = json_decode($site_identity_margin,true);

// desktop margin 
$site_identity_margin_desktop = cosmoswp_cssbox_values_inline($site_identity_margin,'desktop');
if (strpos($site_identity_margin_desktop, 'px') !== false){
	$site_identity_desktop_css		.= 'margin:'.$site_identity_margin_desktop.';';
}
// tablet marign 
$site_identity_margin_tablet  = cosmoswp_cssbox_values_inline($site_identity_margin,'tablet');
if (strpos($site_identity_margin_tablet, 'px') !== false){
	$site_identity_tablet_css		.= 'margin:'.$site_identity_margin_tablet.';';
}
// mobile margin 
$site_identity_margin_mobile  = cosmoswp_cssbox_values_inline($site_identity_margin,'mobile');
if (strpos($site_identity_margin_mobile, 'px') !== false){
	$site_identity_margin_padding		.= 'margin:'.$site_identity_margin_mobile.';';
}

/* padding */
$site_identity_padding = cosmoswp_get_theme_options('site-identity-padding');
$site_identity_padding = json_decode($site_identity_padding,true);

// desktop padding
$site_identity_padding_desktop = cosmoswp_cssbox_values_inline($site_identity_padding,'desktop');
if (strpos($site_identity_padding_desktop, 'px') !== false){
	$site_identity_desktop_css		.= 'padding:'.$site_identity_padding_desktop.';';
}
//tablet padding
$site_identity_padding_tablet  = cosmoswp_cssbox_values_inline($site_identity_padding,'tablet');
if (strpos($site_identity_padding_tablet, 'px') !== false){
	$site_identity_tablet_css		.= 'padding:'.$site_identity_padding_tablet.';';
}
//mobile padding
$site_identity_padding_mobile  = cosmoswp_cssbox_values_inline($site_identity_padding,'mobile');
if (strpos($site_identity_padding_mobile, 'px') !== false){
	$site_identity_margin_padding		.= 'padding:'.$site_identity_padding_mobile.';';
}

/* added css for mobile device */
if (!empty($site_identity_margin_padding)){
	$site_identity_dynamic_margin_padding = '.cwp-logo{
		'.$site_identity_margin_padding.'
	}';
	$local_dynamic_css['all'] .= $site_identity_dynamic_margin_padding;
}

/* added css for tablet device */
if (!empty($site_identity_tablet_css)){
	$site_identity_tablet_dynamic_ss = '.cwp-logo{
		'.$site_identity_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $site_identity_tablet_dynamic_ss;
}

/* added css for desktop */
if (!empty($site_identity_desktop_css)){
	$site_identity_desktop_dynamic_css = '.cwp-logo{
		'.$site_identity_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $site_identity_desktop_dynamic_css;
}
/**
 * [$site_title_css description]
 * @var string
 */
$site_title_css         = '';
$site_title_tablet_css  = '';
$site_title_desktop_css = '';

/** 
 * [$site_tagline_css description]
 * @var string
 */
$site_tagline_css         = '';
$site_tagline_tablet_css  = '';
$site_tagline_desktop_css = '';
$site_identity_typography_options = cosmoswp_get_theme_options('site-identity-typography-options');
if ('custom' == $site_identity_typography_options){
	
	$site_title_typography         = cosmoswp_get_theme_options('site-title-typography');
	$site_title_typography         = json_decode($site_title_typography,true);

	$site_title_font_family     =  cosmoswp_font_family($site_title_typography);
	if ( $site_title_font_family ){
		$site_title_css .=  'font-family:'.$site_title_font_family.';';
		$site_title_font_weight     = cosmoswp_font_weight( $site_title_typography );
		if ( $site_title_font_weight ){
			$site_title_css .=  'font-weight:'.$site_title_font_weight.';';
		}
		$site_title_font_style      = cosmoswp_ifset($site_title_typography['font-style']);
		if ( $site_title_font_style ){
			$site_title_css .=  'font-style:'.$site_title_font_style.';';
		}
		$site_title_text_decoration = cosmoswp_ifset($site_title_typography['text-decoration']);
		if ( $site_title_text_decoration ){
			$site_title_css .=  'text-decoration:'.$site_title_text_decoration.';';
		}
		$site_title_text_transform  = cosmoswp_ifset($site_title_typography['text-transform']);
		if ( $site_title_text_transform ){
			$site_title_css .=  'text-transform:'.$site_title_text_transform.';';
		}
		$site_title_font_size       = cosmoswp_ifset($site_title_typography['font-size']['mobile']);
		if ( $site_title_font_size ){
			$site_title_css .=  'font-size:'.$site_title_font_size.'px;';
		}
		$site_title_line_height     = cosmoswp_ifset($site_title_typography['line-height']['mobile']);
		if ( $site_title_line_height ){
			$site_title_css .=  'line-height:'.$site_title_line_height.'px;';
		}
		$site_title_letter_spacing  = cosmoswp_ifset($site_title_typography['letter-spacing']['mobile']);
		if ( $site_title_letter_spacing ){
			$site_title_css .=  'letter-spacing:'.$site_title_letter_spacing.'px;';
		}

		/* site title tablet css */
		$site_title_tablet_font_size       = cosmoswp_ifset($site_title_typography['font-size']['tablet']);
		if ( $site_title_tablet_font_size ){
			$site_title_tablet_css .=  'font-size:'.$site_title_tablet_font_size.'px;';
		}
		$site_title_tablet_line_height     = cosmoswp_ifset($site_title_typography['line-height']['tablet']);
		if ( $site_title_tablet_line_height ){
			$site_title_tablet_css .=  'line-height:'.$site_title_tablet_line_height.'px;';
		}
		$site_title_tablet_letter_spacing  = cosmoswp_ifset($site_title_typography['letter-spacing']['tablet']);
		if ( $site_title_tablet_letter_spacing ){
			$site_title_tablet_css .=  'letter-spacing:'.$site_title_tablet_letter_spacing.'px;';
		}

		/* site desktop tablet css */
		$site_title_desktop_font_size       = cosmoswp_ifset($site_title_typography['font-size']['desktop']);
		if ( $site_title_desktop_font_size ){
			$site_title_desktop_css .=  'font-size:'.$site_title_desktop_font_size.'px;';
		}
		$site_title_desktop_line_height     = cosmoswp_ifset($site_title_typography['line-height']['desktop']);
		if ( $site_title_desktop_line_height ){
			$site_title_desktop_css .=  'line-height:'.$site_title_desktop_line_height.'px;';
		}
		$site_title_desktop_letter_spacing  = cosmoswp_ifset($site_title_typography['letter-spacing']['desktop']);
		if ( $site_title_desktop_letter_spacing ){
			$site_title_desktop_css .=  'letter-spacing:'.$site_title_desktop_letter_spacing.'px;';
		}
	}
	/*site tagline*/
	$site_tagline_typography         = cosmoswp_get_theme_options('site-tagline-typography');
	$site_tagline_typography         = json_decode($site_tagline_typography,true);

	$site_tagline_font_family     =  cosmoswp_font_family($site_tagline_typography);
	if ( $site_tagline_font_family ){
		$site_tagline_css .=  'font-family:'.$site_tagline_font_family.';';
		$site_tagline_font_weight     = cosmoswp_font_weight( $site_tagline_typography );
		if ( $site_tagline_font_weight ){
			$site_tagline_css .=  'font-weight:'.$site_tagline_font_weight.';';
		}
		$site_tagline_font_style      = cosmoswp_ifset($site_tagline_typography['font-style']);
		if ( $site_tagline_font_style ){
			$site_tagline_css .=  'font-style:'.$site_tagline_font_style.';';
		}
		$site_tagline_text_decoration = cosmoswp_ifset($site_tagline_typography['text-decoration']);
		if ( $site_tagline_text_decoration ){
			$site_tagline_css .=  'text-decoration:'.$site_tagline_text_decoration.';';
		}
		$site_tagline_text_transform  = cosmoswp_ifset($site_tagline_typography['text-transform']);
		if ( $site_tagline_text_transform ){
			$site_tagline_css .=  'text-transform:'.$site_tagline_text_transform.';';
		}
		$site_tagline_font_size       = cosmoswp_ifset($site_tagline_typography['font-size']['mobile']);
		if ( $site_tagline_font_size ){
			$site_tagline_css .=  'font-size:'.$site_tagline_font_size.'px;';
		}
		$site_tagline_line_height     = cosmoswp_ifset($site_tagline_typography['line-height']['mobile']);
		if ( $site_tagline_line_height ){
			$site_tagline_css .=  'line-height:'.$site_tagline_line_height.'px;';
		}
		$site_tagline_letter_spacing  = cosmoswp_ifset($site_tagline_typography['letter-spacing']['mobile']);
		if ( $site_tagline_letter_spacing ){
			$site_tagline_css .=  'letter-spacing:'.$site_tagline_letter_spacing.'px;';
		}


		/* site title tagline tablet css */
		$site_tagline_tablet_font_size       = cosmoswp_ifset($site_tagline_typography['font-size']['tablet']);
		if ( $site_tagline_tablet_font_size ){
			$site_tagline_tablet_css .=  'font-size:'.$site_tagline_tablet_font_size.'px;';
		}
		$site_tagline_tablet_line_height     = cosmoswp_ifset($site_tagline_typography['line-height']['tablet']);
		if ( $site_tagline_tablet_line_height ){
			$site_tagline_tablet_css .=  'line-height:'.$site_tagline_tablet_line_height.'px;';
		}
		$site_tagline_tablet_letter_spacing  = cosmoswp_ifset($site_tagline_typography['letter-spacing']['tablet']);
		if ( $site_tagline_tablet_letter_spacing ){
			$site_tagline_tablet_css .=  'letter-spacing:'.$site_tagline_tablet_letter_spacing.'px;';
		}

		/* site tagline desktop css */
		$site_tagline_desktop_font_size       = cosmoswp_ifset($site_tagline_typography['font-size']['desktop']);
		if ( $site_tagline_desktop_font_size ){
			$site_tagline_desktop_css .=  'font-size:'.$site_tagline_desktop_font_size.'px;';
		}
		$site_tagline_desktop_line_height     = cosmoswp_ifset($site_tagline_typography['line-height']['desktop']);
		if ( $site_tagline_desktop_line_height ){
			$site_tagline_desktop_css .=  'line-height:'.$site_tagline_desktop_line_height.'px;';
		}
		$site_tagline_desktop_letter_spacing  = cosmoswp_ifset($site_tagline_typography['letter-spacing']['desktop']);
		if ( $site_tagline_desktop_letter_spacing ){
			$site_tagline_desktop_css .=  'letter-spacing:'.$site_tagline_desktop_letter_spacing.'px;';
		}
	}

}
$site_identity_styling = cosmoswp_get_theme_options('site-identity-styling');
$site_identity_styling = json_decode($site_identity_styling,true);
$site_title_color      = cosmoswp_ifset($site_identity_styling['site-title-color']);
if ( $site_title_color ){
	$site_title_css .= 'color:'.$site_title_color.';';
}

/* mobile css */
if ( !empty( $site_title_css )){
	$logo_title_dynamic_css = '.cwp-logo .site-title,.cwp-logo .site-title a{
		'.$site_title_css.'
	}';
	$local_dynamic_css['all'] .= $logo_title_dynamic_css;
}

/* tablet css */
if ( !empty( $site_title_tablet_css )){
	$site_title_tablet_dynamic_css = '.cwp-logo .site-title,.cwp-logo .site-title a{
		'.$site_title_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $site_title_tablet_dynamic_css;
}

/* desktop css */
if ( !empty( $site_title_desktop_css )){
	$site_title_desktop_dynamic_css = '.cwp-logo .site-title,.cwp-logo .site-title a{
		'.$site_title_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $site_title_desktop_dynamic_css;
}

//hover site title color
$site_title_hover_css      = '';
$site_title_hover_color      = cosmoswp_ifset($site_identity_styling['hover-site-title-color']);
if ( $site_title_hover_color ){
	$site_title_hover_css .= 'color:'.$site_title_hover_color.';';
}
if ( !empty( $site_title_hover_css )){
	$site_title_hover_dynamic_css = '.cwp-logo .site-title:hover, .cwp-logo .site-title:hover a,.site-title:focus-within,.site-title:focus-within a{ 
		'.$site_title_hover_css.'
	}';
	$local_dynamic_css['all'] .= $site_title_hover_dynamic_css;
}
/*site tagline css*/
$site_tagline_color      = cosmoswp_ifset($site_identity_styling['site-tagline-color']);
if ( $site_tagline_color ){
	$site_tagline_css .= 'color:'.$site_tagline_color.';';
}
/* site tagline mobile css */
if ( !empty( $site_tagline_css )){
	$logo_tagline_dynamic_css = '.cwp-logo .site-description{
		'.$site_tagline_css.'
	}';
	$local_dynamic_css['all'] .= $logo_tagline_dynamic_css;
}

/* site tagline tablet css */
if ( !empty( $site_tagline_tablet_css )){
	$site_tagline_tablet_dynamic_css = '.cwp-logo .site-description{
		'.$site_tagline_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $site_tagline_tablet_dynamic_css;
}

/* site tagline desktop css */
if ( !empty( $site_tagline_desktop_css )){
	$site_tagline_desktop_dynamic_css = '.cwp-logo .site-description{
		'.$site_tagline_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $site_tagline_desktop_dynamic_css;
}

//hover site tagline color
$site_tagline_hover_css      = '';
$site_tagline_hover_color      = cosmoswp_ifset($site_identity_styling['hover-site-tagline-color']);
if ( $site_tagline_hover_color ){
	$site_tagline_hover_css .= 'color:'.$site_tagline_hover_color.';';
}
if ( !empty( $site_tagline_hover_css )){
	$site_tagline_hover_dynamic_css = '.cwp-logo .site-description:hover,.site-description:focus{ 
		'.$site_tagline_hover_css.'
	}';
	$local_dynamic_css['all'] .= $site_tagline_hover_dynamic_css;
}
?><?php
/*Header Social Single Icon*/
$header_social_icon_margin_css         = '';
$header_social_icon_margin_tablet_css  = '';
$header_social_icon_margin_desktop_css = '';
//margin
$single_icon_margin = cosmoswp_get_theme_options('single-header-social-icon-margin');
$single_icon_margin = json_decode($single_icon_margin,true);

// desktop margin 
$single_icon_margin_desktop = cosmoswp_cssbox_values_inline($single_icon_margin,'desktop');
if (strpos($single_icon_margin_desktop, 'px') !== false){
	$header_social_icon_margin_desktop_css		.= 'margin:'.$single_icon_margin_desktop.';';
}
// tablet marign 
$single_icon_margin_tablet  = cosmoswp_cssbox_values_inline($single_icon_margin,'tablet');
if (strpos($single_icon_margin_tablet, 'px') !== false){
	$header_social_icon_margin_tablet_css		.= 'margin:'.$single_icon_margin_tablet.';';
}
// mobile margin 
$single_icon_margin_mobile  = cosmoswp_cssbox_values_inline($single_icon_margin,'mobile');
if (strpos($single_icon_margin_mobile, 'px') !== false){
	$header_social_icon_margin_css		.= 'margin:'.$single_icon_margin_mobile.';';
}

/* added css for mobile device */
if ( !empty( $header_social_icon_margin_css )){
	$header_social_icon_margin_dynamic_css = '.cwp-social-links li {
		'.$header_social_icon_margin_css.'
	}';
	$local_dynamic_css['all'] .= $header_social_icon_margin_dynamic_css;
}

// tablet css 
if ( !empty($header_social_icon_margin_tablet_css) ){
	$header_social_icon_margin_tablet_dynamic_css = '.cwp-social-links li {
		'.$header_social_icon_margin_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $header_social_icon_margin_tablet_dynamic_css;
}

// desktop css 
if ( !empty($header_social_icon_margin_desktop_css) ){
	$header_social_icon_margin_desktop_dynamic_css = '.cwp-social-links li {
		'.$header_social_icon_margin_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $header_social_icon_margin_desktop_dynamic_css;
}

$header_social_icon_css         = '';
$header_social_icon_tablet_css  = '';
$header_social_icon_desktop_css = '';
/* padding */
$single_icon_padding = cosmoswp_get_theme_options('single-header-social-icon-padding');
$single_icon_padding = json_decode($single_icon_padding,true);

// desktop padding
$single_icon_padding_desktop = cosmoswp_cssbox_values_inline($single_icon_padding,'desktop');
if (strpos($single_icon_padding_desktop, 'px') !== false){
	$header_social_icon_desktop_css		.= 'padding:'.$single_icon_padding_desktop.';';
}
//tablet padding
$single_icon_padding_tablet  = cosmoswp_cssbox_values_inline($single_icon_padding,'tablet');
if (strpos($single_icon_padding_tablet, 'px') !== false){
	$header_social_icon_tablet_css		.= 'padding:'.$single_icon_padding_tablet.';';
}
//mobile padding
$single_icon_padding_mobile  = cosmoswp_cssbox_values_inline($single_icon_padding,'mobile');
if (strpos($single_icon_padding_mobile, 'px') !== false){
	$header_social_icon_css		.= 'padding:'.$single_icon_padding_mobile.';';
}

/* icon radius	*/		
$icon_radius  = cosmoswp_get_theme_options('header-social-icon-radius');
$icon_radius  = json_decode($icon_radius,true);
// desktop icon radius 
$desktop_icon_radius  = cosmoswp_ifset($icon_radius['desktop']);
if (!empty( $desktop_icon_radius )){
	$header_social_icon_desktop_css		.= 'border-radius:'.$desktop_icon_radius.'px;';
}
// tablet icon radius 
$tablet_icon_radius  = cosmoswp_ifset($icon_radius['tablet']);
if (!empty( $tablet_icon_radius )){
	$header_social_icon_tablet_css		.= 'border-radius:'.$tablet_icon_radius.'px;';
}
// mobile icon radius 
$mobile_icon_radius  = cosmoswp_ifset($icon_radius['mobile']);
if (!empty( $mobile_icon_radius )){
	$header_social_icon_css		.= 'border-radius:'.$mobile_icon_radius.'px;';
}

/* icon size*/
$single_icon_size = cosmoswp_get_theme_options('header-social-icon-size');
$single_icon_size = json_decode($single_icon_size,true);

// desktop icon size 
$desktop_icon_size  = cosmoswp_ifset($single_icon_size['desktop']);
if (!empty( $desktop_icon_size )){
	$header_social_icon_desktop_css		.= 'font-size:'.$desktop_icon_size.'px;';
}
// tablet icon size 
$tablet_icon_size  = cosmoswp_ifset($single_icon_size['tablet']);
if (!empty( $tablet_icon_size )){
	$header_social_icon_tablet_css		.= 'font-size:'.$tablet_icon_size.'px;';
}
// mobile icon size 
$mobile_icon_size  = cosmoswp_ifset($single_icon_size['mobile']);
if (!empty( $mobile_icon_size )){
	$header_social_icon_css		.= 'font-size:'.$mobile_icon_size.'px;';
}

/* icon width */
$single_icon_width 	= cosmoswp_get_theme_options( 'header-social-icon-width');
$single_icon_width 	= json_decode($single_icon_width,true);

// desktop icon width 
$desktop_icon_width  = cosmoswp_ifset($single_icon_width['desktop']);
if (!empty( $desktop_icon_width )){
	$header_social_icon_desktop_css		.= 'width:'.$desktop_icon_width.'px;';
}
// tablet icon width 
$tablet_icon_width  = cosmoswp_ifset($single_icon_width['tablet']);
if (!empty( $tablet_icon_width )){
	$header_social_icon_tablet_css		.= 'width:'.$tablet_icon_width.'px;';
}
// mobile icon width 
$mobile_icon_width  = cosmoswp_ifset($single_icon_width['mobile']);
if (!empty( $mobile_icon_width )){
	$header_social_icon_css		.= 'width:'.$mobile_icon_width.'px;';
}

/* icon height */
$single_icon_height 	= cosmoswp_get_theme_options('header-social-icon-height');
$single_icon_height 	= json_decode($single_icon_height,true);

// desktop icon height 
$desktop_icon_height  = cosmoswp_ifset($single_icon_height['desktop']);
if (!empty( $desktop_icon_height )){
	$header_social_icon_desktop_css		.= 'height:'.$desktop_icon_height.'px;';
}
// tablet icon height 
$tablet_icon_height  = cosmoswp_ifset($single_icon_height['tablet']);
if (!empty( $tablet_icon_height )){
	$header_social_icon_tablet_css		.= 'height:'.$tablet_icon_height.'px;';
}
// mobile icon height 
$mobile_icon_height  = cosmoswp_ifset($single_icon_height['mobile']);
if (!empty( $mobile_icon_height )){
	$header_social_icon_css		.= 'height:'.$mobile_icon_height.'px;';
}

/* icon line height */
$single_icon_line_height 	= cosmoswp_get_theme_options('header-social-icon-line-height');
$single_icon_line_height 	= json_decode($single_icon_line_height,true);

// desktop icon line_height 
$desktop_icon_line_height  = cosmoswp_ifset($single_icon_line_height['desktop']);
if (!empty( $desktop_icon_line_height )){
	$header_social_icon_desktop_css		.= 'line-height:'.$desktop_icon_line_height.'px;';
}
// tablet icon line_height 
$tablet_icon_line_height  = cosmoswp_ifset($single_icon_line_height['tablet']);
if (!empty( $tablet_icon_line_height )){
	$header_social_icon_tablet_css		.= 'line-height:'.$tablet_icon_line_height.'px;';
}
// mobile icon line_height 
$mobile_icon_line_height  = cosmoswp_ifset($single_icon_line_height['mobile']);
if (!empty( $mobile_icon_line_height )){
	$header_social_icon_css		.= 'line-height:'.$mobile_icon_line_height.'px;';
}

if ( !empty( $header_social_icon_css )){
	$header_social_icon_dynamic_css = '.cwp-social-links li a{
		'.$header_social_icon_css.'
	}';
	$local_dynamic_css['all'] .= $header_social_icon_dynamic_css;
}
/* tablet css */
if ( !empty( $header_social_icon_tablet_css )){
	$header_social_icon_tablet_dynamic_css = '.cwp-social-links li a{
		'.$header_social_icon_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $header_social_icon_tablet_dynamic_css;
}
/* desktop css */
if ( !empty( $header_social_icon_desktop_css )){
	$header_social_icon_desktop_dynamic_css = '.cwp-social-links li a{
		'.$header_social_icon_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $header_social_icon_desktop_dynamic_css;
}

/*Header Social Icon Section*/
$header_social_icon_section_css         = '';
$header_social_icon_section_tablet_css  = '';
$header_social_icon_section_desktop_css = '';

/* margin */
$social_icon_margin = cosmoswp_get_theme_options('header-social-icon-margin');
$social_icon_margin = json_decode($social_icon_margin,true);

// desktop margin 
$social_icon_margin_desktop = cosmoswp_cssbox_values_inline($social_icon_margin,'desktop');
if (strpos($social_icon_margin_desktop, 'px') !== false){
	$header_social_icon_section_desktop_css		.= 'margin:'.$social_icon_margin_desktop.';';
}
// tablet marign 
$social_icon_margin_tablet  = cosmoswp_cssbox_values_inline($social_icon_margin,'tablet');
if (strpos($social_icon_margin_tablet, 'px') !== false){
	$header_social_icon_section_tablet_css		.= 'margin:'.$social_icon_margin_tablet.';';
}
// mobile margin 
$social_icon_margin_mobile  = cosmoswp_cssbox_values_inline($social_icon_margin,'mobile');
if (strpos($social_icon_margin_mobile, 'px') !== false){
	$header_social_icon_section_css		.= 'margin:'.$social_icon_margin_mobile.';';
}

/* padding */
$social_icon_padding = cosmoswp_get_theme_options('header-social-icon-padding');
$social_icon_padding = json_decode($social_icon_padding,true);

// desktop padding
$social_icon_padding_desktop = cosmoswp_cssbox_values_inline($social_icon_padding,'desktop');
if (strpos($social_icon_padding_desktop, 'px') !== false){
	$header_social_icon_section_desktop_css		.= 'padding:'.$social_icon_padding_desktop.';';
}
//tablet padding
$social_icon_padding_tablet  = cosmoswp_cssbox_values_inline($social_icon_padding,'tablet');
if (strpos($social_icon_padding_tablet, 'px') !== false){
	$header_social_icon_section_tablet_css		.= 'padding:'.$social_icon_padding_tablet.';';
}
//mobile padding
$social_icon_padding_mobile  = cosmoswp_cssbox_values_inline($social_icon_padding,'mobile');
if (strpos($social_icon_padding_mobile, 'px') !== false){
	$header_social_icon_section_css		.= 'padding:'.$social_icon_padding_mobile.';';
}

/* mobile css */
if ( !empty( $header_social_icon_section_css )){
	$header_social_icon_section_dynamic_css = '.cwp-social-links{
		'.$header_social_icon_section_css.'
	}';
	$local_dynamic_css['all'] .= $header_social_icon_section_dynamic_css;
}

/* tablet css */
if ( !empty( $header_social_icon_section_tablet_css )){
	$header_social_icon_section_tablet_dynamic_css = '.cwp-social-links{
		'.$header_social_icon_section_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $header_social_icon_section_tablet_dynamic_css;
}

/* desktop css */
if ( !empty( $header_social_icon_section_desktop_css )){
	$header_social_icon_section_desktop_dynamic_css = '.cwp-social-links{
		'.$header_social_icon_section_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $header_social_icon_section_desktop_dynamic_css;
}

/* social icon color */
$social_information          = cosmoswp_get_theme_options('header-social-icon-data');
$social_information_data 	 = json_decode($social_information,true);
$header_social_icon_color_css = array();
if (is_array( $social_information_data )) {
	$header_social_icon_color_css = array();
	foreach ($social_information_data as $data) {
		$social_icon      = cosmoswp_ifset($data['icon']);
		$icon_color       = cosmoswp_ifset($data['icon-color']);
		$icon_hover_color = cosmoswp_ifset($data['icon-hover-color']);
		$icon_bg          = cosmoswp_ifset($data['bg-color']);
		$icon_hover_bg    = cosmoswp_ifset($data['bg-hover-color']);
		$header_social_icon_color_css[] ='
		.cwp-social-links ul li.'.str_replace(' ','-',$social_icon ).' a{
			color:'.esc_attr( $icon_color).';
			background:'.esc_attr( $icon_bg).';
		}
		.cwp-social-links ul li.'.str_replace(' ','-',$social_icon ).' a:hover,
		.cwp-social-links ul li.'.str_replace(' ','-',$social_icon ).' a:focus{
			color:'.esc_attr( $icon_hover_color).';
			background:'.esc_attr( $icon_hover_bg).';
		}
		';
	}
}
if ( !empty( $header_social_icon_color_css )){
	$local_dynamic_css['all'] .= implode(" ",$header_social_icon_color_css);
}?><?php
/*Drop Down Search*/
$dds_search_css         = '';
$dds_search_tablet_css  = '';
$dds_search_desktop_css = '';

$dds_input_height_css = '';
$dd_search_styling   = cosmoswp_get_theme_options('dropdown-search-form-styling');
$dd_search_styling   = json_decode($dd_search_styling,true);
//txt color
$dds_txt_color     = cosmoswp_ifset($dd_search_styling['normal-text-color']);
if ( $dds_txt_color ){
	$dds_search_css .= 'color:'.$dds_txt_color.';';
}
//bg color
$dds_bg_color      = cosmoswp_ifset($dd_search_styling['normal-bg-color']);
if ( $dds_bg_color ){
	$dds_search_css .= 'background-color:'.$dds_bg_color.';';
}
//border style
$dds_border_style      = cosmoswp_ifset($dd_search_styling['normal-border-style']);
if ( $dds_border_style ){
	$dds_search_css .= 'border-style:'.$dds_border_style.';';
}
//border color
$dds_border_color      = cosmoswp_ifset($dd_search_styling['normal-border-color']);
if ( $dds_border_color ){
	$dds_search_css .= 'border-color:'.$dds_border_color.';';
}
//border width
$dds_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($dd_search_styling['normal-border-width']),'desktop');
if (strpos($dds_border_width, 'px') !== false) {
	$dds_search_css .= 'border-width:'.$dds_border_width.';';
}
//border radius
$dds_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($dd_search_styling['normal-border-radius']),'desktop');
if (strpos($dds_border_radius, 'px') !== false){
	$dds_search_css		.= 'border-radius:'.$dds_border_radius.';';
}
//bx shadow
$dds_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($dd_search_styling['normal-box-shadow-css']),'desktop');
if (strpos($dds_shadow_css, 'px') !== false) {
	$dds_shadow_color  = cosmoswp_ifset($dd_search_styling['normal-box-shadow-color']);
	$dds_bx_shadow     = $dds_shadow_css.' '.$dds_shadow_color;
	$dds_search_css .=	'-webkit-box-shadow:'.$dds_bx_shadow.';';
	$dds_search_css .=	'-moz-box-shadow:'.$dds_bx_shadow.';';
	$dds_search_css .=	'box-shadow:'.$dds_bx_shadow.';';
}
//typography
$dds_typography_options = cosmoswp_get_theme_options('dd-search-typography-options');
if ('custom' == $dds_typography_options){
	$dds_typography         = cosmoswp_get_theme_options('dd-search-typography');
	$dds_typography         = json_decode($dds_typography,true);

	$dds_font_family     =  cosmoswp_font_family($dds_typography);
	if ( $dds_font_family ){
		$dds_search_css .=  'font-family:'.$dds_font_family.';';
		$dds_font_weight     = cosmoswp_font_weight( $dds_typography );
		if ( $dds_font_weight ){
			$dds_search_css .=  'font-weight:'.$dds_font_weight.';';
		}
		$dds_font_style      = cosmoswp_ifset($dds_typography['font-style']);
		if ( $dds_font_style ){
			$dds_search_css .=  'font-style:'.$dds_font_style.';';
		}
		$dds_text_decoration = cosmoswp_ifset($dds_typography['text-decoration']);
		if ( $dds_text_decoration ){
			$dds_search_css .=  'text-decoration:'.$dds_text_decoration.';';
		}
		$dds_text_transform  = cosmoswp_ifset($dds_typography['text-transform']);
		if ( $dds_text_transform ){
			$dds_search_css .=  'text-transform:'.$dds_text_transform.';';
		}
		$dds_font_size       = cosmoswp_ifset($dds_typography['font-size']['mobile']);
		if ( $dds_font_size ){
			$dds_search_css .=  'font-size:'.$dds_font_size.'px;';
		}
		$dds_line_height     = cosmoswp_ifset($dds_typography['line-height']['mobile']);
		if ( $dds_line_height ){
			$dds_search_css .=  'line-height:'.$dds_line_height.'px;';
		}
		$dds_letter_spacing  = cosmoswp_ifset($dds_typography['letter-spacing']['mobile']);
		if ( $dds_letter_spacing ){
			$dds_search_css .=  'letter-spacing:'.$dds_letter_spacing.'px;';
		}

		/* dropdown search tablet css */
		$dds_tablet_font_size       = cosmoswp_ifset($dds_typography['font-size']['tablet']);
		if ( $dds_tablet_font_size ){
			$dds_search_tablet_css .=  'font-size:'.$dds_tablet_font_size.'px;';
		}
		$dds_tablet_line_height     = cosmoswp_ifset($dds_typography['line-height']['tablet']);
		if ( $dds_tablet_line_height ){
			$dds_search_tablet_css .=  'line-height:'.$dds_tablet_line_height.'px;';
		}
		$dds_tablet_letter_spacing  = cosmoswp_ifset($dds_typography['letter-spacing']['tablet']);
		if ( $dds_tablet_letter_spacing ){
			$dds_search_tablet_css .=  'letter-spacing:'.$dds_tablet_letter_spacing.'px;';
		}

		/* dropdown search desktop css */
		$dds_desktop_font_size       = cosmoswp_ifset($dds_typography['font-size']['desktop']);
		if ( $dds_desktop_font_size ){
			$dds_search_desktop_css .=  'font-size:'.$dds_desktop_font_size.'px;';
		}
		$dds_desktop_line_height     = cosmoswp_ifset($dds_typography['line-height']['desktop']);
		if ( $dds_desktop_line_height ){
			$dds_search_desktop_css .=  'line-height:'.$dds_desktop_line_height.'px;';
		}
		$dds_desktop_letter_spacing  = cosmoswp_ifset($dds_typography['letter-spacing']['desktop']);
		if ( $dds_desktop_letter_spacing ){
			$dds_search_desktop_css .=  'letter-spacing:'.$dds_desktop_letter_spacing.'px;';
		}
	}

}

/* DD search mobile css */
if ( !empty( $dds_search_css )){
	$dds_search_dynamic_css = '.cwp-search-dropdown .cwp-search-form-wrapper .search-form .search-field{
		'.$dds_search_css.'
	}';
	$local_dynamic_css['all'] .= $dds_search_dynamic_css;
}

/* DD search tablet css */
if ( !empty( $dds_search_tablet_css )){
	$dds_search_tablet_dynamic_css = '.cwp-search-dropdown .cwp-search-form-wrapper .search-form .search-field{
		'.$dds_search_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $dds_search_tablet_dynamic_css;
}

/* DD search desktop css */
if ( !empty( $dds_search_desktop_css )){
	$dds_search_desktop_dynamic_css = '.cwp-search-dropdown .cwp-search-form-wrapper .search-form .search-field{
		'.$dds_search_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $dds_search_desktop_dynamic_css;
}


$dds_search_hover_css = '';	
//txt color
$dds_hover_txt_color     = cosmoswp_ifset($dd_search_styling['hover-text-color']);
if ( $dds_hover_txt_color ){
	$dds_search_hover_css .= 'color:'.$dds_hover_txt_color.';';
}
//bg color
$dds_hover_bg_color      = cosmoswp_ifset($dd_search_styling['hover-bg-color']);
if ( $dds_hover_bg_color ){
	$dds_search_hover_css .= 'background-color:'.$dds_hover_bg_color.';';
}
//border style
$dds_hover_border_style      = cosmoswp_ifset($dd_search_styling['hover-border-style']);
if ( $dds_hover_border_style ){
	$dds_search_hover_css .= 'border-style:'.$dds_hover_border_style.';';
}
//border color
$dds_hover_border_color      = cosmoswp_ifset($dd_search_styling['hover-border-color']);
if ( $dds_hover_border_color ){
	$dds_search_hover_css .= 'border-color:'.$dds_hover_border_color.';';
}
//border width
$dds_hover_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($dd_search_styling['hover-border-width']),'desktop');
if (strpos($dds_hover_border_width, 'px') !== false) {
	$dds_search_hover_css .= 'border-width:'.$dds_hover_border_width.';';
}
//border radius
$dds_hover_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($dd_search_styling['hover-border-radius']),'desktop');
if (strpos($dds_hover_border_radius, 'px') !== false){
	$dds_search_hover_css		.= 'border-radius:'.$dds_hover_border_radius.';';
}
//bx shadow
$dds_hover_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($dd_search_styling['hover-box-shadow-css']),'desktop');
if (strpos($dds_hover_shadow_css, 'px') !== false) {
	$dds_hover_shadow_color  = cosmoswp_ifset($dd_search_styling['hover-box-shadow-color']);
	$dds_hover_bx_shadow     = $dds_hover_shadow_css.' '.$dds_hover_shadow_color;
	$dds_search_hover_css .=	'-webkit-box-shadow:'.$dds_hover_bx_shadow.';';
	$dds_search_hover_css .=	'-moz-box-shadow:'.$dds_hover_bx_shadow.';';
	$dds_search_hover_css .=	'box-shadow:'.$dds_hover_bx_shadow.';';
}	
if ( !empty( $dds_search_hover_css )){
	$dds_search_hover_dynamic_css = '.cwp-search-dropdown .cwp-search-form-wrapper .search-form .search-field:hover{
		'.$dds_search_hover_css.'
	}';
	$local_dynamic_css['all'] .= $dds_search_hover_dynamic_css;
}
// Drop Down Search Height
$dds_input_height   = cosmoswp_get_theme_options('drop-down-search-input-height');
if ( $dds_input_height ){
	$dds_input_height_css .= 'height:'.$dds_input_height.'px;';
}
if ( !empty( $dds_input_height_css )){
	$dds_input_height_dynamic_css = '.cwp-search-dropdown .cwp-search-form-wrapper .search-form .search-field,
	.cwp-search-dropdown .cwp-search-form-wrapper .search-form .search-submit{
		'.$dds_input_height_css.'
	}';
	$local_dynamic_css['all'] .= $dds_input_height_dynamic_css;
}

/*DropDown Search Icon Styling*/

$dds_icon_hover_css = $dds_icon_css = '';
//icon size
$dds_icon_size     = cosmoswp_get_theme_options('dropdown-search-icon-size');
if ( $dds_icon_size ){
	$dds_icon_css .= 'font-size:'.$dds_icon_size.'px;';
}
$dds_icon_styling   = cosmoswp_get_theme_options('dropdown-search-icon-styling');
$dds_icon_styling   = json_decode($dds_icon_styling,true);
//txt color
$dds_txt_color     = cosmoswp_ifset($dds_icon_styling['normal-text-color']);
if ( $dds_txt_color ){
	$dds_icon_css .= 'color:'.$dds_txt_color.';';
}
//bg color
$dds_bg_color      = cosmoswp_ifset($dds_icon_styling['normal-bg-color']);
if ( $dds_bg_color ){
	$dds_icon_css .= 'background:'.$dds_bg_color.';';
}
else{
	$dds_icon_css .= 'background:transparent;';
}
//border style
$dds_border_style      = cosmoswp_ifset($dds_icon_styling['normal-border-style']);
if ( $dds_border_style ){
	$dds_icon_css .= 'border-style:'.$dds_border_style.';';
}
//border color
$dds_border_color      = cosmoswp_ifset($dds_icon_styling['normal-border-color']);
if ( $dds_border_color ){
	$dds_icon_css .= 'border-color:'.$dds_border_color.';';
}
//border width
$dds_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($dds_icon_styling['normal-border-width']),'desktop');
if (strpos($dds_border_width, 'px') !== false) {
	$dds_icon_css .= 'border-width:'.$dds_border_width.';';
}
//border radius
$dds_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($dds_icon_styling['normal-border-radius']),'desktop');
if (strpos($dds_border_radius, 'px') !== false){
	$dds_icon_css		.= 'border-radius:'.$dds_border_radius.';';
}
//bx shadow
$dds_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($dds_icon_styling['normal-box-shadow-css']),'desktop');
if (strpos($dds_shadow_css, 'px') !== false) {
	$dds_shadow_color  = cosmoswp_ifset($dds_icon_styling['normal-box-shadow-color']);
	$dds_bx_shadow     = $dds_shadow_css.' '.$dds_shadow_color;
	$dds_icon_css .=	'-webkit-box-shadow:'.$dds_bx_shadow.';';
	$dds_icon_css .=	'-moz-box-shadow:'.$dds_bx_shadow.';';
	$dds_icon_css .=	'box-shadow:'.$dds_bx_shadow.';';
}

$dds_icon_tablet_css  = '';
$dds_icon_desktop_css = '';

/* margin */
$dss_margin = cosmoswp_get_theme_options('drop-down-search-margin');
$dss_margin = json_decode($dss_margin,true);

// desktop margin 
$dss_margin_desktop = cosmoswp_cssbox_values_inline($dss_margin,'desktop');
if (strpos($dss_margin_desktop, 'px') !== false){
	$dds_icon_desktop_css		.= 'margin:'.$dss_margin_desktop.';';
}
// tablet marign 
$dss_margin_tablet  = cosmoswp_cssbox_values_inline($dss_margin,'tablet');
if (strpos($dss_margin_tablet, 'px') !== false){
	$dds_icon_tablet_css		.= 'margin:'.$dss_margin_tablet.';';
}
// mobile margin 
$dss_margin_mobile  = cosmoswp_cssbox_values_inline($dss_margin,'mobile');
if (strpos($dss_margin_mobile, 'px') !== false){
	$dds_icon_css		.= 'margin:'.$dss_margin_mobile.';';
}
/* padding */
$dds_padding = cosmoswp_get_theme_options('drop-down-search-padding');
$dds_padding = json_decode($dds_padding,true);

// desktop padding
$dds_padding_desktop = cosmoswp_cssbox_values_inline($dds_padding,'desktop');
if (strpos($dds_padding_desktop, 'px') !== false){
	$dds_icon_desktop_css		.= 'padding:'.$dds_padding_desktop.';';
}
//tablet padding
$dds_padding_tablet  = cosmoswp_cssbox_values_inline($dds_padding,'tablet');
if (strpos($dds_padding_tablet, 'px') !== false){
	$dds_icon_tablet_css		.= 'padding:'.$dds_padding_tablet.';';
}
//mobile padding
$dds_padding_mobile  = cosmoswp_cssbox_values_inline($dds_padding,'mobile');
if (strpos($dds_padding_mobile, 'px') !== false){
	$dds_icon_css		.= 'padding:'.$dds_padding_mobile.';';
}

/* mobile css */
if ( !empty( $dds_icon_css )){
	$dds_search_dynamic_css = '.cwp-search-dropdown .search-icon,
	.cwp-search-dropdown .cwp-search-form-wrapper .search-form .search-submit{
		'.$dds_icon_css.'
	}';
	$local_dynamic_css['all'] .= $dds_search_dynamic_css;
}
/* tablet css */
if ( !empty( $dds_icon_tablet_css )){
	$dds_icon_tablet_dynamic_css = '.cwp-search-dropdown .search-icon,
	.cwp-search-dropdown .cwp-search-form-wrapper .search-form .search-submit{
		'.$dds_icon_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $dds_icon_tablet_dynamic_css;
}
/* desktop css */
if ( !empty( $dds_icon_desktop_css )){
	$dds_icon_desktop_dynamic_css = '.cwp-search-dropdown .search-icon,
	.cwp-search-dropdown .cwp-search-form-wrapper .search-form .search-submit{
		'.$dds_icon_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $dds_icon_desktop_dynamic_css;
}
//txt color
$dds_hover_txt_color     = cosmoswp_ifset($dds_icon_styling['hover-text-color']);
if ( $dds_hover_txt_color ){
	$dds_icon_hover_css .= 'color:'.$dds_hover_txt_color.';';
}
//bg color
$dds_hover_bg_color      = cosmoswp_ifset($dds_icon_styling['hover-bg-color']);
if ( $dds_hover_bg_color ){
	$dds_icon_hover_css .= 'background-color:'.$dds_hover_bg_color.';';
}
//border style
$dds_hover_border_style      = cosmoswp_ifset($dds_icon_styling['hover-border-style']);
if ( $dds_hover_border_style ){
	$dds_icon_hover_css .= 'border-style:'.$dds_hover_border_style.';';
}
//border color
$dds_hover_border_color      = cosmoswp_ifset($dds_icon_styling['hover-border-color']);
if ( $dds_hover_border_color ){
	$dds_icon_hover_css .= 'border-color:'.$dds_hover_border_color.';';
}
//border width
$dds_hover_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($dds_icon_styling['hover-border-width']),'desktop');
if (strpos($dds_hover_border_width, 'px') !== false) {
	$dds_icon_hover_css .= 'border-width:'.$dds_hover_border_width.';';
}
//border radius
$dds_hover_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($dds_icon_styling['hover-border-radius']),'desktop');
if (strpos($dds_hover_border_radius, 'px') !== false){
	$dds_icon_hover_css		.= 'border-radius:'.$dds_hover_border_radius.';';
}
//bx shadow
$dds_hover_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($dds_icon_styling['hover-box-shadow-css']),'desktop');
if (strpos($dds_hover_shadow_css, 'px') !== false) {
	$dds_hover_shadow_color  = cosmoswp_ifset($dds_icon_styling['hover-box-shadow-color']);
	$dds_hover_bx_shadow     = $dds_hover_shadow_css.' '.$dds_hover_shadow_color;
	$dds_icon_hover_css .=	'-webkit-box-shadow:'.$dds_hover_bx_shadow.';';
	$dds_icon_hover_css .=	'-moz-box-shadow:'.$dds_hover_bx_shadow.';';
	$dds_icon_hover_css .=	'box-shadow:'.$dds_hover_bx_shadow.';';
}	
if ( !empty( $dds_icon_hover_css )){
	$dds_search_hover_dynamic_css = '.cwp-search-dropdown .search-icon:hover,
	.cwp-search-dropdown .cwp-search-form-wrapper .search-form .search-submit:hover{
		'.$dds_icon_hover_css.'
	}';
	$local_dynamic_css['all'] .= $dds_search_hover_dynamic_css;
}?><?php 
/* Normal Search */
$normal_search_css         = '';
$normal_search_tablet_css  = '';
$normal_search_desktop_css = '';

$ns_styling   = cosmoswp_get_theme_options('normal-search-form-styling');
$ns_styling   = json_decode($ns_styling,true);
//txt color
$ns_txt_color     = cosmoswp_ifset($ns_styling['normal-text-color']);
if ( $ns_txt_color ){
	$normal_search_css .= 'color:'.$ns_txt_color.';';
}
//bg color
$ns_bg_color      = cosmoswp_ifset($ns_styling['normal-bg-color']);
if ( $ns_bg_color ){
	$normal_search_css .= 'background:'.$ns_bg_color.';';
}
else{
	$normal_search_css .= 'background:transparent;';
}
//border style
$ns_border_style      = cosmoswp_ifset($ns_styling['normal-border-style']);
if ( $ns_border_style ){
	$normal_search_css .= 'border-style:'.$ns_border_style.';';
}
//border color
$ns_border_color      = cosmoswp_ifset($ns_styling['normal-border-color']);
if ( $ns_border_color ){
	$normal_search_css .= 'border-color:'.$ns_border_color.';';
}
//border width
$ns_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($ns_styling['normal-border-width']),'desktop');
if (strpos($ns_border_width, 'px') !== false) {
	$normal_search_css .= 'border-width:'.$ns_border_width.';';
}
//border radius
$ns_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($ns_styling['normal-border-radius']),'desktop');
if (strpos($ns_border_radius, 'px') !== false){
	$normal_search_css		.= 'border-radius:'.$ns_border_radius.';';
}
//bx shadow
$ns_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($ns_styling['normal-box-shadow-css']),'desktop');
if (strpos($ns_shadow_css, 'px') !== false) {
	$ns_shadow_color  = cosmoswp_ifset($ns_styling['normal-box-shadow-color']);
	$ns_bx_shadow     = $ns_shadow_css.' '.$ns_shadow_color;
	$normal_search_css .=	'-webkit-box-shadow:'.$ns_bx_shadow.';';
	$normal_search_css .=	'-moz-box-shadow:'.$ns_bx_shadow.';';
	$normal_search_css .=	'box-shadow:'.$ns_bx_shadow.';';
}
//typography
$ns_typography_options = cosmoswp_get_theme_options('normal-search-typography-options');
if ('custom' == $ns_typography_options){
	$ns_typography         = cosmoswp_get_theme_options('normal-search-typography');
	$ns_typography         = json_decode($ns_typography,true);
	$ns_font_family     =  cosmoswp_font_family($ns_typography);
	if ( $ns_font_family ){
		$normal_search_css .=  'font-family:'.$ns_font_family.';';
		$ns_font_weight     = cosmoswp_font_weight( $ns_typography );
		if ( $ns_font_weight ){
			$normal_search_css .=  'font-weight:'.$ns_font_weight.';';
		}
		$ns_font_style      = cosmoswp_ifset($ns_typography['font-style']);
		if ( $ns_font_style ){
			$normal_search_css .=  'font-style:'.$ns_font_style.';';
		}
		$ns_text_decoration = cosmoswp_ifset($ns_typography['text-decoration']);
		if ( $ns_text_decoration ){
			$normal_search_css .=  'text-decoration:'.$ns_text_decoration.';';
		}
		$ns_text_transform  = cosmoswp_ifset($ns_typography['text-transform']);
		if ( $ns_text_transform ){
			$normal_search_css .=  'text-transform:'.$ns_text_transform.';';
		}
		$ns_font_size       = cosmoswp_ifset($ns_typography['font-size']['mobile']);
		if ( $ns_font_size ){
			$normal_search_css .=  'font-size:'.$ns_font_size.'px;';
		}
		$ns_line_height     = cosmoswp_ifset($ns_typography['line-height']['mobile']);
		if ( $ns_line_height ){
			$normal_search_css .=  'line-height:'.$ns_line_height.'px;';
		}
		$ns_letter_spacing  = cosmoswp_ifset($ns_typography['letter-spacing']['mobile']);
		if ( $ns_letter_spacing ){
			$normal_search_css .=  'letter-spacing:'.$ns_letter_spacing.'px;';
		}

		/* normal search tablet css */
		$ns_tablet_font_size       = cosmoswp_ifset($ns_typography['font-size']['tablet']);
		if ( $ns_tablet_font_size ){
			$normal_search_tablet_css .=  'font-size:'.$ns_tablet_font_size.'px;';
		}
		$ns_tablet_line_height     = cosmoswp_ifset($ns_typography['line-height']['tablet']);
		if ( $ns_tablet_line_height ){
			$normal_search_tablet_css .=  'line-height:'.$ns_tablet_line_height.'px;';
		}
		$ns_tablet_letter_spacing  = cosmoswp_ifset($ns_typography['letter-spacing']['tablet']);
		if ( $ns_tablet_letter_spacing ){
			$normal_search_tablet_css .=  'letter-spacing:'.$ns_tablet_letter_spacing.'px;';
		}

		/* normal search desktop css */
		$ns_desktop_font_size       = cosmoswp_ifset($ns_typography['font-size']['desktop']);
		if ( $ns_desktop_font_size ){
			$normal_search_desktop_css .=  'font-size:'.$ns_desktop_font_size.'px;';
		}
		$ns_desktop_line_height     = cosmoswp_ifset($ns_typography['line-height']['desktop']);
		if ( $ns_desktop_line_height ){
			$normal_search_desktop_css .=  'line-height:'.$ns_desktop_line_height.'px;';
		}
		$ns_desktop_letter_spacing  = cosmoswp_ifset($ns_typography['letter-spacing']['desktop']);
		if ( $ns_desktop_letter_spacing ){
			$normal_search_desktop_css .=  'letter-spacing:'.$ns_desktop_letter_spacing.'px;';
		}
	}

}

/* normal css for mobile css */
if ( !empty( $normal_search_css )){
	$normal_search_dynamic_css = '.cwp-search-box .cwp-search-form-wrapper .search-form .search-field{
		'.$normal_search_css.'
	}';
	$local_dynamic_css['all'] .= $normal_search_dynamic_css;
}

/* normal css for tablet css */
if ( !empty( $normal_search_tablet_css )){
	$normal_search_tablet_dynamic_css = '.cwp-search-box .cwp-search-form-wrapper .search-form .search-field{
		'.$normal_search_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $normal_search_tablet_dynamic_css;
}

/* normal css for desktop css */
if ( !empty( $normal_search_desktop_css )){
	$normal_search_desktop_dynamic_css = '.cwp-search-box .cwp-search-form-wrapper .search-form .search-field{
		'.$normal_search_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $normal_search_desktop_dynamic_css;
}

/*hover drop down search styling*/
$normal_search_hover_css = '';	
//txt color
$ns_hover_txt_color     = cosmoswp_ifset($ns_styling['hover-text-color']);
if ( $ns_hover_txt_color ){
	$normal_search_hover_css .= 'color:'.$ns_hover_txt_color.';';
}
//bg color
$ns_hover_bg_color      = cosmoswp_ifset($ns_styling['hover-bg-color']);
if ( $ns_hover_bg_color ){
	$normal_search_hover_css .= 'background-color:'.$ns_hover_bg_color.';';
}
//border style
$ns_hover_border_style      = cosmoswp_ifset($ns_styling['hover-border-style']);
if ( $ns_hover_border_style ){
	$normal_search_hover_css .= 'border-style:'.$ns_hover_border_style.';';
}
//border color
$ns_hover_border_color      = cosmoswp_ifset($ns_styling['hover-border-color']);
if ( $ns_hover_border_color ){
	$normal_search_hover_css .= 'border-color:'.$ns_hover_border_color.';';
}
//border width
$ns_hover_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($ns_styling['hover-border-width']),'desktop');
if (strpos($ns_hover_border_width, 'px') !== false) {
	$normal_search_hover_css .= 'border-width:'.$ns_hover_border_width.';';
}
//border radius
$ns_hover_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($ns_styling['hover-border-radius']),'desktop');
if (strpos($ns_hover_border_radius, 'px') !== false){
	$normal_search_hover_css		.= 'border-radius:'.$ns_hover_border_radius.';';
}
//bx shadow
$ns_hover_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($ns_styling['hover-box-shadow-css']),'desktop');
if (strpos($ns_hover_shadow_css, 'px') !== false) {
	$ns_hover_shadow_color  = cosmoswp_ifset($ns_styling['hover-box-shadow-color']);
	$ns_hover_bx_shadow     = $ns_hover_shadow_css.' '.$ns_hover_shadow_color;
	$normal_search_hover_css .=	'-webkit-box-shadow:'.$ns_hover_bx_shadow.';';
	$normal_search_hover_css .=	'-moz-box-shadow:'.$ns_hover_bx_shadow.';';
	$normal_search_hover_css .=	'box-shadow:'.$ns_hover_bx_shadow.';';
}	
if ( !empty( $normal_search_hover_css )){
	$ns_search_hover_dynamic_css = '.cwp-search-box .cwp-search-form-wrapper .search-form .search-field:hover{
		'.$normal_search_hover_css.'
	}';
	$local_dynamic_css['all'] .= $ns_search_hover_dynamic_css;
}
// normal Search Height
$ns_input_height_css = '';
$ns_input_height   = cosmoswp_get_theme_options('normal-search-input-height');
if ( $ns_input_height ){
	$ns_input_height_css .= 'height:'.$ns_input_height.'px;';
}
if ( !empty( $ns_input_height_css )){
	$ns_input_height_dynamic_css = '.cwp-search-box .cwp-search-form-wrapper .search-form .search-field,
	.cwp-search-box .cwp-search-form-wrapper .search-form .search-submit{
		'.$ns_input_height_css.'
	}';
	$local_dynamic_css['all'] .= $ns_input_height_dynamic_css;
}


/*Overlay Search Icon Styling*/
$nss_icon_css = $nss_icon_hover_css = '';
//icon size
$nss_icon_size     = cosmoswp_get_theme_options('normal-search-icon-size');
if ( $nss_icon_size ){
	$nss_icon_css .= 'font-size:'.$nss_icon_size.'px;';
}
$nss_icon_styling   = cosmoswp_get_theme_options('normal-search-icon-styling');
$nss_icon_styling   = json_decode($nss_icon_styling,true);
//txt color
$nss_txt_color     = cosmoswp_ifset($nss_icon_styling['normal-text-color']);
if ( $nss_txt_color ){
	$nss_icon_css .= 'color:'.$nss_txt_color.';';
}
//bg color
$nss_bg_color      = cosmoswp_ifset($nss_icon_styling['normal-bg-color']);
if ( $nss_bg_color ){
	$nss_icon_css .= 'background:'.$nss_bg_color.';';
}
else{
	$nss_icon_css .= 'background:transparent;';
}
//border style
$nss_border_style      = cosmoswp_ifset($nss_icon_styling['normal-border-style']);
if ( $nss_border_style ){
	$nss_icon_css .= 'border-style:'.$nss_border_style.';';
}
//border color
$nss_border_color      = cosmoswp_ifset($nss_icon_styling['normal-border-color']);
if ( $nss_border_color ){
	$nss_icon_css .= 'border-color:'.$nss_border_color.';';
}
//border width
$nss_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($nss_icon_styling['normal-border-width']),'desktop');
if (strpos($nss_border_width, 'px') !== false) {
	$nss_icon_css .= 'border-width:'.$nss_border_width.';';
}
//border radius
$nss_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($nss_icon_styling['normal-border-radius']),'desktop');
if (strpos($nss_border_radius, 'px') !== false){
	$nss_icon_css		.= 'border-radius:'.$nss_border_radius.';';
}
//bx shadow
$nss_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($nss_icon_styling['normal-box-shadow-css']),'desktop');
if (strpos($nss_shadow_css, 'px') !== false) {
	$nss_shadow_color  = cosmoswp_ifset($nss_icon_styling['normal-box-shadow-color']);
	$nss_bx_shadow     = $nss_shadow_css.' '.$nss_shadow_color;
	$nss_icon_css .=	'-webkit-box-shadow:'.$nss_bx_shadow.';';
	$nss_icon_css .=	'-moz-box-shadow:'.$nss_bx_shadow.';';
	$nss_icon_css .=	'box-shadow:'.$nss_bx_shadow.';';
}
$nss_icon_tablet_css  = '';
$nss_icon_desktop_css = '';
/* margin */
$nss_margin = cosmoswp_get_theme_options('normal-search-margin');
$nss_margin = json_decode($nss_margin,true);

// desktop margin 
$nss_margin_desktop = cosmoswp_cssbox_values_inline($nss_margin,'desktop');
if (strpos($nss_margin_desktop, 'px') !== false){
	$nss_icon_desktop_css		.= 'margin:'.$nss_margin_desktop.';';
}
// tablet marign 
$nss_margin_tablet  = cosmoswp_cssbox_values_inline($nss_margin,'tablet');
if (strpos($nss_margin_tablet, 'px') !== false){
	$nss_icon_tablet_css		.= 'margin:'.$nss_margin_tablet.';';
}
// mobile margin 
$nss_margin_mobile  = cosmoswp_cssbox_values_inline($nss_margin,'mobile');
if (strpos($nss_margin_mobile, 'px') !== false){
	$nss_icon_css		.= 'margin:'.$nss_margin_mobile.';';
}
/* padding */
$nss_padding = cosmoswp_get_theme_options('normal-search-padding');
$nss_padding = json_decode($nss_padding,true);

// desktop padding
$nss_padding_desktop = cosmoswp_cssbox_values_inline($nss_padding,'desktop');
if (strpos($nss_padding_desktop, 'px') !== false){
	$nss_icon_desktop_css		.= 'padding:'.$nss_padding_desktop.';';
}
//tablet padding
$nss_padding_tablet  = cosmoswp_cssbox_values_inline($nss_padding,'tablet');
if (strpos($nss_padding_tablet, 'px') !== false){
	$nss_icon_tablet_css		.= 'padding:'.$nss_padding_tablet.';';
}
//mobile padding
$nss_padding_mobile  = cosmoswp_cssbox_values_inline($nss_padding,'mobile');
if (strpos($nss_padding_mobile, 'px') !== false){
	$nss_icon_css		.= 'padding:'.$nss_padding_mobile.';';
}

/* mobile css */
if ( !empty( $nss_icon_css )){
	$nss_search_dynamic_css = '.cwp-search-box .search-submit{
		'.$nss_icon_css.'
	}';
	$local_dynamic_css['all'] .= $nss_search_dynamic_css;
}

/* tablet css */
if ( !empty( $nss_icon_tablet_css )){
	$nss_icon_tablet_dynamic_css = '.cwp-search-box .search-submit{
		'.$nss_icon_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $nss_icon_tablet_dynamic_css;
}

/* desktop css */
if ( !empty( $nss_icon_desktop_css )){
	$nss_icon_desktop_dynamic_css = '.cwp-search-box .search-submit{
		'.$nss_icon_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $nss_icon_desktop_dynamic_css;
}

//txt color
$nss_hover_txt_color     = cosmoswp_ifset($nss_icon_styling['hover-text-color']);
if ( $nss_hover_txt_color ){
	$nss_icon_hover_css .= 'color:'.$nss_hover_txt_color.';';
}
//bg color
$nss_hover_bg_color      = cosmoswp_ifset($nss_icon_styling['hover-bg-color']);
if ( $nss_hover_bg_color ){
	$nss_icon_hover_css .= 'background-color:'.$nss_hover_bg_color.';';
}
//border style
$nss_hover_border_style      = cosmoswp_ifset($nss_icon_styling['hover-border-style']);
if ( $nss_hover_border_style ){
	$nss_icon_hover_css .= 'border-style:'.$nss_hover_border_style.';';
}
//border color
$nss_hover_border_color      = cosmoswp_ifset($nss_icon_styling['hover-border-color']);
if ( $nss_hover_border_color ){
	$nss_icon_hover_css .= 'border-color:'.$nss_hover_border_color.';';
}
//border width
$nss_hover_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($nss_icon_styling['hover-border-width']),'desktop');
if (strpos($nss_hover_border_width, 'px') !== false) {
	$nss_icon_hover_css .= 'border-width:'.$nss_hover_border_width.';';
}
//border radius
$nss_hover_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($nss_icon_styling['hover-border-radius']),'desktop');
if (strpos($nss_hover_border_radius, 'px') !== false){
	$nss_icon_hover_css		.= 'border-radius:'.$nss_hover_border_radius.';';
}
//bx shadow
$nss_hover_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($nss_icon_styling['hover-box-shadow-css']),'desktop');
if (strpos($nss_hover_shadow_css, 'px') !== false) {
	$nss_hover_shadow_color  = cosmoswp_ifset($nss_icon_styling['hover-box-shadow-color']);
	$nss_hover_bx_shadow     = $nss_hover_shadow_css.' '.$nss_hover_shadow_color;
	$nss_icon_hover_css .=	'-webkit-box-shadow:'.$nss_hover_bx_shadow.';';
	$nss_icon_hover_css .=	'-moz-box-shadow:'.$nss_hover_bx_shadow.';';
	$nss_icon_hover_css .=	'box-shadow:'.$nss_hover_bx_shadow.';';
}	
if ( !empty( $nss_icon_hover_css )){
	$nss_search_hover_dynamic_css = '.cwp-search-box .search-submit:hover{
		'.$nss_icon_hover_css.'
	}';
	$local_dynamic_css['all'] .= $nss_search_hover_dynamic_css;
}?><?php 
/*button one*/
$button_one_css         = '';
$button_one_tablet_css  = '';
$button_one_desktop_css = '';

$button_one_styling   = cosmoswp_get_theme_options('button-one-styling');
$button_one_styling   = json_decode($button_one_styling,true);
//txt color
$button_one_txt_color     = cosmoswp_ifset($button_one_styling['normal-text-color']);
if ( $button_one_txt_color ){
	$button_one_css .= 'color:'.$button_one_txt_color.';';
}
//bg color
$button_one_bg_color      = cosmoswp_ifset($button_one_styling['normal-bg-color']);
if ( $button_one_bg_color ){
	$button_one_css .= 'background:'.$button_one_bg_color.';';
}
else{
	$button_one_css .= 'background:transparent;';
}
//border style
$button_one_border_style      = cosmoswp_ifset($button_one_styling['normal-border-style']);
if ( $button_one_border_style ){
	$button_one_css .= 'border-style:'.$button_one_border_style.';';
}
//border color
$button_one_border_color      = cosmoswp_ifset($button_one_styling['normal-border-color']);
if ( $button_one_border_color ){
	$button_one_css .= 'border-color:'.$button_one_border_color.';';
}
//border width
$button_one_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($button_one_styling['normal-border-width']),'desktop');
if (strpos($button_one_border_width, 'px') !== false) {
	$button_one_css .= 'border-width:'.$button_one_border_width.';';
}
//border radius
$button_one_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($button_one_styling['normal-border-radius']),'desktop');
if (strpos($button_one_border_radius, 'px') !== false){
	$button_one_css		.= 'border-radius:'.$button_one_border_radius.';';
}
//bx shadow
$button_one_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($button_one_styling['normal-box-shadow-css']),'desktop');
if (strpos($button_one_shadow_css, 'px') !== false) {
	$button_one_shadow_color = cosmoswp_ifset($button_one_styling['normal-box-shadow-color']);
	$button_one_bx_shadow    = $button_one_shadow_css.' '.$button_one_shadow_color;
	$button_one_css          .=	'-webkit-box-shadow:'.$button_one_bx_shadow.';';
	$button_one_css          .=	'-moz-box-shadow:'.$button_one_bx_shadow.';';
	$button_one_css          .=	'box-shadow:'.$button_one_bx_shadow.';';
}
//typography
$button_one_typography_options = cosmoswp_get_theme_options('button-one-typography-options');
if ('custom' == $button_one_typography_options){
	$button_one_typography         = cosmoswp_get_theme_options('button-one-typography');
	$button_one_typography         = json_decode($button_one_typography,true);

	$button_one_font_family     =  cosmoswp_font_family($button_one_typography);
	if ( $button_one_font_family ){
		$button_one_css .=  'font-family:'.$button_one_font_family.';';
		$button_one_font_weight     = cosmoswp_font_weight( $button_one_typography );
		if ( $button_one_font_weight ){
			$button_one_css .=  'font-weight:'.$button_one_font_weight.';';
		}
		$button_one_font_style      = cosmoswp_ifset($button_one_typography['font-style']);
		if ( $button_one_font_style ){
			$button_one_css .=  'font-style:'.$button_one_font_style.';';
		}
		$button_one_text_decoration = cosmoswp_ifset($button_one_typography['text-decoration']);
		if ( $button_one_text_decoration ){
			$button_one_css .=  'text-decoration:'.$button_one_text_decoration.';';
		}
		$button_one_text_transform  = cosmoswp_ifset($button_one_typography['text-transform']);
		if ( $button_one_text_transform ){
			$button_one_css .=  'text-transform:'.$button_one_text_transform.';';
		}
		$button_one_font_size       = cosmoswp_ifset($button_one_typography['font-size']['mobile']);
		if ( $button_one_font_size ){
			$button_one_css .=  'font-size:'.$button_one_font_size.'px;';
		}
		$button_one_line_height     = cosmoswp_ifset($button_one_typography['line-height']['mobile']);
		if ( $button_one_line_height ){
			$button_one_css .=  'line-height:'.$button_one_line_height.'px;';
		}
		$button_one_letter_spacing  = cosmoswp_ifset($button_one_typography['letter-spacing']['mobile']);
		if ( $button_one_letter_spacing ){
			$button_one_css .=  'letter-spacing:'.$button_one_letter_spacing.'px;';
		}

		/* button one tablet css */
		$button_one_tablet_font_size       = cosmoswp_ifset($button_one_typography['font-size']['tablet']);
		if ( $button_one_tablet_font_size ){
			$button_one_tablet_css .=  'font-size:'.$button_one_tablet_font_size.'px;';
		}
		$button_one_tablet_line_height     = cosmoswp_ifset($button_one_typography['line-height']['tablet']);
		if ( $button_one_tablet_line_height ){
			$button_one_tablet_css .=  'line-height:'.$button_one_tablet_line_height.'px;';
		}
		$button_one_tablet_letter_spacing  = cosmoswp_ifset($button_one_typography['letter-spacing']['tablet']);
		if ( $button_one_tablet_letter_spacing ){
			$button_one_tablet_css .=  'letter-spacing:'.$button_one_tablet_letter_spacing.'px;';
		}

		/* button one desktop css */
		$button_one_desktop_font_size       = cosmoswp_ifset($button_one_typography['font-size']['desktop']);
		if ( $button_one_desktop_font_size ){
			$button_one_desktop_css .=  'font-size:'.$button_one_desktop_font_size.'px;';
		}
		$button_one_desktop_line_height     = cosmoswp_ifset($button_one_typography['line-height']['desktop']);
		if ( $button_one_desktop_line_height ){
			$button_one_desktop_css .=  'line-height:'.$button_one_desktop_line_height.'px;';
		}
		$button_one_desktop_letter_spacing  = cosmoswp_ifset($button_one_typography['letter-spacing']['desktop']);
		if ( $button_one_desktop_letter_spacing ){
			$button_one_desktop_css .=  'letter-spacing:'.$button_one_desktop_letter_spacing.'px;';
		}
	}
}


/* marign  */
$button_one_margin = cosmoswp_get_theme_options('button-one-margin');
$button_one_margin = json_decode($button_one_margin,true);

// desktop margin 
$btn1_margin_desktop = cosmoswp_cssbox_values_inline($button_one_margin,'desktop');
if (strpos($btn1_margin_desktop, 'px') !== false){
	$button_one_desktop_css		.= 'margin:'.$btn1_margin_desktop.';';
}
// tablet marign 
$btn1_margin_tablet  = cosmoswp_cssbox_values_inline($button_one_margin,'tablet');
if (strpos($btn1_margin_tablet, 'px') !== false){
	$button_one_tablet_css		.= 'margin:'.$btn1_margin_tablet.';';
}
// mobile margin 
$btn1_margin_mobile  = cosmoswp_cssbox_values_inline($button_one_margin,'mobile');
if (strpos($btn1_margin_mobile, 'px') !== false){
	$button_one_css		.= 'margin:'.$btn1_margin_mobile.';';
}


/* padding */
$button_one_padding = cosmoswp_get_theme_options('button-one-padding');
$button_one_padding = json_decode($button_one_padding,true);

// desktop padding
$btn1_padding_desktop = cosmoswp_cssbox_values_inline($button_one_padding,'desktop');
if (strpos($btn1_padding_desktop, 'px') !== false){
	$button_one_desktop_css		.= 'padding:'.$btn1_padding_desktop.';';
}
//tablet padding
$btn1_padding_tablet  = cosmoswp_cssbox_values_inline($button_one_padding,'tablet');
if (strpos($btn1_padding_tablet, 'px') !== false){
	$button_one_tablet_css		.= 'padding:'.$btn1_padding_tablet.';';
}
//mobile padding
$btn1_padding_mobile  = cosmoswp_cssbox_values_inline($button_one_padding,'mobile');
if (strpos($btn1_padding_mobile, 'px') !== false){
	$button_one_css		.= 'padding:'.$btn1_padding_mobile.';';
}

/* mobile css */
if ( !empty( $button_one_css )){
	$button_one_dynamic_css = '.cwp-button-one .btn{
		'.$button_one_css.'
	}';
	$local_dynamic_css['all'] .= $button_one_dynamic_css;
}

/* tablet css */
if ( !empty($button_one_tablet_css) ){
	$button_one_tablet_dynamic_css = '.cwp-button-one .btn{
		'.$button_one_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $button_one_tablet_dynamic_css;
}

/* desktop css */
if ( !empty($button_one_desktop_css) ){
	$button_one_desktop_dynamic_css = '.cwp-button-one .btn{
		'.$button_one_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $button_one_desktop_dynamic_css;
}


$button_one_hover_css = '';	
//txt color
$button_one_hover_txt_color     = cosmoswp_ifset($button_one_styling['hover-text-color']);
if ( $button_one_hover_txt_color ){
	$button_one_hover_css .= 'color:'.$button_one_hover_txt_color.';';
}
//bg color
$button_one_hover_bg_color      = cosmoswp_ifset($button_one_styling['hover-bg-color']);
if ( $button_one_hover_bg_color ){
	$button_one_hover_css .= 'background-color:'.$button_one_hover_bg_color.';';
}
//border style
$button_one_hover_border_style      = cosmoswp_ifset($button_one_styling['hover-border-style']);
if ( $button_one_hover_border_style ){
	$button_one_hover_css .= 'border-style:'.$button_one_hover_border_style.';';
}
//border color
$button_one_hover_border_color      = cosmoswp_ifset($button_one_styling['hover-border-color']);
if ( $button_one_hover_border_color ){
	$button_one_hover_css .= 'border-color:'.$button_one_hover_border_color.';';
}
//border width
$button_one_hover_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($button_one_styling['hover-border-width']),'desktop');
if (strpos($button_one_hover_border_width, 'px') !== false) {
	$button_one_hover_css .= 'border-width:'.$button_one_hover_border_width.';';
}
//border radius
$button_one_hover_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($button_one_styling['hover-border-radius']),'desktop');
if (strpos($button_one_hover_border_radius, 'px') !== false){
	$button_one_hover_css		.= 'border-radius:'.$button_one_hover_border_radius.';';
}
//bx shadow
$button_one_hover_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($button_one_styling['hover-box-shadow-css']),'desktop');
if (strpos($button_one_hover_shadow_css, 'px') !== false) {
	$button_one_hover_shadow_color = cosmoswp_ifset($button_one_styling['hover-box-shadow-color']);
	$button_one_hover_bx_shadow    = $button_one_hover_shadow_css.' '.$button_one_hover_shadow_color;
	$button_one_hover_css          .=	'-webkit-box-shadow:'.$button_one_hover_bx_shadow.';';
	$button_one_hover_css          .=	'-moz-box-shadow:'.$button_one_hover_bx_shadow.';';
	$button_one_hover_css          .=	'box-shadow:'.$button_one_hover_bx_shadow.';';
}	
if ( !empty( $button_one_hover_css )){
	$button_one_hover_dynamic_css = '.cwp-button-one .btn:hover,.cwp-button-one .btn:focus{
		'.$button_one_hover_css.'
	}';
	$local_dynamic_css['all'] .= $button_one_hover_dynamic_css;
}
?><?php
/* Secondary Menu styling*/
$secondary_menu_layout_css = '';
$secondary_menu_layout_tablet_css  = '';
$secondary_menu_layout_desktop_css = '';
/* marign */
$secondary_menu_margin = cosmoswp_get_theme_options('secondary-menu-margin');
$secondary_menu_margin = json_decode($secondary_menu_margin,true);

// desktop margin 
$secondary_menu_margin_desktop = cosmoswp_cssbox_values_inline($secondary_menu_margin,'desktop');
if (strpos($secondary_menu_margin_desktop, 'px') !== false){
	$secondary_menu_layout_desktop_css		.= 'margin:'.$secondary_menu_margin_desktop.';';
}
// tablet marign 
$secondary_menu_margin_tablet  = cosmoswp_cssbox_values_inline($secondary_menu_margin,'tablet');
if (strpos($secondary_menu_margin_tablet, 'px') !== false){
	$secondary_menu_layout_tablet_css		.= 'margin:'.$secondary_menu_margin_tablet.';';
}
// mobile margin 
$secondary_menu_margin_mobile  = cosmoswp_cssbox_values_inline($secondary_menu_margin,'mobile');
if (strpos($secondary_menu_margin_mobile, 'px') !== false){
	$secondary_menu_layout_css		.= 'margin:'.$secondary_menu_margin_mobile.';';
}

/* padding */
$secondary_menu_padding = cosmoswp_get_theme_options('secondary-menu-padding');
$secondary_menu_padding = json_decode($secondary_menu_padding,true);

// desktop padding
$secondary_menu_padding_desktop = cosmoswp_cssbox_values_inline($secondary_menu_padding,'desktop');
if (strpos($secondary_menu_padding_desktop, 'px') !== false){
	$secondary_menu_layout_desktop_css		.= 'padding:'.$secondary_menu_padding_desktop.';';
}
//tablet padding
$secondary_menu_padding_tablet  = cosmoswp_cssbox_values_inline($secondary_menu_padding,'tablet');
if (strpos($secondary_menu_padding_tablet, 'px') !== false){
	$secondary_menu_layout_tablet_css		.= 'padding:'.$secondary_menu_padding_tablet.';';
}
//mobile padding
$secondary_menu_padding_mobile  = cosmoswp_cssbox_values_inline($secondary_menu_padding,'mobile');
if (strpos($secondary_menu_padding_mobile, 'px') !== false){
	$secondary_menu_layout_css		.= 'padding:'.$secondary_menu_padding_mobile.';';
}


// mobile css
if ( !empty( $secondary_menu_layout_css )){
	$secondary_menu_layout_dynamic_css = '.cwp-secondary-menu{
		'.$secondary_menu_layout_css.'
	}';
	$local_dynamic_css['all'] .= $secondary_menu_layout_dynamic_css;
}

// tablet css 
if ( !empty($secondary_menu_layout_tablet_css) ){
	$secondary_menu_tablet_dynamic_css = '.cwp-secondary-menu{
		'.$secondary_menu_layout_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $secondary_menu_tablet_dynamic_css;
}

// desktop css 
if ( !empty($secondary_menu_layout_desktop_css) ){
	$secondary_menu_desktop_dynamic_css = '.cwp-secondary-menu{
		'.$secondary_menu_layout_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $secondary_menu_desktop_dynamic_css;
}


// secondary menu item styling
$secondary_menu_css = '';
$secondary_menu_item_tablet_css  = '';
$secondary_menu_item_desktop_css = '';

$secondary_menu_styling   = cosmoswp_get_theme_options('secondary-menu-styling');
$secondary_menu_styling   = json_decode($secondary_menu_styling,true);
//txt color
$secondary_menu_txt_color     = cosmoswp_ifset($secondary_menu_styling['normal-text-color']);
if ( $secondary_menu_txt_color ){
	$secondary_menu_css .= 'color:'.$secondary_menu_txt_color.';';
}
//bg color
$secondary_menu_bg_color      = cosmoswp_ifset($secondary_menu_styling['normal-bg-color']);
if ( $secondary_menu_bg_color ){
	$secondary_menu_css .= 'background-color:'.$secondary_menu_bg_color.';';
}
//border style
$secondary_menu_border_style      = cosmoswp_ifset($secondary_menu_styling['normal-border-style']);
if ( $secondary_menu_border_style ){
	$secondary_menu_css .= 'border-style:'.$secondary_menu_border_style.';';
}
//border color
$secondary_menu_border_color      = cosmoswp_ifset($secondary_menu_styling['normal-border-color']);
if ( $secondary_menu_border_color ){
	$secondary_menu_css .= 'border-color:'.$secondary_menu_border_color.';';
}
//border width
$secondary_menu_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($secondary_menu_styling['normal-border-width']),'desktop');
if (strpos($secondary_menu_border_width, 'px') !== false) {
	$secondary_menu_css .= 'border-width:'.$secondary_menu_border_width.';';
}
//border radius
$secondary_menu_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($secondary_menu_styling['normal-border-radius']),'desktop');
if (strpos($secondary_menu_border_radius, 'px') !== false){
	$secondary_menu_css		.= 'border-radius:'.$secondary_menu_border_radius.';';
}
//typography
$secondary_menu_typography_options = cosmoswp_get_theme_options('secondary-menu-typography-options');
if ('custom' == $secondary_menu_typography_options){
	$secondary_menu_typography         = cosmoswp_get_theme_options('secondary-menu-typography');
	$secondary_menu_typography         = json_decode($secondary_menu_typography,true);

	$secondary_menu_font_family     =  cosmoswp_font_family($secondary_menu_typography);
	if ( $secondary_menu_font_family ){
		$secondary_menu_css .=  'font-family:'.$secondary_menu_font_family.';';
		$secondary_menu_font_weight     = cosmoswp_font_weight( $secondary_menu_typography );
		if ( $secondary_menu_font_weight ){
			$secondary_menu_css .=  'font-weight:'.$secondary_menu_font_weight.';';
		}
		$secondary_menu_font_style      = cosmoswp_ifset($secondary_menu_typography['font-style']);
		if ( $secondary_menu_font_style ){
			$secondary_menu_css .=  'font-style:'.$secondary_menu_font_style.';';
		}
		$secondary_menu_text_decoration = cosmoswp_ifset($secondary_menu_typography['text-decoration']);
		if ( $secondary_menu_text_decoration ){
			$secondary_menu_css .=  'text-decoration:'.$secondary_menu_text_decoration.';';
		}
		$secondary_menu_text_transform  = cosmoswp_ifset($secondary_menu_typography['text-transform']);
		if ( $secondary_menu_text_transform ){
			$secondary_menu_css .=  'text-transform:'.$secondary_menu_text_transform.';';
		}
		$secondary_menu_font_size       = cosmoswp_ifset($secondary_menu_typography['font-size']['mobile']);
		if ( $secondary_menu_font_size ){
			$secondary_menu_css .=  'font-size:'.$secondary_menu_font_size.'px;';
		}
		$secondary_menu_line_height     = cosmoswp_ifset($secondary_menu_typography['line-height']['mobile']);
		if ( $secondary_menu_line_height ){
			$secondary_menu_css .=  'line-height:'.$secondary_menu_line_height.'px;';
		}
		$secondary_menu_letter_spacing  = cosmoswp_ifset($secondary_menu_typography['letter-spacing']['mobile']);
		if ( $secondary_menu_letter_spacing ){
			$secondary_menu_css .=  'letter-spacing:'.$secondary_menu_letter_spacing.'px;';
		}


		/* secondary menu tablet css */
		$secondary_menu_tablet_font_size       = cosmoswp_ifset($secondary_menu_typography['font-size']['tablet']);
		if ( $secondary_menu_tablet_font_size ){
			$secondary_menu_item_tablet_css .=  'font-size:'.$secondary_menu_tablet_font_size.'px;';
		}
		$secondary_menu_tablet_line_height     = cosmoswp_ifset($secondary_menu_typography['line-height']['tablet']);
		if ( $secondary_menu_tablet_line_height ){
			$secondary_menu_item_tablet_css .=  'line-height:'.$secondary_menu_tablet_line_height.'px;';
		}
		$secondary_menu_tablet_letter_spacing  = cosmoswp_ifset($secondary_menu_typography['letter-spacing']['tablet']);
		if ( $secondary_menu_tablet_letter_spacing ){
			$secondary_menu_item_tablet_css .=  'letter-spacing:'.$secondary_menu_tablet_letter_spacing.'px;';
		}

		/* secondary menu  desktop css */
		$secondary_menu_desktop_font_size       = cosmoswp_ifset($secondary_menu_typography['font-size']['desktop']);
		if ( $secondary_menu_desktop_font_size ){
			$secondary_menu_item_desktop_css .=  'font-size:'.$secondary_menu_desktop_font_size.'px;';
		}
		$secondary_menu_desktop_line_height     = cosmoswp_ifset($secondary_menu_typography['line-height']['desktop']);
		if ( $secondary_menu_desktop_line_height ){
			$secondary_menu_item_desktop_css .=  'line-height:'.$secondary_menu_desktop_line_height.'px;';
		}
		$secondary_menu_desktop_letter_spacing  = cosmoswp_ifset($secondary_menu_typography['letter-spacing']['desktop']);
		if ( $secondary_menu_desktop_letter_spacing ){
			$secondary_menu_item_desktop_css .=  'letter-spacing:'.$secondary_menu_desktop_letter_spacing.'px;';
		}
	}

}

/* secondary menu item margin */
$secondary_menu_item_margin = cosmoswp_get_theme_options('secondary-menu-item-margin');
$secondary_menu_item_margin = json_decode($secondary_menu_item_margin,true);

// desktop margin 
$secondary_menu_item_margin_desktop = cosmoswp_cssbox_values_inline($secondary_menu_item_margin,'desktop');
if (strpos($secondary_menu_item_margin_desktop, 'px') !== false){
	$secondary_menu_item_desktop_css		.= 'margin:'.$secondary_menu_item_margin_desktop.';';
}
// tablet marign 
$secondary_menu_item_margin_tablet  = cosmoswp_cssbox_values_inline($secondary_menu_item_margin,'tablet');
if (strpos($secondary_menu_item_margin_tablet, 'px') !== false){
	$secondary_menu_item_tablet_css		.= 'margin:'.$secondary_menu_item_margin_tablet.';';
}
// mobile margin 
$secondary_menu_item_margin_mobile  = cosmoswp_cssbox_values_inline($secondary_menu_item_margin,'mobile');
if (strpos($secondary_menu_item_margin_mobile, 'px') !== false){
	$secondary_menu_css		.= 'margin:'.$secondary_menu_item_margin_mobile.';';
}

/* scondary menu item padding */
$secondary_menu_item_padding = cosmoswp_get_theme_options('secondary-menu-item-padding');
$secondary_menu_item_padding = json_decode($secondary_menu_item_padding,true);

// desktop padding
$secondary_menu_item_padding_desktop = cosmoswp_cssbox_values_inline($secondary_menu_item_padding,'desktop');
if (strpos($secondary_menu_item_padding_desktop, 'px') !== false){
	$secondary_menu_item_desktop_css		.= 'padding:'.$secondary_menu_item_padding_desktop.';';
}
//tablet padding
$secondary_menu_item_padding_tablet  = cosmoswp_cssbox_values_inline($secondary_menu_item_padding,'tablet');
if (strpos($secondary_menu_item_padding_tablet, 'px') !== false){
	$secondary_menu_item_tablet_css		.= 'padding:'.$secondary_menu_item_padding_tablet.';';
}
//mobile padding
$secondary_menu_item_padding_mobile  = cosmoswp_cssbox_values_inline($secondary_menu_item_padding,'mobile');
if (strpos($secondary_menu_item_padding_mobile, 'px') !== false){
	$secondary_menu_css		.= 'padding:'.$secondary_menu_item_padding_mobile.';';
}
if ( !empty( $secondary_menu_css )){
	$secondary_menu_search_dynamic_css = '.cwp-secondary-menu li a{
		'.$secondary_menu_css.'
	}';
	$local_dynamic_css['all'] .= $secondary_menu_search_dynamic_css;
}

// tablet css 
if ( !empty($secondary_menu_item_tablet_css) ){
	$secondary_menu_item_tablet_dynamic_css = '.cwp-secondary-menu li a{
		'.$secondary_menu_item_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $secondary_menu_item_tablet_dynamic_css;
}

// desktop css 
if ( !empty($secondary_menu_item_desktop_css) ){
	$secondary_menu_item_desktop_dynamic_css = '.cwp-secondary-menu li a{
		'.$secondary_menu_item_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $secondary_menu_item_desktop_dynamic_css;
}

/* hover secondary menu item styling */
$secondary_menu_hover_css = '';	
//txt color
$secondary_menu_hover_txt_color     = cosmoswp_ifset($secondary_menu_styling['hover-text-color']);
if ( $secondary_menu_hover_txt_color ){
	$secondary_menu_hover_css .= 'color:'.$secondary_menu_hover_txt_color.';';
}
//bg color
$secondary_menu_hover_bg_color      = cosmoswp_ifset($secondary_menu_styling['hover-bg-color']);
if ( $secondary_menu_hover_bg_color ){
	$secondary_menu_hover_css .= 'background-color:'.$secondary_menu_hover_bg_color.';';
}
//border style
$secondary_menu_hover_border_style      = cosmoswp_ifset($secondary_menu_styling['hover-border-style']);
if ( $secondary_menu_hover_border_style ){
	$secondary_menu_hover_css .= 'border-style:'.$secondary_menu_hover_border_style.';';
}
//border color
$secondary_menu_hover_border_color      = cosmoswp_ifset($secondary_menu_styling['hover-border-color']);
if ( $secondary_menu_hover_border_color ){
	$secondary_menu_hover_css .= 'border-color:'.$secondary_menu_hover_border_color.';';
}
//border width
$secondary_menu_hover_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($secondary_menu_styling['hover-border-width']),'desktop');
if (strpos($secondary_menu_hover_border_width, 'px') !== false) {
	$secondary_menu_hover_css .= 'border-width:'.$secondary_menu_hover_border_width.';';
}
//border radius
$secondary_menu_hover_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($secondary_menu_styling['hover-border-radius']),'desktop');
if (strpos($secondary_menu_hover_border_radius, 'px') !== false){
	$secondary_menu_hover_css		.= 'border-radius:'.$secondary_menu_hover_border_radius.';';
}
if ( !empty( $secondary_menu_hover_css )){
	$secondary_menu_hover_dynamic_css = '.cwp-secondary-menu li a:hover,
	.cwp-secondary-menu li a:focus{
		'.$secondary_menu_hover_css.'
	}';
	$local_dynamic_css['all'] .= $secondary_menu_hover_dynamic_css;
}

/* secondary menu active item styling */
$secondary_menu_active_css = '';	
//txt color
$secondary_menu_active_txt_color     = cosmoswp_ifset($secondary_menu_styling['active-text-color']);
if ( $secondary_menu_active_txt_color ){
	$secondary_menu_active_css .= 'color:'.$secondary_menu_active_txt_color.';';
}
//bg color
$secondary_menu_active_bg_color      = cosmoswp_ifset($secondary_menu_styling['active-bg-color']);
if ( $secondary_menu_active_bg_color ){
	$secondary_menu_active_css .= 'background-color:'.$secondary_menu_active_bg_color.';';
}
//border style
$secondary_menu_active_border_style      = cosmoswp_ifset($secondary_menu_styling['active-border-style']);
if ( $secondary_menu_active_border_style ){
	$secondary_menu_active_css .= 'border-style:'.$secondary_menu_active_border_style.';';
}
//border color
$secondary_menu_active_border_color      = cosmoswp_ifset($secondary_menu_styling['active-border-color']);
if ( $secondary_menu_active_border_color ){
	$secondary_menu_active_css .= 'border-color:'.$secondary_menu_active_border_color.';';
}
//border width
$secondary_menu_active_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($secondary_menu_styling['active-border-width']),'desktop');
if (strpos($secondary_menu_active_border_width, 'px') !== false) {
	$secondary_menu_active_css .= 'border-width:'.$secondary_menu_active_border_width.';';
}
//border radius
$secondary_menu_active_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($secondary_menu_styling['active-border-radius']),'desktop');
if (strpos($secondary_menu_active_border_radius, 'px') !== false){
	$secondary_menu_active_css		.= 'border-radius:'.$secondary_menu_active_border_radius.';';
}
if ( !empty( $secondary_menu_active_css )){
	$secondary_menu_active_dynamic_css = '.cwp-secondary-menu li.active a,
	.cwp-secondary-menu li:active a,
	.cwp-secondary-menu li.current-menu-item a{
		'.$secondary_menu_active_css.'
	}';
	$local_dynamic_css['all'] .= $secondary_menu_active_dynamic_css;
}

/*Secondary menu submenu item*/
$sm_submenu_css         = '';
$sm_submenu_tablet_css  = '';
$sm_submenu_desktop_css = '';

$sm_submenu_styling   = cosmoswp_get_theme_options('secondary-menu-submenu-styling');
$sm_submenu_styling   = json_decode($sm_submenu_styling,true);
//txt color
$sm_submenu_txt_color     = cosmoswp_ifset($sm_submenu_styling['normal-text-color']);
if ( $sm_submenu_txt_color ){
	$sm_submenu_css .= 'color:'.$sm_submenu_txt_color.';';
}
//bg color
$sm_submenu_bg_color      = cosmoswp_ifset($sm_submenu_styling['normal-bg-color']);
if ( $sm_submenu_bg_color ){
	$sm_submenu_css .= 'background-color:'.$sm_submenu_bg_color.';';
}
//border style
$sm_submenu_border_style      = cosmoswp_ifset($sm_submenu_styling['normal-border-style']);
if ( $sm_submenu_border_style ){
	$sm_submenu_css .= 'border-style:'.$sm_submenu_border_style.';';
}
//border color
$sm_submenu_border_color      = cosmoswp_ifset($sm_submenu_styling['normal-border-color']);
if ( $sm_submenu_border_color ){
	$sm_submenu_css .= 'border-color:'.$sm_submenu_border_color.';';
}
//border width
$sm_submenu_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($sm_submenu_styling['normal-border-width']),'desktop');
if (strpos($sm_submenu_border_width, 'px') !== false) {
	$sm_submenu_css .= 'border-width:'.$sm_submenu_border_width.';';
}
//border radius
$sm_submenu_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($sm_submenu_styling['normal-border-radius']),'desktop');
if (strpos($sm_submenu_border_radius, 'px') !== false){
	$sm_submenu_css		.= 'border-radius:'.$sm_submenu_border_radius.';';
}
//typography
$sm_submenu_typography_options = cosmoswp_get_theme_options('secondary-menu-submenu-typography-options');
if ('custom' == $sm_submenu_typography_options){
	$sm_submenu_typography         = cosmoswp_get_theme_options('secondary-menu-submenu-typography');
	$sm_submenu_typography         = json_decode($sm_submenu_typography,true);

	$sm_submenu_font_family     =  cosmoswp_font_family($sm_submenu_typography);
	if ( $sm_submenu_font_family ){
		$sm_submenu_css .=  'font-family:'.$sm_submenu_font_family.';';
		$sm_submenu_font_weight     = cosmoswp_font_weight( $sm_submenu_typography );
		if ( $sm_submenu_font_weight ){
			$sm_submenu_css .=  'font-weight:'.$sm_submenu_font_weight.';';
		}
		$sm_submenu_font_style      = cosmoswp_ifset($sm_submenu_typography['font-style']);
		if ( $sm_submenu_font_style ){
			$sm_submenu_css .=  'font-style:'.$sm_submenu_font_style.';';
		}
		$sm_submenu_text_decoration = cosmoswp_ifset($sm_submenu_typography['text-decoration']);
		if ( $sm_submenu_text_decoration ){
			$sm_submenu_css .=  'text-decoration:'.$sm_submenu_text_decoration.';';
		}
		$sm_submenu_text_transform  = cosmoswp_ifset($sm_submenu_typography['text-transform']);
		if ( $sm_submenu_text_transform ){
			$sm_submenu_css .=  'text-transform:'.$sm_submenu_text_transform.';';
		}
		$sm_submenu_font_size       = cosmoswp_ifset($sm_submenu_typography['font-size']['mobile']);
		if ( $sm_submenu_font_size ){
			$sm_submenu_css .=  'font-size:'.$sm_submenu_font_size.'px;';
		}
		$sm_submenu_line_height     = cosmoswp_ifset($sm_submenu_typography['line-height']['mobile']);
		if ( $sm_submenu_line_height ){
			$sm_submenu_css .=  'line-height:'.$sm_submenu_line_height.'px;';
		}
		$sm_submenu_letter_spacing  = cosmoswp_ifset($sm_submenu_typography['letter-spacing']['mobile']);
		if ( $sm_submenu_letter_spacing ){
			$sm_submenu_css .=  'letter-spacing:'.$sm_submenu_letter_spacing.'px;';
		}

		/* secondary sub menu  menu tablet css */
		$sm_submenu_tablet_font_size       = cosmoswp_ifset($sm_submenu_typography['font-size']['tablet']);
		if ( $sm_submenu_tablet_font_size ){
			$sm_submenu_tablet_css .=  'font-size:'.$sm_submenu_tablet_font_size.'px;';
		}
		$sm_submenu_tablet_line_height     = cosmoswp_ifset($sm_submenu_typography['line-height']['tablet']);
		if ( $sm_submenu_tablet_line_height ){
			$sm_submenu_tablet_css .=  'line-height:'.$sm_submenu_tablet_line_height.'px;';
		}
		$sm_submenu_tablet_letter_spacing  = cosmoswp_ifset($sm_submenu_typography['letter-spacing']['tablet']);
		if ( $sm_submenu_tablet_letter_spacing ){
			$sm_submenu_tablet_css .=  'letter-spacing:'.$sm_submenu_tablet_letter_spacing.'px;';
		}

		/* secondary sub menu  desktop tablet css */
		$sm_submenu_desktop_font_size       = cosmoswp_ifset($sm_submenu_typography['font-size']['desktop']);
		if ( $sm_submenu_desktop_font_size ){
			$sm_submenu_desktop_css .=  'font-size:'.$sm_submenu_desktop_font_size.'px;';
		}
		$sm_submenu_desktop_line_height     = cosmoswp_ifset($sm_submenu_typography['line-height']['desktop']);
		if ( $sm_submenu_desktop_line_height ){
			$sm_submenu_desktop_css .=  'line-height:'.$sm_submenu_desktop_line_height.'px;';
		}
		$sm_submenu_desktop_letter_spacing  = cosmoswp_ifset($sm_submenu_typography['letter-spacing']['desktop']);
		if ( $sm_submenu_desktop_letter_spacing ){
			$sm_submenu_desktop_css .=  'letter-spacing:'.$sm_submenu_desktop_letter_spacing.'px;';
		}
	}

}

/* secondary menu sub menu item margin */
$secondary_menu_sub_menu_item_margin = cosmoswp_get_theme_options('secondary-menu-sub-menu-item-margin');
$secondary_menu_sub_menu_item_margin = json_decode($secondary_menu_sub_menu_item_margin,true);

// desktop margin
$secondary_menu_sub_menu_item_margin_desktop = cosmoswp_cssbox_values_inline($secondary_menu_sub_menu_item_margin,'desktop');
if (strpos($secondary_menu_sub_menu_item_margin_desktop, 'px') !== false){
    $sm_submenu_desktop_css		.= 'margin:'.$secondary_menu_sub_menu_item_margin_desktop.';';
}
// tablet marign
$secondary_menu_sub_menu_item_margin_tablet  = cosmoswp_cssbox_values_inline($secondary_menu_sub_menu_item_margin,'tablet');
if (strpos($secondary_menu_sub_menu_item_margin_tablet, 'px') !== false){
    $sm_submenu_tablet_css		.= 'margin:'.$secondary_menu_sub_menu_item_margin_tablet.';';
}
// mobile margin
$secondary_menu_sub_menu_item_margin_mobile  = cosmoswp_cssbox_values_inline($secondary_menu_sub_menu_item_margin,'mobile');
if (strpos($secondary_menu_sub_menu_item_margin_mobile, 'px') !== false){
    $sm_submenu_css		.= 'margin:'.$secondary_menu_sub_menu_item_margin_mobile.';';
}

/* secondary menu sub menu item padding*/
$secondary_menu_sub_menu_item_padding = cosmoswp_get_theme_options('secondary-menu-sub-menu-item-padding');
$secondary_menu_sub_menu_item_padding = json_decode($secondary_menu_sub_menu_item_padding,true);

// desktop padding
$secondary_menu_sub_menu_item_padding_desktop = cosmoswp_cssbox_values_inline($secondary_menu_sub_menu_item_padding,'desktop');
if (strpos($secondary_menu_sub_menu_item_padding_desktop, 'px') !== false){
    $sm_submenu_desktop_css		.= 'padding:'.$secondary_menu_sub_menu_item_padding_desktop.';';
}

//tablet padding
$secondary_menu_sub_menu_item_padding_tablet  = cosmoswp_cssbox_values_inline($secondary_menu_sub_menu_item_padding,'tablet');
if (strpos($secondary_menu_sub_menu_item_padding_tablet, 'px') !== false){
    $sm_submenu_tablet_css		.= 'padding:'.$secondary_menu_sub_menu_item_padding_tablet.';';
}
//mobile padding
$secondary_menu_sub_menu_item_padding_mobile  = cosmoswp_cssbox_values_inline($secondary_menu_sub_menu_item_padding,'mobile');
if (strpos($secondary_menu_sub_menu_item_padding_mobile, 'px') !== false){
    $sm_submenu_css		.= 'padding:'.$secondary_menu_sub_menu_item_padding_mobile.';';
}

/* sub menu mobile css */
if ( !empty( $sm_submenu_css )){
	$sm_submenu_search_dynamic_css = '.navigation .cwp-secondary-menu li li a{
		'.$sm_submenu_css.'
	}';
	$local_dynamic_css['all'] .= $sm_submenu_search_dynamic_css;
}

/* sub menu tablet tablet css */
if ( !empty( $sm_submenu_tablet_css )){
	$sm_submenu_tablet_dynamic_css = '.navigation .cwp-secondary-menu li li a{
		'.$sm_submenu_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $sm_submenu_tablet_dynamic_css;
}

/* sub menu desktop css */
if ( !empty( $sm_submenu_desktop_css )){
	$sm_submenu_desktop_dynamic_css = '.navigation .cwp-secondary-menu li li a{
		'.$sm_submenu_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $sm_submenu_desktop_dynamic_css;
}

/* hover secondary menu submenuitem styling */
$sm_submenu_hover_css = '';	
//txt color
$sm_submenu_hover_txt_color     = cosmoswp_ifset($sm_submenu_styling['hover-text-color']);
if ( $sm_submenu_hover_txt_color ){
	$sm_submenu_hover_css .= 'color:'.$sm_submenu_hover_txt_color.';';
}
//bg color
$sm_submenu_hover_bg_color      = cosmoswp_ifset($sm_submenu_styling['hover-bg-color']);
if ( $sm_submenu_hover_bg_color ){
	$sm_submenu_hover_css .= 'background-color:'.$sm_submenu_hover_bg_color.';';
}
//border style
$sm_submenu_hover_border_style      = cosmoswp_ifset($sm_submenu_styling['hover-border-style']);
if ( $sm_submenu_hover_border_style ){
	$sm_submenu_hover_css .= 'border-style:'.$sm_submenu_hover_border_style.';';
}
//border color
$sm_submenu_hover_border_color      = cosmoswp_ifset($sm_submenu_styling['hover-border-color']);
if ( $sm_submenu_hover_border_color ){
	$sm_submenu_hover_css .= 'border-color:'.$sm_submenu_hover_border_color.';';
}
//border width
$sm_submenu_hover_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($sm_submenu_styling['hover-border-width']),'desktop');
if (strpos($sm_submenu_hover_border_width, 'px') !== false) {
	$sm_submenu_hover_css .= 'border-width:'.$sm_submenu_hover_border_width.';';
}
//border radius
$sm_submenu_hover_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($sm_submenu_styling['hover-border-radius']),'desktop');
if (strpos($sm_submenu_hover_border_radius, 'px') !== false){
	$sm_submenu_hover_css		.= 'border-radius:'.$sm_submenu_hover_border_radius.';';
}
if ( !empty( $sm_submenu_hover_css )){
	$sm_submenu_hover_dynamic_css = '.cwp-secondary-menu li li a:hover,
.cwp-secondary-menu li li a:focus{
		'.$sm_submenu_hover_css.'
	}';
	$local_dynamic_css['all'] .= $sm_submenu_hover_dynamic_css;
}

/* secondary menu submneu active item styling */
$sm_submenu_active_css = '';	
//txt color
$sm_submenu_active_txt_color     = cosmoswp_ifset($sm_submenu_styling['active-text-color']);
if ( $sm_submenu_active_txt_color ){
	$sm_submenu_active_css .= 'color:'.$sm_submenu_active_txt_color.';';
}
//bg color
$sm_submenu_active_bg_color      = cosmoswp_ifset($sm_submenu_styling['active-bg-color']);
if ( $sm_submenu_active_bg_color ){
	$sm_submenu_active_css .= 'background-color:'.$sm_submenu_active_bg_color.';';
}
//border style
$sm_submenu_active_border_style      = cosmoswp_ifset($sm_submenu_styling['active-border-style']);
if ( $sm_submenu_active_border_style ){
	$sm_submenu_active_css .= 'border-style:'.$sm_submenu_active_border_style.';';
}
//border color
$sm_submenu_active_border_color      = cosmoswp_ifset($sm_submenu_styling['active-border-color']);
if ( $sm_submenu_active_border_color ){
	$sm_submenu_active_css .= 'border-color:'.$sm_submenu_active_border_color.';';
}
//border width
$sm_submenu_active_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($sm_submenu_styling['active-border-width']),'desktop');
if (strpos($sm_submenu_active_border_width, 'px') !== false) {
	$sm_submenu_active_css .= 'border-width:'.$sm_submenu_active_border_width.';';
}
//border radius
$sm_submenu_active_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($sm_submenu_styling['active-border-radius']),'desktop');
if (strpos($sm_submenu_active_border_radius, 'px') !== false){
	$sm_submenu_active_css		.= 'border-radius:'.$sm_submenu_active_border_radius.';';
}
if ( !empty( $sm_submenu_active_css )){
	$sm_submenu_active_dynamic_css = '.cwp-secondary-menu li li.active a,
.cwp-secondary-menu li li:active a,
.cwp-secondary-menu li li.current-menu-item a{
		'.$sm_submenu_active_css.'
	}';
	$local_dynamic_css['all'] .= $sm_submenu_active_dynamic_css;
}
//submenu bg color
$sm_submenu_bg_color_css = '';
$sm_submenu_bg_color = cosmoswp_get_theme_options('secondary-menu-submenu-bg-color');
if ( $sm_submenu_bg_color ){
	$sm_submenu_bg_color_css = 'background-color:'.$sm_submenu_bg_color.';';
}
if ( !empty( $sm_submenu_bg_color_css )){
	$sm_submenu_bg_color__dynamic_css = '.cwp-secondary-menu .sub-menu{
		'.$sm_submenu_bg_color_css.'
	}';
	$local_dynamic_css['all'] .= $sm_submenu_bg_color__dynamic_css;
}?><?php
/* Primary Menu styling*/
$primary_menu_layout_css         = '';
$primary_menu_layout_tablet_css  = '';
$primary_menu_layout_desktop_css = '';
/* marign */
$primary_menu_margin = cosmoswp_get_theme_options('primary-menu-margin');
$primary_menu_margin = json_decode($primary_menu_margin,true);
// desktop margin 
$primary_menu_margin_desktop = cosmoswp_cssbox_values_inline($primary_menu_margin,'desktop');
if (strpos($primary_menu_margin_desktop, 'px') !== false){
	$primary_menu_layout_desktop_css		.= 'margin:'.$primary_menu_margin_desktop.';';
}
// tablet marign 
$primary_menu_margin_tablet  = cosmoswp_cssbox_values_inline($primary_menu_margin,'tablet');
if (strpos($primary_menu_margin_tablet, 'px') !== false){
	$primary_menu_layout_tablet_css		.= 'margin:'.$primary_menu_margin_tablet.';';
}
// mobile margin 
$primary_menu_margin_mobile  = cosmoswp_cssbox_values_inline($primary_menu_margin,'mobile');
if (strpos($primary_menu_margin_mobile, 'px') !== false){
	$primary_menu_layout_css		.= 'margin:'.$primary_menu_margin_mobile.';';
}

/*  padding */
$primary_menu_padding = cosmoswp_get_theme_options('primary-menu-padding');
$primary_menu_padding = json_decode($primary_menu_padding,true);

// desktop padding
$primary_menu_padding_desktop = cosmoswp_cssbox_values_inline($primary_menu_padding,'desktop');
if (strpos($primary_menu_padding_desktop, 'px') !== false){
	$primary_menu_layout_desktop_css		.= 'padding:'.$primary_menu_padding_desktop.';';
}
//tablet padding
$primary_menu_padding_tablet  = cosmoswp_cssbox_values_inline($primary_menu_padding,'tablet');
if (strpos($primary_menu_padding_tablet, 'px') !== false){
	$primary_menu_layout_tablet_css		.= 'padding:'.$primary_menu_padding_tablet.';';
}
//mobile padding
$primary_menu_padding_mobile  = cosmoswp_cssbox_values_inline($primary_menu_padding,'mobile');
if (strpos($primary_menu_padding_mobile, 'px') !== false){
	$primary_menu_layout_css		.= 'padding:'.$primary_menu_padding_mobile.';';
}

/* mobile css */
if ( !empty( $primary_menu_layout_css )){
	$primary_menu_layout_dynamic_css = '.cwp-main-header .cwp-primary-menu{
		'.$primary_menu_layout_css.'
	}';
	$local_dynamic_css['all'] .= $primary_menu_layout_dynamic_css;
}

/* tablet css */
if ( !empty($primary_menu_layout_tablet_css) ){
	$primary_menu_tablet_dynamic_css = '.cwp-main-header .cwp-primary-menu{
		'.$primary_menu_layout_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $primary_menu_tablet_dynamic_css;
}

/* desktop css */
if ( !empty($primary_menu_layout_desktop_css) ){
	$primary_menu_desktop_dynamic_css = '.cwp-main-header .cwp-primary-menu{
		'.$primary_menu_layout_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $primary_menu_desktop_dynamic_css;
}

// primary menu item styling
$primary_menu_css              = '';
$primary_menu_item_tablet_css  = '';
$primary_menu_item_desktop_css = '';

$primary_menu_styling   = cosmoswp_get_theme_options('primary-menu-styling');
$primary_menu_styling   = json_decode($primary_menu_styling,true);
//txt color
$primary_menu_txt_color     = cosmoswp_ifset($primary_menu_styling['normal-text-color']);
if ( $primary_menu_txt_color ){
	$primary_menu_css .= 'color:'.$primary_menu_txt_color.';';
}
//bg color
$primary_menu_bg_color      = cosmoswp_ifset($primary_menu_styling['normal-bg-color']);
if ( $primary_menu_bg_color ){
	$primary_menu_css .= 'background-color:'.$primary_menu_bg_color.';';
}
//border style
$primary_menu_border_style      = cosmoswp_ifset($primary_menu_styling['normal-border-style']);
if ( $primary_menu_border_style ){
	$primary_menu_css .= 'border-style:'.$primary_menu_border_style.';';
}
//border color
$primary_menu_border_color      = cosmoswp_ifset($primary_menu_styling['normal-border-color']);
if ( $primary_menu_border_color ){
	$primary_menu_css .= 'border-color:'.$primary_menu_border_color.';';
}
//border width
$primary_menu_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($primary_menu_styling['normal-border-width']),'desktop');
if (strpos($primary_menu_border_width, 'px') !== false) {
	$primary_menu_css .= 'border-width:'.$primary_menu_border_width.';';
}
//border radius
$primary_menu_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($primary_menu_styling['normal-border-radius']),'desktop');
if (strpos($primary_menu_border_radius, 'px') !== false){
	$primary_menu_css		.= 'border-radius:'.$primary_menu_border_radius.';';
}
//typography
$primary_menu_typography_options = cosmoswp_get_theme_options('primary-menu-typography-options');
if ('custom' == $primary_menu_typography_options){
	$primary_menu_typography         = cosmoswp_get_theme_options('primary-menu-typography');
	$primary_menu_typography         = json_decode($primary_menu_typography,true);

	$primary_menu_font_family     =  cosmoswp_font_family($primary_menu_typography);
	if ( $primary_menu_font_family ){
		$primary_menu_css .=  'font-family:'.$primary_menu_font_family.';';
		$primary_menu_font_weight     = cosmoswp_font_weight( $primary_menu_typography );
		if ( $primary_menu_font_weight ){
			$primary_menu_css .=  'font-weight:'.$primary_menu_font_weight.';';
		}
		$primary_menu_font_style      = cosmoswp_ifset($primary_menu_typography['font-style']);
		if ( $primary_menu_font_style ){
			$primary_menu_css .=  'font-style:'.$primary_menu_font_style.';';
		}
		$primary_menu_text_decoration = cosmoswp_ifset($primary_menu_typography['text-decoration']);
		if ( $primary_menu_text_decoration ){
			$primary_menu_css .=  'text-decoration:'.$primary_menu_text_decoration.';';
		}
		$primary_menu_text_transform  = cosmoswp_ifset($primary_menu_typography['text-transform']);
		if ( $primary_menu_text_transform ){
			$primary_menu_css .=  'text-transform:'.$primary_menu_text_transform.';';
		}
		$primary_menu_font_size       = cosmoswp_ifset($primary_menu_typography['font-size']['mobile']);
		if ( $primary_menu_font_size ){
			$primary_menu_css .=  'font-size:'.$primary_menu_font_size.'px;';
		}
		$primary_menu_line_height     = cosmoswp_ifset($primary_menu_typography['line-height']['mobile']);
		if ( $primary_menu_line_height ){
			$primary_menu_css .=  'line-height:'.$primary_menu_line_height.'px;';
		}
		$primary_menu_letter_spacing  = cosmoswp_ifset($primary_menu_typography['letter-spacing']['mobile']);
		if ( $primary_menu_letter_spacing ){
			$primary_menu_css .=  'letter-spacing:'.$primary_menu_letter_spacing.'px;';
		}

		/* primary menu tablet css */
		$primary_menu_tablet_font_size       = cosmoswp_ifset($primary_menu_typography['font-size']['tablet']);
		if ( $primary_menu_tablet_font_size ){
			$primary_menu_item_tablet_css .=  'font-size:'.$primary_menu_tablet_font_size.'px;';
		}
		$primary_menu_tablet_line_height     = cosmoswp_ifset($primary_menu_typography['line-height']['tablet']);
		if ( $primary_menu_tablet_line_height ){
			$primary_menu_item_tablet_css .=  'line-height:'.$primary_menu_tablet_line_height.'px;';
		}
		$primary_menu_tablet_letter_spacing  = cosmoswp_ifset($primary_menu_typography['letter-spacing']['tablet']);
		if ( $primary_menu_tablet_letter_spacing ){
			$primary_menu_item_tablet_css .=  'letter-spacing:'.$primary_menu_tablet_letter_spacing.'px;';
		}

		/* Primary menu  desktop tablet css */
		$primary_menu_desktop_font_size       = cosmoswp_ifset($primary_menu_typography['font-size']['desktop']);
		if ( $primary_menu_desktop_font_size ){
			$primary_menu_item_desktop_css .=  'font-size:'.$primary_menu_desktop_font_size.'px;';
		}
		$primary_menu_desktop_line_height     = cosmoswp_ifset($primary_menu_typography['line-height']['desktop']);
		if ( $primary_menu_desktop_line_height ){
			$primary_menu_item_desktop_css .=  'line-height:'.$primary_menu_desktop_line_height.'px;';
		}
		$primary_menu_desktop_letter_spacing  = cosmoswp_ifset($primary_menu_typography['letter-spacing']['desktop']);
		if ( $primary_menu_desktop_letter_spacing ){
			$primary_menu_item_desktop_css .=  'letter-spacing:'.$primary_menu_desktop_letter_spacing.'px;';
		}
	}
}


/* primary menu item margin */
$primary_menu_item_margin = cosmoswp_get_theme_options('primary-menu-item-margin');
$primary_menu_item_margin = json_decode($primary_menu_item_margin,true);

// desktop margin 
$primary_menu_item_margin_desktop = cosmoswp_cssbox_values_inline($primary_menu_item_margin,'desktop');
if (strpos($primary_menu_item_margin_desktop, 'px') !== false){
	$primary_menu_item_desktop_css		.= 'margin:'.$primary_menu_item_margin_desktop.';';
}
// tablet marign 
$primary_menu_item_margin_tablet  = cosmoswp_cssbox_values_inline($primary_menu_item_margin,'tablet');
if (strpos($primary_menu_item_margin_tablet, 'px') !== false){
	$primary_menu_item_tablet_css		.= 'margin:'.$primary_menu_item_margin_tablet.';';
}
// mobile margin 
$primary_menu_item_margin_mobile  = cosmoswp_cssbox_values_inline($primary_menu_item_margin,'mobile');
if (strpos($primary_menu_item_margin_mobile, 'px') !== false){
	$primary_menu_css		.= 'margin:'.$primary_menu_item_margin_mobile.';';
}

/* primary menu item padding */
$primary_menu_item_padding = cosmoswp_get_theme_options('primary-menu-item-padding');
$primary_menu_item_padding = json_decode($primary_menu_item_padding,true);

// desktop padding
$primary_menu_item_padding_desktop = cosmoswp_cssbox_values_inline($primary_menu_item_padding,'desktop');
if (strpos($primary_menu_item_padding_desktop, 'px') !== false){
	$primary_menu_item_desktop_css		.= 'padding:'.$primary_menu_item_padding_desktop.';';
}
//tablet padding
$primary_menu_item_padding_tablet  = cosmoswp_cssbox_values_inline($primary_menu_item_padding,'tablet');
if (strpos($primary_menu_item_padding_tablet, 'px') !== false){
	$primary_menu_item_tablet_css		.= 'padding:'.$primary_menu_item_padding_tablet.';';
}
//mobile padding
$primary_menu_item_padding_mobile  = cosmoswp_cssbox_values_inline($primary_menu_item_padding,'mobile');
if (strpos($primary_menu_item_padding_mobile, 'px') !== false){
	$primary_menu_css		.= 'padding:'.$primary_menu_item_padding_mobile.';';
}

if ( !empty( $primary_menu_css )){
	$primary_menu_search_dynamic_css = '.cwp-primary-menu li a{
		'.$primary_menu_css.'
	}';
	$local_dynamic_css['all'] .= $primary_menu_search_dynamic_css;
}

// tablet css 
if ( !empty($primary_menu_item_tablet_css) ){
	$primary_menu_item_tablet_dynamic_css = '.cwp-primary-menu li a{
		'.$primary_menu_item_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $primary_menu_item_tablet_dynamic_css;
}

// desktop css 
if ( !empty($primary_menu_item_desktop_css) ){
	$primary_menu_item_desktop_dynamic_css = '.cwp-primary-menu li a{
		'.$primary_menu_item_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $primary_menu_item_desktop_dynamic_css;
}

/* hover secondary menu item styling */
$primary_menu_hover_css = '';	
//txt color
$primary_menu_hover_txt_color     = cosmoswp_ifset($primary_menu_styling['hover-text-color']);
if ( $primary_menu_hover_txt_color ){
	$primary_menu_hover_css .= 'color:'.$primary_menu_hover_txt_color.';';
}
//bg color
$primary_menu_hover_bg_color      = cosmoswp_ifset($primary_menu_styling['hover-bg-color']);
if ( $primary_menu_hover_bg_color ){
	$primary_menu_hover_css .= 'background-color:'.$primary_menu_hover_bg_color.';';
}
//border style
$primary_menu_hover_border_style      = cosmoswp_ifset($primary_menu_styling['hover-border-style']);
if ( $primary_menu_hover_border_style ){
	$primary_menu_hover_css .= 'border-style:'.$primary_menu_hover_border_style.';';
}
//border color
$primary_menu_hover_border_color      = cosmoswp_ifset($primary_menu_styling['hover-border-color']);
if ( $primary_menu_hover_border_color ){
	$primary_menu_hover_css .= 'border-color:'.$primary_menu_hover_border_color.';';
}
//border width
$primary_menu_hover_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($primary_menu_styling['hover-border-width']),'desktop');
if (strpos($primary_menu_hover_border_width, 'px') !== false) {
	$primary_menu_hover_css .= 'border-width:'.$primary_menu_hover_border_width.';';
}
//border radius
$primary_menu_hover_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($primary_menu_styling['hover-border-radius']),'desktop');
if (strpos($primary_menu_hover_border_radius, 'px') !== false){
	$primary_menu_hover_css		.= 'border-radius:'.$primary_menu_hover_border_radius.';';
}
if ( !empty( $primary_menu_hover_css )){
	$primary_menu_hover_dynamic_css = '.cwp-primary-menu li a:hover,
	.cwp-primary-menu li a:focus{
		'.$primary_menu_hover_css.'
	}';
	$local_dynamic_css['all'] .= $primary_menu_hover_dynamic_css;
}

/* primary menu active item styling */
$primary_menu_active_css = '';	
//txt color
$primary_menu_active_txt_color     = cosmoswp_ifset($primary_menu_styling['active-text-color']);
if ( $primary_menu_active_txt_color ){
	$primary_menu_active_css .= 'color:'.$primary_menu_active_txt_color.';';
}
//bg color
$primary_menu_active_bg_color      = cosmoswp_ifset($primary_menu_styling['active-bg-color']);
if ( $primary_menu_active_bg_color ){
	$primary_menu_active_css .= 'background-color:'.$primary_menu_active_bg_color.';';
}
//border style
$primary_menu_active_border_style      = cosmoswp_ifset($primary_menu_styling['active-border-style']);
if ( $primary_menu_active_border_style ){
	$primary_menu_active_css .= 'border-style:'.$primary_menu_active_border_style.';';
}
//border color
$primary_menu_active_border_color      = cosmoswp_ifset($primary_menu_styling['active-border-color']);
if ( $primary_menu_active_border_color ){
	$primary_menu_active_css .= 'border-color:'.$primary_menu_active_border_color.';';
}
//border width
$primary_menu_active_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($primary_menu_styling['active-border-width']),'desktop');
if (strpos($primary_menu_active_border_width, 'px') !== false) {
	$primary_menu_active_css .= 'border-width:'.$primary_menu_active_border_width.';';
}
//border radius
$primary_menu_active_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($primary_menu_styling['active-border-radius']),'desktop');
if (strpos($primary_menu_active_border_radius, 'px') !== false){
	$primary_menu_active_css		.= 'border-radius:'.$primary_menu_active_border_radius.';';
}
if ( !empty( $primary_menu_active_css )){
	$primary_menu_active_dynamic_css = '.cwp-primary-menu li.active > a,
	.cwp-primary-menu li.current-menu-item > a{
		'.$primary_menu_active_css.'
	}';
    $local_dynamic_css['all'] .= $primary_menu_active_dynamic_css;
}

/*primary menu submenu item*/
$pm_submenu_css         = '';
$pm_submenu_tablet_css  = '';
$pm_submenu_desktop_css = '';

$pm_submenu_styling   = cosmoswp_get_theme_options('primary-menu-submenu-styling');
$pm_submenu_styling   = json_decode($pm_submenu_styling,true);
//txt color
$pm_submenu_txt_color     = cosmoswp_ifset($pm_submenu_styling['normal-text-color']);
if ( $pm_submenu_txt_color ){
	$pm_submenu_css .= 'color:'.$pm_submenu_txt_color.';';
}
//bg color
$pm_submenu_bg_color      = cosmoswp_ifset($pm_submenu_styling['normal-bg-color']);
if ( $pm_submenu_bg_color ){
	$pm_submenu_css .= 'background-color:'.$pm_submenu_bg_color.';';
}
//border style
$pm_submenu_border_style      = cosmoswp_ifset($pm_submenu_styling['normal-border-style']);
if ( $pm_submenu_border_style ){
	$pm_submenu_css .= 'border-style:'.$pm_submenu_border_style.';';
}
//border color
$pm_submenu_border_color      = cosmoswp_ifset($pm_submenu_styling['normal-border-color']);
if ( $pm_submenu_border_color ){
	$pm_submenu_css .= 'border-color:'.$pm_submenu_border_color.';';
}
//border width
$pm_submenu_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($pm_submenu_styling['normal-border-width']),'desktop');
if (strpos($pm_submenu_border_width, 'px') !== false) {
	$pm_submenu_css .= 'border-width:'.$pm_submenu_border_width.';';
}
//border radius
$pm_submenu_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($pm_submenu_styling['normal-border-radius']),'desktop');
if (strpos($pm_submenu_border_radius, 'px') !== false){
	$pm_submenu_css		.= 'border-radius:'.$pm_submenu_border_radius.';';
}
//typography
$pm_submenu_typography_options = cosmoswp_get_theme_options('primary-menu-submenu-typography-options');
if ('custom' == $pm_submenu_typography_options){
	$pm_submenu_typography         = cosmoswp_get_theme_options('primary-menu-submenu-typography');
	$pm_submenu_typography         = json_decode($pm_submenu_typography,true);

	$pm_submenu_font_family     =  cosmoswp_font_family($pm_submenu_typography);
	if ( $pm_submenu_font_family ){
		$pm_submenu_css .=  'font-family:'.$pm_submenu_font_family.';';
		$pm_submenu_font_weight     = cosmoswp_font_weight( $pm_submenu_typography );
		if ( $pm_submenu_font_weight ){
			$pm_submenu_css .=  'font-weight:'.$pm_submenu_font_weight.';';
		}
		$pm_submenu_font_style      = cosmoswp_ifset($pm_submenu_typography['font-style']);
		if ( $pm_submenu_font_style ){
			$pm_submenu_css .=  'font-style:'.$pm_submenu_font_style.';';
		}
		$pm_submenu_text_decoration = cosmoswp_ifset($pm_submenu_typography['text-decoration']);
		if ( $pm_submenu_text_decoration ){
			$pm_submenu_css .=  'text-decoration:'.$pm_submenu_text_decoration.';';
		}
		$pm_submenu_text_transform  = cosmoswp_ifset($pm_submenu_typography['text-transform']);
		if ( $pm_submenu_text_transform ){
			$pm_submenu_css .=  'text-transform:'.$pm_submenu_text_transform.';';
		}
		$pm_submenu_font_size       = cosmoswp_ifset($pm_submenu_typography['font-size']['mobile']);
		if ( $pm_submenu_font_size ){
			$pm_submenu_css .=  'font-size:'.$pm_submenu_font_size.'px;';
		}
		$pm_submenu_line_height     = cosmoswp_ifset($pm_submenu_typography['line-height']['mobile']);
		if ( $pm_submenu_line_height ){
			$pm_submenu_css .=  'line-height:'.$pm_submenu_line_height.'px;';
		}
		$pm_submenu_letter_spacing  = cosmoswp_ifset($pm_submenu_typography['letter-spacing']['mobile']);
		if ( $pm_submenu_letter_spacing ){
			$pm_submenu_css .=  'letter-spacing:'.$pm_submenu_letter_spacing.'px;';
		}


		/* primary sub menu  menu tablet css */
		$pm_submenu_tablet_font_size       = cosmoswp_ifset($pm_submenu_typography['font-size']['tablet']);
		if ( $pm_submenu_tablet_font_size ){
			$pm_submenu_tablet_css .=  'font-size:'.$pm_submenu_tablet_font_size.'px;';
		}
		$pm_submenu_tablet_line_height     = cosmoswp_ifset($pm_submenu_typography['line-height']['tablet']);
		if ( $pm_submenu_tablet_line_height ){
			$pm_submenu_tablet_css .=  'line-height:'.$pm_submenu_tablet_line_height.'px;';
		}
		$pm_submenu_tablet_letter_spacing  = cosmoswp_ifset($pm_submenu_typography['letter-spacing']['tablet']);
		if ( $pm_submenu_tablet_letter_spacing ){
			$pm_submenu_tablet_css .=  'letter-spacing:'.$pm_submenu_tablet_letter_spacing.'px;';
		}

		/* Primary sub mneu menu  desktop tablet css */
		$pm_submenu_desktop_font_size       = cosmoswp_ifset($pm_submenu_typography['font-size']['desktop']);
		if ( $pm_submenu_desktop_font_size ){
			$pm_submenu_desktop_css .=  'font-size:'.$pm_submenu_desktop_font_size.'px;';
		}
		$pm_submenu_desktop_line_height     = cosmoswp_ifset($pm_submenu_typography['line-height']['desktop']);
		if ( $pm_submenu_desktop_line_height ){
			$pm_submenu_desktop_css .=  'line-height:'.$pm_submenu_desktop_line_height.'px;';
		}
		$pm_submenu_desktop_letter_spacing  = cosmoswp_ifset($pm_submenu_typography['letter-spacing']['desktop']);
		if ( $pm_submenu_desktop_letter_spacing ){
			$pm_submenu_desktop_css .=  'letter-spacing:'.$pm_submenu_desktop_letter_spacing.'px;';
		}
	}

}

/* primary menu sub menu item margin */
$primary_menu_sub_menu_item_margin = cosmoswp_get_theme_options('primary-menu-sub-menu-item-margin');
$primary_menu_sub_menu_item_margin = json_decode($primary_menu_sub_menu_item_margin,true);

// desktop margin
$primary_menu_sub_menu_item_margin_desktop = cosmoswp_cssbox_values_inline($primary_menu_sub_menu_item_margin,'desktop');
if (strpos($primary_menu_sub_menu_item_margin_desktop, 'px') !== false){
    $pm_submenu_desktop_css		.= 'margin:'.$primary_menu_sub_menu_item_margin_desktop.';';
}
// tablet marign
$primary_menu_sub_menu_item_margin_tablet  = cosmoswp_cssbox_values_inline($primary_menu_sub_menu_item_margin,'tablet');
if (strpos($primary_menu_sub_menu_item_margin_tablet, 'px') !== false){
    $pm_submenu_tablet_css		.= 'margin:'.$primary_menu_sub_menu_item_margin_tablet.';';
}
// mobile margin
$primary_menu_sub_menu_item_margin_mobile  = cosmoswp_cssbox_values_inline($primary_menu_sub_menu_item_margin,'mobile');
if (strpos($primary_menu_sub_menu_item_margin_mobile, 'px') !== false){
    $pm_submenu_css		.= 'margin:'.$primary_menu_sub_menu_item_margin_mobile.';';
}

/* primary menu sub menu item padding*/
$primary_menu_sub_menu_item_padding = cosmoswp_get_theme_options('primary-menu-sub-menu-item-padding');
$primary_menu_sub_menu_item_padding = json_decode($primary_menu_sub_menu_item_padding,true);

// desktop padding
$primary_menu_sub_menu_item_padding_desktop = cosmoswp_cssbox_values_inline($primary_menu_sub_menu_item_padding,'desktop');
if (strpos($primary_menu_sub_menu_item_padding_desktop, 'px') !== false){
    $pm_submenu_desktop_css		.= 'padding:'.$primary_menu_sub_menu_item_padding_desktop.';';
}

//tablet padding
$primary_menu_sub_menu_item_padding_tablet  = cosmoswp_cssbox_values_inline($primary_menu_sub_menu_item_padding,'tablet');
if (strpos($primary_menu_sub_menu_item_padding_tablet, 'px') !== false){
    $pm_submenu_tablet_css		.= 'padding:'.$primary_menu_sub_menu_item_padding_tablet.';';
}
//mobile padding
$primary_menu_sub_menu_item_padding_mobile  = cosmoswp_cssbox_values_inline($primary_menu_sub_menu_item_padding,'mobile');
if (strpos($primary_menu_sub_menu_item_padding_mobile, 'px') !== false){
    $pm_submenu_css		.= 'padding:'.$primary_menu_sub_menu_item_padding_mobile.';';
}


/* Primary menu sub menu mobile css */
if ( !empty( $pm_submenu_css )){
	$pm_submenu_dynamic_css = '.navigation .cwp-primary-menu li li a{
		'.$pm_submenu_css.'
	}';
	$local_dynamic_css['all'] .= $pm_submenu_dynamic_css;
}

/* Primary menu sub menu tablet css */
if ( !empty( $pm_submenu_tablet_css )){
	$pm_submenu_tablet_dynamic_css = '.navigation .cwp-primary-menu li li a{
		'.$pm_submenu_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $pm_submenu_tablet_dynamic_css;
}

/* Primary menu sub menu desktop css */
if ( !empty( $pm_submenu_desktop_css )){
	$pm_submenu_desktop_dynamic_css = '.navigation .cwp-primary-menu li li a{
		'.$pm_submenu_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $pm_submenu_desktop_dynamic_css;
}
/* hover primary menu submenuitem styling */
$pm_submenu_hover_css = '';	
//txt color
$pm_submenu_hover_txt_color     = cosmoswp_ifset($pm_submenu_styling['hover-text-color']);
if ( $pm_submenu_hover_txt_color ){
	$pm_submenu_hover_css .= 'color:'.$pm_submenu_hover_txt_color.';';
}
//bg color
$pm_submenu_hover_bg_color      = cosmoswp_ifset($pm_submenu_styling['hover-bg-color']);
if ( $pm_submenu_hover_bg_color ){
	$pm_submenu_hover_css .= 'background-color:'.$pm_submenu_hover_bg_color.';';
}
//border style
$pm_submenu_hover_border_style      = cosmoswp_ifset($pm_submenu_styling['hover-border-style']);
if ( $pm_submenu_hover_border_style ){
	$pm_submenu_hover_css .= 'border-style:'.$pm_submenu_hover_border_style.';';
}
//border color
$pm_submenu_hover_border_color      = cosmoswp_ifset($pm_submenu_styling['hover-border-color']);
if ( $pm_submenu_hover_border_color ){
	$pm_submenu_hover_css .= 'border-color:'.$pm_submenu_hover_border_color.';';
}
//border width
$pm_submenu_hover_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($pm_submenu_styling['hover-border-width']),'desktop');
if (strpos($pm_submenu_hover_border_width, 'px') !== false) {
	$pm_submenu_hover_css .= 'border-width:'.$pm_submenu_hover_border_width.';';
}
//border radius
$pm_submenu_hover_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($pm_submenu_styling['hover-border-radius']),'desktop');
if (strpos($pm_submenu_hover_border_radius, 'px') !== false){
	$pm_submenu_hover_css		.= 'border-radius:'.$pm_submenu_hover_border_radius.';';
}
if ( !empty( $pm_submenu_hover_css )){
	$pm_submenu_hover_dynamic_css = '.cwp-primary-menu li li a:hover,
	.cwp-primary-menu li li a:focus{
		'.$pm_submenu_hover_css.'
	}';
	$local_dynamic_css['all'] .= $pm_submenu_hover_dynamic_css;
}

/* primary menu submneu active item styling */
$pm_submenu_active_css = '';	
//txt color
$pm_submenu_active_txt_color     = cosmoswp_ifset($pm_submenu_styling['active-text-color']);
if ( $pm_submenu_active_txt_color ){
	$pm_submenu_active_css .= 'color:'.$pm_submenu_active_txt_color.';';
}
//bg color
$pm_submenu_active_bg_color      = cosmoswp_ifset($pm_submenu_styling['active-bg-color']);
if ( $pm_submenu_active_bg_color ){
	$pm_submenu_active_css .= 'background-color:'.$pm_submenu_active_bg_color.';';
}
//border style
$pm_submenu_active_border_style      = cosmoswp_ifset($pm_submenu_styling['active-border-style']);
if ( $pm_submenu_active_border_style ){
	$pm_submenu_active_css .= 'border-style:'.$pm_submenu_active_border_style.';';
}
//border color
$pm_submenu_active_border_color      = cosmoswp_ifset($pm_submenu_styling['active-border-color']);
if ( $pm_submenu_active_border_color ){
	$pm_submenu_active_css .= 'border-color:'.$pm_submenu_active_border_color.';';
}
//border width
$pm_submenu_active_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($pm_submenu_styling['active-border-width']),'desktop');
if (strpos($pm_submenu_active_border_width, 'px') !== false) {
	$pm_submenu_active_css .= 'border-width:'.$pm_submenu_active_border_width.';';
}
//border radius
$pm_submenu_active_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($pm_submenu_styling['active-border-radius']),'desktop');
if (strpos($pm_submenu_active_border_radius, 'px') !== false){
	$pm_submenu_active_css		.= 'border-radius:'.$pm_submenu_active_border_radius.';';
}
if ( !empty( $pm_submenu_active_css )){
	$pm_submenu_active_dynamic_css = '.cwp-primary-menu li li.active > a,
	.cwp-primary-menu li li.current-menu-item > a{
		'.$pm_submenu_active_css.'
	}';
	$local_dynamic_css['all'] .= $pm_submenu_active_dynamic_css;
}
//submenu bg color
$pm_submenu_bg_color_css = '';
$pm_submenu_bg_color = cosmoswp_get_theme_options('primary-menu-submenu-bg-color');
if ( $pm_submenu_bg_color ){
	$pm_submenu_bg_color_css = 'background-color:'.$pm_submenu_bg_color.';';
}
if ( !empty( $pm_submenu_bg_color_css )){
	$pm_submenu_bg_color_dynamic_css = '.cwp-primary-menu .sub-menu{

		'.$pm_submenu_bg_color_css.'
	}';
	$local_dynamic_css['all'] .= $pm_submenu_bg_color_dynamic_css;
}?><?php
$menu_icon_sidebar_css         = '';
$menu_icon_sidebar_tablet_css  = '';
$menu_icon_sidebar_desktop_css = '';
/* color */
$menu_icon_color_options = cosmoswp_get_theme_options('menu-icon-sidebar-color-options');
$menu_icon_color_options = json_decode($menu_icon_color_options,true);

/* menu sidebar bg color */
$menu_icon_sidebar_bg_color   = cosmoswp_ifset($menu_icon_color_options['background-color']);
if ( $menu_icon_sidebar_bg_color ){
	$menu_icon_sidebar_css		.= 'background-color:'.$menu_icon_sidebar_bg_color.';';
}
/* menu sidebar text color */
$menu_sidebar_text_color   = cosmoswp_ifset($menu_icon_color_options['text-color']);
if ( $menu_sidebar_text_color ){
	$menu_icon_sidebar_css		.= 'color:'.$menu_sidebar_text_color.';';
}

/* margin */
$menu_icon_margin = cosmoswp_get_theme_options('menu-icon-sidebar-margin');
$menu_icon_margin = json_decode($menu_icon_margin,true);
// desktop margin 
$menu_icon_margin_desktop = cosmoswp_cssbox_values_inline($menu_icon_margin,'desktop');
if (strpos($menu_icon_margin_desktop, 'px') !== false){
	$menu_icon_sidebar_desktop_css		.= 'margin:'.$menu_icon_margin_desktop.';';
}
// tablet marign 
$menu_icon_margin_tablet  = cosmoswp_cssbox_values_inline($menu_icon_margin,'tablet');
if (strpos($menu_icon_margin_tablet, 'px') !== false){
	$menu_icon_sidebar_tablet_css		.= 'margin:'.$menu_icon_margin_tablet.';';
}
// mobile margin 
$menu_icon_margin_mobile  = cosmoswp_cssbox_values_inline($menu_icon_margin,'mobile');
if (strpos($menu_icon_margin_mobile, 'px') !== false){
	$menu_icon_sidebar_css		.= 'margin:'.$menu_icon_margin_mobile.';';
}


/* padding */
$menu_icon_padding = cosmoswp_get_theme_options('menu-icon-sidebar-padding');
$menu_icon_padding = json_decode($menu_icon_padding,true);

// desktop padding
$menu_icon_padding_desktop = cosmoswp_cssbox_values_inline($menu_icon_padding,'desktop');
if (strpos($menu_icon_padding_desktop, 'px') !== false){
	$menu_icon_sidebar_desktop_css		.= 'padding:'.$menu_icon_padding_desktop.';';
}
//tablet padding
$menu_icon_padding_tablet  = cosmoswp_cssbox_values_inline($menu_icon_padding,'tablet');
if (strpos($menu_icon_padding_tablet, 'px') !== false){
	$menu_icon_sidebar_tablet_css		.= 'padding:'.$menu_icon_padding_tablet.';';
}
//mobile padding
$menu_icon_padding_mobile  = cosmoswp_cssbox_values_inline($menu_icon_padding,'mobile');
if (strpos($menu_icon_padding_mobile, 'px') !== false){
	$menu_icon_sidebar_css		.= 'padding:'.$menu_icon_padding_mobile.';';
}

/* mobile css */
if ( !empty( $menu_icon_sidebar_css )){
	$menu_icon_sidebar_dynamic_css = '.cwp-header-menu-sidebar{
		'.$menu_icon_sidebar_css.'
	}';
	$local_dynamic_css['all'] .= $menu_icon_sidebar_dynamic_css;
}

/* tablet css */
if ( !empty($menu_icon_sidebar_tablet_css) ){
	$menu_icon_sidebar_tablet_dynamic_css = '.cwp-header-menu-sidebar{
		'.$menu_icon_sidebar_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $menu_icon_sidebar_tablet_dynamic_css;
}

/* desktop css */
if ( !empty($menu_icon_sidebar_desktop_css) ){
	$menu_icon_sidebar_desktop_dynamic_css = '.cwp-header-menu-sidebar{
		'.$menu_icon_sidebar_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $menu_icon_sidebar_desktop_dynamic_css;
}

/* menu sidebar title color */
$menu_sidebar_title_color   = cosmoswp_ifset($menu_icon_color_options['title-color']);
if ( $menu_sidebar_title_color ){
	$local_dynamic_css['all'] .=  '.cwp-header-menu-sidebar h1,
	.cwp-header-menu-sidebar h1 a,
	.cwp-header-menu-sidebar h2,
	.cwp-header-menu-sidebar h2 a,
	.cwp-header-menu-sidebar h3,
	.cwp-header-menu-sidebar h3 a,
	.cwp-header-menu-sidebar h4,
	.cwp-header-menu-sidebar h4 a,
	.cwp-header-menu-sidebar h5,
	.cwp-header-menu-sidebar h5 a,
	.cwp-header-menu-sidebar h6,
	.cwp-header-menu-sidebar h6 a{
		color:'.$menu_sidebar_title_color.';
	}';
}

/* menu sidebar link color */
$menu_sidebar_link_color   = cosmoswp_ifset($menu_icon_color_options['link-color']);
if ( $menu_sidebar_link_color ){
	$local_dynamic_css['all'] .=  '.cwp-header-menu-sidebar a, .cwp-header-menu-sidebar li a{
		color:'.$menu_sidebar_link_color.';
	}';
}

/* menu sidebar link hover color */
$menu_sidebar_link_hover_color   = cosmoswp_ifset($menu_icon_color_options['link-hover-color']);
if ( $menu_sidebar_link_hover_color ){
	$local_dynamic_css['all'] .=  '.cwp-header-menu-sidebar a:hover, .cwp-header-menu-sidebar li a:hover, .cwp-header-menu-sidebar li.active > a, .cwp-header-menu-sidebar li.current-menu-item > a{
		color:'.$menu_sidebar_link_hover_color.';
	}';
}

/*Menu Icon Styling*/
$menu_icon_size_css         = '';
$menu_icon_size_tablet_css  = '';
$menu_icon_size_desktop_css = '';

$menu_icon_css              = '';
$menu_icon_tablet_css       = '';
$menu_icon_desktop_css      = '';

$menu_icon_hover_css        =  '';

/* icon size */
$menu_icon_size = cosmoswp_get_theme_options('menu-open-icon-size-responsive');
$menu_icon_size = json_decode($menu_icon_size,true);

// desktop icon size 
$desktop_icon_size  = cosmoswp_ifset($menu_icon_size['desktop']);
if (!empty( $desktop_icon_size )){
	$menu_icon_size_desktop_css	.= 'font-size:'.$desktop_icon_size.'px;';
}
// tablet icon size 
$tablet_icon_size  = cosmoswp_ifset($menu_icon_size['tablet']);
if (!empty( $tablet_icon_size )){
	$menu_icon_size_tablet_css	.= 'font-size:'.$tablet_icon_size.'px;';
}
// mobile icon size 
$mobile_icon_size  = cosmoswp_ifset($menu_icon_size['mobile']);
if (!empty( $mobile_icon_size )){
	$menu_icon_size_css	 .= 'font-size:'.$mobile_icon_size.'px;';
}

/* mobile css */
if ( !empty( $menu_icon_size_css )){
	$menu_icon_size_dynamic_css = '.cwp-menu-icon-btn i{
		'.$menu_icon_size_css.'
	}';
	$local_dynamic_css['all'] .= $menu_icon_size_dynamic_css;
}
/* tablet css */
if ( !empty($menu_icon_size_tablet_css) ){
	$menu_icon_size_tablet_dynamic_css = '.cwp-menu-icon-btn i{
		'.$menu_icon_size_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $menu_icon_size_tablet_dynamic_css;
}
/* desktop css */
if ( !empty($menu_icon_size_desktop_css) ){
	$menu_icon_size_desktop_dynamic_css = '.cwp-menu-icon-btn i{
		'.$menu_icon_size_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $menu_icon_size_desktop_dynamic_css;
}

$menu_icon_styling   = cosmoswp_get_theme_options('menu-open-icon-styling');
$menu_icon_styling   = json_decode($menu_icon_styling,true);
//txt color
$menu_icon_txt_color     = cosmoswp_ifset($menu_icon_styling['normal-text-color']);
if ( $menu_icon_txt_color ){
	$menu_icon_css .= 'color:'.$menu_icon_txt_color.';';
}
//bg color
$menu_icon_bg_color      = cosmoswp_ifset($menu_icon_styling['normal-bg-color']);
if ( $menu_icon_bg_color ){
	$menu_icon_css .= 'background:'.$menu_icon_bg_color.';';
}
else{
	$menu_icon_css .= 'background:transparent;';
}
//border style
$menu_icon_border_style      = cosmoswp_ifset($menu_icon_styling['normal-border-style']);
if ( $menu_icon_border_style ){
	$menu_icon_css .= 'border-style:'.$menu_icon_border_style.';';
}
//border color
$menu_icon_border_color      = cosmoswp_ifset($menu_icon_styling['normal-border-color']);
if ( $menu_icon_border_color ){
	$menu_icon_css .= 'border-color:'.$menu_icon_border_color.';';
}
//border width
$menu_icon_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($menu_icon_styling['normal-border-width']),'desktop');
if (strpos($menu_icon_border_width, 'px') !== false) {
	$menu_icon_css .= 'border-width:'.$menu_icon_border_width.';';
}
//border radius
$menu_icon_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($menu_icon_styling['normal-border-radius']),'desktop');
if (strpos($menu_icon_border_radius, 'px') !== false){
	$menu_icon_css		.= 'border-radius:'.$menu_icon_border_radius.';';
}
//bx shadow
$menu_icon_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($menu_icon_styling['normal-box-shadow-css']),'desktop');
if (strpos($menu_icon_shadow_css, 'px') !== false) {
	$menu_icon_shadow_color  = cosmoswp_ifset($menu_icon_styling['normal-box-shadow-color']);
	$menu_icon_bx_shadow     = $menu_icon_shadow_css.' '.$menu_icon_shadow_color;
	$menu_icon_css .=	'-webkit-box-shadow:'.$menu_icon_bx_shadow.';';
	$menu_icon_css .=	'-moz-box-shadow:'.$menu_icon_bx_shadow.';';
	$menu_icon_css .=	'box-shadow:'.$menu_icon_bx_shadow.';';
}
/* margin */
$menu_icon_margin = cosmoswp_get_theme_options('menu-open-icon-margin');
$menu_icon_margin = json_decode($menu_icon_margin,true);
// desktop margin 
$menu_icon_margin_desktop = cosmoswp_cssbox_values_inline($menu_icon_margin,'desktop');
if (strpos($menu_icon_margin_desktop, 'px') !== false){
	$menu_icon_desktop_css		.= 'margin:'.$menu_icon_margin_desktop.';';
}
// tablet marign 
$menu_icon_margin_tablet  = cosmoswp_cssbox_values_inline($menu_icon_margin,'tablet');
if (strpos($menu_icon_margin_tablet, 'px') !== false){
	$menu_icon_tablet_css		.= 'margin:'.$menu_icon_margin_tablet.';';
}
// mobile margin 
$menu_icon_margin_mobile  = cosmoswp_cssbox_values_inline($menu_icon_margin,'mobile');
if (strpos($menu_icon_margin_mobile, 'px') !== false){
	$menu_icon_css		.= 'margin:'.$menu_icon_margin_mobile.';';
}


/* padding */
$menu_icon_padding = cosmoswp_get_theme_options('menu-open-icon-padding');
$menu_icon_padding = json_decode($menu_icon_padding,true);
// desktop padding
$menu_icon_padding_desktop = cosmoswp_cssbox_values_inline($menu_icon_padding,'desktop');
if (strpos($menu_icon_padding_desktop, 'px') !== false){
	$menu_icon_desktop_css		.= 'padding:'.$menu_icon_padding_desktop.';';
}
//tablet padding
$menu_icon_padding_tablet  = cosmoswp_cssbox_values_inline($menu_icon_padding,'tablet');
if (strpos($menu_icon_padding_tablet, 'px') !== false){
	$menu_icon_tablet_css		.= 'padding:'.$menu_icon_padding_tablet.';';
}
//mobile padding
$menu_icon_padding_mobile  = cosmoswp_cssbox_values_inline($menu_icon_padding,'mobile');
if (strpos($menu_icon_padding_mobile, 'px') !== false){
	$menu_icon_css		.= 'padding:'.$menu_icon_padding_mobile.';';
}

//typography
$menu_icon_typography_options = cosmoswp_get_theme_options('menu-open-icon-typography-options');
if ('custom' == $menu_icon_typography_options){
	$menu_icon_typography         = cosmoswp_get_theme_options('menu-open-icon-typography');
	$menu_icon_typography         = json_decode($menu_icon_typography,true);

	$menu_icon_font_family     =  cosmoswp_font_family($menu_icon_typography);
	if ( $menu_icon_font_family ){
		$menu_icon_css .=  'font-family:'.$menu_icon_font_family.';';
		$menu_icon_font_weight     = cosmoswp_font_weight( $menu_icon_typography );
		if ( $menu_icon_font_weight ){
			$menu_icon_css .=  'font-weight:'.$menu_icon_font_weight.';';
		}
		$menu_icon_font_style      = cosmoswp_ifset($menu_icon_typography['font-style']);
		if ( $menu_icon_font_style ){
			$menu_icon_css .=  'font-style:'.$menu_icon_font_style.';';
		}
		$menu_icon_text_decoration = cosmoswp_ifset($menu_icon_typography['text-decoration']);
		if ( $menu_icon_text_decoration ){
			$menu_icon_css .=  'text-decoration:'.$menu_icon_text_decoration.';';
		}
		$menu_icon_text_transform  = cosmoswp_ifset($menu_icon_typography['text-transform']);
		if ( $menu_icon_text_transform ){
			$menu_icon_css .=  'text-transform:'.$menu_icon_text_transform.';';
		}
		$menu_icon_font_size       = cosmoswp_ifset($menu_icon_typography['font-size']['mobile']);
		if ( $menu_icon_font_size ){
			$menu_icon_css .=  'font-size:'.$menu_icon_font_size.'px;';
		}
		$menu_icon_line_height     = cosmoswp_ifset($menu_icon_typography['line-height']['mobile']);
		if ( $menu_icon_line_height ){
			$menu_icon_css .=  'line-height:'.$menu_icon_line_height.'px;';
		}
		$menu_icon_letter_spacing  = cosmoswp_ifset($menu_icon_typography['letter-spacing']['mobile']);
		if ( $menu_icon_letter_spacing ){
			$menu_icon_css .=  'letter-spacing:'.$menu_icon_letter_spacing.'px;';
		}


		/* menu icon tablet css */
		$menu_icon_tablet_font_size       = cosmoswp_ifset($menu_icon_typography['font-size']['tablet']);
		if ( $menu_icon_tablet_font_size ){
			$menu_icon_tablet_css .=  'font-size:'.$menu_icon_tablet_font_size.'px;';
		}
		$menu_icon_tablet_line_height     = cosmoswp_ifset($menu_icon_typography['line-height']['tablet']);
		if ( $menu_icon_tablet_line_height ){
			$menu_icon_tablet_css .=  'line-height:'.$menu_icon_tablet_line_height.'px;';
		}
		$menu_icon_tablet_letter_spacing  = cosmoswp_ifset($menu_icon_typography['letter-spacing']['tablet']);
		if ( $menu_icon_tablet_letter_spacing ){
			$menu_icon_tablet_css .=  'letter-spacing:'.$menu_icon_tablet_letter_spacing.'px;';
		}

		/* menu icon desktop tablet css */
		$menu_icon_desktop_font_size       = cosmoswp_ifset($menu_icon_typography['font-size']['desktop']);
		if ( $menu_icon_desktop_font_size ){
			$menu_icon_desktop_css .=  'font-size:'.$menu_icon_desktop_font_size.'px;';
		}
		$menu_icon_desktop_line_height     = cosmoswp_ifset($menu_icon_typography['line-height']['desktop']);
		if ( $menu_icon_desktop_line_height ){
			$menu_icon_desktop_css .=  'line-height:'.$menu_icon_desktop_line_height.'px;';
		}
		$menu_icon_desktop_letter_spacing  = cosmoswp_ifset($menu_icon_typography['letter-spacing']['desktop']);
		if ( $menu_icon_desktop_letter_spacing ){
			$menu_icon_desktop_css .=  'letter-spacing:'.$menu_icon_desktop_letter_spacing.'px;';
		}
	}

}
/* mobile css */
if ( !empty( $menu_icon_css )){
	$menu_icon_dynamic_css = '.cwp-menu-icon-btn .cwp-toggle-btn-text{
		'.$menu_icon_css.'
	}';
	$local_dynamic_css['all'] .= $menu_icon_dynamic_css;
}
/* tablet css */
if ( !empty($menu_icon_tablet_css) ){
	$menu_icon_tablet_dynamic_css = '.cwp-menu-icon-btn .cwp-toggle-btn-text{
		'.$menu_icon_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $menu_icon_tablet_dynamic_css;
}
/* desktop css */
if ( !empty($menu_icon_desktop_css) ){
	$menu_icon_desktop_dynamic_css = '.cwp-menu-icon-btn .cwp-toggle-btn-text{
		'.$menu_icon_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $menu_icon_desktop_dynamic_css;
}


//txt color
$menu_icon_hover_txt_color     = cosmoswp_ifset($menu_icon_styling['hover-text-color']);
if ( $menu_icon_hover_txt_color ){
	$menu_icon_hover_css .= 'color:'.$menu_icon_hover_txt_color.';';
}
//bg color
$menu_icon_hover_bg_color      = cosmoswp_ifset($menu_icon_styling['hover-bg-color']);
if ( $menu_icon_hover_bg_color ){
	$menu_icon_hover_css .= 'background-color:'.$menu_icon_hover_bg_color.';';
}
//border style
$menu_icon_hover_border_style      = cosmoswp_ifset($menu_icon_styling['hover-border-style']);
if ( $menu_icon_hover_border_style ){
	$menu_icon_hover_css .= 'border-style:'.$menu_icon_hover_border_style.';';
}
//border color
$menu_icon_hover_border_color      = cosmoswp_ifset($menu_icon_styling['hover-border-color']);
if ( $menu_icon_hover_border_color ){
	$menu_icon_hover_css .= 'border-color:'.$menu_icon_hover_border_color.';';
}
//border width
$menu_icon_hover_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($menu_icon_styling['hover-border-width']),'desktop');
if (strpos($menu_icon_hover_border_width, 'px') !== false) {
	$menu_icon_hover_css .= 'border-width:'.$menu_icon_hover_border_width.';';
}
//border radius
$menu_icon_hover_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($menu_icon_styling['hover-border-radius']),'desktop');
if (strpos($menu_icon_hover_border_radius, 'px') !== false){
	$menu_icon_hover_css		.= 'border-radius:'.$menu_icon_hover_border_radius.';';
}
//bx shadow
$menu_icon_hover_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($menu_icon_styling['hover-box-shadow-css']),'desktop');
if (strpos($menu_icon_hover_shadow_css, 'px') !== false) {
	$menu_icon_hover_shadow_color  = cosmoswp_ifset($menu_icon_styling['hover-box-shadow-color']);
	$menu_icon_hover_bx_shadow     = $menu_icon_hover_shadow_css.' '.$menu_icon_hover_shadow_color;
	$menu_icon_hover_css .=	'-webkit-box-shadow:'.$menu_icon_hover_bx_shadow.';';
	$menu_icon_hover_css .=	'-moz-box-shadow:'.$menu_icon_hover_bx_shadow.';';
	$menu_icon_hover_css .=	'box-shadow:'.$menu_icon_hover_bx_shadow.';';
}	
if ( !empty( $menu_icon_hover_css )){
	$menu_icon_search_hover_dynamic_css = '.cwp-menu-icon-btn:hover .cwp-toggle-btn-text{
		'.$menu_icon_hover_css.'
	}';
	$local_dynamic_css['all'] .= $menu_icon_search_hover_dynamic_css;
}


//submenu bg color
$menu_icon_submenu_bg_color_css = '';
$menu_icon_submenu_bg_color = cosmoswp_get_theme_options('menu-icon-sidebar-submenu-bg-color');
if ( $menu_icon_submenu_bg_color ){
    $menu_icon_submenu_bg_color_css = 'background-color:'.$menu_icon_submenu_bg_color.';';
}
if ( !empty( $menu_icon_submenu_bg_color_css )){
    $menu_icon_submenu_bg_color_dynamic_css = '.cwp-header-menu-sidebar .cwp-primary-menu .sub-menu{

		'.$menu_icon_submenu_bg_color_css.'
	}';
    $local_dynamic_css['all'] .= $menu_icon_submenu_bg_color_dynamic_css;
}


/*primary menu submenu item*/
$menu_icon_submenu_css         = '';

$menu_icon_submenu_styling   = cosmoswp_get_theme_options('menu-icon-sidebar-submenu-styling');
$menu_icon_submenu_styling   = json_decode($menu_icon_submenu_styling,true);
//txt color
$menu_icon_submenu_txt_color     = cosmoswp_ifset($menu_icon_submenu_styling['normal-text-color']);
if ( $menu_icon_submenu_txt_color ){
    $menu_icon_submenu_css .= 'color:'.$menu_icon_submenu_txt_color.';';
}
//bg color
$menu_icon_submenu_bg_color      = cosmoswp_ifset($menu_icon_submenu_styling['normal-bg-color']);
if ( $menu_icon_submenu_bg_color ){
    $menu_icon_submenu_css .= 'background-color:'.$menu_icon_submenu_bg_color.';';
}
//border style
$menu_icon_submenu_border_style      = cosmoswp_ifset($menu_icon_submenu_styling['normal-border-style']);
if ( $menu_icon_submenu_border_style ){
    $menu_icon_submenu_css .= 'border-style:'.$menu_icon_submenu_border_style.';';
}
//border color
$menu_icon_submenu_border_color      = cosmoswp_ifset($menu_icon_submenu_styling['normal-border-color']);
if ( $menu_icon_submenu_border_color ){
    $menu_icon_submenu_css .= 'border-color:'.$menu_icon_submenu_border_color.';';
}
//border width
$menu_icon_submenu_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($menu_icon_submenu_styling['normal-border-width']),'desktop');
if (strpos($menu_icon_submenu_border_width, 'px') !== false) {
    $menu_icon_submenu_css .= 'border-width:'.$menu_icon_submenu_border_width.';';
}
//border radius
$menu_icon_submenu_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($menu_icon_submenu_styling['normal-border-radius']),'desktop');
if (strpos($menu_icon_submenu_border_radius, 'px') !== false){
    $menu_icon_submenu_css		.= 'border-radius:'.$menu_icon_submenu_border_radius.';';
}

/* Primary menu sub menu mobile css */
if ( !empty( $menu_icon_submenu_css )){
    $menu_icon_submenu_dynamic_css = '.cwp-header-menu-sidebar .cwp-primary-menu li li a{
		'.$menu_icon_submenu_css.'
	}';
    $local_dynamic_css['all'] .= $menu_icon_submenu_dynamic_css;
}

/* hover primary menu submenuitem styling */
$menu_icon_submenu_hover_css = '';
//txt color
$menu_icon_submenu_hover_txt_color     = cosmoswp_ifset($menu_icon_submenu_styling['hover-text-color']);
if ( $menu_icon_submenu_hover_txt_color ){
    $menu_icon_submenu_hover_css .= 'color:'.$menu_icon_submenu_hover_txt_color.';';
}
//bg color
$menu_icon_submenu_hover_bg_color      = cosmoswp_ifset($menu_icon_submenu_styling['hover-bg-color']);
if ( $menu_icon_submenu_hover_bg_color ){
    $menu_icon_submenu_hover_css .= 'background-color:'.$menu_icon_submenu_hover_bg_color.';';
}
//border style
$menu_icon_submenu_hover_border_style      = cosmoswp_ifset($menu_icon_submenu_styling['hover-border-style']);
if ( $menu_icon_submenu_hover_border_style ){
    $menu_icon_submenu_hover_css .= 'border-style:'.$menu_icon_submenu_hover_border_style.';';
}
//border color
$menu_icon_submenu_hover_border_color      = cosmoswp_ifset($menu_icon_submenu_styling['hover-border-color']);
if ( $menu_icon_submenu_hover_border_color ){
    $menu_icon_submenu_hover_css .= 'border-color:'.$menu_icon_submenu_hover_border_color.';';
}
//border width
$menu_icon_submenu_hover_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($menu_icon_submenu_styling['hover-border-width']),'desktop');
if (strpos($menu_icon_submenu_hover_border_width, 'px') !== false) {
    $menu_icon_submenu_hover_css .= 'border-width:'.$menu_icon_submenu_hover_border_width.';';
}
//border radius
$menu_icon_submenu_hover_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($menu_icon_submenu_styling['hover-border-radius']),'desktop');
if (strpos($menu_icon_submenu_hover_border_radius, 'px') !== false){
    $menu_icon_submenu_hover_css		.= 'border-radius:'.$menu_icon_submenu_hover_border_radius.';';
}
if ( !empty( $menu_icon_submenu_hover_css )){
    $menu_icon_submenu_hover_dynamic_css = '.cwp-header-menu-sidebar .cwp-primary-menu li li a:hover,
	.cwp-header-menu-sidebar .cwp-primary-menu li li a:focus{
		'.$menu_icon_submenu_hover_css.'
	}';
    $local_dynamic_css['all'] .= $menu_icon_submenu_hover_dynamic_css;
}

/* primary menu submneu active item styling */
$menu_icon_submenu_active_css = '';
//txt color
$menu_icon_submenu_active_txt_color     = cosmoswp_ifset($menu_icon_submenu_styling['active-text-color']);
if ( $menu_icon_submenu_active_txt_color ){
    $menu_icon_submenu_active_css .= 'color:'.$menu_icon_submenu_active_txt_color.';';
}
//bg color
$menu_icon_submenu_active_bg_color      = cosmoswp_ifset($menu_icon_submenu_styling['active-bg-color']);
if ( $menu_icon_submenu_active_bg_color ){
    $menu_icon_submenu_active_css .= 'background-color:'.$menu_icon_submenu_active_bg_color.';';
}
//border style
$menu_icon_submenu_active_border_style      = cosmoswp_ifset($menu_icon_submenu_styling['active-border-style']);
if ( $menu_icon_submenu_active_border_style ){
    $menu_icon_submenu_active_css .= 'border-style:'.$menu_icon_submenu_active_border_style.';';
}
//border color
$menu_icon_submenu_active_border_color      = cosmoswp_ifset($menu_icon_submenu_styling['active-border-color']);
if ( $menu_icon_submenu_active_border_color ){
    $menu_icon_submenu_active_css .= 'border-color:'.$menu_icon_submenu_active_border_color.';';
}
//border width
$menu_icon_submenu_active_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($menu_icon_submenu_styling['active-border-width']),'desktop');
if (strpos($menu_icon_submenu_active_border_width, 'px') !== false) {
    $menu_icon_submenu_active_css .= 'border-width:'.$menu_icon_submenu_active_border_width.';';
}
//border radius
$menu_icon_submenu_active_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($menu_icon_submenu_styling['active-border-radius']),'desktop');
if (strpos($menu_icon_submenu_active_border_radius, 'px') !== false){
    $menu_icon_submenu_active_css		.= 'border-radius:'.$menu_icon_submenu_active_border_radius.';';
}
if ( !empty( $menu_icon_submenu_active_css )){
    $menu_icon_submenu_active_dynamic_css = '
    .cwp-header-menu-sidebar .cwp-primary-menu li li.active > a,
	.cwp-header-menu-sidebar .cwp-primary-menu li li.current-menu-item > a{
		'.$menu_icon_submenu_active_css.'
	}';
    $local_dynamic_css['all'] .= $menu_icon_submenu_active_dynamic_css;
}




/*menu icon close*/


/*Menu Icon Styling*/
$menu_close_icon_size_css         = '';
$menu_close_icon_size_tablet_css  = '';
$menu_close_icon_size_desktop_css = '';

$menu_close_icon_css              = '';
$menu_close_icon_tablet_css       = '';
$menu_close_icon_desktop_css      = '';

$menu_close_icon_hover_css        =  '';

/* icon size */
$menu_icon_size = cosmoswp_get_theme_options('menu-icon-close-icon-size-responsive');
$menu_icon_size = json_decode($menu_icon_size,true);

// desktop icon size
$desktop_icon_size  = cosmoswp_ifset($menu_icon_size['desktop']);
if (!empty( $desktop_icon_size )){
    $menu_close_icon_size_desktop_css	.= 'font-size:'.$desktop_icon_size.'px;';
}
// tablet icon size
$tablet_icon_size  = cosmoswp_ifset($menu_icon_size['tablet']);
if (!empty( $tablet_icon_size )){
    $menu_close_icon_size_tablet_css	.= 'font-size:'.$tablet_icon_size.'px;';
}
// mobile icon size
$mobile_icon_size  = cosmoswp_ifset($menu_icon_size['mobile']);
if (!empty( $mobile_icon_size )){
    $menu_close_icon_size_css	 .= 'font-size:'.$mobile_icon_size.'px;';
}

/* mobile css */
if ( !empty( $menu_close_icon_size_css )){
    $menu_icon_size_dynamic_css = '.cwp-header-menu-sidebar .cwp-close-btn i{
		'.$menu_close_icon_size_css.'
	}';
    $local_dynamic_css['all'] .= $menu_icon_size_dynamic_css;
}
/* tablet css */
if ( !empty($menu_close_icon_size_tablet_css) ){
    $menu_icon_size_tablet_dynamic_css = '.cwp-header-menu-sidebar .cwp-close-btn i{
		'.$menu_close_icon_size_tablet_css.'
	}';
    $local_dynamic_css['tablet'] .= $menu_icon_size_tablet_dynamic_css;
}
/* desktop css */
if ( !empty($menu_close_icon_size_desktop_css) ){
    $menu_icon_size_desktop_dynamic_css = '.cwp-header-menu-sidebar .cwp-close-btn i{
		'.$menu_close_icon_size_desktop_css.'
	}';
    $local_dynamic_css['desktop'] .= $menu_icon_size_desktop_dynamic_css;
}

$menu_icon_styling   = cosmoswp_get_theme_options('menu-icon-close-icon-styling');
$menu_icon_styling   = json_decode($menu_icon_styling,true);
//txt color
$menu_icon_txt_color     = cosmoswp_ifset($menu_icon_styling['normal-text-color']);
if ( $menu_icon_txt_color ){
    $menu_close_icon_css .= 'color:'.$menu_icon_txt_color.';';
}
//bg color
$menu_icon_bg_color      = cosmoswp_ifset($menu_icon_styling['normal-bg-color']);
if ( $menu_icon_bg_color ){
    $menu_close_icon_css .= 'background:'.$menu_icon_bg_color.';';
}
else{
    $menu_close_icon_css .= 'background:transparent;';
}
//border style
$menu_icon_border_style      = cosmoswp_ifset($menu_icon_styling['normal-border-style']);
if ( $menu_icon_border_style ){
    $menu_close_icon_css .= 'border-style:'.$menu_icon_border_style.';';
}
//border color
$menu_icon_border_color      = cosmoswp_ifset($menu_icon_styling['normal-border-color']);
if ( $menu_icon_border_color ){
    $menu_close_icon_css .= 'border-color:'.$menu_icon_border_color.';';
}
//border width
$menu_icon_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($menu_icon_styling['normal-border-width']),'desktop');
if (strpos($menu_icon_border_width, 'px') !== false) {
    $menu_close_icon_css .= 'border-width:'.$menu_icon_border_width.';';
}
//border radius
$menu_icon_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($menu_icon_styling['normal-border-radius']),'desktop');
if (strpos($menu_icon_border_radius, 'px') !== false){
    $menu_close_icon_css		.= 'border-radius:'.$menu_icon_border_radius.';';
}
//bx shadow
$menu_icon_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($menu_icon_styling['normal-box-shadow-css']),'desktop');
if (strpos($menu_icon_shadow_css, 'px') !== false) {
    $menu_icon_shadow_color  = cosmoswp_ifset($menu_icon_styling['normal-box-shadow-color']);
    $menu_icon_bx_shadow     = $menu_icon_shadow_css.' '.$menu_icon_shadow_color;
    $menu_close_icon_css .=	'-webkit-box-shadow:'.$menu_icon_bx_shadow.';';
    $menu_close_icon_css .=	'-moz-box-shadow:'.$menu_icon_bx_shadow.';';
    $menu_close_icon_css .=	'box-shadow:'.$menu_icon_bx_shadow.';';
}
/* margin */
$menu_icon_margin = cosmoswp_get_theme_options('menu-icon-close-margin');
$menu_icon_margin = json_decode($menu_icon_margin,true);
// desktop margin
$menu_icon_margin_desktop = cosmoswp_cssbox_values_inline($menu_icon_margin,'desktop');
if (strpos($menu_icon_margin_desktop, 'px') !== false){
    $menu_close_icon_desktop_css		.= 'margin:'.$menu_icon_margin_desktop.';';
}
// tablet marign
$menu_icon_margin_tablet  = cosmoswp_cssbox_values_inline($menu_icon_margin,'tablet');
if (strpos($menu_icon_margin_tablet, 'px') !== false){
    $menu_close_icon_tablet_css		.= 'margin:'.$menu_icon_margin_tablet.';';
}
// mobile margin
$menu_icon_margin_mobile  = cosmoswp_cssbox_values_inline($menu_icon_margin,'mobile');
if (strpos($menu_icon_margin_mobile, 'px') !== false){
    $menu_close_icon_css		.= 'margin:'.$menu_icon_margin_mobile.';';
}


/* padding */
$menu_icon_padding = cosmoswp_get_theme_options('menu-icon-close-padding');
$menu_icon_padding = json_decode($menu_icon_padding,true);
// desktop padding
$menu_icon_padding_desktop = cosmoswp_cssbox_values_inline($menu_icon_padding,'desktop');
if (strpos($menu_icon_padding_desktop, 'px') !== false){
    $menu_close_icon_desktop_css		.= 'padding:'.$menu_icon_padding_desktop.';';
}
//tablet padding
$menu_icon_padding_tablet  = cosmoswp_cssbox_values_inline($menu_icon_padding,'tablet');
if (strpos($menu_icon_padding_tablet, 'px') !== false){
    $menu_close_icon_tablet_css		.= 'padding:'.$menu_icon_padding_tablet.';';
}
//mobile padding
$menu_icon_padding_mobile  = cosmoswp_cssbox_values_inline($menu_icon_padding,'mobile');
if (strpos($menu_icon_padding_mobile, 'px') !== false){
    $menu_close_icon_css		.= 'padding:'.$menu_icon_padding_mobile.';';
}

//typography
$menu_icon_typography_options = cosmoswp_get_theme_options('menu-icon-close-text-typography-options');
if ('custom' == $menu_icon_typography_options){
    $menu_icon_typography         = cosmoswp_get_theme_options('menu-icon-close-text-typography');
    $menu_icon_typography         = json_decode($menu_icon_typography,true);

    $menu_icon_font_family     =  cosmoswp_font_family($menu_icon_typography);
    if ( $menu_icon_font_family ){
        $menu_close_icon_css .=  'font-family:'.$menu_icon_font_family.';';
        $menu_icon_font_weight     = cosmoswp_font_weight( $menu_icon_typography );
        if ( $menu_icon_font_weight ){
            $menu_close_icon_css .=  'font-weight:'.$menu_icon_font_weight.';';
        }
        $menu_icon_font_style      = cosmoswp_ifset($menu_icon_typography['font-style']);
        if ( $menu_icon_font_style ){
            $menu_close_icon_css .=  'font-style:'.$menu_icon_font_style.';';
        }
        $menu_icon_text_decoration = cosmoswp_ifset($menu_icon_typography['text-decoration']);
        if ( $menu_icon_text_decoration ){
            $menu_close_icon_css .=  'text-decoration:'.$menu_icon_text_decoration.';';
        }
        $menu_icon_text_transform  = cosmoswp_ifset($menu_icon_typography['text-transform']);
        if ( $menu_icon_text_transform ){
            $menu_close_icon_css .=  'text-transform:'.$menu_icon_text_transform.';';
        }
        $menu_icon_font_size       = cosmoswp_ifset($menu_icon_typography['font-size']['mobile']);
        if ( $menu_icon_font_size ){
            $menu_close_icon_css .=  'font-size:'.$menu_icon_font_size.'px;';
        }
        $menu_icon_line_height     = cosmoswp_ifset($menu_icon_typography['line-height']['mobile']);
        if ( $menu_icon_line_height ){
            $menu_close_icon_css .=  'line-height:'.$menu_icon_line_height.'px;';
        }
        $menu_icon_letter_spacing  = cosmoswp_ifset($menu_icon_typography['letter-spacing']['mobile']);
        if ( $menu_icon_letter_spacing ){
            $menu_close_icon_css .=  'letter-spacing:'.$menu_icon_letter_spacing.'px;';
        }


        /* menu icon tablet css */
        $menu_icon_tablet_font_size       = cosmoswp_ifset($menu_icon_typography['font-size']['tablet']);
        if ( $menu_icon_tablet_font_size ){
            $menu_close_icon_tablet_css .=  'font-size:'.$menu_icon_tablet_font_size.'px;';
        }
        $menu_icon_tablet_line_height     = cosmoswp_ifset($menu_icon_typography['line-height']['tablet']);
        if ( $menu_icon_tablet_line_height ){
            $menu_close_icon_tablet_css .=  'line-height:'.$menu_icon_tablet_line_height.'px;';
        }
        $menu_icon_tablet_letter_spacing  = cosmoswp_ifset($menu_icon_typography['letter-spacing']['tablet']);
        if ( $menu_icon_tablet_letter_spacing ){
            $menu_close_icon_tablet_css .=  'letter-spacing:'.$menu_icon_tablet_letter_spacing.'px;';
        }

        /* menu icon desktop tablet css */
        $menu_icon_desktop_font_size       = cosmoswp_ifset($menu_icon_typography['font-size']['desktop']);
        if ( $menu_icon_desktop_font_size ){
            $menu_close_icon_desktop_css .=  'font-size:'.$menu_icon_desktop_font_size.'px;';
        }
        $menu_icon_desktop_line_height     = cosmoswp_ifset($menu_icon_typography['line-height']['desktop']);
        if ( $menu_icon_desktop_line_height ){
            $menu_close_icon_desktop_css .=  'line-height:'.$menu_icon_desktop_line_height.'px;';
        }
        $menu_icon_desktop_letter_spacing  = cosmoswp_ifset($menu_icon_typography['letter-spacing']['desktop']);
        if ( $menu_icon_desktop_letter_spacing ){
            $menu_close_icon_desktop_css .=  'letter-spacing:'.$menu_icon_desktop_letter_spacing.'px;';
        }
    }

}
/* mobile css */
if ( !empty( $menu_close_icon_css )){
    $menu_icon_dynamic_css = '.cwp-header-menu-sidebar .cwp-close-btn-box{
		'.$menu_close_icon_css.'
	}';
    $local_dynamic_css['all'] .= $menu_icon_dynamic_css;
}
/* tablet css */
if ( !empty($menu_close_icon_tablet_css) ){
    $menu_icon_tablet_dynamic_css = '.cwp-header-menu-sidebar .cwp-close-btn-box{
		'.$menu_close_icon_tablet_css.'
	}';
    $local_dynamic_css['tablet'] .= $menu_icon_tablet_dynamic_css;
}
/* desktop css */
if ( !empty($menu_close_icon_desktop_css) ){
    $menu_icon_desktop_dynamic_css = '.cwp-header-menu-sidebar .cwp-close-btn-box{
		'.$menu_close_icon_desktop_css.'
	}';
    $local_dynamic_css['desktop'] .= $menu_icon_desktop_dynamic_css;
}


//txt color
$menu_icon_hover_txt_color     = cosmoswp_ifset($menu_icon_styling['hover-text-color']);
if ( $menu_icon_hover_txt_color ){
    $menu_close_icon_hover_css .= 'color:'.$menu_icon_hover_txt_color.';';
}
//bg color
$menu_icon_hover_bg_color      = cosmoswp_ifset($menu_icon_styling['hover-bg-color']);
if ( $menu_icon_hover_bg_color ){
    $menu_close_icon_hover_css .= 'background-color:'.$menu_icon_hover_bg_color.';';
}
//border style
$menu_icon_hover_border_style      = cosmoswp_ifset($menu_icon_styling['hover-border-style']);
if ( $menu_icon_hover_border_style ){
    $menu_close_icon_hover_css .= 'border-style:'.$menu_icon_hover_border_style.';';
}
//border color
$menu_icon_hover_border_color      = cosmoswp_ifset($menu_icon_styling['hover-border-color']);
if ( $menu_icon_hover_border_color ){
    $menu_close_icon_hover_css .= 'border-color:'.$menu_icon_hover_border_color.';';
}
//border width
$menu_icon_hover_border_width  = cosmoswp_cssbox_values_inline(cosmoswp_ifset($menu_icon_styling['hover-border-width']),'desktop');
if (strpos($menu_icon_hover_border_width, 'px') !== false) {
    $menu_close_icon_hover_css .= 'border-width:'.$menu_icon_hover_border_width.';';
}
//border radius
$menu_icon_hover_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($menu_icon_styling['hover-border-radius']),'desktop');
if (strpos($menu_icon_hover_border_radius, 'px') !== false){
    $menu_close_icon_hover_css		.= 'border-radius:'.$menu_icon_hover_border_radius.';';
}
//bx shadow
$menu_icon_hover_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($menu_icon_styling['hover-box-shadow-css']),'desktop');
if (strpos($menu_icon_hover_shadow_css, 'px') !== false) {
    $menu_icon_hover_shadow_color  = cosmoswp_ifset($menu_icon_styling['hover-box-shadow-color']);
    $menu_icon_hover_bx_shadow     = $menu_icon_hover_shadow_css.' '.$menu_icon_hover_shadow_color;
    $menu_close_icon_hover_css .=	'-webkit-box-shadow:'.$menu_icon_hover_bx_shadow.';';
    $menu_close_icon_hover_css .=	'-moz-box-shadow:'.$menu_icon_hover_bx_shadow.';';
    $menu_close_icon_hover_css .=	'box-shadow:'.$menu_icon_hover_bx_shadow.';';
}
if ( !empty( $menu_close_icon_hover_css )){
    $menu_icon_search_hover_dynamic_css = '.cwp-header-menu-sidebar .cwp-close-btn-box:hover {
		'.$menu_close_icon_hover_css.'
	}';
    $local_dynamic_css['all'] .= $menu_icon_search_hover_dynamic_css;
}



?><?php

/**
 * [$contact_info_title_css description]
 * @var string
 */
$contact_info_title_css         = '';
$contact_info_title_tablet_css  = '';
$contact_info_title_desktop_css = '';

/**
 * [$contact_info_text_css description]
 * @var string
 */
$contact_info_text_css         = '';
$contact_info_text_tablet_css  = '';
$contact_info_text_desktop_css = '';

/* margin and padding */
$contact_info_padding_margin_css         = '';
$contact_info_padding_margin_tablet_css  = '';
$contact_info_padding_margin_desktop_css = '';

/* marign */
$contact_info_margin = cosmoswp_get_theme_options('contact-info-margin');
$contact_info_margin = json_decode($contact_info_margin,true);

// desktop margin 
$contact_info_margin_desktop = cosmoswp_cssbox_values_inline($contact_info_margin,'desktop');
if (strpos($contact_info_margin_desktop, 'px') !== false){
	$contact_info_padding_margin_desktop_css		.= 'margin:'.$contact_info_margin_desktop.';';
}
// tablet marign 
$contact_info_margin_tablet  = cosmoswp_cssbox_values_inline($contact_info_margin,'tablet');
if (strpos($contact_info_margin_tablet, 'px') !== false){
	$contact_info_padding_margin_tablet_css		.= 'margin:'.$contact_info_margin_tablet.';';
}
// mobile margin 
$contact_info_margin_mobile  = cosmoswp_cssbox_values_inline($contact_info_margin,'mobile');
if (strpos($contact_info_margin_mobile, 'px') !== false){
	$contact_info_padding_margin_css		.= 'margin:'.$contact_info_margin_mobile.';';
}

/* padding */
$contact_info_padding = cosmoswp_get_theme_options('contact-info-padding');
$contact_info_padding = json_decode($contact_info_padding,true);

// desktop padding
$contact_info_padding_desktop = cosmoswp_cssbox_values_inline($contact_info_padding,'desktop');
if (strpos($contact_info_padding_desktop, 'px') !== false){
	$contact_info_padding_margin_desktop_css		.= 'padding:'.$contact_info_padding_desktop.';';
}
//tablet padding
$contact_info_padding_tablet  = cosmoswp_cssbox_values_inline($contact_info_padding,'tablet');
if (strpos($contact_info_padding_tablet, 'px') !== false){
	$contact_info_padding_margin_tablet_css		.= 'padding:'.$contact_info_padding_tablet.';';
}
//mobile padding
$contact_info_padding_mobile  = cosmoswp_cssbox_values_inline($contact_info_padding,'mobile');
if (strpos($contact_info_padding_mobile, 'px') !== false){
	$contact_info_padding_margin_css		.= 'padding:'.$contact_info_padding_mobile.';';
}

/* mobile css*/
if ( !empty( $contact_info_padding_margin_css )){
	$contact_info_padding_margin_dynamic_css = '.cwp-contact-info{
		'.$contact_info_padding_margin_css.'
	}';
	$local_dynamic_css['all'] .= $contact_info_padding_margin_dynamic_css;
}

/* tablet css */
if ( !empty($contact_info_padding_margin_tablet_css) ){
	$contact_info_padding_margin_tablet_dynamic_css = '.cwp-contact-info{
		'.$contact_info_padding_margin_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $contact_info_padding_margin_tablet_dynamic_css;
}

/* desktop css */
if ( !empty($contact_info_padding_margin_desktop_css) ){
	$contact_info_padding_margin_desktop_dynamic_css = '.cwp-contact-info{
		'.$contact_info_padding_margin_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $contact_info_padding_margin_desktop_dynamic_css;
}



/* contact information item styling */
$contact_info_item_css         = '';
$contact_info_item_tablet_css  = '';
$contact_info_item_desktop_css = '';

//border options
$contact_info_item_border           = cosmoswp_get_theme_options('contact-info-title-border-styling');
$contact_info_item_border           = json_decode($contact_info_item_border,true);
$contact_info_item_border_style     = cosmoswp_ifset($contact_info_item_border['border-style']);
if ( 'none' !== $contact_info_item_border_style ){

	$contact_info_item_css .= 'border-style:'.$contact_info_item_border_style.';';
	//border width
	$contact_info_item_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($contact_info_item_border['border-width']),'desktop');
	if (strpos($contact_info_item_border_width, 'px') !== false) {
		$contact_info_item_css .= 'border-width:'.$contact_info_item_border_width.';';
	}
	//border color
	$contact_info_item_border_color     = cosmoswp_ifset($contact_info_item_border['border-color']);
	if ($contact_info_item_border_color){
		$contact_info_item_css .= 'border-color:'.$contact_info_item_border_color.';';
	}
}

/* margin */
$contact_info_item_margin = cosmoswp_get_theme_options('contact-info-item-margin');
$contact_info_item_margin = json_decode($contact_info_item_margin,true);
// desktop margin 
$contact_info_item_margin_desktop = cosmoswp_cssbox_values_inline($contact_info_item_margin,'desktop');
if (strpos($contact_info_item_margin_desktop, 'px') !== false){
	$contact_info_item_desktop_css		.= 'margin:'.$contact_info_item_margin_desktop.';';
}
// tablet marign 
$contact_info_item_margin_tablet  = cosmoswp_cssbox_values_inline($contact_info_item_margin,'tablet');
if (strpos($contact_info_item_margin_tablet, 'px') !== false){
	$contact_info_item_tablet_css		.= 'margin:'.$contact_info_item_margin_tablet.';';
}
// mobile margin 
$contact_info_item_margin_mobile  = cosmoswp_cssbox_values_inline($contact_info_item_margin,'mobile');
if (strpos($contact_info_item_margin_mobile, 'px') !== false){
	$contact_info_item_css		.= 'margin:'.$contact_info_item_margin_mobile.';';
}

/* padding */
$contact_info_item_padding = cosmoswp_get_theme_options('contact-info-item-padding');
$contact_info_item_padding = json_decode($contact_info_item_padding,true);
// desktop padding
$contact_info_item_padding_desktop = cosmoswp_cssbox_values_inline($contact_info_item_padding,'desktop');
if (strpos($contact_info_item_padding_desktop, 'px') !== false){
	$contact_info_item_desktop_css		.= 'padding:'.$contact_info_item_padding_desktop.';';
}
//tablet padding
$contact_info_item_padding_tablet  = cosmoswp_cssbox_values_inline($contact_info_item_padding,'tablet');
if (strpos($contact_info_item_padding_tablet, 'px') !== false){
	$contact_info_item_tablet_css		.= 'padding:'.$contact_info_item_padding_tablet.';';
}
//mobile padding
$contact_info_item_padding_mobile  = cosmoswp_cssbox_values_inline($contact_info_item_padding,'mobile');
if (strpos($contact_info_item_padding_mobile, 'px') !== false){
	$contact_info_item_css		.= 'padding:'.$contact_info_item_padding_mobile.';';
}

/* mobile css */
if ( !empty( $contact_info_item_css )){
	$contact_info_item_dynamic_css = '.cwp-contact-info-item{
		'.$contact_info_item_css.'
	}';
	$local_dynamic_css['all'] .= $contact_info_item_dynamic_css;
}

/* tablet css */
if ( !empty($contact_info_item_tablet_css) ){
	$contact_info_item_tablet_dynamic_css = '.cwp-contact-info-item{
		'.$contact_info_item_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $contact_info_item_tablet_dynamic_css;
}

/* desktop css */
if ( !empty($contact_info_item_desktop_css) ){
	$contact_info_item_desktop_dynamic_css = '.cwp-contact-info-item{
		'.$contact_info_item_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $contact_info_item_desktop_dynamic_css;
}

$contact_info_icon_css         = '';
$contact_info_icon_tablet_css  = '';
$contact_info_icon_desktop_css = '';

$contact_info_icon_size = cosmoswp_get_theme_options('contact-info-icon-size');
$contact_info_icon_size = json_decode($contact_info_icon_size,true);

/* desktop */
if ( isset( $contact_info_icon_size['desktop']) && (!empty($contact_info_icon_size['desktop']))) {
	$contact_info_icon_desktop_css .= 'font-size:'.$contact_info_icon_size['desktop'].'px;';
}

/* tablet */
if ( isset( $contact_info_icon_size['tablet']) && (!empty($contact_info_icon_size['tablet']))) {
	$contact_info_icon_tablet_css .= 'font-size:'.$contact_info_icon_size['tablet'].'px;';
}

/*mobile*/
if ( isset( $contact_info_icon_size['mobile']) && (!empty($contact_info_icon_size['mobile']))) {
	$contact_info_icon_css .= 'font-size:'.$contact_info_icon_size['mobile'].'px;';
}

$contact_info_icon_color = cosmoswp_get_theme_options('contact-info-icon-color');
if (!empty( $contact_info_icon_color )){
	$contact_info_icon_css .= 'color:'.$contact_info_icon_color.';';
}

/*mobile css */
if ( !empty( $contact_info_icon_css )){
	$contact_info_icon_dynamic_css = '.cwp-contact-info-icon i{
		'.$contact_info_icon_css.'
	}';
	$local_dynamic_css['all'] .= $contact_info_icon_dynamic_css;
}

/*tablet css */
if ( !empty( $contact_info_icon_tablet_css )){
	$contact_info_icon_tablet_dynamic_css = '.cwp-contact-info-icon i{
		'.$contact_info_icon_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $contact_info_icon_tablet_dynamic_css;
}

/*desktop css */
if ( !empty( $contact_info_icon_desktop_css )){
	$contact_info_icon_desktop_dynamic_css = '.cwp-contact-info-icon i{
		'.$contact_info_icon_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $contact_info_icon_desktop_dynamic_css;
}


/*contact title*/
$contact_info_title_color = cosmoswp_get_theme_options('contact-info-title-color');
if (!empty( $contact_info_title_color )){
	$contact_info_title_css = 'color:'.$contact_info_title_color.';';
}
//typography
$contact_title_typography_options = cosmoswp_get_theme_options('contact-info-title-typography-options');
if ('custom' == $contact_title_typography_options){
	$contact_title_typography         = cosmoswp_get_theme_options('contact-info-title-typography');
	$contact_title_typography         = json_decode($contact_title_typography,true);

	$contact_title_font_family     =  cosmoswp_font_family($contact_title_typography);
	if ( $contact_title_font_family ){
		$contact_info_title_css .=  'font-family:'.$contact_title_font_family.';';
		$contact_title_font_weight     = cosmoswp_font_weight( $contact_title_typography );
		if ( $contact_title_font_weight ){
			$contact_info_title_css .=  'font-weight:'.$contact_title_font_weight.';';
		}
		$contact_title_font_style      = cosmoswp_ifset($contact_title_typography['font-style']);
		if ( $contact_title_font_style ){
			$contact_info_title_css .=  'font-style:'.$contact_title_font_style.';';
		}
		$contact_title_text_decoration = cosmoswp_ifset($contact_title_typography['text-decoration']);
		if ( $contact_title_text_decoration ){
			$contact_info_title_css .=  'text-decoration:'.$contact_title_text_decoration.';';
		}
		$contact_title_text_transform  = cosmoswp_ifset($contact_title_typography['text-transform']);
		if ( $contact_title_text_transform ){
			$contact_info_title_css .=  'text-transform:'.$contact_title_text_transform.';';
		}
		$contact_title_font_size       = cosmoswp_ifset($contact_title_typography['font-size']['mobile']);
		if ( $contact_title_font_size ){
			$contact_info_title_css .=  'font-size:'.$contact_title_font_size.'px;';
		}
		$contact_title_line_height     = cosmoswp_ifset($contact_title_typography['line-height']['mobile']);
		if ( $contact_title_line_height ){
			$contact_info_title_css .=  'line-height:'.$contact_title_line_height.'px;';
		}
		$contact_title_letter_spacing  = cosmoswp_ifset($contact_title_typography['letter-spacing']['mobile']);
		if ( $contact_title_letter_spacing ){
			$contact_info_title_css .=  'letter-spacing:'.$contact_title_letter_spacing.'px;';
		}


		/* $contact_title tablet css */
		$contact_title_tablet_font_size       = cosmoswp_ifset($contact_title_typography['font-size']['tablet']);
		if ( $contact_title_tablet_font_size ){
			$contact_info_title_tablet_css .=  'font-size:'.$contact_title_tablet_font_size.'px;';
		}
		$contact_title_tablet_line_height     = cosmoswp_ifset($contact_title_typography['line-height']['tablet']);
		if ( $contact_title_tablet_line_height ){
			$contact_info_title_tablet_css .=  'line-height:'.$contact_title_tablet_line_height.'px;';
		}
		$contact_title_tablet_letter_spacing  = cosmoswp_ifset($contact_title_typography['letter-spacing']['tablet']);
		if ( $contact_title_tablet_letter_spacing ){
			$contact_info_title_tablet_css .=  'letter-spacing:'.$contact_title_tablet_letter_spacing.'px;';
		}

		/* $contact_title desktop css */
		$contact_title_desktop_font_size       = cosmoswp_ifset($contact_title_typography['font-size']['desktop']);
		if ( $contact_title_desktop_font_size ){
			$contact_info_title_desktop_css .=  'font-size:'.$contact_title_desktop_font_size.'px;';
		}
		$contact_title_desktop_line_height     = cosmoswp_ifset($contact_title_typography['line-height']['desktop']);
		if ( $contact_title_desktop_line_height ){
			$contact_info_title_desktop_css .=  'line-height:'.$contact_title_desktop_line_height.'px;';
		}
		$contact_title_desktop_letter_spacing  = cosmoswp_ifset($contact_title_typography['letter-spacing']['desktop']);
		if ( $contact_title_desktop_letter_spacing ){
			$contact_info_title_desktop_css .=  'letter-spacing:'.$contact_title_desktop_letter_spacing.'px;';
		}
	}
}

/**
 * Contact Title css 
 */
/* mobile css */
if ( !empty( $contact_info_title_css )){
	$contact_info_title_dynamic_css = '.cwp-contact-info-title{
		'.$contact_info_title_css.'
	}';
	$local_dynamic_css['all'] .= $contact_info_title_dynamic_css;
}

/* tablet css */
if ( !empty($contact_info_title_tablet_css) ){
	$contact_title_tablet_dynamic_css = '.cwp-contact-info-title{
		'.$contact_info_title_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $contact_title_tablet_dynamic_css;
}

/* desktop css */
if ( !empty($contact_info_title_desktop_css) ){
	$contact_title_desktop_dynamic_css = '.cwp-contact-info-title{
		'.$contact_info_title_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $contact_title_desktop_dynamic_css;
}

/*contact text*/
$contact_info_subtitle_color = cosmoswp_get_theme_options('contact-info-subtitle-color');
if (!empty( $contact_info_subtitle_color )){
	$contact_info_text_css = 'color:'.$contact_info_subtitle_color.';';
}
//typography
$contact_subtitle_typography_options = cosmoswp_get_theme_options('contact-info-subtitle-typography-options');
if ('custom' == $contact_subtitle_typography_options){
	$contact_subtitle_typography         = cosmoswp_get_theme_options('contact-info-subtitle-typography');
	$contact_subtitle_typography         = json_decode($contact_subtitle_typography,true);

	$contact_subtitle_font_family     =  cosmoswp_font_family($contact_subtitle_typography);
	if ( $contact_subtitle_font_family ){
		$contact_info_text_css .=  'font-family:'.$contact_subtitle_font_family.';';
		$contact_subtitle_font_weight     = cosmoswp_font_weight( $contact_subtitle_typography );
		if ( $contact_subtitle_font_weight ){
			$contact_info_text_css .=  'font-weight:'.$contact_subtitle_font_weight.';';
		}
		$contact_subtitle_font_style      = cosmoswp_ifset($contact_subtitle_typography['font-style']);
		if ( $contact_subtitle_font_style ){
			$contact_info_text_css .=  'font-style:'.$contact_subtitle_font_style.';';
		}
		$contact_subtitle_text_decoration = cosmoswp_ifset($contact_subtitle_typography['text-decoration']);
		if ( $contact_subtitle_text_decoration ){
			$contact_info_text_css .=  'text-decoration:'.$contact_subtitle_text_decoration.';';
		}
		$contact_subtitle_text_transform  = cosmoswp_ifset($contact_subtitle_typography['text-transform']);
		if ( $contact_subtitle_text_transform ){
			$contact_info_text_css .=  'text-transform:'.$contact_subtitle_text_transform.';';
		}
		$contact_subtitle_font_size       = cosmoswp_ifset($contact_subtitle_typography['font-size']['mobile']);
		if ( $contact_subtitle_font_size ){
			$contact_info_text_css .=  'font-size:'.$contact_subtitle_font_size.'px;';
		}
		$contact_subtitle_line_height     = cosmoswp_ifset($contact_subtitle_typography['line-height']['mobile']);
		if ( $contact_subtitle_line_height ){
			$contact_info_text_css .=  'line-height:'.$contact_subtitle_line_height.'px;';
		}
		$contact_subtitle_letter_spacing  = cosmoswp_ifset($contact_subtitle_typography['letter-spacing']['mobile']);
		if ( $contact_subtitle_letter_spacing ){
			$contact_info_text_css .=  'letter-spacing:'.$contact_subtitle_letter_spacing.'px;';
		}

		/* $contact_title tablet css */
		$contact_subtitle_tablet_font_size       = cosmoswp_ifset($contact_subtitle_typography['font-size']['tablet']);
		if ( $contact_subtitle_tablet_font_size ){
			$contact_info_text_tablet_css .=  'font-size:'.$contact_subtitle_tablet_font_size.'px;';
		}
		$contact_subtitle_tablet_line_height     = cosmoswp_ifset($contact_subtitle_typography['line-height']['tablet']);
		if ( $contact_subtitle_tablet_line_height ){
			$contact_info_text_tablet_css .=  'line-height:'.$contact_subtitle_tablet_line_height.'px;';
		}
		$contact_subtitle_tablet_letter_spacing  = cosmoswp_ifset($contact_subtitle_typography['letter-spacing']['tablet']);
		if ( $contact_subtitle_tablet_letter_spacing ){
			$contact_info_text_tablet_css .=  'letter-spacing:'.$contact_subtitle_tablet_letter_spacing.'px;';
		}

		/* $contact_subtitle desktop css */
		$contact_subtitle_desktop_font_size       = cosmoswp_ifset($contact_subtitle_typography['font-size']['desktop']);
		if ( $contact_subtitle_desktop_font_size ){
			$contact_info_text_desktop_css .=  'font-size:'.$contact_subtitle_desktop_font_size.'px;';
		}
		$contact_subtitle_desktop_line_height     = cosmoswp_ifset($contact_subtitle_typography['line-height']['desktop']);
		if ( $contact_subtitle_desktop_line_height ){
			$contact_info_text_desktop_css .=  'line-height:'.$contact_subtitle_desktop_line_height.'px;';
		}
		$contact_subtitle_desktop_letter_spacing  = cosmoswp_ifset($contact_subtitle_typography['letter-spacing']['desktop']);
		if ( $contact_subtitle_desktop_letter_spacing ){
			$contact_info_text_desktop_css .=  'letter-spacing:'.$contact_subtitle_desktop_letter_spacing.'px;';
		}
	}
}

/**
 * Contacting Info text to dynamic Css 
 */
/* mobile css */
if ( !empty( $contact_info_text_css )){
	$contact_info_text_dynamic_css = '.cwp-contact-info-text,
	.cwp-contact-info-text a{
		'.$contact_info_text_css.'
	}';
	$local_dynamic_css['all'] .= $contact_info_text_dynamic_css;
}

/* tablet css */
if ( !empty( $contact_info_text_tablet_css )){
	$contact_info_text_tablet_dynamic_css = '.cwp-contact-info-text,
	.cwp-contact-info-text a{
		'.$contact_info_text_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $contact_info_text_tablet_dynamic_css;
}

/* desktop css */
if ( !empty( $contact_info_text_desktop_css )){
	$contact_info_text_desktop_dynamic_css = '.cwp-contact-info-text,
	.cwp-contact-info-text a{
		'.$contact_info_text_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $contact_info_text_desktop_dynamic_css;
}?><?php 
/*html*/
$html_css         = '';
$html_tablet_css  = '';
$html_desktop_css = '';

/* margin */
$html_margin = cosmoswp_get_theme_options('html-margin');
$html_margin = json_decode($html_margin,true);
// desktop margin 
$html_margin_desktop = cosmoswp_cssbox_values_inline($html_margin,'desktop');
if (strpos($html_margin_desktop, 'px') !== false){
	$html_desktop_css		.= 'margin:'.$html_margin_desktop.';';
}
// tablet marign 
$html_margin_tablet  = cosmoswp_cssbox_values_inline($html_margin,'tablet');
if (strpos($html_margin_tablet, 'px') !== false){
	$html_tablet_css		.= 'margin:'.$html_margin_tablet.';';
}
// mobile margin 
$html_margin_mobile  = cosmoswp_cssbox_values_inline($html_margin,'mobile');
if (strpos($html_margin_mobile, 'px') !== false){
	$html_css		.= 'margin:'.$html_margin_mobile.';';
}


/* padding */
$html_padding = cosmoswp_get_theme_options('html-padding');
$html_padding = json_decode($html_padding,true);
// desktop padding
$html_padding_desktop = cosmoswp_cssbox_values_inline($html_padding,'desktop');
if (strpos($html_padding_desktop, 'px') !== false){
	$html_desktop_css		.= 'padding:'.$html_padding_desktop.';';
}
//tablet padding
$html_padding_tablet  = cosmoswp_cssbox_values_inline($html_padding,'tablet');
if (strpos($html_padding_tablet, 'px') !== false){
	$html_tablet_css		.= 'padding:'.$html_padding_tablet.';';
}
//mobile padding
$html_padding_mobile  = cosmoswp_cssbox_values_inline($html_padding,'mobile');
if (strpos($html_padding_mobile, 'px') !== false){
	$html_css		.= 'padding:'.$html_padding_mobile.';';
}

/* mobile css */
if ( !empty( $html_css )){
	$html_dynamic_css = '.cwp-custom-html{
		'.$html_css.'
	}';
	$local_dynamic_css['all'] .= $html_dynamic_css;
}
/* tablet css */
if ( !empty($html_tablet_css) ){
	$html_tablet_dynamic_css = '.cwp-custom-html {
		'.$html_tablet_css.'
	}';
	$local_dynamic_css['tablet'] .= $html_tablet_dynamic_css;
}
/* desktop css */
if ( !empty($html_desktop_css) ){
	$html_desktop_dynamic_css = '.cwp-custom-html{
		'.$html_desktop_css.'
	}';
	$local_dynamic_css['desktop'] .= $html_desktop_dynamic_css;
}


//typography
$html_typography_css         = '';
$html_typography_options = cosmoswp_get_theme_options('html-typography-options');
if ('custom' == $html_typography_options){
	$html_typography         = cosmoswp_get_theme_options('html-typography');
	$html_typography         = json_decode($html_typography,true);

	$html_font_style      = cosmoswp_ifset($html_typography['font-style']);
	if ( $html_font_style ){
		$html_typography_css .=  'font-style:'.$html_font_style.';';
	}
	$html_text_decoration = cosmoswp_ifset($html_typography['text-decoration']);
	if ( $html_text_decoration ){
		$html_typography_css .=  'text-decoration:'.$html_text_decoration.';';
	}
	$html_text_transform  = cosmoswp_ifset($html_typography['text-transform']);
	if ( $html_text_transform ){
		$html_typography_css .=  'text-transform:'.$html_text_transform.';';
	}
}
$header_html_text_color = cosmoswp_get_theme_options('header-html-text-color');
if ($header_html_text_color){
	$html_typography_css .= 'color:'.$header_html_text_color.';';
}
/* mobile css */
if ( !empty( $html_typography_css )){
	$html_typography_dynmaic_css = '.cwp-custom-html, .cwp-custom-html * {
		'.$html_typography_css.'
	}';
	$local_dynamic_css['all'] .= $html_typography_dynmaic_css;
}