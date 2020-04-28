<?php
/**
 * Plugin Name:       Yatri Tools
 * Plugin URI:        https://wordpress.org/plugins/yatri-tools
 * Description:       Extend Yatri theme feature with demo importer functionality, prebuilt header templates & add Elementor widgets, blocks, pages template library
 * Version:           1.0.11
 * Author:            Mantrabrain
 * Author URI:        https://mantrabrain.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       yatri-tools
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Define YATRI_TOOLS_PLUGIN_FILE.
if (!defined('YATRI_TOOLS_FILE')) {
    define('YATRI_TOOLS_FILE', __FILE__);
}

// Define YATRI_TOOLS_VERSION.
if (!defined('YATRI_TOOLS_VERSION')) {
    define('YATRI_TOOLS_VERSION', '1.0.11');
}

// Define YATRI_TOOLS_PLUGIN_URI.
if (!defined('YATRI_TOOLS_PLUGIN_URI')) {
    define('YATRI_TOOLS_PLUGIN_URI', plugins_url('', YATRI_TOOLS_FILE) . '/');
}

// Define YATRI_TOOLS_PLUGIN_DIR.
if (!defined('YATRI_TOOLS_PLUGIN_DIR')) {
    define('YATRI_TOOLS_PLUGIN_DIR', plugin_dir_path(YATRI_TOOLS_FILE));
}


// Include the main Yatri_Tools class.
if (!class_exists('Yatri_Tools')) {
    include_once dirname(__FILE__) . '/includes/class-yatri-tools.php';
}


/**
 * Main instance of Yatri_Tools.
 *
 * Returns the main instance of Yatri_Tools to prevent the need to use globals.
 *
 * @since 1.0.0
 * @return Yatri_Tools
 */
function yatri_tools_instance()
{
    return Yatri_Tools::instance();
}

// Global for backwards compatibility.
$GLOBALS['yatri-tools-instance'] = yatri_tools_instance();
