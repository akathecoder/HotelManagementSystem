<?php

$wp_customize->add_section(new Mantrabrain_Theme_Customizer_Section(
    $wp_customize,
    'yatri_section_footer_options', array(
    'title' => esc_html__('Footer', 'yatri'),
    'panel' => YATRI_THEME_OPTION_PANEL,
    'priority' => 700,
)));

include_once 'footer/widgets.php';
include_once 'footer/bottom.php';

