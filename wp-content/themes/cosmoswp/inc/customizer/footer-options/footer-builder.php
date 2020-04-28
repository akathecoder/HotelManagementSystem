<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Footer Builder and Customizer Options
 * @package CosmosWP
 */
if (!class_exists('CosmosWP_Footer_Builder')) :

    class CosmosWP_Footer_Builder {

        /**
         * Panel ID, use for builder ID too
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $panel = 'cosmoswp_footer';

        /**
         * Builder Sections and Controller ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $builder_section_controller = 'cosmoswp_footer_builder_section_controller';

        /*Builder Rows and Customizer Settings*/

        /**
         * Footer Top Row and Its setting
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $footer_top = 'cosmoswp_footer_top';

        /**
         * Footer Main Row and Its setting
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $footer_main = 'cosmoswp_footer_main';

        /**
         * Footer Bottom Row and Its setting
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $footer_bottom = 'cosmoswp_footer_bottom';

        /**
         * Footer HTML Row and Its setting
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $footer_html = 'footer_html';

        /*Footer Elements Section, Setting and Control ID*/
        /**
         * Copyright Section/Setting/Control ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $copyright = 'footer_copyright';

        /**
         * Footer Menu Section/Setting/Control ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $footer_menu = 'footer_menu';

        /**
         * Footer Socials Section/Setting/Control ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $footer_social = 'footer_social';

        /**
         * Footer Sidebars Section/Setting/Control ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $footer_sidebar_1 = 'sidebar-widgets-footer-sidebar-1';
        public $footer_sidebar_2 = 'sidebar-widgets-footer-sidebar-2';
        public $footer_sidebar_3 = 'sidebar-widgets-footer-sidebar-3';
        public $footer_sidebar_4 = 'sidebar-widgets-footer-sidebar-4';
        public $footer_sidebar_5 = 'sidebar-widgets-footer-sidebar-5';
        public $footer_sidebar_6 = 'sidebar-widgets-footer-sidebar-6';
        public $footer_sidebar_7 = 'sidebar-widgets-footer-sidebar-7';
        public $footer_sidebar_8 = 'sidebar-widgets-footer-sidebar-8';

        /**
         * Main Instance
         *
         * Insures that only one instance of CosmosWP_Footer_Builder exists in memory at any one
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
                $instance = new CosmosWP_Footer_Builder;
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

            add_filter('cosmoswp_default_theme_options', array($this, 'footer_defaults'));
            add_filter('cosmoswp_builders', array($this, 'footer_builder'));
            add_action('customize_register', array($this, 'customize_register'), 100);
            add_action('cosmoswp_action_footer', array($this, 'display_footer'), 100);
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
            $builder = cosmoswp_get_theme_options(cosmoswp_footer_builder()->builder_section_controller);
            if ( is_array( $builder ) ) {
                $builder = json_encode( urldecode_deep( $builder ), true );
            }
            set_theme_mod(cosmoswp_footer_builder()->builder_section_controller,$builder);
        }

        /**
         * Get footer builder
         *
         * @since    1.1.0
         * @access   public
         *
         * @param null
         * @return void
         */
        public function get_builder(){
            $builder = cosmoswp_get_theme_options(cosmoswp_footer_builder()->builder_section_controller);
            if ( ! is_array( $builder ) ) {
                $builder = json_decode( urldecode_deep( $builder ), true );
            }
            return $builder;
        }

        /**
         * Callback functions for cosmoswp_default_theme_options,
         * Add Footer Builder defaults values
         *
         * @since    1.0.0
         * @access   public
         *
         * @param array $default_options
         * @return array
         */
        public function footer_defaults($default_options = array()) {

            require cosmoswp_file_directory('inc/customizer/footer-options/footer-defaults.php');
            return array_merge($default_options, $footer_defaults);
        }

        /**
         * Callback functions for cosmoswp_builders,
         * Add Footer Builder elements
         *
         * @since    1.0.0
         * @access   public
         *
         * @param array $builder builder fields
         * @return array
         */
        public function footer_builder($builder) {
            $footer_builder = array(cosmoswp_footer_builder()->panel => array(
                'id' => cosmoswp_footer_builder()->panel,
                'title' => esc_html__('Footer Builder', 'cosmoswp'),
                'control_id' => cosmoswp_footer_builder()->builder_section_controller,
                'panel' => cosmoswp_footer_builder()->panel,
                'section' => cosmoswp_footer_builder()->builder_section_controller,
                'devices' => array('desktop' => esc_html__('Desktop', 'cosmoswp'),),
                'items' => array(
                    cosmoswp_footer_builder()->copyright => array(
                        'icon' => 'dashicons dashicons-awards',
                        'name' => esc_html__('Copyright', 'cosmoswp'),
                        'id' => cosmoswp_footer_builder()->copyright,
                        'col' => 0, 'width' => '4',
                        'section' => cosmoswp_footer_builder()->copyright
                    ),
                    cosmoswp_footer_builder()->footer_menu => array(
                        'icon' => 'dashicons dashicons-menu',
                        'name' => esc_html__('Footer Menu', 'cosmoswp'),
                        'id' => cosmoswp_footer_builder()->footer_menu,
                        'col' => 0,
                        'width' => '4',
                        'section' => cosmoswp_footer_builder()->footer_menu,
                    ),
                    cosmoswp_footer_builder()->footer_social => array(
                        'icon' => 'dashicons dashicons-networking',
                        'name' => esc_html__('Social Icons', 'cosmoswp'),
                        'id' => cosmoswp_footer_builder()->footer_social,
                        'col' => 0,
                        'width' => '4',
                        'section' => cosmoswp_footer_builder()->footer_social,
                    ),
                    cosmoswp_footer_builder()->footer_html => array(
                        'icon' => 'dashicons dashicons-edit',
                        'name' => esc_html__('HTML', 'cosmoswp'),
                        'id' => cosmoswp_footer_builder()->footer_html,
                        'col' => 0,
                        'width' => '4',
                        'section' => cosmoswp_footer_builder()->footer_html,
                    ),
                    cosmoswp_footer_builder()->footer_sidebar_1 => array(
                        'icon' => 'dashicons dashicons-format-aside',
                        'name' => esc_html__('Footer Sidebar 1', 'cosmoswp'),
                        'id' => cosmoswp_footer_builder()->footer_sidebar_1,
                        'col' => 0,
                        'width' => '4',
                        'section' => cosmoswp_footer_builder()->footer_sidebar_1,
                    ),
                    cosmoswp_footer_builder()->footer_sidebar_2 => array(
                        'icon' => 'dashicons dashicons-format-aside',
                        'name' => esc_html__('Footer Sidebar 2', 'cosmoswp'),
                        'id' => cosmoswp_footer_builder()->footer_sidebar_2,
                        'col' => 0,
                        'width' => '4',
                        'section' => cosmoswp_footer_builder()->footer_sidebar_2
                    ),
                    cosmoswp_footer_builder()->footer_sidebar_3 => array(
                        'icon' => 'dashicons dashicons-format-aside',
                        'name' => esc_html__('Footer Sidebar 3', 'cosmoswp'),
                        'id' => cosmoswp_footer_builder()->footer_sidebar_3,
                        'col' => 0, 'width' => '4',
                        'section' => cosmoswp_footer_builder()->footer_sidebar_3
                    ),
                    cosmoswp_footer_builder()->footer_sidebar_4 => array(
                        'icon' => 'dashicons dashicons-format-aside',
                        'name' => esc_html__('Footer Sidebar 4', 'cosmoswp'),
                        'id' => cosmoswp_footer_builder()->footer_sidebar_4,
                        'col' => 0,
                        'width' => '4',
                        'section' => cosmoswp_footer_builder()->footer_sidebar_4
                    ),
                    cosmoswp_footer_builder()->footer_sidebar_5 => array(
                        'icon' => 'dashicons dashicons-format-aside',
                        'name' => esc_html__('Footer Sidebar 5', 'cosmoswp'),
                        'id' => cosmoswp_footer_builder()->footer_sidebar_5,
                        'col' => 0,
                        'width' => '4',
                        'section' => cosmoswp_footer_builder()->footer_sidebar_5
                    ),
                    cosmoswp_footer_builder()->footer_sidebar_6 => array(
                        'icon' => 'dashicons dashicons-format-aside',
                        'name' => esc_html__('Footer Sidebar 6', 'cosmoswp'),
                        'id' => cosmoswp_footer_builder()->footer_sidebar_6,
                        'col' => 0,
                        'width' => '4',
                        'section' => cosmoswp_footer_builder()->footer_sidebar_6
                    ),
                    cosmoswp_footer_builder()->footer_sidebar_7 => array(
                        'icon' => 'dashicons dashicons-format-aside',
                        'name' => esc_html__('Footer Sidebar 7', 'cosmoswp'),
                        'id' => cosmoswp_footer_builder()->footer_sidebar_7, 'col' => 0,
                        'width' => '4',
                        'section' => cosmoswp_footer_builder()->footer_sidebar_7
                    ),
                    cosmoswp_footer_builder()->footer_sidebar_8 => array(
                        'icon' => 'dashicons dashicons-format-aside',
                        'name' => esc_html__('Footer Sidebar 8', 'cosmoswp'),
                        'id' => cosmoswp_footer_builder()->footer_sidebar_8, 'col' => 0,
                        'width' => '4', 'section' => cosmoswp_footer_builder()->footer_sidebar_8
                    )
                ),
                'rows' => array(
                    'top' => esc_html__('Footer Top', 'cosmoswp'),
                    'main' => esc_html__('Footer Main', 'cosmoswp'),
                    'bottom' => esc_html__('Footer Bottom', 'cosmoswp')
                )
            )
            );
            $footer_builder = apply_filters('cosmoswp_footer_builder', $footer_builder);
            return array_merge($builder, $footer_builder);

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
            $footer_defaults = cosmoswp_footer_builder()->footer_defaults();

            /**
             * Panel
             */
            $wp_customize->add_panel(
                cosmoswp_footer_builder()->panel,
                array(
                    'title' => esc_html__('Footer Builder/Options', 'cosmoswp'),
                    'priority' => 80
                )
            );

            /**
             * Builder Section use for builder only
             */
            $wp_customize->add_section(
                cosmoswp_footer_builder()->builder_section_controller,
                array(
                    'title' => esc_html__('Footer Builder', 'cosmoswp'),
                    'priority' => 10,
                    'panel' => cosmoswp_footer_builder()->panel
                )
            );

            /**
             * Builder control and setting
             */
            $wp_customize->add_setting(
                cosmoswp_footer_builder()->builder_section_controller,
                array(
                    'default' => $footer_defaults[cosmoswp_footer_builder()->builder_section_controller],
                    'sanitize_callback' => 'cosmoswp_customizer_builder_sanitize_field',
                    'transport'         => 'postMessage'
                )
            );

            $wp_customize->add_control(
                    cosmoswp_footer_builder()->builder_section_controller,
                    array(
                        'label' => esc_html__('Footer Builder', 'cosmoswp'),
                        'section' => cosmoswp_footer_builder()->builder_section_controller,
                        'settings' => cosmoswp_footer_builder()->builder_section_controller,
                        'type' => 'text'
                    )
            );

            /*Footer Defaults Layout*/
            require cosmoswp_file_directory('inc/customizer/footer-options/footer-general.php');
            require cosmoswp_file_directory('inc/customizer/footer-options/footer-top.php');
            require cosmoswp_file_directory('inc/customizer/footer-options/footer-main.php');
            require cosmoswp_file_directory('inc/customizer/footer-options/footer-bottom.php');
            require cosmoswp_file_directory('inc/customizer/footer-options/copyright.php');
            require cosmoswp_file_directory('inc/customizer/footer-options/footer-menu.php');
            require cosmoswp_file_directory('inc/customizer/footer-options/footer-social.php');
            require cosmoswp_file_directory('inc/customizer/footer-options/html.php');
            /*sidebar*/
            require cosmoswp_file_directory('inc/customizer/footer-options/footer-sidebar-1.php');
            require cosmoswp_file_directory('inc/customizer/footer-options/footer-sidebar-2.php');
            require cosmoswp_file_directory('inc/customizer/footer-options/footer-sidebar-3.php');
            require cosmoswp_file_directory('inc/customizer/footer-options/footer-sidebar-4.php');
            require cosmoswp_file_directory('inc/customizer/footer-options/footer-sidebar-5.php');
            require cosmoswp_file_directory('inc/customizer/footer-options/footer-sidebar-6.php');
            require cosmoswp_file_directory('inc/customizer/footer-options/footer-sidebar-7.php');
            require cosmoswp_file_directory('inc/customizer/footer-options/footer-sidebar-8.php');
        }

        /**
         * Sort Item of Footer Builder Item
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
         *Reterive Column Element
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
                if (file_exists(trailingslashit(get_template_directory()) . 'template-parts/footer/' . $id . '.php')) {
                    get_template_part('template-parts/footer/' . $id);
                }
                else {
                    echo esc_html__('Create New File ', 'cosmoswp') . 'template-parts/footer/' . $id . '.php';
                }

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
            echo '</div>';/*.grid-container*/
        }

        /**
         * Callback Function For cosmoswp_action_footer
         * Display Footer Content
         *
         * @since    1.0.0
         * @access   public
         *
         * @return
         */
        public function display_footer() {

            ?>
            <footer id='cwp-footer-wrap' class="cwp-dynamic-footer <?php cosmoswp_footer_wrap_classes(); ?>">
                <?php do_action('cosmoswp_action_sticky_footer'); ?>
                <div class="cwp-scrollbar cwp-scrollbar-inner">
                    <?php
                    $builder = cosmoswp_footer_builder()->get_builder();
                    if (isset($builder['desktop']) && !empty($builder['desktop'])) {
                        $desktop_builder = $builder['desktop'];
                        foreach ($desktop_builder as $key => $single_row) {
                            if (empty($single_row)) {
                                unset($desktop_builder[$key]);
                            }
                        }
                        if (!empty($desktop_builder)) {
                            cosmoswp_footer_builder()->desktop_footer($desktop_builder);
                        }
                    }
                    ?>
                </div>
            </footer>
            <?php
        }

        /**
         * Display Desktop Footer Content
         *
         * @since    1.0.0
         * @access   public
         *
         * @return
         */
        public function desktop_footer($desktop_builder) {
            /* footer top widget title align */
            $top_widget_title_align   = cosmoswp_get_theme_options('footer-top-widget-title-align');
            $top_widget_content_align = cosmoswp_get_theme_options('footer-top-widget-content-align');

            /* footer main widget title align */
            $main_widget_title_align   = cosmoswp_get_theme_options('footer-main-widget-title-align');
            $main_widget_content_align = cosmoswp_get_theme_options('footer-main-widget-content-align');

            /*Footer bottom*/
            $bottom_widget_title_align   = cosmoswp_get_theme_options('footer-bottom-widget-title-align');
            $bottom_widget_content_align = cosmoswp_get_theme_options('footer-bottom-widget-content-align');
            ?>
            <div class="cwp-footer-wrapper">
                <div class="cwp-desktop-footer">
                    <?php
                    if (isset($desktop_builder['top'])) {
                        ?>
                        <!-- Start of .cwp-top-footer -->
                        <div class="cwp-top-footer <?php cosmoswp_footer_top_wrap_classes(); ?>" data-widget-title="<?php echo esc_attr($top_widget_title_align); ?>"
                             data-widget-content="<?php echo esc_attr($top_widget_content_align); ?>">
                            <?php
                            $top_elements = cosmoswp_footer_builder()->sort_items($desktop_builder['top']);
                            cosmoswp_footer_builder()->column_elements($top_elements);
                            ?>
                        </div>
                        <!-- End of .cwp-top-footer -->
                        <?php

                    }
                    if (isset($desktop_builder['main'])) {
                        ?>
                        <div class="cwp-main-footer <?php cosmoswp_footer_main_wrap_classes(); ?>" data-widget-title="<?php echo esc_attr($main_widget_title_align); ?>"
                             data-widget-content="<?php echo esc_attr($main_widget_content_align); ?>">
                            <?php
                            $main_elements = cosmoswp_footer_builder()->sort_items($desktop_builder['main']);
                            cosmoswp_footer_builder()->column_elements($main_elements);
                            ?>
                        </div>
                        <?php

                    }
                    if (isset($desktop_builder['bottom'])) {
                        ?>
                        <!-- Start of .cwp-bottom-footer -->
                        <div class="cwp-bottom-footer <?php cosmoswp_footer_bottom_wrap_classes(); ?>"
                             data-widget-title="<?php echo esc_attr($bottom_widget_title_align); ?>"
                             data-widget-content="<?php echo esc_attr($bottom_widget_content_align); ?>">
                            <?php
                            $bottom_elements = cosmoswp_footer_builder()->sort_items($desktop_builder['bottom']);
                            cosmoswp_footer_builder()->column_elements($bottom_elements);
                            ?>
                        </div>
                        <!-- End of .cwp-bottom-footer -->
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }

        /**
         * Footer get_elements
         *
         * @since    1.0.0
         * @access   public
         *
         * @return
         */
        public function get_elements($device_elements) {
            if (is_array($device_elements)) {
                foreach ($device_elements as $key) {
                    echo '<div class="grid-container">';
                    echo '<div class="grid-row">';
                    echo '<div class="grid-md-12">';
                    if (isset($key['id']) && !empty($key['id'])) {

                        if (file_exists(trailingslashit(get_template_directory()) . 'template-parts/footer/' . $key['id'] . '.php')) {
                            get_template_part('template-parts/footer/' . $key['id']);
                        }
                        else {
                            echo esc_html__('Create New File ', 'cosmoswp') . 'template-parts/footer/' . $$key['id'] . '.php';
                        }
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
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
            require cosmoswp_file_directory('inc/customizer/footer-options/dynamic-css.php');

            if (is_array($footer_dynamic_css) && !empty($footer_dynamic_css)) {
                if (is_array($dynamic_css) && !empty($dynamic_css)) {
                    $all_css = array_merge_recursive($dynamic_css, $footer_dynamic_css);
                    return $all_css;
                }
            }
            else {
                return $footer_dynamic_css;
            }
        }

        /**
         * Callback functions for cosmoswp_enqueue_google_fonts,
         * Footer Typography
         *
         * @since    1.0.0
         * @access   public
         *
         * @param $google_font_family_array
         * @return array
         */
        public function enqueue_google_fonts($google_font_family_array) {
            $local_google_fonts = array();

            $widget_title_typography_options = cosmoswp_get_theme_options('footer-top-widget-title-typography-options');
            $widget_title_typography         = cosmoswp_get_theme_options('footer-top-widget-title-typography');
            $widget_title_typography         = json_decode($widget_title_typography, true);
            $widget_title_font_family        = cosmoswp_font_family($widget_title_typography);

            if ('custom' == $widget_title_typography_options && cosmoswp_is_font_type_google($widget_title_typography)) {
                $local_google_fonts[] = array('family' => $widget_title_font_family, 'font-weight' => $widget_title_typography['font-weight']);
            }

            $widget_content_typography_options = cosmoswp_get_theme_options('footer-top-widget-content-typography-options');
            $widget_content_typography         = cosmoswp_get_theme_options('footer-top-widget-content-typography');
            $widget_content_typography         = json_decode($widget_content_typography, true);
            $widget_content_font_family        = cosmoswp_font_family($widget_content_typography);

            if ('custom' == $widget_content_typography_options && cosmoswp_is_font_type_google($widget_title_typography)) {
                $local_google_fonts[] = array('family' => $widget_content_font_family, 'font-weight' => $widget_title_typography['font-weight']);
            }

            $widget_title_typography_options = cosmoswp_get_theme_options('footer-main-widget-title-typography-options');
            $widget_title_typography         = cosmoswp_get_theme_options('footer-main-widget-title-typography');
            $widget_title_typography         = json_decode($widget_title_typography, true);
            $widget_title_font_family        = cosmoswp_font_family($widget_title_typography);
            if ('custom' == $widget_title_typography_options && cosmoswp_is_font_type_google($widget_title_typography)) {
                $local_google_fonts[] = array('family' => $widget_title_font_family, 'font-weight' => $widget_title_typography['font-weight']);
            }

            $widget_content_typography_options = cosmoswp_get_theme_options('footer-main-widget-content-typography-options');
            $widget_content_typography         = cosmoswp_get_theme_options('footer-main-widget-content-typography');
            $widget_content_typography         = json_decode($widget_content_typography, true);
            $widget_content_font_family        = cosmoswp_font_family($widget_content_typography);

            if ('custom' == $widget_content_typography_options && cosmoswp_is_font_type_google($widget_title_typography)) {
                $local_google_fonts[] = array('family' => $widget_content_font_family, 'font-weight' => $widget_title_typography['font-weight']);
            }

            $widget_title_typography_options = cosmoswp_get_theme_options('footer-bottom-widget-title-typography-options');
            $widget_title_typography         = cosmoswp_get_theme_options('footer-bottom-widget-title-typography');
            $widget_title_typography         = json_decode($widget_title_typography, true);
            $widget_title_font_family        = cosmoswp_font_family($widget_title_typography);
            if ('custom' == $widget_title_typography_options && cosmoswp_is_font_type_google($widget_title_typography)) {
                $local_google_fonts[] = array('family' => $widget_title_font_family, 'font-weight' => $widget_title_typography['font-weight']);;
            }

            $widget_content_typography_options = cosmoswp_get_theme_options('footer-bottom-widget-content-typography-options');
            $widget_content_typography         = cosmoswp_get_theme_options('footer-bottom-widget-content-typography');
            $widget_content_typography         = json_decode($widget_content_typography, true);
            $widget_content_font_family        = cosmoswp_font_family($widget_content_typography);

            if ('custom' == $widget_content_typography_options && cosmoswp_is_font_type_google($widget_title_typography)) {
                $local_google_fonts[] = array('family' => $widget_content_font_family, 'font-weight' => $widget_title_typography['font-weight']);
            }

            $copyright_typography_options = cosmoswp_get_theme_options('footer-copyright-typography-options');
            $copyright_typography         = cosmoswp_get_theme_options('footer-copyright-typography');
            $copyright_typography         = json_decode($copyright_typography, true);
            $copyright_font_family        = cosmoswp_font_family($copyright_typography);
            if ('custom' == $copyright_typography_options && cosmoswp_is_font_type_google($copyright_typography)) {
                $local_google_fonts[] = array('family' => $copyright_font_family, 'font-weight' => $copyright_typography['font-weight']);
            }

            $footer_menu_typography_options = cosmoswp_get_theme_options('footer-menu-typography-options');
            $footer_menu_typography         = cosmoswp_get_theme_options('footer-menu-typography');
            $footer_menu_typography         = json_decode($footer_menu_typography, true);
            $footer_menu_font_family        = cosmoswp_font_family($footer_menu_typography);
            if ('custom' == $footer_menu_typography_options && cosmoswp_is_font_type_google($footer_menu_typography)) {
                $local_google_fonts[] = array('family' => $footer_menu_font_family, 'font-weight' => $footer_menu_typography['font-weight']);
            }

            return array_merge($google_font_family_array, $local_google_fonts);
        }

        public function cosmoswp_customize_partial_setting_refresh_footer(){
            ob_start();
            $this->display_footer();
            $value = ob_get_clean();
            return $value;
        }
    }
endif;

/**
 * Create Instance for CosmosWP_Footer_Builder
 *
 * @since    1.0.0
 * @access   public
 *
 * @param
 * @return object
 */
if (!function_exists('cosmoswp_footer_builder')) {

    function cosmoswp_footer_builder() {

        return CosmosWP_Footer_Builder::instance();
    }

    cosmoswp_footer_builder()->run();
}