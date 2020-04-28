<?php

// Meta Settings Heading
$wp_customize->add_setting(
    'blog_archive_page_thumbnail_setting_heading',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Heading(
        $wp_customize,
        'blog_archive_page_thumbnail_setting_heading',
        array(
            'label' => esc_html__('Thumbnail Settings', 'yatri'),
            'section' => 'yatri_section_blog_archive_page_content_options',
            'priority' => 400,
            'active_callback' => 'yatri_blog_archive_page_has_thumbnail'


        )
    )
);

// Blog Page Thumbnail size
$wp_customize->add_setting(yatri_get_customizer_id('blog_archive_page_thumbnail_size'),
    array(
        'default' => $default['blog_archive_page_thumbnail_size'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);

$wp_customize->add_control(yatri_get_customizer_id('blog_archive_page_thumbnail_size'),
    array(
        'label' => esc_html__('Thumbnail Size', 'yatri'),
        'section' => 'yatri_section_blog_archive_page_content_options',
        'type' => 'select',
        'priority' => 500,
        'choices' => yatri_get_all_image_sizes(),
        'active_callback' => 'yatri_blog_archive_page_has_thumbnail'
    )
);