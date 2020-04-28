<?php
// Blog page readmore text
$wp_customize->add_setting(yatri_get_customizer_id('blog_archive_page_readmore_text'),
    array(
        'default' => $default['blog_archive_page_readmore_text'],
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',

    )
);
$wp_customize->add_control(yatri_get_customizer_id('blog_archive_page_readmore_text'),
    array(
        'label' => esc_html__('Read More text', 'yatri'),
        'section' => 'yatri_section_blog_archive_page_readmore_text_options',
        'type' => 'text',
        'priority' => 40,
    )
);

$wp_customize->add_setting(yatri_get_customizer_id('blog_archive_page_readmore_text_icon'),
    array(
        'default' => $default['blog_archive_page_readmore_text_icon'],
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',

    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Icon_Picker(
        $wp_customize,
        yatri_get_customizer_id('blog_archive_page_readmore_text_icon'),
        array(
            'label' => esc_html__('Readmore Text Icon', 'yatri'),
            'section' => 'yatri_section_blog_archive_page_readmore_text_options',
            'priority' => 60,

        )
    )
);

// Design & Styling for readmore text

$wp_customize->add_setting(yatri_get_customizer_id('blog_archive_page_readmore_design_styling'),
    array(
        'default' => $default['blog_archive_page_readmore_design_styling'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' 			=> 'postMessage',


    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('blog_archive_page_readmore_design_styling'),
        array(
            'label' => esc_html__('Design & Styling', 'yatri'),
            'section' => 'yatri_section_blog_archive_page_readmore_text_options',
            'priority' => 80,
            'type' => 'yatri-style',

        )
    )
);
