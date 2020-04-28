<?php
/**
 * Template part for displaying footer sidebar 8
 *
 * @package CosmosWP
 */
$widget_setting            = cosmoswp_get_theme_options('footer-sidebar-8-widget-setting-option');
$footer_sidebar_align      = ($widget_setting != 'inherit' ) ? cosmoswp_get_theme_options('footer-sidebar-8-content-align') : '';
?>
<div class="cwp-footer-sidebar cwp-footer-sidebar-8 <?php echo esc_attr($footer_sidebar_align); ?>">
    <?php      
        if( is_active_sidebar( 'footer-sidebar-8') ){
            dynamic_sidebar( 'footer-sidebar-8');
        }
    ?>
</div>