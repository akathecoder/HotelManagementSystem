<?php

$wp_customize->add_section(new Mantrabrain_Theme_Customizer_Section($wp_customize, 'yatri_theme_base_layouts', array(
    'title' => esc_html__('Layouts', 'yatri'),
    'panel' => YATRI_THEME_OPTION_PANEL,
    'section' => 'yatri_section_base_options',
    'priority' => 10,
)));


// Setting Page Layout
$wp_customize->add_setting(
    'yatri-heading-layouts',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Heading(
        $wp_customize,
        'yatri-heading-layouts',
        array(
            'label' => esc_html__('Layout styles', 'yatri'),
            'section' => 'yatri_theme_base_layouts',
            'priority' => 10,

        )
    )
);


// Setting Main Layout
$wp_customize->add_setting(yatri_get_customizer_id('main_layout'),
    array(
        'default' => $default['main_layout'],
        'sanitize_callback' => 'yatri_sanitize_select',

    )
);

$wp_customize->add_control(new Mantrabrain_Theme_Customizer_Control_Buttonset(
        $wp_customize, yatri_get_customizer_id('main_layout'),
        array(
            'section' => 'yatri_theme_base_layouts',
            'settings' => yatri_get_customizer_id('main_layout'),
            'priority' => 20,
            'choices' => yatri_global_layout_options(),
        )
    )
);

// Setting show_top_header.
$wp_customize->add_setting(yatri_get_customizer_id('container_width'),
    array(
        'default' => $default['container_width'],
        'sanitize_callback' => 'yatri_sanitize_slider',
        'transport' => 'postMessage',

    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Slider(
        $wp_customize,
        yatri_get_customizer_id('container_width'),
        array(
            'label' => esc_html__('Container Width', 'yatri'),
            'section' => 'yatri_theme_base_layouts',
            'priority' => 30,
            'input_attrs' => array(
                'min' => 768,
                'max' => 4000,
                'step' => 1
            ),
        )
    )
);

// Design & Styling for Boxed
$wp_customize->add_setting(yatri_get_customizer_id('main_layout_boxed_styling'),
    array(
        'default' => $default['main_layout_boxed_styling'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' => 'postMessage',


    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('main_layout_boxed_styling'),
        array(
            'label' => esc_html__('Design & Styling', 'yatri'),
            'section' => 'yatri_theme_base_layouts',
            'priority' => 40,
            'active_callback' => 'yatri_is_main_boxed_layout',
            'setting' => yatri_get_customizer_id('main_layout_boxed_styling'),
            'type' => 'yatri-style',

        )
    )
);

// Design & Styling for Full Width
$wp_customize->add_setting(yatri_get_customizer_id('main_layout_full_width_styling'),
    array(
        'default' => $default['main_layout_full_width_styling'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' => 'postMessage',


    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('main_layout_full_width_styling'),
        array(
            'label' => esc_html__('Design & Styling', 'yatri'),
            'section' => 'yatri_theme_base_layouts',
            'priority' => 50,
            'active_callback' => 'yatri_is_main_full_width_layout',
            'type' => 'yatri-style',

        )
    )
);