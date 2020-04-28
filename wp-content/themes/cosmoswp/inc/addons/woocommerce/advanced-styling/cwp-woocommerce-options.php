<?php
if (!defined('ABSPATH')) {
    exit;
}

/*WooCommerce Default panel*/
$woocommerce = $wp_customize->get_panel('woocommerce');
if (!empty($woocommerce)) {
    $woocommerce->priority = 130;
}

$static_front_page = $wp_customize->get_panel('static_front_page');
if (!empty($static_front_page)) {
    $static_front_page->priority = 1;
}

/*WooCommerce Advanced Styling*/
$wp_customize->add_section('cwc-color-section', array(
    'title'    => esc_html__('Advanced Styling', 'cosmoswp'),
    'panel'    => 'woocommerce',
    'priority' => 100,
));

/*Product Msg*/
$wp_customize->add_setting('cwc-general-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'cwc-general-styling-msg',
        array(
            'label'   => esc_html__('General Options', 'cosmoswp'),
            'section' => 'cwc-color-section',
        )
    )
);

/* general color options */
$wp_customize->add_setting('cwc-general-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['cwc-general-color-options']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'cwc-general-color-options',
        array(
            'label'    => esc_html__('General Color', 'cosmoswp'),
            'section'  => 'cwc-color-section',
            'settings' => 'cwc-general-color-options',
        ),
        array(
            'on-sale-bg'         => array(
                'type'  => 'color',
                'label' => esc_html__('On Sale Background', 'cosmoswp'),
            ),
            'on-sale-color'      => array(
                'type'  => 'color',
                'label' => esc_html__('On Sale Color', 'cosmoswp'),
            ),
            'out-of-stock-bg'    => array(
                'type'  => 'color',
                'label' => esc_html__('Out of stock Background', 'cosmoswp'),
            ),
            'out-of-stock-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Out of stock color', 'cosmoswp'),
            ),
            'rating-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Rating Color', 'cosmoswp'),
            ),
        )
    )
);

/*Product Msg*/
$wp_customize->add_setting('wc-product-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'wc-product-styling-msg',
        array(
            'label'   => esc_html__('Products', 'cosmoswp'),
            'section' => 'cwc-color-section',
        )
    )
);

/* Product Toolbar */
$wp_customize->add_setting('cwc-product-toolbar', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['cwc-product-toolbar']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'cwc-product-toolbar',
        array(
            'label'    => esc_html__('Product Toolbar', 'cosmoswp'),
            'section'  => 'cwc-color-section',
            'settings' => 'cwc-product-toolbar',
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
$wp_customize->add_setting('cwc-product-box', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['cwc-product-box']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'cwc-product-box',
        array(
            'label'    => esc_html__('Product Box', 'cosmoswp'),
            'section'  => 'cwc-color-section',
            'settings' => 'cwc-product-box',
        ),
        array(
            'title-font-size'         => array(
                'type'  => 'text',
                'label' => esc_html__('Title Font Size (px)', 'cosmoswp'),
            ),
            'title-color'             => array(
                'type'  => 'color',
                'label' => esc_html__('Title Color', 'cosmoswp'),
            ),
            'title-hover-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Title Hover Color', 'cosmoswp'),
            ),
            'deleted-price-font-size' => array(
                'type'  => 'text',
                'label' => esc_html__('Deleted Price Size (px)', 'cosmoswp'),
            ),
            'deleted-price-color'     => array(
                'type'  => 'color',
                'label' => esc_html__('Deleted Price Color', 'cosmoswp'),
            ),
            'price-font-size'         => array(
                'type'  => 'text',
                'label' => esc_html__('Price Font Size (px)', 'cosmoswp'),
            ),
            'price-color'             => array(
                'type'  => 'color',
                'label' => esc_html__('Price Color', 'cosmoswp'),
            ),
            'content-font-size'       => array(
                'type'  => 'text',
                'label' => esc_html__('Content Font Size (px)', 'cosmoswp'),
            ),
            'content-color'           => array(
                'type'  => 'color',
                'label' => esc_html__('Content Color', 'cosmoswp'),
            ),
            'categories-font-size'    => array(
                'type'  => 'text',
                'label' => esc_html__('Category Font Size (px)', 'cosmoswp'),
            ),
            'categories-color'        => array(
                'type'  => 'color',
                'label' => esc_html__('Category Color', 'cosmoswp'),
            ),
            'categories-hover-color'  => array(
                'type'  => 'color',
                'label' => esc_html__('Category Hover Color', 'cosmoswp'),
            ),
        )
    )
);

/*Product Button Msg*/
$wp_customize->add_setting('cwc-product-button-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'cwc-product-button-styling-msg',
        array(
            'label'   => esc_html__('Button Styles', 'cosmoswp'),
            'section' => 'cwc-color-section',
        )
    )
);

/*Tabs*/
$wp_customize->add_setting('cwc-product-button-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_tabs',
    'default'           => $styling_defaults['cwc-product-button-styling']
));
$border_style_choices = cosmoswp_header_border_style();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Tabs(
        $wp_customize,
        'cwc-product-button-styling',
        array(
            'label'    => esc_html__('Product Button Styling', 'cosmoswp'),
            'section'  => 'cwc-color-section',
            'settings' => 'cwc-product-button-styling',
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

/*Checkout Button Msg*/
$wp_customize->add_setting('cwc-checkout-button-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_tabs',
    'default'           => $styling_defaults['cwc-checkout-button-styling']
));
$border_style_choices = cosmoswp_header_border_style();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Tabs(
        $wp_customize,
        'cwc-checkout-button-styling',
        array(
            'label'    => esc_html__('Alternative (Checkout,PlaceOrder) Button', 'cosmoswp'),
            'section'  => 'cwc-color-section',
            'settings' => 'cwc-checkout-button-styling',
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
$wp_customize->add_setting('cwc-product-navigation-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'cwc-product-navigation-styling-msg',
        array(
            'label'   => esc_html__('Product Navigation', 'cosmoswp'),
            'section' => 'cwc-color-section',
        )
    )
);

/*Border & Box data*/
$wp_customize->add_setting('cwc-product-navigation-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $styling_defaults['cwc-product-navigation-styling']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'cwc-product-navigation-styling',
        array(
            'label'    => esc_html__('Border & Box', 'cosmoswp'),
            'section'  => 'cwc-color-section',
            'settings' => 'cwc-product-navigation-styling',
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

/*Color Options*/
$wp_customize->add_setting('cwc-product-pagination-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['cwc-product-pagination-color-options']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'cwc-product-pagination-color-options',
        array(
            'label'    => esc_html__('Color Options', 'cosmoswp'),
            'section'  => 'cwc-color-section',
            'settings' => 'cwc-product-pagination-color-options',
        ),
        array(
            'background-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Background Color', 'cosmoswp'),
            ),
            'background-hover-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Background Active/Hover Color', 'cosmoswp'),
            ),
            'text-color'             => array(
                'type'  => 'color',
                'label' => esc_html__('Text Color', 'cosmoswp'),
            ),
            'text-hover-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Text Active/Hover Color', 'cosmoswp'),
            ),
        )
    )
);

/*single product msg*/
$wp_customize->add_setting('cwc-single-wc-product-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'cwc-single-wc-product-styling-msg',
        array(
            'label'   => esc_html__('Single Products : Tabs', 'cosmoswp'),
            'section' => 'cwc-color-section',
        )
    )
);

/*Background Color*/
$wp_customize->add_setting('cwc-single-product-tab-bg-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['cwc-single-product-tab-bg-color-options']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'cwc-single-product-tab-bg-color-options',
        array(
            'label'    => esc_html__('Background Color', 'cosmoswp'),
            'section'  => 'cwc-color-section',
            'settings' => 'cwc-single-product-tab-bg-color-options',
        ),
        array(
            'background-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('List Background Color', 'cosmoswp'),
            ),
            'background-hover-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Active/Hover Background Color', 'cosmoswp'),
            ),
        )
    )
);

/*Text Color*/
$wp_customize->add_setting('cwc-single-product-tab-text-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['cwc-single-product-tab-text-color-options']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'cwc-single-product-tab-text-color-options',
        array(
            'label'    => esc_html__('Text Color', 'cosmoswp'),
            'section'  => 'cwc-color-section',
            'settings' => 'cwc-single-product-tab-text-color-options',
        ),
        array(
            'tab-list-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('List Text Color', 'cosmoswp'),
            ),
            'tab-list-hover-color' => array(
                'type'  => 'color',
                'label' => esc_html__('List Text Active/Hover Color', 'cosmoswp'),
            ),
        )
    )
);

/*Border Color*/
$wp_customize->add_setting('cwc-single-product-tab-border-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['cwc-single-product-tab-border-color-options']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'cwc-single-product-tab-border-color-options',
        array(
            'label'    => esc_html__('Border Color', 'cosmoswp'),
            'section'  => 'cwc-color-section',
            'settings' => 'cwc-single-product-tab-border-color-options',
        ),
        array(
            'tab-border-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Tab Border Color', 'cosmoswp'),
            ),
        )
    )
);


/*Cart msg*/
$wp_customize->add_setting('cwc-cart-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'cwc-cart-styling-msg',
        array(
            'label'   => esc_html__(' Table', 'cosmoswp'),
            'section' => 'cwc-color-section',
        )
    )
);

$wp_customize->add_setting('cwc-cart-table-bg-color', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['cwc-cart-table-bg-color']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'cwc-cart-table-bg-color',
        array(
            'label'    => esc_html__('Table Background Color', 'cosmoswp'),
            'section'  => 'cwc-color-section',
            'settings' => 'cwc-cart-table-bg-color',
        ),
        array(
            'background-color'          => array(
                'type'  => 'color',
                'label' => esc_html__('Background Color', 'cosmoswp'),
            ),
            'background-stripped-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Stripped Color', 'cosmoswp'),
            ),
        )
    )
);


$wp_customize->add_setting('cwc-cart-table-border-color', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['cwc-cart-table-bg-color']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'cwc-cart-table-border-color',
        array(
            'label'    => esc_html__('Table Border Color', 'cosmoswp'),
            'section'  => 'cwc-color-section',
            'settings' => 'cwc-cart-table-border-color',
        ),
        array(
            'border-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Border Color', 'cosmoswp'),
            ),
        )
    )
);

$wp_customize->add_setting('cwc-cart-table-header-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['cwc-cart-table-header-color-options']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'cwc-cart-table-header-color-options',
        array(
            'label'    => esc_html__('Table Header Color', 'cosmoswp'),
            'section'  => 'cwc-color-section',
            'settings' => 'cwc-cart-table-header-color-options',
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


$wp_customize->add_setting('cwc-cart-remove-button-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['cwc-cart-remove-button-color-options']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'cwc-cart-remove-button-color-options',
        array(
            'label'    => esc_html__('Remove Product Icon', 'cosmoswp'),
            'section'  => 'cwc-color-section',
            'settings' => 'cwc-cart-remove-button-color-options',
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
            'icon-color'             => array(
                'type'  => 'color',
                'label' => esc_html__('Icon Color', 'cosmoswp'),
            ),
            'icon-hover-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Icon Hover Color', 'cosmoswp'),
            ),
        )
    )
);

/*Error msg*/
$wp_customize->add_setting('cwc-notice-error-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'cwc-notice-error-styling-msg',
        array(
            'label'   => esc_html__('Notice/Message : Error', 'cosmoswp'),
            'section' => 'cwc-color-section',
        )
    )
);

$wp_customize->add_setting('cwc-notice-error-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['cwc-notice-error-color-options']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'cwc-notice-error-color-options',
        array(
            'label'    => esc_html__('Notice Color Option', 'cosmoswp'),
            'section'  => 'cwc-color-section',
            'settings' => 'cwc-notice-error-color-options',
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
            'icon-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Icon Color', 'cosmoswp'),
            )
        )
    )
);

$wp_customize->add_setting('cwc-notice-error-border-box', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $styling_defaults['cwc-notice-error-border-box']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'cwc-notice-error-border-box',
        array(
            'label'    => esc_html__('Border & Box', 'cosmoswp'),
            'section'  => 'cwc-color-section',
            'settings' => 'cwc-notice-error-border-box',
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

/*Information msg*/
$wp_customize->add_setting('cwc-notice-info-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'cwc-notice-info-styling-msg',
        array(
            'label'   => esc_html__('Notice/Message : Information', 'cosmoswp'),
            'section' => 'cwc-color-section',
        )
    )
);

$wp_customize->add_setting('cwc-notice-info-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['cwc-notice-info-color-options']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'cwc-notice-info-color-options',
        array(
            'label'    => esc_html__('Notice Color Option', 'cosmoswp'),
            'section'  => 'cwc-color-section',
            'settings' => 'cwc-notice-info-color-options',
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
            'icon-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Icon Color', 'cosmoswp'),
            )
        )
    )
);

$wp_customize->add_setting('cwc-notice-info-border-box', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $styling_defaults['cwc-notice-info-border-box']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'cwc-notice-info-border-box',
        array(
            'label'    => esc_html__('Border & Box', 'cosmoswp'),
            'section'  => 'cwc-color-section',
            'settings' => 'cwc-notice-info-border-box',
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

/*Success msg*/
$wp_customize->add_setting('cwc-notice-success-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'cwc-notice-success-styling-msg',
        array(
            'label'   => esc_html__('Notice/Message : Success', 'cosmoswp'),
            'section' => 'cwc-color-section',
        )
    )
);

$wp_customize->add_setting('cwc-notice-success-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $styling_defaults['cwc-notice-success-color-options']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'cwc-notice-success-color-options',
        array(
            'label'    => esc_html__('Notice Color Option', 'cosmoswp'),
            'section'  => 'cwc-color-section',
            'settings' => 'cwc-notice-success-color-options',
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
            'icon-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Icon Color', 'cosmoswp'),
            )
        )
    )
);

$wp_customize->add_setting('cwc-notice-success-border-box', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $styling_defaults['cwc-notice-success-border-box']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'cwc-notice-success-border-box',
        array(
            'label'    => esc_html__('Border & Box', 'cosmoswp'),
            'section'  => 'cwc-color-section',
            'settings' => 'cwc-notice-success-border-box',
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