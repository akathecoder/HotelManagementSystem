<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Sticky Header Message*/
$wp_customize->add_setting('header-general-sticky-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'header-general-sticky-msg',
        array(
            'label'           => esc_html__('Sticky Header Options', 'cosmoswp'),
            'section'         => 'cosmoswp-header-general',
            'active_callback' => 'cosmoswp_header_layout_if_horizontal'
        )
    )
);

/*Sticky header options*/
$wp_customize->add_setting('sticky-header-options', array(
    'default'           => $header_defaults['sticky-header-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_sticky_header_options();
$wp_customize->add_control('sticky-header-options', array(
    'choices'         => $choices,
    'label'           => esc_html__('Sticky Header Options', 'cosmoswp'),
    'section'         => 'cosmoswp-header-general',
    'settings'        => 'sticky-header-options',
    'type'            => 'select',
    'active_callback' => 'cosmoswp_header_layout_if_horizontal'
));

/*Sticky header animation options*/
$wp_customize->add_setting('sticky-header-animation-options', array(
    'default'           => $header_defaults['sticky-header-animation-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_sticky_header_animation_options();
$wp_customize->add_control('sticky-header-animation-options', array(
    'choices'         => $choices,
    'label'           => esc_html__('Sticky Header Animation Options', 'cosmoswp'),
    'section'         => 'cosmoswp-header-general',
    'settings'        => 'sticky-header-animation-options',
    'type'            => 'select',
    'active_callback' => 'cosmoswp_header_layout_if_horizontal_and_sticky_enable'
));

/*Sticky header Trigger Height*/
$wp_customize->add_setting('sticky-header-trigger-height', array(
    'default'           => $header_defaults['sticky-header-trigger-height'],
    'sanitize_callback' => 'cosmoswp_sanitize_number',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Range(
        $wp_customize,
        'sticky-header-trigger-height',
        array(
            'label'           => esc_html__('Sticky header Trigger Height (px)', 'cosmoswp'),
            'section'         => 'cosmoswp-header-general',
            'settings'        => 'sticky-header-trigger-height',
            'input_attrs'     => array(
                'min'  => 10,
                'max'  => 1000,
                'step' => 1
            ),
            'active_callback' => 'cosmoswp_header_layout_if_horizontal_and_scrollup_down'
        )
    )
);

/*Sticky header include top*/
$wp_customize->add_setting('sticky-header-include-top', array(
    'default'           => $header_defaults['sticky-header-include-top'],
    'sanitize_callback' => 'cosmoswp_sanitize_checkbox',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('sticky-header-include-top', array(
    'label'           => esc_html__('Include Header Top on Sticky Header', 'cosmoswp'),
    'section'         => 'cosmoswp-header-general',
    'settings'        => 'sticky-header-include-top',
    'type'            => 'checkbox',
    'active_callback' => 'cosmoswp_header_layout_if_horizontal_and_sticky_enable'
));

/*Sticky header primary menu only*/
$wp_customize->add_setting('sticky-header-include-main', array(
    'default'           => $header_defaults['sticky-header-include-main'],
    'sanitize_callback' => 'cosmoswp_sanitize_checkbox',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('sticky-header-include-main', array(
    'label'           => esc_html__('Include Header Main on Sticky Header', 'cosmoswp'),
    'section'         => 'cosmoswp-header-general',
    'settings'        => 'sticky-header-include-main',
    'type'            => 'checkbox',
    'active_callback' => 'cosmoswp_header_layout_if_horizontal_and_sticky_enable'
));

/*Sticky header primary menu only*/
$wp_customize->add_setting('sticky-header-include-bottom', array(
    'default'           => $header_defaults['sticky-header-include-bottom'],
    'sanitize_callback' => 'cosmoswp_sanitize_checkbox',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('sticky-header-include-bottom', array(
    'label'           => esc_html__('Include Header Bottom on Sticky Header', 'cosmoswp'),
    'section'         => 'cosmoswp-header-general',
    'settings'        => 'sticky-header-include-bottom',
    'type'            => 'checkbox',
    'active_callback' => 'cosmoswp_header_layout_if_horizontal_and_sticky_enable'
));

/*Sticky header mobile enable*/
$wp_customize->add_setting('sticky-header-mobile-enable', array(
    'default'           => $header_defaults['sticky-header-mobile-enable'],
    'sanitize_callback' => 'cosmoswp_sanitize_checkbox',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('sticky-header-mobile-enable', array(
    'label'           => esc_html__('Enable Sticky Header on Mobile', 'cosmoswp'),
    'section'         => 'cosmoswp-header-general',
    'settings'        => 'sticky-header-mobile-enable',
    'type'            => 'checkbox',
    'active_callback' => 'cosmoswp_header_layout_if_horizontal_and_sticky_enable'
));

/*Sticky header mobile enable*/
$wp_customize->add_setting('enable-sticky-header-color-options', array(
    'default'           => $header_defaults['enable-sticky-header-color-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_checkbox',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('enable-sticky-header-color-options', array(
    'label'           => esc_html__('Enable Sticky Header Color Options', 'cosmoswp'),
    'section'         => 'cosmoswp-header-general',
    'settings'        => 'enable-sticky-header-color-options',
    'type'            => 'checkbox',
    'active_callback' => 'cosmoswp_header_layout_if_horizontal_and_sticky_enable'
));

/*Menu item color*/
$wp_customize->add_setting('sticky-header-bg-color', array(
    'default'           => $header_defaults['sticky-header-bg-color'],
    'sanitize_callback' => 'cosmoswp_sanitize_color',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Color(
        $wp_customize,
        'sticky-header-bg-color',
        array(
            'label'           => esc_html__('Sticky header background color', 'cosmoswp'),
            'section'         => 'cosmoswp-header-general',
            'settings'        => 'sticky-header-bg-color',
            'active_callback' => 'cosmoswp_sticky_header_color_options_enable'
        )
    )
);

/*Header top sticky style*/
$wp_customize->add_setting('sticky-top-header-options-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'sticky-top-header-options-styling-msg',
        array(
            'label'   => esc_html__('Sticky Top header Color Option', 'cosmoswp'),
            'section' => 'cosmoswp-header-general',
            'active_callback' => 'cosmoswp_sticky_header_color_options_enable'
        )
    )
);

/*sticky top header text Color*/
$wp_customize->add_setting('sticky-top-header-text-color', array(
    'default'           => $header_defaults['sticky-top-header-text-color'],
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'sticky-top-header-text-color',
        array(
            'label'    => esc_html__('Text Color', 'cosmoswp'),
            'section'  => 'cosmoswp-header-general',
            'settings' => 'sticky-top-header-text-color',
            'active_callback' => 'cosmoswp_sticky_header_color_options_enable',
            'type'     => 'color'
        )
    )
);

/*sticky top header link Color*/
$wp_customize->add_setting('sticky-top-header-link-color', array(
    'default'           => $header_defaults['sticky-top-header-link-color'],
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'sticky-top-header-link-color',
        array(
            'label'    => esc_html__('Link Color', 'cosmoswp'),
            'section'  => 'cosmoswp-header-general',
            'settings' => 'sticky-top-header-link-color',
            'active_callback' => 'cosmoswp_sticky_header_color_options_enable',
            'type'     => 'color'
        )
    )
);

/*sticky top header link Color*/
$wp_customize->add_setting('sticky-top-header-link-hover-color', array(
    'default'           => $header_defaults['sticky-top-header-link-hover-color'],
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'sticky-top-header-link-hover-color',
        array(
            'label'    => esc_html__('Link Hover Color', 'cosmoswp'),
            'section'  => 'cosmoswp-header-general',
            'settings' => 'sticky-top-header-link-hover-color',
            'active_callback' => 'cosmoswp_sticky_header_color_options_enable',
            'type'     => 'color'
        )
    )
);

$wp_customize->add_setting('sticky-top-header-menu-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_tabs',
    'default'           => $header_defaults['sticky-top-header-menu-color-options'],
    'transport'         => 'postMessage'
));
$border_style_choices = cosmoswp_header_border_style();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Tabs(
        $wp_customize,
        'sticky-top-header-menu-color-options',
        array(
            'label'           => esc_html__('Header Menu Color Options', 'cosmoswp'),
            'description'     => esc_html__('This styling for header menu color options.', 'cosmoswp'),
            'section'         => 'cosmoswp-header-general',
            'settings'        => 'sticky-top-header-menu-color-options',
            'active_callback' => 'cosmoswp_sticky_header_color_options_enable'
        ),
        array(
            'tabs'   => array(
                'primary-menu-normal' => array(
                    'label' => esc_html__('Normal', 'cosmoswp'),
                ),
                'primary-menu-hover'  => array(
                    'label' => esc_html__('Hover', 'cosmoswp'),
                ),
            ),
            'fields' => array(
                'normal-text-color'    => array(
                    'type'  => 'color',
                    'label' => esc_html__('Text Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-normal',
                ),
                'normal-bg-color'      => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-normal',
                ),
                'normal-border-color'  => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-normal',
                ),
                'hover-text-color'     => array(
                    'type'  => 'color',
                    'label' => esc_html__(' Text Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-hover',
                ),
                'hover-bg-color'       => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-hover',
                ),
                'hover-border-color'   => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-hover',
                ),
            ),
        )
    )
);

/*Header Main sticky style*/
$wp_customize->add_setting('sticky-main-header-options-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'sticky-main-header-options-styling-msg',
        array(
            'label'   => esc_html__('Sticky Main header Color Option', 'cosmoswp'),
            'section' => 'cosmoswp-header-general',
            'active_callback' => 'cosmoswp_sticky_header_color_options_enable'
        )
    )
);

/*sticky Main header text Color*/
$wp_customize->add_setting('sticky-main-header-text-color', array(
    'default'           => $header_defaults['sticky-main-header-text-color'],
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'sticky-main-header-text-color',
        array(
            'label'    => esc_html__('Text Color', 'cosmoswp'),
            'section'  => 'cosmoswp-header-general',
            'settings' => 'sticky-main-header-text-color',
            'active_callback' => 'cosmoswp_sticky_header_color_options_enable',
            'type'     => 'color'
        )
    )
);

/*sticky Main header link Color*/
$wp_customize->add_setting('sticky-main-header-link-color', array(
    'default'           => $header_defaults['sticky-main-header-link-color'],
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'sticky-main-header-link-color',
        array(
            'label'    => esc_html__('Link Color', 'cosmoswp'),
            'section'  => 'cosmoswp-header-general',
            'settings' => 'sticky-main-header-link-color',
            'active_callback' => 'cosmoswp_sticky_header_color_options_enable',
            'type'     => 'color'
        )
    )
);

/*sticky Main header link Color*/
$wp_customize->add_setting('sticky-main-header-link-hover-color', array(
    'default'           => $header_defaults['sticky-main-header-link-hover-color'],
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'sticky-main-header-link-hover-color',
        array(
            'label'    => esc_html__('Link Hover Color', 'cosmoswp'),
            'section'  => 'cosmoswp-header-general',
            'settings' => 'sticky-main-header-link-hover-color',
            'active_callback' => 'cosmoswp_sticky_header_color_options_enable',
            'type'     => 'color'
        )
    )
);

$wp_customize->add_setting('sticky-main-header-menu-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_tabs',
    'default'           => $header_defaults['sticky-main-header-menu-color-options'],
    'transport'         => 'postMessage'
));
$border_style_choices = cosmoswp_header_border_style();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Tabs(
        $wp_customize,
        'sticky-main-header-menu-color-options',
        array(
            'label'           => esc_html__('Header Menu Color Options', 'cosmoswp'),
            'description'     => esc_html__('This styling for header menu color options.', 'cosmoswp'),
            'section'         => 'cosmoswp-header-general',
            'settings'        => 'sticky-main-header-menu-color-options',
            'active_callback' => 'cosmoswp_sticky_header_color_options_enable'
        ),
        array(
            'tabs'   => array(
                'primary-menu-normal' => array(
                    'label' => esc_html__('Normal', 'cosmoswp'),
                ),
                'primary-menu-hover'  => array(
                    'label' => esc_html__('Hover', 'cosmoswp'),
                ),
            ),
            'fields' => array(
                'normal-text-color'    => array(
                    'type'  => 'color',
                    'label' => esc_html__('Text Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-normal',
                ),
                'normal-bg-color'      => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-normal',
                ),
                'normal-border-color'  => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-normal',
                ),
                'hover-text-color'     => array(
                    'type'  => 'color',
                    'label' => esc_html__(' Text Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-hover',
                ),
                'hover-bg-color'       => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-hover',
                ),
                'hover-border-color'   => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-hover',
                ),
            ),
        )
    )
);

/*Header Bottom sticky style*/
$wp_customize->add_setting('sticky-bottom-header-options-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'sticky-bottom-header-options-styling-msg',
        array(
            'label'   => esc_html__('Sticky Bottom header Color Option', 'cosmoswp'),
            'section' => 'cosmoswp-header-general',
            'active_callback' => 'cosmoswp_sticky_header_color_options_enable'
        )
    )
);

/*sticky Bottom header text Color*/
$wp_customize->add_setting('sticky-bottom-header-text-color', array(
    'default'           => $header_defaults['sticky-bottom-header-text-color'],
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'sticky-bottom-header-text-color',
        array(
            'label'    => esc_html__('Text Color', 'cosmoswp'),
            'section'  => 'cosmoswp-header-general',
            'settings' => 'sticky-bottom-header-text-color',
            'active_callback' => 'cosmoswp_sticky_header_color_options_enable',
            'type'     => 'color'
        )
    )
);

/*sticky Bottom header link Color*/
$wp_customize->add_setting('sticky-bottom-header-link-color', array(
    'default'           => $header_defaults['sticky-bottom-header-link-color'],
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'sticky-bottom-header-link-color',
        array(
            'label'    => esc_html__('Link Color', 'cosmoswp'),
            'section'  => 'cosmoswp-header-general',
            'settings' => 'sticky-bottom-header-link-color',
            'active_callback' => 'cosmoswp_sticky_header_color_options_enable',
            'type'     => 'color'
        )
    )
);

/*sticky Bottom header link Color*/
$wp_customize->add_setting('sticky-bottom-header-link-hover-color', array(
    'default'           => $header_defaults['sticky-bottom-header-link-hover-color'],
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'sticky-bottom-header-link-hover-color',
        array(
            'label'    => esc_html__('Link Hover Color', 'cosmoswp'),
            'section'  => 'cosmoswp-header-general',
            'settings' => 'sticky-bottom-header-link-hover-color',
            'active_callback' => 'cosmoswp_sticky_header_color_options_enable',
            'type'     => 'color'
        )
    )
);

$wp_customize->add_setting('sticky-bottom-header-menu-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_tabs',
    'default'           => $header_defaults['sticky-bottom-header-menu-color-options'],
    'transport'         => 'postMessage'
));
$border_style_choices = cosmoswp_header_border_style();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Tabs(
        $wp_customize,
        'sticky-bottom-header-menu-color-options',
        array(
            'label'           => esc_html__('Header Menu Color Options', 'cosmoswp'),
            'description'     => esc_html__('This styling for header menu color options.', 'cosmoswp'),
            'section'         => 'cosmoswp-header-general',
            'settings'        => 'sticky-bottom-header-menu-color-options',
            'active_callback' => 'cosmoswp_sticky_header_color_options_enable'
        ),
        array(
            'tabs'   => array(
                'primary-menu-normal' => array(
                    'label' => esc_html__('Normal', 'cosmoswp'),
                ),
                'primary-menu-hover'  => array(
                    'label' => esc_html__('Hover', 'cosmoswp'),
                ),
            ),
            'fields' => array(
                'normal-text-color'    => array(
                    'type'  => 'color',
                    'label' => esc_html__('Text Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-normal',
                ),
                'normal-bg-color'      => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-normal',
                ),
                'normal-border-color'  => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-normal',
                ),
                'hover-text-color'     => array(
                    'type'  => 'color',
                    'label' => esc_html__(' Text Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-hover',
                ),
                'hover-bg-color'       => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-hover',
                ),
                'hover-border-color'   => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-hover',
                ),
            ),
        )
    )
);
