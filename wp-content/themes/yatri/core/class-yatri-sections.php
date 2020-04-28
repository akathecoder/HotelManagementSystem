<?php

class Yatri_Sections
{
    private static $instance = null;

    public $sections;


    public function valid_all_sections()
    {
        return apply_filters('yatri_valid_all_sections', array(
            'social_icons',
            'menu',
            'offcanvas_menu',
            'site_branding',
            'search_form',
            'button',
            'office_information',
            'custom_html',
            'copyright',
        ));
    }

    private function is_valid_section($id)
    {

        if (empty($id)) {

            return false;
        }
        $all_section = $this->valid_all_sections();


        if (in_array($id, $all_section)) {

            return true;
        }
        return false;
    }

    public static function get_instance()
    {

        if (is_null(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public static function init()
    {
        add_action('yatri_after_footer', array(__CLASS__, 'append_footer_sections'));
    }

    public static function append_footer_sections()
    {
        global $yatri_settings;

        $sections = isset($yatri_settings['sections']) ? $yatri_settings['sections'] : array();

        foreach ($sections as $section_id => $footer_sections) {

            foreach ($footer_sections as $footer_section_key => $section_options) {


                switch ($footer_section_key) {
                    case "offcanvas_menu":
                        self::offcanvas_menu_content($section_options, $section_id);
                        break;

                    case "mobile_menu":
                        self::mobile_menu_content($section_options, $section_id);
                        break;
                }
            }
        }

    }

    public static function get_all_registered_sections($on_part = '')
    {

        $all_sections = self::get_instance()->sections;

        $unset_fields = array();

        switch ($on_part) {
            case "top_header":
            case "mid_header":
            case "bottom_header":
                $unset_fields = array('copyright' => array());
                break;
            case "bottom_footer":
                $unset_fields = array(
                    'offcanvas_menu' => array(),
                    'site_branding' => array(),
                    'search_form' => array(),
                );
                break;
            default:
                $unset_fields = array();
                break;
        }
        $return_sections = array_diff_key($all_sections, $unset_fields);

        return $return_sections;

    }

    private static function get_toggle_button($section_id, $options = array())
    {
        $toggle_icon = isset($options['toggle_icon']) ? $options['toggle_icon'] : 'fas fa-bars';
        ?>
        <div class="yatri-responsive-toggle-menu-wrap">
            <button class="yatri-responsive-toggle-menu section-<?php echo esc_attr($section_id) ?>"
                    data-untoggle-on-escape="true">
                <span class="<?php echo esc_attr($toggle_icon); ?>"></span>
            </button>
        </div>
        <?php

    }

    public static function get_section($section_id = '', $options = array(), $container_class = '')
    {

        if (empty($section_id)) {

            return false;
        }

        if (!self::get_instance()->is_valid_section($section_id)) {
            return false;
        }

        echo '<div class="yatri-section-container ' . esc_attr($section_id) . '-container ' . esc_attr($container_class) . '">';

        switch ($section_id) {
            case "social_icons":
                echo '<div class="yatri-section-wrap ' . esc_attr($section_id) . '-wrap">';
                $options['toggle_icon'] = isset($options['toggle_icon']) ? $options['toggle_icon'] : 'fas  fa-share-alt';
                self::get_toggle_button($section_id, $options);
                self::get_instance()->get_social_icons($options);
                echo '</div>';
                break;
            case "menu":
                self::get_instance()->get_menu($options);
                break;
            case "offcanvas_menu":
                self::get_instance()->offcanvas_menu($options);
                break;
            case "site_branding":
                self::get_instance()->site_branding($options);
                break;
            case "search_form":
                self::get_instance()->search_form($options);
                break;
            case "button":
                self::get_instance()->button($options);
                break;

            case "office_information":
                $options['toggle_icon'] = isset($options['toggle_icon']) ? $options['toggle_icon'] : 'fas  fa-location-arrow';
                self::get_toggle_button($section_id, $options);
                self::get_instance()->office_information($options);
                break;
            case "custom_html":
                self::get_instance()->custom_html($options);
                break;
            case "copyright":
                self::get_instance()->copyright($options);
                break;
        }
        echo '</div>';


    }


    public static function register($id, $params = array())
    {
        if (!isset(self::get_instance()->sections[$id]) && self::get_instance()->is_valid_section($id)) {

            self::get_instance()->sections[$id] = $params;
        }

    }

    private function copyright($options)
    {
        $class = isset($options['class']) ? $options['class'] : '';

        $footer_text = isset($options['content']) ? $options['content'] : '';

        ?>
        <div class="yatri-section-copyright <?php echo esc_attr($class); ?> yatri-section-inner">
            <div class="copyright">
                <?php echo wp_kses_post(html_entity_decode($footer_text)); ?>
            </div>
        </div>
        <?php
    }

    private function office_information($options = array())
    {
        $class = isset($options['class']) ? $options['class'] : '';
        $informations = isset($options['informations']) ? $options['informations'] : '';

        ?>
        <div class="yatri-section-office-information <?php echo esc_attr($class); ?> yatri-section-inner">
            <ul>
                <?php
                foreach ($informations as $info => $information) {
                    $title = isset($information['title']) ? $information['title'] : '';
                    $icon = isset($information['icon']) ? $information['icon'] : '';
                    $link = isset($information['link']) ? $information['link'] : '';
                    echo '<li>';
                    echo '<span class="icon ' . esc_attr($icon) . '"></span>';
                    if (!empty($link)) {
                        echo '<a href="' . esc_attr($link) . '" class="text">' . esc_html($title) . '</a>';
                    } else {
                        echo '<span class="text">' . esc_html($title) . '</span>';
                    }
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
        <?php
    }

    private function custom_html($options = array())
    {
        $content = isset($options['content']) ? $options['content'] : '';

        $class = isset($options['class']) ? $options['class'] : '';
        ?>
        <div class="yatri-section-custom-html <?php echo esc_attr($class); ?> yatri-section-inner">
            <?php echo($content); ?>
        </div>
        <?php
    }

    private function button($options = array())
    {
        $class = isset($options['class']) ? $options['class'] : '';
        $icon = isset($options['icon']) ? $options['icon'] : 'fas fa-search';
        $link = isset($options['link']) ? $options['link'] : '#';
        $target = isset($options['target']) ? $options['target'] : '_blank';
        $label = isset($options['label']) ? $options['label'] : '';
        ?>
        <div class="yatri-section-button <?php echo esc_attr($class); ?> yatri-section-inner">
            <a class="yatri-button" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
                <?php if (!empty($icon)) { ?>
                    <i class="yatri-button-icon <?php echo esc_attr($icon); ?>"></i>
                <?php }
                if (!empty($label)) { ?>
                    <span><?php echo esc_attr($label); ?></span>
                <?php } ?>
            </a>
        </div>
        <?php
    }

    private function search_form($options = array())
    {
        $class = isset($options['class']) ? $options['class'] : '';
        $icon = isset($options['icon']) ? $options['icon'] : 'fas fa-search';
        $type = isset($options['type']) ? $options['type'] : 'default';
        $placeholder = isset($options['placeholder']) ? $options['placeholder'] : esc_html__('Search', 'yatri');
        ?>
        <div class="yatri-section-search-form <?php echo esc_attr($class); ?> form-type-<?php echo esc_attr($type) ?> yatri-section-inner">
            <button class="search-main"><i class="yatri-search-icon <?php echo esc_attr($icon); ?>"></i></button>
            <div class="search-form-main clearfix">
                <form role="search" method="get" id="searchform" class="searchform"
                      action="<?php echo esc_url(home_url('/')); ?>">
                    <div>
                        <label class="screen-reader-text" for="s"><?php esc_html_e('Search for:', 'yatri'); ?></label>
                        <input type="text" class="yatri-custom-search-input" value="" name="s" id="s"
                               placeholder="<?php echo esc_attr($placeholder); ?>">
                        <input type="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'yatri'); ?>">
                    </div>
                    <button type="submit" class="search-button"><span class="<?php echo esc_attr($icon); ?>"></span>
                    </button>
                </form>
            </div>
        </div>
        <?php
    }

    private function site_branding($options = array())
    {
        $type = isset($options['type']) ? $options['type'] : 'logo-only';

        $header = isset($options['header']) ? $options['header'] : '';

        $layout = isset($options['layout']) ? $options['layout'] : 'layout-1';

        if (($header != yatri_get_option('logo_on_header')) || empty($header)) {
            return;
        }

        $site_title_html = '<a href="' . esc_url(home_url('/')) . '" rel="home">' . esc_html(get_bloginfo('name')) . '</a>';

        $site_description_html = '<p class="site-description">' . esc_html(get_bloginfo('description', 'display')) . '</p>';

        $class = $type . ' ' . $layout;
        ?>
        <div class="yatri-section-site-branding yatri-section-inner <?php echo esc_attr($class); ?>">
            <?php
            if ($type == 'logo-only') {

                the_custom_logo();

            } else if ($type == 'title-text') {

                echo '<div class="title-tagline-wrap">';

                if (is_front_page() && is_home()) {

                    if (get_bloginfo('name')) {
                        ?>
                        <h1 class="site-title">
                            <?php echo $site_title_html; ?>
                        </h1>
                        <?php
                    }

                } else {
                    if (get_bloginfo('name')) {
                        ?>
                        <p class="site-title">
                            <?php echo $site_title_html; ?>
                        </p>
                        <?php
                    }
                }

                if (get_bloginfo('description')) {

                    echo $site_description_html;
                }
                echo '</div>';

            } else if ($type == 'logo-title-text') {

                if ($layout != 'layout-2' && $layout != 'layout-4') {
                    the_custom_logo();
                }

                echo '<div class="title-tagline-wrap">';

                if (is_front_page() && is_home()) {
                    if (get_bloginfo('name')) {
                        ?>
                        <h1 class="site-title">
                            <?php echo $site_title_html; ?>
                        </h1>
                        <?php
                    }

                } else {
                    if (get_bloginfo('name')) {
                        ?>
                        <p class="site-title">
                            <?php echo $site_title_html; ?>
                        </p>
                        <?php
                    }
                }

                if (get_bloginfo('description')) {

                    echo $site_description_html;
                }
                echo '</div>';

                if ($layout == 'layout-2' || $layout == 'layout-4') {
                    the_custom_logo();
                }
            }
            ?>
        </div><!-- .site-branding --><?php

    }

    private static function offcanvas_menu_content($options, $section_id)
    {
        $start_from = isset($options['start_from']) ? $options['start_from'] : 'left';
        $type = isset($options['type']) ? $options['type'] : 'sidebar';
        $menu = isset($options['menu']) ? sanitize_text_field($options['menu']) : 'offcanvas_menu';
        $sidebar = isset($options['sidebar']) ? sanitize_text_field($options['sidebar']) : 'yatri-offcanvas-menu-sidebar';

        echo '<div class="yatri-offcanvas-menu-content ' . esc_attr($section_id) . '_offcanvas_menu ' . esc_attr($start_from) . ' " id="' . esc_attr($section_id) . '_offcanvas_menu">';
        echo '<div class="yatri-offcanvas-menu-content-inner">';
        echo '<button class="yatri-canvas-close yatri-offcanvas-close-button">';
        echo '<span class="close-icon fas fa-times"></span>';
        echo '</button>';
        switch ($type) {
            case "menu":
                yatri_get_navigation_menu(
                    array(
                        'theme_location' => $menu
                    )
                );
                break;
            case "sidebar":
                dynamic_sidebar($sidebar);
                break;
        }

        echo '</div>';
        echo '</div>';
    }

    private static function mobile_menu_content($options, $section_id)
    {
        $location = isset($options['location']) ? sanitize_text_field($options['location']) : 'top_header_menu';

        $depth = isset($options['depth']) ? absint($options['depth']) : 0;

        $class = isset($options['class']) ? sanitize_text_field($options['class']) : '';

        echo '<div class="yatri-section-menu yatri-mobile-menu ' . esc_attr($section_id) . '_navigation_menu ' . esc_attr($class) . ' yatri-section-inner" id="' . esc_attr($section_id) . '_navigation_menu">';
        echo '<button class="yatri-mobile-navigation-close fas fa-times"></button>';
        echo '<nav class="' . esc_attr($class) . '">';
        yatri_get_navigation_menu(array(
            'theme_location' => $location,
            'depth' => $depth
        ));

        echo '</div>';
        echo '</nav>';
    }

    private function offcanvas_menu($options = array())
    {
        $section_part_id = isset($options['section_part_id']) ? $options['section_part_id'] : '';

        echo '<div class="yatri-section-offcanvas-menu yatri-section-inner" data-id="' . esc_attr($section_part_id) . '_offcanvas_menu">';
        echo '<button class="yatri-toggle-wrap" data-untoggle-on-escape="true">';
        echo '<span class="toggle-icon fas fa-bars"></span>';
        echo '</button>';
        echo '</div>';
    }

    private function get_menu($options = array())
    {
        $location = isset($options['location']) ? sanitize_text_field($options['location']) : 'top_header_menu';

        $depth = isset($options['depth']) ? absint($options['depth']) : 0;

        $class = isset($options['class']) ? sanitize_text_field($options['class']) : '';

        $section_part_id = isset($options['section_part_id']) ? $options['section_part_id'] : '';

        $toggle_icon = isset($options['toggle_icon']) ? $options['toggle_icon'] : 'fas fa-bars';
        ?>
        <div class="yatri-responsive-toggle-menu-wrap"
             data-id="<?php echo esc_attr($section_part_id); ?>_navigation_menu">
            <button class="yatri-responsive-toggle-menu" data-untoggle-on-escape="true"
                    data-set-focus=".yatri-mobile-navigation">
                <span class="<?php echo esc_attr($toggle_icon); ?>"></span>
            </button>
        </div>
        <?php

        echo '<nav class="yatri-section-menu ' . esc_attr($class) . ' yatri-section-inner">';

        yatri_get_navigation_menu(array(
            'theme_location' => $location,
            'depth' => $depth
        ));

        echo '</nav>';
    }


    private function get_social_icons($options = array())
    {
        $options['icons'] = isset($options['icons']) ? $options['icons'] : array();

        $default_args = array(
            'icon_url' => '',
            'icon_text' => '',
            'open_in_new_tab' => '',
            'icon_title_text' => '',

        );

        if (count($options['icons']) < 1) {
            return;
        }

        echo '<div class="yatri-section-social-icons yatri-section-inner">';

        echo '<ul>';

        foreach ($options['icons'] as $option) {

            $option_values = wp_parse_args($option, $default_args);

            echo '<li>';

            $target = $option_values['open_in_new_tab'] == 1 ? '_blank' : '_self';

            echo '<a title="' . esc_attr($option_values['icon_title_text']) . '" href="' . esc_url($option_values['icon_url']) . '" target="' . esc_attr($target) . '" rel="nofollow"><span class="' . esc_attr($option_values['icon_text']) . '"></span></a>';

            echo '</li>';
        }
        echo '</ul>';
        echo '</div>';

    }

    public static function set_global($section_id, $options = array(), $section_part_id)
    {
        global $yatri_settings;

        $yatri_settings['sections'][$section_part_id][$section_id] = $options;

    }
}