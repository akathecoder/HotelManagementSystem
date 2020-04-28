<?php

add_filter('yatri_tools_demos_data', 'yatri_tools_demo_data_config');

function yatri_tools_demo_data_config()
{
    $demo_data_root_path = 'https://raw.githubusercontent.com/mantrabrain/yatri-demo-data/master/';

    return array(
        'main' => array(
            'categories' => array('Elementor', 'Corporate & Business', 'WooCommerce'),
            'xml_file' => $demo_data_root_path . 'main/content.xml',
            'theme_settings' => $demo_data_root_path . 'main/customizer.dat',
            'widgets_file' => $demo_data_root_path . 'main/widgets.wie',
            'screenshot' => $demo_data_root_path . 'main/screenshot.png',
            'home_title' => 'Home',
            'blog_title' => 'Blog',
            'posts_to_show' => '5',
            'elementor_width' => '1140',
            'required_plugins' => array(
                'free' => array(
                    array(
                        'slug' => 'elementor',
                        'init' => 'elementor/elementor.php',
                        'name' => 'Elementor',
                    ),
                    array(
                        'slug' => 'everest-forms',
                        'init' => 'everest-forms/everest-forms.php',
                        'name' => 'Everest Forms',
                    )

                )
            ),
        ),
        'agency' => array(
            'categories' => array('Elementor', 'Corporate & Business', 'WooCommerce'),
            'xml_file' => $demo_data_root_path . 'agency/content.xml',
            'theme_settings' => $demo_data_root_path . 'agency/customizer.dat',
            'widgets_file' => $demo_data_root_path . 'agency/widgets.wie',
            'screenshot' => $demo_data_root_path . 'agency/screenshot.png',
            'home_title' => 'Home',
            'blog_title' => 'Blog',
            'posts_to_show' => '5',
            'elementor_width' => '1140',
            'required_plugins' => array(
                'free' => array(
                    array(
                        'slug' => 'elementor',
                        'init' => 'elementor/elementor.php',
                        'name' => 'Elementor',
                    ),
                    array(
                        'slug' => 'everest-forms',
                        'init' => 'everest-forms/everest-forms.php',
                        'name' => 'Everest Forms',
                    )

                )
            ),
        ),
        'personal' => array(
            'categories' => array('Elementor', 'Corporate & Business', 'Blog'),
            'xml_file' => $demo_data_root_path . 'personal/content.xml',
            'theme_settings' => $demo_data_root_path . 'personal/customizer.dat',
            'widgets_file' => $demo_data_root_path . 'personal/widgets.wie',
            'screenshot' => $demo_data_root_path . 'personal/screenshot.png',
            'home_title' => 'Home',
            'blog_title' => 'Blog',
            'posts_to_show' => '5',
            'elementor_width' => '1140',
            'required_plugins' => array(
                'free' => array(
                    array(
                        'slug' => 'elementor',
                        'init' => 'elementor/elementor.php',
                        'name' => 'Elementor',
                    ),

                ),
                'premium' => array(
                    array(
                        'slug' => 'yatri-typography-addon',
                        'init' => 'yatri-typography-addon/yatri-typography-addon.php',
                        'name' => 'Yatri Typography Addon',
                    ),
                    array(
                        'slug' => 'yatri-agency-elementor-addon',
                        'init' => 'yatri-agency-elementor-addon/yatri-agency-elementor-addon.php',
                        'name' => 'Yatri Agency Elementor Addon',
                    ),
                    array(
                        'slug' => 'yatri-social-sharing-addon',
                        'init' => 'yatri-social-sharing-addon/yatri-social-sharing-addon.php',
                        'name' => 'Yatri Social Sharing Addon',
                    ),

                )
            ),
        ),
        'charity' => array(
            'categories' => array('Elementor', 'Charity', 'Blog'),
            'xml_file' => $demo_data_root_path . 'charity/content.xml',
            'theme_settings' => $demo_data_root_path . 'charity/customizer.dat',
            'widgets_file' => $demo_data_root_path . 'charity/widgets.wie',
            'screenshot' => $demo_data_root_path . 'charity/screenshot.png',
            'home_title' => 'Home',
            'blog_title' => 'Blog',
            'posts_to_show' => '5',
            'elementor_width' => '1140',
            'required_plugins' => array(
                'free' => array(
                    array(
                        'slug' => 'elementor',
                        'init' => 'elementor/elementor.php',
                        'name' => 'Elementor',
                    ),

                ),
                'premium' => array(
                    array(
                        'slug' => 'yatri-typography-addon',
                        'init' => 'yatri-typography-addon/yatri-typography-addon.php',
                        'name' => 'Yatri Typography Addon',
                    ),

                )
            ),
        ),
        'corporate' => array(
            'categories' => array('Elementor', 'Corporate & Business', 'Blog'),
            'xml_file' => $demo_data_root_path . 'corporate/content.xml',
            'theme_settings' => $demo_data_root_path . 'corporate/customizer.dat',
            'widgets_file' => $demo_data_root_path . 'corporate/widgets.wie',
            'screenshot' => $demo_data_root_path . 'corporate/screenshot.png',
            'home_title' => 'Home',
            'blog_title' => 'Blog',
            'posts_to_show' => '5',
            'elementor_width' => '1140',
            'required_plugins' => array(
                'free' => array(
                    array(
                        'slug' => 'elementor',
                        'init' => 'elementor/elementor.php',
                        'name' => 'Elementor',
                    ),

                ),
                'premium' => array(
                    array(
                        'slug' => 'yatri-typography-addon',
                        'init' => 'yatri-typography-addon/yatri-typography-addon.php',
                        'name' => 'Yatri Typography Addon',
                    ),
                    array(
                        'slug' => 'yatri-sticky-addon',
                        'init' => 'yatri-sticky-addon/yatri-sticky-addon.php',
                        'name' => 'Yatri Sticky Addon',
                    ),

                )
            ),
        ),
        'restaurant' => array(
            'categories' => array('Elementor', 'Corporate & Business', 'Blog'),
            'xml_file' => $demo_data_root_path . 'restaurant/content.xml',
            'theme_settings' => $demo_data_root_path . 'restaurant/customizer.dat',
            'widgets_file' => $demo_data_root_path . 'restaurant/widgets.wie',
            'screenshot' => $demo_data_root_path . 'restaurant/screenshot.png',
            'home_title' => 'Home',
            'blog_title' => 'Blog',
            'posts_to_show' => '5',
            'elementor_width' => '1140',
            'required_plugins' => array(
                'free' => array(
                    array(
                        'slug' => 'elementor',
                        'init' => 'elementor/elementor.php',
                        'name' => 'Elementor',
                    ),

                ),
                'premium' => array(
                    array(
                        'slug' => 'yatri-typography-addon',
                        'init' => 'yatri-typography-addon/yatri-typography-addon.php',
                        'name' => 'Yatri Typography Addon',
                    ),
                    array(
                        'slug' => 'yatri-sticky-addon',
                        'init' => 'yatri-sticky-addon/yatri-sticky-addon.php',
                        'name' => 'Yatri Sticky Addon',
                    ),
                    array(
                        'slug' => 'yatri-agency-elementor-addon',
                        'init' => 'yatri-agency-elementor-addon/yatri-agency-elementor-addon.php',
                        'name' => 'Yatri Agency Elementor Addon',
                    ),

                )
            ),
        ),
        'online-shop' => array(
            'categories' => array('Elementor', 'Corporate & Business', 'eCommerce', 'WooCommerce'),
            'xml_file' => $demo_data_root_path . 'online-shop/content.xml',
            'theme_settings' => $demo_data_root_path . 'online-shop/customizer.dat',
            'widgets_file' => $demo_data_root_path . 'online-shop/widgets.wie',
            'screenshot' => $demo_data_root_path . 'online-shop/screenshot.png',
            'home_title' => 'Home',
            'blog_title' => 'Blog',
            'posts_to_show' => '5',
            'elementor_width' => '1140',
            'required_plugins' => array(
                'free' => array(
                    array(
                        'slug' => 'elementor',
                        'init' => 'elementor/elementor.php',
                        'name' => 'Elementor',
                    ),
                    array(
                        'slug' => 'woocommerce',
                        'init' => 'woocommerce/woocommerce.php',
                        'name' => 'WooCommerce',
                    ),

                ),
                'premium' => array(
                    array(
                        'slug' => 'yatri-typography-addon',
                        'init' => 'yatri-typography-addon/yatri-typography-addon.php',
                        'name' => 'Yatri Typography Addon',
                    ),
                    array(
                        'slug' => 'yatri-agency-elementor-addon',
                        'init' => 'yatri-agency-elementor-addon/yatri-agency-elementor-addon.php',
                        'name' => 'Yatri Agency Elementor Addon',
                    ),

                )
            ),
        ),
        'blog' => array(
            'categories' => array('Elementor', 'Blog'),
            'xml_file' => $demo_data_root_path . 'blog/content.xml',
            'theme_settings' => $demo_data_root_path . 'blog/customizer.dat',
            'widgets_file' => $demo_data_root_path . 'blog/widgets.wie',
            'screenshot' => $demo_data_root_path . 'blog/screenshot.png',
            'home_title' => 'Home',
            'blog_title' => 'Blog',
            'posts_to_show' => '5',
            'elementor_width' => '1140',
            'required_plugins' => array(
                'free' => array(
                    array(
                        'slug' => 'elementor',
                        'init' => 'elementor/elementor.php',
                        'name' => 'Elementor',
                    )

                )
            ),
        ),
        'classic' => array(
            'categories' => array('Classic', 'Business', 'Agency'),
            'xml_file' => $demo_data_root_path . 'classic/content.xml',
            'theme_settings' => $demo_data_root_path . 'classic/customizer.dat',
            'widgets_file' => $demo_data_root_path . 'classic/widgets.wie',
            'screenshot' => $demo_data_root_path . 'classic/screenshot.png',
            'home_title' => 'Home',
            'blog_title' => 'Blog',
            'posts_to_show' => '5',
            'elementor_width' => '1140',
            'required_plugins' => array(
                'free' => array(
                    array(
                        'slug' => 'elementor',
                        'init' => 'elementor/elementor.php',
                        'name' => 'Elementor',
                    ),
                    array(
                        'slug' => 'everest-forms',
                        'init' => 'everest-forms/everest-forms.php',
                        'name' => 'Everest Forms',
                    )

                ),
                'premium' => array(
                    array(
                        'slug' => 'yatri-typography-addon',
                        'init' => 'yatri-typography-addon/yatri-typography-addon.php',
                        'name' => 'Yatri Typography Addon',
                    ),
                    array(
                        'slug' => 'yatri-agency-elementor-addon',
                        'init' => 'yatri-agency-elementor-addon/yatri-agency-elementor-addon.php',
                        'name' => 'Yatri Agency Elementor Addon',
                    ),
                    array(
                        'slug' => 'yatri-social-sharing-addon',
                        'init' => 'yatri-social-sharing-addon/yatri-social-sharing-addon.php',
                        'name' => 'Yatri Social Sharing Addon',
                    ),

                )
            ),
        ),

    );
}


function yatri_tools_all_header_templates()
{
    $template_url = 'https://raw.githubusercontent.com/mantrabrain/yatri-prebuilt-header-templates/master/all-header-template-list.json';

    $response = wp_remote_get($template_url);

    $response_data_string = (wp_remote_retrieve_body($response));

    try {
        $response_data = json_decode($response_data_string, true);

        if (!is_array($response_data)) {
            return array();
        }

        if (count($response_data) > 0) {

            return $response_data;
        }
    } catch (Exception $e) {
        return array();
    }
    return array();


}