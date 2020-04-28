<?php


class Yatri_Widgets
{
    public function __construct()
    {
        add_action('widgets_init', array($this, 'register_sidebar'), 5);


    }


    public function register_sidebar()
    {
        register_sidebar(array(
            'name' => esc_html__('Left Sidebar', 'yatri'),
            'id' => 'yatri_left_sidebar',
            'description' => esc_html__('Add widgets here to appear in this sidebar.', 'yatri'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => esc_html__('Right Sidebar', 'yatri'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here to appear in this sidebar.', 'yatri'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));


        register_sidebar(array(
            'name' => esc_html__('Off Canvas Menu Sidebar', 'yatri'),
            'id' => 'yatri-offcanvas-menu-sidebar',
            'description' => esc_html__('Add widgets here to appear in this sidebar.', 'yatri'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));

        $total_columns = 4;

        for ($sidebar_start = 1; $sidebar_start <= $total_columns; $sidebar_start++) {
            register_sidebar(array(
                'name' => esc_html__('Footer ', 'yatri') . $sidebar_start,
                'id' => 'yatri_footer_sidebar_' . $sidebar_start,
                'description' => esc_html__('Add widgets here.', 'yatri'),
                'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="footer-item">',
                'after_widget' => '</div></div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            ));
        }

    }


}

new Yatri_Widgets();