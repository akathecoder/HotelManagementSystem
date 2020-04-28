<?php

namespace Yatri_Tools_Elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Utils as Utils;
use Elementor\Repeater as Repeater;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Yatri_Tools_Elementor_Testimonial_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'yte-testimonial';
    }

    public function get_title()
    {
        return __('Testimonial', 'yatri-tools');
    }

    public function get_icon()
    {
        return 'fas fa-quote-left';
    }

    public function get_categories()
    {
        return [YATRI_TOOLS_ELEMENTOR_CATEGORY];
    }

    public function get_script_depends()
    {
        return ['yte-testimonial', 'yatri-tools-elementor-slickjs'];
    }

    public function get_style_depends()
    {
        return ['yatri-tools-elementor-slickcss', 'yte-testimonial'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_testimonials',
            [
                'label' => __('Yatri Testimonial', 'yatri-tools'),
            ]
        );

        $repeater = new Repeater();

        $repeater->start_controls_tabs('testimonials');

        $repeater->add_control(
            'avatar_image',
            [
                'label' => __('Testimonial Avatar', 'yatri-tools'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'avatar_image_size',
                'default' => 'full',
            ]
        );

        $repeater->add_control(
            'name',
            [
                'label' => __('Name', 'yatri-tools'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Darth Vader',
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => __('Title', 'yatri-tools'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Digital Overlord',
            ]
        );

        $repeater->add_control(
            'company_url',
            [
                'label' => __('Company URL', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-company-link.com', 'yatri-tools'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $repeater->add_control(
            'testimonial_content',
            [
                'label' => __('Content', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'placeholder' => __('Type your description here', 'yatri-tools'),
                'default' => 'Testimonial goes here..'
            ]
        );

        $repeater->end_controls_tabs();

        $this->add_control(
            'testimonials',
            [
                'label' => __('Testimonials', 'yatri-tools'),
                'type' => Controls_Manager::REPEATER,
                'show_label' => true,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'image' => Utils::get_placeholder_image_src(),
                        'name' => __('Darth Vader', 'yatri-tools'),
                        'title' => __('Digital Overlord', 'yatri-tools'),
                        'testimonial_content' => 'The circle is now complete. When I left you, I was but the learner. Now I am the master.',
                    ],
                    [
                        'image' => Utils::get_placeholder_image_src(),
                        'name' => __('Yoda', 'yatri-tools'),
                        'title' => __('Digita Master', 'yatri-tools'),
                        'testimonial_content' => 'If you end your training now — if you choose the quick and easy path as Vader did — you will become an agent of evil.',
                    ],
                ]
            ]
        );

        // $this->add_control(
        // 	'testimonial_skin',
        // 	[
        // 		'label' => __( 'Skin', 'yatri-tools' ),
        // 		'type' => \Elementor\Controls_Manager::SELECT,
        // 		'default' => 'skin-default',
        // 		'options' => [
        // 			'skin-default'  => __( 'Default', 'yatri-tools' ),
        // 			'skin-bubble' => __( 'Bubble', 'yatri-tools' ),
        // 		],
        // 	]
        // );

        $this->add_responsive_control(
            'slides_to_show',
            [
                'label' => __('Slides To Show', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('1', 'yatri-tools'),
                    '2' => __('2', 'yatri-tools'),
                    '3' => __('3', 'yatri-tools'),
                    '4' => __('4', 'yatri-tools'),
                    '5' => __('5', 'yatri-tools'),
                    '6' => __('6', 'yatri-tools'),
                    '7' => __('7', 'yatri-tools'),
                    '8' => __('8', 'yatri-tools'),
                    '9' => __('9', 'yatri-tools'),
                    '10' => __('10', 'yatri-tools'),
                ],
            ]
        );

        $this->add_responsive_control(
            'slides_to_scroll',
            [
                'label' => __('Slides To Scroll', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('1', 'yatri-tools'),
                    '2' => __('2', 'yatri-tools'),
                    '3' => __('3', 'yatri-tools'),
                    '4' => __('4', 'yatri-tools'),
                    '5' => __('5', 'yatri-tools'),
                    '6' => __('6', 'yatri-tools'),
                    '7' => __('7', 'yatri-tools'),
                    '8' => __('8', 'yatri-tools'),
                    '9' => __('9', 'yatri-tools'),
                    '10' => __('10', 'yatri-tools'),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_navigation',
            [
                'label' => __('Navigation', 'yatri-tools'),
            ]
        );

        $this->add_control(
            'show_arrows',
            [
                'label' => __('Show Arrows', 'yatri-tools'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('On', 'yatri-tools'),
                'label_off' => __('Off', 'yatri-tools'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'transition_speed',
            [
                'label' => __('Transition Speed', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 100,
                'step' => 10,
                'default' => 300,
            ]
        );


        $this->add_control(
            'enable_autoplay',
            [
                'label' => __('Enable Autoplay', 'yatri-tools'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('On', 'yatri-tools'),
                'label_off' => __('Off', 'yatri-tools'),
                'return_value' => 'true',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label' => __('Autoplay Speed', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 100,
                'step' => 10,
                'default' => 2000,
                'condition' => [
                    'enable_autoplay' => 'true'
                ]
            ]
        );

        $this->add_control(
            'pause_on_hover',
            [
                'label' => __('Pause on Hover', 'yatri-tools'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('On', 'yatri-tools'),
                'label_off' => __('Off', 'yatri-tools'),
                'return_value' => 'true',
                'default' => 'yes',
                'condition' => [
                    'enable_autoplay' => 'true'
                ]
            ]
        );

        $this->add_control(
            'infinite_loop',
            [
                'label' => __('Infinite Loop', 'yatri-tools'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('On', 'yatri-tools'),
                'label_off' => __('Off', 'yatri-tools'),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );

        $this->end_controls_section();

        // Testimonial Styling
        $this->start_controls_section(
            'testimonial_style',
            [
                'label' => __('Testimonial', 'yatri-tools'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'space_between_slides',
            [
                'label' => __('Space Between Slides', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-testimonial-wrapper .yte-testimonial-slide' => 'margin: 0 {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'testimonial_bg_color',
            [
                'label' => __('Background Color', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-testimonial .yte-testimonial-slide' => 'background-color: {{VALUES}}'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'yte_testimonial_border',
                'label' => __('Border', 'plugin-domain'),
                'selector' => '{{WRAPPER}} .yatri-tools-elementor-testimonial .yte-testimonial-slide',
            ]
        );

        $this->add_responsive_control(
            'border_radius',
            [
                'label' => __('Border Radius', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 50,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-testimonial-wrapper .yte-testimonial-slide' => 'border-radius: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'testimonial_padding',
            [
                'label' => __('Padding', 'yatri-tools'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-testimonial .yte-testimonial-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Avatar Styling
        $this->start_controls_section(
            'avatar_styling',
            [
                'label' => __('Avatar', 'yatri-tools'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'avatar_size',
            [
                'label' => __('Size', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 70,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-testimonial-wrapper .yte-testimonial-slide .yte-testimonial-avatar img' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'avatar_gap',
            [
                'label' => __('Gap', 'yatri-tools'),
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
                    'size' => 1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-testimonial-wrapper .yte-testimonial-slide .yte-testimonial-avatar img' => 'margin: {{SIZE}}{{UNIT}} auto',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'avatar_border',
                'label' => __('Border Type', 'yatri-tools'),
                'selector' => '{{WRAPPER}} .yatri-tools-elementor-testimonial-wrapper .yte-testimonial-slide .yte-testimonial-avatar img',
            ]
        );

        $this->add_responsive_control(
            'avatar_border_radius',
            [
                'label' => __('Border Radius', 'yatri-tools'),
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
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-testimonial-wrapper .yte-testimonial-slide .yte-testimonial-avatar img' => 'border-radius: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->end_controls_section();

        // Content Styling
        $this->start_controls_section(
            'content_styling',
            [
                'label' => __('Content', 'yatri-tools'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_gap',
            [
                'label' => __('Gap', 'yatri-tools'),
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
                    'size' => 1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-testimonial-wrapper .yte-testimonial-slide .yte-person-testimonial' => 'margin: {{SIZE}}{{UNIT}} 0{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'testimonial_content_color',
            [
                'label' => __('Color', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-testimonial .yte-testimonial-slide .yte-person-testimonial blockquote' => 'color: {{VALUES}}'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'testimonial_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .yatri-tools-elementor-testimonial .yte-testimonial-slide .yte-person-testimonial blockquote',
            ]
        );

        $this->add_control(
            'testimonial_primary_color',
            [
                'label' => __('Primary Color', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-testimonial .yte-testimonial-slide .yte-person-testimonial blockquote:before' => 'color: {{VALUES}}',
                    '{{WRAPPER}} .yatri-tools-elementor-testimonial .yte-testimonial-slide .yte-person-testimonial blockquote' => 'border-color: {{VALUES}}'
                ]
            ]
        );

        $this->end_controls_section();

        // Author Styling
        $this->start_controls_section(
            'author_style',
            [
                'label' => __('Author', 'yatri-tools'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'author_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .yatri-tools-elementor-testimonial .yte-person-name',
            ]
        );

        $this->add_control(
            'author_color',
            [
                'label' => __('Color', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-testimonial .yte-person-name' => 'color: {{VALUES}}'
                ]
            ]
        );

        $this->end_controls_section();

        // Author title Styling
        $this->start_controls_section(
            'author_title_style',
            [
                'label' => __('Author Title', 'yatri-tools'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'author_title_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .yatri-tools-elementor-testimonial .yte-person-title',
            ]
        );

        $this->add_control(
            'author_title_color',
            [
                'label' => __('Color', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'default' => '#6A5E5E',
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-testimonial .yte-person-title' => 'color: {{VALUES}}'
                ]
            ]
        );

        $this->end_controls_section();

        // Pagination Styling
        $this->start_controls_section(
            'arrows_style',
            [
                'label' => __('Pagination', 'yatri-tools'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'arrows_fontsize',
            [
                'label' => __('Arrows - Font Size', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-testimonial-wrapper .prev-next a i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_fontsize',
            [
                'label' => __('Dots - Font Size', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-testimonial .slick-dots li button::before' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'arrows_color',
            [
                'label' => __('Color', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-testimonial-wrapper .prev-next a i' => 'color: {{VALUES}}'
                ]
            ]
        );

        $this->add_control(
            'prev_icon',
            [
                'label' => __('Previous Icon', 'yatri-tools'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-chevron-left',
                    'library' => 'solid',
                ],
            ]
        );

        $this->add_control(
            'next_icon',
            [
                'label' => __('Next Icon', 'yatri-tools'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-chevron-right',
                    'library' => 'solid',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if (empty($settings['testimonials'])) {
            return;
        }

        $autoplaySlides = ($settings['enable_autoplay'] == "true" ? 'true' : 'false');
        $pauseOnHover = ($settings['pause_on_hover'] == "true" ? 'true' : 'false');
        $infiniteLoop = ($settings['infinite_loop'] == "true" ? 'true' : 'false');


        echo '<div class="yatri-tools-elementor-testimonial-wrapper" id="yatri-tools-elementor-testimonial-' . $this->get_id() . '">';

        if ($settings['show_arrows'] === 'yes') {
            echo '<div class="prev-next prev-icon">';
            echo '<a class="prev" role="button">';
            \Elementor\Icons_Manager::render_icon($settings['prev_icon'], ['aria-hidden' => 'true']);
            echo '</a>';
            echo '</div>';
        }

        echo '<div class="yatri-tools-elementor-testimonial" data-show-slides="' . $settings['slides_to_show'] . '" data-scroll-slides="' . $settings['slides_to_scroll'] . '" data-autoplay-status="' . $autoplaySlides . '" data-autoplay-speed="' . $settings['autoplay_speed'] . '" data-hover-pause="' . $pauseOnHover . '" data-infinite-looping="' . $infiniteLoop . '" data-transition-speed="' . $settings['transition_speed'] . '">';
        foreach ($settings['testimonials'] as $index => $item) {

            $slideId = substr($this->get_id_int(), 0, 3) . $index + 1;

            echo '<div class="yte-testimonial-slide testimonial-slide-' . $slideId . '">';

            echo '<div class="yte-person-testimonial">';
            echo '<blockquote>' . $item['testimonial_content'] . '</blockquote>';
            echo '</div>';

            echo '<div class="yte-testimonial-avatar">';
            echo Group_Control_Image_Size::get_attachment_image_html($item, 'avatar_image_size', 'avatar_image');
            echo '<div class="yte-person-name"><strong>' . $item['name'] . '</strong></div>';
            echo '</div>';

            if (!empty($item['company_url']['url'])) {
                $target = $item['company_url']['is_external'] ? ' target="_blank"' : '';
                $nofollow = $item['company_url']['nofollow'] ? ' rel="nofollow"' : '';

                echo '<div class="yte-person-title"><a href="' . $item['company_url']['url'] . '"' . $target . $nofollow . '>' . $item['title'] . '</a></div>';
            } else {
                echo '<div class="yte-person-title">' . $item['title'] . '</div>';
            }

            echo '</div>';
        }
        echo '</div>';

        if ($settings['show_arrows'] === 'yes') {
            echo '<div class="prev-next next-icon">';
            echo '<a class="next" role="button">';
            \Elementor\Icons_Manager::render_icon($settings['next_icon'], ['aria-hidden' => 'true']);
            echo '</a>';
            echo '</div>';
        }

        echo '</div>';
    }

    protected function _content_template()
    {
    }
}
