<?php

// Meta Settings Heading
$wp_customize->add_setting(
    'blog_archive_page_meta_setting_heading',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Heading(
        $wp_customize,
        'blog_archive_page_meta_setting_heading',
        array(
            'label' => esc_html__('Meta Options', 'yatri'),
            'section' => 'yatri_section_blog_archive_page_content_options',
            'priority' => 600,
            'active_callback' => 'yatri_blog_archive_page_has_meta'

        )
    )
);
// Meta Content Seperator
$wp_customize->add_setting(yatri_get_customizer_id('blog_archive_page_meta_content_separator'),
    array(
        'default' => $default['blog_archive_page_meta_content_separator'],
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',

    )
);
$wp_customize->add_control(yatri_get_customizer_id('blog_archive_page_meta_content_separator'),
    array(
        'label' => esc_html__('Meta Separator Text', 'yatri'),
        'section' => 'yatri_section_blog_archive_page_content_options',
        'type' => 'text',
        'priority' => 700,
        'active_callback' => 'yatri_blog_archive_page_has_meta'
    )
);
// Meta Content Seperator Width

$wp_customize->add_setting(yatri_get_customizer_id('blog_archive_page_meta_content_separator_width'),
    array(
        'default' => $default['blog_archive_page_meta_content_separator_width'],
        'sanitize_callback' => 'yatri_sanitize_slider',
        'transport' => 'postMessage',


    )
);
$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Slider(
        $wp_customize,
        yatri_get_customizer_id('blog_archive_page_meta_content_separator_width'),
        array(
            'label' => esc_html__('Meta Separator Width ( in px ) ', 'yatri'),
            'section' => 'yatri_section_blog_archive_page_content_options',
            'priority' => 800,
            'input_attrs' => array(
                'min' => 0,
                'max' => 15,
                'step' => 1
            ),
            'active_callback' => 'yatri_blog_archive_page_has_meta'
        )
    )
);

// Meta Layout Style
$wp_customize->add_setting(yatri_get_customizer_id('blog_archive_page_meta_style'),
    array(
        'default' => $default['blog_archive_page_meta_style'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(yatri_get_customizer_id('blog_archive_page_meta_style'),
    array(
        'label' => esc_html__('Meta Style', 'yatri'),
        'section' => 'yatri_section_blog_archive_page_content_options',
        'type' => 'select',
        'priority' => 900,
        'choices' => yatri_meta_style_list(),
        'active_callback' => 'yatri_blog_archive_page_has_meta'
    )
);


// Meta Content Order
$wp_customize->add_setting(yatri_get_customizer_id('blog_archive_page_meta_content_order'),
    array(
        'default' => $default['blog_archive_page_meta_content_order'],
        'sanitize_callback' => 'yatri_sanitize_ordering',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Sortable(
        $wp_customize,
        yatri_get_customizer_id('blog_archive_page_meta_content_order'),
        array(
            'label' => esc_html__('Meta  Ordering', 'yatri'),
            'section' => 'yatri_section_blog_archive_page_content_options',
            'priority' => 1000,
            'active_callback' => 'yatri_blog_archive_page_has_meta'

        )
    )
);

