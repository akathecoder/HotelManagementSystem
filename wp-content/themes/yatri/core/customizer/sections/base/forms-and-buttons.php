<?php


$wp_customize->add_section(new Mantrabrain_Theme_Customizer_Section($wp_customize, 'yatri_theme_base_form_and_buttons', array(
    'title' => esc_html__('Forms & Buttons', 'yatri'),
    'panel' => YATRI_THEME_OPTION_PANEL,
    'section' => 'yatri_section_base_options',
    'priority' => 40,
)));


// Button Heading
$wp_customize->add_setting(
    'yatri_button_style_design_heading',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Heading(
        $wp_customize,
        'yatri_button_style_design_heading',
        array(
            'label' => esc_html__('Button', 'yatri'),
            'section' => 'yatri_theme_base_form_and_buttons',
            'priority' => 20,

        )
    )
);
/// Yatri Button Style Design
$wp_customize->add_setting(yatri_get_customizer_id('yatri_button_style_design'),
    array(
        'default' => $default['yatri_button_style_design'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' 			=> 'postMessage',


    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('yatri_button_style_design'),
        array(
            'label' => esc_html__('Design & Styling', 'yatri'),
            'section' => 'yatri_theme_base_form_and_buttons',
            'priority' => 40,
            'type' => 'yatri-style',

        )
    )
);

// Button Heading
$wp_customize->add_setting(
    'yatri_form_style_design_heading',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Heading(
        $wp_customize,
        'yatri_form_style_design_heading',
        array(
            'label' => esc_html__('Form & Inputs', 'yatri'),
            'section' => 'yatri_theme_base_form_and_buttons',
            'priority' => 60,

        )
    )
);

/// Yatri Form Style Design
$wp_customize->add_setting(yatri_get_customizer_id('yatri_form_style_design'),
    array(
        'default' => $default['yatri_form_style_design'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' 			=> 'postMessage',


    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('yatri_form_style_design'),
        array(
            'label' => esc_html__('Design & Styling', 'yatri'),
            'section' => 'yatri_theme_base_form_and_buttons',
            'priority' => 80,
            'type' => 'yatri-style',

        )
    )
);