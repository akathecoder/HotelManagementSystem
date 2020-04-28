<?php
if (!defined('ABSPATH')) {
    exit;
}

/*
 * Header Options Defaults
 *
 */
$header_defaults = array(

    $this->builder_section_controller   => array(
        'desktop' => array(
            'top'    => '',
            'main'   => array(
                array(
                    'x'      => '0',
                    'y'      => '1',
                    'width'  => '3',
                    'height' => '1',
                    'id'     => 'title_tagline',
                ),
                array(
                    'x'      => '3',
                    'y'      => '1',
                    'width'  => '9',
                    'height' => '1',
                    'id'     => 'primary_menu',
                ),
            ),
            'bottom' => '',
        ),
        'mobile'  => array(
            'top'    => '',
            'main'   => array(
                '0' => array(
                    'x'      => '0',
                    'y'      => '1',
                    'width'  => '9',
                    'height' => '1',
                    'id'     => 'title_tagline',
                ),
                '1' => array(
                    'x'      => '9',
                    'y'      => '1',
                    'width'  => '3',
                    'height' => '1',
                    'id'     => 'menu_icon',
                ),
            ),
            'bottom' => '',
        ),
        'all'     => array(
            'sidebar' => array(
                '0' => array(
                    'x'      => '0',
                    'y'      => '1',
                    'width'  => '1',
                    'height' => '1',
                    'id'     => 'primary_menu',
                ),
            )
        )
    ),
    /*Header General*/
    'header-position-options'           => 'normal',
    'header-general-width'              => 'inherit',
    'vertical-header-position'          => 'cwp-vertical-header-left',
    'vertical-header-width'             => '280',
    'header-general-padding'            => json_encode(array(
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
    'header-general-margin'             => json_encode(array(
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
    'header-general-border-styling'     => json_encode(array(
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
    'header-general-background-options' => json_encode(array(
        'background-color'      => '#f5f5f5',
        'background-image'      => '',
        'background-size'       => 'cover',
        'background-position'   => 'center',
        'background-repeat'     => 'no-repeat',
        'background-attachment' => 'scroll',
    )),


    /*Header Top*/
    'top-header-padding'                => json_encode(array(
        'desktop' => array(
            'top'         => '10',
            'right'       => '0',
            'bottom'      => '10',
            'left'        => '0',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '10',
            'right'       => '0',
            'bottom'      => '10',
            'left'        => '0',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '10',
            'right'       => '0',
            'bottom'      => '10',
            'left'        => '0',
            'cssbox_link' => true,
        ),
    )),
    'top-header-margin'                 => json_encode(array(
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

    'header-top-height-option'          => 'auto',
    'top-header-height'                 => '0',
    'header-top-border-styling'         => json_encode(array(
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
    'header-top-background-options'     => json_encode(array(
        'background-color'      => '#444',
        'background-image'      => '',
        'background-size'       => 'cover',
        'background-position'   => 'center',
        'background-repeat'     => 'no-repeat',
        'background-attachment' => 'scroll',
    )),
    'header-top-bg-options'             => 'none',

    /*Header Main*/
    'header-main-height-option'         => 'auto',
    'header-main-enable-box-width'      => false,
    'header-main-height'                => '0',
    'header-main-padding'               => json_encode(array(
        'desktop' => array(
            'top'         => '10',
            'right'       => '0',
            'bottom'      => '10',
            'left'        => '0',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '10',
            'right'       => '0',
            'bottom'      => '10',
            'left'        => '0',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '10',
            'right'       => '0',
            'bottom'      => '10',
            'left'        => '0',
            'cssbox_link' => true,
        ),
    )),
    'header-main-margin'                => json_encode(array(
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
    'header-main-bg-options'            => 'none',
    'header-main-background-options'    => json_encode(array(
        'background-color'      => '#fff',
        'background-image'      => '',
        'background-size'       => 'cover',
        'background-position'   => 'center',
        'background-repeat'     => 'no-repeat',
        'background-attachment' => 'scroll',
    )),
    'header-main-border-styling'        => json_encode(array(
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

    /*Header bottom*/
    'header-bottom-margin'              => json_encode(array(
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
    'header-bottom-padding'             => json_encode(array(
        'desktop' => array(
            'top'         => '10',
            'right'       => '0',
            'bottom'      => '10',
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
    'header-bottom-height-option'       => 'auto',
    'header-bottom-height'              => '0',
    'header-bottom-border-styling'      => json_encode(array(
        'border-style'     => 'none',
        'border-color'     => '',
        'box-shadow-color' => '#1e73be',
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
    'header-bottom-bg-options'          => 'none',
    'header-bottom-background-options'  => json_encode(array(
        'background-color'      => '#f5f5f5',
        'background-image'      => '',
        'background-size'       => 'cover',
        'background-position'   => 'center',
        'background-repeat'     => 'no-repeat',
        'background-attachment' => 'scroll',
    )),

    /*Header social icon
    Icon fixed on get*/
    'header-social-icon-data'           => json_encode(array(
        array(
            'enabled'          => '1',
            'icon'             => 'fab fa-facebook-f',
            'link'             => esc_url('https://www.facebook.com/'),
            'checkbox'         => true,
            'icon-color'       => '#ffffff',
            'icon-hover-color' => '#ffffff',
            'bg-color'         => '#3b5998',
            'bg-hover-color'   => '#4b69a8',
        ),
        array(
            'enabled'          => '1',
            'icon'             => 'fab fa-twitter',
            'link'             => esc_url('https://www.twitter.com/'),
            'checkbox'         => true,
            'icon-color'       => '#ffffff',
            'icon-hover-color' => '#ffffff',
            'bg-color'         => '#55ACEE',
            'bg-hover-color'   => '#75CCFF',
        ),
        array(
            'enabled'          => '1',
            'icon'             => 'fab fa-linkedin-in',
            'link'             => esc_url('https://www.linkedin.com/'),
            'checkbox'         => true,
            'icon-color'       => '#ffffff',
            'icon-hover-color' => '#ffffff',
            'bg-color'         => '#0077B5',
            'bg-hover-color'   => '#1087C5',
        ),
    )),
    'header-social-icon-align'          => json_encode(array(
        'desktop'   => '',
        'tablet'    => '',
        'mobile'    => 'cwp-text-right'
    )),
    'single-header-social-icon-padding' => json_encode(array(
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
    'single-header-social-icon-margin'  => json_encode(array(
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
    'header-social-icon-padding'        => json_encode(array(
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
    'header-social-icon-margin'         => json_encode(array(
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
    'header-social-icon-radius'         => json_encode(array(
        'desktop' => '',
        'tablet'  => '',
        'mobile'  => '',
    )),
    'header-social-icon-width'          => json_encode(array(
        'desktop' => '30',
        'tablet'  => '30',
        'mobile'  => '30',
    )),
    'header-social-icon-height'         => json_encode(array(
        'desktop' => '30',
        'tablet'  => '30',
        'mobile'  => '30',
    )),
    'header-social-icon-line-height'    => json_encode(array(
        'desktop' => '30',
        'tablet'  => '30',
        'mobile'  => '30',
    )),
    'header-social-icon-size'           => json_encode(array(
        'desktop' => '14',
        'tablet'  => '14',
        'mobile'  => '14',
    )),

    /*search*/
    //drop down
    'dd-search-placeholder'             => esc_html__('Search', 'cosmoswp'),
    'dd-search-icon-align'              => 'cwp-flex-align-right',
    'dd-search-form-align'              => 'cwp-search-align-left',
    'drop-down-search-input-height'     => '45',
    'drop-down-search-padding'          => json_encode(array(
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
    'drop-down-search-margin'           => json_encode(array(
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
    'dropdown-search-icon-size'         => '18',
    'dropdown-search-icon-styling'      => json_encode(array(
        'normal-text-color'       => '#333',
        'normal-bg-color'         => '',
        'normal-border-style'     => 'none',
        'normal-border-color'     => '',
        'normal-box-shadow-color' => '',
        'hover-text-color'        => '#275cf6',
        'hover-bg-color'          => '',
        'hover-border-style'      => 'none',
        'hover-border-color'      => '',
        'hover-box-shadow-color'  => '',
        'normal-border-width'     => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
        'normal-box-shadow-css'   => array(
            'desktop' => array(
                'x'           => '',
                'Y'           => '',
                'BLUR'        => '',
                'SPREAD'      => '',
                'cssbox_link' => true
            )
        ),
        'normal-border-radius'    => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
        'hover-border-width'      => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
        'hover-box-shadow-css'    => array(
            'desktop' => array(
                'x'           => '',
                'Y'           => '',
                'BLUR'        => '',
                'SPREAD'      => '',
                'cssbox_link' => true
            )
        ),
        'hover-border-radius'     => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
    )),
    'dropdown-search-form-styling'      => json_encode(array(
        'normal-text-color'       => '#ddd',
        'normal-bg-color'         => '#fff',
        'normal-border-style'     => 'solid',
        'normal-border-color'     => '#ddd',
        'normal-box-shadow-color' => '',
        'hover-text-color'        => '#444',
        'hover-bg-color'          => '#fff',
        'hover-border-style'      => 'solid',
        'hover-border-color'      => '#cdcdcd',
        'hover-box-shadow-color'  => '',
        'normal-border-width'     => array(
            'desktop' => array(
                'top'         => '1',
                'right'       => '1',
                'bottom'      => '1',
                'left'        => '1',
                'cssbox_link' => true
            )
        ),
        'normal-box-shadow-css'   => array(
            'desktop' => array(
                'x'           => '',
                'Y'           => '',
                'BLUR'        => '',
                'SPREAD'      => '',
                'cssbox_link' => true
            )
        ),
        'normal-border-radius'    => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
        'hover-border-width'      => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
        'hover-box-shadow-css'    => array(
            'desktop' => array(
                'x'           => '',
                'Y'           => '',
                'BLUR'        => '',
                'SPREAD'      => '',
                'cssbox_link' => true
            )
        ),
        'hover-border-radius'     => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
    )),
    'dd-search-typography-options'      => 'inherit',
    'dd-search-typography'              => json_encode(array(
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

    'normal-search-placeholder'             => esc_html__('Search', 'cosmoswp'),
    'normal-search-padding'                 => json_encode(array(
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
    'normal-search-margin'                  => json_encode(array(
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
    'normal-search-icon-size'               => '18',
    'normal-search-icon-styling'            => json_encode(array(
        'normal-text-color'       => '#333',
        'normal-bg-color'         => '',
        'normal-border-style'     => 'none',
        'normal-border-color'     => '',
        'normal-box-shadow-color' => '',
        'hover-text-color'        => '#275cf6',
        'hover-bg-color'          => '',
        'hover-border-style'      => 'none',
        'hover-border-color'      => '',
        'hover-box-shadow-color'  => '',
        'normal-border-width'     => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
        'normal-box-shadow-css'   => array(
            'desktop' => array(
                'x'           => '',
                'Y'           => '',
                'BLUR'        => '',
                'SPREAD'      => '',
                'cssbox_link' => true
            )
        ),
        'normal-border-radius'    => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
        'hover-border-width'      => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
        'hover-box-shadow-css'    => array(
            'desktop' => array(
                'x'           => '',
                'Y'           => '',
                'BLUR'        => '',
                'SPREAD'      => '',
                'cssbox_link' => true
            )
        ),
        'hover-border-radius'     => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
    )),
    'normal-search-input-height'            => '45',
    'normal-search-form-styling'            => json_encode(array(
        'normal-text-color'       => '#333',
        'normal-bg-color'         => '',
        'normal-border-style'     => 'solid',
        'normal-border-color'     => '#ddd',
        'normal-box-shadow-color' => '',
        'hover-text-color'        => '#444',
        'hover-bg-color'          => '#fff',
        'hover-border-style'      => 'solid',
        'hover-border-color'      => '#999',
        'hover-box-shadow-color'  => '',

        'normal-border-width'   => array(
            'desktop' => array(
                'top'         => '1',
                'right'       => '1',
                'bottom'      => '1',
                'left'        => '1',
                'cssbox_link' => true
            )
        ),
        'normal-box-shadow-css' => array(
            'desktop' => array(
                'x'           => '',
                'Y'           => '',
                'BLUR'        => '',
                'SPREAD'      => '',
                'cssbox_link' => true
            )
        ),
        'normal-border-radius'  => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
        'hover-border-width'    => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
        'hover-box-shadow-css'  => array(
            'desktop' => array(
                'x'           => '',
                'Y'           => '',
                'BLUR'        => '',
                'SPREAD'      => '',
                'cssbox_link' => true
            )
        ),
        'hover-border-radius'   => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
    )),
    'normal-search-typography-options'      => 'inherit',
    'normal-search-typography'              => json_encode(array(
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

    /*sticky header options*/
    'sticky-header-options'               => 'disable',
    'sticky-header-animation-options'     => 'none',
    'sticky-header-trigger-height'        => '300',
    'sticky-header-bg-color'              => '',
    'sticky-header-include-top'           => 1,
    'sticky-header-include-main'          => 1,
    'sticky-header-include-bottom'        => 1,
    'sticky-header-mobile-enable'         => 1,
    'enable-sticky-header-color-options'  => false,
    'sticky-top-header-text-color'        => '',
    'sticky-top-header-link-color'        => '',
    'sticky-top-header-link-hover-color'  => '',
    'sticky-top-header-menu-color-options' => json_encode(array(
        'normal-text-color'   => '',
        'normal-bg-color'     => '',
        'normal-border-color' => '',
        'hover-text-color'    => '',
        'hover-bg-color'      => '',
        'hover-border-color'  => '',
    )),
    'sticky-main-header-text-color'        => '',
    'sticky-main-header-link-color'        => '',
    'sticky-main-header-link-hover-color'  => '',
    'sticky-main-header-menu-color-options' => json_encode(array(
        'normal-text-color'   => '',
        'normal-bg-color'     => '',
        'normal-border-color' => '',
        'hover-text-color'    => '',
        'hover-bg-color'      => '',
        'hover-border-color'  => '',
    )),
    'sticky-bottom-header-text-color'        => '',
    'sticky-bottom-header-link-color'        => '',
    'sticky-bottom-header-link-hover-color'  => '',
    'sticky-bottom-header-menu-color-options' => json_encode(array(
        'normal-text-color'   => '',
        'normal-bg-color'     => '',
        'normal-border-color' => '',
        'hover-text-color'    => '',
        'hover-bg-color'      => '',
        'hover-border-color'  => '',
    )),

    /*site identity*/
    'site-identity-sorting'                 => array('site-title'),
    'site-logo-max-width'                    => '',
    'site-logo-position'                    => json_encode(array(
        'desktop'   => '',
        'tablet'    => '',
        'mobile'    => 'cwp-top'
    )),
    'site-identity-align'                  => json_encode(array(
        'desktop'   => '',
        'tablet'    => '',
        'mobile'    => 'cwp-text-left'
    )),
    'site-identity-padding'                 => json_encode(array(
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
    'site-identity-margin'                  => json_encode(array(
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
    'site-identity-styling'                 => json_encode(array(
        'site-title-color'         => '#275cf6',
        'site-tagline-color'       => '#333',
        'hover-site-title-color'   => '#275cf6',
        'hover-site-tagline-color' => '#333',
    )),
    'site-identity-typography-options'      => 'custom',
    'site-title-typography'                 => json_encode(array(
        'font-type'       => 'google',
        'system-font'     => 'verdana',
        'google-font'     => 'Montserrat',
        'custom-font'     => '',
        'font-weight'     => '700',
        'font-style'      => 'normal',
        'text-decoration' => 'none',
        'text-transform'  => 'uppercase',
        'font-size'       => array(
            'desktop' => '20',
            'tablet'  => '20',
            'mobile'  => '20',
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
    'site-tagline-typography'               => json_encode(array(
        'font-type'       => 'google',
        'system-font'     => 'verdana',
        'google-font'     => 'Lato',
        'custom-font'     => '',
        'font-weight'     => '400',
        'font-style'      => 'normal',
        'text-decoration' => 'none',
        'text-transform'  => 'none',
        'font-size'       => array(
            'desktop' => '13',
            'tablet'  => '13',
            'mobile'  => '13',
        ),
        'line-height'     => array(
            'desktop' => '',
            'tablet'  => '',
            'mobile'  => '',
        ),
        'letter-spacing'  => array(
            'desktop' => '',
            'tablet'  => '',
            'mobile'  => '',
        ),
    )),

    /*primarny menu*/
    'primary_menu'                          => 'header-primary-menu',
    'primary-menu-custom-menu'              => '',
    'primary-menu-disable-sub-menu'         => false,
    'primary-menu-padding'                  => json_encode(array(
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
    'primary-menu-margin'                   => json_encode(array(
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
    'primary-menu-align'                    => 'cwp-flex-align-right',
    'primary-menu-item-padding'             => json_encode(array(
        'desktop' => array(
            'top'         => '10',
            'right'       => '10',
            'bottom'      => '10',
            'left'        => '10',
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
            'top'         => '10',
            'right'       => '10',
            'bottom'      => '10',
            'left'        => '10',
            'cssbox_link' => true,
        ),
    )),
    'primary-menu-item-margin'              => json_encode(array(
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
    'primary-menu-styling'                  => json_encode(array(
        'normal-text-color'    => '#333',
        'normal-bg-color'      => '',
        'normal-border-style'  => 'none',
        'normal-border-color'  => '',
        'hover-text-color'     => '#275cf6',
        'hover-bg-color'       => '',
        'hover-border-style'   => 'none',
        'hover-border-color'   => '',
        'active-text-color'    => '#275cf6',
        'active-bg-color'      => '',
        'active-border-style'  => 'none',
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
    'primary-menu-typography-options'       => 'inherit',
    'primary-menu-typography'               => json_encode(array(
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
    'primary-menu-sub-menu-item-padding'              => json_encode(array(
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
    'primary-menu-sub-menu-item-margin'              => json_encode(array(
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
    'primary-menu-submenu-display-options'       => 'cwp-submenu-onhover',
    'primary-menu-submenu-bg-color'         => '#fff',
    'primary-menu-submenu-styling'          => json_encode(array(
        'normal-text-color'    => '#333',
        'normal-bg-color'      => '',
        'normal-border-style'  => '',
        'normal-border-color'  => '',
        'hover-text-color'     => '#275cf6',
        'hover-bg-color'       => '',
        'hover-border-style'   => '',
        'hover-border-color'   => '',
        'active-text-color'    => '#275cf6',
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
    'primary-menu-submenu-icon-indicator'   => 'fas fa-angle-down',/*fixed on fronted*/
    'primary-menu-submenu-typography-options'    => 'inherit',
    'primary-menu-submenu-typography'       => json_encode(array(
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

    /*secondary menu*/
    'secondary-menu-custom-menu'            => '',
    'secondary-menu-disable-sub-menu'       => true,
    'secondary-menu-padding'                => json_encode(array(
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
    'secondary-menu-margin'                 => json_encode(array(
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
    'secondary-menu-align'                  => 'cwp-flex-align-left',
    'secondary-menu-item-padding'           => json_encode(array(
        'desktop' => array(
            'top'         => '10',
            'right'       => '10',
            'bottom'      => '10',
            'left'        => '10',
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
    'secondary-menu-item-margin'            => json_encode(array(
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
    'secondary-menu-styling'                => json_encode(array(
        'normal-text-color'    => '#333',
        'normal-bg-color'      => '',
        'normal-border-style'  => 'none',
        'normal-border-color'  => '',
        'hover-text-color'     => '#275cf6',
        'hover-bg-color'       => '',
        'hover-border-style'   => 'none',
        'hover-border-color'   => '',
        'active-text-color'    => '#275cf6',
        'active-bg-color'      => '',
        'active-border-style'  => 'none',
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
    'secondary-menu-typography-options'     => 'inherit',
    'secondary-menu-typography'             => json_encode(array(
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
    'secondary-menu-sub-menu-item-padding'   => json_encode(array(
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
    'secondary-menu-sub-menu-item-margin'    => json_encode(array(
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
    'secondary-menu-submenu-display-options' => 'cwp-submenu-onhover',
    'secondary-menu-submenu-icon-indicator' => 'fas fa-angle-down',/*done in frontend*/
    'secondary-menu-submenu-bg-color'       => '#000',
    'secondary-menu-submenu-styling'        => json_encode(array(
        'normal-text-color'    => '#fff',
        'normal-bg-color'      => '',
        'normal-border-style'  => '',
        'normal-border-color'  => '',
        'hover-text-color'     => '#275cf6',
        'hover-bg-color'       => '',
        'hover-border-style'   => '',
        'hover-border-color'   => '',
        'active-text-color'    => '#275cf6',
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
    'secondary-menu-submenu-typography-options'  => 'inherit',
    'secondary-menu-submenu-typography'     => json_encode(array(
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

    /*Menu Icon*/
    'menu-icon-sidebar-margin'              => json_encode(array(
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
    'menu-icon-sidebar-padding'             => json_encode(array(
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
    'menu-icon-display-menu'                => 'cwp-left-menu-push',
    'menu-icon-sidebar-color-options'       => json_encode(array(
        'background-color' => '#444',
        'text-color'       => '#fff',
        'title-color'      => '#fff',
        'link-color'       => '#fff',
        'link-hover-color' => '#275cf6',
    )),
    'menu-icon-open-icon-options'                     => 'icon',
    'menu-icon-close-icon-options'          => 'icon',
    'menu-open-text'                        => esc_html__('Menu Open', 'cosmoswp'),
    'menu-close-text'                       => esc_html__('Menu Close', 'cosmoswp'),
    'menu-icon-open-icon-position'                    => 'before',
    'menu-icon-close-icon-position'                    => 'before',
    'menu-open-icon'                        => 'fas fa-bars',/*done in frontend*/
    'menu-close-icon'                       => 'fas fa-times',/*done in frontend*/
    'menu-open-icon-size-responsive'             => json_encode(array(
        'desktop' => '18',
        'tablet'  => '18',
        'mobile'  => '18',
    )),
    'menu-icon-close-icon-size-responsive'             => json_encode(array(
        'desktop' => '18',
        'tablet'  => '18',
        'mobile'  => '18',
    )),
    'menu-open-icon-padding'                     => json_encode(array(
        'desktop' => array(
            'top'         => '10',
            'right'       => '10',
            'bottom'      => '10',
            'left'        => '10',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '10',
            'right'       => '10',
            'bottom'      => '10',
            'left'        => '10',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '10',
            'right'       => '10',
            'bottom'      => '10',
            'left'        => '10',
            'cssbox_link' => true,
        ),
    )),
    'menu-icon-close-padding'                     => json_encode(array(
        'desktop' => array(
            'top'         => '10',
            'right'       => '10',
            'bottom'      => '10',
            'left'        => '10',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '10',
            'right'       => '10',
            'bottom'      => '10',
            'left'        => '10',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '10',
            'right'       => '10',
            'bottom'      => '10',
            'left'        => '10',
            'cssbox_link' => true,
        ),
    )),
    'menu-open-icon-margin'                      => json_encode(array(
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
    'menu-icon-close-margin'                      => json_encode(array(
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
    'menu-open-icon-align'                       => 'cwp-flex-align-right',
    'menu-icon-close-icon-align'            => 'cwp-flex-align-right',
    'menu-open-icon-typography-options'          => 'inherit',
    'menu-icon-close-text-typography-options'          => 'inherit',
    'menu-open-icon-typography'                  => json_encode(array(
        'font-type'       => 'google',
        'system-font'     => 'verdana',
        'google-font'     => 'Lato',
        'custom-font'     => '',
        'font-weight'     => '500',
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
    'menu-icon-close-text-typography'                  => json_encode(array(
        'font-type'       => 'google',
        'system-font'     => 'verdana',
        'google-font'     => 'Lato',
        'custom-font'     => '',
        'font-weight'     => '500',
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
    'menu-open-icon-styling'                     => json_encode(array(
        'normal-text-color'       => '#333',
        'normal-bg-color'         => '',
        'normal-border-style'     => '',
        'normal-border-color'     => '',
        'normal-box-shadow-color' => '',
        'hover-text-color'        => '#275cf6',
        'hover-bg-color'          => '',
        'hover-border-style'      => '',
        'hover-border-color'      => '',
        'hover-box-shadow-color'  => '',
        'normal-border-width'     => array(
            'desktop' => array(
                'top'         => '1',
                'right'       => '1',
                'bottom'      => '1',
                'left'        => '1',
                'cssbox_link' => true
            )
        ),
        'normal-box-shadow-css'   => array(
            'desktop' => array(
                'x'           => '',
                'Y'           => '',
                'BLUR'        => '',
                'SPREAD'      => '',
                'cssbox_link' => true
            )
        ),
        'normal-border-radius'    => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
        'hover-border-width'      => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
        'hover-box-shadow-css'    => array(
            'desktop' => array(
                'x'           => '',
                'Y'           => '',
                'BLUR'        => '',
                'SPREAD'      => '',
                'cssbox_link' => true
            )
        ),
        'hover-border-radius'     => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
    )),
    'menu-icon-close-icon-styling'                     => json_encode(array(
        'normal-text-color'       => '#333',
        'normal-bg-color'         => '',
        'normal-border-style'     => '',
        'normal-border-color'     => '',
        'normal-box-shadow-color' => '',
        'hover-text-color'        => '#275cf6',
        'hover-bg-color'          => '',
        'hover-border-style'      => '',
        'hover-border-color'      => '',
        'hover-box-shadow-color'  => '',
        'normal-border-width'     => array(
            'desktop' => array(
                'top'         => '1',
                'right'       => '1',
                'bottom'      => '1',
                'left'        => '1',
                'cssbox_link' => true
            )
        ),
        'normal-box-shadow-css'   => array(
            'desktop' => array(
                'x'           => '',
                'Y'           => '',
                'BLUR'        => '',
                'SPREAD'      => '',
                'cssbox_link' => true
            )
        ),
        'normal-border-radius'    => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
        'hover-border-width'      => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
        'hover-box-shadow-css'    => array(
            'desktop' => array(
                'x'           => '',
                'Y'           => '',
                'BLUR'        => '',
                'SPREAD'      => '',
                'cssbox_link' => true
            )
        ),
        'hover-border-radius'     => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
    )),
    'menu-icon-sidebar-submenu-bg-color'    => 'rgba(0,0,0,0.2)',
    'menu-icon-sidebar-submenu-styling'     => json_encode(array(
        'normal-text-color'    => '#fff',
        'normal-bg-color'      => '',
        'normal-border-style'  => '',
        'normal-border-color'  => '',
        'hover-text-color'     => '#275cf6',
        'hover-bg-color'       => '',
        'hover-border-style'   => '',
        'hover-border-color'   => '',
        'active-text-color'    => '#275cf6',
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


    /*button one*/
    'button-one-text'                       => esc_html__('Button One', 'cosmoswp'),
    'button-one-class-name'                 => '',
    'button-one-enable-icon'                => true,
    'button-one-align'                      => json_encode(array(
        'desktop'   => '',
        'tablet'    => '',
        'mobile'    => 'cwp-flex-align-left'
    )),
    'button-one-icon'                       => 'fas fa-bars',/*fixed on frontend*/
    'button-one-icon-position'              => 'before',
    'button-one-url'                        => '#',
    'button-one-open-link-new-tab'          => '1',
    'button-one-padding'                    => json_encode(array(
        'desktop' => array(
            'top'         => '6',
            'right'       => '12',
            'bottom'      => '6',
            'left'        => '12',
            'cssbox_link' => true,
        ),
        'tablet'  => array(
            'top'         => '6',
            'right'       => '12',
            'bottom'      => '6',
            'left'        => '12',
            'cssbox_link' => true,
        ),
        'mobile'  => array(
            'top'         => '6',
            'right'       => '12',
            'bottom'      => '6',
            'left'        => '12',
            'cssbox_link' => true,
        ),
    )),
    'button-one-margin'                     => json_encode(array(
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
    'button-one-styling'                    => json_encode(array(
        'normal-text-color'       => '#333',
        'normal-bg-color'         => '#fff',
        'normal-border-style'     => 'solid',
        'normal-border-color'     => '#ddd',
        'normal-border-width'     => array(
            'desktop' => array(
                'top'         => '1',
                'right'       => '1',
                'bottom'      => '1',
                'left'        => '1',
                'cssbox_link' => true
            )
        ),
        'normal-border-radius'    => array(
            'desktop' => array(
                'top'         => '3',
                'right'       => '3',
                'bottom'      => '3',
                'left'        => '3',
                'cssbox_link' => true
            )
        ),
        'normal-box-shadow-color' => '#333',
        'normal-box-shadow-css'   => array(
            'desktop' => array(
                'x'           => '',
                'Y'           => '',
                'BLUR'        => '',
                'SPREAD'      => '',
                'cssbox_link' => true
            )
        ),
        'hover-text-color'        => '#fff',
        'hover-bg-color'          => '#275cf6',
        'hover-border-style'      => 'solid',
        'hover-border-color'      => '#275cf6',
        'hover-border-width'      => array(
            'desktop' => array(
                'top'         => '1',
                'right'       => '1',
                'bottom'      => '1',
                'left'        => '1',
                'cssbox_link' => true
            )
        ),
        'hover-border-radius'     => array(
            'desktop' => array(
                'top'         => '',
                'right'       => '',
                'bottom'      => '',
                'left'        => '',
                'cssbox_link' => true
            )
        ),
        'hover-box-shadow-color'  => '#275cf6',
        'hover-box-shadow-css'    => array(
            'desktop' => array(
                'x'           => '',
                'Y'           => '',
                'BLUR'        => '',
                'SPREAD'      => '',
                'cssbox_link' => true
            )
        ),
    )),
    'button-one-typography-options'         => 'inherit',
    'button-one-typography'                 => json_encode(array(
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

    /*contact Information
    Fixed icon on frontend*/
    'contact-information-data'              => json_encode(array(
        array(
            'enabled'   => '1',
            'icon'      => 'fas fa-phone',
            'title'     => esc_html__('Phone Number', 'cosmoswp'),
            'text'      => '+198712345',
            'link-type' => 'tel',
            'link'      => 'https://usaphone.com/',
            'checkbox'  => true,
        ),
        array(
            'enabled'   => '1',
            'icon'      => 'far fa-envelope',
            'title'     => esc_html__('Email', 'cosmoswp'),
            'text'      => 'test@gmail.com',
            'link-type' => 'email',
            'link'      => 'www.gmail.com',
            'checkbox'  => true,
        ),
    )),
    'contact-information-align' =>json_encode(array(
        'desktop'   => '',
        'tablet'    => '',
        'mobile'    => 'cwp-flex-align-left'
    )),
    'contact-info-padding'                  => json_encode(array(
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
    'contact-info-margin'                   => json_encode(array(
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
    'contact-info-icon-size'                => json_encode(array(
        'desktop' => '14',
        'tablet'  => '14',
        'mobile'  => '14',
    )),
    'contact-info-icon-color'               => '#275cf6',

    'contact-info-title-color'                 => '#333',
    'contact-info-title-typography-options'    => 'custom',
    'contact-info-title-typography'            => json_encode(array(
        'font-type'       => 'google',
        'system-font'     => 'verdana',
        'google-font'     => 'Lora',
        'custom-font'     => '',
        'font-weight'     => '400',
        'font-style'      => 'normal',
        'text-decoration' => 'none',
        'text-transform'  => 'none',
        'font-size'       => array(
            'desktop' => '16',
            'tablet'  => '14',
            'mobile'  => '14',
        ),
        'line-height'     => array(
            'desktop' => '24',
            'tablet'  => '24',
            'mobile'  => '24',
        ),
        'letter-spacing'  => array(
            'desktop' => '1',
            'tablet'  => '1',
            'mobile'  => '1',
        ),
    )),
    'contact-info-subtitle-color'              => '#9e9e9e',
    'contact-info-subtitle-typography-options' => 'custom',
    'contact-info-subtitle-typography'         => json_encode(array(
        'font-type'       => 'google',
        'system-font'     => 'verdana',
        'google-font'     => 'Montserrat',
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
            'desktop' => '12',
            'tablet'  => '12',
            'mobile'  => '12',
        ),
        'letter-spacing'  => array(
            'desktop' => '',
            'tablet'  => '',
            'mobile'  => '',
        ),
    )),
    'contact-info-item-padding'                => json_encode(array(
        'desktop' => array(
            'top'         => '0',
            'right'       => '25',
            'bottom'      => '0',
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
    'contact-info-item-margin'                 => json_encode(array(
        'desktop' => array(
            'top'         => '0',
            'right'       => '25',
            'bottom'      => '0',
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
    'contact-info-title-border-styling'        => json_encode(array(
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

    /*HTML*/
    'html-container'                           => '',
    'header-html-text-color'                   => '#fff',
    'html-padding'                             => json_encode(array(
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
    'html-margin'                              => json_encode(array(
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
    'html-typography-options'                  => 'inherit',
    'html-typography'                          => json_encode(array(
        'font-type'       => 'google',
        'system-font'     => 'verdana',
        'google-font'     => 'Lato',
        'custom-font'     => '',
        'font-style'      => 'normal',
        'text-decoration' => 'none',
        'text-transform'  => 'none',
    )),

);