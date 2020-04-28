<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Blog Builder and Customizer Options
 * @package CosmosWP
 */
if (!class_exists('CosmosWP_Blog_Builder')) :

    class CosmosWP_Blog_Builder {

        /**
         * Panel ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $panel = 'cosmoswp-blog';

        /**
         * Section ID
         *
         * @var string
         * @access public
         * @since 1.0.0
         *
         */
        public $section = 'cosmoswp-blog';


        /**
         * Main Instance
         *
         * Insures that only one instance of CosmosWP_Blog_Builder exists in memory at any one
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
                $instance = new CosmosWP_Blog_Builder;
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

            add_filter('cosmoswp_default_theme_options', array( $this, 'blog_defaults'));
            add_action('customize_register', array( $this, 'customize_register'), 100);
            add_action('cosmoswp_action_blog', array( $this, 'display_blog'), 100);
            add_filter('cosmoswp_dynamic_css', array( $this, 'dynamic_css'), 100);

            add_action('cosmoswp_blog_loop_item', array( $this, 'blog_loop_item'));
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
        public function blog_defaults($default_options = array()) {
            $blog_defaults = array(

                'blog-main-title'       => esc_html__('Blog', 'cosmoswp'),
                'blog-post-view-layout' => 'full-width-layout',
                'blog-column-number'    => '3',

                /*Sidebar*/
                'blog-sidebar'    => 'ct-ps',

                /*Blog  additional */
                'blog-post-exclude-categories'          => '',

                /*Blog Sorting*/
                'blog-elements-sorting'                 => array('title', 'primary-meta', 'featured-section', 'content'),
                'blog-primary-meta-sorting'             => array('published-date', 'categories', 'author', 'comments'),
                'blog-secondary-meta-sorting'           => '',
                'blog-excerpt-length'                   => '30',
                'blog-read-more-text'                   => esc_html__('Read More', 'cosmoswp'),

                /*Blog feature Section */
                'blog-feature-section-layout'           => 'full-image',
                'blog-img-size'                         => 'full',

                /*Blog naviation*/
                'blog-navigation-options'               => 'default',
                'blog-navigation-align'                 => 'cwp-flex-align-center',
                'blog-navigation-styling'               => json_encode(array(
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
                'blog-pagination-color-options'         => json_encode(array(
                    'background-color'       => '#f5f5f5',
                    'background-hover-color' => '#275cf6',
                    'text-color'             => '#333',
                    'text-hover-color'       => '#fff',
                )),
                'blog-default-pagination-color-options' => json_encode(array(
                    'text-color'       => '#275cf6',
                    'text-hover-color' => '#1949d4',
                )),

                /*margin and padding*/
                'blog-main-content-margin'             =>  json_encode(array(
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
                'blog-main-content-padding'             => json_encode(array(
                    'desktop' => array(
                        'top'         => '80',
                        'right'       => '0',
                        'bottom'      => '80',
                        'left'        => '0',
                        'cssbox_link' => true,
                    ),
                    'tablet'  => array(
                        'top'         => '40',
                        'right'       => '0',
                        'bottom'      => '60',
                        'left'        => '0',
                        'cssbox_link' => true,
                    ),
                    'mobile'  => array(
                        'top'         => '20',
                        'right'       => '0',
                        'bottom'      => '40',
                        'left'        => '0',
                        'cssbox_link' => true,
                    ),
                )),
            );

            return array_merge($default_options, $blog_defaults);

        }

        /**
         * Callback functions for customize_register,
         * Add Section and Control
         * No Panel for blog
         *
         * @since    1.0.0
         * @access   public
         *
         * @param object $wp_customize
         * @return void
         */
        public function customize_register($wp_customize) {
            $blog_defaults = $this->blog_defaults();

            /**
             * Panel
             */
            $wp_customize->add_panel($this->panel, array(
                'title'    => esc_html__('Blog Options', 'cosmoswp'),
                'priority' => 50,
            ));

            /**
             * Section
             */
            $wp_customize->add_section($this->section, array(
                'title'    => esc_html__('Blog Options', 'cosmoswp'),
                'priority' => 50,
                'panel'    => $this->panel,

            ));

            /* Blog Elements */
            require cosmoswp_file_directory('inc/customizer/blog-options/main-content.php');

        }

        /**
         * Callback Function For cosmoswp_action_blog
         * Display Blog Content
         *
         * @since    1.0.0
         * @access   public
         *
         * @return
         */
        public function display_blog() {

            $sidebar = cosmoswp_get_theme_options('blog-sidebar');
            ?>
            <!-- Start of .blog-content-->
            <div class="cwp-blog cwp-content-wrapper <?php echo esc_attr('cwp-'.$sidebar) ?> <?php cosmoswp_blog_main_wrap_classes(); ?>" id="cwp-blog-main-content-wrapper">
                <?php
                echo '<div class="grid-container"><div class="grid-row">';
                cosmoswp_sidebar_template($sidebar,'blog');
                echo '</div>';/*.grid-row*/
                echo '</div>';/*.grid-container*/
                ?>
            </div>
            <!-- End of .blog-content -->
            <?php
        }

        /**
         * Get dynamic CSS
         * Add Panel Section control
         * @return array
         */
        public function get_dynamic_css(){
            /**
             * Blog Option Dynamic CSS
             */
            $blog_dynamic_css['all']     = '';
            $blog_dynamic_css['tablet']  = '';
            $blog_dynamic_css['desktop'] = '';

            /* blog navigation */
            $blog_navigation_css = '';
            $blog_navigation_hover_css = '';
//border options
            $blog_navigation_border           = cosmoswp_get_theme_options('blog-navigation-styling');
            $blog_navigation_border           = json_decode($blog_navigation_border,true);
//box shadow
            $blog_navigationbx_shadow_css    = cosmoswp_boxshadow_values_inline(cosmoswp_ifset($blog_navigation_border['box-shadow-css']),'desktop');
            if (strpos($blog_navigationbx_shadow_css, 'px') !== false) {
                $blog_navigation_bxshadow_color   = cosmoswp_ifset($blog_navigation_border['box-shadow-color']);
                $blog_navigationbx_shadow        = $blog_navigationbx_shadow_css.' '.$blog_navigation_bxshadow_color;
                $blog_navigation_css .=	'-webkit-box-shadow:'.$blog_navigationbx_shadow.';';
                $blog_navigation_css .=	'-moz-box-shadow:'.$blog_navigationbx_shadow.';';
                $blog_navigation_css .=	'box-shadow:'.$blog_navigationbx_shadow.';';
            }
//border style
            $blog_navigation_border_style     = cosmoswp_ifset($blog_navigation_border['border-style']);
            if ( 'none' !== $blog_navigation_border_style ){

                $blog_navigation_css .= 'border-style:'.$blog_navigation_border_style.';';
                //border width
                $blog_navigation_border_width     = cosmoswp_cssbox_values_inline(cosmoswp_ifset($blog_navigation_border['border-width']),'desktop');
                if (strpos($blog_navigation_border_width, 'px') !== false) {
                    $blog_navigation_css .= 'border-width:'.$blog_navigation_border_width.';';
                }
                //border color
                $blog_navigation_border_color     = cosmoswp_ifset($blog_navigation_border['border-color']);
                if ($blog_navigation_border_color){
                    $blog_navigation_css .= 'border-color:'.$blog_navigation_border_color.';';
                }
            }
//border radius
            $blog_navigation_border_radius = cosmoswp_cssbox_values_inline(cosmoswp_ifset($blog_navigation_border['border-radius']),'desktop');
            if (strpos($blog_navigation_border_radius, 'px') !== false){
                $blog_navigation_css		.= 'border-radius:'.$blog_navigation_border_radius.';';
            }

// Numeric pagination color
            $blog_pagination_color            = cosmoswp_get_theme_options('blog-pagination-color-options');
            $blog_pagination_color            = json_decode($blog_pagination_color,true);

            $pagination_bg_color      = cosmoswp_ifset($blog_pagination_color['background-color']);
            if ($pagination_bg_color){
                $blog_navigation_css .= 'background:'.$pagination_bg_color.';';
            }
            $pagination_text_color      = cosmoswp_ifset($blog_pagination_color['text-color']);
            if ($pagination_text_color){
                $blog_navigation_css .= 'color:'.$pagination_text_color.';';
            }
//concated blog navigation css in all css
            if ( !empty($blog_navigation_css) ){
                $blog_navigation_dynamic_css = '
    .cwp-blog-pagination .pagination .nav-links .page-numbers{
		'.$blog_navigation_css.'
	}';
                $blog_dynamic_css['all'] .= $blog_navigation_dynamic_css;
            }

            $pagination_bg_hover_color      = cosmoswp_ifset($blog_pagination_color['background-hover-color']);
            if ($pagination_bg_hover_color){
                $blog_navigation_hover_css .= 'background:'.$pagination_bg_hover_color.';';
                $blog_dynamic_css['all'] .= '  
    .cwp-blog-pagination .pagination .nav-links .page-numbers.current,
    .cwp-blog-pagination .pagination .nav-links .page-numbers:hover {
        border-color:'.$pagination_bg_hover_color.';
    }';
            }
            $pagination_text_hover_color      = cosmoswp_ifset($blog_pagination_color['text-hover-color']);
            if ($pagination_text_hover_color){
                $blog_navigation_hover_css .= 'color:'.$pagination_text_hover_color.';';
            }
//concated blog navigation css in all css
            if ( !empty($blog_navigation_hover_css) ){
                $blog_navigation_dynamic_hover_css = '
    .cwp-blog-pagination .pagination .nav-links .page-numbers.current,
    .cwp-blog-pagination .pagination .nav-links .page-numbers:hover {
		'.$blog_navigation_hover_css.'
	}';
                $blog_dynamic_css['all'] .= $blog_navigation_dynamic_hover_css;
            }

            /* Default pagination color*/
            $blog_default_navigation_css ='';
            $blog_default_navigation_hover_css ='';
            $blog_default_pagination_color            = cosmoswp_get_theme_options('blog-default-pagination-color-options');
            $blog_default_pagination_color            = json_decode($blog_default_pagination_color,true);

            $default_pagination_text_color      = cosmoswp_ifset($blog_default_pagination_color['text-color']);
            if ($default_pagination_text_color){
                $blog_default_navigation_css .= 'color:'.$default_pagination_text_color.';';
            }
//concated blog navigation css in all css
            if ( !empty($blog_default_navigation_css) ){
                $blog_default_navigation_dynamic_css = '
    .cwp-blog-pagination .posts-navigation .nav-links .nav-previous a,
    .cwp-blog-pagination .posts-navigation .nav-links .nav-next a{
        '.$blog_default_navigation_css.'
    }';
                $blog_dynamic_css['all'] .= $blog_default_navigation_dynamic_css;
            }
            $default_pagination_text_hover_color      = cosmoswp_ifset($blog_default_pagination_color['text-hover-color']);
            if ($default_pagination_text_hover_color){
                $blog_default_navigation_hover_css .= 'color:'.$default_pagination_text_hover_color.';';
            }
//concated blog navigation css in all css
            if ( !empty($blog_default_navigation_hover_css) ){
                $blog_default_navigation_dynamic_hover_css = '
    .cwp-blog-pagination .posts-navigation .nav-links .nav-previous:hover a,
    .cwp-blog-pagination .posts-navigation .nav-links .nav-next:hover a{
        '.$blog_default_navigation_hover_css.'
    }';
                $blog_dynamic_css['all'] .= $blog_default_navigation_dynamic_hover_css;
            }


            /*blog Css*/
            $blog_main_content_css         = '';
            $blog_main_content_tablet_css  = '';
            $blog_main_content_desktop_css = '';

            /* margin */
            $main_content_margin = cosmoswp_get_theme_options('blog-main-content-margin');
            $main_content_margin = json_decode($main_content_margin, true);
// desktop margin
            $main_content_margin_desktop = cosmoswp_cssbox_values_inline($main_content_margin, 'desktop');
            if (strpos($main_content_margin_desktop, 'px') !== false) {
                $blog_main_content_desktop_css .= 'margin:' . $main_content_margin_desktop . ';';
            }
// tablet marign
            $main_content_margin_tablet = cosmoswp_cssbox_values_inline($main_content_margin, 'tablet');
            if (strpos($main_content_margin_tablet, 'px') !== false) {
                $blog_main_content_tablet_css .= 'margin:' . $main_content_margin_tablet . ';';
            }
// mobile margin
            $main_content_margin_mobile = cosmoswp_cssbox_values_inline($main_content_margin, 'mobile');
            if (strpos($main_content_margin_mobile, 'px') !== false) {
                $blog_main_content_css .= 'margin:' . $main_content_margin_mobile . ';';
            }

            /* padding */
            $main_content_padding = cosmoswp_get_theme_options('blog-main-content-padding');
            $main_content_padding = json_decode($main_content_padding, true);

// desktop padding
            $main_content_padding_desktop = cosmoswp_cssbox_values_inline($main_content_padding, 'desktop');
            if (strpos($main_content_padding_desktop, 'px') !== false) {
                $blog_main_content_desktop_css .= 'padding:' . $main_content_padding_desktop . ';';
            }
//tablet padding
            $main_content_padding_tablet = cosmoswp_cssbox_values_inline($main_content_padding, 'tablet');
            if (strpos($main_content_padding_tablet, 'px') !== false) {
                $blog_main_content_tablet_css .= 'padding:' . $main_content_padding_tablet . ';';
            }

//mobile padding
            $main_content_padding_mobile = cosmoswp_cssbox_values_inline($main_content_padding, 'mobile');
            if (strpos($main_content_padding_mobile, 'px') !== false) {
                $blog_main_content_css .= 'padding:' . $main_content_padding_mobile . ';';
            }

            /* mobile css */
            if (!empty($blog_main_content_css)) {
                $main_content_mobile_dynamic_css = '.cwp-blog.cwp-content-wrapper{' . $blog_main_content_css . '}';
                $blog_dynamic_css['all']  .= $main_content_mobile_dynamic_css;
            }

            /* tablet css */
            if (!empty($blog_main_content_tablet_css)) {
                $main_content_tablet_dynamic_css = '.cwp-blog.cwp-content-wrapper{' . $blog_main_content_tablet_css . '}';
                $blog_dynamic_css['tablet']      .= $main_content_tablet_dynamic_css;
            }

            /* desktop css  */
            if (!empty($blog_main_content_desktop_css)) {
                $main_content_desktop_dynamic_css = '.cwp-blog.cwp-content-wrapper{' . $blog_main_content_desktop_css . '}';
                $blog_dynamic_css['desktop'] .= $main_content_desktop_dynamic_css;
            }
            return $blog_dynamic_css;
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

            $blog_dynamic_css = $this->get_dynamic_css();
            if (is_array($dynamic_css) && !empty($dynamic_css)) {
                $all_css = array_merge_recursive($dynamic_css, $blog_dynamic_css);
                return $all_css;
            }
            else {
                return $blog_dynamic_css;
            }
        }

        /**
         * Callback functions for cosmoswp_blog_loop_item,
         * Add Blog Item
         *
         * @since    1.0.0
         * @access   public
         *
         * @param null
         * @return void
         */
        public function blog_loop_item() {
            get_template_part('template-parts/loop/blog' , 'default');
        }

        /**
         * cosmoswp_customize_partial_blog_header_content,
         * Add Blog Item
         *
         * @since    1.0.0
         * @access   public
         *
         * @param null
         * @return String
         */
        public function cosmoswp_customize_partial_blog_header_content(){
            ob_start();
            cosmoswp_heading_title();
            $value = ob_get_clean();
            return $value;
        }

        /**
         *cosmoswp_customize_partial_blog_main_content,
         *
         * @since    1.0.0
         * @access   public
         *
         * @param null
         * @return String
         */
        public function cosmoswp_customize_partial_blog_main_content(){
            ob_start();
            $this->display_blog();
            $value = ob_get_clean();
            return $value;
        }

    }

endif;

/**
 * Create Instance for CosmosWP_Blog_Builder
 *
 * @since    1.0.0
 * @access   public
 *
 * @param
 * @return object
 */
if (!function_exists('cosmoswp_blog_builder')) {

    function cosmoswp_blog_builder() {

        return CosmosWP_Blog_Builder::instance();
    }

    cosmoswp_blog_builder()->run();
}