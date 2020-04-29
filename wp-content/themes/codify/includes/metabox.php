<?php
/**
 * Base meta box class.
 *
 * @package Codify
 */
if ( ! class_exists( 'Codify_Meta_Box' ) ) {
	/**
	 * Class Codify_Meta_Box
	 */
	class Codify_Meta_Box {
		/**
		 * Instance
		 *
		 * @var $instance
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}		

		/**
		 * Hook into the appropriate actions when the class is constructed.
		 */
		public function __construct() {

			if ( is_admin() ) {
				add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
				add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
			}

		}

		/**
		 * Adds the meta box container.
		 */
		public function init_metabox() {

			add_action( 'add_meta_boxes', array( $this, 'add_metabox'  )        );
			add_action( 'save_post',      array( $this, 'save_metabox' ), 10, 2 );

		}

		public function add_metabox() {
			// Get all public posts.
			$post_types = get_post_types(
				array(
					'public' => true,
				)
			);
			$post_types['fl-theme-layout'] = 'fl-theme-layout';

			// Enable for all posts.
			foreach ( $post_types as $type ) {
				if ( 'attachment' !== $type ) {
					add_meta_box(
						'codify_theme_setting',
						esc_html__( 'Theme Setting', 'codify' ),
						array( $this, 'render_metabox' ),
						$type,
						'side',
						'default'
					);
				}
			}

		}

	public function render_metabox( $post ) {

		$meta = get_post_meta( $post->ID );
		$sidebar_options = ( isset( $meta['sidebar_options'][0] ) && '' !== $meta['sidebar_options'][0] ) ? $meta['sidebar_options'][0] : 'customizer_setting';		
		$enable_title = ( isset( $meta['enable_title'][0] ) &&  'no' === $meta['enable_title'][0] ) ? 'no' : 'yes';
		$enable_comment = ( isset( $meta['enable_comment'][0] ) &&  'no' === $meta['enable_comment'][0] ) ? 'no' : 'yes';
		$enable_feature_image = ( isset( $meta['enable_feature_image'][0] ) &&  'no' === $meta['enable_feature_image'][0] ) ? 'no' : 'yes';
		wp_nonce_field( 'codify_control_meta_box', 'codify_control_meta_box_nonce' ); // Always add nonce to your meta boxes!
		?>
		<div class="post_meta_extras">
			<p><label><?php esc_html_e( 'Sidebar Option', 'codify' ); ?></label><br>
				<select id="sidebar_options" name="sidebar_options">
					<option value="<?php echo esc_attr( 'customizer_setting' ); ?>"<?php selected( $sidebar_options, 'customizer_setting', true ); ?>><?php esc_html_e( 'Customizer Setting', 'codify' ); ?></option>
					<option value="<?php echo esc_attr( 'right_sidebar' ); ?>" <?php selected( $sidebar_options, 'right_sidebar', true ); ?>><?php esc_html_e( 'Right Sidebar', 'codify' ); ?></option>
					<option value="<?php echo esc_attr( 'left_sidebar' ); ?>" <?php selected( $sidebar_options, 'left_sidebar', true ); ?>><?php esc_html_e( 'Left Sidebar', 'codify' ); ?></option>
					<option value="<?php echo esc_attr( 'no_sidebar' ); ?>" <?php selected( $sidebar_options, 'no_sidebar', true ); ?>><?php esc_html_e( 'No Sidebar', 'codify' ); ?></option>
				</select>
			</p>
			<p>
				<label><input type="checkbox" name="enable_title" value="yes" <?php checked( $enable_title, 'yes' ); ?> /><?php esc_html_e( 'Enable Title', 'codify' ); ?></label>
			</p>
			<p>
				<label><input type="checkbox" name="enable_comment" value="yes" <?php checked( $enable_comment, 'yes' ); ?> /><?php esc_html_e( 'Enable Comment', 'codify' ); ?></label>
			</p>
			<p>
				<label><input type="checkbox" name="enable_feature_image" value="yes" <?php checked( $enable_feature_image, 'yes' ); ?> /><?php esc_html_e( 'Enable Feature Image', 'codify' ); ?></label>
			</p>
		</div>							
		<?php			
	}

	public function save_metabox( $post_id, $post ) {

		/*
		 * We need to verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times. Add as many nonces, as you
		 * have metaboxes.
		 */
		if ( ! isset( $_POST['codify_control_meta_box_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['codify_control_meta_box_nonce'] ), 'codify_control_meta_box' ) ) { // Input var okay.
			return $post_id;
		}
 
		// Check the user's permissions.
		if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) { // Input var okay.
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return $post_id;
			}
		} else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return $post_id;
			}
		}
 
		/*
		 * If this is an autosave, our form has not been submitted,
		 * so we don't want to do anything.
		 */
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}
 
		if ( isset( $_POST['sidebar_options'] ) ) { // Input var okay.
			update_post_meta( $post_id, 'sidebar_options', sanitize_key( wp_unslash( $_POST['sidebar_options'] ) ) ); // Input var okay.
		} 
		$enable_title = ( isset( $_POST['enable_title'] ) && 'yes' === $_POST['enable_title'] ) ? 'yes' : 'no'; // Input var okay.
		update_post_meta( $post_id, 'enable_title',  $enable_title );

		$enable_feature_image = ( isset( $_POST['enable_feature_image'] ) && 'yes' === $_POST['enable_feature_image'] ) ? 'yes' : 'no'; // Input var okay.
		update_post_meta( $post_id, 'enable_feature_image',  $enable_feature_image );

		$enable_comment = ( isset( $_POST['enable_comment'] ) && 'yes' === $_POST['enable_comment'] ) ? 'yes' : 'no'; // Input var okay.
		update_post_meta( $post_id, 'enable_comment', $enable_comment  );				
	    		    

		}

	}
}
Codify_Meta_Box::get_instance();