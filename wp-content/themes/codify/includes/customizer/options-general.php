<?php 
$fields[]= array(
    'type'        => 'select',
    'settings'    => 'pagination',
    'label'       => esc_html__( 'Pagination', 'codify' ),
    'section'     => 'general_section',
    'default'     => 'default',
    'choices'     => array(
        'default'  => esc_html__( 'Default', 'codify' ),
        'numeric' 	=> esc_html__( 'Numeric', 'codify' ),
    ),
);
