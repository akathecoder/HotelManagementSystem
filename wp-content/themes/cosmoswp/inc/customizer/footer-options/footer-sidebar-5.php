<?php
if (!defined('ABSPATH')) {
    exit;
}
/* Footer Sidebar 5*/
$footer_sidebar5 = $wp_customize->get_section('sidebar-widgets-footer-sidebar-5');
if (!empty($footer_sidebar5)) {
    $footer_sidebar5->panel = $this->panel;
    $footer_sidebar5->title = esc_html__('Footer Sidebar 5', 'cosmoswp');
    $footer_sidebar5->priority = 150;


    /*Content Alignment msg*/
    $wp_customize->add_setting('footer-sidebar-5-widget-setting-msg', array(
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(
        new CosmosWP_Custom_Control_Heading(
            $wp_customize,
            'footer-sidebar-5-widget-setting-msg',
            array(
                'label'   => esc_html__('Widget Setting', 'cosmoswp'),
                'section' => 'sidebar-widgets-footer-sidebar-5',
            )
        )
    );

    /*Footer Content Alignment*/
    $wp_customize->add_setting('footer-sidebar-5-widget-setting-option', array(
        'default'           => $footer_defaults['footer-sidebar-5-widget-setting-option'],
        'sanitize_callback' => 'cosmoswp_sanitize_select',
        'transport'         => 'postMessage'
    ));
    $choices = cosmoswp_inherit_options();
    $wp_customize->add_control('footer-sidebar-5-widget-setting-option', array(
        'label'    => esc_html__('Widget Setting Option', 'cosmoswp'),
        'type'     => 'select',
        'section' => 'sidebar-widgets-footer-sidebar-5',
        'settings' => 'footer-sidebar-5-widget-setting-option',
        'choices'  => $choices
    ));

    /*Content align*/
    $wp_customize->add_setting('footer-sidebar-5-content-align', array(
        'default'           => $footer_defaults['footer-sidebar-5-content-align'],
        'sanitize_callback' => 'cosmoswp_sanitize_select',
        'transport'         => 'postMessage'
    ));
    $choices = cosmoswp_text_align();
    $wp_customize->add_control(
        new CosmosWP_Custom_Control_Buttonset(
            $wp_customize,
            'footer-sidebar-5-content-align',
            array(
                'choices'  => $choices,
                'label'    => esc_html__('Content Alignment', 'cosmoswp'),
                'section'  => 'sidebar-widgets-footer-sidebar-5',
                'settings' => 'footer-sidebar-5-content-align',
                'active_callback'   => 'cosmoswp_footer_sidebar_5_align',
            )
        )
    );


    /*Footer margin*/
    $wp_customize->add_setting('footer-sidebar-5-margin', array(
        'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
        'default'           => $footer_defaults['footer-sidebar-5-margin'],
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control(
        new CosmosWP_Custom_Control_Cssbox(
            $wp_customize,
            'footer-sidebar-5-margin',
            array(
                'label'    => esc_html__('Margin', 'cosmoswp'),
                'section'  => 'sidebar-widgets-footer-sidebar-5',
                'settings' => 'footer-sidebar-5-margin',
                'active_callback'   => 'cosmoswp_footer_sidebar_5_align',
            ),
            array(),
            array()
        )
    );

    /*Footer padding*/
    $wp_customize->add_setting('footer-sidebar-5-padding', array(
        'sanitize_callback' => 'cosmoswp_sanitize_field_default_css_box',
        'default'           => $footer_defaults['footer-sidebar-5-padding'],
        'transport'         => 'postMessage'
    ));
    $wp_customize->add_control(
        new CosmosWP_Custom_Control_Cssbox(
            $wp_customize,
            'footer-sidebar-5-padding',
            array(
                'label'    => esc_html__('Padding', 'cosmoswp'),
                'section'  => 'sidebar-widgets-footer-sidebar-5',
                'settings' => 'footer-sidebar-5-padding',
                'active_callback'   => 'cosmoswp_footer_sidebar_5_align',
            ),
            array(),
            array()
        )
    );
}