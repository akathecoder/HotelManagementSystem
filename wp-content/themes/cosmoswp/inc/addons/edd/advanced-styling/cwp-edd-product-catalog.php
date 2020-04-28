<?php

if (!defined('ABSPATH')) {
    exit;
}

/*Edd Downloads Catalog*/
$wp_customize->add_section('edd-downloads-catalog-collection', array(
    'title'    => esc_html__('Downloads Catalog', 'cosmoswp'),
    'panel'    => 'edd-setting-panel',
    'priority' => 100,
));

/*Downloads Per Row*/
$wp_customize->add_setting('edd-show-downloads-per-row', array(
    'default'           => $styling_defaults['edd-show-downloads-per-row'],
    'sanitize_callback' => 'cosmoswp_sanitize_number',
));
$wp_customize->add_control('edd-show-downloads-per-row', array(
    'label'       => esc_html__('Downloads Per Row', 'cosmoswp'),
    'section'     => 'edd-downloads-catalog-collection',
    'settings'    => 'edd-show-downloads-per-row',
    'type'        => 'number',
    'input_attrs' => array('min' => 1, 'max' => 12, 'step' => 1)
));