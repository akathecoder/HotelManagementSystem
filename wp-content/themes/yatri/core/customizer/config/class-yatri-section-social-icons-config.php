<?php

class Yatri_Section_Social_Icons_Config
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
                    'name' => $id . '_icon_color',
                    'type' => 'color',
                    'label' => esc_html__('Icon Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector} .yatri-section-container.social_icons-container .yatri-section-social-icons ul li a span",
                    'css_property' => 'color:{{value}};'
                ),

                array(
                    'name' => $id . '_icon_hover_color',
                    'type' => 'color',
                    'label' => esc_html__('Icon Hover Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector} .yatri-section-container.social_icons-container .yatri-section-social-icons ul li:hover a span",
                    'css_property' => 'color:{{value}};'
                ),
                array(
                    'name' => $id . '_background_color',
                    'type' => 'color',
                    'label' => esc_html__('Background Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector} .yatri-section-container.social_icons-container .yatri-section-social-icons ul li",
                    'css_property' => 'background-color:{{value}};'
                ),
                array(
                    'name' => $id . '_background_hover_color',
                    'type' => 'color',
                    'label' => esc_html__('Hover Background Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector} .yatri-section-container.social_icons-container .yatri-section-social-icons ul li:hover",
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
                    'selector' => "{$parent_selector} .yatri-section-container.social_icons-container .yatri-responsive-toggle-menu",
                    'css_property' => 'color:{{value}}; border-color:{{value}};'
                ),
            ),
            $id . '_spacing_fields' =>
                array(
                    array(
                        'name' => $id . '_alignment',
                        'type' => 'alignment',
                        'label' => esc_html__('Alignment', 'yatri'),
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
                        'selector' => "{$parent_selector} .yatri-section-container.social_icons-container",
                        'css_property' => 'text-align:{{value}};'
                    ),
                    array(
                        'name' => $id . '_icon_padding',
                        'type' => 'padding',
                        'device_settings' => true,
                        'devices' => array('desktop', 'tablet', 'mobile'),
                        'label' => esc_html__('Padding', 'yatri'),
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
                        'selector' => "{$parent_selector} .yatri-section-container.social_icons-container .yatri-section-social-icons ul li a",

                    ),
                    array(
                        'name' => $id . '_icon_margin',
                        'type' => 'margin',
                        'device_settings' => true,
                        'devices' => array('desktop', 'tablet', 'mobile'),
                        'label' => esc_html__('Margin', 'yatri'),
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
                        'selector' => "{$parent_selector} .yatri-section-container.social_icons-container .yatri-section-social-icons ul li",


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
                        'device_settings' => true,
                        'devices' => array('desktop', 'tablet', 'mobile'),
                        'default' => array(
                            'left' => 0,
                            'right' => 0,
                            'top' => 0,
                            'bottom' => 0
                        ),
                        'selector' => "{$parent_selector} .yatri-section-container.social_icons-container .yatri-section-social-icons ul li",
                    )
                ),


        );
    }
}