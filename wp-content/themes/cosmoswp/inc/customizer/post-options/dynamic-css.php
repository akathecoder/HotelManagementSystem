<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/*
 *Dynamic Css For post Options
 *
 */
$post_dynamic_css['all']     = '';
$post_dynamic_css['tablet']  = '';
$post_dynamic_css['desktop'] = '';

// post pagination color
$post_pagination_css = '';
$post_pagination_hover_css = '';
$post_pagination_color            = cosmoswp_get_theme_options('post-pagination-color-options');
$post_pagination_color            = json_decode($post_pagination_color,true);

$pagination_text_color      = cosmoswp_ifset($post_pagination_color['text-color']);
if ($pagination_text_color){
    $post_pagination_css .= 'color:'.$pagination_text_color.';';
}
//concated post navigation css in all css
if ( !empty($post_pagination_css) ){
    $post_pagination_dynamic_css = '
    .single-post .post-navigation .nav-links .post-title{
		'.$post_pagination_css.'
	}';
    $post_dynamic_css['all'] .= $post_pagination_dynamic_css;
}

$pagination_text_hover_color      = cosmoswp_ifset($post_pagination_color['text-hover-color']);
if ($pagination_text_hover_color){
    $post_pagination_hover_css .= 'color:'.$pagination_text_hover_color.';';
}
//concated post navigation css in all css
if ( !empty($post_pagination_hover_css) ){
    $post_pagination_dynamic_hover_css = '
    .single-post .post-navigation .nav-links .post-title:hover {
		'.$post_pagination_hover_css.'
	}';
    $post_dynamic_css['all'] .= $post_pagination_dynamic_hover_css;
}

$pagination_controls_color      = cosmoswp_ifset($post_pagination_color['next-prev-color']);
if ($pagination_controls_color){
    $post_dynamic_css['all'] .='
    .single-post .post-navigation .nav-links .title {
        color:'.$pagination_controls_color.';
    }';
}
$pagination_controls_hover_color      = cosmoswp_ifset($post_pagination_color['next-prev-hover-color']);
if ($pagination_controls_hover_color){
    $post_dynamic_css['all'] .='
    .single-post .post-navigation .nav-links .title:hover {
        color:'.$pagination_controls_hover_color.';
    }';
}



/*post Css*/
$post_main_content_css         = '';
$post_main_content_tablet_css  = '';
$post_main_content_desktop_css = '';

/* margin */
$main_content_margin = cosmoswp_get_theme_options('post-main-content-margin');
$main_content_margin = json_decode($main_content_margin, true);
// desktop margin
$main_content_margin_desktop = cosmoswp_cssbox_values_inline($main_content_margin, 'desktop');
if (strpos($main_content_margin_desktop, 'px') !== false) {
    $post_main_content_desktop_css .= 'margin:' . $main_content_margin_desktop . ';';
}
// tablet marign
$main_content_margin_tablet = cosmoswp_cssbox_values_inline($main_content_margin, 'tablet');
if (strpos($main_content_margin_tablet, 'px') !== false) {
    $post_main_content_tablet_css .= 'margin:' . $main_content_margin_tablet . ';';
}
// mobile margin
$main_content_margin_mobile = cosmoswp_cssbox_values_inline($main_content_margin, 'mobile');
if (strpos($main_content_margin_mobile, 'px') !== false) {
    $post_main_content_css .= 'margin:' . $main_content_margin_mobile . ';';
}

/* padding */
$main_content_padding = cosmoswp_get_theme_options('post-main-content-padding');
$main_content_padding = json_decode($main_content_padding, true);

// desktop padding
$main_content_padding_desktop = cosmoswp_cssbox_values_inline($main_content_padding, 'desktop');
if (strpos($main_content_padding_desktop, 'px') !== false) {
    $post_main_content_desktop_css .= 'padding:' . $main_content_padding_desktop . ';';
}
//tablet padding
$main_content_padding_tablet = cosmoswp_cssbox_values_inline($main_content_padding, 'tablet');
if (strpos($main_content_padding_tablet, 'px') !== false) {
    $post_main_content_tablet_css .= 'padding:' . $main_content_padding_tablet . ';';
}

//mobile padding
$main_content_padding_mobile = cosmoswp_cssbox_values_inline($main_content_padding, 'mobile');
if (strpos($main_content_padding_mobile, 'px') !== false) {
    $post_main_content_css .= 'padding:' . $main_content_padding_mobile . ';';
}

/* mobile css */
if (!empty($post_main_content_css)) {
    $main_content_mobile_dynamic_css = '.cwp-single-post.cwp-content-wrapper{' . $post_main_content_css . '}';
    $post_dynamic_css['all']  .= $main_content_mobile_dynamic_css;
}

/* tablet css */
if (!empty($post_main_content_tablet_css)) {
    $main_content_tablet_dynamic_css = '.cwp-single-post.cwp-content-wrapper{' . $post_main_content_tablet_css . '}';
    $post_dynamic_css['tablet']      .= $main_content_tablet_dynamic_css;
}

/* desktop css  */
if (!empty($post_main_content_desktop_css)) {
    $main_content_desktop_dynamic_css = '.cwp-single-post.cwp-content-wrapper{' . $post_main_content_desktop_css . '}';
    $post_dynamic_css['desktop'] .= $main_content_desktop_dynamic_css;
}