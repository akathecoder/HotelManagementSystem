<?php
class Yatri_Section_Header_Config
{
    public static function get_design_style_config($id, $selector)
    {
        return array(
            'tabs' => array(
                $id . '_color' => esc_html__('Color', 'yatri'),
                $id . '_spacing' => esc_html__('Spacing', 'yatri'),
            ),
            $id . '_color_fields' => array(

                array(
                    'name' => $id . '_section_background_color',
                    'type' => 'color',
                    'label' => esc_html__('Section Background Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$selector},
                    body.yatri-global-layout-full_width {$selector},body.yatri-global-layout-boxed {$selector}",
                    'css_property' => 'background-color:{{value}};'
                ),
                array(
                    'name' => $id . '_section_background_image',
                    'type' => 'image',
                    'label' => esc_html__('Section Background Image', 'yatri'),
                    'description' => '',
                    'selector' => "{$selector}",
                    'css_property' => 'background-image:{{value}};'
                ),
                array(
                    'name' => $id . '_section_overlay_color',
                    'type' => 'overlay',
                    'label' => esc_html__('Section Background Overlay', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'additional_css' => "{$selector} .yat-container{position:relative;z-index:1;}",
                    'selector' => "{$selector}",
                    'css_property' => 'background-color:{{value}};'
                ),
                array(
                    'name' => $id . '_container_background_color',
                    'type' => 'color',
                    'label' => esc_html__('Container Background Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$selector} .yat-container",
                    'css_property' => 'background-color:{{value}};'
                ),
            ),
            $id . '_spacing_fields' =>
                array(
                    array(
                        'name' => $id . '_section_padding',
                        'type' => 'padding',
                        'device_settings' => true,
                        'devices' => array('desktop', 'tablet', 'mobile'),
                        'label' => esc_html__('Section Padding', 'yatri'),
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
                        'selector' => "{$selector}",
                    ),
                    array(
                        'name' => $id . '_section_margin',
                        'type' => 'margin',
                        'device_settings' => true,
                        'devices' => array('desktop', 'tablet', 'mobile'),
                        'label' => esc_html__('Section Margin', 'yatri'),
                        'description' => '',
                        'disabled_fields' => array(
                            'desktop' => array('right', 'left'),
                            'tablet' => array('right', 'left'),
                            'mobile' => array('right', 'left'),
                        ),
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
                        'selector' => "{$selector}",
                    ),

                    array(
                        'name' => $id . '_container_padding',
                        'type' => 'padding',
                        'device_settings' => true,
                        'devices' => array('desktop', 'tablet', 'mobile'),
                        'label' => esc_html__('Container Padding', 'yatri'),
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
                        'selector' => "body.yatri-global-layout-full_width {$selector}  .yat-container, body.yatri-global-layout-boxed {$selector}  .yat-container,
                 {$selector} .yat-container",
                    ),

                    array(
                        'name' => $id . '_section_border_heading',
                        'type' => 'heading',
                        'label' => esc_html__('Section Border', 'yatri'),
                    ),
                    array(
                        'name' => $id . '_section_border',
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
                        'selector' => "{$selector}",

                    ),
                    array(
                        'name' => $id . '_container_border_heading',
                        'type' => 'heading',
                        'label' => esc_html__('Container Border', 'yatri'),
                    ),
                    array(
                        'name' => $id . '_container_border',
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
                        'selector' => "{$selector} .yat-container",

                    )
                ),


        );
    }
}
