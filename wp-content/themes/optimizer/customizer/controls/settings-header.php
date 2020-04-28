<?php


//----------------------TOPBAR SECTION----------------------------------


//============================HEADER - LOGO SECTION=================================


// Site Title Font Family
$wp_customize->add_setting( 'optimizer[logo_font_id][font-family]', array(
	'type' => 'option',
	'default' => 'Open Sans',
	'sanitize_callback' => 'esc_attr',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('logo_font_family', array(
					'type' => 'select',
					'label' => __('Family','optimizer'),
					'section' => 'headlogo_section',
					'settings' => 'optimizer[logo_font_id][font-family]',
					'choices' => customizer_library_get_font_choices(),
			) );

// Site Title Font Subsets
$wp_customize->add_setting( 'optimizer[logo_font_id][subsets]', array(
	'type' => 'option',
	'default' => 'latin',
	'sanitize_callback' => 'esc_attr',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('logo_font_subsets', array(
					'type' => 'select',
					'label' => __('Subsets','optimizer'),
					'section' => 'headlogo_section',
					'settings' => 'optimizer[logo_font_id][subsets]',
					'choices' => customizer_library_get_google_font_subsets(),
			) );


//Site Title Font Size
$wp_customize->add_setting('optimizer[logo_font_id][font-size]', array(
	'type' => 'option',
	'default' => '36px',
	'sanitize_callback' => 'sanitize_text_field',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('logo_font_size', array(
				'type' => 'text',
				'label' => __('Site Title Font Size','optimizer'),
				'section' => 'headlogo_section',
				'settings' => 'optimizer[logo_font_id][font-size]',
						'input_attrs'	=> array(
							'class'	=> 'mini_control',
						)
			) );

//Site Title Text Color
$wp_customize->add_setting( 'optimizer[logo_color_id]', array(
	'type' => 'option',
	'default' => '#555555',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logo_color_id', array(
				'label' => __('Site Title Color','optimizer'),
				'section' => 'headlogo_section',
				'settings' => 'optimizer[logo_color_id]',
			) ) );



//LOGO UPLOAD FIELD
$wp_customize->add_setting( 'optimizer[logo_image_id][url]',array( 
	'type' => 'option',
	'default' => '',
	'sanitize_callback' => 'esc_url_raw',
	)
);

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_image_id',array(
					'label'       => __( 'Logo Image *', 'optimizer' ),
					'section'     => 'headlogo_section',
					'settings'    => 'optimizer[logo_image_id][url]',
						)
					)
			);


//Hide Site Description
$wp_customize->add_setting('optimizer[hide_tagline]', array(
	'type' => 'option',
	'default' => '',
	'sanitize_callback' => 'optimizer_sanitize_checkbox',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control( new Optimizer_Controls_Toggle_Control( $wp_customize, 'hide_tagline', array(
				'label' => __('Hide Site Tagline','optimizer'),
				'section' => 'headlogo_section',
				'settings' => 'optimizer[hide_tagline]',
			)) );


//============================HEADER - MENU SECTION=================================


//MENU TEXT COLOR
$wp_customize->add_setting( 'optimizer[menutxt_color_id]', array(
	'type' => 'option',
	'default' => '#888888',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menutxt_color_id', array(
				'label' => __('Menu Text Color','optimizer'),
				'section' => 'headmenu_section',
				'settings' => 'optimizer[menutxt_color_id]',
			) ) );

//MENU HOVER TEXT COLOR
$wp_customize->add_setting( 'optimizer[menutxt_color_hover]', array(
	'type' => 'option',
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menutxt_color_hover', array(
				'label' => __('Menu Hover Text Color','optimizer'),
				'section' => 'headmenu_section',
				'settings' => 'optimizer[menutxt_color_hover]',
			) ) );

//MENU ACTIVE TEXT COLOR
$wp_customize->add_setting( 'optimizer[menutxt_color_active]', array(
	'type' => 'option',
	'default' => '#3590ea',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menutxt_color_active', array(
				'label' => __('Menu Active Text Color','optimizer'),
				'section' => 'headmenu_section',
				'settings' => 'optimizer[menutxt_color_active]',
			) ) );



//MENU TEXT SIZE
$wp_customize->add_setting('optimizer[menu_size_id]', array(
	'type' => 'option',
	'default' => '14px',
	'sanitize_callback' => 'sanitize_text_field',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('menu_size_id', array(
				'type' => 'text',
				'label' => __('Menu Font Size','optimizer'),
				'section' => 'headmenu_section',
				'settings' => 'optimizer[menu_size_id]',
						'input_attrs'	=> array(
							'class'	=> 'mini_control',
						)
			) );




//============================BASIC - HEADER SECTION=================================

//TRANSPARENT HEADER FIELD
$wp_customize->add_setting('optimizer[head_transparent]', array(
	'type' => 'option',
	'default' => '1',
	'sanitize_callback' => 'optimizer_sanitize_checkbox',
) );
 
			$wp_customize->add_control( new Optimizer_Controls_Toggle_Control( $wp_customize, 'head_transparent', array(
				'label' => __('Transparent Header on Frontpage *','optimizer'),
				'section' => 'headheader_section',
				'settings' => 'optimizer[head_transparent]',
			)) );



//TRANSPARENT HEADER COLOR FIELD
$wp_customize->add_setting( 'optimizer[trans_header_color]', array(
	'type' => 'option',
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'trans_header_color', array(
				'label' => __('Transparent Header Text Color','optimizer'),
				'section' => 'headheader_section',
				'settings' => 'optimizer[trans_header_color]',
				'active_callback' => 'optimizer_transparent_header_callback',
			) ) );



//HEADER BACKGROUND COLOR
$wp_customize->add_setting( 'optimizer[head_color_id]', array(
	'type' => 'option',
	'default' => '#F9F9F9',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'head_color_id', array(
				'label' => __('Header Background Color','optimizer'),
				'section' => 'headheader_section',
				'settings' => 'optimizer[head_color_id]',
			) ) );

