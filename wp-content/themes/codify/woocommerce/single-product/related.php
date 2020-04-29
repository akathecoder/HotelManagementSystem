<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) :

	?>

	<section class="related products">

		<h2><?php esc_html_e( 'Related products', 'codify' ); ?></h2>

		<?php woocommerce_product_loop_start(); ?>
			
			<?php 
			$product_ids = array();
			foreach ( $related_products as $related_product ) : ?>

				<?php
				array_push( $product_ids, $related_product->get_id() );
				?>

			<?php endforeach; ?>

			<?php

			$args = array(
				'post_type' => 'product',
				'posts_per_page' => 4,
				'post__in' => $product_ids,
			);

			$query = new WP_Query( $args );

			if( $query->have_posts() ):

				while( $query->have_posts() ):
					$query->the_post();
					get_template_part( 'woocommerce/content', 'product-releated' )  ;
				endwhile;
				wp_reset_postdata();
			endif;
			?>

		<?php woocommerce_product_loop_end(); ?>

	</section>

<?php endif;

wp_reset_postdata();
