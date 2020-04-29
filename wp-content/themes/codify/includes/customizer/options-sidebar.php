<?php 

$fields[] = array(
	'type'        => 'radio-image',
	'settings'    => 'blog_sidebar',
	'label'       => esc_html__( 'Blog Sidebar', 'codify' ),
	'section'     => 'sidebar_section',
	'default'     => 'right_sidebar',
	'priority'    => 10,
	'choices'     => array(
		'left_sidebar'  => CODIFY_URI . '/assets/img/sidebar-left.png',
		'right_sidebar' => CODIFY_URI . '/assets/img/sidebar-right.png',
		'no_sidebar'    => CODIFY_URI . '/assets/img/sidebar-no.png',
	),
);
$fields[] = array(
	'type'        => 'radio-image',
	'settings'    => 'page_sidebar',
	'label'       => esc_html__( 'Page Sidebar', 'codify' ),
	'section'     => 'sidebar_section',
	'default'     => 'right_sidebar',
	'priority'    => 10,
	'choices'     => array(
		'left_sidebar'  => CODIFY_URI . '/assets/img/sidebar-left.png',
		'right_sidebar' => CODIFY_URI . '/assets/img/sidebar-right.png',
		'no_sidebar'    => CODIFY_URI . '/assets/img/sidebar-no.png',
	),
);
$fields[] = array(
	'type'        => 'radio-image',
	'settings'    => 'post_sidebar',
	'label'       => esc_html__( 'Post Sidebar', 'codify' ),
	'section'     => 'sidebar_section',
	'default'     => 'right_sidebar',
	'priority'    => 10,
	'choices'     => array(
		'left_sidebar'  => CODIFY_URI . '/assets/img/sidebar-left.png',
		'right_sidebar' => CODIFY_URI . '/assets/img/sidebar-right.png',
		'no_sidebar'    => CODIFY_URI . '/assets/img/sidebar-no.png',
	),
);
$fields[] = array(
	'type'        => 'radio-image',
	'settings'    => 'search_sidebar',
	'label'       => esc_html__( 'Search Sidebar', 'codify' ),
	'section'     => 'sidebar_section',
	'default'     => 'right_sidebar',
	'priority'    => 10,
	'choices'     => array(
		'left_sidebar'  => CODIFY_URI . '/assets/img/sidebar-left.png',
		'right_sidebar' => CODIFY_URI . '/assets/img/sidebar-right.png',
		'no_sidebar'    => CODIFY_URI . '/assets/img/sidebar-no.png',
	),
);

if ( codify_woocommerce_active() ){
	$fields[] = array(
		'type'        => 'radio-image',
		'settings'    => 'woo_sidebar',
		'label'       => esc_html__( 'Woocommerce Sidebar', 'codify' ),
		'section'     => 'sidebar_section',
		'default'     => 'right_sidebar',
		'priority'    => 10,
		'choices'     => array(
			'left_sidebar'  => CODIFY_URI . '/assets/img/sidebar-left.png',
			'right_sidebar' => CODIFY_URI . '/assets/img/sidebar-right.png',
			'no_sidebar'    => CODIFY_URI . '/assets/img/sidebar-no.png',
		),
	);
}

$fields[] = array(
	'type'        => 'select',
	'settings'    => 'title_layout',
	'label'       => esc_html__( 'Sidebar Widget Title Style', 'codify' ),
	'section'     => 'sidebar_section',
	'default'     => 'widget-style1',
	'priority'    => 10,
	'choices'     => array(
		'widget-style1'          => esc_html__( 'Style 1', 'codify' ),
    	'widget-style2'          => esc_html__( 'Style 2', 'codify' ),
    	'widget-style3'          => esc_html__( 'Style 3', 'codify' ),
    	'widget-style4'          => esc_html__( 'Style 4', 'codify' ),
    	'widget-style5'          => esc_html__( 'Style 5', 'codify' ),
    	'widget-style6'          => esc_html__( 'Style 6', 'codify' ),
    	'widget-style7'          => esc_html__( 'Style 7', 'codify' ),
    	'widget-style8'          => esc_html__( 'Style 8', 'codify' ),
	),
);

$fields[] = array(
    'type'        => 'toggle',
    'settings'    => 'enable_sticky_sidebar',
    'label'       => esc_html__( 'Enable Sticky Sidebar', 'codify' ),
    'section'     => 'sidebar_section',
    'default'     => true,
);