<?php
// Nav Menu Heading for TOp Header
$wp_customize->add_setting(
    'mid_header_main_menu_heading',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Heading(
        $wp_customize,
        'mid_header_main_menu_heading',
        array(
            'label' => esc_html__('Navigation Menu Settings', 'yatri'),
            'section' => 'yatri_section_mid_header_options',
            'priority' => 400,
            'active_callback' => 'yatri_is_mid_header_navigation_menu_enabled'

        )
    )
);
// Mid Header Navigation
$wp_customize->add_setting(yatri_get_customizer_id('mid_header_main_menu'),
    array(
        'default' => $default['mid_header_main_menu'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);

$wp_customize->add_control(yatri_get_customizer_id('mid_header_main_menu'),
    array(
        'label' => esc_html__('Navigation menu for mid header', 'yatri'),
        'section' => 'yatri_section_mid_header_options',
        'type' => 'select',
        'priority' => 420,
        'choices' => yatri_get_all_nav_menus(),
        'active_callback' => 'yatri_is_mid_header_navigation_menu_enabled'

    )
);
// Mid Header Navigation Design

$wp_customize->add_setting(yatri_get_customizer_id('mid_header_navigation_menu_design'),
    array(
        'default' => $default['mid_header_navigation_menu_design'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' 			=> 'postMessage',


    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('mid_header_navigation_menu_design'),
        array(
            'label' => esc_html__('Design & Styling', 'yatri'),
            'section' => 'yatri_section_mid_header_options',
            'priority' => 440,
            'active_callback' => 'yatri_is_mid_header_navigation_menu_enabled',
            'type' => 'yatri-style',

        )
    )
);

// Setting show_mid_header.
$wp_customize->add_setting(yatri_get_customizer_id('mid_header_menu_visibility'),
    array(
        'default' => $default['mid_header_menu_visibility'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_switch_group'),
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Switch_Group(
        $wp_customize,
        yatri_get_customizer_id('mid_header_menu_visibility'),
        array(
            'label' => esc_html__('Navigation Menu Visibility', 'yatri'),
            'section' => 'yatri_section_mid_header_options',
            'priority' => 460,
            'active_callback' => 'yatri_is_mid_header_navigation_menu_enabled',
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