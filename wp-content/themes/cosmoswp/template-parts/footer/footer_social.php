<?php
/**
 * Template part for displaying footer social
 *
 * @package CosmosWP
 */
$social_information      = cosmoswp_get_theme_options('footer_social');
$social_information_data = json_decode($social_information, true);
$social_information_data = apply_filters('cosmoswp_footer_social_icons', $social_information_data);
//social align
$social_icon_align = cosmoswp_get_theme_options('footer-social-icon-align');
$social_icon_align = json_decode($social_icon_align,true);

// desktop align
$social_icon_align_desktop  = cosmoswp_responsive_button_value($social_icon_align,'desktop');

// tablet align
$social_icon_align_tablet  = cosmoswp_responsive_button_value($social_icon_align,'tablet');

// mobile align
$social_icon_align_mobile  = cosmoswp_responsive_button_value($social_icon_align,'mobile');

?>

<!-- Start of .cwp-footer-social-links -->
<div class="cwp-footer-social-links <?php echo esc_attr(cosmoswp_string_concator($social_icon_align_desktop,$social_icon_align_tablet,$social_icon_align_mobile)); ?>">
    <ul>
        <?php
        if (is_array($social_information_data)) {
            foreach ($social_information_data as $data) {
	            if( !$data['enabled']){
		            continue;
	            }
                $social_icon  = cosmoswp_ifset($data['icon']);
                $icon_link    = cosmoswp_ifset($data['link']);
                $target_blank = cosmoswp_ifset($data['checkbox']);
                $target_blank = ($target_blank) ? 'target="_blank"' : '';
                $normal_color = cosmoswp_ifset($data['normal-color']);
                $hover_color  = cosmoswp_ifset($data['hover-color']); ?>
                <li class="<?php echo str_replace(' ', '-', $social_icon); ?>">
                    <a href="<?php echo esc_url($icon_link); ?>" <?php echo esc_attr($target_blank); ?>>
                        <?php if ($social_icon) {
                            ?>
                            <i class="<?php echo esc_attr(cosmoswp_get_correct_fa_font($social_icon)); ?>"></i>
                        <?php } ?>
                    </a>
                </li>
                <?php
            }
        } ?>
    </ul>
</div>
<!-- End of .cwp-footer-social-links -->