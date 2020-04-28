<?php

namespace Yatri_Tools_Elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Utils as Utils;
use \Elementor\Group_Control_Typography;
use \Elementor\Scheme_Typography;
use \Elementor\Scheme_Color;
use \Elementor\Group_Control_Border;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Yatri_Tools_Elementor_Counter_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'yte-counter';
    }

    public function get_title()
    {
        return __('Counter', 'yatri-tools');
    }

    public function get_icon()
    {
        return 'fab fa-draft2digital';
    }

    public function get_categories()
    {
        return [YATRI_TOOLS_ELEMENTOR_CATEGORY];
    }

    public function get_style_depends()
    {
        return ['yte-counter'];
    }

    public function get_script_depends()
    {
        return ['yte-counter'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Yatri Counter', 'yatri-tools'),
            ]
        );

        $this->add_control(
            'counter_title',
            [
                'label' => __('Title', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Cups of Coffee', 'yatri-tools'),
                'placeholder' => __('Title', 'yatri-tools'),
            ]
        );

        $this->add_control(
            'starting_number',
            [
                'label' => __('Starting Number', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 1,
            ]
        );

        $this->add_control(
            'ending_number',
            [
                'label' => __('Ending Number', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 1000,
            ]
        );

        $this->add_control(
            'number_prefix',
            [
                'label' => __('Number Prefix', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('₹', 'yatri-tools'),
            ]
        );

        $this->add_control(
            'number_suffix',
            [
                'label' => __('Number Suffix', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => __('/-')
            ]
        );

        $this->add_control(
            'show_counter_icon',
            [
                'label' => __('Show Icon', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'yatri-tools'),
                'label_off' => __('Hide', 'yatri-tools'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'counter_icon',
            [
                'label' => __('Icon', 'yatri-tools'),
                'type' => Controls_Manager::ICONS,
                'condition' => [
                    'show_counter_icon' => 'yes'
                ],
                'default' => [
                    'value' => 'fas fa-coffee',
                    'library' => 'solid',
                ],
            ]
        );

        $this->add_control(
            'number_separator',
            [
                'label' => __('Thousand Separator', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none' => __('None', 'yatri-tools'),
                    'comma' => __('Comma', 'yatri-tools'),
                    'dot' => __('Dot', 'yatri-tools'),
                ],
            ]
        );

        $this->add_control(
            'mtanimation_duration',
            [
                'label' => __('Animation Duration', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 2000,
            ]
        );

        $this->end_controls_section();

        // Icon Styling
        $this->start_controls_section(
            'counter_icon_style',
            [
                'label' => __('Icon Styling', 'yatri-tools'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_counter_icon' => 'yes'
                ],
            ]
        );

        $this->add_responsive_control(
            'yte_space_between',
            [
                'label' => __('Icon Spacing', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-counter .yte-counter-icon' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'show_counter_icon' => 'yes'
                ],
            ]
        );

        $this->add_responsive_control(
            'counter_icon_size',
            [
                'label' => __('Size', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 300,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 40,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-counter .yte-counter-icon i' => 'font-size: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'counter_padding',
            [
                'label' => __('Padding', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-counter .yte-counter-icon i' => 'padding: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'counter_icon_color',
            [
                'label' => __('Color', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-counter .yte-counter-icon i' => 'color: {{VALUES}}'
                ]
            ]
        );

        $this->add_control(
            'counter_icon_bgcolor',
            [
                'label' => __('Background Color', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-counter .yte-counter-icon i' => 'background-color: {{VALUES}}'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'icon_border_type',
                'label' => __('Icon Border Type', 'yatri-tools'),
                'selector' => '{{WRAPPER}} .yatri-tools-elementor-counter .yte-counter-icon i',
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => __('Border Radius', 'yatri-tools'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-counter .yte-counter-icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Counter Styling
        $this->start_controls_section(
            'counter_style',
            [
                'label' => __('Counter Styling', 'yatri-tools'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'counter_color',
            [
                'label' => __('Color', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-counter .counter' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'counter_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .yatri-tools-elementor-counter .counter *',
            ]
        );

        $this->add_control(
            'counter_position',
            [
                'label' => __('Counter Position', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'above',
                'options' => [
                    'above' => __('Above Title', 'yatri-tools'),
                    'below' => __('Below Title', 'yatri-tools'),
                ],
            ]
        );

        $this->end_controls_section();

        // Title Styling
        $this->start_controls_section(
            'counter_title_style',
            [
                'label' => __('Title Styling', 'yatri-tools'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Color', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-counter .counter-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .yatri-tools-elementor-counter .counter-title',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $counter = '<div class="counter"> ' .
            (!empty($settings['number_prefix']) ? '<span class="count-prefix">' . $settings['number_prefix'] . '</span>' : '') .

            '<span class="count" data-num-separator="' . $settings['number_separator'] . '" data-start-number="' . $settings['starting_number'] . '" data-end-number="' . $settings['ending_number'] . '" data-animation="' . $settings['mtanimation_duration'] . '">' . $settings['ending_number'] . '</span>' .

            (!empty($settings['number_suffix']) ? '<span class="count-suffix">' . $settings['number_suffix'] . '</span>' : '') .
            '</div>';

        // Icon Rendering Starts
        echo '<div class="yatri-tools-elementor-counter">';

        // if icon is set
        if ('yes' === $settings['show_counter_icon'] && !empty($settings['counter_icon']['value'])) {
            echo '<div class="yte-counter-icon">';
            \Elementor\Icons_Manager::render_icon($settings['counter_icon'], ['aria-hidden' => 'true']);
            echo '</div>';
        }

        echo '<div class="mtcounter-content">';
        // For counter position above title
        if ('above' === $settings['counter_position']) {
            echo $counter;
        }

        echo '<div class="counter-title">' . $settings['counter_title'] . '</div>';

        // For counter position below title
        if ('below' === $settings['counter_position']) {
            echo $counter;
        }
        echo '</div>';
        echo '</div>';
    }

    protected function _content_template()
    {
    }
}
