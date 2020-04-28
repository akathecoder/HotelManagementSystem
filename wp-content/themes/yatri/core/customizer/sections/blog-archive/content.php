<?php
$wp_customize->add_section(new Mantrabrain_Theme_Customizer_Section(
    $wp_customize, 'yatri_section_blog_archive_page_content_options', array(
    'title' => esc_html__('Content & Metas', 'yatri'),
    'panel' => YATRI_THEME_OPTION_PANEL,
    'section' => 'yatri_section_blog_archive_page_options',
    'priority' => 40,
)));

include_once 'content/main.php';

include_once 'section/thumbnail.php';

include_once 'section/post_meta.php';


