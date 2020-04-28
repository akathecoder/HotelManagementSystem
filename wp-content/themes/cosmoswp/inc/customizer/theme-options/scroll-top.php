<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Scroll Icon section*/
$wp_customize->add_section('cosmoswp-scroll-top-section', array(
    'title'    => esc_html__('Scroll Top', 'cosmoswp'),
    'panel'    => $this->panel,
    'priority' => 50,
));

/*scroll top selection Msg*/
$wp_customize->add_setting('scroll-top-button-setting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'scroll-top-button-setting-msg',
        array(
            'label'   => esc_html__('Scroll Top Button Setting', 'cosmoswp'),
            'section' => 'cosmoswp-scroll-top-section',
        )
    )
);

$wp_customize->add_setting( 'enable-scroll-top-button', array(
    'default'			=> $theme_option_defaults['enable-scroll-top-button'],
    'sanitize_callback' => 'cosmoswp_sanitize_checkbox'
) );
$wp_customize->add_control( 'enable-scroll-top-button', array(
    'label'		        => esc_html__( 'Enable Scroll Top', 'cosmoswp' ),
    'section'          => 'cosmoswp-scroll-top-section',
    'settings'          => 'enable-scroll-top-button',
    'type'	  	        => 'checkbox'
) );

$wp_customize->add_setting( 'remove-scroll-top-button-mobile', array(
    'default'			=> $theme_option_defaults['remove-scroll-top-button-mobile'],
    'sanitize_callback' => 'cosmoswp_sanitize_checkbox'
) );
$wp_customize->add_control( 'remove-scroll-top-button-mobile', array(
    'label'		        => esc_html__( 'Remove Scroll Top in mobile.', 'cosmoswp' ),
    'section'          => 'cosmoswp-scroll-top-section',
    'settings'          => 'remove-scroll-top-button-mobile',
    'type'	  	        => 'checkbox'
) );

$wp_customize->add_setting('scroll-icon-position-options', array(
    'default'           => $theme_option_defaults['scroll-icon-position-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
));
$choices = cosmoswp_position_options();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'scroll-icon-position-options',
        array(
            'choices'         => $choices,
            'label'           => esc_html__('Bottom Position', 'cosmoswp'),
            'section'         => 'cosmoswp-scroll-top-section',
            'settings'        => 'scroll-icon-position-options',
        )
    )
);

/*Scroll Top Button height size */
$wp_customize->add_setting('scroll-top-button-height', array(
    'default'           => $theme_option_defaults['scroll-top-button-height'],
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'scroll-top-button-height',
        array(
            'label'           => esc_html__('Height', 'cosmoswp'),
            'section'         => 'cosmoswp-scroll-top-section',
            'settings'        => 'scroll-top-button-height',
            'input_attrs'     => array(
                'min'  => 10,
                'max'  => 1000,
                'step' => 1,
            ),
        )
    )
);

/*Scroll Top Button Width size */
$wp_customize->add_setting('scroll-top-button-width', array(
    'default'           => $theme_option_defaults['scroll-top-button-width'],
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'scroll-top-button-width',
        array(
            'label'           => esc_html__('width', 'cosmoswp'),
            'section'         => 'cosmoswp-scroll-top-section',
            'settings'        => 'scroll-top-button-width',
            'input_attrs'     => array(
                'min'  => 10,
                'max'  => 1000,
                'step' => 1,
            ),
        )
    )
);

/*Padding*/
$wp_customize->add_setting('scroll-top-icon-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $theme_option_defaults['scroll-top-icon-padding'],
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'scroll-top-icon-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => 'cosmoswp-scroll-top-section',
            'settings' => 'scroll-top-icon-padding',
        ),
        array(),
        array()
    )
);

/*Margin*/
$wp_customize->add_setting('scroll-top-icon-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $theme_option_defaults['scroll-top-icon-margin'],
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'scroll-top-icon-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => 'cosmoswp-scroll-top-section',
            'settings' => 'scroll-top-icon-margin',
        ),
        array(),
        array()
    )
);

/*Tabs*/
$wp_customize->add_setting('scroll-top-icon-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_tabs',
    'default'           => $theme_option_defaults['scroll-top-icon-styling'],
));
$border_style_choices = cosmoswp_header_border_style();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Tabs(
        $wp_customize,
        'scroll-top-icon-styling',
        array(
            'label'    => esc_html__('Button Styling', 'cosmoswp'),
            'section'  => 'cosmoswp-scroll-top-section',
            'settings' => 'scroll-top-icon-styling',
        ),
        array(
            'tabs'   => array(
                'scroll-top-icon-normal' => array(
                    'label' => esc_html__('Normal', 'cosmoswp'),
                ),
                'scroll-top-icon-hover'  => array(
                    'label' => esc_html__('Hover', 'cosmoswp'),
                ),
            ),
            'fields' => array(
                'normal-text-color'       => array(
                    'type'  => 'color',
                    'label' => esc_html__('Icon/Text Color', 'cosmoswp'),
                    'tab'   => 'scroll-top-icon-normal',
                ),
                'normal-bg-color'         => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'scroll-top-icon-normal',
                ),
                'normal-border-style'     => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'scroll-top-icon-normal',
                ),
                'normal-border-color'     => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'scroll-top-icon-normal',
                ),
                'normal-border-width'     => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width (px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'scroll-top-icon-normal',
                    'attr'  => array(
                        'min'       => 0,
                        'max'       => 1000,
                        'step'      => 1,
                        'link'      => 1,
                        'devices'   => array(
                            'desktop' => array(
                                'icon' => 'dashicons-laptop',
                            ),
                        ),
                        'link_text' => esc_html__('Link', 'cosmoswp'),
                    ),
                ),
                'normal-border-radius'    => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Radius (px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'scroll-top-icon-normal',
                    'attr'  => array(
                        'min'       => 0,
                        'max'       => 1000,
                        'step'      => 1,
                        'link'      => 1,
                        'devices'   => array(
                            'desktop' => array(
                                'icon' => 'dashicons-laptop',
                            ),
                        ),
                        'link_text' => esc_html__('Link', 'cosmoswp'),
                    ),
                ),
                'normal-box-shadow-color' => array(
                    'type'  => 'color',
                    'label' => esc_html__('Box Shadow Color', 'cosmoswp'),
                    'tab'   => 'scroll-top-icon-normal',
                ),
                'normal-box-shadow-css'   => array(
                    'type'       => 'cssbox',
                    'tab'        => 'scroll-top-icon-normal',
                    'class'      => 'cwp-element-show',
                    'box_fields' => array(
                        'x'      => true,
                        'Y'      => true,
                        'BLUR'   => true,
                        'SPREAD' => true,
                    ),
                    'attr'       => array(
                        'min'         => 0,
                        'max'         => 1000,
                        'step'        => 1,
                        'link'        => 1,
                        'link_toggle' => false,
                        'devices'     => array(
                            'desktop' => array(
                                'icon' => 'dashicons-laptop',
                            ),
                        ),
                        'link_text'   => esc_html__('INSET', 'cosmoswp'),
                    ),
                ),
                'hover-text-color'        => array(
                    'type'  => 'color',
                    'label' => esc_html__(' Icon/Text Color', 'cosmoswp'),
                    'tab'   => 'scroll-top-icon-hover',
                ),
                'hover-bg-color'          => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'scroll-top-icon-hover',
                ),
                'hover-border-style'      => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'scroll-top-icon-hover',
                ),
                'hover-border-color'      => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'scroll-top-icon-hover',
                ),
                'hover-border-width'      => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width (px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'scroll-top-icon-hover',
                    'attr'  => array(
                        'min'       => 0,
                        'max'       => 1000,
                        'step'      => 1,
                        'link'      => 1,
                        'devices'   => array(
                            'desktop' => array(
                                'icon' => 'dashicons-laptop',
                            ),
                        ),
                        'link_text' => esc_html__('Link', 'cosmoswp'),
                    ),
                ),
                'hover-border-radius'     => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Radius (px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'scroll-top-icon-hover',
                    'attr'  => array(
                        'min'       => 0,
                        'max'       => 1000,
                        'step'      => 1,
                        'link'      => 1,
                        'devices'   => array(
                            'desktop' => array(
                                'icon' => 'dashicons-laptop',
                            ),
                        ),
                        'link_text' => esc_html__('Link', 'cosmoswp'),
                    ),
                ),
                'hover-box-shadow-color'  => array(
                    'type'  => 'color',
                    'label' => esc_html__('Box Shadow Color', 'cosmoswp'),
                    'tab'   => 'scroll-top-icon-hover',
                ),
                'hover-box-shadow-css'    => array(
                    'type'       => 'cssbox',
                    'tab'        => 'scroll-top-icon-hover',
                    'class'      => 'cwp-element-show',
                    'box_fields' => array(
                        'x'      => true,
                        'Y'      => true,
                        'BLUR'   => true,
                        'SPREAD' => true,
                    ),
                    'attr'       => array(
                        'min'         => 0,
                        'max'         => 1000,
                        'step'        => 1,
                        'link'        => 1,
                        'link_toggle' => false,
                        'devices'     => array(
                            'desktop' => array(
                                'icon' => 'dashicons-laptop',
                            ),
                        ),
                        'link_text'   => esc_html__('INSET', 'cosmoswp'),
                    ),
                ),
            ),
        )
    )
);


/*scroll top selection Msg*/
$wp_customize->add_setting('scroll-top-icon-options-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'scroll-top-icon-options-msg',
        array(
            'label'   => esc_html__('Scroll Top Icon/Text', 'cosmoswp'),
            'section' => 'cosmoswp-scroll-top-section',
        )
    )
);

/*Scroll icon*/
$wp_customize->add_setting('scroll-top-icon-options', array(
    'default'           => $theme_option_defaults['scroll-top-icon-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
));
$choices = cosmoswp_menu_indicator_options();
$wp_customize->add_control('scroll-top-icon-options', array(
    'choices'  => $choices,
    'label'    => esc_html__('Scroll Top Indicator Option', 'cosmoswp'),
    'section'  => 'cosmoswp-scroll-top-section',
    'settings' => 'scroll-top-icon-options',
    'type'     => 'select'
));

/*Scroll open Text*/
$wp_customize->add_setting('scroll-top-text', array(
    'default'           => $theme_option_defaults['scroll-top-text'],
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('scroll-top-text', array(
    'label'           => esc_html__('Scroll Top Open Text', 'cosmoswp'),
    'section'         => 'cosmoswp-scroll-top-section',
    'settings'        => 'scroll-top-text',
    'active_callback' => 'cosmoswp_scroll_top_indicator_if_text_or_both',
    'type'            => 'text'
));

/*Scroll Open Icon*/
$wp_customize->add_setting('scroll-top-icon', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $theme_option_defaults['scroll-top-icon'],
));
$wp_customize->add_control(
    new CosmosWP_Customize_Icons_Control(
        $wp_customize,
        'scroll-top-icon',
        array(
            'label'           => esc_html__('Scroll Top Icon', 'cosmoswp'),
            'section'         => 'cosmoswp-scroll-top-section',
            'active_callback' => 'cosmoswp_scroll_top_indicator_if_icon_or_both',
            'settings'        => 'scroll-top-icon'
        )
    )
);

/*Icon Position*/
$wp_customize->add_setting('scroll-top-icon-position', array(
    'default'           => $theme_option_defaults['scroll-top-icon-position'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
));
$choices = cosmoswp_icon_four_position();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'scroll-top-icon-position',
        array(
            'choices'         => $choices,
            'label'           => esc_html__('Icon Position', 'cosmoswp'),
            'section'         => 'cosmoswp-scroll-top-section',
            'active_callback' => 'cosmoswp_scroll_top_indicator_if_both',
            'settings'        => 'scroll-top-icon-position',
        )
    )
);

/*Scroll icon size */
$wp_customize->add_setting('scroll-top-icon-size-responsive', array(
    'default'           => $theme_option_defaults['scroll-top-icon-size-responsive'],
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'scroll-top-icon-size-responsive',
        array(
            'label'           => esc_html__('Scroll Top Icon Size', 'cosmoswp'),
            'section'         => 'cosmoswp-scroll-top-section',
            'settings'        => 'scroll-top-icon-size-responsive',
            'input_attrs'     => array(
                'min'  => 10,
                'max'  => 100,
                'step' => 1,
            ),
            'active_callback' => 'cosmoswp_scroll_top_indicator_if_icon_or_both'
        )
    )
);

/*Typography Options*/
$wp_customize->add_setting('scroll-top-icon-typography-options', array(
    'default'           => $theme_option_defaults['scroll-top-icon-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
));
$choices = cosmoswp_inherit_options();
$wp_customize->add_control('scroll-top-icon-typography-options', array(
    'label'           => esc_html__('Typography Options', 'cosmoswp'),
    'type'            => 'select',
    'section'         => 'cosmoswp-scroll-top-section',
    'settings'        => 'scroll-top-icon-typography-options',
    'active_callback' => 'cosmoswp_scroll_top_indicator_if_text_or_both',
    'choices'         => $choices
));

/*Typography data*/
$wp_customize->add_setting('scroll-top-icon-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $theme_option_defaults['scroll-top-icon-typography'],
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'scroll-top-icon-typography',
        array(
            'label'           => esc_html__('Text Typography', 'cosmoswp'),
            'section'         => 'cosmoswp-scroll-top-section',
            'active_callback' => 'cosmoswp_scroll_top_indicator_if_custom',
            'settings'        => 'scroll-top-icon-typography',
        ),
        cosmoswp_typography_group_fields()
    )
);