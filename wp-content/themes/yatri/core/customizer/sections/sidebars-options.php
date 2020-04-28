<?php
/**
 * Section: Blog Page Options.
 */

$wp_customize->add_section('yatri_section_sidebars_options',
    array(
        'title' => esc_html__('Sidebar', 'yatri'),
        'priority' => 600,
        'panel' => YATRI_THEME_OPTION_PANEL,
    )
);

include_once 'sidebar/main.php';

