<?php

/*ADD EDITOR TO CUSTOMIZER*/
function optimizer_customizer_editor() {
		?>
		<div id="wp-editor-widget-container" style="display: none;">
			<a class="close" href="javascript:WPEditorWidget.hideEditor();" title="<?php esc_attr_e( 'Close', 'optimizer' ); ?>"><span class="icon"></span></a>
			<div class="editor">
				<?php $settings = array('textarea_rows' => 55, 'editor_height' => 260);  wp_editor( '', 'wpeditorwidget', $settings ); ?>
				<p><a href="javascript:WPEditorWidget.updateWidgetAndCloseEditor(true);" class="button button-primary"><?php _e( 'Save and close', 'optimizer' ); ?></a></p>
			</div>
		</div>
		<div id="wp-editor-widget-backdrop" style="display: none;"></div>

		<?php
		
	} // END output_wp_editor_widget_html*/
	
add_action( 'widgets_admin_page', 'optimizer_customizer_editor', 100 );
add_action( 'customize_controls_print_footer_scripts', 'optimizer_customizer_editor', 1 );

//SiteOrigin Builder
if( function_exists('siteorigin_panels_render') ) {
	add_action( 'edit_form_after_editor', 'optimizer_customizer_editor', 100 );
}
//Beaver Builder
if ( class_exists( 'FLBuilder' ) ) {
	if(isset($_GET['fl_builder'])) {
		add_action( 'optimizer_after_footer', 'optimizer_customizer_editor', 100 );
	}
}


/* Add Filters for the Customizer wp_editor */
add_filter( 'wp_editor_widget_content', 'wptexturize' );
add_filter( 'wp_editor_widget_content', 'convert_smilies' );
add_filter( 'wp_editor_widget_content', 'convert_chars' );
add_filter( 'wp_editor_widget_content', 'wpautop' );
add_filter( 'wp_editor_widget_content', 'shortcode_unautop' );
add_filter( 'wp_editor_widget_content', 'do_shortcode', 11 );




function optimizer_customizer_stuff() {
		?>
        <div id="optimizer_settings">
        	<a class="optim_settings_close"><i class="fa fa-times"></i></a>
        	<h3><?php _e('SETTINGS', 'optimizer'); ?></h3>
            <!--ASSIGN DUMMY WIDGETS-->
            <?php $active_widgets = get_option( 'sidebars_widgets' ); if(empty($active_widgets['front_sidebar']) ) { ?>
            
            <div id="dummy_options" class="setting_option">
            	<h4><?php _e('Import Dummy Content', 'optimizer'); ?></h4>
                
                <div class="settings_toggle_inner">
                <p><?php _e('Add Dummy Content(Widgets) to your Frontpage. After Importing you can edit them from Widgets > Frontpage Sections', 'optimizer'); ?></p>
					<form id="import_dummy" action="" method="post" enctype="multipart/form-data">
						<input type="submit" name="assign_widgets" id="dummy_button" class="button-primary" value="<?php esc_attr_e('Import Dummy Content', 'optimizer'); ?>" />
                     <?php wp_nonce_field('optimizer_assign_widgets', 'optimizer_assign_widgets'); ?>
                        </form>
                </div>
            </div>
               
            <?php } ?>
            
            <!--RESET OPTIONS-->
            <div id="reset_options" class="setting_option">
            	<h4><?php _e('Reset Options', 'optimizer'); ?></h4>
                <div class="settings_toggle_inner">
                	<p><?php _e('Reset Options to default theme settings. All your current theme settings will be lost except the widgets settings.', 'optimizer'); ?></p>
                    <form id="optimizer_reset" method="post" action="" onsubmit="return confirm('<?php esc_attr_e('Do you really want to Reset? All your Theme Settings will be lost.', 'optimizer'); ?>')">
                        <?php wp_nonce_field( 'optimizer_reset_nonce', 'reset_themeoptions' ); ?>
                        <input type="submit" name="reset" value="Reset" />
                    </form>
                </div>
            </div>
            <!--EXPORT OPTIONS-->
            <div id="export_options" class="setting_option">
            	<h4><?php _e('Export Options', 'optimizer'); ?></h4>
                <div class="settings_toggle_inner">
                    <p><?php _e('Backup Current Theme Settings. Your Widget settings wont be exported.', 'optimizer'); ?></p>
                    <input type="button" class="button" id="generatexport" value="Export">
                    <textarea id="opt_current_options"></textarea>
                </div>
            </div>
            
            
            <!--IMPORT OPTIONS-->
            <div id="import_options" class="setting_option">  
            	<h4><?php _e('Import Options', 'optimizer'); ?></h4>
                <div class="settings_toggle_inner">
                    <p><?php _e('Import Options from a backup (json) file.', 'optimizer'); ?></p>
                   <form action="" method="post" enctype="multipart/form-data">
                        <p><input type="file" name="file" id="importbutton" /> <input type="submit" name="optimizer_import" id="importoptions" class="button-primary" value="<?php _e('Import', 'optimizer'); ?>" /></p>
                        <?php wp_nonce_field('optimizer_restoreOptions', 'optimizer_restoreOptions'); ?>
                   </form> 
               </div>
            </div>
            
            <!--EXPORT OPTIONS-->
            <div id="tour_options" class="setting_option">
            	<h4><?php _e('Optimizer Tour', 'optimizer'); ?></h4>
                <div class="settings_toggle_inner">
                    <p><?php _e('Take the welcome tour and get acquainted with the theme.', 'optimizer'); ?></p>
                    <input type="button" class="button" id="tour_btn" value="Start Tour">
                </div>
            </div>
            
        </div>
        
	<div id="preset_options">
        <i class="fa fa-times preset_close"></i>
        <h3><?php _e('Presets', 'optimizer'); ?></h3>
        <p><?php _e('With Optimizer PRO you can easily import presets to your site with just one click.', 'optimizer'); ?></p>
        <?php 
			$presets = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27');
			foreach ($presets as $preset) { ?>
            
                <form action="" method="post" enctype="multipart/form-data">
                <div class="preset_p">
                
               <img src="<?php echo get_template_directory_uri(); ?>/assets/images/presets/preset<?php echo $preset;?>.jpg" title="Preset <?php echo $preset;?>" />
                <div class="preset_buttons_wrap">
                	<a href="http://optimizerwp.com/presets/<?php echo $preset;?>/" target="_blank" class="preset_demo"><i class="fa-eye"></i> <?php _e('Demo','optimizer'); ?></a>
                    <a class="import_preset"><i class="fa fa-lock"></i> <?php _e('Import (PRO)', 'optimizer'); ?></a>

                </div>
                </div>
                <?php wp_nonce_field('optimizer_restorePreset'.$preset, 'optimizer_restorePreset'.$preset); ?>
                </form> 
            
            
		<?php } ?>

        </div>
        
		<?php do_action( 'optimizer_preset_promo' ); ?>
                    
            <!--FOOTER LINKS-->
            <div id="footlinks">
            	<a class="optim_presets" title="<?php _e('Presets', 'optimizer'); ?>"><i class="fa fa-star"></i></a>
            	<a class="optim_dashboard"href="<?php echo admin_url(); ?>" title="<?php esc_attr_e('Dashboard', 'optimizer'); ?>"><i class="fa fa-dashboard"></i></a>
                <a class="optim_settings" title="<?php esc_attr_e('Settings', 'optimizer'); ?>"><i class="fa fa-cog"></i></a>
				<a class="optim_expand" title="<?php esc_attr_e('Expand', 'optimizer'); ?>"><i class="fa fa-arrows-h"></i></a>
            </div>
            
            
            <!--Theme Onboarding Tour-->
            <ol id="optimizerTour">
            	<i class="fa fa-times tourclose"></i>
            	<li>
                	<h3><?php _e('Welcome to Optimizer', 'optimizer'); ?> <span><?php _e('Free version', 'optimizer'); ?></span></h3>
                    <p><?php _e('Creating websites with Optimizer is super easy and fun. In next steps, you\'ll see how easy it is to customizer your site and see the changes live without jumping between windows.', 'optimizer'); ?></p>
                	<button class="tournext"><?php _e('Start the Tour', 'optimizer'); ?></button>
                </li>
                
              <li data-id="customize-controls">
             	<h4><?php _e('Customization Area', 'optimizer'); ?></h4>
              	<div class="alignleft">
                    <p><?php _e('The Customization Area is located on the left panel of the screen. Each time you want to add or customize an element, you can do that from here.', 'optimizer'); ?></p>
                    <p><?php _e('You can easily move to different Sections of the Options panel by hovering over the Quick Links Bar located on the very left. You can also use the Optimizer Logo <i class="touroptimlogo"></i> as back button when you are inside a Section.', 'optimizer'); ?></p>
                </div>
                <img class="alignright" src="<?php echo get_template_directory_uri().'/customizer/assets/images/step1.png'; ?>" />
                <div style="clear:both"></div>
              	<button class="tournext"><?php _e('Next', 'optimizer'); ?> <i class="fa fa-chevron-right"></i></button><button class="tourprev"><i class="fa fa-chevron-left"></i> <?php _e('Previous', 'optimizer'); ?></button>
              </li>
              
              <li data-id="tour_innerglow" class="tour_instantprev">
              	<h4><?php _e('Instant Preview', 'optimizer'); ?></h4>
                <div class="alignleft">
              		<p><?php _e('Whenever you make changes to the theme from the Customization Area, you will see the changes live on the right side.', 'optimizer'); ?></p>
                </div>
                <img class="alignright" src="<?php echo get_template_directory_uri().'/customizer/assets/images/step2.png'; ?>" /><div style="clear:both"></div>
              	<button class="tournext"><?php _e('Next', 'optimizer'); ?> <i class="fa fa-chevron-right"></i></button><button class="tourprev"><i class="fa fa-chevron-left"></i> <?php _e('Previous', 'optimizer'); ?></button>
              </li>


              <li data-id="frontsidebar" class="tour_frontpage">
              	<h4><?php _e('Adding Content to Frontpage', 'optimizer'); ?></h4>
                <div class="alignleft">
              	<p><?php _e('Lets look at the different parts of the frontpage and how you can add content to them:', 'optimizer'); ?></p>
                <p><strong><i>A</i> <?php _e('Static Slider', 'optimizer'); ?> :</strong> <?php _e('You can edit the Static Slider from Frontpage > Slider', 'optimizer'); ?></p>
                <p><strong><i>B</i> <?php _e('Frontpage Widgets', 'optimizer'); ?> :</strong> <?php _e('The Main body of the Frontpage is a widget area. You can add widgets to this area from Frontpage > Frontpage Content.', 'optimizer'); ?></p>
                <p><strong><i>C</i> <?php _e('Footer Widgets', 'optimizer'); ?> :</strong> <?php _e('You can easily Add Widgets to this area from Footer > Footer Widgets.', 'optimizer'); ?></p>
                </div>
                <img class="alignright" src="<?php echo get_template_directory_uri().'/customizer/assets/images/step3.png'; ?>" /><div style="clear:both"></div>
              	<button class="tournext"><?php _e('Next', 'optimizer'); ?> <i class="fa fa-chevron-right"></i></button><button class="tourprev"><i class="fa fa-chevron-left"></i> <?php _e('Previous', 'optimizer'); ?></button>           
              </li>
              
              
              <li data-id="customizer_topbar">
              	<h4><?php _e('Preview Navigation Bar', 'optimizer'); ?></h4>
                <div class="alignleft">
              		<p><?php _e('You can quickly navigate to different pages of your site from this top navigation bar. You can hide it anytime by clicking the arrow button beside it.', 'optimizer'); ?></p></div>
                <img class="alignright" src="<?php echo get_template_directory_uri().'/customizer/assets/images/step6.png'; ?>" /><div style="clear:both"></div>
              	<button class="tournext"><?php _e('Next', 'optimizer'); ?> <i class="fa fa-chevron-right"></i></button><button class="tourprev"><i class="fa fa-chevron-left"></i> <?php _e('Previous', 'optimizer'); ?></button>            
             </li>
              
              <li>
              	<h4><?php _e('End of Tour', 'optimizer'); ?></h4>
              	<p><?php _e('That\'s all! We Hope you like the Theme :) ', 'optimizer'); ?></a></p>
                <p><?php _e('You can take this tour anytime from Footer Links > Settings', 'optimizer'); ?></p>
              	<button class="tourend"><?php _e('End Tour', 'optimizer'); ?></button>
              </li>
              
            </ol>
            <div class="tour_backdrop"></div>
            
            <?php do_action( 'optimizer_theme_guides' ); ?>
        
<?php } 

add_action( 'customize_controls_print_footer_scripts', 'optimizer_customizer_stuff', 1 );


/*CUSTOMIZER GOODIES IN THEME FOOTER*/
function optimizer_customizer_footer() {
	?>

<?php if(is_customize_preview()) { ?>
		
        <div id="customizer_topbar">
        	<!--Show/Hide Topbar-->
            <span class="hidetop"><i class="fa fa-arrow-up"></i></span>

        	<!--Customizer Page Navigation-->
            <div id="customizer_nav">
            <label class="current_edit"><?php _e('View', 'optimizer'); ?> 
            	<?php if (is_front_page() ) { ?><a><?php _e('Front Page', 'optimizer'); ?> <i></i></a><?php } ?>
            	<?php if(is_page()){ ?><a><?php echo get_the_title(get_the_ID()); ?> <i></i></a><?php } ?>
                <?php if(is_single()){ ?><a><?php _e('Single Post', 'optimizer'); ?> <i></i></a><?php } ?>
                <?php if(is_category()){ ?><a><?php _e('Category Page', 'optimizer'); ?> <i></i></a><?php } ?>
                <?php if(is_tag()){ ?><a><?php _e('Tag Page', 'optimizer'); ?> <i></i></a><?php } ?>
                <?php if(is_date()){ ?><a><?php _e('Archive Page', 'optimizer'); ?> <i></i></a><?php } ?>
                <?php if(is_author()){ ?><a><?php _e('Author Page', 'optimizer'); ?> <i></i></a><?php } ?>
                <?php if(is_search()){ ?><a><?php _e('Search Page', 'optimizer'); ?> <i></i></a><?php } ?>
                <?php if(is_404()){ ?><a><?php _e('404 Page', 'optimizer'); ?> <i></i></a><?php } ?>
            </label>
                    <ul>
                    	<!--PAGES-->
                    	<li><strong><?php _e('Pages:', 'optimizer'); ?></strong></li>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Front Page', 'optimizer'); ?></a></li>
                        <?php $pageids = get_all_page_ids(); foreach($pageids as $page) {?>
							<?php if(get_post_status($page) =='publish') { ?>
                            	<li><a href="<?php echo esc_url(get_the_permalink($page)); ?>"><?php echo get_the_title($page); ?></a></li>
                            <?php } ?>
                        <?php } ?>
                        <!--POSTS-->
                        <?php $postid =''; $postq= get_posts("post_type=post&numberposts=1&post_status=publish"); $postid =$postq[0]->ID; ?>
                        <?php $catid =''; $categories = get_categories(array('orderby' => 'count','number' => '1')); $catid = isset($categories[0]) ? $categories[0]->term_id : ''; ?>
                        <?php $tagid =''; $tags = get_tags(array('orderby' => 'count','number' => '1')); if(!empty($tagid)){ $tagid = isset($tags[0]) ? $tags[0]->name : '';} ?>
                        <?php $dateid =''; ?>
                        <li><strong><?php _e('Posts:', 'optimizer'); ?></strong></li>
                        <li><a href="<?php echo esc_url(get_permalink($postid)); ?>"><?php _e('Single Post', 'optimizer'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/?cat=')).$catid; ?>"><?php _e('Category Page', 'optimizer'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/?tag=')).$tagid; ?>"><?php _e('Tag Page', 'optimizer'); ?></a></li>
<!--                        <li><a href="<?php echo esc_url(home_url('/?s=the')); ?>"><?php _e('Archive Page', 'optimizer'); ?></a></li>-->
                        <li><a href="<?php echo esc_url(home_url('/?author=1')); ?>"><?php _e('Author Page', 'optimizer'); ?></a></li>
                        <!--MISC-->
                        <li><strong><?php _e('Other:', 'optimizer'); ?></strong></li>
                        <li><a href="<?php echo esc_url(home_url('/?s=the')); ?>"><?php _e('Search Page', 'optimizer'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/nn49721667/')); ?>"><?php _e('404 Page', 'optimizer'); ?></a></li>
                    </ul>
            </div>
        </div>
		<!--CUSTOMIZER LOADER-->
		<div class="customizer_spinner"><div class="loader" title="0">
			  <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
              <path opacity="0.2" fill="#000" d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
                s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
                c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z"/>
              <path fill="#000" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0
                C22.32,8.481,24.301,9.057,26.013,10.047z">
                <animateTransform attributeType="xml"
                  attributeName="transform"
                  type="rotate"
                  from="0 20 20"
                  to="360 20 20"
                  dur="0.5s"
                  repeatCount="indefinite"/>
                </path>
              </svg>
        </div></div>
        <?php /*WIDGET ID TOOLTIP */?>
        <div id="tooltipWindow"><div></div></div>
        
        	<?php /* Add Widget Button for Frontpage*/?>
            <?php if ( is_active_sidebar( 'front_sidebar' ) && is_front_page() ) { ?>
                <div class="customizer_sidebar_holder has_sidebar" data-sidebar-id="front_sidebar">
                    <a class="add_widget_topage" title="<?php esc_attr_e('Add Widgets Here','optimizer'); ?>"><i class="fa fa-plus"></i></a>
                </div>
            <?php } ?>
            
        <?php /* Add Widget Button for Single Pages & Posts*/?>
            <?php if(is_singular()){ ?>
				<?php if(!is_active_sidebar('sidebar')){ $has_sidebar = 'has_no_sidebar';}else{ $has_sidebar = 'has_sidebar';}?>
                    <div class="customizer_sidebar_holder <?php echo $has_sidebar; ?>" data-sidebar-id="sidebar">
                        <a class="add_widget_topage" title="<?php esc_attr_e('Add Widgets Here','optimizer'); ?>"><i class="fa fa-plus"></i></a>
                    </div>
                <?php } ?>
<?php } ?>


<?php }
add_action('wp_footer', 'optimizer_customizer_footer');



/** BACKEND **/

add_action( 'admin_menu', 'optimizer_register_backend' );
function optimizer_register_backend() {
add_theme_page( __('About Optimizer', 'optimizer'), __('About Optimizer', 'optimizer'), 'manage_options', 'about-optimizer.php', 'optimizer_backend');
}

function optimizer_backend(){ ?>
	<div class="backend_wrapper">
    	<div class="back_header">
            <div class="center">
            	<h3><a><?php _e('Optimizer','optimizer'); ?></a><span><?php $the_theme = wp_get_theme(); echo $the_theme->get('Version');?></span></h3>
                <div class="support_btns">
                    <a href="https://wordpress.org/support/theme/optimizer" target="_blank" class="free_support"><?php _e('Free Support','optimizer'); ?><span><?php _e('Only Friday & Saturday','optimizer'); ?></span></a>
                    <a href="http://optimizerwp.com/support/theme/optimizer/" target="_blank" class="pro_support"><?php _e('PRO Support','optimizer'); ?><span><?php _e('24/7 Instant Support','optimizer'); ?></span></a>
                </div>
           </div> 
       </div>
        <div class="blocks_wrap">
        	<div class="center">
                <!--BLOCK 1-->
                <div class="backend_block">
                    <p><?php _e('Customize your website live with our improved customizer, which cuts down the website building time in half.','optimizer'); ?></p>
                    <a href="<?php echo admin_url('/customize.php'); ?>" target="_blank" class="backend_btn"><?php _e('Customize','optimizer'); ?></a>
                </div>
                <!--BLOCK 2-->
                <div class="backend_block">
                    <p><?php _e('Optimizer is extensively documented. You will find useful information about the theme ranging from introductions to advanced features.','optimizer'); ?></p>
                    <a href="http://optimizerwp.com/optimizer-documentation/" target="_blank"  class="backend_btn"><?php _e('Documentation','optimizer'); ?></a>
                </div>
                <!--BLOCK 3-->
                <div class="backend_block">
                    <p><?php _e('Unlock the true power of the Optimizer by upgrading to Pro. Pro has no Frontpage Widgets Limit, 8 Front Page Elements, 60 more powerful options  & 24/7 Support.','optimizer'); ?></p>
                    <a href="http://optimizerwp.com/" target="_blank"  class="backend_btn"><?php _e('Upgrade','optimizer'); ?></a>
                </div> 

                
            </div>
        </div>
        
        
    </div>
    
<?php }





//RESET FUNCTION
add_action( 'init', 'optimizer_reset' );
function optimizer_reset() {
    if(isset($_POST['reset']) && check_admin_referer( 'optimizer_reset_nonce', 'reset_themeoptions' ) ) {
        delete_option('optimizer');
        $redirect = admin_url('/customize.php'); 
		wp_redirect( $redirect);
    }
}	


//IMPORT FUNCTION
add_action( 'init', 'optimizer_backup_import' );
function optimizer_backup_import() {
	if (isset($_POST['optimizer_import']) && check_admin_referer( 'optimizer_restoreOptions', 'optimizer_restoreOptions' ) ) {

		global $wp_filesystem;
		if (empty($wp_filesystem)) {
			require_once (ABSPATH . '/wp-admin/includes/file.php');
			WP_Filesystem();
		}
		$filecontent = trim($wp_filesystem->get_contents($_FILES["file"]["tmp_name"]));
		$string = str_replace("\n","",$filecontent); 
		$options = json_decode($string, true);

		
		update_option('optimizer', $options);
		$redirect = admin_url('/customize.php'); 
		wp_redirect( $redirect);
	}
}	

/*EXPORT FUNCTION*/
add_action('wp_ajax_nopriv_optimizer_get_options', 'optimizer_get_options');
add_action('wp_ajax_optimizer_get_options', 'optimizer_get_options');
function optimizer_get_options() {

			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header('Content-Description: File Transfer');
			header("Pragma: public");
			header("Expires: 0");
			header("Content-Type: text/plain");
			header('Content-Disposition: attachment; filename="theme-options-'.date("dMy").'.json"');
			echo json_encode(get_option('optimizer'));
			die();
}



/**
 * Build the HTTP request URL for Google Fonts.
 *
 * @since  1.0.0.
 *
 * @return string    The URL for including Google Fonts.
 */
function optimizer_google_fonts() {
	global $optimizer;
	if(!empty($optimizer['content_font_id']['font-family'])) { $content_font_id = $optimizer['content_font_id']['font-family']; }else{ $content_font_id = '';}
	if(!empty($optimizer['logo_font_id']['font-family'])) { $logo_font_id = $optimizer['logo_font_id']['font-family']; }else{ $logo_font_id = '';}
	if(!empty($optimizer['ptitle_font_id']['font-family'])) { $ptitle_font_id = $optimizer['ptitle_font_id']['font-family']; }else{ $ptitle_font_id = '';}
	
    // Font options
    $fonts = array(
		$content_font_id,
		$logo_font_id,
		$ptitle_font_id,
    );

    $font_uri = customizer_library_get_google_font_uri( $fonts );

    // Load Google Fonts
    wp_enqueue_style( 'optimizer_google_fonts', $font_uri, array(), null, 'screen' );

}
add_action( 'wp_enqueue_scripts', 'optimizer_google_fonts' );