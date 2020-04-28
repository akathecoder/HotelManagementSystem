<?php


//----------------------SLIDER TYPE SECTION----------------------------------

//SLIDER TYPE
$wp_customize->add_setting( 'optimizer[slider_type_id]', array(
		'type' => 'option',
        'default' => 'static',
		'sanitize_callback' => 'optimizer_sanitize_choices',
) );
 
			$wp_customize->add_control('slider_type_id', array(
					'type' => 'select',
					'label' => __('Slider Type *','optimizer'),
					'description' => __('Choose the Slider type and configure your images from Slider Settings below.','optimizer'),
					'section' => 'slider_section',
					'choices' => array(
						'static'=> __('Static Slide', 'optimizer'),
						'noslider'=>__('Disable Slider', 'optimizer')
					),
					'settings'    => 'optimizer[slider_type_id]'
			) );


//----------------------STATIC SLIDER SECTION----------------------------------


//Static Slide Background Image
$wp_customize->add_setting( 'optimizer[static_image_id][url]',array( 
	'type' => 'option',
	'default' => ''.get_template_directory_uri().'/assets/images/slide.jpg',
	'sanitize_callback' => 'esc_url_raw',
	)
);

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'static_image_id',array(
					'label'       => __( 'Background Image *', 'optimizer' ),
					'section'     => 'slider_section',
					'settings'    => 'optimizer[static_image_id][url]'
						)
					)
			);

			

//Static Slide Content
$wp_customize->add_setting( 'optimizer[static_img_text_id]', array(
		'type' => 'option',
		'sanitize_callback' => 'optimizer_kses_html',
        'default' => '<p><img class="size-full" src="'. get_template_directory_uri().'/assets/images/slide_icon.png" alt="slide_icon" width="100" height="100" /></p><p><span style="font-size: 36pt;">'.__('ADVANCED','optimizer').' . <strong>'.__('STRONG', 'optimizer').'</strong> . '.__('RELIABLE', 'optimizer').'</span></p><p>'.__('The Optimizer, an easy to customizable multi-purpose theme with lots of powerful features.', 'optimizer').'</p>',
		
) );

			$wp_customize->add_control( new Optimizer_Editor_Control( $wp_customize, 'static_img_text_id', array( 
					'type' => 'editor',
					'label' => __('Static Slide Content *','optimizer'),
					'section' => 'slider_section',
					'settings'    => 'optimizer[static_img_text_id]'
			)) );




//Slider Text Color
$wp_customize->add_setting( 'optimizer[slider_txt_color]', array(
	'type' => 'option',
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'slider_txt_color', array(
				'label' => __('Slide Text Color','optimizer'),
				'section' => 'slider_section',
				'settings' => 'optimizer[slider_txt_color]',
			) ) );
			
			

//CTA Button 1 Text
$wp_customize->add_setting( 'optimizer[static_cta1_text]', array(
		'type' => 'option',
        'default' => __('DEMO','optimizer'),
		'sanitize_callback'    => 'sanitize_text_field',
		'transport' => 'postMessage',
) );
 
			$wp_customize->add_control('static_cta1_text', array(
					'type' => 'text',
					'label' => __('Button Text','optimizer'),
					'section' => 'slider_section',
					'settings'    => 'optimizer[static_cta1_text]',
			) );

//CTA Button 1 Link
$wp_customize->add_setting( 'optimizer[static_cta1_link]', array(
		'type' => 'option',
        'default' => '#',
		'sanitize_callback'    => 'esc_url_raw',
		'transport' => 'postMessage',
) );
 
			$wp_customize->add_control('static_cta1_link', array(
					'type' => 'text',
					'label' => __('Button Link','optimizer'),
					'section' => 'slider_section',
					'settings'    => 'optimizer[static_cta1_link]',
			) );
			

//CTA Button 1 Style
$wp_customize->add_setting( 'optimizer[static_cta1_txt_style]', array(
		'type' => 'option',
        'default' => 'hollow',
		'sanitize_callback' => 'optimizer_sanitize_choices',
		'transport' => 'postMessage',
) );
 
			$wp_customize->add_control('static_cta1_txt_style', array(
					'type' => 'select',
					'label' => __('Button Style','optimizer'),
					'section' => 'slider_section',
					'choices' => array(
						'flat'=>		__('Flat', 'optimizer'),
						'flat_big'=>	__('Flat (Big)', 'optimizer'),
						'hollow'=>		__('Hollow', 'optimizer'),
						'hollow_big'=>	__('Hollow (Big)', 'optimizer'),
						'rounded'=>		__('Rounded', 'optimizer'),
						'rounded_big'=>	__('Rounded (Big)', 'optimizer'),
					),
					'settings'    => 'optimizer[static_cta1_txt_style]'
			) );
			

//CTA Button 1 Background Color
$wp_customize->add_setting( 'optimizer[static_cta1_bg_color]', array(
	'type' => 'option',
	'default' => '#36abfc',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'static_cta1_bg_color', array(
				'label' => __('Button Background','optimizer'),
				'section' => 'slider_section',
				'settings' => 'optimizer[static_cta1_bg_color]',
			) ) );

//CTA Button 1 Text Color
$wp_customize->add_setting( 'optimizer[static_cta1_txt_color]', array(
	'type' => 'option',
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'static_cta1_txt_color', array(
				'label' => __('Button Text Color','optimizer'),
				'section' => 'slider_section',
				'settings' => 'optimizer[static_cta1_txt_color]',
			) ) );


//CTA Button 2 Text
$wp_customize->add_setting( 'optimizer[static_cta2_text]', array(
		'type' => 'option',
        'default' => __('DOWNLOAD','optimizer'),
		'sanitize_callback'    => 'sanitize_text_field',
		'transport' => 'postMessage',
) );
 
			$wp_customize->add_control('static_cta2_text', array(
					'type' => 'text',
					'label' => __('Button Text','optimizer'),
					'section' => 'slider_section',
					'settings'    => 'optimizer[static_cta2_text]',
			) );

//CTA Button 2 Link
$wp_customize->add_setting( 'optimizer[static_cta2_link]', array(
		'type' => 'option',
        'default' => '#',
		'sanitize_callback'    => 'esc_url_raw',
		'transport' => 'postMessage',
) );
 
			$wp_customize->add_control('static_cta2_link', array(
					'type' => 'text',
					'label' => __('Button Link','optimizer'),
					'section' => 'slider_section',
					'settings'    => 'optimizer[static_cta2_link]',
			) );
			

//CTA Button 2 Style
$wp_customize->add_setting( 'optimizer[static_cta2_txt_style]', array(
		'type' => 'option',
        'default' => 'flat',
		'sanitize_callback' => 'optimizer_sanitize_choices',
		'transport' => 'postMessage',
) );
 
			$wp_customize->add_control('static_cta2_txt_style', array(
					'type' => 'select',
					'label' => __('Button Style','optimizer'),
					'section' => 'slider_section',
					'choices' => array(
						'flat'=>		__('Flat', 'optimizer'),
						'flat_big'=>	__('Flat (Big)', 'optimizer'),
						'hollow'=>		__('Hollow', 'optimizer'),
						'hollow_big'=>	__('Hollow (Big)', 'optimizer'),
						'rounded'=>		__('Rounded', 'optimizer'),
						'rounded_big'=>	__('Rounded (Big)', 'optimizer'),
					),
					'settings'    => 'optimizer[static_cta2_txt_style]'
			) );
			
			
//CTA Button 2 Background Color
$wp_customize->add_setting( 'optimizer[static_cta2_bg_color]', array(
	'type' => 'option',
	'default' => '#36abfc',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'static_cta2_bg_color', array(
				'label' => __('Button Background','optimizer'),
				'section' => 'slider_section',
				'settings' => 'optimizer[static_cta2_bg_color]',
			) ) );

//CTA Button 2 Text Color
$wp_customize->add_setting( 'optimizer[static_cta2_txt_color]', array(
	'type' => 'option',
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'static_cta2_txt_color', array(
				'label' => __('Button Text Color','optimizer'),
				'section' => 'slider_section',
				'settings' => 'optimizer[static_cta2_txt_color]',
			) ) );



//Slider Content Box Width
$wp_customize->add_setting( 'optimizer[static_textbox_width]', array(
		'type' => 'option',
        'default' => '85',
		'sanitize_callback' => 'optimizer_sanitize_number',
		'transport' => 'postMessage',
) );
 
			$wp_customize->add_control('static_textbox_width', array(
					'type' => 'range',
					'label' => __('Slider Content Box Width','optimizer'),
					'section' => 'slider_section',
					'input_attrs' => array(
						'min' => 0,
						'max' => 100,
						'step' => 1,
						'class' => 'range-textbox_width',
						'style' => 'color: #0a0',
					),
					'settings'    => 'optimizer[static_textbox_width]'
			) );


//Slider Content Box Bottom Margin
$wp_customize->add_setting( 'optimizer[static_textbox_bottom]', array(
		'type' => 'option',
        'default' => '15',
		'sanitize_callback' => 'optimizer_sanitize_number',
		'transport' => 'postMessage',
) );
 
			$wp_customize->add_control('static_textbox_bottom', array(
					'type' => 'range',
					'label' => __('Content Box Vertical Position','optimizer'),
					'section' => 'slider_section',
					'input_attrs' => array(
						'min' => 0,
						'max' => 50,
						'step' => 1,
						'class' => 'range-textbox_bottom',
						'style' => 'color: #0a0',
					),
					'settings'    => 'optimizer[static_textbox_bottom]'
			) );


//SLIDER Content Alignment
$wp_customize->add_setting( 'optimizer[slider_content_align]', array(
		'type' => 'option',
        'default' => 'center',
		'sanitize_callback' => 'optimizer_sanitize_choices',
		'transport' => 'postMessage',
) );
 
			$wp_customize->add_control('slider_content_align', array(
					'type' => 'select',
					'label' => __('Slider Content Alignment','optimizer'),
					'section' => 'slider_section',
					'choices' => array(
						'left'=> __('Left', 'optimizer'),
						'center'=> __('Center', 'optimizer'),
						'right'=> __('Right', 'optimizer'),
					),
					'settings'    => 'optimizer[slider_content_align]'
         ) );
         
//Disable Static Slider Parallax Effect
$wp_customize->add_setting('optimizer[disable_slider_parallax]', array(
	'type' => 'option',
	'default' => '',
	'sanitize_callback' => 'optimizer_sanitize_checkbox',
	'transport' => 'refresh',
) );
			$wp_customize->add_control( new Optimizer_Controls_Toggle_Control( $wp_customize, 'disable_slider_parallax', array(
				'label' => __('Disable Parallax Effect','optimizer'),
				'section' => 'slider_section',
				'settings' => 'optimizer[disable_slider_parallax]',
			)) );


//---------------SLIDER CALLBACK-------------------//
function optimizer_slider_static( $control ) {
    $layout_setting = $control->manager->get_setting('optimizer[slider_type_id]')->value();
     
    if ( $layout_setting == 'static' ) return true;
     
    return false;
}
function optimizer_slider_nivoacc( $control ) {
    $layout_setting = $control->manager->get_setting('optimizer[slider_type_id]')->value();
     
    if ( $layout_setting == 'accordion' || $layout_setting == 'nivo' ) return true;
     
    return false;
}