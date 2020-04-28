<?php

if (!defined('ABSPATH')) {
    exit;
}
if (!class_exists('CosmosWP_Dynamic_CSS')):

    /**
     * Create Dynamic CSS
     * @package CosmosWP
     * @subpackage CosmosWP
     * @since 1.0.0
     *
     */
    class CosmosWP_Dynamic_CSS {

        /**
         * Main Instance
         *
         * Insures that only one instance of CosmosWP_Dynamic_CSS exists in memory at any one
         * time. Also prevents needing to define globals all over the place.
         *
         * @since    1.0.0
         * @access   public
         *
         * @return object
         */
        public static function instance() {

            // Store the instance locally to avoid private static replication
            static $instance = null;

            // Only run these methods if they haven't been ran previously
            if (null === $instance) {
                $instance = new CosmosWP_Dynamic_CSS;
            }

            // Always return the instance
            return $instance;
        }

        /**
         * Run functionality with hooks
         *
         * @since    1.0.0
         * @access   public
         *
         * @return void
         */
        public function run() {

            add_filter('wp_head', array($this, 'dynamic_css'));

            /*Dynamic CSS file*/
//            add_action('admin_bar_init', array($this, 'save_dynamic_css'), 9999);
            add_action('advanced_import_before_complete_screen', array($this, 'save_dynamic_css'), 9999);
            add_action('customize_save_after', array($this, 'save_dynamic_css'), 9999);

            add_action('wp_enqueue_scripts', array($this, 'dynamic_css_enqueue'), 9999);

        }

        /**
         * Minify CSS
         *
         * @since    1.0.0
         * @access   public
         *
         * @param string $css
         * @return mixed
         */
        public function minify_css($css = '') {

            // Return if no CSS
            if (!$css) {
                return '';
            }

            // remove comments
            $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);

            // Normalize whitespace
            $css = preg_replace('/\s+/', ' ', $css);

            // Remove ; before }
            $css = preg_replace('/;(?=\s*})/', '', $css);

            // Remove space after , : ; { } */ >
            $css = preg_replace('/(,|:|;|\{|}|\*\/|>) /', '$1', $css);

            // Remove space before , ; { }
            $css = preg_replace('/ (,|;|\{|})/', '$1', $css);

            // Strips leading 0 on decimal values (converts 0.5px into .5px)
            $css = preg_replace('/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css);

            // Strips units if value is 0 (converts 0px to 0)
            $css = preg_replace('/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css);

            // Trim
            $css = trim($css);

            // Return minified CSS
            return $css;

        }

        /**
         * Get dynamic CSS
         *
         * @since    1.0.0
         * @access   public
         *
         * @param array $dynamic_css
         *    $dynamic_css = array(
         * 'all'=>'css',
         * '768'=>'css',
         * );
         * @return mixed
         */
        public function get_dynamic_css($dynamic_css = array(), $is_fresh = false) {
            $previous_version = false;
            if( !$is_fresh){
                $cwp_dynamic_css = get_theme_mod('cwp_dynamic_css');
                if( !empty( $cwp_dynamic_css )){
                    return $cwp_dynamic_css;
                }
                $previous_version = true;
            }

            $getCSS      = '';
            $dynamic_css = apply_filters('cosmoswp_dynamic_css', $dynamic_css);

            if (is_array($dynamic_css)) {
                foreach ($dynamic_css as $screen => $css) {
                    if ($screen == "all") {

                        if (is_array($css)) {
                            $getCSS .= implode(" ", $css);
                        } else {
                            $getCSS .= $css;
                        }
                    }
                    elseif ($screen == "tablet") {

                        $getCSS .= '@media (min-width: 720px) {';
                        if (is_array($css)) {
                            $getCSS .= implode(" ", $css);
                        } else {
                            $getCSS .= $css;
                        }
                        $getCSS .= "}";
                    }
                    elseif ($screen == "desktop") {

                        $getCSS .= '@media (min-width: 992px) {';
                        if (is_array($css)) {
                            $getCSS .= implode(" ", $css);
                        } else {
                            $getCSS .= $css;
                        }
                        $getCSS .= "}";
                    }
                }
            }
            $output = cosmoswp_dynamic_css()->minify_css( $getCSS );

            /*previous version fixed*/
            if( $previous_version ){
                set_theme_mod('cwp_dynamic_css', $output);
            }
            return $output;
        }

        /**
         * Callback function for wp_head
         *
         * @since    1.0.0
         * @access   public
         *
         * @return void
         */
        public static function dynamic_css() {

            if ('file' == cosmoswp_get_theme_options('dynamic-css-options')) {

                global $wp_customize;
                $upload_dir = wp_upload_dir();
                if (isset($wp_customize) || !file_exists($upload_dir['basedir'] . '/cosmoswp/dynamic-style.css')) {
                    $output = cosmoswp_dynamic_css()->get_dynamic_css();
                    // Render CSS in the head
                    if (!empty($output)) {
                        echo "<!-- CosmosWP Dynamic CSS -->\n<style type=\"text/css\" id='cosmoswp-head-dynamic-css'>\n" . wp_strip_all_tags($output) . "\n</style>";
                    }
                }

            } else {
                $output = cosmoswp_dynamic_css()->get_dynamic_css();
                // Render CSS in the head
                if (!empty($output)) {
                    echo "<!-- CosmosWP Dynamic CSS -->\n<style type=\"text/css\" id='cosmoswp-head-dynamic-css'>\n" . wp_strip_all_tags($output) . "\n</style>";
                }
            }
        }

        /**
         * Callback function for admin_bar_init
         *
         * @since    1.0.0
         * @access   public
         *
         * @return void
         */
        public static function save_dynamic_css() {

            $output = cosmoswp_dynamic_css()->get_dynamic_css(array(), true);

            /*Get and Set Dynamic Css for later use
            Both in options and file
            */
            set_theme_mod('cwp_dynamic_css', $output);

            // We will probably need to load this file
            require_once(ABSPATH . 'wp-admin' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'file.php');

            global $wp_filesystem;
            $upload_dir = wp_upload_dir();
            $dir        = trailingslashit($upload_dir['basedir']) . 'cosmoswp' . DIRECTORY_SEPARATOR;

            WP_Filesystem();
            $wp_filesystem->mkdir($dir);
            $wp_filesystem->put_contents($dir . 'dynamic-style.css', $output, 0644 );

        }

        /**
         * Callback function for wp_enqueue_scripts
         *
         * @since    1.0.0
         * @access   public
         *
         * @return void
         */
        public static function dynamic_css_enqueue() {

            // If File is not selected
            if ('file' != cosmoswp_get_theme_options('dynamic-css-options')) {
                return;
            }

            global $wp_customize;
            $upload_dir = wp_upload_dir();

            $output = cosmoswp_dynamic_css()->get_dynamic_css();

            // Render CSS from the custom file
            if (!isset($wp_customize) && file_exists($upload_dir['basedir'] . '/cosmoswp/dynamic-style.css') && !empty($output)) {
                wp_enqueue_style('cosmoswp-dynamic', trailingslashit($upload_dir['baseurl']) . 'cosmoswp/dynamic-style.css', false, null);
            }
        }

    }
endif;

/**
 * Create Instance for CosmosWP_Dynamic_CSS
 *
 * @since    1.0.0
 * @access   public
 *
 * @param
 * @return object
 */
if (!function_exists('cosmoswp_dynamic_css')) {

    function cosmoswp_dynamic_css() {

        return CosmosWP_Dynamic_CSS::instance();
    }

    cosmoswp_dynamic_css()->run();
}