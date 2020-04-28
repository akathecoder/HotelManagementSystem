<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Button one section*/
$wp_customize->add_section($this->button_one, array(
    'title' => esc_html__('Button One', 'cosmoswp'),
    'panel' => $this->panel,
));

/*Button Text*/
$wp_customize->add_setting('button-one-text', array(
    'default'           => $header_defaults['button-one-text'],
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('button-one-text', array(
    'label'    => esc_html__('Button Text', 'cosmoswp'),
    'section'  => $this->button_one,
    'settings' => 'button-one-text',
    'type'     => 'text'
));

/*Enable Icon */
$wp_customize->add_setting('button-one-enable-icon', array(
    'default'           => $header_defaults['button-one-enable-icon'],
    'sanitize_callback' => 'cosmoswp_sanitize_checkbox',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('button-one-enable-icon', array(
    'label'    => esc_html__('Enable Icon', 'cosmoswp'),
    'section'  => $this->button_one,
    'settings' => 'button-one-enable-icon',
    'type'     => 'checkbox'
));

/*Icon*/
$wp_customize->add_setting('button-one-icon', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['button-one-icon'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Customize_Icons_Control(
        $wp_customize,
        'button-one-icon',
        array(
            'label'           => esc_html__('Icon', 'cosmoswp'),
            'section'         => $this->button_one,
            'settings'        => 'button-one-icon',
            'active_callback' => 'cosmoswp_button_one_enable_icon'
        )
    )
);

/*Icon Position*/
$wp_customize->add_setting('button-one-icon-position', array(
    'default'           => $header_defaults['button-one-icon-position'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_icon_position();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'button-one-icon-position',
        array(
            'choices'         => $choices,
            'label'           => esc_html__('Icon Position', 'cosmoswp'),
            'section'         => $this->button_one,
            'settings'        => 'button-one-icon-position',
            'active_callback' => 'cosmoswp_button_one_enable_icon',
        )
    )
);

/*Button URL*/
$wp_customize->add_setting('button-one-url', array(
    'default'           => $header_defaults['button-one-url'],
    'sanitize_callback' => 'esc_url_raw',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('button-one-url', array(
    'label'             => esc_html__('Button URL', 'cosmoswp'),
    'section'           => $this->button_one,
    'settings'          => 'button-one-url',
    'type'              => 'url',
    'transport'         => 'postMessage'
));

/*Open link in new tab */
$wp_customize->add_setting('button-one-open-link-new-tab', array(
    'default'           => $header_defaults['button-one-open-link-new-tab'],
    'sanitize_callback' => 'cosmoswp_sanitize_checkbox',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('button-one-open-link-new-tab', array(
    'label'    => esc_html__('Open link in a new tab', 'cosmoswp'),
    'section'  => $this->button_one,
    'settings' => 'button-one-open-link-new-tab',
    'type'     => 'checkbox'
));

$wp_customize->add_setting('button-one-class-name', array(
    'default'           => $header_defaults['button-one-class-name'],
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('button-one-class-name', array(
    'label'    => esc_html__('Button CSS Class ', 'cosmoswp'),
    'description' => __( 'Multiple classes added by space', 'cosmoswp' ),
    'section'  => $this->button_one,
    'settings' => 'button-one-class-name',
    'type'     => 'text'
));

/*Margin & Padding Msg*/
$wp_customize->add_setting('button-one-padding-margin-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'button-one-padding-margin-msg',
        array(
            'label'   => esc_html__('Margin & Padding', 'cosmoswp'),
            'section' => $this->button_one
        )
    )
);

/*Margin*/
$wp_customize->add_setting('button-one-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['button-one-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'button-one-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->button_one,
            'settings' => 'button-one-margin',
        ),
        array(),
        array()
    )
);

/*Padding*/
$wp_customize->add_setting('button-one-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['button-one-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'button-one-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->button_one,
            'settings' => 'button-one-padding',
        ),
        array(),
        array()
    )
);

/*Button One Styling Msg*/
$wp_customize->add_setting('button-one-styling-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'button-one-styling-styling-msg',
        array(
            'label'   => esc_html__('Button One Styling', 'cosmoswp'),
            'section' => $this->button_one,
        )
    )
);

/*Button align*/
$wp_customize->add_setting('button-one-align', array(
    'default'           => $header_defaults['button-one-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_field_responsive_buttonset',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_flex_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Responsive_Buttonset(
        $wp_customize,
        'button-one-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Button Alignment', 'cosmoswp'),
            'section'  => $this->button_one,
            'settings' => 'button-one-align',
        )
    )
);

/*Tabs*/
$wp_customize->add_setting('button-one-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_tabs',
    'default'           => $header_defaults['button-one-styling'],
    'transport'         => 'postMessage'
));
$border_style_choices = cosmoswp_header_border_style();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Tabs(
        $wp_customize,
        'button-one-styling',
        array(
            'label'    => esc_html__('Button Styling', 'cosmoswp'),
            'section'  => $this->button_one,
            'settings' => 'button-one-styling',
        ),
        array(
            'tabs'   => array(
                'button-one-normal' => array(
                    'label' => esc_html__('Normal', 'cosmoswp'),
                ),
                'button-one-hover'  => array(
                    'label' => esc_html__('Hover', 'cosmoswp'),
                ),
            ),
            'fields' => array(
                'normal-text-color'       => array(
                    'type'  => 'color',
                    'label' => esc_html__('Text Color', 'cosmoswp'),
                    'tab'   => 'button-one-normal',
                ),
                'normal-bg-color'         => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'button-one-normal',
                ),
                'normal-border-style'     => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'button-one-normal',
                ),
                'normal-border-color'     => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'button-one-normal',
                ),
                'normal-border-width'     => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width (px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'button-one-normal',
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
                    'tab'   => 'button-one-normal',
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
                    'tab'   => 'button-one-normal',
                ),
                'normal-box-shadow-css'   => array(
                    'type'       => 'cssbox',
                    'tab'        => 'button-one-normal',
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
                    'label' => esc_html__(' Text Color', 'cosmoswp'),
                    'tab'   => 'button-one-hover',
                ),
                'hover-bg-color'          => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'button-one-hover',
                ),
                'hover-border-style'      => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'button-one-hover',
                ),
                'hover-border-color'      => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'button-one-hover',
                ),
                'hover-border-width'      => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width (px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'button-one-hover',
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
                    'tab'   => 'button-one-hover',
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
                    'tab'   => 'button-one-hover',
                ),
                'hover-box-shadow-css'    => array(
                    'type'       => 'cssbox',
                    'tab'        => 'button-one-hover',
                    'class'      => 'cwp-element-show',
                    'box_fields' => array(
                        'x'      => true,
                        'Y'      => true,
                        'BLUR'   => true,
                        'SPREAD' => true,
                    ),
                    'attr'       => array(
                        'min'         => -1000,
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
$wp_customize->add_setting('button-one-typography-options', array(
    'default'           => $header_defaults['button-one-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_inherit_options();
$wp_customize->add_control('button-one-typography-options', array(
    'label'    => esc_html__('Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->button_one,
    'settings' => 'button-one-typography-options',
    'choices'  => $choices
));

/*Typography data*/
$wp_customize->add_setting('button-one-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $header_defaults['button-one-typography'],
    'transport'         => 'postMessage'
));

$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'button-one-typography',
        array(
            'label'           => esc_html__('Typography', 'cosmoswp'),
            'section'         => $this->button_one,
            'active_callback' => 'cosmoswp_button_one_typography_if_custom',
            'settings'        => 'button-one-typography',
        ),
        cosmoswp_typography_group_fields()
    )
);