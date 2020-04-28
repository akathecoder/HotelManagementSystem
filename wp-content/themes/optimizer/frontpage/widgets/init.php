<?php


//Load the frontpage widgets
require(get_template_directory() . '/frontpage/widgets/front-about.php');
require(get_template_directory() . '/frontpage/widgets/front-blocks.php');
require(get_template_directory() . '/frontpage/widgets/front-text.php');
require(get_template_directory() . '/frontpage/widgets/front-posts.php');


//Frontpage widget area assign function. This function assign Optimizer frontpage widgets on frontpage widget area on theme activation.
function optimizer_assign_widgets() {
	$optimizer = get_option('optimizer');
	$active_widgets = get_option( 'sidebars_widgets' );

if(isset($_POST['assign_widgets']) && check_admin_referer( 'optimizer_assign_widgets', 'optimizer_assign_widgets' ) ) {
if(empty($active_widgets['front_sidebar']) && empty($optimizer)){
	
				//ABOUT SECTION--------------------------------------------
				$active_widgets[ 'front_sidebar' ][] = 'optimizer_front_about-1';

				$about_content[ 1 ] = array (
						'title' => __('THE OPTIMIZER','optimizer'),
						'subtitle' => __('a little about..','optimizer'),
						'content' => __('Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.','optimizer'),
						'divider' => 'fa-stop',
						'title_color' => '#222222',
						'content_color' => '#a8b4bf',
						'content_bg' => '#ffffff',
				);
				update_option( 'widget_optimizer_front_about', $about_content );
    
	

				//BLOCKS SECTION--------------------------------------------
				$active_widgets[ 'front_sidebar' ][] = 'optimizer_front_blocks-1';

				$blocks_content[ 1 ] = array (
						'block1title' => __('Lorem Ipsum', 'optimizer'),
						'block1img' => '',
						'block1content' =>  __('Lorem ipsum dolor sit amet, consectetur dol adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibe.', 'optimizer'),
						'block2title' => __('Lorem Ipsum', 'optimizer'),
						'block2img' => '',
						'block2content' =>  __('Lorem ipsum dolor sit amet, consectetur dol adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibe.', 'optimizer'),
						'block3title' => __('Lorem Ipsum', 'optimizer'),
						'block3img' => '',
						'block3content' =>  __('Lorem ipsum dolor sit amet, consectetur dol adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibe.', 'optimizer'),
						'block4title' => '',
						'block4img' => '',
						'block4content' => '',
						'block5title' => '',
						'block5img' => '',
						'block5content' => '',
						'block6title' => '',
						'block6img' => '',
						'block6content' => '',
						
						'blockstitlecolor' => '#555555',
						'blockstxtcolor' => '#999999',
						'blocksbgcolor' => '#f5f5f5',
				);
				update_option( 'widget_optimizer_front_blocks', $blocks_content );




				//WELCOME TEXT SECTION--------------------------------------------
				$active_widgets[ 'front_sidebar' ][] = 'optimizer_front_text-1';

				$text_content[ 1 ] = array (
						'title' => __('This Title wont be shown','optimizer'),
						'content' => __('Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.','optimizer'),
						'padtopbottom' => '2',
						'paddingside' => '2',
						'parallax' => '',
						'content_color' => '#ffffff;',
						'content_bg' => '#333333;',
						'content_bgimg' => '',
				);
				update_option( 'widget_optimizer_front_text', $text_content );	



				//POSTS SECTION--------------------------------------------
				$active_widgets[ 'front_sidebar' ][] = 'optimizer_front_posts-1';

				$posts_content[ 1 ] = array (
						'title' => __('Our Work','optimizer'),
						'subtitle' => __('Checkout Our Work','optimizer'),
						'layout' => '1',
						'type' => 'post',
						'pages' => '',
						'count' => '6',
						'category' => '',
						'divider' => 'fa-stop',
						'navigation' => 'numbered',
						'postbgcolor' => '',
						'titlecolor' => '#333333',
						'secbgcolor' => '#ffffff',
				);
				update_option( 'widget_optimizer_front_posts', $posts_content );	



	//Update the empty frontpage sidebar with widgets
	update_option( 'sidebars_widgets', $active_widgets );
    $redirect = admin_url('/customize.php'); 
	wp_redirect( $redirect);
	}

}
}
add_action( 'init', 'optimizer_assign_widgets' );