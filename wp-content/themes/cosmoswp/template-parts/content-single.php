<?php
/**
 * Template part for displaying post content in single.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CosmosWP
 * @subpackage CosmosWP
 */
/* post element with sorting */

if (has_post_thumbnail()) {
    $featured_image_layout = cosmoswp_get_theme_options('post-feature-section-layout');
} else {
    $featured_image_layout = 'no-image';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($featured_image_layout); ?>>
    <?php
    do_action( 'cosmoswp_single_post_loop_item' );
    ?>
</article><!--  #post-  -->