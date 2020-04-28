<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Footer Row Section and Setting*/
$wp_customize->add_section($this->footer_bottom, array(
    'title'    => esc_html__('Footer Bottom', 'cosmoswp'),
    'priority' => 70,
    'panel'    => $this->panel,
));

/*Footer Bottom Styling*/
$wp_customize->add_setting('footer-bottom-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-bottom-styling-msg',
        array(
            'label'   => esc_html__('Footer Bottom Height', 'cosmoswp'),
            'section' => $this->footer_bottom,
        )
    )
);

/*Footer Bottom Height Option*/
$wp_customize->add_setting('footer-bottom-height-option', array(
    'default'           => $footer_defaults['footer-bottom-height-option'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_footer_height_option();
$wp_customize->add_control('footer-bottom-height-option', array(
    'label'    => esc_html__('Height Option', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->footer_bottom,
    'settings' => 'footer-bottom-height-option',
    'choices'  => $choices
));

/*Footer Bottom Height*/
$wp_customize->add_setting('footer-bottom-height', array(
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'default'           => $footer_defaults['footer-bottom-height'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'footer-bottom-height',
        array(
            'label'           => esc_html__('Footer Bottom Height (px)', 'cosmoswp'),
            'section'         => $this->footer_bottom,
            'settings'        => 'footer-bottom-height',
            'input_attrs'     => array(
                'min'  => 0,
                'max'  => 1000,
                'step' => 1,
            ),
            'active_callback' => 'cosmoswp_footer_bottom_height_if_custom',
        )
    )
);

/*Margin & Padding Msg*/
$wp_customize->add_setting('footer-bottom-padding-margin-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-bottom-padding-margin-msg',
        array(
            'label'   => esc_html__('Margin & Padding', 'cosmoswp'),
            'section' => $this->footer_bottom,
        )
    )
);

/*Footer margin*/
$wp_customize->add_setting('footer-bottom-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-bottom-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-bottom-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->footer_bottom,
            'settings' => 'footer-bottom-margin',
        ),
        array(),
        array()
    )
);

/*Footer padding*/
$wp_customize->add_setting('footer-bottom-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-bottom-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-bottom-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->footer_bottom,
            'settings' => 'footer-bottom-padding',
        ),
        array(),
        array()
    )
);

/*Background Styling*/
$wp_customize->add_setting('footer-bottom-bg-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-bottom-bg-styling-msg',
        array(
            'label'   => esc_html__('Background Options', 'cosmoswp'),
            'section' => $this->footer_bottom,
        )
    )
);

/*Inherit Options*/
$wp_customize->add_setting('footer-bottom-bg-options', array(
    'default'           => $footer_defaults['footer-bottom-bg-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_header_bg_options();
$wp_customize->add_control('footer-bottom-bg-options', array(
    'label'    => esc_html__('Background Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->footer_bottom,
    'settings' => 'footer-bottom-bg-options',
    'choices'  => $choices
));

/*Background Styling*/
$wp_customize->add_setting('footer-bottom-background-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $footer_defaults['footer-bottom-background-options'],
    'transport'         => 'postMessage'
));
$background_image_size_options       = cosmoswp_background_image_size_options();
$background_image_position_options   = cosmoswp_background_image_position_options();
$background_image_repeat_options     = cosmoswp_background_image_repeat_options();
$background_image_attachment_options = cosmoswp_background_image_attachment_options();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-bottom-background-options',
        array(
            'label'           => esc_html__('Background Option', 'cosmoswp'),
            'section'         => $this->footer_bottom,
            'settings'        => 'footer-bottom-background-options',
            'active_callback' => 'cosmoswp_footer_bottom_bg_if_custom'
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
$wp_customize->add_setting('footer-bottom-border-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-bottom-border-styling-msg',
        array(
            'label'   => esc_html__('Border Options', 'cosmoswp'),
            'section' => $this->footer_bottom,
        )
    )
);

/*Footer top border style*/
$wp_customize->add_setting('footer-bottom-border-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $footer_defaults['footer-bottom-border-styling'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-bottom-border-styling',
        array(
            'label'    => esc_html__('Border', 'cosmoswp'),
            'section'  => $this->footer_bottom,
            'settings' => 'footer-bottom-border-styling',
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
                    'link_text'   => esc_html__('Link', 'cosmoswp'),
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
$wp_customize->add_setting('footer-bottom-widget-title-setting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-bottom-widget-title-setting-msg',
        array(
            'label'   => esc_html__('Widget Title Styling', 'cosmoswp'),
            'section' => $this->footer_bottom,
        )
    )
);

/*Title align*/
$wp_customize->add_setting('footer-bottom-widget-title-align', array(
    'default'           => $footer_defaults['footer-bottom-widget-title-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_text_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'footer-bottom-widget-title-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Title Alignment', 'cosmoswp'),
            'section'  => $this->footer_bottom,
            'settings' => 'footer-bottom-widget-title-align',
        )
    )
);

/*Title Color*/
$wp_customize->add_setting('footer-bottom-widget-title-color', array(
    'default'           => $footer_defaults['footer-bottom-widget-title-color'],
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'footer-bottom-widget-title-color',
        array(
            'label'    => esc_html__('Title Color', 'cosmoswp'),
            'section'  => $this->footer_bottom,
            'settings' => 'footer-bottom-widget-title-color',
            'type'     => 'color'
        )
    )
);

/*Margin*/
$wp_customize->add_setting('footer-bottom-widget-title-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-bottom-widget-title-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-bottom-widget-title-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->footer_bottom,
            'settings' => 'footer-bottom-widget-title-margin',
        ),
        array(),
        array()
    )
);

/*Padding*/
$wp_customize->add_setting('footer-bottom-widget-title-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-bottom-widget-title-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-bottom-widget-title-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->footer_bottom,
            'settings' => 'footer-bottom-widget-title-padding',
        ),
        array(),
        array()
    )
);

/* Footer Border Options*/
$wp_customize->add_setting('footer-bottom-widget-title-border-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $footer_defaults['footer-bottom-widget-title-border-styling'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-bottom-widget-title-border-styling',
        array(
            'label'    => esc_html__('Border', 'cosmoswp'),
            'section'  => $this->footer_bottom,
            'settings' => 'footer-bottom-widget-title-border-styling',
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
                    'link_text'   => esc_html__('Link', 'cosmoswp'),
                ),
            ),
            'border-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Border Color', 'cosmoswp'),
            ),
        )
    )
);

/* Footer Typography Options*/
$wp_customize->add_setting('footer-bottom-widget-title-typography-options', array(
    'default'           => $footer_defaults['footer-bottom-widget-title-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_inherit_options();
$wp_customize->add_control('footer-bottom-widget-title-typography-options', array(
    'label'    => esc_html__('Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->footer_bottom,
    'settings' => 'footer-bottom-widget-title-typography-options',
    'choices'  => $choices
));

/*Typography data*/
$wp_customize->add_setting('footer-bottom-widget-title-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $footer_defaults['footer-bottom-widget-title-typography'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-bottom-widget-title-typography',
        array(
            'label'           => esc_html__('Typography', 'cosmoswp'),
            'section'         => $this->footer_bottom,
            'active_callback' => 'cosmoswp_footer_bottom_widget_title_typography_if_custom',
            'settings'        => 'footer-bottom-widget-title-typography',
        ),
        cosmoswp_typography_group_fields()
    )
);



/*Background Styling*/
$wp_customize->add_setting('footer-bottom-widget-content-setting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-bottom-widget-content-setting-msg',
        array(
            'label'   => esc_html__('Widget Content Styling', 'cosmoswp'),
            'section' => $this->footer_bottom,
        )
    )
);

/*Title align*/
$wp_customize->add_setting('footer-bottom-widget-content-align', array(
    'default'           => $footer_defaults['footer-bottom-widget-content-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_text_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'footer-bottom-widget-content-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Content Alignment', 'cosmoswp'),
            'section'  => $this->footer_bottom,
            'settings' => 'footer-bottom-widget-content-align',
        )
    )
);


/*Color Options*/
$wp_customize->add_setting('footer-bottom-widget-content-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $footer_defaults['footer-bottom-widget-content-color-options'],
    'transport'         => 'postMessage',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-bottom-widget-content-color-options',
        array(
            'label'    => esc_html__('Color Options', 'cosmoswp'),
            'section'  => $this->footer_bottom,
            'settings' => 'footer-bottom-widget-content-color-options',
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

/*Footer Border Options*/
$wp_customize->add_setting('footer-bottom-widget-content-border-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $footer_defaults['footer-bottom-widget-content-border-styling'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-bottom-widget-content-border-styling',
        array(
            'label'    => esc_html__('Border', 'cosmoswp'),
            'section'  => $this->footer_bottom,
            'settings' => 'footer-bottom-widget-content-border-styling',
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
                    'link_text'   => esc_html__('Link', 'cosmoswp'),
                ),
            ),
            'border-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Border Color', 'cosmoswp'),
            ),
        )
    )
);

/*Footer Elements Starts from here*/
$wp_customize->add_section(
    new CosmosWP_WP_Customize_Section_H3($wp_customize, 'cosmoswp_footer_elements_seperator', array(
            'title'    => esc_html__('Footer Elements', 'cosmoswp'),
            'panel'    => $this->panel,
            'priority' => 80,
        )
    ));

/* Footer Typography Options*/
$wp_customize->add_setting('footer-bottom-widget-content-typography-options', array(
    'default'           => $footer_defaults['footer-bottom-widget-content-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_inherit_options();
$wp_customize->add_control('footer-bottom-widget-content-typography-options', array(
    'label'    => esc_html__('Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->footer_bottom,
    'settings' => 'footer-bottom-widget-content-typography-options',
    'choices'  => $choices
));

/*Typography data*/
$wp_customize->add_setting('footer-bottom-widget-content-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $footer_defaults['footer-bottom-widget-content-typography'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-bottom-widget-content-typography',
        array(
            'label'           => esc_html__('Typography', 'cosmoswp'),
            'section'         => $this->footer_bottom,
            'active_callback' => 'cosmoswp_footer_bottom_widget_content_typography_if_custom',
            'settings'        => 'footer-bottom-widget-content-typography',
        ),
        cosmoswp_typography_group_fields()
    )
);

