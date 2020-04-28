<div class="repeater-item yatri-input-<?php echo esc_attr($field_type); ?>"
     data-title="<?php echo absint($is_title); ?>"
     data-id="<?php echo esc_attr($field_id) ?>"
     data-field-type="<?php echo esc_attr($field_type) ?>"
>
    <label for="<?php echo esc_attr($field_id); ?>" class="control-title">
        <?php echo esc_html($label); ?>
    </label>

    <div class="yatri-icon-picker-control-field">
        <span class="icon-show <?php echo esc_attr($field_value) ?>"></span>
        <input class="<?php echo esc_attr($field_id); ?> repeater-change-js customize-control-icon-picker-value" type="text"
               value="<?php echo esc_attr($field_value) ?>" placeholder="Click here to pick an icon"
               readonly
        />
        <span class="icon-clear dashicons dashicons-trash"></span>

        <div id="yatri-customizer-icon-picker">
            <div class="picker-header">
                <a class="customize-controls-icon-close" href="#">
                    <span class="screen-reader-text"><?php echo esc_html__('Cancel', 'yatri'); ?></span>
                </a>
                <div class="icon-type-selector">
                    <select id="yatri-icon-type">
                        <option value="all"><?php echo esc_html__('All Icon Types', 'yatri'); ?></option>
                    </select>
                </div>
            </div>
            <div class="yatri-icon-search">
                <input type="text" id="yatri-icon-search-input"
                       placeholder="<?php echo esc_html__('Type icon name here', 'yatri'); ?>">
            </div>
            <div id="yatri-icon-browser">

            </div>
        </div>
    </div>
</div>
