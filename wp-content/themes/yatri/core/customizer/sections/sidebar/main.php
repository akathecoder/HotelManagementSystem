<?php


$wp_customize->add_setting(
    'yatri_left_sidebar_heading',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Heading(
        $wp_customize,
        'yatri_left_sidebar_heading',
        array(
            'label' => esc_html__('Left Sidebar Options', 'yatri'),
            'section' => 'yatri_section_sidebars_options',
            'priority' => 20

        )
    )
);
// Blog Archive Design & Styling
$wp_customize->add_setting(yatri_get_customizer_id('left_sidebar_design_style'),
    array(
        'default' => $default['left_sidebar_design_style'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' 			=> 'postMessage',


    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('left_sidebar_design_style'),
        array(
            'label' => esc_html__('Design & Styling ( Left Sidebar )', 'yatri'),
            'section' => 'yatri_section_sidebars_options',
            'priority' => 40,
            'type' => 'yatri-style',

        )
    )
);


// Right Sidebar Options
$wp_customize->add_setting(
    'yatri_right_sidebar_heading',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Heading(
        $wp_customize,
        'yatri_right_sidebar_heading',
        array(
            'label' => esc_html__('Right Sidebar Options', 'yatri'),
            'section' => 'yatri_section_sidebars_options',
            'priority' => 60

        )
    )
);
// Blog Archive Design & Styling
$wp_customize->add_setting(yatri_get_customizer_id('right_sidebar_design_style'),
    array(
        'default' => $default['right_sidebar_design_style'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' 			=> 'postMessage',


    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('right_sidebar_design_style'),
        array(
            'label' => esc_html__('Design & Styling ( Right Sidebar )', 'yatri'),
            'section' => 'yatri_section_sidebars_options',
            'priority' => 80,
            'type' => 'yatri-style',

        )
    )
);
