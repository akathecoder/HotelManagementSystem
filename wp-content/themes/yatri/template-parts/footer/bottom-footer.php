<?php
$class = 'bottom-footer yatri-bottom-footer-area';

$bottom_footer_visibility = yatri_get_option('bottom_footer_visibility');

if (!isset($bottom_footer_visibility['desktop']) || (isset($bottom_footer_visibility['desktop']) && !$bottom_footer_visibility['desktop'])) {

    $class .= ' yatri-desktop-hidden';
}

if (!isset($bottom_footer_visibility['tablet']) || (isset($bottom_footer_visibility['tablet']) && !$bottom_footer_visibility['tablet'])) {

    $class .= ' yatri-tablet-hidden';
}

if (!isset($bottom_footer_visibility['mobile']) || (isset($bottom_footer_visibility['mobile']) && !$bottom_footer_visibility['mobile'])) {

    $class .= ' yatri-mobile-hidden';
}
$class = apply_filters('yatri_bottom_footer_css_class', $class);

?>
<div class="<?php echo esc_attr($class); ?>">
    <div class="yat-container">
        <div class="yat-row align-items-center">

            <?php

            $bottom_footer_sections = yatri_get_header_option('bottom_footer_sections');

            $column_class = yatri_section_container_col_class($bottom_footer_sections, 'bottom_footer');

            foreach ($bottom_footer_sections as $section_index => $section_info) {

                $section_id = isset($section_info['section']) ? $section_info['section'] : '';

                $width = isset($section_info['width']) ? $section_info['width'] : '';

                $container_class = $column_class . yatri_section_container_class($section_info, 'bottom_footer', $section_index);

                if (!empty($section_id)) {

                    $options = array();


                    switch ($section_id) {

                        case "menu":
                            $container_class .= ' main-navigation';
                            $options = array(
                                'location' => yatri_get_header_option('bottom_footer_main_menu'),
                                'class' => 'nav',
                                'depth' => 1,

                            );
                            break;
                        case "copyright":
                            $options['content'] = yatri_get_header_option('bottom_footer_copyright_content');
                            break;
                        case "social_icons":

                            $option_json = yatri_get_header_option('bottom_footer_social_icons');

                            $options['icons'] = yatri_maybe_json_decode($option_json);

                            break;
                        case "button":

                            $options = array(
                                'icon' => yatri_get_header_option('bottom_footer_button_icon'),
                                'link' => yatri_get_header_option('bottom_footer_button_link'),
                                'target' => yatri_get_header_option('bottom_footer_button_target'),
                                'label' => yatri_get_header_option('bottom_footer_button_label'),

                            );
                            break;
                        case "office_information":

                            $option_json = yatri_get_header_option('bottom_footer_office_info');

                            $options['informations'] = yatri_maybe_json_decode($option_json);
                            break;
                        case "custom_html":

                            $options['content'] = yatri_get_header_option('bottom_footer_custom_html_content');
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

