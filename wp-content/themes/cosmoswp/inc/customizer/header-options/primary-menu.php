<?php
if (!defined('ABSPATH')) {
    exit;
}

/* Primary Menu Section*/
$wp_customize->add_section($this->primary_menu, array(
    'capability' => 'edit_theme_options',
    'title'      => esc_html__('Primary Menu', 'cosmoswp'),
    'panel'      => $this->panel,
    'priority'   => 80,
));

/*Select Menu*/
$choices = cosmoswp_primary_nav_menu_options();
$wp_customize->add_setting($this->primary_menu, array(
    'capability'        => 'edit_theme_options',
    'default'           => $header_defaults['primary_menu'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$wp_customize->add_control($this->primary_menu, array(
    'label'    => esc_html__('Select Primary Menu', 'cosmoswp'),
    'section'  => $this->primary_menu,
    'settings' => $this->primary_menu,
    'type'     => 'select',
    'choices'  => $choices
));

/*Custom Menu*/
$choices = cosmoswp_get_nav_menus();
$wp_customize->add_setting('primary-menu-custom-menu', array(
    'capability'        => 'edit_theme_options',
    'default'           => $header_defaults['primary-menu-custom-menu'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('primary-menu-custom-menu', array(
    'label'           => esc_html__('Select Custom Menu', 'cosmoswp'),
    'section'         => $this->primary_menu,
    'settings'        => 'primary-menu-custom-menu',
    'type'            => 'select',
    'choices'         => $choices,
    'active_callback' => 'cosmoswp_primary_menu_if_custom_menu'
));

/*Disable Sub menu */
$wp_customize->add_setting('primary-menu-disable-sub-menu', array(
    'default'           => $header_defaults['primary-menu-disable-sub-menu'],
    'sanitize_callback' => 'cosmoswp_sanitize_checkbox',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('primary-menu-disable-sub-menu', array(
    'label'    => esc_html__('Disable Sub Menu Item', 'cosmoswp'),
    'section'  => $this->primary_menu,
    'settings' => 'primary-menu-disable-sub-menu',
    'type'     => 'checkbox'
));

/*Margin and Padding msg*/
$wp_customize->add_setting('primary-menu-margin-padding-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'primary-menu-margin-padding-msg',
        array(
            'label'   => esc_html__('Margin & Padding', 'cosmoswp'),
            'section' => $this->primary_menu,
        )
    )
);

/*Margin*/
$wp_customize->add_setting('primary-menu-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['primary-menu-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'primary-menu-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->primary_menu,
            'settings' => 'primary-menu-margin',
        ),
        array(),
        array()
    )
);

/*Padding*/
$wp_customize->add_setting('primary-menu-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['primary-menu-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'primary-menu-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->primary_menu,
            'settings' => 'primary-menu-padding',
        ),
        array(),
        array()
    )
);

/*Primary menu Styling*/
$wp_customize->add_setting('primary-menu-layout-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'primary-menu-layout-msg',
        array(
            'label'   => esc_html__('Primary Menu Item Layout', 'cosmoswp'),
            'section' => $this->primary_menu,
        )
    )
);

/*Primary Menu align*/
$wp_customize->add_setting('primary-menu-align', array(
    'default'           => $header_defaults['primary-menu-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_flex_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'primary-menu-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Menu Alignment', 'cosmoswp'),
            'section'  => $this->primary_menu,
            'settings' => 'primary-menu-align',
        )
    )
);

/*Margin*/
$wp_customize->add_setting('primary-menu-item-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['primary-menu-item-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'primary-menu-item-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->primary_menu,
            'settings' => 'primary-menu-item-margin',
        ),
        array(),
        array()
    )
);

/*Padding*/
$wp_customize->add_setting('primary-menu-item-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['primary-menu-item-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'primary-menu-item-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->primary_menu,
            'settings' => 'primary-menu-item-padding',
        ),
        array(),
        array()
    )
);

/*primary menu Styling*/
$wp_customize->add_setting('primary-menu-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'primary-menu-styling-msg',
        array(
            'label'   => esc_html__('Menu Item Styling', 'cosmoswp'),
            'section' => $this->primary_menu,
        )
    )
);

/*Tabs*/
$wp_customize->add_setting('primary-menu-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_tabs',
    'default'           => $header_defaults['primary-menu-styling'],
    'transport'         => 'postMessage'
));
$border_style_choices = cosmoswp_header_border_style();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Tabs(
        $wp_customize,
        'primary-menu-styling',
        array(
            'label'       => esc_html__('Menu Item Color Styling', 'cosmoswp'),
            'description' => esc_html__('This styling for main menu items.', 'cosmoswp'),
            'section'     => $this->primary_menu,
            'settings'    => 'primary-menu-styling',
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
                    'tab'   => 'primary-menu-normal',
                    'class' => 'cwp-element-show',
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

/*Inherit Options*/
$choices = cosmoswp_inherit_options();
$wp_customize->add_setting('primary-menu-typography-options', array(
    'default'           => $header_defaults['primary-menu-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('primary-menu-typography-options', array(
    'label'    => esc_html__('Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->primary_menu,
    'settings' => 'primary-menu-typography-options',
    'choices'  => $choices
));

/*Typography data*/
$wp_customize->add_setting('primary-menu-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $header_defaults['primary-menu-typography'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'primary-menu-typography',
        array(
            'label'           => esc_html__('Custom Typography', 'cosmoswp'),
            'section'         => $this->primary_menu,
            'active_callback' => 'cosmoswp_primary_menu_typography_if_custom',
            'settings'        => 'primary-menu-typography',
        ),
        cosmoswp_typography_group_fields()
    )
);

/*Primary menu Styling*/
$wp_customize->add_setting('primary-menu-sub-menu-layout-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'primary-menu-sub-menu-layout-msg',
        array(
            'label'   => esc_html__('Sub Menu Item Layout', 'cosmoswp'),
            'section' => $this->primary_menu,
        )
    )
);

/*Margin*/
$wp_customize->add_setting('primary-menu-sub-menu-item-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['primary-menu-sub-menu-item-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'primary-menu-sub-menu-item-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->primary_menu,
            'settings' => 'primary-menu-sub-menu-item-margin',
        ),
        array(),
        array()
    )
);

/*Padding*/
$wp_customize->add_setting('primary-menu-sub-menu-item-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['primary-menu-sub-menu-item-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'primary-menu-sub-menu-item-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->primary_menu,
            'settings' => 'primary-menu-sub-menu-item-padding',
        ),
        array(),
        array()
    )
);

/*SubMenu Item Styling*/
$wp_customize->add_setting('primary-menu-submenu-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'primary-menu-submenu-styling-msg',
        array(
            'label'   => esc_html__('SubMenu Item Styling', 'cosmoswp'),
            'section' => $this->primary_menu,
        )
    )
);

/*Primary SubMenu Display Options*/
$wp_customize->add_setting('primary-menu-submenu-display-options', array(
    'default'           => $header_defaults['primary-menu-submenu-display-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_submenu_display_options();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'primary-menu-submenu-display-options',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('SubMenu Display Option', 'cosmoswp'),
            'section'  => $this->primary_menu,
            'settings' => 'primary-menu-submenu-display-options',
        )
    )
);

/*Icon*/
$wp_customize->add_setting('primary-menu-submenu-icon-indicator', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['primary-menu-submenu-icon-indicator'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Customize_Icons_Control(
        $wp_customize,
        'primary-menu-submenu-icon-indicator',
        array(
            'label'    => esc_html__('SubMenu Indicator Icon', 'cosmoswp'),
            'section'  => $this->primary_menu,
            'settings' => 'primary-menu-submenu-icon-indicator'
        )
    )
);

/*Submenu color*/
$wp_customize->add_setting('primary-menu-submenu-bg-color', array(
    'default'           => $header_defaults['primary-menu-submenu-bg-color'],
    'sanitize_callback' => 'cosmoswp_sanitize_color',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Color(
        $wp_customize,
        'primary-menu-submenu-bg-color',
        array(
            'label'    => esc_html__('SubMenu Background Color', 'cosmoswp'),
            'section'  => $this->primary_menu,
            'settings' => 'primary-menu-submenu-bg-color',
        )
    )
);

/*Submenu item*/
$wp_customize->add_setting('primary-menu-submenu-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_tabs',
    'default'           => $header_defaults['primary-menu-submenu-styling'],
    'transport'         => 'postMessage'
));
$border_style_choices = cosmoswp_header_border_style();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Tabs(
        $wp_customize,
        'primary-menu-submenu-styling',
        array(
            'label'       => esc_html__('SubMenu Item Styling', 'cosmoswp'),
            'description' => esc_html__('This styling for submenu items.', 'cosmoswp'),
            'section'     => $this->primary_menu,
            'settings'    => 'primary-menu-submenu-styling',
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
                    'tab'   => 'primary-menu-active',
                    'class' => 'cwp-element-show',
                    'attr'  => array(
                        'min'       => 0,
                        'max'       => 1000,
                        'step'      => 1,
                        'link'      => 1,
                        'devices'   => array(
                            'desktop' => array(
                                'icon' => 'dashicons-laptop',
                            ),
                            'tablet'  => array(
                                'icon' => 'dashicons-tablet',
                            ),
                            'mobile'  => array(
                                'icon' => 'dashicons-mobile',
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
$wp_customize->add_setting('primary-menu-submenu-typography-options', array(
    'default'           => $header_defaults['primary-menu-submenu-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('primary-menu-submenu-typography-options', array(
    'label'    => esc_html__('Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->primary_menu,
    'settings' => 'primary-menu-submenu-typography-options',
    'choices'  => $choices
));

/*Typography data*/
$wp_customize->add_setting('primary-menu-submenu-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $header_defaults['primary-menu-submenu-typography'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'primary-menu-submenu-typography',
        array(
            'label'           => esc_html__('Custom Typography', 'cosmoswp'),
            'section'         => $this->primary_menu,
            'active_callback' => 'cosmoswp_primary_submenu_typography_if_custom',
            'settings'        => 'primary-menu-submenu-typography',
        ),
        cosmoswp_typography_group_fields()
    )
);