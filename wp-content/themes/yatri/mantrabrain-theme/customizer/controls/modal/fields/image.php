<div class="yatri-field-wrap" data-field-name="<?php echo esc_attr($field_name) ?>"
     data-field-type="<?php echo esc_attr($field_type) ?>" <?php echo $device_attr; ?> >
    <?php

    $image_value = isset($field_value['value']) ? $field_value['value'] : array();
    ?>
    <div class="yatri-media-type-image">
        <div class="yatri--media">
            <input type="hidden" class="attachment-id  yatri-change-by-js"
                   value="<?php echo isset($image_value['attachment_id']) ? absint($image_value['attachment_id']) : '' ?>"
                   data-field-key="value">
            <input type="hidden" class="yatri-change-by-js attachment-url"
                   value="<?php echo isset($image_value['attachment_url']) ? esc_url($image_value['attachment_url']) : '' ?>"/>
            <input type="hidden" class="yatri-change-by-js attachment-mime"
                   value="<?php echo isset($image_value['attachment_mime']) ? esc_attr($image_value['attachment_mime']) : '' ?>"/>
            <div class="yatri-image-preview <?php echo !empty($image_value['attachment_url']) ? 'yatri--has-file' : ''; ?>"
                 data-no-file-text="No file selected">
                <?php if (!empty($image_value['attachment_url'])) { ?>
                    <img src="<?php echo esc_url($image_value['attachment_url']); ?>" alt="">
                <?php } ?>
            </div>
            <button type="button"
                    class="button yatri--add <?php echo !empty($image_value['attachment_url']) ? 'yatri--hide' : ''; ?>">
                <?php esc_html_e('Add Image', 'yatri'); ?>
            </button>
            <button type="button"
                    class="button yatri--change <?php echo !empty($image_value['attachment_url']) ? '' : 'yatri--hide'; ?>">
                <?php esc_html_e('Change', 'yatri'); ?>
            </button>
            <button type="button"
                    class="button yatri--remove <?php echo !empty($image_value['attachment_url']) ? '' : 'yatri--hide'; ?>">
                <?php esc_html_e('Remove', 'yatri'); ?>
            </button>
        </div>
        <div class="yatri-image-properties <?php echo !empty($image_value['attachment_id']) && absint($image_value['attachment_id']) > 0 ? '' : 'yatri-hide'; ?>">
            <div class="yatri-half">
                <div class="yatri-field-item">
                    <div class="yatri-field-heading">
                        <label class="customize-control-title"><?php esc_html_e('Size', 'yatri'); ?></label>
                    </div>
                    <?php $css_image_size = Mantrabrain_Theme_Helper::css_image_sizes(); ?>
                    <select class="yatri-change-by-js image_size">

                        <?php foreach ($css_image_size as $size_key => $size_val) { ?>
                            <option <?php echo isset($image_value['image_size']) && $image_value['image_size'] == $size_key ? 'selected="selected"' : ''; ?>
                                    value="<?php echo esc_attr($size_key) ?>"><?php echo esc_html($size_val); ?></option>
                        <?php } ?>

                    </select>
                </div>
            </div>
            <div class="yatri-half">
                <div class="yatri-field-item">
                    <div class="yatri-field-heading">
                        <label class="customize-control-title"><?php esc_html_e('Position', 'yatri'); ?></label>
                    </div>
                    <?php $css_image_positions = Mantrabrain_Theme_Helper::css_image_positions(); ?>
                    <select class="yatri-change-by-js image_position">

                        <?php foreach ($css_image_positions as $position_key => $position_val) { ?>
                            <option <?php echo isset($image_value['image_position']) && $image_value['image_position'] == $position_key ? 'selected="selected"' : ''; ?>
                                    value="<?php echo esc_attr($position_key) ?>"><?php echo esc_html($position_val); ?></option>
                        <?php } ?>

                    </select>
                </div>
            </div>
            <div class="yatri-half">
                <div class="yatri-field-item">
                    <div class="yatri-field-heading">
                        <label class="customize-control-title"><?php esc_html_e('Repeat', 'yatri'); ?></label>
                    </div>
                    <?php $css_image_repeat = Mantrabrain_Theme_Helper::css_image_repeats(); ?>
                    <select class="yatri-change-by-js image_repeat">

                        <?php foreach ($css_image_repeat as $repeat_key => $repeat_val) { ?>
                            <option <?php echo isset($image_value['image_repeat']) && $image_value['image_repeat'] == $repeat_key ? 'selected="selected"' : ''; ?>
                                    value="<?php echo esc_attr($repeat_key) ?>"><?php echo esc_html($repeat_val); ?></option>
                        <?php } ?>

                    </select>
                </div>
            </div>
            <div class="yatri-half">
                <div class="yatri-field-item">
                    <div class="yatri-field-heading">
                        <label class="customize-control-title"><?php esc_html_e('Attachment', 'yatri'); ?></label>
                    </div>
                    <?php $css_image_parallax_styles = Mantrabrain_Theme_Helper::css_image_parallax_styles(); ?>

                    <select class="yatri-change-by-js parallax_image">

                        <?php foreach ($css_image_parallax_styles as $prlx_key => $prlx_val) { ?>
                            <option <?php echo isset($image_value['parallax_image']) && $image_value['parallax_image'] == $prlx_key ? 'selected="selected"' : ''; ?>
                                    value="<?php echo esc_attr($prlx_key) ?>"><?php echo esc_html($prlx_val); ?></option>
                        <?php } ?>

                    </select>
                </div>
            </div>

        </div>
    </div>
</div>