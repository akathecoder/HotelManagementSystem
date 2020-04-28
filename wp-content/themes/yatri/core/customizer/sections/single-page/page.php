<?php

// Single Page
$wp_customize->add_setting(yatri_get_customizer_id('page_design_style'),
    array(
        'default' => $default['page_design_style'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' => 'postMessage',


    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('page_design_style'),
        array(
            'label' => esc_html__('Design & Styling ( Section )', 'yatri'),
            'section' => 'yatri_section_single_page_options',
            'priority' => 20,
            'type' => 'yatri-style',

        )
    )
);


$wp_customize->add_setting(yatri_get_customizer_id('page_title_position'),
    array(
        'default' => $default['page_title_position'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);

$wp_customize->add_control(yatri_get_customizer_id('page_title_position'),
    array(
        'label' => esc_html__('Page title position', 'yatri'),
        'section' => 'yatri_section_single_page_options',
        'type' => 'select',
        'priority' => 40,
        'choices' => yatri_page_title_position()
    )
);


$wp_customize->add_setting(yatri_get_customizer_id('page_heading_tag'),
    array(
        'default' => $default['page_heading_tag'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);

$wp_customize->add_control(yatri_get_customizer_id('page_heading_tag'),
    array(
        'label' => esc_html__('Page Heading tag', 'yatri'),
        'section' => 'yatri_section_single_page_options',
        'type' => 'select',
        'priority' => 60,
        'choices' => yatri_heading_tags()
    )
);


$wp_customize->add_setting(yatri_get_customizer_id('page_layout'),
    array(
        'default' => $default['page_layout'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);


$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Radio(
        $wp_customize,
        yatri_get_customizer_id('page_layout'),
        array(
            'label' => esc_html__('Layout Style', 'yatri'),
            'section' => 'yatri_section_single_page_options',
            'priority' => 80,
            'choices' => yatri_layout_options(),
            'has_images' => true,

        )
    )
);
// Setting page_sidebar_width.
$wp_customize->add_setting(yatri_get_customizer_id('page_sidebar_width'),
    array(
        'default' => $default['page_sidebar_width'],
        'sanitize_callback' => 'yatri_sanitize_slider',
        'transport' => 'postMessage',

    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Slider(
        $wp_customize,
        yatri_get_customizer_id('page_sidebar_width'),
        array(
            'label' => esc_html__('Sidebar Width (%)', 'yatri'),
            'section' => 'yatri_section_single_page_options',
            'priority' => 100,
            'input_attrs' => array(
                'min' => 15,
                'max' => 50,
                'step' => 1
            ),
        )
    )
);


$wp_customize->add_setting(yatri_get_customizer_id('page_article_design_styling'),
    array(
        'default' => $default['page_article_design_styling'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' => 'postMessage',


    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('page_article_design_styling'),
        array(
            'label' => esc_html__('Design & Styling ( Content )', 'yatri'),
            'section' => 'yatri_section_single_page_options',
            'priority' => 120,
            'type' => 'yatri-style',

        )
    )
);




