<?php
class CosmosWP_Typography_Fonts {

	/**
	 * Main Instance
	 *
	 * Insures that only one instance of CosmosWP_Typography_Fonts exists in memory at any one
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
			$instance = new CosmosWP_Typography_Fonts;
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

		add_action( 'wp_ajax_cosmoswp_customizer_ajax_google_fonts', array( $this, 'google_fonts' ) );
		add_action( 'wp_ajax_cosmoswp_customizer_ajax_custom_fonts', array( $this, 'custom_fonts' ) );
        /*save google fonts to theme mod*/
        add_action('customize_save_after', array($this, 'save_dynamic_fonts'), 9999);

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_google_fonts' ),1 );
    }

	function google_fonts() {
        $google_fonts = get_transient( 'cosmoswp_google_fonts' );
        /*Get/Fetch google fonts*/
        if ( empty( $google_fonts ) ) {
            global $wp_filesystem;
            /*Init the filesystem if it doesn't already exist.*/
            if ( ! $wp_filesystem ) {
                require_once wp_normalize_path( ABSPATH . '/wp-admin/includes/file.php' );
                WP_Filesystem();
            }
            $file = get_template_directory() . '/inc/library/typography-fonts/webfonts.json';
            if ( file_exists( $file ) ) {
                $google_fonts = $wp_filesystem->get_contents( $file );
                $google_fonts = json_decode( $google_fonts, true );

                /*Store on transient*/
                set_transient( 'cosmoswp_google_fonts', $google_fonts, DAY_IN_SECONDS );
            }
        }
        wp_send_json_success( apply_filters( 'cosmoswp_google_fonts', $google_fonts ) );
    }

	function get_google_font_url($is_fresh = false){
        $previous_version = false;
        if( !$is_fresh){
            $cwp_dynamic_css = get_theme_mod('cwp_dynamic_fonts');
            if( !empty( $cwp_dynamic_css )){
                return $cwp_dynamic_css;
            }
            $previous_version = true;
        }
		/*font family wp_enqueue_style*/
		$all_google_fonts = apply_filters('cosmoswp_enqueue_google_fonts',array() );

		if ( empty( $all_google_fonts ) ) {
			return;
		}

		$unique_google_fonts = array();
		if( !empty( $all_google_fonts )){
			foreach( $all_google_fonts as $single_google_font ){
				$font_family = str_replace( ' ', '+', $single_google_font['family'] );
				if( isset( $single_google_font['font-weight']) ){
					$unique_google_fonts[$font_family]['font-weight'][] = $single_google_font['font-weight'];
				}
			}
		}
		$google_font_family = '';
		if( !empty( $unique_google_fonts )){
			foreach( $unique_google_fonts as $font_family => $unique_google_font ){
				if ( $google_font_family ) {
					$google_font_family .= '|';
				}
				$google_font_family .= $font_family;
				if( isset( $unique_google_font['font-weight']) ){
					$unique_font_weights = array_unique( $unique_google_font['font-weight'] );
					$google_font_family .= ':' . join( ',', $unique_font_weights );

				}
			}
		}
		if ($google_font_family) {
			$google_font_family = str_replace( 'italic', 'i', $google_font_family );
			$fonts_url = add_query_arg(array(
				'family' => $google_font_family
			), '//fonts.googleapis.com/css');

            /*previous version fixed*/
            if( $previous_version ){
                set_theme_mod('cwp_dynamic_fonts', $fonts_url);
            }
			return $fonts_url;
		}
		return false;
	}

    /**
     * Callback function for admin_bar_init
     *
     * @since    1.2.0
     * @access   public
     *
     * @return void
     */
	public function save_dynamic_fonts(){
        $fonts_url = $this->get_google_font_url(true);
	    if( $fonts_url ){
            set_theme_mod('cwp_dynamic_fonts', $fonts_url);
        }
    }

	function enqueue_google_fonts() {
		if( cosmoswp_typography_fonts()->get_google_font_url()){
			wp_enqueue_style( 'cosmoswp-google-fonts', $this->get_google_font_url(), array(), false );
		}
	}

}

if( !function_exists( 'cosmoswp_typography_fonts')){

	function cosmoswp_typography_fonts() {

		return CosmosWP_Typography_Fonts::instance();
	}
	cosmoswp_typography_fonts()->run();
}