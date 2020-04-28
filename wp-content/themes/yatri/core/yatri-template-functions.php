<?php
/**
 * Prints an accessibility-friendly link to edit a post or page.
 *
 * This also gives us a little context about what exactly we're editing
 * (post or page?) so that users understand a bit more where they are in terms
 * of the template hierarchy and their content. Helpful when/if the single-page
 * layout with multiple posts/pages shown gets confusing.
 *
 * @since 1.0.0
 * @return void
 */
if (!function_exists('yatri_edit_link')) :

    function yatri_edit_link($echo = true)
    {

        if (!$echo) {
            ob_start();
        }

        edit_post_link(
            sprintf(
            /* translators: %s: Name of the current post */
                __('EDIT<span class="screen-reader-text"> "%s"</span>', 'yatri'),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );

        if (!$echo) {
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }
    }
endif;

/**
 * Prints Author's name with a link, posted date and number of Total Comments.
 *
 * @since 1.0.0
 * @return void
 */

if (!function_exists('yatri_entry_footer')) :

    function yatri_entry_footer()
    {
        get_template_part('template-parts/parts/entry-footer', '');

    }
endif;


/**
 * Prints HTML with author avatar, name.
 *
 * @since 1.0.0
 * @uses yatri_time_link();
 * @return void
 */
if (!function_exists('yatri_single_post_author')) :

    function yatri_single_post_author()
    {
        get_template_part('template-parts/parts/posted-by', '');

    }
endif;

/**
 * Gets a nicely formatted string for the published date.
 *
 * @since 1.0.0
 * @return string
 */
if (!function_exists('yatri_time_link')) :

    function yatri_time_link()
    {

        get_template_part('template-parts/parts/time-link', '');

    }
endif;

if (!function_exists('yatri_get_day_link')):
    /**
     * Returns the permalink of Post day
     *
     * @since 1.0.0
     * @return string The permalink for the specified day, month, and year archive.
     */
    function yatri_get_day_link()
    {
        return get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'));
    }
endif;


if (!function_exists('yatri_get_post_meta')) {

    function yatri_get_post_meta()
    {
        $blog_archive_page_meta_content_order = yatri_meta_content_order();

        if (yatri_is_archive_page()) {

            $blog_archive_page_meta_content_order = yatri_meta_content_order('blog_archive_page_meta_content_order');
        }

        echo '<div class="meta yatri-content-item">';

        $available_meta = 0;

        foreach ($blog_archive_page_meta_content_order as $meta_order => $meta_order_content) {

            $is_disable = isset($meta_order_content['disable']) ? (boolean)$meta_order_content['disable'] : false;

            if (!$is_disable) {

                $available_meta++;
                if ($available_meta > 1) {
                    yatri_get_meta_separator();
                }

                switch ($meta_order) {
                    case "author":
                        yatri_get_post_meta_author();
                        break;
                    case "date":
                        yatri_get_post_meta_date();
                        break;

                    case "categories":
                        //yatri_get_post_meta_date();
                        break;

                    case "comment":
                        yatri_get_post_meta_comment();
                        break;

                }
            }
        }
        echo '</div>';
    }

}


if (!function_exists('yatri_get_post_format_html')) {

    function yatri_get_post_format_html()
    {
        get_template_part('template-parts/parts/post-format-html', '');
    }

}

if (!function_exists('yatri_get_post_categories')) {

    function yatri_get_post_categories()
    {
        get_template_part('template-parts/parts/post-cat-meta', '');
    }

}

if (!function_exists('yatri_get_post_title')) {

    function yatri_get_post_title()
    {

        get_template_part('template-parts/parts/post-title', '');

    }

}
if (!function_exists('yatri_page_title')) {

    function yatri_page_title()
    {

        $post_id = yatri_get_post_id();

        $enable = true;

        if ($post_id > 0) {

            $is_enable = get_post_meta($post_id, 'yatri_page_title_enable', true);

            $enable = $is_enable == 'no' ? false : true;

        }
        $enable = apply_filters('yatri_page_title_enable', $enable);

        if ($enable) {

            yatri_get_page_title('inside_content');
        }

    }

}

if (!function_exists('yatri_page_feature_image')) {

    function yatri_page_feature_image()
    {

        $post_id = yatri_get_post_id();

        $enable = true;

        if ($post_id > 0) {

            $is_enable = get_post_meta($post_id, 'yatri_page_featured_image_enable', true);

            $enable = $is_enable == 'no' ? false : true;

        }
        $enable = apply_filters('yatri_page_featured_image_enable', $enable);

        if ($enable) {

            get_template_part('template-parts/page/feature-image', '');

        }

    }

}

if (!function_exists('yatri_get_post_excerpt')) {

    function yatri_get_post_excerpt()
    {
        get_template_part('template-parts/parts/post-excerpt', '');
    }

}

if (!function_exists('yatri_get_post_readmore_button')) {

    function yatri_get_post_readmore_button()
    {
        get_template_part('template-parts/parts/post-readmore-button', '');
    }

}

if (!function_exists('yatri_get_page_title')) {

    function yatri_get_page_title($position = 'inside_breadcrumb')
    {
        $description = false;

        $page_title_heading_tag = 'h1';

        $yatri_heading_tags = array_keys(yatri_heading_tags());

        $page_title_position = 'inside_breadcrumb';

        if (is_archive()) {

            $heading_tag = yatri_get_option('blog_archive_page_heading_tag');

            $title = get_the_archive_title();

            $description = get_the_archive_description();

            $page_title_position = yatri_get_option('blog_archive_page_title_position');

        } else if (!is_front_page() && is_home()) {

            $title = single_post_title('', false);

            $heading_tag = yatri_get_option('blog_archive_page_heading_tag');

            $page_title_position = yatri_get_option('blog_archive_page_title_position');

        } else if (is_search()) {

            # For search Page.
            $title = esc_html__('Search Results for: ', 'yatri') . get_search_query();

            $heading_tag = yatri_get_option('blog_archive_page_heading_tag');

            $page_title_position = yatri_get_option('blog_archive_page_title_position');

        } else if (is_front_page() && is_home()) {
            # If Latest posts page

            $title = yatri_get_option('archive_page_title');

            $heading_tag = yatri_get_option('blog_archive_page_heading_tag');

            $page_title_position = yatri_get_option('blog_archive_page_title_position');

        } else if (is_page()) {
            // for page
            $title = get_the_title();

            $page_title_position = yatri_get_option('page_title_position');

            $heading_tag = yatri_get_option('page_heading_tag');


        } else {
            // for all other single page
            $title = get_the_title();

            $heading_tag = yatri_get_option('single_post_heading_tag');

            $page_title_position = yatri_get_option('single_post_title_position');
        }

        if (in_array($heading_tag, $yatri_heading_tags)) {

            $page_title_heading_tag = $heading_tag;
        }

        if ($page_title_position != $position) {
            return;
        }
        echo '<header class="page-header">';

        echo '<' . esc_attr($page_title_heading_tag) . ' class="page-title">';

        echo wp_kses($title, array(

            'span' => 'class'

        ));
        echo '</' . esc_attr($page_title_heading_tag) . '>';

        echo $position == 'inside_content' && $description ? '<p>' . $description . '</p>' : '';

        echo '</header>';
    }
}

if (!function_exists('yatri_get_meta_separator')) {

    function yatri_get_meta_separator()
    {
        $separator = '|';

        if (yatri_is_archive_page()) {

            $separator = yatri_get_option('blog_archive_page_meta_content_separator');
        }
        echo '<span class="sep">' . esc_html($separator) . '</span>';
    }
}

if (!function_exists('yatri_get_post_meta_author')) {

    function yatri_get_post_meta_author()
    {
        ?>
        <div class="meta-author yatri-meta-item">

									<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                        <span class="author-name">
										<?php echo get_the_author(); ?>
                                            </span>
									</a>

        </div>
        <?php
    }
}

if (!function_exists('yatri_get_post_meta_date')) {

    function yatri_get_post_meta_date()
    {
        ?>
        <div class="meta-date yatri-meta-item">

            <a href="<?php echo esc_url(yatri_get_day_link()); ?>" class="date">
									<span class="day">
									<?php
                                    echo esc_html(get_the_date('M j, Y')); ?>
									</span>
            </a>

        </div>
        <?php
    }
}

if (!function_exists('yatri_get_post_meta_comment')) {

    function yatri_get_post_meta_comment()
    {
        ?>
        <div class="meta-comment yatri-meta-item">
								<span class="meta-comment comment-link">
									<a href="<?php comments_link(); ?>">
										<?php echo absint(wp_count_comments(get_the_ID())->approved); ?>
                                        <?php echo esc_html__('Comment', 'yatri') ?>
									</a>
								</span>
        </div>
        <?php
    }
}

if (!function_exists('yatri_get_post_content')) {

    function yatri_get_post_content()
    {
        get_template_part('template-parts/single/content', get_post_format());
    }

}

if (!function_exists('yatri_get_related_posts')) {

    function yatri_get_related_posts()
    {

        get_template_part('template-parts/single/content', 'related-posts');


    }

}

if (!function_exists('yatri_get_comment_form')) {

    function yatri_get_comment_form()
    {

        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;

    }

}

if (!function_exists('yatri_get_thumbnail')) {

    function yatri_get_thumbnail()
    {
        get_template_part('template-parts/parts/thumbnail');

    }

}

if (!function_exists('yatri_get_post_navigation')) {

    function yatri_get_post_navigation($pagination_type = 'next_prev')
    {
        ob_start();

        if ($pagination_type == 'next_prev') {

            if (is_singular()) {
                the_post_navigation(array(
                    'prev_text' => '<span class="screen-reader-text">' . esc_html__('Previous Post', 'yatri') . '</span><span class="nav-title">%title</span>',
                    'next_text' => '<span class="screen-reader-text">' . esc_html__('Next Post', 'yatri') . '</span><span class="nav-title">%title</span>',
                ));
            } else {
                the_posts_navigation();
            }
        } else if ($pagination_type == 'numeric') {
            the_posts_pagination(array(
                'next_text' => '<span>' . esc_html__('Next', 'yatri') . '</span><span class="screen-reader-text">' . esc_html__('Next page', 'yatri') . '</span>',
                'prev_text' => '<span>' . esc_html__('Prev', 'yatri') . '</span><span class="screen-reader-text">' . esc_html__('Previous page', 'yatri') . '</span>',
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__('Page', 'yatri') . ' </span>',
                'in_same_term' => true,

            ));
        }


        $output = ob_get_clean();

        echo apply_filters('yatri_pagination_markup', $output); // WPCS: XSS OK.
    }

}

if (!function_exists('yatri_get_post_tags')) {

    function yatri_get_post_tags()
    {
        get_template_part('template-parts/parts/post-tag-meta');

    }

}

if (!function_exists('yatri_get_author_bio')) {

    function yatri_get_author_bio()
    {
        get_template_part('template-parts/single/content', 'author-detail');

    }

}
if (!function_exists('yatri_get_post_thumbnail')):
    /**
     * Prints featured image or dummy image if no featured image for posts
     *
     * @since 1.0.0
     * @param  array $args
     * @param  bool $show_eye whether to show eye icon while hover. default: true.
     * @return void
     */
    function yatri_get_post_thumbnail($args = array(), $show_post_format = false)
    {

        $defaults = array(
            'size' => 'large',
            'dummy' => true,
            'permalink' => true
        );

        $args = wp_parse_args($args, $defaults);
        # Don't print even the div when no thumbnail and dummy is disabled
        if ('' == get_the_post_thumbnail() && !$args['dummy']) {
            return;
        }
        if ('' !== get_the_post_thumbnail()) {
            ?>
            <figure class="feature-image yatri-content-item">
                <?php if ($args['permalink']): ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php

                        the_post_thumbnail($args['size']);

                        ?>
                    </a>
                <?php endif;

                if ('post' == get_post_type() && $show_post_format):
                    yatri_get_post_format_html();

                endif;
                ?>

            </figure>
            <?php
        }
    }
endif;

if (!function_exists('yatri_fallback_navigation')) {

    function yatri_fallback_navigation()
    {
        $home_url = esc_url(home_url('/'));
        $fallback_menu = '<ul id="menu-primary" class="menu">';
        $fallback_menu .= '<li><a href="' . $home_url . '" rel="home">' . esc_html__('Home', 'yatri') . '</a></li>';
        $fallback_menu .= '<li><a target="_blank" href="#" rel="demo">' . esc_html__('Demo', 'yatri') . '</a></li>';
        $fallback_menu .= '<li><a target="_blank" href="#" rel="docs">' . esc_html__('Docs', 'yatri') . '</a></li>';
        $fallback_menu .= '<li><a target="_blank" href="#" rel="support">' . esc_html__('Support', 'yatri') . '</a></li>';
        $fallback_menu .= '<li><a target="_blank" href="#" rel="blog">' . esc_html__('Blog', 'yatri') . '</a></li>';
        $fallback_menu .= '</ul>';
        echo $fallback_menu;

    }

}