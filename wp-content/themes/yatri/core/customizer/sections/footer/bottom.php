<?php

$wp_customize->add_section(new Mantrabrain_Theme_Customizer_Section(
    $wp_customize, 'yatri_section_bottom_footer_options', array(
    'title' => esc_html__('Footer Bottom', 'yatri'),
    'panel' => YATRI_THEME_OPTION_PANEL,
    'section' => 'yatri_section_footer_options',
    'priority' => 40,
)));


// Setting show_top_header.
$wp_customize->add_setting(yatri_get_customizer_id('show_bottom_footer'),
    array(
        'default' => $default['show_bottom_footer'],
        'sanitize_callback' => 'yatri_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Switch(
        $wp_customize,
        yatri_get_customizer_id('show_bottom_footer'),
        array(
            'label' => esc_html__('Show Footer Bottom', 'yatri'),
            'section' => 'yatri_section_bottom_footer_options',
            'priority' => 20,


        )
    )
);

// Setting visibility of footer bottom
$wp_customize->add_setting(yatri_get_customizer_id('bottom_footer_visibility'),
    array(
        'default' => $default['bottom_footer_visibility'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_switch_group'),
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Switch_Group(
        $wp_customize,
        yatri_get_customizer_id('bottom_footer_visibility'),
        array(
            'label' => esc_html__('Footer bottom visibility', 'yatri'),
            'section' => 'yatri_section_bottom_footer_options',
            'priority' => 21,
            'active_callback' => 'yatri_is_bottom_footer_enabled',
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
// Footer Bottom Section Design & Styling

$wp_customize->add_setting(yatri_get_customizer_id('bottom_footer_section_design_style'),
    array(
        'default' => $default['bottom_footer_section_design_style'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' => 'postMessage',


    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('bottom_footer_section_design_style'),
        array(
            'label' => esc_html__('Design & Styling ( Section )', 'yatri'),
            'section' => 'yatri_section_bottom_footer_options',
            'priority' => 40,
            'type' => 'yatri-style',
            'active_callback' => 'yatri_is_bottom_footer_enabled'

        )
    )
);


// Setting bottom  footer options.
$wp_customize->add_setting(yatri_get_customizer_id('bottom_footer_sections'),
    array(
        'default' => $default['bottom_footer_sections'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_builder'),
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Builder(
        $wp_customize,
        yatri_get_customizer_id('bottom_footer_sections'),
        array(
            'label' => esc_html__('Bottom Footer Sections', 'yatri'),
            'section' => 'yatri_section_bottom_footer_options',
            'priority' => 60,
            'fields' => Yatri_Sections::get_all_registered_sections('bottom_footer'),
            'active_callback' => 'yatri_is_bottom_footer_enabled'

        )
    )
);

// Bottom Footer Options
include "bottom/office-information.php";
include "bottom/navigation-menu.php";
include "bottom/social-icons.php";
include "bottom/button.php";
include "bottom/custom-html.php";
include "bottom/copyright.php";
