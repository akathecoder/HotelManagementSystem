<?php

class Yatri_Section_Nav_Menu_Config
{
    public static function get_design_style_config($id, $parent_selector)
    {
        return array(
            'tabs' => array(
                $id . '_main_menu' => esc_html__('Main Menu', 'yatri'),
                $id . '_dropdown_menu' => esc_html__('Dropdown', 'yatri'),
            ),
            $id . '_main_menu_fields' =>
                array(
                    array(
                        'name' => $id . '_nav__alignment',
                        'type' => 'alignment',
                        'label' => esc_html__('Menu Alignment', 'yatri'),
                        'description' => '',
                        'default' => array(
                            'desktop' => 'center',
                        ),
                        'device_settings' => true,
                        'devices' => array('desktop'),
                        'options' => array(
                            '' => array(
                                'title' => '',
                                'icon' => '',
                            ),
                            'left' => array(
                                'title' => esc_html__('Left', 'yatri'),
                                'icon' => 'dashicons dashicons-editor-alignleft',
                            ),
                            'center' => array(
                                'title' => esc_html__('Center', 'yatri'),
                                'icon' => 'dashicons dashicons-editor-aligncenter',
                            ),
                            'right' => array(
                                'title' => esc_html__('Right', 'yatri'),
                                'icon' => 'dashicons dashicons-editor-alignright',
                            )
                        ),
                        'selector' => "{$parent_selector} .yatri-section-container.menu-container nav > ul,
                        {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu nav>ul",
                        'css_property' => 'text-align:{{value}};'
                    ),
                    array(
                        'name' => $id . '_nav_color_heading',
                        'type' => 'heading',
                        'label' => esc_html__('Menu Colors', 'yatri'),
                    ),
                    array(
                        'name' => $id . '_nav_color',
                        'type' => 'color',
                        'label' => esc_html__('Font color', 'yatri'),
                        'description' => '',
                        'default' => '#fff',
                        'css_property' => 'color:{{value}};',
                        'selector' => "{$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li>a,
                        {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu ul:not(.sub-menu)>li>a",
                    ),
                    array(
                        'name' => $id . '_nav_hover_color',
                        'type' => 'color',
                        'label' => esc_html__('Hover font color', 'yatri'),
                        'description' => '',
                        'default' => '#fff',
                        'css_property' => 'color:{{value}};',
                        'selector' => "{$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li:hover>a,
                    {$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li.current-menu-item:hover>a,
                    {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu ul:not(.sub-menu)>li:hover>a,
                    {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu ul:not(.sub-menu)>li.current-menu-item:hover>a
                    
                    ",
                    ),
                    array(
                        'name' => $id . '_nav_background_color',
                        'type' => 'color',
                        'label' => esc_html__('Background color', 'yatri'),
                        'description' => '',
                        'default' => '#fff',
                        'css_property' => 'background-color:{{value}};',
                        'selector' => "{$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li>a,
                        {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu ul:not(.sub-menu)>li>a",
                    ),
                    array(
                        'name' => $id . '_nav_hover_background_color',
                        'type' => 'color',
                        'label' => esc_html__('Hover background color', 'yatri'),
                        'description' => '',
                        'default' => '#fff',
                        'css_property' => 'background-color:{{value}};',
                        'selector' => "{$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li:hover>a,
                    {$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li.current-menu-item:hover>a,
                    {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu  ul:not(.sub-menu)>li:hover>a,
                    {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu ul:not(.sub-menu)>li.current-menu-item:hover>a",
                    ),
                    array(
                        'name' => $id . '_nav_active_font_color',
                        'type' => 'color',
                        'label' => esc_html__('Active font color', 'yatri'),
                        'description' => '',
                        'default' => '#fff',
                        'css_property' => 'color:{{value}};',
                        'selector' => "{$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li.current-menu-item>a,
                        {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu  ul:not(.sub-menu)>li.current-menu-item>a",
                    ),
                    array(
                        'name' => $id . '_nav_active_background_color',
                        'type' => 'color',
                        'label' => esc_html__('Active background color', 'yatri'),
                        'description' => '',
                        'default' => '#fff',
                        'css_property' => 'background-color:{{value}};',
                        'selector' => "{$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li.current-menu-item>a,
                        {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu ul:not(.sub-menu)>li.current-menu-item>a",
                    ),

                    array(
                        'name' => $id . '_hamburger',
                        'type' => 'heading',
                        'label' => esc_html__('Mobile/Tablet Menu', 'yatri'),
                    ),
                    array(
                        'name' => $id . '_hamburger_color',
                        'type' => 'color',
                        'label' => esc_html__('Hamburger Color', 'yatri'),
                        'description' => '',
                        'default' => '#c1c1c1',
                        'selector' => "{$parent_selector} .yatri-section-container.menu-container .yatri-responsive-toggle-menu",
                        'css_property' => 'color:{{value}}; border-color:{{value}};'
                    ),
                    array(
                        'name' => $id . '_nav_hamburger_alignment',
                        'type' => 'alignment',
                        'label' => esc_html__('Hamburger Alignment', 'yatri'),
                        'description' => '',
                        'default' => 'center',
                        'options' => array(
                            '' => array(
                                'title' => '',
                                'icon' => '',
                            ),
                            'left' => array(
                                'title' => esc_html__('Left', 'yatri'),
                                'icon' => 'dashicons dashicons-editor-alignleft',
                            ),
                            'center' => array(
                                'title' => esc_html__('Center', 'yatri'),
                                'icon' => 'dashicons dashicons-editor-aligncenter',
                            ),
                            'right' => array(
                                'title' => esc_html__('Right', 'yatri'),
                                'icon' => 'dashicons dashicons-editor-alignright',
                            )
                        ),
                        'selector' => "{$parent_selector} .yatri-section-container.menu-container .yatri-responsive-toggle-menu-wrap",
                        'css_property' => 'text-align:{{value}};'
                    ),
                    array(
                        'name' => $id . '_mobile_menu_container_background',
                        'type' => 'color',
                        'label' => esc_html__('Mobile Menu Container Background', 'yatri'),
                        'description' => '',
                        'default' => '#c1c1c1',
                        'selector' => "{$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu",
                        'css_property' => 'background-color:{{value}};'
                    ),
                    array(
                        'name' => $id . '_mobile_menu_close_color',
                        'type' => 'color',
                        'label' => esc_html__('Mobile Menu Close Icon Color', 'yatri'),
                        'description' => '',
                        'default' => '#c1c1c1',
                        'selector' => "{$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu .yatri-mobile-navigation-close",
                        'css_property' => 'color:{{value}};'
                    ),
                    array(
                        'name' => $id . '_nav_padding_margin_heading',
                        'type' => 'heading',
                        'label' => esc_html__('Padding & Margin', 'yatri'),
                    ),
                    array(
                        'name' => $id . '_nav_padding',
                        'type' => 'padding',
                        'device_settings' => true,
                        'devices' => array('desktop', 'tablet', 'mobile'),
                        'label' => esc_html__('Padding', 'yatri'),
                        'description' => '',
                        'default' => array(
                            'desktop' => array(
                                'top' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                ),
                                'right' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                ),
                                'bottom' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                ),
                                'left' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                )
                            ),
                            'tablet' => array(

                                'top' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                ),
                                'right' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                ),
                                'bottom' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                ),
                                'left' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                )
                            ),
                            'mobile' => array(

                                'top' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                ),
                                'right' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                ),
                                'bottom' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                ),
                                'left' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                )
                            ),

                        ),
                        'selector' => "
                        {$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li>a,
                        {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu ul:not(.sub-menu)>li>a
                        ",
                    ),
                    array(
                        'name' => $id . '_nav_margin',
                        'type' => 'margin',
                        'device_settings' => true,
                        'devices' => array('desktop', 'tablet', 'mobile'),
                        'label' => esc_html__('Margin', 'yatri'),
                        'description' => '',
                        'default' => array(
                            'desktop' => array(
                                'top' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                ),
                                'right' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                ),
                                'bottom' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                ),
                                'left' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                )
                            ),
                            'tablet' => array(

                                'top' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                ),
                                'right' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                ),
                                'bottom' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                ),
                                'left' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                )
                            ),
                            'mobile' => array(

                                'top' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                ),
                                'right' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                ),
                                'bottom' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                ),
                                'left' => array(
                                    'value' => '',
                                    'unit' => 'px'
                                )
                            ),

                        ),
                        'selector' => "
                        {$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li>a,
                        {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu ul:not(.sub-menu)>li>a
                        ",
                    ),
                    array(
                        'name' => $id . '_nav_border_heading',
                        'type' => 'heading',
                        'label' => esc_html__('Main Menu Border', 'yatri'),
                    ),
                    array(
                        'name' => $id . '_nav_border',
                        'type' => 'border',
                        'device_settings' => true,
                        'devices' => array('desktop', 'tablet', 'mobile'),
                        'label' => '',
                        'default' => array(
                            'left' => 0,
                            'right' => 0,
                            'top' => 0,
                            'bottom' => 0
                        ),
                        'selector' => "
                        {$parent_selector} .yatri-section-container.menu-container ul:not(.sub-menu)>li>a,
                        {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu ul:not(.sub-menu)>li>a
                        ",

                    ),


                ),
            $id . '_dropdown_menu_fields' => array(
                array(
                    'name' => $id . '_dropdown_nav_color_heading',
                    'type' => 'heading',
                    'label' => esc_html__('Dropdown Menu Colors', 'yatri'),
                ),
                array(
                    'name' => $id . '_dropdown_nav_color',
                    'type' => 'color',
                    'label' => esc_html__('Dropdown font color', 'yatri'),
                    'description' => '',
                    'default' => '#fff',
                    'css_property' => 'color:{{value}};',
                    'selector' => "
                    {$parent_selector} .yatri-section-container.menu-container li.menu-item-has-children ul.sub-menu li a,
                    {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu li.menu-item-has-children ul.sub-menu li a
                    ",
                ),
                array(
                    'name' => $id . '_dropdown_nav_hover_color',
                    'type' => 'color',
                    'label' => esc_html__('Dropdown hover font color', 'yatri'),
                    'description' => '',
                    'default' => '#fff',
                    'css_property' => 'color:{{value}};',
                    'selector' => "
                    {$parent_selector} .yatri-section-container.menu-container li.menu-item-has-children ul.sub-menu li:hover>a,
                    {$parent_selector} .yatri-section-container.menu-container li.menu-item-has-children ul.sub-menu li.current-menu-item:hover>a,
                    {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu li.menu-item-has-children ul.sub-menu li:hover>a,
                    {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu li.menu-item-has-children ul.sub-menu li.current-menu-item:hover>a
                ",
                ),
                array(
                    'name' => $id . '_dropdown_nav_background_color',
                    'type' => 'color',
                    'label' => esc_html__('Dropdown background color', 'yatri'),
                    'description' => '',
                    'default' => '#fff',
                    'css_property' => 'background-color:{{value}};',
                    'selector' => "
                    {$parent_selector} .yatri-section-container.menu-container li.menu-item-has-children ul.sub-menu li a,
                    {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu li.menu-item-has-children ul.sub-menu li a
                    ",
                ), array(
                    'name' => $id . '_dropdown_nav_hover_background_color',
                    'type' => 'color',
                    'label' => esc_html__('Dropdown hover background color', 'yatri'),
                    'description' => '',
                    'default' => '#fff',
                    'css_property' => 'background-color:{{value}};',
                    'selector' => "
                    {$parent_selector} .yatri-section-container.menu-container li.menu-item-has-children ul.sub-menu li:hover>a,
                    {$parent_selector} .yatri-section-container.menu-container li.menu-item-has-children ul.sub-menu li.current-menu-item:hover>a,
                    {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu li.menu-item-has-children ul.sub-menu li:hover>a,
                    {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu li.menu-item-has-children ul.sub-menu li.current-menu-item:hover>a
                    
                    ",
                ), array(
                    'name' => $id . '_dropdown_nav_active_font_color',
                    'type' => 'color',
                    'label' => esc_html__('Dropdown active font color', 'yatri'),
                    'description' => '',
                    'default' => '#fff',
                    'css_property' => 'color:{{value}};',
                    'selector' => "
                    {$parent_selector} .yatri-section-container.menu-container li.menu-item-has-children ul.sub-menu li.current-menu-item>a,
                    {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu li.menu-item-has-children ul.sub-menu li.current-menu-item>a
                    ",
                ), array(
                    'name' => $id . '_dropdown_nav_active_background_color',
                    'type' => 'color',
                    'label' => esc_html__('Dropdown active background color', 'yatri'),
                    'description' => '',
                    'default' => '#fff',
                    'css_property' => 'background-color:{{value}};',
                    'selector' => "
                    {$parent_selector} .yatri-section-container.menu-container li.menu-item-has-children ul.sub-menu li.current-menu-item>a,
                    {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu li.menu-item-has-children ul.sub-menu li.current-menu-item>a
                    ",
                ),
                array(
                    'name' => $id . '_dropdown_nav_padding_margin_heading',
                    'type' => 'heading',
                    'label' => esc_html__('Padding & Margin', 'yatri'),
                ),
                array(
                    'name' => $id . '_dropdown_nav_padding',
                    'type' => 'padding',
                    'device_settings' => true,
                    'devices' => array('desktop', 'tablet', 'mobile'),
                    'label' => esc_html__('Padding', 'yatri'),
                    'description' => '',
                    'default' => array(
                        'desktop' => array(
                            'top' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'right' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'bottom' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'left' => array(
                                'value' => '',
                                'unit' => 'px'
                            )
                        ),
                        'tablet' => array(

                            'top' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'right' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'bottom' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'left' => array(
                                'value' => '',
                                'unit' => 'px'
                            )
                        ),
                        'mobile' => array(

                            'top' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'right' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'bottom' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'left' => array(
                                'value' => '',
                                'unit' => 'px'
                            )
                        ),

                    ),
                    'selector' => "
                    {$parent_selector} .yatri-section-container.menu-container li.menu-item-has-children ul.sub-menu li a,
                    {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu li.menu-item-has-children ul.sub-menu li a
                    ",
                ),
                array(
                    'name' => $id . '_dropdown_nav_margin',
                    'type' => 'margin',
                    'device_settings' => true,
                    'devices' => array('desktop', 'tablet', 'mobile'),
                    'label' => esc_html__('Margin', 'yatri'),
                    'description' => '',
                    'default' => array(
                        'desktop' => array(
                            'top' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'right' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'bottom' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'left' => array(
                                'value' => '',
                                'unit' => 'px'
                            )
                        ),
                        'tablet' => array(

                            'top' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'right' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'bottom' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'left' => array(
                                'value' => '',
                                'unit' => 'px'
                            )
                        ),
                        'mobile' => array(

                            'top' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'right' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'bottom' => array(
                                'value' => '',
                                'unit' => 'px'
                            ),
                            'left' => array(
                                'value' => '',
                                'unit' => 'px'
                            )
                        ),

                    ),
                    'additional_css' =>
                        array('desktop' => "{$parent_selector} .yatri-section-container.menu-container li.menu-item-has-children ul.sub-menu li a{display:inline-block;width:100%;} "),
                    'selector' => "
                    {$parent_selector} .yatri-section-container.menu-container li.menu-item-has-children ul.sub-menu li a,
                    {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu li.menu-item-has-children ul.sub-menu li a
                    ",
                ),
                array(
                    'name' => $id . '_dropdown_nav_wrapper_margin',
                    'type' => 'padding',
                    'label' => esc_html__('Wrapper Margin', 'yatri'),
                    'description' => '',
                    'selector' => "
                        {$parent_selector} .yatri-section-container.menu-container nav > ul > li:hover > ul,
                        {$parent_selector} .yatri-section-container.menu-container nav > ul > li.focus > ul,
                        {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu nav > ul > li:hover > ul,
                        {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu nav > ul > li.focus > ul
                        ",
                ),
                array(
                    'name' => $id . '_nav_border_heading',
                    'type' => 'heading',
                    'label' => esc_html__('Dropdown Menu Border', 'yatri'),
                ),
                array(
                    'name' => $id . '_dropdown_nav_border',
                    'type' => 'border',
                    'device_settings' => true,
                    'devices' => array('desktop', 'tablet', 'mobile'),
                    'label' => '',
                    'additional_css' =>
                        array(
                            'desktop' => "
                        {$parent_selector} .yatri-section-container.menu-container li.menu-item-has-children ul.sub-menu li{border:none;}
                        {$parent_selector} .yatri-section-container.menu-container li.menu-item-has-children ul.sub-menu ul{top:0px;} "
                        ),
                    'default' => array(
                        'left' => 0,
                        'right' => 0,
                        'top' => 0,
                        'bottom' => 0
                    ),
                    'selector' => "
                    {$parent_selector} .yatri-section-container.menu-container li.menu-item-has-children ul.sub-menu li a,
                    {$parent_selector}_navigation_menu.yatri-section-menu.yatri-mobile-menu li.menu-item-has-children ul.sub-menu li a
                    ",

                ),

            ),

        );
    }
}