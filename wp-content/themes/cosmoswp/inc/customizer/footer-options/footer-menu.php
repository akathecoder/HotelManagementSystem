<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Footer Menu
 */
/*Adding sections for footer options*/
$wp_customize->add_section($this->footer_menu, array(
    'priority'   => 90,
    'capability' => 'edit_theme_options',
    'title'      => esc_html__('Footer Menu', 'cosmoswp'),
    'panel'      => $this->panel,
));

/*Search Placeholder*/
$wp_customize->add_setting('footer-menu-title', array(
    'default'           => $footer_defaults['footer-menu-title'],
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('footer-menu-title', array(
    'label'    => esc_html__('Menu Title', 'cosmoswp'),
    'section'  => $this->footer_menu,
    'settings' => 'footer-menu-title',
    'type'     => 'text'
));

/*Custom Menu*/
$choices = cosmoswp_get_nav_menus();
$wp_customize->add_setting('footer-menu-custom-menu', array(
    'capability'        => 'edit_theme_options',
    'default'           => $footer_defaults['footer-menu-custom-menu'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('footer-menu-custom-menu', array(
    'label'    => esc_html__('Select  Menu', 'cosmoswp'),
    'section'  => $this->footer_menu,
    'settings' => 'footer-menu-custom-menu',
    'type'     => 'select',
    'choices'  => $choices,
));

/*Footer Menu Display Options*/
$choices = cosmoswp_menu_display_positions();
$wp_customize->add_setting('footer-menu-display-position', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'default'           => $footer_defaults['footer-menu-display-position'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control('footer-menu-display-position', array(
    'label'    => esc_html__('Menu Display Position', 'cosmoswp'),
    'section'  => $this->footer_menu,
    'settings' => 'footer-menu-display-position',
    'type'     => 'select',
    'choices'  => $choices
));

/*Margin and padding msg*/
$wp_customize->add_setting('footer-menu-margin-padding-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-menu-margin-padding-msg',
        array(
            'label'   => esc_html__('Margin & Padding', 'cosmoswp'),
            'section' => $this->footer_menu,
        )
    )
);

/*Margin*/
$wp_customize->add_setting('footer-menu-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-menu-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-menu-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->footer_menu,
            'settings' => 'footer-menu-margin',
        ),
        array(),
        array()
    )
);

/*Padding*/
$wp_customize->add_setting('footer-menu-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-menu-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-menu-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->footer_menu,
            'settings' => 'footer-menu-padding',
        ),
        array(),
        array()
    )
);

/*Footer menu Styling*/
$wp_customize->add_setting('footer-menu-layout-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-menu-layout-msg',
        array(
            'label'   => esc_html__('FOOTER MENU ITEM LAYOUT', 'cosmoswp'),
            'section' => $this->footer_menu,
        )
    )
);

/*Footer Menu align*/
$wp_customize->add_setting('footer-menu-align', array(
    'default'           => $footer_defaults['footer-menu-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_field_responsive_buttonset',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_flex_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Responsive_Buttonset(
        $wp_customize,
        'footer-menu-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Menu Alignment', 'cosmoswp'),
            'section'  => $this->footer_menu,
            'settings' => 'footer-menu-align',
        )
    )
);

/*Margin*/
$wp_customize->add_setting('footer-menu-item-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-menu-item-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-menu-item-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->footer_menu,
            'settings' => 'footer-menu-item-margin',
        ),
        array(),
        array()
    )
);

/*Padding*/
$wp_customize->add_setting('footer-menu-item-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-menu-item-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-menu-item-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->footer_menu,
            'settings' => 'footer-menu-item-padding',
        ),
        array(),
        array()
    )
);

/*Background Styling*/
$wp_customize->add_setting('footer-menu-title-setting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-menu-title-setting-msg',
        array(
            'label'   => esc_html__('Menu Title Styling', 'cosmoswp'),
            'section' => $this->footer_menu,
        )
    )
);

/*Title align*/
$wp_customize->add_setting('footer-menu-title-align', array(
    'default'           => $footer_defaults['footer-menu-title-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_field_responsive_buttonset',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_text_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Responsive_Buttonset(
        $wp_customize,
        'footer-menu-title-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Title Alignment', 'cosmoswp'),
            'section'  => $this->footer_menu,
            'settings' => 'footer-menu-title-align',
        )
    )
);

/*Title Color*/
$wp_customize->add_setting('footer-menu-title-color', array(
    'default'           => $footer_defaults['footer-menu-title-color'],
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'footer-menu-title-color',
        array(
            'label'    => esc_html__('Title Color', 'cosmoswp'),
            'section'  => $this->footer_menu,
            'settings' => 'footer-menu-title-color',
            'type'     => 'color'
        )
    )
);

/*Margin*/
$wp_customize->add_setting('footer-menu-title-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-menu-title-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-menu-title-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->footer_menu,
            'settings' => 'footer-menu-title-margin',
        ),
        array(),
        array()
    )
);

/*Padding*/
$wp_customize->add_setting('footer-menu-title-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-menu-title-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-menu-title-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->footer_menu,
            'settings' => 'footer-menu-title-padding',
        ),
        array(),
        array()
    )
);

/*Typography Options*/
$wp_customize->add_setting('footer-menu-title-typography-options', array(
    'default'           => $footer_defaults['footer-menu-title-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_inherit_options();
$wp_customize->add_control('footer-menu-title-typography-options', array(
    'label'    => esc_html__('Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->footer_menu,
    'settings' => 'footer-menu-title-typography-options',
    'choices'  => $choices
));

/*Typography data*/
$wp_customize->add_setting('footer-menu-title-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $footer_defaults['footer-menu-title-typography'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-menu-title-typography',
        array(
            'label'           => esc_html__('Typography', 'cosmoswp'),
            'section'         => $this->footer_menu,
            'active_callback' => 'cosmoswp_footer_menu_title_typography_if_custom',
            'settings'        => 'footer-menu-title-typography',
        ),
        cosmoswp_typography_group_fields()
    )
);

/*Border Options*/
$wp_customize->add_setting('footer-menu-title-border-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $footer_defaults['footer-menu-title-border-styling'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-menu-title-border-styling',
        array(
            'label'    => esc_html__('Border', 'cosmoswp'),
            'section'  => $this->footer_menu,
            'settings' => 'footer-menu-title-border-styling',
        ),
        array(
            'border-style' => array(
                'type'    => 'select',
                'label'   => esc_html__('Border Style', 'cosmoswp'),
                'options' => cosmoswp_header_border_style(),
            ),
            'border-width' => array(
                'type'       => 'cssbox',
                'label'      => esc_html__('Border Width', 'cosmoswp'),
                'class'      => 'cwp-element-show',
                'box_fields' => array(
                    'top'    => true,
                    'right'  => true,
                    'bottom' => true,
                    'left'   => true,
                ),
                'attr'       => array(
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
            'border-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Border Color', 'cosmoswp'),
            ),
        )
    )
);

/*Footer menu Styling*/
$wp_customize->add_setting('footer-menu-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-menu-styling-msg',
        array(
            'label'   => esc_html__('Menu Item Styling', 'cosmoswp'),
            'section' => $this->footer_menu,
        )
    )
);

/*Tabs*/
$wp_customize->add_setting('footer-menu-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_tabs',
    'default'           => $footer_defaults['footer-menu-styling'],
    'transport'         => 'postMessage'
));
$border_style_choices = cosmoswp_header_border_style();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Tabs(
        $wp_customize,
        'footer-menu-styling',
        array(
            'label'       => esc_html__('Menu Item Color Styling', 'cosmoswp'),
            'description' => esc_html__('This styling for main menu items.', 'cosmoswp'),
            'section'     => $this->footer_menu,
            'settings'    => 'footer-menu-styling',
        ),
        array(
            'tabs'   => array(
                'footer-menu-normal' => array(
                    'label' => esc_html__('Normal', 'cosmoswp'),
                ),
                'footer-menu-hover'  => array(
                    'label' => esc_html__('Hover', 'cosmoswp'),
                ),
                'footer-menu-active' => array(
                    'label' => esc_html__('Active', 'cosmoswp'),
                ),
            ),
            'fields' => array(
                'normal-text-color'    => array(
                    'type'  => 'color',
                    'label' => esc_html__('Text Color', 'cosmoswp'),
                    'tab'   => 'footer-menu-normal',
                ),
                'normal-bg-color'      => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'footer-menu-normal',
                ),
                'normal-border-style'  => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'footer-menu-normal',
                ),
                'normal-border-width'  => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'footer-menu-normal',
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
                    'tab'   => 'footer-menu-normal',
                ),
                'normal-border-radius' => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Radius(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'footer-menu-normal',
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
                    'tab'   => 'footer-menu-hover',
                ),
                'hover-bg-color'       => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'footer-menu-hover',
                ),
                'hover-border-style'   => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'footer-menu-hover',
                ),
                'hover-border-width'   => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'footer-menu-hover',
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
                    'tab'   => 'footer-menu-hover',
                ),
                'hover-border-radius'  => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Radius(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'footer-menu-hover',
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
                    'tab'   => 'footer-menu-active',
                ),
                'active-bg-color'      => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'footer-menu-active',
                ),
                'active-border-style'  => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'footer-menu-active',
                ),
                'active-border-width'  => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'footer-menu-active',
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
                    'tab'   => 'footer-menu-active',
                ),
                'active-border-radius' => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Radius(px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'footer-menu-active',
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

/*Typography options*/
$wp_customize->add_setting('footer-menu-typography-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-menu-typography-styling-msg',
        array(
            'label'   => esc_html__('Typography', 'cosmoswp'),
            'section' => $this->footer_menu,
        )
    )
);

/*Inherit Options*/
$choices = cosmoswp_inherit_options();
$wp_customize->add_setting('footer-menu-typography-options', array(
    'default'           => $footer_defaults['footer-menu-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('footer-menu-typography-options', array(
    'label'    => esc_html__('Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->footer_menu,
    'settings' => 'footer-menu-typography-options',
    'choices'  => $choices
));

/*Typography data*/
$wp_customize->add_setting('footer-menu-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $footer_defaults['footer-menu-typography'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-menu-typography',
        array(
            'label'           => esc_html__('Typography', 'cosmoswp'),
            'section'         => $this->footer_menu,
            'settings'        => 'footer-menu-typography',
            'active_callback' => 'cosmoswp_footer_menu_typography_if_custom_selected'
        ),
        cosmoswp_typography_group_fields()
    )
);