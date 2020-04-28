<?php

// Meta Settings Heading
$wp_customize->add_setting(
    'single_post_related_posts_setting_heading',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',


    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Heading(
        $wp_customize,
        'single_post_related_posts_setting_heading',
        array(
            'label' => esc_html__('Related Posts Settings', 'yatri'),
            'section' => 'yatri_section_single_post_related_posts_options',
            'priority' => 20,
            'active_callback' => 'yatri_single_post_has_related_posts'

        )
    )
);
// Related Posts Heading Text
$wp_customize->add_setting(yatri_get_customizer_id('single_post_related_posts_heading_text'),
    array(
        'default' => $default['single_post_related_posts_heading_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(yatri_get_customizer_id('single_post_related_posts_heading_text'),
    array(
        'label' => esc_html__('Related Post Heading', 'yatri'),
        'section' => 'yatri_section_single_post_related_posts_options',
        'type' => 'text',
        'priority' => 40,
        'active_callback' => 'yatri_single_post_has_related_posts'
    )
);

// Related Post Taxonomy
$wp_customize->add_setting(yatri_get_customizer_id('single_post_related_posts_taxonomy'),
    array(
        'default' => $default['single_post_related_posts_taxonomy'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);
$wp_customize->add_control(yatri_get_customizer_id('single_post_related_posts_taxonomy'),
    array(
        'label' => esc_html__('Related Posts Taxonomy', 'yatri'),
        'section' => 'yatri_section_single_post_related_posts_options',
        'type' => 'select',
        'priority' => 60,
        'active_callback' => 'yatri_single_post_has_related_posts',
        'choices' => yatri_get_post_taxonomy()
    )
);

//Related Posts Count
$wp_customize->add_setting(yatri_get_customizer_id('single_post_related_posts_count'),
    array(
        'default' => $default['single_post_related_posts_count'],
        'sanitize_callback' => 'yatri_sanitize_slider',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Slider(
        $wp_customize,
        yatri_get_customizer_id('single_post_related_posts_count'),
        array(
            'label' => esc_html__('Related Posts Count', 'yatri'),
            'section' => 'yatri_section_single_post_related_posts_options',
            'priority' => 80,
            'input_attrs' => array(
                'min' => 1,
                'max' => 50,
                'step' => 1
            ),
        )
    )
);


//Related Posts Columns
$wp_customize->add_setting(yatri_get_customizer_id('single_post_related_posts_columns'),
    array(
        'default' => $default['single_post_related_posts_columns'],
        'sanitize_callback' => 'yatri_sanitize_slider',
    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Slider(
        $wp_customize,
        yatri_get_customizer_id('single_post_related_posts_columns'),
        array(
            'label' => esc_html__('Related Posts Columns', 'yatri'),
            'section' => 'yatri_section_single_post_related_posts_options',
            'priority' => ++$single_post_content_priority,
            'input_attrs' => array(
                'min' => 1,
                'max' => 4,
                'step' => 1
            ),
        )
    )
);


// Excerpt Options
$wp_customize->add_setting(yatri_get_customizer_id('single_post_related_posts_excerpt_type'),
    array(
        'default' => $default['single_post_related_posts_excerpt_type'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);
$wp_customize->add_control(yatri_get_customizer_id('single_post_related_posts_excerpt_type'),
    array(
        'label' => esc_html__('Excerpt type for related posts', 'yatri'),
        'section' => 'yatri_section_single_post_related_posts_options',
        'type' => 'select',
        'priority' => ++$single_post_content_priority,
        'choices' => yatri_get_excerpt_type(),
    )
);

$wp_customize->add_setting(yatri_get_customizer_id('single_post_related_posts_excerpt_length'),
    array(
        'default' => $default['single_post_related_posts_excerpt_length'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(yatri_get_customizer_id('single_post_related_posts_excerpt_length'),
    array(
        'label' => esc_html__('Excerpt length for related posts', 'yatri'),
        'section' => 'yatri_section_single_post_related_posts_options',
        'type' => 'number',
        'priority' => ++$single_post_content_priority,
        'active_callback' => 'yatri_single_post_related_posts_has_custom_excerpt'
    )
);
// Excerpt more Text
$wp_customize->add_setting(yatri_get_customizer_id('single_post_related_posts_excerpt_more_text'),
    array(
        'default' => $default['single_post_related_posts_excerpt_more_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(yatri_get_customizer_id('single_post_related_posts_excerpt_more_text'),
    array(
        'label' => esc_html__('Excerpt more text for related posts', 'yatri'),
        'section' => 'yatri_section_single_post_related_posts_options',
        'type' => 'text',
        'priority' => ++$single_post_content_priority,
    )
);
