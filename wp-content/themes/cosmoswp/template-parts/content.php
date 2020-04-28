<?php
/**
 * Template part for displaying posts and search results.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CosmosWP
 * @subpackage CosmosWP
 */

/*featured image*/
if (has_post_thumbnail()) {
    $featured_image_layout = cosmoswp_get_theme_options('blog-feature-section-layout');
} else {
    $featured_image_layout = 'no-image';
}
do_action('cosmoswp_action_before_blog_post');
?>

    <div <?php cosmoswp_blog_grid_classes(); ?>>
        <article id="post-<?php the_ID(); ?>" <?php post_class($featured_image_layout); ?>>
            <?php
            do_action( 'cosmoswp_blog_loop_item' );
            ?>
        </article><!--  #post-  -->
    </div>

<?php
do_action('cosmoswp_action_after_blog_post');