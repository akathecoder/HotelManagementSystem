<?php if (get_the_tag_list()): ?>
    <span class="yatri-tag-list yatri-content-item">
                        <span class="screen-reader-text"><?php echo esc_html__('Tags', 'yatri'); ?></span>
        <?php echo get_the_tag_list('', '<span class="yatri-taxonomy-sep">/</span>'); ?>
    </span>
<?php endif; ?>