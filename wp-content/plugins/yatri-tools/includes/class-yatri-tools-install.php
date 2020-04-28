<?php
/**
 * Yatri_Tools install setup
 *
 * @package Yatri_Tools
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

/**
 * Main Yatri_Tools_Install Class.
 *
 * @class Yatri_Tools
 */
final class Yatri_Tools_Install
{

    public static function install()
    {
        if (!is_blog_installed()) {
            return;
        }
        add_option('yatri_tools_plugin_do_activation_redirect', true);
        update_option('yatri_tools_version', YATRI_TOOLS_VERSION);


        // Check if we are not already running this routine.
        if ('yes' === get_transient('yatri_tools_installing')) {
            return;
        }

        // If we made it till here nothing is running yet, lets set the transient now.
        set_transient('yatri_tools_installing', 'yes', MINUTE_IN_SECONDS * 10);
        self::create_files();


        delete_transient('yatri_tools_installing');

    }

    public static function create_files()
    {
        // Bypass if filesystem is read-only and/or non-standard upload system is used.
        if (apply_filters('yatri_tools_install_skip_create_files', false)) {
            return;
        }

        // Install files and folders for uploading files and prevent hotlinking.
        $upload_dir = wp_upload_dir();

        $download_method = get_option('yatri_tools_file_download_method', 'force');

        $files = array(
            array(
                'base' => $upload_dir['basedir'] . '/yatri-tools-upload',
                'file' => 'index.html',
                'content' => '',
            ),
            array(
                'base' => YATRI_TOOLS_UPLOAD_DIR,
                'file' => '.htaccess',
                'content' => '<FilesMatch ".*\.(css|js)$">
    Order Allow,Deny
    Allow from all
</FilesMatch>',
            ),
            array(
                'base' => YATRI_TOOLS_UPLOAD_DIR,
                'file' => 'yatri-tools-dynamic.css',
                'content' => "// YATRI DYNAMIC CSS CONTENT GOES HERE\n",
            ),
            array(
                'base' => YATRI_TOOLS_UPLOAD_DIR,
                'file' => 'index.html',
                'content' => '',
            ),
        );

        if ('redirect' !== $download_method) {
            $files[] = array(
                'base' => $upload_dir['basedir'] . '/yatri-tools-upload',
                'file' => '.htaccess',
                'content' => '<FilesMatch ".*\.(css|js)$">
    Order Allow,Deny
    Allow from all
</FilesMatch>',
            );
        }

        $has_created_dir = false;
        foreach ($files as $file) {
            if (wp_mkdir_p($file['base']) && !file_exists(trailingslashit($file['base']) . $file['file'])) {
                $file_handle = @fopen(trailingslashit($file['base']) . $file['file'], 'w'); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged, WordPress.WP.AlternativeFunctions.file_system_read_fopen
                if ($file_handle) {
                    fwrite($file_handle, $file['content']); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_read_fwrite
                    fclose($file_handle); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_read_fclose
                    if (!$has_created_dir) {
                        $has_created_dir = true;
                    }
                }
            }
        }
        if (file_exists(trailingslashit(YATRI_TOOLS_UPLOAD_DIR)) . 'index.html') {
            update_option('yatri_tools_upload_dir_created', 'yes');
        }


    }


}