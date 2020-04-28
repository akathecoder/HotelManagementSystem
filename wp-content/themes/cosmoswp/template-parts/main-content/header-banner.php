<?php
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Template part for displaying banner.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CosmosWP
 * @subpackage CosmosWP
 */
$banner_type              = '';
$bg_image                 = '';
$breadcrumb_before_banner = cosmoswp_get_theme_options('breadcrumb-before-banner-title');
$breadcrumb_after_banner  = cosmoswp_get_theme_options('breadcrumb-after-banner-title');
$banner_title_align       = cosmoswp_get_theme_options('banner-section-title-align');
$banner_content_position  = cosmoswp_get_theme_options('banner-section-content-position');
$banner_display_option    = cosmoswp_get_theme_options('banner-section-display');
$enable_banner            = 'color' != $banner_display_option && cosmoswp_get_theme_options('enable-banner-overlay-color') ? 'cwp-enable-overlay' : '';
$banner_image_url         = apply_filters('cosmoswp_banner_image',get_header_image()  );
if ('bg-image' == $banner_display_option) {
    $bg_image = 'style=background-image:url("' . esc_url($banner_image_url) . '");';
}
?>
<div id="cwp-banner-wrap" class="cwp-banner <?php echo esc_attr(cosmoswp_string_concator($banner_title_align, $banner_content_position , $enable_banner)); ?>" <?php echo esc_attr($bg_image); ?>
     >
    <?php
    if ('video' == $banner_display_option) {
        $banner_type = 'has-video';
        the_custom_header_markup();
    }
    elseif ('normal-image' == $banner_display_option) {
        $banner_type = 'has-normal-image';
        $the_custom_header_markup = apply_filters('cosmoswp_custom_header_markup',get_custom_header_markup()  );
        echo $the_custom_header_markup;
    }
    elseif ('bg-image' == $banner_display_option) {
        $banner_type = 'has-bg-image';
    }
    elseif ('color' == $banner_display_option) {
        $banner_type = 'has-bg-color';
    }
    ?>
    <div class="<?php echo esc_attr($banner_type); ?>">
        <div class="grid-container">
            <?php
            if ($breadcrumb_before_banner) {
                do_action('cosmoswp_action_breadcrumb' ,true);
            }
            cosmoswp_heading_title();
            if ($breadcrumb_after_banner) {
                do_action('cosmoswp_action_breadcrumb', true);
            } ?>
        </div>
    </div>
</div>