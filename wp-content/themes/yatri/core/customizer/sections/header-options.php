<?php
/**
 * Section: Base.
 */
/**
 */
$wp_customize->add_section(new Mantrabrain_Theme_Customizer_Section(
    $wp_customize,
    'yatri_section_header_options', array(
    'title' => esc_html__('Header', 'yatri'),
    'panel' => YATRI_THEME_OPTION_PANEL,
    'priority' => 200,
)));

include_once 'header/logo.php';
include_once 'header/top.php';
include_once 'header/mid.php';
include_once 'header/bottom.php';
include_once 'header/template.php';

