<?php
//button align
$contact_info_align = cosmoswp_get_theme_options('contact-information-align');
$contact_info_align = json_decode($contact_info_align,true);

// desktop align
$contact_info_align_desktop  = cosmoswp_responsive_button_value($contact_info_align,'desktop');

// tablet align
$contact_info_align_tablet  = cosmoswp_responsive_button_value($contact_info_align,'tablet');

// mobile align
$contact_info_align_mobile  = cosmoswp_responsive_button_value($contact_info_align,'mobile');

$contact_information        = cosmoswp_get_theme_options('contact-information-data');
$contact_information_data   = json_decode($contact_information, true);
$contact_information_data   = apply_filters('cosmoswp_contact_information_data', $contact_information_data);
?>
<!-- Start of .cwp-contact-info -->
<div class="cwp-contact-info">
    <div class="cwp-contact-info-list <?php echo esc_attr(cosmoswp_string_concator($contact_info_align_desktop,$contact_info_align_tablet,$contact_info_align_mobile)); ?>">
        <?php
        if (is_array($contact_information_data)) {
            foreach ($contact_information_data as $data) {
                if( !$data['enabled']){
                    continue;
                }
                $contact_icon      = cosmoswp_ifset($data['icon']);
                $contact_text      = cosmoswp_ifset($data['text']);
                $contact_link_type = cosmoswp_ifset($data['link-type']);
                $contact_link      = cosmoswp_ifset($data['link']);
                $open_new_tab      = cosmoswp_ifset($data['checkbox']);
                $target_blank      = ($open_new_tab) ? 'target=_blank' : '';
                $link_href         = '';
                if ($contact_link_type == 'email') {
                    $link_href = "mailto:" . $contact_link . "";
                }
                elseif ($contact_link_type == 'tel') {
                    $link_href = "tel:" . $contact_link . "";
                }
                else {
                    $link_href = $contact_link;
                }
                $contact_title = cosmoswp_ifset($data['title']); ?>
                <div class="cwp-contact-info-item">
                    <?php if ($contact_icon) { ?>
                        <span class="cwp-contact-info-icon">
						<i class="<?php echo esc_attr(cosmoswp_get_correct_fa_font($contact_icon)); ?>"></i>
					</span>
                    <?php } ?>
                    <span class="cwp-contact-info-content">
						<?php if ($contact_title) { ?>
                            <h4 class="cwp-contact-info-title"><?php echo esc_html($contact_title); ?></h4>
                        <?php }
                        if ($contact_text) { ?>
                            <span class="cwp-contact-info-text">
								<a href="<?php echo esc_attr($link_href); ?>" <?php echo esc_attr($target_blank); ?>>
								<?php echo esc_html($contact_text); ?>
								</a>								
							</span>
                        <?php } ?>
					</span>
                </div>
                <?php
            }
        } ?>
    </div>
</div>
<!-- End of .cwp-contact-info -->