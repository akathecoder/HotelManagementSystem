<?php
/**
 * Yatri_Customizer setup
 *
 * @package Yatri_Customizer
 * @since   1.0.0
 */

/**
 * Main Yatri_Customizer Class.
 *
 * @class Yatri_Customizer
 */
class Yatri_Customizer
{

    /**
     * The single instance of the class.
     *
     * @var Yatri_Customizer
     * @since 1.0.0
     */
    protected static $_instance = null;


    /**
     * Main Yatri_Customizer Instance.
     *
     * Ensures only one instance of Yatri_Customizer is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     * @return Yatri_Customizer - Main instance.
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        self::$_instance->includes();
        self::$_instance->hooks();

        return self::$_instance;
    }

    public function hooks()
    {

        add_action('wp_loaded', array($this, 'init_customizer_options'));


        add_action('customize_register', array($this, 'register_panel'));
        add_action('customize_register', array($this, 'register_control'));
        add_action('customize_register', array($this, 'customize_options'));
        add_action('customize_register', array($this, 'move_default_options'));

        add_action('customize_preview_init', array($this, 'customize_enqueue'));


        add_action('customize_register', array($this, 'sections'));
        add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);


    }

    public function init_customizer_options()
    {

        yatri_init_customizer_options();

    }

    public function sections($manager)
    {
        // Load custom sections.

        require_once YATRI_THEME_DIR . '/core/customizer/sections/customizer-pro/section-pro.php';

        // Register custom section types.
        $manager->register_section_type('Yatri_Customize_Section_Pro');

        // Register sections.
        $manager->add_section(
            new Yatri_Customize_Section_Pro(
                $manager,
                'yatri-pro',
                array(
                    'pro_text' => esc_html__('Get More Features in Yatri Premium', 'yatri'),
                    'pro_url' => 'https://wpyatri.com/pricing/?ref=yatricustomizer',
                    'priority' => 0
                )
            )
        );
    }

    public function enqueue_control_scripts()
    {

        $script_uri = YATRI_THEME_URI . 'core/customizer/sections/customizer-pro/';

        wp_enqueue_script('yatri-customizer-pro-control-js', $script_uri . 'pro.js', array('customize-controls'));
        wp_enqueue_style('yatri-customizer-pro-control-css', $script_uri . 'pro.css');
    }

    /**
     * Register custom controls
     *
     * @param WP_Customize_Manager $wp_customize Manager instance.
     */
    public function register_panel($wp_customize)
    {
        $wp_customize->register_panel_type('Mantrabrain_Theme_Customizer_Panel');
        $wp_customize->register_section_type('Mantrabrain_Theme_Customizer_Section');

    }

    public function register_control($wp_customize)
    {
        $wp_customize->register_control_type('Mantrabrain_Theme_Customizer_Control_Buttonset');
        $wp_customize->register_control_type('Mantrabrain_Theme_Customizer_Control_Editor');
    }

    public function customize_enqueue()
    {
        $options = array(
            'post_message_modal_keys' =>
                array(
                    "body_and_paragraph_typography",
                    "h1_typography",
                    "h2_typography",
                    "h3_typography",
                    "h4_typography",
                    "h5_typography",
                    "h6_typography",
                    "widget_title_typography",

                    "main_layout_boxed_styling",
                    "main_layout_full_width_styling",
                    "yatri_button_style_design",
                    "yatri_form_style_design",
                    "yatri_breadcrumb_style_design",
                    "top_header_design",
                    "top_header_navigation_menu_design",
                    "top_header_button_style_design",
                    "top_header_search_form_design",
                    "top_header_office_info_design",
                    "top_header_social_icons_design",
                    "top_header_offcanvas_menu_design",
                    "top_header_branding_style_design",
                    "top_header_custom_html_design",

                    "mid_header_design",
                    "mid_header_navigation_menu_design",
                    "mid_header_button_style_design",
                    "mid_header_search_form_design",
                    "mid_header_office_info_design",
                    "mid_header_social_icons_design",
                    "mid_header_offcanvas_menu_design",
                    "mid_header_branding_style_design",
                    "mid_header_custom_html_design",

                    "bottom_header_design",
                    "bottom_header_navigation_menu_design",
                    "bottom_header_button_style_design",
                    "bottom_header_search_form_design",
                    "bottom_header_office_info_design",
                    "bottom_header_social_icons_design",
                    "bottom_header_offcanvas_menu_design",
                    "bottom_header_branding_style_design",
                    "bottom_header_custom_html_design",

                    "blog_archive_design_style",
                    "blog_archive_page_content_wrapper_design_styling",
                    "blog_archive_page_article_design_styling",
                    "blog_archive_page_readmore_design_styling",
                    "blog_archive_pagination_design_style",

                    "single_post_design_style",
                    "single_post_article_design_styling",

                    "page_design_style",
                    "page_article_design_styling",

                    "left_sidebar_design_style",
                    "right_sidebar_design_style",

                    "footer_widgets_section_design_style",
                    "footer_widgets_area_design_style",

                    "bottom_footer_section_design_style",
                    "bottom_footer_navigation_menu_design",
                    "bottom_footer_button_style_design",
                    "bottom_footer_office_info_design",
                    "bottom_footer_social_icons_design",
                    "bottom_footer_custom_html_design",
                    "bottom_footer_copyright_design",
                )
        );

        $options = apply_filters('yatri_customizer_preview_localize_object', $options);

        wp_enqueue_script('yatri-customize-preview', YATRI_THEME_URI . 'assets/js/customizer/customize-preview.js', array('customize-preview', 'jquery'), YATRI_THEME_VERSION, true);
        wp_localize_script('yatri-customize-preview', 'yatriCustomizerPreviewObject', $options);

    }

    public function move_default_options($wp_customize)
    {
        // Move custom logo setting
        $wp_customize->get_control('custom_logo')->section = 'yatri_section_logo_options';
        $wp_customize->get_control('blogname')->section = 'yatri_section_logo_options';
        $wp_customize->get_setting('blogname')->transport = 'postMessage';
        $wp_customize->get_control('blogdescription')->section = 'yatri_section_logo_options';
        $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
        $wp_customize->get_control('display_header_text')->section = 'yatri_section_logo_options';
        $wp_customize->get_control('site_icon')->section = 'yatri_section_logo_options';

        // priority
        $wp_customize->get_control('custom_logo')->priority = 100;
        $wp_customize->get_control('blogname')->priority = 200;
        $wp_customize->get_control('blogdescription')->priority = 300;
        $wp_customize->get_control('display_header_text')->priority = 400;
        $wp_customize->get_control('site_icon')->priority = 500;


        $wp_customize->get_setting('background_color')->transport = 'refresh';
        $wp_customize->get_setting('background_image')->transport = 'refresh';
    }

    public function customize_options($wp_customize)
    {

        $default = yatri_get_default_theme_options();

        // Theme Panel
        require_once YATRI_THEME_DIR . '/core/customizer/panels/theme-panel.php';

        // Sections

        // Top Header Options

        require_once YATRI_THEME_DIR . '/core/customizer/sections/colors.php';
        require_once YATRI_THEME_DIR . '/core/customizer/sections/theme-base-options.php';
        require_once YATRI_THEME_DIR . '/core/customizer/sections/header-options.php';
        require_once YATRI_THEME_DIR . '/core/customizer/sections/blog-archive-page-options.php';
        require_once YATRI_THEME_DIR . '/core/customizer/sections/single-post-options.php';
        require_once YATRI_THEME_DIR . '/core/customizer/sections/single-page-options.php';
        require_once YATRI_THEME_DIR . '/core/customizer/sections/sidebars-options.php';
        require_once YATRI_THEME_DIR . '/core/customizer/sections/footer-options.php';


    }

    /**
     * Include required core files used in admin and on the frontend.
     */
    public
    function includes()
    {
        // Customizer default.
        require_once YATRI_THEME_DIR . '/core/customizer/core.php';

        // Customizer functios.
        require_once YATRI_THEME_DIR . '/core/customizer/functions.php';

        require_once YATRI_THEME_DIR . '/core/customizer/config/customizer-modal-config.php';
        require_once YATRI_THEME_DIR . '/core/customizer/customizer-hooks.php';

        // Customizer sanitzation.
        require_once YATRI_THEME_DIR . '/core/customizer/sanitization.php';
        require_once YATRI_THEME_DIR . '/core/customizer/active-callback.php';


    }


}

Yatri_Customizer::instance();