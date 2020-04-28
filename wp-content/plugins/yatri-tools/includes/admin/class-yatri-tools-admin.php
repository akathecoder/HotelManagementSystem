<?php

class Yatri_Tools_Admin
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'subpage'), 10);

    }

    // action function for above hook

    /**
     * Adds a new top-level page to the administration menu.
     */
    function subpage()
    {
        add_menu_page(
            __('Yatri Options', 'textdomain'),
            __('Yatri Options', 'textdomain'),
            'manage_options',
            'yatri-panel',
            array($this, 'admin_page'),
            '',
            61
        );
    }

    public function admin_page()
    {
        $theme = wp_get_theme();
        if (strtolower($theme->get_template() === 'yatri')) {
            Yatri_About::get_instance(true)->page();
        }

    }
}

new Yatri_Tools_Admin();