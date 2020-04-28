<?php

namespace Yatri_Tools_Elementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils as Utils;
use Elementor\Repeater as Repeater;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Border;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Yatri_Tools_Elementor_Team_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'yte-team';
    }

    public function get_title()
    {
        return __('Team', 'yatri-tools');
    }

    public function get_icon()
    {
        return 'fas fa-user-tie';
    }

    public function get_categories()
    {
        return [YATRI_TOOLS_ELEMENTOR_CATEGORY];
    }

    public function get_style_depends()
    {
        return ['yte-team'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Yatri Team', 'yatri-tools'),
            ]
        );

        $this->add_control(
            'name',
            [
                'label' => __('Name', 'yatri-tools'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Darth Vader',
            ]
        );

        $this->add_control(
            'avatar_image',
            ['label' => __('Team Avatar', 'yatri-tools'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'avatar_image_size',
                'default' => 'full',
            ]
        );

        $this->add_control(
            'designation',
            [
                'label' => __('Designation', 'yatri-tools'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Digital Overlord',
            ]
        );

        $this->add_control(
            'about',
            [
                'label' => __('About', 'yatri-tools'),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'rows' => '10',
                'default' => 'I\'m cool and I know it.',
            ]
        );

        $this->end_controls_section();

        // Social Media Icons
        $this->start_controls_section(
            'yte_team_social_link',
            [
                'label' => __('Social Profiles', 'yatri-tools'),
            ]
        );

        $this->add_control(
            'show_social_icons',
            [
                'label' => __('Show Social Icons', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'yatri-tools'),
                'label_off' => __('Hide', 'yatri-tools'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'yte_social_title',
            [
                'label' => __('Title', 'yatri-tools'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Facebook',
            ]
        );

        $repeater->add_control(
            'yte_social_link',
            [
                'label' => __('Link', 'yatri-tools'),
                'type' => Controls_Manager::TEXT,
                'default' => __('#', 'yatri-tools'),
            ]
        );

        $repeater->add_control(
            'yte_social_icon',
            [
                'label' => __('Icon', 'elementor'),
                'type' => Controls_Manager::ICONS,
                'recommended' => [
                    'fa-brands' => [
                        'android',
                        'apple',
                        'behance',
                        'bitbucket',
                        'codepen',
                        'delicious',
                        'deviantart',
                        'digg',
                        'dribbble',
                        'elementor',
                        'facebook',
                        'flickr',
                        'foursquare',
                        'free-code-camp',
                        'github',
                        'gitlab',
                        'globe',
                        'google-plus',
                        'houzz',
                        'instagram',
                        'jsfiddle',
                        'linkedin',
                        'medium',
                        'meetup',
                        'mixcloud',
                        'odnoklassniki',
                        'pinterest',
                        'product-hunt',
                        'reddit',
                        'shopping-cart',
                        'skype',
                        'slideshare',
                        'snapchat',
                        'soundcloud',
                        'spotify',
                        'stack-overflow',
                        'steam',
                        'stumbleupon',
                        'telegram',
                        'thumb-tack',
                        'tripadvisor',
                        'tumblr',
                        'twitch',
                        'twitter',
                        'viber',
                        'vimeo',
                        'vk',
                        'weibo',
                        'weixin',
                        'whatsapp',
                        'wordpress',
                        'xing',
                        'yelp',
                        'youtube',
                        '500px',
                    ],
                    'fa-solid' => [
                        'envelope',
                        'link',
                        'rss',
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'yte_icon_color',
            [
                'label' => __('Icon Color', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} i' => 'color: {{VALUES}}',
                    '{{WRAPPER}} {{CURRENT_ITEM}} svg' => 'fill: {{VALUES}}',
                ]
            ]
        );

        $repeater->add_control(
            'yte_icon_background',
            [
                'label' => __('Icon Background', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} i' => 'background-color: {{VALUES}}'
                ]
            ]
        );

        $repeater->add_control(
            'yte_icon_hover_color',
            [
                'label' => __('Icon Hover Color', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} i:hover' => 'color: {{VALUES}}'
                ]
            ]
        );

        $repeater->add_control(
            'yte_icon_hover_background',
            [
                'label' => __('Icon Hover Background', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} i:hover' => 'background-color: {{VALUES}}'
                ]
            ]
        );

        $repeater->add_control(
            'yte_icon_hover_border_color',
            [
                'label' => __('Icon Hover border color', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} i:hover' => 'border-color: {{VALUES}}'
                ]
            ]
        );

        $this->add_control(
            'yte_team_social_link_list',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'yte_social_title' => __('Facebook', 'yatri-tools'),
                        'yte_social_icon' => [
                            'value' => 'fab fa-facebook',
                            'library' => 'fa-brands',
                        ],
                        'yte_social_link' => __('#', 'yatri-tools'),
                    ],
                    [
                        'yte_social_title' => __('Twitter', 'yatri-tools'),
                        'yte_social_icon' => [
                            'value' => 'fab fa-twitter',
                            'library' => 'fa-brands',
                        ],
                        'yte_social_link' => __('#', 'yatri-tools'),
                    ],
                    [
                        'yte_social_title' => __('LinkedIn', 'yatri-tools'),
                        'yte_social_icon' => [
                            'value' => 'fab fa-linkedin-in',
                            'library' => 'fa-brands',
                        ],
                        'yte_social_link' => __('#', 'yatri-tools'),
                    ],
                ],
                'title_field' => '{{{ yte_social_title }}}',
            ]
        );

        $repeater->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'yatri-tools'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'team_align',
            [
                'label' => __('Alignment', 'yatri-tools'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'yatri-tools'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'yatri-tools'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'yatri-tools'),
                        'icon' => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => __('Justified', 'yatri-tools'),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-team' => 'text-align: {{VALUE}};',
                ],
                'default' => 'center',
            ]
        );

        $this->end_controls_section();

        // Image Styling
        $this->start_controls_section(
            'mtteam_image_style',
            [
                'label' => __('Image', 'yatri-tools'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'yte_image_spacing',
            [
                'label' => __('Image Spacing', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-team .avatar-wrapper img' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ]
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => __('Border Radius', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 400,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-team .avatar-wrapper img' => 'border-radius: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_width',
            [
                'label' => __('Image Width', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 300,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-team .avatar-wrapper img' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->end_controls_section();

        // Name Styling
        $this->start_controls_section(
            'yte_team_name_style',
            [
                'label' => __('Name', 'yatri-tools'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'name!' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'team_name_margin',
            [
                'label' => __('Spacing', 'yatri-tools'),
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
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-team .person-name' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'yte_name_htmltag',
            [
                'label' => __('HTML Tag', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h3',
                'options' => [
                    'h1' => __('H1', 'yatri-tools'),
                    'h2' => __('H2', 'yatri-tools'),
                    'h3' => __('H3', 'yatri-tools'),
                    'h4' => __('H4', 'yatri-tools'),
                    'h5' => __('H5', 'yatri-tools'),
                    'h6' => __('H6', 'yatri-tools'),
                    'p' => __('P', 'yatri-tools'),
                    'div' => __('DIV', 'yatri-tools'),
                ],
            ]
        );

        $this->add_control(
            'team_name_color',
            [
                'label' => __('Color', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default' => '#343434',
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-team .person-name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'team_name_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .yatri-tools-elementor-team .person-name',
            ]
        );

        $this->end_controls_section();

        // Designation Styling
        $this->start_controls_section(
            'yte_team_designation_style',
            [
                'label' => __('Designation', 'yatri-tools'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'designation!' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'team_designation_margin',
            [
                'label' => __('Spacing', 'yatri-tools'),
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
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-team .person-designation' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'team_designation_color',
            [
                'label' => __('Color', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default' => '#999A9C',
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-team .person-designation' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'team_designation_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .yatri-tools-elementor-team .person-designation',
            ]
        );

        $this->end_controls_section();

        // About Styling
        $this->start_controls_section(
            'yte_team_about_style',
            [
                'label' => __('About', 'yatri-tools'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'about!' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'team_about_margin',
            [
                'label' => __('Spacing', 'yatri-tools'),
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
                    'size' => 25,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-team .person-about' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'yte_icon_position' => 'after-bio'
                ]
            ]
        );

        $this->add_control(
            'team_about_color',
            [
                'label' => __('Color', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default' => '#343434',
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-team .person-about' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'team_about_typography',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .yatri-tools-elementor-team .person-about',
            ]
        );

        $this->end_controls_section();

        // Social Icons Styling
        $this->start_controls_section(
            'yte_team_socialicons_style',
            [
                'label' => __('Social Icons', 'yatri-tools'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'team_socialicons_fontsize',
            [
                'label' => __('Font Size', 'yatri-tools'),
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
                    'size' => 18,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-team .social-icons-wrapper a i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'team_socialicons_margin',
            [
                'label' => __('Spacing Between Icons', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-team .social-icons-wrapper a i' => 'margin: 0 {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'yte_icon_position',
            [
                'label' => __('Icons Position', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'after-bio',
                'options' => [
                    'before-bio' => __('Before Bio', 'yatri-tools'),
                    'after-bio' => __('After Bio', 'yatri-tools'),
                ],
                'condition' => [
                    'show_social_icons' => 'yes',
                ]
            ]
        );

        $this->add_responsive_control(
            'team_icons_spacing',
            [
                'label' => __('Spacing', 'yatri-tools'),
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
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-team .social-icons-wrapper' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'yte_icon_position' => 'before-bio'
                ]
            ]
        );

        $this->add_control(
            'icon_color_type',
            [
                'label' => __('Icon Color Type', 'yatri-tools'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => __('Brand Colors', 'yatri-tools'),
                    'custom' => __('Custom', 'yatri-tools'),
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __('Icon Color', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-team .social-icons-wrapper a i' => 'color: {{VALUES}}',
                    '{{WRAPPER}} .yatri-tools-elementor-team .social-icons-wrapper a svg' => 'fill: {{VALUES}}'
                ],
                'condition' => [
                    'icon_color_type' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'icon_background',
            [
                'label' => __('Icon Background', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-team .social-icons-wrapper a i' => 'background-color: {{VALUES}}'
                ],
                'condition' => [
                    'icon_color_type' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label' => __('Icon Hover Color', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-team .social-icons-wrapper a i:hover' => 'color: {{VALUES}}'
                ],
                'condition' => [
                    'icon_color_type' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_background',
            [
                'label' => __('Icon Hover Background', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-team .social-icons-wrapper a i:hover' => 'background-color: {{VALUES}}'
                ],
                'condition' => [
                    'icon_color_type' => 'custom',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'avatar_border',
                'label' => __('Border Type', 'yatri-tools'),
                'selector' => '{{WRAPPER}} .yatri-tools-elementor-team .social-icons-wrapper a i',
            ]
        );

        $this->add_control(
            'yte_border_radius',
            [
                'label' => __('Border Radius', 'yatri-tools'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-team .social-icons-wrapper a i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'yte_border_hovercolor',
            [
                'label' => __('Border Hover Color', 'yatri-tools'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-team .social-icons-wrapper a i:hover' => 'border-color: {{VALUES}}'
                ],
                'condition' => [
                    'yte_border_style!' => 'none'
                ],
            ]
        );

        $this->add_control(
            'icons_padding',
            [
                'label' => __('Padding', 'yatri-tools'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .yatri-tools-elementor-team .social-icons-wrapper a i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        echo '<div class="yatri-tools-elementor-team text-center">';

        echo '<div class="avatar-wrapper">';
        echo Group_Control_Image_Size::get_attachment_image_html($settings, 'avatar_image_size', 'avatar_image');
        echo '</div>';

        if ($settings['name'] !== "") {
            echo '<' . $settings['yte_name_htmltag'] . ' class="person-name">' . $settings['name'] . '</' . $settings['yte_name_htmltag'] . '>';
        }

        if ($settings['designation'] !== "") {
            echo '<div class="person-designation">' . $settings['designation'] . '</div>';
        }

        if ($settings['yte_icon_position'] == "after-bio" || $settings['show_social_icons'] !== "yes") {
            if ($settings['about'] !== "") {
                echo '<div class="person-about">' . $settings['about'] . '</div>';
            }
        }

        if ($settings['show_social_icons'] == "yes") {
            echo '<ul class="social-icons-wrapper">';
            foreach ($settings['yte_team_social_link_list'] as $socialprofile) :
                echo '<li class="elementor-repeater-item-' . $socialprofile['_id'] . '" >
						<a href="' . esc_url($socialprofile['yte_social_link']) . '">';
                \Elementor\Icons_Manager::render_icon($socialprofile['yte_social_icon'], ['aria-hidden' => 'true']);
                echo '</a></li>';
            endforeach;
            echo '</ul>';
        }

        if ($settings['yte_icon_position'] == "before-bio") {
            if ($settings['about'] !== "") {
                echo '<div class="person-about">' . $settings['about'] . '</div>';
            }
        }
        echo '</div>';
    }

    protected function _content_template()
    {
    }
}
