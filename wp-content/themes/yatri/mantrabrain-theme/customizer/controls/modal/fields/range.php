<div class="yatri-field-wrap" data-field-name="<?php echo esc_attr($field_name) ?>"
     data-field-type="<?php echo esc_attr($field_type) ?>" <?php echo $device_attr; ?> >
    <?php
    $css_units = isset($field['css_units']) ? $field['css_units'] : array();
    ?>
    <div class="yatri-input-slider-wrapper <?php echo count($css_units) < 1 ? 'no-css-unit' : ''; ?>">

        <div class="yatri--css-unit <?php echo count($css_units) < 1 ? 'no-unit' : ''; ?>">

            <?php

            $attrs = isset($field['attrs']) ? $field['attrs'] : array();

            $defaults = isset($field['default']) ? $field['default'] : array();

            $field_value = isset($field_value['value']) ? $field_value['value'] : array();

            $values = wp_parse_args($field_value, $defaults);

            $default_attrs = array(
                'min' => 0,
                'max' => 10,
                'step' => 1,
                'size' => 4
            );
            $attrs = wp_parse_args($attrs, $default_attrs);

            $unit = isset($values['unit']) ? $values['unit'] : 'px';

            $value = isset($values['value']) ? $values['value'] : '';

            foreach ($css_units as $unit_key => $unit_value) {

                $active_class = $unit_key == $unit ? 'yatri--label-active' : '';
                ?>
                <label class="<?php echo esc_attr($active_class); ?>">
                    <?php echo esc_html($unit_value) ?><input type="radio"
                                                              class="yatri--label-parent yatri-change-by-js"
                        <?php echo $unit_key == $unit ? 'checked="checked"' : ''; ?>
                                                              name="range_unit"
                                                              value="<?php echo esc_attr($unit_key); ?>">
                </label>
            <?php } ?>
            <a href="#" class="reset" title="Reset"></a>
        </div>
        <div data-min="<?php echo esc_attr($attrs['min']) ?>" data-default='<?php echo esc_attr($attrs['min']) ?>'
             data-step="<?php echo esc_attr($attrs['step']) ?>"
             data-max="<?php echo esc_attr($attrs['max']) ?>"
             class="yatri-input-slider">
        </div>
        <input
                type="number" min="<?php echo esc_attr($attrs['min']) ?>"
                step="<?php echo esc_attr($attrs['step']) ?>"
                max="<?php echo esc_attr($attrs['max']) ?>"
                class="yatri--slider-input yatri-input yatri-change-by-js"
                data-field-key="value"
                value="<?php echo esc_attr($value); ?>"
                size="<?php echo esc_attr($attrs['size']) ?>"
                maxlength="<?php echo esc_attr($attrs['size']) ?>"
        />
    </div>
</div>