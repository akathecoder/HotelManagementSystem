<?php
/**
 * Section: Blog Page Options.
 */

$wp_customize->add_section('yatri_section_single_page_options',
    array(
        'title' => esc_html__('Single Page', 'yatri'),
        'priority' => 500,
        'panel' => YATRI_THEME_OPTION_PANEL,
    )
);

include_once 'single-page/page.php';

