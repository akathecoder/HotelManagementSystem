<?php
/**
 * Sidebar 
 *
 * @package Codify
 */

/**
 * Sidebar Bar Function
 */
if ( ! class_exists( 'Codify_Sidebar' ) ) :

	/**
	 * Sidebar
	 *
	 * @since 1.0.0
	 */
	class Codify_Sidebar {

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {

			// Register sidebar
			add_action( 'widgets_init', array( $this, 'register_sidebar' ) );

			// Replace Sidebars.
			add_filter( 'codify_get_sidebar', array( $this, 'codify_sidebar' ) );

			// Add Sidebar Classs
			add_filter( 'body_class', array( $this,'sidebar_classes') );


		}
		/**
		 * Register widget area.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
		 */
		public static function register_sidebar() {
			register_sidebar( array(
				'name'          => esc_html__( 'Blog Sidebar', 'codify' ),
				'id'            => 'blog_sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'codify' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title"><span>',
				'after_title'   => '</span></h2>',
			) );
			register_sidebar( array(
				'name'          => esc_html__( 'Page Sidebar', 'codify' ),
				'id'            => 'page_sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'codify' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title"><span>',
				'after_title'   => '</span></h2>',
			) );
			register_sidebar( array(
				'name'          => esc_html__( 'Post Sidebar', 'codify' ),
				'id'            => 'post_sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'codify' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title"><span>',
				'after_title'   => '</span></h2>',
			) );	
			register_sidebar( array(
				'name'          => esc_html__( 'Search Sidebar', 'codify' ),
				'id'            => 'search_sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'codify' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title"><span>',
				'after_title'   => '</span></h2>',
			) );									
			$show_footer_widget = get_theme_mod( 'show_footer_widget', false );
			if ( true == $show_footer_widget ):
				for ($i=1; $i < 5 ; $i++) { 
					register_sidebar( array(
						'name'          => sprintf( esc_html__( 'Footer %d', 'codify' ), absint( $i ) ),
						'id'            => 'footer-'.absint( $i ),
						'before_widget' => '<aside id="%1$s" class="widget %2$s">',
						'after_widget'  => '</aside>',
						'before_title'  => '<h2 class="widget-title"><span>',
						'after_title'   => '</span></h2>',
					) );

				}
			endif;		
		
		}	

		/**
		 * Display sidebar.
		 *
		 * @since 1.0.0
		 */
		public static function codify_sidebar( $sidebar ) {	     
			$sidebar_layout = codify_sidebar_current_layout();  
	        if ( 'no_sidebar' == $sidebar_layout ) {
	        	return;
	        }
	        if ( codify_woocommerce_active() && is_woocommerce() ){				
				$sidebar = 'woo_sidebar';			
			} elseif( is_search() ){
				$sidebar = 'search_sidebar';
			} elseif ( is_singular( 'page' ) ) {
				$sidebar = 'page_sidebar';
			}elseif( is_singular( 'page' ) ){
				$sidebar = 'post_sidebar';
			} else{
				$sidebar = 'blog_sidebar';
			}
			return $sidebar;

		}

		/**
		 * Adds sidebar classes to the array of body classes.
		 */
		public function sidebar_classes( $classes ) {

			$sidebar =  apply_filters( 'codify_get_sidebar', 'codify_sidebar' );	
			// Adds a class of no-sidebar when there is no sidebar present.
			if ( ! is_active_sidebar( $sidebar ) ) {
				$sidebar_layout = 'no_sidebar';
			} else{
		        $sidebar_layout = codify_sidebar_current_layout();  		        
			}


			$classes[] = 'global_layout-' . esc_attr( $sidebar_layout );			

			return $classes;
		}					

	}

endif;
Codify_Sidebar::get_instance();	
