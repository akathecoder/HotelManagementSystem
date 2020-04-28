<?php

//----------------------CUSTOM CODE SECTION----------------------------------
//CUSTOM CSS
$wp_customize->add_setting('optimizer[custom-css]', array(
	'type' => 'option',
	'default' => '',
	'transport' => 'postMessage',
	'sanitize_callback' => 'wp_filter_nohtml_kses',
) );
				$wp_customize->add_control('custom-css', array(
					'type' => 'textarea',
					'label' => __('Custom CSS','optimizer'),
					'description' => __('Quickly add some CSS to your theme by adding it to this block.', 'optimizer'),
					'section' => 'customcode_section',
					'settings' => 'optimizer[custom-css]',
				) );
