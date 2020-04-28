<?php

// Office Information
$wp_customize->add_setting(
    'mid_header_office_info_heading',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Heading(
        $wp_customize,
        'mid_header_office_info_heading',
        array(
            'label' => esc_html__('Office Info Settings', 'yatri'),
            'section' => 'yatri_section_mid_header_options',
            'priority' => 100,
            'active_callback' => 'yatri_is_mid_header_office_info_enabled'

        )
    )
);


/// Office Info Repeater
$wp_customize->add_setting(yatri_get_customizer_id('mid_header_office_info'),
    array(
        'default' => $default['mid_header_office_info'],
        'sanitize_callback' => 'yatri_sanitize_repeater',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Repeater(
        $wp_customize,
        yatri_get_customizer_id('mid_header_office_info'),
        array(
            'label' => esc_html__('Office Information', 'yatri'),
            'description' => esc_html__('Drag & Drop for reordering', 'yatri'),
            'section' => 'yatri_section_mid_header_options',
            'priority' => 120,
            'active_callback' => 'yatri_is_mid_header_office_info_enabled',
            'fields' => array(
                'title' => array(
                    'type' => 'text',
                    'label' => esc_html__('Title', 'yatri'),
                    'is_title' => true
                ),
                'icon' => array(
                    'type' => 'icon',
                    'label' => esc_html__('Icon', 'yatri')
                ),
                'link' => array(
                    'type' => 'url',
                    'label' => esc_html__('Link', 'yatri'),
                ),


            )

        )
    )
);
// Mid Header Office Info Design

$wp_customize->add_setting(yatri_get_customizer_id('mid_header_office_info_design'),
    array(
        'default' => $default['mid_header_office_info_design'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' 			=> 'postMessage',


    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('mid_header_office_info_design'),
        array(
            'label' => esc_html__('Design & Styling', 'yatri'),
            'section' => 'yatri_section_mid_header_options',
            'priority' => 140,
            'active_callback' => 'yatri_is_mid_header_office_info_enabled',
            'type' => 'yatri-style',

        )
    )
);

// Setting hide section.
$wp_customize->add_setting(yatri_get_customizer_id('mid_header_office_information_visibility'),
    array(
        'default' => $default['mid_header_office_information_visibility'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_switch_group'),
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Switch_Group(
        $wp_customize,
        yatri_get_customizer_id('mid_header_office_information_visibility'),
        array(
            'label' => esc_html__('Office Info Visibility', 'yatri'),
            'section' => 'yatri_section_mid_header_options',
            'priority' => 160,
            'active_callback' => 'yatri_is_mid_header_office_info_enabled',
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