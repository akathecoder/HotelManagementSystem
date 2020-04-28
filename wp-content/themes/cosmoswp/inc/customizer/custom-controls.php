<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/*Custom Control*/
require cosmoswp_file_directory('inc/customizer/custom-controls/section/section.php');
require cosmoswp_file_directory('inc/customizer/custom-controls/range/class-control-range.php');
require cosmoswp_file_directory('inc/customizer/custom-controls/buttonset/class-control-buttonset.php');
require cosmoswp_file_directory('inc/customizer/custom-controls/buttonset/class-control-responsive-buttonset.php');
require cosmoswp_file_directory('inc/customizer/custom-controls/color/class-control-color.php');
require cosmoswp_file_directory('inc/customizer/custom-controls/message/class-control-message.php');
require cosmoswp_file_directory('inc/customizer/custom-controls/heading/class-control-heading.php');
require cosmoswp_file_directory('inc/customizer/custom-controls/slider/class-control-slider.php');
require cosmoswp_file_directory('inc/customizer/custom-controls/sortable/class-control-sortable.php');
require cosmoswp_file_directory('inc/customizer/custom-controls/multicheck/class-control-multicheck.php');
require cosmoswp_file_directory('inc/customizer/custom-controls/repeater/customizer-control-repeater.php');
require cosmoswp_file_directory('inc/customizer/custom-controls/icons/customizer-control-icons.php');
require cosmoswp_file_directory('inc/customizer/custom-controls/group/class-control-group.php');
require cosmoswp_file_directory('inc/customizer/custom-controls/cssbox/class-control-cssbox.php');
require cosmoswp_file_directory('inc/customizer/custom-controls/tabs/class-control-tabs.php');

/*Register Section*/
$wp_customize->register_section_type( 'CosmosWP_WP_Customize_Section_H3' );
$wp_customize->register_section_type( 'CosmosWP_WP_Customize_Section_P' );

// Register JS control types
$wp_customize->register_control_type( 'CosmosWP_Custom_Control_Buttonset' );
$wp_customize->register_control_type( 'CosmosWP_Custom_Control_Color' );
$wp_customize->register_control_type( 'CosmosWP_Custom_Control_Range' );
$wp_customize->register_control_type( 'CosmosWP_Custom_Control_Message' );
$wp_customize->register_control_type( 'CosmosWP_Custom_Control_Heading' );
$wp_customize->register_control_type( 'CosmosWP_Custom_Control_Slider' );
$wp_customize->register_control_type( 'CosmosWP_Custom_Control_Sortable' );
$wp_customize->register_control_type( 'CosmosWP_Customize_Multicheck_Control' );