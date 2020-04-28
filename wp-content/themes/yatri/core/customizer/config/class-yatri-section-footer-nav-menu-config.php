<?php

class Yatri_Section_Footer_Nav_Menu_Config
{
    public static function get_design_style_config($id, $parent_selector)
    {
        return array(
            'tabs' => array(
                $id . '_color' => esc_html__('Colors', 'yatri'),
                $id . '_spacing' => esc_html__('Spacing', 'yatri'),
            ),
            $id . '_color_fields' =>
                array(

                    array(
                        'name' => $id . '_nav_color',
                        'type' => 'color',
                        'label' => esc_html__('Font color', 'yatri'),
                        'description' => '',
                        'default' => '#fff',
                        'css_property' => 'color:{{value}};',
                        'selector' => "{$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li>a",
                    ),
                    array(
                        'name' => $id . '_nav_hover_color',
                        'type' => 'color',
                        'label' => esc_html__('Hover font color', 'yatri'),
                        'description' => '',
                        'default' => '#fff',
                        'css_property' => 'color:{{value}};',
                        'selector' => "{$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li:hover>a,
                    {$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li.current-menu-item:hover>a",
                    ),
                    array(
                        'name' => $id . '_nav_background_color',
                        'type' => 'color',
                        'label' => esc_html__('Background color', 'yatri'),
                        'description' => '',
                        'default' => '#fff',
                        'css_property' => 'background-color:{{value}};',
                        'selector' => "{$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li>a",
                    ),
                    array(
                        'name' => $id . '_nav_hover_background_color',
                        'type' => 'color',
                        'label' => esc_html__('Hover background color', 'yatri'),
                        'description' => '',
                        'default' => '#fff',
                        'css_property' => 'background-color:{{value}};',
                        'selector' => "{$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li:hover>a,
                    {$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li.current-menu-item:hover>a",
                    ),
                    array(
                        'name' => $id . '_nav_active_font_color',
                        'type' => 'color',
                        'label' => esc_html__('Active font color', 'yatri'),
                        'description' => '',
                        'default' => '#fff',
                        'css_property' => 'color:{{value}};',
                        'selector' => "{$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li.current-menu-item>a",
                    ),
                    array(
                        'name' => $id . '_nav_active_background_color',
                        'type' => 'color',
                        'label' => esc_html__('Active background color', 'yatri'),
                        'description' => '',
                        'default' => '#fff',
                        'css_property' => 'background-color:{{value}};',
                        'selector' => "{$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li.current-menu-item>a",
                    ),


                ),
            $id . '_spacing_fields' => array(
                array(
                    'name' => $id . '_nav__alignment',
                    'type' => 'alignment',
                    'label' => esc_html__('Menu Alignment', 'yatri'),
                    'description' => '',
                    'default' => array(
                        'desktop' => 'center',
                        'tablet' => 'center',
                        'mobile' => 'center',
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
                    'selector' => "{$parent_selector} .yatri-section-container.menu-container nav > ul",
                    'css_property' => 'text-align:{{value}};'
                ),
                array(
                    'name' => $id . '_nav_padding_margin_heading',
                    'type' => 'heading',
                    'label' => esc_html__('Padding & Margin', 'yatri'),
                ),
                array(
                    'name' => $id . '_nav_padding',
                    'type' => 'padding',
                    'device_settings' => true,
                    'devices' => array('desktop', 'tablet', 'mobile'),
                    'label' => esc_html__('Padding', 'yatri'),
                    'description' => '',
                    'default' => array(
                        'desktop' => array(
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
                        'tablet' => array(

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
                        'mobile' => array(

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

                    ),
                    'selector' => "{$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li>a",
                ),
                array(
                    'name' => $id . '_nav_margin',
                    'type' => 'margin',
                    'device_settings' => true,
                    'devices' => array('desktop', 'tablet', 'mobile'),
                    'label' => esc_html__('Margin', 'yatri'),
                    'description' => '',
                    'default' => array(
                        'desktop' => array(
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
                        'tablet' => array(

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
                        'mobile' => array(

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

                    ),
                    'selector' => "{$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li>a",
                ),
                array(
                    'name' => $id . '_nav_border_heading',
                    'type' => 'heading',
                    'label' => esc_html__('Border', 'yatri'),
                ),
                array(
                    'name' => $id . '_nav_border',
                    'type' => 'border',
                    'device_settings' => true,
                    'devices' => array('desktop', 'tablet', 'mobile'),
                    'label' => '',
                    'default' => array(
                        'left' => 0,
                        'right' => 0,
                        'top' => 0,
                        'bottom' => 0
                    ),
                    'selector' => "{$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li>a",

                ),
            ),

        );
    }
}