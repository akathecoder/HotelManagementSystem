<?php 
$fields[] = array(
    'type'        => 'toggle',
    'settings'    => 'show_scroll_top',
    'label'       => esc_html__( 'Show Scroll to Top', 'codify' ),
    'section'     => 'scrool_to_top_section',
    'default'     => false,
);
$fields[] = array(
    'type'        => 'text',
    'settings'    => 'scroll_to_top_icon',
    'label'       => esc_html__( 'Enter Scrollo to Top Icon', 'codify' ),
    'section'     => 'scrool_to_top_section',
    'default'     => 'fa fa-angle-up',
    'active_callback'      => array(
        array(
            'setting'   => 'show_scroll_top',
            'operator'  => '==',
            'value'     => true
        )
    ),
);
$fields[] = array(
    'type'        => 'slider',
    'settings'    => 'scroll_to_top_radius',
    'label'       => esc_html__( 'Scroll to Top Radius', 'codify' ),
    'section'     => 'scrool_to_top_section',
    'default'     => 50,
    'choices'     => array(
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ),
    'active_callback'      => array(
        array(
           'setting'   => 'show_scroll_top',
            'operator'  => '==',
            'value'     => true
        )
    ),
    'output'             => array(
        array(
            'element'    => '.back-to-top a',
            'property'   => 'border-radius',
            'units'      => '%',
        ),
    ),
);
$fields[] = array(
    'type'       => 'multicolor',
    'settings'   => 'scroll_to_top_colors',
    'label'      => esc_html__( 'Scroll to Top color', 'codify' ),
    'section'    => 'scrool_to_top_section',
    'priority'   => 10,
    'transport'  => 'auto',
    'choices'    => array(
        'text'   => esc_html__( 'Text', 'codify' ),
        'bg'     => esc_html__( 'Background', 'codify' ),
        'border'     => esc_html__( 'Border', 'codify' ),
    ),
    'default'    => array(
        'text'   => '#E82526',
        'bg'     => '#ffffff',
        'border' => '#E82526',
    ),
    'output'     => array(
        array(
            'choice'     => 'text',
            'element'    => '.back-to-top a',
            'property'   => 'color',
        ),
        array(
            'choice'     => 'bg',
            'element'    => '.back-to-top a',
            'property'   => 'background-color',
        ),
    array(
            'choice'     => 'border',
            'element'    => '.back-to-top a',
            'property'   => 'border-color',
        ),
    ),
    'active_callback'      => [
        [
            'setting'   => 'show_scroll_top',
            'operator'  => '==',
            'value'     => true
        ]
    ],
);
$fields[] = array(
    'type'       => 'multicolor',
    'settings'   => 'scroll_to_top_hover_colors',
    'label'      => esc_html__( 'Scroll to Top Hover color', 'codify' ),
    'section'    => 'scrool_to_top_section',
    'priority'   => 10,
    'transport'  => 'auto',
    'choices'    => array(
        'text'   => esc_html__( 'Text', 'codify' ),
        'bg'     => esc_html__( 'Background', 'codify' ),
        'border'     => esc_html__( 'Border', 'codify' ),
    ),
    'default'    => array(
        'text'   => '#ffffff',
        'bg'     => '#E82526',
        'border' => '#E82526',
    ),
    'output'     => array(
        array(
            'choice'     => 'text',
            'element'    => '.back-to-top a:hover',
            'property'   => 'color',
        ),
        array(
            'choice'     => 'bg',
            'element'    => '.back-to-top a:hover',
            'property'   => 'background-color',
        ),
        array(
                'choice'     => 'border',
                'element'    => '.back-to-top a:hover',
                'property'   => 'border-color',
            ),
        ),
    'active_callback'      => [
        [
            'setting'   => 'show_scroll_top',
            'operator'  => '==',
            'value'     => true
        ]
    ],
);