<div class="yatri-field-wrap" data-field-name="<?php echo esc_attr($field_name) ?>"
     data-field-type="<?php echo esc_attr($field_type) ?>" <?php echo $device_attr; ?> >
    <?php
    $attrs = isset($field['attrs']) ? $field['attrs'] : array();
    $default = isset($field['default']) ? $field['default'] : array();

    $default_args = array(
        'color' => '',
    );
    $default_attributes = wp_parse_args($default, $default_args);

    $default_attrs = array(
        'alpha' => false
    );
    $attributes = wp_parse_args($attrs, $default_attrs);

    $color_value = isset($field_value['value']) ? $field_value['value'] : '';

    $background = !empty($color_value) ? 'background:' . esc_attr($color_value) . ';' : '';

    ?>
    <div class="yatri-input-color">
        <input data-alpha="<?php echo esc_attr($default_attrs['alpha']) ?>" data-field-key="value"
               data-default="<?php echo esc_attr($default_attributes['color']) ?>" type="text"
               class="yatri-color-picker yatri-change-by-js hidden"
               value="<?php echo esc_attr($color_value) ?>"/>
        <div class="wp-picker-container yatri-picker-container">
            <button type="button" class="button wp-color-result yatri-picker-result"
                    style="z-index:9999;background-color: rgb(186, 186, 186); background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAIAAAHnlligAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAHJJREFUeNpi+P///4EDBxiAGMgCCCAGFB5AADGCRBgYDh48CCRZIJS9vT2QBAggFBkmBiSAogxFBiCAoHogAKIKAlBUYTELAiAmEtABEECk20G6BOmuIl0CIMBQ/IEMkO0myiSSraaaBhZcbkUOs0HuBwDplz5uFJ3Z4gAAAABJRU5ErkJggg==&quot;); position: relative;">
                <span class="wp-color-result-text"><?php esc_html_e('Select Color','yatri');?></span>

                <span class="color-alpha"
                      style="<?php echo $background; ?>width: 30px; height: 28px; position: absolute; top: 0px; left: 0px; border-top-left-radius: 2px; border-bottom-left-radius: 2px;"></span>
            </button>
        </div>
    </div>
</div>