<?php
/**
 * The primary sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cosmoswp
 */

$global_widget_title_align   = cosmoswp_get_theme_options('global-widget-title-align');
$global_widget_content_align = cosmoswp_get_theme_options('global-widget-content-align');
do_action('cosmoswp_action_before_sidebar');
?>
    <div class="cwp-sidebar" data-widget-title="<?php echo esc_attr($global_widget_title_align); ?>"
         data-widget-content="<?php echo esc_attr($global_widget_content_align); ?>">
        <?php
        if (is_active_sidebar('cwp-primary-sidebar')) {
            dynamic_sidebar('cwp-primary-sidebar');
        }
        ?>
    </div>
<?php
do_action('cosmoswp_action_after_sidebar');