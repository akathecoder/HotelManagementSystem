<?php

$class = 'top-header d-none d-lg-block yatri-header-item';

$top_header_visibility = yatri_get_option('top_header_visibility');

if (!isset($top_header_visibility['desktop']) || (isset($top_header_visibility['desktop']) && !$top_header_visibility['desktop'])) {

    $class .= ' yatri-desktop-hidden';
}

if (!isset($top_header_visibility['tablet']) || (isset($top_header_visibility['tablet']) && !$top_header_visibility['tablet'])) {

    $class .= ' yatri-tablet-hidden';
}

if (!isset($top_header_visibility['mobile']) || (isset($top_header_visibility['mobile']) && !$top_header_visibility['mobile'])) {

    $class .= ' yatri-mobile-hidden';
}
$class = apply_filters('yatri_top_header_css_class', $class);
?>
<div class="<?php echo esc_attr($class); ?>">

    <div class="yat-container">

        <div class="yat-row align-items-center">
            <?php

            $top_header_sections = yatri_get_header_option('top_header_sections');

            $column_class = yatri_section_container_col_class($top_header_sections, 'top_header');

            foreach ($top_header_sections as $section_index => $section_info) {

                $section_id = isset($section_info['section']) ? $section_info['section'] : '';

                $width = isset($section_info['width']) ? $section_info['width'] : '';

                $container_class = $column_class . yatri_section_container_class($section_info, 'top_header', $section_index);

                if (!empty($section_id)) {

                    $options = array();

                    switch ($section_id) {

                        case "offcanvas_menu":
                            $options = array(
                                'start_from' => yatri_get_header_option('top_header_offcanvas_open_from'),
                                'type' => yatri_get_header_option('top_header_offcanvas_menu_type'),
                                'sidebar' => yatri_get_header_option('top_header_offcanvas_menu_sidebar'),
                                'menu' => yatri_get_header_option('top_header_offcanvas_menu_nav_menu'),
                                'section_part_id' => 'top-header'


                            );
                            Yatri_Sections::set_global($section_id, $options, 'top-header');

                            break;
                        case "social_icons":

                            $option_json = yatri_get_header_option('top_header_social_icons');

                            $options['icons'] = yatri_maybe_json_decode($option_json);

                            break;
                        case "menu":
                            $container_class .= ' main-navigation';
                            $options = array(
                                'location' => yatri_get_header_option('top_header_main_menu'),
                                'class' => 'nav',
                                'section_part_id' => 'top-header'

                            );
                            Yatri_Sections::set_global('mobile_menu', $options, 'top-header');
                            break;
                        case "site_branding":
                            $options = array(
                                'layout' => yatri_get_option('top_header_branding_layout'),
                                'header' => 'top',
                                'type' => yatri_get_header_option('top_header_site_identity')

                            );
                            break;
                        case "search_form":

                            $options = array(
                                'icon' => yatri_get_header_option('top_header_search_button_icon'),
                                'type' => yatri_get_header_option('top_header_search_form_type'),
                                'placeholder' => yatri_get_header_option('top_header_search_form_placeholder_text')

                            );
                            break;
                        case "button":

                            $options = array(
                                'icon' => yatri_get_header_option('top_header_button_icon'),
                                'link' => yatri_get_header_option('top_header_button_link'),
                                'target' => yatri_get_header_option('top_header_button_target'),
                                'label' => yatri_get_header_option('top_header_button_label'),

                            );
                            break;
                        case "office_information":

                            $option_json = yatri_get_header_option('top_header_office_info');

                            $options['informations'] = yatri_maybe_json_decode($option_json);
                            break;
                        case "custom_html":

                            $options['content'] = yatri_get_header_option('top_header_custom_html_content');
                            break;
                    }


                    Yatri_Sections::get_section($section_id, $options, $container_class);

                } else {

                    echo '<div class="yatri-section-container ' . esc_attr($container_class) . '"></div>';


                }
            }

            ?>
        </div>
    </div>
</div>

