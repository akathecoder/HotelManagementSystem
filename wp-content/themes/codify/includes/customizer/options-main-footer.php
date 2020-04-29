<?php 

$fields[] = array(
    'type'        => 'dimensions',
    'settings'    => 'footer_bottom_border',
    'label'       => esc_html__( 'Footer Border', 'codify' ),
    'section'     => 'footer_section',
    'default'     => array(
        'Border'    => '1px',
        'Color'     => '#000',
        'Style'     => 'solid',
    ),
    'output' => array(
        array(
            'choice'     => 'Border',
            'element'    => '.site-info',
            'property'   => 'border-top',
        ),
        array(
            'choice'     => 'Color',
            'element'    => '.site-info',
            'property'   => 'border-top-color',
        ),
        array(
            'choice'     => 'Style',
            'element'    => '.site-info',
            'property'   => 'border-top-style',
        ),
    ),    
);

$fields[] = array(
    'type'        => 'toggle',
    'settings'    => 'show_footer_widget',
    'label'       => esc_html__( 'Footer Widget', 'codify' ),
    'description' => esc_html__( 'Add footer widget from Apperance > Widget', 'codify' ),
    'section'     => 'footer_section',
    'default'     => false,
);
$fields[] = array(
    'type'       => 'radio-buttonset',
    'settings'   => 'number_footer_widget',
    'label'      => esc_html__( 'Number of Footer Widget', 'codify' ),
    'section'    => 'footer_section',
    'default'    =>  '4',
    'choices'    => array(
        '1'        	=> '1',
        '2'        	=> '2',
        '3'        	=> '3',
        '4'        	=> '4',
    ),
    'active_callback'      => array(
        array(
            'setting'   => 'show_footer_widget',
            'operator'  => '==',
            'value'     => true
        )
    ),
);

$fields[] = array(
    'type'       => 'multicolor',
    'settings'   => 'footer_widget_color',
    'label'      => esc_html__( 'Footer Widget color', 'codify' ),
    'section'    => 'footer_section',
    'priority'   => 10,
    'transport'  => 'auto',
    'choices'    => array(
        'text'      => esc_html__( 'Text', 'codify' ),
        'bg'        => esc_html__( 'Background', 'codify' ),
        'hover'     => esc_html__( 'Hover', 'codify' ),
    ),
    'default'    => array(
        'text'   => '#fffff',
        'bg'     => '#323a45',
        'hover'  => '#E82526',
    ),
    'output'     => array(
        array(
            'choice'     => 'text',
            'element'    => '.site-info ul a, .site-info .top-footer',
            'property'   => 'color',
        ),
        array(
            'choice'     => 'bg',
            'element'    => '.top-footer, .top-footer .widget-title span',
            'property'   => 'background-color',
        ),
    array(
            'choice'     => 'hover',
            'element'    => '.site-info a:hover',
            'property'   => 'color',
        ),
    ),
    'active_callback'      => array(
        array(
            'setting'   => 'show_footer_widget',
            'operator'  => '==',
            'value'     => true
        )
    ),
);

$fields[] = array(
    'type'       => 'radio-buttonset',
    'settings'   => 'credit_align',
    'label'      => esc_html__( 'Footer Credit align', 'codify' ),
    'section'    => 'footer_section',
    'default'    => 'center',
    'choices'    => array(
        'left'          => '<i class="dashicons dashicons-editor-alignleft"></i>',
        'center'        => '<i class="dashicons dashicons-editor-aligncenter"></i>',
        'right'         => '<i class="dashicons dashicons-editor-alignright"></i>',
    ),
    'output' => array(
        array(
            'element'  => '.bottom-footer',
            'property' => 'text-align',
        ),    
    ),    
);
$fields[] = array(
    'type'       => 'multicolor',
    'settings'   => 'footer_credit_color',
    'label'      => esc_html__( 'Footer Credit color', 'codify' ),
    'section'    => 'footer_section',
    'priority'   => 10,
    'transport'  => 'auto',
    'choices'    => array(
        'text'      => esc_html__( 'Text', 'codify' ),
        'bg'        => esc_html__( 'Background', 'codify' ),
        'hover'     => esc_html__( 'Hover', 'codify' ),
    ),
    'default'    => array(
        'text'   => '#fffff',
        'bg'     => '#000',
        'hover'  => '#fffff',
    ),
    'output'     => array(
        array(
            'choice'     => 'text',
            'element'    => '.bottom-footer',
            'property'   => 'color',
        ),
        array(
            'choice'     => 'bg',
            'element'    => '.bottom-footer',
            'property'   => 'background-color',
        ),
    array(
            'choice'     => 'hover',
            'element'    => '.bottom-footer a:hover',
            'property'   => 'color',
        ),
    ),
);

// Footer Right Content
$fields[] = array(
    'type'        => 'select',
    'settings'    => 'footer_right_content',
    'label'       => esc_html__( 'Footer Right Side', 'codify' ),
    'section'     => 'footer_section',
    'default'     => 'none',
    'choices'     => array(
        'none'          => esc_html__( 'None', 'codify' ),
        'text'          => esc_html__( 'Text', 'codify' ),
        'menu'          => esc_html__( 'Menu', 'codify' ),
        'social_icon'   => esc_html__( 'Social Icon', 'codify' ),
    ),
);

$fields[] = array(
    'type'        => 'editor',
    'settings'    => 'footer_textarea',
    'label'       => esc_html__( 'Text Content', 'codify' ),
    'section'     => 'footer_section',
    'default'     => '',
    'active_callback'      => [
        [
            'setting'   => 'footer_right_content',
            'operator'  => '==',
            'value'     => 'text'
        ]
    ],
);
$fields[] = array(
    'type'        => 'select',
    'settings'    => 'footer_menu',
    'label'       => esc_html__( 'Select Menu', 'codify' ),
    'section'     => 'footer_section',
    'default'     => 'none',
    'choices'     => codify_menu_list(),
    'active_callback'      => [
        [
            'setting'   => 'footer_right_content',
            'operator'  => '==',
            'value'     => 'menu'
        ]
    ],
);

$fields[] = array(
    'type' => 'repeater', 
    'settings'    => 'footer_social_media',
    'label'       => esc_html__( 'Add Social Profile', 'codify' ),
    'section'     => 'footer_section',
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
    'active_callback'      => [
        [
            'setting'   => 'footer_right_content',
            'operator'  => '==',
            'value'     => 'social_icon'
        ]
    ],      
);