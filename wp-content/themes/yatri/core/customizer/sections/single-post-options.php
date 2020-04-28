<?php
/*
 * Section: Single Post Options
 */
$wp_customize->add_section(new Mantrabrain_Theme_Customizer_Section(
    $wp_customize,
    'yatri_section_single_post_options', array(
    'title' => esc_html__('Single Post', 'yatri'),
    'panel' => YATRI_THEME_OPTION_PANEL,
    'priority' => 400,
)));


include_once 'single-post/layouts.php';

include_once 'single-post/content.php';

$single_post_content_priority = 100;

$yatri_single_post_content_order = yatri_single_post_content_order(false);

foreach ($yatri_single_post_content_order as $single_post_content_key => $single_post_contents) {

    $include_path = 'single-post/content/' . $single_post_content_key;

    switch ($single_post_content_key) {

        case "post_meta":
        case "related_posts":

            $include_path = 'single-post/content/' . $single_post_content_key . '.php';

            break;

        default:

            $include_path = 'single-post/meta/' . $single_post_content_key . '.php';

            break;

    }

    if (file_exists(YATRI_THEME_DIR . '/core/customizer/sections/' . $include_path)) {

        include_once $include_path;
    }
}
include_once 'single-post/related-posts.php';

