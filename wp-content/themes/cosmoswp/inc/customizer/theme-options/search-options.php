<?php
if (!defined('ABSPATH')) {
    exit;
}

/*Adding Sections for Search Placeholder*/
$wp_customize->add_section($this->search_options, array(
    'title' => esc_html__('Search Options', 'cosmoswp'),
    'panel' => $this->panel,
    'priority' => 60,
));

/*scroll top selection Msg*/
$wp_customize->add_setting('search-options-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Heading(
        $wp_customize,
        'search-options-msg',
        array(
            'label'   => esc_html__('Search Option', 'cosmoswp'),
            'section' => $this->search_options,
        )
    )
);

/*Search Placeholder*/
$wp_customize->add_setting('search-placeholder', array(
    'default'           => $theme_option_defaults['search-placeholder'],
    'sanitize_callback' => 'sanitize_text_field'
));
$wp_customize->add_control('search-placeholder', array(
    'label'    => esc_html__('Search Placeholder', 'cosmoswp'),
    'section'  => $this->search_options,
    'settings' => 'search-placeholder',
    'type'     => 'text'
));

/*Search template*/
$wp_customize->add_setting('search-template-options', array(
    'default'           => $theme_option_defaults['search-template-options'],
    'sanitize_callback' => 'cosmoswp_sanitize_select',
));
$choices = cosmoswp_search_template_options();
$wp_customize->add_control('search-template-options', array(
    'choices'  => $choices,
    'label'    => esc_html__('Search Input Template', 'cosmoswp'),
    'section'  => $this->search_options,
    'settings' => 'search-template-options',
    'type'     => 'select'
));