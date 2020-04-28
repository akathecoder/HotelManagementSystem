<?php
/**
 * Template part for displaying main content in post.php
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CosmosWP
 */
?>
<div class="cosmoswp-dynamic-post-content">
    <?php
    if (have_posts()) :

        /* Start the Loop */
        while (have_posts()) : the_post();
            /*
             * Include the Post-Format-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            get_template_part('./template-parts/content', 'single');
        endwhile;

        /**
         * cosmoswp_action_posts_navigation hook
         * @since CosmosWP 1.0.0
         *
         * @hooked cosmoswp_action_posts_navigation - 10
         */
        do_action('cosmoswp_action_post_navigation');

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
    else :
        get_template_part('./template-parts/content', 'none');
    endif; ?>
</div>