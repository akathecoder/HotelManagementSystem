<?php

$wp_customize->add_section(new Mantrabrain_Theme_Customizer_Section(
    $wp_customize, 'yatri_section_bottom_header_options', array(
    'title' => esc_html__('Main Header', 'yatri'),
    'panel' => YATRI_THEME_OPTION_PANEL,
    'section' => 'yatri_section_header_options',
    'priority' => 20,
)));

// Setting show_bottom_header.
$wp_customize->add_setting(yatri_get_customizer_id('show_bottom_header'),
    array(
        'default' => $default['show_bottom_header'],
        'sanitize_callback' => 'yatri_sanitize_checkbox',
    )
);


// Setting visibility of header
$wp_customize->add_setting(yatri_get_customizer_id('bottom_header_visibility'),
    array(
        'default' => $default['bottom_header_visibility'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_switch_group'),
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Switch_Group(
        $wp_customize,
        yatri_get_customizer_id('bottom_header_visibility'),
        array(
            'label' => esc_html__('Main header visibility', 'yatri'),
            'section' => 'yatri_section_bottom_header_options',
            'priority' => 21,
            'active_callback' => 'yatri_is_bottom_header_enabled',
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

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Switch(
        $wp_customize,
        yatri_get_customizer_id('show_bottom_header'),
        array(
            'label' => esc_html__('Show Main Header', 'yatri'),
            'section' => 'yatri_section_bottom_header_options',
            'priority' => 20,


        )
    )
);


// Main Header Design

$wp_customize->add_setting(yatri_get_customizer_id('bottom_header_design'),
    array(
        'default' => $default['bottom_header_design'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' => 'postMessage',


    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('bottom_header_design'),
        array(
            'label' => esc_html__('Design & Styling', 'yatri'),
            'section' => 'yatri_section_bottom_header_options',
            'priority' => 30,
            'active_callback' => 'yatri_is_bottom_header_enabled',
            'type' => 'yatri-style',

        )
    )
);

// Setting bottom header options.
$wp_customize->add_setting(yatri_get_customizer_id('bottom_header_sections'),
    array(
        'default' => $default['bottom_header_sections'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_builder'),
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Builder(
        $wp_customize,
        yatri_get_customizer_id('bottom_header_sections'),
        array(
            'label' => esc_html__('Main Header Sections', 'yatri'),
            'section' => 'yatri_section_bottom_header_options',
            'priority' => 40,
            'fields' => Yatri_Sections::get_all_registered_sections('bottom_header'),
            'active_callback' => 'yatri_is_bottom_header_enabled'

        )
    )
);
// Setting bottom header options.
$wp_customize->add_setting('yatri_bottom_header_logo_message',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Message(
        $wp_customize,
        'yatri_bottom_header_logo_message',
        array(
            'label' => sprintf(esc_html__('Please click %1$s here %2$s and choose %3$s MAIN %4$s header for logo to show site branding on this section.', 'yatri'), '<span>', '</span>', '<span>', '</span>'),
            'section' => 'yatri_section_bottom_header_options',
            'priority' => 40,
            'focus_id' => yatri_get_customizer_id('logo_on_header'),
            'message_type' => 'yatri-warning',
            'active_callback' => 'yatri_logo_on_header_is_not_bottom'

        )
    )
);

include "bottom/office-information.php";
include "bottom/navigation-menu.php";
include "bottom/social-icons.php";
include "bottom/offcanvas.php";
include "bottom/branding.php";
include "bottom/search-form.php";
include "bottom/button.php";
include "bottom/custom-html.php";



