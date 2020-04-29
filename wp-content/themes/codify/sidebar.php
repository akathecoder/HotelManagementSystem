<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Codify
 */

$sidebar = apply_filters( 'codify_get_sidebar', 'blog_sidebar' );
if ( is_active_sidebar( $sidebar ) ) : ?>
	<aside id="secondary" <?php codify_sidebar_classes(); ?> >		

		<?php dynamic_sidebar( $sidebar ); ?>
			
	</aside><!-- #secondary -->
<?php endif; ?>