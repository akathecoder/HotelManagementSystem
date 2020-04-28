<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Html section*/
$wp_customize->add_section($this->footer_html, array(
    'title' => esc_html__('HTML', 'cosmoswp'),
    'panel' => $this->panel,
    'priority' => 100,
));

/*HTML  Container*/
$wp_customize->add_setting('footer-html-container', array(
    'capability'        => 'edit_theme_options',
    'default'           => $footer_defaults['footer-html-container'],
    'sanitize_callback' => 'cosmoswp_sanitize_allowed_html',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('footer-html-container', array(
    'label'       => esc_html__('HTML', 'cosmoswp'),
    'description' => esc_html__('Enter HTML Code', 'cosmoswp'),
    'section'     => $this->footer_html,
    'settings'    => 'footer-html-container',
    'type'        => 'textarea',
));

/*Text Color*/
$wp_customize->add_setting('footer-html-text-color', array(
    'default'           => $footer_defaults['footer-html-text-color'],
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'footer-html-text-color',
        array(
            'label'    => esc_html__('Color', 'cosmoswp'),
            'section'  => $this->footer_html,
            'settings' => 'footer-html-text-color',
            'type'     => 'color'
        )
    )
);

/*Margin & Padding Msg*/
$wp_customize->add_setting('footer-html-padding-margin-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-html-padding-margin-msg',
        array(
            'label'   => esc_html__('Margin & Padding', 'cosmoswp'),
            'section' => $this->footer_html
        )
    )
);

/* Margin*/
$wp_customize->add_setting('footer-html-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-html-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-html-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->footer_html,
            'settings' => 'footer-html-margin',
        ),
        array(),
        array()
    )
);

/* Padding*/
$wp_customize->add_setting('footer-html-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-html-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-html-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->footer_html,
            'settings' => 'footer-html-padding',
        ),
        array(),
        array()
    )
);

/*HTML Typography Msg*/
$wp_customize->add_setting('footer-html-typography-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-html-typography-msg',
        array(
            'label'   => esc_html__('Typography', 'cosmoswp'),
            'section' => $this->footer_html,
        )
    )
);

/*HTML Typography Options*/
$wp_customize->add_setting('footer-html-typography-options', array(
    'default'           => $footer_defaults['footer-html-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_inherit_options();
$wp_customize->add_control('footer-html-typography-options', array(
    'label'    => esc_html__('Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->footer_html,
    'settings' => 'footer-html-typography-options',
    'choices'  => $choices
));

/*Typography data*/
$wp_customize->add_setting('footer-html-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $footer_defaults['footer-html-typography'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-html-typography',
        array(
            'label'           => esc_html__('Typography', 'cosmoswp'),
            'section'         => $this->footer_html,
            'active_callback' => 'cosmoswp_footer_html_typography_if_custom',
            'settings'        => 'footer-html-typography',
        ),
        cosmoswp_sub_typography_group_fields()
    )
);
