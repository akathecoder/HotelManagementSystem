<?php

// Social Icon Heading
$wp_customize->add_setting(
    'bottom_footer_social_icons_heading',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Heading(
        $wp_customize,
        'bottom_footer_social_icons_heading',
        array(
            'label' => esc_html__('Social Icons', 'yatri'),
            'section' => 'yatri_section_bottom_footer_options',
            'priority' => 600,
            'active_callback' => 'yatri_is_bottom_footer_social_enabled'

        )
    )
);


/// Social Icons Repeator
$wp_customize->add_setting(yatri_get_customizer_id('bottom_footer_social_icons'),
    array(
        'default' => $default['bottom_footer_social_icons'],
        'sanitize_callback' => 'yatri_sanitize_repeater',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Repeater(
        $wp_customize,
        yatri_get_customizer_id('bottom_footer_social_icons'),
        array(
            'label' => esc_html__('Social Icons', 'yatri'),
            'description' => esc_html__('Drag & Drop for reordering social icons', 'yatri'),
            'section' => 'yatri_section_bottom_footer_options',
            'priority' => 620,
            'active_callback' => 'yatri_is_bottom_footer_social_enabled',
            'fields' => array(
                'icon_url' => array(
                    'type' => 'url',
                    'label' => esc_html__('Icon Link', 'yatri'),
                    'is_title' => true
                ),
                'open_in_new_tab' => array(
                    'type' => 'checkbox',
                    'label' => esc_html__('Open in new tab', 'yatri'),
                ),
                'icon_text' => array(
                    'type' => 'icon',
                    'label' => esc_html__('Icon', 'yatri')
                ),
                'icon_title_text' => array(
                    'type' => 'text',
                    'label' => esc_html__('Icon Title', 'yatri')
                )
            )

        )
    )
);
// Bottom Header Office Info Design

$wp_customize->add_setting(yatri_get_customizer_id('bottom_footer_social_icons_design'),
    array(
        'default' => $default['bottom_footer_social_icons_design'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' 			=> 'postMessage',


    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('bottom_footer_social_icons_design'),
        array(
            'label' => esc_html__('Design & Styling', 'yatri'),
            'section' => 'yatri_section_bottom_footer_options',
            'priority' => 640,
            'active_callback' => 'yatri_is_bottom_footer_social_icons_enabled',
            'type' => 'yatri-style',

        )
    )
);

// Setting hide section.
$wp_customize->add_setting(yatri_get_customizer_id('bottom_footer_social_icons_visibility'),
    array(
        'default' => $default['bottom_footer_social_icons_visibility'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_switch_group'),
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Switch_Group(
        $wp_customize,
        yatri_get_customizer_id('bottom_footer_social_icons_visibility'),
        array(
            'label' => esc_html__('Social Icons Visibility', 'yatri'),
            'section' => 'yatri_section_bottom_footer_options',
            'priority' => 660,
            'active_callback' => 'yatri_is_bottom_footer_social_icons_enabled',
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