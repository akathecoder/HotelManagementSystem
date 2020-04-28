<?php
	
	// Register the radio image control class as a JS control type.
	$wp_customize->register_control_type( 'Optimizer_Control_Radio_Image' );


//----------------------SITE LAYOUT SECTION----------------------------------

//DROP SHADOW FIELD
$wp_customize->add_setting('optimizer[converted]', array(
	'type' => 'option',
	'default' => '',
	'sanitize_callback' => 'optimizer_sanitize_checkbox',
) );

			$wp_customize->add_control( 'converted', array(
				'type' => 'text',
				'label' => __('Converted to Latest Version','optimizer'),
				'section' => 'layout_section',
				'settings' => 'optimizer[converted]',
			) );
			



// Add the layout setting.
$wp_customize->add_setting('optimizer[site_layout_id]', array(
		'type' => 'option',
		'default'           => 'site_full',
		'sanitize_callback' => 'sanitize_key',
	)
);

		  // Add the layout control.
		  $wp_customize->add_control('site_layout_id',array(
						'type' => 'select',
						'label'    => esc_html__( 'Site Layout *', 'optimizer' ),
						'section'  => 'layout_section',
						'settings' => 'optimizer[site_layout_id]',
						'choices'  => array(
							'site_full' => __('Full Width', 'optimizer'), 
							'site_boxed' => __('Boxed', 'optimizer'), 
					  )
			  ) );
			  
//CONTENT BACKGOURND WIDTH
$wp_customize->add_setting( 'optimizer[center_width]', array(
		'type' => 'option',
        'default' => '85',
		'sanitize_callback' => 'optimizer_sanitize_number',
) );
 
			$wp_customize->add_control('center_width', array(
					'type' => 'range',
					'label' => __('Box Width *','optimizer'),
					'section' => 'layout_section',
					'input_attrs' => array(
						'min' => 30,
						'max' => 100,
						'step' => 10,
						'class' => 'range-textbox_width',
						'style' => 'color: #0a0',
					),
					'settings'    => 'optimizer[center_width]',
					'active_callback' => 'optimizer_layout_callback',
			) );



//CONTENT BACKGOURND COLOR FIELD
$wp_customize->add_setting( 'optimizer[content_bg_color]', array(
	'type' => 'option',
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_bg_color', array(
				'label' => __('Box Background Color','optimizer'),
				'section' => 'layout_section',
				'settings' => 'optimizer[content_bg_color]',
				'active_callback' => 'optimizer_layout_callback',
			) ) );




//---------General Color SETTINGS---------------------	

//Fixed Background Image
$wp_customize->add_setting('optimizer[background_fixed]', array(
	'type' => 'option',
	'default' => '',
	'sanitize_callback' => 'optimizer_sanitize_checkbox',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control( new Optimizer_Controls_Toggle_Control( $wp_customize, 'background_fixed', array(
				'label' => __('Fixed Background Image','optimizer'),
				'section' => 'general_color_section',
				'settings' => 'optimizer[background_fixed]',
			)) );



//Site content Text Color
$wp_customize->add_setting( 'optimizer[primtxt_color_id]', array(
	'type' => 'option',
	'default' => '#999999',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primtxt_color_id', array(
				'label' => __('Site content Text Color','optimizer'),
				'section' => 'general_color_section',
				'settings' => 'optimizer[primtxt_color_id]',
			) ) );

//BASE COLOR
$wp_customize->add_setting( 'optimizer[sec_color_id]', array(
	'type' => 'option',
	'default' => '#36abfc',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sec_color_id', array(
				'label' => __('Other Elements Background','optimizer'),
				'description' => __( 'Affects Frontpage Posts hover color, Search button background Color, Widget Title border color, Related post hover color, Sub menu hover background color, Comments Submit button color.', 'optimizer' ),
				'section' => 'general_color_section',
				'settings' => 'optimizer[sec_color_id]',
			) ) );


//TEXT COLOR ON BASE COLOR
$wp_customize->add_setting( 'optimizer[sectxt_color_id]', array(
	'type' => 'option',
	'default' => '#FFFFFF',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sectxt_color_id', array(
				'label' => __('Other Elements Text Color','optimizer'),
				'description' => __( 'Affects Front page post hover text color, Search button text color.', 'optimizer' ),
				'section' => 'general_color_section',
				'settings' => 'optimizer[sectxt_color_id]',
			) ) );




//---------TYPOGRAPHY SETTINGS---------------------	

// Site Content Font Family
$wp_customize->add_setting( 'optimizer[content_font_id][font-family]', array(
	'type' => 'option',
	'default' => 'Open Sans',
	'transport' => 'postMessage',
	'sanitize_callback' => 'esc_attr',
	
) );
			$wp_customize->add_control('content_font_family', array(
					'type' => 'select',
					'label' => __('Family','optimizer'),
					'section' => 'basic_typography',
					'settings' => 'optimizer[content_font_id][font-family]',
					'choices' => customizer_library_get_font_choices(),
			) );

// Site Content Font Subsets
$wp_customize->add_setting( 'optimizer[content_font_id][subsets]', array(
	'type' => 'option',
	'default' => 'latin',
	'sanitize_callback' => 'esc_attr',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('content_font_subsets', array(
					'type' => 'select',
					'label' => __('Subsets','optimizer'),
					'section' => 'basic_typography',
					'settings' => 'optimizer[content_font_id][subsets]',
					'choices' => customizer_library_get_google_font_subsets(),
			) );


//Site Content Font Size
$wp_customize->add_setting('optimizer[content_font_id][font-size]', array(
	'type' => 'option',
	'default' => '16px',
	'sanitize_callback' => 'sanitize_text_field',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('content_font_size', array(
				'type' => 'text',
				'label' => __('Font Size','optimizer'),
				'section' => 'basic_typography',
				'settings' => 'optimizer[content_font_id][font-size]',
							'input_attrs'	=> array(
								'class'	=> 'mini_control',
							)
			) );



// Post Titles, headings and Menu Font Family
	
$wp_customize->add_setting( 'optimizer[ptitle_font_id][font-family]', array(
	'type' => 'option',
	'default' => 'Open Sans',
	'sanitize_callback' => 'esc_attr',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('ptitle_font_family', array(
					'type' => 'select',
					'label' => __('Family','optimizer'),
					'section' => 'basic_typography',
					'settings' => 'optimizer[ptitle_font_id][font-family]',
					'choices' => customizer_library_get_font_choices(),
			) );

// Post Titles, headings and Menu Font Subsets
$wp_customize->add_setting( 'optimizer[ptitle_font_id][subsets]', array(
	'type' => 'option',
	'default' => 'latin',
	'sanitize_callback' => 'esc_attr',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('ptitle_font_subsets', array(
					'type' => 'select',
					'label' => __('Subsets','optimizer'),
					'section' => 'basic_typography',
					'settings' => 'optimizer[ptitle_font_id][subsets]',
					'choices' => customizer_library_get_google_font_subsets(),
			) );



//Turn Menu Text &amp; All Headings to Uppercase
$wp_customize->add_setting('optimizer[txt_upcase_id]', array(
	'type' => 'option',
	'default' => '1',
	'sanitize_callback' => 'optimizer_sanitize_checkbox',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control( new Optimizer_Controls_Toggle_Control( $wp_customize, 'txt_upcase_id', array(
				'label' => __('Turn Menu Text &amp; All Headings to Uppercase','optimizer'),
				'section' => 'basic_typography',
				'settings' => 'optimizer[txt_upcase_id]',
			)) );



//---------------LAYOUT CALLBACK-------------------//
function optimizer_layout_callback( $control ) {
    $layout_setting = $control->manager->get_setting('optimizer[site_layout_id]')->value();
     
    if ( $layout_setting == 'site_boxed' ) return true;
     
    return false;
}


//---------------HEADER CALLBACK-------------------//
function optimizer_transparent_header_callback( $control ) {
    $header_setting = $control->manager->get_setting('optimizer[head_transparent]')->value();
     
    if ( $header_setting == 1 ) return true;
     
    return false;
}
