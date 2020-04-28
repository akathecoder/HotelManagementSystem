<?php


function yatri_customizer_modal_fields($field_id = '')
{
    return yatri_customizer_modal_config($field_id);

}

add_filter('yatri_customizer_modal_fields', 'yatri_customizer_modal_fields');

function yatri_customizer_modal_all_fields($modal_id = '', $with_field_id = false)
{
    $all_fields = array();

    $customizer_fields = yatri_customizer_modal_config('', true);

    foreach ($customizer_fields as $field_id => $field) {

        if ($with_field_id) {

            $all_fields[$field_id] = array();
        }

        if (isset($field['tabs'])) {

            $tab_keyes = array_keys($field['tabs']);

            foreach ($tab_keyes as $tab) {

                if (isset($field[$tab . '_fields'])) {

                    foreach ($field[$tab . '_fields'] as $field_item) {

                        if (!empty($modal_id)) {

                            if ($modal_id == $field_id) {

                                array_push($all_fields, $field_item);

                            }
                        } else {
                            if ($with_field_id) {

                                array_push($all_fields[$field_id], $field_item);
                            } else {
                                array_push($all_fields, $field_item);
                            }

                        }
                    }

                }
            }

        } else {
            foreach ($field as $field_item_) {

                if (!empty($modal_id)) {

                    if ($modal_id == $field_id) {

                        array_push($all_fields, $field_item_);

                    }
                } else {
                    if ($with_field_id) {
                        array_push($all_fields[$field_id], $field_item_);

                    } else {
                        array_push($all_fields, $field_item_);
                    }
                }
            }
        }


    }

    return $all_fields;
}


add_action("wp_ajax_yatri_save_header_template", "yatri_customizer_save_header_templates");

if (!function_exists('yatri_customizer_save_header_templates')) {

    function yatri_customizer_save_header_templates()
    {
        $nonce = isset($_POST['_yatri_nonce']) ? sanitize_text_field($_POST['_yatri_nonce']) : '';

        $template_id = isset($_POST['template_id']) ? sanitize_text_field($_POST['template_id']) : '';

        $nonce_key = 'yatri_save_template_' . $template_id . '_nonce';

        if (!wp_verify_nonce($nonce, $nonce_key)) {
            wp_send_json_error();
        }
        $template_name = isset($_POST['template_name']) ? sanitize_text_field($_POST['template_name']) : '';

        if (empty($template_name)) {
            wp_send_json_error();
        }
        $theme_name = wp_get_theme()->get('Name');

        $option_name = "{$theme_name}_{$template_id}_saved_templates";

        $option_value = get_option($option_name, array());

        $uid = uniqid();


        $yatri_get_header_theme_options = yatri_get_header_theme_options();

        $all_option_values = array();

        foreach ($yatri_get_header_theme_options as $option_key => $option_default) {

            $all_option_values[$option_key] = yatri_get_option($option_key);
        }

        $option_value[$uid] = array(
            'template_name' => $template_name,
            'template_values' => $all_option_values
        );

        $status = update_option($option_name, $option_value);

        if (is_wp_error($status)) {
            wp_send_json_error();

        }
        wp_send_json_success(array(
            'uniqid' => $uid,
            'template_name' => $template_name,
            'template_id' => $template_id
        ));

    }
}


add_action("wp_ajax_yatri_remove_header_template", "yatri_customizer_remove_header_templates");

if (!function_exists('yatri_customizer_remove_header_templates')) {

    function yatri_customizer_remove_header_templates()
    {
        $nonce = isset($_POST['_yatri_nonce']) ? sanitize_text_field($_POST['_yatri_nonce']) : '';

        $template_id = isset($_POST['template_id']) ? sanitize_text_field($_POST['template_id']) : '';

        $nonce_key = 'yatri_remove_template_' . $template_id . '_nonce';

        if (!wp_verify_nonce($nonce, $nonce_key)) {
            wp_send_json_error();
        }
        $uniqid = isset($_POST['uniqid']) ? sanitize_text_field($_POST['uniqid']) : '';

        if (empty($uniqid)) {
            wp_send_json_error();
        }
        $theme_name = wp_get_theme()->get('Name');

        $option_name = "{$theme_name}_{$template_id}_saved_templates";

        $option_value = get_option($option_name, array());

        if (isset($option_value[$uniqid])) {
            unset($option_value[$uniqid]);
        }
        $status = update_option($option_name, $option_value);

        if (is_wp_error($status)) {
            wp_send_json_error();

        }
        wp_send_json_success();

    }
}


if (!function_exists('yatri_customizer_get_header_templates')) {

    function yatri_customizer_get_header_templates($template_id)
    {
        $theme_name = wp_get_theme()->get('Name');

        $option_name = "{$theme_name}_{$template_id}_saved_templates";

        $option_values = get_option($option_name, array());

        return $option_values;

    }
}


