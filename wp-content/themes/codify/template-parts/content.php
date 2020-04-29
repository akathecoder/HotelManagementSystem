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
<?php $archive_order_layout = get_theme_mod( 'archive_order_layout', array( 'title', 'thumbnail', 'categories', 'content', 'meta') );	

		foreach ( $archive_order_layout as $key => $lauout ) :
			switch ($lauout) {
			    case "title":
			    	echo '<header class="entry-header"><h2 class="entry-title"><a href='.esc_url( get_the_permalink() ).'>';
			        	the_title();
		        	echo "</h2></a></header>";
			        break;
			    case "thumbnail":
			       	codify_archive_post_thumbnail();
			        break;    
			    case "categories":
			    	echo '<div class="entry-meta">';
			        	codify_entry_footer();
			        echo "</div>"; 
			        break;
			    case "content":
			    	echo '<div class="entry-content">';
			        	codify_the_excerpt();
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
	?>



</article><!-- #post-<?php the_ID(); ?> -->
