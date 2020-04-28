<?php

class Yatri_Section_Pagination_Config
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
                    'selector' => "
                    {$parent_selector} .yatri-pagination .nav-links a,
                    {$parent_selector} .yatri-pagination .nav-links a:before,
                    {$parent_selector} .yatri-pagination .nav-links a:after,
                    {$parent_selector} .yatri-pagination .nav-links span.page-numbers.dots
                    ",
                    'css_property' => 'color:{{value}};'
                ),
                array(
                    'name' => $id . '_hover_text_color',
                    'type' => 'color',
                    'label' => esc_html__('Hover Text Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "
                   {$parent_selector} .yatri-pagination .nav-links a:hover,
                    {$parent_selector} .yatri-pagination .nav-links a:hover:before,
                    {$parent_selector} .yatri-pagination .nav-links span.current,
                    {$parent_selector} .yatri-pagination .nav-links span.current:hover,
                    {$parent_selector} .yatri-pagination .nav-links a:hover:after
                    ",
                    'css_property' => 'color:{{value}};'
                ),
                array(
                    'name' => $id . '_background_color',
                    'type' => 'color',
                    'label' => esc_html__('Background Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "
                   {$parent_selector} .yatri-pagination .nav-links a,
                   {$parent_selector} .yatri-pagination .nav-links span.page-numbers.dots
                    ",
                    'css_property' => 'background-color:{{value}};'
                ),
                array(
                    'name' => $id . '_hover_background_color',
                    'type' => 'color',
                    'label' => esc_html__('Hover Background Color', 'yatri'),
                    'description' => '',
                    'default' => '#c1c1c1',
                    'selector' => "
                    {$parent_selector} .yatri-pagination .nav-links a:hover,
                    {$parent_selector} .yatri-pagination .nav-links span.current,
                    {$parent_selector} .yatri-pagination .nav-links span.current:hover
                    ",
                    'css_property' => 'background-color:{{value}};'

                ),
            ),
            $id . '_spacing_fields' =>
                array(
                    array(
                        'name' => $id . '_padding',
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
                        'selector' => "
                        {$parent_selector} .yatri-pagination .nav-links a,
                        {$parent_selector} .yatri-pagination .nav-links span.current,
                        {$parent_selector} .yatri-pagination .nav-links span.page-numbers.dots
                        ",


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
                        'selector' => "{$parent_selector} .yatri-pagination .nav-links a,
                        {$parent_selector} .yatri-pagination .nav-links span.current,
                        {$parent_selector} .yatri-pagination .nav-links span.page-numbers.dots
                        ",
                    )
                ),


        );
    }
}