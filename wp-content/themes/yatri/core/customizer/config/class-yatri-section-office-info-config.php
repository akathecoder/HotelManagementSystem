<?php

class Yatri_Section_Office_Info_Config
{
    public static function get_design_style_config($id, $parent_selector)
    {
        return array(
            'tabs' => array(
                $id . '_color' => esc_html__('Colors', 'yatri'),
                $id . '_spacing' => esc_html__('Spacing', 'yatri'),
            ),
            $id . '_color_fields' => array(
                array(
                    'name' => $id . '_text_color',
                    'type' => 'color',
                    'label' => esc_html__('Text Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector} .yatri-section-container.office_information-container .yatri-section-office-information ul li .text, {$parent_selector} .yatri-section-container.office_information-container .yatri-section-office-information ul li span.icon",
                    'css_property' => 'color:{{value}};'
                ),

                array(
                    'name' => $id . '_link_color',
                    'type' => 'color',
                    'label' => esc_html__('Link Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector} .yatri-section-container.office_information-container .yatri-section-office-information ul li a.text",
                    'css_property' => 'color:{{value}};'
                ),
                array(
                    'name' => $id . '_link_hover_color',
                    'type' => 'color',
                    'label' => esc_html__('Link Hover Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector} .yatri-section-container.office_information-container .yatri-section-office-information ul li:hover a.text",
                    'css_property' => 'color:{{value}};'
                ),
                array(
                    'name' => $id . '_icon_color',
                    'type' => 'color',
                    'label' => esc_html__('Icon Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector} .yatri-section-container.office_information-container .yatri-section-office-information ul li span.icon",
                    'css_property' => 'color:{{value}};'
                ),
                array(
                    'name' => $id . '_list_background_color',
                    'type' => 'color',
                    'label' => esc_html__('List Background Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector} .yatri-section-container.office_information-container .yatri-section-office-information ul li",
                    'css_property' => 'background-color:{{value}};'
                ),
                array(
                    'name' => $id . '_list_hover_background_color',
                    'type' => 'color',
                    'label' => esc_html__('List Hover Background Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector} .yatri-section-container.office_information-container .yatri-section-office-information ul li:hover",
                    'css_property' => 'background-color:{{value}};'
                ),
                array(
                    'name' => $id . '_hamburger',
                    'type' => 'heading',
                    'label' => esc_html__('Mobile/Tablet Menu', 'yatri'),
                ),
                array(
                    'name' => $id . '_hamburger_color',
                    'type' => 'color',
                    'label' => esc_html__('Hamburger Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector} .yatri-section-container.office_information-container .yatri-responsive-toggle-menu",
                    'css_property' => 'color:{{value}}; border-color:{{value}};'
                ),
                array(
                    'name' => $id . '_hamburger_alignment',
                    'type' => 'alignment',
                    'label' => esc_html__('Hamburger Alignment', 'yatri'),
                    'description' => '',
                    'default' => 'center',
                    'options' => array(
                        '' => array(
                            'title' => '',
                            'icon' => '',
                        ),
                        'left' => array(
                            'title' => esc_html__('Left', 'yatri'),
                            'icon' => 'dashicons dashicons-editor-alignleft',
                        ),
                        'center' => array(
                            'title' => esc_html__('Center', 'yatri'),
                            'icon' => 'dashicons dashicons-editor-aligncenter',
                        ),
                        'right' => array(
                            'title' => esc_html__('Right', 'yatri'),
                            'icon' => 'dashicons dashicons-editor-alignright',
                        )
                    ),
                    'selector' => "{$parent_selector} .yatri-section-container.office_information-container .yatri-responsive-toggle-menu-wrap",
                    'css_property' => 'text-align:{{value}};'
                ),
            ),
            $id . '_spacing_fields' =>
                array(
                    array(
                        'name' => $id . '_alignment',
                        'type' => 'alignment',
                        'label' => esc_html__('Content Alignment', 'yatri'),
                        'description' => '',
                        'default' => array(
                            'desktop' => '',
                            'tablet' => '',
                            'mobile' => '',
                        ),
                        'device_settings' => true,
                        'devices' => array('desktop', 'tablet', 'mobile'),
                        'options' => array(
                            '' => array(
                                'title' => '',
                                'icon' => '',
                            ),
                            'left' => array(
                                'title' => esc_html__('Left', 'yatri'),
                                'icon' => 'dashicons dashicons-editor-alignleft',
                            ),
                            'center' => array(
                                'title' => esc_html__('Center', 'yatri'),
                                'icon' => 'dashicons dashicons-editor-aligncenter',
                            ),
                            'right' => array(
                                'title' => esc_html__('Right', 'yatri'),
                                'icon' => 'dashicons dashicons-editor-alignright',
                            )
                        ),
                        'selector' => "{$parent_selector} .yatri-section-container.office_information-container .yatri-section-inner",
                        'css_property' => 'text-align:{{value}};'
                    ),
                    array(
                        'name' => $id . '_icon_margin',
                        'type' => 'margin',
                        'device_settings' => true,
                        'devices' => array('desktop', 'tablet', 'mobile'),
                        'label' => esc_html__('Icon Margin', 'yatri'),
                        'description' => '',
                        'disabled_fields' => array(
                            'desktop' => array('top', 'bottom'),
                            'tablet' => array('top', 'bottom'),
                            'mobile' => array('top', 'bottom'),
                        ),
                        'default' => array(
                            'top' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'right' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'bottom' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'left' => array(
                                'value' => '',
                                'unit' => 'px'
                            )

                        ),
                        'selector' => "{$parent_selector} .yatri-section-container.office_information-container .yatri-section-office-information ul li span.icon",


                    ),
                    array(
                        'name' => $id . '_list_margin',
                        'type' => 'margin',
                        'device_settings' => true,
                        'devices' => array('desktop', 'tablet', 'mobile'),
                        'label' => esc_html__('List Margin', 'yatri'),
                        'description' => '',
                        'default' => array(
                            'top' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'right' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'bottom' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'left' => array(
                                'value' => '',
                                'unit' => 'px'
                            )

                        ),
                        'selector' => "{$parent_selector} .yatri-section-container.office_information-container .yatri-section-office-information ul li",


                    ),
                    array(
                        'name' => $id . '_list_padding',
                        'type' => 'padding',
                        'device_settings' => true,
                        'devices' => array('desktop', 'tablet', 'mobile'),
                        'label' => esc_html__('List Padding', 'yatri'),
                        'description' => '',
                        'default' => array(
                            'top' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'right' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'bottom' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'left' => array(
                                'value' => '',
                                'unit' => 'px'
                            )

                        ),
                        'selector' => "{$parent_selector} .yatri-section-container.office_information-container .yatri-section-office-information ul li",

                    ),
                    array(
                        'name' => $id . '_border_heading',
                        'type' => 'heading',
                        'label' => esc_html__('Border', 'yatri'),
                    ),
                    array(
                        'name' => $id . '_border',
                        'type' => 'border',
                        'label' => '',
                        'default' => array(
                            'left' => 0,
                            'right' => 0,
                            'top' => 0,
                            'bottom' => 0
                        ),
                        'additional_css' => "@media (max-width: 768px){{$parent_selector} .yatri-section-container.office_information-container .yatri-section-office-information.yatri-section-inner ul li:last-child{border-bottom:auto;}} ",
                        'selector' => "{$parent_selector} .yatri-section-container.office_information-container .yatri-section-office-information ul li",
                    )
                ),


        );
    }
}