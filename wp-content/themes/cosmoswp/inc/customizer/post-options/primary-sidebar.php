<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Post Elements Starts from here*/
$wp_customize->add_section(
    new CosmosWP_WP_Customize_Section_H3($wp_customize, 'cosmoswp_post_elements_seperator', array(
            'title'    => esc_html__('Post Elements', 'cosmoswp'),
            'panel'    => $this->panel,
            'priority' => 200,
        )
    ));

/*Primary Sidebar Section*/
$wp_customize->add_section($this->primary_sidebar, array(
    'title'    => esc_html__('Primary Sidebar', 'cosmoswp'),
    'priority' => 210,
    'panel'    => $this->panel,
));

/*Primary Sidebar*/
$wp_customize->add_setting($this->primary_sidebar, array(
    'sanitize_callback' => 'esc_attr',
    'capability'        => 'edit_theme_options',
));
$description = sprintf(esc_html__('Add Primary Sidebar Widgets from %1$s here%2$s', 'cosmoswp'), '<a class="cosmoswp-customizer button button-primary" data-section="sidebar-widgets-cwp-primary-sidebar">', '</a>');
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Message(
        $wp_customize,
        $this->primary_sidebar,
        array(
            'description' => $description,
            'section'     => $this->primary_sidebar,
        )
    )
);