<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Menu Icon section*/
$wp_customize->add_section($this->menu_icon, array(
    'title'    => esc_html__('Menu Icon', 'cosmoswp'),
    'panel'    => $this->panel,
    'priority' => 191,
));

/*Menu Styling*/
$wp_customize->add_setting('menu-icon-open-icon-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'menu-icon-open-icon-msg',
        array(
            'label'   => esc_html__( 'Open Icon/Text Setting', 'cosmoswp' ),
            'section' => $this->menu_icon,
        )
    )
);

/*Menu icon*/
$wp_customize->add_setting('menu-icon-open-icon-options', array(
    'default'           => $header_defaults['menu-icon-open-icon-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_menu_indicator_options();
$wp_customize->add_control('menu-icon-open-icon-options', array(
    'choices'  => $choices,
    'label'    => esc_html__('Menu Indicator Option', 'cosmoswp'),
    'section'  => $this->menu_icon,
    'settings' => 'menu-icon-open-icon-options',
    'type'     => 'select'
));

/*Menu open Text*/
$wp_customize->add_setting('menu-open-text', array(
    'default'           => $header_defaults['menu-open-text'],
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('menu-open-text', array(
    'label'           => esc_html__('Open Text', 'cosmoswp'),
    'section'         => $this->menu_icon,
    'settings'        => 'menu-open-text',
    'active_callback' => 'cosmoswp_menu_indicator_if_text_or_both',
    'type'            => 'text'
));


/*Menu Open Icon*/
$wp_customize->add_setting('menu-open-icon', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['menu-open-icon'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Customize_Icons_Control(
        $wp_customize,
        'menu-open-icon',
        array(
            'label'           => esc_html__('Open Icon', 'cosmoswp'),
            'section'         => $this->menu_icon,
            'active_callback' => 'cosmoswp_menu_indicator_if_icon_or_both',
            'settings'        => 'menu-open-icon'
        )
    )
);

/*Icon Position*/
$wp_customize->add_setting('menu-icon-open-icon-position', array(
    'default'           => $header_defaults['menu-icon-open-icon-position'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_icon_position();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'menu-icon-open-icon-position',
        array(
            'choices'         => $choices,
            'label'           => esc_html__('Icon Position Beside Text', 'cosmoswp'),
            'section'         => $this->menu_icon,
            'active_callback' => 'cosmoswp_menu_indicator_if_both',
            'settings'        => 'menu-icon-open-icon-position',
        )
    )
);

/*Menu icon size */
$wp_customize->add_setting('menu-open-icon-size-responsive', array(
    'default'           => $header_defaults['menu-open-icon-size-responsive'],
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'menu-open-icon-size-responsive',
        array(
            'label'           => esc_html__('Icon Size', 'cosmoswp'),
            'section'         => $this->menu_icon,
            'settings'        => 'menu-open-icon-size-responsive',
            'input_attrs'     => array(
                'min'  => 10,
                'max'  => 100,
                'step' => 1,
            ),
            'active_callback' => 'cosmoswp_menu_indicator_if_icon_or_both'
        )
    )
);

/*Menu Icon align*/
$wp_customize->add_setting('menu-open-icon-align', array(
    'default'           => $header_defaults['menu-open-icon-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_flex_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'menu-open-icon-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Icon/Text Alignment', 'cosmoswp'),
            'section'  => $this->menu_icon,
            'settings' => 'menu-open-icon-align',
        )
    )
);

/*Padding*/
$wp_customize->add_setting('menu-open-icon-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['menu-open-icon-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'menu-open-icon-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->menu_icon,
            'settings' => 'menu-open-icon-padding',
        ),
        array(),
        array()
    )
);

/*Margin*/
$wp_customize->add_setting('menu-open-icon-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['menu-open-icon-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'menu-open-icon-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->menu_icon,
            'settings' => 'menu-open-icon-margin',
        ),
        array(),
        array()
    )
);

/*Tabs*/
$wp_customize->add_setting('menu-open-icon-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_tabs',
    'default'           => $header_defaults['menu-open-icon-styling'],
    'transport'         => 'postMessage'
));
$border_style_choices = cosmoswp_header_border_style();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Tabs(
        $wp_customize,
        'menu-open-icon-styling',
        array(
            'label'    => esc_html__('Icon/Text Styling', 'cosmoswp'),
            'section'  => $this->menu_icon,
            'settings' => 'menu-open-icon-styling',
        ),
        array(
            'tabs'   => array(
                'menu-icon-normal' => array(
                    'label' => esc_html__('Normal', 'cosmoswp'),
                ),
                'menu-icon-hover'  => array(
                    'label' => esc_html__('Hover', 'cosmoswp'),
                ),
            ),
            'fields' => array(
                'normal-text-color'       => array(
                    'type'  => 'color',
                    'label' => esc_html__('Icon/Text Color', 'cosmoswp'),
                    'tab'   => 'menu-icon-normal',
                ),
                'normal-bg-color'         => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'menu-icon-normal',
                ),
                'normal-border-style'     => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'menu-icon-normal',
                ),
                'normal-border-color'     => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'menu-icon-normal',
                ),
                'normal-border-width'     => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width (px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'menu-icon-normal',
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
                    'tab'   => 'menu-icon-normal',
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
                    'tab'   => 'menu-icon-normal',
                ),
                'normal-box-shadow-css'   => array(
                    'type'       => 'cssbox',
                    'tab'        => 'menu-icon-normal',
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
                    'tab'   => 'menu-icon-hover',
                ),
                'hover-bg-color'          => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'menu-icon-hover',
                ),
                'hover-border-style'      => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'menu-icon-hover',
                ),
                'hover-border-color'      => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'menu-icon-hover',
                ),
                'hover-border-width'      => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width (px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'menu-icon-hover',
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
                    'tab'   => 'menu-icon-hover',
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
                    'tab'   => 'menu-icon-hover',
                ),
                'hover-box-shadow-css'    => array(
                    'type'       => 'cssbox',
                    'tab'        => 'menu-icon-hover',
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

/*Typography Options*/
$wp_customize->add_setting('menu-open-icon-typography-options', array(
    'default'           => $header_defaults['menu-open-icon-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_inherit_options();
$wp_customize->add_control('menu-open-icon-typography-options', array(
    'label'           => esc_html__('Typography Options', 'cosmoswp'),
    'type'            => 'select',
    'section'         => $this->menu_icon,
    'settings'        => 'menu-open-icon-typography-options',
    'active_callback' => 'cosmoswp_menu_indicator_if_text_or_both',
    'choices'         => $choices
));

/*Typography data*/
$wp_customize->add_setting('menu-open-icon-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $header_defaults['menu-open-icon-typography'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'menu-open-icon-typography',
        array(
            'label'           => esc_html__('Text Typography', 'cosmoswp'),
            'section'         => $this->menu_icon,
            'active_callback' => 'cosmoswp_menu_icon_typography_if_custom',
            'settings'        => 'menu-open-icon-typography',
        ),
        cosmoswp_typography_group_fields()
    )
);



/*Menu Styling*/
$wp_customize->add_setting('menu-icon-close-icon-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'menu-icon-close-icon-msg',
        array(
            'label'   => esc_html__( 'Close Icon/Text Setting', 'cosmoswp' ),
            'section' => $this->menu_icon,
        )
    )
);

/*Menu icon*/
$wp_customize->add_setting('menu-icon-close-icon-options', array(
    'default'           => $header_defaults['menu-icon-close-icon-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_menu_indicator_options();
$wp_customize->add_control('menu-icon-close-icon-options', array(
    'choices'  => $choices,
    'label'    => esc_html__('Close Menu Icon Option', 'cosmoswp'),
    'section'  => $this->menu_icon,
    'settings' => 'menu-icon-close-icon-options',
    'type'     => 'select'
));

/*Menu Close Text*/
$wp_customize->add_setting('menu-close-text', array(
    'default'           => $header_defaults['menu-close-text'],
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('menu-close-text', array(
    'label'           => esc_html__('Close Text', 'cosmoswp'),
    'section'         => $this->menu_icon,
    'settings'        => 'menu-close-text',
    'active_callback' => 'cosmoswp_menu_close_indicator_if_text_or_both',
    'type'            => 'text'
));


/*Menu Close Icon*/
$wp_customize->add_setting('menu-close-icon', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['menu-close-icon'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Customize_Icons_Control(
        $wp_customize,
        'menu-close-icon',
        array(
            'label'           => esc_html__('Close Icon', 'cosmoswp'),
            'section'         => $this->menu_icon,
            'active_callback' => 'cosmoswp_menu_close_indicator_if_icon_or_both',
            'settings'        => 'menu-close-icon'
        )
    )
);

/*Icon Position*/
$wp_customize->add_setting('menu-icon-close-icon-position', array(
    'default'           => $header_defaults['menu-icon-close-icon-position'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_icon_position();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'menu-icon-close-icon-position',
        array(
            'choices'         => $choices,
            'label'           => esc_html__('Icon Position Beside Text', 'cosmoswp'),
            'section'         => $this->menu_icon,
            'active_callback' => 'cosmoswp_menu_close_indicator_if_both',
            'settings'        => 'menu-icon-close-icon-position',
        )
    )
);

/*Menu icon size */
$wp_customize->add_setting('menu-icon-close-icon-size-responsive', array(
    'default'           => $header_defaults['menu-icon-close-icon-size-responsive'],
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'menu-icon-close-icon-size-responsive',
        array(
            'label'           => esc_html__('Menu Icon Size', 'cosmoswp'),
            'section'         => $this->menu_icon,
            'settings'        => 'menu-icon-close-icon-size-responsive',
            'input_attrs'     => array(
                'min'  => 10,
                'max'  => 100,
                'step' => 1,
            ),
            'active_callback' => 'cosmoswp_menu_close_indicator_if_icon_or_both'
        )
    )
);

/*Menu Icon align*/
$wp_customize->add_setting('menu-icon-close-icon-align', array(
    'default'           => $header_defaults['menu-icon-close-icon-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_flex_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'menu-icon-close-icon-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Icon/Text Alignment', 'cosmoswp'),
            'section'  => $this->menu_icon,
            'settings' => 'menu-icon-close-icon-align',
        )
    )
);


/*Padding*/
$wp_customize->add_setting('menu-icon-close-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['menu-icon-close-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'menu-icon-close-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->menu_icon,
            'settings' => 'menu-icon-close-padding',
        ),
        array(),
        array()
    )
);

/*Margin*/
$wp_customize->add_setting('menu-icon-close-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['menu-icon-close-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'menu-icon-close-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->menu_icon,
            'settings' => 'menu-icon-close-margin',
        ),
        array(),
        array()
    )
);

/*Tabs*/
$wp_customize->add_setting('menu-icon-close-icon-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_tabs',
    'default'           => $header_defaults['menu-icon-close-icon-styling'],
    'transport'         => 'postMessage'
));
$border_style_choices = cosmoswp_header_border_style();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Tabs(
        $wp_customize,
        'menu-icon-close-icon-styling',
        array(
            'label'    => esc_html__('Icon/Text Styling', 'cosmoswp'),
            'section'  => $this->menu_icon,
            'settings' => 'menu-icon-close-icon-styling',
        ),
        array(
            'tabs'   => array(
                'menu-icon-normal' => array(
                    'label' => esc_html__('Normal', 'cosmoswp'),
                ),
                'menu-icon-hover'  => array(
                    'label' => esc_html__('Hover', 'cosmoswp'),
                ),
            ),
            'fields' => array(
                'normal-text-color'       => array(
                    'type'  => 'color',
                    'label' => esc_html__('Icon/Text Color', 'cosmoswp'),
                    'tab'   => 'menu-icon-normal',
                ),
                'normal-bg-color'         => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'menu-icon-normal',
                ),
                'normal-border-style'     => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'menu-icon-normal',
                ),
                'normal-border-color'     => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'menu-icon-normal',
                ),
                'normal-border-width'     => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width (px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'menu-icon-normal',
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
                    'tab'   => 'menu-icon-normal',
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
                    'tab'   => 'menu-icon-normal',
                ),
                'normal-box-shadow-css'   => array(
                    'type'       => 'cssbox',
                    'tab'        => 'menu-icon-normal',
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
                    'tab'   => 'menu-icon-hover',
                ),
                'hover-bg-color'          => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'menu-icon-hover',
                ),
                'hover-border-style'      => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'menu-icon-hover',
                ),
                'hover-border-color'      => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'menu-icon-hover',
                ),
                'hover-border-width'      => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width (px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'menu-icon-hover',
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
                    'tab'   => 'menu-icon-hover',
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
                    'tab'   => 'menu-icon-hover',
                ),
                'hover-box-shadow-css'    => array(
                    'type'       => 'cssbox',
                    'tab'        => 'menu-icon-hover',
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

/*Typography Options*/
$wp_customize->add_setting('menu-icon-close-text-typography-options', array(
    'default'           => $header_defaults['menu-icon-close-text-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_inherit_options();
$wp_customize->add_control('menu-icon-close-text-typography-options', array(
    'label'           => esc_html__('Typography Options', 'cosmoswp'),
    'type'            => 'select',
    'section'         => $this->menu_icon,
    'settings'        => 'menu-icon-close-text-typography-options',
   'active_callback' => 'cosmoswp_menu_close_indicator_if_text_or_both',
    'choices'         => $choices
));

/*Typography data*/
$wp_customize->add_setting('menu-icon-close-text-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $header_defaults['menu-icon-close-text-typography'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'menu-icon-close-text-typography',
        array(
            'label'           => esc_html__('Text Typography', 'cosmoswp'),
            'section'         => $this->menu_icon,
            'active_callback' => 'cosmoswp_menu_close_typography_if_custom',
            'settings'        => 'menu-icon-close-text-typography',
        ),
        cosmoswp_typography_group_fields()
    )
);