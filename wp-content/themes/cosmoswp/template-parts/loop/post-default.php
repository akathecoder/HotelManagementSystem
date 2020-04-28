<?php
/**
 * Template part for displaying posts and search results.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CosmosWP
 * @subpackage CosmosWP
 */
$post_sorting_element = cosmoswp_get_theme_options('post-elements-sorting');
$post_sorting_element = apply_filters('cosmoswp_post_elements', $post_sorting_element);

if (!is_array($post_sorting_element) || empty($post_sorting_element)) {
    get_template_part('template-parts/content', 'none');
    return;
}
/* meta data */
$primary_meta_element   = cosmoswp_get_theme_options('post-primary-meta-sorting');
$secondary_meta_element = cosmoswp_get_theme_options('post-secondary-meta-sorting');

/*featured image*/
$excerpt_length = cosmoswp_get_theme_options('post-excerpt-length');
$thumbnail_size = cosmoswp_get_theme_options('post-img-size');

if (has_post_thumbnail()) {
    $featured_image_layout = cosmoswp_get_theme_options('post-feature-section-layout');
} else {
    $featured_image_layout = 'no-image';
}
cosmoswp_contents_collection($post_sorting_element,$excerpt_length, $primary_meta_element, $secondary_meta_element, $featured_image_layout, $thumbnail_size);
