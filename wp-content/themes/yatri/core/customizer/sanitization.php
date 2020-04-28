<?php


if (!function_exists('yatri_sanitize_checkbox')) :

    /**
     * Sanitize checkbox.
     *
     * @since 1.0.0
     *
     * @param bool $checked Whether the checkbox is checked.
     * @return bool Whether the checkbox is checked.
     */
    function yatri_sanitize_checkbox($checked)
    {

        return ((isset($checked) && true === $checked) ? true : false);

    }

endif;

if (!function_exists('yatri_sanitize_repeater')) :

    /**
     * Sanitize checkbox.
     *
     * @since 1.0.0
     *
     * @param bool $checked Whether the checkbox is checked.
     * @return bool Whether the checkbox is checked.
     */
    function yatri_sanitize_repeater($input, $setting)
    {


        $value_array = array();

        try {
            $value_array = is_string($input) ? json_decode($input, true) : $input;

        } catch (Exception $e) {

            $value_array = array();
        }
        $fields = ($setting->manager->get_control($setting->id)->fields);

        $valid_input_data = array();


        foreach ($value_array as $array) {

            $single_valid_input = array();

            foreach ($fields as $field_key => $field) {

                if (isset($array[$field_key])) {

                    $field_type = isset($field['type']) ? $field['type'] : '';

                    switch ($field_type) {
                        case "text":
                        case "icon":
                            $single_valid_input[$field_key] = sanitize_text_field($array[$field_key]);
                            break;
                        case "url":
                            $single_valid_input[$field_key] = esc_url_raw($array[$field_key]);
                            break;
                        case "checkbox":
                            $single_valid_input[$field_key] = absint($array[$field_key]);
                            break;
                    }
                }

            }

            array_push($valid_input_data, $single_valid_input);
        }

        return json_encode($valid_input_data);


    }

endif;

if (!function_exists('yatri_sanitize_select')) :

    /**
     * Sanitize select.
     *
     * @since 1.0.0
     *
     * @param mixed $input The value to sanitize.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return mixed Sanitized value.
     */
    function yatri_sanitize_select($input, $setting)
    {

        // Ensure input is clean.
        $input = sanitize_text_field($input);

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control($setting->id)->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return (array_key_exists($input, $choices) ? $input : $setting->default);

    }

endif;

if (!function_exists('yatri_sanitize_ordering')) :

    /**
     * Sanitize yatri_sanitize_ordering.
     *
     * @since 1.0.0
     *
     * @param mixed $input The value to sanitize.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return mixed Sanitized value.
     */
    function yatri_sanitize_ordering($input, $setting)
    {

        // Ensure input is clean.

        $yatri_blog_archive_page_content_order = $setting->default;

        $value_array = array();

        try {
            $value_array = is_string($input) ? json_decode($input, true) : $yatri_blog_archive_page_content_order;

        } catch (Exception $e) {

            $value_array = array();

        }
        $value_array = empty($value_array) ? $yatri_blog_archive_page_content_order
            : $value_array;

        $return_value_array = array();

        foreach ($value_array as $value_key => $value_val) {
            $value_key = sanitize_text_field($value_key);
            $return_value_array[$value_key]['disable'] = isset($value_val['disable']) ? absint($value_val['disable']) : 0;
            if (isset($value_val['title'])) {
                $return_value_array[$value_key]['title'] = isset($value_val['title']) ? sanitize_text_field($value_val['title']) : '';
            }
        }
        // If the input is a valid key, return it; otherwise, return the default.
        return json_encode($return_value_array);

    }

endif;

if (!function_exists('yatri_sanitize_slider')) :

    /**
     * Sanitize slider.
     *
     * @since 1.0.0
     *
     * @param mixed $input The value to sanitize.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return mixed Sanitized value.
     */
    function yatri_sanitize_slider($input, $setting)
    {

        // Ensure input is clean.
        $input = absint($input);

        // Get list of choices from the control associated with the setting.
        $input_attrs = $setting->manager->get_control($setting->id)->input_attrs;

        // If the input is a valid key, return it; otherwise, return the default.
        return ($input_attrs['min'] <= $input) && ($input <= $input_attrs['max']) ? $input : $setting->default;

    }

endif;

