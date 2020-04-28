<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Header Row Section and Setting*/
$wp_customize->add_section($this->header_top, array(
    'title'    => esc_html__('Header Top', 'cosmoswp'),
    'priority' => 25,
    'panel'    => $this->panel,
));

/*Top Header Styling*/
$wp_customize->add_setting('top-header-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'top-header-styling-msg',
        array(
            'label'   => esc_html__('Top Header Height', 'cosmoswp'),
            'section' => $this->header_top,
        )
    )
);

/*Top Header Option*/
$wp_customize->add_setting('header-top-height-option', array(
    'default'           => $header_defaults['header-top-height-option'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_header_top_height_option();
$wp_customize->add_control('header-top-height-option', array(
    'label'    => esc_html__('Height Option', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->header_top,
    'settings' => 'header-top-height-option',
    'choices'  => $choices
));

/*Top Header Height*/
$wp_customize->add_setting('top-header-height', array(
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'default'           => $header_defaults['top-header-height'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'top-header-height',
        array(
            'label'           => esc_html__('Header Top Height (px)', 'cosmoswp'),
            'section'         => $this->header_top,
            'active_callback' => 'cosmoswp_header_top_height_if_custom',
            'settings'        => 'top-header-height',
            'input_attrs'     => array(
                'min'  => 0,
                'max'  => 100,
                'step' => 1,
            ),
        )
    )
);

/*Margin & Padding Msg*/
$wp_customize->add_setting('top-header-padding-margin-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'top-header-padding-margin-msg',
        array(
            'label'   => esc_html__('Margin & Padding', 'cosmoswp'),
            'section' => $this->header_top,
        )
    )
);

/* Margin*/
$wp_customize->add_setting('top-header-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['top-header-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'top-header-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->header_top,
            'settings' => 'top-header-margin',
        ),
        array(),
        array()
    )
);

/* Padding*/
$wp_customize->add_setting('top-header-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['top-header-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'top-header-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->header_top,
            'settings' => 'top-header-padding',
        ),
        array(),
        array()
    )
);

/*Background Styling msg */
$wp_customize->add_setting('top-header-bg-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'top-header-bg-styling-msg',
        array(
            'label'   => esc_html__('Background Options', 'cosmoswp'),
            'section' => $this->header_top,
        )
    )
);

/*Inherit Options*/
$choices = cosmoswp_header_bg_options();
$wp_customize->add_setting('header-top-bg-options', array(
    'default'           => $header_defaults['header-top-bg-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));

$wp_customize->add_control('header-top-bg-options', array(
    'label'    => esc_html__('Background Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->header_top,
    'settings' => 'header-top-bg-options',
    'choices'  => $choices
));

/*Custom Background*/
$wp_customize->add_setting('header-top-background-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $header_defaults['header-top-background-options'],
    'transport'         => 'postMessage'
));
$background_image_size_options       = cosmoswp_background_image_size_options();
$background_image_position_options   = cosmoswp_background_image_position_options();
$background_image_repeat_options     = cosmoswp_background_image_repeat_options();
$background_image_attachment_options = cosmoswp_background_image_attachment_options();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'header-top-background-options',
        array(
            'label'           => esc_html__('Custom Background Options', 'cosmoswp'),
            'section'         => $this->header_top,
            'settings'        => 'header-top-background-options',
            'active_callback' => 'cosmoswp_header_top_bg_if_custom'
        ),
        array(
            'background-color'      => array(
                'type'  => 'color',
                'label' => esc_html__('Background Color', 'cosmoswp'),
            ),
            'background-image'      => array(
                'type'  => 'image',
                'label' => esc_html__('Background Image', 'cosmoswp'),
            ),
            'background-size'       => array(
                'type'    => 'select',
                'label'   => esc_html__('Background Size', 'cosmoswp'),
                'options' => $background_image_size_options,
                'class'   => 'image-properties',
            ),
            'background-position'   => array(
                'type'    => 'select',
                'label'   => esc_html__('Background Position', 'cosmoswp'),
                'options' => $background_image_position_options,
                'class'   => 'image-properties',
            ),
            'background-repeat'     => array(
                'type'    => 'select',
                'label'   => esc_html__('Background Repeat', 'cosmoswp'),
                'options' => $background_image_repeat_options,
                'class'   => 'image-properties',
            ),
            'background-attachment' => array(
                'type'    => 'select',
                'label'   => esc_html__('Background Attachment', 'cosmoswp'),
                'options' => $background_image_attachment_options,
                'class'   => 'image-properties',
            ),
            'enable-overlay' => array(
                'type'    => 'checkbox',
                'label'   => esc_html__('Enable Overlay', 'cosmoswp'),
                'class'   =>  'image-properties image-properties-checkbox',
            ),
            'background-overlay-color'      => array(
                'type'  => 'color',
                'label' => esc_html__('Background Overlay Color', 'cosmoswp'),
                'class'   =>  'image-properties',
            ),
        )
    )
);

/*Header top border style*/
$wp_customize->add_setting('top-header-border-options-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'top-header-border-options-styling-msg',
        array(
            'label'   => esc_html__('Border & Box Options', 'cosmoswp'),
            'section' => $this->header_top,
        )
    )
);

/*Header top border & box*/
$wp_customize->add_setting('header-top-border-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $header_defaults['header-top-border-styling'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'header-top-border-styling',
        array(
            'label'    => esc_html__('Border & Box', 'cosmoswp'),
            'section'  => $this->header_top,
            'settings' => 'header-top-border-styling',
        ),
        array(
            'border-style'     => array(
                'type'    => 'select',
                'label'   => esc_html__('Border Style', 'cosmoswp'),
                'options' => cosmoswp_header_border_style(),
            ),
            'border-width'     => array(
                'type'       => 'cssbox',
                'label'      => esc_html__('Border Width', 'cosmoswp'),
                'class'      => 'cwp-element-show',
                'box_fields' => array(
                    'top'    => true,
                    'right'  => true,
                    'bottom' => true,
                    'left'   => true,
                ),
                'attr'       => array(
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
            'border-color'     => array(
                'type'  => 'color',
                'label' => esc_html__('Border Color', 'cosmoswp'),
            ),
            'border-radius'    => array(
                'type'       => 'cssbox',
                'label'      => esc_html__('Border Radius', 'cosmoswp'),
                'class'      => 'cwp-element-show',
                'box_fields' => array(
                    'top'    => true,
                    'right'  => true,
                    'bottom' => true,
                    'left'   => true,
                ),
                'attr'       => array(
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
            'box-shadow-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Box Shadow Color', 'cosmoswp'),
            ),
            'box-shadow-css'   => array(
                'type'       => 'cssbox',
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
        )
    )
);

