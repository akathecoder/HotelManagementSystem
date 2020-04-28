<form class="yatri-tools-demo-success-feedback" method="post">
    <?php
    echo wp_nonce_field('yatri_tools_demo_import_success_feedback_form') ?>
    <input type="hidden" name="admin_email" value="<?php echo esc_attr($form_data['admin_email']) ?>"/>
    <input type="hidden" name="site_url" value="<?php echo esc_attr($form_data['site_url']) ?>"/>
    <input type="hidden" name="installed_demo" value="<?php echo esc_attr($form_data['installed_demo']) ?>"/>
    <input type="hidden" name="action" value="<?php echo esc_attr($form_data['action']) ?>"/>
    <label>
        <textarea class="feedback" name="feedback" placeholder="<?php
        esc_html_e('Do  you have any suggestion? You can give us feedback from here.')
        ?>"></textarea>
    </label>
    <p><?php esc_html_e('Clicking on send button will send your feedback message, admin email, website url and installed demo name.', 'yatri-tools'); ?></p>
    <button type="submit" name="yatri_tools_demo_success_send" class="button button-secondary">
        <?php esc_html_e('Send', 'yatri-tools'); ?>
    </button>
</form>