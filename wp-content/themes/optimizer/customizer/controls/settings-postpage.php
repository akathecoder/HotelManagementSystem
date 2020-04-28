<?php

//----------------------SINGLE POST SECTION----------------------------------


//Single Post Meta
$wp_customize->add_setting('optimizer[post_info_id]', array(
	'type' => 'option',
	'default' => '1',
	'sanitize_callback' => 'optimizer_sanitize_checkbox',
	'transport' => 'postMessage',
) );
 
			$wp_customize->add_control( new Optimizer_Controls_Toggle_Control( $wp_customize, 'post_info_id', array(
				'label' => __('Show Post Info','optimizer'),
				'section' => 'singlepost_section',
				'settings' => 'optimizer[post_info_id]',
			)) );


//NEXT/PREVIOUS Posts
$wp_customize->add_setting('optimizer[post_nextprev_id]', array(
	'type' => 'option',
	'default' => '1',
	'sanitize_callback' => 'optimizer_sanitize_checkbox',
	'transport' => 'postMessage',
) );
 
			$wp_customize->add_control( new Optimizer_Controls_Toggle_Control( $wp_customize, 'post_nextprev_id', array(
				'label' => __('Next and Previous Posts','optimizer'),
				'description'  => __('Display Next and Previous Posts Under Single Post', 'optimizer' ),
				'section' => 'singlepost_section',
				'settings' => 'optimizer[post_nextprev_id]',
			)) );


///Show Comments
$wp_customize->add_setting('optimizer[post_comments_id]', array(
	'type' => 'option',
	'default' => '1',
	'sanitize_callback' => 'optimizer_sanitize_checkbox',
	'transport' => 'postMessage',
) );
 
			$wp_customize->add_control( new Optimizer_Controls_Toggle_Control( $wp_customize, 'post_comments_id', array(
				'label' => __('Comments','optimizer'),
				'description'  => __('Show/Hide Comments in Posts and Pages', 'optimizer' ),
				'section' => 'singlepost_section',
				'settings' => 'optimizer[post_comments_id]',
			)) );



//----------------------PAGE HEADER SECTION----------------------------------

//Page Header Default Background color
$wp_customize->add_setting( 'optimizer[page_header_color]', array(
	'type' => 'option',
	'default' => '#EEEFF5',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_header_color', array(
				'label' => __('Page Header Background','optimizer'),
				'section' => 'pageheader_section',
				'settings' => 'optimizer[page_header_color]',
			) ) );

//Page Header Default Text color
$wp_customize->add_setting( 'optimizer[page_header_txtcolor]', array(
	'type' => 'option',
	'default' => '#555555',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_header_txtcolor', array(
				'label' => __('Page Header Text color','optimizer'),
				'section' => 'pageheader_section',
				'settings' => 'optimizer[page_header_txtcolor]',
			) ) );



//----------------------BLOG PAGE SECTION----------------------------------


/*GET LIST OF CATEGORIES*/
$layercats = get_categories(); 
$newList = array();
foreach($layercats as $category) {
	$newList[$category->term_id] = $category->cat_name;
}	
//BLOG CATEGORY SELECT
//Page Header Default Text color
$wp_customize->add_setting( 'optimizer[blog_cat_id]', array(
	'type' => 'option',
	'default' => '',
	'sanitize_callback' => 'optimizer_sanitize_multicheck'
) );

$wp_customize->add_control( new Optimizer_Multicheck_Control( $wp_customize, 'blog_cat_id', array(
        'type' => 'multicheck',
        'label' => __('Display Blog Posts from selected Categories *','optimizer'),
        'section' => 'blogpage_section',
        'choices' =>$newList,
		'settings'    => 'optimizer[blog_cat_id]'
)) );

//Blog Page Post Count
$wp_customize->add_setting('optimizer[blog_num_id]', array(
	'type' => 'option',
	'default' => '9',
	'sanitize_callback' => 'optimizer_sanitize_number',
) );
			$wp_customize->add_control('blog_num_id', array(
				'type' => 'text',
				'label' => __('Blog Page Posts Count *','optimizer'),
				'section' => 'blogpage_section',
				'settings' => 'optimizer[blog_num_id]',
							'input_attrs'	=> array(
								'class'	=> 'mini_control',
							)
			) );

//Blog LAYOUT SELECT
$wp_customize->add_setting('optimizer[blog_layout_id]', array(
		'type' => 'option',
        'default' => '1',
		'sanitize_callback' => 'optimizer_sanitize_number'
) );
 
			$wp_customize->add_control( new Optimizer_Control_Radio_Image( $wp_customize, 'blog_layout_id', array(
					'type' => 'radio-image',
					'label' => __('Blog Page Layout *','optimizer'),
					'section' => 'blogpage_section',
					'settings' => 'optimizer[blog_layout_id]',
					'choices' => array(
						'1' => array( 'url' => get_template_directory_uri().'/assets/images/blog_layout1.png', 'label' => 'Blog Layout 1' ),
					),
			) ));


///Blog Page Thumbnails
$wp_customize->add_setting('optimizer[show_blog_thumb]', array(
	'type' => 'option',
	'default' => '1',
	'sanitize_callback' => 'optimizer_sanitize_checkbox',
) );
 
				$wp_customize->add_control( new Optimizer_Controls_Toggle_Control( $wp_customize, 'show_blog_thumb', array(
					'label' => __('Blog Page Thumbnails *','optimizer'),
					'section' => 'blogpage_section',
					'settings' => 'optimizer[show_blog_thumb]',
				)) );



//---------Post & Page Color SETTINGS---------------------	

//Post Title Color
$wp_customize->add_setting( 'optimizer[title_txt_color_id]', array(
	'type' => 'option',
	'default' => '#666666',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_txt_color_id', array(
				'label' => __('Post Title Color','optimizer'),
				'section' => 'postpage_color_section',
				'settings' => 'optimizer[title_txt_color_id]',
			) ) );

//Link Color (Regular)
$wp_customize->add_setting( 'optimizer[link_color_id]', array(
	'type' => 'option',
	'default' => '#3590ea',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color_id', array(
				'label' => __('Link Color (Regular)','optimizer'),
				'section' => 'postpage_color_section',
				'settings' => 'optimizer[link_color_id]',
			) ) );

//Link Color (HOVER)
$wp_customize->add_setting( 'optimizer[link_color_hover]', array(
	'type' => 'option',
	'default' => '#1e73be',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color_hover', array(
				'label' => __('Links Color (Hover)','optimizer'),
				'section' => 'postpage_color_section',
				'settings' => 'optimizer[link_color_hover]',
			) ) );



//---------SIDEBAR & WIDGET Color SETTINGS---------------------	

//Sidebar Widgets Background Color
$wp_customize->add_setting( 'optimizer[sidebar_color_id]', array(
	'type' => 'option',
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_color_id', array(
				'label' => __('Sidebar Widgets Background','optimizer'),
				'section' => 'postpage_color_section',
				'settings' => 'optimizer[sidebar_color_id]',
			) ) );


//Sidebar Widget Title Color
$wp_customize->add_setting( 'optimizer[sidebar_tt_color_id]', array(
	'type' => 'option',
	'default' => '#666666',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_tt_color_id', array(
				'label' => __('Sidebar Widget Title Color','optimizer'),
				'section' => 'postpage_color_section',
				'settings' => 'optimizer[sidebar_tt_color_id]',
			) ) );


//Sidebar Widget Text Color
$wp_customize->add_setting( 'optimizer[sidebartxt_color_id]', array(
	'type' => 'option',
	'default' => '#999999',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebartxt_color_id', array(
				'label' => __('Sidebar Widget Text Color','optimizer'),
				'section' => 'postpage_color_section',
				'settings' => 'optimizer[sidebartxt_color_id]',
			) ) );


//Sidebar Widget Title Font Size
$wp_customize->add_setting('optimizer[wgttitle_size_id]', array(
	'type' => 'option',
	'default' => '16px',
	'sanitize_callback' => 'sanitize_text_field',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('wgttitle_size_id', array(
				'type' => 'text',
				'label' => __('Sidebar Widget Title Font Size','optimizer'),
				'section' => 'postpage_color_section',
				'settings' => 'optimizer[wgttitle_size_id]',
			) );


//CATEGORY LAYOUT SELECT
$wp_customize->add_setting('optimizer[cat_layout_id]', array(
		'type' => 'option',
        'default' => '1',
		'sanitize_callback' => 'optimizer_sanitize_choices',
) );
 
			$wp_customize->add_control( new Optimizer_Control_Radio_Image( $wp_customize, 'cat_layout_id', array(
					'type' => 'radio-image',
					'label' => __('Category & Archive Page layout *','optimizer'),
					'section' => 'category_section',
					'settings' => 'optimizer[cat_layout_id]',
					'choices' => array(
						'1' => array( 'url' => get_template_directory_uri().'/assets/images/layout1.png', 'label' => 'Layout 1' ),
						'4' => array( 'url' => get_template_directory_uri().'/assets/images/layout4.png', 'label' => 'Layout 4' ),
					),
			) ));