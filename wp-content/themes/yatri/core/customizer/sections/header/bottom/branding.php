<?php

// Branding Section
$wp_customize->add_setting(
    'bottom_header_branding_heading',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Heading(
        $wp_customize,
        'bottom_header_branding_heading',
        array(
            'label' => esc_html__('Branding Settings', 'yatri'),
            'section' => 'yatri_section_bottom_header_options',
            'priority' => 1100,
            'active_callback' => 'yatri_is_bottom_header_branding_enabled'

        )
    )
);

// Site Identity options
$wp_customize->add_setting(yatri_get_customizer_id('bottom_header_site_identity'),
    array(
        'default' => $default['bottom_header_site_identity'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Radio(
        $wp_customize,
        yatri_get_customizer_id('bottom_header_site_identity'),
        array(
            'label' => esc_html__('Site Identitiy', 'yatri'),
            'section' => 'yatri_section_bottom_header_options',
            'priority' => 1120,
            'choices' => array(
                'logo-only' => esc_html__('Logo Only', 'yatri'),
                'title-text' => esc_html__('Title + Tagline', 'yatri'),
                'logo-title-text' => esc_html__('Logo + Title + Tagline', 'yatri'),
            ),
            'active_callback' => 'yatri_is_bottom_header_branding_enabled'

        )
    )
);

// Site Identity options
$wp_customize->add_setting(yatri_get_customizer_id('bottom_header_branding_layout'),
    array(
        'default' => $default['bottom_header_branding_layout'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Radio(
        $wp_customize,
        yatri_get_customizer_id('bottom_header_branding_layout'),
        array(
            'label' => esc_html__('Branding Layout', 'yatri'),
            'section' => 'yatri_section_bottom_header_options',
            'priority' => 1140,
            'choices' => yatri_branding_layout_choices(),
            'has_images' => true,
            'active_callback' => 'yatri_is_bottom_header_branding_logo_title_enabled'

        )
    )
);

/// Bottom Header Button Style Design
$wp_customize->add_setting(yatri_get_customizer_id('bottom_header_branding_style_design'),
    array(
        'default' => $default['bottom_header_branding_style_design'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' 			=> 'postMessage',


    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('bottom_header_branding_style_design'),
        array(
            'label' => esc_html__('Design & Styling', 'yatri'),
            'section' => 'yatri_section_bottom_header_options',
            'priority' => 1160,
            'type' => 'yatri-style',
            'active_callback' => 'yatri_is_bottom_header_branding_enabled'

        )
    )
);

// Setting hide section.
$wp_customize->add_setting(yatri_get_customizer_id('bottom_header_site_branding_visibility'),
    array(
        'default' => $default['bottom_header_site_branding_visibility'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_switch_group'),
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Switch_Group(
        $wp_customize,
        yatri_get_customizer_id('bottom_header_site_branding_visibility'),
        array(
            'label' => esc_html__('Branding Visibility', 'yatri'),
            'section' => 'yatri_section_bottom_header_options',
            'priority' => 1180,
            'active_callback' => 'yatri_is_bottom_header_branding_enabled',
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