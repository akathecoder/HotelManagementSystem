<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Footer Row Section and Setting*/
$wp_customize->add_section($this->footer_main, array(
    'title'    => esc_html__('Footer Main', 'cosmoswp'),
    'priority' => 60,
    'panel'    => cosmoswp_footer_builder()->panel,
));

/*Main Footer Styling*/
$wp_customize->add_setting('footer-main-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-main-styling-msg',
        array(
            'label'   => esc_html__('Footer Main Height', 'cosmoswp'),
            'section' => $this->footer_main,
        )
    )
);

/*Main Footer Height Option*/
$wp_customize->add_setting('footer-main-height-option', array(
    'default'           => $footer_defaults['footer-main-height-option'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_footer_height_option();
$wp_customize->add_control('footer-main-height-option', array(
    'label'    => esc_html__('Height Option', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->footer_main,
    'settings' => 'footer-main-height-option',
    'choices'  => $choices
));

/*Footer Main Height Option*/
$wp_customize->add_setting('footer-main-height', array(
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'default'           => $footer_defaults['footer-main-height'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'footer-main-height',
        array(
            'label'           => esc_html__('Footer Main Height (px)', 'cosmoswp'),
            'section'         => $this->footer_main,
            'active_callback' => 'cosmoswp_footer_main_height_if_custom',
            'settings'        => 'footer-main-height',
            'input_attrs'     => array(
                'min'  => 0,
                'max'  => 1000,
                'step' => 1,
            ),
        )
    )
);

/*Footer Main Styling*/
$wp_customize->add_setting('footer-main-padding-margin-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-main-padding-margin-styling-msg',
        array(
            'label'   => esc_html__('Margin & Padding', 'cosmoswp'),
            'section' => $this->footer_main,
        )
    )
);

/*Footer margin*/
$wp_customize->add_setting('footer-main-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-main-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-main-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->footer_main,
            'settings' => 'footer-main-margin',
        ),
        array(),
        array()
    )
);

/*Footer padding*/
$wp_customize->add_setting('footer-main-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-main-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-main-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->footer_main,
            'settings' => 'footer-main-padding',
        ),
        array(),
        array()
    )
);

/*Background Styling*/
$wp_customize->add_setting('footer-main-bg-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-main-bg-styling-msg',
        array(
            'label'   => esc_html__('Background Options', 'cosmoswp'),
            'section' => $this->footer_main,
        )
    )
);

$wp_customize->add_setting('footer-main-bg-options', array(
    'default'           => $footer_defaults['footer-main-bg-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_header_bg_options();
$wp_customize->add_control('footer-main-bg-options', array(
    'label'    => esc_html__('Background Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->footer_main,
    'settings' => 'footer-main-bg-options',
    'choices'  => $choices
));

/*Background Styling*/
$wp_customize->add_setting('footer-main-background-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $footer_defaults['footer-main-background-options'],
    'transport'         => 'postMessage'
));
$background_image_size_options       = cosmoswp_background_image_size_options();
$background_image_position_options   = cosmoswp_background_image_position_options();
$background_image_repeat_options     = cosmoswp_background_image_repeat_options();
$background_image_attachment_options = cosmoswp_background_image_attachment_options();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-main-background-options',
        array(
            'label'           => esc_html__('Background Option', 'cosmoswp'),
            'section'         => $this->footer_main,
            'settings'        => 'footer-main-background-options',
            'active_callback' => 'cosmoswp_footer_main_bg_if_custom'
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

/*Footer main border style msg*/
$wp_customize->add_setting('footer-main-border-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-main-border-styling-msg',
        array(
            'label'   => esc_html__('Border & Box Options', 'cosmoswp'),
            'section' => $this->footer_main,
        )
    )
);

/*Footer main border style*/
$wp_customize->add_setting('footer-main-border-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $footer_defaults['footer-main-border-styling'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-main-border-styling',
        array(
            'label'    => esc_html__('Border', 'cosmoswp'),
            'section'  => $this->footer_main,
            'settings' => 'footer-main-border-styling',
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
                'class' => 'cwp-element-show',
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
                'class'     => 'cwp-element-show',
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
                'class'     => 'cwp-element-show',
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

/*Background Styling*/
$wp_customize->add_setting('footer-main-widget-title-setting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-main-widget-title-setting-msg',
        array(
            'label'   => esc_html__('Widget Title Styling', 'cosmoswp'),
            'section' => $this->footer_main,
        )
    )
);

/*Title align*/
$wp_customize->add_setting('footer-main-widget-title-align', array(
    'default'           => $footer_defaults['footer-main-widget-title-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_text_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'footer-main-widget-title-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Title Alignment', 'cosmoswp'),
            'section'  => $this->footer_main,
            'settings' => 'footer-main-widget-title-align',
        )
    )
);

/*Title Color*/
$wp_customize->add_setting('footer-main-widget-title-color', array(
    'default'           => $footer_defaults['footer-main-widget-title-color'],
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'footer-main-widget-title-color',
        array(
            'label'    => esc_html__('Title Color', 'cosmoswp'),
            'section'  => $this->footer_main,
            'settings' => 'footer-main-widget-title-color',
            'type'     => 'color'
        )
    )
);

/*Margin*/
$wp_customize->add_setting('footer-main-widget-title-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-main-widget-title-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-main-widget-title-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->footer_main,
            'settings' => 'footer-main-widget-title-margin',
        ),
        array(),
        array()
    )
);

/*Padding*/
$wp_customize->add_setting('footer-main-widget-title-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-main-widget-title-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-main-widget-title-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->footer_main,
            'settings' => 'footer-main-widget-title-padding',
        ),
        array(),
        array()
    )
);

/*Footer Main Border Options*/
$wp_customize->add_setting('footer-main-widget-title-border-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $footer_defaults['footer-main-widget-title-border-styling'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-main-widget-title-border-styling',
        array(
            'label'    => esc_html__('Border', 'cosmoswp'),
            'section'  => $this->footer_main,
            'settings' => 'footer-main-widget-title-border-styling',
        ),
        array(
            'border-style' => array(
                'type'    => 'select',
                'label'   => esc_html__('Border Style', 'cosmoswp'),
                'options' => cosmoswp_header_border_style(),
            ),
            'border-width' => array(
                'type'       => 'cssbox',
                'label'      => esc_html__('Border Width', 'cosmoswp'),
                'class' => 'cwp-element-show',
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
            'border-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Border Color', 'cosmoswp'),
            ),
        )
    )
);

/*Footer Main Typography Options*/
$wp_customize->add_setting('footer-main-widget-title-typography-options', array(
    'default'           => $footer_defaults['footer-main-widget-title-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_inherit_options();
$wp_customize->add_control('footer-main-widget-title-typography-options', array(
    'label'    => esc_html__('Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->footer_main,
    'settings' => 'footer-main-widget-title-typography-options',
    'choices'  => $choices
));

/*Typography data*/
$wp_customize->add_setting('footer-main-widget-title-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $footer_defaults['footer-main-widget-title-typography'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-main-widget-title-typography',
        array(
            'label'           => esc_html__('Typography', 'cosmoswp'),
            'section'         => $this->footer_main,
            'active_callback' => 'cosmoswp_footer_main_widget_title_typography_if_custom',
            'settings'        => 'footer-main-widget-title-typography',
        ),
        cosmoswp_typography_group_fields()
    )
);


/*Background Styling*/
$wp_customize->add_setting('footer-main-widget-content-setting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-main-widget-content-setting-msg',
        array(
            'label'   => esc_html__('Widget Content Styling', 'cosmoswp'),
            'section' => $this->footer_main,
        )
    )
);

/*Title align*/
$wp_customize->add_setting('footer-main-widget-content-align', array(
    'default'           => $footer_defaults['footer-main-widget-content-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_text_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'footer-main-widget-content-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Content Alignment', 'cosmoswp'),
            'section'  => $this->footer_main,
            'settings' => 'footer-main-widget-content-align',
        )
    )
);


/*Color Options*/
$wp_customize->add_setting('footer-main-widget-content-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $footer_defaults['footer-main-widget-content-color-options'],
    'transport'         => 'postMessage',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-main-widget-content-color-options',
        array(
            'label'    => esc_html__('Color Options', 'cosmoswp'),
            'section'  => $this->footer_main,
            'settings' => 'footer-main-widget-content-color-options',
        ),
        array(
            'text-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Text Color', 'cosmoswp'),
            ),
            'link-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Link Color', 'cosmoswp'),
            ),
            'link-hover-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Link Hover Color', 'cosmoswp'),
            ),
        )
    )
);

/*Border Options*/
$wp_customize->add_setting('footer-main-widget-content-border-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $footer_defaults['footer-main-widget-content-border-styling'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-main-widget-content-border-styling',
        array(
            'label'    => esc_html__('Border', 'cosmoswp'),
            'section'  => $this->footer_main,
            'settings' => 'footer-main-widget-content-border-styling',
        ),
        array(
            'border-style' => array(
                'type'    => 'select',
                'label'   => esc_html__('Border Style', 'cosmoswp'),
                'options' => cosmoswp_header_border_style(),
            ),
            'border-width' => array(
                'type'       => 'cssbox',
                'label'      => esc_html__('Border Width', 'cosmoswp'),
                'class' => 'cwp-element-show',
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
            'border-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Border Color', 'cosmoswp'),
            ),
        )
    )
);

/*Footer Main Typography Options*/
$wp_customize->add_setting('footer-main-widget-content-typography-options', array(
    'default'           => $footer_defaults['footer-main-widget-content-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_inherit_options();
$wp_customize->add_control('footer-main-widget-content-typography-options', array(
    'label'    => esc_html__('Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->footer_main,
    'settings' => 'footer-main-widget-content-typography-options',
    'choices'  => $choices
));

/*Typography data*/
$wp_customize->add_setting('footer-main-widget-content-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $footer_defaults['footer-main-widget-content-typography'],
    'transport'         => 'postMessage'
));

$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-main-widget-content-typography',
        array(
            'label'           => esc_html__('Typography', 'cosmoswp'),
            'section'         => $this->footer_main,
            'active_callback' => 'cosmoswp_footer_main_widget_content_typography_if_custom',
            'settings'        => 'footer-main-widget-content-typography',
        ),
        cosmoswp_typography_group_fields()
    )
);
