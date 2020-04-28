<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Header Row Section and Setting*/
$wp_customize->add_section($this->header_main, array(
    'title'    => esc_html__('Header Main', 'cosmoswp'),
    'priority' => 30,
    'panel'    => $this->panel,
));

/*Main Header Styling*/
$wp_customize->add_setting('main-header-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'main-header-styling-msg',
        array(
            'label'   => esc_html__('Header Main Height', 'cosmoswp'),
            'section' => $this->header_main,
        )
    )
);

/*Height Option*/
$wp_customize->add_setting('header-main-height-option', array(
    'default'           => $header_defaults['header-main-height-option'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_header_top_height_option();
$wp_customize->add_control('header-main-height-option', array(
    'label'    => esc_html__('Height Option', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->header_main,
    'settings' => 'header-main-height-option',
    'choices'  => $choices
));

/*Header Main Height*/
$wp_customize->add_setting('header-main-height', array(
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'default'           => $header_defaults['header-main-height'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'header-main-height',
        array(
            'label'           => esc_html__('Header Main Height (px)', 'cosmoswp'),
            'section'         => $this->header_main,
            'active_callback' => 'cosmoswp_header_main_height_if_custom',
            'settings'        => 'header-main-height',
            'input_attrs'     => array(
                'min'  => 0,
                'max'  => 100,
                'step' => 1,
            ),
        )
    )
);

/*Enable Box Width*/
$wp_customize->add_setting('header-main-enable-box-width', array(
    'default'           => $header_defaults['header-main-enable-box-width'],
    'sanitize_callback' => 'cosmoswp_sanitize_checkbox',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('header-main-enable-box-width', array(
    'label'           => esc_html__('Enable Box Width', 'cosmoswp'),
    'description'     => esc_html__('Note: Header General Width should not be box width. ', 'cosmoswp'),
    'section'         => $this->header_main,
    'settings'        => 'header-main-enable-box-width',
    'type'            => 'checkbox'
));

/*Margin & Padding*/
$wp_customize->add_setting('main-header-padding-margin-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'main-header-padding-margin-msg',
        array(
            'label'   => esc_html__('Margin & Padding', 'cosmoswp'),
            'section' => $this->header_main,
        )
    )
);

/* Margin*/
$wp_customize->add_setting('header-main-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['header-main-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'header-main-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->header_main,
            'settings' => 'header-main-margin',
        ),
        array(),
        array()
    )
);

/* Padding*/
$wp_customize->add_setting('header-main-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['header-main-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'header-main-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->header_main,
            'settings' => 'header-main-padding',
        ),
        array(),
        array()
    )
);

/*Background Styling*/
$wp_customize->add_setting('main-header-bg-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'main-header-bg-styling-msg',
        array(
            'label'   => esc_html__('Background Options', 'cosmoswp'),
            'section' => $this->header_main,
        )
    )
);

/*Background Options*/
$wp_customize->add_setting('header-main-bg-options', array(
    'default'           => $header_defaults['header-main-bg-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_header_bg_options();
$wp_customize->add_control('header-main-bg-options', array(
    'label'    => esc_html__('Background Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->header_main,
    'settings' => 'header-main-bg-options',
    'choices'  => $choices
));

/*Custom Background*/
$wp_customize->add_setting('header-main-background-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $header_defaults['header-main-background-options'],
    'transport'         => 'postMessage'
));
$background_image_size_options       = cosmoswp_background_image_size_options();
$background_image_position_options   = cosmoswp_background_image_position_options();
$background_image_repeat_options     = cosmoswp_background_image_repeat_options();
$background_image_attachment_options = cosmoswp_background_image_attachment_options();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'header-main-background-options',
        array(
            'label'           => esc_html__('Custom Background Options', 'cosmoswp'),
            'section'         => $this->header_main,
            'settings'        => 'header-main-background-options',
            'active_callback' => 'cosmoswp_header_main_bg_if_custom'
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

/*Header top border style msg*/
$wp_customize->add_setting('header-main-border-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'header-main-border-styling-msg',
        array(
            'label'   => esc_html__('Border & Box Options', 'cosmoswp'),
            'section' => $this->header_main,
        )
    )
);

/*Header top border style*/
$wp_customize->add_setting('header-main-border-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $header_defaults['header-main-border-styling'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'header-main-border-styling',
        array(
            'label'    => esc_html__('Border & Box', 'cosmoswp'),
            'section'  => $this->header_main,
            'settings' => 'header-main-border-styling',
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