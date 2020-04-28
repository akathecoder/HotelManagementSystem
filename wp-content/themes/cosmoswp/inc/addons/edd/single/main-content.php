<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Edd Single Sidebar*/
$wp_customize->add_setting('cwp-edd-single-sidebar', array(
    'default'           => $defaults['cwp-edd-single-sidebar'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
));
$wp_customize->add_control('cwp-edd-single-sidebar', array(
    'label'       => esc_html__('Content/Sidebar', 'cosmoswp'),
    'choices'  => cosmoswp_sidebar_options(),
    'section'     => $this->section,
    'settings'    => 'cwp-edd-single-sidebar',
    'type'        => 'select',
));

/*Elements*/
$wp_customize->add_setting('edd-single-elements-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'edd-single-elements-msg',
        array(
            'label'   => esc_html__('Single Main Elements', 'cosmoswp'),
            'section' => $this->section,
        )
    )
);

/*EDD Single Element*/
$wp_customize->add_setting('edd-single-elements', array(
    'default'           => $defaults['edd-single-elements'],
    'sanitize_callback' => 'cosmoswp_sanitize_multi_choices',
));
$choices = cosmoswp_edd_single_elements();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Sortable(
        $wp_customize,
        'edd-single-elements',
        array(
            'choices'  => $choices,
            'section'  => $this->section,
            'settings' => 'edd-single-elements',
        )
    )
);

/*EDD Single Side Element Msg*/
$wp_customize->add_setting('edd-single-side-elements-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'edd-single-side-elements-msg',
        array(
            'label'   => esc_html__('Single Side Elements', 'cosmoswp'),
            'section' => $this->section,
        )
    )
);

/*EDD Single side Element*/
$wp_customize->add_setting('edd-single-side-elements', array(
    'default'           => $defaults['edd-single-side-elements'],
    'sanitize_callback' => 'cosmoswp_sanitize_multi_choices',
));
$choices = cosmoswp_edd_single_elements();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Sortable(
        $wp_customize,
        'edd-single-side-elements',
        array(
            'choices'  => $choices,
            'section'  => $this->section,
            'settings' => 'edd-single-side-elements',
        )
    )
);

/*Content Length*/
$wp_customize->add_setting('edd-single-content-length', array(
    'default'           => $defaults['edd-single-content-length'],
    'sanitize_callback' => 'esc_attr'
));
$wp_customize->add_control('edd-single-content-length', array(
    'label'       => esc_html__('Excerpt length (count words)', 'cosmoswp'),
    'description' => esc_html__('Please enter a number greater than 0.', 'cosmoswp'),
    'section'     => $this->section,
    'settings'    => 'edd-single-content-length',
    'type'        => 'number'
));

/*Media size*/
$wp_customize->add_setting('edd-single-content-width', array(
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'default'           => $defaults['edd-single-content-width']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'edd-single-content-width',
        array(
            'label'       => esc_html__('Image/Media Width (%)', 'cosmoswp'),
            'section'     => $this->section,
            'settings'    => 'edd-single-content-width',
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 100,
                'step' => 1,
            ),
        )
    )
);

/*Related Product*/
$wp_customize->add_setting('edd-single-product-related-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'edd-single-product-related-msg',
        array(
            'label'   => esc_html__('Related Item Setting', 'cosmoswp'),
            'section' => $this->section,
        )
    )
);

/*Related Item from*/
$wp_customize->add_setting('edd-related-item-from', array(
    'default'           => $defaults['edd-related-item-from'],
    'sanitize_callback' => 'cosmoswp_sanitize_select'
));
$wp_customize->add_control('edd-related-item-from', array(
    'choices'  => array(
        'edd-categories' => esc_html__('EDD Categories', 'cosmoswp'),
        'edd-tags'       => esc_html__('EDD Tags', 'cosmoswp'),
    ),
    'label'    => esc_html__('Related Item From Options', 'cosmoswp'),
    'section'  => $this->section,
    'settings' => 'edd-related-item-from',
    'type'     => 'select'
));

/*Related Number*/
$wp_customize->add_setting('edd-single-related-number', array(
    'default'           => $defaults['edd-single-related-number'],
    'sanitize_callback' => 'cosmoswp_sanitize_number'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Range(
        $wp_customize,
        'edd-single-related-number',
        array(
            'label'       => esc_html__('Number of Item', 'cosmoswp'),
            'section'     => $this->section,
            'settings'    => 'edd-single-related-number',
            'input_attrs' => array(
                'min'  => 0,
                'max'  => 100,
                'step' => 1
            ),
        )
    )
);

/*Related column*/
$wp_customize->add_setting('edd-single-related-col', array(
    'default'           => $defaults['edd-single-related-col'],
    'sanitize_callback' => 'cosmoswp_sanitize_number'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Range(
        $wp_customize,
        'edd-single-related-col',
        array(
            'label'       => esc_html__('Related Column', 'cosmoswp'),
            'section'     => $this->section,
            'settings'    => 'edd-single-related-col',
            'input_attrs' => array(
                'min'  => 1,
                'max'  => 6,
                'step' => 1
            ),
        )
    )
);