<?php
/**
 * Theme Top Header 
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Codify
 */

// Top Left Header
if ( ! function_exists( 'codify_top_left_header' ) ) :
	/**
	 * Top Left Header
	 * @since 1.0.0
	 */
	function codify_top_left_header() { 		
		$top_header_left = get_theme_mod( 'top_header_left', 'none' );

		switch ( $top_header_left ) {

			case 'text':
				$left_textarea = get_theme_mod( 'left_textarea', '' );
				echo wp_kses_post( $left_textarea );
				break;

			case 'menu':
				$left_menu = get_theme_mod( 'left_menu', 'none' );

				if ( 'none' === $left_menu ) {
					return;
				}

				wp_nav_menu(
					array(
						'menu'      => $left_menu,
						'container' => '',
						'depth'     => 1,
					)
				);
				break;

			case 'social_icon':
				$left_social_media = get_theme_mod( 'left_social_media', array(
					array(
						'social_url'  => '',
					),
				) );	
				if ( ! empty( $left_social_media ) && is_array( $left_social_media ) ) :
				?>
				<div class="social-links">
					<ul>
						<?php					
						foreach ( $left_social_media as $social_icon ) {
							if ( ! empty( $social_icon['social_url'] ) ) :
								?>

								<li class="social-link">
									<a href="<?php echo esc_url( $social_icon['social_url'] ); ?>"></a>
								</li>

							<?php
							endif;
						}
						?>
					</ul>	
				</div>				
				<?php endif;		
				break;

			default:
				return;

		}		

	?>		
	<?php }
endif;
add_action( 'codify_action_left_header', 'codify_top_left_header', 10 );

// Top Right Header
if ( ! function_exists( 'codify_top_right_header' ) ) :
	/**
	 * Top Left Header
	 * @since 1.0.0
	 */
	function codify_top_right_header() { 
		$top_header_right = get_theme_mod( 'top_header_right', 'none' );

		switch ( $top_header_right ) {

			case 'text':
				$right_textarea = get_theme_mod( 'right_textarea', '' );
				echo wp_kses_post( $right_textarea );
				break;

			case 'menu':
				$right_menu = get_theme_mod( 'right_menu', 'none' );

				if ( 'none' === $right_menu ) {
					return;
				}

				wp_nav_menu(
					array(
						'menu'      => $right_menu,
						'menu_id'   => 'header-top-left-menu',
						'container' => '',
						'depth'     => 1,
					)
				);
				break;

			case 'social_icon':
				$right_social_media = get_theme_mod( 'right_social_media', array(
					array(
						'social_url'  => '',
					),
				) );	
				if ( ! empty( $right_social_media ) && is_array( $right_social_media ) ) :
				?>
				<div class="social-links">
					<ul>
						<?php					
						foreach ( $right_social_media as $social_icon ) {
							if ( ! empty( $social_icon['social_url'] ) ) :
								?>

								<li class="social-link">
									<a href="<?php echo esc_url( $social_icon['social_url'] ); ?>"></a>
								</li>

							<?php
							endif;
						}
						?>
					</ul>
				</div>					
				<?php endif;		
				break;

			default:
				return;

		}			
	?>		
	<?php }
endif;
add_action( 'codify_action_right_header', 'codify_top_right_header', 10 );
?>
<div class="top-header">
	<div class="container">
		<div class="top-header-left">
			<?php 
			/**
			 * Hook - codify_action_left_header
			 *
			 * @hooked codify_top_left_header - 10
			 */
			do_action( 'codify_action_left_header' );
			?>
		</div>
		<div class="top-header-right right">
			<?php 
			/**
			 * Hook - codify_action_right_header
			 *
			 * @hooked codify_top_right_header - 10
			 */
			do_action( 'codify_action_right_header' );
			?>
		</div>
	</div>
</div>	