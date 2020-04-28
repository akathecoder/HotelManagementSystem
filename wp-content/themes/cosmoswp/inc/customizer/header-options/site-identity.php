<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Site Identity Sorting*/
$wp_title_tagline = $wp_customize->get_section('title_tagline');
if (!empty($wp_title_tagline)) {
    $wp_title_tagline->panel    = $this->panel;
    $wp_title_tagline->priority = 45;
}

/*Site Logo Msg*/
$wp_customize->add_setting('site-logo-msg', array(
	'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
	new CosmosWP_Custom_Control_Heading(
		$wp_customize,
		'site-logo-msg',
		array(
			'label'   => esc_html__('Site Logo ', 'cosmoswp'),
			'section' =>'title_tagline',
		)
	)
);

/*Site Logo*/
/*Site Logo Max width*/
$wp_customize->add_setting('site-logo-max-width', array(
	'sanitize_callback' => 'cosmoswp_sanitize_slider_field',
	'default'           => $header_defaults['site-logo-max-width']
));
$wp_customize->add_control(
	new CosmosWP_Custom_Control_Slider(
		$wp_customize,
		'site-logo-max-width',
		array(
			'label'       => esc_html__('Logo Max Width (px)', 'cosmoswp'),
			'section'     => 'title_tagline',
			'settings'    => 'site-logo-max-width',
			'input_attrs' => array(
				'min'  => 10,
				'max'  => 100,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting('site-logo-position', array(
    'default'           => $header_defaults['site-logo-position'],
    'sanitize_callback' => 'cosmoswp_sanitize_field_responsive_buttonset',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_site_identity_logo_options();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Responsive_Buttonset(
        $wp_customize,
        'site-logo-position',
        array(
            'choices'  => $choices,
            'label'    => esc_html__('Logo Position', 'cosmoswp'),
            'section'  =>'title_tagline',
            'settings' => 'site-logo-position',
        )
    )
);

/*Site Identity Msg*/
$wp_customize->add_setting('site-identity-sorting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'site-identity-sorting-msg',
        array(
            'label'   => esc_html__('Site Identity Sorting ', 'cosmoswp'),
            'section' =>'title_tagline',
        )
    )
);

/*Site Identity Sorting*/
$wp_customize->add_setting('site-identity-sorting', array(
    'default'           => $header_defaults['site-identity-sorting'],
    'sanitize_callback' => 'cosmoswp_sanitize_multi_choices',
    'transport'         => 'postMessage',

));
$choices = cosmoswp_site_identity_sorting();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Sortable(
        $wp_customize,
        'site-identity-sorting',
        array(
            'choices'  => $choices,
            'label'    => esc_html__(' Site Identity Sorting', 'cosmoswp'),
            'section'  => 'title_tagline',
            'settings' => 'site-identity-sorting'
        )
    )
);

/*Site Identity Msg*/
$wp_customize->add_setting('site-identity-align-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'site-identity-align-msg',
        array(
            'label'   => esc_html__('Alignment ', 'cosmoswp'),
            'section' =>'title_tagline',
        )
    )
);

/*Site Identity Align*/
$wp_customize->add_setting('site-identity-align', array(
    'default'           => $header_defaults['site-identity-align'],
    'sanitize_callback' => 'cosmoswp_sanitize_field_responsive_buttonset',
    'transport'         => 'postMessage'
));
$choices = cosmoswp_text_align();
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Responsive_Buttonset(
        $wp_customize,
        'site-identity-align',
        array(
            'choices'  => $choices,
            'label'    => esc_html__(' Site Identity Alignment', 'cosmoswp'),
            'section'  =>'title_tagline',
            'settings' => 'site-identity-align',
        )
    )
);


/*Styling msg*/
$wp_customize->add_setting('site-identity-margin-padding-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'site-identity-margin-padding-msg',
        array(
            'label'   => esc_html__('Margin & Padding', 'cosmoswp'),
            'section' => 'title_tagline',
        )
    )
);

/* Margin*/
$wp_customize->add_setting('site-identity-margin', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['site-identity-margin'],
    'transport'         => 'postMessage',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'site-identity-margin',
        array(
            'label'    => esc_html__('Margin', 'cosmoswp'),
            'section'  => 'title_tagline',
            'settings' => 'site-identity-margin',
        ),
        array(),
        array()
    )
);

/* Padding*/
$wp_customize->add_setting('site-identity-padding', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
    'default'           => $header_defaults['site-identity-padding'],
    'transport'         => 'postMessage',

));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Cssbox(
        $wp_customize,
        'site-identity-padding',
        array(
            'label'    => esc_html__('Padding', 'cosmoswp'),
            'section'  => 'title_tagline',
            'settings' => 'site-identity-padding',
        ),
        array(),
        array()
    )
);

/*styling msg*/
$wp_customize->add_setting('site-identity-styling-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'site-identity-styling-msg',
        array(
            'label'   => esc_html__('Site Title & Tagline Styling', 'cosmoswp'),
            'section' => 'title_tagline',
        )
    )
);

/*Color Options*/
$wp_customize->add_setting('site-identity-styling', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_tabs',
    'default'           => $header_defaults['site-identity-styling'],
    'transport'           => 'postMessage'
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Tabs(
        $wp_customize,
        'site-identity-styling',
        array(
            'label'    => esc_html__('Color Options', 'cosmoswp'),
            'section'  => 'title_tagline',
            'settings' => 'site-identity-styling',
        ),
        array(
            'tabs'   => array(
                'site-identity-normal' => array(
                    'label' => esc_html__('Normal', 'cosmoswp'),
                ),
                'site-identity-hover'  => array(
                    'label' => esc_html__('Hover', 'cosmoswp'),
                ),
            ),
            'fields' => array(
                'site-title-color'         => array(
                    'type'  => 'color',
                    'label' => esc_html__('Site Title Color', 'cosmoswp'),
                    'tab'   => 'site-identity-normal',
                ),
                'site-tagline-color'       => array(
                    'type'  => 'color',
                    'label' => esc_html__('Site Tagline Color', 'cosmoswp'),
                    'tab'   => 'site-identity-normal',
                ),
                'hover-site-title-color'   => array(
                    'type'  => 'color',
                    'label' => esc_html__('Site Title Color', 'cosmoswp'),
                    'tab'   => 'site-identity-hover',
                ),
                'hover-site-tagline-color' => array(
                    'type'  => 'color',
                    'label' => esc_html__('Site Tagline Color', 'cosmoswp'),
                    'tab'   => 'site-identity-hover',
                ),
            ),
        )
    )
);

/*Styling msg*/
$wp_customize->add_setting('site-identity-typography-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'site-identity-typography-msg',
        array(
            'label'   => esc_html__('Typography', 'cosmoswp'),
            'section' => 'title_tagline',
        )
    )
);

/*Inherit Options*/
$choices = cosmoswp_inherit_options();
$wp_customize->add_setting('site-identity-typography-options', array(
    'default'           => $header_defaults['site-identity-typography-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
    'transport'           => 'postMessage'
));

$wp_customize->add_control('site-identity-typography-options', array(
    'label'    => esc_html__('Typography Options', 'cosmoswp'),
    'type'     => 'select',
    'section'  => 'title_tagline',
    'settings' => 'site-identity-typography-options',
    'choices'  => $choices
));

/*Site Title Typography*/
$wp_customize->add_setting('site-title-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $header_defaults['site-title-typography'],
    'transport'           => 'postMessage'

));

$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'site-title-typography',
        array(
            'label'           => esc_html__('Site Title Typography', 'cosmoswp'),
            'section'         => 'title_tagline',
            'settings'        => 'site-title-typography',
            'active_callback' => 'cosmoswp_site_title_typography_if_custom',
        ),
        cosmoswp_typography_group_fields()
    )
);

/*Site Tagline Typography*/
$wp_customize->add_setting('site-tagline-typography', array(
    'sanitize_callback' => 'cosmoswp_sanitize_field_typography',
    'default'           => $header_defaults['site-tagline-typography'],
    'transport'           => 'postMessage'
));

$wp_customize->add_control(
    new CosmosWP_Custom_Control_Group(
        $wp_customize,
        'site-tagline-typography',
        array(
            'label'           => esc_html__('Site Tagline Typography', 'cosmoswp'),
            'section'         => 'title_tagline',
            'settings'        => 'site-tagline-typography',
            'active_callback' => 'cosmoswp_site_title_typography_if_custom',
        ),
        cosmoswp_typography_group_fields()
    )
);
