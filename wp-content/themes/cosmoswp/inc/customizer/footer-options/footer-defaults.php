<?php
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Footer Defaults
 *
 * @since    1.0.0
 * @access   public
 *
 */
$footer_defaults = array(

    /*Footer General*/
    $this->builder_section_controller                 => array(
        'desktop' => array(
            'top'    => '',
            'main'   => '',
            'bottom' => array(
                array(
                    'x'      => '0',
                    'y'      => '1',
                    'width'  => '6',
                    'height' => '1',
                    'id'     => 'footer_copyright',
                ),
                array(
                    'x'      => '6',
                    'y'      => '1',
                    'width'  => '6',
                    'height' => '1',
                    'id'     => 'footer_social',
                ),
            ),
        ),
    ),
    'footer-general-layout'                           => 'inherit',
    'footer-display-style'                            => 'cwp-normal-footer',
    'footer-general-padding'                          => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-general-margin'                           => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-general-background-options'               => json_encode(array(
        'background-color'         => '#444',
        'background-image'         => '',
        'background-size'          => 'cover',
        'background-position'      => 'center',
        'background-repeat'        => 'no-repeat',
        'background-attachment'    => 'scroll',
        'enable-overlay'           => false,
        'background-overlay-color' => '',

    )),
    'footer-general-border-styling'                   => json_encode(array(
        'border-style'     => 'none',
        'border-color'     => '',
        'box-shadow-color' => '',
        'border-width'     => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true,
            )
        ),
        'box-shadow-css'   => array(
            'desktop' => array(
                'x'           => '',
                'Y'           => '',
                'BLUR'        => '',
                'SPREAD'      => '',
                'cssbox_link' => true,
            )
        ),
        'border-radius'    => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true,
            )
        ),
    )),
    'footer-general-typography'                       => '',
    'footer-sidebar-margin'                       => '',
    'footer-sidebar-padding'                       => '',

    /*footer top*/
    'footer-top-height-option'                        => 'auto',
    'footer-top-height'                               => '',
    'footer-top-padding'                              => json_encode(array(
        'desktop' => array(
            'top'         => '25',
            'right'       => '0',
            'bottom'      => '25',
            'left'        => '0',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-top-margin'                               => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-top-bg-options'                           => 'none',
    'footer-top-background-options'                   => json_encode(array(
        'background-color'      => '#f5f5f5',
        'background-image'      => '',
        'background-size'       => 'cover',
        'background-position'   => 'center',
        'background-repeat'     => 'no-repeat',
        'background-attachment' => 'scroll',
        'enable-overlay'           => false,
        'background-overlay-color' => '',
    )),
    'footer-top-border-styling'                       => json_encode(array(
        'border-style'     => 'none',
        'border-color'     => '',
        'box-shadow-color' => '',
        'border-width'     => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true,
            )
        ),
        'box-shadow-css'   => array(
            'desktop' => array(
                'x'           => '',
                'Y'           => '',
                'BLUR'        => '',
                'SPREAD'      => '',
                'cssbox_link' => true,
            )
        ),
        'border-radius'    => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true,
            )
        ),
    )),
    'footer-top-widget-title-align'                   => 'cwp-text-left',
    'footer-top-widget-title-color'                   => '#fff',
    'footer-top-widget-title-margin'                  => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-top-widget-title-padding'                 => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-top-widget-title-border-styling'          => json_encode(array(
        'border-style' => 'none',
        'border-color' => '',
        'border-width' => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true,
            )
        ),
    )),
    'footer-top-widget-title-typography-options'      => 'inherit',
    'footer-top-widget-title-typography'              => json_encode(array(
        'font-type'       => 'google',
        'system-font'     => 'verdana',
        'google-font'     => 'Lato',
        'custom-font'     => '',
        'font-weight'     => '400',
        'font-style'      => 'normal',
        'text-decoration' => 'none',
        'text-transform'  => 'none',
        'font-size'       => array(
            'desktop' => '14',
            'tablet'  => '14',
            'mobile'  => '14',
        ),
        'line-height'     => array(
            'desktop' => '24',
            'tablet'  => '24',
            'mobile'  => '24',
        ),
        'letter-spacing'  => array(
            'desktop' => '',
            'tablet'  => '',
            'mobile'  => '',
        ),
    )),
    'footer-top-widget-content-align'                 => 'cwp-text-left',
    'footer-top-widget-content-border-styling'        => json_encode(array(
        'border-style' => 'none',
        'border-color' => '',
        'border-width' => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true,
            )
        ),
    )),
    'footer-top-widget-content-typography-options'    => 'inherit',
    'footer-top-widget-content-typography'            => json_encode(array(
        'font-type'       => 'google',
        'system-font'     => 'verdana',
        'google-font'     => 'Lato',
        'custom-font'     => '',
        'font-weight'     => '400',
        'font-style'      => 'normal',
        'text-decoration' => 'none',
        'text-transform'  => 'none',
        'font-size'       => array(
            'desktop' => '14',
            'tablet'  => '14',
            'mobile'  => '14',
        ),
        'line-height'     => array(
            'desktop' => '24',
            'tablet'  => '24',
            'mobile'  => '24',
        ),
        'letter-spacing'  => array(
            'desktop' => '',
            'tablet'  => '',
            'mobile'  => '',
        ),
    )),
    'footer-top-widget-content-color-options'     => json_encode(array(

        'text-color'       => '#333333',
        'link-color'       => '#275cf6',
        'link-hover-color' => '#1949d4',
    )),
    'footer-main-widget-content-color-options'     => json_encode(array(

        'title-color'      => '#202020',
        'link-color'       => '#275cf6',
        'link-hover-color' => '#1949d4',
    )),
    'footer-bottom-widget-content-color-options'     => json_encode(array(

        'text-color'      => '#202020',
        'link-color'       => '#275cf6',
        'link-hover-color' => '#1949d4',
    )),

    /*footer Main*/
    'footer-main-height-option'                       => 'auto',
    'footer-main-height'                              => '',
    'footer-main-padding'                             => json_encode(array(
        'desktop' => array(
            'top'         => '25',
            'right'       => '0',
            'bottom'      => '25',
            'left'        => '0',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-main-margin'                              => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-main-bg-options'                          => 'none',
    'footer-main-background-options'                  => json_encode(array(
        'background-color'      => '#444',
        'background-image'      => '',
        'background-size'       => 'cover',
        'background-position'   => 'center',
        'background-repeat'     => 'no-repeat',
        'background-attachment' => 'scroll',
        'enable-overlay'           => false,
        'background-overlay-color' => '',
    )),
    'footer-main-border-styling'                      => json_encode(array(
        'border-style'     => 'none',
        'border-color'     => '',
        'box-shadow-color' => '',
        'border-width'     => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true,
            )
        ),
        'box-shadow-css'   => array(
            'desktop' => array(
                'x'           => '',
                'Y'           => '',
                'BLUR'        => '',
                'SPREAD'      => '',
                'cssbox_link' => true,
            )
        ),
        'border-radius'    => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true,
            )
        ),
    )),
    'footer-main-widget-title-align'                  => 'cwp-text-left',
    'footer-main-widget-title-color'                  => '#fff',
    'footer-main-widget-title-margin'                 => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-main-widget-title-padding'                => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-main-widget-title-border-styling'         => json_encode(array(
        'border-style' => 'none',
        'border-color' => '',
        'border-width' => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true,
            )
        ),
    )),
    'footer-main-widget-title-typography-options'     => 'inherit',
    'footer-main-widget-title-typography'             => json_encode(array(
        'font-type'       => 'google',
        'system-font'     => 'verdana',
        'google-font'     => 'Lato',
        'custom-font'     => '',
        'font-weight'     => '400',
        'font-style'      => 'normal',
        'text-decoration' => 'none',
        'text-transform'  => 'none',
        'font-size'       => array(
            'desktop' => '14',
            'tablet'  => '14',
            'mobile'  => '14',
        ),
        'line-height'     => array(
            'desktop' => '24',
            'tablet'  => '24',
            'mobile'  => '24',
        ),
        'letter-spacing'  => array(
            'desktop' => '',
            'tablet'  => '',
            'mobile'  => '',
        ),
    )),
    'footer-main-widget-content-align'                => 'cwp-text-left',
    'footer-main-widget-content-border-styling'       => json_encode(array(
        'border-style' => 'none',
        'border-color' => '',
        'border-width' => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true,
            )
        ),
    )),
    'footer-main-widget-content-typography-options'   => 'inherit',
    'footer-main-widget-content-typography'           => json_encode(array(
        'font-type'       => 'google',
        'system-font'     => 'verdana',
        'google-font'     => 'Lato',
        'custom-font'     => '',
        'font-weight'     => '400',
        'font-style'      => 'normal',
        'text-decoration' => 'none',
        'text-transform'  => 'none',
        'font-size'       => array(
            'desktop' => '14',
            'tablet'  => '14',
            'mobile'  => '14',
        ),
        'line-height'     => array(
            'desktop' => '24',
            'tablet'  => '24',
            'mobile'  => '24',
        ),
        'letter-spacing'  => array(
            'desktop' => '',
            'tablet'  => '',
            'mobile'  => '',
        ),
    )),
    /*footer Bottom*/
    'footer-bottom-height-option'                     => 'auto',
    'footer-bottom-height'                            => '',
    'footer-bottom-padding'                           => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '20',
            'right'       => '0',
            'bottom'      => '20',
            'left'        => '0',
            'cssbox_link' => true,
        ),
    )),
    'footer-bottom-margin'                            => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-bottom-bg-options'                        => 'none',
    'footer-bottom-background-options'                => json_encode(array(
        'background-color'      => '#101010',
        'background-image'      => '',
        'background-size'       => 'cover',
        'background-position'   => 'center',
        'background-repeat'     => 'no-repeat',
        'background-attachment' => 'scroll',
        'enable-overlay'           => false,
        'background-overlay-color' => '',
    )),
    'footer-bottom-border-styling'                    => json_encode(array(
        'border-style'     => 'none',
        'border-color'     => '',
        'box-shadow-color' => '',
        'border-width'     => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true,
            )
        ),
        'box-shadow-css'   => array(
            'desktop' => array(
                'x'           => '',
                'Y'           => '',
                'BLUR'        => '',
                'SPREAD'      => '',
                'cssbox_link' => true,
            )
        ),
        'border-radius'    => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true,
            )
        ),
    )),
    'footer-bottom-widget-title-align'                => 'cwp-text-left',
    'footer-bottom-widget-title-color'                => '#fff',
    'footer-bottom-widget-title-margin'               => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-bottom-widget-title-padding'              => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-bottom-widget-title-border-styling'       => json_encode(array(
        'border-style' => 'none',
        'border-color' => '',
        'border-width' => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true,
            )
        ),
    )),
    'footer-bottom-widget-title-typography-options'   => 'inherit',
    'footer-bottom-widget-title-typography'           => json_encode(array(
        'font-type'       => 'google',
        'system-font'     => 'verdana',
        'google-font'     => 'Lato',
        'custom-font'     => '',
        'font-weight'     => '400',
        'font-style'      => 'normal',
        'text-decoration' => 'none',
        'text-transform'  => 'none',
        'font-size'       => array(
            'desktop' => '14',
            'tablet'  => '14',
            'mobile'  => '14',
        ),
        'line-height'     => array(
            'desktop' => '24',
            'tablet'  => '24',
            'mobile'  => '24',
        ),
        'letter-spacing'  => array(
            'desktop' => '',
            'tablet'  => '',
            'mobile'  => '',
        ),
    )),
    'footer-bottom-widget-content-align'              => 'cwp-text-left',
    'footer-bottom-widget-content-border-styling'     => json_encode(array(
        'border-style' => 'none',
        'border-color' => '',
        'border-width' => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true,
            )
        ),
    )),
    'footer-bottom-widget-content-typography-options' => 'inherit',
    'footer-bottom-widget-content-typography'         => json_encode(array(
        'font-type'       => 'google',
        'system-font'     => 'verdana',
        'google-font'     => 'Lato',
        'custom-font'     => '',
        'font-weight'     => '400',
        'font-style'      => 'normal',
        'text-decoration' => 'none',
        'text-transform'  => 'none',
        'font-size'       => array(
            'desktop' => '14',
            'tablet'  => '14',
            'mobile'  => '14',
        ),
        'line-height'     => array(
            'desktop' => '24',
            'tablet'  => '24',
            'mobile'  => '24',
        ),
        'letter-spacing'  => array(
            'desktop' => '',
            'tablet'  => '',
            'mobile'  => '',
        ),
    )),

    /*footer menu*/
    'footer-menu-title'                               => 'Menu Title',
    'footer-menu-custom-menu'                         => '',
    'footer-menu-display-position'                    => '',
    'footer-menu-padding'                             => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-menu-margin'                              => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-menu-title-align'                         => json_encode(array(
        'desktop'   => '',
        'tablet'    => '',
        'mobile'    => 'cwp-text-left'
    )),
    'footer-menu-title-color'                         => '#fff',
    'footer-menu-title-margin'                        => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-menu-title-padding'                       => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-menu-title-border-styling'                => json_encode(array(
        'border-style' => 'none',
        'border-color' => '',
        'border-width' => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true,
            )
        ),
    )),
    'footer-menu-title-typography-options'            => 'inherit',
    'footer-menu-title-typography'                    => json_encode(array(
        'font-type'       => 'google',
        'system-font'     => 'verdana',
        'google-font'     => 'Lato',
        'custom-font'     => '',
        'font-weight'     => '400',
        'font-style'      => 'normal',
        'text-decoration' => 'none',
        'text-transform'  => 'none',
        'font-size'       => array(
            'desktop' => '14',
            'tablet'  => '14',
            'mobile'  => '14',
        ),
        'line-height'     => array(
            'desktop' => '24',
            'tablet'  => '24',
            'mobile'  => '24',
        ),
        'letter-spacing'  => array(
            'desktop' => '',
            'tablet'  => '',
            'mobile'  => '',
        ),
    )),
    'footer-menu-align'                               => json_encode(array(
            'desktop'   => '',
            'tablet'    => '',
            'mobile'    => 'cwp-flex-align-left'
    )),
    'footer-menu-item-padding'                        => json_encode(array(
        'desktop' => array(
            'top'         => '0',
            'right'       => '5',
            'bottom'      => '0',
            'left'        => '5',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-menu-item-margin'                         => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-menu-styling'                             => json_encode(array(
        'normal-text-color'    => '#fff',
        'normal-bg-color'      => '',
        'normal-border-style'  => '',
        'normal-border-color'  => '',
        'hover-text-color'     => '#81d742',
        'hover-bg-color'       => '',
        'hover-border-style'   => '',
        'hover-border-color'   => '',
        'active-text-color'    => '#81d742',
        'active-bg-color'      => '',
        'active-border-style'  => '',
        'active-border-color'  => '',
        'normal-border-width'  => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
        'normal-border-radius' => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
        'hover-border-width'   => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
        'hover-border-radius'  => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
        'active-border-width'  => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
        'active-border-radius' => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
    )),
    'footer-menu-typography-options'                  => 'inherit',
    'footer-menu-typography'                          => json_encode(array(
        'font-type'       => 'google',
        'system-font'     => 'verdana',
        'google-font'     => 'Lato',
        'custom-font'     => '',
        'font-weight'     => '400',
        'font-style'      => 'normal',
        'text-decoration' => 'none',
        'text-transform'  => 'none',
        'font-size'       => array(
            'desktop' => '14',
            'tablet'  => '14',
            'mobile'  => '14',
        ),
        'line-height'     => array(
            'desktop' => '24',
            'tablet'  => '24',
            'mobile'  => '24',
        ),
        'letter-spacing'  => array(
            'desktop' => '',
            'tablet'  => '',
            'mobile'  => '',
        ),
    )),

    /*footer social
    Icon fixed on get*/
    'footer_social'                                   => json_encode(array(
        array(
            'enabled'          => '1',
            'icon'             => 'fab fa-facebook-f',
            'link'             => 'www.facebook.com',
            'checkbox'         => true,
            'icon-color'       => '#1e73be',
            'icon-hover-color' => '#ffffff',
            'bg-color'         => '#ffffff',
            'bg-hover-color'   => '#1e73be',
        ),
        array(
            'enabled'          => '1',
            'icon'             => 'fab fa-twitter',
            'link'             => 'www.twitter.com',
            'checkbox'         => true,
            'icon-color'       => '#75CCFF',
            'icon-hover-color' => '#ffffff',
            'bg-color'         => '#ffffff',
            'bg-hover-color'   => '#75CCFF',
        ),
        array(
            'enabled'          => '1',
            'icon'             => 'fab fa-linkedin-in',
            'link'             => 'www.linkedin.com',
            'checkbox'         => true,
            'icon-color'       => '#0077B5',
            'icon-hover-color' => '#ffffff',
            'bg-color'         => '#ffffff',
            'bg-hover-color'   => '#0077B5',
        ),
    )),
    'footer-social-icon-align'                        => json_encode(array(
        'desktop'   => 'cwp-flex-align-right',
        'tablet'    => 'cwp-flex-align-right',
        'mobile'    => 'cwp-flex-align-left',
    )),
    'footer-social-icon-size'                         => json_encode(array(
        'desktop' => '',
        'tablet'  => '',
        'mobile'  => '14',
    )),
    'footer-social-icon-radius'                       => json_encode(array(
        'desktop' => '',
        'tablet'  => '',
        'mobile'  => '50',
    )),
    'footer-social-icon-width'                        => json_encode(array(
        'desktop' => '',
        'tablet'  => '',
        'mobile'  => '30',
    )),
    'footer-social-icon-height'                       => json_encode(array(
        'desktop' => '',
        'tablet'  => '',
        'mobile'  => '30',
    )),
    'footer-social-icon-line-height'                  => json_encode(array(
        'desktop' => '',
        'tablet'  => '',
        'mobile'  => '30',
    )),
    'individual-footer-social-icon-padding'           => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'individual-footer-social-icon-margin'            => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-social-icon-section-padding'              => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-social-icon-section-margin'               => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),

    /*copyright*/
    'footer-copyright-text-color'                     => '#fff',
    'footer-copyright-align'                          => json_encode(array(
        'desktop'   => '',
        'tablet'    => '',
        'mobile'    => 'cwp-text-left'
    )),
    'footer_copyright'                                => esc_html__('Copyright &copy; {current_year} {site_title} - Powered by {theme_author}', 'cosmoswp'),
    'footer-copyright-padding'                        => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-copyright-margin'                         => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-copyright-typography-options'             => 'inherit',
    'footer-copyright-typography'                     => json_encode(array(
        'font-type'       => 'google',
        'system-font'     => 'verdana',
        'google-font'     => 'Lato',
        'custom-font'     => '',
        'font-weight'     => '400',
        'font-style'      => 'normal',
        'text-decoration' => 'none',
        'text-transform'  => 'none',
        'font-size'       => array(
            'desktop' => '14',
            'tablet'  => '14',
            'mobile'  => '14',
        ),
        'line-height'     => array(
            'desktop' => '24',
            'tablet'  => '24',
            'mobile'  => '24',
        ),
        'letter-spacing'  => array(
            'desktop' => '',
            'tablet'  => '',
            'mobile'  => '',
        ),
    )),
    /*HTML*/
    'footer-html-container'                           => '',
    'footer-html-padding'                             => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-html-margin'                              => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-html-text-color'                          => '#fff',
    'footer-html-typography-options'                  => 'inherit',
    'footer-html-typography'                          => json_encode(array(
        'font-type'       => 'google',
        'system-font'     => 'verdana',
        'google-font'     => 'Lato',
        'custom-font'     => '',
        'font-style'      => 'normal',
        'text-decoration' => 'none',
        'text-transform'  => 'none',
    )),
    'footer-sidebar-1-widget-setting-option' => 'inherit',
    'footer-sidebar-2-widget-setting-option' => 'inherit',
    'footer-sidebar-3-widget-setting-option' => 'inherit',
    'footer-sidebar-4-widget-setting-option' => 'inherit',
    'footer-sidebar-5-widget-setting-option' => 'inherit',
    'footer-sidebar-6-widget-setting-option' => 'inherit',
    'footer-sidebar-7-widget-setting-option' => 'inherit',
    'footer-sidebar-8-widget-setting-option' => 'inherit',
    'footer-sidebar-1-content-align' => 'cwp-text-left',
    'footer-sidebar-1-margin' => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-sidebar-1-padding' => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-sidebar-2-content-align' => 'cwp-text-left',
    'footer-sidebar-2-margin' => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-sidebar-2-padding' => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-sidebar-3-content-align' => 'cwp-text-left',
    'footer-sidebar-3-margin' => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-sidebar-3-padding' => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-sidebar-4-content-align' => 'cwp-text-left',
    'footer-sidebar-4-margin' => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-sidebar-4-padding' => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-sidebar-5-content-align' => 'cwp-text-left',
    'footer-sidebar-5-margin' => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-sidebar-5-padding' => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-sidebar-6-content-align' => 'cwp-text-left',
    'footer-sidebar-6-margin' => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-sidebar-6-padding' => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-sidebar-7-content-align' => 'cwp-text-left',
    'footer-sidebar-7-margin' => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-sidebar-7-padding' => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-sidebar-8-content-align' => 'cwp-text-left',
    'footer-sidebar-8-margin' => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
    'footer-sidebar-8-padding' => json_encode(array(
        'desktop' => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '',
            'right'       => '',
            'bottom'      => '',
            'left'        => '',
            'cssbox_link' => true,
        ),
    )),
);