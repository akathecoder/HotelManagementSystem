<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Menu Icon */
$wp_customize->add_section(
    new CosmosWP_WP_Customize_Section_P($wp_customize, 'cosmoswp_menu_icon_seperator', array(
            'title'    => esc_html__('Menu Icon', 'cosmoswp'),
            'panel'    => $this->panel,
            'priority' => 190,
        )
    ));

/*Menu Icon sidebar section*/
$wp_customize->add_section('cosmoswp_header_sidebar', array(
    'title'    => esc_html__('Menu Icon Sidebar', 'cosmoswp'),
    'panel'    => $this->panel,
    'priority' => 195,
));

/*Display Menu*/
$wp_customize->add_setting('menu-icon-display-menu', array(
    'default'           => $header_defaults['menu-icon-display-menu'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_menu_display_options();
$wp_customize->add_control('menu-icon-display-menu', array(
    'choices'  => $choices,
    'label'    => esc_html__('Menu Sidebar Display Style', 'cosmoswp'),
    'section'  => 'cosmoswp_header_sidebar',
    'settings' => 'menu-icon-display-menu',
    'type'     => 'select'
));

/*Responsive Menu Style Heading*/
$wp_customize->add_setting('menu-icon-sidebar-margin-padding-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'menu-icon-sidebar-margin-padding-msg',
        array(
            'label'   => esc_html__('Margin & Padding', 'cosmoswp'),
            'section' => 'cosmoswp_header_sidebar',
        )
    )
);

/* Margin*/
$wp_customize->add_setting('menu-icon-sidebar-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['menu-icon-sidebar-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'menu-icon-sidebar-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => 'cosmoswp_header_sidebar',
            'settings' => 'menu-icon-sidebar-margin',
        ),
        array(),
        array()
    )
);

/* Padding*/
$wp_customize->add_setting('menu-icon-sidebar-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['menu-icon-sidebar-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'menu-icon-sidebar-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => 'cosmoswp_header_sidebar',
            'settings' => 'menu-icon-sidebar-padding',
        ),
        array(),
        array()
    )
);

/*Background Styling*/
$wp_customize->add_setting('menu-icon-sidebar-bg-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'menu-icon-sidebar-bg-styling-msg',
        array(
            'label'   => esc_html__('Menu Item Color Options', 'cosmoswp'),
            'section' => 'cosmoswp_header_sidebar',
        )
    )
);

/*Custom Background*/
$wp_customize->add_setting('menu-icon-sidebar-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $header_defaults['menu-icon-sidebar-color-options'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'menu-icon-sidebar-color-options',
        array(
            'label'    => esc_html__('Color Options', 'cosmoswp'),
            'section'  => 'cosmoswp_header_sidebar',
            'settings' => 'menu-icon-sidebar-color-options',
        ),
        array(
            'background-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Background Color', 'cosmoswp'),
            ),
            'text-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Text Color', 'cosmoswp'),
            ),
            'title-color'      => array(
                'type'  => 'color',
                'label' => esc_html__('Title Color', 'cosmoswp'),
            ),
            'link-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Link Color', 'cosmoswp'),
            ),
            'link-hover-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Link Hover Color', 'cosmoswp'),
            ),
        )
    )
);

/*Background Styling*/
$wp_customize->add_setting('menu-icon-sidebar-submenu-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'menu-icon-sidebar-submenu-styling-msg',
        array(
            'label'   => esc_html__('Sub Menu Item Color Options', 'cosmoswp'),
            'section' => 'cosmoswp_header_sidebar',
        )
    )
);

/*Submenu color*/
$wp_customize->add_setting('menu-icon-sidebar-submenu-bg-color', array(
    'default'           => $header_defaults['menu-icon-sidebar-submenu-bg-color'],
    'sanitize_callback' => 'cosmoswp_sanitize_color',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Color(
        $wp_customize,
        'menu-icon-sidebar-submenu-bg-color',
        array(
            'label'    => esc_html__('SubMenu Background Color', 'cosmoswp'),
            'section'  => 'cosmoswp_header_sidebar',
            'settings' => 'menu-icon-sidebar-submenu-bg-color',
        )
    )
);

/*submenu item*/
$wp_customize->add_setting('menu-icon-sidebar-submenu-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_tabs',
    'default'           => $header_defaults['menu-icon-sidebar-submenu-styling'],
    'transport'         => 'postMessage'
));
$border_style_choices = cosmoswp_header_border_style();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Tabs(
        $wp_customize,
        'menu-icon-sidebar-submenu-styling',
        array(
            'label'       => esc_html__('SubMenu Item Styling', 'cosmoswp'),
            'description' => esc_html__('This styling for submenu items.', 'cosmoswp'),
            'section'     => 'cosmoswp_header_sidebar',
            'settings'    => 'menu-icon-sidebar-submenu-styling',
        ),
        array(
            'tabs'   => array(
                'primary-menu-normal' => array(
                    'label' => esc_html__('Normal', 'cosmoswp'),
                ),
                'primary-menu-hover'  => array(
                    'label' => esc_html__('Hover', 'cosmoswp'),
                ),
                'primary-menu-active' => array(
                    'label' => esc_html__('Active', 'cosmoswp'),
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
                'normal-border-style'  => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'primary-menu-normal',
                ),
                'normal-border-width'  => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'primary-menu-normal',
                    'attr'  => array(
                        'min'       => 0,
                        'max'       => 1000,
                        'step'      => 1,
                        'link'      => 1,
                        'devices'   => array(
                            'desktop' => array(
                                'icon' => 'dashicons-laptop',
                            ),
                        ),
                        'link_text' => esc_html__('Link', 'cosmoswp'),
                    ),
                ),
                'normal-border-color'  => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-normal',
                ),
                'normal-border-radius' => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Radius(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'primary-menu-normal',
                    'attr'  => array(
                        'min'       => 0,
                        'max'       => 1000,
                        'step'      => 1,
                        'link'      => 1,
                        'devices'   => array(
                            'desktop' => array(
                                'icon' => 'dashicons-laptop',
                            ),
                        ),
                        'link_text' => esc_html__('Link', 'cosmoswp'),
                    ),
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
                'hover-border-style'   => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'primary-menu-hover',
                ),
                'hover-border-width'   => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'primary-menu-hover',
                    'attr'  => array(
                        'min'       => 0,
                        'max'       => 1000,
                        'step'      => 1,
                        'link'      => 1,
                        'devices'   => array(
                            'desktop' => array(
                                'icon' => 'dashicons-laptop',
                            ),
                        ),
                        'link_text' => esc_html__('Link', 'cosmoswp'),
                    ),
                ),
                'hover-border-color'   => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-hover',
                ),
                'hover-border-radius'  => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Radius(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'primary-menu-hover',
                    'attr'  => array(
                        'min'       => 0,
                        'max'       => 1000,
                        'step'      => 1,
                        'link'      => 1,
                        'devices'   => array(
                            'desktop' => array(
                                'icon' => 'dashicons-laptop',
                            ),
                        ),
                        'link_text' => esc_html__('Link', 'cosmoswp'),
                    ),
                ),
                'active-text-color'    => array(
                    'type'  => 'color',
                    'label' => esc_html__('Text Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-active',
                ),
                'active-bg-color'      => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-active',
                ),
                'active-border-style'  => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'primary-menu-active',
                ),
                'active-border-width'  => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'primary-menu-active',
                    'attr'  => array(
                        'min'       => 0,
                        'max'       => 1000,
                        'step'      => 1,
                        'link'      => 1,
                        'devices'   => array(
                            'desktop' => array(
                                'icon' => 'dashicons-laptop',
                            ),
                        ),
                        'link_text' => esc_html__('Link', 'cosmoswp'),
                    ),
                ),
                'active-border-color'  => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'primary-menu-active',
                ),
                'active-border-radius' => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Radius(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'primary-menu-active',
                    'attr'  => array(
                        'min'       => 0,
                        'max'       => 1000,
                        'step'      => 1,
                        'link'      => 1,
                        'devices'   => array(
                            'desktop' => array(
                                'icon' => 'dashicons-laptop',
                            ),
                        ),
                        'link_text' => esc_html__('Link', 'cosmoswp'),
                    ),
                ),
            ),
        )
    )
);


