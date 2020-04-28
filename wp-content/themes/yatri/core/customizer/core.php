<?php
/**
 * Core functions.
 *
 * @package Agency_Ecommerce
 */


if (!function_exists('yatri_get_customizer_id')) :

    function yatri_get_customizer_id($key = '')
    {
        return YATRI_THEME_SETTINGS . '[' . $key . ']';
    }
endif;


if (!function_exists('yatri_get_option')) :

    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function yatri_get_option($key)
    {

        if (empty($key)) {

            return;

        }
        if (is_page() || is_single()) {

            global $post;

            $header_template = get_post_meta($post->ID, 'yatri_header_template', true);

            $all_templates = (yatri_customizer_get_header_templates('header'));

            $all_template_keys = array_keys($all_templates);

            if (in_array($header_template, $all_template_keys)) {

                $template_values = isset($all_templates[$header_template]['template_values']) ? $all_templates[$header_template]['template_values'] : array();

                if (count($template_values) > 0) {

                    if (isset($template_values[$key])) {

                        return $template_values[$key];
                    }
                }
            }
        }
        global $yatri_global_options;

        $theme_options = isset($yatri_global_options->customizer) ? $yatri_global_options->customizer : array();

        $value = '';


        if (isset($theme_options[$key])) {

            $value = $theme_options[$key];
        }

        return $value;

    }

endif;

if (!function_exists('yatri_get_header_option')) :

    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function yatri_get_header_option($key)
    {

        return yatri_get_option($key);

    }

endif;

if (!function_exists('yatri_get_modal_option')) :

    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function yatri_get_modal_option($modal_id, $key, $device = false)
    {

        if (empty($key) || empty($modal_id)) {

            return;

        }

        $value = yatri_get_option($modal_id);

        $value_array = yatri_maybe_json_decode($value);

        $single_value = isset($value_array[$key]) ? $value_array[$key] : array();

        if ($device) {

            $single_value = isset($single_value[$device]) ? $single_value[$device] : array();
        }
        if (isset($single_value['value'])) {

            return $single_value['value'];
        }


        return $single_value;

    }

endif;
if (!function_exists('yatri_get_header_theme_options')) :
    function yatri_get_header_theme_options()
    {
        $defaults = array();

        $defaults['logo_on_header'] = 'bottom';
// Top Header Options
        $defaults['show_top_header'] = false;
        $defaults['top_header_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['top_header_design'] = '{}';
        $defaults['top_header_sections'] = yatri_get_top_header_sections();
        $defaults['top_header_social_icons'] = '';
        $defaults['top_header_social_icons'] = array(
            array(
                'icon_url' => '#',
                'open_in_new_tab' => true,
                'icon_text' => 'fab fa-facebook-f',
                'icon_title_text' => esc_html__('Facebook', 'yatri'),
            ),
            array(
                'icon_url' => '#',
                'open_in_new_tab' => true,
                'icon_text' => 'fab  fa-twitter',
                'icon_title_text' => esc_html__('Twitter', 'yatri'),
            ),
            array(
                'icon_url' => '#',
                'open_in_new_tab' => true,
                'icon_text' => 'fab  fa-google',
                'icon_title_text' => esc_html__('Google', 'yatri'),
            ),
        );
        $defaults['top_header_main_menu'] = 'top_header_menu';
        $defaults['top_header_button_style_design'] = '{}';
        $defaults['top_header_button_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['top_header_menu_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['top_header_site_branding_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['top_header_offcanvas_menu_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['top_header_office_information_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['top_header_search_form_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['top_header_social_icons_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['top_header_custom_html_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['top_header_search_form_design'] = '{}';
        $defaults['top_header_navigation_menu_design'] = '{}';
        $defaults['top_header_office_info_design'] = '{}';
        $defaults['top_header_social_icons_design'] = '{}';
        $defaults['top_header_offcanvas_menu_design'] = '{}';
        $defaults['top_header_branding_style_design'] = '{}';
        $defaults['top_header_offcanvas_open_from'] = 'left';
        $defaults['top_header_offcanvas_menu_type'] = 'sidebar';
        $defaults['top_header_offcanvas_menu_sidebar'] = 'yatri-offcanvas-menu-sidebar';
        $defaults['top_header_offcanvas_menu_nav_menu'] = 'offcanvas_menu';
        $defaults['top_header_offcanvas_menu_width'] = '325';
        $defaults['top_header_site_identity'] = 'logo-title-text';
        $defaults['top_header_branding_layout'] = 'layout-1';
        $defaults['top_header_search_button_icon'] = 'fas fa-search';
        $defaults['top_header_search_form_placeholder_text'] = esc_html__('Search', 'yatri');
        $defaults['top_header_search_form_type'] = 'default';
        $defaults['top_header_button_icon'] = '';
        $defaults['top_header_button_icon'] = '';
        $defaults['top_header_button_link'] = '';
        $defaults['top_header_button_target'] = '_blank';
        $defaults['top_header_button_label'] = esc_html__('Contact', 'yatri');
        $defaults['top_header_office_info'] = array(
            array(
                'title' => esc_html__('Office address', 'yatri'),
                'icon' => 'fas fa-home',
                'link' => ''
            ),
            array(
                'title' => esc_html__('info@domain.com', 'yatri'),
                'icon' => 'far fa-envelope',
                'link' => 'mailto://info@yourdomain.com'
            )
        );
        $defaults['top_header_custom_html_content'] = esc_html__('Your content goes here...', 'yatri');
        $defaults['top_header_custom_html_design'] = "{}";

        // Mid Header Options
        $defaults['show_mid_header'] = false;
        $defaults['mid_header_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['mid_header_design'] = '{}';
        $defaults['mid_header_sections'] = yatri_get_mid_header_sections();
        $defaults['mid_header_social_icons'] = array(
            array(
                'icon_url' => '#',
                'open_in_new_tab' => true,
                'icon_text' => 'fab fa-facebook-f',
                'icon_title_text' => esc_html__('Facebook', 'yatri'),
            ),
            array(
                'icon_url' => '#',
                'open_in_new_tab' => true,
                'icon_text' => 'fab  fa-twitter',
                'icon_title_text' => esc_html__('Twitter', 'yatri'),
            ),
            array(
                'icon_url' => '#',
                'open_in_new_tab' => true,
                'icon_text' => 'fab  fa-google',
                'icon_title_text' => esc_html__('Google', 'yatri'),
            ),
        );
        $defaults['mid_header_main_menu'] = 'mid_header_menu';
        $defaults['mid_header_button_style_design'] = '{}';
        $defaults['mid_header_button_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['mid_header_menu_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['mid_header_site_branding_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['mid_header_offcanvas_menu_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['mid_header_office_information_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['mid_header_search_form_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['mid_header_social_icons_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['mid_header_custom_html_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['mid_header_search_form_design'] = '{}';
        $defaults['mid_header_navigation_menu_design'] = '{}';
        $defaults['mid_header_office_info_design'] = '{}';
        $defaults['mid_header_social_icons_design'] = '{}';
        $defaults['mid_header_offcanvas_menu_design'] = '{}';
        $defaults['mid_header_branding_style_design'] = '{}';
        $defaults['mid_header_offcanvas_open_from'] = 'left';
        $defaults['mid_header_offcanvas_menu_type'] = 'sidebar';
        $defaults['mid_header_offcanvas_menu_sidebar'] = 'yatri-offcanvas-menu-sidebar';
        $defaults['mid_header_offcanvas_menu_nav_menu'] = 'offcanvas_menu';
        $defaults['mid_header_offcanvas_menu_width'] = '325';
        $defaults['mid_header_site_identity'] = 'logo-title-text';
        $defaults['mid_header_branding_layout'] = 'layout-1';
        $defaults['mid_header_search_button_icon'] = 'fas fa-search';
        $defaults['mid_header_search_form_placeholder_text'] = esc_html__('Search', 'yatri');
        $defaults['mid_header_search_form_type'] = 'show_search_box_only';
        $defaults['mid_header_button_icon'] = '';
        $defaults['mid_header_button_icon'] = '';
        $defaults['mid_header_button_link'] = '';
        $defaults['mid_header_button_target'] = '_blank';
        $defaults['mid_header_button_label'] = esc_html__('Contact', 'yatri');
        $defaults['mid_header_office_info'] = array(
            array(
                'title' => esc_html__('Office address', 'yatri'),
                'icon' => 'fas fa-home',
                'link' => ''
            ),
            array(
                'title' => esc_html__('info@domain.com', 'yatri'),
                'icon' => 'far fa-envelope',
                'link' => 'mailto://info@yourdomain.com'
            )
        );
        $defaults['mid_header_custom_html_content'] = esc_html__('Your content goes here...', 'yatri');
        $defaults['mid_header_custom_html_design'] = "{}";


        // Bottom Header
        $defaults['show_bottom_header'] = true;
        $defaults['bottom_header_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['bottom_header_design'] = '{}';
        $defaults['bottom_header_sections'] = yatri_get_bottom_header_sections();
        $defaults['bottom_header_social_icons'] = array(
            array(
                'icon_url' => '#',
                'open_in_new_tab' => true,
                'icon_text' => 'fab fa-facebook-f',
                'icon_title_text' => esc_html__('Facebook', 'yatri'),
            ),
            array(
                'icon_url' => '#',
                'open_in_new_tab' => true,
                'icon_text' => 'fab  fa-twitter',
                'icon_title_text' => esc_html__('Twitter', 'yatri'),
            ),
            array(
                'icon_url' => '#',
                'open_in_new_tab' => true,
                'icon_text' => 'fab  fa-google',
                'icon_title_text' => esc_html__('Google', 'yatri'),
            ),
        );
        $defaults['bottom_header_main_menu'] = 'primary';
        $defaults['bottom_header_button_style_design'] = '{}';
        $defaults['bottom_header_button_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['bottom_header_menu_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['bottom_header_site_branding_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['bottom_header_offcanvas_menu_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['bottom_header_office_information_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['bottom_header_search_form_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['bottom_header_social_icons_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['bottom_header_custom_html_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['bottom_header_search_form_design'] = '{}';
        $defaults['bottom_header_navigation_menu_design'] = '{}';
        $defaults['bottom_header_office_info_design'] = '{}';
        $defaults['bottom_header_social_icons_design'] = '{}';
        $defaults['bottom_header_offcanvas_menu_design'] = '{}';
        $defaults['bottom_header_branding_style_design'] = '{}';
        $defaults['bottom_header_offcanvas_open_from'] = 'left';
        $defaults['bottom_header_offcanvas_menu_type'] = 'sidebar';
        $defaults['bottom_header_offcanvas_menu_sidebar'] = 'yatri-offcanvas-menu-sidebar';
        $defaults['bottom_header_offcanvas_menu_nav_menu'] = 'offcanvas_menu';
        $defaults['bottom_header_offcanvas_menu_width'] = '325';
        $defaults['bottom_header_site_identity'] = 'logo-title-text';
        $defaults['bottom_header_branding_layout'] = 'layout-1';
        $defaults['bottom_header_search_button_icon'] = 'fas fa-search';
        $defaults['bottom_header_search_form_placeholder_text'] = esc_html__('Search', 'yatri');
        $defaults['bottom_header_search_form_type'] = 'default';
        $defaults['bottom_header_button_icon'] = '';
        $defaults['bottom_header_button_icon'] = '';
        $defaults['bottom_header_button_link'] = '';
        $defaults['bottom_header_button_target'] = '_blank';
        $defaults['bottom_header_button_label'] = esc_html__('Contact', 'yatri');
        $defaults['bottom_header_office_info'] = array(
            array(
                'title' => esc_html__('Office address', 'yatri'),
                'icon' => 'fas fa-home',
                'link' => ''
            ),
            array(
                'title' => esc_html__('info@domain.com', 'yatri'),
                'icon' => 'far fa-envelope',
                'link' => 'mailto://info@yourdomain.com'
            )
        );
        $defaults['bottom_header_custom_html_content'] = esc_html__('Your content goes here...', 'yatri');
        $defaults['bottom_header_custom_html_design'] = "{}";

        return $defaults;
    }
endif;
if (!function_exists('yatri_get_default_theme_options')) :

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function yatri_get_default_theme_options()
    {
        $defaults = array();

        $header_defaults = yatri_get_header_theme_options();

        $defaults = array_merge($defaults, $header_defaults);

        //primary color
        $defaults['primary_color'] = '#4285f4';
        $defaults['secondary_color'] = '#0b51c5';

        // Header templates
        $defaults['header_templates'] = '';



        // Body & Typography
        $defaults['body_and_paragraph_typography'] = '{}';
        $defaults['h1_typography'] = '{}';
        $defaults['h2_typography'] = '{}';
        $defaults['h3_typography'] = '{}';
        $defaults['h4_typography'] = '{}';
        $defaults['h5_typography'] = '{}';
        $defaults['h6_typography'] = '{}';
        $defaults['widget_title_typography'] = '{}';
        $defaults['container_width'] = '1140';
        $defaults['sidebar_width'] = '33';
        $defaults['main_layout'] = 'full_width';
        $defaults['global_sidebar'] = 'right';
        $defaults['main_layout_boxed_styling'] = '{}';
        $defaults['main_layout_full_width_styling'] = '{}';
        $defaults['yatri_button_style_design'] = '{}';
        $defaults['yatri_form_style_design'] = '{}';
        $defaults['show_breadcrumb'] = true;
        $defaults['show_breadcrumb_on_homepage'] = false;

        $defaults['breadcrumb_home_text'] = '';
        $defaults['breadcrumb_home_icon'] = 'fas fa-home';
        $defaults['breadcrumb_section_separator'] = '/';
        $defaults['breadcrumb_section_separator_spacing'] = '';
        $defaults['yatri_breadcrumb_style_design'] = "{}";


        // Start of Archive Page Options
        $defaults['blog_archive_page_title_position'] = 'inside_breadcrumb';
        $defaults['blog_archive_page_meta_content_order'] = yatri_meta_content_order();
        $defaults['blog_archive_page_layout'] = 'yatri_right_sidebar';
        $defaults['blog_archive_sidebar_width'] = '33';
        $defaults['blog_archive_design_style'] = '{}';
        $defaults['blog_archive_page_content_wrapper_design_styling'] = '{}';
        $defaults['blog_archive_page_article_design_styling'] = '{}';
        $defaults['blog_archive_page_thumbnail_size'] = 'yatri-1170-710';
        $defaults['blog_archive_page_content_layout'] = 'yatri_list_layout';
        $defaults['blog_archive_page_heading_tag'] = 'h1';
        $defaults['blog_archive_page_content_order'] = yatri_blog_archive_page_content_order();
        $defaults['blog_archive_page_meta_content_separator'] = '|';
        $defaults['blog_archive_page_meta_content_separator_width'] = '';
        $defaults['blog_archive_page_meta_style'] = 'with_icon';
        $defaults['blog_archive_page_readmore_text'] = esc_html__('Learn More', 'yatri');
        $defaults['blog_archive_page_readmore_text_icon'] = 'fas fa-long-arrow-alt-right';
        $defaults['blog_archive_page_readmore_design_styling'] = '{}';
        $defaults['blog_archive_page_excerpt_type'] = 'excerpt_metabox';
        $defaults['blog_archive_page_excerpt_length'] = 55;
        $defaults['blog_archive_page_excerpt_more_text'] = '...';
        $defaults['blog_archive_pagination_style'] = 'numeric';
        $defaults['blog_archive_pagination_design_style'] = '{}';
        // End Of Archive Page Options


        // Start of Single Post

        $defaults['single_post_title_position'] = 'inside_content';
        $defaults['single_post_meta_content_order'] = yatri_meta_content_order();
        $defaults['single_post_layout'] = 'yatri_right_sidebar';
        $defaults['single_post_heading_tag'] = 'h1';
        $defaults['single_post_content_order'] = yatri_single_post_content_order();
        $defaults['single_post_sidebar_width'] = '33';
        $defaults['single_post_design_style'] = '{}';
        $defaults['single_post_article_design_styling'] = '{}';
        // Single post related posts

        $defaults['single_post_related_posts_heading_text'] = esc_html__('Related Posts', 'yatri');

        $defaults['single_post_related_posts_taxonomy'] = 'category';
        $defaults['single_post_related_posts_count'] = 2;
        $defaults['single_post_related_posts_columns'] = 2;
        $defaults['single_post_related_posts_excerpt_type'] = 'custom';
        $defaults['single_post_related_posts_excerpt_length'] = 15;
        $defaults['single_post_related_posts_excerpt_more_text'] = '';

        $defaults['single_post_related_posts_taxonomy'] = 'category';


        // Single Page
        $defaults['page_title_position'] = 'inside_breadcrumb';
        $defaults['page_heading_tag'] = 'h1';
        $defaults['page_layout'] = 'yatri_right_sidebar';
        $defaults['page_sidebar_width'] = '33';
        $defaults['page_design_style'] = '{}';
        $defaults['page_article_design_styling'] = '{}';


        //

        // End of Single Post

        // Sidebars
        $defaults['left_sidebar_design_style'] = "{}";
        $defaults['right_sidebar_design_style'] = "{}";

        // Footer

        $defaults['show_footer_widgets'] = true;
        $defaults['footer_widgets_column'] = 4;
        $defaults['footer_widgets_section_design_style'] = "{}";
        $defaults['footer_widgets_area_design_style'] = "{}";

        $defaults['show_bottom_footer'] = true;
        $defaults['bottom_footer_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['bottom_footer_section_design_style'] = "{}";
        $defaults['bottom_footer_sections'] = yatri_get_bottom_footer_sections();
        $defaults['bottom_footer_office_info'] = array(
            array(
                'title' => esc_html__('Office address', 'yatri'),
                'icon' => 'fas fa-home',
                'link' => ''
            ),
            array(
                'title' => esc_html__('info@domain.com', 'yatri'),
                'icon' => 'far fa-envelope',
                'link' => 'mailto://info@yourdomain.com'
            )
        );
        $defaults['bottom_footer_office_info_design'] = "{}";
        $defaults['bottom_footer_office_information_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['bottom_footer_main_menu'] = 'bottom_footer_menu';
        $defaults['bottom_footer_navigation_menu_design'] = "{}";
        $defaults['bottom_footer_menu_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['bottom_footer_social_icons'] = array(
            array(
                'icon_url' => '#',
                'open_in_new_tab' => true,
                'icon_text' => 'fab fa-facebook-f',
                'icon_title_text' => esc_html__('Facebook', 'yatri'),
            ),
            array(
                'icon_url' => '#',
                'open_in_new_tab' => true,
                'icon_text' => 'fab  fa-twitter',
                'icon_title_text' => esc_html__('Twitter', 'yatri'),
            ),
            array(
                'icon_url' => '#',
                'open_in_new_tab' => true,
                'icon_text' => 'fab  fa-google',
                'icon_title_text' => esc_html__('Google', 'yatri'),
            ),
        );
        $defaults['bottom_footer_social_icons_design'] = "{}";
        $defaults['bottom_footer_social_icons_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['bottom_footer_button_icon'] = '';
        $defaults['bottom_footer_button_link'] = '';
        $defaults['bottom_footer_button_target'] = '_blank';
        $defaults['bottom_footer_button_label'] = esc_html__('Contact', 'yatri');
        $defaults['bottom_footer_button_style_design'] = '{}';
        $defaults['bottom_footer_button_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['bottom_footer_custom_html_content'] = esc_html__('Your content goes here...', 'yatri');
        $defaults['bottom_footer_custom_html_design'] = '{}';
        $defaults['bottom_footer_custom_html_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );
        $defaults['bottom_footer_copyright_content'] = sprintf(esc_html__('Copyright %1$s 2020 %2$s | Powered by %3$s Yatri WordPress Theme %4$s', 'yatri'), '&copy;', get_bloginfo('title'), '<a target="_blank" href="https://mantrabrain.com">', '</a>');
        $defaults['bottom_footer_copyright_design'] = '{}';
        $defaults['bottom_footer_copyright_visibility'] = array(
            'desktop' => true,
            'tablet' => true,
            'mobile' => true
        );

        foreach (yatri_get_other_post_types() as $pot_type => $label) {
            $defaults[$pot_type . '_layout'] = '';
        }


        // End of social optiosn

        return apply_filters('yatri_default_theme_options', $defaults);
    }

endif;

//=============================================================
// Get all options in array
//=============================================================
if (!function_exists('yatri_get_options')) :

    /**
     * Get all theme options in array.
     *
     * @since 1.0.0
     *
     * @return array Theme options.
     */
    function yatri_get_options()
    {

        $value = array();

        $value = get_theme_mods();

        return $value;

    }

endif;