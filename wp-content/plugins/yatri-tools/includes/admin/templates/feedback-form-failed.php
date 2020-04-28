<form class="yatri-tools-demo-failed-feedback-form" method="post">
    <h2><?php
        esc_html_e('Problem during demo import?', 'yatri')
        ?>
    </h2>
    <?php
    echo wp_nonce_field('yatri_tools_demo_import_failed_feedback_form') ?>
    <input type="hidden" name="admin_email" value="<?php echo esc_attr($form_data['admin_email']) ?>"/>
    <input type="hidden" name="site_url" value="<?php echo esc_attr($form_data['site_url']) ?>"/>
    <input type="hidden" name="selected_demo" value="<?php echo esc_attr($form_data['selected_demo']) ?>"/>
    <input type="hidden" name="action" value="<?php echo esc_attr($form_data['action']) ?>"/>
    <input type="hidden" name="error_message" class="error_message" value=""/>
    <label>
        <textarea class="feedback" name="feedback" placeholder="<?php
        esc_html_e('Leave us your message. We will help you to import demo data.')
        ?>"></textarea>
    </label>
    <p><?php esc_html_e('Clicking on send button will send your message, admin email, website url, selected demo name, php and wordpress version', 'yatri-tools'); ?></p>
    <button type="submit" name="yatri_tools_demo_failed_send" class="button button-secondary">
        <?php esc_html_e('Send message', 'yatri-tools'); ?>
    </button>
</form>