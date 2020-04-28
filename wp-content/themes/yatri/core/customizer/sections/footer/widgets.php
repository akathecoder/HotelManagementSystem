<?php

$wp_customize->add_section(new Mantrabrain_Theme_Customizer_Section(
    $wp_customize, 'yatri_section_footer_widgets_options', array(
    'title' => esc_html__('Footer Widgets', 'yatri'),
    'panel' => YATRI_THEME_OPTION_PANEL,
    'section' => 'yatri_section_footer_options',
    'priority' => 20,
)));

// Setting show_top_header.
$wp_customize->add_setting(yatri_get_customizer_id('show_footer_widgets'),
    array(
        'default' => $default['show_footer_widgets'],
        'sanitize_callback' => 'yatri_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Switch(
        $wp_customize,
        yatri_get_customizer_id('show_footer_widgets'),
        array(
            'label' => esc_html__('Show Footer Widgets', 'yatri'),
            'section' => 'yatri_section_footer_widgets_options',
            'priority' => 20,


        )
    )
);

$wp_customize->add_setting(yatri_get_customizer_id('footer_widgets_column'),
    array(
        'default' => $default['footer_widgets_column'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);

$wp_customize->add_control(yatri_get_customizer_id('footer_widgets_column'),
    array(
        'label' => esc_html__('Footer Columns', 'yatri'),
        'section' => 'yatri_section_footer_widgets_options',
        'type' => 'select',
        'priority' => 40,
        'choices' => array(
            "1" => esc_html__("1", "yatri"),
            "2" => esc_html__("2", "yatri"),
            "3" => esc_html__("3", "yatri"),
            "4" => esc_html__("4", "yatri"),
        ),
        'active_callback' => 'yatri_is_footer_widgets_enabled'
    )
);

// Footer Widgets Design & Styling

$wp_customize->add_setting(yatri_get_customizer_id('footer_widgets_section_design_style'),
    array(
        'default' => $default['footer_widgets_section_design_style'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' 			=> 'postMessage',


    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('footer_widgets_section_design_style'),
        array(
            'label' => esc_html__('Design & Styling ( Section )', 'yatri'),
            'section' => 'yatri_section_footer_widgets_options',
            'priority' => 60,
            'type' => 'yatri-style',
            'active_callback' => 'yatri_is_footer_widgets_enabled'

        )
    )
);


// Widgets area design & style
$wp_customize->add_setting(yatri_get_customizer_id('footer_widgets_area_design_style'),
    array(
        'default' => $default['footer_widgets_area_design_style'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' 			=> 'postMessage',


    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('footer_widgets_area_design_style'),
        array(
            'label' => esc_html__('Design & Styling ( Widget Area )', 'yatri'),
            'section' => 'yatri_section_footer_widgets_options',
            'priority' => 80,
            'type' => 'yatri-style',
            'active_callback' => 'yatri_is_footer_widgets_enabled'

        )
    )
);








