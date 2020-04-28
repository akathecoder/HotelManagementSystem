<?php
if (!defined('ABSPATH')) {
    exit;
}

/* Comment section */
$wp_customize->add_section('cosmoswp-comment-setting', array(
    'title' => esc_html__('Comment Setting', 'cosmoswp'),
    'panel' => $this->panel,
    'priority' => 30,
));

$wp_customize->add_setting('cosmoswp-comment-setting-msg', array(
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(
    new CosmosWP_Custom_Control_Message(
        $wp_customize,
        'cosmoswp-comment-setting-msg',
        array(
            'description' => sprintf(esc_html__('%1$s More setting%2$s also while editing post/page', 'cosmoswp'), "<a href='" . admin_url('options-discussion.php') . "' target='_blank'>", '</a>'),
            'section'     => 'cosmoswp-comment-setting',
        )
    )
);

/*Hide Comment*/
$wp_customize->add_setting('cosmoswp-hide-comment', array(
    'default'           => $theme_option_defaults['cosmoswp-hide-comment'],
    'sanitize_callback' => 'cosmoswp_sanitize_checkbox'
));
$wp_customize->add_control('cosmoswp-hide-comment', array(
    'label'    => esc_html__('Hide Comment', 'cosmoswp'),
    'section'  => 'cosmoswp-comment-setting',
    'settings' => 'cosmoswp-hide-comment',
    'type'     => 'checkbox'
));

/*Comment Title*/
$wp_customize->add_setting('cosmoswp-comment-title', array(
    'default'           => $theme_option_defaults['cosmoswp-comment-title'],
    'sanitize_callback' => 'sanitize_text_field'
));
$wp_customize->add_control('cosmoswp-comment-title', array(
    'label'    => esc_html__('Comment Title', 'cosmoswp'),
    'section'  => 'cosmoswp-comment-setting',
    'settings' => 'cosmoswp-comment-title',
    'type'     => 'text'
));

/*Comment Button Text*/
$wp_customize->add_setting('cosmoswp-comment-button-text', array(
    'default'           => $theme_option_defaults['cosmoswp-comment-button-text'],
    'sanitize_callback' => 'sanitize_text_field'
));
$wp_customize->add_control('cosmoswp-comment-button-text', array(
    'label'    => esc_html__('Comment Button Text', 'cosmoswp'),
    'section'  => 'cosmoswp-comment-setting',
    'settings' => 'cosmoswp-comment-button-text',
    'type'     => 'text'
));

/*Comment Notes After*/
$wp_customize->add_setting('cosmoswp-comment-notes-after', array(
    'default'           => $theme_option_defaults['cosmoswp-comment-notes-after'],
    'sanitize_callback' => 'sanitize_text_field'
));
$wp_customize->add_control('cosmoswp-comment-notes-after', array(
    'label'    => esc_html__('Comment Note After', 'cosmoswp'),
    'section'  => 'cosmoswp-comment-setting',
    'settings' => 'cosmoswp-comment-notes-after',
    'type'     => 'text'
));