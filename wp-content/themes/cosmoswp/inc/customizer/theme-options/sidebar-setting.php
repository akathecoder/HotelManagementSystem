<?php
if (!defined('ABSPATH')) {
    exit;
}
/*Adding sections for default layout options panel*/
$wp_customize->add_section($this->sidebar_setting, array(
    'title' => esc_html__('Sidebar Setting', 'cosmoswp'),
    'panel' => $this->panel,
    'priority' => 70,
));

/*Background Styling*/
$wp_customize->add_setting('global-sidebar-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'global-sidebar-styling-msg',
        array(
            'label'   => esc_html__('Sidebar Setting', 'cosmoswp'),
            'section' => $this->sidebar_setting,
        )
    )
);

/*Widget link Color*/
$wp_customize->add_setting('global-widget-link-color', array(
    'default'           => $theme_option_defaults['global-widget-link-color'],
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'global-widget-link-color',
        array(
            'label'    => esc_html__('Widget Link Color', 'cosmoswp'),
            'section'  => $this->sidebar_setting,
            'settings' => 'global-widget-link-color',
            'type'     => 'color'
        )
    )
);

/* Padding */
$wp_customize->add_setting('global-sidebar-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $theme_option_defaults['global-sidebar-padding']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'global-sidebar-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->sidebar_setting,
            'settings' => 'global-sidebar-padding',
        ),
        array(),
        array()
    )
);

/*Custom Background*/
$wp_customize->add_setting('global-sidebar-background-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $theme_option_defaults['global-sidebar-background-options']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'global-sidebar-background-options',
        array(
            'label'    => esc_html__('Background Option', 'cosmoswp'),
            'section'  => $this->sidebar_setting,
            'settings' => 'global-sidebar-background-options',
        ),
        array(
            'background-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Background Color', 'cosmoswp'),
            ),
        )
    )
);

/*Background Styling*/
$wp_customize->add_setting('global-sidebar-widget-title-setting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'global-sidebar-widget-title-setting-msg',
        array(
            'label'   => esc_html__('Widget Title Styling', 'cosmoswp'),
            'section' => $this->sidebar_setting,
        )
    )
);

/*Title align*/
$wp_customize->add_setting('global-widget-title-align', array(
    'default'           => $theme_option_defaults['global-widget-title-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
));
$choices = cosmoswp_text_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'global-widget-title-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Title Alignment', 'cosmoswp'),
            'section'  => $this->sidebar_setting,
            'settings' => 'global-widget-title-align',
        )
    )
);

/*Title Color*/
$wp_customize->add_setting('global-widget-title-color', array(
    'default'           => $theme_option_defaults['global-widget-title-color'],
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'global-widget-title-color',
        array(
            'label'    => esc_html__('Title Color', 'cosmoswp'),
            'section'  => $this->sidebar_setting,
            'settings' => 'global-widget-title-color',
            'type'     => 'color'
        )
    )
);

/*Margin*/
$wp_customize->add_setting('global-widget-title-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $theme_option_defaults['global-widget-title-margin']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'global-widget-title-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->sidebar_setting,
            'settings' => 'global-widget-title-margin',
        ),
        array(),
        array()
    )
);

/*Padding*/
$wp_customize->add_setting('global-widget-title-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $theme_option_defaults['global-widget-title-padding']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'global-widget-title-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->sidebar_setting,
            'settings' => 'global-widget-title-padding',
        ),
        array(),
        array()
    )
);

/*Border & Box*/
$wp_customize->add_setting('global-widget-title-border-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $theme_option_defaults['global-widget-title-border-styling']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'global-widget-title-border-styling',
        array(
            'label'    => esc_html__('Border & Box', 'cosmoswp'),
            'section'  => $this->sidebar_setting,
            'settings' => 'global-widget-title-border-styling',
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

/*Typography Options*/
$choices = cosmoswp_inherit_options();
$wp_customize->add_setting('global-widget-title-typography-options', array(
    'default'           => $theme_option_defaults['global-widget-title-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
));
$wp_customize->add_control('global-widget-title-typography-options', array(
    'label'    => esc_html__('Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->sidebar_setting,
    'settings' => 'global-widget-title-typography-options',
    'choices'  => $choices
));

/*Typography data*/
$wp_customize->add_setting('global-widget-title-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $theme_option_defaults['global-widget-title-typography']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'global-widget-title-typography',
        array(
            'label'           => esc_html__('Typography', 'cosmoswp'),
            'section'         => $this->sidebar_setting,
            'active_callback' => 'cosmoswp_global_widget_title_typography_if_custom',
            'settings'        => 'global-widget-title-typography',
        ),
        cosmoswp_typography_group_fields()
    )
);

/*Widget Styling*/
$wp_customize->add_setting('global-sidebar-widget-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'global-sidebar-widget-styling-msg',
        array(
            'label'   => esc_html__('Widget Styling', 'cosmoswp'),
            'section' => $this->sidebar_setting,
        )
    )
);

/*Title align*/
$wp_customize->add_setting('global-widget-content-align', array(
    'default'           => $theme_option_defaults['global-widget-content-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
));
$choices = cosmoswp_text_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'global-widget-content-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Text Alignment', 'cosmoswp'),
            'section'  => $this->sidebar_setting,
            'settings' => 'global-widget-content-align',
        )
    )
);

/*Title Color*/
$wp_customize->add_setting('global-widget-content-color', array(
    'default'           => $theme_option_defaults['global-widget-content-color'],
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'global-widget-content-color',
        array(
            'label'    => esc_html__('Text Color', 'cosmoswp'),
            'section'  => $this->sidebar_setting,
            'settings' => 'global-widget-content-color',
            'type'     => 'color'
        )
    )
);

/* Margin*/
$wp_customize->add_setting('global-widget-content-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $theme_option_defaults['global-widget-content-margin']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'global-widget-content-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->sidebar_setting,
            'settings' => 'global-widget-content-margin',
        ),
        array(),
        array()
    )
);

/* Padding*/
$wp_customize->add_setting('global-widget-content-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $theme_option_defaults['global-widget-content-padding']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'global-widget-content-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->sidebar_setting,
            'settings' => 'global-widget-content-padding',
        ),
        array(),
        array()
    )
);

/*Border & Box*/
$wp_customize->add_setting('global-widget-content-border-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $theme_option_defaults['global-widget-content-border-styling']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'global-widget-content-border-styling',
        array(
            'label'    => esc_html__('Border & Box', 'cosmoswp'),
            'section'  => $this->sidebar_setting,
            'settings' => 'global-widget-content-border-styling',
        ),
        array(
            'border-style' => array(
                'type'    => 'select',
                'label'   => esc_html__('Border Style', 'cosmoswp'),
                'options' => cosmoswp_header_border_style(),
            ),
            'border-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Border Color', 'cosmoswp'),
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
        )
    )
);

/*Typography Options*/
$wp_customize->add_setting('global-widget-content-typography-options', array(
    'default'           => $theme_option_defaults['global-widget-content-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
));
$choices = cosmoswp_inherit_options();
$wp_customize->add_control('global-widget-content-typography-options', array(
    'label'    => esc_html__('Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->sidebar_setting,
    'settings' => 'global-widget-content-typography-options',
    'choices'  => $choices
));

/*Typography data*/
$wp_customize->add_setting('global-widget-content-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $theme_option_defaults['global-widget-content-typography']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'global-widget-content-typography',
        array(
            'label'           => esc_html__('Typography', 'cosmoswp'),
            'section'         => $this->sidebar_setting,
            'active_callback' => 'cosmoswp_global_widget_content_typography_if_custom',
            'settings'        => 'global-widget-content-typography',
        ),
        cosmoswp_sub_typography_group_fields()
    )
);






