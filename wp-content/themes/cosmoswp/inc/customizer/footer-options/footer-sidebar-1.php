<?php
if (!defined('ABSPATH')) {
    exit;
}
/* Footer Sidebar 1 */
$footer_sidebar1 = $wp_customize->get_section('sidebar-widgets-footer-sidebar-1');
if (!empty($footer_sidebar1)) {
    $footer_sidebar1->panel = $this->panel;
    $footer_sidebar1->title = esc_html__('Footer Sidebar 1', 'cosmoswp');
    $footer_sidebar1->priority = 110;

    $wp_customize->add_setting('footer-sidebar-1-widget-setting-msg', array(
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(
        new CosmosWP_Custom_Control_Heading(
            $wp_customize,
            'footer-sidebar-1-widget-setting-msg',
            array(
                'label'   => esc_html__('Widget Setting', 'cosmoswp'),
                'section' => 'sidebar-widgets-footer-sidebar-1',
                'priority' => 110,
            )
        )
    );

    /*Footer Content Alignment*/
    $wp_customize->add_setting('footer-sidebar-1-widget-setting-option', array(
        'default'           => $footer_defaults['footer-sidebar-1-widget-setting-option'],
        'sanitize_callback' => 'cosmoswp_sanitize_select',
        'transport'         => 'postMessage'
    ));
    $choices = cosmoswp_inherit_options();
    $wp_customize->add_control('footer-sidebar-1-widget-setting-option', array(
        'label'    => esc_html__('Widget Setting Option', 'cosmoswp'),
        'type'     => 'select',
        'section' => 'sidebar-widgets-footer-sidebar-1',
        'settings' => 'footer-sidebar-1-widget-setting-option',
        'priority' => 110,
        'choices'  => $choices
    ));

    /*Content align*/
    $wp_customize->add_setting('footer-sidebar-1-content-align', array(
        'default'           => $footer_defaults['footer-sidebar-1-content-align'],
        'sanitize_callback' => 'cosmoswp_sanitize_select',
        'transport'         => 'postMessage'
    ));
    $choices = cosmoswp_text_align();
    $wp_customize->add_control(
        new CosmosWP_Custom_Control_Buttonset(
            $wp_customize,
            'footer-sidebar-1-content-align',
            array(
                'choices'           => $choices,
                'label'             => esc_html__('Content Alignment', 'cosmoswp'),
                'section'           => 'sidebar-widgets-footer-sidebar-1',
                'active_callback' => 'cosmoswp_footer_sidebar_1_custom_widget_setting',
                'priority'          => 110,
                'settings'          => 'footer-sidebar-1-content-align',
            )
        )
    );


    /*Footer margin*/
    $wp_customize->add_setting('footer-sidebar-1-margin', array(
        'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
        'default'           => $footer_defaults['footer-sidebar-1-margin'],
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control(
        new CosmosWP_Custom_Control_Cssbox(
            $wp_customize,
            'footer-sidebar-1-margin',
            array(
                'label'    => esc_html__('Margin', 'cosmoswp'),
                'section'  => 'sidebar-widgets-footer-sidebar-1',
                'active_callback' => 'cosmoswp_footer_sidebar_1_custom_widget_setting',
                'priority' => 110,
                'settings' => 'footer-sidebar-1-margin',
            ),
            array(),
            array()
        )
    );

    /*Footer padding*/
    $wp_customize->add_setting('footer-sidebar-1-padding', array(
        'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
        'default'           => $footer_defaults['footer-sidebar-1-padding'],
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control(
        new CosmosWP_Custom_Control_Cssbox(
            $wp_customize,
            'footer-sidebar-1-padding',
            array(
                'label'    => esc_html__('Padding', 'cosmoswp'),
                'section'  => 'sidebar-widgets-footer-sidebar-1',
                'active_callback' => 'cosmoswp_footer_sidebar_1_custom_widget_setting',
                'settings' => 'footer-sidebar-1-padding',
                'priority' => 110,
            ),
            array(),
            array()
        )
    );
}
