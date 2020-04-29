<?php
/**
 * Header Options.
 *
 * @package Codify
 */

// Desktop  Logo Width
$fields[] = array(
    'type'        => 'slider',
    'settings'    => 'desktop_logo_width',
    'section'     => 'title_tagline',
    'label'       => esc_html__( 'Logo Width', 'codify' ),
    'default'     => 200,
    'priority'    => 8, 
    'choices'     => array(
        'min'  => 0,
        'max'  => 500,
        'step' => 1,
    ),
    'output'             => array(
        array(
            'element'    => '.desktop-custom-logo',
            'property'   => 'max-width',
            'units'      => 'px',            
        ),
    ),    
);

$fields[] = array(
    'type'        => 'toggle',
    'settings'    => 'show_mobile_logo',
    'label'       => esc_html__( 'Mobile Device Logo', 'codify' ),
    'description' => esc_html__( 'Show different logo in mobile device', 'codify' ),
    'section'     => 'title_tagline',
    'priority'    => 8,
    'default'     => false,
);

$fields[]= array(
    'type'        => 'image',
    'settings'    => 'mobile_site_logo',
    'label'       => esc_html__( 'Mobile Device Logo', 'codify' ),
    'section'     => 'title_tagline',
    'priority'    => 8,    
    'default'     => '',
	'choices'     => array(
	'save_as'     => 'id',
	),   
	'active_callback'      => array(
	    array(
	        'setting'   => 'show_mobile_logo',
	        'operator'  => '==',
	        'value'     => true
	    )
    ), 
);

// Mobile  Logo Width
$fields[] = array(
    'type'        => 'slider',
    'settings'    => 'mobile_logo_width',
    'section'     => 'title_tagline',
    'label'       => esc_html__( 'Mobile Device Logo Width', 'codify' ),
    'default'     => 200,
    'priority'    => 8, 
    'choices'     => array(
        'min'  => 0,
        'max'  => 500,
        'step' => 1,
    ),
    'active_callback'      => array(
        array(
            'setting'   => 'show_mobile_logo',
            'operator'  => '==',
            'value'     => true,
        )
    ),
    'output'             => array(
        array(
            'element'    => '.mobile-custom-logo',
            'property'   => 'max-width',
            'units'      => 'px',
        ),
    ),    
);

// Main header Style
$fields[] = array(
    'type'        => 'select',
    'settings'    => 'main_header_style',
    'label'       => esc_html__( 'Header layout', 'codify' ),
    'section'     => 'main_header_section',
    'default'     => 'style1',
    'choices'     => array(
        'style1'          => esc_html__( 'Style 1', 'codify' ),
        'style2'          => esc_html__( 'Style 2', 'codify' ),
        'style3'          => esc_html__( 'Style 3', 'codify' ),
        'style4'          => esc_html__( 'Style 4', 'codify' ),
    ),
);

$fields[] = array(
    'type'        => 'toggle',
    'settings'    => 'enable_sticky_header',
    'label'       => esc_html__( 'Enable Sticky Header', 'codify' ),
    'section'     => 'main_header_section',
    'default'     => true,
);

$fields[] = array(
    'type'        => 'toggle',
    'settings'    => 'show_button',
    'label'       => esc_html__( 'Show Button', 'codify' ),
    'section'     => 'main_header_section',
    'default'     => true,
);
$fields[] = array(
    'type'        => 'text',
    'settings'    => 'header_button_text',
    'label'       => esc_html__( 'Enter Button Text', 'codify' ),
    'section'     => 'main_header_section',
    'default'     => esc_html__( 'Contact Us', 'codify' ),
    'active_callback'      => array(
        array(
            'setting'   => 'show_button',
            'operator'  => '==',
            'value'     => true
        )
    ),
);
$fields[] = array(
    'type'        => 'link',
    'settings'    => 'header_button_link',
    'label'       => esc_html__( 'Enter Button Url', 'codify' ),
    'section'     => 'main_header_section',
    'default'     => '',
    'active_callback'      => array(
        array(
            'setting'   => 'show_button',
            'operator'  => '==',
            'value'     => true
        )
    ),
);
$fields[] = array(
    'type'        => 'slider',
    'settings'    => 'header_button_radius',
    'label'       => esc_html__( 'Button Border Radius', 'codify' ),
    'section'     => 'main_header_section',
    'default'     => 30,
    'choices'     => array(
        'min'  => 0,
        'max'  => 50,
        'step' => 1,
    ),
    'active_callback'      => array(
        array(
           'setting'   => 'show_button',
            'operator'  => '==',
            'value'     => true
        )
    ),
    'output'             => array(
        array(
            'element'    => '.enquiry-btn',
            'property'   => 'border-radius',
            'units'      => 'px',
        ),
    ),
);
$fields[] = array(
    'type'       => 'multicolor',
    'settings'   => 'menu_button_colors',
    'label'      => esc_html__( 'Button color', 'codify' ),
    'section'    => 'main_header_section',
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
            'element'    => '.enquiry-btn',
            'property'   => 'color',
        ),
        array(
            'choice'     => 'bg',
            'element'    => '.enquiry-btn',
            'property'   => 'background-color',
        ),
    array(
            'choice'     => 'border',
            'element'    => '.enquiry-btn',
            'property'   => 'border-color',
        ),
    ),
    'active_callback'      => array(
        array(
            'setting'   => 'show_button',
            'operator'  => '==',
            'value'     => true
        )
    ),
);
$fields[] = array(
    'type'       => 'multicolor',
    'settings'   => 'menu_button_hover_colors',
    'label'      => esc_html__( 'Button Hover color', 'codify' ),
    'section'    => 'main_header_section',
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
        'border' => '#ffffff',
    ),
    'output'     => array(
        array(
            'choice'     => 'text',
            'element'    => '.enquiry-btn:hover',
            'property'   => 'color',
        ),
        array(
            'choice'     => 'bg',
            'element'    => '.enquiry-btn:hover',
            'property'   => 'background-color',
        ),
        array(
                'choice'     => 'border',
                'element'    => '.enquiry-btn:hover',
                'property'   => 'border-color',
            ),
        ),
    'active_callback'      => array(
        array(
            'setting'   => 'show_button',
            'operator'  => '==',
            'value'     => true
        )
    ),
);
if ( codify_woocommerce_active() ):
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'show_cart',
        'label'       => esc_html__( 'Show Cart', 'codify' ),
        'section'     => 'main_header_section',
        'default'     => false,
    );    
endif; 

$fields[] = array(
    'type'        => 'toggle',
    'settings'    => 'show_search',
    'label'       => esc_html__( 'Show Search', 'codify' ),
    'section'     => 'main_header_section',
    'default'     => true,
);
$fields[] = array(
    'type'        => 'text',
    'settings'    => 'header_search_placeholder',
    'label'       => esc_html__( 'Header Search Placeholder Text', 'codify' ),
    'section'     => 'main_header_section',
    'default'     => esc_html__( 'Search', 'codify' ),
    'active_callback'      => array(
        array(
            'setting'   => 'show_search',
            'operator'  => '==',
            'value'     => true
        )
    ),
);
$fields[] = array(
    'type'        => 'text',
    'settings'    => 'header_search_text',
    'label'       => esc_html__( 'Header Search Text', 'codify' ),
    'section'     => 'main_header_section',
    'default'     => esc_html__( 'Type to Search', 'codify' ),
    'active_callback'      => array(
        array(
            'setting'   => 'show_search',
            'operator'  => '==',
            'value'     => true
        )
    ),
);
$fields[] = array(
    'type'        => 'dimensions',
    'settings'    => 'nav_bottom_border',
    'label'       => esc_html__( 'Header Border', 'codify' ),
    'section'     => 'main_header_section',
    'default'     => array(
        'Border'    => '1px',
        'Color'     => '#000',
        'Style'     => 'solid',
    ),
    'output' => array(
        array(
            'choice'     => 'Border',
            'element'    => '.main-header',
            'property'   => 'border-bottom',
        ),
        array(
            'choice'     => 'Color',
            'element'    => '.main-header',
            'property'   => 'border-bottom-color',
        ),
        array(
            'choice'     => 'Style',
            'element'    => '.main-header',
            'property'   => 'border-bottom-style',
        ),
    ),    
);
$fields[] = array(
    'type'        => 'dimensions',
    'settings'    => 'site_branding_bottom_border',
    'label'       => esc_html__( 'Site Branding Border Bottom', 'codify' ),
    'section'     => 'main_header_section',
    'default'     => array(
        'Border'    => '1px',
        'Color'     => '#000',
        'Style'     => 'solid',
    ),
    'output' => array(
        array(
            'choice'     => 'Border',
            'element'    => '.header-style4 .site-branding',
            'property'   => 'border-bottom',
        ),
        array(
            'choice'     => 'Color',
            'element'    => '.header-style4 .site-branding',
            'property'   => 'border-bottom-color',
        ),
        array(
            'choice'     => 'Style',
            'element'    => '.header-style4 .site-branding',
            'property'   => 'border-bottom-style',
        ),
    ),  
    'active_callback'      => array(
        array(
            'setting'   => 'main_header_style',
            'operator'  => '==',
            'value'     => 'style4'
        )
    ),     
);
$fields[] = array(
    'type'       => 'multicolor',
    'settings'   => 'main_header_colors',
    'label'      => esc_html__( 'Main Header color', 'codify' ),
    'section'    => 'main_header_section',
    'priority'   => 10,
    'transport'  => 'auto',
    'choices'    => array(
        'bg'     => esc_html__( 'Background', 'codify' ),
        'icon'     => esc_html__( 'Icon Color', 'codify' ),
    ),
    'default'    => array(
        'bg'     => '#fff',
        'icon'   => '#232323',

    ),
    'output'     => array(
        array(
            'choice'     => 'bg',
            'element'    => '.main-header',
            'property'   => 'background-color',
        ),
        array(
            'choice'     => 'icon',
            'element'    => '.site-cart-views i, .search-wrapper a, .mean-container a.meanmenu-reveal',
            'property'   => 'color',
        ),                   
    ),
);
