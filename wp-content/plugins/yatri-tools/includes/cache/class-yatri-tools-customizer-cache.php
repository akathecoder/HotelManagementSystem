<?php

class Yatri_Tools_Customizer_Cache
{
    private static $instance = null;

    public static function get_instance()
    {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function __construct()
    {
        add_action('customize_register', array($this, 'add_panel'));
        add_action('customize_register', array($this, 'add_section'));

        add_action('customize_save_after', array(__CLASS__, 'write_file'), 20);
        add_action('yatri_theme_dynamic_css_enable', array($this, 'inline_dynamic_css'));
        add_action('yatri_scripts_styles', array($this, 'enqueue_dynamic_css'));

    }

    public function enqueue_dynamic_css($script)
    {
        if (is_customize_preview()) {
            return $script;
        }
        $is_dynamic_css = $this->is_css_file_caching();
        if ($is_dynamic_css) {
            $script[] = array(
                'handler' => 'yatri-tools-dynamic-css',
                'style' => YATRI_TOOLS_DYNAMIC_CSS_URI,
                'absolute' => true,
                'version' => rand(10000, 9999999)
            );
        }
        return $script;

    }

    public function inline_dynamic_css()
    {
        if (is_customize_preview()) {
            return true;
        }
        $yatri_tools_customizer_css_cache_type = $this->get_cache_type();


        if ('file' != $yatri_tools_customizer_css_cache_type || empty($yatri_tools_customizer_css_cache_type) || is_null($yatri_tools_customizer_css_cache_type)) {

            return true;
        }
        $css_write = get_option('yatri_tools_css_write_to_file_status');

        if ($css_write != 'success' || empty($css_write) || is_null($css_write)) {

            return true;
        }
        return false;
    }

    public function is_css_file_caching()
    {
        $yatri_tools_customizer_css_cache_type = $this->get_cache_type();

        $css_write = get_option('yatri_tools_css_write_to_file_status');

        if ('file' == $yatri_tools_customizer_css_cache_type && $css_write == 'success') {
            return true;
        }


        return false;
    }

    protected
    function get_filesystem()
    {

        // The WordPress filesystem.
        global $wp_filesystem;

        if (empty($wp_filesystem)) {
            require_once wp_normalize_path(ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
        }

        return $wp_filesystem;
    }

    public function get_cache_type()
    {
        return get_theme_mod('yatri_tools_customizer_css_cache_type', 'file');
    }


    public static function write_file()
    {
        $yatri_tools_customizer_css_cache_type = self::get_instance()->get_cache_type();

        if ('file' != $yatri_tools_customizer_css_cache_type) {
            return;
        }
        if (!file_exists(YATRI_TOOLS_DYNAMIC_CSS_PATH)) {

            Yatri_Tools_Install::create_files();
        }
        $created = get_option('yatri_tools_upload_dir_created');
        if ('yes' == $created) {
            $filesystem = self::get_instance()->get_filesystem();
            yatri_init_customizer_options();
            $css = yatri_get_all_dynamic_css();

            $write_file = (bool)$filesystem->put_contents(YATRI_TOOLS_DYNAMIC_CSS_PATH, $css);
            if (!$write_file) {
                update_option('yatri_tools_css_write_to_file_status', 'failed');
            } else {
                update_option('yatri_tools_css_write_to_file_status', 'success');
            }
        }
    }

    public function add_panel($wp_customize)
    {
        if (class_exists('Yatri_Core')) {

            $wp_customize->add_panel(new Mantrabrain_Theme_Customizer_Panel(
                $wp_customize, 'yatri_tools_theme_cache_panel', array(
                'priority' => 30,
                'title' => esc_html__('Theme Cache', 'yatri'),
                'capabitity' => 'edit_theme_options',
            )));
        }
    }


    public function add_section($wp_customize)
    {
        if (class_exists('Yatri_Core')) {

            $wp_customize->add_section(
                'yatri_tools_customizer_cache_section',
                array(
                    'title' => __('Customizer Cache', 'yatri'),
                    'priority' => 5,
                    'panel' => 'yatri_tools_theme_cache_panel',
                )
            );
            include_once "sections/customizer-cache.php";
        }
    }

}

Yatri_Tools_Customizer_Cache::get_instance();