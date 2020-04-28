<?php
$wp_customize->add_section(new Mantrabrain_Theme_Customizer_Section(
    $wp_customize, 'yatri_section_logo_options', array(
    'title' => esc_html__('Logo / Site Branding', 'yatri'),
    'panel' => YATRI_THEME_OPTION_PANEL,
    'section' => 'yatri_section_header_options',
    'priority' => 10,
)));

// Nav Menu Heading for TOp Header
$wp_customize->add_setting(
    'logo_enable_on_header_heading',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Heading(
        $wp_customize,
        'logo_enable_on_header_heading',
        array(
            'label' => esc_html__('Choose Header For Logo', 'yatri'),
            'section' => 'yatri_section_logo_options',
            'priority' => 10

        )
    )
);

// Setting Main Layout
$wp_customize->add_setting(yatri_get_customizer_id('logo_on_header'),
    array(
        'default' => $default['logo_on_header'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);

$wp_customize->add_control(new Mantrabrain_Theme_Customizer_Control_Buttonset(
        $wp_customize, yatri_get_customizer_id('logo_on_header'),
        array(
            'section' => 'yatri_section_logo_options',
            'settings' => yatri_get_customizer_id('logo_on_header'),
            'priority' => 20,
            'choices' => array(
                'top' => esc_html__('Top', 'yatri'),
                'mid' => esc_html__('Mid', 'yatri'),
                'bottom' => esc_html__('Main', 'yatri'),
            )
        )
    )
);

// Setting link for top header
$wp_customize->add_setting('yatri_top_header_branding_config_message',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Message(
        $wp_customize,
        'yatri_top_header_branding_config_message',
        array(
            'label' => sprintf(esc_html__('Click %1$s here %2$s for configuration & designing.', 'yatri'), '<span>', '</span>'),
            'section' => 'yatri_section_logo_options',
            'priority' => 30,
            'focus_id' => yatri_get_customizer_id('show_top_header'),
            'message_type' => 'yatri-notice',
            'active_callback' => 'yatri_logo_has_assigned_on_top_header'

        )
    )
);

// Setting link for mid header
$wp_customize->add_setting('yatri_mid_header_branding_config_message',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Message(
        $wp_customize,
        'yatri_mid_header_branding_config_message',
        array(
            'label' => sprintf(esc_html__('Click %1$s here %2$s for configuration & designing.', 'yatri'), '<span>', '</span>'),
            'section' => 'yatri_section_logo_options',
            'priority' => 30,
            'focus_id' => yatri_get_customizer_id('show_mid_header'),
            'message_type' => 'yatri-notice',
            'active_callback' => 'yatri_logo_has_assigned_on_mid_header'

        )
    )
);
// Setting link for mid header
$wp_customize->add_setting('yatri_bottom_header_branding_config_message',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Message(
        $wp_customize,
        'yatri_bottom_header_branding_config_message',
        array(
            'label' => sprintf(esc_html__('Click %1$s here %2$s for configuration & designing.', 'yatri'), '<span>', '</span>'),
            'section' => 'yatri_section_logo_options',
            'priority' => 30,
            'focus_id' => yatri_get_customizer_id('show_bottom_header'),
            'message_type' => 'yatri-notice',
            'active_callback' => 'yatri_logo_has_assigned_on_bottom_header'

        )
    )
);