<?php
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
if (!function_exists('cosmoswp_widget_init')) {

    function cosmoswp_widget_init() {

	    $description = esc_html__('Displays widgets in Primary Sidebar','cosmoswp');
	    register_sidebar(array(
            'name'          => esc_html__('Primary Sidebar', 'cosmoswp'),
            'id'            => 'cwp-primary-sidebar',
            'description'   => $description,
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<div class="wa-title-action-wrapper clearfix"><h3 class="widget-title">',
            'after_title'   => '</h3></div>',
        ));
	    $description = esc_html__('Displays widgets in Secondary Sidebar', 'cosmoswp');
	    register_sidebar(array(
            'name'          => esc_html__('Secondary Sidebar', 'cosmoswp'),
            'id'            => 'cwp-secondary-sidebar',
            'description'   => $description,
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<div class="wa-title-action-wrapper clearfix"><h3 class="widget-title">',
            'after_title'   => '</h3></div>',
        ));
        for ($sidebar = 1; $sidebar <= 8; $sidebar++) {
            register_sidebar(array(
            	'name'          => sprintf( esc_html__( 'Footer Sidebar %d ', 'cosmoswp' ), $sidebar ),
                'id'            => 'footer-sidebar-' . $sidebar,
                'description'   => esc_html__('Display widgets footer section of the site.', 'cosmoswp'),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<div class="wa-title-action-wrapper clearfix"><h3 class="widget-title">',
                'after_title'   => '</h3></div>',
            ));
        }
    }

    add_action('widgets_init', 'cosmoswp_widget_init');
}

/**
 * Always show footer sidebar on customizer
 * @link https://developer.wordpress.org/reference/hooks/customize_section_active/
 *
 * @param bool   $active
 * @param string $section
 *
 * @return bool
 */
function cosmoswp_customizer_footer_sidebar_force_display( $active, $section ) {
    if ( strpos( $section->id, 'footer-sidebar-' ) ) {
        $active = true;
    }

    return $active;
}

add_filter( 'customize_section_active', 'cosmoswp_customizer_footer_sidebar_force_display', 99, 2 );