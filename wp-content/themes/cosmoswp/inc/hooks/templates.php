<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Basic theme functions.
 *
 * This file contains hook functions attached to core hooks.
 *
 * @package CosmosWP
 */

if (!function_exists('cosmoswp_filter_get_search_form')) :

    /**
     * Customize search form.
     *
     * @since 1.0.0
     *
     * @return string The search form HTML output.
     */
    function cosmoswp_filter_get_search_form($form) {

        $template = cosmoswp_get_theme_options('search-template-options');
        if($template == 'cwp-search-2'){
                $form = '<form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
            <label>
                <span class="screen-reader-text">' . _x('Search for:', 'label', 'cosmoswp') . '</span>
                <input type="search" class="search-field" placeholder="' . esc_attr__('Search&hellip;', 'cosmoswp') . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x('Search for:', 'label', 'cosmoswp') . '" />
            </label>
            <input type="submit" class="search-submit" value="&#xf002;" /></form>';
        }

        return $form;

    }
    add_filter('get_search_form', 'cosmoswp_filter_get_search_form', 15);
endif;

if (!function_exists('cosmoswp_filter_excerpt_length')) :

    /**
     * Implement excerpt length
     *
     * @since 1.0.0
     *
     * @param int $length The number of words.
     * @return int Excerpt length.
     */
    function cosmoswp_filter_excerpt_length($length) {

        $excerpt_length = cosmoswp_get_theme_options('blog-excerpt-length');

        if (empty($excerpt_length) || ($excerpt_length <= 0)) {
            $excerpt_length = $length;
        }
        return apply_filters('cosmoswp_filter_excerpt_length', absint($excerpt_length));

    }

endif;

if (!function_exists('cosmoswp_filter_excerpt_more')) :

    /**
     * Implement read more in excerpt
     *
     * @since 1.0.0
     *
     * @param string $more The string shown within the more link.
     * @return string The excerpt.
     */
    function cosmoswp_filter_excerpt_more($more) {

        $flag_apply_excerpt_read_more = apply_filters('cosmoswp_filter_excerpt_read_more', true);
        if (true !== $flag_apply_excerpt_read_more) {
            return $more;
        }
        $output         = '&hellip;';
        $read_more_text = cosmoswp_get_theme_options('blog-read-more-text');
        if (!empty($read_more_text)) {
            $output .= ' <a href="' . esc_url(get_permalink()) . '" class="cosmoswp-btn">' . esc_html($read_more_text) . '</a>';
            $output = apply_filters('cosmoswp_filter_read_more_link', $output);
        }
        return $output;

    }

endif;

if (!function_exists('cosmoswp_filter_the_content_more_link')) :

    /**
     * Implement read more in content.
     *
     * @since 1.0.0
     *
     * @param string $more_link Read More link element.
     * @param string $more_link_text Read More text.
     * @return string Link.
     */
    function cosmoswp_filter_the_content_more_link($more_link, $more_link_text) {

        $flag_apply_excerpt_read_more = apply_filters('cosmoswp_filter_excerpt_read_more', true);

        if (true !== $flag_apply_excerpt_read_more) {
            return $more_link;
        }

        $read_more_text = cosmoswp_get_theme_options('blog-read-more-text');
        if (!empty($read_more_text)) {
            $more_link = str_replace($more_link_text, esc_html($read_more_text), $more_link);
            $more_link = str_replace('more-link', 'cosmoswp-btn', $more_link);

        }
        return $more_link;

    }

endif;

if (!function_exists('cosmoswp_featured_image_instruction')) :

    /**
     * Message to show in the Featured Image Meta box.
     *
     * @since 1.0.0
     *
     * @param string $content Admin post thumbnail HTML markup.
     * @param int    $post_id Post ID.
     * @return string HTML.
     */
    function cosmoswp_featured_image_instruction($content, $post_id) {

        $allowed = array('page');

        if (in_array(get_post_type($post_id), $allowed)) {
            $content .= '<strong>' . __('Recommended Image Sizes', 'cosmoswp') . ':</strong><br/>';
            $content .= __('Slider Image', 'cosmoswp') . ' : 1920px X 800px';
        }

        return $content;

    }

    add_filter('admin_post_thumbnail_html', 'cosmoswp_featured_image_instruction', 10, 2);
endif;

if (!function_exists('cosmoswp_hook_read_more_filters')) :

    /**
     * Hook read more filters.
     *
     * @since 1.0.0
     */
    function cosmoswp_hook_read_more_filters() {
        if (is_home() || is_category() || is_tag() || is_author() || is_date()) {

            add_filter('excerpt_length', 'cosmoswp_filter_excerpt_length', 999);
            add_filter('the_content_more_link', 'cosmoswp_filter_the_content_more_link', 10, 2);
            add_filter('excerpt_more', 'cosmoswp_filter_excerpt_more');
        }
    }

    add_action('wp', 'cosmoswp_hook_read_more_filters');
endif;


if (!function_exists('cosmoswp_exclude_category_in_blog_page')) :

    /**
     * Exclude category in blog page
     *
     * @since CosmosWP 1.0.0
     *
     * @param $query
     * @return int
     */
    function cosmoswp_exclude_category_in_blog_page($query) {

        if ($query->is_home && $query->is_main_query()) {
            $exclude_categories = cosmoswp_get_theme_options('blog-post-exclude-categories');
            if (!empty($exclude_categories) && is_array($exclude_categories)) {
                $exculde_cats = array_map(function ($val)
                {
                    return -$val;
                }, $exclude_categories);
                if (!empty($exculde_cats) && is_array($exculde_cats)) {
                    $query->set('cat', $exculde_cats);
                }
            }
        }
        return $query;
    }

    add_filter('pre_get_posts', 'cosmoswp_exclude_category_in_blog_page');

endif;

if (!function_exists('cosmoswp_posts_navigation')) :

    /**
     * Posts navigation
     *
     * @since cosmoswp 1.0.0
     *
     * @return void
     */
    function cosmoswp_posts_navigation() {
        if ( $GLOBALS['wp_query']->max_num_pages <= 1 ){
            return;
        }

        $blog_navigation_options = cosmoswp_get_theme_options('blog-navigation-options');
        if ('disable' == $blog_navigation_options) {
            return;
        }
        $blog_navigation_align = cosmoswp_get_theme_options('blog-navigation-align');
        $blog_navigation_align = ($blog_navigation_options != 'default') ? $blog_navigation_align : '';

        echo "<div class='grid-row'>";
        echo "<div class='grid-12'>";
        echo "<div class='cwp-blog-pagination " . $blog_navigation_align . "' id='cwp-blog-pagination'>";
        if ('default' == $blog_navigation_options) {
            // Previous/next page navigation.
            the_posts_navigation();
        } else {
            // Previous/next page navigation.
            the_posts_pagination(array(
                'prev_text'          => '&laquo; ',
                'next_text'          => ' &raquo;',
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'cosmoswp') . ' </span>',
            ));
        }
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }

    add_action('cosmoswp_action_posts_navigation', 'cosmoswp_posts_navigation');
endif;

if (!function_exists('cosmoswp_post_navigation')) :

    /**
     * Post navigation
     *
     * @since cosmoswp 1.0.0
     *
     * @return void
     */
    function cosmoswp_post_navigation() {

        $blog_navigation_options = cosmoswp_get_theme_options('post-navigation-options');
        if ('default' == $blog_navigation_options) {
            // Previous/next page navigation.
            $args = array(
                'prev_text' => '<span class="title"><i class="'.esc_attr(cosmoswp_get_correct_fa_font('fas fa-arrow-left')).'"></i>' . esc_html__('Previous Post', 'cosmoswp') . '</span><span class="post-title">%title</span>',
                'next_text' => '<span class="title"><i class="'.esc_attr(cosmoswp_get_correct_fa_font('fas fa-arrow-right')).'"></i>' . esc_html__('Next Post', 'cosmoswp') . '</span><span class="post-title">%title</span>',
            );
            the_post_navigation($args);
        }
    }

    add_action('cosmoswp_action_post_navigation', 'cosmoswp_post_navigation');
endif;

if (!function_exists('cosmoswp_alter_comment_form')) :

    /**
     * Comment Form
     *
     * @since CosmosWP 1.0.0
     *
     * @param array $form
     * @return array $form
     *
     */
    function cosmoswp_alter_comment_form($form) {

        $cosmoswp_comment_title       = esc_html(cosmoswp_get_theme_options('cosmoswp-comment-title'));
        $cosmoswp_comment_title       = ($cosmoswp_comment_title) ? $cosmoswp_comment_title : esc_html__('Leave a Reply', 'cosmoswp');
        $cosmoswp_comment_button_text = esc_html(cosmoswp_get_theme_options('cosmoswp-comment-button-text'));
        $cosmoswp_comment_button_text = ($cosmoswp_comment_button_text) ? $cosmoswp_comment_button_text : esc_html__('Post Comment', 'cosmoswp');
        $cosmoswp_comment_notes_after = esc_html(cosmoswp_get_theme_options('cosmoswp-comment-notes-after'));

        if (!empty ($cosmoswp_comment_notes_after)) {
            $form['comment_notes_after'] = $cosmoswp_comment_notes_after;
        }
        $required = get_option('require_name_email');
        $req      = $required ? 'aria-required="true"' : '';

        $form['fields']['author']     = '<p class="comment-form-author"><label for="author"></label><input id="author" name="author" type="text" placeholder="' . esc_attr__('Name', 'cosmoswp') . '" value="" size="30" ' . $req . '/></p>';
        $form['fields']['email']      = '<p class="comment-form-email"><label for="email"></label> <input id="email" name="email" type="email" value="" placeholder="' . esc_attr__('Email', 'cosmoswp') . '" size="30" ' . $req . ' /></p>';
        $form['fields']['url']        = '<p class="comment-form-url"><label for="url"></label> <input id="url" name="url" placeholder="' . esc_attr__('Website URL', 'cosmoswp') . '" type="url" value="" size="30" /></p>';
        $form['comment_field']        = '<p class="comment-form-comment"><label for="comment"></label> <textarea id="comment" name="comment" placeholder="' . esc_attr__('Comment', 'cosmoswp') . '" cols="45" rows="8" aria-required="true"></textarea></p>';
        $form['comment_notes_before'] = '';
        $form['label_submit']         = $cosmoswp_comment_button_text;
        $form['title_reply']          = '<span>' . $cosmoswp_comment_title . '</span>';

        return $form;
    }

    add_filter('comment_form_defaults', 'cosmoswp_alter_comment_form');
endif;

if (!function_exists('cosmoswp_move_comment_field_to_bottom')) {

    /* *
     *  re-order comment form e.g move comment to bottom
     *  @since CosmosWP 1.0.0
     *  @param array $fields
     */
    function cosmoswp_move_comment_field_to_bottom($fields) {
        $comment_field = $fields['comment'];
        unset($fields['comment']);
        $fields['comment'] = $comment_field;
        return $fields;
    }

    add_filter('comment_form_fields', 'cosmoswp_move_comment_field_to_bottom');
}