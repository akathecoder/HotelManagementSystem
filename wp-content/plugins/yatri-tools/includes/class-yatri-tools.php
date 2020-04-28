<?php

final class Yatri_Tools
{

    private static $_instance = null;


    public static function instance()
    {
        if (is_null(self::$_instance))
            self::$_instance = new self();
        return self::$_instance;
    }


    public function __construct()
    {

        $this->define_constants();
        $this->includes();
        $this->init_hooks();

        do_action('yatri_tools_loaded');


    }

    private function define($name, $value)
    {
        if (!defined($name)) {
            define($name, $value);
        }
    }

    private function define_constants()
    {
        $upload_dir = wp_upload_dir(null, false);

        $this->define('YATRI_TOOLS_ABSPATH', dirname(YATRI_TOOLS_FILE) . '/');
        $this->define('YATRI_TOOLS_BASENAME', plugin_basename(YATRI_TOOLS_FILE));
        $this->define('YATRI_TOOLS_UPLOAD_DIR', $upload_dir['basedir'] . '/yatri-tools-upload/');
        $this->define('YATRI_TOOLS_DYNAMIC_CSS_PATH', YATRI_TOOLS_UPLOAD_DIR . 'yatri-tools-dynamic.css');
        $this->define('YATRI_TOOLS_DYNAMIC_CSS_URI', set_url_scheme($upload_dir['baseurl']) . '/yatri-tools-upload/yatri-tools-dynamic.css');


    }


    public function includes()
    {
        include_once YATRI_TOOLS_ABSPATH . 'includes/class-yatri-tools-install.php';

        $theme = wp_get_theme();

        if ('yatri' == strtolower($theme->template)) {

            include_once YATRI_TOOLS_ABSPATH . 'includes/yatri-tools-functions.php';
            include_once YATRI_TOOLS_ABSPATH . 'includes/class-yatri-tools-ajax.php';
            include_once YATRI_TOOLS_ABSPATH . 'includes/yatri-tools-demo-data.php';
            include_once YATRI_TOOLS_ABSPATH . 'includes/hooks/class-yatri-tools-template-hooks.php';
            include_once YATRI_TOOLS_ABSPATH . 'includes/cache/class-yatri-tools-customizer-cache.php';
            include_once YATRI_TOOLS_ABSPATH . 'includes/customizer/class-yatri-tools-customizer.php';
            include_once YATRI_TOOLS_ABSPATH . 'includes/panel/demos.php';
        }

        // Elementor Compatibility requires PHP 5.4 for namespaces.
        if (version_compare(PHP_VERSION, '5.4', '>=')) {
            require_once YATRI_TOOLS_ABSPATH . 'includes/elementor/class-yatri-tools-elementor.php';
        }
        if (is_admin()) {
            require_once YATRI_TOOLS_ABSPATH . 'includes/admin/class-yatri-tools-admin.php';
        }

    }


    public function init_hooks()
    {
        register_activation_hook(YATRI_TOOLS_FILE, array('Yatri_Tools_Install', 'install'));

        add_action('init', array($this, 'load_plugin_textdomain'));

        add_filter('everest_forms_enable_setup_wizard', array($this, 'everest_form_redirect'));

    }

    public function everest_form_redirect($status)
    {

        delete_transient('_evf_activation_redirect');
        return false;
    }


    public function load_plugin_textdomain()
    {
        load_plugin_textdomain('yatri-tools', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }

    /**
     * Cloning is forbidden.
     *
     * @since 1.0.0
     */
    public function __clone()
    {
        _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?'), '1.0.0');
    }

    /**
     * Unserializing instances of this class is forbidden.
     *
     * @since 1.0.0
     */
    public function __wakeup()
    {
        _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?'), '1.0.0');
    }

}