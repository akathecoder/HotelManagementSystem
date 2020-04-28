<?php

$wp_customize->add_section(new Mantrabrain_Theme_Customizer_Section(
    $wp_customize, 'yatri_section_top_header_options', array(
    'title' => esc_html__('Top Header', 'yatri'),
    'panel' => YATRI_THEME_OPTION_PANEL,
    'section' => 'yatri_section_header_options',
    'priority' => 20,
)));

// Setting show_top_header.
$wp_customize->add_setting(yatri_get_customizer_id('show_top_header'),
    array(
        'default' => $default['show_top_header'],
        'sanitize_callback' => 'yatri_sanitize_checkbox',

    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Switch(
        $wp_customize,
        yatri_get_customizer_id('show_top_header'),
        array(
            'label' => esc_html__('Show Top Header', 'yatri'),
            'section' => 'yatri_section_top_header_options',
            'priority' => 20,


        )
    )
);


// Setting visibility of header
$wp_customize->add_setting(yatri_get_customizer_id('top_header_visibility'),
    array(
        'default' => $default['top_header_visibility'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_switch_group'),
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Switch_Group(
        $wp_customize,
        yatri_get_customizer_id('top_header_visibility'),
        array(
            'label' => esc_html__('Top header visibility', 'yatri'),
            'section' => 'yatri_section_top_header_options',
            'priority' => 21,
            'active_callback' => 'yatri_is_top_header_enabled',
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


// Top Header Design

$wp_customize->add_setting(yatri_get_customizer_id('top_header_design'),
    array(
        'default' => $default['top_header_design'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' => 'postMessage',


    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('top_header_design'),
        array(
            'label' => esc_html__('Design & Styling', 'yatri'),
            'section' => 'yatri_section_top_header_options',
            'priority' => 30,
            'active_callback' => 'yatri_is_top_header_enabled',
            'type' => 'yatri-style',

        )
    )
);

// Setting top header options.
$wp_customize->add_setting(yatri_get_customizer_id('top_header_sections'),
    array(
        'default' => $default['top_header_sections'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_builder'),
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Builder(
        $wp_customize,
        yatri_get_customizer_id('top_header_sections'),
        array(
            'label' => esc_html__('Top Header Sections', 'yatri'),
            'section' => 'yatri_section_top_header_options',
            'priority' => 40,
            'fields' => Yatri_Sections::get_all_registered_sections('top_header'),
            'active_callback' => 'yatri_is_top_header_enabled'

        )
    )
);
// Setting top header options.
$wp_customize->add_setting('yatri_top_header_logo_message',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Message(
        $wp_customize,
        'yatri_top_header_logo_message',
        array(
            'label' => sprintf(esc_html__('Please click %1$s here %2$s and choose %3$s TOP %4$s header for logo to show site branding on this section.', 'yatri'), '<span>', '</span>', '<span>', '</span>'),
            'section' => 'yatri_section_top_header_options',
            'priority' => 40,
            'focus_id' => yatri_get_customizer_id('logo_on_header'),
            'message_type' => 'yatri-warning',
            'active_callback' => 'yatri_logo_on_header_is_not_top'

        )
    )
);

include "top/office-information.php";
include "top/navigation-menu.php";
include "top/social-icons.php";
include "top/offcanvas.php";
include "top/branding.php";
include "top/search-form.php";
include "top/button.php";
include "top/custom-html.php";





