( function( $ ) {

    'use strict';

    /*global variables*/
    let cwp_body = $( 'body' ),
        cosmoswp_google_fonts               = $('#cosmoswp-google-fonts-css'),
        cosmoswp_head_dynamic_css           = $('#cosmoswp-head-dynamic-css'),
        cosmoswp_header_wrap                = $('#cwp-header-wrap'),
        cosmoswp_main_wrap                  = $('#cwp-main-wrap'),
        menu_wrapper                        = $('.cwp-menu-wrapper'),
        cosmoswp_vertical_header_main_wrap  = $('#cwp-offcanvas-body-wrapper'),
        cosmoswp_footer_wrap                = $('#cwp-footer-wrap'),
        cosmoswp_sticky_footer_wrap         = $('#cwp-sticky-footer-wrapper'),
        cosmoswp_main                       = $('#cwp-main'),
        cosmoswp_blog_main_content          = $('#cwp-blog-main-content-wrapper'),
        cosmoswp_post_main_content          = $('#cosmoswp-post-main-content-wrapper'),
        cosmoswp_page_main_content          = $('#cosmoswp-page-main-content-wrapper'),
        cosmoswp_page_header_wrap           = $('#cwp-page-header-wrap');

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.logo-title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.logo-tagline' ).text( to );
		} );
	} );

    wp.customize( 'footer-sidebar-1-widget-setting-option', function( value ) {
        value.bind( function( to ) {
            if ( to === "custom" ) {
                $('#customize-control-footer-sidebar-1-margin').addClass('cwp-right-push');
            }
        } );
    } );

	/*Primary Menu Icon*/
    function primary_menu_submenu_icon(to){
        cwp_body.find('.cwp-primary-menu-wrapper').find('li').each(function () {
            let this_li = $(this);
            if (this_li.children('ul.sub-menu').length) {
                if( this_li.children('a').children('.submenu-icon').length ){
                    this_li.find('.submenu-icon').removeClass().addClass('submenu-icon '+to)
                }
                else{
                    this_li.children('a').prepend("<i class='submenu-icon "+to+"'></i>")
                }
            }
        });
    }
    wp.customize( 'primary-menu-submenu-icon-indicator', function( value ) {
        value.bind( function( to ) {
            primary_menu_submenu_icon(to);
        } );
    } );

    /*Menu Sidebar*/
    wp.customize( 'menu-icon-display-menu', function( value ) {
        value.bind( function( to ) {
            $('.cwp-header-menu-sidebar').removeClass('cwp-left-menu-slide cwp-right-menu-slide cwp-left-menu-push cwp-right-menu-push').addClass(to);
            if ( to === "cwp-left-menu-push" ) {
                menu_wrapper.removeClass('cwp-right-push').addClass('cwp-left-push');
            }
            else if ( to === "cwp-right-menu-push" ) {
                menu_wrapper.removeClass('cwp-left-push').addClass('cwp-right-push');
            }
            else{
                menu_wrapper.removeClass('cwp-left-push cwp-right-push');
            }
        } );
    } );

    /*Secondary Menu Icon*/
    function secondary_menu_submenu_icon(to){
        cwp_body.find('.cwp-secondary-menu-wrapper').find('li').each(function () {
            let this_li = $(this);
            if (this_li.children('ul.sub-menu').length) {
                if( this_li.children('a').children('.submenu-icon').length ){
                    this_li.find('.submenu-icon').removeClass().addClass('submenu-icon '+to)
                }
                else{
                    this_li.children('a').prepend("<i class='submenu-icon "+to+"'></i>")
                }
            }
        });
    }
    wp.customize( 'secondary-menu-submenu-icon-indicator', function( value ) {
        value.bind( function( to ) {
            secondary_menu_submenu_icon(to);
        } );
    } );

    /*General Control*/
    wp.customize( 'general-setting-layout', function( value ) {
        value.bind( function( to ) {
            cwp_body.removeClass( 'cwp-full-width-body cwp-boxed-width-body cwp-fluid-width-body' );
            cwp_body.addClass( to );
        } );
    } );

    /*General Content Layout*/
    wp.customize( 'general-content-layout', function( value ) {
        value.bind( function( to ) {
            cwp_body.removeClass( 'cwp-content-default cwp-separate-boxed cwp-content-boxed cwp-content-separate-boxed cwp-sidebar-boxed cwp-sidebar-separate-boxed' );
            cwp_body.addClass( to );
        } );
    } );
    /*General Setting Dynamic CSS Refresh*/
    let global_partial_refresh_dynamic_css = [
            'general-setting-color-options',
        ],
        generalRefreshTimes = 0;
    global_partial_refresh_dynamic_css.forEach(function(item) {
        wp.customize( item, function( value ) {
            value.bind( function( to ) {
                $.ajax({
                    type: 'POST',
                    url: cwp_general.ajaxurl,
                    data: {
                        'action':'cosmoswp_head_ajax_dynamic_css'
                    },
                    beforeSend: function( ) {
                        generalRefreshTimes++;
                        cwp_body.addClass('customize-partial-refreshing');
                    }
                }).done (function ( data ) {
                    cosmoswp_head_dynamic_css.html(data.data);
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }).always(function() {
                    generalRefreshTimes--;
                    if( 0 === generalRefreshTimes){
                        cwp_body.removeClass('customize-partial-refreshing');
                    }
                });
            } );
        } );
    });

    /*General Setting Dynamic Typography Refresh*/
    let global_partial_refresh_dynamic_typography = [
            'general-setting-body-p-typography',
            'general-setting-h1-typography',
            'general-setting-h2-typography',
            'general-setting-h3-typography',
            'general-setting-h4-typography',
            'general-setting-h5-typography',
            'general-setting-h6-typography',
        ],
        generalTypographyRefreshTimes = 0;
    global_partial_refresh_dynamic_typography.forEach(function(item) {
        wp.customize( item, function( value ) {
            value.bind( function( to ) {
                $.ajax({
                    type: 'POST',
                    url: cwp_general.ajaxurl,
                    data: {
                        'action':'general_partial_ajax_typography'
                    },
                    beforeSend: function( ) {
                        generalTypographyRefreshTimes++;
                        cwp_body.addClass('customize-partial-refreshing');
                    }
                }).done (function ( data ) {
                    cosmoswp_google_fonts.attr('href',data.data.google_font_url);
                    cosmoswp_head_dynamic_css.html(data.data.dynamic_css);
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }).always(function() {
                    generalTypographyRefreshTimes--;
                    if( 0 === generalTypographyRefreshTimes){
                        cwp_body.removeClass('customize-partial-refreshing');
                    }
                });
            } );
        } );
    });

    /*Header Dynamic CSS refresh*/
    let header_partial_refresh_dynamic_css = [

        /*Header general*/
        'vertical-header-width',
        'header-general-margin',
        'header-general-padding',
        'header-general-background-options',
        'header-general-border-styling',

        /*header top*/
        'header-top-height-option',
        'top-header-height',
        'top-header-margin',
        'top-header-padding',
        'header-top-bg-options',
        'header-top-background-options',
        'header-top-border-styling',

        /*Header main*/
        'header-main-height-option',
        'header-main-height',
        'header-main-margin',
        'header-main-padding',
        'header-main-bg-options',
        'header-main-background-options',
        'header-main-border-styling',

        /*Header Bottom*/
        'header-bottom-height-option',
        'header-bottom-height',
        'header-bottom-margin',
        'header-bottom-padding',
        'header-bottom-bg-options',
        'header-bottom-background-options',
        'header-bottom-border-styling',

        /*Site Identity*/
        'site-logo-max-width',
        'site-identity-margin',
        'site-identity-padding',
        'site-identity-styling',

        /*Primary Menu*/
        'primary-menu-margin',
        'primary-menu-padding',
        'primary-menu-padding',
        'primary-menu-item-margin',
        'primary-menu-item-padding',
        'primary-menu-styling',
        'primary-menu-submenu-bg-color',
        'primary-menu-submenu-styling',
        'primary-menu-sub-menu-item-margin',
        'primary-menu-sub-menu-item-padding',

        /*Secondary Menu*/
        'secondary-menu-margin',
        'secondary-menu-padding',
        'secondary-menu-item-margin',
        'secondary-menu-item-padding',
        'secondary-menu-styling',
        'secondary-menu-submenu-bg-color',
        'secondary-menu-submenu-styling',
        'secondary-menu-sub-menu-item-margin',
        'secondary-menu-sub-menu-item-padding',

        /*Header Social*/
        'header-social-icon-size',
        'header-social-icon-radius',
        'header-social-icon-width',
        'header-social-icon-height',
        'header-social-icon-line-height',
        'single-header-social-icon-margin',
        'single-header-social-icon-padding',
        'header-social-icon-margin',
        'header-social-icon-padding',

        /*Dropdown Search*/
        'drop-down-search-margin',
        'drop-down-search-padding',
        'dropdown-search-icon-size',
        'dropdown-search-icon-styling',
        'drop-down-search-input-height',
        'dropdown-search-form-styling',

        /*Normal Search*/
        'normal-search-margin',
        'normal-search-padding',
        'normal-search-icon-size',
        'normal-search-icon-styling',
        'normal-search-input-height',
        'normal-search-form-styling',

        /*Button One*/
        'button-one-margin',
        'button-one-padding',
        'button-one-styling',

        /*Button Two*/
        'button-two-margin',
        'button-two-padding',
        'button-two-styling',

        /*Contact Information*/
        'contact-info-margin',
        'contact-info-padding',
        'contact-info-icon-size',
        'contact-info-icon-color',
        'contact-info-title-color',
        'contact-info-subtitle-color',
        'contact-info-item-margin',
        'contact-info-item-padding',
        'contact-info-title-border-styling',

        /*HTML*/
        'header-html-text-color',
        'html-margin',
        'html-padding',

        /*Menu Icon*/
        'menu-open-icon-size-responsive',
        'menu-open-icon-padding',
        'menu-open-icon-margin',
        'menu-open-icon-styling',

        /*Menu Close Icon*/
        'menu-icon-close-icon-size-responsive',
        'menu-icon-close-padding',
        'menu-icon-close-margin',
        'menu-icon-close-icon-styling',

        /*Menu Icon Sidebar*/
        'menu-icon-sidebar-margin',
        'menu-icon-sidebar-padding',
        'menu-icon-sidebar-color-options',
        'menu-icon-sidebar-submenu-bg-color',

        /*Sticky Header*/
        'enable-sticky-header-color-options',
        'sticky-header-bg-color',
        'sticky-top-header-text-color',
        'sticky-top-header-link-color',
        'sticky-top-header-link-hover-color',
        'sticky-top-header-menu-color-options',
        'sticky-main-header-text-color',
        'sticky-main-header-link-color',
        'sticky-main-header-link-hover-color',
        'sticky-main-header-menu-color-options',
        'sticky-bottom-header-text-color',
        'sticky-bottom-header-link-color',
        'sticky-bottom-header-link-hover-color',
        'sticky-bottom-header-menu-color-options',

        /*dropdown menu*/
        'dropdown-menu-bg-color',
        'dropdown-menu-icon-size-responsive',
        'dropdown-menu-margin',
        'dropdown-menu-padding',
        'dropdown-icon-styling',
        'dropdown-menu-item-margin',
        'dropdown-menu-item-padding',
        'dropdown-menu-styling',

        /*dropdown menu Close*/
        'dropdown-menu-close-icon-size-responsive',
        'dropdown-close-icon-margin',
        'dropdown-close-icon-padding',
        'dropdown-close-icon-styling',

        /*full search*/
        'fullscreen-search-padding',
        'fullscreen-search-margin',
        'fullscreen-search-icon-size',
        'fullscreen-search-icon-styling',
        'fullscreen-search-input-height',
        'fullscreen-search-form-styling',

        /*header sidebar*/
        'header-sidebar-margin',
        'header-sidebar-padding',
        'header-sidebar-color-options',

        /*header sidebar - widget*/
        'header-sidebar-widget-title-color',
        'header-sidebar-widget-title-margin',
        'header-sidebar-widget-title-padding',
        'header-sidebar-widget-title-border-styling',
        'header-sidebar-widget-content-border-styling',
        'header-sidebar-widget-content-color-options',

        /*NewsTicker*/
        'news-ticker-margin',
        'news-ticker-padding',
        'news-ticker-background-options',

        /*overlay search*/
        'overlay-search-margin',
        'overlay-search-padding',
        'overlay-search-icon-size',
        'overlay-search-icon-styling',
        'overlay-search-input-height',
        'overlay-search-form-styling',

        /*off canvas*/
        'off-canvas-open-icon-size-responsive',
        'off-canvas-open-icon-padding',
        'off-canvas-open-icon-margin',
        'off-canvas-open-icon-styling',

        /*off canvas - sidebar*/
        'off-canvas-sidebar-margin',
        'off-canvas-sidebar-padding',
        'off-canvas-sidebar-color-options',
        'off-canvas-sidebar-submenu-bg-color',

        /*off canvas - widget*/
        'off-canvas-sidebar-widget-title-color',
        'off-canvas-sidebar-widget-title-margin',
        'off-canvas-sidebar-widget-title-padding',
        'off-canvas-sidebar-widget-title-border-styling',
        'off-canvas-sidebar-widget-content-border-styling',
        'off-canvas-sidebar-widget-content-color-options',

        /*popup sidebar open Icon*/
        'popup-sidebar-open-icon-size-responsive',
        'popup-sidebar-open-icon-margin',
        'popup-sidebar-open-icon-padding',
        'popup-open-icon-styling',
        'popup-sidebar-width',
        'popup-sidebar-margin',
        'popup-sidebar-padding',
        'popup-sidebar-color-options',

        /*popup sidebar - widget*/
        'popup-sidebar-widget-title-color',
        'popup-sidebar-widget-title-margin',
        'popup-sidebar-widget-title-padding',
        'popup-sidebar-widget-title-border-styling',
        'popup-sidebar-widget-content-border-styling',
        'popup-sidebar-widget-content-color-options',

        /*popup sidebar close Icon*/
        'popup-sidebar-close-icon-size-responsive',
        'popup-sidebar-close-icon-margin',
        'popup-sidebar-close-icon-padding',
        'popup-close-icon-styling',

        ],
        headerRefreshTimes = 0;
    header_partial_refresh_dynamic_css.forEach(function(item) {
        wp.customize( item, function( value ) {
            value.bind( function( to ) {

                $.ajax({
                    type: 'POST',
                    url: cwp_general.ajaxurl,
                    data: {
                        'action':'cosmoswp_head_ajax_dynamic_css'
                    },
                    beforeSend: function( ) {
                        headerRefreshTimes++;
                        cosmoswp_header_wrap.addClass('customize-partial-refreshing');
                    }
                }).done (function ( data ) {
                    cosmoswp_head_dynamic_css.html(data.data);
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }).always(function() {
                    headerRefreshTimes--;
                    if( 0 === headerRefreshTimes){
                        cosmoswp_header_wrap.removeClass('customize-partial-refreshing');
                    }
                });
            } );
        } );
    });

    /*Header Setting Dynamic Typography Refresh*/
    let header_partial_refresh_dynamic_typography = [

        /*Site Title*/
        'site-identity-typography-options',
        'site-title-typography',
        'site-tagline-typography',

        /*Primary Menu*/
        'primary-menu-typography-options',
        'primary-menu-typography',
        'primary-menu-submenu-typography-options',
        'primary-menu-submenu-typography',

        /*Secondary Menu*/
        'secondary-menu-typography-options',
        'secondary-menu-typography',
        'secondary-menu-submenu-typography-options',
        'secondary-menu-submenu-typography',

        /*Dropdown Search*/
        'dd-search-typography-options',
        'dd-search-typography',

        /*Normal Search*/
        'normal-search-typography-options',
        'normal-search-typography',

        /*Button One*/
        'button-one-typography-options',
        'button-one-typography',

        /*Button Two*/
        'button-two-typography-options',
        'button-two-typography',

        /*Contact Information*/
        'contact-info-title-typography-options',
        'contact-info-title-typography',
        'contact-info-subtitle-typography-options',
        'contact-info-subtitle-typography',

        /*HTML*/
        'html-typography-options',
        'html-typography',

        /*Header sidebar*/
        'header-sidebar-widget-title-typography-options',
        'header-sidebar-widget-title-typography',
        'header-sidebar-widget-content-typography-options',
        'header-sidebar-widget-content-typography',


        /*off-canvas sidebar*/
        'off-canvas-widget-title-typography-options',
        'off-canvas-widget-title-typography',
        'off-canvas-widget-content-typography-options',
        'off-canvas-widget-content-typography',

        /*popup sidebar*/
        'popup-sidebar-widget-title-typography-options',
        'popup-sidebar-widget-title-typography',
        'popup-sidebar-widget-content-typography-options',
        'popup-sidebar-widget-content-typography',

        /*Menu Icon*/
        'menu-open-icon-typography-options',
        'menu-open-icon-typography',

        /*Drop Down*/
        'dropdown-menu-typography-options',
        'dropdown-menu-open-text-typography-options',
        'dropdown-menu-open-text-typography',
        'dropdown-menu-typography',

        /*Drop Down Close Icon*/
        'dropdown-menu-close-text-typography-options',
        'dropdown-menu-close-text-typography',

        /*Fullscreen Screen*/
        'fullscreen-search-typography-options',
        'fullscreen-search-typography',

        /*newsticker*/
        'news-ticker-typography-options',
        'news-ticker-typography',

        /*overlay search*/
        'overlay-search-typography-options',
        'overlay-search-typography',

        /*off canvas sidebar*/
        'off-canvas-open-text-typography-options',
        'off-canvas-open-text-typography',

        /*popup sidebar*/
        'popup-open-text-typography-options',
        'popup-open-text-typography',

        ],
        headerTypographyRefreshTimes = 0;
    header_partial_refresh_dynamic_typography.forEach(function(item) {
        wp.customize( item, function( value ) {
            value.bind( function( to ) {

                $.ajax({
                    type: 'POST',
                    url: cwp_general.ajaxurl,
                    data: {
                        'action':'general_partial_ajax_typography'
                    },
                    beforeSend: function( ) {
                        headerTypographyRefreshTimes++;
                        cosmoswp_header_wrap.addClass('customize-partial-refreshing');
                    }
                }).done (function ( data ) {
                    cosmoswp_google_fonts.attr('href',data.data.google_font_url);
                    cosmoswp_head_dynamic_css.html(data.data.dynamic_css);
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }).always(function() {
                    headerTypographyRefreshTimes--;
                    if( 0 === headerTypographyRefreshTimes){
                        cosmoswp_header_wrap.removeClass('customize-partial-refreshing');
                    }
                });
            } );
        } );
    });

    /*Header general Options Refresh
    * Since it require change in class on many places
    * It is not scope of header only
    * */
    let header_partial_refresh_header_general = [
            'header-position-options',
            'header-general-width',
            'vertical-header-position',
        ],
        headerGeneralRefreshTimes = 0;
    header_partial_refresh_header_general.forEach(function(item) {
        wp.customize( item, function( value ) {
            value.bind( function( to ) {

                $.ajax({
                    type: 'POST',
                    url: cwp_general.ajaxurl,
                    data: {
                        'action':'general_header_multiple_class_refresh'
                    },
                    beforeSend: function( ) {
                        headerGeneralRefreshTimes++;
                        cosmoswp_header_wrap.addClass('customize-partial-refreshing');
                    }
                }).done (function ( data ) {
                    cwp_body.removeClass().addClass(data.data.body_class);
                    cosmoswp_main_wrap.removeClass().addClass(data.data.cosmoswp_main_wrap_classes);
                    cosmoswp_header_wrap.removeClass().addClass(data.data.cosmoswp_header_wrap_classes);
                    cosmoswp_vertical_header_main_wrap.removeClass().addClass(data.data.cosmoswp_vertical_header_main_wrap_classes);

                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }).always(function() {
                    headerGeneralRefreshTimes--;
                    if( 0 === headerGeneralRefreshTimes){
                        cosmoswp_header_wrap.removeClass('customize-partial-refreshing');
                    }
                });
            } );
        } );
    });

    /*FOOTER OPTIONS*/
    /*
    Footer General
    General Layout
    */
    wp.customize( 'footer-general-layout', function( value ) {
        value.bind( function( to ) {
            cwp_body.removeClass( 'cwp-full-width-footer cwp-boxed-width-footer cwp-fluid-width-footer' );
            cwp_body.addClass( to );
        } );
    } );
    wp.customize( 'footer-display-style', function( value ) {
        value.bind( function( to ) {
            cwp_body.removeClass( 'cwp-normal-footer cwp-parallax-footer' );
            cwp_body.addClass( to );
        } );
    } );

    let footer_partial_refresh_dynamic_css = [

        /*Footer General*/
        'footer-general-margin',
        'footer-general-padding',
        'footer-general-background-options',
        'footer-general-border-styling',
        'footer-sidebar-margin',
        'footer-sidebar-padding',
        'footer-sidebar-1-margin',
        'footer-sidebar-1-padding',
        'footer-sidebar-2-margin',
        'footer-sidebar-2-padding',
        'footer-sidebar-3-margin',
        'footer-sidebar-3-padding',
        'footer-sidebar-4-margin',
        'footer-sidebar-4-padding',
        'footer-sidebar-5-margin',
        'footer-sidebar-5-padding',
        'footer-sidebar-6-margin',
        'footer-sidebar-6-padding',
        'footer-sidebar-7-margin',
        'footer-sidebar-7-padding',
        'footer-sidebar-8-margin',
        'footer-sidebar-8-padding',

        /*Footer Top*/
        'footer-top-height-option',
        'footer-top-height',
        'footer-top-margin',
        'footer-top-padding',
        'footer-top-bg-options',
        'footer-top-background-options',
        'footer-top-border-styling',
        'footer-top-widget-title-color',
        'footer-top-widget-title-margin',
        'footer-top-widget-title-padding',

        /*Footer main*/
        'footer-main-height-option',
        'footer-main-height',
        'footer-main-margin',
        'footer-main-padding',
        'footer-main-bg-options',
        'footer-main-background-options',
        'footer-main-border-styling',
        'footer-main-widget-title-color',
        'footer-main-widget-title-margin',
        'footer-main-widget-title-padding',

        /*Footer Bottom*/
        'footer-bottom-height-option',
        'footer-bottom-height',
        'footer-bottom-margin',
        'footer-bottom-padding',
        'footer-bottom-bg-options',
        'footer-bottom-background-options',
        'footer-bottom-border-styling',
        'footer-bottom-widget-title-color',
        'footer-bottom-widget-title-margin',
        'footer-bottom-widget-title-padding',

        /*Footer Menu*/
        'footer-menu-margin',
        'footer-menu-padding',
        'footer-menu-item-margin',
        'footer-menu-item-padding',
        'footer-menu-title-color',
        'footer-menu-title-margin',
        'footer-menu-title-padding',
        'footer-menu-title-border-styling',
        'footer-menu-styling',

        /*Footer Social*/
        'footer-social-icon-size',
        'footer-social-icon-radius',
        'footer-social-icon-width',
        'footer-social-icon-height',
        'footer-social-icon-line-height',
        'individual-footer-social-icon-margin',
        'individual-footer-social-icon-padding',
        'footer-social-icon-section-margin',
        'footer-social-icon-section-padding',

        /*Copyright*/
        'footer-copyright-text-color',
        'footer-copyright-margin',
        'footer-copyright-padding',
        'footer-top-widget-title-border-styling',
        'footer-top-widget-content-color-options',
        'footer-main-widget-content-color-options',
        'footer-bottom-widget-content-color-options',
        'footer-top-widget-content-border-styling',

        /*HTML*/
        'footer-html-text-color',
        'footer-html-margin',
        'footer-html-padding',
        ],
        footerRefreshTimes = 0;
    footer_partial_refresh_dynamic_css.forEach(function(item) {
        wp.customize( item, function( value ) {
            value.bind( function( to ) {

                $.ajax({
                    type: 'POST',
                    url: cwp_general.ajaxurl,
                    data: {
                        'action':'cosmoswp_head_ajax_dynamic_css'
                    },
                    beforeSend: function( ) {
                        footerRefreshTimes++;
                        cosmoswp_footer_wrap.addClass('customize-partial-refreshing');
                    }
                }).done (function ( data ) {
                    cosmoswp_head_dynamic_css.html(data.data);
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }).always(function() {
                    footerRefreshTimes--;
                    if( 0 === footerRefreshTimes){
                        cosmoswp_footer_wrap.removeClass('customize-partial-refreshing');
                    }
                });
            } );
        } );
    });

    /*Footer Setting Dynamic Typography Refresh*/
    let footer_partial_refresh_dynamic_typography = [
        /*footer top*/
        'footer-top-widget-title-typography-options',
        'footer-top-widget-title-typography',
        'footer-top-widget-content-typography-options',
        'footer-top-widget-content-typography',

        /*Footer Menu*/
        'footer-menu-title-typography-options',
        'footer-menu-title-typography',
        'footer-menu-typography-options',
        'footer-menu-typography',

        /*Copyright*/
        'footer-copyright-typography-options',
        'footer-copyright-typography',

        /*HTML*/
        'footer-html-typography-options',
        'footer-html-typography',
        ],
        footerTypographyRefreshTimes = 0;

    footer_partial_refresh_dynamic_typography.forEach(function(item) {
        wp.customize( item, function( value ) {
            value.bind( function( to ) {

                $.ajax({
                    type: 'POST',
                    url: cwp_general.ajaxurl,
                    data: {
                        'action':'general_partial_ajax_typography'
                    },
                    beforeSend: function( ) {
                        footerTypographyRefreshTimes++;
                        cosmoswp_footer_wrap.addClass('customize-partial-refreshing');
                    }
                }).done (function ( data ) {
                    cosmoswp_google_fonts.attr('href',data.data.google_font_url);
                    cosmoswp_head_dynamic_css.html(data.data.dynamic_css);
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }).always(function() {
                    footerTypographyRefreshTimes--;
                    if( 0 === footerTypographyRefreshTimes){
                        cosmoswp_footer_wrap.removeClass('customize-partial-refreshing');
                    }
                });
            } );
        } );
    });

    let sticky_footer_partial_refresh_dynamic_css = [

            /*Sticky Footer Options*/
            'sticky-footer-icon-styling',

            //html
            'sticky-footer-html-text-color',
            'sticky-footer-html-margin',
            'sticky-footer-html-padding',

            //social icon
            'sticky-footer-social-icon-size',
            'sticky-footer-social-icon-radius',
            'sticky-footer-social-icon-width',
            'sticky-footer-social-icon-height',
            'sticky-footer-social-icon-line-height',
            'individual-sticky-footer-social-icon-margin',
            'individual-sticky-footer-social-icon-padding',
            'sticky-footer-social-icon-section-margin',
            'sticky-footer-social-icon-section-padding',

             //menu
            'sticky-footer-menu-margin',
            'sticky-footer-menu-padding',
            'sticky-footer-menu-item-margin',
            'sticky-footer-menu-item-padding',
            'sticky-footer-menu-styling',

            'sticky-footer-html-typography-options',
            'sticky-footer-html-typography-options'

        ],
        stickyFooterRefreshTimes = 0;
    sticky_footer_partial_refresh_dynamic_css.forEach(function(item) {
        wp.customize( item, function( value ) {
            value.bind( function( to ) {

                $.ajax({
                    type: 'POST',
                    url: cwp_general.ajaxurl,
                    data: {
                        'action':'cosmoswp_head_ajax_dynamic_css'
                    },
                    beforeSend: function( ) {
                        stickyFooterRefreshTimes++;
                        cosmoswp_sticky_footer_wrap.addClass('customize-partial-refreshing');
                    }
                }).done (function ( data ) {
                    cosmoswp_head_dynamic_css.html(data.data);
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }).always(function() {
                    stickyFooterRefreshTimes--;
                    if( 0 === stickyFooterRefreshTimes){
                        cosmoswp_sticky_footer_wrap.removeClass('customize-partial-refreshing');
                    }
                });
            } );
        } );
    });

    /*sticky footer typography*/
    let sticky_footer_partial_refresh_dynamic_typography = [

            /*html*/
            'sticky-footer-html-typography-options',
            'sticky-footer-html-typography',

            'sticky-footer-menu-typography-options',
            'sticky-footer-menu-typography',
        ],
        stickyFooterTypographyRefreshTimes = 0;

    sticky_footer_partial_refresh_dynamic_typography.forEach(function(item) {
        wp.customize( item, function( value ) {
            value.bind( function( to ) {

                $.ajax({
                    type: 'POST',
                    url: cwp_general.ajaxurl,
                    data: {
                        'action':'general_partial_ajax_typography'
                    },
                    beforeSend: function( ) {
                        stickyFooterTypographyRefreshTimes++;
                        cosmoswp_sticky_footer_wrap.addClass('customize-partial-refreshing');
                    }
                }).done (function ( data ) {
                    cosmoswp_google_fonts.attr('href',data.data.google_font_url);
                    cosmoswp_head_dynamic_css.html(data.data.dynamic_css);
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }).always(function() {
                    stickyFooterTypographyRefreshTimes--;
                    if( 0 === stickyFooterTypographyRefreshTimes){
                        cosmoswp_sticky_footer_wrap.removeClass('customize-partial-refreshing');
                    }
                });
            } );
        } );
    });

    /*Footer widget dynamic CSS*/
    wp.customize( 'footer-sidebar-1-content-align', function( value ) {
        value.bind( function( to ) {
            $('.cwp-footer-sidebar-1').removeClass( 'cwp-text-left cwp-text-center cwp-text-right' );
            $('.cwp-footer-sidebar-1').addClass( to );
        } );
    } );

    /*Footer widget dynamic CSS*/
    wp.customize( 'footer-sidebar-2-content-align', function( value ) {
        value.bind( function( to ) {
            $('.cwp-footer-sidebar-2').removeClass( 'cwp-text-left cwp-text-center cwp-text-right' );
            $('.cwp-footer-sidebar-2').addClass( to );
        } );
    } );
    /*Footer widget dynamic CSS*/
    wp.customize( 'footer-sidebar-3-content-align', function( value ) {
        value.bind( function( to ) {
            $('.cwp-footer-sidebar-3').removeClass( 'cwp-text-left cwp-text-center cwp-text-right' );
            $('.cwp-footer-sidebar-3').addClass( to );
        } );
    } );
    /*Footer widget dynamic CSS*/
    wp.customize( 'footer-sidebar-4-content-align', function( value ) {
        value.bind( function( to ) {
            $('.cwp-footer-sidebar-4').removeClass( 'cwp-text-left cwp-text-center cwp-text-right' );
            $('.cwp-footer-sidebar-4').addClass( to );
        } );
    } );
    /*Footer widget dynamic CSS*/
    wp.customize( 'footer-sidebar-5-content-align', function( value ) {
        value.bind( function( to ) {
            $('.cwp-footer-sidebar-5').removeClass( 'cwp-text-left cwp-text-center cwp-text-right' );
            $('.cwp-footer-sidebar-5').addClass( to );
        } );
    } );
    /*Footer widget dynamic CSS*/
    wp.customize( 'footer-sidebar-6-content-align', function( value ) {
        value.bind( function( to ) {
            $('.cwp-footer-sidebar-6').removeClass( 'cwp-text-left cwp-text-center cwp-text-right' );
            $('.cwp-footer-sidebar-6').addClass( to );
        } );
    } );
    /*Footer widget dynamic CSS*/
    wp.customize( 'footer-sidebar-7-content-align', function( value ) {
        value.bind( function( to ) {
            $('.cwp-footer-sidebar-7').removeClass( 'cwp-text-left cwp-text-center cwp-text-right' );
            $('.cwp-footer-sidebar-7').addClass( to );
        } );
    } );
    /*Footer widget dynamic CSS*/
    wp.customize( 'footer-sidebar-8-content-align', function( value ) {
        value.bind( function( to ) {
            $('.cwp-footer-sidebar-8').removeClass( 'cwp-text-left cwp-text-center cwp-text-right' );
            $('.cwp-footer-sidebar-8').addClass( to );
        } );
    } );
    /*Blog CSS refresh*/
    let blog_content_partial_refresh_dynamic_css = [

            /*Blog Content*/
            'blog-navigation-styling',
            'blog-pagination-color-options',
            'blog-default-pagination-color-options',
            'blog-sticky-post-title-font-size',
            'blog-sticky-post-content-font-size',
            'blog-sticky-post-margin',
            'blog-sticky-post-padding',
            'blog-sticky-post-bg-color',
            'blog-sticky-post-color-options',
            'blog-sticky-post-border-styling',
            'blog-button-margin',
            'blog-button-padding',
            'blog-button-styling',
            'blog-main-content-margin',
            'blog-main-content-padding'
        ],
        blogContentRefreshTimes = 0;
    blog_content_partial_refresh_dynamic_css.forEach(function(item) {
        wp.customize( item, function( value ) {
            value.bind( function( to ) {

                $.ajax({
                    type: 'POST',
                    url: cwp_general.ajaxurl,
                    data: {
                        'action':'cosmoswp_head_ajax_dynamic_css'
                    },
                    beforeSend: function( ) {
                        blogContentRefreshTimes++;
                        cosmoswp_blog_main_content.addClass('customize-partial-refreshing');
                    }
                }).done (function ( data ) {
                    cosmoswp_head_dynamic_css.html(data.data);
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }).always(function() {
                    blogContentRefreshTimes--;
                    if( 0 === blogContentRefreshTimes){
                        cosmoswp_blog_main_content.removeClass('customize-partial-refreshing');
                    }
                });
            } );
        } );
    });

    /*blog typography*/
    let blog_partial_refresh_dynamic_typography = [
            'blog-button-typography-options',
            'blog-button-typography',
        ],
        blogTypographyRefreshTimes = 0;

    blog_partial_refresh_dynamic_typography.forEach(function(item) {
        wp.customize( item, function( value ) {
            value.bind( function( to ) {

                $.ajax({
                    type: 'POST',
                    url: cwp_general.ajaxurl,
                    data: {
                        'action':'general_partial_ajax_typography'
                    },
                    beforeSend: function( ) {
                        blogTypographyRefreshTimes++;
                        cosmoswp_blog_main_content.addClass('customize-partial-refreshing');
                    }
                }).done (function ( data ) {
                    cosmoswp_google_fonts.attr('href',data.data.google_font_url);
                    cosmoswp_head_dynamic_css.html(data.data.dynamic_css);
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }).always(function() {
                    blogTypographyRefreshTimes--;
                    if( 0 === blogTypographyRefreshTimes){
                        cosmoswp_blog_main_content.removeClass('customize-partial-refreshing');
                    }
                });
            } );
        } );
    });

    /*post CSS refresh*/
    let post_content_partial_refresh_dynamic_css = [

            /*post Content*/
            'post-pagination-color-options',
            'post-main-content-padding',
            'post-main-content-margin',
        ],
        postContentRefreshTimes = 0;
    post_content_partial_refresh_dynamic_css.forEach(function(item) {
        wp.customize( item, function( value ) {
            value.bind( function( to ) {

                $.ajax({
                    type: 'POST',
                    url: cwp_general.ajaxurl,
                    data: {
                        'action':'cosmoswp_head_ajax_dynamic_css'
                    },
                    beforeSend: function( ) {
                        postContentRefreshTimes++;
                        cosmoswp_post_main_content.addClass('customize-partial-refreshing');
                    }
                }).done (function ( data ) {
                    cosmoswp_head_dynamic_css.html(data.data);
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }).always(function() {
                    postContentRefreshTimes--;
                    if( 0 === postContentRefreshTimes){
                        cosmoswp_post_main_content.removeClass('customize-partial-refreshing');
                    }
                });
            } );
        } );
    });

    /*page CSS refresh*/
    let page_content_partial_refresh_dynamic_css = [

            /*page Content*/
            'page-main-content-margin',
            'page-main-content-padding',
        ],
        pageContentRefreshTimes = 0;
        page_content_partial_refresh_dynamic_css.forEach(function(item) {
        wp.customize( item, function( value ) {
            value.bind( function( to ) {

                $.ajax({
                    type: 'POST',
                    url: cwp_general.ajaxurl,
                    data: {
                        'action':'cosmoswp_head_ajax_dynamic_css'
                    },
                    beforeSend: function( ) {
                        pageContentRefreshTimes++;
                        cosmoswp_page_main_content.addClass('customize-partial-refreshing');
                    }
                }).done (function ( data ) {
                    cosmoswp_head_dynamic_css.html(data.data);
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }).always(function() {
                    pageContentRefreshTimes--;
                    if( 0 === pageContentRefreshTimes){
                        cosmoswp_page_main_content.removeClass('customize-partial-refreshing');
                    }
                });
            } );
        } );
    });

    /*MAIN CONTENT*/
    /*BANNER*/
    let banner_partial_refresh_dynamic_css = [
        'banner-section-color',
        'banner-section-background-color',
        'enable-banner-overlay-color',
        'banner-overlay-color',
        'banner-section-background-image-options',
        'cosmoswp-banner-height',
        'banner-margin',
        'banner-padding',
        ],
        bannerRefreshTimes = 0;
    banner_partial_refresh_dynamic_css.forEach(function(item) {
        wp.customize( item, function( value ) {
            value.bind( function( to ) {

                $.ajax({
                    type: 'POST',
                    url: cwp_general.ajaxurl,
                    data: {
                        'action':'cosmoswp_head_ajax_dynamic_css'
                    },
                    beforeSend: function( ) {
                        bannerRefreshTimes++;
                        cosmoswp_page_header_wrap.addClass('customize-partial-refreshing');
                    }
                }).done (function ( data ) {
                    cosmoswp_head_dynamic_css.html(data.data);
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }).always(function() {
                    bannerRefreshTimes--;
                    if( 0 === bannerRefreshTimes){
                        cosmoswp_page_header_wrap.removeClass('customize-partial-refreshing');
                    }
                });
            } );
        } );
    });
    /*Main Content*/
    let main_content_partial_refresh_dynamic_css = [

            'main-content-general-margin',
            'main-content-general-padding',
            'main-content-general-background-options',
            'main-content-general-border-styling',
        ],
        mainContentRefreshTimes = 0;
    main_content_partial_refresh_dynamic_css.forEach(function(item) {
        wp.customize( item, function( value ) {
            value.bind( function( to ) {

                $.ajax({
                    type: 'POST',
                    url: cwp_general.ajaxurl,
                    data: {
                        'action':'cosmoswp_head_ajax_dynamic_css'
                    },
                    beforeSend: function( ) {
                        mainContentRefreshTimes++;
                        cosmoswp_main.addClass('customize-partial-refreshing');
                    }
                }).done (function ( data ) {
                    cosmoswp_head_dynamic_css.html(data.data);
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }).always(function() {
                    mainContentRefreshTimes--;
                    if( 0 === mainContentRefreshTimes){
                        cosmoswp_main.removeClass('customize-partial-refreshing');
                    }
                });
            } );
        } );
    });
} )( jQuery );