<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Theme Option
 *
 * @package CosmosWP
 */
if ( ! class_exists( 'CosmosWP_Theme_Options_Controller' ) ) :

	class CosmosWP_Theme_Options_Controller {

		/**
		 * Panel ID, use for theme option
		 *
		 * @var string
		 * @access public
		 * @since 1.0.0
		 *
		 */
		public $panel = 'cosmoswp_theme_options';

		/**
		 * Breadcrumb_options Sections
		 *
		 * @var string
		 * @access public
		 * @since 1.0.0
		 *
		 */
		public $breadcrumb_options = 'cosmoswp_breadcrumb_options';

        /**
         * Scroll top Sections
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $scroll_top = 'cosmoswp_scroll_top';


		/**
		 * search_options Sections
		 *
		 * @var string
		 * @access public
		 * @since 1.0.0
		 *
		 */
		public $search_options = 'cosmoswp_search';

        /**
         * site_layout Sections and Controller ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $sidebar_setting = 'cosmoswp_sidebar_setting';

        /**
         * button_design Sections and Controller ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $button_design = 'cosmoswp_button_design_option';

        /**
         * appearance_color Sections and Controller ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $appearance_color = 'cosmoswp_appearance_color';

        /**
         * site_layout Sections and Controller ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $site_layout = 'cosmoswp-site-layout-options';

        /**
         * site_layout Sections and Controller ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $sticky_sidebar = 'cosmoswp_design_sidebar_sticky_option';

		/**
		 * Main Instance
		 *
		 * Insures that only one instance of CosmosWP_Theme_Options_Controller exists in memory at any one
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
			if ( null === $instance ) {
				$instance = new CosmosWP_Theme_Options_Controller;
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

			add_filter( 'cosmoswp_default_theme_options', array( $this, 'theme_option_defaults' ) );
			add_action( 'customize_register', array( $this, 'customize_register' ), 100 );
			add_filter( 'cosmoswp_dynamic_css', array( $this, 'dynamic_css' ), 100 );
			add_filter( 'cosmoswp_action_after_footer', array( $this, 'scroll_top_data' ), 100 );
            add_filter('cosmoswp_enqueue_google_fonts', array($this, 'enqueue_google_fonts'), 1);
            add_filter('body_class', array($this, 'add_search_template_class'));

        }


        /**
         * Callback functions for cosmoswp_enqueue_google_fonts,
         * Global Widget Typography
         *
         * @since    1.0.0
         * @access   public
         *
         * @param $google_font_family_array
         * @return array
         */
        public function enqueue_google_fonts($google_font_family_array) {

            $local_google_fonts = array();

            $widget_title_typography_options = cosmoswp_get_theme_options('global-widget-title-typography-options');
            $widget_title_typography         = cosmoswp_get_theme_options('global-widget-title-typography');
            $widget_title_typography         = json_decode($widget_title_typography, true);
            $widget_title_font_family        = cosmoswp_font_family($widget_title_typography);
            if ('custom' == $widget_title_typography_options && cosmoswp_is_font_type_google($widget_title_typography)) {
                $local_google_fonts[] = array(
                    'family'      => $widget_title_font_family,
                    'font-weight' => $widget_title_typography['font-weight']
                );;
            }

            $site_button_typography_options = cosmoswp_get_theme_options('site-button-typography-options');
            $site_button_typography         = cosmoswp_get_theme_options('site-button-typography');
            $site_button_typography         = json_decode($site_button_typography, true);
            $site_button_font_family        = cosmoswp_font_family($site_button_typography);
            if ('custom' == $site_button_typography_options && cosmoswp_is_font_type_google($site_button_typography)) {
                $local_google_fonts[] = array(
                    'family'      => $site_button_font_family,
                    'font-weight' => $site_button_typography['font-weight']
                );
            }

            return array_merge($google_font_family_array, $local_google_fonts);
        }

		/**
		 * Callback functions for cosmoswp_default_theme_options,
		 * Add theme defaults values
		 *
		 * @since    1.0.0
		 * @access   public
		 *
		 * @param array $default_options
		 *
		 * @return array
		 */
		public function theme_option_defaults( $default_options = array() ) {

			$theme_option_defaults = array(

                /*button design section */
                'site-button-styling' => json_encode(array(
                    'normal-text-color'       => '#fff',
                    'normal-bg-color'         => '#275cf6',
                    'normal-border-style'     => 'solid',
                    'normal-border-color'     => '#275cf6',
                    'normal-border-width'     => array(
                        'desktop' => array(
                            'top'         => '1',
                            'right'       => '1',
                            'bottom'      => '1',
                            'left'        => '1',
                            'cssbox_link' => true
                        )
                    ),
                    'normal-border-radius'    => array(
                        'desktop' => array(
                            'top'         => '3',
                            'right'       => '3',
                            'bottom'      => '3',
                            'left'        => '3',
                            'cssbox_link' => true
                        )
                    ),
                    'normal-box-shadow-color' => '',
                    'normal-box-shadow-css'   => array(
                        'desktop' => array(
                            'x'           => '',
                            'Y'           => '',
                            'BLUR'        => '',
                            'SPREAD'      => '',
                            'cssbox_link' => true
                        )
                    ),
                    'hover-text-color'        => '#fff',
                    'hover-bg-color'          => '#1949d4',
                    'hover-border-style'      => 'solid',
                    'hover-border-color'      => '#1949d4',
                    'hover-border-width'      => array(
                        'desktop' => array(
                            'top'         => '1',
                            'right'       => '1',
                            'bottom'      => '1',
                            'left'        => '1',
                            'cssbox_link' => true
                        )
                    ),
                    'hover-border-radius'     => array(
                        'desktop' => array(
                            'top'         => '',
                            'right'       => '',
                            'bottom'      => '',
                            'left'        => '',
                            'cssbox_link' => true
                        )
                    ),
                    'hover-box-shadow-color'  => '',
                    'hover-box-shadow-css'    => array(
                        'desktop' => array(
                            'x'           => '',
                            'Y'           => '',
                            'BLUR'        => '',
                            'SPREAD'      => '',
                            'cssbox_link' => true
                        )
                    ),
                )),

                'site-button-margin'                => json_encode(array(
                    'desktop' => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                    'tablet'  => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                    'mobile'  => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                )),
                'site-button-padding'               => json_encode(array(
                    'desktop' => array(
                        'top'         => '8',
                        'right'       => '16',
                        'bottom'      => '8',
                        'left'        => '16',
                        'cssbox_link' => true,
                    ),
                    'tablet'  => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                    'mobile'  => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                )),
                'site-button-typography-options' => 'inherit',
                'site-button-typography' => '',


                /* global sidebar*/
                'global-sidebar-padding'            => json_encode(array(
                    'desktop' => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                    'tablet'  => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                    'mobile'  => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                )),
                'global-sidebar-background-options' => json_encode(array(
                    'background-color' => '',
                )),
                'global-widget-link-color'          => '#40454a',

                /* widget styling*/
                'global-widget-content-align'       => 'cwp-text-left',
                'global-widget-content-color'       => '',
                'global-widget-content-margin'      => json_encode(array(
                    'desktop' => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                    'tablet'  => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                    'mobile'  => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                )),

                'global-widget-content-padding' => json_encode(array(
                    'desktop' => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                    'tablet'  => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                    'mobile'  => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                )),

                'global-widget-content-border-styling' => json_encode(array(
                    'border-style' => 'none',
                    'border-color' => '',
                    'border-width' => array(
                        'desktop' => array(
                            'top'         => '',
                            'right'       => '',
                            'bottom'      => '',
                            'left'        => '',
                            'cssbox_link' => true,
                        )
                    ),
                )),

                'global-widget-content-typography-options' => 'inherit',
                'global-widget-content-typography'         => json_encode(array(
                    'font-type'       => 'google',
                    'system-font'     => 'verdana',
                    'google-font'     => 'Lato',
                    'custom-font'     => '',
                    'font-weight'     => '400',
                    'font-style'      => 'normal',
                    'text-decoration' => 'none',
                    'text-transform'  => 'none',
                    'font-size'       => array(
                        'desktop' => '14',
                        'tablet'  => '14',
                        'mobile'  => '14',
                    ),
                    'line-height'     => array(
                        'desktop' => '24',
                        'tablet'  => '24',
                        'mobile'  => '24',
                    ),
                    'letter-spacing'  => array(
                        'desktop' => '',
                        'tablet'  => '',
                        'mobile'  => '',
                    ),
                )),

                /*global widget title*/
                'global-widget-title-align'                => 'cwp-text-left',
                'global-widget-title-color'                => '',
                'global-widget-title-margin'               => json_encode(array(
                    'desktop' => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                    'tablet'  => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                    'mobile'  => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                )),
                'global-widget-title-padding'              => json_encode(array(
                    'desktop' => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                    'tablet'  => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                    'mobile'  => array(
                        'top'         => '0',
                        'right'       => '0',
                        'bottom'      => '0',
                        'left'        => '15',
                        'cssbox_link' => true,
                    ),
                )),
                'global-widget-title-border-styling'       => json_encode(array(
                    'border-style' => 'solid',
                    'border-color' => '#275cf6',
                    'border-width' => array(
                        'desktop' => array(
                            'top'         => '0',
                            'right'       => '0',
                            'bottom'      => '0',
                            'left'        => '5',
                            'cssbox_link' => true,
                        )
                    ),
                )),
                'global-widget-title-typography-options'   => 'custom',
                'global-widget-title-typography'           => json_encode(array(
                    'font-type'       => 'google',
                    'system-font'     => 'verdana',
                    'google-font'     => 'Montserrat',
                    'custom-font'     => '',
                    'font-weight'     => '600',
                    'font-style'      => 'normal',
                    'text-decoration' => 'none',
                    'text-transform'  => 'none',
                    'font-size'       => array(
                        'desktop' => '20',
                        'tablet'  => '20',
                        'mobile'  => '20',
                    ),
                    'line-height'     => array(
                        'desktop' => '24',
                        'tablet'  => '24',
                        'mobile'  => '24',
                    ),
                    'letter-spacing'  => array(
                        'desktop' => '',
                        'tablet'  => '',
                        'mobile'  => '',
                    ),
                )),

				/*breadcrumb */
				'cosmoswp-breadcrumb-options'    => 'disable',
				'breadcrumb-before-banner-title' => false,
				'breadcrumb-after-banner-title'  => false,
				'breadcrumb-before-content'      => true,
				'breadcrumb-color-options'       => json_encode( array(
					'link-color'       => '#275cf6',
					'link-hover-color' => '#1949d4',
					'text-color'       => '#fff',
				) ),

				/*scroll top*/
                'enable-scroll-top-button'               => true,
                'remove-scroll-top-button-mobile' => false,
                'scroll-icon-position-options'               => 'cwp-position-right',
                'scroll-top-button-height'               => json_encode(array(
                    'desktop' => '',
                    'tablet'  => '',
                    'mobile'  => '',
                )),
                'scroll-top-button-width'               => json_encode(array(
                    'desktop' => '',
                    'tablet'  => '',
                    'mobile'  => '',
                )),
                'scroll-top-icon-options'                     => 'icon',
                'scroll-top-text'                        => esc_html__('Top', 'cosmoswp'),
                'scroll-top-icon-position'                    => 'before',
                'scroll-top-icon'                        => 'fas fa-angle-up',/*done in frontend*/
                'scroll-top-icon-size-responsive'             => json_encode(array(
                    'desktop' => '',
                    'tablet'  => '',
                    'mobile'  => '',
                )),
                'scroll-top-icon-styling'                     => json_encode(array(
                    'normal-text-color'       => '#fff',
                    'normal-bg-color'         => '#275cf6',
                    'normal-border-style'     => '',
                    'normal-border-color'     => '',
                    'normal-box-shadow-color' => '',
                    'hover-text-color'        => '#fff',
                    'hover-bg-color'          => '#1949d4',
                    'hover-border-style'      => '',
                    'hover-border-color'      => '',
                    'hover-box-shadow-color'  => '',
                    'normal-border-width'     => array(
                        'desktop' => array(
                            'top'         => '',
                            'right'       => '',
                            'bottom'      => '',
                            'left'        => '',
                            'cssbox_link' => true
                        )
                    ),
                    'normal-box-shadow-css'   => array(
                        'desktop' => array(
                            'x'           => '',
                            'Y'           => '',
                            'BLUR'        => '',
                            'SPREAD'      => '',
                            'cssbox_link' => true
                        )
                    ),
                    'normal-border-radius'    => array(
                        'desktop' => array(
                            'top'         => '',
                            'right'       => '',
                            'bottom'      => '',
                            'left'        => '',
                            'cssbox_link' => true
                        )
                    ),
                    'hover-border-width'      => array(
                        'desktop' => array(
                            'top'         => '',
                            'right'       => '',
                            'bottom'      => '',
                            'left'        => '',
                            'cssbox_link' => true
                        )
                    ),
                    'hover-box-shadow-css'    => array(
                        'desktop' => array(
                            'x'           => '',
                            'Y'           => '',
                            'BLUR'        => '',
                            'SPREAD'      => '',
                            'cssbox_link' => true
                        )
                    ),
                    'hover-border-radius'     => array(
                        'desktop' => array(
                            'top'         => '',
                            'right'       => '',
                            'bottom'      => '',
                            'left'        => '',
                            'cssbox_link' => true
                        )
                    ),
                )),
                'scroll-top-icon-padding'                     => json_encode(array(
                    'desktop' => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                    'tablet'  => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                    'mobile'  => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                )),
                'scroll-top-icon-margin'                      => json_encode(array(
                    'desktop' => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                    'tablet'  => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                    'mobile'  => array(
                        'top'         => '',
                        'right'       => '',
                        'bottom'      => '',
                        'left'        => '',
                        'cssbox_link' => true,
                    ),
                )),
                'scroll-top-icon-typography-options'          => 'inherit',
                'scroll-top-icon-typography'                  => json_encode(array(
                    'font-type'       => 'google',
                    'system-font'     => 'verdana',
                    'google-font'     => 'Lato',
                    'custom-font'     => '',
                    'font-weight'     => '500',
                    'font-style'      => 'normal',
                    'text-decoration' => 'none',
                    'text-transform'  => 'none',
                    'font-size'       => array(
                        'desktop' => '',
                        'tablet'  => '',
                        'mobile'  => '',
                    ),
                    'line-height'     => array(
                        'desktop' => '',
                        'tablet'  => '',
                        'mobile'  => '',
                    ),
                    'letter-spacing'  => array(
                        'desktop' => '',
                        'tablet'  => '',
                        'mobile'  => '',
                    ),
                )),

				/*search options*/
				'search-placeholder'             => esc_html__( 'Search', 'cosmoswp' ),
                'search-template-options'        =>'default',

				/*comment setting*/
				'cosmoswp-hide-comment'          => '',
				'cosmoswp-comment-title'         => esc_html__( 'Leave a Reply', 'cosmoswp' ),
				'cosmoswp-comment-button-text'   => esc_html__( 'Post Comment', 'cosmoswp' ),
				'cosmoswp-comment-notes-after'   => '',
			);

			return array_merge( $default_options, $theme_option_defaults );
		}

		/**
		 * Callback functions for customize_register,
		 * Add Panel Section control
		 *
		 * @since    1.0.0
		 * @access   public
		 *
		 * @param object $wp_customize
		 *
		 * @return void
		 */
		public function customize_register( $wp_customize ) {

			$theme_option_defaults = cosmoswp_theme_options_controller()->theme_option_defaults();

			/**
			 * Panel
			 */
			$wp_customize->add_panel( cosmoswp_theme_options_controller()->panel, array(
				'title'    => esc_html__( 'Theme Options', 'cosmoswp' ),
				'priority' => 99,
			) );

			/*options customizer Layout*/
			require cosmoswp_file_directory( 'inc/customizer/theme-options/breadcrumb-options.php' );
            require cosmoswp_file_directory('inc/customizer/theme-options/button-options.php');
            require cosmoswp_file_directory( 'inc/customizer/theme-options/comment-setting.php' );
            require cosmoswp_file_directory( 'inc/customizer/theme-options/scroll-top.php' );
            require cosmoswp_file_directory( 'inc/customizer/theme-options/search-options.php' );
            require cosmoswp_file_directory( 'inc/customizer/theme-options/sidebar-setting.php' );
		}


        /**
         * Callback functions for cosmoswp_action_after_footer,
         * @since    1.0.0
         * @access   public
         *
         * @return mixed
         */
        function scroll_top_data() {

            if (!cosmoswp_get_theme_options('enable-scroll-top-button')){
                return '';
            }

            $display_scroll_top_mobile    = cosmoswp_get_theme_options('remove-scroll-top-button-mobile');
            $display_scroll_top_mobile    = ($display_scroll_top_mobile) ? 'cwp-hide-on-mobile' : '';
            $scroll_top_position          = cosmoswp_get_theme_options('scroll-icon-position-options');
            $icon_type       = cosmoswp_get_theme_options('scroll-top-icon-options');
            $icon_structure  = $icon_spacer = '';
            if ($icon_type == 'text'){
                $open_text      = cosmoswp_get_theme_options('scroll-top-text');
                $icon_structure = cosmoswp_get_icon_structure($icon_type,$open_text,0,0);
            }
            elseif ($icon_type == 'icon'){
                $open_icon      = cosmoswp_get_theme_options('scroll-top-icon');
                $icon_structure = cosmoswp_get_icon_structure($icon_type,0,$open_icon,0);
            }
            elseif ($icon_type == 'both'){
                $open_text      = cosmoswp_get_theme_options('scroll-top-text');
                $open_icon      = cosmoswp_get_theme_options('scroll-top-icon');
                $icon_position  = cosmoswp_get_theme_options('scroll-top-icon-position');
                $icon_structure = cosmoswp_get_icon_structure($icon_type,$open_text,$open_icon,$icon_position);
                $icon_spacer    = cosmoswp_get_icon_four_position_class($icon_position);
            }
            ?>
            <a href="#" class="cwp-scroll-to-top <?php echo esc_attr(cosmoswp_string_concator($scroll_top_position,$icon_spacer,$display_scroll_top_mobile)); ?>"><span class="cwp-scroll-top-wrap"><?php echo $icon_structure; ?></span></a>
            <?php
        }


        /**
         * Add search template classes to body
         *
         * @since    1.0.0
         * @access   public
         *
         * @param $classes
         * @return array
         */
        public function add_search_template_class($classes) {

            $template = cosmoswp_get_theme_options('search-template-options');
            if('default' != $template){
                $classes[] = $template;
            }

            return $classes;
        }

		/**
		 * Callback functions for cosmoswp_dynamic_css,
		 * Add Theme dynamic css
		 *
		 * @since    1.0.0
		 * @access   public
		 *
		 * @param object $dynamic_css
		 *
		 * @return array $theme_option_dynamic_css || $all_css
		 */
		public function dynamic_css( $dynamic_css ) {

            require cosmoswp_file_directory('inc/customizer/theme-options/dynamic-css.php');

            if ( is_array( $dynamic_css ) && ! empty( $dynamic_css ) ) {
				$all_css = array_merge_recursive( $dynamic_css, $theme_option_dynamic_css );

				return $all_css;
			}
			else {
				return $theme_option_dynamic_css;
			}
		}
	}
endif;

/**
 * Create Instance for CosmosWP_Theme_Options_Controller
 *
 * @since    1.0.0
 * @access   public
 *
 * @param
 *
 * @return object
 */
if ( ! function_exists( 'cosmoswp_theme_options_controller' ) ) {

	function cosmoswp_theme_options_controller() {

		return CosmosWP_Theme_Options_Controller::instance();
	}

	cosmoswp_theme_options_controller()->run();
}