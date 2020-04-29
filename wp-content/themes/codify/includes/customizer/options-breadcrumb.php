<?php 
$fields[] = array(
    'type'        => 'toggle',
    'settings'    => 'show_breadcrumbs',
    'label'       => esc_html__( 'Show Breadcrumbs', 'codify' ),
    'section'     => 'header_breadcrumbs_section',
    'default'     => true,
);
$fields[] = array(
    'type'        => 'text',
    'settings'    => 'breadcrumbs_spearator',
    'label'       => esc_html__( 'Separator', 'codify' ),
    'section'     => 'header_breadcrumbs_section',
    'default'     => '',
    'active_callback'      => array(
        array(
            'setting'   => 'show_breadcrumbs',
            'operator'  => '==',
            'value'     => true
        )
    ),
);
$fields[] = array(
    'type'        => 'toggle',
    'settings'    => 'breadcrumbs_show_on_front',
    'label'       => esc_html__( 'Show on Front', 'codify' ),
    'section'     => 'header_breadcrumbs_section',
    'default'     => false,
    'active_callback'      => array(
        array(
            'setting'   => 'show_breadcrumbs',
            'operator'  => '==',
            'value'     => true
        )
    ),
);
$fields[] = array(
    'type'       => 'multicolor',
    'settings'   => 'breadcrumbs_section_color',
    'label'      => esc_html__( 'Breadcrumbs color', 'codify' ),
    'section'    => 'header_breadcrumbs_section',
    'priority'   => 10,
    'transport'  => 'auto',
    'choices'    => array(
        'text'   => esc_html__( 'Text', 'codify' ),
        'hover_text'   => esc_html__( 'Anchor Text', 'codify' ),
        'bg'     => esc_html__( 'Background', 'codify' ),
        'icon'     => esc_html__( 'Icon', 'codify' ),
        'hover'     => esc_html__( 'Hover', 'codify' ),
    ),
    'default'    => array(
        'text'   => '#ffffff',
        'hover_text'     => '#E82526',
        'bg'        => '#000',
        'icon'      => '#ffffff',
        'hover'     => '#ffffff',
    ),
    'output'     => array(
        array(
            'choice'     => 'text',
            'element'    => '.breadcrumbs ul li',
            'property'   => 'color',
        ),
        array(
            'choice'     => 'bg',
            'element'    => '.breadcrumbs-wrapper',
            'property'   => 'background-color',
        ),
        array(
            'choice'     => 'icon',
            'element'    => '.breadcrumbs ul li:before',
            'property'   => 'color',
        ),
        array(
            'choice'     => 'hover_text',
            'element'    => '.breadcrumbs ul li a',
            'property'   => 'color',
        ),
        array(
            'choice'     => 'hover',
            'element'    => '.breadcrumbs ul li a:hover',
            'property'   => 'color',
        ),
    ),
    'active_callback'      => array(
        array(
            'setting'   => 'show_breadcrumbs',
            'operator'  => '==',
            'value'     => true
        )
    ),
);