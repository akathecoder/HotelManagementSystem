<?php
/**
 * Yatri Loop
 *
 * @package Yatri
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!class_exists('Yatri_Loop')) :

    /**
     * Yatri_Loop
     *
     * @since 1.0.0
     */
    class Yatri_Loop
    {

        /**
         * Instance
         *
         * @since 1.0.0
         *
         * @access private
         * @var object Class object.
         */
        private static $instance;

        /**
         * Initiator
         *
         * @since 1.0.0
         *
         * @return object initialized object of class.
         */
        public static function get_instance()
        {
            if (!isset(self::$instance)) {
                self::$instance = new self;
            }
            return self::$instance;
        }

        /**
         * Constructor
         *
         * @since 1.0.0
         */
        public function __construct()
        {

            // Loop.
            add_action('yatri_content_loop', array($this, 'loop_markup'));
            add_action('yatri_pagination', array($this, 'yatri_pagination'));
            add_action('yatri_content_loop_item', array($this, 'yatri_content_loop_item'));
            add_action('yatri_content_none', array($this, 'template_parts_none'));


            //add_action('yatri_template_parts_content_bottom', array($this, 'yatri_templat_part_wrap_close'), 5);
        }

        public function yatri_content_loop_item()
        {
            if (is_singular() && !is_page()) {

                $single_post_content_order = yatri_single_post_content_order(false);

                get_template_part('template-parts/single/content', 'article-start');

                foreach ($single_post_content_order as $order => $order_content) {

                    $is_disable = isset($order_content['disable']) ? (boolean)$order_content['disable'] : false;

                    do_action('yatri_single_post_content_order_' . $order, $order_content);

                    if (!$is_disable) {

                        switch ($order) {
                            case "thumbnail":
                                $show_thumbnail = apply_filters('yatri_enable_post_thumbnail', true);
                                if ($show_thumbnail) {
                                    $args = array();
                                    $args['size'] = 'full';
                                    $size = sanitize_text_field(yatri_get_option('single_post_thumbnail_size'));
                                    $args['size'] = !empty($size) ? $size : $args['size'];
                                    yatri_get_post_thumbnail($args);
                                }
                                break;
                            case "content":
                                $show_content = apply_filters('yatri_enable_post_content', true);
                                if ($show_content) {
                                    yatri_get_post_content();
                                }
                                break;
                            case "post_meta":
                                $show_meta = apply_filters('yatri_enable_post_meta', true);
                                if ($show_meta) {
                                    yatri_get_post_meta();
                                }
                                break;
                            case "tags":
                                $show_tags = apply_filters('yatri_enable_post_tags', true);
                                if ($show_tags) {
                                    yatri_get_post_tags();
                                }
                                break;

                            case "categories":
                                $show_categories = apply_filters('yatri_enable_post_categories', true);
                                if ($show_categories) {
                                    yatri_get_post_categories();
                                }
                                break;

                            case "post_title":

                                $show_title = apply_filters('yatri_enable_post_title', true);
                                if ($show_title) {
                                    $page_title_position = yatri_get_option('single_post_title_position');
                                    if ('inside_content' == $page_title_position) {
                                        yatri_get_post_title();
                                    }
                                }
                                break;

                            case "author_bio":
                                $show_bio = apply_filters('yatri_enable_post_author_bio', true);
                                if ($show_bio) {
                                    yatri_get_author_bio();
                                }
                                break;

                            case "comment_form":
                                $show_form = apply_filters('yatri_enable_post_comment_form', true);
                                if ($show_form) {
                                    yatri_get_comment_form();
                                }
                                break;

                            case "post_navigation":
                                $show_post_nav = apply_filters('yatri_enable_post_navigation', true);
                                if ($show_post_nav) {
                                    yatri_get_post_navigation('next_prev');
                                }
                                break;

                            case "related_posts":
                                $show_related_posts = apply_filters('yatri_enable_post_related_posts', true);
                                if ($show_related_posts) {
                                    yatri_get_related_posts();
                                }
                                break;

                        }
                    }
                }

                get_template_part('template-parts/single/content', 'article-end');


            } else if (is_page()) {

                get_template_part('template-parts/page/content', '');

                # If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            } else if (is_search()) {

                get_template_part('template-parts/archive/content', '');

            } else {
                get_template_part('template-parts/archive/content', '');

            }

        }

        /**
         * Template part none
         *
         * @since 1.0.0
         * @return void
         */
        public
        function template_parts_none()
        {
            if (is_archive() || is_search()) {
                get_template_part('template-parts/page/content', 'none');
            }
        }

        /**
         * Template part 404
         *
         * @since 1.0.0
         * @return void
         */
        public
        function template_parts_404()
        {
            if (is_404()) {
                get_template_part('template-parts/content', '404');
            }
        }

        /**
         * Template part page
         *
         * @since 1.0.0
         * @return void
         */
        public
        function template_parts_page()
        {
            get_template_part('template-parts/content', 'page');
        }

        /**
         * Template part single
         *
         * @since 1.0.0
         * @return void
         */
        public
        function template_parts_post()
        {
            if (is_single()) {
                get_template_part('template-parts/content', 'single');
            }
        }

        /**
         * Template part search
         *
         * @since 1.0.0
         * @return void
         */
        public
        function template_parts_search()
        {
            if (is_search()) {
                get_template_part('template-parts/content', 'blog');
            }
        }

        /**
         * Template part comments
         *
         * @since 1.0.0
         * @return void
         */
        public
        function template_parts_comments()
        {
            if (is_single() || is_page()) {
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
            }
        }

        /**
         * Template part default
         *
         * @since 1.0.0
         * @return void
         */
        public
        function template_parts_default()
        {
            if (!is_page() && !is_single() && !is_search() && !is_404()) {
                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part('template-parts/content', yatri_get_post_format());
            }
        }

        /**
         * Loop Markup for content page
         *
         * @since 1.0.0
         */
        public
        function loop_markup_page()
        {
            $this->loop_markup(true);
        }

        /**
         * Template part loop
         *
         * @param  boolean $is_page Loop outputs different content action for content page and default content.
         *         if is_page is set to true - do_action( 'yatri_page_template_parts_content' ); is added
         *         if is_page is false - do_action( 'yatri_template_parts_content' ); is added.
         * @since 1.0.0
         * @return void
         */
        public function loop_markup($is_page = false)
        {

            ?>
            <div <?php yatri_main_wrap_class(); ?> id="main-wrap">

                <div <?php yatri_main_wrap_inner_class(); ?>>
                    <?php
                    do_action('yatri_before_content_loop');


                    if (have_posts()):

                        while (have_posts()) : the_post();

                            do_action('yatri_content_loop_item');

                        endwhile;
                    else:
                        do_action('yatri_content_none');


                    endif;

                    do_action('yatri_after_content_loop');

                    ?>
                </div>
                <?php

                do_action('yatri_pagination');

                ?>
            </div>
            <?php
        }

        function yatri_pagination()
        {


            if (!is_singular()) {
                global $numpages;
                $enabled = apply_filters('yatri_pagination_enabled', true);
                if (isset($numpages) && $enabled) {
                    if (yatri_is_archive_page()) {
                        $blog_archive_pagination_style = yatri_get_option('blog_archive_pagination_style');
                        yatri_get_post_navigation($blog_archive_pagination_style);
                    } else {
                        yatri_get_post_navigation('numeric');
                    }

                }
            }
        }


    }

    /**
     * Initialize class object with 'get_instance()' method
     */
    Yatri_Loop::get_instance();

endif;
