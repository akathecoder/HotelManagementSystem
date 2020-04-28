<?php
/**
 * Yatri Class
 *
 * @package Yatri
 * @since 1.0.0
 */

if (!class_exists('Yatri_Core')) :

    /**
     * Yatri Class
     *
     */
    final class Yatri_Core
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
            $this->define_constants();
            $this->init_hooks();
            $this->includes();

        }

        public function define_constants()
        {

        }

        public function init_hooks()
        {
            add_action('after_setup_theme', array($this, 'setup'));
            add_action('after_setup_theme', array($this, 'content_width'), 0);

        }


        public function includes()
        {

            if (is_admin()) {

                require_once YATRI_THEME_DIR . '/core/info/class-yatri-theme-information.php';
            }
            require_once YATRI_THEME_DIR . '/mantrabrain-theme/class-mantrabrain-theme-autoloader.php';

            require_once YATRI_THEME_DIR . 'core/yatri-functions.php';

            require_once YATRI_THEME_DIR . 'core/class-yatri-sections.php';

            require_once YATRI_THEME_DIR . 'core/yatri-template-functions.php';

            require_once YATRI_THEME_DIR . '/core/class-yatri-customizer.php';


            require_once YATRI_THEME_DIR . '/core/class-yatri-loop.php';

            require_once YATRI_THEME_DIR . '/core/class-yatri-excerpt.php';

            require_once YATRI_THEME_DIR . 'core/yatri-misc-functions.php';

            require YATRI_THEME_DIR . 'core/class-yatri-assets.php';

            // Load widgets.
            require_once YATRI_THEME_DIR . 'core/class-yatri-widgets.php';

            // Load hooks.
            require_once YATRI_THEME_DIR . 'core/class-yatri-hooks.php';


            require_once YATRI_THEME_DIR . 'core/dynamic-style.php';

            require_once YATRI_THEME_DIR . 'core/yatri-sidebar-manager.php';

            // Post metabox
            require_once YATRI_THEME_DIR . 'core/metabox/class-yatri-post-metabox.php';
            

            // Elementor Compatibility requires PHP 5.4 for namespaces.
            if (version_compare(PHP_VERSION, '5.4', '>=')) {
                require_once YATRI_THEME_DIR . 'core/compatibility/class-yatri-elementor.php';
            }
            // WooCommerce
            require_once YATRI_THEME_DIR . 'core/compatibility/class-yatri-woocommerce.php';
            //Yatra
            require_once YATRI_THEME_DIR . 'core/compatibility/class-yatri-yatra.php';

            /**
             * Load TGMPA Configs.
             */
            require_once YATRI_THEME_DIR . 'core/tgmpa/class-tgm-plugin-activation.php';
            require_once YATRI_THEME_DIR . 'core/tgmpa/tgmpa-yatri.php';


        }


        function setup()
        {


            /*
              * Make theme available for translation.
             */
            load_theme_textdomain('yatri', get_template_directory() . '/languages');

            # Add default posts and comments RSS feed links to head.
            add_theme_support('automatic-feed-links');

            /*
             * Let WordPress manage the document title.
             * By adding theme support, we declare that this theme does not use a
             * hard-coded <title> tag in the document head, and expect WordPress to
             * provide it for us.
             */
            add_theme_support('title-tag');


            /**
             * Enable support for Post Thumbnails on posts and pages.
             *
             * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
             */
            add_theme_support('post-thumbnails');


            # Register menu locations.
            register_nav_menus(array(
                'primary' => esc_html__('Primary Menu', 'yatri'),
                'top_header_menu' => esc_html__('Top Header Menu', 'yatri'),
                'bottom_footer_menu' => esc_html__('Footer Menu', 'yatri'),
                'offcanvas_menu' => esc_html__('Offcanvas Menu', 'yatri'),

            ));

            /*
             * Switch default core markup for search form, comment form, and comments
             * to output valid HTML5.
             */
            add_theme_support('html5', array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ));



            # Enable support for selective refresh of widgets in Customizer.
            add_theme_support('customize-selective-refresh-widgets');

            # Enable support for custom logo.
            add_theme_support('custom-logo', array(
                'width' => 190,
                'height' => 50,
                'flex-height' => true,
                'flex-width' => true,
            ));

            /*
             * Enable support for Post Formats.
             *
             * See: https://codex.wordpress.org/Post_Formats
             */
            add_theme_support('post-formats', array(
                'aside',
                'image',
                'video',
                'quote',
                'link',
                'gallery',
                'status',
                'audio',
                'chat',
            ));


            /*
            * This theme styles the visual editor to resemble the theme style,
            * specifically font, colors, icons, and column width.
            */

            add_editor_style(array('/assets/css/editor-style.css'));

            // Gutenberg support
            add_theme_support('editor-color-palette', array(
                array(
                    'name' => esc_html__('Tan', 'yatri'),
                    'slug' => 'tan',
                    'color' => '#D2B48C',
                ),
                array(
                    'name' => esc_html__('Yellow', 'yatri'),
                    'slug' => 'yellow',
                    'color' => '#FDE64B',
                ),
                array(
                    'name' => esc_html__('Orange', 'yatri'),
                    'slug' => 'orange',
                    'color' => '#ED7014',
                ),
                array(
                    'name' => esc_html__('Red', 'yatri'),
                    'slug' => 'red',
                    'color' => '#D0312D',
                ),
                array(
                    'name' => esc_html__('Pink', 'yatri'),
                    'slug' => 'pink',
                    'color' => '#b565a7',
                ),
                array(
                    'name' => esc_html__('Purple', 'yatri'),
                    'slug' => 'purple',
                    'color' => '#A32CC4',
                ),
                array(
                    'name' => esc_html__('Blue', 'yatri'),
                    'slug' => 'blue',
                    'color' => '#4E97D8',
                ),
                array(
                    'name' => esc_html__('Green', 'yatri'),
                    'slug' => 'green',
                    'color' => '#00B294',
                ),
                array(
                    'name' => esc_html__('Brown', 'yatri'),
                    'slug' => 'brown',
                    'color' => '#231709',
                ),
                array(
                    'name' => esc_html__('Grey', 'yatri'),
                    'slug' => 'grey',
                    'color' => '#7D7D7D',
                ),
                array(
                    'name' => esc_html__('Black', 'yatri'),
                    'slug' => 'black',
                    'color' => '#000000',
                ),
            ));

            add_theme_support('align-wide');
            add_theme_support('editor-font-sizes', array(
                array(
                    'name' => esc_html__('small', 'yatri'),
                    'shortName' => esc_html__('S', 'yatri'),
                    'size' => 12,
                    'slug' => 'small'
                ),
                array(
                    'name' => esc_html__('regular', 'yatri'),
                    'shortName' => esc_html__('M', 'yatri'),
                    'size' => 16,
                    'slug' => 'regular'
                ),
                array(
                    'name' => esc_html__('larger', 'yatri'),
                    'shortName' => esc_html__('L', 'yatri'),
                    'size' => 36,
                    'slug' => 'larger'
                ),
                array(
                    'name' => esc_html__('huge', 'yatri'),
                    'shortName' => esc_html__('XL', 'yatri'),
                    'size' => 48,
                    'slug' => 'huge'
                )
            ));
            add_theme_support('editor-styles');
            add_theme_support('wp-block-styles');

            add_image_size('yatri-1920-1200', 1920, 1200, true);
            add_image_size('yatri-1920-750', 1920, 750, true);
            add_image_size('yatri-1920-380', 1920, 380, true);
            add_image_size('yatri-600-675', 600, 675, true);
            add_image_size('yatri-1170-710', 1170, 710, true);
        }

        function content_width()
        {
            $GLOBALS['content_width'] = apply_filters('yatri_content_width', 1050);

        }

    }

endif;
