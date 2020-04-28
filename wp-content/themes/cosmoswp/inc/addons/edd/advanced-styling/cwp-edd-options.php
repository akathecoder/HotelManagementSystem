<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Edd Advanced Styling*/
$wp_customize->add_section('edd-setting-collection', array(
    'title'    => esc_html__('Advanced Styling', 'cosmoswp'),
    'panel'    => 'edd-setting-panel',
    'priority' => 100,
));

/*Product Msg*/
$wp_customize->add_setting('edd-product-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'edd-product-styling-msg',
        array(
            'label'   => esc_html__('Products', 'cosmoswp'),
            'section' => 'edd-setting-collection',
        )
    )
);

/* Product Toolbar */
$wp_customize->add_setting('edd-product-toolbar', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['edd-product-toolbar']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'edd-product-toolbar',
        array(
            'label'    => esc_html__('Product Toolbar', 'cosmoswp'),
            'section'  => 'edd-setting-collection',
            'settings' => 'edd-product-toolbar',
        ),
        array(
            'background-color'      => array(
                'type'  => 'color',
                'label' => esc_html__('Background Color', 'cosmoswp'),
            ),
            'grid-list-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Grid/List Color', 'cosmoswp'),
            ),
            'grid-list-hover-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Grid/List Hover Color', 'cosmoswp'),
            ),
        )
    )
);

/* Product Box */
$wp_customize->add_setting('edd-product-box', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['edd-product-box']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'edd-product-box',
        array(
            'label'    => esc_html__('Product Box', 'cosmoswp'),
            'section'  => 'edd-setting-collection',
            'settings' => 'edd-product-box',
        ),
        array(
            'title-font-size'        => array(
                'type'  => 'text',
                'label' => esc_html__('Title Font Size (px)', 'cosmoswp'),
            ),
            'title-color'            => array(
                'type'  => 'color',
                'label' => esc_html__('Title Color', 'cosmoswp'),
            ),
            'title-hover-color'      => array(
                'type'  => 'color',
                'label' => esc_html__('Title Hover Color', 'cosmoswp'),
            ),
            'price-font-size'        => array(
                'type'  => 'text',
                'label' => esc_html__('Price Font Size (px)', 'cosmoswp'),
            ),
            'price-color'            => array(
                'type'  => 'color',
                'label' => esc_html__('Price Color', 'cosmoswp'),
            ),
            'content-font-size'      => array(
                'type'  => 'text',
                'label' => esc_html__('Content Font Size (px)', 'cosmoswp'),
            ),
            'content-color'          => array(
                'type'  => 'color',
                'label' => esc_html__('Content Color', 'cosmoswp'),
            ),
            'categories-font-size'   => array(
                'type'  => 'text',
                'label' => esc_html__('Category Font Size (px)', 'cosmoswp'),
            ),
            'categories-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Category Color', 'cosmoswp'),
            ),
            'categories-hover-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Category Hover Color', 'cosmoswp'),
            ),
            'tag-font-size'          => array(
                'type'  => 'text',
                'label' => esc_html__('Tag Size (px)', 'cosmoswp'),
            ),
            'tag-color'              => array(
                'type'  => 'color',
                'label' => esc_html__('Tag Color', 'cosmoswp'),
            ),
            'tag-hover-color'        => array(
                'type'  => 'color',
                'label' => esc_html__('Tag Hover Color', 'cosmoswp'),
            ),
        )
    )
);

/*Product Button Msg*/
$wp_customize->add_setting('edd-edd-product-button-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'edd-edd-product-button-styling-msg',
        array(
            'label'   => esc_html__('Product Button', 'cosmoswp'),
            'section' => 'edd-setting-collection',
        )
    )
);

/*Tabs*/
$wp_customize->add_setting('edd-product-button-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_tabs',
    'default'           => $styling_defaults['edd-product-button-styling']
));
$border_style_choices = cosmoswp_header_border_style();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Tabs(
        $wp_customize,
        'edd-product-button-styling',
        array(
            'label'    => esc_html__('Button Styling', 'cosmoswp'),
            'section'  => 'edd-setting-collection',
            'settings' => 'edd-product-button-styling',
        ),
        array(
            'tabs'   => array(
                'button-one-normal' => array(
                    'label' => esc_html__('Normal', 'cosmoswp'),
                ),
                'button-one-hover'  => array(
                    'label' => esc_html__('Hover', 'cosmoswp'),
                ),
            ),
            'fields' => array(
                'normal-text-color'       => array(
                    'type'  => 'color',
                    'label' => esc_html__('Text Color', 'cosmoswp'),
                    'tab'   => 'button-one-normal',
                ),
                'normal-bg-color'         => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'button-one-normal',
                ),
                'normal-border-style'     => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'button-one-normal',
                ),
                'normal-border-color'     => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'button-one-normal',
                ),
                'normal-border-width'     => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width (px)', 'cosmoswp'),
                    'tab'   => 'button-one-normal',
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
                'normal-border-radius'    => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Radius (px)', 'cosmoswp'),
                    'tab'   => 'button-one-normal',
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
                    'tab'   => 'button-one-normal',
                ),
                'normal-box-shadow-css'   => array(
                    'type'       => 'cssbox',
                    'tab'        => 'button-one-normal',
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
                    'tab'   => 'button-one-hover',
                ),
                'hover-bg-color'          => array(
                    'type'  => 'color',
                    'label' => esc_html__('Background Color', 'cosmoswp'),
                    'tab'   => 'button-one-hover',
                ),
                'hover-border-style'      => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Border Style', 'cosmoswp'),
                    'options' => $border_style_choices,
                    'tab'     => 'button-one-hover',
                ),
                'hover-border-color'      => array(
                    'type'  => 'color',
                    'label' => esc_html__('Border Color', 'cosmoswp'),
                    'tab'   => 'button-one-hover',
                ),
                'hover-border-width'      => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Width (px)', 'cosmoswp'),
                    'tab'   => 'button-one-hover',
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
                'hover-border-radius'     => array(
                    'type'  => 'cssbox',
                    'label' => esc_html__('Border Radius (px)', 'cosmoswp'),
                    'tab'   => 'button-one-hover',
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
                    'tab'   => 'button-one-hover',
                ),
                'hover-box-shadow-css'    => array(
                    'type'       => 'cssbox',
                    'tab'        => 'button-one-hover',
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
            ),
        )
    )
);

/*Product Navigation Msg*/
$wp_customize->add_setting('edd-edd-product-navigation-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'edd-edd-product-navigation-styling-msg',
        array(
            'label'   => esc_html__('Product Navigation', 'cosmoswp'),
            'section' => 'edd-setting-collection',
        )
    )
);

/*Border & Box Msg*/
$wp_customize->add_setting('edd-product-navigation-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $styling_defaults['edd-product-navigation-styling']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'edd-product-navigation-styling',
        array(
            'label'    => esc_html__('Border & Box', 'cosmoswp'),
            'section'  => 'edd-setting-collection',
            'settings' => 'edd-product-navigation-styling',
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

        )
    )
);

/*Color Options */
$wp_customize->add_setting('edd-product-pagination-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['edd-product-pagination-color-options']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'edd-product-pagination-color-options',
        array(
            'label'    => esc_html__('Color Options', 'cosmoswp'),
            'section'  => 'edd-setting-collection',
            'settings' => 'edd-product-pagination-color-options',
        ),
        array(
            'background-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Background Color', 'cosmoswp'),
            ),
            'background-hover-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Background Hover Color', 'cosmoswp'),
            ),
            'text-color'             => array(
                'type'  => 'color',
                'label' => esc_html__('Text Color', 'cosmoswp'),
            ),
            'text-hover-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Text Hover Color', 'cosmoswp'),
            ),
        )
    )
);

/*Cart msg*/
$wp_customize->add_setting('edd-cart-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'edd-cart-styling-msg',
        array(
            'label'   => esc_html__('Table', 'cosmoswp'),
            'section' => 'edd-setting-collection',
        )
    )
);

/* Table Color*/
$wp_customize->add_setting('edd-cart-table-bg-color', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['edd-cart-table-bg-color']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'edd-cart-table-bg-color',
        array(
            'label'    => esc_html__('Table Color', 'cosmoswp'),
            'section'  => 'edd-setting-collection',
            'settings' => 'edd-cart-table-bg-color',
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
        )
    )
);

/* Table Border Color*/
$wp_customize->add_setting('edd-cart-table-border-color', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['edd-cart-table-bg-color']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'edd-cart-table-border-color',
        array(
            'label'    => esc_html__('Table Border Color', 'cosmoswp'),
            'section'  => 'edd-setting-collection',
            'settings' => 'edd-cart-table-border-color',
        ),
        array(
            'border-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Border Color', 'cosmoswp'),
            ),
        )
    )
);

/* Table Header Color*/
$wp_customize->add_setting('edd-cart-table-header-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['edd-cart-table-header-color-options']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'edd-cart-table-header-color-options',
        array(
            'label'    => esc_html__('Table Header Color', 'cosmoswp'),
            'section'  => 'edd-setting-collection',
            'settings' => 'edd-cart-table-header-color-options',
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
        )
    )
);

/* Remove Text Color option*/
$wp_customize->add_setting('edd-cart-remove-text-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['edd-cart-remove-text-color-options']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'edd-cart-remove-text-color-options',
        array(
            'label'    => esc_html__('Remove Text Color option', 'cosmoswp'),
            'section'  => 'edd-setting-collection',
            'settings' => 'edd-cart-remove-text-color-options',
        ),
        array(
            'text-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Text Color', 'cosmoswp'),
            ),
            'text-hover-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Text Hover Color', 'cosmoswp'),
            ),
        )
    )
);

/*Error msg*/
$wp_customize->add_setting('edd-notice-error-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'edd-notice-error-styling-msg',
        array(
            'label'   => esc_html__('Notice/Message : Error', 'cosmoswp'),
            'section' => 'edd-setting-collection',
        )
    )
);

/* Notice Color Option*/
$wp_customize->add_setting('edd-notice-error-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['edd-notice-error-color-options']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'edd-notice-error-color-options',
        array(
            'label'    => esc_html__('Notice Color Option', 'cosmoswp'),
            'section'  => 'edd-setting-collection',
            'settings' => 'edd-notice-error-color-options',
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
            'border-color'     => array(
                'type'  => 'color',
                'label' => esc_html__('Border Color', 'cosmoswp'),
            )
        )
    )
);

/*Information msg*/
$wp_customize->add_setting('edd-notice-info-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'edd-notice-info-styling-msg',
        array(
            'label'   => esc_html__('Notice/Message : Information', 'cosmoswp'),
            'section' => 'edd-setting-collection',
        )
    )
);

/*Notice Color Option*/
$wp_customize->add_setting('edd-notice-info-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['edd-notice-info-color-options']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'edd-notice-info-color-options',
        array(
            'label'    => esc_html__('Notice Color Option', 'cosmoswp'),
            'section'  => 'edd-setting-collection',
            'settings' => 'edd-notice-info-color-options',
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
            'border-color'     => array(
                'type'  => 'color',
                'label' => esc_html__('Border Color', 'cosmoswp'),
            )
        )
    )
);

/*Success msg*/
$wp_customize->add_setting('edd-notice-success-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'edd-notice-success-styling-msg',
        array(
            'label'   => esc_html__('Notice/Message : Success', 'cosmoswp'),
            'section' => 'edd-setting-collection',
        )
    )
);

/*Notice Color Option*/
$wp_customize->add_setting('edd-notice-success-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['edd-notice-success-color-options']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'edd-notice-success-color-options',
        array(
            'label'    => esc_html__('Notice Color Option', 'cosmoswp'),
            'section'  => 'edd-setting-collection',
            'settings' => 'edd-notice-success-color-options',
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
            'border-color'     => array(
                'type'  => 'color',
                'label' => esc_html__('Border Color', 'cosmoswp'),
            )
        )
    )
);
