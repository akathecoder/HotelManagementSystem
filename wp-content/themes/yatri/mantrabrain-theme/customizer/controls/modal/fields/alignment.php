<div class="yatri-field-wrap" data-field-name="<?php echo esc_attr($field_name) ?>"
     data-field-type="<?php echo esc_attr($field_type) ?>" <?php echo $device_attr; ?> >
    <?php

    if (isset($field_value['value'])) {

        $alignment_value = $field_value['value'];
    } else {

        $alignment_value = $default_value;
    }
    $options = isset($field['options']) ? $field['options'] : array();
    ?>
    <div class="yatri-input-alignment">
        <ul>
            <?php foreach ($options as $option_key => $option_value) {
                $icon = isset($option_value['icon']) ? $option_value['icon'] : '';
                ?>
                <li data-alignment="<?php echo esc_attr($option_key);?>" <?php echo $option_key == $default_value ? 'data-default="yes"' : ''; ?>
                    class="<?php echo $option_key == $alignment_value ? 'active' : ''; ?>">
                    <div class="alignment-wrap">
                        <span class="<?php echo esc_attr($icon); ?>"></span>
                    </div>
                </li>
            <?php } ?>
        </ul>
        <input data-field-key="value" type="hidden"
               class="yatri-change-by-js"
               value="<?php echo esc_attr($alignment_value) ?>"/>
    </div>
</div>