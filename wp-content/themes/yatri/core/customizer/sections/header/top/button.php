<?php

// Button section
$wp_customize->add_setting(
    'top_header_button_heading',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Heading(
        $wp_customize,
        'top_header_button_heading',
        array(
            'label' => esc_html__('Button Settings', 'yatri'),
            'section' => 'yatri_section_top_header_options',
            'priority' => 1500,
            'active_callback' => 'yatri_is_top_header_button_enabled'

        )
    )
);
// Icon Picker
$wp_customize->add_setting(yatri_get_customizer_id('top_header_button_icon'),
    array(
        'default' => $default['top_header_button_icon'],
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',

    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Icon_Picker(
        $wp_customize,
        yatri_get_customizer_id('top_header_button_icon'),
        array(
            'label' => esc_html__('Button icon', 'yatri'),
            'section' => 'yatri_section_top_header_options',
            'priority' => 1520,
            'active_callback' => 'yatri_is_top_header_button_enabled'


        )
    )
);
// Button Link
$wp_customize->add_setting(yatri_get_customizer_id('top_header_button_link'),
    array(
        'default' => $default['top_header_button_link'],
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'postMessage',

    )
);
$wp_customize->add_control(yatri_get_customizer_id('top_header_button_link'),
    array(
        'label' => esc_html__('Button link', 'yatri'),
        'section' => 'yatri_section_top_header_options',
        'type' => 'text',
        'priority' => 1540,
        'active_callback' => 'yatri_is_top_header_button_enabled'

    )
);

// Button Target
$wp_customize->add_setting(yatri_get_customizer_id('top_header_button_target'),
    array(
        'default' => $default['top_header_button_target'],
        'sanitize_callback' => 'yatri_sanitize_select',
        'transport' => 'postMessage',

    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Radio(
        $wp_customize,
        yatri_get_customizer_id('top_header_button_target'),
        array(
            'label' => esc_html__('Button link target', 'yatri'),
            'section' => 'yatri_section_top_header_options',
            'priority' => 1560,
            'choices' => array(
                '_self' => esc_html__('Open in same tab', 'yatri'),
                '_blank' => esc_html__('Open in new tab', 'yatri'),
            ),
            'active_callback' => 'yatri_is_top_header_button_enabled'

        )
    )
);

// Button Label
$wp_customize->add_setting(yatri_get_customizer_id('top_header_button_label'),
    array(
        'default' => $default['top_header_button_label'],
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',

    )
);
$wp_customize->add_control(yatri_get_customizer_id('top_header_button_label'),
    array(
        'label' => esc_html__('Button text', 'yatri'),
        'section' => 'yatri_section_top_header_options',
        'type' => 'text',
        'priority' => 1580,
        'active_callback' => 'yatri_is_top_header_button_enabled'
    )
);
/// Top Header Button Style Design
$wp_customize->add_setting(yatri_get_customizer_id('top_header_button_style_design'),
    array(
        'default' => $default['top_header_button_style_design'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' => 'postMessage',


    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('top_header_button_style_design'),
        array(
            'label' => esc_html__('Design & Styling', 'yatri'),
            'section' => 'yatri_section_top_header_options',
            'priority' => 1600,
            'type' => 'yatri-style',
            'active_callback' => 'yatri_is_top_header_button_enabled'

        )
    )
);

// Setting show_top_header.
$wp_customize->add_setting(yatri_get_customizer_id('top_header_button_visibility'),
    array(
        'default' => $default['top_header_button_visibility'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_switch_group'),
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Switch_Group(
        $wp_customize,
        yatri_get_customizer_id('top_header_button_visibility'),
        array(
            'label' => esc_html__('Button Visibility', 'yatri'),
            'section' => 'yatri_section_top_header_options',
            'priority' => 1620,
            'active_callback' => 'yatri_is_top_header_button_enabled',
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


