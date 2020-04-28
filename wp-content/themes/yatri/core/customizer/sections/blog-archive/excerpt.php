<?php
$wp_customize->add_section(new Mantrabrain_Theme_Customizer_Section(
    $wp_customize, 'yatri_section_blog_archive_page_excerpt_options', array(
    'title' => esc_html__('Excerpt', 'yatri'),
    'panel' => YATRI_THEME_OPTION_PANEL,
    'section' => 'yatri_section_blog_archive_page_options',
    'priority' => 80,
)));
include_once 'section/excerpt.php';

