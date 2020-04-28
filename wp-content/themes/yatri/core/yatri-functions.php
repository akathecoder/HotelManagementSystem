<?php
if (!function_exists('yatri_init_customizer_options')) :

    function yatri_init_customizer_options()
    {
        global $yatri_global_options;

        $yatri_global_options = new stdClass();

        $yatri_default = yatri_get_default_theme_options();

        $theme_options = get_theme_mod(YATRI_THEME_SETTINGS, $yatri_default);

        return $yatri_global_options->customizer = array_merge($yatri_default, $theme_options);


    }
endif;

if (!function_exists('yatri_get_customizer_priority')) :

    function yatri_get_customizer_priority(&$current_priority = 0)
    {
        return (20 + absint($current_priority));
    }
endif;

if (!function_exists('yatri_breadcrumb')) :

    function yatri_breadcrumb()
    {

        $breadcrumb_args = apply_filters('yatri_breadcrumb_args', array(
            'show_browse' => false,
        ));

        $breadcrumb = new Mantrabrain_Theme_Breadcrumbs();

        $breadcrumb->breadcrumb_trail($breadcrumb_args);
    }

endif;
if (!function_exists('yatri_get_post_format')) {

    function yatri_get_post_format($post_format_override = '')
    {

        if ((is_home()) || is_archive()) {
            $post_format = 'blog';
        } else {
            $post_format = get_post_format();
        }

        return apply_filters('yatri_get_post_format', $post_format, $post_format_override);
    }
}

if (!function_exists('yatri_layout_options')) :

    function yatri_layout_options()
    {
        $url = YATRI_THEME_URI . 'assets/images/icons/';

        return array(
            'yatri_right_sidebar' =>
                array(
                    'title' => esc_html__('RIGHT SIDEBAR', 'yatri'),
                    'image' => $url . 'right-sidebar.jpg'
                ),
            'yatri_left_sidebar' =>
                array(
                    'title' => esc_html__('LEFT SIDEBAR', 'yatri'),
                    'image' => $url . 'left-sidebar.jpg'
                ),
            'yatri_full_width' =>
                array(
                    'title' => esc_html__('FULL WIDTH', 'yatri'),
                    'image' => $url . 'full-width.jpg'
                ),
            'yatri_full_width_100' =>
                array(
                    'title' => esc_html__('100% FULL WIDTH', 'yatri'),
                    'image' => $url . 'full-width-100.jpg'
                ),
            'yatri_both_sidebar' =>
                array(
                    'title' => esc_html__('BOTH SIDEBAR', 'yatri'),
                    'image' => $url . 'both-sidebar.jpg'
                ),
        );
    }

endif;
if (!function_exists('yatri_global_layout_options')) :

    function yatri_global_layout_options()
    {

        $layout_options = apply_filters('yatri_global_layout_options', array(
            'boxed' => esc_html__('Boxed', 'yatri'),
            'full_width' => esc_html__('Full Width ', 'yatri'),
        ));

        return $layout_options;
    }

endif;

if (!function_exists('yatri_get_other_post_types')) :

    function yatri_get_other_post_types()
    {
        global $wp_post_types;

        $posttype_names = array();

        $pt_remove = array("attachment", "nav_menu_item", "customize_changeset", "revision", "post", "page", "yatra-booking", "yatra-customers");

        foreach ($wp_post_types as $post_type_key => $posttype):

            if (!in_array($post_type_key, $pt_remove) && $posttype->public) {

                $posttype_names[$post_type_key] = $posttype->label;
            }

        endforeach;

        return apply_filters('yatri_post_types_filter', $posttype_names);
    }

endif;

if (!function_exists('yatri_main_wrap_class')) {

    function yatri_main_wrap_class($class = '')
    {
        echo 'class="' . esc_attr(join(' ', yatri_get_main_wrap_class($class))) . '"';

    }

}

if (!function_exists('yatri_main_wrap_inner_class')) {

    function yatri_main_wrap_inner_class($class = '')
    {
        echo 'class="' . esc_attr(join(' ', yatri_get_main_wrap_inner_class($class))) . '"';

    }

}

if (!function_exists('yatri_get_main_wrap_class')) {

    function yatri_get_main_wrap_class($class = '')
    {

        // array of class names.
        $classes = array();

        $classes[] = 'yatri-main-wrap';


        $classes[] = 'yat-col-12';

        $page_layout = yatri_page_layout();

        if ('yatri_left_sidebar' == $page_layout || 'yatri_right_sidebar' == $page_layout) {

            $classes[] = 'yat-col-md-8';

        } else if ('yatri_both_sidebar' == $page_layout) {

            $classes[] = 'yat-col-md-4';

        }


        if (!empty($class)) {
            if (!is_array($class)) {
                $class = preg_split('#\s+#', $class);
            }
            $classes = array_merge($classes, $class);
        } else {

            // Ensure that we always coerce class to being an array.
            $class = array();
        }

        // Filter primary div class names.
        $classes = apply_filters('yatri_main_wrap_class', $classes, $class);

        $classes = array_map('sanitize_html_class', $classes);

        return array_unique($classes);
    }
}
if (!function_exists('yatri_get_main_wrap_inner_class')) {

    function yatri_get_main_wrap_inner_class($class = '')
    {

        // array of class names.
        $classes = array();

        $classes[] = 'yatri-content-wrap ';
        if (is_single()) {
            $classes[] = 'post-main-content';
        } else if (is_page()) {
            $classes[] = 'page-content';
        }

        if (!empty($class)) {
            if (!is_array($class)) {
                $class = preg_split('#\s+#', $class);
            }
            $classes = array_merge($classes, $class);
        } else {

            // Ensure that we always coerce class to being an array.
            $class = array();
        }
        // Filter primary div class names.
        $classes = apply_filters('yatri_main_wrap_inner_class', $classes, $class);

        $classes = array_map('sanitize_html_class', $classes);

        return array_unique($classes);
    }
}

if (!function_exists('yatri_blog_archive_page_content_order')) {

    function yatri_blog_archive_page_content_order($key = '')
    {
        $default_orders = apply_filters(
            'yatri_archive_page_content_default_order',
            array(
                /* 'thumbnail',
                 'category',
                 'post_title',
                 'post_meta',
                 'excerpt'*/
                'thumbnail' =>
                    array(
                        'title' => esc_html__('Thumbnail', 'yatri'),
                        'disable' => false

                    ),

                'post_title' => array(
                    'title' => esc_html__('Post Title', 'yatri'),
                    'disable' => false

                ),
                'post_meta' => array(
                    'title' => esc_html__('Post Meta', 'yatri'),
                    'disable' => false

                ),
                'excerpt' => array(
                    'title' => esc_html__('Excerpt', 'yatri'),
                    'disable' => false

                ),
                'category' => array(
                    'title' => esc_html__('Category/Tags', 'yatri'),
                    'disable' => false

                ),


            )
        );

        if (empty($key)) {

            return $default_orders;
        }

        $blog_archive_page_content_order = yatri_get_option($key);

        try {

            $blog_archive_page_content_order = !empty($blog_archive_page_content_order) && is_string($blog_archive_page_content_order) ? json_decode($blog_archive_page_content_order, true) : $default_orders;

        } catch (Exception $e) {

            $blog_archive_page_content_order = $default_orders;
        }

        return apply_filters('yatri_archive_page_content_value_order', $blog_archive_page_content_order);
    }

}


if (!function_exists('yatri_single_post_content_order')) {

    function yatri_single_post_content_order($default = true)
    {
        $default_orders = apply_filters(
            'yatri_single_post_content_default_order',
            array(


                'thumbnail' =>
                    array(
                        'title' => esc_html__('Thumbnail', 'yatri'),
                        'disable' => false

                    ),
                'post_title' => array(
                    'title' => esc_html__('Post Title', 'yatri'),
                    'disable' => false

                ),
                'post_meta' =>
                    array(
                        'title' => esc_html__('Post Meta', 'yatri'),
                        'disable' => false

                    ),
                'content' =>
                    array(
                        'title' => esc_html__('Content', 'yatri'),
                        'disable' => false

                    ),

                'tags' => array(
                    'title' => esc_html__('Tags', 'yatri'),
                    'disable' => true

                ),
                'categories' => array(
                    'title' => esc_html__('Categories', 'yatri'),
                    'disable' => false

                ),

                'author_bio' => array(
                    'title' => esc_html__('Author Bio', 'yatri'),
                    'disable' => false

                ),
                'comment_form' => array(
                    'title' => esc_html__('Comment Form', 'yatri'),
                    'disable' => false

                ),
                'post_navigation' => array(
                    'title' => esc_html__('Post Navigation', 'yatri'),
                    'disable' => false

                ),
                'related_posts' => array(
                    'title' => esc_html__('Related Posts', 'yatri'),
                    'disable' => false

                ),


            )
        );

        if ($default) {

            return $default_orders;
        }

        $single_post_content_order = yatri_get_option('single_post_content_order');

        try {

            $single_post_content_order = !empty($single_post_content_order) && is_string($single_post_content_order) ? json_decode($single_post_content_order, true) : $default_orders;

        } catch (Exception $e) {

            $single_post_content_order = $default_orders;
        }

        return apply_filters('yatri_single_post_content_value_order', $single_post_content_order);
    }

}

if (!function_exists('yatri_meta_content_order')) {

    function yatri_meta_content_order($key = '')
    {
        $default_orders = apply_filters(
            'yatri_meta_content_default_order',
            array(

                'author' =>
                    array(
                        'title' => esc_html__('Author', 'yatri'),
                        'disable' => false

                    ),
                'date' =>
                    array(
                        'title' => esc_html__('Date', 'yatri'),
                        'disable' => false

                    ),
                'comment' => array(
                    'title' => esc_html__('Comment', 'yatri'),
                    'disable' => false

                ),


            )
        );

        if (empty($key)) {

            return $default_orders;
        }

        $meta_ordering = yatri_get_option($key);

        try {

            $meta_ordering = !empty($meta_ordering) && is_string($meta_ordering) ? json_decode($meta_ordering, true) : $default_orders;

        } catch (Exception $e) {

            $meta_ordering = $default_orders;
        }

        return apply_filters('yatri_meta_content_value_order', $meta_ordering);
    }

}


function yatri_get_all_image_sizes()
{
    global $_wp_additional_image_sizes;

    $default_image_sizes = array('thumbnail', 'medium', 'large');

    foreach ($default_image_sizes as $size) {
        $image_sizes[$size]['width'] = intval(get_option("{$size}_size_w"));
        $image_sizes[$size]['height'] = intval(get_option("{$size}_size_h"));
        $image_sizes[$size]['crop'] = get_option("{$size}_crop") ? get_option("{$size}_crop") : false;
    }

    if (isset($_wp_additional_image_sizes) && count($_wp_additional_image_sizes)) {
        $image_sizes = array_merge($image_sizes, $_wp_additional_image_sizes);
    }

    $options = array();
    foreach ($image_sizes as $k => $option) {
        $options[$k] = sprintf('%1$s - (%2$s x %3$s)', $k, $option['width'], $option['height']);
    }

    $options['full'] = 'Full';

    return $options;
}

if (!function_exists('yatri_meta_style_list')) {

    function yatri_meta_style_list()
    {
        return apply_filters('yatri_meta_style_list', array(
            'with_icon' => esc_html__('Style 1 ( Meta with icon )', 'yatri'),
            'without_icon' => esc_html__('Style 2 ( Meta without icon )', 'yatri')
        ));
    }
}

if (!function_exists('yatri_heading_tags')) {

    function yatri_heading_tags()
    {
        return apply_filters('yatri_heading_tag_list', array(
            'h1' => esc_html__('H1', 'yatri'),
            'h2' => esc_html__('H2', 'yatri'),
            'h3' => esc_html__('H3', 'yatri'),
            'h4' => esc_html__('H4', 'yatri'),
            'h5' => esc_html__('H5', 'yatri'),
            'h6' => esc_html__('H6', 'yatri'),
            'div' => esc_html__('div', 'yatri'),
            'span' => esc_html__('span', 'yatri'),
            'p' => esc_html__('p', 'yatri'),

        ));
    }
}
if (!function_exists('yatri_content_layouts')) {

    function yatri_content_layouts()
    {
        return apply_filters('yatri_content_layouts', array(
            'yatri_list_layout' => esc_html__('List Layout', 'yatri'),
            //'yatri_grid_layout' => esc_html__('Grid Layout', 'yatri'),

        ));
    }
}
if (!function_exists('yatri_page_title_position')) {

    function yatri_page_title_position()
    {
        return apply_filters('yatri_page_title_position', array(
            'inside_breadcrumb' => esc_html__('Inside Breadcrumb', 'yatri'),
            'inside_content' => esc_html__('Inside Content', 'yatri'),
            'none' => esc_html__('None', 'yatri'),

        ));
    }
}

if (!function_exists('yatri_pagination_style')) {

    function yatri_pagination_style()
    {
        return apply_filters('yatri_pagination_styles', array(
            'next_prev' => esc_html__('Next/Prev', 'yatri'),
            'numeric' => esc_html__('Numeric', 'yatri'),

        ));
    }
}


if (!function_exists('yatri_get_excerpt_type')) {

    function yatri_get_excerpt_type()
    {

        return apply_filters('yatri_excerpt_type', array(
            'custom' => esc_html__('Custom', 'yatri'),
            'excerpt_metabox' => esc_html__('Use excerpt metabox', 'yatri'),

        ));
    }
}

if (!function_exists('yatri_sidebar_styles')) {

    function yatri_sidebar_styles()
    {

        return apply_filters('yatri_sidebar_styles', array(
            '' => esc_html__('Default', 'yatri'),
            'left' => esc_html__('Left sidebar', 'yatri'),
            'right' => esc_html__('Right sidebar', 'yatri'),
            'both' => esc_html__('Both Sidebars', 'yatri'),
            'no' => esc_html__('No Sidebar', 'yatri'),

        ));
    }
}


if (!function_exists('yatri_is_single_post')) {

    function yatri_is_single_post()
    {
        if (is_singular() && !is_page()) {

            return true;
        }
        return false;
    }
}

if (!function_exists('yatri_is_archive_page')) {

    function yatri_is_archive_page()
    {
        if (is_archive() || is_home() || is_search()) {

            return true;
        }
        return false;
    }
}

if (!function_exists('yatri_get_post_taxonomy')) {

    function yatri_get_post_taxonomy()
    {
        return apply_filters('yatr_post_taxonomy', array(
            'category' => esc_html__('Category', 'yatri'),
            'tag' => esc_html__('Tag', 'yatri'),
        ));

    }
}
if (!function_exists('yatri_get_recommanded_plugins')) {

    function yatri_get_recommanded_plugins()
    {
        $plugins = array(

            array(
                'name' => esc_html__('Yatri Tools', 'yatri'),
                'slug' => 'yatri-tools',
                'required' => false,
            ),

        );

        return apply_filters('yatri_get_recommanded_plugins', $plugins);
    }
}


if (!function_exists('yatri_get_offcanvas_menu_type')) {

    function yatri_get_offcanvas_menu_type()
    {
        $type =


            array(
                'sidebar' => esc_html__('Sidebar', 'yatri'),
            );


        return apply_filters('yatri_offcanvas_menu_type', $type);
    }
}

if (!function_exists('yatri_get_all_sidebars')) {

    function yatri_get_all_sidebars()
    {
        global $wp_registered_sidebars;

        $sidebars = array();

        foreach ($wp_registered_sidebars as $sidebar_id => $sidebar) {

            $sidebars[$sidebar_id] = isset($sidebar['name']) ? $sidebar['name'] : '';
        }

        return apply_filters('yatri_all_sidebar_lists', $sidebars);
    }
}


if (!function_exists('yatri_get_all_nav_menus')) {

    function yatri_get_all_nav_menus()
    {
        global $_wp_registered_nav_menus;

        return apply_filters('yatri_all_sidebar_lists', $_wp_registered_nav_menus);
    }
}


if (!function_exists('yatri_get_mid_header_sections')) {

    function yatri_get_mid_header_sections($from_option = false)
    {
        $default = array(
            array(
                'section' => 'offcanvas_menu',
                'width' => ''
            ),
            array(
                'section' => 'custom_html',
                'width' => ''
            ),
            array(
                'section' => 'search_form',
                'width' => ''
            )
        );
        if (!$from_option) {
            return $default;
        }
        $sections = yatri_get_header_option('mid_header_sections');
        if (!is_array($sections)) {

            return $default;
        }
        return $sections;
    }
}

if (!function_exists('yatri_get_bottom_header_sections')) {

    function yatri_get_bottom_header_sections($from_option = false)
    {
        $default = array(
            array(
                'section' => 'site_branding',
                'width' => '25'
            ),
            array(
                'section' => 'menu',
                'width' => '50'
            ),
            array(
                'section' => 'search_form',
                'width' => '25'
            )
        );
        if (!$from_option) {
            return $default;
        }
        $sections = yatri_get_header_option('bottom_header_sections');
        if (!is_array($sections)) {

            return $default;
        }
        return $sections;
    }
}

if (!function_exists('yatri_get_top_header_sections')) {

    function yatri_get_top_header_sections($from_option = false)
    {
        $default = array(
            array(
                'section' => 'office_information',
                'width' => ''
            ),
            array(
                'section' => '',
                'width' => ''
            ),
            array(
                'section' => 'social_icons',
                'width' => ''
            )
        );
        if (!$from_option) {
            return $default;
        }
        $sections = yatri_get_header_option('top_header_sections');
        if (!is_array($sections)) {

            return $default;
        }
        return $sections;
    }
}

if (!function_exists('yatri_get_bottom_footer_sections')) {

    function yatri_get_bottom_footer_sections($from_option = false)
    {
        $default = array(
            array(
                'section' => 'copyright',
                'width' => '60'
            ),
            array(
                'section' => '',
                'width' => '0'
            ),
            array(
                'section' => 'menu',
                'width' => '40'
            )
        );
        if (!$from_option) {
            return $default;
        }
        $sections = yatri_get_header_option('bottom_footer_sections');
        if (!is_array($sections)) {

            return $default;
        }
        return $sections;
    }
}


if (!function_exists('yatri_branding_layout_choices')) {

    function yatri_branding_layout_choices()
    {
        $url = YATRI_THEME_URI . 'assets/images/icons/';

        return array(
            'layout-1' => $url . 'logo-layout-1.jpg',
            'layout-2' => $url . 'logo-layout-2.jpg',
            'layout-3' => $url . 'logo-layout-3.jpg',
            'layout-4' => $url . 'logo-layout-4.jpg',
        );
    }
}
if (!function_exists('yatri_enable_page_builder_compatibility')) {
    function yatri_enable_page_builder_compatibility()
    {
        return apply_filters('yatri_enable_page_builder_compatibility', true);
    }
}

if (!function_exists('yatri_get_post_id')) {

    function yatri_get_post_id()
    {


        global $post;

        $post_id = 0;

        if (is_home()) {
            $post_id = get_option('page_for_posts');
        } elseif (is_archive()) {
            global $wp_query;
            $post_id = $wp_query->get_queried_object_id();
        } elseif (isset($post->ID) && !is_search() && !is_category()) {
            $post_id = $post->ID;
        }

        return apply_filters('yatri_get_post_id', $post_id);
    }
}
if (!function_exists('yatri_minify_css')) {

    function yatri_minify_css($css = '')
    {

        // Return if no CSS
        if (!$css) return;

        // Normalize whitespace
        $css = preg_replace('/\s+/', ' ', $css);

        // Remove ; before }
        $css = preg_replace('/;(?=\s*})/', '', $css);

        // Remove space after , : ; { } */ >
        $css = preg_replace('/(,|:|;|\{|}|\*\/|>) /', '$1', $css);

        // Remove space before , ; { }
        $css = preg_replace('/ (,|;|\{|})/', '$1', $css);

        // Strips leading 0 on decimal values (converts 0.5px into .5px)
        $css = preg_replace('/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css);

        // Strips units if value is 0 (converts 0px to 0)
        $css = preg_replace('/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css);

        // Trim
        $css = trim($css);

        // Return minified CSS
        return $css;

    }
}

if (!function_exists('yatri_theme_branding')) {

    function yatri_theme_branding()
    {

        $return = esc_html__('Yatri', 'yatri');

        // Return and apply filters for child theming
        return apply_filters('yatri_theme_branding', $return);
    }

}
if (!function_exists('yatri_section_container_class')) {

    function yatri_section_container_class($section, $option_id, $section_index)
    {

        $class = 'yatri-grid-' . (absint($section_index + 1)) . ' ';

        $section_id = isset($section['section']) ? $section['section'] : '';


        $width = isset($section['width']) ? $section['width'] : '';

        if (empty($section_id) || $section_id == '') {

            if ($width == '' || $width == "0") {

                $class .= 'yatri-all-device-hidden';
            } else {

                $class .= 'yatri-mobile-hidden';

            }

            return $class;
        }

        $visibility_id = $option_id . '_' . $section_id . '_visibility';

        $visibility_status = yatri_get_option($visibility_id);

        $count = 0;

        if (!isset($visibility_status['desktop']) || (isset($visibility_status['desktop']) && !$visibility_status['desktop'])) {

            $class .= ' yatri-desktop-hidden';

            $count++;
        }
        if (!isset($visibility_status['tablet']) || (isset($visibility_status['tablet']) && !$visibility_status['tablet'])) {

            $class .= ' yatri-tablet-hidden';

            $count++;
        }

        if (!isset($visibility_status['mobile']) || (isset($visibility_status['mobile']) && !$visibility_status['mobile'])) {

            $class .= ' yatri-mobile-hidden';

            $count++;
        }
        if ($width == "0" && $width != '') {

            if (strpos($class, 'yatri-desktop-hidden') == false) {

                $class .= ' yatri-desktop-hidden';

                $count++;
            }
            if (strpos($class, 'yatri-tablet-hidden') == false) {

                $class .= ' yatri-tablet-hidden';

                $count++;
            }
        }

        if ($count == 3) {

            $class = ' yatri-all-device-hidden';
        }


        return $class;
    }

}


if (!function_exists('yatri_section_container_col_class')) {

    function yatri_section_container_col_class($sections, $option_id)
    {
        $mobile_class = 'yat-head-col-sm-4';

        $tablet_class = 'yat-head-col-md-4';

        $desktop_class = 'yat-head-col-lg-4';

        $desktop_hidden_count = 0;

        $mobile_hidden_count = 0;

        $tablet_hidden_count = 0;

        foreach ($sections as $section_index => $section) {

            $width = isset($section['width']) ? $section['width'] : '';

            $class = yatri_section_container_class($section, $option_id, $section_index);

            if ($width == '') {

                if (strpos($class, 'yatri-desktop-hidden') !== false || strpos($class, 'yatri-all-device-hidden') !== false) {

                    $desktop_hidden_count++;
                }


            }
            if (strpos($class, 'yatri-tablet-hidden') !== false || strpos($class, 'yatri-all-device-hidden') !== false) {

                $tablet_hidden_count++;
            }

            if (strpos($class, 'yatri-mobile-hidden') !== false || strpos($class, 'yatri-all-device-hidden') !== false) {

                $mobile_hidden_count++;
            }


        }

        switch ($desktop_hidden_count) {
            case "1":
                $desktop_class = 'yat-head-col-lg-6';
                break;
            case "2":
                $desktop_class = 'yat-head-col-lg-12';
                break;

        }

        switch ($tablet_hidden_count) {
            case "1":
                $tablet_class = 'yat-head-col-md-6';
                break;
            case "2":
                $tablet_class = 'yat-head-col-md-6';
                break;

        }

        switch ($mobile_hidden_count) {
            case "1":
                $mobile_class = 'yat-head-col-sm-6';
                break;
            case "2":
                $mobile_class = 'yat-head-col-sm-12';
                break;

        }
        $all_class = $mobile_class . ' ' . $tablet_class . ' ' . $desktop_class . ' ';

        return $all_class;

    }

}
