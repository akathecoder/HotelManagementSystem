<?php
$button_css_class = cosmoswp_get_theme_options('button-one-class-name');
$button1_link = cosmoswp_get_theme_options('button-one-url');
$button_link  = ($button1_link) ? $button1_link : '#';

$button1_open_new_tab = cosmoswp_get_theme_options('button-one-open-link-new-tab');
$target_blank         = ($button1_open_new_tab) ? 'target="_blank"' : '';

$enable_icon          = cosmoswp_get_theme_options('button-one-enable-icon');
$button_text          = cosmoswp_get_theme_options('button-one-text');
$button_text          = apply_filters('cosmoswp_button_one_text', $button_text);
$button_icon          = cosmoswp_get_theme_options('button-one-icon');
$button_icon_position = cosmoswp_get_theme_options('button-one-icon-position');
$icon_spacer          = '';
if ($enable_icon) {
    if ($button_text) {

        $button_one_structure = cosmoswp_get_button_structure($button_text, $button_icon, $button_icon_position);
        $icon_spacer          = cosmoswp_get_icon_postion_class($button_icon_position);
    }
    else {
        $button_one_structure = wp_kses_post('<i class="' . esc_attr(cosmoswp_get_correct_fa_font($button_icon)) . '"></i>');
    }
}
else {
    $button_one_structure = esc_html($button_text);
}

//button align
$button_align = cosmoswp_get_theme_options('button-one-align');
$button_align = json_decode($button_align,true);

// desktop align
$button_align_desktop  = cosmoswp_responsive_button_value($button_align,'desktop');

// tablet align
$button_align_tablet  = cosmoswp_responsive_button_value($button_align,'tablet');

// mobile align
$button_align_mobile  = cosmoswp_responsive_button_value($button_align,'mobile');
if (!empty($button_text) || ($enable_icon != false)) {
    ?>
    <!-- Start of .cwp-header-button -->
    <span class="cwp-header-button cwp-button-one <?php echo esc_attr(cosmoswp_string_concator($button_align_desktop,$button_align_tablet,$button_align_mobile,$icon_spacer,$button_css_class)); ?> ">
		<a href="<?php echo esc_attr($button_link); ?>" <?php echo esc_attr($target_blank); ?>
           class="btn btn-primary"><?php echo $button_one_structure; ?></a>
	</span>
    <!-- End of .cwp-header-button -->
    <?php
}