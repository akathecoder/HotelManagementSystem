<?php 
// Main Site Width
$fields[] = array(
    'type'        => 'select',
    'settings'    => 'site_layout',
    'section'     => 'container_section',
    'label'       => esc_html__( 'Main Site Width', 'codify' ),
    'default'     => 'full-width',
    'priority'    => 8, 
    'choices'     => array(        
        'boxed'           => esc_html__( 'Boxed', 'codify' ),
        'full-width'      => esc_html__( 'Full Width', 'codify' ),
        'stretched'          => esc_html__( 'Full Width / Stretched', 'codify' ),
    ),  
);
// Main Container Width
$fields[] = array(
    'type'        => 'slider',
    'settings'    => 'main_container_width',
    'section'     => 'container_section',
    'label'       => esc_html__( 'Main Container Width', 'codify' ),
    'default'     => 1170,
    'priority'    => 8, 
    'choices'     => array(
        'min'  => 0,
        'max'  => 1600,
        'step' => 1,
    ),
    'output'             => array(
        array(
            'element'    => '.container',
            'property'   => 'max-width',
            'units'      => 'px',
            'media_query' => '@media (min-width: 991px)'
        ),
    ),    
);
// Site Content Layout
$fields[] = array(
    'type'       => 'radio-buttonset',
    'settings'   => 'layout_style',
    'label'      => esc_html__( 'Layout Style', 'codify' ),
    'section'    => 'container_section',
    'default'    => 'wide',
    'choices'    => array(
        'wide'         => esc_html__( 'Wide', 'codify'),
        'boxed'        => esc_html__( 'Boxed', 'codify'),
        'separate'     => esc_html__( 'Seperate', 'codify'),
    ),   
);
$fields[]= array(
    'type'        => 'checkbox',
    'settings'    => 'content_box_shadow',
    'label'       => esc_html__( 'Enable Box Shadow', 'codify' ),
    'section'     => 'container_section',
    'default'     => true,  
    'active_callback'      => array(
        array(
            'setting'   => 'layout_style',
            'operator'  => '==',
            'value'     => 'separate',
        )
    ), 
);
// Content Width
$fields[] = array(
    'type'        => 'slider',
    'settings'    => 'content_width',
    'section'     => 'container_section',
    'label'       => esc_html__( 'Content Width', 'codify' ),
    'default'     => 75,
    'priority'    => 8, 
    'choices'     => array(
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ),
    'output'             => array(
        array(
            'element'    => '.content-area',
            'property'   => 'max-width',
            'units'      => '%',
            'media_query' => '@media (min-width: 991px)'
        ),
    ),    
);
// Sidebar Width
$fields[] = array(
    'type'        => 'slider',
    'settings'    => 'sidebar_width',
    'section'     => 'container_section',
    'label'       => esc_html__( 'Sidebar Width', 'codify' ),
    'default'     => 25,
    'priority'    => 8, 
    'choices'     => array(
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ),
    'output'             => array(
        array(
            'element'    => '.widget-area',
            'property'   => 'max-width',
            'units'      => '%',
            'media_query' => '@media (min-width: 991px)'
        ),
    ),    
);