<?php

$learn_more_text = esc_html__('Learn More', 'yatri');
$learn_more_icon = 'fas fa-long-arrow-alt-right';

if (yatri_is_archive_page()) {

    $learn_more_text = yatri_get_option('blog_archive_page_readmore_text');
    $learn_more_icon = yatri_get_option('blog_archive_page_readmore_text_icon');
}
if (!empty($learn_more_text)) {
    ?>
    <div class="button-container learn-more-btn">
        <a href="<?php the_permalink(); ?>" class="button-text">
            <?php echo esc_html($learn_more_text);
            if (!empty($learn_more_icon)) {
                ?>
                <span class="<?php echo esc_attr($learn_more_icon); ?>"></span>
            <?php } ?>
        </a>
    </div>
<?php } ?>