<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Main include functions ( to support child theme ) that child theme can override file too
 *
 * @since CosmosWP 1.0.0
 *
 * @param string $file_path , path from the theme
 * @return string full path of file inside theme
 *
 */
if (!function_exists('cosmoswp_file_directory')) {

    function cosmoswp_file_directory($file_path) {
        if (file_exists(trailingslashit(get_stylesheet_directory()) . $file_path)) {
            return trailingslashit(get_stylesheet_directory()) . $file_path;
        } else {
            return trailingslashit(COSMOSWP_PATH ) . $file_path;
        }
    }
}


if (!function_exists('cosmoswp_is_null_or_empty')) {

    /**
     * Check empty or null
     *
     * @since  CosmosWP 1.0.0
     *
     * @param string $str , string
     * @return boolean
     *
     */
    function cosmoswp_is_null_or_empty($str) {
        return (!isset($str) || trim($str) === '');
    }
}

/*
* file for Addons
*/
require cosmoswp_file_directory('inc/addons/addons-base.php');/*checked*/
require cosmoswp_file_directory('inc/addons/edd/edd.php');
require cosmoswp_file_directory('inc/addons/woocommerce/woocommerce.php');

/*
* file for meta box
*/
require cosmoswp_file_directory('inc/metabox/meta-box.php');/*checked*/

/*
* file for Custom
*/
require cosmoswp_file_directory('inc/functions/custom-functions.php');/*checked*/

/*
* file for dynamic css
 * TODO removing $previous_version
*/
require cosmoswp_file_directory('inc/hooks/dynamic-css.php');

/*
* file for library
 * TODO removing $previous_version
*/
require cosmoswp_file_directory('inc/library/typography-fonts/typography-fonts.php');/*checked*/

/*For Editor Styles*/
require cosmoswp_file_directory('inc/editor-style.php');/*checked*/

/*
* file for customizer theme options
*/
require cosmoswp_file_directory('inc/customizer/customizer.php');

/*
* file for sidebar and widgets
*/
require cosmoswp_file_directory('inc/sidebar-widget/sidebar.php');/*checked*/

/*
* file for additional functions files
*/
require cosmoswp_file_directory('inc/functions.php');/*checked*/

/*
* file for template functions files
*/
require cosmoswp_file_directory('inc/functions/template-functions.php');/*checked*/

/*
* file for template post layout files
*/
require cosmoswp_file_directory('inc/functions/post-layout.php');/*checked*/

/*
* Files for hooks
*/
/*
* file for Templates
*/
require cosmoswp_file_directory('inc/hooks/templates.php');/*checked*/

require cosmoswp_file_directory('inc/default-hooks.php');/*checked*/

/*
* file for user contact
*/
require cosmoswp_file_directory('inc/hooks/user-contact.php');/*checked*/

/*
* file for breadcrumb
*/
require cosmoswp_file_directory('inc/hooks/breadcrumb.php');/*checked*/

if( is_admin()){
    /*
 * CosmosWP  notice and advanced import
 * */
    require cosmoswp_file_directory('inc/admin/advanced-import.php');
    require cosmoswp_file_directory('inc/admin/notice.php');
    require cosmoswp_file_directory('inc/admin/intro.php');
}