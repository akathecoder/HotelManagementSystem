<?php
/**
 * Dynamic Options hook.
 *
 * This file contains option values from customizer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agency_Ecommerce
 */

function yatri_overlay_css($selector, $css, $is_hover = true)
{
    $opacity = $is_hover ? 0 : 1;
    $css_content = '
    ' . $css . ';
    content: "";
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    opacity: ' . $opacity . ';
    z-index: 1;
    border-radius:inherit;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
    -webkit-transition: opacity 0.3s, transform 0.3s;
    -moz-transition: opacity 0.3s, transform 0.3s;
    -o-transition: opacity 0.3s, transform 0.3s;
    -webkit-transition: opacity 0.3s, -webkit-transform 0.3s;
    transition: opacity 0.3s, -webkit-transform 0.3s;
    -o-transition: opacity 0.3s, -o-transform 0.3s;
    -moz-transition: opacity 0.3s, transform 0.3s, -moz-transform 0.3s;
    transition: opacity 0.3s, transform 0.3s;
    transition: opacity 0.3s, transform 0.3s, -webkit-transform 0.3s, -moz-transform 0.3s, -o-transform 0.3s;';

    $selector_array = explode(',', $selector);

    $before_selector = implode(':before, ', $selector_array) . ':before';
    $hover_selector = implode(':hover:before, ', $selector_array) . ':hover:before';

    $all_parsed_css =
        ($selector . '{position:relative}') .
        ($before_selector . '{' . $css_content . '}');
    if ($is_hover) {
        $all_parsed_css .= ($hover_selector . '{opacity:1}');
    }
    return $all_parsed_css;
}

if (!function_exists('yatri_get_visibility_css')) {

    function yatri_get_visibility_css($selector, $option_id)
    {
        $css = '';

        $media_query = Mantrabrain_Theme_Helper::media_query();

        $options = yatri_get_option($option_id);

        $is_all = 0;

        foreach ($media_query as $device => $query) {

            if (isset($options[$device]) && $options[$device] != true) {

                $css .= str_replace('{{query}}', $selector . '{display:none;}', $media_query[$device]);

                $is_all++;
            }

        }

        if ($is_all == count($options)) {

            $css = $selector . '{display:none;}';
        }
        return $css;

    }
}
if (!function_exists('yatri_get_modal_dynamic_css')) :

    function yatri_get_modal_dynamic_css()
    {

        $media_css = array(
            'all' => '',
            'desktop' => '',
            'tablet' => '',
            'mobile' => ''
        );


        $media_query = Mantrabrain_Theme_Helper::media_query();

        $all_fields_with_index = yatri_customizer_modal_all_fields('', true);


        foreach ($all_fields_with_index as $field_index => $fields) {

            foreach ($fields as $field) {

                $field_type = isset($field['type']) ? $field['type'] : '';

                $name = isset($field['name']) ? $field['name'] : '';

                $selector = isset($field['selector']) ? $field['selector'] : '';

                $css_property = isset($field['css_property']) ? $field['css_property'] : '';

                $devices = isset($field['devices']) ? $field['devices'] : array();

                $additional_css = isset($field['additional_css']) ? $field['additional_css'] : '';

                if (count($devices) > 0) {

                    foreach ($devices as $device) {

                        $devicewise_additional_css = (is_array($additional_css) && isset($additional_css[$device])) ? $additional_css[$device] : '';

                        $value = yatri_get_modal_option($field_index, $name, $device);

                        $devicewise_css_property = yatri_get_processed_css($field_type, $value, $css_property);

                        if (!empty($devicewise_css_property) && !empty($selector)) {

                            switch ($field_type) {
                                case "overlay":
                                    $onhover = isset($field['onhover']) ? (boolean)$field['onhover'] : false;
                                    $media_css[$device] .= yatri_overlay_css($selector, $devicewise_css_property, $onhover);
                                    break;
                                default:
                                    $media_css[$device] .= ($selector . '{' . $devicewise_css_property . '}');
                                    break;
                            }

                            $media_css[$device] .= $devicewise_additional_css;

                        }

                    }
                } else {
                    $value = yatri_get_modal_option($field_index, $name, false);

                    $all_css_for_all_device = yatri_get_processed_css($field_type, $value, $css_property);

                    $additional_css = !is_array($additional_css) ? $additional_css : '';


                    if (!empty($all_css_for_all_device) && !empty($selector)) {


                        switch ($field_type) {
                            case "overlay":
                                $onhover = isset($field['onhover']) ? (boolean)$field['onhover'] : false;
                                $media_css['all'] .= yatri_overlay_css($selector, $all_css_for_all_device, $onhover);
                                break;
                            default:
                                $media_css['all'] .= ($selector . '{' . $all_css_for_all_device . '}');
                                break;
                        }
                        $media_css['all'] .= $additional_css;

                    }
                }


            }
        }


        $css = '';

        foreach ($media_query as $media_device => $query) {

            $device_css = isset($media_css[$media_device]) ? $media_css[$media_device] : '';

            $css .= str_replace('{{query}}', $device_css, $query) . ' ';

        }
        return $css;
    }

endif;

function yatri_get_processed_css($field_type, $value, $property)
{
    $all_css_styling = '';

    switch ($field_type) {

        case "margin":

        case "padding":

            $css_property = '';

            foreach ($value as $value_key => $value_content) {

                $single_value = isset($value_content['value']) ? $value_content['value'] : null;

                $single_unit_value = isset($value_content['unit']) ? $value_content['unit'] : 'px';

                if (!is_null($single_value) && '' !== $single_value) {

                    $css_property .= esc_attr($field_type) . '-' . esc_attr($value_key) . ':' . esc_attr($single_value) . esc_attr($single_unit_value) . ';';
                }
            }
            $all_css_styling .= $css_property;
            break;
        case "range":
        case "line-height":

            $css_property = '';

            $is_empty_value = isset($value['value']) && $value['value'] == '' ? true : false;

            if (!($is_empty_value) && !empty($property)) {

                foreach ($value as $value_key => $value_content) {

                    $css_property = empty($css_property) ? $property : $css_property;

                    $css_property = str_replace('{{' . $value_key . '}}', esc_attr($value_content), $css_property);


                }
            }
            $all_css_styling .= $css_property;

            break;
        case "color":
        case "overlay":
        case "alignment":
        case "font":
        case "font_weight":
        case "select":

            $css_property = '';

            $is_empty_value = is_array($value) || (is_string($value) && $value == '') ? true : false;

            if (!($is_empty_value) && !empty($property)) {

                $css_property = empty($css_property) ? $property : $css_property;

                $css_property = str_replace('{{value}}', esc_attr($value), $css_property);
            }
            $all_css_styling .= $css_property;

            break;
        case "border":
            $css_property = '';
            if (!empty($value['style'])) {
                $border_field_val['top'] = !empty($value['border_top']) ? ($value['border_top']) . 'px' : 0;
                $border_field_val['right'] = !empty($value['border_right']) ? ($value['border_right']) . 'px' : 0;
                $border_field_val['bottom'] = !empty($value['border_bottom']) ? ($value['border_bottom']) . 'px' : 0;
                $border_field_val['left'] = !empty($value['border_left']) ? ($value['border_left']) . 'px' : 0;
                $border_keys = array_keys($border_field_val);


                if ($value['style'] == 'none') {
                    $css_property .= 'border: none;';
                } else {
                    foreach ($border_keys as $border_key) {
                        if (!empty($border_field_val[$border_key])) {
                            $border_width_property = 'border-' . ($border_key) . '-width';
                            $border_style_property = 'border-' . ($border_key) . '-style';
                            $css_property .= esc_attr($border_width_property) . ':' . esc_attr($border_field_val[$border_key]) . '; ';
                            $css_property .= esc_attr($border_style_property) . ':' . esc_attr($value['style']) . '; ';
                        }
                    }
                    if (!empty($value['border_color'])) {
                        $css_property .= 'border-color:' . esc_attr($value['border_color']) . '; ';
                    }
                }

            }
            $border_radius_val['border_top_left_radius'] = !empty($value['border_radius_top']) ? ($value['border_radius_top']) . 'px' : '';
            $border_radius_val['border_top_right_radius'] = !empty($value['border_radius_right']) ? ($value['border_radius_right']) . 'px' : '';
            $border_radius_val['border-bottom-right-radius'] = !empty($value['border_radius_bottom']) ? ($value['border_radius_bottom']) . 'px' : '';
            $border_radius_val['border-bottom-left-radius'] = !empty($value['border_radius_left']) ? ($value['border_radius_left']) . 'px' : '';

            $border_radius_keys = array_keys($border_radius_val);

            foreach ($border_radius_keys as $border_radius_key) {
                if (!empty($border_radius_val[$border_radius_key])) {
                    $border_radius_property = str_replace('_', '-', $border_radius_key);
                    $css_property .= esc_attr($border_radius_property) . ':' . esc_attr($border_radius_val[$border_radius_key]) . '; ';
                }
            }

            $box_shadow_['box_shadow_color'] = !empty($value['box_shadow_color']) ? ($value['box_shadow_color']) : '';
            $box_shadow_['box_shadow_x'] = !empty($value['box_shadow_x']) ? ($value['box_shadow_x']) . 'px' : 0;
            $box_shadow_['box_shadow_y'] = !empty($value['box_shadow_y']) ? ($value['box_shadow_y']) . 'px' : 0;
            $box_shadow_['box_shadow_blur'] = !empty($value['box_shadow_blur']) ? ($value['box_shadow_blur']) . 'px' : 0;
            $box_shadow_['box_shadow_spread'] = !empty($value['box_shadow_spread']) ? ($value['box_shadow_spread']) . 'px' : 0;
            $box_shadow_['box_shadow_inset'] = !empty($value['box_shadow_inset']) ? (boolean)($value['box_shadow_inset']) : 0;
            $box_shadow = '';
            if (!empty($box_shadow_['box_shadow_color'])) {
                $inset = $box_shadow_['box_shadow_inset'] ? 'inset ' : '';
                $box_shadow = 'box-shadow:' . esc_attr($inset) . '' . esc_attr($box_shadow_['box_shadow_x']) . ' ' . esc_attr($box_shadow_['box_shadow_y']) . ' ' . esc_attr($box_shadow_['box_shadow_blur']) . ' ' . esc_attr($box_shadow_['box_shadow_spread']) . ' ' . esc_attr($box_shadow_['box_shadow_color']) . ';';

            }
            $css_property .= $box_shadow;


            $all_css_styling .= $css_property;

            break;
        case "image":
            if (!empty($value['attachment_url'])) {
                $all_css_styling .= 'background-image:url("' . esc_attr($value['attachment_url']) . '"); ';
                if (!empty($value['image_size'])) {
                    $all_css_styling .= 'background-size: ' . esc_attr($value['image_size']) . '; ';
                }
                if (!empty($value['image_repeat'])) {
                    $all_css_styling .= 'background-repeat: ' . esc_attr($value['image_repeat']) . '; ';
                }
                if (!empty($value['image_position'])) {
                    $all_css_styling .= 'background-position: ' . esc_attr($value['image_position']) . '; ';
                }
                if (!empty($value['parallax_image'])) {
                    $all_css_styling .= 'background-attachment: ' . esc_attr($value['parallax_image']) . '; ';
                }
            }
            break;

    }
    return $all_css_styling;

}

if (!function_exists('yatri_get_other_dynamic_css')) {

    function yatri_get_other_dynamic_css()
    {

        $dynamic_css = '';

        // end of bottom header
        $archive_meta_separator_width = absint(yatri_get_option('blog_archive_page_meta_content_separator_width'));

        $blog_archive_page_meta_style = yatri_get_option('blog_archive_page_meta_style');

        if ($archive_meta_separator_width > 0) {
            $dynamic_css .= 'body.yatri-blog-archive-page article.post .post-content .meta .sep{
            margin-left: calc( ' . $archive_meta_separator_width . 'px / 2 );margin-right: calc( ' . $archive_meta_separator_width . 'px / 2 );
            } ';
        }

        if ($blog_archive_page_meta_style !== 'with_icon') {
            $dynamic_css .=
                'body.yatri-blog-archive-page article.post .post-content .meta .yatri-meta-item span:before,
                 body.yatri-blog-archive-page article.post .post-content .meta .yatri-meta-item span a:before{
                    content:"";
            } ';
        }

        $container_width = absint(yatri_get_option('container_width'));

        $main_layout = yatri_get_option('main_layout');

        if ($container_width > 0) {

            if ($main_layout === 'boxed' || ($main_layout !== 'boxed' && $container_width !== 1140)) {
                $dynamic_css .=
                    '@media (min-width: 768px) {
                    body.yatri-global-layout-boxed .site{width:' . $container_width . 'px; max-width:100%}
                    body.yatri-global-layout-boxed .site .yat-container{width:' . $container_width . 'px; max-width:100%}
                    body.yatri-global-layout-full_width .yat-container{width:' . $container_width . 'px; max-width:100%}
                }';
            }
        }


        // Top Header Grid Css
        $top_header_grid_css = '';

        $top_header_sections = yatri_get_top_header_sections(true);


        $top_header_grid_total_width = 0;

        foreach ($top_header_sections as $top_header_section_index => $top_header_section) {

            $top_header_width = isset($top_header_section['width']) ? (float)$top_header_section['width'] : '';

            if ('' === $top_header_width) {

                break;
            }
            $top_header_grid_total_width += $top_header_width;

            if ($top_header_width != 0) {
                $top_header_grid_css .= '.top-header .yatri-section-container.yatri-grid-' . ($top_header_section_index + 1) . '{
                -ms-flex: 0 0 ' . esc_attr($top_header_width) . '%;
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 ' . esc_attr($top_header_width) . '%;
                -moz-box-flex: 0;
                flex: 0 0 ' . esc_attr($top_header_width) . '%;
                max-width: ' . esc_attr($top_header_width) . '%;}';
            }

        }

        if ($top_header_grid_total_width == 100) {

            $dynamic_css .= '@media (min-width: 1025px) {' . $top_header_grid_css . '}';
        }
        // Top header offcanvas width
        $top_header_offcanvas_menu_width = absint(yatri_get_option('top_header_offcanvas_menu_width'));

        if ($top_header_offcanvas_menu_width > 0 && $top_header_offcanvas_menu_width != 325) {

            $dynamic_css .= '.top-header_offcanvas_menu.yatri-offcanvas-menu-content{width:' . $top_header_offcanvas_menu_width . 'px;}';
        }

        // Mid Header Grid Css
        $mid_header_grid_css = '';

        $mid_header_sections = yatri_get_mid_header_sections(true);

        $mid_header_grid_total_width = 0;

        foreach ($mid_header_sections as $mid_header_section_index => $mid_header_section) {

            $mid_header_width = isset($mid_header_section['width']) ? (float)$mid_header_section['width'] : '';

            if ('' === $mid_header_width) {

                break;
            }
            $mid_header_grid_total_width += $mid_header_width;

            if (0 != $mid_header_width) {
                $mid_header_grid_css .= '.yatri-mid-header .yatri-section-container.yatri-grid-' . ($mid_header_section_index + 1) . '{
                -ms-flex: 0 0 ' . esc_attr($mid_header_width) . '%;
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 ' . esc_attr($mid_header_width) . '%;
                -moz-box-flex: 0;
                flex: 0 0 ' . esc_attr($mid_header_width) . '%;
                max-width: ' . esc_attr($mid_header_width) . '%;}';
            }

        }

        if ($mid_header_grid_total_width == 100) {

            $dynamic_css .= '@media (min-width: 1025px) {' . $mid_header_grid_css . '}';
        }
        // Mid header offcanvas width
        $mid_header_offcanvas_menu_width = absint(yatri_get_option('mid_header_offcanvas_menu_width'));

        if ($mid_header_offcanvas_menu_width > 0 && $mid_header_offcanvas_menu_width != 325) {

            $dynamic_css .= '.yatri-mid-header_offcanvas_menu.yatri-offcanvas-menu-content{width:' . $mid_header_offcanvas_menu_width . 'px;}';
        }
        // Bottom Header

        $bottom_header_grid_css = '';

        $bottom_header_sections = yatri_get_bottom_header_sections(true);

        $bottom_header_grid_total_width = 0;

        foreach ($bottom_header_sections as $bottom_header_section_index => $bottom_header_section) {

            $bottom_header_width = isset($bottom_header_section['width']) ? (float)$bottom_header_section['width'] : '';

            if ('' === $bottom_header_width) {

                break;
            }
            $bottom_header_grid_total_width += $bottom_header_width;

            if (0 != $bottom_header_width) {

                $bottom_header_grid_css .= '.bottom-header .yatri-section-container.yatri-grid-' . ($bottom_header_section_index + 1) . '{
            -ms-flex: 0 0 ' . esc_attr($bottom_header_width) . '%;
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 ' . esc_attr($bottom_header_width) . '%;
            -moz-box-flex: 0;
            flex: 0 0 ' . esc_attr($bottom_header_width) . '%;
            max-width: ' . esc_attr($bottom_header_width) . '%;}';
            }

        }

        if ($bottom_header_grid_total_width == 100) {

            $dynamic_css .= '@media (min-width: 1025px) {' . $bottom_header_grid_css . '}';
        }

        // Bottom header offcanvas width
        $bottom_header_offcanvas_menu_width = absint(yatri_get_option('bottom_header_offcanvas_menu_width'));

        if ($bottom_header_offcanvas_menu_width > 0 && $bottom_header_offcanvas_menu_width != 325) {

            $dynamic_css .= '.bottom-header_offcanvas_menu.yatri-offcanvas-menu-content{width:' . $bottom_header_offcanvas_menu_width . 'px;}';
        }

        // Bottom footer grid css
        $bottom_footer_grid_css = '';

        $bottom_footer_sections = yatri_get_bottom_footer_sections(true);

        $bottom_footer_grid_total_width = 0;

        foreach ($bottom_footer_sections as $bottom_footer_section_index => $bottom_footer_section) {

            $bottom_footer_width = isset($bottom_footer_section['width']) ? (float)$bottom_footer_section['width'] : '';

            if ('' === $bottom_footer_width) {

                break;
            }
            $bottom_footer_grid_total_width += $bottom_footer_width;

            if ($bottom_footer_width != 0) {

                $bottom_footer_grid_css .= '.bottom-footer .yatri-section-container.yatri-grid-' . ($bottom_footer_section_index + 1) . '{
                -ms-flex: 0 0 ' . esc_attr($bottom_footer_width) . '%;
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 ' . esc_attr($bottom_footer_width) . '%;
                -moz-box-flex: 0;
                flex: 0 0 ' . esc_attr($bottom_footer_width) . '%;
                max-width: ' . esc_attr($bottom_footer_width) . '%;}';
            }

        }

        if ($bottom_footer_grid_total_width == 100) {

            $dynamic_css .= '@media (min-width: 1025px) {' . $bottom_footer_grid_css . '}';
        }
        // end of bottom footer grid css
        // BREADCRUMB //

        $breadcrumb_home_icon = yatri_get_option('breadcrumb_home_icon');

        $breadcrumb_home_icon = trim($breadcrumb_home_icon);

        $font_awesome_list = Mantrabrain_Theme_Helper::font_awesome_icon_list();

        $breadcrumb_home_icon = isset($font_awesome_list[$breadcrumb_home_icon]) ? $font_awesome_list[$breadcrumb_home_icon] : '';

        $breadcrumb_home_icon = empty($breadcrumb_home_icon) ? '""' : "\\" . $breadcrumb_home_icon;

        $dynamic_css .= ' .breadcrumb-wrap .breadcrumbs .trail-items a[rel="home"] span:after,
                body.home .breadcrumb-wrap .breadcrumbs .trail-items li:last-child > span:after
                {content:"' . ($breadcrumb_home_icon) . '";} ';


        $breadcrumb_section_separator = yatri_get_option('breadcrumb_section_separator');

        if (!empty($breadcrumb_section_separator)) {

            $dynamic_css .= ' .breadcrumb-wrap .breadcrumbs .trail-items a:after{content:"' . ($breadcrumb_section_separator) . '";} ';
        }
        $breadcrumb_section_separator_spacing = (int)yatri_get_option('breadcrumb_section_separator_spacing');

        if (!empty($breadcrumb_section_separator_spacing) && $breadcrumb_section_separator_spacing > 15) {

            $dynamic_css .= ' .breadcrumb-wrap .breadcrumbs .trail-items a:after{width:' . ($breadcrumb_section_separator_spacing) . 'px;} ';
        }
        // Blog/Archive Page


        $yatri_sidebar_width = 33;

        $yatri_sidebar_layout = yatri_page_layout();

        $dynamic_page_selector = '';

        if (yatri_is_archive_page()) {

            $yatri_sidebar_width = absint(yatri_get_option('blog_archive_sidebar_width'));

            $dynamic_page_selector = 'yatri-blog-archive-page';


        } else if (is_singular() && !is_page()) {

            $yatri_sidebar_width = absint(yatri_get_option('single_post_sidebar_width'));

            $dynamic_page_selector = 'yatri-single-post';
        } else if (is_page()) {

            $yatri_sidebar_width = absint(yatri_get_option('page_sidebar_width'));

            $dynamic_page_selector = 'yatri-single-page';

        }

        if ($yatri_sidebar_width > 0 && $yatri_sidebar_width !== 33 && $yatri_sidebar_width <= 50) {


            $yatri_content_wrapper_width = 100 - $yatri_sidebar_width;

            if ($yatri_sidebar_layout == 'yatri_both_sidebar') {

                $yatri_content_wrapper_width = $yatri_sidebar_width > 35 ? 100 : 100 - ($yatri_sidebar_width * 2);

                $yatri_sidebar_width = $yatri_sidebar_width > 35 ? 100 : $yatri_sidebar_width;
            }

            if ('yatri_both_sidebar' == $yatri_sidebar_layout || 'yatri_left_sidebar' == $yatri_sidebar_layout || 'yatri_right_sidebar' == $yatri_sidebar_layout) {

                $dynamic_css .=
                    '@media (min-width: 768px) {body.' . $dynamic_page_selector . ' .yatri-sidebar{
                    -ms-flex: 0 0 ' . $yatri_sidebar_width . '%;
                    -webkit-box-flex: 0;
                    -webkit-flex: 0 0 ' . $yatri_sidebar_width . '%;
                    -moz-box-flex: 0;
                    flex: 0 0 ' . $yatri_sidebar_width . '%;
                    max-width: ' . $yatri_sidebar_width . '%;
                    
                    }
                }';

                $dynamic_css .=
                    '@media (min-width: 768px) {body.' . $dynamic_page_selector . ' .yatri-main-wrap{
                    -ms-flex: 0 0 ' . $yatri_content_wrapper_width . '%;
                    -webkit-box-flex: 0;
                    -webkit-flex: 0 0 ' . $yatri_content_wrapper_width . '%;
                    -moz-box-flex: 0;
                    flex: 0 0 ' . $yatri_content_wrapper_width . '%;
                    max-width: ' . $yatri_content_wrapper_width . '%;
                    
                    }
                }';
            }
        }

        // Bottom Footer
        //END OF BREADCRUMB //

        return $dynamic_css;
    }


}
if (!function_exists('yatri_get_color_css')) {

    function yatri_get_color_css()
    {
        $css = '';

        $primary_color = esc_attr(yatri_get_option('primary_color'));

        $secondary_color = esc_attr(yatri_get_option('secondary_color'));


        if ($primary_color != '#4285f4') {

            $css .= '
            .wrap-detail-page form input[type="submit"],
            .wrap-detail-page .wpcf7 input[type="submit"],
            .wrap-detail-page .yatri-contact-form-area .form-group input.form-control[type="submit"],
            .widget.widget_calendar tbody a,
             figcaption,
         .widget.widget_calendar tbody a,
        .wrap-detail-page form input[type="submit"] ,
        .wrap-detail-page .wpcf7 input[type="submit"] ,
        .header-bottom-right .cart-icon a .count,
         .comments-area .comment-list .reply a,
         .wrap-detail-page .yatri-contact-form-area .form-group input.form-control[type="submit"],
         .searchform .search-button,
         article.hentry.sticky .post-thumb:before,
         article.hentry.sticky .post-format-outer > span a,
         .widget.widget_mc4wp_form_widget input[type="submit"] ,
         .mc4wp-form input[type="submit"]:hover, .mc4wp-form input[type="submit"]:focus, .mc4wp-form input[type="submit"]:active,
         input[type="button"],
        input[type="reset"],
        input[type="submit"],
        .default-button,
        .button-primary,
        .page-numbers.current,
        .page-numbers:hover.current, .page-numbers:focus.current, .page-numbers:active.current
            {
                background-color:' . $primary_color . ';
            }
       
        ::selection,
        .single-post-wrap .post-format-outer,
        .yatri-button
        {
                        background:' . $primary_color . ';
                    }
            ';

            $css .= '
            .blockquote, .wp-block-quote,
            pre,
            .wrap-detail-page .wpcf7 input[type="submit"] ,
.wrap-detail-page .yatri-contact-form-area .form-group input.form-control[type="submit"],
#go-top span:hover, #go-top span:focus, #go-top span:active,
.mc4wp-form input[type="submit"]:hover, .mc4wp-form input[type="submit"]:focus, .mc4wp-form input[type="submit"]:active,
 .yatri-section-search-form .search-form-main input,
 .button-primary,
 .button-outline,
 .page-numbers.current,
 .page-numbers:hover.current, .page-numbers:focus.current, .page-numbers:active.current 
 
            {
                border-color:' . $primary_color . ';
            }
            .yatri-section-search-form.form-type-default .search-form-main {

                border-bottom-color:' . $primary_color . ';

            }
             .yatri-section-search-form.form-type-default .search-form-main {

                border-top-color:' . $primary_color . ';

            }
             
             .yatri-section-search-form.form-type-default .search-form-main:before{
                border-bottom-color:' . $primary_color . ';

            }
            
            ';
            $css .= '
             blockquote:before,
            input[type="text"]:focus,
            input[type="email"]:focus,
            input[type="url"]:focus,
            input[type="password"]:focus,
            input[type="search"]:focus,
            input[type="number"]:focus,
            input[type="tel"]:focus,
            input[type="range"]:focus,
            input[type="date"]:focus,
            input[type="month"]:focus,
            input[type="week"]:focus,
            input[type="time"]:focus,
            input[type="datetime"]:focus,
            input[type="datetime-local"]:focus,
            input[type="color"]:focus,
            textarea:focus,
            .wpcf7-form-control:focus,
            .form-control:focus,
            .mc4wp-form input:focus,
            a,
            .cat-links > a:before,
            .tag-links > a:before,
            .comment-link > a:before,
            .posted-on > a:before,
            .widget li,
            .widget li a,
            .widget.widget_calendar tfoot a,
            .widget.widget_rss li a,
            .widget.widget_tag_cloud .tagcloud a,
            .header-bottom-right .cart-icon a,
            .header-bottom-right .header-search-wrap .search-icon,
            .footer-menu ul li a,
            .socialgroup a,
            .yatra-single-meta-content .byline,
            a.button-text,
            .button-text,
            .learn-more-btn span ,
            .yatri-category-list,
            .yatri-tag-list
            {
                color:' . $primary_color . ';
            }
            
            a:focus,
            button:focus,
            input[type="text"]:focus,
            input[type="email"]:focus,
            input[type="url"]:focus,
            input[type="password"]:focus,
            input[type="search"]:focus,
            textarea:focus,
            input[type="button"]:focus,
            input[type="reset"]:focus,
            input[type="submit"]:focus,
            .slick-slider .slick-slide:focus,
            .search-box .product-search-wrapper form select:focus  {
            
            outline-color: ' . $primary_color . '!important;
              -webkit-focus-ring-color: ' . $primary_color . '!important;
                         }
            ';

            // Media Query
            $css .= '
            @media (max-width: 1024px){
            .top-header .yatri-section-container.menu-container .yatri-section-inner.yatri-section-menu, .yatri-mid-header .yatri-section-container.menu-container .yatri-section-inner.yatri-section-menu, .bottom-header .yatri-section-container.menu-container .yatri-section-inner.yatri-section-menu,
            .top-header .yatri-section-container.social_icons-container .yatri-section-social-icons, .yatri-mid-header .yatri-section-container.social_icons-container .yatri-section-social-icons, .bottom-header .yatri-section-container.social_icons-container .yatri-section-social-icons,
            .top-header .yatri-section-container.office_information-container .yatri-section-inner, .yatri-mid-header .yatri-section-container.office_information-container .yatri-section-inner, .bottom-header .yatri-section-container.office_information-container .yatri-section-inner{
                background:' . $primary_color . ';
            }
            }
            ';
        }

        if ($secondary_color != '#0b51c5') {

            $css .= '
                        a:hover, a:focus, a:active,
            body.bbpress article.hentry .post-text a:hover, body.bbpress article.hentry .post-text a:focus, body.bbpress article.hentry .post-text a:active ,
            .wp-audio-playlist .wp-playlist-item a:hover, .wp-audio-playlist .wp-playlist-item a:focus, .wp-audio-playlist .wp-playlist-item a:active,
            .wp-audio-playlist .wp-playlist-item .wp-playlist-caption:hover,
            .wp-audio-playlist .wp-playlist-item .wp-playlist-caption:focus,
            .wp-audio-playlist .wp-playlist-item .wp-playlist-caption:active,
            body.single .post-footer span.cat-links a:hover, body.single .post-footer span.cat-links a:focus, body.single .post-footer span.cat-links a:active ,
            .post-footer a:hover, .post-footer a:focus, .post-footer a:active,
            .post-footer a:hover span, .post-footer a:focus span, .post-footer a:active span,
            .cat-links > a:hover:before, .cat-links > a:focus:before, .cat-links > a:active:before,
            .tag-links > a:hover:before,
            .tag-links > a:focus:before,
            .tag-links > a:active:before,
            .comment-link > a:hover:before,
            .comment-link > a:focus:before,
            .comment-link > a:active:before,
            .posted-on > a:hover:before,
            .posted-on > a:focus:before,
            .posted-on > a:active:before ,
            body.logged-in article.hentry .edit-link .post-edit-link:hover, body.logged-in article.hentry .edit-link .post-edit-link:focus, body.logged-in article.hentry .edit-link .post-edit-link:active,
            .edit-link .comment-edit-link:hover,
            .edit-link .comment-edit-link:focus,
            .edit-link .comment-edit-link:active,
            .edit-link .post-edit-link:hover, .edit-link .post-edit-link:focus, .edit-link .post-edit-link:active,
            .edit-link .comment-edit-link:hover,
            .edit-link .comment-edit-link:focus,
            .edit-link .comment-edit-link:active,
            .edit-link:hover, .edit-link:focus, .edit-link:active,
            .nav-links .nav-previous a:hover, .nav-links .nav-previous a:hover:before, .nav-links .nav-next a:hover:after,
            .nav-links .nav-previous a:focus, .nav-links .nav-previous a:active, .nav-links .nav-next a:hover, .nav-links .nav-next a:focus, .nav-links .nav-next a:active,
            .nav-previous:hover:before, .nav-previous:focus:before, .nav-previous:active:before,
            .nav-next:hover:before,
            .nav-next:focus:before,
            .nav-next:active:before,
            .comments-area .comment-list .comment-metadata a:hover, .comments-area .comment-list .comment-metadata a:focus, .comments-area .comment-list .comment-metadata a:active ,
            .comments-area .comment-respond .logged-in-as a,
            .comments-area .comment-respond .logged-in-as a:hover, .comments-area .comment-respond .logged-in-as a:focus, .comments-area .comment-respond .logged-in-as a:active ,
            .related-post .related-post-list h3 a:hover, .related-post .related-post-list h3 a:focus, .related-post .related-post-list h3 a:active,
            .post-content-overlay article.post-content .post-title h2 a:hover,
            .post-content-overlay article.post-content .post-title .cat a:hover, .post-content-overlay article.post-content .post-title .cat a:focus, .post-content-overlay article.post-content .post-title .cat a:active,
            .post-content-overlay article.post-content .post-footer a:hover, .post-content-overlay article.post-content .post-footer a:focus, .post-content-overlay article.post-content .post-footer a:active, .post-content-overlay article.post-content .post-footer .divider:hover, .post-content-overlay article.post-content .post-footer .divider:focus, .post-content-overlay article.post-content .post-footer .divider:active,
            .widget li:hover > a, .widget li:focus > a, .widget li:active > a,
            .widget.widget_calendar td a:hover,
            .widget.widget_calendar tfoot a:hover, .widget.widget_calendar tfoot a:focus, .widget.widget_calendar tfoot a:active ,
            .widget.widget_rss li a:hover, .widget.widget_rss li a:focus, .widget.widget_rss li a:active,
            .widget.widget_rss .widget-title .rsswidget:hover, .widget.widget_rss .widget-title .rsswidget:focus, .widget.widget_rss .widget-title .rsswidget:active,
            .widget.widget_text .textwidget a:hover, .widget.widget_text .textwidget a:focus, .widget.widget_text .textwidget a:active,
            .contact-details .list a:hover, .contact-details .list a:focus, .contact-details .list a:active,
            .site-header .site-branding .site-title:hover, .site-header .site-branding .site-title:active, .site-header .site-branding .site-title:focus,
            .site-header .site-branding .site-title a:hover,
            .site-header .site-branding .site-title a:active,
            .site-header .site-branding .site-title a:focus ,
            .header-bottom-right .cart-icon a:hover, .header-bottom-right .cart-icon a:focus, .header-bottom-right .cart-icon a:active,
            .header-bottom-right .header-search-wrap .search-icon:hover, .header-bottom-right .header-search-wrap .search-icon:focus, .header-bottom-right .header-search-wrap .search-icon:active,
            .site-header.site-header-two .socialgroup a:hover, .site-header.site-header-two .socialgroup a:focus, .site-header.site-header-two .socialgroup a:active,
            .site-header.site-header-two .site-branding .site-title a:hover, .site-header.site-header-two .site-branding .site-title a:focus, .site-header.site-header-two .site-branding .site-title a:active,
            .site-header.site-header-two .header-bottom-right .cart-icon a:hover, .site-header.site-header-two .header-bottom-right .cart-icon a:focus, .site-header.site-header-two .header-bottom-right .cart-icon a:active,
            .site-header.site-header-two .header-bottom-right .header-search-wrap .search-icon:hover, .site-header.site-header-two .header-bottom-right .header-search-wrap .search-icon:focus, .site-header.site-header-two .header-bottom-right .header-search-wrap .search-icon:active,
            .site-header.site-header-two .alt-menu-icon a span:hover, .site-header.site-header-two .alt-menu-icon a span:focus, .site-header.site-header-two .alt-menu-icon a span:active,
            body.fixed-nav-active .wrap-fixed-header .site-branding .site-title a:hover, body.fixed-nav-active .wrap-fixed-header .site-branding .site-title a:active, body.fixed-nav-active .wrap-fixed-header .site-branding .site-title a:focus,
            .main-navigation nav > ul > li > a:hover,
            .main-navigation nav > ul > li > a:active, .main-navigation nav > ul > li > a:focus,
            .main-navigation nav > ul ul li a:hover, .main-navigation nav > ul ul li a:focus, .main-navigation nav > ul ul li a:active,
            .main-navigation nav ul li.current-menu-item > a, .main-navigation nav ul li.current-menu-parent > a,
            .site-footer .site-branding a:hover, .site-footer .site-branding a:focus, .site-footer .site-branding a:active,
            .site-footer .socialgroup ul li a:hover, .site-footer .socialgroup ul li a:focus, .site-footer .socialgroup ul li a:active,
            .bottom-footer .copyright a:hover, .bottom-footer .copyright a:focus, .bottom-footer .copyright a:active,
            .footer-menu ul li a:hover, .footer-menu ul li a:focus, .footer-menu ul li a:active,
            .top-footer .widget ul li a:hover, .top-footer .widget ul li a:focus, .top-footer .widget ul li a:active, .top-footer .widget ol li a:hover, .top-footer .widget ol li a:focus, .top-footer .widget ol li a:active,
            .top-footer .widget .textwidget a:hover, .top-footer .widget .textwidget a:focus, .top-footer .widget .textwidget a:active,
            .top-footer .widget .calendar_wrap table td a:hover, .top-footer .widget .calendar_wrap table td a:focus, .top-footer .widget .calendar_wrap table td a:active,
            .top-footer .widget.widget_rss li a:hover, .top-footer .widget.widget_rss li a:focus, .top-footer .widget.widget_rss li a:active,
            .top-footer .widget .rsswidget:hover, .top-footer .widget .rsswidget:focus, .top-footer .widget .rsswidget:active,
            .top-footer .widget .sb-right-thumb-widget .widget-content .post-footer span a:hover, .top-footer .widget .sb-right-thumb-widget .widget-content .post-footer span a:focus, .top-footer .widget .sb-right-thumb-widget .widget-content .post-footer span a:active,
            .top-footer .widget .sb-right-thumb-widget .widget-content a:hover, .top-footer .widget .sb-right-thumb-widget .widget-content a:focus, .top-footer .widget .sb-right-thumb-widget .widget-content a:active ,
            .site-branding .site-title:hover a, .site-branding .site-title:focus a, .site-branding .site-title:active a,
            .site-branding:hover a, .site-branding:focus a, .site-branding:active a,
            .socialgroup a:hover, .socialgroup a:focus, .socialgroup a:active,
            .wrap-detail-page .yatri-contact-form-area .form-group .cleaner:hover, .wrap-detail-page .yatri-contact-form-area .form-group .cleaner:active, .wrap-detail-page .yatri-contact-form-area .form-group .cleaner:focus,
            .wrap-detail-page .yatri-contact-form-area .form-group .cleaner:hover span, .wrap-detail-page .yatri-contact-form-area .form-group .cleaner:active span, .wrap-detail-page .yatri-contact-form-area .form-group .cleaner:focus span,
            .yatra-single-meta-content .byline:hover,
            .yatri-section-offcanvas-menu .yatri-toggle-wrap:hover span.fa,
            .yatri-button:hover,
            .yatri-button:hover .yatri-button-icon,
            .top-header .yatri-section-container.menu-container li a:hover,
            .top-header .site-title a:hover, .top-header a:hover,
            a.button-text:hover, a.button-text:focus, a.button-text:active,
            .button-text:hover,
            .button-text:focus,
            .button-text:active,
            .learn-more-btn:hover span,
            a.button-text:hover:after, a.button-text:focus:after, a.button-text:active:after,
            .button-text:hover:after,
            .button-text:focus:after,
            .button-text:active:after,
            .learn-more-btn:hover span,
            h1 a:hover, h1 a:focus, h1 a:active, h2 a:hover, h3 a:hover, h3 a:focus, h3 a:active, h4 a:hover, h4 a:focus, h4 a:active, h5 a:hover, h5 a:focus, h5 a:active, h6 a:hover, h6 a:focus, h6 a:active,
            .breadcrumb-wrap .breadcrumbs .trail-items a:hover, .breadcrumb-wrap .breadcrumbs .trail-items a:focus, .breadcrumb-wrap .breadcrumbs .trail-items a:active,
            .yatri-category-list:hover,
            .yatri-tag-list:hover,
            .bottom-footer .main-navigation nav > ul > li > a:hover,
            .bottom-footer a:hover
            {
                color:' . $secondary_color . ';
            }
           .infinite-scroll #infinite-handle span:hover, .infinite-scroll #infinite-handle span:focus, .infinite-scroll #infinite-handle span:active,
          .widget.widget_mc4wp_form_widget input[type="submit"]:hover, .widget.widget_mc4wp_form_widget input[type="submit"]:focus, .widget.widget_mc4wp_form_widget input[type="submit"]:active,
          .searchform .search-button:hover, .searchform .search-button:focus, .searchform .search-button:active,
        .widget li:hover:before, .widget li:focus:before, .widget li:active:before,
        .widget.widget_calendar tbody a:hover, .widget.widget_calendar tbody a:focus, .widget.widget_calendar tbody a:active,
        .widget.widget_tag_cloud .tagcloud a:hover, .widget.widget_tag_cloud .tagcloud a:focus, .widget.widget_tag_cloud .tagcloud a:active,
        .header-bottom-right .cart-icon a:hover .count, .header-bottom-right .cart-icon a:focus .count, .header-bottom-right .cart-icon a:active .count,
        .top-footer .widget .search-button:hover, .top-footer .widget .search-button:focus, .top-footer .widget .search-button:active,
        .wrap-detail-page form input[type="submit"]:hover, .wrap-detail-page form input[type="submit"]:focus, .wrap-detail-page form input[type="submit"]:active,
        .wrap-detail-page .wpcf7-form input.wpcf7-form-control[type="submit"]:hover, .wrap-detail-page .wpcf7-form input.wpcf7-form-control[type="submit"]:focus, .wrap-detail-page .wpcf7-form input.wpcf7-form-control[type="submit"]:active,
        .wrap-detail-page .wpcf7 input[type="submit"]:hover, .wrap-detail-page .wpcf7 input[type="submit"]:active, .wrap-detail-page .wpcf7 input[type="submit"]:focus,
        .wrap-detail-page .yatri-contact-form-area .form-group input.form-control[type="submit"]:hover, .wrap-detail-page .yatri-contact-form-area .form-group input.form-control[type="submit"]:focus, .wrap-detail-page .yatri-contact-form-area .form-group input.form-control[type="submit"]:active,
        input[type="button"]:hover,
        input[type="reset"]:hover,
        input[type="submit"]:hover, .button:hover, .default-button:hover, .button-primary:hover, .button-light:hover, .button-outline:hover, .comments-area .comment-list .reply a:hover, input[type="button"]:focus,
        input[type="reset"]:focus,
        input[type="submit"]:focus, .button:focus, .default-button:focus, .button-primary:focus, .button-light:focus, .button-outline:focus, .comments-area .comment-list .reply a:focus, input[type="button"]:active,
        input[type="reset"]:active,
        input[type="submit"]:active, .button:active, .default-button:active, .button-primary:active, .button-light:active, .button-outline:active, .comments-area .comment-list .reply a:active,
        .button-primary:hover, .button-primary:focus, .button-primary:active,
        .button-light:hover, .button-light:focus, .button-light:active,
        .page-numbers:hover, .page-numbers:focus, .page-numbers:active
        
         {
                background-color:' . $secondary_color . ';
         }
         .widget .bbp-login-links a:hover, .widget .bbp-login-links a:focus, .widget .bbp-login-links a:active ,
        .widget.widget_mc4wp_form_widget input[type="submit"]:hover, .widget.widget_mc4wp_form_widget input[type="submit"]:focus, .widget.widget_mc4wp_form_widget input[type="submit"]:active,
        .widget li:hover:before, .widget li:focus:before, .widget li:active:before,
        .site-header.site-header-two .socialgroup a:hover, .site-header.site-header-two .socialgroup a:focus, .site-header.site-header-two .socialgroup a:active,
        .site-header.site-header-two .header-bottom-right .header-search-wrap .search-icon:hover, .site-header.site-header-two .header-bottom-right .header-search-wrap .search-icon:focus, .site-header.site-header-two .header-bottom-right .header-search-wrap .search-icon:active,
        .site-footer .socialgroup ul li a:hover, .site-footer .socialgroup ul li a:focus, .site-footer .socialgroup ul li a:active,
        .socialgroup a:hover, .socialgroup a:focus, .socialgroup a:active,
        .wrap-detail-page form input[type="submit"]:hover, .wrap-detail-page form input[type="submit"]:focus, .wrap-detail-page form input[type="submit"]:active,
        .wrap-detail-page .wpcf7-form input.wpcf7-form-control[type="submit"]:hover, .wrap-detail-page .wpcf7-form input.wpcf7-form-control[type="submit"]:focus, .wrap-detail-page .wpcf7-form input.wpcf7-form-control[type="submit"]:active,
        .wrap-detail-page .yatri-contact-form-area .form-group input.form-control[type="submit"]:hover, .wrap-detail-page .yatri-contact-form-area .form-group input.form-control[type="submit"]:focus, .wrap-detail-page .yatri-contact-form-area .form-group input.form-control[type="submit"]:active,
        .button-light:hover, .button-light:focus, .button-light:active,
        .page-numbers:hover, .page-numbers:focus, .page-numbers:active,
        .widget.widget_tag_cloud .tagcloud a:hover, .widget.widget_tag_cloud .tagcloud a:focus, .widget.widget_tag_cloud .tagcloud a:active,
      .header-bottom-right .header-search-wrap .search-icon:hover, .header-bottom-right .header-search-wrap .search-icon:focus, .header-bottom-right .header-search-wrap .search-icon:active,
      .wrap-detail-page .wpcf7 input[type="submit"]:hover, .wrap-detail-page .wpcf7 input[type="submit"]:active, .wrap-detail-page .wpcf7 input[type="submit"]:focus,
      .yatri-button,
      .button-primary:hover, .button-primary:focus, .button-primary:active,
      .button-outline:hover, .button-outline:focus, .button-outline:active
         {
                border-color:' . $secondary_color . ';
         }
         .mouse-holder #mouse:hover, .mouse-holder #mouse:focus, .mouse-holder #mouse:active
          {
          
          stroke: ' . $secondary_color . ';
          }
           
           .widget .widget-title:after,
            .widget .widgettitle:after,
            .yatri-button
            
          {
          
          background: ' . $secondary_color . ';
          }
            ';
        }

        return $css;


    }
}
if (!function_exists('yatri_dynamic_css_array_parser')) {

    function yatri_dynamic_css_array_parser($array = array())
    {
        $css = '';

        foreach ($array as $selector => $css_properties) {

            $css .= $selector . ' { ';

            foreach ($css_properties as $property_index => $property_value) {

                $css .= $property_index . ':' . $property_value . ';';
            }

            $css .= ' } ';
        }


        return $css;
    }
}
if (!function_exists('yatri_get_all_dynamic_css')) :

    function yatri_get_all_dynamic_css()
    {
        $color_css = yatri_get_color_css();

        $modal_css = yatri_get_modal_dynamic_css();

        $other_dynamic_css = yatri_get_other_dynamic_css();

        $all_dynamic_css = ($color_css . $modal_css . $other_dynamic_css);

        $all_dynamic_css = apply_filters('yatri_all_dynamic_css', $all_dynamic_css);

        $all_dynamic_css_min = yatri_minify_css($all_dynamic_css);

        return $all_dynamic_css_min;
    }


endif;
if (!function_exists('yatri_dynamic_css')) :

    function yatri_dynamic_css()
    {
        $all_dynamic_css = yatri_get_all_dynamic_css();

        ?>

        <style type="text/css" class="yatri-dynamic-css">

            <?php echo $all_dynamic_css ; ?>

        </style>

        <?php
    }

endif;

$load_dynamic_css = apply_filters('yatri_theme_dynamic_css_enable', true);

if ($load_dynamic_css) {
    add_action('wp_head', 'yatri_dynamic_css', 10);
}

