<?php
// Pagination


$wp_customize->add_setting(yatri_get_customizer_id('blog_archive_pagination_style'),
    array(
        'default' => $default['blog_archive_pagination_style'],
        'sanitize_callback' => 'yatri_sanitize_select',
    )
);

$wp_customize->add_control(yatri_get_customizer_id('blog_archive_pagination_style'),
    array(
        'label' => esc_html__('Pagination Style', 'yatri'),
        'section' => 'yatri_section_blog_archive_page_pagination_options',
        'type' => 'select',
        'priority' => 20,
        'choices' => yatri_pagination_style()
    )
);



$wp_customize->add_setting(yatri_get_customizer_id('blog_archive_pagination_design_style'),
    array(
        'default' => $default['blog_archive_pagination_design_style'],
        'sanitize_callback' => array('Mantrabrain_Theme_Helper', 'sanitize_modal'),
        'transport' 			=> 'postMessage',


    )
);

$wp_customize->add_control(
    new Mantrabrain_Theme_Customizer_Control_Modal(
        $wp_customize,
        yatri_get_customizer_id('blog_archive_pagination_design_style'),
        array(
            'label' => esc_html__('Design & Styling', 'yatri'),
            'section' => 'yatri_section_blog_archive_page_pagination_options',
            'priority' => 40,
            'type' => 'yatri-style',

        )
    )
);
