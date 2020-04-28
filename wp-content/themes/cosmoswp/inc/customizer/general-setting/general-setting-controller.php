<?php
/**
 * Header Builder and Customizer Options
 * @package CosmosWP
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('CosmosWP_General_Setting_Controller')) :

    class CosmosWP_General_Setting_Controller {

        /**
         * Panel ID, use for builder ID too
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $section = 'cosmoswp-general-setting';

        /**
         * Builder Sections and Controller ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $general_setting_section = 'cosmoswp-general-setting-section';

        /**
         * Main Instance
         *
         * Insures that only one instance of CosmosWP_General_Setting_Controller exists in memory at any one
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
                $instance = new CosmosWP_General_Setting_Controller;
            }

            // Always return the instance
            return $instance;
        }

        /**
         *  Run functionality with hooks
         *
         * @since    1.0.0
         * @access   public
         *
         * @return void
         */
        public function run() {

            add_filter('cosmoswp_default_theme_options', array($this, 'general_setting_defaults'));
            add_action('customize_register', array($this, 'customize_register'), 100);
            add_filter('cosmoswp_dynamic_css', array($this, 'dynamic_css'), 100);
            add_filter('cosmoswp_enqueue_google_fonts', array($this, 'enqueue_google_fonts'), 1);
        }

        /**
         * Callback functions for cosmoswp_default_theme_options,
         * Add Header Builder defaults values
         *
         * @since    1.0.0
         * @access   public
         *
         * @param array $default_options
         * @return array
         */
        public function general_setting_defaults($default_options = array()) {

            $general_setting_defaults = array(

                /*general setting */
                'dynamic-css-options'               => 'wp-head',
                'general-setting-layout'            => 'cwp-full-width-body',
                'general-content-layout'            => 'cwp-content-default',
                'general-setting-color-options'     => json_encode(array(

                    'primary-color'    => '#275cf6',
                    'text-color'       => '#333333',
                    'title-color'      => '#202020',
                    'link-color'       => '#275cf6',
                    'link-hover-color' => '#1949d4',
                    'meta-color'       => '#999999',
                )),
                'general-setting-body-p-typography' => json_encode(array(
                    'font-type'       => 'google',
                    'system-font'     => 'Verdana',
                    'google-font'     => 'Lora',
                    'custom-font'     => '',
                    'font-weight'     => '400',
                    'font-style'      => 'normal',
                    'text-decoration' => 'none',
                    'text-transform'  => 'none',
                    'font-size'       => array(
                        'desktop' => '17',
                        'tablet'  => '16',
                        'mobile'  => '14',
                    ),
                    'line-height'     => array(
                        'desktop' => '28',
                        'tablet'  => '28',
                        'mobile'  => '28',
                    ),
                    'letter-spacing'  => array(
                        'desktop' => '0',
                        'tablet'  => '0',
                        'mobile'  => '0',
                    ),
                )),
                'general-setting-h1-typography'     => json_encode(array(
                    'font-type'       => 'google',
                    'system-font'     => 'Verdana',
                    'google-font'     => 'Montserrat',
                    'custom-font'     => '',
                    'font-weight'     => '700',
                    'font-style'      => 'normal',
                    'text-decoration' => 'none',
                    'text-transform'  => 'none',
                    'font-size'       => array(
                        'desktop' => '44',
                        'tablet'  => '32',
                        'mobile'  => '30',
                    ),
                    'line-height'     => array(
                        'desktop' => '40',
                        'tablet'  => '40',
                        'mobile'  => '40',
                    ),
                    'letter-spacing'  => array(
                        'desktop' => '0',
                        'tablet'  => '0',
                        'mobile'  => '0',
                    ),
                )),
                'general-setting-h2-typography'     => json_encode(array(
                    'font-type'       => 'google',
                    'system-font'     => 'Verdana',
                    'google-font'     => 'Montserrat',
                    'custom-font'     => '',
                    'font-weight'     => '700',
                    'font-style'      => 'normal',
                    'text-decoration' => 'none',
                    'text-transform'  => 'none',
                    'font-size'       => array(
                        'desktop' => '34',
                        'tablet'  => '30',
                        'mobile'  => '30',
                    ),
                    'line-height'     => array(
                        'desktop' => '35',
                        'tablet'  => '35',
                        'mobile'  => '35',
                    ),
                    'letter-spacing'  => array(
                        'desktop' => '0',
                        'tablet'  => '0',
                        'mobile'  => '0',
                    ),
                )),
                'general-setting-h3-typography'     => json_encode(array(
                    'font-type'       => 'google',
                    'system-font'     => 'Verdana',
                    'google-font'     => 'Montserrat',
                    'custom-font'     => '',
                    'font-weight'     => '600',
                    'font-style'      => 'normal',
                    'text-decoration' => 'none',
                    'text-transform'  => 'none',
                    'font-size'       => array(
                        'desktop' => '32',
                        'tablet'  => '28',
                        'mobile'  => '24',
                    ),
                    'line-height'     => array(
                        'desktop' => '32',
                        'tablet'  => '32',
                        'mobile'  => '32',
                    ),
                    'letter-spacing'  => array(
                        'desktop' => '0',
                        'tablet'  => '0',
                        'mobile'  => '0',
                    ),
                )),
                'general-setting-h4-typography'     => json_encode(array(
                    'font-type'       => 'google',
                    'system-font'     => 'Verdana',
                    'google-font'     => 'Montserrat',
                    'custom-font'     => '',
                    'font-weight'     => '500',
                    'font-style'      => 'normal',
                    'text-decoration' => 'none',
                    'text-transform'  => 'none',
                    'font-size'       => array(
                        'desktop' => '28',
                        'tablet'  => '22',
                        'mobile'  => '22',
                    ),
                    'line-height'     => array(
                        'desktop' => '24',
                        'tablet'  => '24',
                        'mobile'  => '24',
                    ),
                    'letter-spacing'  => array(
                        'desktop' => '0',
                        'tablet'  => '0',
                        'mobile'  => '0',
                    ),
                )),
                'general-setting-h5-typography'     => json_encode(array(
                    'font-type'       => 'google',
                    'system-font'     => 'Verdana',
                    'google-font'     => 'Montserrat',
                    'custom-font'     => '',
                    'font-weight'     => '400',
                    'font-style'      => 'normal',
                    'text-decoration' => 'none',
                    'text-transform'  => 'none',
                    'font-size'       => array(
                        'desktop' => '24',
                        'tablet'  => '24',
                        'mobile'  => '24',
                    ),
                    'line-height'     => array(
                        'desktop' => '32',
                        'tablet'  => '32',
                        'mobile'  => '32',
                    ),
                    'letter-spacing'  => array(
                        'desktop' => '0',
                        'tablet'  => '0',
                        'mobile'  => '0',
                    ),
                )),
                'general-setting-h6-typography'     => json_encode(array(
                    'font-type'       => 'google',
                    'system-font'     => 'Verdana',
                    'google-font'     => 'Montserrat',
                    'custom-font'     => '',
                    'font-weight'     => '300',
                    'font-style'      => 'normal',
                    'text-decoration' => 'none',
                    'text-transform'  => 'none',
                    'font-size'       => array(
                        'desktop' => '18',
                        'tablet'  => '18',
                        'mobile'  => '18',
                    ),
                    'line-height'     => array(
                        'desktop' => '24',
                        'tablet'  => '24',
                        'mobile'  => '24',
                    ),
                    'letter-spacing'  => array(
                        'desktop' => '0',
                        'tablet'  => '0',
                        'mobile'  => '0',
                    ),
                )),

            );
            return array_merge($default_options, $general_setting_defaults);
        }

        /**
         * Callback functions for customize_register,
         * Add Panel Section control
         *
         * @since    1.0.0
         * @access   public
         *
         * @param object $wp_customize
         * @return void
         */
        public function customize_register($wp_customize) {

            $general_setting_defaults = cosmoswp_genral_setting_controller()->general_setting_defaults();

            /*Background message*/
            $wp_customize->add_setting('general-setting-background-msg', array(
                'sanitize_callback' => 'wp_kses_post',
            ));
            $wp_customize->add_control(
                new CosmosWP_Custom_Control_Heading(
                    $wp_customize,
                    'general-setting-background-msg',
                    array(
                        'label'    => esc_html__('Site Background', 'cosmoswp'),
                        'section'  => $this->general_setting_section,
                        'priority' => 99,
                    )
                )
            );
            $wp_customize->get_control('background_color')->section  = cosmoswp_genral_setting_controller()->general_setting_section;
            $wp_customize->get_control('background_color')->priority = 100;

            $wp_customize->get_control('background_image')->section       = cosmoswp_genral_setting_controller()->general_setting_section;
            $wp_customize->get_control('background_image')->priority      = 100;
            $wp_customize->get_control('background_preset')->section      = cosmoswp_genral_setting_controller()->general_setting_section;
            $wp_customize->get_control('background_preset')->priority     = 100;
            $wp_customize->get_control('background_position')->section    = cosmoswp_genral_setting_controller()->general_setting_section;
            $wp_customize->get_control('background_position')->priority   = 100;
            $wp_customize->get_control('background_size')->section        = cosmoswp_genral_setting_controller()->general_setting_section;
            $wp_customize->get_control('background_size')->priority       = 100;
            $wp_customize->get_control('background_repeat')->section      = cosmoswp_genral_setting_controller()->general_setting_section;
            $wp_customize->get_control('background_repeat')->priority     = 100;
            $wp_customize->get_control('background_attachment')->section  = cosmoswp_genral_setting_controller()->general_setting_section;
            $wp_customize->get_control('background_attachment')->priority = 100;

            /*general setting section*/
            require cosmoswp_file_directory('inc/customizer/general-setting/general-setting-options.php');
        }

        /**
         * Callback functions for cosmoswp_dynamic_css,
         * Add Dynamic Css
         *
         * @since    1.0.0
         * @access   public
         *
         * @param array $dynamic_css
         * @return array
         */
        public function dynamic_css($dynamic_css) {

            require cosmoswp_file_directory('inc/customizer/general-setting/dynamic-css.php');

            if (is_array($dynamic_css) && !empty($dynamic_css)) {
                $all_css = array_merge_recursive($dynamic_css, $general_setting_dynamic_css);
                return $all_css;
            }
            else {
                return $general_setting_dynamic_css;
            }
        }

        /**
         * Callback functions for cosmoswp_enqueue_google_fonts,
         * General setting Typography
         *
         * @since    1.0.0
         * @access   public
         *
         * @param $google_font_family_array
         * @return array
         */
        public function enqueue_google_fonts($google_font_family_array) {
            $local_google_fonts = array();

            $general_typography_body = cosmoswp_get_theme_options('general-setting-body-p-typography');
            $general_typography_body = json_decode($general_typography_body, true);
            $body_font_family        = cosmoswp_font_family($general_typography_body);

            if (cosmoswp_is_font_type_google($general_typography_body)) {
                $local_google_fonts[] = array(
                    'family'      => $body_font_family,
                    'font-weight' => $general_typography_body['font-weight']
                );
            }

            $general_typography_h1 = cosmoswp_get_theme_options('general-setting-h1-typography');
            $general_typography_h1 = json_decode($general_typography_h1, true);
            $h1_font_family        = cosmoswp_font_family($general_typography_h1);
            if (cosmoswp_is_font_type_google($general_typography_h1)) {
                $local_google_fonts[] = array(
                    'family'      => $h1_font_family,
                    'font-weight' => $general_typography_h1['font-weight']
                );
            }

            $general_typography_h2 = cosmoswp_get_theme_options('general-setting-h2-typography');
            $general_typography_h2 = json_decode($general_typography_h2, true);
            $h2_font_family        = cosmoswp_font_family($general_typography_h2);
            if (cosmoswp_is_font_type_google($general_typography_h2)) {
                $local_google_fonts[] = array(
                    'family'      => $h2_font_family,
                    'font-weight' => $general_typography_h2['font-weight']
                );
            }

            $general_typography_h3 = cosmoswp_get_theme_options('general-setting-h3-typography');
            $general_typography_h3 = json_decode($general_typography_h3, true);
            $h3_font_family        = cosmoswp_font_family($general_typography_h3);
            if (cosmoswp_is_font_type_google($general_typography_h3)) {
                $local_google_fonts[] = array(
                    'family'      => $h3_font_family,
                    'font-weight' => $general_typography_h3['font-weight']
                );
            }

            $general_typography_h4 = cosmoswp_get_theme_options('general-setting-h4-typography');
            $general_typography_h4 = json_decode($general_typography_h4, true);
            $h4_font_family        = cosmoswp_font_family($general_typography_h4);
            if (cosmoswp_is_font_type_google($general_typography_h4)) {
                $local_google_fonts[] = array(
                    'family'      => $h4_font_family,
                    'font-weight' => $general_typography_h4['font-weight']
                );
            }

            $general_typography_h5 = cosmoswp_get_theme_options('general-setting-h5-typography');
            $general_typography_h5 = json_decode($general_typography_h5, true);
            $h5_font_family        = cosmoswp_font_family($general_typography_h5);
            if (cosmoswp_is_font_type_google($general_typography_h5)) {
                $local_google_fonts[] = array(
                    'family'      => $h5_font_family,
                    'font-weight' => $general_typography_h5['font-weight']
                );
            }

            $general_typography_h6 = cosmoswp_get_theme_options('general-setting-h6-typography');
            $general_typography_h6 = json_decode($general_typography_h6, true);
            $h6_font_family        = cosmoswp_font_family($general_typography_h6);
            if (cosmoswp_is_font_type_google($general_typography_h6)) {
                $local_google_fonts[] = array(
                    'family'      => $h6_font_family,
                    'font-weight' => $general_typography_h6['font-weight']
                );
            }

            return array_merge($google_font_family_array, $local_google_fonts);
        }
    }

endif;

/**
 * Create Instance for CosmosWP_General_Setting_Controller
 *
 * @since    1.0.0
 * @access   public
 *
 * @param
 * @return object
 */
if (!function_exists('cosmoswp_genral_setting_controller')) {

    function cosmoswp_genral_setting_controller() {

        return CosmosWP_General_Setting_Controller::instance();
    }

    cosmoswp_genral_setting_controller()->run();
}