<?php
/**
 * Yatri_Template_Hooks setup
 *
 * @package Yatri_Template_Hooks
 * @since   1.0.0
 */

/**
 * Main Yatri_Template_Hooks Class.
 *
 * @class Yatri_Template_Hooks
 */
class Yatri_Template_Hooks
{

    public function __construct()
    {

        add_filter('comment_form_defaults', array($this, 'comment_form_defaults'), 99);

        add_action('wp_head', array($this, 'pingback_header'));

        add_filter('body_class', array($this, 'body_class'));

        add_action('yatri_404_content_template', array($this, 'template_404'));

        add_action('navigation_markup_template', array($this, 'navigation_markup_template'));


    }

    public function navigation_markup_template($template)
    {
        $new_template = "<div class='yatri-pagination yatri-content-item'>" . $template . '</div>';

        return $new_template;

    }

    public function template_404()
    {
        get_template_part('template-parts/page/content', 'none');

    }

    public function body_class($class)
    {
        if (is_customize_preview()) {
            $class[] = 'yatri-customizer-preview';
        }

        if (is_404() || !have_posts()) {
            $class[] = 'content-none-page';
        }

        $class[] = "yatri-global-layout-" . esc_attr(yatri_get_option('main_layout'));

        $page_layout = yatri_page_layout();

        if (yatri_is_archive_page()) {

            $class[] = 'yatri-blog-archive-page';

        } else if (is_singular() && !is_page()) {

            $class[] = 'yatri-single-post';

        } else if (is_page()) {

            $class[] = 'yatri-single-page';
        }

        $class[] = $page_layout . '_layout';

        return $class;
    }

    public function pingback_header()
    {
        if (is_singular() && pings_open()) {
            printf('<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo('pingback_url')));
        }
    }

    public function comment_form_defaults($defaults)
    {

        $user = wp_get_current_user();
        $user_identity = $user->exists() ? $user->display_name : '';

        $defaults['logged_in_as'] = '<p class="logged-in-as">' . sprintf(
            /* translators: 1: edit user link, 2: accessibility text, 3: user name, 4: logout URL */
                __('<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a> <a href="%4$s">Log out?</a>', 'yatri'),
                get_edit_user_link(),
                /* translators: %s: user name */
                esc_attr(sprintf(__('Logged in as %s. Edit your profile.', 'yatri'), $user_identity)),
                $user_identity,
                wp_logout_url(apply_filters('the_permalink', get_permalink(get_the_ID())))
            ) . '</p>';
        return $defaults;
    }


}

new Yatri_Template_Hooks();