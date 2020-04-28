<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Footer Row Section and Setting*/
$wp_customize->add_section($this->footer_top, array(
    'title'    => esc_html__('Footer Top', 'cosmoswp'),
    'priority' => 55,
    'panel'    => $this->panel,
));
/*Footer Top Styling*/
$wp_customize->add_setting('footer-top-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-top-styling-msg',
        array(
            'label'   => esc_html__('Footer Top Height', 'cosmoswp'),
            'section' => $this->footer_top,
        )
    )
);

/*Height Option*/
$wp_customize->add_setting('footer-top-height-option', array(
    'default'           => $footer_defaults['footer-top-height-option'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_footer_height_option();
$wp_customize->add_control('footer-top-height-option', array(
    'label'    => esc_html__('Height Option', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->footer_top,
    'settings' => 'footer-top-height-option',
    'choices'  => $choices
));

/*Footer Top Height (px)*/
$wp_customize->add_setting('footer-top-height', array(
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'default'           => $footer_defaults['footer-top-height'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'footer-top-height',
        array(
            'label'           => esc_html__('Footer Top Height (px)', 'cosmoswp'),
            'section'         => $this->footer_top,
            'active_callback' => 'cosmoswp_footer_top_height_if_custom',
            'settings'        => 'footer-top-height',
            'input_attrs'     => array(
                'min'  => 0,
                'max'  => 1000,
                'step' => 1,
            ),
        )
    )
);

/*Footer Top Styling*/
$wp_customize->add_setting('footer-top-margin-padding-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-top-margin-padding-msg',
        array(
            'label'   => esc_html__('Margin & Padding', 'cosmoswp'),
            'section' => $this->footer_top,
        )
    )
);

/*Footer margin*/
$wp_customize->add_setting('footer-top-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-top-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-top-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->footer_top,
            'settings' => 'footer-top-margin',
        ),
        array(),
        array()
    )
);

/*Footer padding*/
$wp_customize->add_setting('footer-top-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-top-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-top-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->footer_top,
            'settings' => 'footer-top-padding',
        ),
        array(),
        array()
    )
);

/*Background Styling*/
$wp_customize->add_setting('footer-top-bg-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-top-bg-styling-msg',
        array(
            'label'   => esc_html__('Background Options', 'cosmoswp'),
            'section' => $this->footer_top,
        )
    )
);

/*Inherit Options*/
$choices = cosmoswp_footer_bg_options();
$wp_customize->add_setting('footer-top-bg-options', array(
    'default'           => $footer_defaults['footer-top-bg-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('footer-top-bg-options', array(
    'label'    => esc_html__('Background Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->footer_top,
    'settings' => 'footer-top-bg-options',
    'choices'  => $choices
));

/*Background Styling*/
$wp_customize->add_setting('footer-top-background-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $footer_defaults['footer-top-background-options'],
    'transport'         => 'postMessage'
));
$background_image_size_options       = cosmoswp_background_image_size_options();
$background_image_position_options   = cosmoswp_background_image_position_options();
$background_image_repeat_options     = cosmoswp_background_image_repeat_options();
$background_image_attachment_options = cosmoswp_background_image_attachment_options();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-top-background-options',
        array(
            'label'           => esc_html__('Background Option', 'cosmoswp'),
            'section'         => $this->footer_top,
            'settings'        => 'footer-top-background-options',
            'active_callback' => 'cosmoswp_footer_top_bg_if_custom'
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

/*Footer top border style*/
$wp_customize->add_setting('footer-top-border-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-top-border-styling-msg',
        array(
            'label'   => esc_html__('Border & Box Options', 'cosmoswp'),
            'section' => $this->footer_top,
        )
    )
);

/*Footer top border style*/
$wp_customize->add_setting('footer-top-border-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $footer_defaults['footer-top-border-styling'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-top-border-styling',
        array(
            'label'    => esc_html__('Border & Box Shadow', 'cosmoswp'),
            'section'  => $this->footer_top,
            'settings' => 'footer-top-border-styling',
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

/*Background Styling*/
$wp_customize->add_setting('footer-top-widget-title-setting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-top-widget-title-setting-msg',
        array(
            'label'   => esc_html__('Widget Title Styling', 'cosmoswp'),
            'section' => $this->footer_top,
        )
    )
);

/*Title align*/
$wp_customize->add_setting('footer-top-widget-title-align', array(
    'default'           => $footer_defaults['footer-top-widget-title-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_text_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'footer-top-widget-title-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Title Alignment', 'cosmoswp'),
            'section'  => $this->footer_top,
            'settings' => 'footer-top-widget-title-align',
        )
    )
);

/*Title Color*/
$wp_customize->add_setting('footer-top-widget-title-color', array(
    'default'           => $footer_defaults['footer-top-widget-title-color'],
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'footer-top-widget-title-color',
        array(
            'label'    => esc_html__('Title Color', 'cosmoswp'),
            'section'  => $this->footer_top,
            'settings' => 'footer-top-widget-title-color',
            'type'     => 'color'
        )
    )
);

/*Margin*/
$wp_customize->add_setting('footer-top-widget-title-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-top-widget-title-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-top-widget-title-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->footer_top,
            'settings' => 'footer-top-widget-title-margin',
        ),
        array(),
        array()
    )
);

/*Padding*/
$wp_customize->add_setting('footer-top-widget-title-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-top-widget-title-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-top-widget-title-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->footer_top,
            'settings' => 'footer-top-widget-title-padding',
        ),
        array(),
        array()
    )
);

/*Border*/
$wp_customize->add_setting('footer-top-widget-title-border-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $footer_defaults['footer-top-widget-title-border-styling'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-top-widget-title-border-styling',
        array(
            'label'    => esc_html__('Border', 'cosmoswp'),
            'section'  => $this->footer_top,
            'settings' => 'footer-top-widget-title-border-styling',
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
            'border-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Border Color', 'cosmoswp'),
            ),
        )
    )
);

/*Typography Options*/
$wp_customize->add_setting('footer-top-widget-title-typography-options', array(
    'default'           => $footer_defaults['footer-top-widget-title-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_inherit_options();
$wp_customize->add_control('footer-top-widget-title-typography-options', array(
    'label'    => esc_html__('Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->footer_top,
    'settings' => 'footer-top-widget-title-typography-options',
    'choices'  => $choices
));

/*Typography data*/
$wp_customize->add_setting('footer-top-widget-title-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $footer_defaults['footer-top-widget-title-typography'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-top-widget-title-typography',
        array(
            'label'           => esc_html__('Typography', 'cosmoswp'),
            'section'         => $this->footer_top,
            'active_callback' => 'cosmoswp_footer_top_widget_title_typography_if_custom',
            'settings'        => 'footer-top-widget-title-typography',
        ),
        cosmoswp_typography_group_fields()
    )
);


/*Background Styling*/
$wp_customize->add_setting('footer-top-widget-content-setting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-top-widget-content-setting-msg',
        array(
            'label'   => esc_html__('Widget Content Styling', 'cosmoswp'),
            'section' => $this->footer_top,
        )
    )
);

/*Title align*/
$wp_customize->add_setting('footer-top-widget-content-align', array(
    'default'           => $footer_defaults['footer-top-widget-content-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_text_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'footer-top-widget-content-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Content Alignment', 'cosmoswp'),
            'section'  => $this->footer_top,
            'settings' => 'footer-top-widget-content-align',
        )
    )
);


/*Color Options*/
$wp_customize->add_setting('footer-top-widget-content-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $footer_defaults['footer-top-widget-content-color-options'],
    'transport'         => 'postMessage',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-top-widget-content-color-options',
        array(
            'label'    => esc_html__('Color Options', 'cosmoswp'),
            'section'  => $this->footer_top,
            'settings' => 'footer-top-widget-content-color-options',
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

/*Border*/
$wp_customize->add_setting('footer-top-widget-content-border-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $footer_defaults['footer-top-widget-content-border-styling'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-top-widget-content-border-styling',
        array(
            'label'    => esc_html__('Border', 'cosmoswp'),
            'section'  => $this->footer_top,
            'settings' => 'footer-top-widget-content-border-styling',
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

/*Typography Options*/
$wp_customize->add_setting('footer-top-widget-content-typography-options', array(
    'default'           => $footer_defaults['footer-top-widget-content-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_inherit_options();
$wp_customize->add_control('footer-top-widget-content-typography-options', array(
    'label'    => esc_html__('Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->footer_top,
    'settings' => 'footer-top-widget-content-typography-options',
    'choices'  => $choices
));

/*Typography data*/
$wp_customize->add_setting('footer-top-widget-content-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $footer_defaults['footer-top-widget-content-typography'],
    'transport'         => 'postMessage'
));

$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-top-widget-content-typography',
        array(
            'label'           => esc_html__('Typography', 'cosmoswp'),
            'section'         => $this->footer_top,
            'active_callback' => 'cosmoswp_footer_top_widget_content_typography_if_custom',
            'settings'        => 'footer-top-widget-content-typography',
        ),
        cosmoswp_typography_group_fields()
    )
);
