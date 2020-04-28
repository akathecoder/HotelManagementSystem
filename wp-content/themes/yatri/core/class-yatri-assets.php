<?php
/**
 * Yatri Class
 *
 * @package Yatri
 * @since 1.0.0
 */

if (!class_exists('Yatri_Assets')) :

    class Yatri_Assets
    {

        /**
         * Instance
         *
         * @since 1.0.0
         *
         * @access private
         * @var object Class object.
         */
        private static $instance;

        /**
         * Initiator
         *
         * @since 1.0.0
         *
         * @return object initialized object of class.
         */
        public static function get_instance()
        {
            if (!isset(self::$instance)) {
                self::$instance = new self;
            }
            self::$instance->init();
            return self::$instance;
        }

        /**
         * Initialize the theme
         *
         * @since 1.0.0
         */
        public function init()
        {
            $this->init_hooks();
        }


        public function init_hooks()
        {
            add_action('yatri_get_fonts', array($this, 'add_fonts'), 10);
            add_filter('wp_enqueue_scripts', array($this, 'scripts'), 10);
            add_action('enqueue_block_editor_assets', array($this, 'block_editor_styles'));
            add_action('admin_enqueue_scripts', array($this, 'register_scripts'));


        }

        function register_scripts($hook)
        {
            wp_register_script('yatri-color-alpha', YATRI_THEME_URI . '/assets/js/wp-alpha-colorpicker.js', array('wp-color-picker'), YATRI_THEME_VERSION, true);

        }

        function yatri_enqueue($scripts)
        {

            # Do not enqueue anything if no array is supplied.
            if (!is_array($scripts)) return;

            $scripts = apply_filters('yatri_scripts', $scripts);

            foreach ($scripts as $script) {

                # Do not try to enqueue anything if handler is not supplied.
                if (!isset($script['handler']))
                    continue;

                # use get_theme_file_uri(). So that child theme can overwrite it.
                # @link  https://developer.wordpress.org/reference/functions/get_theme_file_uri/

                if (!isset($script['version'])) {
                    $version = null;
                } else {
                    $version = $script['version'];
                }

                # Enqueue each vendor's style
                if (isset($script['style'])) {

                    $path = get_theme_file_uri('/assets/lib/' . $script['style']);
                    if (isset($script['absolute'])) {
                        $path = $script['style'];
                    }

                    $dependency = array();
                    if (isset($script['dependency'])) {
                        $dependency = $script['dependency'];
                    }
                    wp_enqueue_style($script['handler'], $path, $dependency, $version);
                }

                # Enqueue each vendor's script
                if (isset($script['script'])) {

                    $path = get_theme_file_uri('/assets/lib/' . $script['script']);
                    if (isset($script['absolute'])) {
                        $path = $script['script'];
                    }

                    $dependency = array('jquery');
                    if (isset($script['dependency'])) {
                        $dependency = $script['dependency'];
                    }

                    $prefix = '';
                    if (isset($script['prefix'])) {
                        $prefix = $script['prefix'];
                    }

                    wp_enqueue_script($prefix . $script['handler'], $path, $dependency, $version, true);
                }
            }
        }

        public function scripts()
        {


            # Enqueue Vendor's Script & Style
            $scripts = array(
                array(
                    'handler' => 'yatri-google-fonts',
                    'style' => esc_url('//fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700|Rubik:400,500,700,900'),
                    'absolute' => true
                ),

                array(
                    'handler' => 'yatri-style',
                    'style' => get_stylesheet_uri(),
                    'absolute' => true,
                ), array(
                    'handler' => 'yatri-main',
                    'style' => get_theme_file_uri('/assets/css/yatri.css'),
                    'absolute' => true,
                    'version' => YATRI_THEME_VERSION
                ),
                array(
                    'handler' => 'yatri-script',
                    'script' => get_theme_file_uri('/assets/js/yatri.js'),
                    'absolute' => true,
                    'prefix' => '',
                    'dependency' => array('jquery')
                )
            );


            Mantrabrain_Theme_Helper_Typo::render_fonts();

            $this->yatri_enqueue(apply_filters('yatri_scripts_styles', $scripts));

            $locale = apply_filters('yatri_localize_var', array(

                'is_admin_bar' => is_admin_bar_showing() ? true : false,

            ));

            wp_localize_script('yatri-script', 'yatri_obj', $locale);

            if (is_singular() && comments_open()) {
                wp_enqueue_script('comment-reply');
            }
        }

        public function block_editor_styles()
        {
            // Google Font
            wp_enqueue_style('yatri-google-font', 'https://fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700,700i|Rubik:300,400,400i,500,700,700i', false);
        }

        public function add_fonts()
        {
            $yatri_customizer_modal_all_fields = yatri_customizer_modal_all_fields('', true);

            foreach ($yatri_customizer_modal_all_fields as $field_id => $field_array) {

                foreach ($field_array as $field) {

                    $type = isset($field['type']) ? $field['type'] : '';

                    if ($type == 'font') {

                        $font_family = yatri_get_modal_option($field_id, "{$field_id}_font_family");
                        $font_weight = yatri_get_modal_option($field_id, "{$field_id}_font_weight");
                        $font_subset = yatri_get_modal_option($field_id, "{$field_id}_font_languages");
                        if ($font_weight == '') {
                            $font_weight = 'regular';
                        }
                        if (!empty($font_family) && !empty($font_weight)) {
                            Mantrabrain_Theme_Helper_Typo::add_font($font_family, $font_weight);
                        }
                        if (!empty($font_family) && !empty($font_subset)) {
                            Mantrabrain_Theme_Helper_Typo::add_font($font_family, $font_subset);
                        }
                    }
                }
            }


        }

    }

endif;
Yatri_Assets::get_instance();