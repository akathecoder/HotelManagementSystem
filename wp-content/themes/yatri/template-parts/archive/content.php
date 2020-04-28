<?php

$class = 'yatri-article-wrap ';

?>

<div class="<?php echo esc_attr($class); ?>">

    <?php yatri_get_page_title('inside_content'); ?>


    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-wrap'); ?>>

        <?php

        $args = array(
            'size' => 'yatri-1170-710'
        );

        # Disabling dummy thumbnails when its in search page, also support for jetpack's infinite scroll
        if ('post' != get_post_type() && yatri_is_search_page()) {
            $args['dummy'] = false;
        }
        ?>
        <div class="post-content">
            <div class="post-content-inner">
                <?php

                $page_content_orders = yatri_blog_archive_page_content_order();

                if (yatri_is_archive_page()) {

                    $page_content_orders = yatri_blog_archive_page_content_order('blog_archive_page_content_order');

                    $size = yatri_get_option('blog_archive_page_thumbnail_size');

                    $args['size'] = !empty($size) ? sanitize_text_field($size) : $args['size'];

                }
                foreach ($page_content_orders as $order_key => $order_content) {

                    $is_disable = isset($order_content['disable']) ? (boolean)$order_content['disable'] : false;

                    if (!$is_disable) {

                        switch ($order_key) {

                            case "thumbnail":
                                yatri_get_post_thumbnail($args, true);
                                break;
                            case "category":
                                if ('post' == get_post_type()):
                                    echo '<div class="yatri-taxonomy-wrap">';
                                    yatri_get_post_categories();
                                    yatri_get_post_tags();
                                    echo '</div>';

                                endif;
                                break;

                            case "post_title":
                                yatri_get_post_title();
                                break;

                            case "post_meta":
                                if ('post' == get_post_type()) {
                                    yatri_get_post_meta();
                                }
                                break;

                            case "excerpt":
                                yatri_get_post_excerpt();
                                break;
                        }
                    }
                }

                yatri_get_post_readmore_button();

                ?>
            </div>
        </div>
    </article>
</div>
