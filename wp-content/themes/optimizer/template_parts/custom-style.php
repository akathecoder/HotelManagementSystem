<?php 
/**
 * The Custom Style for Optimizer
 *
 * Loads the dynamically generated Css in the header of the template.
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
?>
<?php function optimizer_dynamic_css() { ?>
<?php global $optimizer; ?>
<style type="text/css">

/*Fixed Background*/
<?php if(!empty($optimizer['background_fixed'])){ echo 'html body.custom-background{ background-attachment:fixed;}';} ?>

	/*BOXED LAYOUT*/
	.site_boxed .layer_wrapper, body.home.site_boxed #slidera {width: <?php echo esc_html($optimizer['center_width']); ?>%;float: left;margin: 0 <?php $centerwidth = $optimizer['center_width']; echo (100- $centerwidth)/2; ?>%;
	background: <?php echo esc_html($optimizer['content_bg_color']); ?>;}
	.site_boxed .stat_bg, .site_boxed .stat_bg_overlay{width: <?php echo esc_html($optimizer['center_width']); ?>%;}
	.site_boxed .social_buttons{background: <?php echo esc_html($optimizer['content_bg_color']); ?>;}
	.site_boxed .center {width: 95%;margin: 0 auto;}
	.site_boxed .head_top .center{ width:95%!important;}



/*Site Content Text Style*/
<?php $content_font = $optimizer['content_font_id']; ?>
body, input, textarea{ 
	<?php if(!empty($content_font['font-family'])){ ?>font-family:<?php echo esc_html($content_font['font-family']); ?>; <?php } ?>
	<?php if(!empty($content_font['font-size'])){ ?>font-size:<?php echo esc_html($content_font['font-size']); ?>; <?php } ?>
}

.single_metainfo, .single_post .single_metainfo a, a:link, a:visited, .single_post_content .tabs li a{ color:<?php echo esc_html($optimizer['primtxt_color_id']); ?>;}

<?php if ( is_single() || is_page() || is_category() || is_tag() || is_author() || (get_post_type() == 'product' && is_archive()) ) { ?>
.page_head, .author_div{ background:<?php echo esc_html($optimizer['page_header_color']); ?>; color:<?php echo esc_html($optimizer['page_header_txtcolor']); ?>;}
.page_head .postitle{color:<?php echo esc_html($optimizer['page_header_txtcolor']); ?>;}	
.page_head .layerbread a{color:<?php echo esc_html($optimizer['page_header_txtcolor']); ?>;}	
<?php } ?>

/*LINK COLOR*/
.org_comment a, .thn_post_wrap a:link, .thn_post_wrap a:visited, .lts_lightbox_content a:link, .lts_lightbox_content a:visited, .athor_desc a:link, .athor_desc a:visited{color:<?php echo esc_html($optimizer['link_color_id']); ?>;}
.org_comment a:hover, .thn_post_wrap a:link:hover, .lts_lightbox_content a:link:hover, .lts_lightbox_content a:visited:hover, .athor_desc a:link:hover, .athor_desc a:visited:hover{color:<?php echo esc_html($optimizer['link_color_hover']); ?>;}

/*-----------------------------Static Slider Content box width------------------------------------*/
<?php if($optimizer['slider_type_id'] =='noslider'){ ?>#slidera{min-height:initial;}<?php } ?>
.stat_content_inner .center{width:<?php echo esc_html($optimizer['static_textbox_width']); ?>%;}
.stat_content_inner{bottom:<?php echo esc_html($optimizer['static_textbox_bottom']); ?>%; color:<?php echo esc_html($optimizer['slider_txt_color']); ?>;}


/*STATIC SLIDE CTA BUTTONS COLORS*/
.static_cta1.cta_hollow, .static_cta1.cta_hollow_big{ background:transparent!important; color:<?php echo esc_html($optimizer['static_cta1_txt_color']); ?>;}
.static_cta1.cta_flat, .static_cta1.cta_flat_big, .static_cta1.cta_rounded, .static_cta1.cta_rounded_big, .static_cta1.cta_hollow:hover, .static_cta1.cta_hollow_big:hover{ background:<?php echo esc_html($optimizer['static_cta1_bg_color']); ?>!important; color:<?php echo esc_html($optimizer['static_cta1_txt_color']); ?>; border-color:<?php echo esc_html($optimizer['static_cta1_bg_color']); ?>!important;}

.static_cta2.cta_hollow, .static_cta2.cta_hollow_big{ background:transparent; color:<?php echo esc_html($optimizer['static_cta2_txt_color']); ?>;}
.static_cta2.cta_flat, .static_cta2.cta_flat_big, .static_cta2.cta_rounded, .static_cta2.cta_rounded_big, .static_cta2.cta_hollow:hover, .static_cta2.cta_hollow_big:hover{ background:<?php echo esc_html($optimizer['static_cta2_bg_color']); ?>!important; color:<?php echo esc_html($optimizer['static_cta2_txt_color']); ?>;border-color:<?php echo esc_html($optimizer['static_cta2_bg_color']); ?>!important;}


/*-----------------------------COLORS------------------------------------*/
		/*Header Color*/
		.header{ position:relative!important; background:<?php echo esc_html($optimizer['head_color_id']); ?>;}
		<?php if('noslider' == $optimizer['slider_type_id']){ ?>
		/*Header Color*/
		body .header{ position:relative!important; background:<?php echo esc_html($optimizer['head_color_id']); ?>;}
		.page #slidera, .single #slidera, .archive #slidera, .search #slidera, .error404 #slidera{ height:auto!important;}
		<?php } ?>
		
		<?php if ($optimizer['head_color_id'] == '#ffffff' || $optimizer['head_color_id'] =='#FFFFFF'){ ?>
			<?php $background_color = get_background_color(); if($background_color == 'FFFFFF' || $background_color == 'ffffff' || $background_color == 'f7f7f7'){?>
				/*If Header and Background both set to White Display a Border under the Header*/
				body.single .header{box-shadow: 0 0 3px rgba(0, 0, 0, 0.25);}
			<?php } ?>
		<?php } ?>
		
		<?php if(!empty($optimizer['head_transparent'])){ ?>
		.home.has_trans_header .header_wrap {float: left; position:relative;width: 100%;}
		.home.has_trans_header .header{position: absolute!important;z-index: 999;}


		/*Boxed Header should have boxed width*/
		body.home.site_boxed .header_wrap.layer_wrapper{width: <?php echo esc_html($optimizer['center_width']); ?>%;float: left;margin: 0 <?php $centerwidth = $optimizer['center_width']; echo (100- $centerwidth)/2; ?>%;}
		
		.home.has_trans_header .header, .home.has_trans_header.page.page-template-page-frontpage_template .header{ background:transparent!important; background-image:none;}
		<?php } ?>
		.home.has_trans_header.page .header{background:<?php echo esc_html($optimizer['head_color_id']); ?>!important;}
		@media screen and (max-width: 480px){
		.home.has_trans_header .header{ background:<?php echo esc_html($optimizer['head_color_id']); ?>!important;}
		}
		


		/*LOGO*/
		<?php $logofont = $optimizer['logo_font_id']; ?>
		.logo h2, .logo h1, .logo h2 a, .logo h1 a{ 
			<?php if(!empty($logofont['font-family'])){ ?>font-family:'<?php echo esc_html($logofont['font-family']); ?>'; <?php } ?>
			<?php if(!empty($logofont['font-size'])){ ?>font-size:<?php echo esc_html($logofont['font-size']); ?>;<?php } ?>
			color:<?php echo esc_html($optimizer['logo_color_id']); ?>;
		}
		body.has_trans_header.home .header .logo h2, body.has_trans_header.home .header .logo h1, body.has_trans_header.home .header .logo h2 a, body.has_trans_header.home .header .logo h1 a, body.has_trans_header.home span.desc{ color:<?php echo esc_html($optimizer['trans_header_color']); ?>;}
		#simple-menu{color:<?php echo esc_html($optimizer['menutxt_color_id']); ?>;}
		body.home.has_trans_header #simple-menu{color:<?php echo esc_html($optimizer['trans_header_color']); ?>;}
		span.desc{color:<?php echo esc_html($optimizer['logo_color_id']); ?>;}

		/*MENU Text Color*/
		#topmenu ul li a{color:<?php echo esc_html($optimizer['menutxt_color_id']); ?>;}
		body.has_trans_header.home #topmenu ul li a, body.has_trans_header.home .head_soc .social_bookmarks.bookmark_simple a{ color:<?php echo esc_html($optimizer['trans_header_color']); ?>;}
		#topmenu ul li.menu_hover a{border-color:<?php echo esc_html($optimizer['menutxt_color_hover']); ?>;}
		#topmenu ul li.menu_hover>a, body.has_trans_header.home #topmenu ul li.menu_hover>a{color:<?php echo esc_html($optimizer['menutxt_color_hover']); ?>;}
		#topmenu ul li.current-menu-item>a{color:<?php echo esc_html($optimizer['menutxt_color_active']); ?>;}
		#topmenu ul li ul{border-color:<?php echo esc_html($optimizer['menutxt_color_hover']); ?> transparent transparent transparent;}
		#topmenu ul.menu>li:hover:after{background-color:<?php echo esc_html($optimizer['menutxt_color_hover']); ?>;}
		
		#topmenu ul li ul li a:hover{ background:<?php echo esc_html($optimizer['sec_color_id']); ?>; color:<?php echo esc_html($optimizer['sectxt_color_id']); ?>;}
		.head_soc .social_bookmarks a{color:<?php echo esc_html($optimizer['menutxt_color_id']); ?>;}
		.head_soc .social_bookmarks.bookmark_hexagon a:before {border-bottom-color: rgba(<?php echo esc_html(optimizer_hex2rgb($optimizer['menutxt_color_id']));?>, 0.3)!important;}
		.head_soc .social_bookmarks.bookmark_hexagon a i {background:rgba(<?php echo esc_html(optimizer_hex2rgb($optimizer['menutxt_color_id']));?>, 0.3)!important;}
		.head_soc .social_bookmarks.bookmark_hexagon a:after { border-top-color:rgba(<?php echo esc_html(optimizer_hex2rgb($optimizer['menutxt_color_id']));?>, 0.3)!important;}
		

<?php if($optimizer['sec_color_id']){ ?>
		/*BASE Color*/
		.widget_border, .heading_border, #wp-calendar #today, .thn_post_wrap .more-link:hover, .moretag:hover, .search_term #searchsubmit, .error_msg #searchsubmit, #searchsubmit, .optimizer_pagenav a:hover, .nav-box a:hover .left_arro, .nav-box a:hover .right_arro, .pace .pace-progress, .homeposts_title .menu_border, .pad_menutitle, span.widget_border, .ast_login_widget #loginform #wp-submit, .prog_wrap, .lts_layout1 a.image, .lts_layout2 a.image, .lts_layout3 a.image, .rel_tab:hover .related_img, .wpcf7-submit, .woo-slider #post_slider li.sale .woo_sale, .nivoinner .slide_button_wrap .lts_button, #accordion .slide_button_wrap .lts_button, .img_hover, p.form-submit #submit, .optimposts .type-product a.button.add_to_cart_button{background:<?php echo esc_html($optimizer['sec_color_id']); ?>;} 
		
		.share_active, .comm_auth a, .logged-in-as a, .citeping a, .lay3 h2 a:hover, .lay4 h2 a:hover, .lay5 .postitle a:hover, .nivo-caption p a, .acord_text p a, .org_comment a, .org_ping a, .contact_submit input:hover, .widget_calendar td a, .ast_biotxt a, .ast_bio .ast_biotxt h3, .lts_layout2 .listing-item h2 a:hover, .lts_layout3 .listing-item h2 a:hover, .lts_layout4 .listing-item h2 a:hover, .lts_layout5 .listing-item h2 a:hover, .rel_tab:hover .rel_hover, .post-password-form input[type~=submit], .bio_head h3, .blog_mo a:hover, .ast_navigation a:hover, .lts_layout4 .blog_mo a:hover{color:<?php echo esc_html($optimizer['sec_color_id']); ?>;}
		#home_widgets .widget .thn_wgt_tt, #sidebar .widget .thn_wgt_tt, #footer .widget .thn_wgt_tt, .astwt_iframe a, .ast_bio .ast_biotxt h3, .ast_bio .ast_biotxt a, .nav-box a span, .lay2 h2.postitle:hover a{color:<?php echo esc_html($optimizer['sec_color_id']); ?>;}
		.pace .pace-activity{border-top-color: <?php echo esc_html($optimizer['sec_color_id']); ?>!important;border-left-color: <?php echo esc_html($optimizer['sec_color_id']); ?>!important;}
		.pace .pace-progress-inner{box-shadow: 0 0 10px <?php echo esc_html($optimizer['sec_color_id']); ?>, 0 0 5px <?php echo esc_html($optimizer['sec_color_id']); ?>;
		  -webkit-box-shadow: 0 0 10px <?php echo esc_html($optimizer['sec_color_id']); ?>, 0 0 5px <?php echo esc_html($optimizer['sec_color_id']); ?>;
		  -moz-box-shadow: 0 0 10px <?php echo esc_html($optimizer['sec_color_id']); ?>, 0 0 5px <?php echo esc_html($optimizer['sec_color_id']); ?>;}
		
		.fotorama__thumb-border, .ast_navigation a:hover{ border-color:<?php echo esc_html($optimizer['sec_color_id']); ?>!important;}
		
		
		/*Text Color on BASE COLOR Element*/
		.icon_round a, #wp-calendar #today, .moretag:hover, .search_term #searchsubmit, .error_msg #searchsubmit, .optimizer_pagenav a:hover, .ast_login_widget #loginform #wp-submit, #searchsubmit, .prog_wrap, .rel_tab .related_img i, .lay1 h2.postitle a, .nivoinner .slide_button_wrap .lts_button, #accordion .slide_button_wrap .lts_button, .lts_layout1 .icon_wrap a, .lts_layout2 .icon_wrap a, .lts_layout3 .icon_wrap a, .lts_layout1 .icon_wrap a:hover{color:<?php echo esc_html($optimizer['sectxt_color_id']); ?>;}
		.thn_post_wrap .listing-item .moretag:hover, body .lts_layout1 .listing-item .title, .lts_layout2 .img_wrap .optimizer_plus, .img_hover .icon_wrap a, body .thn_post_wrap .lts_layout1 .icon_wrap a, .wpcf7-submit, .woo-slider #post_slider li.sale .woo_sale, p.form-submit #submit, .optimposts .type-product a.button.add_to_cart_button{color:<?php echo esc_html($optimizer['sectxt_color_id']); ?>;}

<?php } ?>



/*Sidebar Widget Background Color */
#sidebar .widget{ background:<?php echo esc_html($optimizer['sidebar_color_id']); ?>;}
/*Widget Title Color */
#sidebar .widget .widgettitle, #sidebar .widget .widgettitle a{color:<?php echo esc_html($optimizer['sidebar_tt_color_id']); ?>;}
#sidebar .widget li a, #sidebar .widget, #sidebar .widget .widget_wrap{ color:<?php echo esc_html($optimizer['sidebartxt_color_id']); ?>;}
#sidebar .widget .widgettitle, #sidebar .widget .widgettitle a{font-size:<?php echo esc_html($optimizer['wgttitle_size_id']); ?>;}



<?php if($optimizer['footer_title_color']){ ?>
#footer .widgets .widgettitle, #copyright a{color:<?php echo esc_html($optimizer['footer_title_color']); ?>;}
<?php } ?>

<?php if($optimizer['footer_color_id']){ ?>
/*FOOTER WIDGET COLORS*/
#footer{background: <?php echo esc_html($optimizer['footer_color_id']); ?>;}
#footer .widgets .widget a, #footer .widgets{color:<?php echo esc_html($optimizer['footwdgtxt_color_id']); ?>;}
<?php } ?>
/*COPYRIGHT COLORS*/
#copyright{background: <?php echo esc_html($optimizer['copyright_bg_color']); ?>;}
#copyright a, #copyright{color: <?php echo esc_html($optimizer['copyright_txt_color']); ?>;}
.foot_soc .social_bookmarks a{color:<?php echo esc_html($optimizer['copyright_txt_color']); ?>;}
.foot_soc .social_bookmarks.bookmark_hexagon a:before {border-bottom-color: rgba(<?php echo esc_html(optimizer_hex2rgb($optimizer['copyright_txt_color']));?>, 0.3);}
.foot_soc .social_bookmarks.bookmark_hexagon a i {background:rgba(<?php echo esc_html(optimizer_hex2rgb($optimizer['copyright_txt_color']));?>, 0.3);}
.foot_soc .social_bookmarks.bookmark_hexagon a:after { border-top-color:rgba(<?php echo esc_html(optimizer_hex2rgb($optimizer['copyright_txt_color']));?>, 0.3);}


<?php if(get_background_color() == ''){?>#frontsidebar, .fixed_wrap.fixindex.dummypost, #slidera{ background-color:#<?php echo get_background_color(); ?>;} <?php } ?>

/*-------------------------------------TYPOGRAPHY--------------------------------------*/

/*Post Titles, headings and Menu Font*/
h1, h2, h3, h4, h5, h6, #topmenu ul li a, .postitle, .product_title{ <?php if(!empty($optimizer['ptitle_font_id']['font-family'])){ ?>font-family:<?php echo $optimizer['ptitle_font_id']['font-family']; ?>; <?php } ?> }

<?php if((!empty($optimizer['txt_upcase_id']))){ ?>
#topmenu ul li a, .midrow_block h3, .lay1 h2.postitle, .more-link, .moretag, .single_post .postitle, .related_h3, .comments_template #comments, #comments_ping, #reply-title, #submit, #sidebar .widget .widgettitle, #sidebar .widget .widgettitle a, .search_term h2, .search_term #searchsubmit, .error_msg #searchsubmit, #footer .widgets .widgettitle, .home_title, body .lts_layout1 .listing-item .title, .lay4 h2.postitle, .lay2 h2.postitle a, #home_widgets .widget .widgettitle, .product_title, .page_head h1{ text-transform:uppercase; letter-spacing:1px;}
<?php } ?>

#topmenu ul li a{font-size:<?php echo esc_html($optimizer['menu_size_id']); ?>;}
#topmenu ul li {line-height: <?php echo esc_html($optimizer['menu_size_id']); ?>;}

<?php if($optimizer['primtxt_color_id']){ ?>
/*Body Text Color*/
body, .home_cat a, .contact_submit input, .comment-form-comment textarea{ color:<?php echo esc_html($optimizer['primtxt_color_id']); ?>;}
.single_post_content .tabs li a{ color:<?php echo esc_html($optimizer['primtxt_color_id']); ?>;}
.thn_post_wrap .listing-item .moretag{ color:<?php echo esc_html($optimizer['primtxt_color_id']); ?>;}
<?php } ?>	
	

<?php if($optimizer['title_txt_color_id']){ ?>
/*Post Title */
.postitle, .postitle a, .nav-box a, h3#comments, h3#comments_ping, .comment-reply-title, .related_h3, .nocomments, .lts_layout2 .listing-item h2 a, .lts_layout3 .listing-item h2 a, .lts_layout4 .listing-item h2 a, .author_inner h5, .product_title, .woocommerce-tabs h2, .related.products h2, .optimposts .type-product h2.postitle a, .woocommerce ul.products li.product h3{ text-decoration:none; color:<?php echo esc_html($optimizer['title_txt_color_id']); ?>;}
<?php } ?>

/*Woocommerce*/
.optimposts .type-product a.button.add_to_cart_button:hover{background-color:<?php echo esc_html($optimizer['sectxt_color_id']); ?>;color:<?php echo esc_html($optimizer['sec_color_id']); ?>;} 
.optimposts .lay2_wrap .type-product span.price, .optimposts .lay3_wrap .type-product span.price, .optimposts .lay4_wrap  .type-product span.price, .optimposts .lay4_wrap  .type-product a.button.add_to_cart_button{color:<?php echo esc_html($optimizer['title_txt_color_id']); ?>;}
.optimposts .lay2_wrap .type-product a.button.add_to_cart_button:before, .optimposts .lay3_wrap .type-product a.button.add_to_cart_button:before{color:<?php echo esc_html($optimizer['title_txt_color_id']); ?>;}
.optimposts .lay2_wrap .type-product a.button.add_to_cart_button:hover:before, .optimposts .lay3_wrap .type-product a.button.add_to_cart_button:hover:before, .optimposts .lay4_wrap  .type-product h2.postitle a{color:<?php echo esc_html($optimizer['sec_color_id']); ?>;}


<?php if(!$optimizer['show_blog_thumb'] ) { ?>
.page-template-template_partspage-blog_template-php .lay4 .post_content{width:100%;}
<?php } ?>

@media screen and (max-width: 480px){
body.home.has_trans_header .header .logo h1 a{ color:<?php echo esc_html($optimizer['logo_color_id']); ?>!important;}
body.home.has_trans_header .header #simple-menu{color:<?php echo esc_html($optimizer['menutxt_color_id']); ?>!important;}
}

/*USER'S CUSTOM CSS---------------------------------------------------------*/
<?php if ( ! empty ( $optimizer['custom-css'] ) ) { ?><?php echo stripslashes(wp_strip_all_tags($optimizer['custom-css'])); ?><?php } ?>
/*---------------------------------------------------------*/
</style>

<!--[if IE]>
<style type="text/css">
.text_block_wrap, .home .lay1, .home .lay2, .home .lay3, .home .lay4, .home .lay5, .home_testi .looper, #footer .widgets{opacity:1!important;}
#topmenu ul li a{display: block;padding: 20px; background:url(#);}
</style>
<![endif]-->
<?php } ?>
<?php add_action( 'wp_head', 'optimizer_dynamic_css'); ?>