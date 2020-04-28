<?php

class Yatri_Section_Typo_Config
{
    public static function get_typography($id, $selector)
    {
        return
            array(
                array(
                    'name' => "{$id}_font_family",
                    'type' => 'font',
                    'label' => esc_html__('Font Family', 'yatri'),
                    'default' => array(),
                    'class' => 'yatri-half font-family',
                    'mapping_fields' => array(
                        'weight' => "{$id}_font_weight",
                        'language' => "{$id}_font_languages",
                    ),
                    'selector' => "{$selector}",
                    'css_property' => 'font-family:{{value}};'

                ),
                array(
                    'name' => "{$id}_font_weight",
                    'type' => 'font_weight',
                    'label' => esc_html__('Font Weight', 'yatri'),
                    'options' => array(),
                    'class' => 'yatri-half font-weight',
                    'mapping_font_field' => "{$id}",
                    'selector' => "{$selector}",
                    'css_property' => 'font-weight:{{value}};'
                ),
                array(
                    'name' => "{$id}_font_languages",
                    'type' => 'font_languages',
                    'label' => esc_html__('Font Languages', 'yatri'),
                    'default' => array(),
                    'choices' => array(),
                    'mapping_font_field' => "{$id}",
                    'class' => 'font-languages',
                ),
                array(
                    'name' => "{$id}_font_size",
                    'type' => 'range',
                    'label' => esc_html__('Font Size', 'yatri'),
                    'device_settings' => true,
                    'attrs' => array(
                        'max' => 80,
                        'min' => 9,
                        'step' => 1
                    ),
                    'devices' => array('desktop', 'tablet', 'mobile'),
                    'default' => array(),
                    'css_units' => Mantrabrain_Theme_Helper::css_units(),
                    'class' => 'font-size',
                    'selector' => "{$selector}",
                    'css_property' => 'font-size:{{value}}{{unit}};'
                ),
                array(
                    'name' => "{$id}_line_height",
                    'type' => 'range',
                    'label' => esc_html__('Line Height', 'yatri'),
                    'device_settings' => true,
                    'attrs' => array(
                        'max' => 100,
                        'min' => 9,
                        'step' => 1
                    ),
                    'devices' => array('desktop', 'tablet', 'mobile'),
                    'default' => array(),
                    'css_units' => Mantrabrain_Theme_Helper::css_units(),
                    'class' => 'line-height',
                    'selector' => "{$selector}",
                    'css_property' => 'line-height:{{value}}{{unit}};'
                ),
                array(
                    'name' => "{$id}_letter_spacing",
                    'type' => 'range',
                    'label' => esc_html__('Letter Spacing', 'yatri'),
                    'device_settings' => true,
                    'attrs' => array(
                        'max' => 10,
                        'min' => -10,
                        'step' => 1
                    ),
                    'devices' => array('desktop', 'tablet', 'mobile'),
                    'default' => array(),
                    'css_units' => Mantrabrain_Theme_Helper::css_units(),
                    'class' => 'letter-spacing',
                    'selector' => "{$selector}",
                    'css_property' => 'letter-spacing:{{value}}{{unit}};',
                ),
                array(
                    'name' => "{$id}_font_style",
                    'type' => 'select',
                    'label' => esc_html__('Font Style', 'yatri'),
                    'options' => Mantrabrain_Theme_Helper::css_font_style(),
                    'class' => 'yatri-half font-style',
                    'selector' => "{$selector}",
                    'css_property' => 'font-style:{{value}};',
                    'extra_value_attributes' => array(
                        '' => array('data-default' => 'yes')
                    )
                ),
                array(
                    'name' => "{$id}_text_decoration",
                    'type' => 'select',
                    'label' => esc_html__('Text Decoration', 'yatri'),
                    'options' => Mantrabrain_Theme_Helper::css_text_decoration(),
                    'class' => 'yatri-half text-decoration',
                    'selector' => "{$selector}",
                    'css_property' => 'text-decoration:{{value}};',
                    'extra_value_attributes' => array(
                        '' => array('data-default' => 'yes')
                    )
                ),
                array(
                    'name' => "{$id}_text_transform",
                    'type' => 'select',
                    'label' => esc_html__('Text Trasform', 'yatri'),
                    'options' => Mantrabrain_Theme_Helper::css_text_transform(),
                    'class' => 'yatri-half text-transform',
                    'selector' => "{$selector}",
                    'css_property' => 'text-transform:{{value}};',
                    'extra_value_attributes' => array(
                        '' => array('data-default' => 'yes')
                    )
                ),
            );
    }
}