<?php
/**
 * Displays Author bio on single post
 *
 * @package Codify
 */

$byline = sprintf(
    /* translators: %s: post author. */
    esc_html_x( 'VIEW ALL POSTS BY %s', 'post author', 'codify' ),
    '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
); ?>
<aside class="widget widget-post-author">
    <div class="author-wrapper">
        <figure class="avatar">
            <?php echo wp_kses_post( get_avatar( get_the_author_meta( 'ID' ) ) ); ?>
        </figure>
        <div class="author-details">
            <h3><?php echo esc_html( get_the_author() );?></h3>
            <?php echo esc_html(get_the_author_meta( 'description', get_the_author_meta( 'ID' ) ));?>
            <div class="author-intro">
                <?php echo  $byline;  // WPCS: XSS OK. ?>
            </div>
        </div>
    </div>
</aside> 
