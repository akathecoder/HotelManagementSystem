<?php

$wp_customize->add_section(new Mantrabrain_Theme_Customizer_Section(
    $wp_customize, 'yatri_section_prebuilt_header_templates_options', array(
    'title' => esc_html__('Prebuilt Header Templates', 'yatri'),
    'panel' => YATRI_THEME_OPTION_PANEL,
    'section' => 'yatri_section_header_options',
    'priority' => 120,
)));

// Header Templates
$wp_customize->add_setting(yatri_get_customizer_id('prebuilt_header_templates'),
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Yatri_Tools_Prebuilt_Header_Templates(
        $wp_customize,
        yatri_get_customizer_id('prebuilt_header_templates'),
        array(
            'label' => esc_html__('Prebuilt Header Templates', 'yatri'),
            'section' => 'yatri_section_prebuilt_header_templates_options',
            'priority' => 20,
            'type' => 'yatri-prebuilt-header',
            'templates' => yatri_tools_all_header_templates()

        )
    )
);