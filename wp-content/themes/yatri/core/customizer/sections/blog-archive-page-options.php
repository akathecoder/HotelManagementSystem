<?php
/**
 * Section: Archive Page Options.
 */
$wp_customize->add_section(new Mantrabrain_Theme_Customizer_Section(
    $wp_customize,
    'yatri_section_blog_archive_page_options', array(
    'title' => esc_html__('Blog/Archive', 'yatri'),
    'panel' => YATRI_THEME_OPTION_PANEL,
    'priority' => 300,
)));

include_once 'blog-archive/layouts.php';

include_once 'blog-archive/content.php';

include_once 'blog-archive/readmore.php';

include_once 'blog-archive/excerpt.php';

include_once 'blog-archive/pagination.php';




