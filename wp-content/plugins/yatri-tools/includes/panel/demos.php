<?php
/**
 * Demos
 *
 * @package Yatri_Tools
 * @category Core
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Start Class
if (!class_exists('Yatri_Tools_Demos')) {

    class Yatri_Tools_Demos
    {

        /**
         * Start things up
         */
        public function __construct()
        {

            // Return if not in admin
            if (!is_admin() || is_customize_preview()) {
                return;
            }

            // Import demos page
            if (version_compare(PHP_VERSION, '5.4', '>=')) {
                require_once(YATRI_TOOLS_ABSPATH . 'includes/panel/classes/importers/class-helpers.php');
                require_once(YATRI_TOOLS_ABSPATH . 'includes/panel/classes/class-install-demos.php');
            }

            // Start things
            add_action('admin_init', array($this, 'init'));

            add_action('admin_init', array($this, 'yatri_tools_plugin_redirect'));

            // Demos scripts
            add_action('admin_enqueue_scripts', array($this, 'scripts'));

            // Allows xml uploads
            add_filter('upload_mimes', array($this, 'allow_xml_uploads'));

            // Demos popup
            add_action('admin_footer', array($this, 'popup'));

        }


        public static function yatri_tools_plugin_redirect()
        {
            if (get_option('yatri_tools_plugin_do_activation_redirect', false)) {
                delete_option('yatri_tools_plugin_do_activation_redirect');
                // exit(wp_redirect("themes.php?page=yatri-tools"));
            }
        }

        /**
         * Register the AJAX methods
         *
         * @since 1.0.0
         */
        public function init()
        {

            // Demos popup ajax
            add_action('wp_ajax_yatri_tools_ajax_get_demo_data', array($this, 'ajax_demo_data'));
            add_action('wp_ajax_yatri_tools_ajax_required_plugins_activate', array($this, 'ajax_required_plugins_activate'));

            // Get data to import
            add_action('wp_ajax_yatri_tools_ajax_get_import_data', array($this, 'ajax_get_import_data'));

            // Import XML file
            add_action('wp_ajax_yatri_tools_ajax_import_xml', array($this, 'ajax_import_xml'));

            // Import customizer settings
            add_action('wp_ajax_yatri_tools_ajax_import_theme_settings', array($this, 'ajax_import_theme_settings'));

            // Import widgets
            add_action('wp_ajax_yatri_tools_ajax_import_widgets', array($this, 'ajax_import_widgets'));

            // Import forms
            add_action('wp_ajax_yatri_tools_ajax_import_forms', array($this, 'ajax_import_forms'));

            // After import
            add_action('wp_ajax_yatri_tools_after_import', array($this, 'ajax_after_import'));

        }

        /**
         * Load scripts
         *
         * @since 1.0.0
         */
        public static function scripts()
        {

            $screen = get_current_screen();

            $screen_id = isset($screen->id) ? $screen->id : '';

            if ($screen_id !== 'yatri-options_page_yatri-tools-install-demos') {
                return;
            }

            // CSS
            wp_enqueue_style('yatri-tools-demos-style', plugins_url('/assets/css/demos.css', __FILE__));

            // JS
            wp_enqueue_script('yatri-tools-demos-js', plugins_url('/assets/js/demos.js', __FILE__), array('jquery', 'wp-util', 'updates'), '1.0', true);

            wp_localize_script('yatri-tools-demos-js', 'yatriToolsDemos', array(
                'ajaxurl' => admin_url('admin-ajax.php'),
                'demo_data_nonce' => wp_create_nonce('get-demo-data'),
                'yatri_tools_import_data_nonce' => wp_create_nonce('yatri_tools_import_data_nonce'),
                'content_importing_error' => esc_html__('There was a problem during the importing process resulting in the following error from your server:', 'yatri-tools-toolkit'),
                'button_activating' => esc_html__('Activating', 'yatri-tools-toolkit') . '&hellip;',
                'button_active' => esc_html__('Active', 'yatri-tools-toolkit'),
                'button_activated' => esc_html__('Activated', 'yatri-tools-toolkit'),
            ));

        }

        /**
         * Allows xml uploads so we can import from server
         *
         * @since 1.0.0
         */
        public function allow_xml_uploads($mimes)
        {
            $mimes = array_merge($mimes, array(
                'xml' => 'application/xml'
            ));
            return $mimes;
        }

        /**
         * Get demos data to add them in the Demo Import and Pro Demos plugins
         *
         * @since 1.0.0
         */
        public static function get_demos_data()
        {

            // Return
            return apply_filters('yatri_tools_demos_data', array());

        }

        /**
         * Get the category list of all categories used in the predefined demo imports array.
         *
         * @since 1.0.0
         */
        public static function get_demo_all_categories($demo_imports)
        {
            $categories = array();

            foreach ($demo_imports as $item) {
                if (!empty($item['categories']) && is_array($item['categories'])) {
                    foreach ($item['categories'] as $category) {
                        $categories[sanitize_key($category)] = $category;
                    }
                }
            }

            if (empty($categories)) {
                return false;
            }

            return $categories;
        }

        /**
         * Return the concatenated string of demo import item categories.
         * These should be separated by comma and sanitized properly.
         *
         * @since 1.0.0
         */
        public static function get_demo_item_categories($item)
        {
            $sanitized_categories = array();

            if (isset($item['categories'])) {
                foreach ($item['categories'] as $category) {
                    $sanitized_categories[] = sanitize_key($category);
                }
            }

            if (!empty($sanitized_categories)) {
                return implode(',', $sanitized_categories);
            }

            return false;
        }

        /**
         * Demos popup
         *
         * @since 1.0.0
         */
        public static function popup()
        {
            global $pagenow;

            $page = isset($_GET['page']) ? $_GET['page'] : '';
            // Display on the demos pages
            if (('admin.php' == $pagenow && 'yatri-tools-install-demos' == $page)) { ?>

                <div id="yatri-tools-demo-popup-wrap">
                    <div class="yatri-tools-demo-popup-container">
                        <div class="yatri-tools-demo-popup-content-wrap">
                            <div class="yatri-tools-demo-popup-content-inner">
                                <a href="#" class="yatri-tools-demo-popup-close">×</a>
                                <div id="yatri-tools-demo-popup-content"></div>
                            </div>
                        </div>
                    </div>
                    <div class="yatri-tools-demo-popup-overlay"></div>
                </div>

                <?php
            }
        }

        /**
         * Demos popup ajax.
         *
         * @since 1.0.0
         */
        public static function ajax_demo_data()
        {

            if (!current_user_can('manage_options') || !wp_verify_nonce($_GET['demo_data_nonce'], 'get-demo-data')) {
                die('This action was stopped for security purposes.');
            }

            // Database reset url
            if (is_plugin_active('wordpress-database-reset/wp-reset.php')) {
                $plugin_link = admin_url('tools.php?page=database-reset');
            } else {
                $plugin_link = admin_url('plugin-install.php?s=Wordpress+Database+Reset&tab=search');
            }

            // Get all demos
            $demos = self::get_demos_data();

            // Get selected demo
            $demo = sanitize_textarea_field($_GET['demo_name']);

            // Get required plugins
            $plugins = $demos[$demo]['required_plugins'];

            // Get free plugins
            $free = isset($plugins['free']) ? $plugins['free'] : array();

            // Get premium plugins
            $premium = isset($plugins['premium']) ? $plugins['premium'] : array();

            ?>

            <div id="yatri-tools-demo-plugins">

                <h2 class="title"><?php echo sprintf(esc_html__('Import the %1$s %2$s %3$s demo', 'yatri-tools-toolkit'), '<strong style="color:#4285f4;font-weight:bold;">', esc_attr($demo), '</strong>'); ?></h2>

                <div class="yatri-tools-popup-text">

                    <p><?php echo
                        sprintf(
                            esc_html__('Yatri tools help you browse and import ready made websites with few clicks. We recommend you to upload sample data on a fresh WordPress install to prevent conflicts with your current content. You can use this plugin to reset your site if needed: %1$sWordpress Database Reset%2$s.', 'yatri-tools-toolkit'),
                            '<a href="' . $plugin_link . '" target="_blank">',
                            '</a>'
                        ); ?></p>

                    <div class="yatri-tools-required-plugins-wrap">
                        <h3><?php esc_html_e('Recommended Plugins', 'yatri-tools-toolkit'); ?></h3>
                        <p><?php esc_html_e('For your site to look exactly like this demo, the plugins below need to be activated.', 'yatri-tools-toolkit'); ?></p>
                        <div class="yatri-tools-required-plugins yatri-tools-plugin-installer">
                            <?php
                            self::required_plugins($free, 'free');
                            self::required_plugins($premium, 'premium'); ?>
                        </div>
                    </div>

                </div>

                <a class="yatri-tools-button yatri-tools-plugins-next"
                   href="#"><?php esc_html_e('Next', 'yatri-tools-toolkit'); ?></a>

            </div>

            <form method="post" id="yatri-tools-demo-import-form">

                <input id="yatri_tools_import_demo" type="hidden" name="yatri_tools_import_demo"
                       value="<?php echo esc_attr($demo); ?>"/>

                <div class="yatri-tools-demo-import-form-types">

                    <h2 class="title"><?php esc_html_e('Select what you want to import:', 'yatri-tools-toolkit'); ?></h2>

                    <ul class="yatri-tools-popup-text">
                        <li>
                            <label for="yatri_tools_import_xml">
                                <input id="yatri_tools_import_xml" type="checkbox" name="yatri_tools_import_xml"
                                       checked="checked"/>
                                <strong><?php esc_html_e('Import XML Data', 'yatri-tools-toolkit'); ?></strong>
                                (<?php esc_html_e('pages, posts, images, menus, etc...', 'yatri-tools-toolkit'); ?>)
                            </label>
                        </li>

                        <li>
                            <label for="yatri_tools_theme_settings">
                                <input id="yatri_tools_theme_settings" type="checkbox" name="yatri_tools_theme_settings"
                                       checked="checked"/>
                                <strong><?php esc_html_e('Import Customizer Settings', 'yatri-tools-toolkit'); ?></strong>
                            </label>
                        </li>

                        <li>
                            <label for="yatri_tools_import_widgets">
                                <input id="yatri_tools_import_widgets" type="checkbox" name="yatri_tools_import_widgets"
                                       checked="checked"/>
                                <strong><?php esc_html_e('Import Widgets', 'yatri-tools-toolkit'); ?></strong>
                            </label>
                        </li>

                    </ul>

                </div>

                <?php wp_nonce_field('yatri_tools_import_demo_data_nonce', 'yatri_tools_import_demo_data_nonce'); ?>
                <input type="submit" name="submit" class="yatri-tools-button yatri-tools-import"
                       value="<?php esc_html_e('Install', 'yatri-tools-toolkit'); ?>"/>

            </form>

            <div class="yatri-tools-loader">
                <h2 class="title"><?php esc_html_e('The import process could take some time, please be patient', 'yatri-tools-toolkit'); ?></h2>
                <div class="yatri-tools-import-status yatri-tools-popup-text"></div>
                <?php
                do_action('yatri_tools_after_demo_import_failed_message', $demo);
                ?>
            </div>

            <div class="yatri-tools-last">
                <h2 style="font-size:45px;">🎉 🎉 <?php esc_html_e('Congratulations', 'yatri-tools-toolkit'); ?> 🎉
                    🎉</h2>
                <h3><?php esc_html_e('Successfully Demo Imported!', 'yatri-tools-toolkit'); ?></h3>
                <?php
                do_action('yatri_tools_after_demo_import_success_message', $demo);
                ?>
                <a href="<?php echo esc_url(get_home_url()); ?>"
                   target="_blank"><?php esc_html_e('View Your Site', 'yatri-tools-toolkit'); ?></a>
            </div>

            <?php
            die();
        }

        /**
         * Required plugins.
         *
         * @since 1.0.0
         */
        public function required_plugins($plugins, $return)
        {

            foreach ($plugins as $key => $plugin) {

                $api = array(
                    'slug' => isset($plugin['slug']) ? $plugin['slug'] : '',
                    'init' => isset($plugin['init']) ? $plugin['init'] : '',
                    'name' => isset($plugin['name']) ? $plugin['name'] : '',
                );

                if (!is_wp_error($api)) { // confirm error free

                    $activated_icon = '';

                    // Installed but Inactive.
                    if (file_exists(WP_PLUGIN_DIR . '/' . $plugin['init']) && is_plugin_inactive($plugin['init'])) {

                        $button_classes = 'button activate-now button-primary';
                        $button_text = esc_html__('Activate', 'yatri-tools-toolkit');

                        // Not Installed.
                    } elseif (!file_exists(WP_PLUGIN_DIR . '/' . $plugin['init'])) {

                        $button_classes = 'button install-now';
                        $button_text = esc_html__('Install Now', 'yatri-tools-toolkit');

                        // Active.
                    } else {
                        $button_classes = 'button disabled';
                        $button_text = esc_html__('Activated', 'yatri-tools-toolkit');
                        $activated_icon = '<span class="plugin-activated-icon dashicons dashicons-yes-alt"></span>';
                    } ?>

                    <div class="yatri-tools-plugin yatri-tools-clr yatri-tools-plugin-<?php echo $api['slug']; ?>"
                         data-slug="<?php echo $api['slug']; ?>" data-init="<?php echo $api['init']; ?>">
                        <h2><?php echo $activated_icon;
                            echo $api['name']; ?></h2>

                        <?php
                        // If premium plugins and not installed
                        if ('premium' == $return
                            && !file_exists(WP_PLUGIN_DIR . '/' . $plugin['init'])) { ?>
                            <a class="button" href="https://wpyatri.com/extensions/"
                               target="_blank"><?php esc_html_e('Get This Addon', 'yatri-tools-toolkit'); ?></a>
                            <?php
                        } else { ?>
                            <button class="<?php echo $button_classes; ?>" data-init="<?php echo $api['init']; ?>"
                                    data-slug="<?php echo $api['slug']; ?>"
                                    data-name="<?php echo $api['name']; ?>"><?php echo $button_text; ?></button>
                            <?php
                        } ?>
                    </div>

                    <?php
                }
            }

        }

        /**
         * Required plugins activate
         *
         * @since 1.0.0
         */
        public function ajax_required_plugins_activate()
        {

            if (!current_user_can('install_plugins') || !isset($_POST['init']) || !$_POST['init']) {
                wp_send_json_error(
                    array(
                        'success' => false,
                        'message' => __('No plugin specified', 'yatri-tools-toolkit'),
                    )
                );
            }

            $plugin_init = (isset($_POST['init'])) ? sanitize_text_field($_POST['init']) : '';
            $activate = activate_plugin($plugin_init, '', false, true);

            if (is_wp_error($activate)) {
                wp_send_json_error(
                    array(
                        'success' => false,
                        'message' => $activate->get_error_message(),
                    )
                );
            }

            wp_send_json_success(
                array(
                    'success' => true,
                    'message' => __('Plugin Successfully Activated', 'yatri-tools-toolkit'),
                )
            );

        }

        /**
         * Returns an array containing all the importable content
         *
         * @since 1.0.0
         */
        public function ajax_get_import_data()
        {
            if (!current_user_can('manage_options')) {
                die('This action was stopped for security purposes.');
            }
            check_ajax_referer('yatri_tools_import_data_nonce', 'security');

            echo json_encode(
                array(
                    array(
                        'input_name' => 'yatri_tools_import_xml',
                        'action' => 'yatri_tools_ajax_import_xml',
                        'method' => 'ajax_import_xml',
                        'loader' => esc_html__('Importing XML Data', 'yatri-tools-toolkit')
                    ),

                    array(
                        'input_name' => 'yatri_tools_theme_settings',
                        'action' => 'yatri_tools_ajax_import_theme_settings',
                        'method' => 'ajax_import_theme_settings',
                        'loader' => esc_html__('Importing Customizer Settings', 'yatri-tools-toolkit')
                    ),

                    array(
                        'input_name' => 'yatri_tools_import_widgets',
                        'action' => 'yatri_tools_ajax_import_widgets',
                        'method' => 'ajax_import_widgets',
                        'loader' => esc_html__('Importing Widgets', 'yatri-tools-toolkit')
                    ),
                )
            );

            die();
        }

        /**
         * Import XML file
         *
         * @since 1.0.0
         */
        public function ajax_import_xml()
        {
            if (!current_user_can('manage_options') || !wp_verify_nonce($_POST['yatri_tools_import_demo_data_nonce'], 'yatri_tools_import_demo_data_nonce')) {
                die('This action was stopped for security purposes.');
            }

            // Get the selected demo
            $demo_type = sanitize_text_field($_POST['yatri_tools_import_demo']);

            // Get demos data
            $all_demo = Yatri_Tools_Demos::get_demos_data();
            $demo = isset($all_demo[$demo_type]) ? $all_demo[$demo_type] : array();

            // Content file
            $xml_file = isset($demo['xml_file']) ? $demo['xml_file'] : '';

            // Delete the default post and page
            $sample_page = get_page_by_path('sample-page', OBJECT, 'page');
            $hello_world_post = get_page_by_path('hello-world', OBJECT, 'post');

            if (!is_null($sample_page)) {
                wp_delete_post($sample_page->ID, true);
            }

            if (!is_null($hello_world_post)) {
                wp_delete_post($hello_world_post->ID, true);
            }

            // Import Posts, Pages, Images, Menus.
            $result = $this->process_xml($xml_file);

            if (is_wp_error($result)) {
                echo json_encode($result->errors);
            } else {
                echo 'successful import';
            }

            die();
        }

        /**
         * Import customizer settings
         *
         * @since 1.0.0
         */
        public function ajax_import_theme_settings()
        {
            if (!current_user_can('manage_options') || !wp_verify_nonce($_POST['yatri_tools_import_demo_data_nonce'], 'yatri_tools_import_demo_data_nonce')) {
                die('This action was stopped for security purposes.');
            }

            // Include settings importer
            include YATRI_TOOLS_ABSPATH . 'includes/panel/classes/importers/class-settings-importer.php';

            // Get the selected demo
            $demo_type = sanitize_text_field($_POST['yatri_tools_import_demo']);
            $all_demo = Yatri_Tools_Demos::get_demos_data();

            $demo = isset($all_demo[$demo_type]) ? $all_demo[$demo_type] : array();


            // Settings file
            $theme_settings = isset($demo['theme_settings']) ? $demo['theme_settings'] : '';

            // Import settings.
            $settings_importer = new Yatri_Tools_Settings_Importer();
            $result = $settings_importer->process_import_file($theme_settings);

            if (is_wp_error($result)) {
                echo json_encode($result->errors);
            } else {
                echo 'successful import';
            }

            die();
        }

        /**
         * Import widgets
         *
         * @since 1.0.0
         */
        public function ajax_import_widgets()
        {
            if (!current_user_can('manage_options') || !wp_verify_nonce($_POST['yatri_tools_import_demo_data_nonce'], 'yatri_tools_import_demo_data_nonce')) {
                die('This action was stopped for security purposes.');
            }

            // Include widget importer
            include YATRI_TOOLS_ABSPATH . 'includes/panel/classes/importers/class-widget-importer.php';

            // Get the selected demo
            $demo_type = sanitize_text_field($_POST['yatri_tools_import_demo']);
            $all_demo = Yatri_Tools_Demos::get_demos_data();
            $demo = isset($all_demo[$demo_type]) ? $all_demo[$demo_type] : array();


            // Widgets file
            $widgets_file = isset($demo['widgets_file']) ? $demo['widgets_file'] : '';

            // Import settings.
            $widgets_importer = new Yatri_Tools_Widget_Importer();
            $result = $widgets_importer->process_import_file($widgets_file);

            if (is_wp_error($result)) {
                echo json_encode($result->errors);
            } else {
                echo 'successful import';
            }

            die();
        }


        /**
         * After import
         *
         * @since 1.0.0
         */
        public function ajax_after_import()
        {
            if (!current_user_can('manage_options') || !wp_verify_nonce($_POST['yatri_tools_import_demo_data_nonce'], 'yatri_tools_import_demo_data_nonce')) {
                die('This action was stopped for security purposes.');
            }

            // If XML file is imported
            if ($_POST['yatri_tools_import_is_xml'] === 'true') {

                // Get the selected demo
                $demo_type = sanitize_text_field($_POST['yatri_tools_import_demo']);

                // Get demos data
                $all_demo = Yatri_Tools_Demos::get_demos_data();
                $demo = isset($all_demo[$demo_type]) ? $all_demo[$demo_type] : array();

                // Elementor width setting
                $elementor_width = isset($demo['elementor_width']) ? $demo['elementor_width'] : '';

                // Reading settings
                $homepage_title = isset($demo['home_title']) ? $demo['home_title'] : 'Home';
                $blog_title = isset($demo['blog_title']) ? $demo['blog_title'] : '';

                // Posts to show on the blog page
                $posts_to_show = isset($demo['posts_to_show']) ? $demo['posts_to_show'] : '';


                // Product image size
                $image_size = isset($demo['woo_image_size']) ? $demo['woo_image_size'] : '';
                $thumbnail_size = isset($demo['woo_thumb_size']) ? $demo['woo_thumb_size'] : '';
                $crop_width = isset($demo['woo_crop_width']) ? $demo['woo_crop_width'] : '';
                $crop_height = isset($demo['woo_crop_height']) ? $demo['woo_crop_height'] : '';


                // Set imported menus to registered theme locations
                $locations = get_theme_mod('nav_menu_locations');
                $menus = wp_get_nav_menus();

                if ($menus) {

                    foreach ($menus as $menu) {

                        if ($menu->name == 'Primary Menu') {
                            $locations['primary'] = $menu->term_id;
                        } else if ($menu->name == 'Top Header Menu') {
                            $locations['top_header_menu'] = $menu->term_id;
                        } else if ($menu->name == 'Footer Menu') {
                            $locations['bottom_footer_menu'] = $menu->term_id;
                        } else if ($menu->name == 'Offcanvas Menu') {
                            $locations['offcanvas_menu'] = $menu->term_id;
                        }

                    }

                }

                // Set menus to locations
                set_theme_mod('nav_menu_locations', $locations);

                // Disable Elementor default settings
                update_option('elementor_disable_color_schemes', 'yes');
                update_option('elementor_disable_typography_schemes', 'yes');
                if (!empty($elementor_width)) {
                    update_option('elementor_container_width', $elementor_width);
                }

                // Assign front page and posts page (blog page).
                $home_page = get_page_by_title($homepage_title);
                $blog_page = get_page_by_title($blog_title);

                update_option('show_on_front', 'page');

                if (is_object($home_page)) {
                    update_option('page_on_front', $home_page->ID);
                }

                if (is_object($blog_page)) {
                    update_option('page_for_posts', $blog_page->ID);
                }

                // Posts to show on the blog page
                if (!empty($posts_to_show)) {
                    update_option('posts_per_page', $posts_to_show);
                }

            }

            die();
        }

        /**
         * Import XML data
         *
         * @since 1.0.0
         */
        public function process_xml($file)
        {

            $response = Yatri_Tools_Demos_Helpers::get_remote($file);

            // No sample data found
            if ($response === false) {
                return new WP_Error('xml_import_error', __('Can not retrieve sample data xml file. The server may be down at the moment please try again later. If you still have issues contact the theme developer for assistance.', 'yatri-tools-toolkit'));
            }

            // Write sample data content to temp xml file
            $temp_xml = YATRI_TOOLS_ABSPATH . 'includes/panel/classes/importers/temp.xml';
            file_put_contents($temp_xml, $response);

            // Set temp xml to attachment url for use
            $attachment_url = $temp_xml;

            // If file exists lets import it
            if (file_exists($attachment_url)) {
                $this->import_xml($attachment_url);
            } else {
                // Import file can't be imported - we should die here since this is core for most people.
                return new WP_Error('xml_import_error', __('The xml import file could not be accessed. Please try again or contact the theme developer.', 'yatri-tools-toolkit'));
            }

        }

        /**
         * Import XML file
         *
         * @since 1.0.0
         */
        private function import_xml($file)
        {

            // Make sure importers constant is defined
            if (!defined('WP_LOAD_IMPORTERS')) {
                define('WP_LOAD_IMPORTERS', true);
            }

            // Import file location
            $import_file = ABSPATH . 'wp-admin/includes/import.php';

            // Include import file
            if (!file_exists($import_file)) {
                return;
            }

            // Include import file
            require_once($import_file);

            // Define error var
            $importer_error = false;

            if (!class_exists('WP_Importer')) {
                $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';

                if (file_exists($class_wp_importer)) {
                    require_once $class_wp_importer;
                } else {
                    $importer_error = __('Can not retrieve class-wp-importer.php', 'yatri-tools-toolkit');
                }
            }

            if (!class_exists('WP_Import')) {
                $class_wp_import = YATRI_TOOLS_ABSPATH . 'includes/panel/classes/importers/class-wordpress-importer.php';

                if (file_exists($class_wp_import)) {
                    require_once $class_wp_import;
                } else {
                    $importer_error = __('Can not retrieve wordpress-importer.php', 'yatri-tools-toolkit');
                }
            }

            // Display error
            if ($importer_error) {
                return new WP_Error('xml_import_error', $importer_error);
            } else {

                // No error, lets import things...
                if (!is_file($file)) {
                    $importer_error = __('Sample data file appears corrupt or can not be accessed.', 'yatri-tools-toolkit');
                    return new WP_Error('xml_import_error', $importer_error);
                } else {
                    $importer = new WP_Import();
                    $importer->fetch_attachments = true;
                    $importer->import($file);

                    // Clear sample data content from temp xml file
                    $temp_xml = YATRI_TOOLS_ABSPATH . 'includes/panel/classes/importers/temp.xml';
                    file_put_contents($temp_xml, '');
                }
            }
        }

    }

}
new Yatri_Tools_Demos();
?>