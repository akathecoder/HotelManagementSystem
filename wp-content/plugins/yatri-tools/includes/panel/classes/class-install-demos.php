<?php
/**
 * Install demos page
 *
 * @package Yatri_Tools
 * @category Core
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Start Class
class Yatri_Tools_Install_Demos
{

    /**
     * Start things up
     */
    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_page'), 11);
    }

    /**
     * Add sub menu page for the custom CSS input
     *
     * @since 1.0.0
     */
    public function add_page()
    {

        $title = esc_html__('Install Demos', 'yatri-tools-toolkit');

        add_submenu_page(
            'yatri-panel',
            'Install Demos',
            'Install Demos',
            'manage_options',
            'yatri-tools-install-demos',
            array($this, 'create_admin_page')
        );

    }

    /**
     * Settings page output
     *
     * @since 1.0.0
     */
    public function create_admin_page()
    {

        // Theme branding
        //$brand = yatri_tools_theme_branding();
        ?>

        <div class="yatri-tools-demo-wrap wrap">

            <h2><?php //echo esc_attr( $brand );
                ?><?php esc_attr_e('Yatri Theme Demos', 'yatri-tools-toolkit'); ?></h2>

            <div class="theme-browser rendered">

                <?php
                // Vars
                $demos = Yatri_Tools_Demos::get_demos_data();
                $categories = Yatri_Tools_Demos::get_demo_all_categories($demos); ?>

                <?php if (!empty($categories)) : ?>
                    <div class="yatri-tools-header-bar">
                        <nav class="yatri-tools-navigation">
                            <ul>
                                <li class="active"><a href="#all"
                                                      class="yatri-tools-navigation-link"><?php esc_html_e('All', 'yatri-tools-toolkit'); ?></a>
                                </li>
                                <?php foreach ($categories as $key => $name) : ?>
                                    <li><a href="#<?php echo esc_attr($key); ?>"
                                           class="yatri-tools-navigation-link"><?php echo esc_html($name); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                        <div clas="yatri-tools-search">
                            <input type="text" class="yatri-tools-search-input" name="yatri-tools-search" value=""
                                   placeholder="<?php esc_html_e('Search demos...', 'yatri-tools-toolkit'); ?>">
                        </div>
                    </div>
                <?php endif; ?>

                <div class="themes wp-clearfix">

                    <?php

                    foreach ($demos as $demo => $key) {

                        $screenshot = isset($key['screenshot']) ? $key['screenshot'] : '';


                        // Vars
                        $item_categories = Yatri_Tools_Demos::get_demo_item_categories($key); ?>

                        <div class="theme-wrap" data-categories="<?php echo esc_attr($item_categories); ?>"
                             data-name="<?php echo esc_attr(strtolower($demo)); ?>">

                            <div class="theme yatri-tools-open-popup" data-demo-id="<?php echo esc_attr($demo); ?>">

                                <div class="theme-screenshot">
                                    <img src="<?php echo esc_url($screenshot); ?>"/>

                                    <div class="select-theme">
                                        <span><?php _e('Select Demo', 'yatri-tools-toolkit'); ?></span>
                                    </div>

                                    <div class="demo-import-loader preview-all preview-all-<?php echo esc_attr($demo); ?>"></div>

                                    <div class="demo-import-loader preview-icon preview-<?php echo esc_attr($demo); ?>">
                                        <i class="custom-loader"></i></div>
                                </div>

                                <div class="theme-id-container">

                                    <h2 class="theme-name" id="<?php echo esc_attr($demo); ?>">
                                        <span><?php echo ucwords($demo); ?></span></h2>

                                    <?php
                                    $live_preview_link = 'http://demo.wpyatri.com/' . $demo;
                                    ?>
                                    <div class="theme-actions">
                                        <a class="button button-primary"
                                           href="<?php echo esc_url($live_preview_link); ?>"
                                           target="_blank"><?php _e('Live Preview', 'yatri-tools-toolkit'); ?></a>
                                    </div>

                                </div>

                            </div>

                        </div>

                    <?php } ?>

                </div>

            </div>

        </div>

    <?php }
}

new Yatri_Tools_Install_Demos();