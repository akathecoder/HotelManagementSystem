<?php
$menu_align             = cosmoswp_get_theme_options('secondary-menu-align');
$submenu_display_option = cosmoswp_get_theme_options('secondary-menu-submenu-display-options');
$secondary_menu         = cosmoswp_get_theme_options('secondary-menu-custom-menu');
$disable_sub_menu       = cosmoswp_get_theme_options('secondary-menu-disable-sub-menu');
$disable_sub_menu       = ($disable_sub_menu) ? 1 : 0;
$sub_menu_icon          = cosmoswp_get_correct_fa_font( cosmoswp_get_theme_options('secondary-menu-submenu-icon-indicator'));
if ($secondary_menu) {
    ?>
    <!-- Start of .navigation -->
    <div class="cwp-secondary-menu-wrapper navigation <?php echo esc_attr($menu_align . ' ' . $submenu_display_option); ?>"
         data-submenu-icon="<?php echo esc_attr($sub_menu_icon); ?>">
        <?php wp_nav_menu(array(
            'menu'       => $secondary_menu,
            'menu_class' => 'cwp-secondary-menu',
            'depth'      => $disable_sub_menu,
            'container'  => '',
        )); ?>
    </div>
    <!-- End of .navigation -->
    <?php
}