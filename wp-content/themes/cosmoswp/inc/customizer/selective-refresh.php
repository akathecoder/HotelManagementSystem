<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('cosmoswp_customize_partial_blogname')) :

    /**
     * Render the site title for the selective refresh partial.
     *
     * @return void
     */
    function cosmoswp_customize_partial_blogname() {
        bloginfo('name');
    }
endif;

if (!function_exists('cosmoswp_customize_partial_blogdescription')) :

    /**
     * Render the site tagline for the selective refresh partial.
     *
     * @return void
     */
    function cosmoswp_customize_partial_blogdescription() {
        bloginfo('description');
    }
endif;

if (!function_exists('cosmoswp_customize_partial_header')) :

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @return string
	 */
	function cosmoswp_customize_partial_header() {
		ob_start();

		$builder = cosmoswp_header_builder()->get_builder();
		if (isset($builder['desktop']) && !empty($builder['desktop'])) {
			$desktop_builder = $builder['desktop'];
			foreach ($desktop_builder as $key => $single_row) {
				if (empty($single_row)) {
					unset($desktop_builder[$key]);
				}
			}
			if (!empty($desktop_builder)) {
				cosmoswp_header_builder()->desktop_header($desktop_builder);
			}
		}
		if (isset($builder['mobile']) && !empty($builder['mobile'])) {
			$mobile_builder = $builder['mobile'];
			foreach ($mobile_builder as $key => $single_row) {
				if (empty($single_row)) {
					unset($mobile_builder[$key]);
				}
			}
			if (!empty($mobile_builder)) {
				cosmoswp_header_builder()->mobile_header($mobile_builder);
			}
		}
		$value = ob_get_clean();
		return $value;
	}
endif;

if (!function_exists('cosmoswp_customize_partial_footer')) :

	/**
	 * Render footer.
	 *
	 * @return string
	 */
	function cosmoswp_customize_partial_footer() {
		ob_start();

        $builder = cosmoswp_footer_builder()->get_builder();
        if (isset($builder['desktop']) && !empty($builder['desktop'])) {
            $desktop_builder = $builder['desktop'];
            foreach ($desktop_builder as $key => $single_row) {
                if (empty($single_row)) {
                    unset($desktop_builder[$key]);
                }
            }
            if (!empty($desktop_builder)) {
                cosmoswp_footer_builder()->desktop_footer($desktop_builder);
            }
        }

		$value = ob_get_clean();
		return $value;
	}
endif;

if (!function_exists('cosmoswp_customize_partial_page_header')) :

	/**
	 * Render Banner/Page Header.
	 *
	 * @return string
	 */
	function cosmoswp_customize_partial_page_header() {
		ob_start();
		cosmoswp_main_content_controller()->cosmoswp_banner();
		$value = ob_get_clean();
		return $value;
	}
endif;

if (!function_exists('cosmoswp_customize_partial_refresh_dynamic_css')) :

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @return string
	 */
	function cosmoswp_customize_partial_refresh_dynamic_css() {
        $output = cosmoswp_dynamic_css()->get_dynamic_css(array(), true);
        return wp_strip_all_tags($output);
	}

	function cosmoswp_customize_partial_refresh_ajax_dynamic_css() {
		$output = cosmoswp_customize_partial_refresh_dynamic_css();
		wp_send_json_success(  wp_strip_all_tags($output) );
	}

	add_action( 'wp_ajax_cosmoswp_head_ajax_dynamic_css', 'cosmoswp_customize_partial_refresh_ajax_dynamic_css' );

	function cosmoswp_customize_partial_refresh_typography() {

		$dynamic_css = cosmoswp_customize_partial_refresh_dynamic_css();
		$font_url = cosmoswp_typography_fonts()->get_google_font_url(true);
		$output = array(
			'dynamic_css' => $dynamic_css,
			'google_font_url' => $font_url,
		);
		wp_send_json_success(  $output );
	}

	add_action( 'wp_ajax_general_partial_ajax_typography', 'cosmoswp_customize_partial_refresh_typography' );

	function cosmoswp_customize_partial_get_multiple_class() {


		$output = array(
			'body_class' => join( ' ', get_body_class() ) ,
			'cosmoswp_main_wrap_classes' => cosmoswp_get_main_wrap_classes(),
			'cosmoswp_header_wrap_classes' => cosmoswp_get_header_wrap_classes(),
			'cosmoswp_vertical_header_main_wrap_classes' => cosmoswp_get_vertical_header_main_wrap_classes(),
		);
		wp_send_json_success(  $output );
	}
	add_action( 'wp_ajax_general_header_multiple_class_refresh', 'cosmoswp_customize_partial_get_multiple_class' );

endif;