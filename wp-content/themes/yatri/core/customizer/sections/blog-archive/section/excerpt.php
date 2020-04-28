<?php
// Archive page excerpt section
$wp_customize->add_setting(yatri_get_customizer_id('blog_archive_page_excerpt_type'),
    array(
        'default' => $default['blog_archive_page_excerpt_type'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);
$wp_customize->add_control(yatri_get_customizer_id('blog_archive_page_excerpt_type'),
    array(
        'label' => esc_html__('Excerpt type', 'yatri'),
        'section' => 'yatri_section_blog_archive_page_excerpt_options',
        'type' => 'select',
        'priority' => 20,
        'choices' => yatri_get_excerpt_type(),
    )
);

$wp_customize->add_setting(yatri_get_customizer_id('blog_archive_page_excerpt_length'),
    array(
        'default' => $default['blog_archive_page_excerpt_length'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(yatri_get_customizer_id('blog_archive_page_excerpt_length'),
    array(
        'label' => esc_html__('Excerpt length', 'yatri'),
        'section' => 'yatri_section_blog_archive_page_excerpt_options',
        'type' => 'number',
        'priority' => 40,
        'active_callback' => 'yatri_blog_archive_page_has_custom_excerpt'
    )
);
// Excerpt more texx
$wp_customize->add_setting(yatri_get_customizer_id('blog_archive_page_excerpt_more_text'),
    array(
        'default' => $default['blog_archive_page_excerpt_more_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(yatri_get_customizer_id('blog_archive_page_excerpt_more_text'),
    array(
        'label' => esc_html__('Excerpt more', 'yatri'),
        'section' => 'yatri_section_blog_archive_page_excerpt_options',
        'type' => 'text',
        'priority' => 60,
    )
);