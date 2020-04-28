<?php
if (!defined('ABSPATH')) {
    exit;
}
$wp_customize->get_section('header_image')->panel           = cosmoswp_main_content_controller()->panel;
$wp_customize->get_section('header_image')->priority        = 9;
$wp_customize->get_section('header_image')->title           = esc_html__('Banner Section', 'cosmoswp');
$wp_customize->get_control('header_image')->active_callback = 'cosmoswp_banner_section_display_image';


/*single Banner Title*/
$wp_customize->add_setting('single-banner-section-title', array(
    'default'           => $main_content_defaults['single-banner-section-title'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$single_choices = cosmoswp_single_banner_title_type();
$wp_customize->add_control('single-banner-section-title', array(
    'label'           => esc_html__('Single Banner Section Title ', 'cosmoswp'),
    'choices'         => $single_choices,
    'section'         => 'header_image',
    'settings'        => 'single-banner-section-title',
    'active_callback' => 'cosmoswp_banner_section_display_enable',
    'type'            => 'select'
));

/*Single Banner Title*/
$wp_customize->add_setting('single-custom-banner-title', array(
    'default'           => $main_content_defaults['single-custom-banner-title'],
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('single-custom-banner-title', array(
    'label'           => esc_html__('Single Custom Banner Title', 'cosmoswp'),
    'section'         => 'header_image',
    'settings'        => 'single-custom-banner-title',
    'active_callback' => 'cosmoswp_single_custom_banner_title_display_enable',
    'type'            => 'text'
));

/*single Banner Title*/
$wp_customize->add_setting('single-banner-title-tag', array(
    'default'           => $main_content_defaults['single-banner-title-tag'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$tag = cosmoswp_single_banner_title_tag();
$wp_customize->add_control('single-banner-title-tag', array(
    'label'           => esc_html__('Single Banner Title Tag', 'cosmoswp'),
    'choices'         => $tag,
    'section'         => 'header_image',
    'settings'        => 'single-banner-title-tag',
    'active_callback' => 'cosmoswp_single_custom_banner_title_tag_active',
    'type'            => 'select'
));

/*Banner Title Align*/
$wp_customize->add_setting('banner-section-title-align', array(
    'default'           => $main_content_defaults['banner-section-title-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_text_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'banner-section-title-align',
        array(
            'choices'         => $choices,
            'label'           => esc_html__('Banner Text Alignment', 'cosmoswp'),
            'section'         => 'header_image',
            'active_callback' => 'cosmoswp_banner_section_display_enable',
            'settings'        => 'banner-section-title-align',
        )
    )
);

/*Banner Content Position*/
$wp_customize->add_setting('banner-section-content-position', array(
    'default'           => $main_content_defaults['banner-section-content-position'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_banner_content_position();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'banner-section-content-position',
        array(
            'choices'         => $choices,
            'label'           => esc_html__('Banner Content Position', 'cosmoswp'),
            'section'         => 'header_image',
            'active_callback' => 'cosmoswp_banner_section_display_enable',
            'settings'        => 'banner-section-content-position',
        )
    )
);

/*Banner Display*/
$choices = cosmoswp_header_image_display();
$wp_customize->add_setting('banner-section-display', array(
    'default'           => $main_content_defaults['banner-section-display'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('banner-section-display', array(
    'choices'  => $choices,
    'priority' => 1,
    'label'    => esc_html__('Banner Display Options', 'cosmoswp'),
    'section'  => 'header_image',
    'settings' => 'banner-section-display',
    'type'     => 'select'
));

/*Background Styling*/
$wp_customize->add_setting('banner-section-display-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'banner-section-display-msg',
        array(
            'label'   => esc_html__('The banner option does not display if the banner option in the page/post is selected as "hide" or page template does not display banner.Go to page where Banner Section is not hidden', 'cosmoswp'),
            'section' => 'header_image',
            'priority' => 100,
        )
    )
);

/*Banner Color*/
$wp_customize->add_setting('banner-section-color', array(
    'sanitize_callback' => 'cosmoswp_sanitize_color',
    'default'           => $main_content_defaults['banner-section-color'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Color(
        $wp_customize,
        'banner-section-color',
        array(
            'label'           => esc_html__('Banner Section Color', 'cosmoswp'),
            'section'         => 'header_image',
            'active_callback' => 'cosmoswp_banner_section_display_enable',
            'settings'        => 'banner-section-color',
        )
    )
);

/*Banner Section Background Color*/
$wp_customize->add_setting('banner-section-background-color', array(
    'sanitize_callback' => 'cosmoswp_sanitize_color',
    'default'           => $main_content_defaults['banner-section-background-color'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Color(
        $wp_customize,
        'banner-section-background-color',
        array(
            'label'           => esc_html__('Banner Section Background Color', 'cosmoswp'),
            'section'         => 'header_image',
            'active_callback' => 'cosmoswp_banner_section_display_color',
            'settings'        => 'banner-section-background-color',
        )
    )
);

/*Enable Banner overlay color */
$wp_customize->add_setting('enable-banner-overlay-color', array(
    'default'           => $main_content_defaults['enable-banner-overlay-color'],
    'sanitize_callback' => 'cosmoswp_sanitize_checkbox',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('enable-banner-overlay-color', array(
    'label'           => esc_html__('Enable Overlay Color', 'cosmoswp'),
    'section'         => 'header_image',
    'active_callback' => 'cosmoswp_enable_overlay_active',
    'settings'        => 'enable-banner-overlay-color',
    'type'            => 'checkbox'
));

/*Banner overlay color */
$wp_customize->add_setting('banner-overlay-color', array(
    'sanitize_callback' => 'cosmoswp_sanitize_color',
    'default'           => $main_content_defaults['banner-overlay-color'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Color(
        $wp_customize,
        'banner-overlay-color',
        array(
            'label'           => esc_html__('Banner Overlay Color', 'cosmoswp'),
            'section'         => 'header_image',
            'settings'        => 'banner-overlay-color',
        )
    )
);

/* banner height */
$wp_customize->add_setting('cosmoswp-banner-height', array(
    'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
    'default'           => $main_content_defaults['cosmoswp-banner-height'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Slider(
        $wp_customize,
        'cosmoswp-banner-height',
        array(
            'label'           => esc_html__('Banner Height (px)', 'cosmoswp'),
            'section'         => 'header_image',
            'active_callback' => 'cosmoswp_banner_height_activecallback',
            'settings'        => 'cosmoswp-banner-height',
            'input_attrs'     => array(
                'min'  => 0,
                'max'  => 1000,
                'step' => 1,
            ),
        )
    )
);

/*Tabs*/
$wp_customize->add_setting('banner-section-background-image-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_tabs',
    'default'           => $main_content_defaults['banner-section-background-image-options'],
    'transport'         => 'postMessage'
));
$background_image_size_options       = cosmoswp_background_image_size_options();
$background_image_position_options   = cosmoswp_background_image_position_options();
$background_image_repeat_options     = cosmoswp_background_image_repeat_options();
$background_image_attachment_options = cosmoswp_background_image_attachment_options();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Tabs(
        $wp_customize,
        'banner-section-background-image-options',
        array(
            'label'           => esc_html__('Background Image Options', 'cosmoswp'),
            'section'         => 'header_image',
            'active_callback' => 'cosmoswp_enable_banner_image_option_bg_image',
            'settings'        => 'banner-section-background-image-options',
        ),
        array(
            'tabs'   => array(
                'desktop-bg-option' => array(
                    'label' => esc_html__('Desktop', 'cosmoswp'),
                ),
                'tablet-bg-option'  => array(
                    'label' => esc_html__('Tablet', 'cosmoswp'),
                ),
                'mobile-bg-option'  => array(
                    'label' => esc_html__('Mobile', 'cosmoswp'),
                ),
            ),
            'fields' => array(

                'desktop-background-size'       => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Background Size', 'cosmoswp'),
                    'options' => $background_image_size_options,
                    'class'   => 'image-properties',
                    'tab'     => 'desktop-bg-option',
                ),
                'desktop-background-position'   => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Background Position', 'cosmoswp'),
                    'options' => $background_image_position_options,
                    'class'   => 'image-properties',
                    'tab'     => 'desktop-bg-option',
                ),
                'desktop-background-repeat'     => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Background Repeat', 'cosmoswp'),
                    'options' => $background_image_repeat_options,
                    'class'   => 'image-properties',
                    'tab'     => 'desktop-bg-option',
                ),
                'desktop-background-attachment' => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Background Attachment', 'cosmoswp'),
                    'options' => $background_image_attachment_options,
                    'class'   => 'image-properties',
                    'tab'     => 'desktop-bg-option',
                ),

                'tablet-background-size'       => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Background Size', 'cosmoswp'),
                    'options' => $background_image_size_options,
                    'class'   => 'image-properties',
                    'tab'     => 'tablet-bg-option',
                ),
                'tablet-background-position'   => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Background Position', 'cosmoswp'),
                    'options' => $background_image_position_options,
                    'class'   => 'image-properties',
                    'tab'     => 'tablet-bg-option',
                ),
                'tablet-background-repeat'     => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Background Repeat', 'cosmoswp'),
                    'options' => $background_image_repeat_options,
                    'class'   => 'image-properties',
                    'tab'     => 'tablet-bg-option',
                ),
                'tablet-background-attachment' => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Background Attachment', 'cosmoswp'),
                    'options' => $background_image_attachment_options,
                    'class'   => 'image-properties',
                    'tab'     => 'tablet-bg-option',
                ),

                'mobile-background-size'       => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Background Size', 'cosmoswp'),
                    'options' => $background_image_size_options,
                    'class'   => 'image-properties',
                    'tab'     => 'mobile-bg-option',
                ),
                'mobile-background-position'   => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Background Position', 'cosmoswp'),
                    'options' => $background_image_position_options,
                    'class'   => 'image-properties',
                    'tab'     => 'mobile-bg-option',
                ),
                'mobile-background-repeat'     => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Background Repeat', 'cosmoswp'),
                    'options' => $background_image_repeat_options,
                    'class'   => 'image-properties',
                    'tab'     => 'mobile-bg-option',
                ),
                'mobile-background-attachment' => array(
                    'type'    => 'select',
                    'label'   => esc_html__('Background Attachment', 'cosmoswp'),
                    'options' => $background_image_attachment_options,
                    'class'   => 'image-properties',
                    'tab'     => 'mobile-bg-option',
                ),
            )
        )
    )
);

/*banner Styling*/
$wp_customize->add_setting('banner-padding-margin-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'banner-padding-margin-styling-msg',
        array(
            'label'           => esc_html__('Margin & Padding', 'cosmoswp'),
            'active_callback' => 'cosmoswp_banner_section_display_enable',
            'section'         => 'header_image',
        )
    )
);

/*banner margin*/
$wp_customize->add_setting('banner-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $main_content_defaults['banner-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'banner-margin',
        array(
            'label'           => esc_html__('Margin', 'cosmoswp'),
            'section'         => 'header_image',
            'active_callback' => 'cosmoswp_banner_section_display_enable',
            'settings'        => 'banner-margin',
        ),
        array(),
        array()
    )
);

/*banner padding*/
$wp_customize->add_setting('banner-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $main_content_defaults['banner-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'banner-padding',
        array(
            'label'           => esc_html__('Padding', 'cosmoswp'),
            'section'         => 'header_image',
            'active_callback' => 'cosmoswp_banner_section_display_enable',
            'settings'        => 'banner-padding',
        ),
        array(),
        array()
    )
);