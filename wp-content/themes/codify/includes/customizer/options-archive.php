<?php 
$fields[]= array(
    'type'        => 'select',
    'settings'    => 'archive_post_content',
    'label'       => esc_html__( 'Post Content', 'codify' ),
    'section'     => 'archive_post_section',
    'default'     => 'excerpt',
    'choices'     => array(
        'excerpt'  => esc_html__( 'Excerpt', 'codify' ),
        'full-content'   => esc_html__( 'Full Content', 'codify' ),
    ),
);

$fields[] = array(
    'type'        => 'sortable',
    'settings'    => 'archive_order_layout',
    'label'       => esc_html__( 'Archive Content Order', 'codify' ),
    'description' => esc_html__( 'Drag & Drop items to re-arrange the order', 'codify' ),
    'section'     => 'archive_post_section',
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
    'type'       => 'radio-buttonset',
    'settings'   => 'title_align',
    'label'      => esc_html__( 'Title align', 'codify' ),
    'section'    => 'archive_post_section',
    'default'    => 'left',
    'choices'    => array(
        'left'          => '<i class="dashicons dashicons-editor-alignleft"></i>',
        'center'        => '<i class="dashicons dashicons-editor-aligncenter"></i>',
        'right'         => '<i class="dashicons dashicons-editor-alignright"></i>',
    ),
    'output' => array(
        array(
            'element'  => 'h2.entry-title',
            'property' => 'text-align',
        ),    
    ),    
);
$fields[] = array(
    'type'       => 'radio-buttonset',
    'settings'   => 'categories_align',
    'label'      => esc_html__( 'Post Meta align', 'codify' ),
    'section'    => 'archive_post_section',
    'default'    => 'left',
    'choices'    => array(
        'left'          => '<i class="dashicons dashicons-editor-alignleft"></i>',
        'center'        => '<i class="dashicons dashicons-editor-aligncenter"></i>',
        'right'         => '<i class="dashicons dashicons-editor-alignright"></i>',
    ),
    'output' => array(
        array(
            'element'  => '.entry-meta',
            'property' => 'text-align',
        ),    
    ),    
);
$fields[] = array(
    'type'       => 'radio-buttonset',
    'settings'   => 'content_align',
    'label'      => esc_html__( 'Content align', 'codify' ),
    'section'    => 'archive_post_section',
    'default'    => 'left',
    'choices'    => array(
        'left'          => '<i class="dashicons dashicons-editor-alignleft"></i>',
        'center'        => '<i class="dashicons dashicons-editor-aligncenter"></i>',
        'right'         => '<i class="dashicons dashicons-editor-alignright"></i>',
    ),
    'output' => array(
        array(
            'element'  => '.entry-content',
            'property' => 'text-align',
        ),    
    ),    
);
$fields[]= array(
    'type'        => 'text',
    'settings'    => 'excerpt_readmore',
    'label'       => esc_html__( 'Button Text', 'codify' ),
    'section'     => 'archive_post_section',
    'default'     => esc_html__( 'Read More', 'codify' ),
);
