<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Concat string
 *
 * @since CosmosWP 1.0.0
 *
 * @param null
 * @return string
 *
 */
if (!function_exists('cosmoswp_string_concator')) {

    function cosmoswp_string_concator($string1,$string2, $string3 = '', $string4 = '', $string5 = ''  ) {
        $concated_string = '';
        if(!empty($string1) && is_string($string1)){
            $concated_string =  $concated_string.' '.$string1;
        }
        if(!empty($string2) && is_string($string2)){
            $concated_string =  $concated_string.' '.$string2;
        }
        if(!empty($string3) && is_string($string3)){
            $concated_string =  $concated_string.' '.$string3;
        }
        if(!empty($string4) && is_string($string4)){
            $concated_string =  $concated_string.' '.$string4;
        }
        if(!empty($string5) && is_string($string5)){
            $concated_string =  $concated_string.' '.$string5;
        }
        return $concated_string;

    }
}

if (!function_exists('cosmoswp_responsive_button_value')) {

    /**
     * cosmoswp_responsive_button_value
     * @param  array  $button_group
     * @param  string $device
     * @return string
     */
    function cosmoswp_responsive_button_value($button_group, $device) {

        $button_val = '';
        if (!is_array($button_group)) {
            return false;
        }
        foreach ($button_group as $device_data => $value) {

            switch ($device_data) {

                case 'desktop':
                    if ('desktop' == $device) {
                        if(!empty($value)){

                            $button_val = $value.'-desktop';
                        }
                    }
                    break;

                case 'tablet':
                    if ('tablet' == $device) {
                        if(!empty($value)) {
                            $button_val = $value . '-tablet';
                        }

                    }
                    break;

                case 'mobile':
                    if ('mobile' == $device) {
                        if(!empty($value)) {
                            $button_val = $value . '-mobile';
                        }
                    }
                    break;

                default:
                    break;
            }
        }
        return $button_val;
    }
}

if (!function_exists('cosmoswp_cssbox_values_inline')) {

    /**
     * cosmoswp_cssbox_values_inline description
     * @param  array  $position_collection
     * @param  string $device
     * @return string
     */
    function cosmoswp_cssbox_values_inline($position_collection, $device) {

        $inline_css = '';
        if (!is_array($position_collection)) {
            return false;
        }
        foreach ($position_collection as $device_data => $value) {

            switch ($device_data) {

                case 'desktop':
                    if ('desktop' == $device) {

                        $top    = (isset($value['top']) && cosmoswp_not_empty($value['top'])) ? $value['top'] : '';
                        $right  = (isset($value['right']) && cosmoswp_not_empty($value['right'])) ? $value['right'] : '';
                        $bottom = (isset($value['bottom']) && cosmoswp_not_empty($value['bottom'])) ? $value['bottom'] : '';
                        $left   = (isset($value['left']) && cosmoswp_not_empty($value['left'])) ? $value['left'] : '';

                        if (cosmoswp_not_empty($top) || cosmoswp_not_empty($right) || cosmoswp_not_empty($bottom) || cosmoswp_not_empty($left)) {
                            $top        = (cosmoswp_not_empty($top)) ? $top . 'px' : 0;
                            $right      = (cosmoswp_not_empty($right)) ? $right . 'px' : 0;
                            $bottom     = (cosmoswp_not_empty($bottom)) ? $bottom . 'px' : 0;
                            $left       = (cosmoswp_not_empty($left)) ? $left . 'px' : 0;
                            $inline_css = $top . ' ' . $right . ' ' . $bottom . ' ' . $left;
                        } else {
                            $inline_css = '0';
                        }
                    }
                    break;

                case 'tablet':
                    if ('tablet' == $device) {

                        $top    = (isset($value['top']) && cosmoswp_not_empty($value['top'])) ? $value['top'] : '';
                        $right  = (isset($value['right']) && cosmoswp_not_empty($value['right'])) ? $value['right'] : '';
                        $bottom = (isset($value['bottom']) && cosmoswp_not_empty($value['bottom'])) ? $value['bottom'] : '';
                        $left   = (isset($value['left']) && cosmoswp_not_empty($value['left'])) ? $value['left'] : '';

                        if (cosmoswp_not_empty($top) || cosmoswp_not_empty($right) || cosmoswp_not_empty($bottom) || cosmoswp_not_empty($left)) {
                            $top        = (cosmoswp_not_empty($top)) ? $top . 'px' : 0;
                            $right      = (cosmoswp_not_empty($right)) ? $right . 'px' : 0;
                            $bottom     = (cosmoswp_not_empty($bottom)) ? $bottom . 'px' :0;
                            $left       = (cosmoswp_not_empty($left)) ? $left . 'px' : 0;
                            $inline_css = $top . ' ' . $right . ' ' . $bottom . ' ' . $left;
                        } else {
                            $inline_css = '0';
                        }
                    }
                    break;

                case 'mobile':
                    if ('mobile' == $device) {

                        $top    = (isset($value['top']) && cosmoswp_not_empty($value['top'])) ? $value['top'] : '';
                        $right  = (isset($value['right']) && cosmoswp_not_empty($value['right'])) ? $value['right'] : '';
                        $bottom = (isset($value['bottom']) && cosmoswp_not_empty($value['bottom'])) ? $value['bottom'] : '';
                        $left   = (isset($value['left']) && cosmoswp_not_empty($value['left'])) ? $value['left'] : '';

                        if (cosmoswp_not_empty($top) || cosmoswp_not_empty($right) || cosmoswp_not_empty($bottom) || cosmoswp_not_empty($left)) {
                            $top        = (cosmoswp_not_empty($top)) ? $top . 'px' : 0;
                            $right      = (cosmoswp_not_empty($right)) ? $right . 'px' : 0;
                            $bottom     = (cosmoswp_not_empty($bottom)) ? $bottom . 'px' : 0;
                            $left       = (cosmoswp_not_empty($left)) ? $left . 'px' : 0;
                            $inline_css = $top . ' ' . $right . ' ' . $bottom . ' ' . $left;
                        } else {
                            $inline_css = '0';
                        }

                    }
                    break;

                default:
                    break;
            }
        }
        return $inline_css;
    }
}

if (!function_exists('cosmoswp_cssbox_responsive_value')) {

    /**
     * cosmoswp_cssbox_values_inline description
     * @param  array  $position_collection
     * @param  string $device
     * @return string
     */
    function cosmoswp_cssbox_responsive_value($position_collection, $device, $direction) {

        if (!is_array($position_collection)) {
            return false;
        }
        foreach ($position_collection as $device_data => $value) {

            switch ($device_data) {

                case 'desktop':
                    if ('desktop' == $device) {

                        $top    = (isset($value['top']) && cosmoswp_not_empty($value['top'])) ? $value['top']. 'px' : '';
                        $right  = (isset($value['right']) && cosmoswp_not_empty($value['right'])) ? $value['right']. 'px' : '';
                        $bottom = (isset($value['bottom']) && cosmoswp_not_empty($value['bottom'])) ? $value['bottom']. 'px' : '';
                        $left   = (isset($value['left']) && cosmoswp_not_empty($value['left'])) ? $value['left']. 'px' : '';


                        if ('top' == $direction) {
                            return $top;
                        }
                        elseif ('right' == $direction) {
                            return $right;

                        }
                        elseif ('bottom' == $direction) {
                            return $bottom;

                        }
                        elseif ('left' == $direction) {
                            return $left;

                        }

                    }
                    break;

                case 'tablet':
                    if ('tablet' == $device) {

                        $top    = (isset($value['top']) && cosmoswp_not_empty($value['top'])) ? $value['top']. 'px' : '';
                        $right  = (isset($value['right']) && cosmoswp_not_empty($value['right'])) ? $value['right']. 'px' : '';
                        $bottom = (isset($value['bottom']) && cosmoswp_not_empty($value['bottom'])) ? $value['bottom']. 'px' : '';
                        $left   = (isset($value['left']) && cosmoswp_not_empty($value['left'])) ? $value['left']. 'px' : '';


                        if ('top' == $direction) {
                            return $top;
                        }
                        elseif ('right' == $direction) {
                            return $right;

                        }
                        elseif ('bottom' == $direction) {
                            return $bottom;

                        }
                        elseif ('left' == $direction) {
                            return $left;

                        }
                    }
                    break;

                case 'mobile':
                    if ('mobile' == $device) {

                        $top    = (isset($value['top']) && cosmoswp_not_empty($value['top'])) ? $value['top']. 'px' : '';
                        $right  = (isset($value['right']) && cosmoswp_not_empty($value['right'])) ? $value['right']. 'px' : '';
                        $bottom = (isset($value['bottom']) && cosmoswp_not_empty($value['bottom'])) ? $value['bottom']. 'px' : '';
                        $left   = (isset($value['left']) && cosmoswp_not_empty($value['left'])) ? $value['left']. 'px' : '';


                        if ('top' == $direction) {
                            return $top;
                        }
                        elseif ('right' == $direction) {
                            return $right;

                        }
                        elseif ('bottom' == $direction) {
                            return $bottom;

                        }
                        elseif ('left' == $direction) {
                            return $left;

                        }
                    }
                    break;

                default:
                    break;
            }
        }
    }
}

if (!function_exists('cosmoswp_boxshadow_values_inline')) {

    /**
     * cosmoswp_boxshadow_values_inline description
     * @param  array  $position_collection
     * @param  string $device
     * @return string
     */
    function cosmoswp_boxshadow_values_inline($position_collection, $device) {

        $inline_css = '';
        if (!is_array($position_collection)) {
            return false;
        }
        foreach ($position_collection as $device_data => $value) {

            switch ($device_data) {

                case 'desktop':
                    if ('desktop' == $device) {

                        $top    = $value['x'];
                        $top    = (!empty($top)) ? $top . 'px' : '0';
                        $right  = $value['Y'];
                        $right  = (!empty($right)) ? $right . 'px' : '0';
                        $bottom = $value['BLUR'];
                        $bottom = (!empty($bottom)) ? $bottom . 'px' : '0';
                        $left   = $value['SPREAD'];
                        $left   = (!empty($left)) ? $left . 'px' : '0';
                        $inset  = $value['cssbox_link'];
                        $inset  = ($inset) ? 'inset' : '';

                        $inline_css = $inset . ' ' . $top . ' ' . $right . ' ' . $bottom . ' ' . $left;
                    }
                    break;

                case 'tablet':
                    if ('tablet' == $device) {

                        $top    = $value['x'];
                        $top    = (!empty($top)) ? $top . 'px' : '0';
                        $right  = $value['Y'];
                        $right  = (!empty($right)) ? $right . 'px' : '0';
                        $bottom = $value['BLUR'];
                        $bottom = (!empty($bottom)) ? $bottom . 'px' : '0';
                        $left   = $value['SPREAD'];
                        $left   = (!empty($left)) ? $left . 'px' : '0';
                        $inset  = $value['cssbox_link'];
                        $inset  = ($inset) ? 'inset' : '';

                        $inline_css = $inset . ' ' . $top . ' ' . $right . ' ' . $bottom . ' ' . $left;
                    }
                    break;

                case 'mobile':
                    if ('mobile' == $device) {

                        $top    = $value['x'];
                        $top    = (!empty($top)) ? $top . 'px' : '0';
                        $right  = $value['Y'];
                        $right  = (!empty($right)) ? $right . 'px' : '0';
                        $bottom = $value['BLUR'];
                        $bottom = (!empty($bottom)) ? $bottom . 'px' : '0';
                        $left   = $value['SPREAD'];
                        $left   = (!empty($left)) ? $left . 'px' : '0';
                        $inset  = $value['cssbox_link'];
                        $inset  = ($inset) ? 'inset' : '';

                        $inline_css = $inset . ' ' . $top . ' ' . $right . ' ' . $bottom . ' ' . $left;
                    }
                    break;

                default:
                    break;
            }
        }
        return $inline_css;
    }
}

if (!function_exists('cosmoswp_str_replace_assoc')) {

    /**
     * cosmoswp_str_replace_assoc
     * @param  array $replace
     * @param  array $subject
     * @return array
     */
    function cosmoswp_str_replace_assoc(array $replace, $subject) {
        return str_replace(array_keys($replace), array_values($replace), $subject);
    }
}

if (!function_exists('cosmoswp_builder_sidebar_id')) {

    /**
     * cosmoswp_builder_sidebar_id
     * @param $id
     * @return array|string
     */
    function cosmoswp_builder_sidebar_id($id) {
        if (!empty($id)) {
            $id = explode("-", $id);
            $id = array_splice($id, 1);
            $id = implode('-', $id);
        }
        return $id;
    }
}

if (!function_exists('cosmoswp_get_icon_structure')) {

    /**
     * cosmoswp_get_icon_structure
     * @param $icon_type
     * @param $open_text
     * @param $open_icon
     * @param $icon_position
     * @return string
     */
    function cosmoswp_get_icon_structure($icon_type, $open_text, $open_icon, $icon_position) {

        $icon_content = $after_icon = $before_icon = '';
        if ('text' == $icon_type) {
            if ($open_text) {
                $icon_content = '<span>'.esc_html($open_text).'</span>';
            }
        }
        elseif ('icon' == $icon_type) {
            if ($open_icon) {
                $icon_content = wp_kses_post('<i class="' . esc_attr(cosmoswp_get_correct_fa_font($open_icon)) . '"></i>');
            }
        }
        elseif ('both' == $icon_type) {

            if ($open_icon) {
                $icon_html = '<i class="' . esc_attr($open_icon) . '"></i>';
            }
            if ($icon_position) {

                if ($icon_position == 'after') {

                    $after_icon = wp_kses_post($icon_html);
                } else {

                    $before_icon = wp_kses_post($icon_html);
                }
            }
            $icon_content = $before_icon .'<span>'. esc_html($open_text) .'</span>'. $after_icon;
        }
        return $icon_content;
    }
}

if (!function_exists('cosmoswp_get_button_structure')) {

    /**
     * cosmoswp_get_button_structure
     * @param $button_text
     * @param $button_icon
     * @param $icon_position
     * @return string
     */
    function cosmoswp_get_button_structure($button_text, $button_icon, $icon_position) {

        $after_icon  = $before_icon = '';
        $icon_html   = ($button_icon) ? '<i class="' . esc_attr(cosmoswp_get_correct_fa_font($button_icon)) . '"></i>' : '';
        $button_text = ($button_icon) ? esc_html($button_text) : '';
        if ($icon_position) {

            if ($icon_position == 'after') {

                $after_icon = wp_kses_post($icon_html);
            } else {

                $before_icon = wp_kses_post($icon_html);
            }
        } else {
            $before_icon = wp_kses_post($icon_html);
        }
        $icon_content = $before_icon . esc_html($button_text) . $after_icon;
        return $icon_content;
    }
}

if (!function_exists('cosmoswp_get_icon_postion_class')) {

    /**
     * cosmoswp_get_icon_postion_class
     * @param $icon_position
     * @return string
     */
    function cosmoswp_get_icon_postion_class($icon_position) {
        $icon_class = '';
        if ($icon_position) {

            if ($icon_position == 'after') {
                $icon_class = 'cwp-icon-after ';
            } else {
                $icon_class = 'cwp-icon-before ';
            }
        }
        return $icon_class;
    }
}

if (!function_exists('cosmoswp_get_icon_four_position_class')) {

    /**
     * cosmoswp_get_icon_four_position_class
     * @param $icon_position
     * @return string
     */
    function cosmoswp_get_icon_four_position_class($icon_position) {
        $icon_class = '';
        if ($icon_position) {

            if ($icon_position == 'after') {
                $icon_class = 'cwp-icon-after ';
            }
            elseif ($icon_position == 'before') {
                $icon_class = 'cwp-icon-before ';
            }
            elseif ($icon_position == 'top') {
                $icon_class = 'cwp-icon-top ';
            }
            elseif ($icon_position == 'bottom') {
                $icon_class = 'cwp-icon-bottom ';
            }
        }
        return $icon_class;
    }
}

if (!function_exists('cosmoswp_ifset')) {

    /**
     * cosmoswp_ifset
     * @param string $var
     * @return string
     */
    function cosmoswp_ifset(& $var) {
        if (isset($var)) {
            return $var;
        }
        return '';
    }
}

if (!function_exists('cosmoswp_contents_collection')) {

    /**
     * cosmoswp_contents_collection
     * @param $element_collection
     * @param $primary_elements
     * @param $secondary_elements
     * @param $thumbnail_layout
     * @param $thumbnail_size
     */
    function cosmoswp_contents_collection($element_collection, $excerpt_length, $primary_elements, $secondary_elements, $thumbnail_layout, $thumbnail_size) {
        if (!is_array($element_collection) || empty($element_collection)) {
            return;
        }
        foreach ($element_collection as $element) {
            if ('title' == $element) { ?>
                <header class="entry-header">
                    <?php
                    if (is_singular()) :
                        the_title('<h1 class="entry-title">', '</h1>');
                    else :
                        the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                    endif; ?>
                </header><!-- .entry-header -->
                <?php
            }
            elseif ('primary-meta' == $element) {
                if (is_array($primary_elements) && !empty($primary_elements)) { ?>

                    <div class="primary-meta entry-meta">
                        <?php
                        cosmoswp_meta_collection($primary_elements);
                        ?>
                    </div><!-- .entry-meta -->
                    <?php
                }
            }
            elseif ('featured-section' == $element) {
                if (has_post_thumbnail() && 'hide-image' != $thumbnail_layout) {
                    cosmoswp_post_thumbnail($thumbnail_size);
                }
            }
            elseif ('content' == $element) {
                ?>
                <div class="entry-content clearfix">
                    <?php
                    the_content();
                    ?>
                </div><!-- .entry-content -->
                <?php
            }
            elseif ('excerpt' == $element && $excerpt_length != 0) {
                ?>
                <div class="entry-content clearfix">
                    <?php
                    if ($excerpt_length) {
                        echo wp_trim_words(strip_shortcodes(get_the_excerpt()), $excerpt_length);
                    } else {
                        the_excerpt();
                    }
                    ?>
                </div><!-- .entry-content -->
                <?php
            }
            elseif ('secondary-meta' == $element) {

                if (is_array($secondary_elements) && !empty($secondary_elements)) { ?>

                    <div class="secondary-meta entry-meta">
                        <?php
                        cosmoswp_meta_collection($secondary_elements);
                        ?>
                    </div><!-- .entry-meta -->
                    <?php
                }
            }
        }
    }
}

if (!function_exists('cosmoswp_not_empty')) {

    /**
     * cosmoswp_not_empty
     * @param $var
     * @return bool
     */
    function cosmoswp_not_empty($var) {
        if (trim($var) === '') {
            return false;
        }
        return true;
    }
}

if (!function_exists('cosmoswp_cssbox_not_empty')) {

    /**
     * cosmoswp_cssbox_not_empty
     * @param $var
     * @return string
     */
    function cosmoswp_cssbox_not_empty($var) {
        if ($var == 0 || !empty($var)) {
            return $var . 'px';
        } else {
            return '';
        }
    }
}

/* callback functions of banner video */
add_filter('is_header_video_active', 'cosmoswp_custom_video_header_pages');

if (!function_exists('cosmoswp_banner_title')) {

    /**
     * cosmoswp_banner_title
     * @return string
     */
    function cosmoswp_banner_title() {
        $banner_title = '';

        if (is_home()) {
            $page_for_posts = get_option('page_for_posts');
            $banner_title   = get_the_title($page_for_posts);
        }
        elseif (is_singular()) {
            $single_title_options = cosmoswp_get_theme_options('single-banner-section-title');
            if($single_title_options =='disable' ){
                return false;
            }
            if ($single_title_options == 'custom-title') {
                $banner_title = esc_html(cosmoswp_get_theme_options('single-custom-banner-title'));
            } 
            else {
                $banner_title = get_the_title();
            }
        }
        elseif (is_archive()) {
            $banner_title = get_the_archive_title();
        }
        elseif (is_search()) {
            $banner_title = '' . __('Search Results for:', 'cosmoswp') . '<span>' . get_search_query() . '</span>';

        }
        else {
            $banner_title = get_the_title();
        }
        return $banner_title;
    }
}

if (!function_exists('cosmoswp_get_non_empty_categories')) :

    /**
     * Categories List
     *$cosmoswp_get_non_empty_categories
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return array
     *
     */
    function cosmoswp_get_non_empty_categories() {
        $categories_list = get_terms(
            array(
                'taxonomy'   => 'category',
                'hide_empty' => true,
            )
        );
        $cat_list        = array();
        if (!empty($categories_list)) {
            foreach ($categories_list as $key) {
                $cat_list[$key->term_id] = esc_html(ucwords($key->name));
            }
        } else {
            $cat_list[0] = esc_html__("No Category", 'cosmoswp');

        }
        return apply_filters('cosmoswp_get_non_empty_categories', $cat_list);
    }
endif;

/**
 *  Display video in mobile
 */
add_filter('header_video_settings', function ($args)
{

    $args['minWidth'] = 0;

    return $args;

});


if (!function_exists('cosmoswp_get_grid_class')) :

    /**
     * Categories List
     *$cosmoswp_get_non_empty_categories
     * @since cosmoswp 1.0.0
     *
     * @param null
     * @return void
     *
     */
    function cosmoswp_get_grid_class($columns) {

        if (empty($columns)) {
            return false;
        }
        if (1 == $columns) {
            $grid = 'grid-md-12';
        }
        elseif (2 == $columns) {
            $grid = 'grid-md-6';
        }
        elseif (3 == $columns) {
            $grid = 'grid-md-4';
        }
        elseif (4 == $columns) {
            $grid = 'grid-md-3';
        }
        elseif (5 == $columns) {
            $grid = 'grid-xs-2m3';
        }
        else {
            $grid = 'grid-md-2';
        }
        return $grid;
    }

endif;

if (!function_exists('cosmoswp_is_edit_page')) {
    function cosmoswp_is_edit_page() {
        //make sure we are on the backend
        if (!is_admin()) {
            return false;
        }
        global $pagenow;
        return in_array($pagenow, array('post.php', 'post-new.php'));
    }
}

if (!function_exists('cosmoswp_is_scrollbar_js')) :

    /**
     * Check if scrollbar_js needed
     *$cosmoswp_get_non_empty_categories
     * @since cosmoswp 1.1.0
     *
     * @param null
     * @return bool
     *
     */
    function cosmoswp_is_scrollbar_js() {
        $footer_display_style = cosmoswp_get_theme_options('footer-display-style');
        $is_enable = false;
        if (!empty($footer_display_style) && ('cwp-normal-footer' != $footer_display_style)){
            $is_enable = true;
        }
        return apply_filters('cosmoswp_is_scrollbar_js',$is_enable);
    }
endif;