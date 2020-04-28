<?php
if (!defined('ABSPATH')) {
    exit;
}

/*General Footer*/
$wp_customize->add_section('cosmoswp-footer-general', array(
    'title'    => esc_html__('Footer General ', 'cosmoswp'),
    'panel'    => $this->panel,
    'priority' => 10,
));

/*Footer General Layout*/
$choices = cosmoswp_site_footer_layout_option();
$wp_customize->add_setting('footer-general-layout', array(
    'default'           => $footer_defaults['footer-general-layout'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('footer-general-layout', array(
    'label'    => esc_html__('General Layout', 'cosmoswp'),
    'type'     => 'select',
    'section'  => 'cosmoswp-footer-general',
    'settings' => 'footer-general-layout',
    'priority' => 10,
    'choices'  => $choices
));

/*Footer Display Style*/
$wp_customize->add_setting('footer-display-style', array(
    'default'           => $footer_defaults['footer-display-style'],
    'sanitize_callback' => 'cosmoswp_sanitize_select'
));
$choices = cosmoswp_site_footer_display_style_option();
$wp_customize->add_control('footer-display-style', array(
    'label'    => esc_html__('Footer Display Style', 'cosmoswp'),
    'type'     => 'select',
    'section'  => 'cosmoswp-footer-general',
    'settings' => 'footer-display-style',
    'priority' => 10,
    'choices'  => $choices
));

/*Footer General Styling*/
$wp_customize->add_setting('footer-general-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-general-styling-msg',
        array(
            'label'   => esc_html__('Footer General Styling', 'cosmoswp'),
            'section' => 'cosmoswp-footer-general',
        )
    )
);

/*Footer margin*/
$wp_customize->add_setting('footer-general-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-general-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-general-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => 'cosmoswp-footer-general',
            'settings' => 'footer-general-margin',
        ),
        array(),
        array()
    )
);

/*Footer padding*/
$wp_customize->add_setting('footer-general-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-general-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-general-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => 'cosmoswp-footer-general',
            'settings' => 'footer-general-padding',
        ),
        array(),
        array()
    )
);

/*Background Styling*/
$wp_customize->add_setting('footer-general-bg-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-general-bg-styling-msg',
        array(
            'label'   => esc_html__('Background Options', 'cosmoswp'),
            'section' => 'cosmoswp-footer-general',
        )
    )
);

/*Background Styling*/
$wp_customize->add_setting('footer-general-background-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $footer_defaults['footer-general-background-options'],
    'transport'         => 'postMessage'
));
$background_image_size_options       = cosmoswp_background_image_size_options();
$background_image_position_options   = cosmoswp_background_image_position_options();
$background_image_repeat_options     = cosmoswp_background_image_repeat_options();
$background_image_attachment_options = cosmoswp_background_image_attachment_options();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-general-background-options',
        array(
            'label'    => esc_html__('Background Option', 'cosmoswp'),
            'section'  => 'cosmoswp-footer-general',
            'settings' => 'footer-general-background-options',
        ),
        array(
            'background-color'      => array(
                'type'  => 'color',
                'label' => esc_html__('Background Color', 'cosmoswp'),
            ),
            'background-image'      => array(
                'type'  => 'image',
                'label' => esc_html__('Background Image', 'cosmoswp'),
            ),
            'background-size'       => array(
                'type'    => 'select',
                'label'   => esc_html__('Background Size', 'cosmoswp'),
                'options' => $background_image_size_options,
                'class'   => 'image-properties',
            ),
            'background-position'   => array(
                'type'    => 'select',
                'label'   => esc_html__('Background Position', 'cosmoswp'),
                'options' => $background_image_position_options,
                'class'   => 'image-properties',
            ),
            'background-repeat'     => array(
                'type'    => 'select',
                'label'   => esc_html__('Background Repeat', 'cosmoswp'),
                'options' => $background_image_repeat_options,
                'class'   => 'image-properties',
            ),
            'background-attachment' => array(
                'type'    => 'select',
                'label'   => esc_html__('Background Attachment', 'cosmoswp'),
                'options' => $background_image_attachment_options,
                'class'   => 'image-properties',
            ),
            'enable-overlay' => array(
                'type'    => 'checkbox',
                'label'   => esc_html__('Enable Overlay', 'cosmoswp'),
                'class'   =>  'image-properties image-properties-checkbox',
            ),
            'background-overlay-color'      => array(
                'type'  => 'color',
                'label' => esc_html__('Background Overlay Color', 'cosmoswp'),
                'class'   =>  'image-properties',
            ),
        )
    )
);

/*Footer general border style*/
$wp_customize->add_setting('footer-general-border-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-general-border-styling-msg',
        array(
            'label'   => esc_html__('Border & Box Shadow Options', 'cosmoswp'),
            'section' => 'cosmoswp-footer-general',
        )
    )
);

/*Footer general border style*/
$wp_customize->add_setting('footer-general-border-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $footer_defaults['footer-general-border-styling'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'footer-general-border-styling',
        array(
            'label'    => esc_html__('Border & Box Shadow', 'cosmoswp'),
            'section'  => 'cosmoswp-footer-general',
            'settings' => 'footer-general-border-styling',
        ),
        array(
            'border-style'     => array(
                'type'    => 'select',
                'label'   => esc_html__('Border Style', 'cosmoswp'),
                'options' => cosmoswp_header_border_style(),
            ),
            'border-width'     => array(
                'type'       => 'cssbox',
                'label'      => esc_html__('Border Width', 'cosmoswp'),
                'class' => 'cwp-element-show',
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
            'border-color'     => array(
                'type'  => 'color',
                'label' => esc_html__('Border Color', 'cosmoswp'),
            ),
            'border-radius'    => array(
                'type'       => 'cssbox',
                'label'      => esc_html__('Border Radius', 'cosmoswp'),
                'class' => 'cwp-element-show',
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
            'box-shadow-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Box Shadow Color', 'cosmoswp'),
            ),
            'box-shadow-css'   => array(
                'type'       => 'cssbox',
                'box_fields' => array(
                    'x'      => true,
                    'Y'      => true,
                    'BLUR'   => true,
                    'SPREAD' => true,
                ),
                'attr'       => array(
                    'min'         => -1000,
                    'max'         => 1000,
                    'step'        => 1,
                    'link'        => 1,
                    'link_toggle' => false,
                    'devices'     => array(
                        'desktop' => array(
                            'icon' => 'dashicons-laptop',
                        ),
                    ),
                    'link_text'   => esc_html__('INSET', 'cosmoswp'),
                ),
            ),
        )
    )
);

/*Margin and padding msg*/
$wp_customize->add_setting('footer-sidebar-setting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'footer-sidebar-setting-msg',
        array(
            'label'   => esc_html__('Footer Sidebar Setting', 'cosmoswp'),
            'section' => 'cosmoswp-footer-general',
        )
    )
);

/*Footer margin*/
$wp_customize->add_setting('footer-sidebar-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-sidebar-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-sidebar-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => 'cosmoswp-footer-general',
            'settings' => 'footer-sidebar-margin',
        ),
        array(),
        array()
    )
);

/*Footer padding*/
$wp_customize->add_setting('footer-sidebar-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $footer_defaults['footer-sidebar-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'footer-sidebar-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => 'cosmoswp-footer-general',
            'settings' => 'footer-sidebar-padding',
        ),
        array(),
        array()
    )
);

/*Footer Elements Starts from here*/
$wp_customize->add_section(
    new CosmosWP_WP_Customize_Section_H3($wp_customize, 'cosmoswp_footer_rows_seperator', array(
            'title'    => esc_html__('Footer Rows', 'cosmoswp'),
            'panel'    => $this->panel,
            'priority' => 50,
        )
    )
);