<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Codify
 */

?>

<article itemtype="<?php echo esc_url( 'https://schema.org/CreativeWork' ); ?>" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $single_order_layout = get_theme_mod( 'single_order_layout', array( 'title', 'thumbnail', 'categories', 'content', 'meta') );
	foreach ( $single_order_layout as $key => $lauout ) :
		switch ($lauout) {
		    case "title":
		        do_action( 'codify_action_single_title' );
		        break;
		    case "thumbnail":
		        do_action( 'codify_action_post_thumbnail' );
		        break;    
		    case "categories":
		    	echo '<div class="entry-meta">';
		        	codify_entry_footer();
		        echo "</div>"; 
		        break;
		    case "content":
		    	echo '<div class="entry-content">';
		        	the_content();
		        echo "</div>";
		        break;
		    case 'meta':
		    	echo '<div class="entry-meta">';
		        	codify_posted_on();
		        	codify_posted_by();
		        echo "</div>"; 
		        break;
		    	break;
	    	default:
		       return;
		}
	endforeach; 
	// Show author box if enabled.
	if ( true === get_theme_mod( 'show_author_box', false ) ) {
		get_template_part( 'template-parts/content', 'author-box' );
	}
	?>
</article><!-- #post-<?php the_ID(); ?> -->