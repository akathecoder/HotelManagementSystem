<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since 1.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-content'); ?>>
    <div class="post-content-inner">
        <?php


        yatri_page_title();
        yatri_page_feature_image();

        ?>

        <div class="post-text">
            <?php
            # Prints out the contents of this post after applying filters.
            the_content();
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'yatri'),
                'after' => '</div>',
                'link_before' => '<span class="page-number">',
                'link_after' => '</span>',
            ));
            ?>
        </div>
        <?php //yatri_entry_footer(); ?>
    </div>
</article>