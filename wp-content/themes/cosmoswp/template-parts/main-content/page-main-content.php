<?php
/**
 * Template part for displaying main content in page.php
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CosmosWP
 */
?>
<div class="cosmoswp-dynamic-page-content">
    <?php
    while (have_posts()) : the_post();

        get_template_part('./template-parts/content', 'page');

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
    endwhile; // End of the loop.
    ?>
</div><!-- #primary -->