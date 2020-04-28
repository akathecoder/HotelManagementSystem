/**
 * File customizer-backend.js.
 * https://wordpress.stackexchange.com/questions/249706/customizer-active-callback-live-toggle-controls?rq=1
 *https://make.xwp.co/2016/07/24/dependently-contextual-customizer-controls/
 */

( function( $ ) {

    'use strict';
    let customize_theme_controls = $(document);

    /*If setting value is custom*/
    let ifSettingCustom = function( control, setting ) {
        let setActiveState, isDisplayed;
        isDisplayed = function() {
            return 'custom' === setting.get();
        };
        setActiveState = function() {
            control.active.set( isDisplayed() );
        };
        setActiveState();
        setting.bind( setActiveState );
    };
    /*Setting value for text, icon and both*/
    let text_or_both = ['text','both'],
        icon_or_both = ['icon','both'];
    let ifSettingTextOrBoth = function( control, setting ) {
        let setActiveState, isDisplayed;
        isDisplayed = function() {
            if( $.inArray( setting.get() , text_or_both) !== -1 ) {
                return true;
            }
            return false;
        };
        setActiveState = function() {
            control.active.set( isDisplayed() );
        };
        setActiveState();
        setting.bind( setActiveState );
    };
    let ifSettingIconOrBoth = function( control, setting ) {
        let setActiveState, isDisplayed;
        isDisplayed = function() {
            if( $.inArray( setting.get() , icon_or_both) !== -1 ) {
                return true;
            }
            return false;
        };
        setActiveState = function() {
            control.active.set( isDisplayed() );
        };
        setActiveState();
        setting.bind( setActiveState );
    };

    let ifSettingBoth = function( control, setting ) {
        let setActiveState, isDisplayed;
        isDisplayed = function() {
            return 'both' === setting.get();
        };
        setActiveState = function() {
            control.active.set( isDisplayed() );
        };
        setActiveState();
        setting.bind( setActiveState );
    };

    wp.customize.bind( 'ready', function() {

        /*header-position-options callback fixed for postmessage*/
        wp.customize( 'header-position-options', function( setting ) {
            let ifVertical = function( control ) {
                let setActiveState, isDisplayed;
                isDisplayed = function() {
                    return 'cwp-vertical-header' === setting.get();
                };
                setActiveState = function() {
                    control.active.set( isDisplayed() );
                };
                setActiveState();
                setting.bind( setActiveState );
            };

            wp.customize.control( 'vertical-header-position', ifVertical );
            wp.customize.control( 'vertical-header-width', ifVertical );

            let ifNormalOverlayFixed = function( control ) {
                let setActiveState, isDisplayed;
                isDisplayed = function() {
                    return 'normal' === setting.get() || 'cwp-overlay-fixed' === setting.get();
                };
                setActiveState = function() {
                    control.active.set( isDisplayed() );
                };
                setActiveState();
                setting.bind( setActiveState );
            };
            wp.customize.control( 'header-general-width', ifNormalOverlayFixed );
            /*Sticky Header*/
            wp.customize.control( 'header-general-sticky-msg', ifNormalOverlayFixed );
            wp.customize.control( 'sticky-header-options', ifNormalOverlayFixed );
        } );

        /*HEADER TOP*/
        /*header-top-height-option callback fixed for postmessage*/
        wp.customize( 'header-top-height-option', function( setting ) {
            wp.customize.control( 'top-header-height', function(control) {
                ifSettingCustom(control,setting)
            });
        } );
        wp.customize( 'header-top-bg-options', function( setting ) {
            wp.customize.control( 'header-top-background-options', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*HEADER MAIN*/
        wp.customize( 'header-main-height-option', function( setting ) {
            wp.customize.control( 'header-main-height', function(control) {
                ifSettingCustom(control,setting)
            });
        } );
        wp.customize( 'header-main-bg-options', function( setting ) {
            wp.customize.control( 'header-main-background-options', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*HEADER BOTTOM*/
        wp.customize( 'header-bottom-height-option', function( setting ) {
            wp.customize.control( 'header-bottom-height', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        wp.customize( 'header-bottom-bg-options', function( setting ) {
            wp.customize.control( 'header-bottom-background-options', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*Site Identity*/
        wp.customize( 'site-identity-typography-options', function( setting ) {
            wp.customize.control( 'site-title-typography', function(control) {
                ifSettingCustom(control,setting)
            });
            wp.customize.control( 'site-tagline-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*Primary Menu*/
        wp.customize( 'primary_menu', function( setting ) {
            wp.customize.control( 'primary-menu-custom-menu', function(control) {
                ifSettingCustom(control,setting)
            });
        } );
        wp.customize( 'primary-menu-typography-options', function( setting ) {
            wp.customize.control( 'primary-menu-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );
        wp.customize( 'primary-menu-submenu-typography-options', function( setting ) {
            wp.customize.control( 'primary-menu-submenu-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*Dropdown Search*/
        wp.customize( 'dd-search-typography-options', function( setting ) {
            wp.customize.control( 'dd-search-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*Normal Search*/
        wp.customize( 'normal-search-typography-options', function( setting ) {
            wp.customize.control( 'normal-search-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*Button One*/
        wp.customize( 'button-one-enable-icon', function( setting ) {
            let setupControl = function( control ) {
                let setActiveState, isDisplayed;
                isDisplayed = function() {
                    return setting.get();
                };
                setActiveState = function() {
                    control.active.set( isDisplayed() );
                };
                setActiveState();
                setting.bind( setActiveState );
            };
            wp.customize.control( 'button-one-icon', setupControl );
            wp.customize.control( 'button-one-icon-position', setupControl );
        } );


        wp.customize( 'button-one-typography-options', function( setting ) {
            wp.customize.control( 'button-one-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*Button Two*/
        wp.customize( 'button-two-enable-icon', function( setting ) {
            let setupControl = function( control ) {
                let setActiveState, isDisplayed;
                isDisplayed = function() {
                    return setting.get();
                };
                setActiveState = function() {
                    control.active.set( isDisplayed() );
                };
                setActiveState();
                setting.bind( setActiveState );
            };
            wp.customize.control( 'button-two-icon', setupControl );
            wp.customize.control( 'button-two-icon-position', setupControl );
        } );

        wp.customize( 'button-two-typography-options', function( setting ) {
            wp.customize.control( 'button-two-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*Contact Information*/
        wp.customize( 'contact-info-title-typography-options', function( setting ) {
            wp.customize.control( 'contact-info-title-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        wp.customize( 'contact-info-subtitle-typography-options', function( setting ) {
            wp.customize.control( 'contact-info-subtitle-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*HTML*/
        wp.customize( 'html-typography-options', function( setting ) {
            wp.customize.control( 'html-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        wp.customize('header-sidebar-widget-title-typography-options', function( setting ) {
            wp.customize.control( 'header-sidebar-widget-title-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        wp.customize('header-sidebar-widget-content-typography-options', function( setting ) {
            wp.customize.control( 'header-sidebar-widget-content-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        wp.customize('off-canvas-widget-title-typography-options', function( setting ) {
            wp.customize.control( 'off-canvas-widget-title-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        wp.customize( 'off-canvas-widget-content-typography-options', function( setting ) {
            wp.customize.control( 'off-canvas-widget-content-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        wp.customize('popup-sidebar-widget-title-typography-options', function( setting ) {
            wp.customize.control( 'popup-sidebar-widget-title-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        wp.customize( 'popup-sidebar-widget-content-typography-options', function( setting ) {
            wp.customize.control( 'popup-sidebar-widget-content-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*Menu Icon*/
        wp.customize( 'menu-icon-open-icon-options', function( setting ) {
            /*ifSettingTextOrBoth*/
            wp.customize.control( 'menu-open-text', function(control) {
                ifSettingTextOrBoth(control,setting)
            });
            wp.customize.control( 'menu-open-icon-typography-options', function(control) {
                ifSettingTextOrBoth(control,setting)
            });

            /*ifSettingIconOrBoth*/
            wp.customize.control( 'menu-open-icon', function(control) {
                ifSettingIconOrBoth(control,setting)
            });
            wp.customize.control( 'menu-open-icon-size-responsive', function(control) {
                ifSettingIconOrBoth(control,setting)
            });

            /*ifSettingBoth*/
            wp.customize.control( 'menu-icon-open-icon-position', function(control) {
                ifSettingBoth(control,setting)
            });
        } );

        wp.customize( 'menu-open-icon-typography-options', function( setting ) {
            wp.customize.control( 'menu-open-icon-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*Menu Close Icon*/
        wp.customize( 'menu-icon-close-icon-options', function( setting ) {

            /*ifSettingTextOrBoth*/
            wp.customize.control( 'menu-close-text', function(control) {
                ifSettingTextOrBoth(control,setting)
            });
            wp.customize.control( 'menu-icon-close-text-typography-options', function(control) {
                ifSettingTextOrBoth(control,setting)
            });

            /*ifSettingIconOrBoth*/
            wp.customize.control( 'menu-close-icon', function(control) {
                ifSettingIconOrBoth(control,setting)
            });
            wp.customize.control( 'menu-icon-close-icon-size-responsive', function(control) {
                ifSettingIconOrBoth(control,setting)
            });

            /*ifSettingBoth*/
            wp.customize.control( 'menu-icon-close-icon-position', function(control) {
                ifSettingBoth(control,setting)
            });
        } );

        wp.customize( 'menu-icon-close-text-typography-options', function( setting ) {
            wp.customize.control( 'menu-icon-close-text-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*DropDown Menu*/
        wp.customize( 'dropdown-menu-typography-options', function( setting ) {
            wp.customize.control( 'dropdown-menu-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*Fullscreen Search*/
        wp.customize( 'fullscreen-search-typography-options', function( setting ) {
            wp.customize.control( 'fullscreen-search-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*News Ticker*/
        wp.customize( 'news-ticker-typography-options', function( setting ) {
            wp.customize.control( 'news-ticker-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*Overlay Search*/
        wp.customize( 'overlay-search-typography-options', function( setting ) {
            wp.customize.control( 'overlay-search-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*offcanvas open icon/text sidebar*/
        wp.customize( 'off-canvas-open-icon-options', function( setting ) {
            /*ifSettingTextOrBoth*/
            wp.customize.control( 'off-canvas-sidebar-open-text', function(control) {
                ifSettingTextOrBoth(control,setting)
            });
            wp.customize.control( 'off-canvas-open-text-typography-options', function(control) {
                ifSettingTextOrBoth(control,setting)
            });

            /*ifSettingIconOrBoth*/
            wp.customize.control( 'off-canvas-sidebar-open-icon', function(control) {
                ifSettingIconOrBoth(control,setting)
            });
            wp.customize.control( 'off-canvas-open-icon-size-responsive', function(control) {
                ifSettingIconOrBoth(control,setting)
            });

            /*ifSettingBoth*/
            wp.customize.control( 'off-canvas-open-icon-position', function(control) {
                ifSettingBoth(control,setting)
            });
        } );
        wp.customize( 'off-canvas-open-text-typography-options', function( setting ) {
            wp.customize.control( 'off-canvas-open-text-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*offcanvas Close icon/text sidebar*/
        wp.customize( 'off-canvas-close-icon-options', function( setting ) {

            /*ifSettingTextOrBoth*/
            wp.customize.control( 'off-canvas-sidebar-close-text', function(control) {
                ifSettingTextOrBoth(control,setting)
            });
            wp.customize.control( 'off-canvas-close-text-typography-options', function(control) {
                ifSettingTextOrBoth(control,setting)
            });

            /*ifSettingIconOrBoth*/
            wp.customize.control( 'off-canvas-sidebar-close-icon', function(control) {
                ifSettingIconOrBoth(control,setting)
            });
            wp.customize.control( 'off-canvas-close-icon-size-responsive', function(control) {
                ifSettingIconOrBoth(control,setting)
            });

            /*ifSettingBoth*/
            wp.customize.control( 'off-canvas-close-icon-position', function(control) {
                ifSettingBoth(control,setting)
            });

        } );

        wp.customize( 'off-canvas-close-text-typography-options', function( setting ) {
            wp.customize.control( 'off-canvas-close-text-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );


        /*Drop Down Open sidebar*/
        wp.customize( 'dropdown-menu-icon-options', function( setting ) {
            /*ifSettingTextOrBoth*/
            wp.customize.control( 'dropdown-menu-open-text', function(control) {
                ifSettingTextOrBoth(control,setting)
            });
            wp.customize.control( 'dropdown-menu-open-text-typography-options', function(control) {
                ifSettingTextOrBoth(control,setting)
            });

            /*ifSettingIconOrBoth*/
            wp.customize.control( 'dropdown-menu-open-icon', function(control) {
                ifSettingIconOrBoth(control,setting)
            });
            wp.customize.control( 'dropdown-menu-icon-size-responsive', function(control) {
                ifSettingIconOrBoth(control,setting)
            });

            /*ifSettingBoth*/
            wp.customize.control( 'dropdown-menu-icon-position', function(control) {
                ifSettingBoth(control,setting)
            });
        } );

        wp.customize( 'dropdown-menu-open-text-typography-options', function( setting ) {
            wp.customize.control( 'dropdown-menu-open-text-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*Drop Down close sidebar*/
        wp.customize( 'dropdown-menu-close-icon-options', function( setting ) {
            /*ifSettingTextOrBoth*/
            wp.customize.control( 'dropdown-menu-close-text', function(control) {
                ifSettingTextOrBoth(control,setting)
            });
            wp.customize.control( 'dropdown-menu-close-text-typography-options', function(control) {
                ifSettingTextOrBoth(control,setting)
            });

            /*ifSettingIconOrBoth*/
            wp.customize.control( 'dropdown-menu-close-icon', function(control) {
                ifSettingIconOrBoth(control,setting)
            });
            wp.customize.control( 'dropdown-menu-close-icon-size-responsive', function(control) {
                ifSettingIconOrBoth(control,setting)
            });

            /*ifSettingBoth*/
            wp.customize.control( 'dropdown-menu-close-icon-position', function(control) {
                ifSettingBoth(control,setting)
            });
        } );

        wp.customize( 'dropdown-menu-close-text-typography-options', function( setting ) {
            wp.customize.control( 'dropdown-menu-close-text-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*popup sidebar*/
        wp.customize( 'popup-sidebar-open-icon-options', function( setting ) {
            /*ifSettingTextOrBoth*/
            wp.customize.control( 'popup-sidebar-open-text', function(control) {
                ifSettingTextOrBoth(control,setting)
            });
            wp.customize.control( 'popup-open-text-typography-options', function(control) {
                ifSettingTextOrBoth(control,setting)
            });

            /*ifSettingIconOrBoth*/
            wp.customize.control( 'popup-sidebar-open-icon', function(control) {
                ifSettingIconOrBoth(control,setting)
            });
            wp.customize.control( 'popup-sidebar-open-icon-size-responsive', function(control) {
                ifSettingIconOrBoth(control,setting)
            });

            /*ifSettingBoth*/
            wp.customize.control( 'popup-sidebar-open-icon-position', function(control) {
                ifSettingBoth(control,setting)
            });
        } );

        wp.customize( 'popup-open-text-typography-options', function( setting ) {
            wp.customize.control( 'popup-open-text-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*popup close sidebar*/
        wp.customize( 'popup-sidebar-close-icon-options', function( setting ) {
            /*ifSettingTextOrBoth*/
            wp.customize.control( 'popup-sidebar-close-text', function(control) {
                ifSettingTextOrBoth(control,setting)
            });
            wp.customize.control( 'popup-close-text-typography-options', function(control) {
                ifSettingTextOrBoth(control,setting)
            });

            /*ifSettingIconOrBoth*/
            wp.customize.control( 'popup-sidebar-close-icon', function(control) {
                ifSettingIconOrBoth(control,setting)
            });
            wp.customize.control( 'popup-sidebar-close-icon-size-responsive', function(control) {
                ifSettingIconOrBoth(control,setting)
            });

            /*ifSettingBoth*/
            wp.customize.control( 'popup-sidebar-close-icon-position', function(control) {
                ifSettingBoth(control,setting)
            });
        } );

        wp.customize( 'popup-close-text-typography-options', function( setting ) {
            wp.customize.control( 'popup-close-text-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*Sticky Header*/
        customize_theme_controls.on('change', '#_customize-input-header-position-options, #_customize-input-sticky-header-options, #_customize-input-enable-sticky-header-color-options',function(e){
            e.preventDefault();
            let header_position_options = $('#_customize-input-header-position-options').val(),
                sticky_header_options = $('#_customize-input-sticky-header-options').val(),
                enable_sticky_header_color_options = $('#_customize-input-enable-sticky-header-color-options').is(":checked");

            let ifHorizontalAndStickyEnable = function( control ) {
                let setActiveState, isDisplayed;
                isDisplayed = function() {
                    return ('normal' === header_position_options || 'cwp-overlay-fixed' === header_position_options) && 'disable' !== sticky_header_options;
                };
                setActiveState = function() {
                    control.active.set( isDisplayed() );
                };
                setActiveState();

            };

            let ifHorizontalAndStickyScrollUpDown = function( control ) {
                let setActiveState, isDisplayed;
                isDisplayed = function() {
                    return ('normal' === header_position_options || 'cwp-overlay-fixed' === header_position_options) &&
                        ('scroll-down' === sticky_header_options || 'scroll-up' === sticky_header_options);
                };
                setActiveState = function() {
                    control.active.set( isDisplayed() );
                };
                setActiveState();
            };
            let ifStickyHeaderColorEnable = function( control ) {
                let setActiveState, isDisplayed;
                isDisplayed = function() {
                    return ('normal' === header_position_options || 'cwp-overlay-fixed' === header_position_options) &&
                        'disable' !== sticky_header_options &&
                        enable_sticky_header_color_options;
                };
                setActiveState = function() {
                    control.active.set( isDisplayed() );
                };
                setActiveState();
            };
            wp.customize.control( 'sticky-header-animation-options', ifHorizontalAndStickyEnable );
            wp.customize.control( 'sticky-header-include-top', ifHorizontalAndStickyEnable );
            wp.customize.control( 'sticky-header-include-main', ifHorizontalAndStickyEnable );
            wp.customize.control( 'sticky-header-include-bottom', ifHorizontalAndStickyEnable );
            wp.customize.control( 'sticky-header-mobile-enable', ifHorizontalAndStickyEnable );
            wp.customize.control( 'enable-sticky-header-color-options', ifHorizontalAndStickyEnable );

            wp.customize.control( 'sticky-header-trigger-height', ifHorizontalAndStickyScrollUpDown );

            wp.customize.control( 'sticky-header-bg-color', ifStickyHeaderColorEnable );
            wp.customize.control( 'sticky-top-header-options-styling-msg', ifStickyHeaderColorEnable );
            wp.customize.control( 'sticky-top-header-text-color', ifStickyHeaderColorEnable );
            wp.customize.control( 'sticky-top-header-link-color', ifStickyHeaderColorEnable );
            wp.customize.control( 'sticky-top-header-link-hover-color', ifStickyHeaderColorEnable );
            wp.customize.control( 'sticky-top-header-menu-color-options', ifStickyHeaderColorEnable );
            wp.customize.control( 'sticky-main-header-options-styling-msg', ifStickyHeaderColorEnable );
            wp.customize.control( 'sticky-main-header-text-color', ifStickyHeaderColorEnable );
            wp.customize.control( 'sticky-main-header-link-color', ifStickyHeaderColorEnable );
            wp.customize.control( 'sticky-main-header-link-hover-color', ifStickyHeaderColorEnable );
            wp.customize.control( 'sticky-main-header-menu-color-options', ifStickyHeaderColorEnable );
            wp.customize.control( 'sticky-bottom-header-options-styling-msg', ifStickyHeaderColorEnable );
            wp.customize.control( 'sticky-bottom-header-text-color', ifStickyHeaderColorEnable );
            wp.customize.control( 'sticky-bottom-header-link-color', ifStickyHeaderColorEnable );
            wp.customize.control( 'sticky-bottom-header-link-hover-color', ifStickyHeaderColorEnable );
            wp.customize.control( 'sticky-bottom-header-menu-color-options', ifStickyHeaderColorEnable );
        });

        /*FOOTER OPTIONS*/
        /*footer top*/
        wp.customize( 'footer-top-height-option', function( setting ) {
            wp.customize.control( 'footer-top-height', function(control) {
                ifSettingCustom(control,setting)
            });
        } );
        wp.customize( 'footer-top-bg-options', function( setting ) {
            wp.customize.control( 'footer-top-background-options', function(control) {
                ifSettingCustom(control,setting)
            });
        } );
        wp.customize( 'footer-top-widget-title-typography-options', function( setting ) {
            wp.customize.control( 'footer-top-widget-title-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );
        wp.customize( 'footer-top-widget-content-typography-options', function( setting ) {
            wp.customize.control( 'footer-top-widget-content-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );
        /*Footer Main*/
        wp.customize( 'footer-main-height-option', function( setting ) {
            wp.customize.control( 'footer-main-height', function(control) {
                ifSettingCustom(control,setting)
            });
        } );
        wp.customize( 'footer-main-bg-options', function( setting ) {
            wp.customize.control( 'footer-main-background-options', function(control) {
                ifSettingCustom(control,setting)
            });
        } );
        wp.customize( 'footer-main-widget-title-typography-options', function( setting ) {
            wp.customize.control( 'footer-main-widget-title-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );
        wp.customize( 'footer-main-widget-content-typography-options', function( setting ) {
            wp.customize.control( 'footer-main-widget-content-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*Footer Bottom*/
        wp.customize( 'footer-bottom-height-option', function( setting ) {
            wp.customize.control( 'footer-bottom-height', function(control) {
                ifSettingCustom(control,setting)
            });
        } );
        wp.customize( 'footer-bottom-bg-options', function( setting ) {
            wp.customize.control( 'footer-bottom-background-options', function(control) {
                ifSettingCustom(control,setting)
            });
        } );
        wp.customize( 'footer-bottom-widget-title-typography-options', function( setting ) {
            wp.customize.control( 'footer-bottom-widget-title-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );
        wp.customize( 'footer-bottom-widget-content-typography-options', function( setting ) {
            wp.customize.control( 'footer-bottom-widget-content-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        //html
        wp.customize( 'footer-html-typography-options', function( setting ) {
            wp.customize.control( 'footer-html-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*sticky footer*/
        //html
        wp.customize( 'sticky-footer-html-typography-options', function( setting ) {
            wp.customize.control( 'sticky-footer-html-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        //menu
        wp.customize( 'sticky-footer-menu-typography-options', function( setting ) {
            wp.customize.control( 'sticky-footer-menu-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*copyright*/
        wp.customize( 'footer-copyright-typography-options', function( setting ) {
            wp.customize.control( 'footer-copyright-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*Blog*/
        wp.customize( 'blog-post-view-layout', function( setting ) {
            let setupControl = function( control ) {
                let setActiveState, isDisplayed;
                isDisplayed = function() {
                    return 'column-layout' === setting.get();
                };
                setActiveState = function() {
                    control.active.set( isDisplayed() );
                };
                setActiveState();
                setting.bind( setActiveState );
            };
            wp.customize.control( 'blog-column-number', setupControl );
            wp.customize.control( 'enable-masonry-blog', setupControl );
        } );
        wp.customize( 'blog-button-typography-options', function( setting ) {
            wp.customize.control( 'blog-button-typography', function(control) {
                ifSettingCustom(control,setting)
            });
        } );

        /*footer Widgets*/
        function footerWidgetOptions(){
            wp.customize( 'footer-sidebar-1-widget-setting-option', function( setting ) {
                wp.customize.control( 'footer-sidebar-1-content-align', function (control) {
                    ifSettingCustom(control,setting)
                } );
                wp.customize.control( 'footer-sidebar-1-margin', function ( control ) {
                    ifSettingCustom(control,setting)
                } );
                wp.customize.control( 'footer-sidebar-1-padding', function ( control) {
                    ifSettingCustom(control,setting)
                } );
            } );
            wp.customize( 'footer-sidebar-2-widget-setting-option', function( setting ) {
                wp.customize.control( 'footer-sidebar-2-content-align', function (control) {
                    ifSettingCustom(control,setting)
                } );
                wp.customize.control( 'footer-sidebar-2-margin', function ( control ) {
                    ifSettingCustom(control,setting)
                } );
                wp.customize.control( 'footer-sidebar-2-padding', function ( control) {
                    ifSettingCustom(control,setting)
                } );
            } );
            wp.customize( 'footer-sidebar-3-widget-setting-option', function( setting ) {
                wp.customize.control( 'footer-sidebar-3-content-align', function (control) {
                    ifSettingCustom(control,setting)
                } );
                wp.customize.control( 'footer-sidebar-3-margin', function ( control ) {
                    ifSettingCustom(control,setting)
                } );
                wp.customize.control( 'footer-sidebar-3-padding', function ( control) {
                    ifSettingCustom(control,setting)
                } );
            } );
            wp.customize( 'footer-sidebar-4-widget-setting-option', function( setting ) {
                wp.customize.control( 'footer-sidebar-4-content-align', function (control) {
                    ifSettingCustom(control,setting)
                } );
                wp.customize.control( 'footer-sidebar-4-margin', function ( control ) {
                    ifSettingCustom(control,setting)
                } );
                wp.customize.control( 'footer-sidebar-4-padding', function ( control) {
                    ifSettingCustom(control,setting)
                } );
            } );
            wp.customize( 'footer-sidebar-5-widget-setting-option', function( setting ) {
                wp.customize.control( 'footer-sidebar-5-content-align', function (control) {
                    ifSettingCustom(control,setting)
                } );
                wp.customize.control( 'footer-sidebar-5-margin', function ( control ) {
                    ifSettingCustom(control,setting)
                } );
                wp.customize.control( 'footer-sidebar-5-padding', function ( control) {
                    ifSettingCustom(control,setting)
                } );
            } );
            wp.customize( 'footer-sidebar-6-widget-setting-option', function( setting ) {
                wp.customize.control( 'footer-sidebar-6-content-align', function (control) {
                    ifSettingCustom(control,setting)
                } );
                wp.customize.control( 'footer-sidebar-6-margin', function ( control ) {
                    ifSettingCustom(control,setting)
                } );
                wp.customize.control( 'footer-sidebar-6-padding', function ( control) {
                    ifSettingCustom(control,setting)
                } );
            } );
            wp.customize( 'footer-sidebar-7-widget-setting-option', function( setting ) {
                wp.customize.control( 'footer-sidebar-7-content-align', function (control) {
                    ifSettingCustom(control,setting)
                } );
                wp.customize.control( 'footer-sidebar-7-margin', function ( control ) {
                    ifSettingCustom(control,setting)
                } );
                wp.customize.control( 'footer-sidebar-7-padding', function ( control) {
                    ifSettingCustom(control,setting)
                } );
            } );
            wp.customize( 'footer-sidebar-8-widget-setting-option', function( setting ) {
                wp.customize.control( 'footer-sidebar-8-content-align', function (control) {
                    ifSettingCustom(control,setting)
                } );
                wp.customize.control( 'footer-sidebar-8-margin', function ( control ) {
                    ifSettingCustom(control,setting)
                } );
                wp.customize.control( 'footer-sidebar-8-padding', function ( control) {
                    ifSettingCustom(control,setting)
                } );
            } );
        }
        wp.customize.state( 'expandedPanel' ).bind( function( paneVisible ) {
            if( 'cosmoswp_footer' === paneVisible.id){
                footerWidgetOptions();
            }
        });


        /*BANNER SECTION */
        let banner_condition = ['normal-image','bg-image','video'],
            overlay_not_display    = ['hide', 'color'],
            height_condition       = ['video', 'color','bg-image'];
        wp.customize( 'banner-section-display', function( setting ) {
            let BannerSectionVideoCondition = function( control ) {
                let setActiveState, isDisplayed;
                isDisplayed = function() {
                    return 'video' === setting.get();
                };
                setActiveState = function() {
                    control.active.set( isDisplayed() );
                };
                setActiveState();
                setting.bind( setActiveState );
            };
            let BannerSectionDisplayImage = function( control ) {
                let setActiveState, isDisplayed;
                isDisplayed = function() {
                    if( $.inArray( setting.get() , banner_condition) !== -1 ) {
                        return true;
                    }
                    return false;
                };
                setActiveState = function() {
                    control.active.set( isDisplayed() );
                };
                setActiveState();
                setting.bind( setActiveState );
            };
            let BannerSectionDisplayEnable = function( control ) {
                let setActiveState, isDisplayed;
                isDisplayed = function() {
                    return 'hide' !== setting.get();
                };
                setActiveState = function() {
                    control.active.set( isDisplayed() );
                };
                setActiveState();
                setting.bind( setActiveState );
            };
            let BannerSectionDisplayColorEnable = function( control ) {
                let setActiveState, isDisplayed;
                isDisplayed = function() {
                    return 'color' === setting.get();
                };
                setActiveState = function() {
                    control.active.set( isDisplayed() );
                };
                setActiveState();
                setting.bind( setActiveState );
            };
            let BannerSectionOverlayActive = function( control ) {
                let setActiveState, isDisplayed;
                isDisplayed = function() {
                    if( $.inArray( setting.get() , overlay_not_display) === -1 ) {
                        return true;
                    }
                    return false;
                };
                setActiveState = function() {
                    control.active.set( isDisplayed() );
                };
                setActiveState();
                setting.bind( setActiveState );
            };
            let BannerSectionBgImage = function( control ) {
                let setActiveState, isDisplayed;
                isDisplayed = function() {
                    return 'bg-image' === setting.get();
                };
                setActiveState = function() {
                    control.active.set( isDisplayed() );
                };
                setActiveState();
                setting.bind( setActiveState );
            };
            let BannerSectionHeightCondition = function( control ) {
                let setActiveState, isDisplayed;
                isDisplayed = function() {
                    if( $.inArray( setting.get() , height_condition) !== -1 ) {
                        return true;
                    }
                    return false;
                };
                setActiveState = function() {
                    control.active.set( isDisplayed() );
                };
                setActiveState();
                setting.bind( setActiveState );
            };
            wp.customize.control( 'header_image', BannerSectionDisplayImage );
            wp.customize.control( 'header_video', BannerSectionVideoCondition );
            wp.customize.control( 'external_header_video', BannerSectionVideoCondition );
            wp.customize.control( 'single-banner-section-title', BannerSectionDisplayEnable );
            wp.customize.control( 'banner-section-title-align', BannerSectionDisplayEnable );
            wp.customize.control( 'banner-section-content-position', BannerSectionDisplayEnable );
            wp.customize.control( 'banner-section-color', BannerSectionDisplayEnable );
            wp.customize.control( 'banner-padding-margin-styling-msg', BannerSectionDisplayEnable );
            wp.customize.control( 'banner-margin', BannerSectionDisplayEnable );
            wp.customize.control( 'banner-padding', BannerSectionDisplayEnable );

            wp.customize.control( 'banner-section-background-color', BannerSectionDisplayColorEnable );

            wp.customize.control( 'enable-banner-overlay-color', BannerSectionOverlayActive );
            wp.customize.control( 'banner-overlay-color', BannerSectionOverlayActive );

            wp.customize.control( 'banner-section-background-image-options', BannerSectionBgImage );

            wp.customize.control( 'cosmoswp-banner-height', BannerSectionHeightCondition );
        } );
        wp.customize( 'enable-banner-overlay-color', function( setting ) {
            let BannerSectionOverlayActive = function( control ) {
                let setActiveState, isDisplayed;
                isDisplayed = function() {
                    let bannerSectionDisplay = wp.customize.value( 'banner-section-display' )();
                    if( $.inArray( bannerSectionDisplay, overlay_not_display) === -1 && setting.get()) {
                        return true;
                    }
                    return false;
                };
                setActiveState = function() {
                    control.active.set( isDisplayed() );
                };
                setActiveState();
                setting.bind( setActiveState );
            };
            wp.customize.control( 'banner-overlay-color', BannerSectionOverlayActive );
        });

        customize_theme_controls.on('change', '#_customize-input-banner-section-display, #_customize-input-single-banner-section-title',function(e){
            e.preventDefault();
            let banner_section_display = $('#_customize-input-banner-section-display').val(),
                single_banner_section_title = $('#_customize-input-single-banner-section-title').val();

            let ifSingleCustomBannerTitleDisplayEnable = function( control ) {
                let setActiveState, isDisplayed;
                isDisplayed = function() {
                    return 'hide' !== banner_section_display || 'custom-title' === single_banner_section_title;
                };
                setActiveState = function() {
                    control.active.set( isDisplayed() );
                };
                setActiveState();

            };
            let ifSingleCustomBannerTagEnable = function( control ) {
                let setActiveState, isDisplayed;
                isDisplayed = function() {
                    return 'hide' !== banner_section_display && ('custom-title' === single_banner_section_title || 'default' === single_banner_section_title );
                };
                setActiveState = function() {
                    control.active.set( isDisplayed() );
                };
                setActiveState();

            };
            wp.customize.control( 'single-custom-banner-title', ifSingleCustomBannerTitleDisplayEnable );
            wp.customize.control( 'single-banner-title-tag', ifSingleCustomBannerTagEnable );
        });
    });
} )( jQuery );