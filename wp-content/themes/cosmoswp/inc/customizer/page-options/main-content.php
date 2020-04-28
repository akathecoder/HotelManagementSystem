<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Page Sidebar*/
$wp_customize->add_setting('page-sidebar', array(
    'default'           => $page_defaults['page-sidebar'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
));
$wp_customize->add_control('page-sidebar', array(
    'label'       => esc_html__('Content/Sidebar', 'cosmoswp'),
    'choices'  => cosmoswp_sidebar_options(),
    'section'     => cosmoswp_page_builder()->section,
    'settings'    => 'page-sidebar',
    'type'        => 'select',
));

/* Page Styling*/
$wp_customize->add_setting('page-elements-sorting-with-title-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'page-elements-sorting-with-title-msg',
        array(
            'label'   => esc_html__('Page Elements Sorting', 'cosmoswp'),
            'section' => cosmoswp_page_builder()->section,
        )
    )
);

/*page Elements Enable and Sorting*/
$wp_customize->add_setting('page-elements-sorting-with-title', array(
    'default'           => $page_defaults['page-elements-sorting-with-title'],
    'sanitize_callback' => 'cosmoswp_sanitize_multi_choices',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_posttype_elements_sorting();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Sortable(
        $wp_customize,
        'page-elements-sorting-with-title',
        array(
            'choices'  => $choices,
            'section'  => cosmoswp_page_builder()->section,
            'settings' => 'page-elements-sorting-with-title',
        )
    )
);
$wp_customize->selective_refresh->add_partial( 'page-elements-sorting-with-title', array(
    'selector'        => '#cosmoswp-page-main-content-wrapper',
    'render_callback' => array( $this,'cosmoswp_customize_partial_page_main_content'),
) );

/*Page Primary Meta Sorting*/
$wp_customize->add_setting('page-primary-meta-sorting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'page-primary-meta-sorting-msg',
        array(
            'label'   => esc_html__('Primary Meta Sorting', 'cosmoswp'),
            'section' => cosmoswp_page_builder()->section,
        )
    )
);

/*Primary Meta Sorting*/
$wp_customize->add_setting('page-primary-meta-sorting', array(
    'default'           => $page_defaults['page-primary-meta-sorting'],
    'sanitize_callback' => 'cosmoswp_sanitize_multi_choices',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_meta_elements_sorting('page');
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Sortable(
        $wp_customize,
        'page-primary-meta-sorting',
        array(
            'choices'  => $choices,
            'section'  => cosmoswp_page_builder()->section,
            'settings' => 'page-primary-meta-sorting'
        )
    )
);
$wp_customize->selective_refresh->add_partial( 'page-primary-meta-sorting', array(
    'selector'        => '#cosmoswp-page-main-content-wrapper',
    'render_callback' => array( $this,'cosmoswp_customize_partial_page_main_content'),
) );

/*Secondary Meta Sorting*/
$wp_customize->add_setting('page-secondary-meta-sorting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'page-secondary-meta-sorting-msg',
        array(
            'label'   => esc_html__('Secondary Meta Sorting', 'cosmoswp'),
            'section' => cosmoswp_page_builder()->section,
        )
    )
);

/*Secondary Meta Sorting*/
$wp_customize->add_setting('page-secondary-meta-sorting', array(
    'default'           => $page_defaults['page-secondary-meta-sorting'],
    'sanitize_callback' => 'cosmoswp_sanitize_multi_choices',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_meta_elements_sorting('page');
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Sortable(
        $wp_customize,
        'page-secondary-meta-sorting',
        array(
            'choices'  => $choices,
            'section'  => cosmoswp_page_builder()->section,
            'settings' => 'page-secondary-meta-sorting'
        )
    )
);
$wp_customize->selective_refresh->add_partial( 'page-secondary-meta-sorting', array(
    'selector'        => '#cosmoswp-page-main-content-wrapper',
    'render_callback' => array( $this,'cosmoswp_customize_partial_page_main_content'),
) );

/*Page Excerpt Setting Msg*/
$wp_customize->add_setting('page-excerpt-setting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'page-excerpt-setting-msg',
        array(
            'label'   => esc_html__('Excerpt Setting', 'cosmoswp'),
            'section' => cosmoswp_page_builder()->section,
        )
    )
);

/*page excerpt Length*/
$wp_customize->add_setting('page-excerpt-length', array(
    'default'           => $page_defaults['page-excerpt-length'],
    'sanitize_callback' => 'esc_attr',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('page-excerpt-length', array(
    'label'           => esc_html__('Excerpt length (count words)', 'cosmoswp'),
    'description'     => esc_html__('Please enter a number greater than 0.', 'cosmoswp'),
    'section'         => cosmoswp_page_builder()->section,
    'settings'        => 'page-excerpt-length',
    'type'            => 'number'
));
$wp_customize->selective_refresh->add_partial( 'page-excerpt-length', array(
    'selector'        => '#cosmoswp-page-main-content-wrapper',
    'render_callback' => array( $this,'cosmoswp_customize_partial_page_main_content'),
) );

$wp_customize->add_setting('page-excerpt-note-msg', array(
    'sanitize_callback' => 'esc_attr',
    'capability'        => 'edit_theme_options',
));
$description = esc_html__('Note: Excerpt Options only works when excerpts is enable in "PAGE ELEMENTS SORTING".', 'cosmoswp');
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Message(
        $wp_customize,
        'page-excerpt-note-msg',
        array(
            'description' => $description,
            'section'     => cosmoswp_page_builder()->section,
        )
    )
);

/*Featured Image Setting*/
$wp_customize->add_setting('page-featured-image-setting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'page-featured-image-setting-msg',
        array(
            'label'   => esc_html__('Featured Image Setting', 'cosmoswp'),
            'section' => cosmoswp_page_builder()->section,
        )
    )
);

/*Feature Layout*/
$wp_customize->add_setting('page-feature-section-layout', array(
    'default'           => $page_defaults['page-feature-section-layout'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_feature_section_layout();
$wp_customize->add_control('page-feature-section-layout', array(
    'choices'  => $choices,
    'label'    => esc_html__('Feature Section Layout', 'cosmoswp'),
    'section'  => cosmoswp_page_builder()->section,
    'settings' => 'page-feature-section-layout',
    'type'     => 'select'
));
$wp_customize->selective_refresh->add_partial( 'page-feature-section-layout', array(
    'selector'        => '#cosmoswp-page-main-content-wrapper',
    'render_callback' => array( $this,'cosmoswp_customize_partial_page_main_content'),
) );

/*Image Size*/
$wp_customize->add_setting('page-img-size', array(
    'default'           => $page_defaults['page-img-size'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_get_image_sizes_options();
$wp_customize->add_control('page-img-size', array(
    'choices'  => $choices,
    'label'    => esc_html__('Feature Image Size', 'cosmoswp'),
    'section'  => cosmoswp_page_builder()->section,
    'settings' => 'page-img-size',
    'type'     => 'select'
));
$wp_customize->selective_refresh->add_partial( 'page-img-size', array(
    'selector'        => '#cosmoswp-page-main-content-wrapper',
    'render_callback' => array( $this,'cosmoswp_customize_partial_page_main_content'),
) );

/*Page General Styling*/
$wp_customize->add_setting('page-main-content-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'page-main-content-styling-msg',
        array(
            'label'   => esc_html__('Main Content Styling', 'cosmoswp'),
            'section' => cosmoswp_page_builder()->section,
        )
    )
);
/*Margin*/
$wp_customize->add_setting('page-main-content-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $page_defaults['page-main-content-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'page-main-content-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => cosmoswp_page_builder()->section,
            'settings' => 'page-main-content-margin',
        ),
        array(),
        array()
    )
);
/*Padding*/
$wp_customize->add_setting('page-main-content-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $page_defaults['page-main-content-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'page-main-content-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => cosmoswp_page_builder()->section,
            'settings' => 'page-main-content-padding',
        ),
        array(),
        array()
    )
);