<?php
$wp_customize->add_section(new Mantrabrain_Theme_Customizer_Section(
    $wp_customize, 'yatri_section_single_post_content_options', array(
    'title' => esc_html__('Content & Metas', 'yatri'),
    'panel' => YATRI_THEME_OPTION_PANEL,
    'section' => 'yatri_section_single_post_options',
    'priority' => 40,
)));

include_once 'content/main.php';

