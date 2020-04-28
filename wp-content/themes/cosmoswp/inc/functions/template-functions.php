<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Don't confuse prefix does not needed for this*/
if ( ! function_exists( 'wp_body_open' ) ) :
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
     *
     * @since CosmosWP 1.0.6
     */
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         *
         * @since CosmosWP 1.0.6
         */
        do_action( 'wp_body_open' );
    }
endif;

if (!function_exists('cosmoswp_get_template_part')) {

    /**
     * cosmoswp_get_template_part
     *
     * @param      $id
     * @param      $slug
     * @param null $name
     */
    function cosmoswp_get_template_part($id, $slug, $name = null) {

        $templates = array();
        $name      = (string)$name;
        if ('' !== $name) {
            $templates[] = "{$slug}-{$name}.php";
        }

        $templates[] = "{$slug}.php";
        $template    = locate_template($templates);

        // Allow 3rd party plugins to filter template file from their plugin.
        $template = apply_filters('cosmoswp_get_template_part', $template, $id, $slug, $name);
        if ($template) {
            load_template($template, false);
        }
    }
}

if (!function_exists('cosmoswp_get_schema_markup')) {

    /**
     * cosmoswp_get_schema_markup
     *
     * @param $location
     * @return string
     */
    function cosmoswp_get_schema_markup($location) {

        // Default
        $schema = $itemprop = $itemtype = '';

        // HTML
        if ('html' == $location) {
            if (is_singular()) {
                $schema = 'itemscope itemtype="http://schema.org/WebPage"';
            } else {
                $schema = 'itemscope itemtype="http://schema.org/Article"';
            }
        } // Header
        elseif ('header' == $location) {
            $schema = 'itemscope="itemscope" itemtype="http://schema.org/WPHeader"';
        } // Logo
        elseif ('logo' == $location) {
            $schema = 'itemscope itemtype="http://schema.org/Brand"';
        } // Navigation
        elseif ('site_navigation' == $location) {
            $schema = 'itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement"';
        } // Main
        elseif ('main' == $location) {
            $itemtype = 'http://schema.org/WebPageElement';
            $itemprop = 'mainContentOfPage';
            if (is_singular('post')) {
                $itemprop = '';
                $itemtype = 'http://schema.org/Blog';
            }
        } // Breadcrumb
        elseif ('breadcrumb' == $location) {
            $schema = 'itemscope itemtype="http://schema.org/BreadcrumbList"';
        } // Breadcrumb list
        elseif ('breadcrumb_list' == $location) {
            $schema = 'itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"';
        } // Breadcrumb itemprop
        elseif ('breadcrumb_itemprop' == $location) {
            $schema = 'itemprop="breadcrumb"';
        } // Sidebar
        elseif ('sidebar' == $location) {
            $schema = 'itemscope="itemscope" itemtype="http://schema.org/WPSideBar"';
        } // Footer widgets
        elseif ('footer' == $location) {
            $schema = 'itemscope="itemscope" itemtype="http://schema.org/WPFooter"';
        } // Headings
        elseif ('headline' == $location) {
            $schema = 'itemprop="headline"';
        } // Posts
        elseif ('entry_content' == $location) {
            $schema = 'itemprop="text"';
        } // Publish date
        elseif ('publish_date' == $location) {
            $schema = 'itemprop="datePublished"';
        } // Author name
        elseif ('author_name' == $location) {
            $schema = 'itemprop="name"';
        } // Author link
        elseif ('author_link' == $location) {
            $schema = 'itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"';
        } // Item
        elseif ('item' == $location) {
            $schema = 'itemprop="item"';
        } // Url
        elseif ('url' == $location) {
            $schema = 'itemprop="url"';
        } // Position
        elseif ('position' == $location) {
            $schema = 'itemprop="position"';
        } // Image
        elseif ('image' == $location) {
            $schema = 'itemprop="image"';
        }
        return ' ' . apply_filters('cosmoswp_schema_markup', $schema, $location);
    }
}

if (!function_exists('cosmoswp_schema_markup')) {

    /**
     * cosmoswp_schema_markup
     *
     * @param $location
     */
    function cosmoswp_schema_markup($location) {

        echo cosmoswp_get_schema_markup($location);
    }
}

if (!function_exists('cosmoswp_html_class')) :

    /**
     * cosmoswp_html_class
     * @param  string $class
     * @return Void
     */
    function cosmoswp_html_class($class = '') {

        $classes = array();

        if (!empty($class)) {
            if (!is_array($class))
                $class = preg_split('#\s+#', $class);
            $classes = array_merge($classes, $class);
        }
        else {
            // Ensure that we always coerce class to being an array.
            $class = array();
        }

        $classes = apply_filters('cosmoswp_html_class', $classes, $class);
        $classes = array_unique($classes);

        /*lets sanitize it*/
        $classes = array_map('esc_attr', $classes);

        // Separates classes with a single space, collates classes for body element
        $classes = join(' ', $classes);

        echo 'class="no-js no-svg ' . $classes . '"';
    }
endif;

if (!function_exists('cosmoswp_get_main_wrap_classes')) :

	/**
	 * cosmoswp_get_main_wrap_classes
	 *
	 * @param  string $class
	 * @return string
	 */
	function cosmoswp_get_main_wrap_classes($class = '') {

		$classes = array();

		if (!empty($class)) {
			if (!is_array($class))
				$class = preg_split('#\s+#', $class);
			$classes = array_merge($classes, $class);
		}
		else {
			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes = apply_filters('cosmoswp_main_wrap_classes', $classes, $class);
		$classes = array_unique($classes);

		/*lets sanitize it*/
		$classes = array_map('esc_attr', $classes);

		// Separates classes with a single space, collates classes for body element
		$classes = join(' ', $classes);

		return $classes;

	}
endif;

if (!function_exists('cosmoswp_main_wrap_classes')) :

    /**
     * cosmoswp_main_wrap_classes
     *
     * @param  string $class
     * @return Void
     */

    function cosmoswp_main_wrap_classes($class = '') {

        echo 'class="' . cosmoswp_get_main_wrap_classes( $class ) . '"';
    }
endif;

if (!function_exists('cosmoswp_get_vertical_header_main_wrap_classes')) :

	/**
	 * cosmoswp_get_vertical_header_main_wrap_classes
	 *
	 * @param  string $class
	 * @return string
	 */
	function cosmoswp_get_vertical_header_main_wrap_classes($class = '') {

		$classes = array();

		if (!empty($class)) {
			if (!is_array($class))
				$class = preg_split('#\s+#', $class);
			$classes = array_merge($classes, $class);
		}
		else {
			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes = apply_filters('cosmoswp_vertical_header_main_wrap_classes', $classes, $class);
		$classes = array_unique($classes);

		/*lets sanitize it*/
		$classes = array_map('esc_attr', $classes);

		// Separates classes with a single space, collates classes for body element
		$classes = join(' ', $classes);

		return "cwp-offcanvas-body-wrapper " . $classes;
	}
endif;

if (!function_exists('cosmoswp_vertical_header_main_wrap_classes')) :

    /**
     * cosmoswp_vertical_header_main_wrap_classes
     *
     * @param  string $class
     * @return Void
     */
    function cosmoswp_vertical_header_main_wrap_classes($class = '') {

         echo 'class="' . cosmoswp_get_vertical_header_main_wrap_classes( $class ) . '"';
    }
endif;

if (!function_exists('cosmoswp_main_classes')) :

    /**
     * cosmoswp_main_classes
     * @param  string $class
     * @return string
     */
    function cosmoswp_main_classes($class = '') {

        $classes = array();

        if (!empty($class)) {
            if (!is_array($class))
                $class = preg_split('#\s+#', $class);
            $classes = array_merge($classes, $class);
        }
        else {
            // Ensure that we always coerce class to being an array.
            $class = array();
        }

        $classes = apply_filters('cosmoswp_main_classes', $classes, $class);
        $classes = array_unique($classes);

        /*lets sanitize it*/
        $classes = array_map('esc_attr', $classes);

        // Separates classes with a single space, collates classes for body element
        $classes = join(' ', $classes);

        echo 'class="cwp-body-main-wrap ' . $classes . '"';
    }
endif;

if (!function_exists('cosmoswp_get_header_wrap_classes')) :

	/**
	 * cosmoswp_get_header_wrap_classes
	 * @param  string $class
	 * @return string
	 */
	function cosmoswp_get_header_wrap_classes($class = '') {

		$classes = array();

		if (!empty($class)) {
			if (!is_array($class))
				$class = preg_split('#\s+#', $class);
			$classes = array_merge($classes, $class);
		}
		else {
			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes = apply_filters('cosmoswp_header_wrap_classes', $classes, $class);
		$classes = array_unique($classes);

		/*lets sanitize it*/
		$classes = array_map('esc_attr', $classes);

		// Separates classes with a single space, collates classes for body element
		$classes = join(' ', $classes);

		return "cwp-dynamic-header " . $classes;
	}
endif;

if (!function_exists('cosmoswp_header_wrap_classes')) :

    /**
     * cosmoswp_header_wrap_classes
     * @param  string $class
     * @return string
     */
    function cosmoswp_header_wrap_classes($class = '') {

	    echo 'class="' . cosmoswp_get_header_wrap_classes( $class ) . '"';
    }
endif;

if (!function_exists('cosmoswp_blog_grid_classes')) :

    /**
     * cosmoswp_blog_grid_classes
     * @param  string $class
     * @return void
     */
    function cosmoswp_blog_grid_classes($class = '') {

        $classes = array();

        if (!empty($class)) {
            if (!is_array($class))
                $class = preg_split('#\s+#', $class);
            $classes = array_merge($classes, $class);
        }
        else {
            // Ensure that we always coerce class to being an array.
            $class = array();
        }

        $classes = apply_filters('cosmoswp_blog_grid_classes', $classes, $class);
        $classes = array_unique($classes);

        /*lets sanitize it*/
        $classes = array_map('esc_attr', $classes);

        // Separates classes with a single space, collates classes for body element
        $classes = join(' ', $classes);

        echo 'class="cwp-blog-grid ' . $classes . '"';
    }
endif;

if (!function_exists('cosmoswp_blog_main_wrap_classes')) {

    /**
     * Return Footer Wrap class
     * @since CosmosWP 1.0.0
     *
     * @param $class
     * @return string
     *
     */
    function cosmoswp_blog_main_wrap_classes($class = '') {

        $classes = array();

        if (!empty($class)) {
            if (!is_array($class))
                $class = preg_split('#\s+#', $class);
            $classes = array_merge($classes, $class);
        }
        else {
            // Ensure that we always coerce class to being an array.
            $class = array();
        }

        $classes = apply_filters('cosmoswp_blog_main_wrap_classes', $classes, $class);
        $classes = array_unique($classes);

        /*lets sanitize it*/
        $classes = array_map('esc_attr', $classes);

        // Separates classes with a single space, collates classes for body element
        $classes = join(' ', $classes);

        echo esc_attr($classes);
    }
}

if (!function_exists('cosmoswp_post_main_wrap_classes')) {

    /**
     * Return Footer Wrap class
     * @since CosmosWP 1.0.0
     *
     * @param $class
     * @return string
     *
     */
    function cosmoswp_post_main_wrap_classes($class = '') {

        $classes = array();

        if (!empty($class)) {
            if (!is_array($class))
                $class = preg_split('#\s+#', $class);
            $classes = array_merge($classes, $class);
        }
        else {
            // Ensure that we always coerce class to being an array.
            $class = array();
        }

        $classes = apply_filters('cosmoswp_post_main_wrap_classes', $classes, $class);
        $classes = array_unique($classes);

        /*lets sanitize it*/
        $classes = array_map('esc_attr', $classes);

        // Separates classes with a single space, collates classes for body element
        $classes = join(' ', $classes);

        echo esc_attr($classes);
    }
}

if (!function_exists('cosmoswp_is_active_header')) :

    /**
     * cosmoswp_is_active_header
     * @return true
     */
    function cosmoswp_is_active_header() {
        return true;
    }
endif;

if (!function_exists('cosmoswp_post_thumbnail')) :

    /**
     *cosmoswp_post_thumbnail
     *
     * @param string $size
     * @return String
     */
    function cosmoswp_post_thumbnail($size) {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }
        if (is_singular()) :
            ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail($size); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>" aria-hidden="true">
                    <?php
                    the_post_thumbnail($size, array(
                        'alt' => the_title_attribute(array(
                            'echo' => false,
                        )),
                    ));
                    ?>
                </a>
            </div>
        <?php endif; // End is_singular().
    }
endif;

if (!function_exists('cosmoswp_header_top_classes')) {

    /**
     * Return header top class
     * @since CosmosWP 1.0.0
     *
     * @param $class
     * @return string
     *
     */
    function cosmoswp_header_top_classes($class = '') {

        $classes = array();

        if (!empty($class)) {
            if (!is_array($class))
                $class = preg_split('#\s+#', $class);
            $classes = array_merge($classes, $class);
        }
        else {
            // Ensure that we always coerce class to being an array.
            $class = array();
        }

        $classes = apply_filters('cosmoswp_header_top_classes', $classes, $class);
        $classes = array_unique($classes);

        /*lets sanitize it*/
        $classes = array_map('esc_attr', $classes);

        // Separates classes with a single space, collates classes for body element
        $classes = join(' ', $classes);

        echo $classes;
    }
}

if (!function_exists('cosmoswp_header_main_classes')) {

    /**
     * Return header main class
     * @since CosmosWP 1.0.0
     *
     * @param $class
     * @return string
     *
     */
    function cosmoswp_header_main_classes($class = '') {

        $classes = array();

        if (!empty($class)) {
            if (!is_array($class))
                $class = preg_split('#\s+#', $class);
            $classes = array_merge($classes, $class);
        }
        else {
            // Ensure that we always coerce class to being an array.
            $class = array();
        }

        $classes = apply_filters('cosmoswp_header_main_classes', $classes, $class);
        $classes = array_unique($classes);

        /*lets sanitize it*/
        $classes = array_map('esc_attr', $classes);

        // Separates classes with a single space, collates classes for body element
        $classes = join(' ', $classes);

        echo $classes;
    }
}

if (!function_exists('cosmoswp_header_bottom_classes')) {

    /**
     * Return header bottom class
     * @since CosmosWP 1.0.0
     *
     * @param $class
     * @return string
     *
     */
    function cosmoswp_header_bottom_classes($class = '') {

        $classes = array();

        if (!empty($class)) {
            if (!is_array($class))
                $class = preg_split('#\s+#', $class);
            $classes = array_merge($classes, $class);
        }
        else {
            // Ensure that we always coerce class to being an array.
            $class = array();
        }

        $classes = apply_filters('cosmoswp_header_bottom_classes', $classes, $class);
        $classes = array_unique($classes);

        /*lets sanitize it*/
        $classes = array_map('esc_attr', $classes);

        // Separates classes with a single space, collates classes for body element
        $classes = join(' ', $classes);

        echo $classes;
    }
}

if (!function_exists('cosmoswp_main_wrap_scroll_data')) {

    /**
     * Return scroll_data
     * @since CosmosWP 1.0.0
     *
     * @param null
     * @return string
     *
     */
    function cosmoswp_main_wrap_scroll_data() {

        $sticky_header_options = cosmoswp_get_theme_options('sticky-header-options');
        $scrolltype_data       = '';
        $sticky_color_data     = 'disable';
        if ($sticky_header_options == 'scroll-down') {
            $scrolltype_data = 'cwp-scroll-down-sticky';
        }
        elseif ($sticky_header_options == 'scroll-up') {
            $scrolltype_data = 'cwp-scroll-up-sticky';
        }
        elseif($sticky_header_options == 'normal'){
            $scrolltype_data = 'normal';
        }
        if($sticky_header_options != 'disable' ){
            $sticky_header_color_options = cosmoswp_get_theme_options('enable-sticky-header-color-options');
            if ($sticky_header_color_options) {
                $sticky_color_data = 'enable';
            }
        }
        $header_position_options = cosmoswp_get_theme_options('header-position-options');
        $sticky_header_height    = cosmoswp_get_theme_options('sticky-header-trigger-height');
        if (!empty($header_position_options) && ('cwp-vertical-header' != $header_position_options) && ('cwp-overlay-transparent' != $header_position_options)) {
            if (!empty($scrolltype_data)) {
                echo 'data-scrolltype="' . $scrolltype_data . '" data-height-trigger-sticky="' . $sticky_header_height . '" data-sticky-color="'.$sticky_color_data.'"';
            }
        }
    }
}

if (!function_exists('cosmoswp_is_active_footer')) {

    /**
     * Check footer active
     * @since CosmosWP 1.0.0
     *
     * @param null
     * @return boolean
     *
     */
    function cosmoswp_is_active_footer() {
        return true;
    }
}

if (!function_exists('cosmoswp_footer_wrap_classes')) {

    /**
     * Return Footer Wrap class
     * @since CosmosWP 1.0.0
     *
     * @param $class
     * @return string
     *
     */
    function cosmoswp_footer_wrap_classes($class = '') {

        $classes = array();

        if (!empty($class)) {
            if (!is_array($class))
                $class = preg_split('#\s+#', $class);
            $classes = array_merge($classes, $class);
        }
        else {
            // Ensure that we always coerce class to being an array.
            $class = array();
        }

        $classes = apply_filters('cosmoswp_footer_wrap_classes', $classes, $class);
        $classes = array_unique($classes);

        /*lets sanitize it*/
        $classes = array_map('esc_attr', $classes);

        // Separates classes with a single space, collates classes for body element
        $classes = join(' ', $classes);

        echo esc_attr($classes);
    }
}

if (!function_exists('cosmoswp_footer_top_wrap_classes')) {

    /**
     * Return Footer Wrap class
     * @since CosmosWP 1.0.0
     *
     * @param $class
     * @return string
     *
     */
    function cosmoswp_footer_top_wrap_classes($class = '') {

        $classes = array();

        if (!empty($class)) {
            if (!is_array($class))
                $class = preg_split('#\s+#', $class);
            $classes = array_merge($classes, $class);
        }
        else {
            // Ensure that we always coerce class to being an array.
            $class = array();
        }

        $classes = apply_filters('cosmoswp_footer_top_wrap_classes', $classes, $class);
        $classes = array_unique($classes);

        /*lets sanitize it*/
        $classes = array_map('esc_attr', $classes);

        // Separates classes with a single space, collates classes for body element
        $classes = join(' ', $classes);

        echo esc_attr($classes);
    }
}

if (!function_exists('cosmoswp_footer_main_wrap_classes')) {

    /**
     * Return Footer Wrap class
     * @since CosmosWP 1.0.0
     *
     * @param $class
     * @return string
     *
     */
    function cosmoswp_footer_main_wrap_classes($class = '') {

        $classes = array();

        if (!empty($class)) {
            if (!is_array($class))
                $class = preg_split('#\s+#', $class);
            $classes = array_merge($classes, $class);
        }
        else {
            // Ensure that we always coerce class to being an array.
            $class = array();
        }

        $classes = apply_filters('cosmoswp_footer_main_wrap_classes', $classes, $class);
        $classes = array_unique($classes);

        /*lets sanitize it*/
        $classes = array_map('esc_attr', $classes);

        // Separates classes with a single space, collates classes for body element
        $classes = join(' ', $classes);

        echo esc_attr($classes);
    }
}

if (!function_exists('cosmoswp_footer_bottom_wrap_classes')) {

    /**
     * Return Footer Wrap class
     * @since CosmosWP 1.0.0
     *
     * @param $class
     * @return string
     *
     */
    function cosmoswp_footer_bottom_wrap_classes($class = '') {

        $classes = array();

        if (!empty($class)) {
            if (!is_array($class))
                $class = preg_split('#\s+#', $class);
            $classes = array_merge($classes, $class);
        }
        else {
            // Ensure that we always coerce class to being an array.
            $class = array();
        }

        $classes = apply_filters('cosmoswp_footer_bottom_wrap_classes', $classes, $class);
        $classes = array_unique($classes);

        /*lets sanitize it*/
        $classes = array_map('esc_attr', $classes);

        // Separates classes with a single space, collates classes for body element
        $classes = join(' ', $classes);

        echo esc_attr($classes);
    }
}

if (!function_exists('cosmoswp_meta_collection')) :

    /**
     * Custom template tags for this theme.
     *
     * @package CosmosWP
     * @param [array] $cosmoswp_meta_element
     * @return string
     *
     */
    function cosmoswp_meta_collection($cosmoswp_meta_element = array()) {
        // Hide author, category and tag text for pages.
        if (!is_array($cosmoswp_meta_element) && empty($cosmoswp_meta_element)) {
            return;
        }
        foreach ($cosmoswp_meta_element as $element) {
            if ('published-date' == $element) {
                $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

                $time_string = sprintf($time_string,
                    esc_attr(get_the_date('c')),
                    esc_html(get_the_date())
                );
                $posted_on   = sprintf(
                    '%s',
                    '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
                );
                echo '<span class="posted-on"><i class="'.esc_attr(cosmoswp_get_correct_fa_font('far fa-calendar-alt')).'"></i> ' . $posted_on . '</span>'; // WPCS: XSS OK.
            }
            elseif ('updated-date' == $element) {
                $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
                if (get_the_time('U') !== get_the_modified_time('U')) {
                    $time_string = '<time class="updated" datetime="%1$s">%2$s</time>';
                }
                $time_string = sprintf($time_string,
                    esc_attr(get_the_modified_date('c')),
                    esc_html(get_the_modified_date())
                );
                $posted_on   = sprintf(
                    '%s',
                    '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
                );
                echo '<span class="posted-on"><i class="'.esc_attr(cosmoswp_get_correct_fa_font('far fa-calendar-alt')).'"></i> ' . $posted_on . '</span>'; // WPCS: XSS OK.
            }
            elseif ('author' == $element) {
                printf(
                    '%s',
                    '<span class="author vcard"><i class="'.esc_attr(cosmoswp_get_correct_fa_font('far fa-user')).'"></i><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
                );
            }
            elseif ('categories' == $element) {

                $categories_list = get_the_category_list(esc_html__(', ', 'cosmoswp'));
                if ($categories_list) {
                    printf('<span class="cat-links"><i class="'.esc_attr(cosmoswp_get_correct_fa_font('fas fa-tags')).'"></i> %1$s</span>', $categories_list); // WPCS: XSS OK.
                }
            }
            elseif ('tags' == $element) {
                /* translators: used between list items, there is a space after the comma */
                $tags_list = get_the_tag_list('', esc_html__(', ', 'cosmoswp'));
                if ($tags_list) {
                    printf('<span class="tags-links"><i class="'.esc_attr(cosmoswp_get_correct_fa_font('fas fa-tags')).'"></i>%1$s</span>', $tags_list); // WPCS: XSS OK.
                }
            }
            elseif ('comments' == $element) {
                if (!post_password_required() && (comments_open() || get_comments_number())) {
                    echo '<span class="comments-link"><i class="'.esc_attr(cosmoswp_get_correct_fa_font('far fa-comment-alt')).'"></i>';
                    comments_popup_link(esc_html__('Leave a comment', 'cosmoswp'), esc_html__('1 Comment', 'cosmoswp'), esc_html__('% Comments', 'cosmoswp'));
                    echo '</span>';
                }
            }
            else {
                echo '';
            }
        }
        if (get_edit_post_link()) :
            edit_post_link(
                sprintf(
                /* translators: %s: Name of current post */
                    esc_html__('Edit %s', 'cosmoswp'),
                    the_title('<span class="screen-reader-text">"', '"</span>', false)
                ),
                '<span class="edit-link"><i class="'.esc_attr(cosmoswp_get_correct_fa_font('far fa-edit')).'"></i>',
                '</span>'
            );
        endif;
    }
endif;

if (!function_exists('cosmoswp_sidebar_template')) {

    /**
     * Sidebar Template
     * Content, Primary and Secondary Sidebar Display Template
     * @since CosmosWP 1.0.2
     *
     * @param string $sidebar
     * @param string blog/page/post
     * @return void
     *
     */
    function cosmoswp_sidebar_template( $sidebar, $front = 'blog' ) {
        $primary = "template-parts/sidebar/primary-sidebar";
        $secondary = "template-parts/sidebar/secondary-sidebar";
        $content = "template-parts/main-content/blog-main-content";

        if( 'post' === $front ){
            $content = "template-parts/main-content/post-main-content";
        }
        elseif( 'page' === $front ){
            $content = "template-parts/main-content/page-main-content";
        }
        elseif( 'cwp-woo-archive' === $front ){
            $content = "cwp-woo/cwp-woo-archive-main-content";
            $primary = "cwp-woo/cwp-woo-primary-sidebar";
            $secondary = "cwp-woo/cwp-woo-secondary-sidebar";
        }
        elseif( 'cwp-woo-single' === $front ){
            $content = "cwp-woo/cwp-woo-single-main-content";
            $primary = "cwp-woo/cwp-woo-primary-sidebar";
            $secondary = "cwp-woo/cwp-woo-secondary-sidebar";
        }
        elseif( 'cwp-edd-archive' === $front ){
            $content = "edd/edd-archive-main-content";
            $primary = "edd/edd-primary-sidebar";
            $secondary = "edd/edd-secondary-sidebar";
        }
        elseif( 'cwp-edd-single' === $front ){
            $content = "edd/edd-single-main-content";
            $primary = "edd/edd-primary-sidebar";
            $secondary = "edd/edd-secondary-sidebar";
        }

        switch ($sidebar):
            case 'ful-ct':
                echo '<div class="cwp-grid-column cwp-ms-content-grid-column grid-md-12">';
                get_template_part($content);
                echo '</div>';
                break;

            case 'middle-ct':
                echo '<div class="cwp-grid-column cwp-ms-content-grid-column grid-md-8 offset-md-2">';
                get_template_part($content);
                echo '</div>';
                break;

            case 'ps-ct':
                echo '<div class="cwp-grid-column cwp-ms-content-grid-column grid-md-3">';
                get_template_part($primary);
                echo '</div>';
                echo '<div class="cwp-grid-column cwp-ms-content-grid-column grid-md-9">';
                get_template_part($content);
                echo '</div>';
                break;

            case 'ct-ps':
                echo '<div class="cwp-grid-column cwp-ms-content-grid-column grid-md-9">';
                get_template_part($content);
                echo '</div>';
                echo '<div class="cwp-grid-column cwp-ms-content-grid-column grid-md-3">';
                get_template_part($primary);
                echo '</div>';
                break;

            case 'ss-ct-ps':
                echo '<div class="cwp-grid-column cwp-ms-content-grid-column grid-md-3">';
                get_template_part($secondary);
                echo '</div>';
                echo '<div class="cwp-grid-column cwp-ms-content-grid-column grid-md-6">';
                get_template_part($content);
                echo '</div>';
                echo '<div class="cwp-grid-column cwp-ms-content-grid-column grid-md-3">';
                get_template_part($primary);
                echo '</div>';
                break;

            case 'ss-ps-ct':
                echo '<div class="cwp-grid-column cwp-ms-content-grid-column grid-md-3">';
                get_template_part($secondary);
                echo '</div>';
                echo '<div class="cwp-grid-column cwp-ms-content-grid-column grid-md-3">';
                get_template_part($primary);
                echo '</div>';
                echo '<div class="cwp-grid-column cwp-ms-content-grid-column grid-md-6">';
                get_template_part($content);
                echo '</div>';
                break;

            case 'ct-ps-ss':
                echo '<div class="cwp-grid-column cwp-ms-content-grid-column grid-md-6">';
                get_template_part($content);
                echo '</div>';
                echo '<div class="cwp-grid-column cwp-ms-content-grid-column grid-md-3">';
                get_template_part($secondary);
                echo '</div>';
                echo '<div class="cwp-grid-column cwp-ms-content-grid-column grid-md-3">';
                get_template_part($primary);
                echo '</div>';

                break;

            default:
                echo '<div class="cwp-grid-column cwp-ms-content-grid-column grid-md-12">';
                get_template_part($content);
                echo '</div>';
                break;
        endswitch;
    }
}