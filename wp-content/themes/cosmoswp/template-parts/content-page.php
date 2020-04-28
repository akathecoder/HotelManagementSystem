<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CosmosWP
 * @subpackage CosmosWP
 */

/* check element banner title type and select page element */
$page_sorting_element = cosmoswp_get_theme_options('page-elements-sorting-with-title');
$page_sorting_element = apply_filters('cosmoswp_page_elements', $page_sorting_element);

/* page element with sorting */
if (!is_array($page_sorting_element) || empty($page_sorting_element)) {
    return;
}
/* meta */
$primary_meta_element   = cosmoswp_get_theme_options('page-primary-meta-sorting');
$secondary_meta_element = cosmoswp_get_theme_options('page-secondary-meta-sorting');

/*featured image*/
$thumbnail_size = cosmoswp_get_theme_options('page-img-size');
if (has_post_thumbnail()) {
    $featured_image_layout = cosmoswp_get_theme_options('page-feature-section-layout');
}
else {
    $featured_image_layout = 'no-image';
}

$excerpt_length = cosmoswp_get_theme_options('page-excerpt-length');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($featured_image_layout); ?>>
    <?php
    cosmoswp_contents_collection($page_sorting_element,$excerpt_length, $primary_meta_element, $secondary_meta_element, $featured_image_layout, $thumbnail_size);
    ?>
</article><!-- #post-## -->