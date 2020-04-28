<?php

global $post;

$yatri_single_post_id = $post->ID;

$related_section_title = yatri_get_option('single_post_related_posts_heading_text');

$related_post_type = yatri_get_option('single_post_related_posts_taxonomy');

$number_of_related_posts = yatri_get_option('single_post_related_posts_count');

$number_of_related_posts = empty($number_of_related_posts) || absint($number_of_related_posts) < 1 ? 2 : $number_of_related_posts;

$related_args = array(
    'no_found_rows' => true,
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false,
    'ignore_sticky_posts' => 1,
    'post__not_in' => array($yatri_single_post_id),
    'posts_per_page' => absint($number_of_related_posts)
);

if ($related_post_type == 'tag') {

    $tags = wp_get_post_tags($yatri_single_post_id);
    if ($tags) {
        $tag_ids = array();
        foreach ($tags as $tag_ed) {
            $tag_ids[] = $tag_ed->term_id;
        }
        $related_args['tag__in'] = $tag_ids;
    }
} else {
    $categories = get_the_category($yatri_single_post_id);
    if ($categories) {
        $category_ids = array();
        foreach ($categories as $category_ed) {
            $category_ids[] = $category_ed->term_id;
        }
        $related_args['category__in'] = $category_ids;
    }
}


$related_posts = new wp_query($related_args);

if ($related_posts->have_posts()) {
    echo '<div class="yatri-related-posts yatri-content-item">';
    if (!empty($related_section_title)) {
        ?>
        <h4 class="widget-title">
                            <span class="header-after">
                                <?php echo esc_html($related_section_title); ?>
                            </span>
        </h4>
        <?php
    }
    echo '<div class="yat-row">';

    while ($related_posts->have_posts()) {
        $related_posts->the_post();
        // Display post
        get_template_part('template-parts/single/related-posts/content');

    }
    echo '</div>';
    echo '</div>';
}
wp_reset_postdata();

?>