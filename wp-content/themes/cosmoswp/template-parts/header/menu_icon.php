<?php 
$menu_icon_align = cosmoswp_get_theme_options('menu-open-icon-align');
$icon_type       = cosmoswp_get_theme_options('menu-icon-open-icon-options');
$icon_structure  = $icon_spacer = '';
if ($icon_type == 'text'){
	$open_text      = cosmoswp_get_theme_options('menu-open-text');
	$icon_structure = cosmoswp_get_icon_structure($icon_type,$open_text,0,0);
}
elseif ($icon_type == 'icon'){
    $open_icon      = cosmoswp_get_theme_options('menu-open-icon');
	$icon_structure = cosmoswp_get_icon_structure($icon_type,0,$open_icon,0);
}
elseif ($icon_type == 'both'){
	$open_text      = cosmoswp_get_theme_options('menu-open-text');
    $open_icon      = cosmoswp_get_theme_options('menu-open-icon');
    $icon_position  = cosmoswp_get_theme_options('menu-icon-open-icon-position');
	$icon_structure = cosmoswp_get_icon_structure($icon_type,$open_text,$open_icon,$icon_position);
    $icon_spacer    = cosmoswp_get_icon_postion_class($icon_position);
}
?>
<!-- Start of .menu-push-btn -->
<span class="cwp-menu-icon-btn cwp-toggle-btn <?php echo esc_attr( cosmoswp_string_concator($icon_spacer,$menu_icon_align) ); ?>">
	<a class="cwp-toggle-btn-text" href="#" id="cwp-menu-icon-btn-text"><?php echo $icon_structure; ?></a>
</span>
<!-- Start of .menu-push-btn -->