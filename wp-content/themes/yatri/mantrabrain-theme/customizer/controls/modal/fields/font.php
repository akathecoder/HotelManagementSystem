<div class="yatri-field-wrap" data-field-name="<?php echo esc_attr($field_name) ?>"
     data-field-type="<?php echo esc_attr($field_type) ?>" <?php echo $device_attr; ?> >

    <?php
    $select_value = isset($field_value['value']) ? $field_value['value'] : array();
    $options = isset($field['options']) ? $field['options'] : array();
    $mapping_fields = isset($field['mapping_fields']) ? $field['mapping_fields'] : array(); ?>

    <?php $all_fonts = Mantrabrain_Theme_Helper::all_fonts(); ?>
    <select class="yatri-typo-input yatri-select2 yatri-change-by-js" data-field-key="value"
            data-mapping-fields='<?php echo json_encode($mapping_fields) ?>'>
        <option data-default="yes" data-subsets="{}" data-varient="{}"
                value=""><?php echo esc_html__('Theme Default', 'yatri'); ?></option>
        <?php foreach ($all_fonts as $font_group_id => $font_list) { ?>
            <optgroup label="<?php echo esc_attr($font_list['title']); ?>">
                <?php foreach ($font_list['fonts'] as $font_key => $font_family) {
                    ?>
                    <option <?php echo $select_value == $font_key ? 'selected="selected"' : ''; ?>

                            value="<?php echo esc_attr($font_key); ?>"><?php echo esc_attr($font_key); ?></option>
                <?php } ?>
            </optgroup>
        <?php } ?>
    </select>


</div>