<?php

// Search form section
$wp_customize->add_setting(
    'mid_header_search_form_heading',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Heading(
        $wp_customize,
        'mid_header_search_form_heading',
        array(
            'label' => esc_html__('Search Form Settings', 'yatri'),
            'section' => 'yatri_section_mid_header_options',
            'priority' => 1300,
            'active_callback' => 'yatri_is_mid_header_search_form_enabled'

        )
    )
);

// Icon Picker
$wp_customize->add_setting(yatri_get_customizer_id('mid_header_search_button_icon'),
    array(
        'default' => $default['mid_header_search_button_icon'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Icon_Picker(
        $wp_customize,
        yatri_get_customizer_id('mid_header_search_button_icon'),
        array(
            'label' => esc_html__('Search button icon', 'yatri'),
            'section' => 'yatri_section_mid_header_options',
            'priority' => 1320,
            'active_callback' => 'yatri_is_mid_header_search_form_enabled'


        )
    )
);

// Search form placeholder
$wp_customize->add_setting(yatri_get_customizer_id('mid_header_search_form_placeholder_text'),
    array(
        'default' => $default['mid_header_search_form_placeholder_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(yatri_get_customizer_id('mid_header_search_form_placeholder_text'),
    array(
        'label' => esc_html__('Placeholder Text', 'yatri'),
        'section' => 'yatri_section_mid_header_options',
        'type' => 'text',
        'priority' => 1340,
        'active_callback' => 'yatri_is_mid_header_search_form_enabled'
    )
);
// Search form type
$wp_customize->add_setting(yatri_get_customizer_id('mid_header_search_form_type'),
    array(
        'default' => $default['mid_header_search_form_type'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Radio(
        $wp_customize,
        yatri_get_customizer_id('mid_header_search_form_type'),
        array(
            'label' => esc_html__('Search form style', 'yatri'),
            'section' => 'yatri_section_mid_header_options',
            'priority' => 1360,
            'choices' => array(
                'default' => esc_html__('Default', 'yatri'),
                'show_search_box_only' => esc_html__('Show searchbox only', 'yatri'),
            ),
            'active_callback' => 'yatri_is_mid_header_search_form_enabled'

        )
    )
);
// Mid Header Search form Design

$wp_customize->add_setting(yatri_get_customizer_id('mid_header_search_form_design'),
    array(
        'default' => $default['mid_header_search_form_design'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' 			=> 'postMessage',


    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('mid_header_search_form_design'),
        array(
            'label' => esc_html__('Design & Styling', 'yatri'),
            'section' => 'yatri_section_mid_header_options',
            'priority' => 1380,
            'active_callback' => 'yatri_is_mid_header_search_form_enabled',
            'type' => 'yatri-style',

        )
    )
);


// Setting hide section.
$wp_customize->add_setting(yatri_get_customizer_id('mid_header_search_form_visibility'),
    array(
        'default' => $default['mid_header_search_form_visibility'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_switch_group'),
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Switch_Group(
        $wp_customize,
        yatri_get_customizer_id('mid_header_search_form_visibility'),
        array(
            'label' => esc_html__('Search Form Visibility', 'yatri'),
            'section' => 'yatri_section_mid_header_options',
            'priority' => 1400,
            'active_callback' => 'yatri_is_mid_header_search_form_enabled',
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