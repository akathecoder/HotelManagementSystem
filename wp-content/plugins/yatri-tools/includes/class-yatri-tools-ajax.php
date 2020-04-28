<?php

class Yatri_Tools_Ajax
{

    public function __construct()
    {
        add_action("wp_ajax_yatri_tools_export_header_template", array($this, "export_header_template"));
        add_action("wp_ajax_yatri_tools_import_header_template", array($this, "import_header_template"));

    }

    function import_header_template()
    {
        if (!is_admin()) {
            return;
        }
        $nonce = isset($_POST['nonce']) ? sanitize_text_field($_POST['nonce']) : '';
        $json_url = isset($_POST['json_url']) ? esc_url($_POST['json_url']) : '';

        $nonce_key = 'yatri_tools_import_template_nonce';

        if (!wp_verify_nonce($nonce, $nonce_key)) {
            wp_send_json_error();
        }
        $response = wp_remote_get($json_url);

        $response_data_string = (wp_remote_retrieve_body($response));

        $response_data = json_decode($response_data_string, true);

        if (count($response_data) < 1) {
            return;
        }

        $header_customizer_options = $response_data;

        $all_customizer_options = yatri_init_customizer_options();

        $all_theme_mod = wp_parse_args($header_customizer_options, $all_customizer_options);

        set_theme_mod(YATRI_THEME_SETTINGS, $all_theme_mod);

        Yatri_Tools_Customizer_Cache::write_file();

        wp_send_json_success();


    }

    function export_header_template()
    {
        if (!is_admin()) {
            return;
        }
        $nonce = isset($_GET['nonce']) ? sanitize_text_field($_GET['nonce']) : '';

        $nonce_key = 'yatri_tools_export_template_nonce';

        if (!wp_verify_nonce($nonce, $nonce_key)) {
            wp_send_json_error();
        }


        $json_text = "{}";
        try {
            $all_customizer_options = yatri_init_customizer_options();
            $yatri_get_header_theme_options_keys = array_keys(yatri_get_header_theme_options());
            $yatri_get_header_theme_options = wp_array_slice_assoc($all_customizer_options, $yatri_get_header_theme_options_keys);
            $json_text = json_encode($yatri_get_header_theme_options);
        } catch (Exception $e) {

        }
        nocache_headers();
        header('Content-Type: application/json; charset=utf-8');
        header('Content-Disposition: attachment; filename=yatri-header-template.json');
        header("Expires: 0");
        echo $json_text;
        exit;
    }


}

new Yatri_Tools_Ajax();