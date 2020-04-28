<?php

class Yatri_Post_Metabox
{
    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'metaboxes'), 10, 2);
        add_action('save_post', array($this, 'save'));


    }

    function metaboxes($type, $post)
    {
        add_meta_box(
            'yatri_post_sidebar',
            esc_html__('Sidebar Position', 'yatri'),
            array($this, 'callback'),
            array('page', 'post'),
            'side',
            'default'
        );
        add_meta_box(
            'yatri_page_header_template',
            esc_html__('Page Header Template', 'yatri'),
            array($this, 'header_template_callback'),
            array('page', 'post'),
            'side',
            'default'
        );

        add_meta_box(
            'yatri_breadcrumb_options',
            esc_html__('Breadcrumb Options', 'yatri'),
            array($this, 'breadcrumb_options_cb'),
            array('page', 'post'),
            'side',
            'default'
        );
    }

    function breadcrumb_options_cb($post)
    {

        $breadcrumb_options = array(
            'default' => array(
                'id' => 'default',
                'value' => 'default',
                'label' => esc_html__('Inherit from customizer', 'yatri'),
            ),
            'enable' => array(
                'id' => 'enable',
                'value' => 'enable',
                'label' => esc_html__('Enable Breadcrumb', 'yatri'),
            ),
            'disable' => array(
                'id' => 'disable',
                'value' => 'disable',
                'label' => esc_html__('Disable Breadcrumb', 'yatri'),
            ),

        );
        $breadcrumb = get_post_meta($post->ID, 'yatri_page_breadcrumb_option', true);

        $breadcrumb = empty($breadcrumb) ? 'default' : $breadcrumb;

        wp_nonce_field('yatri_page_breadcrumb_option_nonce_' . basename(__FILE__), 'yatri_page_breadcrumb_option_nonce');

        foreach ($breadcrumb_options as $field) {
            ?>
            <div class="meta-radio-wrap">
                <input id="<?php echo esc_attr($field['id']); ?>" type="radio" name="yatri_page_breadcrumb_option"
                       value="<?php echo esc_attr($field['value']); ?>" <?php checked($field['value'], $breadcrumb); ?>/>
                <label for="<?php echo esc_attr($field['id']); ?>"><?php echo esc_html($field['label']); ?></label>
            </div>
            <?php
        }
    }

    function header_template_callback($post)
    {
        $header_tmpl = get_post_meta($post->ID, 'yatri_header_template', true);

        $header_templates = yatri_customizer_get_header_templates('header');

        $template_keys = array_keys($header_templates);

        $header_tmpl = !in_array($header_tmpl, $template_keys) ? 'none' : $header_tmpl;

        wp_nonce_field('yatri_header_template_nonce_' . basename(__FILE__), 'yatri_header_template_nonce');

        ?>
        <div class="meta-radio-wrap">
            <input id="none" type="radio" name="yatri_header_template"
                   value="none" <?php checked('none', $header_tmpl); ?>/>
            <label for="none"><?php echo esc_html__('Inherit from customizer', 'yatri'); ?></label>
        </div>
        <?php
        foreach ($header_templates as $uniq_id => $template) {

            $name = isset($template['template_name']) ? $template['template_name'] : '';
            ?>
            <div class="meta-radio-wrap">
                <input id="<?php echo esc_attr($uniq_id); ?>" type="radio" name="yatri_header_template"
                       value="<?php echo esc_attr($uniq_id); ?>" <?php checked($uniq_id, $header_tmpl); ?>/>
                <label for="<?php echo esc_attr($uniq_id); ?>"><?php echo esc_html($name); ?></label>
            </div>
            <?php
        }
    }

    function callback($post)
    {

        // Setup our options.
        $yatri_page_sidebar_option = array(
            'default' => array(
                'id' => 'default',
                'value' => 'default',
                'label' => esc_html__('Inherit from customizer', 'yatri'),
            ),
            'yatri_right_sidebar' => array(
                'id' => 'yatri_right_sidebar',
                'value' => 'yatri_right_sidebar',
                'label' => esc_html__('Right Sidebar', 'yatri'),
            ),
            'yatri_left_sidebar' => array(
                'id' => 'yatri_left_sidebar',
                'value' => 'yatri_left_sidebar',
                'label' => esc_html__('Left Sidebar', 'yatri'),
            ),
            'yatri_both_sidebar' => array(
                'id' => 'yatri_both_sidebar',
                'value' => 'yatri_both_sidebar',
                'label' => esc_html__('Both Sidebar', 'yatri'),
            ),
            'yatri_full_width' => array(
                'id' => 'yatri_full_width',
                'value' => 'yatri_full_width',
                'label' => esc_html__('No Sidebar ( Full Width )', 'yatri'),
            ),
            'yatri_full_width_100' => array(
                'id' => 'yatri_full_width_100',
                'value' => 'yatri_full_width_100',
                'label' => esc_html__('No Sidebar ( 100% Full Width )', 'yatri'),
            ),

        );

        // Check for previously set.
        $location = get_post_meta($post->ID, 'yatri_sidebar_location', true);
        // If it is then we use it otherwise set to default.
        $location = ($location) ? $location : 'default';

        // Create our nonce field.
        wp_nonce_field('yatri_nonce_' . basename(__FILE__), 'yatri_sidebar_location_nonce');
        foreach ($yatri_page_sidebar_option as $field) {
            ?>
            <div class="meta-radio-wrap">
                <input id="<?php echo esc_attr($field['id']); ?>" type="radio" name="yatri_sidebar_location"
                       value="<?php echo esc_attr($field['value']); ?>" <?php checked($field['value'], $location); ?>/>
                <label for="<?php echo esc_attr($field['id']); ?>"><?php echo esc_html($field['label']); ?></label>
            </div>
            <?php
        }
    }

    function save($post_id)
    {
        // Checks save status
        $is_autosave = wp_is_post_autosave($post_id);
        $is_revision = wp_is_post_revision($post_id);
        $is_valid_sidebar_nonce = (isset($_POST['yatri_sidebar_location_nonce']) && wp_verify_nonce(wp_unslash($_POST['yatri_sidebar_location_nonce']), 'yatri_nonce_' . basename(__FILE__))) ? 'true' : 'false';
        $is_valid_header_template_nonce = (isset($_POST['yatri_header_template_nonce']) && wp_verify_nonce(wp_unslash($_POST['yatri_header_template_nonce']), 'yatri_header_template_nonce_' . basename(__FILE__))) ? 'true' : 'false';
        $is_valid_breadcrumb_nonce = (isset($_POST['yatri_page_breadcrumb_option_nonce']) && wp_verify_nonce(wp_unslash($_POST['yatri_page_breadcrumb_option_nonce']), 'yatri_page_breadcrumb_option_nonce' . basename(__FILE__))) ? 'true' : 'false';

        // Exits script depending on save status
        if ($is_autosave || $is_revision) {
            return;
        }

        if ($is_valid_sidebar_nonce) {
            // Check for out input value.
            if (isset($_POST['yatri_sidebar_location'])) {
                // We validate making sure that the option is something we can expect.
                $value = in_array(wp_unslash($_POST['yatri_sidebar_location']),
                    array(
                        'default', 'yatri_left_sidebar', 'yatri_right_sidebar', 'yatri_both_sidebar', 'yatri_full_width', 'yatri_full_width_100')
                ) ? wp_unslash($_POST['yatri_sidebar_location']) : 'default';
                // We update our post meta.
                update_post_meta($post_id, 'yatri_sidebar_location', sanitize_text_field(wp_unslash($value)));
            }
        }
        if ($is_valid_header_template_nonce) {
            if (isset($_POST['yatri_header_template'])) {
                // We validate making sure that the option is something we can expect.
                $value = sanitize_text_field(wp_unslash($_POST['yatri_header_template']));

                // We update our post meta.
                update_post_meta($post_id, 'yatri_header_template', $value);
            }
        }
        if ($is_valid_breadcrumb_nonce) {
            if (isset($_POST['yatri_page_breadcrumb_option'])) {
                // We validate making sure that the option is something we can expect.
                $value = sanitize_text_field(wp_unslash($_POST['yatri_page_breadcrumb_option']));

                // We update our post meta.
                update_post_meta($post_id, 'yatri_page_breadcrumb_option', $value);
            }
        }
    }
}

new Yatri_Post_Metabox();