<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Adding sections for footer social options */
$wp_customize->add_section($this->footer_social, array(
    'title'    => esc_html__('Social Icons', 'cosmoswp'),
    'panel'    => cosmoswp_footer_builder()->panel,
    'priority' => 100,
));

/*Repeater social data*/
$wp_customize->add_setting($this->footer_social, array(
    'sanitize_callback' => 'cosmoswp_sanitize_social_data',
    'default'           => $footer_defaults['footer_social'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Repeater_Control(
        $wp_customize,
        $this->footer_social,
        array(
            'label'                      => esc_html__('Social Options Selection', 'cosmoswp'),
            'description'                => esc_html__('Select Social Icons and enter link', 'cosmoswp'),
            'section'                    => $this->footer_social,
            'settings'                   => $this->footer_social,
            'repeater_main_label'        => esc_html__('Social Icon', 'cosmoswp'),
            'repeater_add_control_field' => esc_html__('Add New Icon', 'cosmoswp')
        ),
        array(
            'icon'             => array(
                'type'  => 'icons',
                'label' => esc_html__('Select Icon', 'cosmoswp'),
            ),
            'link'             => array(
                'type'  => 'url',
                'label' => esc_html__('Enter Link', 'cosmoswp'),
            ),
            'checkbox'         => array(
                'type'  => 'checkbox',
                'label' => esc_html__('Open in New Window', 'cosmoswp'),
            ),
            'icon-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Icon Color', 'cosmoswp'),
            ),
            'icon-hover-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Icon Hover Color', 'cosmoswp'),
            ),
            'bg-color'         => array(
                'type'  => 'color',
                'label' => esc_html__('Background Color', 'cosmoswp'),
            ),
            'bg-hover-color'   => array(
                'type'  => 'color',
                'label' => esc_html__('Background Hover Color', 'cosmoswp'),
            ),
        )
    )
);

/*Footer Social Icons Styling Msg*/
$wp_customize->add_setting('footer-social-icon-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-social-icon-styling-msg',
        array(
            'label'   => esc_html__('Icons Styling', 'cosmoswp'),
            'section' => $this->footer_social,
        )
    )
);

/*Social Icon align*/
$wp_customize->add_setting('footer-social-icon-align', array(
    'default'           => $footer_defaults['footer-social-icon-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_field_responsive_buttonset',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_flex_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Responsive_Buttonset(
        $wp_customize,
        'footer-social-icon-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Icon Alignment', 'cosmoswp'),
            'section'  => $this->footer_social,
            'settings' => 'footer-social-icon-align',
        )
    )
);

/*Icon size*/
$wp_customize->add_setting('footer-social-icon-size', array(
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'default'           => $footer_defaults['footer-social-icon-size'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'footer-social-icon-size',
        array(
            'label'       => esc_html__('Icon Size (px)', 'cosmoswp'),
            'section'     => $this->footer_social,
            'settings'    => 'footer-social-icon-size',
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 100,
                'step' => 1,
            ),
        )
    )
);

/*Icon radius*/
$wp_customize->add_setting('footer-social-icon-radius', array(
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'default'           => $footer_defaults['footer-social-icon-radius'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'footer-social-icon-radius',
        array(
            'label'       => esc_html__('Icon Radius (px)', 'cosmoswp'),
            'section'     => $this->footer_social,
            'settings'    => 'footer-social-icon-radius',
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 100,
                'step' => 1,
            ),
        )
    )
);

/*Icon width*/
$wp_customize->add_setting('footer-social-icon-width', array(
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'default'           => $footer_defaults['footer-social-icon-width'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'footer-social-icon-width',
        array(
            'label'       => esc_html__('Icon Width (px)', 'cosmoswp'),
            'section'     => $this->footer_social,
            'settings'    => 'footer-social-icon-width',
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 100,
                'step' => 1,
            ),
        )
    )
);

/*Icon height*/
$wp_customize->add_setting('footer-social-icon-height', array(
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'default'           => $footer_defaults['footer-social-icon-height'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'footer-social-icon-height',
        array(
            'label'       => esc_html__('Icon Height (px)', 'cosmoswp'),
            'section'     => $this->footer_social,
            'settings'    => 'footer-social-icon-height',
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 100,
                'step' => 1,
            ),
        )
    )
);

/*Icon height*/
$wp_customize->add_setting('footer-social-icon-line-height', array(
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'default'           => $footer_defaults['footer-social-icon-line-height'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'footer-social-icon-line-height',
        array(
            'label'       => esc_html__('Line Height (px)', 'cosmoswp'),
            'section'     => $this->footer_social,
            'settings'    => 'footer-social-icon-line-height',
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 100,
                'step' => 1,
            ),
        )
    )
);

/*Footer Social Styling Msg*/
$wp_customize->add_setting('footer-single-social-icon-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-single-social-icon-styling-msg',
        array(
            'label'   => esc_html__('Individual Icon Styling', 'cosmoswp'),
            'section' => $this->footer_social,
        )
    )
);

/*Individual margin*/
$wp_customize->add_setting('individual-footer-social-icon-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['individual-footer-social-icon-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'individual-footer-social-icon-margin',
        array(
            'label'    => esc_html__('Individual Icon Margin', 'cosmoswp'),
            'section'  => $this->footer_social,
            'settings' => 'individual-footer-social-icon-margin',
        ),
        array(),
        array()
    )
);

/*Individual padding*/
$wp_customize->add_setting('individual-footer-social-icon-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['individual-footer-social-icon-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'individual-footer-social-icon-padding',
        array(
            'label'    => esc_html__('Individual Icon Padding', 'cosmoswp'),
            'section'  => $this->footer_social,
            'settings' => 'individual-footer-social-icon-padding',
        ),
        array(),
        array()
    )
);

/*Footer Social Styling Msg*/
$wp_customize->add_setting('footer-social-icon-section-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-social-icon-section-styling-msg',
        array(
            'label'   => esc_html__('Icon Section Styling', 'cosmoswp'),
            'section' => $this->footer_social,
        )
    )
);

/*Margin*/
$wp_customize->add_setting('footer-social-icon-section-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-social-icon-section-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-social-icon-section-margin',
        array(
            'label'    => esc_html__('Icon Section Margin', 'cosmoswp'),
            'section'  => $this->footer_social,
            'settings' => 'footer-social-icon-section-margin',
        ),
        array(),
        array()
    )
);

/*Padding*/
$wp_customize->add_setting('footer-social-icon-section-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-social-icon-section-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-social-icon-section-padding',
        array(
            'label'    => esc_html__('Icon Section Padding', 'cosmoswp'),
            'section'  => $this->footer_social,
            'settings' => 'footer-social-icon-section-padding',
        ),
        array(),
        array()
    )
);