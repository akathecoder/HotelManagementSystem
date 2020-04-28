<?php

$wp_customize->add_section(new Mantrabrain_Theme_Customizer_Section(
    $wp_customize, 'yatri_section_header_templates_options', array(
    'title' => esc_html__('Header Templates', 'yatri'),
    'panel' => YATRI_THEME_OPTION_PANEL,
    'section' => 'yatri_section_header_options',
    'priority' => 100,
)));

// Header Templates
$wp_customize->add_setting(yatri_get_customizer_id('header_templates'),
    array(
        'default' => $default['header_templates'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Template(
        $wp_customize,
        yatri_get_customizer_id('header_templates'),
        array(
            'label' => esc_html__('Save Template', 'yatri'),
            'section' => 'yatri_section_header_templates_options',
            'priority' => 20,
            'template_id' => 'header'

        )
    )
);