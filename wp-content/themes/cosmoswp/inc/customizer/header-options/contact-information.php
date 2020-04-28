<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Contact Information section*/
$wp_customize->add_section($this->contact_information, array(
    'title' => esc_html__('Contact Information', 'cosmoswp'),
    'panel' => $this->panel,
));

/* Contact Information data*/
$wp_customize->add_setting('contact-information-data', array(
    'sanitize_callback' => 'cosmoswp_sanitize_social_data',
    'default'           => $header_defaults['contact-information-data'],
    'transport'         => 'postMessage'
));
$contact_link_options = cosmoswp_contact_link_type();
$wp_customize->add_control(
    new CosmosWP_Repeater_Control(
        $wp_customize,
        'contact-information-data',
        array(
            'label'                      => esc_html__('Contact Options Selection', 'cosmoswp'),
            'description'                => esc_html__('Select Contact Information and enter text', 'cosmoswp'),
            'section'                    => $this->contact_information,
            'settings'                   => 'contact-information-data',
            'repeater_main_label'        => esc_html__('Contact Information', 'cosmoswp'),
            'repeater_add_control_field' => esc_html__('Add New Contact Information', 'cosmoswp')
        ),
        array(
            'icon'      => array(
                'type'  => 'icons',
                'label' => esc_html__('Select Icon', 'cosmoswp'),
            ),
            'title'     => array(
                'type'  => 'text',
                'label' => esc_html__('Enter Title', 'cosmoswp'),
            ),
            'text'      => array(
                'type'  => 'text',
                'label' => esc_html__('Enter Sub Title', 'cosmoswp'),
            ),
            'link-type' => array(
                'type'    => 'select',
                'label'   => esc_html__('Link Type', 'cosmoswp'),
                'options' => $contact_link_options
            ),
            'link'      => array(
                'type'  => 'url',
                'label' => esc_html__('Enter Link URL', 'cosmoswp'),
            ),
            'checkbox'  => array(
                'type'  => 'checkbox',
                'label' => esc_html__('Open in New Window', 'cosmoswp'),
            ),
        )
    )
);

/*Contact Information Msg*/
$wp_customize->add_setting('contact-info-align-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'contact-info-align-msg',
        array(
            'label'   => esc_html__('Alignment ', 'cosmoswp'),
            'section' => $this->contact_information
        )
    )
);

/*Contact Information align*/
$wp_customize->add_setting('contact-information-align', array(
    'default'           => $header_defaults['contact-information-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_field_responsive_buttonset',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_flex_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Responsive_Buttonset(
        $wp_customize,
        'contact-information-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Contact Info Alignment', 'cosmoswp'),
            'section'  => $this->contact_information,
            'settings' => 'contact-information-align',
        )
    )
);

/*Margin & Padding Msg*/
$wp_customize->add_setting('contact-info-padding-margin-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'contact-info-padding-margin-msg',
        array(
            'label'   => esc_html__('Margin & Padding', 'cosmoswp'),
            'section' => $this->contact_information
        )
    )
);

/*Margin*/
$wp_customize->add_setting('contact-info-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['contact-info-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'contact-info-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->contact_information,
            'settings' => 'contact-info-margin',
        ),
        array(),
        array()
    )
);

/*Padding*/
$wp_customize->add_setting('contact-info-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['contact-info-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'contact-info-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->contact_information,
            'settings' => 'contact-info-padding',
        ),
        array(),
        array()
    )
);

/*Icon setting*/
$wp_customize->add_setting('contact-info-icon-setting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'contact-info-icon-setting-msg',
        array(
            'label'   => esc_html__('Icon Setting', 'cosmoswp'),
            'section' => $this->contact_information,
        )
    )
);

/*Icon size*/
$wp_customize->add_setting('contact-info-icon-size', array(
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'default'           => $header_defaults['contact-info-icon-size'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'contact-info-icon-size',
        array(
            'label'       => esc_html__('Icon Size (px)', 'cosmoswp'),
            'section'     => $this->contact_information,
            'settings'    => 'contact-info-icon-size',
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 100,
                'step' => 1,
            ),
        )
    )
);

/*Icon Color*/
$wp_customize->add_setting('contact-info-icon-color', array(
    'sanitize_callback' => 'cosmoswp_sanitize_color',
    'default'           => $header_defaults['contact-info-icon-color'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Color(
        $wp_customize,
        'contact-info-icon-color',
        array(
            'label'    => esc_html__('Icon Color', 'cosmoswp'),
            'section'  => $this->contact_information,
            'settings' => 'contact-info-icon-color',
        )
    )
);

/*Title Setting*/
$wp_customize->add_setting('contact-info-title-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'contact-info-title-msg',
        array(
            'label'   => esc_html__('Title Setting', 'cosmoswp'),
            'section' => $this->contact_information,
        )
    )
);

/*Title Color*/
$wp_customize->add_setting('contact-info-title-color', array(
    'sanitize_callback' => 'cosmoswp_sanitize_color',
    'default'           => $header_defaults['contact-info-title-color'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Color(
        $wp_customize,
        'contact-info-title-color',
        array(
            'label'    => esc_html__('Title Color', 'cosmoswp'),
            'section'  => $this->contact_information,
            'settings' => 'contact-info-title-color',
        )
    )
);

/*Title Typography Options*/
$wp_customize->add_setting('contact-info-title-typography-options', array(
    'default'           => $header_defaults['contact-info-title-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_inherit_options();
$wp_customize->add_control('contact-info-title-typography-options', array(
    'label'    => esc_html__('Title Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->contact_information,
    'settings' => 'contact-info-title-typography-options',
    'choices'  => $choices
));

/*Title Typography data*/
$wp_customize->add_setting('contact-info-title-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $header_defaults['contact-info-title-typography'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'contact-info-title-typography',
        array(
            'label'           => esc_html__('Title Typography', 'cosmoswp'),
            'section'         => $this->contact_information,
            'active_callback' => 'cosmoswp_contact_info_title_typography_if_custom',
            'settings'        => 'contact-info-title-typography',
        ),
        cosmoswp_typography_group_fields()
    )
);

/*Sub Title Setting*/
$wp_customize->add_setting('contact-info-sub-title-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'contact-info-sub-title-msg',
        array(
            'label'   => esc_html__('Sub Title Setting', 'cosmoswp'),
            'section' => $this->contact_information,
        )
    )
);

/*Sub Title Color*/
$wp_customize->add_setting('contact-info-subtitle-color', array(
    'sanitize_callback' => 'cosmoswp_sanitize_color',
    'default'           => $header_defaults['contact-info-subtitle-color'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Color(
        $wp_customize,
        'contact-info-subtitle-color',
        array(
            'label'    => esc_html__('Sub Title Color', 'cosmoswp'),
            'section'  => $this->contact_information,
            'settings' => 'contact-info-subtitle-color',
        )
    )
);

/*Sub Title Typography Options*/
$wp_customize->add_setting('contact-info-subtitle-typography-options', array(
    'default'           => $header_defaults['contact-info-subtitle-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_inherit_options();
$wp_customize->add_control('contact-info-subtitle-typography-options', array(
    'label'    => esc_html__('Sub Title Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => $this->contact_information,
    'settings' => 'contact-info-subtitle-typography-options',
    'choices'  => $choices
));

/*Typography data*/
$wp_customize->add_setting('contact-info-subtitle-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $header_defaults['contact-info-subtitle-typography'],
    'transport'         => 'postMessage'
));

$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'contact-info-subtitle-typography',
        array(
            'label'           => esc_html__('Sub Title Typography', 'cosmoswp'),
            'section'         => $this->contact_information,
            'active_callback' => 'cosmoswp_contact_info_subtitle_typography_if_custom',
            'settings'        => 'contact-info-subtitle-typography',
        ),
        cosmoswp_typography_group_fields()
    )
);

/*Contact Information Styling Msg*/
$wp_customize->add_setting('contact-info-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'contact-info-styling-msg',
        array(
            'label'   => esc_html__('Contact Information Item Styling', 'cosmoswp'),
            'section' => $this->contact_information,
        )
    )
);

/*Margin*/
$wp_customize->add_setting('contact-info-item-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['contact-info-item-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'contact-info-item-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => $this->contact_information,
            'settings' => 'contact-info-item-margin',
        ),
        array(),
        array()
    )
);

/*Padding*/
$wp_customize->add_setting('contact-info-item-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['contact-info-item-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'contact-info-item-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => $this->contact_information,
            'settings' => 'contact-info-item-padding',
        ),
        array(),
        array()
    )
);

/*Border*/
$wp_customize->add_setting('contact-info-title-border-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $header_defaults['contact-info-title-border-styling'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'contact-info-title-border-styling',
        array(
            'label'    => esc_html__('Border', 'cosmoswp'),
            'section'  => $this->contact_information,
            'settings' => 'contact-info-title-border-styling',
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
                'default'  => '#fff',
                'label' => esc_html__('Border Color', 'cosmoswp'),
            ),
        )
    )
);
