<?php

$wp_customize->add_panel(new Mantrabrain_Theme_Customizer_Panel($wp_customize, YATRI_THEME_OPTION_PANEL, array(
    'priority' => 10,
    'title' => esc_html__('Theme Options', 'yatri'),
    'capabitity' => 'edit_theme_options',
)));