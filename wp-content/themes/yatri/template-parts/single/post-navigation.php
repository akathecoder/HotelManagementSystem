<div class="yatri-post-navigation">
    <?php
    # Prints out the contents of this post after applying filters.
    wp_link_pages(array(
        'before' => '<div class="page-links">' . esc_html__('Pages:', 'yatri'),
        'after' => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after' => '</span>',
    ));
    ?>
</div>