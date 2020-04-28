<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Html section*/
$wp_customize->add_section($this->html, array(
    'title' => esc_html__('HTML', 'cosmoswp'),
    'panel' => $this->panel,
));

/*HTML 1*/
$wp_customize->add_setting('html-container', array(
    'default'           => $header_defaults['html-container'],
    'sanitize_callback' => 'cosmoswp_sanitize_allowed_html',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('html-container', array(
    'label'       => esc_html__('HTML', 'cosmoswp'),
    'description' => esc_html__('Enter Text/Simple HTML Code', 'cosmoswp'),
    'section'     => $this->html,
    'settings'    => 'html-container',
    'type'        => 'textarea',
));

/*Text Color*/
$wp_customize->add_setting('header-html-text-color', array(
    'default'           => $header_defaults['header-html-text-color'],
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'header-html-text-color',
        array(
            'label'    => esc_html__('Text Color', 'cosmoswp'),
            'section'  => $this->html,
            'settings' => 'header-html-text-color',
            'type'     => 'color'
        )
    )
);

/*Margin & Padding Msg*/
$wp_customize->add_setting('html-padding-margin-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'html-padding-margin-msg',
        array(
            'label'   => esc_html__('Margin & Padding', 'cosmoswp'),
            'section' => $this->html
        )
    )
);

/* Margin*/
$wp_customize->add_setting('html-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['html-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'html-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->html,
            'settings' => 'html-margin',
        ),
        array(),
        array()
    )
);

/* Padding*/
$wp_customize->add_setting('html-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['html-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'html-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->html,
            'settings' => 'html-padding',
        ),
        array(),
        array()
    )
);

/*HTML 1 Styling Msg*/
$wp_customize->add_setting('html-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'html-styling-msg',
        array(
            'label'   => esc_html__('Html Styling', 'cosmoswp'),
            'section' => $this->html,
        )
    )
);

/*Typography Options*/
$wp_customize->add_setting('html-typography-options', array(
    'default'           => $header_defaults['html-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_inherit_options();
$wp_customize->add_control('html-typography-options', array(
    'label'    => esc_html__('Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->html,
    'settings' => 'html-typography-options',
    'choices'  => $choices
));

/*Typography data*/
$wp_customize->add_setting('html-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $header_defaults['html-typography'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'html-typography',
        array(
            'label'           => esc_html__('Typography', 'cosmoswp'),
            'section'         => $this->html,
            'active_callback' => 'cosmoswp_html_typography_if_custom',
            'settings'        => 'html-typography',
        ),
        cosmoswp_sub_typography_group_fields()
    )
);