<?php if (get_the_category_list()): ?>
    <span class="yatri-category-list yatri-content-item">
                <span class="screen-reader-text"><?php echo esc_html__('Categories', 'yatri'); ?></span>
        <?php echo get_the_category_list('<span class="yatri-taxonomy-sep">/</span>', ' '); ?>
            </span>

<?php endif; ?>