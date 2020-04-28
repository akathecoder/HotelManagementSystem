<?php
/**
 * Yatri_Hooks setup
 *
 * @package Yatri_Hooks
 * @since   1.0.0
 */

/**
 * Main Yatri_Hooks Class.
 *
 * @class Yatri_Hooks
 */
class Yatri_Hooks
{

    /**
     * The single instance of the class.
     *
     * @var Yatri_Hooks
     * @since 1.0.0
     */
    protected static $_instance = null;


    /**
     * Main Yatri_Hooks Instance.
     *
     * Ensures only one instance of Yatri_Hooks is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     * @return Yatri_Hooks - Main instance.
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        self::$_instance->includes();

        return self::$_instance;
    }

    /**
     * Include required core files used in admin and on the frontend.
     */
    public function includes()
    {
        include_once YATRI_THEME_DIR . 'core/hooks/class-yatri-section-hooks.php';
        include_once YATRI_THEME_DIR . 'core/hooks/class-yatri-top-header-hooks.php';
        include_once YATRI_THEME_DIR . 'core/hooks/class-yatri-mid-header-hooks.php';
        include_once YATRI_THEME_DIR . 'core/hooks/class-yatri-breadcrumb-hooks.php';
        include_once YATRI_THEME_DIR . 'core/hooks/class-yatri-bottom-header-hooks.php';


        // Sidebar Hooks
        include_once YATRI_THEME_DIR . 'core/hooks/class-yatri-sidebar-hooks.php';


        include_once YATRI_THEME_DIR . 'core/hooks/class-yatri-miscellaneous-hooks.php';
        include_once YATRI_THEME_DIR . 'core/hooks/class-yatri-template-hooks.php';
        include_once YATRI_THEME_DIR . 'core/hooks/class-yatri-top-footer-hooks.php';
        include_once YATRI_THEME_DIR . 'core/hooks/class-yatri-bottom-footer-hooks.php';


    }


}

Yatri_Hooks::instance();