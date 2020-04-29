<?php 

$fields[] = array(
    'type'        => 'toggle',
    'settings'    => 'show_nav',
    'label'       => esc_html__( 'Show Main Navigation', 'codify' ),
    'section'     => 'header_navigation_section',
    'default'     => true,
);
$fields[] = array(
    'type'       => 'radio-buttonset',
    'settings'   => 'nav_align',
    'label'      => esc_html__( 'Main Navigation align', 'codify' ),
    'section'    => 'header_navigation_section',
    'default'    => 'right',
    'choices'    => array(
        'left'          => '<i class="dashicons dashicons-editor-alignleft"></i>',
        'center'        => '<i class="dashicons dashicons-editor-aligncenter"></i>',
        'right'         => '<i class="dashicons dashicons-editor-alignright"></i>',
    ),
    'active_callback'      => array(
        array(
            'setting'   => 'show_nav',
            'operator'  => '==',
            'value'     => true
        )
    ),
);
$fields[] = array(
    'type'       => 'multicolor',
    'settings'   => 'nav_header_colors',
    'label'      => esc_html__( 'Main Navigation color', 'codify' ),
    'section'    => 'header_navigation_section',
    'priority'   => 10,
    'transport'  => 'auto',
    'choices'    => array(
        'bg'     => esc_html__( 'Background', 'codify' ),
        'menu'     => esc_html__( 'Menu Color', 'codify' ),
        'hover'     => esc_html__( 'Hover Color', 'codify' ),
        'sub-bg'     => esc_html__( 'Sub Menu Background Color', 'codify' ),
        'border-color'     => esc_html__( 'Border Color', 'codify' ),
    ),
    'default'    => array(
        'bg'     		=> '#fff',
        'menu'   		=> '#232323',
        'hover'   		=> '#d8144e',
        'sub-bg'   		=> '#FFFFFF',
        'border-color'  => '#232323',

    ),
    'output'     => array(
        array(
            'choice'     => 'bg',
            'element'    => '.menu-holder, .mean-container a.meanmenu-reveal',
            'property'   => 'background-color',
        ),
        array(
            'choice'     => 'menu',
            'element'    => '.main-navigation a, .mean-container .mean-nav ul li a, .main-navigation li.menu-item-has-children:after,.main-navigation li.menu-item-has-children:hover:after',
            'property'   => 'color',
        ),
        array(
            'choice'     => 'hover',
            'element'    => '.main-navigation a:hover',
            'property'   => 'color',
        ),  
        array(
            'choice'     => 'sub-bg',
            'element'    => '.main-navigation ul ul, .mean-container .mean-nav',
            'property'   => 'background-color',
        ),  
        array(
            'choice'     => 'border-color',
            'element'    => '.main-navigation ul ul.sub-menu li, .mean-container .mean-nav ul li a',
            'property'   => 'border-color',
        ),                                   
    ),
);
$fields[] = array(
    'type'       => 'color',
    'settings'   => 'nav_border_colors',
    'label'      => esc_html__( 'Navigation Border color', 'codify' ),
    'section'    => 'header_navigation_section',
    'priority'   => 10,
    'transport'  => 'auto',
    'choices'    => array(
        'alpha' => true,
    ),
    'default'    => '',
    'output'     => array(
        array(
            'element'    => '.header-style3 .menu-holder, .header-style4 .site-branding',
            'property'   => 'border-color',
        ),                               
    ),
    'active_callback'      => [
        [
            'setting'   => 'main_header_style',
            'operator'  => '==',
            'value'     => 'style3',
        ]
    ],
);