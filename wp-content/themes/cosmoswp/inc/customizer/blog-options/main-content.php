<?php
if (!defined('ABSPATH')) {
    exit;
}

/* Blog main title */
$wp_customize->add_setting('blog-main-title', array(
    'default'           => $blog_defaults['blog-main-title'],
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('blog-main-title', array(
    'label'    => esc_html__('Main Title', 'cosmoswp'),
    'section'  => cosmoswp_blog_builder()->section,
    'priority'   => 10,
    'settings' => 'blog-main-title',
    'type'     => 'text'
));
$wp_customize->selective_refresh->add_partial( 'blog-main-title', array(
    'selector'        => '#cwp-blog-entry-header',
    'render_callback' => array( $this,'cosmoswp_customize_partial_blog_header_content'),
    'container_inclusive' => true,
) );

$wp_customize->add_setting('blog-post-view-layout', array(
    'default'           => $blog_defaults['blog-post-view-layout'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('blog-post-view-layout', array(
    'choices'  => array(
        'full-width-layout' => esc_html__('Full Width layout', 'cosmoswp'),
        'column-layout'     => esc_html__('Column Layout', 'cosmoswp'),
    ),
    'label'    => esc_html__('Blog layout', 'cosmoswp'),
    'section'  => cosmoswp_blog_builder()->section,
    'priority'   => 20,
    'settings' => 'blog-post-view-layout',
    'type'     => 'select'
));
$wp_customize->selective_refresh->add_partial( 'blog-post-view-layout', array(
    'selector'        => '#cwp-blog-main-content-wrapper',
    'render_callback' => array( $this,'cosmoswp_customize_partial_blog_main_content'),
    'container_inclusive' => true,
) );

/*Post column*/
$wp_customize->add_setting('blog-column-number', array(
    'default'           => $blog_defaults['blog-column-number'],
    'sanitize_callback' => 'cosmoswp_sanitize_number',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('blog-column-number', array(
    'label'       => esc_html__('Column Number', 'cosmoswp'),
    'choices'  => array(
        '1' => esc_html__('1', 'cosmoswp'),
        '2' => esc_html__('2', 'cosmoswp'),
        '3' => esc_html__('3', 'cosmoswp'),
        '4' => esc_html__('4', 'cosmoswp'),
        '5' => esc_html__('5', 'cosmoswp'),
        '6' => esc_html__('6', 'cosmoswp'),
    ),
    'section'     => cosmoswp_blog_builder()->section,
    'settings'    => 'blog-column-number',
    'type'        => 'select',
    'priority'    => 20,
    'active_callback' => 'cosmoswp_blog_layout_column',
));

$wp_customize->selective_refresh->add_partial( 'blog-column-number', array(
    'selector'        => '#cwp-blog-main-content-wrapper',
    'render_callback' => array( $this,'cosmoswp_customize_partial_blog_main_content'),
) );

/*Blog Sidebar*/
$wp_customize->add_setting('blog-sidebar-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'blog-sidebar-msg',
        array(
            'label'   => esc_html__('Blog Page Sidebar', 'cosmoswp'),
            'section' => cosmoswp_blog_builder()->section,
            'priority'   => 30,
        )
    )
);
$wp_customize->add_setting('blog-sidebar', array(
    'default'           => $blog_defaults['blog-sidebar'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
));
$wp_customize->add_control('blog-sidebar', array(
    'label'       => esc_html__('Content/Sidebar', 'cosmoswp'),
    'choices'  => cosmoswp_sidebar_options(),
    'section'     => cosmoswp_blog_builder()->section,
    'settings'    => 'blog-sidebar',
    'type'        => 'select',
    'priority'    => 35,
));


/*Blog Styling*/
$wp_customize->add_setting('blog-elements-sorting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'blog-elements-sorting-msg',
        array(
            'label'   => esc_html__('Blog Elements Sorting', 'cosmoswp'),
            'section' => cosmoswp_blog_builder()->section,
            'priority'   => 40,
        )
    )
);

/*Blog Elements Enable and Sorting*/
$wp_customize->add_setting('blog-elements-sorting', array(
    'default'           => $blog_defaults['blog-elements-sorting'],
    'sanitize_callback' => 'cosmoswp_sanitize_multi_choices',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_posttype_elements_sorting();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Sortable(
        $wp_customize,
        'blog-elements-sorting',
        array(
            'choices'  => $choices,
            'section'  => cosmoswp_blog_builder()->section,
            'settings' => 'blog-elements-sorting',
            'priority'   => 50,
        )
    )
);
$wp_customize->selective_refresh->add_partial( 'blog-elements-sorting', array(
    'selector'        => '#cwp-blog-main-content-wrapper',
    'render_callback' => array( $this,'cosmoswp_customize_partial_blog_main_content'),
) );

/*Blog Primary Meta Sorting Msg*/
$wp_customize->add_setting('blog-primary-meta-sorting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'blog-primary-meta-sorting-msg',
        array(
            'label'   => esc_html__('Primary Meta Sorting', 'cosmoswp'),
            'section' => cosmoswp_blog_builder()->section,
            'priority'   => 60,
        )
    )
);

/*Blog Primary Meta Sorting*/
$wp_customize->add_setting('blog-primary-meta-sorting', array(
    'default'           => $blog_defaults['blog-primary-meta-sorting'],
    'sanitize_callback' => 'cosmoswp_sanitize_multi_choices',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_meta_elements_sorting();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Sortable(
        $wp_customize,
        'blog-primary-meta-sorting',
        array(
            'choices'  => $choices,
            'section'  => cosmoswp_blog_builder()->section,
            'settings' => 'blog-primary-meta-sorting',
             'priority'   => 60,

        )
    )
);
$wp_customize->selective_refresh->add_partial( 'blog-primary-meta-sorting', array(
    'selector'        => '#cwp-blog-main-content-wrapper',
    'render_callback' => array( $this,'cosmoswp_customize_partial_blog_main_content'),
) );

/*Blog Secondary Meta Sorting Msg*/
$wp_customize->add_setting('blog-secondary-meta-sorting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'blog-secondary-meta-sorting-msg',
        array(
            'label'   => esc_html__('Secondary Meta Sorting', 'cosmoswp'),
            'section' => cosmoswp_blog_builder()->section,
            'priority'   => 70,
        )
    )
);

/*Blog Secondary Meta Sorting*/
$wp_customize->add_setting('blog-secondary-meta-sorting', array(
    'default'           => $blog_defaults['blog-secondary-meta-sorting'],
    'sanitize_callback' => 'cosmoswp_sanitize_multi_choices',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_meta_elements_sorting();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Sortable(
        $wp_customize,
        'blog-secondary-meta-sorting',
        array(
            'choices'  => $choices,
            'section'  => cosmoswp_blog_builder()->section,
            'settings' => 'blog-secondary-meta-sorting',
            'priority'   => 80,
        )
    )
);
$wp_customize->selective_refresh->add_partial( 'blog-secondary-meta-sorting', array(
    'selector'        => '#cwp-blog-main-content-wrapper',
    'render_callback' => array( $this,'cosmoswp_customize_partial_blog_main_content'),
) );

/*Blog Content Setting Msg*/
$wp_customize->add_setting('blog-excerpt-setting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'blog-excerpt-setting-msg',
        array(
            'label'   => esc_html__('Excerpt Setting', 'cosmoswp'),
            'section' => cosmoswp_blog_builder()->section,
            'priority'   => 90,
        )
    )
);

/*Blog Content Length*/
$wp_customize->add_setting('blog-excerpt-length', array(
    'default'           => $blog_defaults['blog-excerpt-length'],
    'sanitize_callback' => 'esc_attr',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('blog-excerpt-length', array(
    'label'           => esc_html__('Excerpt length (count words)', 'cosmoswp'),
    'description'     => esc_html__('Please enter a number greater than 0.', 'cosmoswp'),
    'section'         => cosmoswp_blog_builder()->section,
    'settings'        => 'blog-excerpt-length',
    'priority'        => 100,
    'type'            => 'number'
));
$wp_customize->selective_refresh->add_partial( 'blog-excerpt-length', array(
    'selector'        => '#cwp-blog-main-content-wrapper',
    'render_callback' => array( $this,'cosmoswp_customize_partial_blog_main_content'),
) );

/*Blog Read More Text*/
$wp_customize->add_setting('blog-read-more-text', array(
    'default'           => $blog_defaults['blog-read-more-text'],
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage'
));
$wp_customize->add_control('blog-read-more-text', array(
    'label'    => esc_html__('Read More Text', 'cosmoswp'),
    'section'  => cosmoswp_blog_builder()->section,
    'settings' => 'blog-read-more-text',
    'priority' => 110,
    'type'     => 'text'
));
$wp_customize->selective_refresh->add_partial( 'blog-read-more-text', array(
    'selector'        => '#cwp-blog-main-content-wrapper',
    'render_callback' => array( $this,'cosmoswp_customize_partial_blog_main_content'),
) );

$wp_customize->add_setting('blog-excerpt-note', array(
    'sanitize_callback' => 'esc_attr',
    'capability'        => 'edit_theme_options',
));

$description = esc_html__('Note: Excerpt Options only works when excerpts is enable in "BLOG ELEMENTS".', 'cosmoswp');
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Message(
        $wp_customize,
        'blog-excerpt-note',
        array(
            'description' => $description,
            'priority' => 110,
            'section'     => cosmoswp_blog_builder()->section,
        )
    )
);

/*Blog Featured Image Setting Msg*/
$wp_customize->add_setting('featured-image-setting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'featured-image-setting-msg',
        array(
            'label'   => esc_html__('Featured Image Setting', 'cosmoswp'),
            'section' => cosmoswp_blog_builder()->section,
            'priority' => 120,
        )
    )
);

/*Blog Featured Section Layout*/
$wp_customize->add_setting('blog-feature-section-layout', array(
    'default'           => $blog_defaults['blog-feature-section-layout'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_feature_section_layout();
$wp_customize->add_control('blog-feature-section-layout', array(
    'choices'  => $choices,
    'label'    => esc_html__('Featured Section Layout', 'cosmoswp'),
    'section'  => cosmoswp_blog_builder()->section,
    'settings' => 'blog-feature-section-layout',
    'priority' => 130,
    'type'     => 'select'
));
$wp_customize->selective_refresh->add_partial( 'blog-feature-section-layout', array(
    'selector'        => '#cwp-blog-main-content-wrapper',
    'render_callback' => array( $this,'cosmoswp_customize_partial_blog_main_content'),
) );

/*Blog Featured Image Size*/
$wp_customize->add_setting('blog-img-size', array(
    'default'           => $blog_defaults['blog-img-size'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_get_image_sizes_options();
$wp_customize->add_control('blog-img-size', array(
    'choices'  => $choices,
    'label'    => esc_html__('Featured Image Size', 'cosmoswp'),
    'section'  => cosmoswp_blog_builder()->section,
    'settings' => 'blog-img-size',
    'priority' => 140,
    'type'     => 'select'
));
$wp_customize->selective_refresh->add_partial( 'blog-img-size', array(
    'selector'        => '#cwp-blog-main-content-wrapper',
    'render_callback' => array( $this,'cosmoswp_customize_partial_blog_main_content'),
) );

/*Blog Pagination Setting*/
$wp_customize->add_setting('blog-pagination-setting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'blog-pagination-setting-msg',
        array(
            'label'   => esc_html__('Pagination Setting', 'cosmoswp'),
            'section' => cosmoswp_blog_builder()->section,
            'priority' => 150,
        )
    )
);

/*Blog Pagination Options*/
$wp_customize->add_setting('blog-navigation-options', array(
    'default'           => $blog_defaults['blog-navigation-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_pagination_options();
$wp_customize->add_control('blog-navigation-options', array(
    'choices'     => $choices,
    'label'       => esc_html__('Pagination Options', 'cosmoswp'),
    'description' => esc_html__('Blog and Archive Pages Pagination', 'cosmoswp'),
    'section'     => cosmoswp_blog_builder()->section,
    'settings'    => 'blog-navigation-options',
    'priority'    => 160,
    'type'        => 'select'
));
$wp_customize->selective_refresh->add_partial( 'blog-navigation-options', array(
    'selector'        => '#cwp-blog-main-content-wrapper',
    'render_callback' => array( $this,'cosmoswp_customize_partial_blog_main_content'),
) );

/*pagination align*/
$wp_customize->add_setting('blog-navigation-align', array(
    'default'           => $blog_defaults['blog-navigation-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_flex_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Buttonset(
        $wp_customize,
        'blog-navigation-align',
        array(
            'choices'         => $choices,
            'label'           => esc_html__('Pagination Alignment', 'cosmoswp'),
            'section'         => cosmoswp_blog_builder()->section,
            'active_callback' => 'cosmoswp_blog_pagination_active',
            'priority'        => 170,
            'settings'        => 'blog-navigation-align',
        )
    )
);
$wp_customize->selective_refresh->add_partial( 'blog-navigation-align', array(
    'selector'        => '#cwp-blog-main-content-wrapper',
    'render_callback' => array( $this,'cosmoswp_customize_partial_blog_main_content'),
) );


/*Blog Pagination Border & Box*/
$wp_customize->add_setting('blog-navigation-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_border',
    'default'           => $blog_defaults['blog-navigation-styling'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'blog-navigation-styling',
        array(
            'label'           => esc_html__('Border & Box', 'cosmoswp'),
            'section'         => cosmoswp_blog_builder()->section,
            'settings'        => 'blog-navigation-styling',
            'priority'        => 180,
            'active_callback' => 'cosmoswp_blog_numeric_pagination_activecallback',
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
                'class' => 'cwp-element-show',
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

/*Blog Pagination Color Options*/
$wp_customize->add_setting('blog-pagination-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $blog_defaults['blog-pagination-color-options'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'blog-pagination-color-options',
        array(
            'label'           => esc_html__('Color Options', 'cosmoswp'),
            'section'         => cosmoswp_blog_builder()->section,
            'settings'        => 'blog-pagination-color-options',
            'priority'        => 190,
            'active_callback' => 'cosmoswp_blog_numeric_pagination_activecallback',

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


/*Blog Pagination Color Options*/
$wp_customize->add_setting('blog-default-pagination-color-options', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_background',
    'default'           => $blog_defaults['blog-default-pagination-color-options'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'blog-default-pagination-color-options',
        array(
            'label'           => esc_html__('Color Options', 'cosmoswp'),
            'section'         => cosmoswp_blog_builder()->section,
            'settings'        => 'blog-default-pagination-color-options',
            'priority'        => 200,
            'active_callback' => 'cosmoswp_blog_default_pagination_activecallback',

        ),
        array(
            'text-color'       => array(
                'type'  => 'color',
                'label' => esc_html__('Title Color', 'cosmoswp'),
            ),
            'text-hover-color' => array(
                'type'  => 'color',
                'label' => esc_html__('Title Hover Color', 'cosmoswp'),
            ),
        )
    )
);

/*Blog Additional Setting*/
$wp_customize->add_setting('blog-additional-setting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'blog-additional-setting-msg',
        array(
            'label'   => esc_html__('Additional Setting', 'cosmoswp'),
            'section' => cosmoswp_blog_builder()->section,
            'priority'        => 220,
        )
    )
);

/*Exclude Categories In Blog Page*/
$choices = cosmoswp_get_categories();
$wp_customize->add_setting('blog-post-exclude-categories', array(
    'default'           => $blog_defaults['blog-post-exclude-categories'],
    'sanitize_callback' => 'cosmoswp_sanitize_multicheck',
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Customize_Multicheck_Control(
        $wp_customize,
        'blog-post-exclude-categories',
        array(
            'label'       => esc_html__('Exclude Categories In Blog Page', 'cosmoswp'),
            'description' => esc_html__('Check categories you want to exclude from blog page', 'cosmoswp'),
            'section'     => cosmoswp_blog_builder()->section,
            'settings'    => 'blog-post-exclude-categories',
            'priority'    => 230,
            'choices'     => $choices
        )
    )
);
$wp_customize->selective_refresh->add_partial( 'blog-post-exclude-categories', array(
    'selector'        => '#cwp-blog-main-content-wrapper',
    'render_callback' => array( $this,'cosmoswp_customize_partial_blog_main_content'),
) );


/*Blog General Styling*/
$wp_customize->add_setting('blog-main-content-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'blog-main-content-styling-msg',
        array(
            'label'   => esc_html__('Main Content Styling', 'cosmoswp'),
            'section' => cosmoswp_blog_builder()->section,
            'priority'    => 240,
        )
    )
);
/*Margin*/
$wp_customize->add_setting('blog-main-content-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $blog_defaults['blog-main-content-margin'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'blog-main-content-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => cosmoswp_blog_builder()->section,
            'settings' => 'blog-main-content-margin',
            'priority'    => 240,
        ),
        array(),
        array()
    )
);
/*Padding*/
$wp_customize->add_setting('blog-main-content-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $blog_defaults['blog-main-content-padding'],
    'transport'         => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'blog-main-content-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => cosmoswp_blog_builder()->section,
            'settings' => 'blog-main-content-padding',
            'priority' => 240,
        ),
        array(),
        array()
    )
);