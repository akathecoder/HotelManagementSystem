<?php
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-typo-config.php';
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-button-config.php';
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-nav-menu-config.php';
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-search-form-config.php';
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-office-info-config.php';
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-social-icons-config.php';
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-offcanvas-config.php';
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-branding-config.php';
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-custom-html-config.php';
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-header-config.php';
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-breadcrumb-config.php';
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-wrapper-config.php';
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-content-config.php';
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-post-config.php';
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-readmore-config.php';
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-pagination-config.php';
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-sidebar-config.php';
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-footer-nav-menu-config.php';
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-copyright-config.php';
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-footer-social-icons-config.php';
require_once YATRI_THEME_DIR . '/core/customizer/config/class-yatri-section-footer-office-info-config.php';

function yatri_customizer_modal_config($field_id = '', $return_all = false)
{
    // Top Header Configurations
    $fields['main_layout_boxed_styling'] = array(
        'tabs' => array(
            'main_layout_boxed_color' => esc_html__('Colors', 'yatri'),
            'main_layout_boxed_spacing' => esc_html__('Spacing', 'yatri'),
        ),
        'main_layout_boxed_color_fields' => array(
            array(
                'name' => 'main_layout_boxed_styling_inside_background_color',
                'type' => 'color',
                'label' => esc_html__('Inside Background Color', 'yatri'),
                'description' => '',
                'default' => '#c1c1c1',
                'additional_css' => 'body.yatri-global-layout-boxed .top-header, 
                    body.yatri-global-layout-boxed .yatri-mid-header,
                    body.yatri-global-layout-boxed .bottom-header,
                    body.yatri-global-layout-boxed .site-footer .top-footer ,
                    body.yatri-global-layout-boxed .site-footer .bottom-footer,
                    body.yatri-global-layout-boxed section.wrapper.site-content,
                    body.yatri-global-layout-boxed .wrap-detail-page, 
                    body.yatri-global-layout-boxed .yatra-page-wrapper,
                    body.yatri-global-layout-boxed .section-breadcrumb-wrap
                    {background-color:transparent;} ',
                'selector' => 'body.yatri-global-layout-boxed .site',
                'css_property' => 'background-color:{{value}};'
            ),
            array(
                'name' => 'main_layout_boxed_styling_inside_background_image',
                'type' => 'image',
                'label' => esc_html__('Inside Background Image', 'yatri'),
                'description' => '',
                'additional_css' => 'body.yatri-global-layout-boxed .top-header, 
                    body.yatri-global-layout-boxed .yatri-mid-header,
                    body.yatri-global-layout-boxed .bottom-header,
                    body.yatri-global-layout-boxed .site-footer .top-footer ,
                    body.yatri-global-layout-boxed .site-footer .bottom-footer,
                    body.yatri-global-layout-boxed section.wrapper.site-content,
                    body.yatri-global-layout-boxed .wrap-detail-page, 
                    body.yatri-global-layout-boxed .yatra-page-wrapper,
                    body.yatri-global-layout-boxed .section-breadcrumb-wrap
                    {background-color:transparent;} ',
                'selector' => 'body.yatri-global-layout-boxed .site',
                'css_property' => 'background-image:{{value}}'
            ),
            array(
                'name' => 'main_layout_boxed_styling_outside_background_color',
                'type' => 'color',
                'label' => esc_html__('Outside Background Color', 'yatri'),
                'description' => '',
                'default' => '#c1c1c1',
                'selector' => 'body.yatri-global-layout-boxed',
                'css_property' => 'background-color:{{value}};'
            ),
            array(
                'name' => 'main_layout_boxed_styling_outside_background_image',
                'type' => 'image',
                'label' => esc_html__('Outside Background Image', 'yatri'),
                'description' => '',
                'selector' => 'body.yatri-global-layout-boxed',
                'css_property' => 'background-image:{{value}};'
            ),
        ),
        'main_layout_boxed_spacing_fields' =>
            array(
                array(
                    'name' => 'main_layout_boxed_styling_container_padding',
                    'type' => 'padding',
                    'device_settings' => true,
                    'devices' => array('desktop', 'tablet', 'mobile'),
                    'label' => esc_html__('Container Padding', 'yatri'),
                    'description' => '',
                    'default' => array(

                        'top' => array(
                            'value' => '',
                            'unit' => 'px'
                        ),
                        'right' => array(
                            'value' => '',
                            'unit' => 'px'
                        ),
                        'bottom' => array(
                            'value' => '',
                            'unit' => 'px'
                        ),
                        'left' => array(
                            'value' => '',
                            'unit' => 'px'
                        )

                    ),
                    'additional_css' => array(
                        'desktop' => 'body.yatri-global-layout-boxed.yatri_full_width_100_layout .site-content .yat-container{padding:0;}',
                        'mobile' => 'body.yatri-global-layout-boxed.yatri_full_width_100_layout .site-content .yat-container{padding:0;}',
                        'tablet' => 'body.yatri-global-layout-boxed.yatri_full_width_100_layout .site-content .yat-container{padding:0;}',
                    ),

                    'selector' => 'body.yatri-global-layout-boxed .yat-container',
                ),
                array(
                    'name' => 'main_layout_boxed_styling_container_margin',
                    'type' => 'margin',
                    'label' => esc_html__('Layout Margin', 'yatri'),
                    'device_settings' => true,
                    'devices' => array('desktop', 'tablet', 'mobile'),
                    'description' => '',
                    'disabled_fields' => array(
                        'right', 'left'
                    ),
                    'default' => array(

                        'top' => array(
                            'value' => '',
                            'unit' => 'px'
                        ),
                        'right' => array(
                            'value' => '',
                            'unit' => 'px'
                        ),
                        'bottom' => array(
                            'value' => '',
                            'unit' => 'px'
                        ),
                        'left' => array(
                            'value' => '',
                            'unit' => 'px'
                        )

                    ),
                    'selector' => 'body.yatri-global-layout-boxed .site',
                ),

                array(
                    'name' => 'main_layout_boxed_spacing_fields_border_heading',
                    'type' => 'heading',
                    'label' => esc_html__('Layout Border', 'yatri'),
                ),
                array(
                    'name' => 'main_layout_boxed_spacing_border',
                    'type' => 'border',
                    'label' => '',
                    'device_settings' => true,
                    'devices' => array('desktop'),
                    'default' => array(
                        'left' => 0,
                        'right' => 0,
                        'top' => 0,
                        'bottom' => 0
                    ),
                    'selector' => 'body.yatri-global-layout-boxed .site',

                )
            ),


    );

    $fields['main_layout_full_width_styling'] = array(
        'tabs' => array(
            'main_layout_full_width_color' => esc_html__('Colors', 'yatri'),
            'main_layout_full_width_spacing' => esc_html__('Spacing', 'yatri'),
        ),
        'main_layout_full_width_color_fields' => array(
            array(
                'name' => 'main_layout_full_width_styling_background_color',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'yatri'),
                'description' => '',
                'default' => '#c1c1c1',
                'additional_css' => 'body.yatri-global-layout-full_width .top-header, 
                    body.yatri-global-layout-full_width .yatri-mid-header,
                    body.yatri-global-layout-full_width .bottom-header,
                    body.yatri-global-layout-full_width .site-footer .top-footer ,
                    body.yatri-global-layout-full_width .site-footer .bottom-footer, 
                    body.yatri-global-layout-full_width .site,
                    body.yatri-global-layout-full_width section.wrapper.site-content,
                    body.yatri-global-layout-full_width .wrap-detail-page, 
                    body.yatri-global-layout-full_width .yatra-page-wrapper,
                    body.yatri-global-layout-full_width .section-breadcrumb-wrap
                    {background-color:transparent;} ',
                'selector' => 'body.yatri-global-layout-full_width',
                'css_property' => 'background-color:{{value}};'
            ),
            array(
                'name' => 'main_layout_full_width_styling_background_image',
                'type' => 'image',
                'label' => esc_html__('Background Image', 'yatri'),
                'description' => '',
                'additional_css' => 'body.yatri-global-layout-full_width .top-header, 
                    body.yatri-global-layout-full_width .yatri-mid-header,
                    body.yatri-global-layout-full_width .bottom-header,
                    body.yatri-global-layout-full_width .site-footer .top-footer ,
                    body.yatri-global-layout-full_width .site-footer .bottom-footer, 
                    body.yatri-global-layout-full_width .site,
                    body.yatri-global-layout-full_width section.wrapper.site-content,
                    body.yatri-global-layout-full_width .wrap-detail-page, 
                    body.yatri-global-layout-full_width .yatra-page-wrapper,
                    body.yatri-global-layout-full_width .section-breadcrumb-wrap
                    {background-color:transparent;} ',
                'selector' => 'body.yatri-global-layout-full_width',
                'css_property' => 'background-image:{{value}};'
            ),
        ),
        'main_layout_full_width_spacing_fields' =>
            array(
                array(
                    'name' => 'main_layout_full_width_styling_container_padding',
                    'type' => 'padding',
                    'device_settings' => true,
                    'devices' => array('desktop', 'tablet', 'mobile'),
                    'label' => esc_html__('Container Padding', 'yatri'),
                    'description' => '',
                    'default' => array(

                        'top' => array(
                            'value' => '',
                            'unit' => 'px'
                        ),
                        'right' => array(
                            'value' => '',
                            'unit' => 'px'
                        ),
                        'bottom' => array(
                            'value' => '',
                            'unit' => 'px'
                        ),
                        'left' => array(
                            'value' => '',
                            'unit' => 'px'
                        )

                    ),
                    'additional_css' => array(
                        'desktop' => 'body.yatri-global-layout-full_width.yatri_full_width_100_layout .site-content .yat-container{padding:0;}',
                        'mobile' => 'body.yatri-global-layout-full_width.yatri_full_width_100_layout .site-content .yat-container{padding:0;}',
                        'tablet' => 'body.yatri-global-layout-full_width.yatri_full_width_100_layout .site-content .yat-container{padding:0;}',
                    ),
                    'selector' => 'body.yatri-global-layout-full_width .yat-container',
                ),
            ),


    );


    $fields['body_and_paragraph_typography'] = Yatri_Section_Typo_Config::get_typography('body_and_paragraph_typography', 'body');
    $fields['h1_typography'] = Yatri_Section_Typo_Config::get_typography('h1_typography', 'h1');
    $fields['h2_typography'] = Yatri_Section_Typo_Config::get_typography('h2_typography', 'h2');
    $fields['h3_typography'] = Yatri_Section_Typo_Config::get_typography('h3_typography', 'h3');
    $fields['h4_typography'] = Yatri_Section_Typo_Config::get_typography('h4_typography', 'h4');
    $fields['h5_typography'] = Yatri_Section_Typo_Config::get_typography('h5_typography', 'h5');
    $fields['h6_typography'] = Yatri_Section_Typo_Config::get_typography('h6_typography', 'h6');


    // Button Design
    $fields['yatri_button_style_design'] = array(
        'tabs' => array(
            'yatri_button_style_design_color' => esc_html__('Colors', 'yatri'),
            'yatri_button_style_design_spacing' => esc_html__('Spacing', 'yatri'),
        ),
        'yatri_button_style_design_color_fields' => array(
            array(
                'name' => 'yatri_button_style_design_text_color',
                'type' => 'color',
                'label' => esc_html__('Text Color', 'yatri'),
                'description' => '',
                'default' => '#c1c1c1',
                'selector' => 'button:not(.yatri-offcanvas-close-button):not(.yatri-submenu-toggle):not(.yatri-mobile-navigation-close):not(.yatri-responsive-toggle-menu):not(.search-button):not(.customize-partial-edit-shortcut-button):not(.search-main):not(.yatri-toggle-wrap),.button, input[type="submit"], .yatri-button, .yatri-button span ,.yatri-button .yatri-button-icon',
                'css_property' => 'color:{{value}};'
            ),
            array(
                'name' => 'yatri_button_style_design_hover_text_color',
                'type' => 'color',
                'label' => esc_html__('Hover Text Color', 'yatri'),
                'description' => '',
                'default' => '#c1c1c1',
                'selector' => 'button:not(.yatri-offcanvas-close-button):not(.yatri-submenu-toggle):not(.yatri-mobile-navigation-close):not(.yatri-responsive-toggle-menu):not(.search-button):not(.customize-partial-edit-shortcut-button):not(.search-main):not(.yatri-toggle-wrap):hover,.button:hover, input[type="submit"]:hover, .yatri-button:hover, .yatri-button:hover span, .yatri-button:hover .yatri-button-icon',
                'css_property' => 'color:{{value}};'
            ),
            array(
                'name' => 'yatri_button_style_design_background_color',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'yatri'),
                'description' => '',
                'default' => '#c1c1c1',
                'selector' => 'button:not(.yatri-offcanvas-close-button):not(.yatri-submenu-toggle):not(.yatri-mobile-navigation-close):not(.yatri-responsive-toggle-menu):not(.search-button):not(.customize-partial-edit-shortcut-button):not(.search-main):not(.yatri-toggle-wrap),.button, input[type="submit"], .yatri-button',
                'css_property' => 'background-color:{{value}};'
            ),
            array(
                'name' => 'yatri_button_style_design_hover_background_color',
                'type' => 'color',
                'label' => esc_html__('Hover Background Color', 'yatri'),
                'description' => '',
                'default' => '#c1c1c1',
                'selector' => 'button:not(.yatri-offcanvas-close-button):not(.yatri-submenu-toggle):not(.yatri-mobile-navigation-close):not(.yatri-responsive-toggle-menu):not(.search-button):not(.customize-partial-edit-shortcut-button):not(.search-main):not(.yatri-toggle-wrap):hover,.button:hover, input[type="submit"]:hover, .yatri-button:hover',
                'css_property' => 'background-color:{{value}};'
            ),
        ),
        'yatri_button_style_design_spacing_fields' =>
            array(
                array(
                    'name' => 'yatri_button_style_design_padding',
                    'type' => 'padding',
                    'device_settings' => true,
                    'devices' => array('desktop', 'tablet', 'mobile'),
                    'label' => esc_html__('Padding', 'yatri'),
                    'description' => '',
                    'default' => array(

                        'top' => array(
                            'value' => '',
                            'unit' => 'px'
                        ),
                        'right' => array(
                            'value' => '',
                            'unit' => 'px'
                        ),
                        'bottom' => array(
                            'value' => '',
                            'unit' => 'px'
                        ),
                        'left' => array(
                            'value' => '',
                            'unit' => 'px'
                        )

                    ),
                    'selector' => 'button:not(.yatri-offcanvas-close-button):not(.yatri-submenu-toggle):not(.yatri-mobile-navigation-close):not(.yatri-responsive-toggle-menu):not(.search-button):not(.customize-partial-edit-shortcut-button):not(.search-main):not(.yatri-toggle-wrap),.button, input[type="submit"], .yatri-button,.top-header .yatri-section-button .yatri-button',

                ),

                array(
                    'name' => 'yatri_button_style_design_border_heading',
                    'type' => 'heading',
                    'label' => esc_html__('Border', 'yatri'),
                ),
                array(
                    'name' => 'yatri_button_style_design_border',
                    'type' => 'border',
                    'label' => '',
                    'default' => array(
                        'left' => 0,
                        'right' => 0,
                        'top' => 0,
                        'bottom' => 0
                    ),
                    'selector' => 'button:not(.yatri-offcanvas-close-button):not(.yatri-submenu-toggle):not(.yatri-mobile-navigation-close):not(.yatri-responsive-toggle-menu):not(.search-button):not(.customize-partial-edit-shortcut-button):not(.search-main):not(.yatri-toggle-wrap),.button, input[type="submit"], .yatri-button, button:not(.yatri-offcanvas-close-button):not(.yatri-submenu-toggle):not(.yatri-mobile-navigation-close):not(.yatri-responsive-toggle-menu):not(.search-button):not(.customize-partial-edit-shortcut-button):not(.search-main):not(.yatri-toggle-wrap):hover,.button:hover, input[type="submit"]:hover, .yatri-button:hover,.top-header .yatri-section-button .yatri-button',
                )
            ),


    );

    $fields['yatri_form_style_design'] = array(
        'tabs' => array(
            'yatri_form_style_design_color' => esc_html__('Colors', 'yatri'),
            'yatri_form_style_design_spacing' => esc_html__('Spacing', 'yatri'),
        ),
        'yatri_form_style_design_color_fields' => array(
            array(
                'name' => 'yatri_form_style_design_label_color',
                'type' => 'color',
                'label' => esc_html__('Label Color', 'yatri'),
                'description' => '',
                'default' => '#c1c1c1',
                'selector' => 'label,.comments-area .comment-respond label',
                'css_property' => 'color:{{value}};'
            ),
            array(
                'name' => 'yatri_form_style_design_background_color',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'yatri'),
                'description' => '',
                'default' => '#c1c1c1',
                'selector' => 'form input[type="text"]:not(.yatri-custom-search-input), form input[type="password"], form input[type="email"], form input[type="tel"], form input[type="url"], form input[type="search"], form textarea,
.comments-area .comment-respond .comment-form input[type="text"], .comments-area .comment-respond .comment-form input[type="email"], .comments-area .comment-respond .comment-form input[type="url"], .comments-area .comment-respond .comment-form input[type="password"], .comments-area .comment-respond .comment-form input[type="search"], .comments-area .comment-respond .comment-form input[type="number"], .comments-area .comment-respond .comment-form input[type="tel"], .comments-area .comment-respond .comment-form input[type="range"], .comments-area .comment-respond .comment-form input[type="date"], .comments-area .comment-respond .comment-form input[type="month"], .comments-area .comment-respond .comment-form input[type="week"], .comments-area .comment-respond .comment-form input[type="time"], .comments-area .comment-respond .comment-form input[type="datetime"], .comments-area .comment-respond .comment-form input[type="datetime-local"], .comments-area .comment-respond .comment-form input[type="color"], .comments-area .comment-respond .comment-form textarea',
                'css_property' => 'background-color:{{value}};'
            ),
            array(
                'name' => 'yatri_form_style_design_text_color',
                'type' => 'color',
                'label' => esc_html__('Text Color', 'yatri'),
                'description' => '',
                'default' => '#c1c1c1',
                'selector' => 'form input[type="text"]:not(.yatri-custom-search-input), form input[type="password"], form input[type="email"], form input[type="tel"], form input[type="url"], form input[type="search"], form textarea,
.comments-area .comment-respond .comment-form input[type="text"], .comments-area .comment-respond .comment-form input[type="email"], .comments-area .comment-respond .comment-form input[type="url"], .comments-area .comment-respond .comment-form input[type="password"], .comments-area .comment-respond .comment-form input[type="search"], .comments-area .comment-respond .comment-form input[type="number"], .comments-area .comment-respond .comment-form input[type="tel"], .comments-area .comment-respond .comment-form input[type="range"], .comments-area .comment-respond .comment-form input[type="date"], .comments-area .comment-respond .comment-form input[type="month"], .comments-area .comment-respond .comment-form input[type="week"], .comments-area .comment-respond .comment-form input[type="time"], .comments-area .comment-respond .comment-form input[type="datetime"], .comments-area .comment-respond .comment-form input[type="datetime-local"], .comments-area .comment-respond .comment-form input[type="color"], .comments-area .comment-respond .comment-form textarea',
                'css_property' => 'color:{{value}};'
            ),
        ),
        'yatri_form_style_design_spacing_fields' =>
            array(
                array(
                    'name' => 'yatri_form_style_design_padding',
                    'type' => 'padding',
                    'device_settings' => true,
                    'devices' => array('desktop', 'tablet', 'mobile'),
                    'label' => esc_html__('Padding', 'yatri'),
                    'description' => '',
                    'default' => array(

                        'top' => array(
                            'value' => '',
                            'unit' => 'px'
                        ),
                        'right' => array(
                            'value' => '',
                            'unit' => 'px'
                        ),
                        'bottom' => array(
                            'value' => '',
                            'unit' => 'px'
                        ),
                        'left' => array(
                            'value' => '',
                            'unit' => 'px'
                        )

                    ),
                    'selector' => 'form input[type="text"]:not(.yatri-custom-search-input), form input[type="password"], form input[type="email"], form input[type="tel"], form input[type="url"], form input[type="search"], form textarea,
.comments-area .comment-respond .comment-form input[type="text"], .comments-area .comment-respond .comment-form input[type="email"], .comments-area .comment-respond .comment-form input[type="url"], .comments-area .comment-respond .comment-form input[type="password"], .comments-area .comment-respond .comment-form input[type="search"], .comments-area .comment-respond .comment-form input[type="number"], .comments-area .comment-respond .comment-form input[type="tel"], .comments-area .comment-respond .comment-form input[type="range"], .comments-area .comment-respond .comment-form input[type="date"], .comments-area .comment-respond .comment-form input[type="month"], .comments-area .comment-respond .comment-form input[type="week"], .comments-area .comment-respond .comment-form input[type="time"], .comments-area .comment-respond .comment-form input[type="datetime"], .comments-area .comment-respond .comment-form input[type="datetime-local"], .comments-area .comment-respond .comment-form input[type="color"], .comments-area .comment-respond .comment-form textarea',

                ),

                array(
                    'name' => 'yatri_form_style_design_border_heading',
                    'type' => 'heading',
                    'label' => esc_html__('Border', 'yatri'),
                ),
                array(
                    'name' => 'yatri_form_style_design_border',
                    'type' => 'border',
                    'label' => '',
                    'default' => array(
                        'left' => 0,
                        'right' => 0,
                        'top' => 0,
                        'bottom' => 0
                    ),
                    'selector' => 'form input[type="text"]:not(.yatri-custom-search-input), form input[type="password"], form input[type="email"], form input[type="tel"], form input[type="url"], form input[type="search"], form textarea,
.comments-area .comment-respond .comment-form input[type="text"], .comments-area .comment-respond .comment-form input[type="email"], .comments-area .comment-respond .comment-form input[type="url"], .comments-area .comment-respond .comment-form input[type="password"], .comments-area .comment-respond .comment-form input[type="search"], .comments-area .comment-respond .comment-form input[type="number"], .comments-area .comment-respond .comment-form input[type="tel"], .comments-area .comment-respond .comment-form input[type="range"], .comments-area .comment-respond .comment-form input[type="date"], .comments-area .comment-respond .comment-form input[type="month"], .comments-area .comment-respond .comment-form input[type="week"], .comments-area .comment-respond .comment-form input[type="time"], .comments-area .comment-respond .comment-form input[type="datetime"], .comments-area .comment-respond .comment-form input[type="datetime-local"], .comments-area .comment-respond .comment-form input[type="color"], .comments-area .comment-respond .comment-form textarea',
                )
            ),


    );

    //Breadcrumb
    $fields['yatri_breadcrumb_style_design'] = Yatri_Section_Breadcrumb_Config::get_design_style_config();

    // Top Header Configurations
    $fields['top_header_design'] = Yatri_Section_Header_Config::get_design_style_config('top_header_design', '.top-header.yatri-header-item');

    // Top Header Navigation Menu Settings

    // End of Top Header Configurations

    $fields['top_header_navigation_menu_design'] = Yatri_Section_Nav_Menu_Config::get_design_style_config('top_header_navigation_menu_design', '.top-header');

    $fields['top_header_button_style_design'] = Yatri_Section_Button_Config::get_design_style_config('top_header_button_style_design', '.top-header');

    $fields['top_header_search_form_design'] = Yatri_Section_Search_Form_Config::get_design_style_config('top_header_search_form_design', '.top-header');

    $fields['top_header_office_info_design'] = Yatri_Section_Office_Info_Config::get_design_style_config('top_header_office_info_design', '.top-header');

    $fields['top_header_social_icons_design'] = Yatri_Section_Social_Icons_Config::get_design_style_config('top_header_social_icons_design', '.top-header');

    $fields['top_header_offcanvas_menu_design'] = Yatri_Section_Offcanvas_Config::get_design_style_config('top_header_offcanvas_menu_design', '.top-header');

    $fields['top_header_branding_style_design'] = Yatri_Section_Branding_Config::get_design_style_config('top_header_branding_style_design', '.top-header');

    $fields['top_header_custom_html_design'] = Yatri_Section_Custom_HTML_Config::get_design_style_config('top_header_custom_html_design', '.top-header');


    // Top Header Configurations

    $fields['mid_header_design'] = Yatri_Section_Header_Config::get_design_style_config('mid_header_design', '.yatri-mid-header.yatri-header-item');

    // Top Header Navigation Menu Settings

    // End of Top Header Configurations

    $fields['mid_header_navigation_menu_design'] = Yatri_Section_Nav_Menu_Config::get_design_style_config('mid_header_navigation_menu_design', '.yatri-mid-header');

    $fields['mid_header_button_style_design'] = Yatri_Section_Button_Config::get_design_style_config('mid_header_button_style_design', '.yatri-mid-header');

    $fields['mid_header_search_form_design'] = Yatri_Section_Search_Form_Config::get_design_style_config('mid_header_search_form_design', '.yatri-mid-header');

    $fields['mid_header_office_info_design'] = Yatri_Section_Office_Info_Config::get_design_style_config('mid_header_office_info_design', '.yatri-mid-header');

    $fields['mid_header_social_icons_design'] = Yatri_Section_Social_Icons_Config::get_design_style_config('mid_header_social_icons_design', '.yatri-mid-header');

    $fields['mid_header_offcanvas_menu_design'] = Yatri_Section_Offcanvas_Config::get_design_style_config('mid_header_offcanvas_menu_design', '.yatri-mid-header');

    $fields['mid_header_branding_style_design'] = Yatri_Section_Branding_Config::get_design_style_config('mid_header_branding_style_design', '.yatri-mid-header');

    $fields['mid_header_custom_html_design'] = Yatri_Section_Custom_HTML_Config::get_design_style_config('mid_header_custom_html_design', '.yatri-mid-header');

    // End of Mid Header Configurations

    // Bottom Header Configurations

    $fields['bottom_header_design'] = Yatri_Section_Header_Config::get_design_style_config('bottom_header_design', '.bottom-header.yatri-header-item');

    $fields['bottom_header_navigation_menu_design'] = Yatri_Section_Nav_Menu_Config::get_design_style_config('bottom_header_navigation_menu_design', '.bottom-header');

    $fields['bottom_header_button_style_design'] = Yatri_Section_Button_Config::get_design_style_config('bottom_header_button_style_design', '.bottom-header');

    $fields['bottom_header_search_form_design'] = Yatri_Section_Search_Form_Config::get_design_style_config('bottom_header_search_form_design', '.bottom-header');

    $fields['bottom_header_office_info_design'] = Yatri_Section_Office_Info_Config::get_design_style_config('bottom_header_office_info_design', '.bottom-header');

    $fields['bottom_header_social_icons_design'] = Yatri_Section_Social_Icons_Config::get_design_style_config('bottom_header_social_icons_design', '.bottom-header');

    $fields['bottom_header_offcanvas_menu_design'] = Yatri_Section_Offcanvas_Config::get_design_style_config('bottom_header_offcanvas_menu_design', '.bottom-header');

    $fields['bottom_header_branding_style_design'] = Yatri_Section_Branding_Config::get_design_style_config('bottom_header_branding_style_design', '.bottom-header');

    $fields['bottom_header_custom_html_design'] = Yatri_Section_Custom_HTML_Config::get_design_style_config('bottom_header_custom_html_design', '.bottom-header');
// end of bottom header

    // Start of Archive Page

    $fields['blog_archive_design_style'] = Yatri_Section_Wrapper_Config::get_design_style_config('blog_archive_design_style', 'body.yatri-blog-archive-page');

    $fields['blog_archive_page_content_wrapper_design_styling'] = Yatri_Section_Content_Config::get_design_style_config('blog_archive_page_content_wrapper_design_styling', 'body.yatri-blog-archive-page .yatri-main-wrap .yatri-content-wrap');

    $fields['blog_archive_page_article_design_styling'] = Yatri_Section_Post_Config::get_design_style_config('blog_archive_page_article_design_styling', 'body.yatri-blog-archive-page .yatri-main-wrap .yatri-content-wrap article.post');

    $fields['blog_archive_page_readmore_design_styling'] = Yatri_Section_Readmore_Config::get_design_style_config('blog_archive_page_readmore_design_styling', '.button-container.learn-more-btn');

    $fields['blog_archive_pagination_design_style'] = Yatri_Section_Pagination_Config::get_design_style_config('blog_archive_pagination_design_style', 'body.yatri-blog-archive-page');


    // Single Post
    $fields['single_post_design_style'] = Yatri_Section_Wrapper_Config::get_design_style_config('single_post_design_style', 'body.yatri-single-post');

    $fields['single_post_article_design_styling'] = Yatri_Section_Post_Config::get_design_style_config(
        'single_post_article_design_styling',
        '
        body.yatri-single-post .yatri-main-wrap  .post-main-content>article.post,
        body.yatri_full_width_100_layout.yatri-single-post section.site-content .yatri-main-wrap .post-main-content > article
        '
    );


    $fields['page_design_style'] = Yatri_Section_Wrapper_Config::get_design_style_config('page_design_style', 'body.yatri-single-page');

    $fields['page_article_design_styling'] = Yatri_Section_Post_Config::get_design_style_config(
        'page_article_design_styling',
        '
        body.yatri-single-page .site-content article.page,
        body.yatri_full_width_100_layout.yatri-single-page section.site-content .yatri-main-wrap .post-content > article.page
        '
    );

    $fields['left_sidebar_design_style'] = Yatri_Section_Sidebar_Config::get_design_style_config('left_sidebar_design_style', 'body .yatri-sidebar.yatri-sidebar-left .sidebar');

    $fields['right_sidebar_design_style'] = Yatri_Section_Sidebar_Config::get_design_style_config('right_sidebar_design_style', 'body .yatri-sidebar.yatri-sidebar-right .sidebar');

    $fields['footer_widgets_section_design_style'] = Yatri_Section_Header_Config::get_design_style_config('footer_widgets_section_design_style', '.site-footer .top-footer.yatri-top-footer-area');

    $fields['footer_widgets_area_design_style'] = Yatri_Section_Sidebar_Config::get_design_style_config('footer_widgets_area_design_style', '.top-footer .footer-widget-wrap .footer-widget-sidebar');

    // Footer Bottom
    $fields['bottom_footer_section_design_style'] = Yatri_Section_Header_Config::get_design_style_config('bottom_footer_section_design_style', '.site-footer  .bottom-footer.yatri-bottom-footer-area');

    $fields['bottom_footer_navigation_menu_design'] = Yatri_Section_Footer_Nav_Menu_Config::get_design_style_config('bottom_footer_navigation_menu_design', '.bottom-footer');

    $fields['bottom_footer_button_style_design'] = Yatri_Section_Button_Config::get_design_style_config('bottom_footer_button_style_design', '.bottom-footer');

    $fields['bottom_footer_office_info_design'] = Yatri_Section_Footer_Office_Info_Config::get_design_style_config('bottom_footer_office_info_design', '.bottom-footer');

    $fields['bottom_footer_social_icons_design'] = Yatri_Section_Footer_Social_Icons_Config::get_design_style_config('bottom_footer_social_icons_design', '.bottom-footer');

    $fields['bottom_footer_custom_html_design'] = Yatri_Section_Custom_HTML_Config::get_design_style_config('bottom_footer_custom_html_design', '.bottom-footer');

    $fields['bottom_footer_copyright_design'] = Yatri_Section_Copyright_Config::get_design_style_config('bottom_footer_copyright_design', '.bottom-footer');


    $fields = apply_filters('yatri_customizer_modal_config_fields', $fields);

    if (!empty($field_id) && isset($fields[$field_id])) {

        return $fields[$field_id];
    }
    if ($return_all) {
        return $fields;
    }
    return array();

}