<?php

$wp_customize->add_setting('yatri_tools_customizer_css_cache_type',
    array(
        'default' => 'inline_css',
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);

$wp_customize->add_control('yatri_tools_customizer_css_cache_type',
    array(
        'label' => esc_html__('Dynamic CSS Caching', 'yatri-tools'),
        'section' => 'yatri_tools_customizer_cache_section',
        'type' => 'select',
        'priority' => 80,
        'choices' => array(
            'file' => esc_html__('Seperate CSS file', 'yatri_tools'),
            'inline_css' => esc_html__('Inline CSS', 'yatri_tools')
        )
    )
);

