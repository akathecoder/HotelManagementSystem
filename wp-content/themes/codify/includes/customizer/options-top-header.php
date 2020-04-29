<?php
/**
 * Top Header Options.
 *
 * @package Codify
 */

$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'show_top_header',
    'label'       => esc_html__( 'Show Top Header', 'codify' ),
    'section'     => 'top_header_section',
    'default'     => false,
    'choices'     => array(
        'on'  => esc_html__( 'Enable', 'codify' ),
        'off' => esc_html__( 'Disable', 'codify' ),
    ),
);
$fields[] = array(
    'type'        => 'dimensions',
    'settings'    => 'top_heading_padding',
    'label'       => esc_html__( 'Top Header Padding', 'codify' ),
    'section'     => 'top_header_section',
    'default'     => array(
        'Top'       => '10px',
        'Right'     => '0',
        'Bottom'    => '10px',
        'Left'      => '0',
    ),
    'output' => array(
        array(
            'choice'     => 'Top',
            'element'    => '.top-header',
            'property'   => 'padding-top',
        ),
        array(
            'choice'     => 'Right',
            'element'    => '.top-header',
            'property'   => 'padding-right',
        ),
        array(
            'choice'     => 'Bottom',
            'element'    => '.top-header',
            'property'   => 'padding-bottom',
        ),
        array(
            'choice'     => 'Left',
            'element'    => '.top-header',
            'property'   => 'padding-left',
        ),        
    ),  
    'active_callback'      => array(
        array(
            'setting'   => 'show_top_header',
            'operator'  => '==',
            'value'     => true
        )
    ),      
);
// Top Left Content
$fields[] = array(
    'type'        => 'select',
    'settings'    => 'top_header_left',
    'label'       => esc_html__( 'Top Left Content', 'codify' ),
    'section'     => 'top_header_section',
    'default'     => 'none',
    'choices'     => array(
        'none'          => esc_html__( 'None', 'codify' ),
        'text'          => esc_html__( 'Text', 'codify' ),
        'menu'          => esc_html__( 'Menu', 'codify' ),
        'social_icon'   => esc_html__( 'Social Icon', 'codify' ),
    ),
    'active_callback'      => array(
        array(
            'setting'   => 'show_top_header',
            'operator'  => '==',
            'value'     => true
        )
    ), 
);

$fields[] = array(
    'type'        => 'editor',
    'settings'    => 'left_textarea',
    'label'       => esc_html__( 'Text Content', 'codify' ),
    'section'     => 'top_header_section',
    'default'     => '',
    'active_callback'      => array(
        array(
            'setting'   => 'show_top_header',
            'operator'  => '==',
            'value'     => true
        ),
        array(
            'setting'   => 'top_header_left',
            'operator'  => '==',
            'value'     => 'text'
        )
    ),
);
$fields[] = array(
    'type'        => 'select',
    'settings'    => 'left_menu',
    'label'       => esc_html__( 'Select Left Menu', 'codify' ),
    'section'     => 'top_header_section',
    'default'     => 'none',
    'choices'     => codify_menu_list(),
    'active_callback'      => array(
        array(
            'setting'   => 'show_top_header',
            'operator'  => '==',
            'value'     => true
        ),
        array(
            'setting'   => 'top_header_left',
            'operator'  => '==',
            'value'     => 'menu'
        )
    ),
);

$fields[] = array(
    'type' => 'repeater', 
    'settings'    => 'left_social_media',
    'label'       => esc_html__( 'Add Social Profile', 'codify' ),
    'section'     => 'top_header_section',
    'row_label'   => array(
        'type'  => 'field',
        'value' => esc_html__( 'Add Social Icon', 'codify' ),
        'field' => 'social_icon',
    ),
    'default'     => array(
        array(
            'social_url'  => '',
        ),
    ),
    'fields'      => array(
        'social_url'  => array(
            'type'    => 'link',
            'label'   => esc_html__( 'Social Link URL', 'codify' ),
            'default' => '',
        ),
    ),
    'active_callback'      => array(
        array(
            'setting'   => 'show_top_header',
            'operator'  => '==',
            'value'     => true
        ),
        array(
            'setting'   => 'top_header_left',
            'operator'  => '==',
            'value'     => 'social_icon'
        )
    ),      
);

// Top Right Content
$fields[] = array(
    'type'        => 'select',
    'settings'    => 'top_header_right',
    'label'       => esc_html__( 'Top Right Content', 'codify' ),
    'section'     => 'top_header_section',
    'default'     => 'none',
    'choices'     => array(
        'none'  		=> esc_html__( 'None', 'codify' ),
        'text' 			=> esc_html__( 'Text', 'codify' ),
        'menu'     		=> esc_html__( 'Menu', 'codify' ),
        'social_icon'   => esc_html__( 'Social Icon', 'codify' ),
    ),
    'active_callback'      => array(
        array(
            'setting'   => 'show_top_header',
            'operator'  => '==',
            'value'     => true
        )
    ),
);

$fields[] = array(
    'type'        => 'editor',
    'settings'    => 'right_textarea',
    'label'       => esc_html__( 'Text Content', 'codify' ),
    'section'     => 'top_header_section',
    'default'     => '',
    'active_callback'      => array(
        array(
            'setting'   => 'show_top_header',
            'operator'  => '==',
            'value'     => true
        ),
        array(
            'setting'   => 'top_header_right',
            'operator'  => '==',
            'value'     => 'text'
        )
    ),
);
$fields[] = array(
    'type'        => 'select',
    'settings'    => 'right_menu',
    'label'       => esc_html__( 'Select Right Menu', 'codify' ),
    'section'     => 'top_header_section',
    'default'     => 'none',
    'choices'     => codify_menu_list(),
	'active_callback'      => array(
        array(
            'setting'   => 'show_top_header',
            'operator'  => '==',
            'value'     => true
        ),
        array(
            'setting'   => 'top_header_right',
            'operator'  => '==',
            'value'     => 'menu'
        )
    ),
);

$fields[] = array(
	'type' => 'repeater', 
	'settings'    => 'right_social_media',
	'label'       => esc_html__( 'Add Social Profile', 'codify' ),
    'section'     => 'top_header_section',
	'row_label'   => array(
		'type'  => 'field',
		'value' => esc_html__( 'Add Social Icon', 'codify' ),
		'field' => 'social_icon',
	),
	'default'     => array(
		array(
			'social_url'  => '',
		),
	),
	'fields'      => array(
		'social_url'  => array(
			'type'    => 'url',
			'label'   => esc_html__( 'Social Link URL', 'codify' ),
			'default' => '',
		),
	),
	'active_callback'      => array(
        array(
            'setting'   => 'show_top_header',
            'operator'  => '==',
            'value'     => true
        ),
        array(
            'setting'   => 'top_header_right',
            'operator'  => '==',
            'value'     => 'social_icon'
        )
    ),		
);

$fields[] = array(
    'type'       => 'multicolor',
    'settings'   => 'top_header_colors',
    'label'      => esc_html__( 'Top Header color', 'codify' ),
    'section'    => 'top_header_section',
    'priority'   => 10,
    'transport'  => 'auto',
    'choices'    => array(
        'bg'        => esc_html__( 'Background', 'codify' ),
        'text'      => esc_html__( 'Text', 'codify' ),        
        'link'      => esc_html__( 'Link', 'codify' ),
        'hover'     => esc_html__( 'Hover', 'codify' ),
    ),
    'default'    => array(
        'text'   => '#fff',
        'bg'     => '#000',
        'link'   => '#fff',
        'hover'   => '#fff',
    ),
    'output'     => array(
        array(
            'choice'     => 'text',
            'element'    => '.top-header',
            'property'   => 'color',
        ),
        array(
            'choice'     => 'bg',
            'element'    => '.top-header',
            'property'   => 'background-color',
        ),
        array(
            'choice'     => 'link',
            'element'    => '.top-header a, .top-header .social-links ul li a::before',
            'property'   => 'color',
        ),
        array(
            'choice'     => 'hover',
            'element'    => '.top-header a:hover',
            'property'   => 'color',
        ),                   
    ),
    'active_callback'      => array(
        array(
            'setting'   => 'show_top_header',
            'operator'  => '==',
            'value'     => true
        )
    ),
);
