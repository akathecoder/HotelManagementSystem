<?php

// Setting show_top_header.
$wp_customize->add_setting(yatri_get_customizer_id('show_woo_breadcrumb'),
    array(
        'default' => $default['show_woo_breadcrumb'],
        'sanitize_callback' => 'yatri_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Switch(
        $wp_customize,
        yatri_get_customizer_id('show_woo_breadcrumb'),
        array(
            'label' => esc_html__('Show Breadcrumb', 'yatri'),
            'description' => esc_html__('Show Breadcrumb on WooCommerce pages', 'yatri'),
            'section' => 'yatri_woocommerce_breadcrumb',
            'priority' => 20,

        )
    )
);

$wp_customize->add_setting(yatri_get_customizer_id('woo_breadcrumb_type'),
    array(
        'default' => $default['woo_breadcrumb_type'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);

$wp_customize->add_control(yatri_get_customizer_id('woo_breadcrumb_type'),
    array(
        'label' => esc_html__('Breadcrumb Type', 'yatri'),
        'section' => 'yatri_woocommerce_breadcrumb',
        'type' => 'select',
        'priority' => 80,
        'choices' => array(
            'theme_default' => esc_html__('Yatri Theme Default', 'yatri'),
            'woo_default' => esc_html__('WooCommerce Default', 'yatri')
        )
    )
);

