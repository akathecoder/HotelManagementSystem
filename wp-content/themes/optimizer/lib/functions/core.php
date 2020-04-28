<?php
 /**
 * The CORE functions for OPTIMIZER
 *
 * Stores all the core functions of the template.
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
 
//ADD BODY CLASSES
function optimizer_body_class( $classes ) {
	global $optimizer;
	// add classes to the $classes array
		$classes[] = ''.$optimizer['site_layout_id'].'';
	if(!empty($optimizer['head_transparent'])){
		$classes[] = 'has_trans_header';
	}
	if('site_boxed' == $optimizer['site_layout_id']){
		$classes[] = 'is_boxed';
	}
	if(is_rtl()){
		$classes[] = 'layer_rtl';
	}
	if ( !is_front_page() ) {
		$classes[] = 'not_frontpage';
	}
	if ( is_customize_preview() ) {
		$classes[] = 'customizer-prev';
   }

   if(!empty($optimizer['disable_slider_parallax'])){
		$classes[] = 'disable_slider_parallax';
	}
   
	return $classes;
}
add_filter( 'body_class', 'optimizer_body_class' );

	
//SIDEBAR
function optimizer_widgets_init(){

	$editbutton = (is_customize_preview() ? '<a class="edit_widget" title="Edit Widget - #%1$s"><i class="fa fa-pencil"></i></a>' : '');
	register_sidebar(array(
	'name'          => __('Right Sidebar', 'optimizer'),
	'id'            => 'sidebar',
	'description'   => __('When you assign widgets to this area, it will be displayed on the right side of all pages and posts', 'optimizer'),
	'before_widget' => '<div id="%1$s" class="widget %2$s" data-widget-id="%1$s"><div class="widget_wrap">'.$editbutton,
	'after_widget'  => '<span class="widget_corner"></span></div></div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>'
	));
		
	register_sidebar(array(
	'name'          => __('Footer Widgets', 'optimizer'),
	'id'            => 'foot_sidebar',
	'description'   => __('This Widget Area is displayed in the footer section of your site.', 'optimizer'),
	'before_widget' => '<li id="%1$s" class="widget %2$s" data-widget-id="%1$s"><div class="widget_wrap">'.$editbutton,
	'after_widget'  => '</li>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>'
	));
	
	register_sidebar(array(
	'name'          => __('Frontpage Widgets', 'optimizer'),
	'id'            => 'front_sidebar',
	'description'   => __('With Optmizer Free you can only add 6 widgets to this Area. Upgrade to PRO to add unlimited Widgets.', 'optimizer'),
	'before_widget' => '<div id="%1$s" class="widget %2$s" data-widget-id="%1$s"><div class="widget_wrap">'.$editbutton,
	'after_widget'  => '</div></div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>'
	));
	
}

add_action( 'widgets_init', 'optimizer_widgets_init' );


//Default Placeholder Image
if(!function_exists( 'optimizer_placeholder_image' ) ){
	function optimizer_placeholder_image(){
		return ''. get_template_directory_uri().'/assets/images/blank_img.png';
	}
}
//Assign Thumbnail to post if it has gallery
function optimizer_gallery_thumb(){
 	global $post;
 	// Make sure the post has a gallery in it
 	if( has_shortcode( $post->post_content, 'gallery' ) ){

		$gallery = get_post_gallery( get_the_ID(), false );
		$ids = explode( ",", $gallery['ids'] );
	
		foreach( $ids as $id ) {
		   $imgurl   = wp_get_attachment_image_src( $id, array(400,270) );
		} 
	
		$first_thumb = $imgurl[0];
		return $first_thumb;
	}
 }

// force the link='file' gallery shortcode attribute:
add_filter('shortcode_atts_gallery','optimizer_overwrite_gallery_atts',10,3);
function optimizer_overwrite_gallery_atts($out, $pairs, $atts){
	global $optimizer;
	if(!empty($optimizer['post_gallery_id']))
    $out['link']='file'; 
    return $out;
}


//Display Read More Button in Layout4
function optimizer_excerpt_more($more) {
	return '<br><a class="moretag" href="'. esc_url(get_permalink()) . '">'.__('+ Read More', 'optimizer').'</a>';
}
add_filter('excerpt_more', 'optimizer_excerpt_more');


//Alter the Read More Link
add_filter( 'the_content_more_link', 'optimizer_more_link', 10, 2 );

function optimizer_more_link( $more_link, $more_link_text ) {
	return str_replace( $more_link_text, __('+ Read More', 'optimizer'), $more_link );
}

//optimizer CUSTOM Search Form
function optimizer_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" action="' . esc_url(home_url( '/' )) . '" >
    <div>
    <input placeholder="' . esc_attr__( 'Search &hellip;', 'optimizer' ) . '" type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'optimizer' ) .'" />
    </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'optimizer_search_form' );


//**************Toptimizer COMMENTS******************//
function optimizer_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

     <div id="comment-<?php comment_ID(); ?>" class="comment-body">
     <div class="comm_edit"><?php edit_comment_link(__('Edit', 'optimizer'),'','') ?></div>
      
      
      <div class="comment-author vcard">
            <div class="avatar"><?php echo get_avatar($comment,$size='30' ); ?></div>
            <div class="comm_auth"><?php printf('%s', get_comment_author_link()) ?></div>
            <a class="comm_date"><i class="fa-clock-o"></i><?php echo human_time_diff( get_comment_time('U'), current_time('timestamp') ) . __(' ago', 'optimizer'); ?></a>
            
            <div class="comm_reply">
              <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'before' =>'<i class="fa-reply"></i> '))) ?>
            </div>
        
      </div>
      
      
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.', 'optimizer') ?></em>
         <br />
      <?php endif; ?>

      <div class="org_comment"><?php comment_text() ?></div>
     
     </div>
<?php
        }
		
//**************TRACKBACKS & PINGS******************//
function optimizer_ping($comment, $args, $depth) {
 
$GLOBALS['comment'] = $comment; ?>
	
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   
     <div id="comment-<?php comment_ID(); ?>" class="comment-body">
           <?php edit_comment_link(__('Edit', 'optimizer'),'  ','') ?>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.', 'optimizer') ?></em>
         <br />
      <?php endif; ?>

      <div class="org_ping">
      	<?php printf(__('<cite class="citeping">%s</cite> <span class="says">:</span>', 'optimizer'), get_comment_author_link()) ?>
	  	<?php comment_text() ?>
            <div class="comm_meta_reply">
            <div class="comm_date"><i class="fa-clock-o"></i><?php echo human_time_diff( get_comment_time('U'), current_time('timestamp') ) . ' ago'; ?></div>
            </div>
     </div>
     </div>
     

<?php }


//COMMENT FORM DEFAULT FIELDS
function optimizer_comment_form_fields($fields){
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
    global $optimizer;
	
	$fields['author'] = '<div class="comm_wrap"><p class="comment-form-author"><input placeholder="' . __( 'Name', 'optimizer' ) . '" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'" size="30"' . $aria_req . ' /></p>';

	$fields['email'] = '<p class="comment-form-email"><input placeholder="' . __( 'Email', 'optimizer' ) . '" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" size="30"' . $aria_req . ' /></p>';

	$fields['url'] = '<p class="comment-form-url"><input placeholder="' . __( 'Website', 'optimizer' ) . '" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .'" size="30" /></p></div>';
    return $fields;
}

add_filter('comment_form_default_fields','optimizer_comment_form_fields');