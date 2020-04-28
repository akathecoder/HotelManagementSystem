<?php
if (!defined('ABSPATH')) {
    exit;
}
if (!function_exists('cosmoswp_user_contact_methods')) :

    /**
     * Register User Contact Methods
     * @param $user_contact_method
     * @return mixed
     */
    function cosmoswp_user_contact_methods($user_contact_method) {

        $user_contact_method['facebook']    = __('Enter Facebook Url', 'cosmoswp');
        $user_contact_method['twitter']     = __('Enter Twitter Url', 'cosmoswp');
        $user_contact_method['linkedin']    = __('Enter Linkedin Url', 'cosmoswp');
        $user_contact_method['youtube']     = __('Enter Youtube Url', 'cosmoswp');
        $user_contact_method['google_plus'] = __('Enter Google Plus Url', 'cosmoswp');
        $user_contact_method['instagram']   = __('Enter Instagram Url', 'cosmoswp');
        $user_contact_method['pinterest']   = __('Enter Pinterest Url', 'cosmoswp');
        $user_contact_method['flickr']      = __('Enter Flickr Url', 'cosmoswp');
        $user_contact_method['tumblr']      = __('Enter Tumblr Url', 'cosmoswp');
        $user_contact_method['vk']          = __('Enter VK Url', 'cosmoswp');
        $user_contact_method['wordpress']   = __('Enter WordPress Url', 'cosmoswp');

        return $user_contact_method;

    }

    add_filter('user_contactmethods', 'cosmoswp_user_contact_methods');

endif;

if (!function_exists('cosmoswp_show_author_links')) :
    /*user contact social show */
    function cosmoswp_show_author_links() {
        $user_url    = get_the_author_meta('user_url');
        $facebook    = get_the_author_meta('facebook');
        $twitter     = get_the_author_meta('twitter');
        $linkedin    = get_the_author_meta('linkedin');
        $youtube     = get_the_author_meta('youtube');
        $google_plus = get_the_author_meta('google_plus');
        $instagram   = get_the_author_meta('instagram');
        $pinterest   = get_the_author_meta('pinterest');
        $flickr      = get_the_author_meta('flickr');
        $tumblr      = get_the_author_meta('tumblr');
        $vk          = get_the_author_meta('vk');
        $wordpress   = get_the_author_meta('wordpress');
        ?>
        <ul class="socials">
            <?php
            if (!empty($user_url)) { ?>
                <li class="facebook">
                    <a href="<?php echo esc_url($user_url); ?>" data-title="Website" target="_blank">
                        <i class="<?php echo esc_attr(cosmoswp_get_correct_fa_font('fas fa-external-link'));?>"></i>
                    </a>
                </li>
            <?php }
            if (!empty($facebook)) { ?>
                <li class="facebook">
                    <a href="<?php echo esc_url($facebook); ?>" data-title="Facebook" target="_blank">
                        <i class="<?php echo esc_attr(cosmoswp_get_correct_fa_font('fab fa-facebook-f'));?>"></i>
                    </a>
                </li>
            <?php }
            if (!empty($twitter)) { ?>
                <li class="twitter">
                    <a href="<?php echo esc_url($twitter); ?>" data-title="Twitter" target="_blank">
                        <i class="<?php echo esc_attr(cosmoswp_get_correct_fa_font('fab fa-twitter'));?>"></i>
                    </a>
                </li>
            <?php }
            if (!empty($linkedin)) {
                ?>
                <li class="linkedin">
                    <a href="<?php echo esc_url($linkedin); ?>" data-title="Linkedin" target="_blank">
                        <i class="<?php echo esc_attr(cosmoswp_get_correct_fa_font('fab fa-linkedin-in'));?>"></i>
                    </a>
                </li>
                <?php
            }
            if (!empty($instagram)) {
                ?>
                <li class="instagram">
                    <a href="<?php echo esc_url($instagram); ?>" data-title="Instagram" target="_blank">
                        <i class="<?php echo esc_attr(cosmoswp_get_correct_fa_font('fab fa-instagram'));?>"></i>
                    </a>
                </li>
                <?php
            }
            if (!empty($youtube)) { ?>
                <li class="youtube">
                    <a href="<?php echo esc_url($youtube); ?>" data-title="Youtube" target="_blank">
                        <i class="<?php echo esc_attr(cosmoswp_get_correct_fa_font('fab fa-youtube'));?>"></i>
                    </a>
                </li>
                <?php
            }
            if (!empty($google_plus)) {
                ?>
                <li class="google-plus">
                    <a href="<?php echo esc_url($google_plus); ?>" data-title="Google Plus" target="_blank">
                        <i class="<?php echo esc_attr(cosmoswp_get_correct_fa_font('fab fa-google-plus-g'));?>"></i>
                    </a>
                </li>
                <?php
            }
            if (!empty($pinterest)) {
                ?>
                <li class="pinterest">
                    <a href="<?php echo esc_url($pinterest); ?>" data-title="Pinterest" target="_blank">
                        <i class="<?php echo esc_attr(cosmoswp_get_correct_fa_font('fab fa-pinterest'));?>"></i>
                    </a>
                </li>
                <?php
            }
            if (!empty($flickr)) {
                ?>
                <li class="flickr">
                    <a href="<?php echo esc_url($flickr); ?>" data-title="Flickr" target="_blank">
                        <i class="<?php echo esc_attr(cosmoswp_get_correct_fa_font('fab fa-flickr'));?>"></i>
                    </a>
                </li>
                <?php
            }
            if (!empty($tumblr)) {
                ?>
                <li class="tumblr">
                    <a href="<?php echo esc_url($tumblr); ?>" data-title="Tumblr" target="_blank">
                        <i class="<?php echo esc_attr(cosmoswp_get_correct_fa_font('fas fa-tumblr'));?>"></i>
                    </a>
                </li>
                <?php
            }
            if (!empty($vk)) {
                ?>
                <li class="vk">
                    <a href="<?php echo esc_url($vk); ?>" data-title="VK" target="_blank">
                        <i class="<?php echo esc_attr(cosmoswp_get_correct_fa_font('fab fa-vk'));?>"></i>
                    </a>
                </li>
                <?php
            }
            if (!empty($wordpress)) {
                ?>
                <li class="vk">
                    <a href="<?php echo esc_url($wordpress); ?>" data-title="WordPress" target="_blank">
                        <i class="<?php echo esc_attr(cosmoswp_get_correct_fa_font('fab fa-wordpress'));?>"></i>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
        <?php
    }

    add_action('cosmoswp_author_links', 'cosmoswp_show_author_links', 10);
endif;
