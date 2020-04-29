<?php
/**
 * Displays Releated Post on single post
 *
 * @package Codify
 */
?>
<section class="related-post-section">
    <?php global $post; 
    $related_number = get_theme_mod( 'related_number', 4 );
    $related_title  = get_theme_mod( 'related_title', esc_html__( 'Related Post', 'codify') );

    $args = array(
        'fields'=>'ids'
    );
    $related_catId = wp_get_post_categories($post->ID, $args);
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => absint( $related_number),
        'post_status' => 'publish',
        'paged' => 1,
        'category__in' => $related_catId,
        'post__not_in'  =>array(get_the_ID())
    );  
    $the_query = new WP_Query( $args ); 
    if ($the_query->have_posts()) : $count= 0; ?>  
        <?php if ( !empty( $related_post_title ) ): ?>
            <div class="heading">
                <header class="entry-header">
                    <h3 class="entry-title"><?php echo esc_html( $related_title );?></h3>
                </header>
            </div>
        <?php endif; ?>              
        <div class="related-post-wrap">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post();          ?>
                <article class="featured-post post hentry">
                    <?php codify_post_thumbnail(); ?>
                    <div class="post-content">
                        <header class="entry-header">
                            <h4 class="entry-title">
                                <a href="<?php the_permalink();?>"><?php the_title();?></a>
                            </h4>
                        </header>
                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div>
						<div class="entry-meta">
							<?php
							codify_posted_on();
							codify_posted_by();
							?>
						</div><!-- .entry-meta -->
                    </div>
                </article>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
        
    <?php endif;?>  
</section>