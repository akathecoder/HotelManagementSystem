<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Copyright
 */
/*Adding sections for footer options*/
$wp_customize->add_section($this->copyright, array(
    'priority'   => 80,
    'capability' => 'edit_theme_options',
    'title'      => esc_html__('Copyright', 'cosmoswp'),
    'panel'      => cosmoswp_footer_builder()->panel,
));

/*Footer Copyright*/
$wp_customize->add_setting($this->copyright, array(
    'capability'        => 'edit_theme_options',
    'default'           => $footer_defaults['footer_copyright'],
    'sanitize_callback' => 'wp_kses_post',
    'transport'         => 'postMessage'
));
$wp_customize->add_control($this->copyright, array(
    'label'       => esc_html__('Copyright Text', 'cosmoswp'),
    'description' => esc_html__('Enter Arbitrary HTML Code . Available tags: {current_year}, {site_title}, {theme_author}', 'cosmoswp'),
    'section'     => $this->copyright,
    'settings'    => $this->copyright,
    'type'        => 'textarea'
));

/*Text Color*/
$wp_customize->add_setting('footer-copyright-text-color', array(
    'default'           => $footer_defaults['footer-copyright-text-color'],
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'footer-copyright-text-color',
        array(
            'label'    => esc_html__('Color', 'cosmoswp'),
            'section'  => $this->copyright,
            'settings' => 'footer-copyright-text-color',
            'type'     => 'color'
        )
    )
);

/*Copyright Information Msg*/
$wp_customize->add_setting('footer-copyright-align-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-copyright-align-msg',
        array(
            'label'   => esc_html__('Alignment ', 'cosmoswp'),
            'section' => $this->copyright
        )
    )
);

/*Copyright Information align*/
$wp_customize->add_setting('footer-copyright-align', array(
    'default'           => $footer_defaults['footer-copyright-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_field_responsive_buttonset',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_text_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Responsive_Buttonset(
        $wp_customize,
        'footer-copyright-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Copyright Alignment', 'cosmoswp'),
            'section'  => $this->copyright,
            'settings' => 'footer-copyright-align',
        )
    )
);

/*Copyright Styling*/
$wp_customize->add_setting('footer-padding-margin-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-padding-margin-styling-msg',
        array(
            'label'   => esc_html__('Margin & Padding', 'cosmoswp'),
            'section' => $this->copyright,
        )
    )
);

/*Footer margin*/
$wp_customize->add_setting('footer-copyright-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-copyright-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-copyright-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->copyright,
            'settings' => 'footer-copyright-margin',
        ),
        array(),
        array()
    )
);

/*Footer padding*/
$wp_customize->add_setting('footer-copyright-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-copyright-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-copyright-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->copyright,
            'settings' => 'footer-copyright-padding',
        ),
        array(),
        array()
    )
);

/*Typography options*/
$wp_customize->add_setting('footer-copyright-typography-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-copyright-typography-styling-msg',
        array(
            'label'   => esc_html__('Typography', 'cosmoswp'),
            'section' => $this->copyright,
        )
    )
);

/* Footer Typography Options*/
$wp_customize->add_setting('footer-copyright-typography-options', array(
    'default'           => $footer_defaults['footer-copyright-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_inherit_options();
$wp_customize->add_control('footer-copyright-typography-options', array(
    'label'    => esc_html__('Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->copyright,
    'settings' => 'footer-copyright-typography-options',
    'choices'  => $choices
));

/* Footer Typography data*/
$wp_customize->add_setting('footer-copyright-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $footer_defaults['footer-copyright-typography'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-copyright-typography',
        array(
            'label'           => esc_html__('Typography', 'cosmoswp'),
            'section'         => $this->copyright,
            'settings'        => 'footer-copyright-typography',
            'active_callback' => 'cosmoswp_copyright_typography_if_custom',
        ),
        cosmoswp_typography_group_fields()
    )
);