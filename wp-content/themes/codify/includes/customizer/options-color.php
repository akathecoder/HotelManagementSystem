<?php 

$fields[] = array(
	'type'        => 'color',
	'settings'    => 'body_color',
	'label'       => esc_html__( 'Body Color', 'codify' ),
	'section'     => 'color_section',
	'default'     => '#3a3838',
	'choices'     => array(
		'alpha' => true,
	),
    'output'     => array(
        array(
            'element'    => 'body',
            'property'   => 'color',
        ), 
    ),	
);

$fields[] = array(
	'type'        => 'color',
	'settings'    => 'primary_color',
	'label'       => esc_html__( 'Primary Color', 'codify' ),
	'section'     => 'color_section',
	'default'     => '#E82526',
	'choices'     => array(
		'alpha' => true,
	),
    'output'     => array(
        array(
            'element'    => '.woocommerce-loop-product__title:hover, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .nav-links a:hover, h2.entry-title a:hover, a, .widget-area ul li a:hover, .blog-box a:hover, a:hover, .form-holder form input[type="submit"]:hover, .btn:hover a, .team-intro .post, .testimonail-slider .testi-caption:before, .bottom-footer a',
            'property'   => 'color',
        ), 
        array(
        	'element'	=> '.search-form .search-submit, .add_to_wishlist:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover',
        	'property'  => 'background-color',
        ),                                           
    ),	
);
$fields[] = array(
	'type'        => 'color',
	'settings'    => 'secondary_color',
	'label'       => esc_html__( 'Secondary Color', 'codify' ),
	'section'     => 'color_section',
	'default'     => '#000',
	'choices'     => array(
		'alpha' => true,
	),
    'output'     => array(
        array(
            'element'    => '',
            'property'   => 'color',
        ), 
        array(
        	'element'	=> '.widget-title-widget-style8 .widget-title span:before, .widget-title:before',
        	'property'  => 'background-color',
        ),    
        array(
        	'element' => '.add_to_wishlist, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, button, input[type="button"], input[type="reset"], input[type="submit"], .search-form .search-submit:focus, .search-form .search-submit:hover, .widget-title-widget-style4 .widget-title span, .widget-title-widget-style3 .widget-title, .widget-title-widget-style2 .widget-title span',
        	'property'  => 'background-color',

        ),     
        array(
        	'element'  => '.widget-title-widget-style6 .widget-title, .widget-title-widget-style5 .widget-title span, .widget-title-widget-style4 .widget-title, .widget-title-widget-style5 .widget-title',
        	'property' => 'border-color'	
        ),                                  
    ),	
);

$fields[] = array(
	'type'        => 'color',
	'settings'    => 'heading_color',
	'label'       => esc_html__( 'Heading Color', 'codify' ),
	'section'     => 'color_section',
	'default'     => '#000',
	'choices'     => array(
		'alpha' => true,
	),
    'output'     => array(
        array(
            'element'    => 'h2.entry-title a, a:hover, .entry-header',
            'property'   => 'color',
        ),                                  
    ),	
);
$fields[] = array(
	'type'        => 'color',
	'settings'    => 'paragraph_color',
	'label'       => esc_html__( 'Paragraph Color', 'codify' ),
	'section'     => 'color_section',
	'default'     => '#3a3838',
	'choices'     => array(
		'alpha' => true,
	),
    'output'     => array(
        array(
            'element'    => '.entry-content',
            'property'   => 'color',
        ),                                  
    ),	
);
$fields[] = array(
	'type'        => 'color',
	'settings'    => 'widgets_color',
	'label'       => esc_html__( 'Widget Title Color', 'codify' ),
	'section'     => 'color_section',
	'default'     => '#000',
	'choices'     => array(
		'alpha' => true,
	),
    'output'     => array(
        array(
            'element'    => '.widget-area .widget-title, .widget-title-widget-style4 .widget-title span, .widget-title-widget-style3 .widget-title span, .widget-title-widget-style2 .widget-title span',
            'property'   => 'color',
        ),                                  
    ),	
);