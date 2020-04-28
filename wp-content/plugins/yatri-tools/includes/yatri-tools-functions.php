<?php


if (!function_exists('yatri_tools_load_admin_template')) {

    function yatri_tools_load_admin_template($template = null, $variables = array(), $include_once = false)
    {
        $variables = (array)$variables;

        $variables = apply_filters('yatri_tools_load_admin_template_variables', $variables);

        extract($variables);

        $isLoad = apply_filters('should_yatri_tools_load_admin_template', true, $template, $variables);

        if (!$isLoad) {

            return;
        }

        do_action('yatri_tools_load_admin_template_before', $template, $variables);

        if ($include_once) {

            include_once yatri_tools_get_admin_template($template);

        } else {

            include yatri_tools_get_admin_template($template);
        }
        do_action('yatri_tools_load_admin_template_after', $template, $variables);
    }
}

if (!function_exists('yatri_tools_get_admin_template')) {

    function yatri_tools_get_admin_template($template = null)
    {
        if (!$template) {
            return false;
        }
        $template = str_replace('.', DIRECTORY_SEPARATOR, $template);

        $template_location = YATRI_TOOLS_ABSPATH . "includes/admin/templates/{$template}.php";

        if (!file_exists($template_location)) {

            echo '<div class="yatri-tools-notice-warning"> ' . __(sprintf('The file you are trying to load is not exists in your theme or yatri-tools plugins location, if you are a developer and extending yatri-tools plugin, please create a php file at location %s ', "<code>{$template_location}</code>"), 'yatri-tools') . ' </div>';
        }


        return apply_filters('yatri_tools_get_admin_template_path', $template_location, $template);
    }
}
