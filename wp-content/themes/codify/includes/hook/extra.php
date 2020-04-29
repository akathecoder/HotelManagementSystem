<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Codify
 */

if ( ! function_exists( 'codify_top_header' ) ) :
	/**
	 * Top Header
	 * @since 1.0.0
	 */
	function codify_top_header() { 
		$show_top_header = get_theme_mod( 'show_top_header', false );
		if ( false == $show_top_header ){
			return;
		}
		get_template_part( 'template-parts/header/top','header'  );
	?>	

	<?php }
endif;
add_action( 'codify_action_header', 'codify_top_header', 10 );

if ( ! function_exists( 'codify_main_header' ) ) :
	/**
	 * Main Header Header
	 * @since 1.0.0
	 */
	function codify_main_header() { 


		$main_header_style = get_theme_mod( 'main_header_style', 'style1' );

		get_template_part( 'template-parts/header/header',esc_attr( $main_header_style ) ); 

		/**
		* Hook - codify_action_header_search
		*
		* @hooked codify_header_search - 10
		*/
		do_action( 'codify_action_header_search' );  

	}

endif;
add_action( 'codify_action_header', 'codify_main_header', 20 );

if ( ! function_exists( 'codify_breadcrumb_trail' ) ) :
	/**
	 * Breadcrumb Trail
 	 *
	 * @since 1.0.0
	 */
function codify_breadcrumb_trail() {	
	$show_breadcrumbs = get_theme_mod( 'show_breadcrumbs', true );
	$breadcrumbs_show_on_front 	= get_theme_mod( 'breadcrumbs_show_on_front', false );
	if( false == $show_breadcrumbs ){
		return;
	}
	if ( false == $breadcrumbs_show_on_front ) {
	    // Bail if Home Page.
	    if ( is_front_page() || is_home() ) {
	        return;
	    }	
    }
    echo '<div class="breadcrumbs-wrapper"><div class="container">';
    if ( ! function_exists( 'breadcrumb_trail' ) ) {
		/**
		 * Breadcrumbs.
		 */
		require  CODIFY_INC_DIR . '/breadcrumbs.php';
    }

    $breadcrumb_args = array(
        'container'   => 'div',
        'show_browse' => false,       
    ); 

    breadcrumb_trail( $breadcrumb_args );

    echo '</div></div>';

}
endif;
add_action( 'codify_action_header', 'codify_breadcrumb_trail', 30 );




// Main Site Branding
if ( !function_exists( 'codify_site_branding' ) ):
	/**
	 * Site Branding
	 * @since 1.0.0
	 */
	function codify_site_branding() {
	?>
		<div class="site-branding" itemscope="itemscope" itemtype="<?php echo esc_url( 'https://schema.org/Organization' );?>">
			<?php if ( has_custom_logo() ){
				the_custom_logo();
			}
			
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$codify_description = get_bloginfo( 'description', 'display' );
			if ( $codify_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $codify_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
	<?php }
endif;
add_action( 'codify_action_site_branding', 'codify_site_branding', 10 );

// Main Nav Menu
if ( !function_exists( 'codify_site_navigation' ) ):
	/**
	 * Site Navigation
	 * @since 1.0.0
	 */
	function codify_site_navigation(){
		$show_nav = get_theme_mod( 'show_nav', true );
		$nav_align = get_theme_mod( 'nav_align', 'right' );
		if ( false == $show_nav ){
			return;
		}
	?>
	<div class="menu-holder">
		<nav id="site-navigation" class="main-navigation nav-align-<?php echo esc_attr( $nav_align);?>">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</div>	
	<?php }
endif;
add_action( 'codify_action_site_navigation', 'codify_site_navigation', 10 );


// Header Button
if ( !function_exists( 'codify_header_button' ) ):
	/**
	 * Header Button
	 * @since 1.0.0
	 */
	function codify_header_button(){
		$show_button = get_theme_mod( 'show_button', true );
		$header_button_link = get_theme_mod( 'header_button_link', true );
		$header_button_text = get_theme_mod( 'header_button_text', esc_html__( 'Contact Us', 'codify' ) );
		$show_search = get_theme_mod( 'show_search', true );
		$show_cart = get_theme_mod( 'show_cart', false );
		if ( false == $show_button && false == $show_cart && false == $show_search  ){
			return;
		}
	?>
	<div class="header-right-wrap right">
		<?php if ( true == $show_button && !empty( $header_button_text) ): ?>
			<div>
				<a class="enquiry-btn" href="<?php echo esc_url( $header_button_link );?>"><?php echo esc_html( $header_button_text )?></a>
			</div>	
		<?php endif; ?>
		
		<?php if ( codify_woocommerce_active() ):
			if ( true == $show_cart ): ?>
				<div class="site-cart-views">
					<a href="JavaScript:void(0);"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
					<span class="cart-quantity"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
					<div class="widget widget_shopping_cart">	
						<div class="mini_cart_inner">					
						<?php the_widget( 'WC_Widget_Cart', '' ); ?>
						</div>						
					</div>
				</div>
			<?php endif; 
		endif; ?>

		<?php if ( true == $show_search ): ?>
			<div class="search-wrapper">
				<a href="JavaScript:void(0);">
					<i class="fa fa-search" aria-hidden="true"></i>
				</a>
			</div>	
		<?php endif; ?>
	</div>	

	<?php }
endif;
add_action( 'codify_action_header_button', 'codify_header_button', 10 );

if ( ! function_exists( 'codify_footer' ) ) :
	/**
	 * Footer
	 * @since 1.0.0
	 */
	function codify_footer() { 		
		get_template_part( 'template-parts/footer/footer','style1'  );
	?>	

	<?php }
endif;
add_action( 'codify_action_footer', 'codify_footer', 10 );

if ( ! function_exists( 'codify_footer_widget' ) ) :
	/**
	 * Footer Widget 
	 * @since 1.0.0
	 */
	function codify_footer_widget() {
		$show_footer_widget 	= get_theme_mod( 'show_footer_widget', false );
		$number_footer_widget 	= get_theme_mod( 'number_footer_widget', '4' );
		if ( false == $show_footer_widget ){
			return;
		}
		if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
			<div class="top-footer">
				<div class="container">
					<div class="row">
						<?php
						$class_coloumn =12;					
						$class_coloumn = 12/absint( $number_footer_widget ); ?>

						<?php $column_class = 'custom-col-' . absint( $class_coloumn );
						for ( $i = 1; $i <= absint( $number_footer_widget ) ; $i++ ) {
							if ( is_active_sidebar( 'footer-' . absint($i ) ) ) { ?>
							<div class="<?php echo esc_attr( $column_class ); ?>">
								<?php dynamic_sidebar( 'footer-' . absint($i)); ?>
							</div>
							<?php }
						} ?>
					</div>
				</div>
			</div>

		<?php endif;
	}
endif;
add_action( 'codify_action_footer_widget', 'codify_footer_widget');

if ( ! function_exists( 'codify_footer_info' ) ) :
	/**
	 * Footer Credit 
	 * @since 1.0.0
	 */
	function codify_footer_info() {	?>					
		<?php 	// Powered by content.
		$powered_by_text = sprintf( esc_html__( 'Theme of %s', 'codify' ), '<a target="_blank" rel="designer" href="https://96themes.com/">96 THEME.</a>' );	
		?>
		<span class="copy-right"><?php echo wp_kses_post($powered_by_text);?></span>		
		
		<?php
	}
endif;
add_action( 'codify_action_footer_info', 'codify_footer_info');

if ( ! function_exists( 'codify_footer_right_side' ) ) :
	/**
	 * Footer Right Side  
	 * @since 1.0.0
	 */
	function codify_footer_right_side() {	

		$footer_right_content = get_theme_mod( 'footer_right_content', 'none' );

		switch ( $footer_right_content ) {

			

			case 'text':
				$footer_textarea = get_theme_mod( 'footer_textarea', '' );
				echo wp_kses_post( $footer_textarea );
				break;

			case 'menu':
				$footer_menu = get_theme_mod( 'footer_menu', 'none' );

				if ( 'none' === $footer_menu ) {
					return;
				}

				wp_nav_menu(
					array(
						'menu'      => $footer_menu,
						'menu_id'   => 'footer-right-menu',
						'container' => '',
						'depth'     => 1,
					)
				);
				break;

			case 'social_icon':
				$footer_social_media = get_theme_mod( 'footer_social_media', array(
					array(
						'social_url'  => '',
					),
				) );	
				if ( ! empty( $footer_social_media ) && is_array( $footer_social_media ) ) :
				?>
				<div class="social-links">
					<ul>
						<?php					
						foreach ( $footer_social_media as $social_icon ) {
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
	}
endif;
add_action( 'codify_action_footer_right_side', 'codify_footer_right_side');


// Scroll To Top
if ( !function_exists( 'codify_backToTop' ) ):
	/**
	 * Back To Top
	 * @since 1.0.0
	 */
	function codify_backToTop(){
		$show_scroll_top = get_theme_mod( 'show_scroll_top', false );
		if ( false == $show_scroll_top ){
			return;
		} 
		$footer_scroll_top_icon = get_theme_mod( 'scroll_to_top_icon', 'fa fa-angle-up' );
	?>
	<div class="back-to-top">
        <a href="#masthead" title="<?php echo esc_attr__('Go to Top', 'codify') ?>" class="<?php echo esc_attr( $footer_scroll_top_icon);?>"></a>       
    </div>
	<?php }
endif;
add_action( 'codify_action_backToTop', 'codify_backToTop', 10 );

// Header Search
if ( !function_exists( 'codify_header_search' ) ):
	/**
	 * Back To Top
	 * @since 1.0.0
	 */
	function codify_header_search(){
		$header_search_placeholder = get_theme_mod( 'header_search_placeholder', esc_html__( 'Search', 'codify' ) );
		$header_search_text = get_theme_mod( 'header_search_text', esc_html__( 'Type to Search', 'codify' ) );
	?>
	<div class="search-section">
		<div class="search-container">
			<form method="get" class="search-header" id="search-header" action="<?php echo esc_url( home_url( '/' ) ); ?>"> 
					<input type="text" class="field" name="s" id="s" placeholder="<?php echo esc_attr( $header_search_placeholder ); ?>" value="<?php the_search_query(); ?>" autocomplete="off">
					<div class="search-divider"></div>
					<h5 classs="text-filed"><?php echo esc_html( $header_search_text );?></h5>
			</form>	
				<a class="close-icon" href="JavaScript:void(0);">
					<span><?php echo esc_html__('x', 'codify');?></span>
				</a>
		</div>
	</div>	
	<?php }
endif;
add_action( 'codify_action_header_search', 'codify_header_search', 10 );

/**
 * Display Blog Post Excerpt
 */
if ( ! function_exists( 'codify_the_excerpt' ) ) {

	/**
	 * Display Blog Post Excerpt
	 *
	 * @since 1.0.0
	 */
	function codify_the_excerpt() {

		$excerpt_type = get_theme_mod( 'archive_post_content', 'excerpt' );


		if ( 'full-content' == $excerpt_type ) {
			the_content();
		} else {
			the_excerpt();
		}

	}
}
/**
 * Display Read More on Excerpt
 */
if ( ! function_exists( 'codify_excerpt_readmore' ) ) {

	/**
	 * Display Blog Post Excerpt
	 *
	 * @since 1.0.0
	 */
	function codify_excerpt_readmore( $output ) {

		$excerpt_readmore = get_theme_mod( 'excerpt_readmore', esc_html__( 'Read More', 'codify') );

		$read_more = sprintf(
			esc_html( '%s' ),
			'<a class="btn-excerpt read-more" href="' . esc_url( get_permalink() ) . '"> ' . the_title( '<span class="screen-reader-text">', '</span>', false ) . ' ' . $excerpt_readmore . '</a>'
		);
		$read_more  = '<div class="btn-wrapper"> ' . $read_more . '</div>';
		if ( !empty( $excerpt_readmore ) ){
			return $output . $read_more;
		} else{
			return $output;
		}
		
	}
}
add_filter( 'the_excerpt', 'codify_excerpt_readmore');
