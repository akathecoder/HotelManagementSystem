<?php

class Yatri_Section_Wrapper_Config
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
                    'name' => $id . '_section_background_color',
                    'type' => 'color',
                    'label' => esc_html__('Section Background Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector} section.wrapper.site-content.yatri-site-content-area",
                    'css_property' => 'background-color:{{value}};'
                ),
                array(
                    'name' => $id . '_section_background_image',
                    'type' => 'image',
                    'label' => esc_html__('Section Background Image', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector} section.wrapper.site-content.yatri-site-content-area",
                    'css_property' => 'background-image:{{value}};'
                ),
                array(
                    'name' => $id . '_container_background_color',
                    'type' => 'color',
                    'label' => esc_html__('Container Background Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "{$parent_selector} section.wrapper.site-content.yatri-site-content-area .yat-container",
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
                        'selector' => "{$parent_selector} section.wrapper.site-content.yatri-site-content-area",


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
                            'mobile' => array('right', 'left')
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
                        'selector' => "{$parent_selector} section.wrapper.site-content.yatri-site-content-area",


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
                        'selector' => "body.yatri-global-layout-full_width {$parent_selector} section.wrapper.site-content.yatri-site-content-area  .yat-container, 
                        body.yatri-global-layout-boxed {$parent_selector} section.wrapper.site-content.yatri-site-content-area .yat-container,
                 {$parent_selector} section.wrapper.site-content.yatri-site-content-area .yat-container",
                    ),

                    array(
                        'name' => $id . '_section_border_heading',
                        'type' => 'heading',
                        'label' => esc_html__('Section Border', 'yatri'),
                    ),
                    array(
                        'name' => $id . '_section_border',
                        'type' => 'border',
                        'label' => '',
                        'default' => array(
                            'left' => 0,
                            'right' => 0,
                            'top' => 0,
                            'bottom' => 0
                        ),
                        'selector' => "{$parent_selector} section.wrapper.site-content.yatri-site-content-area",
                    )
                ),


        );
    }
}