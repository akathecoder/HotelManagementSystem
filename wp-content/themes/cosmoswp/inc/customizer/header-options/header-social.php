<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Adding sections for header social options */
$wp_customize->add_section($this->header_social, array(
    'title' => esc_html__('Header Social Icons', 'cosmoswp'),
    'panel' => $this->panel,
));

/*Header social data*/
$wp_customize->add_setting('header-social-icon-data', array(
    'sanitize_callback' => 'cosmoswp_sanitize_social_data',
    'default'           => $header_defaults['header-social-icon-data'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Repeater_Control(
        $wp_customize,
        'header-social-icon-data',
        array(
            'label'                      => esc_html__('Social Options Selection', 'cosmoswp'),
            'description'                => esc_html__('Select Social Icons and enter link', 'cosmoswp'),
            'section'                    => $this->header_social,
            'settings'                   => 'header-social-icon-data',
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

/*Header Social Icons Styling Msg*/
$wp_customize->add_setting('header-social-icon-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'header-social-icon-styling-msg',
        array(
            'label'   => esc_html__('Icons Styling', 'cosmoswp'),
            'section' => $this->header_social,
        )
    )
);

/*social Icon align*/
$wp_customize->add_setting('header-social-icon-align', array(
    'default'           => $header_defaults['header-social-icon-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_field_responsive_buttonset',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_text_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Responsive_Buttonset(
        $wp_customize,
        'header-social-icon-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Icon Alignment', 'cosmoswp'),
            'section'  => $this->header_social,
            'settings' => 'header-social-icon-align',
        )
    )
);

/*Icon size*/
$wp_customize->add_setting('header-social-icon-size', array(
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'default'           => $header_defaults['header-social-icon-size'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'header-social-icon-size',
        array(
            'label'       => esc_html__('Icon Size (px)', 'cosmoswp'),
            'section'     => $this->header_social,
            'settings'    => 'header-social-icon-size',
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 100,
                'step' => 1,
            ),
        )
    )
);

/*Icon radius*/
$wp_customize->add_setting('header-social-icon-radius', array(
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'default'           => $header_defaults['header-social-icon-radius'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'header-social-icon-radius',
        array(
            'label'       => esc_html__('Icon Radius (px)', 'cosmoswp'),
            'section'     => $this->header_social,
            'settings'    => 'header-social-icon-radius',
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 100,
                'step' => 1,
            ),
        )
    )
);

/*Icon width*/
$wp_customize->add_setting('header-social-icon-width', array(
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'default'           => $header_defaults['header-social-icon-width'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'header-social-icon-width',
        array(
            'label'       => esc_html__('Icon Width (px)', 'cosmoswp'),
            'section'     => $this->header_social,
            'settings'    => 'header-social-icon-width',
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 100,
                'step' => 1,
            ),
        )
    )
);

/*Icon height*/
$wp_customize->add_setting('header-social-icon-height', array(
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'default'           => $header_defaults['header-social-icon-height'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'header-social-icon-height',
        array(
            'label'       => esc_html__('Icon Height (px)', 'cosmoswp'),
            'section'     => $this->header_social,
            'settings'    => 'header-social-icon-height',
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 100,
                'step' => 1,
            ),
        )
    )
);

/*Icon height*/
$wp_customize->add_setting('header-social-icon-line-height', array(
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'default'           => $header_defaults['header-social-icon-line-height'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'header-social-icon-line-height',
        array(
            'label'       => esc_html__('Line Height (px)', 'cosmoswp'),
            'section'     => $this->header_social,
            'settings'    => 'header-social-icon-line-height',
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 100,
                'step' => 1,
            ),
        )
    )
);

/*Header Social Styling Msg*/
$wp_customize->add_setting('header-social-single-icon-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'header-social-single-icon-styling-msg',
        array(
            'label'   => esc_html__('Individual Icon Styling', 'cosmoswp'),
            'section' => $this->header_social,
        )
    )
);

/*Single margin*/
$wp_customize->add_setting('single-header-social-icon-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['single-header-social-icon-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'single-header-social-icon-margin',
        array(
            'label'    => esc_html__('Individual Icon Margin', 'cosmoswp'),
            'section'  => $this->header_social,
            'settings' => 'single-header-social-icon-margin',
        ),
        array(),
        array()
    )
);

/*Single padding*/
$wp_customize->add_setting('single-header-social-icon-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['single-header-social-icon-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'single-header-social-icon-padding',
        array(
            'label'    => esc_html__('Individual Icon Padding', 'cosmoswp'),
            'section'  => $this->header_social,
            'settings' => 'single-header-social-icon-padding',
        ),
        array(),
        array()
    )
);

/*Header Social Styling Msg*/
$wp_customize->add_setting('header-social-icon-section-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'header-social-icon-section-styling-msg',
        array(
            'label'   => esc_html__('Icon Section Styling', 'cosmoswp'),
            'section' => $this->header_social,
        )
    )
);

/*Margin*/
$wp_customize->add_setting('header-social-icon-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['header-social-icon-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'header-social-icon-margin',
        array(
            'label'    => esc_html__('Icon Section Margin', 'cosmoswp'),
            'section'  => $this->header_social,
            'settings' => 'header-social-icon-margin',
        ),
        array(),
        array()
    )
);

/*Padding*/
$wp_customize->add_setting('header-social-icon-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['header-social-icon-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'header-social-icon-padding',
        array(
            'label'    => esc_html__('Icon Section Padding', 'cosmoswp'),
            'section'  => $this->header_social,
            'settings' => 'header-social-icon-padding',
        ),
        array(),
        array()
    )
);