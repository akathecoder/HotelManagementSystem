<?php
/**
 * Template part for displaying footer copyright
 *
 * @package CosmosWP
 */
$copyright_content    = cosmoswp_get_theme_options('footer_copyright');
//social align
$copyright_align__align = cosmoswp_get_theme_options('footer-copyright-align');
$copyright_align__align = json_decode($copyright_align__align,true);

// desktop align
$copyright_align__align_desktop  = cosmoswp_responsive_button_value($copyright_align__align,'desktop');

// tablet align
$copyright_align__align_tablet  = cosmoswp_responsive_button_value($copyright_align__align,'tablet');

// mobile align
$copyright_align__align_mobile  = cosmoswp_responsive_button_value($copyright_align__align,'mobile');

$copyright_allowed_tags = array(
    '{current_year}' => date_i18n('Y'),
    '{site_title}'   => get_bloginfo('name'),
    '{theme_author}' => sprintf('<a href="https://www.cosmoswp.com/">%1$s</a>', 'CosmosWP'),
);
?>
<!-- Start of .cwp-copyright -->
<p class="cwp-footer-copyright <?php echo esc_attr(cosmoswp_string_concator($copyright_align__align_desktop,$copyright_align__align_tablet,$copyright_align__align_mobile)); ?>">
    <?php
    echo apply_filters('cosmoswp_footer_copyright', wp_kses_post(cosmoswp_str_replace_assoc($copyright_allowed_tags, $copyright_content)));
    ?>
</p>
<!-- End of .cwp-copyright -->