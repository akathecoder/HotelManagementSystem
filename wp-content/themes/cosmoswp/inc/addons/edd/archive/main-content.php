<?php
if (!defined('ABSPATH')) {
    exit;
}

/*EDD Single Sidebar*/
$wp_customize->add_setting('cwp-edd-archive-sidebar', array(
    'default'           => $defaults['cwp-edd-archive-sidebar'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
));
$wp_customize->add_control('cwp-edd-archive-sidebar', array(
    'label'       => esc_html__('Content/Sidebar', 'cosmoswp'),
    'choices'  => cosmoswp_sidebar_options(),
    'section'     => $this->section,
    'settings'    => 'cwp-edd-archive-sidebar',
    'type'        => 'select',
));

/* Edd main title */
$wp_customize->add_setting('edd-archive-main-title', array(
    'default'           => $defaults['edd-archive-main-title'],
    'sanitize_callback' => 'sanitize_text_field'
));
$wp_customize->add_control('edd-archive-main-title', array(
    'label'    => esc_html__('Main Title', 'cosmoswp'),
    'section'  => $this->section,
    'settings' => 'edd-archive-main-title',
    'type'     => 'text'
));

/*Feature Layout*/
$wp_customize->add_setting('edd-archive-default-view', array(
    'default'           => $defaults['edd-archive-default-view'],
    'sanitize_callback' => 'cosmoswp_sanitize_select'
));
$wp_customize->add_control('edd-archive-default-view', array(
    'choices'  => array(
        'cwp-grid' => esc_html__('Grid', 'cosmoswp'),
        'cwp-list' => esc_html__('List', 'cosmoswp'),
    ),
    'label'    => esc_html__('Default View', 'cosmoswp'),
    'section'  => $this->section,
    'settings' => 'edd-archive-default-view',
    'type'     => 'select'
));

/*Top Toolbar*/
$wp_customize->add_setting('edd-archive-general-setting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'edd-archive-general-setting-msg',
        array(
            'label'   => esc_html__('General Setting', 'cosmoswp'),
            'section' => $this->section,
        )
    )
);

/*Sort Bar*/
$wp_customize->add_setting('edd-archive-show-sort-bar', array(
    'default'           => $defaults['edd-archive-show-sort-bar'],
    'sanitize_callback' => 'cosmoswp_sanitize_checkbox'
));
$wp_customize->add_control('edd-archive-show-sort-bar', array(
    'label'    => esc_html__('Show Sort Bar', 'cosmoswp'),
    'section'  => $this->section,
    'settings' => 'edd-archive-show-sort-bar',
    'type'     => 'checkbox'
));

/*Grid List*/
$wp_customize->add_setting('edd-archive-show-grid-list', array(
    'default'           => $defaults['edd-archive-show-grid-list'],
    'sanitize_callback' => 'cosmoswp_sanitize_checkbox'
));
$wp_customize->add_control('edd-archive-show-grid-list', array(
    'label'    => esc_html__('Show Grid List', 'cosmoswp'),
    'section'  => $this->section,
    'settings' => 'edd-archive-show-grid-list',
    'type'     => 'checkbox'
));

/*Grid Elements*/
$wp_customize->add_setting('edd-archive-grid-elements-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'edd-archive-grid-elements-msg',
        array(
            'label'   => esc_html__('Grid Elements', 'cosmoswp'),
            'section' => $this->section,
        )
    )
);

$wp_customize->add_setting('edd-archive-grid-elements', array(
    'default'           => $defaults['edd-archive-grid-elements'],
    'sanitize_callback' => 'cosmoswp_sanitize_multi_choices',
));
$choices = cosmoswp_edd_archive_elements_sorting();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Sortable(
        $wp_customize,
        'edd-archive-grid-elements',
        array(
            'choices'  => $choices,
            'section'  => $this->section,
            'settings' => 'edd-archive-grid-elements',
        )
    )
);

/*Title align*/
$wp_customize->add_setting('edd-archive-grid-elements-align', array(
    'default'           => $defaults['edd-archive-grid-elements-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
));
$choices = cosmoswp_text_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'edd-archive-grid-elements-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Elements Alignment', 'cosmoswp'),
            'section'  => $this->section,
            'settings' => 'edd-archive-grid-elements-align',
        )
    )
);

/*List Elements*/
$wp_customize->add_setting('edd-archive-list-elements-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'edd-archive-list-elements-msg',
        array(
            'label'   => esc_html__('List Elements', 'cosmoswp'),
            'section' => $this->section,
        )
    )
);
$wp_customize->add_setting('edd-archive-list-elements', array(
    'default'           => $defaults['edd-archive-list-elements'],
    'sanitize_callback' => 'cosmoswp_sanitize_multi_choices',
));
$choices = cosmoswp_edd_archive_list_elements_sorting();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Sortable(
        $wp_customize,
        'edd-archive-list-elements',
        array(
            'choices'  => $choices,
            'section'  => $this->section,
            'settings' => 'edd-archive-list-elements'
        )
    )
);

/*Content Length*/
$wp_customize->add_setting('edd-archive-content-length', array(
    'default'           => $defaults['edd-archive-content-length'],
    'sanitize_callback' => 'esc_attr'
));
$wp_customize->add_control('edd-archive-content-length', array(
    'label'       => esc_html__('Excerpt length (count words)', 'cosmoswp'),
    'description' => esc_html__('Please enter a number greater than 0.', 'cosmoswp'),
    'section'     => $this->section,
    'settings'    => 'edd-archive-content-length',
    'type'        => 'number'
));

/*Icon size*/
$wp_customize->add_setting('edd-archive-list-media-width', array(
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'default'           => $defaults['edd-archive-list-media-width']
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'edd-archive-list-media-width',
        array(
            'label'       => esc_html__('Image/Media Width (%)', 'cosmoswp'),
            'section'     => $this->section,
            'settings'    => 'edd-archive-list-media-width',
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 100,
                'step' => 1,
            ),
        )
    )
);

/*Title align*/
$wp_customize->add_setting('edd-archive-list-elements-align', array(
    'default'           => $defaults['edd-archive-list-elements-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
));
$choices = cosmoswp_text_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'edd-archive-list-elements-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Elements Alignment', 'cosmoswp'),
            'section'  => $this->section,
            'settings' => 'edd-archive-list-elements-align',
        )
    )
);

/*Pagination Options*/
$wp_customize->add_setting('edd-navigation-options', array(
    'default'           => $defaults['edd-navigation-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select'
));
$choices = cosmoswp_pagination_options();
$wp_customize->add_control('edd-navigation-options', array(
    'choices'  => $choices,
    'label'    => esc_html__('Pagination Options', 'cosmoswp'),
    'section'  => $this->section,
    'settings' => 'edd-navigation-options',
    'type'     => 'select'
));