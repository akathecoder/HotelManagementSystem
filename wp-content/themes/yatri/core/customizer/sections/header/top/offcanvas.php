<?php

// Offcanvas Section Heading
$wp_customize->add_setting(
    'top_header_off_canvas_heading',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Heading(
        $wp_customize,
        'top_header_off_canvas_heading',
        array(
            'label' => esc_html__('Offcanvas Settings', 'yatri'),
            'section' => 'yatri_section_top_header_options',
            'priority' => 800,
            'active_callback' => 'yatri_is_top_header_offcanvas_enabled'

        )
    )
);

$wp_customize->add_setting(yatri_get_customizer_id('top_header_offcanvas_open_from'),
    array(
        'default' => $default['top_header_offcanvas_open_from'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);

$wp_customize->add_control(yatri_get_customizer_id('top_header_offcanvas_open_from'),
    array(
        'label' => esc_html__('Offcanvas menu open from', 'yatri'),
        'section' => 'yatri_section_top_header_options',
        'type' => 'select',
        'priority' => 820,
        'choices' => array(
            'left' => esc_html__('Left', 'yatri'),
            'right' => esc_html__('Right', 'yatri'),
        ),
        'active_callback' => 'yatri_is_top_header_offcanvas_enabled'

    )
);
// Offcanvas Menu Type
$wp_customize->add_setting(yatri_get_customizer_id('top_header_offcanvas_menu_type'),
    array(
        'default' => $default['top_header_offcanvas_menu_type'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);

$wp_customize->add_control(yatri_get_customizer_id('top_header_offcanvas_menu_type'),
    array(
        'label' => esc_html__('Offcanvas Menu Type', 'yatri'),
        'section' => 'yatri_section_top_header_options',
        'type' => 'select',
        'priority' => 840,
        'choices' => yatri_get_offcanvas_menu_type(),
        'active_callback' => 'yatri_is_top_header_offcanvas_enabled'
    )
);

// Offcanvas Menu Sidebar List
$wp_customize->add_setting(yatri_get_customizer_id('top_header_offcanvas_menu_sidebar'),
    array(
        'default' => $default['top_header_offcanvas_menu_sidebar'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);

$wp_customize->add_control(yatri_get_customizer_id('top_header_offcanvas_menu_sidebar'),
    array(
        'label' => esc_html__('Sidebar for Offcanvas', 'yatri'),
        'section' => 'yatri_section_top_header_options',
        'type' => 'select',
        'priority' => 860,
        'choices' => yatri_get_all_sidebars(),
        'active_callback' => 'yatri_is_top_header_is_offcanvas_type_sidebar'

    )
);

// Offcanvas Menu Navigation Menu List
$wp_customize->add_setting(yatri_get_customizer_id('top_header_offcanvas_menu_nav_menu'),
    array(
        'default' => $default['top_header_offcanvas_menu_nav_menu'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);

$wp_customize->add_control(yatri_get_customizer_id('top_header_offcanvas_menu_nav_menu'),
    array(
        'label' => esc_html__('Navigation menu for Offcanvas', 'yatri'),
        'section' => 'yatri_section_top_header_options',
        'type' => 'select',
        'priority' => 880,
        'choices' => yatri_get_all_nav_menus(),
        'active_callback' => 'yatri_is_top_header_is_offcanvas_type_nav'

    )
);

// Setting show_top_header.
$wp_customize->add_setting(yatri_get_customizer_id('top_header_offcanvas_menu_width'),
    array(
        'default' => $default['top_header_offcanvas_menu_width'],
        'sanitize_callback' => 'yatri_sanitize_slider',
    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Slider(
        $wp_customize,
        yatri_get_customizer_id('top_header_offcanvas_menu_width'),
        array(
            'label' => esc_html__('Offcanvas Width', 'yatri'),
            'section' => 'yatri_section_top_header_options',
            'priority' => 900,
            'input_attrs' => array(
                'min' => 200,
                'max' => 1000,
                'step' => 1
            ),
            'active_callback' => 'yatri_is_top_header_offcanvas_enabled'
        )
    )
);
// Design & Styling

$wp_customize->add_setting(yatri_get_customizer_id('top_header_offcanvas_menu_design'),
    array(
        'default' => $default['top_header_offcanvas_menu_design'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' 			=> 'postMessage',


    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('top_header_offcanvas_menu_design'),
        array(
            'label' => esc_html__('Design & Styling', 'yatri'),
            'section' => 'yatri_section_top_header_options',
            'priority' => 920,
            'active_callback' => 'yatri_is_top_header_offcanvas_enabled',
            'type' => 'yatri-style',

        )
    )
);
// Setting hide section.
$wp_customize->add_setting(yatri_get_customizer_id('top_header_offcanvas_menu_visibility'),
    array(
        'default' => $default['top_header_offcanvas_menu_visibility'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_switch_group'),
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Switch_Group(
        $wp_customize,
        yatri_get_customizer_id('top_header_offcanvas_menu_visibility'),
        array(
            'label' => esc_html__('Offcanvas Visibility', 'yatri'),
            'section' => 'yatri_section_top_header_options',
            'priority' => 940,
            'active_callback' => 'yatri_is_top_header_offcanvas_enabled',
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