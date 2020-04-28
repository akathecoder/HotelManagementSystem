<?php
// Content Settings Heading

$wp_customize->add_setting(
    'single_post_setting_heading',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Heading(
        $wp_customize,
        'single_post_setting_heading',
        array(
            'label' => esc_html__('Content Options', 'yatri'),
            'section' => 'yatri_section_single_post_content_options',
            'priority' => 40

        )
    )
);


$wp_customize->add_setting(yatri_get_customizer_id('single_post_title_position'),
    array(
        'default' => $default['single_post_title_position'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);

$wp_customize->add_control(yatri_get_customizer_id('single_post_title_position'),
    array(
        'label' => esc_html__('Post title position', 'yatri'),
        'section' => 'yatri_section_single_post_content_options',
        'type' => 'select',
        'priority' => 60,
        'choices' => yatri_page_title_position()
    )
);
$wp_customize->add_setting(yatri_get_customizer_id('single_post_heading_tag'),
    array(
        'default' => $default['single_post_heading_tag'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);

$wp_customize->add_control(yatri_get_customizer_id('single_post_heading_tag'),
    array(
        'label' => esc_html__('Single Post Heading tag', 'yatri'),
        'section' => 'yatri_section_single_post_content_options',
        'type' => 'select',
        'priority' => 80,
        'choices' => yatri_heading_tags()
    )
);

$wp_customize->add_setting(yatri_get_customizer_id('single_post_content_order'),
    array(
        'default' => $default['single_post_content_order'],
        'sanitize_callback' => 'yatri_sanitize_ordering',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Sortable(
        $wp_customize,
        yatri_get_customizer_id('single_post_content_order'),
        array(
            'label' => esc_html__('Content  Ordering', 'yatri'),
            'section' => 'yatri_section_single_post_content_options',
            'priority' => 100,

        )
    )
);
$wp_customize->add_setting(yatri_get_customizer_id('single_post_article_design_styling'),
    array(
        'default' => $default['single_post_article_design_styling'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' 			=> 'postMessage',


    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('single_post_article_design_styling'),
        array(
            'label' => esc_html__('Design & Styling ( Post/Article )', 'yatri'),
            'section' => 'yatri_section_single_post_content_options',
            'priority' => 120,
            'type' => 'yatri-style',

        )
    )
);