<?php


if (!function_exists('yatri_breadcrumb_part')):
    /**
     * Includes the template for inner banner
     *
     * @return void
     * @since 1.0.0
     */
    function yatri_breadcrumb_part()
    {
        $enable_breadcrumb = (boolean)yatri_get_header_option('show_breadcrumb');

        if (is_singular()) {
            global $post;
            $id = isset($post->ID) ? $post->ID : 0;

            if ($id > 0) {
                $breadcrumb_option = get_post_meta($id, 'yatri_page_breadcrumb_option', true);
                
                switch ($breadcrumb_option) {
                    case "enable":
                        $enable_breadcrumb = true;
                        break;
                    case "disable":
                        $enable_breadcrumb = false;
                        break;
                }
            }

        }

        if (!$enable_breadcrumb) {
            return;
        }
        if (is_front_page() || is_home()) {

            $enable_one_home = (boolean)yatri_get_header_option('show_breadcrumb_on_homepage');
            if (!$enable_one_home) {
                return;
            }
        }


        get_template_part('template-parts/breadcrumb/breadcrumb');
    }
endif;


if (!function_exists('yatri_get_fa_icon_for_post_format')):
    /**
     * Gives a css class for post format icon
     *
     * @return string
     * @since 1.0.0
     */
    function yatri_get_fa_icon_for_post_format()
    {
        $icons = array(
            'standard' => 'fa-thumb-tack',
            'sticky' => 'fa-thumb-tack',
            'aside' => 'fa-documents-alt',
            'image' => 'fa-image',
            'video' => 'fa-arrow-triangle-right-alt2',
            'quote' => 'fa-quotations-alt2',
            'link' => 'fa-link-alt',
            'gallery' => 'fa-images',
            'status' => 'fa-comment-alt',
            'audio' => 'fa-volume-high-alt',
            'chat' => 'fa-chat-alt',
        );

        $format = get_post_format();
        if (empty($format)) {
            $format = 'standard';
        }

        return apply_filters('yatri_post_format_icon', $icons[$format]);
    }
endif;


if (!function_exists('yatri_is_search_page')):
    /**
     * Conditional function for search page / jet pack supported
     * @since 1.0.0
     * @return Bool
     */

    function yatri_is_search_page()
    {

        if ((is_search() || (isset($_POST['action']) && $_POST['action'] == 'infinite_scroll' && isset($_POST['query_args']['s'])))) {
            return true;
        }

        return false;
    }
endif;

/**
 * Helper functions related to image lives here
 * @since 1.0.0
 */
if (!function_exists('yatri_get_image_sizes')) :
    /**
     * Get size information for all currently-registered image sizes.
     *
     * @since 1.0.0
     * @global $_wp_additional_image_sizes
     * @uses   get_intermediate_image_sizes()
     * @return array $sizes Data for all currently-registered image sizes.
     */
    function yatri_get_image_sizes()
    {
        global $_wp_additional_image_sizes;

        $sizes = array();

        foreach (get_intermediate_image_sizes() as $_size) {
            if (in_array($_size, array('thumbnail', 'medium', 'medium_large', 'large'))) {
                $sizes[$_size]['width'] = get_option("{$_size}_size_w");
                $sizes[$_size]['height'] = get_option("{$_size}_size_h");
                $sizes[$_size]['crop'] = (bool)get_option("{$_size}_crop");
            } elseif (isset($_wp_additional_image_sizes[$_size])) {
                $sizes[$_size] = array(
                    'width' => $_wp_additional_image_sizes[$_size]['width'],
                    'height' => $_wp_additional_image_sizes[$_size]['height'],
                    'crop' => $_wp_additional_image_sizes[$_size]['crop'],
                );
            }
        }

        return $sizes;
    }
endif;

if (!function_exists('yatri_get_image_size')) :
    /**
     * Get size information for a specific image size.
     *
     * @since 1.0.0
     * @uses   yatri_get_image_sizes()
     * @param  string $size The image size for which to retrieve data.
     * @return bool|array $size Size data about an image size or false if the size doesn't exist.
     */
    function yatri_get_image_size($size)
    {
        $sizes = yatri_get_image_sizes();

        if (isset($sizes[$size])) {
            return $sizes[$size];
        }

        return false;
    }
endif;

if (!function_exists('yatri_get_image_width')) :
    /**
     * Get the width of a specific image size.
     *
     * @since 1.0.0
     * @uses   yatri_get_image_size()
     * @param  string $size The image size for which to retrieve data.
     * @return bool|string $size Width of an image size or false if the size doesn't exist.
     */
    function yatri_get_image_width($size)
    {
        if (!$size = yatri_get_image_size($size)) {
            return false;
        }

        if (isset($size['width'])) {
            return $size['width'];
        }

        return false;
    }
endif;

if (!function_exists('yatri_get_image_height')) :
    /**
     * Get the height of a specific image size.
     *
     * @since 1.0.0
     * @uses   yatri_get_image_size()
     * @param  string $size The image size for which to retrieve data.
     * @return bool|string $size Height of an image size or false if the size doesn't exist.
     */
    function yatri_get_image_height($size)
    {
        if (!$size = yatri_get_image_size($size)) {
            return false;
        }

        if (isset($size['height'])) {
            return $size['height'];
        }

        return false;
    }
endif;


if (!function_exists('yatri_get_the_category')):
    /**
     * Returns categories after sorting by term id descending
     *
     * @since 1.0.0
     * @return array
     */
    function yatri_get_the_category($id = false)
    {
        if (!$id) {
            $id = get_the_id();
        }

        $cat = get_the_category($id);

        usort($cat, 'yatri_sort_category');


        return $cat;
    }

endif;

if (!function_exists('yatri_get_navigation_menu')):
    /**
     * Returns wp nav
     *
     * @since 1.0.0
     * @param String $location
     * @return String
     */
    function yatri_get_navigation_menu($arg_param = array(), $echo = true)
    {
        $menu = null;

        $default_args = array(
            'theme_location' => 'primary',
            'fallback_cb' => 'yatri_fallback_navigation',
            'echo' => $echo,
            'depth' => 0,
            'container' => false
        );
        $args = wp_parse_args($arg_param, $default_args);

        $location = isset($args['theme_location']) ? sanitize_text_field($args['theme_location']) : '';

        $menu = '' != $location ? wp_nav_menu(apply_filters('yatri_' . $location . '_menu', $args)) : '';


        if (!$echo) {
            return $menu;
        }
    }
endif;

if (!function_exists('yatri_sort_category')):
    /**
     *
     * @since 1.0.0
     */
    function yatri_sort_category($a, $b)
    {
        return $a->term_id < $b->term_id;
    }
endif;

if (!function_exists('yatri_maybe_json_encode')):

    function yatri_maybe_json_encode($maybe_array_object)
    {
        $encoded_value = '{}';

        try {
            if (is_array($maybe_array_object)) {

                $encoded_value = json_encode($maybe_array_object);

            } else if (is_object($maybe_array_object)) {

                $encoded_value = json_encode($maybe_array_object);

            } else if (is_string($maybe_array_object)) {

                json_decode($maybe_array_object);

                $encoded_value = (json_last_error() == JSON_ERROR_NONE) ? $maybe_array_object : $encoded_value;

            }

        } catch (Exception $e) {

            $encoded_value = '{}';
        }
        return $encoded_value;
    }
endif;

if (!function_exists('yatri_maybe_json_decode')):

    function yatri_maybe_json_decode($maybe_json_string)
    {
        $decoded_value = array();

        try {

            if (is_string($maybe_json_string)) {

                $decoded = json_decode($maybe_json_string, true);

                $decoded_value = (json_last_error() == JSON_ERROR_NONE) ? $decoded : $decoded_value;

            } else if (is_array($maybe_json_string)) {

                $decoded_value = $maybe_json_string;

            } else if (is_object($maybe_json_string)) {

                $decoded_value = $maybe_json_string;
            }

        } catch (Exception $e) {

            $decoded_value = array();
        }
        return $decoded_value;
    }
endif;


function yatri_get_footer_widget($sidebar_id)
{

    if (is_active_sidebar($sidebar_id)) {
        dynamic_sidebar($sidebar_id);
    } elseif (current_user_can('edit_theme_options')) {

        global $wp_registered_sidebars;
        $sidebar_name = '';
        if (isset($wp_registered_sidebars[$sidebar_id])) {
            $sidebar_name = $wp_registered_sidebars[$sidebar_id]['name'];
        }
        ?>
        <div class="widget yatri-no-widget-row">
            <h2 class='widget-title'>
                <a style="color:#fff;"
                   href='<?php echo esc_url(admin_url('widgets.php')); ?>'><?php echo esc_html($sidebar_name); ?>
                </a>
            </h2>

            <p class='no-widget-text'>
                <a href='<?php echo esc_url(admin_url('widgets.php')); ?>'>
                    <?php esc_html_e('Click here to assign a widget for this area.', 'yatri'); ?>
                </a>
            </p>
        </div>
        <?php
    }
}