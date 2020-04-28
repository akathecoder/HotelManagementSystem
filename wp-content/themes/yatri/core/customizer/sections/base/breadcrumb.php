<?php


$wp_customize->add_section(new Mantrabrain_Theme_Customizer_Section($wp_customize, 'yatri_theme_base_breadcrumb', array(
    'title' => esc_html__('Breadcrumb', 'yatri'),
    'panel' => YATRI_THEME_OPTION_PANEL,
    'section' => 'yatri_section_base_options',
    'priority' => 60,
)));


// Setting show_top_header.
$wp_customize->add_setting(yatri_get_customizer_id('show_breadcrumb'),
    array(
        'default' => $default['show_breadcrumb'],
        'sanitize_callback' => 'yatri_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Switch(
        $wp_customize,
        yatri_get_customizer_id('show_breadcrumb'),
        array(
            'label' => esc_html__('Show Breadcrumb', 'yatri'),
            'section' => 'yatri_theme_base_breadcrumb',
            'priority' => 20,

        )
    )
);

// Setting show_on_homepage.
$wp_customize->add_setting(yatri_get_customizer_id('show_breadcrumb_on_homepage'),
    array(
        'default' => $default['show_breadcrumb_on_homepage'],
        'sanitize_callback' => 'yatri_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Switch(
        $wp_customize,
        yatri_get_customizer_id('show_breadcrumb_on_homepage'),
        array(
            'label' => esc_html__('Show on home page', 'yatri'),
            'section' => 'yatri_theme_base_breadcrumb',
            'priority' => 40,
            'active_callback' => 'yatri_is_breadcrumb_enabled'

        )
    )
);

// Breadcrumb Home Text
$wp_customize->add_setting(yatri_get_customizer_id('breadcrumb_home_text'),
    array(
        'default' => $default['breadcrumb_home_text'],
        'sanitize_callback' => 'sanitize_text_field',
        'transport' 			=> 'postMessage',
    )
);
$wp_customize->add_control(yatri_get_customizer_id('breadcrumb_home_text'),
    array(
        'label' => esc_html__('Home text', 'yatri'),
        'section' => 'yatri_theme_base_breadcrumb',
        'type' => 'text',
        'priority' => 80,
        'active_callback' => 'yatri_is_breadcrumb_enabled'
    )
);

// Home Icon

$wp_customize->add_setting(yatri_get_customizer_id('breadcrumb_home_icon'),
    array(
        'default' => $default['breadcrumb_home_icon'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Icon_Picker(
        $wp_customize,
        yatri_get_customizer_id('breadcrumb_home_icon'),
        array(
            'label' => esc_html__('Home Icon', 'yatri'),
            'section' => 'yatri_theme_base_breadcrumb',
            'priority' => 100,
            'active_callback' => 'yatri_is_breadcrumb_enabled'


        )
    )
);

// Breadcrumb separator
$wp_customize->add_setting(yatri_get_customizer_id('breadcrumb_section_separator'),
    array(
        'default' => $default['breadcrumb_section_separator'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(yatri_get_customizer_id('breadcrumb_section_separator'),
    array(
        'label' => esc_html__('Separator Text', 'yatri'),
        'section' => 'yatri_theme_base_breadcrumb',
        'type' => 'text',
        'priority' => 120,
        'active_callback' => 'yatri_is_breadcrumb_enabled'
    )
);

// Separator spacing

$wp_customize->add_setting(yatri_get_customizer_id('breadcrumb_section_separator_spacing'),
    array(
        'default' => $default['breadcrumb_section_separator_spacing'],
        'sanitize_callback' => 'yatri_sanitize_slider',

    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Slider(
        $wp_customize,
        yatri_get_customizer_id('breadcrumb_section_separator_spacing'),
        array(
            'label' => esc_html__('Separator gap ( in px ) ', 'yatri'),
            'section' => 'yatri_theme_base_breadcrumb',
            'priority' => 140,
            'input_attrs' => array(
                'min' => 15,
                'max' => 80,
                'step' => 1
            ),
            'active_callback' => 'yatri_is_breadcrumb_enabled'
        )
    )
);

/// Yatri Button Style Design
$wp_customize->add_setting(yatri_get_customizer_id('yatri_breadcrumb_style_design'),
    array(
        'default' => $default['yatri_breadcrumb_style_design'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' 			=> 'postMessage',


    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('yatri_breadcrumb_style_design'),
        array(
            'label' => esc_html__('Design & Styling', 'yatri'),
            'section' => 'yatri_theme_base_breadcrumb',
            'priority' => 140,
            'type' => 'yatri-style',
            'active_callback' => 'yatri_is_breadcrumb_enabled'

        )
    )
);