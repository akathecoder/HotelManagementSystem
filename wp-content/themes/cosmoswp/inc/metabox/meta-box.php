<?php 

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * CosmosWP Custom Meta Boxes
 *
 * @package CosmosWP
 */
if ( ! class_exists( 'CosmosWP_Custom_Meta_Box' ) ) :

	class CosmosWP_Custom_Meta_Box {


		/**
		 * Main Instance
		 *
		 * Insures that only one instance of CosmosWP_Custom_Meta_Box exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @since    1.0.0
		 * @access   public
		 *
		 * @return object
		 */
		public static function instance() {

			// Store the instance locally to avoid private static replication
			static $instance = null;

			// Only run these methods if they haven't been ran previously
			if ( null === $instance ) {
				$instance = new CosmosWP_Custom_Meta_Box;
			}

			// Always return the instance
			return $instance;
		}

		/**
		 *  Run functionality with hooks
		 *
		 * @since    1.0.0
		 * @access   public
		 *
		 * @return void
		 */
		public function run() {

		  if ( is_admin() ) {
	            add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
	            add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		  }
		  /*Post Sidebar*/
	       add_filter( 'cosmoswp_page-sidebar', array( $this, 'meta_sidebar_value' ) );
	       add_filter( 'cosmoswp_post-sidebar', array( $this, 'meta_sidebar_value' ) );

	       add_filter( 'cosmoswp_general_setting_layout_body_class', array( $this, 'general_setting_layout_body_class' ) );
	       add_filter( 'cosmoswp_header_layout_body_class', array( $this, 'header_layout_body_class' ) );
	       add_filter( 'cosmoswp_footer_layout_body_class', array( $this, 'footer_layout_body_class' ));
	       add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_meta_box_script' ));

		}

        /**
         * Enqueue scripts
         * return void
         */
        public function enqueue_meta_box_script() {
            if ( cosmoswp_is_edit_page()) {
                wp_enqueue_style( 'cosmoswp-meta-box-css', COSMOSWP_URL . '/inc/metabox/meta-box.css', array(), '1.0.0' );
            }
        }

		/**
		 *  Call back function for cosmoswp_column_elements
		 *  Change Post/Page builder layout
		 *
		 * @since    1.0.0
		 * @access   public
		 *
		 * @return array
		 */
		public function meta_sidebar_value( $sidebar ){

			$sidebar_layout = get_post_meta(get_the_ID(), 'cosmoswp_sidebar_options', true);
			if (!$sidebar_layout || $sidebar_layout == 'default'){
				return $sidebar;
			}
			return $sidebar_layout;
			
		}

		/**
		 *  Call back function for cosmoswp_general_setting_layout_body_class
		 *  Change Site Layout Manullay(post/page)
		 *
		 * @since    1.0.0
		 * @access   public
		 *
		 * @return array
		 */
		public function general_setting_layout_body_class ($general_setting_layout_body_class){
			if(is_singular( )){
				$option_list    = array('cwp-full-width-body', 'cwp-boxed-width-body','cwp-fluid-width-body');
				$cosmoswp_site_layout_value = get_post_meta(get_the_ID(), 'cosmoswp_site_layout', true);
				
        		if ( in_array( $cosmoswp_site_layout_value, $option_list ) ) {
					return $cosmoswp_site_layout_value;
				}
				return $general_setting_layout_body_class;	
			}
			return $general_setting_layout_body_class;
		}


		/**
		 *  Call back function for cosmoswp_general_setting_layout_body_class
		 *  Change Site Layout Manullay(post/page)
		 *
		 * @since    1.0.0
		 * @access   public
		 *
		 * @return array
		 */
		public function header_layout_body_class($header_layout_body_class){
			if(is_singular( )){
				$option_list    = array('cwp-full-width-header', 'cwp-boxed-width-header','cwp-fluid-width-header');
				$cosmoswp_header_layout_value = get_post_meta(get_the_ID(), 'cosmoswp_header_layout', true);
				
        		if ( in_array( $cosmoswp_header_layout_value, $option_list ) ) {

					return $cosmoswp_header_layout_value;
				}
				return $header_layout_body_class;
			}
			return $header_layout_body_class;
		}		


		/**
		 *  Call back function for cosmoswp_general_setting_layout_body_class
		 *  Change Site Layout Manullay(post/page)
		 *
		 * @since    1.0.0
		 * @access   public
		 *
		 * @return array
		 */
		public function footer_layout_body_class($footer_layout_body_class){
			if(is_singular( )){
				$cosmoswp_footer_layout_value = get_post_meta(get_the_ID(), 'cosmoswp_footer_layout', true);
				$option_list    = array('cwp-full-width-footer', 'cwp-boxed-width-footer','cwp-fluid-width-footer');
				
        		if ( in_array( $cosmoswp_footer_layout_value, $option_list ) ) {
					return $cosmoswp_footer_layout_value;
				}
				return $footer_layout_body_class;
			}
			return $footer_layout_body_class;
		}

	 
	    /**
	     * Meta box initialization.
	     */
	    public function init_metabox() {
	        add_action( 'add_meta_boxes', array( $this, 'add_metabox'  )        );
	        add_action( 'save_post',      array( $this, 'save_metabox' ), 10, 2 );
	    }
	 
	    /**
	     * Adds the meta box.
	     */
	    public function add_metabox() {
	        add_meta_box(
	            'cosmoswp_site_layout',
	            __( 'Layout', 'cosmoswp' ),
	            array( $this, 'render_metabox' ),
	            'post',
	            'side',
	            'low'
	        );
	        add_meta_box(
	            'cosmoswp_site_layout',
	            __( 'Layout', 'cosmoswp' ),
	            array( $this, 'render_metabox' ),
	            'page',
	            'side',
	            'low'
	        );
	    }
	 
	    /**
	     * Renders the meta box.
	     */
	    public function render_metabox( $post ) {

    		$cosmoswp_site_layout_value = get_post_meta($post->ID, 'cosmoswp_site_layout', true);
    		$default_layout = array(
    			"default-layout" =>  esc_html__('Default layout', 'cosmoswp'),
    		);
    		$cosmoswp_site_layout_options = cosmoswp_site_main_general_layout_option();
    		$cosmoswp_site_layout_options = array_merge($default_layout, $cosmoswp_site_layout_options);
			$cosmoswp_site_layout         = 'default-layout';
    		if( !cosmoswp_is_null_or_empty($cosmoswp_site_layout_value) ){
    			$cosmoswp_site_layout = $cosmoswp_site_layout_value;
    		}
			//true ensures you get just one value instead of an array
			wp_nonce_field( basename( __FILE__ ), 'cosmoswp_meta_nonce' );

			//sidebar 
			$sidebar_layout                  = get_post_meta($post->ID, 'cosmoswp_sidebar_options', true);
			$cosmoswp_sidebar_options_options = cosmoswp_sidebar_options();
			$cosmoswp_sidebar_options         = 'default';
    		if( !cosmoswp_is_null_or_empty($sidebar_layout) ){
    			$cosmoswp_sidebar_options = $sidebar_layout;
    		}	

    		//header layout
    		$header_layout                  = get_post_meta($post->ID, 'cosmoswp_header_layout', true);
    		$header_default_layout = array(
    			"default-header" =>  esc_html__('Default layout', 'cosmoswp'),
    		);
			$cosmoswp_header_layout_options = cosmoswp_site_general_layout_option(true);
			$cosmoswp_header_layout_options = array_merge($header_default_layout, $cosmoswp_header_layout_options);
			$cosmoswp_header_layout         = 'default-header';
    		if( !cosmoswp_is_null_or_empty($header_layout) ){
    			$cosmoswp_header_layout     = $header_layout;
    		}
    		    		
    		//Footer layout
    		$footer_layout                  = get_post_meta($post->ID, 'cosmoswp_footer_layout', true);
    		$footer_default_layout 			= array(
    			"default-footer" =>  esc_html__('Default layout', 'cosmoswp'),
    		);
			$cosmoswp_footer_layout_options = cosmoswp_site_footer_layout_option(true);
			$cosmoswp_footer_layout_options = array_merge($footer_default_layout, $cosmoswp_footer_layout_options);
			$cosmoswp_footer_layout         = 'default-footer';
    		if( !cosmoswp_is_null_or_empty($footer_layout) ){
    			$cosmoswp_footer_layout     = $footer_layout;
    		}
    		
    		?>  
    		<div class="cosmowp-custom-meta components-base-control"> 
    			<div class="components-base-control__field">
					<label class="components-base-control__label"><?php echo esc_html__( 'General Site Layout', 'cosmoswp' ); ?></label>
					<select name="cosmoswp_site_layout" id="cosmoswp_site_layout" class="components-select-control__input">
						<?php foreach ( $cosmoswp_site_layout_options as $key => $value) { ?>
							<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, $cosmoswp_site_layout ); ?>><?php echo $value;?></option>
						<?php } // end foreach ?>
					</select>   				

    			</div>
    			<div class="components-base-control__field">
					<label class="components-base-control__label"><?php echo esc_html__( 'Header Layout', 'cosmoswp' ); ?></label>
					<select name="cosmoswp_header_layout" id="cosmoswp_header_layout" class="components-select-control__input">
						<?php foreach ( $cosmoswp_header_layout_options as $key => $value) { ?>
							<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, $cosmoswp_header_layout ); ?>><?php echo $value;?></option>
						<?php } // end foreach ?>
					</select>
    				
    			</div>
    			<div class="components-base-control__field">
					<label class="components-base-control__label"><?php echo esc_html__( 'Footer Layout', 'cosmoswp' ); ?></label>
					<select name="cosmoswp_footer_layout" id="cosmoswp_footer_layout" class="components-select-control__input">
						<?php foreach ( $cosmoswp_footer_layout_options as $key => $value) { ?>
							<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, $cosmoswp_footer_layout ); ?>><?php echo $value;?></option>
						<?php } // end foreach ?>
					</select>  
    				
    			</div>
    			<div class="components-base-control__field">
					<label class="components-base-control__label"><?php echo esc_html__( 'Sidebar', 'cosmoswp' ); ?></label>
					<select name="cosmoswp_sidebar_options" id="cosmoswp_sidebar_options" class="components-select-control__input">
						<?php foreach ( $cosmoswp_sidebar_options_options as $key => $value) { ?>
							<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, $cosmoswp_sidebar_options ); ?>><?php echo $value;?></option>
						<?php } // end foreach ?>
					</select>
    				
    			</div>
    		</div>
    		<?php
	    }
	 
	    /**
	     * Handles saving the meta box.
	     *
	     * @param int     $post_id Post ID.
	     * @param WP_Post $post    Post object.
	     * @return null
	     */
	    public function save_metabox( $post_id, $post ) {

	        /*
	          * A Guide to Writing Secure Themes – Part 4: Securing Post Meta
	          *https://make.wordpress.org/themes/2015/06/09/a-guide-to-writing-secure-themes-part-4-securing-post-meta/
	          * */
	        if (
	            !isset( $_POST[ 'cosmoswp_meta_nonce' ] ) ||
	            !wp_verify_nonce( $_POST[ 'cosmoswp_meta_nonce' ], basename( __FILE__ ) ) || /*Protecting against unwanted requests*/
	            ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || /*Dealing with autosaves*/
	            ! current_user_can( 'edit_post', $post_id )/*Verifying access rights*/
	        ){
	            return;
	        }

			if ('page' == $_POST['post_type']) {
				if (!current_user_can( 'edit_page', $post_id ) )
					return $post_id;
			} elseif (!current_user_can( 'edit_post', $post_id ) ) {
				return $post_id;
			}

			//Execute this saving function
			//site layout 
			if( isset( $_POST['cosmoswp_site_layout'] )){
				$old = get_post_meta( $post_id, 'cosmoswp_site_layout', true );
				$new = esc_attr( $_POST['cosmoswp_site_layout'] );
				if ($new && $new != $old) {
					update_post_meta( $post_id, 'cosmoswp_site_layout', $new );
				} elseif ('' == $new && $old) {
					delete_post_meta( $post_id,'cosmoswp_site_layout', $old );
				}
			}		

			// sidebar layout
			if( isset( $_POST['cosmoswp_sidebar_options'] )){
				$old = get_post_meta( $post_id, 'cosmoswp_sidebar_options', true );
				$new = esc_attr( $_POST['cosmoswp_sidebar_options'] );
				if ($new && $new != $old) {
					update_post_meta( $post_id, 'cosmoswp_sidebar_options', $new );
				} elseif ('' == $new && $old) {
					delete_post_meta( $post_id,'cosmoswp_sidebar_options', $old );
				}
			}			

			// header layout
			if( isset( $_POST['cosmoswp_header_layout'] )){
				$old = get_post_meta( $post_id, 'cosmoswp_header_layout', true );
				$new = esc_attr( $_POST['cosmoswp_header_layout'] );
				if ($new && $new != $old) {
					update_post_meta( $post_id, 'cosmoswp_header_layout', $new );
				} elseif ('' == $new && $old) {
					delete_post_meta( $post_id,'cosmoswp_header_layout', $old );
				}
			}			

			// Footer layout
			if( isset( $_POST['cosmoswp_footer_layout'] )){
				$old = get_post_meta( $post_id, 'cosmoswp_footer_layout', true );
				$new = esc_attr( $_POST['cosmoswp_footer_layout'] );
				if ($new && $new != $old) {
					update_post_meta( $post_id, 'cosmoswp_footer_layout', $new );
				} elseif ('' == $new && $old) {
					delete_post_meta( $post_id,'cosmoswp_footer_layout', $old );
				}
			}
	    }
	}
	 
endif;

/**
 * Create Instance for CosmosWP_Custom_Meta_Box
 *
 * @since    1.0.0
 * @access   public
 *
 * @param
 *
 * @return object
 */
if ( ! function_exists( 'cosmoswp_custom_meta_box' ) ) {

	function cosmoswp_custom_meta_box() {

		return CosmosWP_Custom_Meta_Box::instance();
	}

	cosmoswp_custom_meta_box()->run();
}