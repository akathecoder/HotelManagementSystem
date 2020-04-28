<footer class="post-footer">
    <div class="detail">
        <?php yatri_single_post_author() ?>
        <?php yatri_time_link(); ?>
        <span class="meta-comment comment-link"><a
                    href="<?php comments_link(); ?>"><?php printf(esc_html('%d'), absint(wp_count_comments(get_the_ID())->approved)); ?></a></span>

        <?php if (is_single() && 'post' == get_post_type()): ?>

            <?php if (get_the_tag_list()): ?>
                <span class="tag-links">
                        <span class="screen-reader-text"><?php echo esc_html__('Tags', 'yatri'); ?></span>
                    <?php echo get_the_tag_list('', ', '); ?>
						</span>
            <?php endif; ?>

        <?php endif; ?>
        <?php if (get_the_category_list()): ?>
            <span class="cat-links">
						<span class="screen-reader-text">
							<?php echo esc_html__('Categories', 'yatri'); ?>
						</span>
                <?php echo get_the_category_list(' '); ?>
					</span>
        <?php endif; ?>
    </div>
</footer>