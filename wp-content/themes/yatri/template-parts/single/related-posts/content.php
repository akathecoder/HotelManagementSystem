<?php

$class = 'yatri-article-wrap ';

$number_of_related_posts_columns = yatri_get_option('single_post_related_posts_columns');

switch ($number_of_related_posts_columns) {
    case "1":
        $class .= 'yat-col-12';
        break;
    case "2":
        $class .= 'yat-col-lg-6';
        break;
    case "3":
        $class .= 'yat-col-lg-4';
        break;
    case "4":
        $class .= 'yat-col-lg-3';
        break;
    default:
        $class .= 'yat-col-12';
        break;
}

?>

<div class="<?php echo esc_attr($class); ?>">

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

                foreach ($page_content_orders as $order_index => $order_content) {

                    $is_disable = isset($order_content['disable']) ? (boolean)$order_content['disable'] : false;

                    if (!$is_disable) {

                        switch ($order_index ) {

                            case "thumbnail":
                                get_template_part('template-parts/single/related-posts/thumbnail');

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
                                get_template_part('template-parts/single/related-posts/post-title');
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
