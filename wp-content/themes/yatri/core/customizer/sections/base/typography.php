<?php


$wp_customize->add_section(new Mantrabrain_Theme_Customizer_Section($wp_customize, 'yatri_theme_base_typography', array(
    'title' => esc_html__('Typography', 'yatri'),
    'panel' => YATRI_THEME_OPTION_PANEL,
    'section' => 'yatri_section_base_options',
    'priority' => 20,
)));


/// Body and paragraph
$wp_customize->add_setting(yatri_get_customizer_id('body_and_paragraph_typography'),
    array(
        'default' => $default['body_and_paragraph_typography'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' => 'postMessage',


    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('body_and_paragraph_typography'),
        array(
            'label' => esc_html__('Body Typography', 'yatri'),
            'section' => 'yatri_theme_base_typography',
            'priority' => 10,
            'type' => 'yatri-style',

        )
    )
);

/// H1 Typography
$wp_customize->add_setting(yatri_get_customizer_id('h1_typography'),
    array(
        'default' => $default['h1_typography'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' => 'postMessage',


    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('h1_typography'),
        array(
            'label' => esc_html__('H1 Typography', 'yatri'),
            'section' => 'yatri_theme_base_typography',
            'priority' => 30,
            'type' => 'yatri-style',

        )
    )
);


/// H2 Typography
$wp_customize->add_setting(yatri_get_customizer_id('h2_typography'),
    array(
        'default' => $default['h2_typography'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' => 'postMessage',


    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('h2_typography'),
        array(
            'label' => esc_html__('H2 Typography', 'yatri'),
            'section' => 'yatri_theme_base_typography',
            'priority' => 50,
            'type' => 'yatri-style',

        )
    )
);


/// h3 Typography
$wp_customize->add_setting(yatri_get_customizer_id('h3_typography'),
    array(
        'default' => $default['h3_typography'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' => 'postMessage',


    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('h3_typography'),
        array(
            'label' => esc_html__('H3 Typography', 'yatri'),
            'section' => 'yatri_theme_base_typography',
            'priority' => 70,
            'type' => 'yatri-style',

        )
    )
);

/// h4 Typography
$wp_customize->add_setting(yatri_get_customizer_id('h4_typography'),
    array(
        'default' => $default['h4_typography'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' => 'postMessage',


    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('h4_typography'),
        array(
            'label' => esc_html__('H4 Typography', 'yatri'),
            'section' => 'yatri_theme_base_typography',
            'priority' => 90,
            'type' => 'yatri-style',

        )
    )
);

/// h5 Typography
$wp_customize->add_setting(yatri_get_customizer_id('h5_typography'),
    array(
        'default' => $default['h5_typography'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' => 'postMessage',


    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('h5_typography'),
        array(
            'label' => esc_html__('H5 Typography', 'yatri'),
            'section' => 'yatri_theme_base_typography',
            'priority' => 110,
            'type' => 'yatri-style',

        )
    )
);

/// h6 Typography
$wp_customize->add_setting(yatri_get_customizer_id('h6_typography'),
    array(
        'default' => $default['h6_typography'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' => 'postMessage',


    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('h6_typography'),
        array(
            'label' => esc_html__('H6 Typography', 'yatri'),
            'section' => 'yatri_theme_base_typography',
            'priority' => 130,
            'type' => 'yatri-style',

        )
    )
);