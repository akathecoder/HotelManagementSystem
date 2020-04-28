<?php
/**
 * Yatri: Excerpt
 *
 * @since: 1.0.0
 */
if (!class_exists('Yatri_Excerpt')):

    class Yatri_Excerpt
    {

        /**
         * Default length (by WordPress)
         *
         * @since 1.0.0
         * @access public
         * @var int
         */
        public $length = 55;

        /**
         * Read more Text for excerpt
         * @since 1.0.0
         * @access public
         * @var string
         */
        public $more_text = '';

        /**
         * So you can call: yatri_excerpt( 'short' );
         *
         * @since 1.0.0
         * @access protected
         * @var    array
         */
        protected $types = array(
            'short' => 25,
            'regular' => 55,
            'long' => 100
        );

        /**
         * Stores class instance
         *
         * @since 1.0.0
         * @access protected
         * @var    object
         */
        protected static $instance = NULL;

        /**
         * Retrives the instance of this class
         *
         * @since 1.0.0
         * @access public
         * @return Yatri_Excerpt
         */
        public static function get_instance()
        {

            if (!self::$instance) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        /**
         * Sets the length for the excerpt,then it adds the WP filter
         * And automatically calls the_excerpt();
         *
         * @since 1.0.0
         * @param string $new_length
         * @access public
         * @return mixed
         */
        public function excerpt($length = 55, $type = 'custom', $more_text)
        {
            $this->length = is_null($length) ? 55 : absint($length);

            $this->more_text = $more_text;

            if (!is_admin()) {
                add_filter('excerpt_more', array($this, 'new_excerpt_more'));
                add_filter('excerpt_length', array($this, 'new_length'));
            }


            if ('excerpt_metabox' == $type) {
                return get_the_excerpt();

            } elseif ('custom' == $type || empty($type)) {

                global $post;

                $text = '';
                if ($post) {
                    if ('' != trim(get_the_excerpt())) {
                        $text = get_the_excerpt();
                    } elseif ($post->post_excerpt) {
                        $text = $post->post_excerpt;
                    } else {
                        $text = $post->post_content;
                    }
                }
                $excerpt = $this->trim_excerpt($text, $length);

                if ($excerpt) {
                    // WPCS: XSS OK.
                    return apply_filters('the_excerpt', $excerpt);
                } else {
                    return get_the_excerpt();
                }
            } else {
                return get_the_excerpt();
            }
        }

        function trim_excerpt($text, $excerpt_length = null)
        {
            $text = strip_shortcodes($text);
            /** This filter is documented in wp-includes/post-template.php */
            $text = apply_filters('the_content', $text);
            $text = str_replace(']]>', ']]&gt;', $text);


            $text = wp_trim_words($text, $excerpt_length, $this->more_text);

            return $text;
        }

        public function new_excerpt_more()
        {
            return $this->more_text;
        }

        /**
         * Tells WP the new length
         *
         * @since 1.0.0
         * @access public
         * @return int
         */
        public function new_length()
        {

            if (isset($this->types[$this->length]))
                return $this->types[$this->length];
            else
                return $this->length;
        }
    }

endif;

/**
 * Call to Yatri_Excerpt
 *
 * @since  1.0.0
 * @uses   Yatri_Excerpt:::get_instance()->excerpt()
 * @param  int $length
 * @return void
 */
if (!function_exists('yatri_excerpt')):

    function yatri_excerpt($echo = true)
    {
        $excerpt_type = 'excerpt_metabox';

        $more_text = '';

        $excerpt_length = 15;

        if (yatri_is_archive_page()) {

            $excerpt_type = yatri_get_option('blog_archive_page_excerpt_type');

            $more_text = yatri_get_option('blog_archive_page_excerpt_more_text');

            if ($excerpt_type == 'custom') {

                $excerpt_length = absint(yatri_get_option('blog_archive_page_excerpt_length'));
            } else {
                $excerpt_length = null;
            }
        } else if (is_singular()) {

            $excerpt_type = yatri_get_option('single_post_related_posts_excerpt_type');

            $more_text = yatri_get_option('single_post_related_posts_excerpt_more_text');

            if ($excerpt_type == 'custom') {

                $excerpt_length = absint(yatri_get_option('single_post_related_posts_excerpt_length'));
            } else {
                $excerpt_length = null;
            }
        }

        $excerpt_length = apply_filters('yatri_excerpt_length', $excerpt_length);

        if ($echo) {
            echo Yatri_Excerpt::get_instance()->excerpt($excerpt_length, $excerpt_type, $more_text);
        } else {
            return Yatri_Excerpt::get_instance()->excerpt($excerpt_length, $excerpt_type, $more_text);
        }
    }
endif;