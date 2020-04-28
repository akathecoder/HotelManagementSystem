<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Adding sections for secondary menu options*/
$wp_customize->add_section($this->secondary_menu, array(
    'priority'   => 82,
    'capability' => 'edit_theme_options',
    'title'      => esc_html__('Secondary Menu', 'cosmoswp'),
    'panel'      => $this->panel,
));

/*Secondary Menu*/
$choices = cosmoswp_get_nav_menus();
$wp_customize->add_setting('secondary-menu-custom-menu', array(
    'capability'        => 'edit_theme_options',
    'default'           => $header_defaults['secondary-menu-custom-menu'],
    'sanitize_callback' => 'wp_kses_post',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('secondary-menu-custom-menu', array(
    'label'    => esc_html__('Select Secondary Menu', 'cosmoswp'),
    'section'  => $this->secondary_menu,
    'settings' => 'secondary-menu-custom-menu',
    'type'     => 'select',
    'choices'  => $choices,
));

/*Disable Sub menu */
$wp_customize->add_setting('secondary-menu-disable-sub-menu', array(
    'default'           => $header_defaults['secondary-menu-disable-sub-menu'],
    'sanitize_callback' => 'cosmoswp_sanitize_checkbox',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('secondary-menu-disable-sub-menu', array(
    'label'    => esc_html__('Disable Sub Menu Item', 'cosmoswp'),
    'section'  => $this->secondary_menu,
    'settings' => 'secondary-menu-disable-sub-menu',
    'type'     => 'checkbox'
));

/*Margin and Padding msg*/
$wp_customize->add_setting('secondary-menu-margin-padding-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'secondary-menu-margin-padding-msg',
        array(
            'label'   => esc_html__('Margin & Padding', 'cosmoswp'),
            'section' => $this->secondary_menu,
        )
    )
);

/* Margin*/
$wp_customize->add_setting('secondary-menu-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['secondary-menu-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'secondary-menu-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->secondary_menu,
            'settings' => 'secondary-menu-margin',
        ),
        array(),
        array()
    )
);

/* Padding*/
$wp_customize->add_setting('secondary-menu-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['secondary-menu-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'secondary-menu-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->secondary_menu,
            'settings' => 'secondary-menu-padding',
        ),
        array(),
        array()
    )
);

/*Secondary menu Styling*/
$wp_customize->add_setting('secondary-menu-layout-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'secondary-menu-layout-msg',
        array(
            'label'   => esc_html__('Secondary Menu Item Layout', 'cosmoswp'),
            'section' => $this->secondary_menu,
        )
    )
);

/*Secondary Menu align*/
$wp_customize->add_setting('secondary-menu-align', array(
    'default'           => $header_defaults['secondary-menu-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_flex_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'secondary-menu-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Secondary Menu Alignment', 'cosmoswp'),
            'section'  => $this->secondary_menu,
            'settings' => 'secondary-menu-align',
        )
    )
);

/* Margin*/
$wp_customize->add_setting('secondary-menu-item-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['secondary-menu-item-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'secondary-menu-item-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->secondary_menu,
            'settings' => 'secondary-menu-item-margin',
        ),
        array(),
        array()
    )
);

/* Padding*/
$wp_customize->add_setting('secondary-menu-item-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['secondary-menu-item-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'secondary-menu-item-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->secondary_menu,
            'settings' => 'secondary-menu-item-padding',
        ),
        array(),
        array()
    )
);

/*Secondary Menu Styling*/
$wp_customize->add_setting('secondary-menu-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'secondary-menu-styling-msg',
        array(
            'label'   => esc_html__('Secondary Menu Styling', 'cosmoswp'),
            'section' => $this->secondary_menu,
        )
    )
);

/*Secondary menu item*/
$wp_customize->add_setting('secondary-menu-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_tabs',
    'default'           => $header_defaults['secondary-menu-styling'],
    'transport'         => 'postMessage'
));
$border_style_choices = cosmoswp_header_border_style();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Tabs(
        $wp_customize,
        'secondary-menu-styling',
        array(
            'label'       => esc_html__('Secondary Menu Color Styling', 'cosmoswp'),
            'description' => esc_html__('This styling for main menu items.', 'cosmoswp'),
            'section'     => $this->secondary_menu,
            'settings'    => 'secondary-menu-styling',
        ),
        array(
            'tabs'   => array(
                'secondary-menu-normal' => array(
                    'label' => esc_html__('Normal', 'cosmoswp'),
                ),
                'secondary-menu-hover'  => array(
                    'label' => esc_html__('Hover', 'cosmoswp'),
                ),
                'secondary-menu-active' => array(
                    'label' => esc_html__('Active', 'cosmoswp'),
                ),
            ),
            'fields' => array(
                'normal-text-color'    => array(
                    'type'  => 'color',
                    'label' => esc_html__('Text Color', 'cosmoswp'),
                    'tab'   => 'secondary-menu-normal',
                ),
                'normal-bg-color'      => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'secondary-menu-normal',
                ),
                'normal-border-style'  => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'secondary-menu-normal',
                ),
                'normal-border-width'  => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'secondary-menu-normal',
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
                    'tab'   => 'secondary-menu-normal',
                ),
                'normal-border-radius' => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Radius(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'secondary-menu-normal',
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
                    'tab'   => 'secondary-menu-hover',
                ),
                'hover-bg-color'       => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'secondary-menu-hover',
                ),
                'hover-border-style'   => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'secondary-menu-hover',
                ),
                'hover-border-width'   => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'secondary-menu-hover',
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
                    'tab'   => 'secondary-menu-hover',
                ),
                'hover-border-radius'  => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Radius(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'secondary-menu-hover',
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
                    'tab'   => 'secondary-menu-active',
                ),
                'active-bg-color'      => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'secondary-menu-active',
                ),
                'active-border-style'  => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'secondary-menu-active',
                ),
                'active-border-width'  => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'secondary-menu-active',
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
                    'tab'   => 'secondary-menu-active',
                ),
                'active-border-radius' => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Radius(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'secondary-menu-active',
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

/*Inherit Options*/
$choices = cosmoswp_inherit_options();
$wp_customize->add_setting('secondary-menu-typography-options', array(
    'default'           => $header_defaults['secondary-menu-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('secondary-menu-typography-options', array(
    'label'    => esc_html__('Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->secondary_menu,
    'settings' => 'secondary-menu-typography-options',
    'choices'  => $choices
));

/*Typography data*/
$wp_customize->add_setting('secondary-menu-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $header_defaults['secondary-menu-typography'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'secondary-menu-typography',
        array(
            'label'           => esc_html__('Typography', 'cosmoswp'),
            'section'         => $this->secondary_menu,
            'settings'        => 'secondary-menu-typography',
            'active_callback' => 'cosmoswp_secondary_menu_typography_if_custom'
        ),
        cosmoswp_typography_group_fields()
    )
);


/*secondary menu Styling*/
$wp_customize->add_setting('secondary-menu-sub-menu-layout-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'secondary-menu-sub-menu-layout-msg',
        array(
            'label'   => esc_html__('Sub Menu Item Layout', 'cosmoswp'),
            'section' => $this->secondary_menu,
        )
    )
);

/*Margin*/
$wp_customize->add_setting('secondary-menu-sub-menu-item-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['secondary-menu-sub-menu-item-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'secondary-menu-sub-menu-item-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->secondary_menu,
            'settings' => 'secondary-menu-sub-menu-item-margin',
        ),
        array(),
        array()
    )
);

/*Padding*/
$wp_customize->add_setting('secondary-menu-sub-menu-item-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['secondary-menu-sub-menu-item-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'secondary-menu-sub-menu-item-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->secondary_menu,
            'settings' => 'secondary-menu-sub-menu-item-padding',
        ),
        array(),
        array()
    )
);

/*SubMenu Item Styling*/
$wp_customize->add_setting('secondary-menu-submenu-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'secondary-menu-submenu-styling-msg',
        array(
            'label'   => esc_html__('SubMenu Item Styling', 'cosmoswp'),
            'section' => $this->secondary_menu,
        )
    )
);

/*Secondary SubMenu Display Options*/
$wp_customize->add_setting('secondary-menu-submenu-display-options', array(
    'default'           => $header_defaults['secondary-menu-submenu-display-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_submenu_display_options();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'secondary-menu-submenu-display-options',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('SubMenu Display Option', 'cosmoswp'),
            'section'  => $this->secondary_menu,
            'settings' => 'secondary-menu-submenu-display-options',
        )
    )
);

/*Icon*/
$wp_customize->add_setting('secondary-menu-submenu-icon-indicator', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['secondary-menu-submenu-icon-indicator'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Customize_Icons_Control(
        $wp_customize,
        'secondary-menu-submenu-icon-indicator',
        array(
            'label'    => esc_html__('SubMenu Indicator Icon', 'cosmoswp'),
            'section'  => $this->secondary_menu,
            'settings' => 'secondary-menu-submenu-icon-indicator'
        )
    )
);

/*border shadow*/
$wp_customize->add_setting('secondary-menu-submenu-bg-color', array(
    'default'           => $header_defaults['secondary-menu-submenu-bg-color'],
    'sanitize_callback' => 'cosmoswp_sanitize_color',
    'transport'         => 'postMessage'
));

$wp_customize->add_control(
    new CosmosWP_Custom_Control_Color(
        $wp_customize,
        'secondary-menu-submenu-bg-color',
        array(
            'label'    => esc_html__('SubMenu Background Color', 'cosmoswp'),
            'section'  => $this->secondary_menu,
            'settings' => 'secondary-menu-submenu-bg-color',
        )
    )
);

/*submenu item*/
$wp_customize->add_setting('secondary-menu-submenu-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_tabs',
    'default'           => $header_defaults['secondary-menu-submenu-styling'],
    'transport'         => 'postMessage'
));
$border_style_choices = cosmoswp_header_border_style();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Tabs(
        $wp_customize,
        'secondary-menu-submenu-styling',
        array(
            'label'       => esc_html__('SubMenu Item Styling', 'cosmoswp'),
            'description' => esc_html__('This styling for submenu items.', 'cosmoswp'),
            'section'     => $this->secondary_menu,
            'settings'    => 'secondary-menu-submenu-styling',
        ),
        array(
            'tabs'   => array(
                'secondary-menu-normal' => array(
                    'label' => esc_html__('Normal', 'cosmoswp'),
                ),
                'secondary-menu-hover'  => array(
                    'label' => esc_html__('Hover', 'cosmoswp'),
                ),
                'secondary-menu-active' => array(
                    'label' => esc_html__('Active', 'cosmoswp'),
                ),
            ),
            'fields' => array(
                'normal-text-color'    => array(
                    'type'  => 'color',
                    'label' => esc_html__('Text Color', 'cosmoswp'),
                    'tab'   => 'secondary-menu-normal',
                ),
                'normal-bg-color'      => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'secondary-menu-normal',
                ),
                'normal-border-style'  => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'secondary-menu-normal',
                ),
                'normal-border-width'  => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'secondary-menu-normal',
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
                    'tab'   => 'secondary-menu-normal',
                ),
                'normal-border-radius' => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Radius(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'secondary-menu-normal',
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
                    'tab'   => 'secondary-menu-hover',
                ),
                'hover-bg-color'       => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'secondary-menu-hover',
                ),
                'hover-border-style'   => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'secondary-menu-hover',
                ),
                'hover-border-width'   => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'secondary-menu-hover',
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
                    'tab'   => 'secondary-menu-hover',
                ),
                'hover-border-radius'  => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Radius(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'secondary-menu-hover',
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
                    'tab'   => 'secondary-menu-active',
                ),
                'active-bg-color'      => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'secondary-menu-active',
                ),
                'active-border-style'  => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'secondary-menu-active',
                ),
                'active-border-width'  => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'secondary-menu-active',
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
                    'tab'   => 'secondary-menu-active',
                ),
                'active-border-radius' => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Radius(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'secondary-menu-active',
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

/*Inherit Options*/
$choices = cosmoswp_inherit_options();
$wp_customize->add_setting('secondary-menu-submenu-typography-options', array(
    'default'           => $header_defaults['secondary-menu-submenu-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('secondary-menu-submenu-typography-options', array(
    'label'    => esc_html__('Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->secondary_menu,
    'settings' => 'secondary-menu-submenu-typography-options',
    'choices'  => $choices
));

/*Typography data*/
$wp_customize->add_setting('secondary-menu-submenu-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $header_defaults['secondary-menu-submenu-typography'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'secondary-menu-submenu-typography',
        array(
            'label'           => esc_html__('SubMenu Item Typography', 'cosmoswp'),
            'section'         => $this->secondary_menu,
            'settings'        => 'secondary-menu-submenu-typography',
            'active_callback' => 'cosmoswp_secondary_submenu_typography_if_custom'
        ),
        cosmoswp_typography_group_fields()
    )
);