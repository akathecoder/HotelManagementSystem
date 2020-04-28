<div class="repeater-item yatri-input-<?php echo esc_attr($field_type); ?>"
     data-title="<?php echo absint($is_title); ?>"
     data-field-type="<?php echo esc_attr($field_type) ?>"
     data-id="<?php echo esc_attr($field_id) ?>"
>
    <label for="<?php echo esc_attr($field_id); ?>" class="control-title">
        <input id="<?php echo esc_attr($field_id); ?>" class="<?php echo esc_attr($field_id); ?> repeater-change-js" type="checkbox"
               value="1" <?php echo absint($field_value) == 1 ? 'checked="checked"' : '' ?>/> <?php echo esc_html($label); ?>
    </label>

</div>
