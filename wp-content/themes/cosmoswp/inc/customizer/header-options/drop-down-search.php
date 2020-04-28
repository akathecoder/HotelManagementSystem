<?php
if (!defined('ABSPATH')) {
    exit;
}

/*DropDown search section*/
$wp_customize->add_section($this->drop_down_search, array(
    'title' => esc_html__('DropDown Search', 'cosmoswp'),
    'panel' => $this->panel,
));

/*Search Placeholder*/
$wp_customize->add_setting('dd-search-placeholder', array(
    'default'           => $header_defaults['dd-search-placeholder'],
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('dd-search-placeholder', array(
    'label'    => esc_html__('Placeholder', 'cosmoswp'),
    'section'  => $this->drop_down_search,
    'settings' => 'dd-search-placeholder',
    'type'     => 'text'
));

/*DropDown Search layout*/
$wp_customize->add_setting('dd-search-layout-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'dd-search-layout-msg',
        array(
            'label'   => esc_html__('Search Layout', 'cosmoswp'),
            'section' => $this->drop_down_search,
        )
    )
);

/*DropDown Search Icon Align*/
$wp_customize->add_setting('dd-search-icon-align', array(
    'default'           => $header_defaults['dd-search-icon-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_flex_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'dd-search-icon-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Search Icon Alignment', 'cosmoswp'),
            'section'  => $this->drop_down_search,
            'settings' => 'dd-search-icon-align',
        )
    )
);

/*DropDown Search align*/
$wp_customize->add_setting('dd-search-form-align', array(
    'default'           => $header_defaults['dd-search-form-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_dd_search_form_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'dd-search-form-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Search Form Alignment', 'cosmoswp'),
            'section'  => $this->drop_down_search,
            'settings' => 'dd-search-form-align',
        )
    )
);

/*Margin and Padding msg*/
$wp_customize->add_setting('dd-search-margin-padding-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'dd-search-margin-padding-msg',
        array(
            'label'   => esc_html__('Icon ( Margin & Padding )', 'cosmoswp'),
            'section' => $this->drop_down_search,
        )
    )
);

/*Margin*/
$wp_customize->add_setting('drop-down-search-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['drop-down-search-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'drop-down-search-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->drop_down_search,
            'settings' => 'drop-down-search-margin',
        ),
        array(),
        array()
    )
);

/*Padding*/
$wp_customize->add_setting('drop-down-search-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['drop-down-search-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'drop-down-search-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->drop_down_search,
            'settings' => 'drop-down-search-padding',
        ),
        array(),
        array()
    )
);

/*Drop down Styling*/
$wp_customize->add_setting('dropdown-search-icon-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'dropdown-search-icon-styling-msg',
        array(
            'label'   => esc_html__('Search Icon Styling', 'cosmoswp'),
            'section' => $this->drop_down_search,
        )
    )
);

/*Search Form height*/
$wp_customize->add_setting('dropdown-search-icon-size', array(
    'default'           => $header_defaults['dropdown-search-icon-size'],
    'sanitize_callback' => 'cosmoswp_sanitize_number',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Range(
        $wp_customize,
        'dropdown-search-icon-size',
        array(
            'label'       => esc_html__('Icon Size (px)', 'cosmoswp'),
            'section'     => $this->drop_down_search,
            'settings'    => 'dropdown-search-icon-size',
            'input_attrs' => array(
                'min'  => 8,
                'max'  => 400,
                'step' => 1
            ),
        )
    )
);

/*Tabs*/
$wp_customize->add_setting('dropdown-search-icon-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_tabs',
    'default'           => $header_defaults['dropdown-search-icon-styling'],
    'transport'         => 'postMessage'
));
$border_style_choices = cosmoswp_header_border_style();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Tabs(
        $wp_customize,
        'dropdown-search-icon-styling',
        array(
            'label'    => esc_html__('Icon Styling', 'cosmoswp'),
            'section'  => $this->drop_down_search,
            'settings' => 'dropdown-search-icon-styling',
        ),
        array(
            'tabs'   => array(
                'search-icon-normal' => array(
                    'label' => esc_html__('Normal', 'cosmoswp'),
                ),
                'search-icon-hover'  => array(
                    'label' => esc_html__('Hover', 'cosmoswp'),
                ),
            ),
            'fields' => array(
                'normal-text-color'       => array(
                    'type'  => 'color',
                    'label' => esc_html__('Text Color', 'cosmoswp'),
                    'tab'   => 'search-icon-normal',
                ),
                'normal-bg-color'         => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'search-icon-normal',
                ),
                'normal-border-style'     => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'search-icon-normal',
                ),
                'normal-border-width'     => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width (px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'search-icon-normal',
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
                'normal-border-color'     => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'search-icon-normal',
                ),
                'normal-border-radius'    => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Radius (px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'search-icon-normal',
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
                'normal-box-shadow-color' => array(
                    'type'  => 'color',
                    'label' => esc_html__('Box Shadow Color', 'cosmoswp'),
                    'tab'   => 'search-icon-normal',
                ),
                'normal-box-shadow-css'   => array(
                    'type'       => 'cssbox',
                    'tab'        => 'search-icon-normal',
                    'class'      => 'cwp-element-show',
                    'box_fields' => array(
                        'x'      => true,
                        'Y'      => true,
                        'BLUR'   => true,
                        'SPREAD' => true,
                    ),
                    'attr'       => array(
                        'min'         => 0,
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
                'hover-text-color'        => array(
                    'type'  => 'color',
                    'label' => esc_html__(' Text Color', 'cosmoswp'),
                    'tab'   => 'search-icon-hover',
                ),
                'hover-bg-color'          => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'search-icon-hover',
                ),
                'hover-border-style'      => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'search-icon-hover',
                ),
                'hover-border-width'      => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width (px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'search-icon-hover',
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
                'hover-border-color'      => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'search-icon-hover',
                ),
                'hover-border-radius'     => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Radius (px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'search-icon-hover',
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
                'hover-box-shadow-color'  => array(
                    'type'  => 'color',
                    'label' => esc_html__('Box Shadow Color', 'cosmoswp'),
                    'tab'   => 'search-icon-hover',
                ),
                'hover-box-shadow-css'    => array(
                    'type'       => 'cssbox',
                    'class'      => 'cwp-element-show',
                    'tab'        => 'search-icon-hover',
                    'box_fields' => array(
                        'x'      => true,
                        'Y'      => true,
                        'BLUR'   => true,
                        'SPREAD' => true,
                    ),
                    'attr'       => array(
                        'min'         => 0,
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
            ),
        )
    )
);

/*Drop down Styling*/
$wp_customize->add_setting('drop-down-search-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'drop-down-search-styling-msg',
        array(
            'label'   => esc_html__('Search From Styling', 'cosmoswp'),
            'section' => $this->drop_down_search,
        )
    )
);

/*Search Form height*/
$wp_customize->add_setting('drop-down-search-input-height', array(
    'default'           => $header_defaults['drop-down-search-input-height'],
    'sanitize_callback' => 'cosmoswp_sanitize_number',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Range(
        $wp_customize,
        'drop-down-search-input-height',
        array(
            'label'       => esc_html__('Form Input Height (px)', 'cosmoswp'),
            'section'     => $this->drop_down_search,
            'settings'    => 'drop-down-search-input-height',
            'input_attrs' => array(
                'min'  => 1,
                'max'  => 400,
                'step' => 1
            ),
        )
    )
);

/*Tabs*/
$wp_customize->add_setting('dropdown-search-form-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_tabs',
    'default'           => $header_defaults['dropdown-search-form-styling'],
    'transport'         => 'postMessage'
));
$border_style_choices = cosmoswp_header_border_style();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Tabs(
        $wp_customize,
        'dropdown-search-form-styling',
        array(
            'label'    => esc_html__('Form Styling', 'cosmoswp'),
            'section'  => $this->drop_down_search,
            'settings' => 'dropdown-search-form-styling',
        ),
        array(
            'tabs'   => array(
                'search-icon-normal' => array(
                    'label' => esc_html__('Normal', 'cosmoswp'),
                ),
                'search-icon-hover'  => array(
                    'label' => esc_html__('Hover', 'cosmoswp'),
                ),
            ),
            'fields' => array(
                'normal-text-color'       => array(
                    'type'  => 'color',
                    'label' => esc_html__('Text Color', 'cosmoswp'),
                    'tab'   => 'search-icon-normal',
                ),
                'normal-bg-color'         => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'search-icon-normal',
                ),
                'normal-border-style'     => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'search-icon-normal',
                ),
                'normal-border-width'     => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width (px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'search-icon-normal',
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
                'normal-border-color'     => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'search-icon-normal',
                ),
                'normal-border-radius'    => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Radius (px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'search-icon-normal',
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
                'normal-box-shadow-color' => array(
                    'type'  => 'color',
                    'label' => esc_html__('Box Shadow Color', 'cosmoswp'),
                    'tab'   => 'search-icon-normal',
                ),
                'normal-box-shadow-css'   => array(
                    'type'       => 'cssbox',
                    'class'      => 'cwp-element-show',
                    'tab'        => 'search-icon-normal',
                    'box_fields' => array(
                        'x'      => true,
                        'Y'      => true,
                        'BLUR'   => true,
                        'SPREAD' => true,
                    ),
                    'attr'       => array(
                        'min'         => 0,
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
                'hover-text-color'        => array(
                    'type'  => 'color',
                    'label' => esc_html__(' Text Color', 'cosmoswp'),
                    'tab'   => 'search-icon-hover',
                ),
                'hover-bg-color'          => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'search-icon-hover',
                ),
                'hover-border-style'      => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'search-icon-hover',
                ),
                'hover-border-width'      => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width (px)', 'cosmoswp'),
                    'class' => 'cwp-element-show',
                    'tab'   => 'search-icon-hover',
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
                'hover-border-color'      => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'search-icon-hover',
                ),
                'hover-border-radius'     => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Radius (px)', 'cosmoswp'),
                    'tab'   => 'search-icon-hover',
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
                'hover-box-shadow-color'  => array(
                    'type'  => 'color',
                    'label' => esc_html__('Box Shadow Color', 'cosmoswp'),
                    'tab'   => 'search-icon-hover',
                ),
                'hover-box-shadow-css'    => array(
                    'type'       => 'cssbox',
                    'tab'        => 'search-icon-hover',
                    'class'      => 'cwp-element-show',
                    'box_fields' => array(
                        'x'      => true,
                        'Y'      => true,
                        'BLUR'   => true,
                        'SPREAD' => true,
                    ),
                    'attr'       => array(
                        'min'         => 0,
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
            ),
        )
    )
);

/*Inherit Options*/
$choices = cosmoswp_inherit_options();
$wp_customize->add_setting('dd-search-typography-options', array(
    'default'           => $header_defaults['dd-search-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('dd-search-typography-options', array(
    'label'    => esc_html__('Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->drop_down_search,
    'settings' => 'dd-search-typography-options',
    'choices'  => $choices
));

/*Typography data*/
$wp_customize->add_setting('dd-search-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $header_defaults['dd-search-typography'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'dd-search-typography',
        array(
            'label'           => esc_html__('Typography', 'cosmoswp'),
            'section'         => $this->drop_down_search,
            'active_callback' => 'cosmoswp_dd_search_typography_if_custom',
            'settings'        => 'dd-search-typography',
        ),
        cosmoswp_typography_group_fields()
    )
);