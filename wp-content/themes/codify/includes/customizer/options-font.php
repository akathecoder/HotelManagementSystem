<?php 

$fields[] = array(
    'type'       => 'typography',
    'settings'   => 'desktop_body_font',
    'label'      => esc_html__( 'Site Font', 'codify' ),
    'section'    => 'font_section',
    'transport'	 => 'auto',
    'default'    => array(
       		'font-family'    => 'Poppins',
			'variant'        => 'regular',
			'font-size'      => '16px',
			'line-height'    => '1.5',
			'letter-spacing' => '0.5',       					
    ),
    'choices'    => array(
        'fonts' => array(
           	'google' => [ 'Roboto', 'Open Sans', 'Lato', 'Noto Serif', 'Noto Sans', 'Poppins' ],  
       							
        ),
        'variant' ,
        'font-size',     
        'line-height',    
        'letter-spacing',           
    ),
	'output'	 => array(
		array(
			'element' => 'body',
		),
	),	
);
$fields[] = array(
    'type'       => 'typography',
    'settings'   => 'title_font',
    'label'      => esc_html__( 'Title Font', 'codify' ),
    'section'    => 'font_section',
    'transport'  => 'auto',
    'default'    => array(
            'font-family'    => 'Poppins',
            'variant'        => 'regular',
            'font-size'      => '26px',
            'line-height'    => '1.5',
            'letter-spacing' => '0.5',   
            'text-transform' => 'capitalize',                       
    ),
    'choices'    => array(
        'fonts' => array(
            'google' => [ 'Roboto', 'Open Sans', 'Lato', 'Noto Serif', 'Noto Sans', 'Poppins' ],  
                                
        ),
        'variant' ,
        'font-size',     
        'line-height',    
        'letter-spacing', 
        'text-transform'          
    ),
    'output'     => array(
        array(
            'element' => '.post .entry-title',
        ),
    ),  
);
$fields[] = array(
    'type'       => 'typography',
    'settings'   => 'widget_title_font',
    'label'      => esc_html__( 'Widget Title Font', 'codify' ),
    'section'    => 'font_section',
    'transport'  => 'auto',
    'default'    => array(
            'font-family'    => 'Poppins',
            'variant'        => 'regular',
            'font-size'      => '20px',
            'line-height'    => '1.5',
            'letter-spacing' => '0.5',   
            'text-transform' => 'capitalize',                       
    ),
    'choices'    => array(
        'fonts' => array(
            'google' => [ 'Roboto', 'Open Sans', 'Lato', 'Noto Serif', 'Noto Sans', 'Poppins' ],  
                                
        ),
        'variant' ,
        'font-size',     
        'line-height',    
        'letter-spacing', 
        'text-transform'          
    ),
    'output'     => array(
        array(
            'element' => '.widget-title',
        ),
    ),  
);