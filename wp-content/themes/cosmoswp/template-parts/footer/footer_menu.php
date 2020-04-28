<?php
/**
 * Template part for displaying footer menu
 *
 * @package CosmosWP
 */
$menu_title       = cosmoswp_get_theme_options('footer-menu-title');
$menu_position    = cosmoswp_get_theme_options('footer-menu-display-position');
$custom_menu      = cosmoswp_get_theme_options('footer-menu-custom-menu');

//Footer Menu align
$footer_menu_align = cosmoswp_get_theme_options('footer-menu-align');
$footer_menu_align = json_decode($footer_menu_align,true);

// desktop align
$footer_menu_align_desktop  = cosmoswp_responsive_button_value($footer_menu_align,'desktop');

// tablet align
$footer_menu_align_tablet  = cosmoswp_responsive_button_value($footer_menu_align,'tablet');

// mobile align
$footer_menu_align_mobile  = cosmoswp_responsive_button_value($footer_menu_align,'mobile');

//Footer Menu align
$footer_title_align = cosmoswp_get_theme_options('footer-menu-title-align');
$footer_title_align = json_decode($footer_title_align,true);

// desktop align
$footer_title_align_desktop  = cosmoswp_responsive_button_value($footer_title_align,'desktop');

// tablet align
$footer_title_align_tablet  = cosmoswp_responsive_button_value($footer_title_align,'tablet');

// mobile align
$footer_title_align_mobile  = cosmoswp_responsive_button_value($footer_title_align,'mobile');

if ($menu_title) { ?>
    <h3 class="cwp-footer-menu-title <?php echo esc_attr(cosmoswp_string_concator($footer_title_align_desktop,$footer_title_align_tablet,$footer_title_align_mobile)); ?>"> <?php echo esc_html($menu_title); ?></h3>
    <?php
} ?>
<!-- Start of .cwp-navigation -->
<div class="cwp-footer-navigation <?php echo esc_attr(cosmoswp_string_concator($footer_menu_align_desktop,$footer_menu_align_tablet,$footer_menu_align_mobile)); ?>">
    <?php
    wp_nav_menu(array(
        'menu'       => $custom_menu,
        'menu_class' => 'footer-menu ' . $menu_position,
        'depth'      => 1,
    ));
    ?>
</div>
<!-- End of .cwp-navigation -->
<?php
