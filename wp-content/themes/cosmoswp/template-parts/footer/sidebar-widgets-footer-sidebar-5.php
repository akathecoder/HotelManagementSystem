<?php
/**
 * Template part for displaying footer sidebar 5
 *
 * @package CosmosWP
 */
$widget_setting            = cosmoswp_get_theme_options('footer-sidebar-5-widget-setting-option');
$footer_sidebar_align      = ($widget_setting != 'inherit' ) ? cosmoswp_get_theme_options('footer-sidebar-5-content-align') : '';
?>
<div class="cwp-footer-sidebar cwp-footer-sidebar-5 <?php echo esc_attr($footer_sidebar_align); ?>">
    <?php      
        if( is_active_sidebar( 'footer-sidebar-5') ){
            dynamic_sidebar( 'footer-sidebar-5');
        }
    ?>
</div>