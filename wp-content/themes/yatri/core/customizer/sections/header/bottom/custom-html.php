<?php

// custom html
$wp_customize->add_setting(
    'bottom_header_custom_html_heading',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Heading(
        $wp_customize,
        'bottom_header_custom_html_heading',
        array(
            'label' => esc_html__('Custom HTML Settings', 'yatri'),
            'section' => 'yatri_section_bottom_header_options',
            'priority' => 2000,
            'active_callback' => 'yatri_is_bottom_header_custom_html_enabled'

        )
    )
);


// Bottom Header Editor

$wp_customize->add_setting(yatri_get_customizer_id('bottom_header_custom_html_content'),
    array(
        'default' => $default['bottom_header_custom_html_content'],
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'postMessage',


    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Editor(
        $wp_customize,
        yatri_get_customizer_id('bottom_header_custom_html_content'),
        array(
            'label' => esc_html__('Text/HTML Content', 'yatri'),
            'section' => 'yatri_section_bottom_header_options',
            'priority' => 2020,
            'active_callback' => 'yatri_is_bottom_header_custom_html_enabled',
            'type' => 'yatri_editor_control'


        )
    )
);

// Bottom Header Custom HTML Design

$wp_customize->add_setting(yatri_get_customizer_id('bottom_header_custom_html_design'),
    array(
        'default' => $default['bottom_header_custom_html_design'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' => 'postMessage',


    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('bottom_header_custom_html_design'),
        array(
            'label' => esc_html__('Design & Styling', 'yatri'),
            'section' => 'yatri_section_bottom_header_options',
            'priority' => 2040,
            'active_callback' => 'yatri_is_bottom_header_custom_html_enabled',
            'type' => 'yatri-style',

        )
    )
);


// Setting hide section.
$wp_customize->add_setting(yatri_get_customizer_id('bottom_header_custom_html_visibility'),
    array(
        'default' => $default['bottom_header_custom_html_visibility'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_switch_group'),
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Switch_Group(
        $wp_customize,
        yatri_get_customizer_id('bottom_header_custom_html_visibility'),
        array(
            'label' => esc_html__('Custom HTML Visibility', 'yatri'),
            'section' => 'yatri_section_bottom_header_options',
            'priority' => 2060,
            'active_callback' => 'yatri_is_bottom_header_custom_html_enabled',
            'switch_choices' => array(
                'desktop' => esc_html__('Hide on Desktop', 'yatri'),
                'tablet' => esc_html__('Hide on Tablet', 'yatri'),
                'mobile' => esc_html__('Hide on Mobile', 'yatri'),
            ),
            'attributes' => array(
                'on' => esc_html__('Show', 'yatri'),
                'off' => esc_html__('Hide', 'yatri'),
            )


        )
    )
);