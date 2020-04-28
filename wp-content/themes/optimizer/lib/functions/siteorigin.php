<?php

function optimizer_add_widget_tabs($tabs) {
    $tabs[] = array(
        'title' => __('Optimizer Widgets', 'optimizer'),
        'filter' => array(
            'groups' => array('optimizer')
        )
    );

    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'optimizer_add_widget_tabs', 20);


function optimizer_add_widget_icons($widgets){
	$widgets['optimizer_front_text']['groups'] = array('optimizer');
    $widgets['optimizer_front_about']['groups'] = array('optimizer');
	$widgets['optimizer_front_blocks']['groups'] = array('optimizer');
	$widgets['optimizer_front_posts']['groups'] = array('optimizer');


	//Declare Icons
	$widgets['optimizer_front_text']['icon'] = 'fa fa-align-left';
    $widgets['optimizer_front_about']['icon'] = 'fa fa-heart';
	$widgets['optimizer_front_blocks']['icon'] = 'fa fa-th-large';
	$widgets['optimizer_front_posts']['icon'] = 'fa fa-file-text';

    return $widgets;
}
add_filter('siteorigin_panels_widgets', 'optimizer_add_widget_icons');


function optimizer_so_scripts() {
   wp_add_inline_script( 'jquery-migrate', 'jQuery(document).ready(function(){   jQuery(".so-panel.widget").each(function (){   jQuery(this).attr("id", jQuery(this).find(".so_widget_id").attr("data-panel-id"))  });  });' );
}
add_action( 'wp_enqueue_scripts', 'optimizer_so_scripts' );