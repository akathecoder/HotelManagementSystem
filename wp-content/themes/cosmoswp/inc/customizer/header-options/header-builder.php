<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Header Builder and Customizer Options
 * @package CosmosWP
 */

if (!class_exists('CosmosWP_Header_Builder')) :

    class CosmosWP_Header_Builder {

        /**
         * Panel ID, use for builder ID too
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $panel = 'cosmoswp_header';

        /**
         * Builder Sections and Controller ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $builder_section_controller = 'cosmoswp_header_builder_section_controller';

        /*Builder Rows and Customizer Settings*/

        /**
         * Header Top Row and Its setting
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $header_top = 'cosmoswp_header_top';

        /**
         * Header Main Row and Its setting
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $header_main = 'cosmoswp_header_main';

        /**
         * Header Bottom Row and Its setting
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $header_bottom = 'cosmoswp_header_bottom';

        /*Header Elements Section, Setting and Control ID*/

        /**
         * Header Socials Section/Setting/Control ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $site_identity_logo = 'title_tagline';

        /**
         * Primary Menu Section/Setting/Control ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $primary_menu = 'primary_menu';

        /**
         * Header Menu Section/Setting/Control ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $secondary_menu = 'secondary_menu';

        /**
         * Menu Icon Section/Setting/Control ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $menu_icon = 'menu_icon';

        /**
         * Off canvas Sidebar Icon Section/Setting/Control ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $drop_down_search = 'drop_down_search';

        /**
         * Off canvas Sidebar Icon Section/Setting/Control ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $normal_search = 'normal_search';

        /**
         * Header Socials Section/Setting/Control ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $header_social = 'header_social';

        /**
         * Header Socials Section/Setting/Control ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $button_one = 'button_one';

        /**
         * contact_information Section/Setting/Control ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $contact_information = 'contact_information';

        /**
         * advertisement Section/Setting/Control ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $advertisement = 'advertisement';

        /**
         * login Section/Setting/Control ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $login = 'login';

        /**
         * register Section/Setting/Control ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $register = 'register';

        /**
         * html Section/Setting/Control ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $html = 'html';

        /**
         * Main Instance
         *
         * Insures that only one instance of CosmosWP_Header_Builder exists in memory at any one
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
                $instance = new CosmosWP_Header_Builder;
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

            add_action('customize_register', array($this, 'set_customizer'), 1);

            add_filter('cosmoswp_default_theme_options', array($this, 'header_defaults'));
            add_filter('cosmoswp_builders', array($this, 'header_builder'));
            add_action('customize_register', array($this, 'customize_register'), 100);
            add_action('cosmoswp_before_main_wrap', array($this, 'header_outside'), 100);
            add_action('cosmoswp_action_header', array($this, 'display_header'), 100);
            add_filter('cosmoswp_dynamic_css', array($this, 'dynamic_css'), 100);
            add_filter('cosmoswp_enqueue_google_fonts', array($this, 'enqueue_google_fonts'), 1);
        }

        /**
         * Callback functions for customize_register,
         * Fixed previous array issue
         *
         * @since    1.1.0
         * @access   public
         *
         * @param null
         * @return void
         */
        public function set_customizer(){
            $builder = cosmoswp_get_theme_options(cosmoswp_header_builder()->builder_section_controller);
            if ( is_array( $builder ) ) {
                $builder = json_encode( urldecode_deep( $builder ), true );
            }
            set_theme_mod(cosmoswp_header_builder()->builder_section_controller,$builder);
        }

        /**
         * Get header builder
         *
         * @since    1.1.0
         * @access   public
         *
         * @param null
         * @return void
         */
        public function get_builder(){
            $builder = cosmoswp_get_theme_options(cosmoswp_header_builder()->builder_section_controller);
            if ( ! is_array( $builder ) ) {
                $builder = json_decode( urldecode_deep( $builder ), true );
            }
            return $builder;
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
        public function header_defaults($default_options = array()) {

            require cosmoswp_file_directory('inc/customizer/header-options/header-defaults.php');
            return array_merge($default_options, $header_defaults);
        }

        /**
         * Callback functions for cosmoswp_builders,
         * Add Header Builder elements
         *
         * @since    1.0.0
         * @access   public
         *
         * @param array $builder builder fields
         * @return array
         */
        public function header_builder($builder) {


            $items = apply_filters('cosmoswp_header_builder_item',
                array(
                    cosmoswp_header_builder()->site_identity_logo => array(
                        'icon'    => 'dashicons dashicons-admin-home',
                        'name'    => esc_html__('Site Identity and Logo', 'cosmoswp'),
                        'desc'    => esc_html__('Site Title, Tagline and Logo', 'cosmoswp'),
                        'id'      => cosmoswp_header_builder()->site_identity_logo,
                        'col'     => 0,
                        'width'   => '4',
                        'section' => cosmoswp_header_builder()->site_identity_logo,
                    ),
                    cosmoswp_header_builder()->primary_menu       => array(
                        'icon'    => 'dashicons dashicons-menu',
                        'name'    => esc_html__('Primary Menu', 'cosmoswp'),
                        'id'      => cosmoswp_header_builder()->primary_menu,
                        'col'     => 0,
                        'width'   => '4',
                        'section' => cosmoswp_header_builder()->primary_menu,
                    ),
                    cosmoswp_header_builder()->secondary_menu     => array(
                        'icon'    => 'dashicons dashicons-menu',
                        'name'    => esc_html__('Secondary Menu', 'cosmoswp'),
                        'id'      => cosmoswp_header_builder()->secondary_menu,
                        'col'     => 0,
                        'width'   => '4',
                        'section' => cosmoswp_header_builder()->secondary_menu,
                    ),
                    cosmoswp_header_builder()->header_social      => array(
                        'icon'    => 'dashicons dashicons-networking',
                        'name'    => esc_html__('Social Icons', 'cosmoswp'),
                        'id'      => cosmoswp_header_builder()->header_social,
                        'col'     => 0,
                        'width'   => '4',
                        'section' => cosmoswp_header_builder()->header_social,
                    ),

                    cosmoswp_header_builder()->drop_down_search => array(
                        'icon'    => 'dashicons dashicons-search',
                        'name'    => esc_html__('DropDown Search', 'cosmoswp'),
                        'id'      => cosmoswp_header_builder()->drop_down_search,
                        'col'     => 0,
                        'width'   => '4',
                        'section' => cosmoswp_header_builder()->drop_down_search,
                    ),

                    cosmoswp_header_builder()->normal_search => array(
                        'icon'    => 'dashicons dashicons-search',
                        'name'    => esc_html__('Normal Search', 'cosmoswp'),
                        'id'      => cosmoswp_header_builder()->normal_search,
                        'col'     => 0,
                        'width'   => '4',
                        'section' => cosmoswp_header_builder()->normal_search,
                    ),
                    cosmoswp_header_builder()->menu_icon           => array(
                        'icon'    => 'dashicons dashicons-menu',
                        'name'    => esc_html__('Menu Icon', 'cosmoswp'),
                        'id'      => cosmoswp_header_builder()->menu_icon,
                        'col'     => 0,
                        'width'   => '4',
                        'section' => cosmoswp_header_builder()->menu_icon,
                    ),
                    cosmoswp_header_builder()->button_one          => array(
                        'icon'    => 'dashicons dashicons-plus-alt',
                        'name'    => esc_html__('Button One', 'cosmoswp'),
                        'id'      => cosmoswp_header_builder()->button_one,
                        'col'     => 0,
                        'width'   => '4',
                        'section' => cosmoswp_header_builder()->button_one,
                    ),
                    cosmoswp_header_builder()->contact_information => array(
                        'icon'    => 'dashicons dashicons-phone',
                        'name'    => esc_html__('Contact Information', 'cosmoswp'),
                        'id'      => cosmoswp_header_builder()->contact_information,
                        'col'     => 0,
                        'width'   => '4',
                        'section' => cosmoswp_header_builder()->contact_information,
                    ),
                    cosmoswp_header_builder()->html => array(
                        'icon'    => 'dashicons dashicons-edit',
                        'name'    => esc_html__('HTML', 'cosmoswp'),
                        'id'      => cosmoswp_header_builder()->html,
                        'col'     => 0,
                        'width'   => '4',
                        'section' => cosmoswp_header_builder()->html,
                    ),
                )
            );

            $header_builder = array(
                cosmoswp_header_builder()->panel => array(
                    'id'         => cosmoswp_header_builder()->panel,
                    'title'      => esc_html__('Header Builder', 'cosmoswp'),
                    'control_id' => cosmoswp_header_builder()->builder_section_controller,
                    'panel'      => cosmoswp_header_builder()->panel,
                    'section'    => cosmoswp_header_builder()->builder_section_controller,
                    'devices'    => array(
                        'desktop' => esc_html__('Desktop', 'cosmoswp'),
                        'mobile'  => esc_html__('Mobile/Tablet', 'cosmoswp'),
                        'all'     => esc_html__('Menu Icon Sidebar', 'cosmoswp'),
                    ),
                    'items'      => $items,
                    'rows'       => array(
                        'top'     => esc_html__('Header Top', 'cosmoswp'),
                        'main'    => esc_html__('Header Main', 'cosmoswp'),
                        'bottom'  => esc_html__('Header Bottom', 'cosmoswp'),
                        'sidebar' => __('Menu Sidebar', 'cosmoswp'),
                    )
                )
            );
            $header_builder = apply_filters('cosmoswp_header_builder', $header_builder);
            return array_merge($builder, $header_builder);

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

            $header_defaults = cosmoswp_header_builder()->header_defaults();

            /**
             * Panel
             */
            $wp_customize->add_panel(cosmoswp_header_builder()->panel, array(
                'title'    => esc_html__('Header Builder/Options', 'cosmoswp'),
                'priority' => 20,
            ));

            /**
             * Builder Section use for builder only
             */
            $wp_customize->add_section(cosmoswp_header_builder()->builder_section_controller, array(
                'title'    => esc_html__('Header Builder', 'cosmoswp'),
                'priority' => 10,
                'panel'    => cosmoswp_header_builder()->panel,
            ));

            /**
             * Builder control and setting
             */
            $wp_customize->add_setting(cosmoswp_header_builder()->builder_section_controller, array(
                'default'           => $header_defaults[cosmoswp_header_builder()->builder_section_controller],
                'sanitize_callback' => 'cosmoswp_customizer_builder_sanitize_field',
                'transport'         => 'postMessage'
            ));

            $wp_customize->add_control(cosmoswp_header_builder()->builder_section_controller, array(
                'label'    => esc_html__('Header Builder', 'cosmoswp'),
                'section'  => cosmoswp_header_builder()->builder_section_controller,
                'settings' => cosmoswp_header_builder()->builder_section_controller,
                'type'     => 'text'
            ));

            /*Header Defaults Layout*/
            require cosmoswp_file_directory('inc/customizer/header-options/header-general.php');
            require cosmoswp_file_directory('inc/customizer/header-options/header-top.php');
            require cosmoswp_file_directory('inc/customizer/header-options/header-main.php');
            require cosmoswp_file_directory('inc/customizer/header-options/header-bottom.php');
            require cosmoswp_file_directory('inc/customizer/header-options/secondary-menu.php');
            require cosmoswp_file_directory('inc/customizer/header-options/header-social.php');
            require cosmoswp_file_directory('inc/customizer/header-options/drop-down-search.php');
            require cosmoswp_file_directory('inc/customizer/header-options/normal-search.php');
            require cosmoswp_file_directory('inc/customizer/header-options/primary-menu.php');

            require cosmoswp_file_directory('inc/customizer/header-options/button-one.php');
            require cosmoswp_file_directory('inc/customizer/header-options/sticky-header.php');
            require cosmoswp_file_directory('inc/customizer/header-options/site-identity.php');
            require cosmoswp_file_directory('inc/customizer/header-options/contact-information.php');
            require cosmoswp_file_directory('inc/customizer/header-options/html.php');
            require cosmoswp_file_directory('inc/customizer/header-options/menu-icon.php');

            require cosmoswp_file_directory('inc/customizer/header-options/menu-icon-sidebar-setting.php');
        }

        /**
         * Sort Item of Header Builder Item
         *
         * @since    1.0.0
         * @access   public
         *
         * @param array $items
         * @return array
         */
        public function sort_items($items = array()) {
            $ordered_items = array();

            foreach ($items as $key => $item) {
                $ordered_items[$key] = $item['x'];
            }

            array_multisort($ordered_items, SORT_ASC, $items);

            return $items;
        }

        /**
         *Column Element
         *
         * @since    1.0.0
         * @access   public
         *
         * @param $column_elements
         */
        public function column_elements($column_elements) {
            echo '<div class="grid-container"><div class="grid-row">';
            $added_elements_ids = array();
            $max_col            = 12;
            $total_elements     = count($column_elements);
            $i                  = 1;
            $prev_width         = 0;
            foreach ($column_elements as $single_elements) {

                $id                   = $single_elements['id'];
                $added_elements_ids[] = $id;
                $x                    = $single_elements['x'];
                $width                = $single_elements['width'];

                $grid = 'grid-' . $width;
                if ($prev_width < $x) {
                    $diff      = $x - $prev_width;
                    $diff_grid = 'grid-' . $diff;
                    echo '<div class="' . $diff_grid . '"></div>';
                }
                echo '<div class="cwp-grid-column ' . $grid . '">';
                $slug = 'template-parts/header/' . $id;
                cosmoswp_get_template_part($id, $slug);
                echo '</div>';

                $prev_width = $x + $width;
                if ($i == $total_elements && $prev_width < $max_col) {
                    $diff      = $max_col - $prev_width;
                    $diff_grid = 'grid-' . $diff;
                    echo '<div class="' . $diff_grid . '"></div>';
                }
                $i++;
            }
            echo '</div>';/*.grid-row*/
            do_action('cosmoswp_below_row', $added_elements_ids);
            echo '</div>';/*.grid-container*/
        }

        /**
         * Callback Function For cosmoswp_action_header
         * Display Header Content
         *
         * @since    1.0.0
         * @access   public
         *
         * @return
         */
        public function display_header() {
	        if (cosmoswp_is_active_header()) {
		        ?>
                <header id="cwp-header-wrap" <?php cosmoswp_header_wrap_classes(); ?>>
			        <?php
                    $builder = cosmoswp_header_builder()->get_builder();
			        if (isset($builder['desktop']) && !empty($builder['desktop'])) {
				        $desktop_builder = $builder['desktop'];
				        foreach ($desktop_builder as $key => $single_row) {
					        if (empty($single_row)) {
						        unset($desktop_builder[$key]);
					        }
				        }
				        if (!empty($desktop_builder)) {
					        cosmoswp_header_builder()->desktop_header($desktop_builder);
				        }
			        }
			        if (isset($builder['mobile']) && !empty($builder['mobile'])) {
				        $mobile_builder = $builder['mobile'];
				        foreach ($mobile_builder as $key => $single_row) {
					        if (empty($single_row)) {
						        unset($mobile_builder[$key]);
					        }
				        }
				        if (!empty($mobile_builder)) {
                            cosmoswp_header_builder()->mobile_header($mobile_builder);
                        }
			        }
			        ?>
                </header>
		        <?php
	        }

        }

	    /**
	     * Callback Function For cosmoswp_action_header
	     * Display Header Content
	     *
	     * @since    1.0.0
	     * @access   public
	     *
	     * @return void
	     */
	    public function header_outside() {

		    if (cosmoswp_is_active_header()) {

			    $menu_display_style = cosmoswp_get_theme_options('menu-icon-display-menu');
			    $menu_icon_align    = cosmoswp_get_theme_options('menu-icon-close-icon-align');
			    $menu_icon_align    = ($menu_icon_align) ? $menu_icon_align : '';

			    $icon_type      = cosmoswp_get_theme_options('menu-icon-close-icon-options');
			    $icon_structure = $icon_spacer = '';
			    if ($icon_type == 'text') {
				    $close_text     = cosmoswp_get_theme_options('menu-close-text');
				    $icon_structure = cosmoswp_get_icon_structure($icon_type, $close_text, 0, 0);
			    }
                elseif ($icon_type == 'icon') {
				    $close_icon     = cosmoswp_get_theme_options('menu-close-icon');
				    $icon_structure = cosmoswp_get_icon_structure($icon_type, 0, $close_icon, 0);
			    }
                elseif ($icon_type == 'both') {
				    $close_text     = cosmoswp_get_theme_options('menu-close-text');
				    $close_icon     = cosmoswp_get_theme_options('menu-close-icon');
				    $icon_position  = cosmoswp_get_theme_options('menu-icon-close-icon-position');
				    $icon_spacer    = cosmoswp_get_icon_postion_class($icon_position);
				    $icon_structure = cosmoswp_get_icon_structure($icon_type, $close_text, $close_icon, $icon_position);
			    }
			    ?>
                <div id="cwp-header-menu-sidebar" class="cwp-header-menu-sidebar <?php echo esc_attr(cosmoswp_string_concator($menu_display_style, $icon_spacer ,$menu_icon_align)); ?>">
                    <div class="cwp-close-btn-box">
                        <a class="cwp-close-btn" href="#"><?php echo $icon_structure ?></a>
                    </div>
				    <?php
                    $builder = cosmoswp_header_builder()->get_builder();
                    if (isset($builder['all']['sidebar']) && !empty($builder['all']['sidebar'])) {
					    $sidebar_element = $builder['all']['sidebar'];
					    if (is_array($sidebar_element)) {
						    foreach ($sidebar_element as $key) {
							    if (isset($key['id']) && !empty($key['id'])) {
                                    $slug = 'template-parts/header/' . $key['id'];
                                    cosmoswp_get_template_part($key['id'], $slug);
							    }
						    }
					    }
				    }
				    ?>
                </div>
			    <?php
		    }


	    }

	    /**
         * Display Desktop Header Content
         *
         * @since    1.0.0
         * @access   public
         *
         * @return array
         */
        public function desktop_header($desktop_builder) {

            ?>
            <div class="cwp-desktop-header cwp-hide-on-mobile">
                <?php
                if (isset($desktop_builder['top'])) {

                    ?>
                    <!-- Start of .cwp-top-header -->
                    <div class="cwp-top-header <?php cosmoswp_header_top_classes(); ?>">
                        <?php
                        $top_elements = cosmoswp_header_builder()->sort_items($desktop_builder['top']);
                        cosmoswp_header_builder()->column_elements($top_elements);
                        ?>
                    </div>
                    <!-- End of .cwp-top-header -->
                    <?php

                }
                if (isset($desktop_builder['main'])) {
                    ?>
                    <div class="cwp-main-header <?php cosmoswp_header_main_classes(); ?>">
                        <?php
                        $main_elements = cosmoswp_header_builder()->sort_items($desktop_builder['main']);
                        cosmoswp_header_builder()->column_elements($main_elements);
                        ?>
                    </div>
                    <?php

                }
                if (isset($desktop_builder['bottom'])) {
                    ?>
                    <!-- Start of .cwp-bottom-header -->
                    <div class="cwp-bottom-header <?php cosmoswp_header_bottom_classes(); ?>">
                        <?php
                        $bottom_elements = cosmoswp_header_builder()->sort_items($desktop_builder['bottom']);
                        cosmoswp_header_builder()->column_elements($bottom_elements);
                        ?>
                    </div>
                    <!-- End of .cwp-bottom-header -->
                    <?php
                }
                ?>
            </div>
            <?php

        }

        /**
         * Display Mobile Header Content
         *
         * @since    1.0.0
         * @access   public
         *
         * @return array
         */
        public function mobile_header($mobile_builder) {
            ?>
            <div class="cwp-mobile-header cwp-hide-on-desktop">
                <?php
                if (isset($mobile_builder['top'])) {
                    ?>
                    <!-- Start of .cwp-top-header -->
                    <div class="cwp-top-header">
                        <?php
                        $top_elements = cosmoswp_header_builder()->sort_items($mobile_builder['top']);
                        cosmoswp_header_builder()->column_elements($top_elements);
                        ?>
                    </div>
                    <!-- End of .cwp-top-header -->
                    <?php

                }
                if (isset($mobile_builder['main'])) {
                    ?>
                    <div class="cwp-main-header">
                        <?php
                        $main_elements = cosmoswp_header_builder()->sort_items($mobile_builder['main']);
                        cosmoswp_header_builder()->column_elements($main_elements);
                        ?>
                    </div>
                    <?php

                }
                if (isset($mobile_builder['bottom'])) {
                    ?>
                    <!-- Start of .cwp-bottom-header -->
                    <div class="cwp-bottom-header">
                        <?php
                        $bottom_elements = cosmoswp_header_builder()->sort_items($mobile_builder['bottom']);
                        cosmoswp_header_builder()->column_elements($bottom_elements);
                        ?>
                    </div>
                    <!-- End of .cwp-bottom-header -->
                    <?php
                }
                ?>
            </div>
            <?php
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

            require cosmoswp_file_directory('inc/customizer/header-options/dynamic-css.php');
            if (is_array($dynamic_css) && !empty($dynamic_css)) {
                $all_css = array_merge_recursive($dynamic_css, $local_dynamic_css);
                return $all_css;
            } else {
                return $local_dynamic_css;
            }
        }

        /**
         * Callback functions for cosmoswp_enqueue_google_fonts,
         * Header Options Typography
         *
         * @since    1.0.0
         * @access   public
         *
         * @param $google_font_family_array
         * @return array
         */
        public function enqueue_google_fonts($google_font_family_array) {
            $local_google_fonts = array();

            $site_identity_typography_options = cosmoswp_get_theme_options('site-identity-typography-options');
            $site_title_typography            = cosmoswp_get_theme_options('site-title-typography');
            $site_title_typography            = json_decode($site_title_typography, true);
            $site_title_font_family           = cosmoswp_font_family($site_title_typography);

            $site_tagline_typography  = cosmoswp_get_theme_options('site-tagline-typography');
            $site_tagline_typography  = json_decode($site_tagline_typography, true);
            $site_tagline_font_family = cosmoswp_font_family($site_tagline_typography);
            if ('custom' == $site_identity_typography_options) {
                if (cosmoswp_is_font_type_google($site_title_typography)) {
                    $local_google_fonts[] = array(
                        'family'      => $site_title_font_family,
                        'font-weight' => $site_title_typography['font-weight']
                    );
                }
                if (cosmoswp_is_font_type_google($site_tagline_typography)) {
                    $local_google_fonts[] = array(
                        'family'      => $site_tagline_font_family,
                        'font-weight' => $site_tagline_typography['font-weight']
                    );
                }
            }

            $dds_typography_options = cosmoswp_get_theme_options('dd-search-typography-options');
            $dds_typography         = cosmoswp_get_theme_options('dd-search-typography');
            $dds_typography         = json_decode($dds_typography, true);
            $dds_font_family        = cosmoswp_font_family($dds_typography);
            if ('custom' == $dds_typography_options && cosmoswp_is_font_type_google($dds_typography)) {
                $local_google_fonts[] = array(
                    'family'      => $dds_font_family,
                    'font-weight' => $dds_typography['font-weight']
                );
            }

            $ns_typography_options = cosmoswp_get_theme_options('normal-search-typography-options');
            $ns_typography         = cosmoswp_get_theme_options('normal-search-typography');
            $ns_typography         = json_decode($ns_typography, true);
            $ns_font_family        = cosmoswp_font_family($ns_typography);
            if ('custom' == $ns_typography_options && cosmoswp_is_font_type_google($ns_typography)) {
                $local_google_fonts[] = array(
                    'family'      => $ns_font_family,
                    'font-weight' => $ns_typography['font-weight']
                );
            }

            $button_one_typography_options = cosmoswp_get_theme_options('button-one-typography-options');
            $button_one_typography         = cosmoswp_get_theme_options('button-one-typography');
            $button_one_typography         = json_decode($button_one_typography, true);
            $button_one_font_family        = cosmoswp_font_family($button_one_typography);
            if ('custom' == $button_one_typography_options && cosmoswp_is_font_type_google($button_one_typography)) {
                $local_google_fonts[] = array(
                    'family'      => $button_one_font_family,
                    'font-weight' => $button_one_typography['font-weight']
                );
            }

            $secondary_menu_typography_options = cosmoswp_get_theme_options('secondary-menu-typography-options');
            $secondary_menu_typography         = cosmoswp_get_theme_options('secondary-menu-typography');
            $secondary_menu_typography         = json_decode($secondary_menu_typography, true);
            $secondary_menu_font_family        = cosmoswp_font_family($secondary_menu_typography);
            if ('custom' == $secondary_menu_typography_options && cosmoswp_is_font_type_google($secondary_menu_typography)) {
                $local_google_fonts[] = array(
                    'family'      => $secondary_menu_font_family,
                    'font-weight' => $secondary_menu_typography['font-weight']
                );
            }

            $sm_submenu_typography_options = cosmoswp_get_theme_options('secondary-menu-submenu-typography-options');
            $sm_submenu_typography         = cosmoswp_get_theme_options('secondary-menu-submenu-typography');
            $sm_submenu_typography         = json_decode($sm_submenu_typography, true);
            $sm_submenu_font_family        = cosmoswp_font_family($sm_submenu_typography);
            if ('custom' == $sm_submenu_typography_options && cosmoswp_is_font_type_google($sm_submenu_typography)) {
                $local_google_fonts[] = array(
                    'family'      => $sm_submenu_font_family,
                    'font-weight' => $sm_submenu_typography['font-weight']
                );
            }

            $primary_menu_typography_options = cosmoswp_get_theme_options('primary-menu-typography-options');
            $primary_menu_typography         = cosmoswp_get_theme_options('primary-menu-typography');
            $primary_menu_typography         = json_decode($primary_menu_typography, true);
            $primary_menu_font_family        = cosmoswp_font_family($primary_menu_typography);
            if ('custom' == $primary_menu_typography_options && cosmoswp_is_font_type_google($primary_menu_typography)) {
                $local_google_fonts[] = array(
                    'family'      => $primary_menu_font_family,
                    'font-weight' => $primary_menu_typography['font-weight']
                );
            }

            $pm_submenu_typography_options = cosmoswp_get_theme_options('primary-menu-submenu-typography-options');
            $pm_submenu_typography         = cosmoswp_get_theme_options('primary-menu-submenu-typography');
            $pm_submenu_typography         = json_decode($pm_submenu_typography, true);
            $pm_submenu_font_family        = cosmoswp_font_family($pm_submenu_typography);
            if ('custom' == $pm_submenu_typography_options && cosmoswp_is_font_type_google($pm_submenu_typography)) {
                $local_google_fonts[] = array(
                    'family'      => $pm_submenu_font_family,
                    'font-weight' => $pm_submenu_typography['font-weight']
                );
            }

            $menu_icon_typography_options = cosmoswp_get_theme_options('menu-open-icon-typography-options');
            $menu_icon_typography         = cosmoswp_get_theme_options('menu-open-icon-typography');
            $menu_icon_typography         = json_decode($menu_icon_typography, true);
            $menu_icon_font_family        = cosmoswp_font_family($menu_icon_typography);
            if ('custom' == $menu_icon_typography_options && cosmoswp_is_font_type_google($menu_icon_typography)) {
                $local_google_fonts[] = array(
                    'family'      => $menu_icon_font_family,
                    'font-weight' => $menu_icon_typography['font-weight']
                );
            }


            $menu_close_icon_typography_options = cosmoswp_get_theme_options('menu-icon-close-text-typography-options');
            $menu_close_icon_typography         = cosmoswp_get_theme_options('menu-icon-close-text-typography');
            $menu_close_icon_typography         = json_decode($menu_close_icon_typography, true);
            $menu_close_icon_font_family        = cosmoswp_font_family($menu_close_icon_typography);
            if ('custom' == $menu_close_icon_typography_options && cosmoswp_is_font_type_google($menu_close_icon_typography)) {
                $local_google_fonts[] = array(
                    'family'      => $menu_close_icon_font_family,
                    'font-weight' => $menu_close_icon_typography['font-weight']
                );
            }

            $contact_title_typography_options = cosmoswp_get_theme_options('contact-info-title-typography-options');
            $contact_title_typography         = cosmoswp_get_theme_options('contact-info-title-typography');
            $contact_title_typography         = json_decode($contact_title_typography, true);
            $contact_title_font_family        = cosmoswp_font_family($contact_title_typography);
            if ('custom' == $contact_title_typography_options && cosmoswp_is_font_type_google($contact_title_typography)) {
                $local_google_fonts[] = array(
                    'family'      => $contact_title_font_family,
                    'font-weight' => $contact_title_typography['font-weight']
                );
            }

            $contact_subtitle_typography_options = cosmoswp_get_theme_options('contact-info-subtitle-typography-options');
            $contact_subtitle_typography         = cosmoswp_get_theme_options('contact-info-subtitle-typography');
            $contact_subtitle_typography         = json_decode($contact_subtitle_typography, true);
            $contact_subtitle_font_family        = cosmoswp_font_family($contact_subtitle_typography);
            if ('custom' == $contact_subtitle_typography_options && cosmoswp_is_font_type_google($contact_subtitle_typography)) {
                $local_google_fonts[] = array(
                    'family'      => $contact_subtitle_font_family,
                    'font-weight' => $contact_subtitle_typography['font-weight']
                );
            }

            return array_merge($google_font_family_array, $local_google_fonts);
        }
    }

endif;

/**
 * Create Instance for CosmosWP_Header_Builder
 *
 * @since    1.0.0
 * @access   public
 *
 * @param
 * @return object
 */
if (!function_exists('cosmoswp_header_builder')) {

    function cosmoswp_header_builder() {

        return CosmosWP_Header_Builder::instance();
    }

    cosmoswp_header_builder()->run();
}