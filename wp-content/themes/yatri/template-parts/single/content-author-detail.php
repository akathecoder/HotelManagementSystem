<?php
/**
 * Template part for displaying author details
 * @since 1.0.0
 */
?>
<div class="author-detail yatri-content-item">
    <div class="author-detail-inner">

        <div class="author-content <?php echo('' !== wpautop(get_the_author_meta('description')) ? '' : esc_attr('no-author-text')); ?>">
            <h3 class="author-name">
                <span><?php esc_html_e('Post Author:', 'yatri'); ?></span>
                <?php echo get_the_author(); ?>
            </h3>
            <div class="author">
                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                    <?php echo get_avatar(get_the_author_meta('ID'), 100); ?>
                </a>
            </div>
            <?php
            if ('' !== wpautop(get_the_author_meta('description'))): ?>
              
                <?php echo wp_kses_post(wpautop(get_the_author_meta('description'))); ?>

            <?php
            endif;
            ?>
        </div>
    </div>
</div>