<div class="yatri-field-wrap" data-field-name="<?php echo esc_attr($field_name) ?>"
     data-field-type="<?php echo esc_attr($field_type) ?>" <?php echo $device_attr; ?> >

    <?php

    $select_value = isset($field_value['value']) ? $field_value['value'] : array();
    $options = isset($field['options']) ? $field['options'] : array(); ?>
    <select class="yatri-modal-input yatri-change-by-js" data-field-key="value">
        <?php foreach ($options as $option_key => $option_value) {

            $extra_value_attribute_array = isset($extra_value_attributes[$option_key]) ? $extra_value_attributes[$option_key] : array();
            $extra_value_attribute_text = '';

            foreach ($extra_value_attribute_array as $attribute_key => $att_val) {

                $extra_value_attribute_text .= sanitize_text_field($attribute_key) . '="' . esc_attr($att_val) . '"';

            }
            ?>
            <option <?php echo $select_value == $option_key ? 'selected="selected"' : '';
            echo $extra_value_attribute_text; ?>
                    value="<?php echo esc_attr($option_key); ?>"><?php echo esc_html($option_value); ?></option>
            <?php
        }
        ?>

    </select>


</div>