<?php
if (!defined('ABSPATH')) {
    exit;
}

/*General Header*/
$wp_customize->add_section('cosmoswp-header-general', array(
    'title'    => esc_html__('Header General ', 'cosmoswp'),
    'panel'    => $this->panel,
    'priority' => 10,
));

/*Header Position*/
$wp_customize->add_setting('header-position-options', array(
    'default'           => $header_defaults['header-position-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'           => 'postMessage'
));
$choices = cosmoswp_header_layout_options();
$wp_customize->add_control('header-position-options', array(
    'choices'  => $choices,
    'label'    => esc_html__('Header Position', 'cosmoswp'),
    'section'  => 'cosmoswp-header-general',
    'settings' => 'header-position-options',
    'type'     => 'select'
));

/*General Header Width*/
$choices = cosmoswp_site_general_layout_option();
$wp_customize->add_setting('header-general-width', array(
    'default'           => $header_defaults['header-general-width'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));

$wp_customize->add_control('header-general-width', array(
    'label'           => esc_html__('Header General Width', 'cosmoswp'),
    'type'            => 'select',
    'section'         => 'cosmoswp-header-general',
    'settings'        => 'header-general-width',
    'active_callback' => 'cosmoswp_header_layout_if_horizontal',
    'priority'        => 10,
    'choices'         => $choices
));

/*Vertical Header style*/
$wp_customize->add_setting('vertical-header-position', array(
    'default'           => $header_defaults['vertical-header-position'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_vertical_header_position();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'vertical-header-position',
        array(
            'choices'         => $choices,
            'label'           => esc_html__('Vertical Header Position', 'cosmoswp'),
            'section'         => 'cosmoswp-header-general',
            'settings'        => 'vertical-header-position',
            'active_callback' => 'cosmoswp_header_layout_if_vertical'
        )
    )
);

/*Header Width*/
$wp_customize->add_setting('vertical-header-width', array(
    'default'           => $header_defaults['vertical-header-width'],
    'sanitize_callback' => 'cosmoswp_sanitize_number',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Range(
        $wp_customize,
        'vertical-header-width',
        array(
            'label'           => esc_html__('Vertical Header Width (px)', 'cosmoswp'),
            'section'         => 'cosmoswp-header-general',
            'settings'        => 'vertical-header-width',
            'input_attrs'     => array(
                'min'  => 280,
                'max'  => 560,
                'step' => 1
            ),
            'active_callback' => 'cosmoswp_header_layout_if_vertical'
        )
    )
);

/*Top Header Styling*/
$wp_customize->add_setting('header-general-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'header-general-styling-msg',
        array(
            'label'   => esc_html__('Margin & Padding', 'cosmoswp'),
            'section' => 'cosmoswp-header-general'
        )
    )
);

/*Header margin*/
$wp_customize->add_setting('header-general-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['header-general-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'header-general-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => 'cosmoswp-header-general',
            'settings' => 'header-general-margin',
        ),
        array(),
        array()
    )
);

/*Header padding*/
$wp_customize->add_setting('header-general-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['header-general-padding'],
    'transport'         => 'postMessage'

));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'header-general-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => 'cosmoswp-header-general',
            'settings' => 'header-general-padding',
        ),
        array(),
        array()
    )
);

/*Heading Background Options*/
$wp_customize->add_setting('header-general-bg-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'header-general-bg-styling-msg',
        array(
            'label'   => esc_html__('Background Options', 'cosmoswp'),
            'section' => 'cosmoswp-header-general',
        )
    )
);

/*Custom Background*/
$wp_customize->add_setting('header-general-background-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $header_defaults['header-general-background-options'],
    'transport'         => 'postMessage'
));
$background_image_size_options       = cosmoswp_background_image_size_options();
$background_image_position_options   = cosmoswp_background_image_position_options();
$background_image_repeat_options     = cosmoswp_background_image_repeat_options();
$background_image_attachment_options = cosmoswp_background_image_attachment_options();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'header-general-background-options',
        array(
            'label'    => esc_html__('Background Option', 'cosmoswp'),
            'section'  => 'cosmoswp-header-general',
            'settings' => 'header-general-background-options',
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

/*Heading border Info*/
$wp_customize->add_setting('header-general-border-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'header-general-border-styling-msg',
        array(
            'label'   => esc_html__('Border & Box Shadow Options', 'cosmoswp'),
            'section' => 'cosmoswp-header-general',
        )
    )
);

/*Border & Box Shadow*/
$wp_customize->add_setting('header-general-border-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $header_defaults['header-general-border-styling'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'header-general-border-styling',
        array(
            'label'    => esc_html__('Border & Box Shadow', 'cosmoswp'),
            'section'  => 'cosmoswp-header-general',
            'settings' => 'header-general-border-styling',
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
                'class'      => 'cwp-element-show',
                'label'      => esc_html__('Border Radius', 'cosmoswp'),
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
        )
    )
);

/*Header Elements Starts from here*/
$wp_customize->add_section(
    new CosmosWP_WP_Customize_Section_H3($wp_customize, 'cosmoswp_header_rows_seperator', array(
            'title'    => esc_html__('Header Rows', 'cosmoswp'),
            'panel'    => $this->panel,
            'priority' => 20,
        )
    ));