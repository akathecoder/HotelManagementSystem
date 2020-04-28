<?php
$wp_customize->add_section(new Mantrabrain_Theme_Customizer_Section(
    $wp_customize, 'yatri_section_single_post_related_posts_options', array(
    'title' => esc_html__('Related Posts', 'yatri'),
    'panel' => YATRI_THEME_OPTION_PANEL,
    'section' => 'yatri_section_single_post_options',
    'priority' => 60,
)));

