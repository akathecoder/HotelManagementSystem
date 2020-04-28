<?php
/**
 * Matrabran Lib Autoloader.
 *
 * @package Matrabran Lib/Classes
 * @version 1.0.0
 */

defined('ABSPATH') || exit;

/**
 * Autoloader class.
 */
class Mantrabrain_Lib_Autoloader
{

    /**
     * Path to the includes directory.
     *
     * @var string
     */
    private $include_path = '';

    /**
     * The Constructor.
     */
    public function __construct()
    {

        $this->define_constant();

        if (function_exists('__autoload')) {

            spl_autoload_register('__autoload');

        }


        spl_autoload_register(array($this, 'autoload'));

        $this->include_path = untrailingslashit(plugin_dir_path(MANTRABRAIN_THEME_FILE)) . '/';
    }

    public function define_constant()
    {
        if (!defined('MANTRABRAIN_THEME_FILE')) {
            define('MANTRABRAIN_THEME_FILE', __FILE__);
        }
    }

    /**
     * Take a class name and turn it into a file name.
     *
     * @param  string $class Class name.
     * @return string
     */
    private function get_file_name_from_class($class)
    {
        return 'class-' . str_replace('_', '-', $class) . '.php';
    }

    /**
     * Include a class file.
     *
     * @param  string $path File path.
     * @return bool Successful or not.
     */
    private function load_file($path)
    {
        if ($path && is_readable($path)) {
            include_once $path;
            return true;
        }
        return false;
    }

    /**
     * Auto-load Mantrabrain_Lib classes on demand to reduce memory consumption.
     *
     * @param string $class Class name.
     */
    public function autoload($class)
    {
        $class = strtolower($class);

        if (0 !== strpos($class, 'mantrabrain_theme_')) {
            return;
        }

        $file = $this->get_file_name_from_class($class);
        $path = '';


        if (0 === strpos($class, 'mantrabrain_theme_customizer_control')) {

            $path = $this->include_path . 'customizer/controls/';
        } else if (0 === strpos($class, 'mantrabrain_theme_customizer')) {
            $path = $this->include_path . 'customizer/';
        } elseif (0 === strpos($class, 'mantrabrain_theme_helper')) {
            $path = $this->include_path . 'helper/';
        } elseif (0 === strpos($class, 'mantrabrain_theme_widget')) {
            $path = $this->include_path . 'widget/';
        } elseif (0 === strpos($class, 'mantrabrain_theme_breadcrumbs')) {
            //Mantrabrain_Theme_Breadcrumbs
            $path = $this->include_path . 'breadcrumbs/';
        } elseif (0 === strpos($class, 'mantrabrain_theme_hooks')) {
            //Mantrabrain_Theme_Breadcrumbs
            $path = $this->include_path . 'hooks/';
        }
        if (empty($path) || !$this->load_file($path . $file)) {
            $this->load_file($this->include_path . $file);
        }
    }
}

new Mantrabrain_Lib_Autoloader();
new Mantrabrain_Theme_Hooks();
