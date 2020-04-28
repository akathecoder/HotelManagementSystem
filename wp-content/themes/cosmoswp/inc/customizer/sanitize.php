<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('cosmoswp_sanitize_number')) :

    /**
     * Function to sanitize number
     *
     * @since CosmosWP 1.0.0
     *
     * @param $cosmoswp_input
     * @param $cosmoswp_setting
     * @return int || float || numeric value
     *
     */
    function cosmoswp_sanitize_number($cosmoswp_input, $cosmoswp_setting) {
        $cosmoswp_sanitize_text = sanitize_text_field($cosmoswp_input);

        // If the input is an number, return it; otherwise, return the default
        return (is_numeric($cosmoswp_sanitize_text) ? $cosmoswp_sanitize_text : $cosmoswp_setting->default);

    }

endif;

if (!function_exists('cosmoswp_sanitize_checkbox')) :

    /**
     * Sanitizing the checkbox
     *
     * @since CosmosWP 1.0.0
     *
     * @param $checked
     * @return Boolean
     *
     */
    function cosmoswp_sanitize_checkbox($checked) {
        // Boolean check.
        return ((isset($checked) && true == $checked) ? true : false);
    }
endif;

if (!function_exists('cosmoswp_sanitize_page')) :

    /**
     * Sanitizing the page/post
     *
     * @since CosmosWP 1.0.0
     *
     * @param $input user input value
     * @return sanitized output as $input
     *
     */
    function cosmoswp_sanitize_page($input) {
        // Ensure $input is an absolute integer.
        $page_id = absint($input);
        // If $page_id is an ID of a published page, return it; otherwise, return false
        return ('publish' == get_post_status($page_id) ? $page_id : false);
    }
endif;

if (!function_exists('cosmoswp_sanitize_select')) :

    /**
     * Sanitizing the select callback example
     *
     * @since CosmosWP 1.0.0
     *
     * @see sanitize_key()               https://developer.wordpress.org/reference/functions/sanitize_key/
     * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
     *
     * @param $input
     * @param $setting
     * @return sanitized output
     *
     */
    function cosmoswp_sanitize_select($input, $setting) {

        // Ensure input is a slug.
        $input = sanitize_key($input);

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control($setting->id)->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }
endif;

if (!function_exists('cosmoswp_sanitize_allowed_html')) :

    /**
     * Function allowed HTML
     *
     * @since CosmosWP 1.0.0
     *
     * @param $cosmoswp_input
     * @return string
     *
     */
    function cosmoswp_sanitize_allowed_html($input) {
        $output = wp_kses_post($input);
        return $output;
    }
endif;

if (!function_exists('cosmoswp_sanitize_textarea')) :

    /**
     * Function Text Area
     *
     * @since CosmosWP 1.0.0
     *
     * @param $cosmoswp_input
     * @return string
     *
     */
    function cosmoswp_sanitize_textarea($input) {
        if (current_user_can('unfiltered_html')) {
            $output = $input;
        } else {
            $output = cosmoswp_sanitize_allowed_html($input);
        }
        return $output;
    }
endif;

if (!function_exists('cosmoswp_sanitize_color')) :
    /**
     * Color sanitization callback
     * https://wordpress.stackexchange.com/questions/257581/escape-hexadecimals-rgba-values
     * @since 1.0.0
     */
    function cosmoswp_sanitize_color($color) {
        if (empty($color) || is_array($color)) {
            return '';
        }

        // If string does not start with 'rgba', then treat as hex.
        // sanitize the hex color and finally convert hex to rgba
        if (false === strpos($color, 'rgba')) {
            return sanitize_hex_color($color);
        }

        // By now we know the string is formatted as an rgba color so we need to further sanitize it.
        $color = str_replace(' ', '', $color);
        sscanf($color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha);

        return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';
    }
endif;

if (!function_exists('cosmoswp_sanitize_multi_choices')) :

    /**
     * Multi choices sanitization
     *
     * @since CosmosWP 1.0.0
     *
     * @param $cosmoswp_input
     * @return array
     *
     */
    function cosmoswp_sanitize_multi_choices($input, $setting) {
        // Get list of choices from the control associated with the setting.
        $choices    = $setting->manager->get_control($setting->id)->choices;
        $input_keys = $input;

        foreach ($input_keys as $key => $value) {
            if (!array_key_exists($value, $choices)) {
                unset($input[$key]);
            }
        }

        // If the input is a valid key, return it;
        // otherwise, return the default.
        return (is_array($input) ? $input : $setting->default);
    }
endif;

if (!function_exists('cosmoswp_sanitize_multicheck')) :

    /**
     * Multicheck sanitization
     *
     * @since CosmosWP 1.0.0
     *
     * @param $cosmoswp_input
     * @return array
     *
     */
    function cosmoswp_sanitize_multicheck($values) {
        $multi_values = !is_array($values) ? explode(',', $values) : $values;
        return !empty($multi_values) ? array_map('wp_kses_post', $multi_values) : array();
    }

endif;

if (!function_exists('cosmoswp_sanitize_field_typography')) :

    /**
     * Sanitize Typography
     *
     * @since CosmosWP 1.0.0
     *
     * @param $input
     * @return array
     *
     */
    function cosmoswp_sanitize_field_typography($input, $cosmoswp_setting) {
        $input_decoded = json_decode($input, true);
        $output        = array();

        if (!empty($input_decoded)) {
            foreach ($input_decoded as $key => $value) {

                switch ($key):
                    case 'font-type':
                    case 'system-font':
                    case 'google-font':
                    case 'custom-font':
                    case 'font-weight':
                    case 'font-style':
                    case 'text-decoration':
                    case 'text-transform':
                        $output[$key] = sanitize_text_field($value);
                        break;

                    case 'font-size':
                    case 'line-height':
                    case 'letter-spacing':
                        $devices_values = array();
                        foreach ($value as $device => $device_value) {
                            $devices_values[$device] = sanitize_text_field($device_value);
                        }
                        $output[$key] = $devices_values;
                        break;

                    default:
                        $output[$key] = sanitize_text_field($value);
                        break;
                endswitch;
            }
            return json_encode($output);
        }

        return $input;
    }
endif;

if (!function_exists('cosmoswp_sanitize_field_default_css_box')) :

    /**
     * Sanitize Default Css Box
     *
     * @since CosmosWP 1.0.0
     *
     * @param $input
     * @return array
     *
     */
    function cosmoswp_sanitize_field_default_css_box($input, $cosmoswp_setting) {

        $input_decoded = json_decode($input, true);
        $output        = array();
        if (!empty($input_decoded)) {
            foreach ($input_decoded as $device_id => $device_details) {
                foreach ($device_details as $key => $value) {
                    if ($key == 'cssbox_link') {
                        $output[$device_id][$key] = cosmoswp_sanitize_checkbox($value);
                    } else {
                        $output[$device_id][$key] = cosmoswp_not_empty($value) ? intval($value) : '';
                    }
                }
            }
            return json_encode($output);
        }
        return $input;

    }
endif;

if (!function_exists('cosmoswp_sanitize_field_border')) :

    /**
     * Sanitize Field Border
     *
     * @since CosmosWP 1.0.0
     *
     * @param $input
     * @return array
     *
     */
    function cosmoswp_sanitize_field_border($input, $cosmoswp_setting) {
        $input_decoded = json_decode($input, true);

        $output = array();

        if (!empty($input_decoded)) {
            foreach ($input_decoded as $key => $value) {

                switch ($key):
                    case 'border-style':
                        $output[$key] = sanitize_key($value);
                        break;

                    case 'border-width':
                    case 'border-shadow-css':
                    case 'box-shadow-css':
                    case 'border-radius':
                        $devices_values = array();
                        foreach ($value as $device => $device_value) {
                            foreach ($device_value as $single_key => $single_value) {
                                $devices_values[$device][$single_key] = absint($single_value);
                            }
                        }
                        $output[$key] = $devices_values;
                        break;

                    default:
                        $output[$key] = sanitize_text_field($value);
                        break;
                endswitch;
            }
            return json_encode($output);
        }

        return $input;

    }
endif;

if (!function_exists('cosmoswp_sanitize_field_background')) :

    /**
     * Sanitize Field Background
     *
     * @since CosmosWP 1.0.0
     *
     * @param $input
     * @return array
     *
     */
    function cosmoswp_sanitize_field_background($input, $cosmoswp_setting) {

        $input_decoded = json_decode($input, true);
        $output        = array();

        if (!empty($input_decoded)) {
            foreach ($input_decoded as $key => $value) {

                switch ($key):
                    case 'background-size':
                    case 'background-position':
                    case 'background-repeat':
                    case 'background-attachment':
                        $output[$key] = sanitize_key($value);
                        break;

                    case 'background-image':
                        $output[$key] = esc_url_raw($value);
                        break;
                    case 'background-color':
                    case 'background-hover-color':
                    case 'background-color-title':
                    case 'title-font-color':
                    case 'background-color-post':
                    case 'site-title-color':
                    case 'site-tagline-color':
                    case 'post-font-color':
                    case 'text-color':
                    case 'text-hover-color':
                    case 'title-color':
                    case 'link-color':
                    case 'link-hover-color':
                    case 'on-sale-bg':
                    case 'on-sale-color':
                    case 'out-of-stock-bg':
                    case 'out-of-stock-color':
                    case 'rating-color':
                    case 'grid-list-color':
                    case 'grid-list-hover-color':
                    case 'categories-color':
                    case 'categories-hover-color':
                    case 'deleted-price-color':
                    case 'deleted-price-hover-color':
                    case 'price-color':
                    case 'price-hover-color':
                    case 'content-color':
                    case 'content-hover-color':
                    case 'tab-list-color':
                    case 'tab-content-color':
                    case 'tab-list-border-color':
                    case 'tab-content-border-color':
                    case 'background-stripped-color':
                    case 'button-color':
                    case 'button-hover-color':
                    case 'icon-color':
                    case 'icon-hover-color':
                    case 'meta-color':
                    case 'next-prev-color':
                    case 'next-prev-hover-color':
                    case 'button-bg-color':
                    case 'button-bg-hover-color':
                        $output[$key] = cosmoswp_sanitize_color($value);
                        break;
                    default:
                        $output[$key] = sanitize_text_field($value);
                        break;
                endswitch;
            }
            return json_encode($output);
        }

        return $input;

    }

endif;

if (!function_exists('cosmoswp_sanitize_image')) :

    /**
     * Image sanitization callback
     *
     * @since 1.2.1
     */
    function cosmoswp_sanitize_image($image, $setting) {
        /*
         * Array of valid image file types.
         *
         * The array includes image mime types that are included in wp_get_mime_types()
         */
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon'
        );
        // Return an array with file extension and mime_type.
        $file = wp_check_filetype($image, $mimes);
        // If $image has a valid mime_type, return it; otherwise, return the default.
        return ($file['ext'] ? $image : $setting->default);
    }

endif;

if (!function_exists('cosmoswp_sanitize_social_data')) :

    /**
     * Sanitization Social Data
     *
     * @since 1.2.1
     * @param  $input
     * @return array
     */
    function cosmoswp_sanitize_social_data($input) {
        $input_decoded = json_decode($input, true);
        if (!empty($input_decoded)) {
            foreach ($input_decoded as $boxes => $box) {
                foreach ($box as $key => $value) {
                    if ($key == 'link ') {
                        $input_decoded[$boxes][$key] = esc_url_raw($value);
                    }
                    elseif ($key == 'checkbox') {
                        $input_decoded[$boxes][$key] = cosmoswp_sanitize_checkbox($value);
                    }
                    else {
                        $input_decoded[$boxes][$key] = esc_attr($value);
                    }
                }
            }
            return json_encode($input_decoded);
        }
        return $input;
    }

endif;

if (!function_exists('cosmoswp_sanitize_field_tabs')) :

    /**
     * Sanitization Tab Field Data
     *
     * @since 1.2.1
     * @param  $input
     * @return array
     */
    function cosmoswp_sanitize_field_tabs($input, $cosmoswp_setting) {

        $input_decoded = json_decode($input, true);
        $output        = array();

        if (!empty($input_decoded)) {
            foreach ($input_decoded as $key => $value) {

                switch ($key):
                    case 'normal-border-style':
                    case 'hover-border-style':
                    case 'active-border-style':
                        $output[$key] = sanitize_key($value);
                        break;

                    case 'normal-text-color':
                    case 'normal-bg-color':
                    case 'normal-border-color':
                    case 'normal-box-shadow':
                    case 'hover-bg-color':
                    case 'hover-border-color':
                    case 'hover-box-shadow':
                    case 'active-text-color':
                    case 'active-bg-color':
                    case 'active-border-color':
                    case 'site-title-color':
                    case 'site-tagline-color':
                    case 'hover-site-title-color':
                    case 'hover-site-tagline-color':
                        $output[$key] = cosmoswp_sanitize_color($value);
                        break;

                    case 'normal-border-width':
                    case 'normal-border-radius':
                    case 'normal-box-shadow-css':
                    case 'hover-border-width':
                    case 'hover-border-radius':
                    case 'hover-box-shadow-css':
                    case 'active-border-width':
                    case 'active-border-radius':
                        $devices_values = array();
                        foreach ($value as $device => $device_details) {
                            foreach ($device_details as $device_key => $device_value) {
                                if ($device_key == 'cssbox_link') {
                                    $devices_values[$device][$device_key] = cosmoswp_sanitize_checkbox($device_value);
                                }
                                elseif(!empty($device_value)){
                                    $devices_values[$device][$device_key] =  absint($device_value);
                                }
                                else{
                                    $devices_values[$device][$device_key] =  '';
                                }
                            }
                        }
                        $output[$key] = $devices_values;
                        break;

                    default:
                        $output[$key] = sanitize_text_field($value);
                        break;
                endswitch;
            }
            return json_encode($output);
        }

        return $input;
    }

endif;

if (!function_exists('cosmoswp_sanitize_slider_field')) :

    /**
     * Sanitization Slider Field Data
     *
     * @since 1.2.1
     * @param  $input
     * @return array
     */
    function cosmoswp_sanitize_slider_field($input) {
        $input_decoded = json_decode($input, true);
        $output        = array();

        if (!empty($input_decoded)) {
            foreach ($input_decoded as $device => $value) {

                $output[$device] = absint($value);

            }
            return json_encode($output);
        }

        return $input;
    }
endif;

if (!function_exists('cosmoswp_sanitize_radio')) :
    /**
     * Sanitization Radio Field Data
     *
     * @since 1.2.1
     * @param  $input ,$setting
     * @return array
     */
    function cosmoswp_sanitize_radio($input, $setting) {

        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_key($input);

        //get the list of possible radio box options
        $choices = $setting->manager->get_control($setting->id)->choices;

        //return input if valid or return default option
        return (array_key_exists($input, $choices) ? $input : $setting->default);

    }

endif;

if (!function_exists('cosmoswp_sanitize_spacing')) :
	/**
	 * Sanitization array
	 *
	 * @since 1.2.1
	 * @param  $input ,$setting
	 * @return array
	 */
	function cosmoswp_sanitize_spacing($input, $setting) {

		if ( is_array( $input ) ) {
			return $input;
		}

		return array();

	}

endif;

if (!function_exists('cosmoswp_is_json')) :
	/**
	 * Check if Json
	 *
	 * @since 1.0.0
	 * @param  $input ,$setting
	 * @return boolean
	 */
	function cosmoswp_is_json($input) {
		return is_string( $input ) && is_array( json_decode( $input, true ) );
	}

endif;

if (!function_exists('cosmoswp_sanitize_responsive_range')) :
	/**
	 * Check if Json
	 *
	 * @since 1.0.0
	 * @param  $input ,$setting
	 * @return boolean
	 */
	function cosmoswp_sanitize_responsive_range($input) {
		if ( ! cosmoswp_is_json( $input ) ) {
			return floatval( $input );
		}
		$range_value            = json_decode( $input, true );
		$range_value['desktop'] = ! empty( $range_value['desktop'] ) || $range_value['desktop'] === '0' ? floatval( $range_value['desktop'] ) : '';
		$range_value['tablet']  = ! empty( $range_value['tablet'] ) || $range_value['tablet'] === '0' ? floatval( $range_value['tablet'] ) : '';
		$range_value['mobile']  = ! empty( $range_value['mobile'] ) || $range_value['mobile'] === '0' ? floatval( $range_value['mobile'] ) : '';

		return json_encode( $range_value );
	}

endif;

if (!function_exists('cosmoswp_sanitize_field_responsive_buttonset')) :
    /**
     * Check if Json
     *
     * @since 1.0.0
     * @param  $input ,$setting
     * @return boolean
     */
    function cosmoswp_sanitize_field_responsive_buttonset($input) {

        $range_value            = json_decode( $input, true );
        $range_value['desktop'] = ! empty( $range_value['desktop'] ) ? sanitize_text_field( $range_value['desktop'] ) : '';
        $range_value['tablet']  = ! empty( $range_value['tablet'] ) ? sanitize_text_field( $range_value['tablet'] ) : '';
        $range_value['mobile']  = ! empty( $range_value['mobile'] ) ? sanitize_text_field( $range_value['mobile'] ) : '';

        return json_encode( $range_value );
    }

endif;