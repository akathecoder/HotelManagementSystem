<?php
/**
 * Template part for displaying posts main content of blog
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CosmosWP
 */
$blog_sorting_element = cosmoswp_get_theme_options('blog-elements-sorting');
if ($blog_sorting_element) {
    ?>
    <div class="cwp-dynamic-blog-content">
        <?php
        if (have_posts()) :
            echo '<div class="grid-row cwp-blog-grid-row">';
            /* Start the Loop */
            while (have_posts()) : the_post();
                /*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
                get_template_part('./template-parts/content', get_post_format());
            endwhile;
            echo '</div>';

            /**
             * cosmoswp_action_posts_navigation hook
             * @since CosmosWP 1.0.0
             *
             * @hooked cosmoswp_action_posts_navigation - 10
             */
            do_action('cosmoswp_action_posts_navigation');
        else :
            get_template_part('./template-parts/content', 'none');
        endif;
        ?>
    </div>
    <?php
} else {
    echo esc_html__('Blog element are disabled from customize blog options,please vist blog option.', 'cosmoswp');
}