<?php

// Primary Color
$wp_customize->add_setting(yatri_get_customizer_id('primary_color'),
    array(
        'default' => $default['primary_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize, yatri_get_customizer_id('primary_color'),
        array(
            'label' => esc_html__('Primary Color', 'yatri'),
            'section' => 'colors',
            'settings' => yatri_get_customizer_id('primary_color'),
            'priority' => 20,
        )
    )
);

// Secondary Color
$wp_customize->add_setting(yatri_get_customizer_id('secondary_color'),
    array(
        'default' => $default['secondary_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize, yatri_get_customizer_id('secondary_color'),
        array(
            'label' => esc_html__('Secondary Color', 'yatri'),
            'section' => 'colors',
            'settings' => yatri_get_customizer_id('secondary_color'),
            'priority' => 20,
        )
    )
);