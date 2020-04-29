<?php 

$fields[] = array(
    'type'        => 'sortable',
    'settings'    => 'single_order_layout',
    'label'       => esc_html__( 'Single Post Content Order', 'codify' ),
    'description' => esc_html__( 'Drag & Drop items to re-arrange the order', 'codify' ),
    'section'     => 'single_post_section',
    'default'     => array(
        'title',
        'thumbnail',
        'categories',
        'content',
        'meta',
    ),
    'choices'     => array(
        'title'      => esc_html__( 'Title', 'codify' ),
        'thumbnail'  => esc_html__( 'Thumbnail', 'codify' ),
        'categories' => esc_html__( 'Categories', 'codify' ),
        'content'    => esc_html__( 'Content', 'codify' ),
        'meta'       => esc_html__( 'Meta Tags', 'codify' ),
    ),   
);
$fields[] = array(
    'type'        => 'toggle',
    'settings'    => 'show_author_box',
    'label'       => esc_html__( 'Show Author Box', 'codify' ),
    'section'     => 'single_post_section',
    'default'     => false,
);
$fields[] = array(
    'type'        => 'toggle',
    'settings'    => 'show_related_post',
    'label'       => esc_html__( 'Show Releated Post', 'codify' ),
    'section'     => 'single_post_section',
    'default'     => false,
);
$fields[] = array(
    'type'        => 'text',
    'settings'    => 'related_title',
    'label'       => esc_html__( 'Enter Related Title', 'codify' ),
    'section'     => 'single_post_section',
    'default'     => esc_html__( 'Related Post', 'codify'),
    'active_callback'      => array(
        array(
            'setting'   => 'show_related_post',
            'operator'  => '==',
            'value'     => true
        )
    ),
);
$fields[] = array(
    'type'        => 'number',
    'settings'    => 'related_number',
    'label'       => esc_html__( 'Number of Related Post', 'codify' ),
    'section'     => 'single_post_section',
    'default'     =>  4,
    'choices'     => array(
        'min'  => 2,
        'max'  => 10,
        'step' => 2,
    ),
    'active_callback'      => array(
        array(
            'setting'   => 'show_related_post',
            'operator'  => '==',
            'value'     => true
        )
    ),
);
