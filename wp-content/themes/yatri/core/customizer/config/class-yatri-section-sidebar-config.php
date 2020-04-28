<?php

class Yatri_Section_Sidebar_Config
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
                    'name' => $id . '_sidebar_heading',
                    'type' => 'heading',
                    'label' => esc_html__('Sidebar', 'yatri'),
                ),
                array(
                    'name' => $id . '_sidebar_background_color',
                    'type' => 'color',
                    'label' => esc_html__('Sidebar Background Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector}",
                    'css_property' => 'background-color:{{value}};'
                ),
                array(
                    'name' => $id . '_sidebar_background_image',
                    'type' => 'image',
                    'label' => esc_html__('Sidebar Background Image', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector}",
                    'css_property' => 'background-image:{{value}};'
                ),
                array(
                    'name' => $id . '_widgets_heading',
                    'type' => 'heading',
                    'label' => esc_html__('Widgets', 'yatri'),
                ),
                array(
                    'name' => $id . '_widget_background_color',
                    'type' => 'color',
                    'label' => esc_html__('Background Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector} .widget",
                    'css_property' => 'background-color:{{value}};'
                ),
                array(
                    'name' => $id . '_widget_title_color',
                    'type' => 'color',
                    'label' => esc_html__('Title Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector} .widget-title,
                    {$parent_selector} .widgettitle
                    ",
                    'css_property' => 'color:{{value}};'
                ),
                array(
                    'name' => $id . '_widget_title_background_color',
                    'type' => 'color',
                    'label' => esc_html__('Title Background Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector} .widget-title,
                    {$parent_selector} .widgettitle
                    ",
                    'css_property' => 'background-color:{{value}};'
                ),
                array(
                    'name' => $id . '_widget_text_color',
                    'type' => 'color',
                    'label' => esc_html__('Text Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector},
                    {$parent_selector} p,
                    {$parent_selector} span,
                    {$parent_selector} strong,
                    {$parent_selector} em,
                    {$parent_selector} li
                    ",
                    'css_property' => 'color:{{value}};'
                ),
                array(
                    'name' => $id . '_widget_link_color',
                    'type' => 'color',
                    'label' => esc_html__('Link Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector} a",
                    'css_property' => 'color:{{value}};'
                ),
                array(
                    'name' => $id . '_widget_link_hover_color',
                    'type' => 'color',
                    'label' => esc_html__('Link Hover Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector} a:hover",
                    'css_property' => 'color:{{value}};'
                ),
            ),
            $id . '_spacing_fields' =>
                array(
                    array(
                        'name' => $id . '_spacing_sidebar_heading',
                        'type' => 'heading',
                        'label' => esc_html__('Sidebar', 'yatri'),
                    ),
                    array(
                        'name' => $id . '_sidebar_padding',
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
                        'selector' => "{$parent_selector}",

                    ),
                    array(
                        'name' => $id . '_content_alignment',
                        'type' => 'alignment',
                        'label' => esc_html__('Content Alignment', 'yatri'),
                        'description' => '',
                        'default' => 'left',
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
                        'selector' => "{$parent_selector} .widget",
                        'css_property' => 'text-align:{{value}};'
                    ),
                    array(
                        'name' => $id . '_spacing_widgets_heading',
                        'type' => 'heading',
                        'label' => esc_html__('Widgets', 'yatri'),
                    ),
                    array(
                        'name' => $id . '_widget_padding',
                        'type' => 'padding',
                        'device_settings' => true,
                        'devices' => array('desktop', 'tablet', 'mobile'),
                        'label' => esc_html__('Widgets Padding', 'yatri'),
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
                        'selector' => "{$parent_selector} .widget",

                    ),
                    array(
                        'name' => $id . '_widget_margin',
                        'type' => 'margin',
                        'device_settings' => true,
                        'devices' => array('desktop', 'tablet', 'mobile'),
                        'label' => esc_html__('Widgets Margin', 'yatri'),
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
                        'selector' => "{$parent_selector} .widget",


                    ),

                    array(
                        'name' => $id . '_widget_title_padding',
                        'type' => 'padding',
                        'device_settings' => true,
                        'devices' => array('desktop', 'tablet', 'mobile'),
                        'label' => esc_html__('Widget Title Padding', 'yatri'),
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
                        'selector' => "{$parent_selector} .widget-title,
                    {$parent_selector} .widgettitle
                    ",

                    ),
                    array(
                        'name' => $id . '_widget_title_margin',
                        'type' => 'margin',
                        'device_settings' => true,
                        'devices' => array('desktop', 'tablet', 'mobile'),
                        'label' => esc_html__('Widget Title Margin', 'yatri'),
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
                        'selector' => "{$parent_selector} .widget-title,
                    {$parent_selector} .widgettitle
                    ",

                    ),


                    array(
                        'name' => $id . '_spacing_sidebar_border',
                        'type' => 'heading',
                        'label' => esc_html__('Sidebar Border', 'yatri'),
                    ),
                    array(
                        'name' => $id . '_sidebar_border',
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

                        'selector' => "{$parent_selector}",
                    ),
                    array(
                        'name' => $id . '_spacing_widgets_border',
                        'type' => 'heading',
                        'label' => esc_html__('Widgets Border', 'yatri'),
                    ),
                    array(
                        'name' => $id . '_widgets_border',
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
                        'selector' => "{$parent_selector} .widget",
                    ),
                    array(
                        'name' => $id . '_spacing_widget_title_border',
                        'type' => 'heading',
                        'label' => esc_html__('Widget Title Border', 'yatri'),
                    ),
                    array(
                        'name' => $id . '_widget_title_border',
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
                        'additional_css' => array(
                            'desktop' => "
                            {$parent_selector} .widget-title:after{content:none},
                            {$parent_selector} .widgettitle:after{content:none},
                            ",
                            'tablet' => "
                            {$parent_selector} .widget-title:after{content:none},
                            {$parent_selector} .widgettitle:after{content:none},
                            ",
                            'mobile' => "
                            {$parent_selector} .widget-title:after{content:none},
                            {$parent_selector} .widgettitle:after{content:none},
                            ",
                        ),
                        'selector' => "{$parent_selector} .widget-title,
                    {$parent_selector} .widgettitle
                    ",
                    )
                ),


        );
    }
}