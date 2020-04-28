<div class="yatri-field-wrap" data-field-name="<?php echo esc_attr($field_name) ?>"
     data-field-type="<?php echo esc_attr($field_type) ?>" <?php echo $device_attr; ?> >
    <?php
    $text_value = isset($field_value['value']) ? $field_value['value'] : '';
    ?>
    <div class="yatri-input-text">
        <input data-field-key="value" type="text"
               class="yatri-change-by-js"
               value="<?php echo esc_attr($text_value) ?>"/>
    </div>
</div>