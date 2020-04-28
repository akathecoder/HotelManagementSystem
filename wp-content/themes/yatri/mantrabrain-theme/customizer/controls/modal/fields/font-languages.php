<div class="yatri-field-wrap" data-field-name="<?php echo esc_attr($field_name) ?>"
     data-field-type="<?php echo esc_attr($field_type) ?>" <?php echo $device_attr; ?> >
    <?php
    $select_value = isset($field_value['value']) ? $field_value['value'] : array();
    $choices = isset($field['choices']) ? $field['choices'] : array(); ?>

    <div class="list-subsets">
        <?php
        $choice_index = 0;
        foreach ($choices as $choice_key => $choice) {

            ?>
            <p><label><input
                            <?php echo in_array($choice_key, $select_value) ? 'checked="checked"':''; ?>
                            data-field-key="value" type="checkbox" class="yatri-typo-input yatri-change-by-js"
                             name="<?php echo esc_attr($field_name) . '_' . absint($choice_index) ?>"
                             value="<?php echo esc_attr($choice_key) ?>"><?php echo esc_html($choice) ?></label></p>
        <?php
            $choice_index++;
        } ?>
    </div>

</div>