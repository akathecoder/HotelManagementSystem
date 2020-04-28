<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Main Content and Customizer Options
 * @package CosmosWP
 */
if (!class_exists('CosmosWP_Main_Content_Controller')) :

    class CosmosWP_Main_Content_Controller {

        /**
         * Panel ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $panel = 'cosmoswp_main_content';

        /**
         * Section ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $section = 'cosmoswp_main_content';

        /**
         * Main Instance
         *
         * Insures that only one instance of CosmosWP_Main_Content_Controller exists in memory at any one
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
                $instance = new CosmosWP_Main_Content_Controller;
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

            add_filter('cosmoswp_default_theme_options', array($this, 'defaults'));
            add_action('customize_register', array($this, 'customize_register'), 100);
            add_action('cosmoswp_action_page_header', array($this, 'cosmoswp_banner'), 1100);
            add_filter('cosmoswp_dynamic_css', array($this, 'dynamic_css'), 999);

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
        public function defaults($default_options = array()) {

            $defaults = array(

                'main-content-general-padding'            => json_encode(array(
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
                'main-content-general-margin'             => json_encode(array(
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
                'main-content-general-background-options' => json_encode(array(
                    'background-color'      => '#fcfcfc',
                    'background-image'      => '',
                    'background-size'       => 'cover',
                    'background-position'   => 'center',
                    'background-repeat'     => 'no-repeat',
                    'background-attachment' => 'scroll',
                )),
                'main-content-general-border-styling'     => json_encode(array(
                    'border-style'     => 'none',
                    'border-color'     => '',
                    'box-shadow-color' => '',
                    'border-width'     => array(
                        'desktop' => array(
                            'top'         => '',
                            'right'       => '',
                            'bottom'      => '',
                            'left'        => '',
                            'cssbox_link' => true,
                        )
                    ),
                    'box-shadow-css'   => array(
                        'desktop' => array(
                            'x'           => '',
                            'Y'           => '',
                            'BLUR'        => '',
                            'SPREAD'      => '',
                            'cssbox_link' => true,
                        )
                    ),
                    'border-radius'    => array(
                        'desktop' => array(
                            'top'         => '',
                            'right'       => '',
                            'bottom'      => '',
                            'left'        => '',
                            'cssbox_link' => true,
                        )
                    ),
                )),
                'single-banner-section-title'             => 'default',
                'single-banner-title-tag'                 => 'h2',
                'single-custom-banner-title'              => '',
                'banner-section-title-align'              => 'cwp-text-left',
                'banner-section-content-position'          => 'cwp-content-position-bottom',
                'banner-section-display'                  => 'bg-image',
                'banner-section-color'                    => '#fff',
                'banner-section-background-color'         => '#444',
                'enable-banner-overlay-color'             => true,
                'banner-overlay-color'                    => 'rgba(0,0,0,0.4)',
                'banner-section-background-image-options' => json_encode(array(

                    'desktop-background-size'       => 'cover',
                    'desktop-background-position'   => 'center',
                    'desktop-background-repeat'     => 'no-repeat',
                    'desktop-background-attachment' => 'scroll',

                    'tablet-background-size'       => 'cover',
                    'tablet-background-position'   => 'center',
                    'tablet-background-repeat'     => 'no-repeat',
                    'tablet-background-attachment' => 'scroll',

                    'mobile-background-size'       => 'cover',
                    'mobile-background-position'   => 'center',
                    'mobile-background-repeat'     => 'no-repeat',
                    'mobile-background-attachment' => 'scroll',
                )),
                'cosmoswp-banner-height'                  => json_encode(array(
                    'desktop' => '500',
                    'tablet'  => '350',
                    'mobile'  => '200',
                )),
                'banner-margin'                           => json_encode(array(
                    'desktop' => array(
                        'top'         => '0',
                        'right'       => '0',
                        'bottom'      => '40',
                        'left'        => '0',
                        'cssbox_link' => true,
                    ),
                    'tablet'  => array(
                        'top'         => '0',
                        'right'       => '0',
                        'bottom'      => '30',
                        'left'        => '0',
                        'cssbox_link' => true,
                    ),
                    'mobile'  => array(
                        'top'         => '0',
                        'right'       => '0',
                        'bottom'      => '20',
                        'left'        => '0',
                        'cssbox_link' => true,
                    ),
                )),
                'banner-padding'                          => json_encode(array(
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
            );
            return array_merge($default_options, $defaults);
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

            $main_content_defaults = cosmoswp_main_content_controller()->defaults();

            $wp_customize->add_panel(cosmoswp_main_content_controller()->panel, array(
                'title'    => esc_html__('Main Content ', 'cosmoswp'),
                'priority' => 30,
            ));
            /*baner setting section*/
            require cosmoswp_file_directory('inc/customizer/main-content/banner-setting-options.php');
            $wp_customize->add_section(cosmoswp_main_content_controller()->section, array(
                'title'    => esc_html__('Content', 'cosmoswp'),
                'priority' => 10,
                'panel'    => cosmoswp_main_content_controller()->panel,
            ));

            /*General Styling*/
            $wp_customize->add_setting('main-content-general-styling-msg', array(
                'sanitize_callback' => 'wp_kses_post',
            ));
            $wp_customize->add_control(
                new CosmosWP_Custom_Control_Heading(
                    $wp_customize,
                    'main-content-general-styling-msg',
                    array(
                        'label'   => esc_html__('General Styling', 'cosmoswp'),
                        'section' => cosmoswp_main_content_controller()->section,
                    )
                )
            );
            /*Margin*/
            $wp_customize->add_setting('main-content-general-margin', array(
                'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
                'default'           => $main_content_defaults['main-content-general-margin'],
                'transport'         => 'postMessage'
            ));
            $wp_customize->add_control(
                new CosmosWP_Custom_Control_Cssbox(
                    $wp_customize,
                    'main-content-general-margin',
                    array(
                        'label'    => esc_html__('Margin', 'cosmoswp'),
                        'section'  => cosmoswp_main_content_controller()->section,
                        'settings' => 'main-content-general-margin',
                    ),
                    array(),
                    array()
                )
            );
            /*Padding*/
            $wp_customize->add_setting('main-content-general-padding', array(
                'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
                'default'           => $main_content_defaults['main-content-general-padding'],
                'transport'         => 'postMessage'
            ));
            $wp_customize->add_control(
                new CosmosWP_Custom_Control_Cssbox(
                    $wp_customize,
                    'main-content-general-padding',
                    array(
                        'label'    => esc_html__('Padding', 'cosmoswp'),
                        'section'  => cosmoswp_main_content_controller()->section,
                        'settings' => 'main-content-general-padding',
                    ),
                    array(),
                    array()
                )
            );

            /*Background Styling*/
            $wp_customize->add_setting('main-content-general-bg-styling-msg', array(
                'sanitize_callback' => 'wp_kses_post',
            ));
            $wp_customize->add_control(
                new CosmosWP_Custom_Control_Heading(
                    $wp_customize,
                    'main-content-general-bg-styling-msg',
                    array(
                        'label'   => esc_html__('Background Options', 'cosmoswp'),
                        'section' => cosmoswp_main_content_controller()->section,
                    )
                )
            );

            /*Background Styling*/
            $wp_customize->add_setting('main-content-general-background-options', array(
                'sanitize_callback' => 'cosmoswp_sanitize_field_background',
                'default'           => $main_content_defaults['main-content-general-background-options'],
                'transport'         => 'postMessage'
            ));
            $background_image_size_options       = cosmoswp_background_image_size_options();
            $background_image_position_options   = cosmoswp_background_image_position_options();
            $background_image_repeat_options     = cosmoswp_background_image_repeat_options();
            $background_image_attachment_options = cosmoswp_background_image_attachment_options();
            $wp_customize->add_control(
                new CosmosWP_Custom_Control_Group(
                    $wp_customize,
                    'main-content-general-background-options',
                    array(
                        'label'    => esc_html__('Background Option', 'cosmoswp'),
                        'section'  => cosmoswp_main_content_controller()->section,
                        'settings' => 'main-content-general-background-options',
                    ),
                    array(
                        'background-color'      => array(
                            'type'  => 'color',
                            'label' => esc_html__('Background Color', 'cosmoswp'),
                        ),
                        'background-image'      => array(
                            'type'  => 'image',
                            'label' => esc_html__('Background Image', 'cosmoswp'),
                        ),
                        'background-size'       => array(
                            'type'    => 'select',
                            'label'   => esc_html__('Background Size', 'cosmoswp'),
                            'options' => $background_image_size_options,
                            'class'   => 'image-properties',
                        ),
                        'background-position'   => array(
                            'type'    => 'select',
                            'label'   => esc_html__('Background Position', 'cosmoswp'),
                            'options' => $background_image_position_options,
                            'class'   => 'image-properties',
                        ),
                        'background-repeat'     => array(
                            'type'    => 'select',
                            'label'   => esc_html__('Background Repeat', 'cosmoswp'),
                            'options' => $background_image_repeat_options,
                            'class'   => 'image-properties',
                        ),
                        'background-attachment' => array(
                            'type'    => 'select',
                            'label'   => esc_html__('Background Attachment', 'cosmoswp'),
                            'options' => $background_image_attachment_options,
                            'class'   => 'image-properties',
                        ),
                        'enable-overlay' => array(
                            'type'    => 'checkbox',
                            'label'   => esc_html__('Enable Overlay', 'cosmoswp'),
                            'class'   =>  'image-properties image-properties-checkbox',
                        ),
                        'background-overlay-color'      => array(
                            'type'  => 'color',
                            'label' => esc_html__('Background Overlay Color', 'cosmoswp'),
                            'class'   =>  'image-properties',
                        ),
                    )
                )
            );

            /*Border Msg*/
            $wp_customize->add_setting('main-content-general-border-styling-msg', array(
                'sanitize_callback' => 'wp_kses_post',
            ));
            $wp_customize->add_control(
                new CosmosWP_Custom_Control_Heading(
                    $wp_customize,
                    'main-content-general-border-styling-msg',
                    array(
                        'label'   => esc_html__('Border & Box Shadow Options', 'cosmoswp'),
                        'section' => cosmoswp_main_content_controller()->section,
                    )
                )
            );

            /*Border Style*/
            $wp_customize->add_setting('main-content-general-border-styling', array(
                'sanitize_callback' => 'cosmoswp_sanitize_field_border',
                'default'           => $main_content_defaults['main-content-general-border-styling'],
                'transport'         => 'postMessage'
            ));
            $wp_customize->add_control(
                new CosmosWP_Custom_Control_Group(
                    $wp_customize,
                    'main-content-general-border-styling',
                    array(
                        'label'    => esc_html__('Border & Box Shadow', 'cosmoswp'),
                        'section'  => cosmoswp_main_content_controller()->section,
                        'settings' => 'main-content-general-border-styling',
                    ),
                    array(
                        'border-style'     => array(
                            'type'    => 'select',
                            'label'   => esc_html__('Border Style', 'cosmoswp'),
                            'options' => cosmoswp_header_border_style(),
                        ),
                        'border-width'     => array(
                            'type'       => 'cssbox',
                            'label'      => esc_html__('Border Width', 'cosmoswp'),
                            'class' => 'cwp-element-show',
                            'box_fields' => array(
                                'top'    => true,
                                'right'  => true,
                                'bottom' => true,
                                'left'   => true,
                            ),
                            'attr'       => array(
                                'min'       => 0,
                                'max'       => 1000,
                                'step'      => 1,
                                'link'      => 1,
                                'devices'   => array(
                                    'desktop' => array(
                                        'icon' => 'dashicons-laptop',
                                    ),
                                ),
                                'link_text' => esc_html__('Link', 'cosmoswp'),
                            ),
                        ),
                        'border-color'     => array(
                            'type'  => 'color',
                            'label' => esc_html__('Border Color', 'cosmoswp'),
                        ),
                        'border-radius'    => array(
                            'type'       => 'cssbox',
                            'label'      => esc_html__('Border Radius', 'cosmoswp'),
                            'class' => 'cwp-element-show',
                            'box_fields' => array(
                                'top'    => true,
                                'right'  => true,
                                'bottom' => true,
                                'left'   => true,
                            ),
                            'attr'       => array(
                                'min'       => 0,
                                'max'       => 1000,
                                'step'      => 1,
                                'link'      => 1,
                                'devices'   => array(
                                    'desktop' => array(
                                        'icon' => 'dashicons-laptop',
                                    ),
                                ),
                                'link_text' => esc_html__('Link', 'cosmoswp'),
                            ),
                        ),
                        'box-shadow-color' => array(
                            'type'  => 'color',
                            'label' => esc_html__('Box Shadow Color', 'cosmoswp'),
                        ),
                        'box-shadow-css'   => array(
                            'type'       => 'cssbox',
                            'class'      => 'cwp-element-show',
                            'box_fields' => array(
                                'x'      => true,
                                'Y'      => true,
                                'BLUR'   => true,
                                'SPREAD' => true,
                            ),
                            'attr'       => array(
                                'min'         => -1000,
                                'max'         => 1000,
                                'step'        => 1,
                                'link'        => 1,
                                'link_toggle' => false,
                                'devices'     => array(
                                    'desktop' => array(
                                        'icon' => 'dashicons-laptop',
                                    ),
                                ),
                                'link_text'   => esc_html__('INSET', 'cosmoswp'),
                            ),
                        ),
                    )
                )
            );

        }

        /**
         * Callback functions for cosmoswp_action_page_header,
         * Add Banner before header
         *
         * @since    1.0.0
         * @access   public
         *
         * @return void
         */
        public function cosmoswp_banner() {

            $banner_display_option = cosmoswp_get_theme_options('banner-section-display');
            if ('hide' != $banner_display_option && !empty($banner_display_option)) {
                echo "<div id='cwp-page-header-wrap'>";
                get_template_part('template-parts/main-content/header', 'banner');
                echo "</div>";
            }
            else {
                if(
                is_archive() ||
                is_search() ||
                is_home() && !is_front_page()
                ){
                    echo "<div id='cwp-page-header-wrap'>";

                }
                if (is_archive()) {
                    if (is_post_type_archive('download')) {
                        $edd_main_title = cosmoswp_get_theme_options('edd-archive-main-title');
                        ?>
                        <div class="grid-container">
                            <div class="grid-row">
                                <div class="grid-12">
                                    <div class="entry-header">
                                        <h1 class="page-title">
                                            <?php
                                            echo esc_html($edd_main_title);
                                            ?>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .page-header --> <?php

                    }
                    elseif (class_exists('WooCommerce') && is_shop()) {
                        ?>
                        <div class="grid-container">
                            <div class="grid-row">
                                <div class="grid-12">
                                    <div class="entry-header">
                                        <h1 class="page-title"><?php echo woocommerce_page_title(); ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    else {
                        ?>
                        <div class="grid-container">
                        <div class="grid-row">
                            <div class="grid-12">
                                <div class="entry-header">
                                    <?php
                                    the_archive_title('<h1 class="page-title h3">', '</h1>');
                                    the_archive_description('<div class="archive-description">', '</div>');
                                    ?>
                                </div><!-- .page-header -->
                            </div>
                        </div>
                        </div><?php
                    }
                }
                elseif (is_search()) {
                    ?>
                    <div class="grid-container">
                        <div class="grid-row">
                            <div class="grid-12">
                                <div class="entry-header">
                                    <h1 class="page-title">
                                        <?php
                                        printf( // WPCS: XSS ok.
                                            __('Search Results for: %s', 'cosmoswp'),
                                            '<span>' . get_search_query() . '</span>'
                                        );
                                        ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php

                }
                elseif (is_home() && !is_front_page()) {
                    $page_for_posts = get_option('page_for_posts');
                    $banner_title   = get_the_title($page_for_posts);
                    ?>
                    <div class="grid-container">
                        <div class="grid-row">
                            <div class="grid-12">
                                <div class="entry-header">
                                    <h1 class="page-title">
                                        <?php echo esc_html($banner_title); ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                if(
                    is_archive() ||
                    is_search() ||
                    is_home() && !is_front_page()
                ){
                    echo "</div>";

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

            $main_content_dynamic_css['all']     = '';
            $main_content_dynamic_css['tablet']  = '';
            $main_content_dynamic_css['desktop'] = '';
            /*Footer General*/
            $main_content_general_css         = '';
            $main_content_general_mobile_css  = '';
            $main_content_general_tablet_css  = '';
            $main_content_general_desktop_css = '';

            /* margin */
            $main_content_general_margin = cosmoswp_get_theme_options('main-content-general-margin');
            $main_content_general_margin = json_decode($main_content_general_margin, true);
            // desktop margin
            $main_content_general_margin_desktop = cosmoswp_cssbox_values_inline($main_content_general_margin, 'desktop');
            if (strpos($main_content_general_margin_desktop, 'px') !== false) {
                $main_content_general_desktop_css .= 'margin:' . $main_content_general_margin_desktop . ';';
            }
            // tablet marign
            $main_content_general_margin_tablet = cosmoswp_cssbox_values_inline($main_content_general_margin, 'tablet');
            if (strpos($main_content_general_margin_tablet, 'px') !== false) {
                $main_content_general_tablet_css .= 'margin:' . $main_content_general_margin_tablet . ';';
            }
            // mobile margin
            $main_content_general_margin_mobile = cosmoswp_cssbox_values_inline($main_content_general_margin, 'mobile');
            if (strpos($main_content_general_margin_mobile, 'px') !== false) {
                $main_content_general_mobile_css .= 'margin:' . $main_content_general_margin_mobile . ';';
            }

            /* padding */
            $main_content_general_padding = cosmoswp_get_theme_options('main-content-general-padding');
            $main_content_general_padding = json_decode($main_content_general_padding, true);

            // desktop padding
            $main_content_general_padding_desktop = cosmoswp_cssbox_values_inline($main_content_general_padding, 'desktop');
            if (strpos($main_content_general_padding_desktop, 'px') !== false) {
                $main_content_general_desktop_css .= 'padding:' . $main_content_general_padding_desktop . ';';
            }
            //tablet padding
            $main_content_general_padding_tablet = cosmoswp_cssbox_values_inline($main_content_general_padding, 'tablet');
            if (strpos($main_content_general_padding_tablet, 'px') !== false) {
                $main_content_general_tablet_css .= 'padding:' . $main_content_general_padding_tablet . ';';
            }
            //mobile padding
            $main_content_general_padding_mobile = cosmoswp_cssbox_values_inline($main_content_general_padding, 'mobile');
            if (strpos($main_content_general_padding_mobile, 'px') !== false) {
                $main_content_general_mobile_css .= 'padding:' . $main_content_general_padding_mobile . ';';
            }


            //background
            $main_content_general_bg = cosmoswp_get_theme_options('main-content-general-background-options');
            $main_content_general_bg = json_decode($main_content_general_bg, true);
            $main_content_general_overlay_css = '';
            //bg color
            $main_content_general_bg_color = cosmoswp_ifset($main_content_general_bg['background-color']);
            if ($main_content_general_bg_color) {
                $main_content_general_css .= 'background-color:' . $main_content_general_bg_color . ';';
            }
            //bg image
            $main_content_general_bg_image = cosmoswp_ifset($main_content_general_bg['background-image']);
            if ($main_content_general_bg_image) {
                $main_content_general_css .= 'background-image:url(' . esc_url($main_content_general_bg_image) . ');';
                //bg size
                $main_content_general_bg_size = cosmoswp_ifset($main_content_general_bg['background-size']);
                if ($main_content_general_bg_size) {
                    $main_content_general_css .= 'background-size:' . $main_content_general_bg_size . ';';
                    $main_content_general_css .= '-webkit-background-size:' . $main_content_general_bg_size . ';';
                }
                //bg position
                $main_content_general_bg_position = cosmoswp_ifset($main_content_general_bg['background-position']);
                if ($main_content_general_bg_position) {
                    $main_content_general_css .= 'background-position:' . str_replace('_', ' ', $main_content_general_bg_position) . ';';
                }
                //bg repeat
                $main_content_general_bg_repeat = cosmoswp_ifset($main_content_general_bg['background-repeat']);
                if ($main_content_general_bg_repeat) {
                    $main_content_general_css .= 'background-repeat:' . $main_content_general_bg_repeat . ';';
                }
                //bg repeat
                $main_content_general_bg_attachment = cosmoswp_ifset($main_content_general_bg['background-attachment']);
                if ($main_content_general_bg_attachment) {
                    $main_content_general_css .= 'background-attachment:' . $main_content_general_bg_attachment . ';';
                }

                //bg overlay color
                $main_content_general_enable_overlay   = cosmoswp_ifset($main_content_general_bg['enable-overlay']);
                $main_content_general_bg_overlay_color = cosmoswp_ifset($main_content_general_bg['background-overlay-color']);
                if ( $main_content_general_bg_overlay_color && $main_content_general_enable_overlay){
                    $main_content_general_overlay_css		.= 'background:'.$main_content_general_bg_overlay_color.';';
                }
            }
            //border options
            $main_content_general_border = cosmoswp_get_theme_options('main-content-general-border-styling');
            $main_content_general_border = json_decode($main_content_general_border, true);
            //border shadow
            $main_content_general_bx_shadow_css = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($main_content_general_border['box-shadow-css']), 'desktop');
            if (strpos($main_content_general_bx_shadow_css, 'px') !== false) {
                $main_content_general_bxshadow_color = cosmoswp_ifset($main_content_general_border['box-shadow-color']);
                $main_content_general_bx_shadow      = $main_content_general_bx_shadow_css . ' ' . $main_content_general_bxshadow_color;
                $main_content_general_css            .= '-webkit-box-shadow:' . $main_content_general_bx_shadow . ';';
                $main_content_general_css            .= '-moz-box-shadow:' . $main_content_general_bx_shadow . ';';
                $main_content_general_css            .= 'box-shadow:' . $main_content_general_bx_shadow . ';';
            }
            //border style
            $main_content_general_border_style = cosmoswp_ifset($main_content_general_border['border-style']);
            if ('none' !== $main_content_general_border_style) {

                $main_content_general_css .= 'border-style:' . $main_content_general_border_style . ';';
                //border width
                $main_content_general_border_width = cosmoswp_cssbox_values_inline(cosmoswp_ifset($main_content_general_border['border-width']), 'desktop');
                if (strpos($main_content_general_border_width, 'px') !== false) {
                    $main_content_general_css .= 'border-width:' . $main_content_general_border_width . ';';
                }
                //border color
                $main_content_general_border_color = cosmoswp_ifset($main_content_general_border['border-color']);
                if ($main_content_general_border_color) {
                    $main_content_general_css .= 'border-color:' . $main_content_general_border_color . ';';
                }
            }

            //border radius
            $main_content_general_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($main_content_general_border['border-radius']), 'desktop');
            if (strpos($main_content_general_border_radius, 'px') !== false) {
                $main_content_general_css .= 'border-radius:' . $main_content_general_border_radius . ';';
            }

            /* mobile css */
            if (!empty($main_content_general_overlay_css)) {
                $main_content_general_overlay_dynamic_css = '.cwp-body-main-wrap.cwp-enable-overlay:after{'
                    . $main_content_general_overlay_css .
                    '}';
                $main_content_dynamic_css['all']  .= $main_content_general_overlay_dynamic_css;
            }

            if (!empty($main_content_general_css)) {
                $main_content_general_dynamic_css = '.cwp-body-main-wrap{' . $main_content_general_css . '}';
                $main_content_dynamic_css['all']  .= $main_content_general_dynamic_css;
            }

            if (!empty($main_content_general_mobile_css)) {
                $main_content_general_mobile_dynamic_css = '.gutentor-active
                .cwp-body-main-wrap, .cwp-body-main-wrap{' . $main_content_general_mobile_css . '}';
                $main_content_dynamic_css['all']  .= $main_content_general_mobile_dynamic_css;
            }


            /* tablet css */
            if (!empty($main_content_general_tablet_css)) {
                $main_content_general_tablet_dynamic_css = '.gutentor-active
                .cwp-body-main-wrap,.cwp-body-main-wrap{' . $main_content_general_tablet_css . '}';
                $main_content_dynamic_css['tablet']      .= $main_content_general_tablet_dynamic_css;
            }

            /* desktop css  */
            if (!empty($main_content_general_desktop_css)) {
                $main_content_general_desktop_dynamic_css = '.gutentor-active
                .cwp-body-main-wrap, .cwp-body-main-wrap{
					' . $main_content_general_desktop_css . '
				}';
                $main_content_dynamic_css['desktop'] .= $main_content_general_desktop_dynamic_css;
            }


            /*banner css */
            $cosmoswp_banner_css      = '';
            $banner_text_color_css    = '';
            $banner_overlay_color_css = '';

            $cosmoswp_banner_tablet_css  = '';
            $cosmoswp_banner_desktop_css = '';

            /* marign  */
            $banner_margin = cosmoswp_get_theme_options('banner-margin');
            $banner_margin = json_decode($banner_margin, true);

            // desktop margin
            $banner_margin_desktop = cosmoswp_cssbox_values_inline($banner_margin, 'desktop');
            if (strpos($banner_margin_desktop, 'px') !== false) {
                $cosmoswp_banner_desktop_css .= 'margin:' . $banner_margin_desktop . ';';
            }
            // tablet marign
            $banner_margin_tablet = cosmoswp_cssbox_values_inline($banner_margin, 'tablet');
            if (strpos($banner_margin_tablet, 'px') !== false) {
                $cosmoswp_banner_tablet_css .= 'margin:' . $banner_margin_tablet . ';';
            }
            // mobile margin
            $banner_margin_mobile = cosmoswp_cssbox_values_inline($banner_margin, 'mobile');
            if (strpos($banner_margin_mobile, 'px') !== false) {
                $cosmoswp_banner_css .= 'margin:' . $banner_margin_mobile . ';';
            }

            /* padding */
            $banner_padding = cosmoswp_get_theme_options('banner-padding');
            $banner_padding = json_decode($banner_padding, true);

            // desktop padding
            $banner_padding_desktop = cosmoswp_cssbox_values_inline($banner_padding, 'desktop');
            if (strpos($banner_padding_desktop, 'px') !== false) {
                $cosmoswp_banner_desktop_css .= 'padding:' . $banner_padding_desktop . ';';
            }
            //tablet padding
            $banner_padding_tablet = cosmoswp_cssbox_values_inline($banner_padding, 'tablet');
            if (strpos($banner_padding_tablet, 'px') !== false) {
                $cosmoswp_banner_tablet_css .= 'padding:' . $banner_padding_tablet . ';';
            }
            //mobile padding
            $banner_padding_mobile = cosmoswp_cssbox_values_inline($banner_padding, 'mobile');
            if (strpos($banner_padding_mobile, 'px') !== false) {
                $cosmoswp_banner_css .= 'padding:' . $banner_padding_mobile . ';';
            }

            $banner_display_option = cosmoswp_get_theme_options('banner-section-display');
            if ('bg-image' == $banner_display_option ) {

                if (has_header_image() ) {

                    $banner_bg_options = cosmoswp_get_theme_options('banner-section-background-image-options');
                    $banner_bg_options = json_decode($banner_bg_options, true);

                    /* mobile css */
                    //bg size
                    $banner_bg_size = cosmoswp_ifset($banner_bg_options['mobile-background-size']);
                    if ($banner_bg_size) {
                        $cosmoswp_banner_css .= 'background-size:' . $banner_bg_size . ';';
                        $cosmoswp_banner_css .= '-webkit-background-size:' . $banner_bg_size . ';';
                    }
                    //bg position
                    $banner_bg_position = cosmoswp_ifset($banner_bg_options['mobile-background-position']);
                    if ($banner_bg_position) {
                        $cosmoswp_banner_css .= 'background-position:' . str_replace('_', ' ', $banner_bg_position) . ';';
                    }
                    //bg repeat
                    $banner_bg_repeat = cosmoswp_ifset($banner_bg_options['mobile-background-repeat']);
                    if ($banner_bg_repeat) {
                        $cosmoswp_banner_css .= 'background-repeat:' . $banner_bg_repeat . ';';
                    }
                    //bg repeat
                    $banner_bg_attachment = cosmoswp_ifset($banner_bg_options['mobile-background-attachment']);
                    if ($banner_bg_attachment) {
                        $cosmoswp_banner_css .= 'background-attachment:' . $banner_bg_attachment . ';';
                    }

                    /* tablet css */
                    $banner_bg_size = cosmoswp_ifset($banner_bg_options['tablet-background-size']);
                    if ($banner_bg_size) {
                        $cosmoswp_banner_tablet_css .= 'background-size:' . $banner_bg_size . ';';
                        $cosmoswp_banner_tablet_css .= '-webkit-background-size:' . $banner_bg_size . ';';
                    }
                    //bg position
                    $banner_bg_position = cosmoswp_ifset($banner_bg_options['tablet-background-position']);
                    if ($banner_bg_position) {
                        $cosmoswp_banner_tablet_css .= 'background-position:' . str_replace('_', ' ', $banner_bg_position) . ';';
                    }
                    //bg repeat
                    $banner_bg_repeat = cosmoswp_ifset($banner_bg_options['tablet-background-repeat']);
                    if ($banner_bg_repeat) {
                        $cosmoswp_banner_tablet_css .= 'background-repeat:' . $banner_bg_repeat . ';';
                    }
                    //bg repeat
                    $banner_bg_attachment = cosmoswp_ifset($banner_bg_options['tablet-background-attachment']);
                    if ($banner_bg_attachment) {
                        $cosmoswp_banner_tablet_css .= 'background-attachment:' . $banner_bg_attachment . ';';
                    }

                    /* desktop css */
                    $banner_bg_size = cosmoswp_ifset($banner_bg_options['desktop-background-size']);
                    if ($banner_bg_size) {
                        $cosmoswp_banner_desktop_css .= 'background-size:' . $banner_bg_size . ';';
                        $cosmoswp_banner_desktop_css .= '-webkit-background-size:' . $banner_bg_size . ';';
                    }
                    //bg position
                    $banner_bg_position = cosmoswp_ifset($banner_bg_options['desktop-background-position']);
                    if ($banner_bg_position) {
                        $cosmoswp_banner_desktop_css .= 'background-position:' . str_replace('_', ' ', $banner_bg_position) . ';';
                    }
                    //bg repeat
                    $banner_bg_repeat = cosmoswp_ifset($banner_bg_options['desktop-background-repeat']);
                    if ($banner_bg_repeat) {
                        $cosmoswp_banner_desktop_css .= 'background-repeat:' . $banner_bg_repeat . ';';
                    }
                    //bg repeat
                    $banner_bg_attachment = cosmoswp_ifset($banner_bg_options['desktop-background-attachment']);
                    if ($banner_bg_attachment) {
                        $cosmoswp_banner_desktop_css .= 'background-attachment:' . $banner_bg_attachment . ';';
                    }
                }
            }
            else if ('color' == $banner_display_option) {
                $banner_bg_color             = apply_filters('banner-section-background-color',cosmoswp_get_theme_options('banner-section-background-color'));
                $cosmoswp_banner_css         .= 'background-color:' . esc_attr($banner_bg_color) . ';';
            }
            $banner_height_access = array('color','bg-image','video');
            if (in_array($banner_display_option,$banner_height_access) ) {
                /*banner height*/
                $cwp_banner_height           = cosmoswp_get_theme_options('cosmoswp-banner-height');
                $cwp_banner_height           = json_decode($cwp_banner_height, true);
                $cosmoswp_banner_desktop_css .= 'height:' . $cwp_banner_height['desktop'] . 'px;';
                $cosmoswp_banner_tablet_css  .= 'height:' . $cwp_banner_height['tablet'] . 'px;';
                $cosmoswp_banner_css         .= 'height:' . $cwp_banner_height['mobile'] . 'px;';
            }


            /* banner mobile css */
            if (!empty($cosmoswp_banner_css)) {
                $cosmoswp_dynamic_banner_css     = '.cwp-banner{' . $cosmoswp_banner_css . '}';
                $main_content_dynamic_css['all'] .= $cosmoswp_dynamic_banner_css;
            }

            /* banner tablet css */
            if (!empty($cosmoswp_banner_tablet_css)) {
                $cosmoswp_banner_tablet_dynamic_css = '.cwp-banner{' . $cosmoswp_banner_tablet_css . '}';
                $main_content_dynamic_css['tablet'] .= $cosmoswp_banner_tablet_dynamic_css;
            }

            /* banner desktop css  */
            if (!empty($cosmoswp_banner_desktop_css)) {
                $cosmoswp_banner_desktop_dynamic_css = '.cwp-banner{' . $cosmoswp_banner_desktop_css . '}';
                $main_content_dynamic_css['desktop'] .= $cosmoswp_banner_desktop_dynamic_css;
            }


            $banner_text_color = cosmoswp_get_theme_options('banner-section-color');
            if (!empty($banner_text_color)) {
                $banner_text_color_css .= 'color:' . $banner_text_color . ';';
            }
            /* banner text  css */
            if (!empty($banner_text_color_css)) {
                $banner_text_color_dynamic_css
                                                 = '
				.cwp-banner .banner-title, 
				.cwp-banner .page-title{' . $banner_text_color_css . '}';
                $main_content_dynamic_css['all'] .= $banner_text_color_dynamic_css;
            }

            $banner_overlay_color = cosmoswp_get_theme_options('banner-overlay-color');
            if (!empty($banner_overlay_color)) {
                $banner_overlay_color_css .= 'background-color:' . $banner_overlay_color . ';';
            }
            /* banner text  css */
            if (!empty($banner_overlay_color_css)) {
                $banner_overlay_dynamic_color    = '.cwp-banner.cwp-enable-overlay:after{' . $banner_overlay_color_css . '}';
                $main_content_dynamic_css['all'] .= $banner_overlay_dynamic_color;
            }

            if (is_array($main_content_dynamic_css) && !empty($main_content_dynamic_css)) {
                if (is_array($dynamic_css) && !empty($dynamic_css)) {
                    $all_css = array_merge_recursive($dynamic_css, $main_content_dynamic_css);

                    return $all_css;
                }
            }
            else {
                return $main_content_dynamic_css;
            }
        }

    }
endif;

/**
 * Create Instance for CosmosWP_Main_Content_Controller
 *
 * @since    1.0.0
 * @access   public
 *
 * @param
 * @return object
 */
if (!function_exists('cosmoswp_main_content_controller')) {

    function cosmoswp_main_content_controller() {

        return CosmosWP_Main_Content_Controller::instance();
    }

    cosmoswp_main_content_controller()->run();
}