<?php
if (!defined('ABSPATH')) {
    exit;
}

$static_front_page = $wp_customize->get_section('static_front_page');
if (!empty($static_front_page)) {
    $static_front_page->priority = 1;
}

$custom_css = $wp_customize->get_section('custom_css');
if (!empty($custom_css)) {
    $custom_css->priority = 110;
}

/*General Header*/
$wp_customize->add_section($this->general_setting_section, array(
    'title'    => esc_html__('General Setting', 'cosmoswp'),
    'priority' => 10,
));

/*Header General Layout*/
$choices = cosmoswp_dynamic_css_option();
$wp_customize->add_setting('dynamic-css-options', array(
    'default'           => $general_setting_defaults['dynamic-css-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
));
$wp_customize->add_control('dynamic-css-options', array(
    'label'    => esc_html__('Dynamic css options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->general_setting_section,
    'settings' => 'dynamic-css-options',
    'priority' => 10,
    'choices'  => $choices
));

/*General Site Layout*/
$choices = cosmoswp_site_main_general_layout_option();
$wp_customize->add_setting('general-setting-layout', array(
    'default'           => $general_setting_defaults['general-setting-layout'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage',
));
$wp_customize->add_control('general-setting-layout', array(
    'label'    => esc_html__('Site Layout', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->general_setting_section,
    'settings' => 'general-setting-layout',
    'priority' => 20,
    'choices'  => $choices
));

/*General Content Layout*/
$choices = cosmoswp_site_content_layout_option();
$wp_customize->add_setting('general-content-layout', array(
    'default'           => $general_setting_defaults['general-content-layout'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage',
));
$wp_customize->add_control('general-content-layout', array(
    'label'    => esc_html__('Content Layout', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->general_setting_section,
    'settings' => 'general-content-layout',
    'priority' => 25,
    'choices'  => $choices
));

/*Background Styling*/
$wp_customize->add_setting('general-setting-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'general-setting-styling-msg',
        array(
            'label'   => esc_html__('Color Options', 'cosmoswp'),
            'section' => $this->general_setting_section,
            'priority' => 30,
        )
    )
);

/*Custom Background*/
$wp_customize->add_setting('general-setting-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $general_setting_defaults['general-setting-color-options'],
    'transport'         => 'postMessage',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'general-setting-color-options',
        array(
            'label'    => esc_html__('Color Options', 'cosmoswp'),
            'section'  => $this->general_setting_section,
            'settings' => 'general-setting-color-options',
            'priority' => 40,
        ),
        array(
            'primary-color'    => array(
                'type'  => 'color',
                'label' => esc_html__('Primary Color', 'cosmoswp'),
            ),
            'text-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Text Color', 'cosmoswp'),
            ),
            'title-color'      => array(
                'type'  => 'color',
                'label' => esc_html__('Title Color', 'cosmoswp'),
            ),
            'link-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Link Color', 'cosmoswp'),
            ),
            'link-hover-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Link Hover Color', 'cosmoswp'),
            ),
            'meta-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Meta Data Color', 'cosmoswp'),
            ),
        )
    )
);

/*Typography Msg*/
$wp_customize->add_setting('general-setting-typography-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'general-setting-typography-msg',
        array(
            'label'   => esc_html__('Typography Option', 'cosmoswp'),
            'section' => $this->general_setting_section,
            'priority' => 50,
        )
    )
);

/*Body/P Typography*/
$wp_customize->add_setting('general-setting-body-p-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $general_setting_defaults['general-setting-body-p-typography'],
    'transport'         => 'postMessage',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'general-setting-body-p-typography',
        array(
            'label'    => esc_html__('Body & Paragraph', 'cosmoswp'),
            'section'  => $this->general_setting_section,
            'settings' => 'general-setting-body-p-typography',
            'priority' => 60,
        ),
        cosmoswp_typography_group_fields()
    )
);

/*H1 Typography*/
$wp_customize->add_setting('general-setting-h1-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $general_setting_defaults['general-setting-h1-typography'],
    'transport'         => 'postMessage',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'general-setting-h1-typography',
        array(
            'label'    => esc_html__('Heading H1', 'cosmoswp'),
            'section'  => $this->general_setting_section,
            'settings' => 'general-setting-h1-typography',
            'priority' => 70,
        ),
        cosmoswp_typography_group_fields()
    )
);

/*H2 Typography*/
$wp_customize->add_setting('general-setting-h2-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $general_setting_defaults['general-setting-h2-typography'],
    'transport'         => 'postMessage',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'general-setting-h2-typography',
        array(
            'label'    => esc_html__('Heading H2', 'cosmoswp'),
            'section'  => $this->general_setting_section,
            'settings' => 'general-setting-h2-typography',
            'priority' => 80,

        ),
        cosmoswp_typography_group_fields()
    )
);

/*H3 Typography*/
$wp_customize->add_setting('general-setting-h3-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $general_setting_defaults['general-setting-h3-typography'],
    'transport'         => 'postMessage',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'general-setting-h3-typography',
        array(
            'label'    => esc_html__('Heading H3', 'cosmoswp'),
            'section'  => $this->general_setting_section,
            'settings' => 'general-setting-h3-typography',
            'priority' => 90,
        ),
        cosmoswp_typography_group_fields()
    )
);

/*H4 Typography*/
$wp_customize->add_setting('general-setting-h4-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $general_setting_defaults['general-setting-h4-typography'],
    'transport'         => 'postMessage',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'general-setting-h4-typography',
        array(
            'label'    => esc_html__('Heading H4', 'cosmoswp'),
            'section'  => $this->general_setting_section,
            'settings' => 'general-setting-h4-typography',
            'priority' => 92,

        ),
        cosmoswp_typography_group_fields()
    )
);

/*H5 Typography*/
$wp_customize->add_setting('general-setting-h5-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $general_setting_defaults['general-setting-h5-typography'],
    'transport'         => 'postMessage',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'general-setting-h5-typography',
        array(
            'label'    => esc_html__('Heading H5', 'cosmoswp'),
            'section'  => $this->general_setting_section,
            'settings' => 'general-setting-h5-typography',
            'priority' => 94,

        ),
        cosmoswp_typography_group_fields()
    )
);

/*H6 Typography*/
$wp_customize->add_setting('general-setting-h6-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $general_setting_defaults['general-setting-h6-typography'],
    'transport'         => 'postMessage',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'general-setting-h6-typography',
        array(
            'label'    => esc_html__('Heading H6', 'cosmoswp'),
            'section'  => $this->general_setting_section,
            'settings' => 'general-setting-h6-typography',
            'priority' => 96,

        ),
        cosmoswp_typography_group_fields()
    )
);

