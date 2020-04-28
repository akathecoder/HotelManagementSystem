<?php
$menu_align             = cosmoswp_get_theme_options('primary-menu-align');
$submenu_display_option = cosmoswp_get_theme_options('primary-menu-submenu-display-options');
$submenu_indicator      = cosmoswp_get_correct_fa_font( cosmoswp_get_theme_options('primary-menu-submenu-icon-indicator'));

$primary_menu        = cosmoswp_get_menu_id_by_location('header-primary-menu');
$primary_menu_option = cosmoswp_get_theme_options('primary_menu');
if ($primary_menu_option == 'custom') {
    $custom_menu  = cosmoswp_get_theme_options('primary-menu-custom-menu');
    $primary_menu = (!empty ($custom_menu)) ? $custom_menu : $primary_menu;
}

$disable_sub_menu = cosmoswp_get_theme_options('primary-menu-disable-sub-menu');
$disable_sub_menu = ($disable_sub_menu) ? 1 : 0;
?>
<!-- Start of .navigation -->
<div class="cwp-primary-menu-wrapper navigation <?php echo esc_attr($menu_align . ' ' . $submenu_display_option); ?>"
     data-submenu-icon="<?php echo esc_attr($submenu_indicator); ?>">
    <?php wp_nav_menu(array(
        'menu'       => $primary_menu,
        'menu_class' => 'cwp-primary-menu',
        'depth'      => $disable_sub_menu,
        'container'  => '',
    ));
    ?>
</div>
<!-- End of .navigation -->