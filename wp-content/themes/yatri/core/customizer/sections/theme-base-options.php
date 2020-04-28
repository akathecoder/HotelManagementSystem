<?php
/**
 * Section: Base.
 */
/**
 */
$wp_customize->add_section(new Mantrabrain_Theme_Customizer_Section(
    $wp_customize,
    'yatri_section_base_options', array(
    'title' => esc_html__('Base (Global)', 'yatri'),
    'panel' => YATRI_THEME_OPTION_PANEL,
    'priority' => 100,
)));
include_once 'base/layouts.php';
include_once 'base/typography.php';
include_once 'base/forms-and-buttons.php';
include_once 'base/breadcrumb.php';


