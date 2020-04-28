<?php
function optimizer_customizer_register( $wp_customize ) {
	
require(get_template_directory() . '/customizer/includes/control-toggle.php');
require(get_template_directory() . '/customizer/includes/control-info.php');
require(get_template_directory() . '/customizer/includes/control-editor.php');
require(get_template_directory() . '/customizer/includes/control-multicheck.php');
require(get_template_directory() . '/customizer/includes/control-radioimg.php');
require(get_template_directory() . '/customizer/includes/helpers.php');



//========================= ADD PANELS==============================
	$wp_customize->add_panel( 'basic_panel', array(
		'priority' => 1,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Basic', 'optimizer' ),
	) );
	
	$wp_customize->add_panel( 'header_panel', array(
		'priority' => 1,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Header', 'optimizer' ),
	) );

	
	$wp_customize->add_panel( 'front_panel', array(
		'priority' => 1,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Front Page', 'optimizer' ),
	) );
	
	
	$wp_customize->add_panel( 'footer_panel', array(
		'priority' => 1,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Footer', 'optimizer' ),
	) );
	
	
	$wp_customize->add_panel( 'singlepages_panel', array(
		'priority' => 1,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Post & Page', 'optimizer' ),
	) );


			
	$wp_customize->add_panel( 'misc_panel', array(
		'priority' => 1,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Miscellaneous', 'optimizer' ),
	) );
	
	
	$wp_customize->add_panel( 'help_panel', array(
		'priority' => 2,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Help', 'optimizer' ),
	) );

	
//========================= ADD SECTIONS==============================

        $wp_customize->add_section( 'layout_section', array(
            'title'       => __( 'Site Layout', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'basic_panel',
        ) );
		
        $wp_customize->add_section( 'general_color_section', array(
            'title'       => __( 'Basic Style', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'basic_panel',
        ) );
		
        $wp_customize->add_section( 'basic_typography', array(
            'title'       => __( 'Basic Fonts', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'basic_panel',
        ) );
		
		
        $wp_customize->add_section( 'basic_sidebar_section', array(
            'title'       => __( 'Create Sidebars', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'basic_panel',
        ) );
		
        $wp_customize->add_section( 'headtopbar_section', array(
            'title'       => __( 'Topbar', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'header_panel',
        ) );
		
        $wp_customize->add_section( 'headheader_section', array(
            'title'       => __( 'Header', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'header_panel',
        ) );
		
        $wp_customize->add_section( 'headlogo_section', array(
            'title'       => __( 'Site Title & Logo', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'header_panel',
        ) );
		
        $wp_customize->add_section( 'headmenu_section', array(
            'title'       => __( 'Menu ', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'header_panel',
        ) );
		
		
		

        $wp_customize->add_section( 'slider_section', array(
            'title'       => __( 'Slider', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'front_panel',
        ) );
		
				
        $wp_customize->add_section( 'frontpage_section', array(
            'title'       => __( 'Front Page Settings', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'front_panel',
        ) );
		

        $wp_customize->add_section( 'singlepost_section', array(
            'title'       => __( 'Posts Settings', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'singlepages_panel',
			'description' => __( 'To view the live changes you make in this section, select "Single Post" from the Top bar dropdown list located at the top right corner of the screen.', 'optimizer' ),
        ) );	
		
        $wp_customize->add_section( 'pageheader_section', array(
            'title'       => __( 'Page Header Settings', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'singlepages_panel',
			'description' => __( 'To view the live changes you make in this section, select a page from the Top bar dropdown list located at the top right corner of the screen.', 'optimizer' ),
        ) );	

		
        $wp_customize->add_section( 'blogpage_section', array(
            'title'       => __( 'Blog Page Settings', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'singlepages_panel',
			'description' => __( 'Applies only to the page created with the Blog Page Template (Setting up a Blog Page).', 'optimizer' ),
        ) );
		
        $wp_customize->add_section( 'contactpage_section', array(
            'title'       => __( 'Contact Page Settings', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'singlepages_panel',
			'description' => __( 'Applies only to the page created with the Contact Page Template (Setting up a Contact Page).', 'optimizer' ),
        ) );
		
        $wp_customize->add_section( 'socialshare_section', array(
            'title'       => __( 'Social Share Buttons', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'singlepages_panel',
			'description' => __( 'To view the live changes you make in this section, select a post or a page from the Top bar dropdown list located at the top right corner of the screen.', 'optimizer' ),
        ) );
		
        $wp_customize->add_section( 'postpage_color_section', array(
            'title'       => __( 'Post & Page Style', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'singlepages_panel',
			'description' => __( 'To view the live changes you make in this section, select a post or a page from the Top bar dropdown list located at the top right corner of the screen.', 'optimizer' ),
        ) );
		
        $wp_customize->add_section( 'category_section', array(
            'title'       => __( 'Category & Archive Page', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'singlepages_panel',
			'description' => __( 'To view the live changes you make in this section, select "Category or Tag Page" from the Top bar dropdown list located at the top right corner of the screen.', 'optimizer' ),
        ) );

		
        $wp_customize->add_section( 'footercolors_section', array(
            'title'       => __( 'Footer Style', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'footer_panel',
        ) );

        $wp_customize->add_section( 'copyright_section', array(
            'title'       => __( 'Copyright Area', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'footer_panel',
        ) );
		
        $wp_customize->add_section( 'socialinks_section', array(
            'title'       => __( 'Social Links', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'misc_panel',
			'description' => __( 'Social Bookmark Links Settings', 'optimizer' ),
        ) );
        $wp_customize->add_section( 'miscmedia_section', array(
            'title'       => __( 'Media Settings', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'misc_panel',
			'description' => __( 'Meida Settings', 'optimizer' ),
        ) );
        $wp_customize->add_section( 'miscseo_section', array(
            'title'       => __( 'SEO Settings', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'misc_panel',
        ) );
		
        $wp_customize->add_section( 'miscmobile_section', array(
            'title'       => __( 'Mobile Layout', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'misc_panel',
			'description' => __( 'Hide Items From the Mobile Version of Your Site', 'optimizer' ),
        ) );

        $wp_customize->add_section( 'customcode_section', array(
            'title'       => __( 'Custom Code', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'misc_panel',
        ) );

        $wp_customize->add_section( 'miscother_section', array(
            'title'       => __( 'Other Settings', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'misc_panel',
        ) );
		
		

        $wp_customize->add_section( 'otherhelp_section', array(
            'title'       => __( 'Documentation', 'optimizer' ),
            'priority'    => 10,
            'panel'       => 'help_panel',
        ) );






$wp_customize->remove_section( 'background_image' );
$wp_customize->get_control( 'background_color'  )->section	= 'general_color_section';
$wp_customize->get_control( 'background_image'  )->section	= 'general_color_section';
$wp_customize->get_control( 'background_color' )->label = __('Site Background Color','optimizer');
$wp_customize->get_control( 'background_image' )->label = __('Site Background Image','optimizer');
$wp_customize->get_control( 'background_color' )->description = __('Does not affect the front page if the Site Layout is set to Full-Width.','optimizer');
$wp_customize->get_control( 'background_image' )->description = __('Does not affect the front page if the Site Layout is set to Full-Width.','optimizer');
$wp_customize->get_section( 'title_tagline'  )->panel		= 'basic_panel';

if($wp_customize->get_section( 'static_front_page'  )){
	$wp_customize->get_section( 'static_front_page'  )->panel	= 'front_panel';
}
if($wp_customize->get_section( 'color'  )){
	$wp_customize->get_section( 'color'  )->panel		= 'basic_panel';
}
$wp_customize->get_control( 'blogname' )->section	= 'headlogo_section';
$wp_customize->get_control( 'blogdescription' )->section	= 'headlogo_section';
$wp_customize->get_setting( 'blogname' )->transport	= 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport	= 'postMessage';

//Wordpress 4.7+ Remove Wordpress's own custom css 
$wp_customize->remove_section( 'custom_css' );


//--------------------INCLUDE CONTROLS
require(get_template_directory() . '/customizer/controls/settings-basic.php');
require(get_template_directory() . '/customizer/controls/settings-header.php');
require(get_template_directory() . '/customizer/controls/settings-frontpage.php');
require(get_template_directory() . '/customizer/controls/settings-postpage.php');
require(get_template_directory() . '/customizer/controls/settings-footer.php');
require(get_template_directory() . '/customizer/controls/settings-misc.php');
require(get_template_directory() . '/customizer/controls/settings-code.php');
require(get_template_directory() . '/customizer/controls/settings-help.php');

}
add_action( 'customize_register', 'optimizer_customizer_register' );



//==========================ENQEUE CSS & JS FILES===============================

function optimizer_live_preview()
{
	wp_enqueue_script(  'optimizer-live', get_template_directory_uri().'/customizer/assets/live.js',array( 'jquery','customize-preview' ),true);
}
add_action( 'customize_preview_init', 'optimizer_live_preview' );


function enqueue_customizer_scripts(){
	wp_enqueue_script( 'jquery-ui-tooltip' );
	wp_enqueue_script( 'hoverIntent' );
    wp_enqueue_style( 'optimizer-customizer-css', get_template_directory_uri().'/customizer/assets/customizer.css', 'customizer-css');
	wp_enqueue_script('optimizer-customizer-js',get_template_directory_uri().'/customizer/assets/customizer.js', array('customize-controls'), true);
	
	//Wordpress 4.7 FIXES
	if ( function_exists( 'wp_update_custom_css_post' ) ) {  $wp4_7 = 'wp4_7';  }else{  $wp4_7 = '';  }
	
	wp_localize_script( 'optimizer-customizer-js', 'objectL10n', array(
		'addawidget' => __( 'Add Widget', 'optimizer' ),
		'sitettfont' => __( 'Site Title Font', 'optimizer' ),
		'menufont' => __( 'Headings, Menu and Post Titles Font', 'optimizer' ),
		'logofont' => __( 'Site Content Font', 'optimizer' ),
		'image' => __( 'Image', 'optimizer' ),
		'button1' => __( 'Button 1', 'optimizer' ),
		'button2' => __( 'Button 2', 'optimizer' ),
		'slideshow' => __( 'Slideshow', 'optimizer' ),
		'video' => __( 'Video', 'optimizer' ),
		'switchtheme' => __( 'Switch Theme', 'optimizer' ),
		'widgetareas' => __( 'Your Sidebars', 'optimizer' ),
		'statictitle' => __( 'Static Slide Settings', 'optimizer' ),
		'nivotitle' => __( 'Nivo / Accordion Slider Settings', 'optimizer' ),
		'widgetfocusurl' => admin_url('customize.php?autofocus[panel]=widgets'),
		'upgrade' => __( 'Upgrade To PRO', 'optimizer' ),
		'prowidget' => __( 'Upgrade to PRO to Unlock this Widget', 'optimizer' ),
		'optimwidgt' => __( 'Optimizer Widgets', 'optimizer' ),
		'othrimwidgt' => __( 'Other Widgets', 'optimizer' ),
		'socialinks' => __( '<span>Social Links</span> All Major Social Sites are supported. Your links will be automatically detected and relevant icons will be displayed.', 'optimizer' ),
		'rate_opt' => __( 'We hope you are enjoying Optimizer. Would you be kind enough to', 'optimizer' ),
		'rate_smile' => ''.esc_url(home_url('/')).'wp-includes/images/smilies/icon_smile.gif',
		'wp4_7' => $wp4_7,
		
) );
}
add_action( 'customize_controls_enqueue_scripts', 'enqueue_customizer_scripts' );


include_once(get_template_directory() . '/customizer/extra.php');