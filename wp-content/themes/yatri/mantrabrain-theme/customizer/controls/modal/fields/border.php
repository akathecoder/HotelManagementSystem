<div class="yatri-field-wrap" data-field-name="<?php echo esc_attr($field_name) ?>"
     data-field-type="<?php echo esc_attr($field_type) ?>" <?php echo $device_attr; ?> >
    <div class="yatri--field yatri--field-select clear yatri--field-name-border_style">
        <?php
        $border_value = isset($field_value['value']) ? $field_value['value'] : array();
        ?>
        <div class="yatri-field-header">

            <div class="yatri-field-heading">
                <label class="customize-control-title"><?php echo esc_html__('Border Style', 'yatri'); ?></label>
            </div>


        </div>
        <?php $css_border_styles = Mantrabrain_Theme_Helper::css_border_styles(); ?>
        <select class="yatri-change-by-js border_style" data-field-key="value">

            <?php foreach ($css_border_styles as $border_key => $border_val) { ?>
                <option <?php echo isset($border_value['style']) && $border_value['style'] == $border_key ? 'selected="selected"' : ''; ?>
                        value="<?php echo esc_attr($border_key) ?>" <?php echo $border_key == '' ? 'data-default="yes"' : '' ?>><?php echo esc_html($border_val); ?></option>
            <?php } ?>

        </select>

    </div>

    <div class="yatri-input-border-width">
        <div class="yatri-field-header">

            <div class="yatri-field-heading">
                <label class="customize-control-title"><?php echo esc_html__('Border Width', 'yatri'); ?></label>
            </div>


        </div>
        <div class="yatri--css-ruler yatri--field-inputs">
				<span>
					<input type="number" class="yatri-input-css yatri-change-by-js border_top"
                           value="<?php echo isset($border_value['border_top']) ? absint($border_value['border_top']) : '' ?>"/>
					<span class="yatri--small-label"><?php echo esc_html__('Top', 'yatri'); ?></span>
				</span>
            <span>
					<input type="number" class="yatri-input-css yatri-change-by-js border_right"
                           value="<?php echo isset($border_value['border_right']) ? absint($border_value['border_right']) : '' ?>"/>
					<span class="yatri--small-label"><?php echo esc_html__('Right', 'yatri'); ?></span>
				</span>
            <span>
					<input type="number" class="yatri-input-css yatri-change-by-js border_bottom"
                           value="<?php echo isset($border_value['border_bottom']) ? absint($border_value['border_bottom']) : '' ?>"/>
					<span class="yatri--small-label"><?php echo esc_html__('Bottom', 'yatri'); ?></span>
				</span>
            <span>
					<input type="number" class="yatri-input-css yatri-change-by-js border_left"
                           value="<?php echo isset($border_value['border_left']) ? absint($border_value['border_left']) : '' ?>"
                    />
					<span class="yatri--small-label"><?php echo esc_html__('Left', 'yatri'); ?></span>
				</span>
            <label title="Toggle values together"
                   class="yatri--css-ruler-link  yatri--label-active">
                <input type="checkbox"
                       class="yatri--label-parent"
                       checked="checked" value="1">
            </label>
        </div>
    </div>
    <div class="yatri-input-color">

        <div class="yatri-field-header">

            <div class="yatri-field-heading">
                <label class="customize-control-title"><?php echo esc_html__('Border Color', 'yatri'); ?></label>
            </div>


        </div>
        <?php
        $border_color_bg = isset($border_value['border_color']) ? 'background:' . esc_attr($border_value['border_color']) . ';' : '';

        ?>
        <input data-default="#444" type="text" class="yatri-color-picker yatri-change-by-js border_color hidden"
               value="<?php echo isset($border_value['border_color']) ? esc_attr($border_value['border_color']) : '' ?>"/>
        <div class="wp-picker-container yatri-picker-container">
            <button type="button" class="button wp-color-result yatri-picker-result"
                    style="z-index:9999;background-color: rgb(186, 186, 186); background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAIAAAHnlligAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAHJJREFUeNpi+P///4EDBxiAGMgCCCAGFB5AADGCRBgYDh48CCRZIJS9vT2QBAggFBkmBiSAogxFBiCAoHogAKIKAlBUYTELAiAmEtABEECk20G6BOmuIl0CIMBQ/IEMkO0myiSSraaaBhZcbkUOs0HuBwDplz5uFJ3Z4gAAAABJRU5ErkJggg==&quot;); position: relative;">
                <span class="wp-color-result-text"><?php esc_html_e('Select Color', 'yatri'); ?></span>
                <span class="color-alpha"
                      style="<?php echo $border_color_bg; ?>width: 30px; height: 28px; position: absolute; top: 0px; left: 0px; border-top-left-radius: 2px; border-bottom-left-radius: 2px;"></span>
            </button>
        </div>
    </div>
    <div class="yatri-input-border-radius">
        <div class="yatri-field-header">

            <div class="yatri-field-heading">
                <label class="customize-control-title"><?php echo esc_html__('Border Radius', 'yatri'); ?></label>
            </div>


        </div>
        <div class="yatri--css-ruler yatri--field-inputs">
				<span>
					<input type="number" class="yatri-input-css yatri-change-by-js border_radius_top"
                           value="<?php echo isset($border_value['border_radius_top']) ? absint($border_value['border_radius_top']) : '' ?>"
                    />
					<span class="yatri--small-label"><?php echo esc_html__('Top', 'yatri'); ?></span>
				</span>
            <span>
					<input type="number" class="yatri-input-css yatri-change-by-js border_radius_right"
                           value="<?php echo isset($border_value['border_radius_right']) ? absint($border_value['border_radius_right']) : '' ?>"
                    />
					<span class="yatri--small-label"><?php echo esc_html__('Right', 'yatri'); ?></span>
				</span>
            <span>
					<input type="number" class="yatri-input-css yatri-change-by-js border_radius_bottom"
                           value="<?php echo isset($border_value['border_radius_bottom']) ? absint($border_value['border_radius_bottom']) : '' ?>"/>
					<span class="yatri--small-label"><?php echo esc_html__('Bottom', 'yatri'); ?></span>
				</span>
            <span>
					<input type="number" class="yatri-input-css yatri-change-by-js border_radius_left"
                           value="<?php echo isset($border_value['border_radius_left']) ? absint($border_value['border_radius_left']) : '' ?>"
                    />
					<span class="yatri--small-label"><?php echo esc_html__('Left', 'yatri'); ?></span>
				</span>
            <label title="Toggle values together"
                   class="yatri--css-ruler-link  yatri--label-active">
                <input type="checkbox"
                       class="yatri--label-parent"
                       checked="checked" value="1">
            </label>
        </div>
    </div>
    <div class="yatri-input-color">

        <div class="yatri-field-header">

            <div class="yatri-field-heading">
                <label class="customize-control-title"><?php echo esc_html__('Box Shadow', 'yatri'); ?></label>
            </div>


        </div>
        <?php
        $box_shadow_bg = isset($border_value['box_shadow_color']) ? 'background:' . esc_attr($border_value['box_shadow_color']) . ';' : '';

        ?>
        <input data-default="#444" type="text" class="yatri-color-picker yatri-change-by-js box_shadow_color hidden"
               value="<?php echo isset($border_value['box_shadow_color']) ? esc_attr($border_value['box_shadow_color']) : '' ?>"/>
        <div class="wp-picker-container yatri-picker-container">
            <button type="button" class="button wp-color-result yatri-picker-result"
                    style="z-index:9999;background-color: rgb(186, 186, 186); background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAIAAAHnlligAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAHJJREFUeNpi+P///4EDBxiAGMgCCCAGFB5AADGCRBgYDh48CCRZIJS9vT2QBAggFBkmBiSAogxFBiCAoHogAKIKAlBUYTELAiAmEtABEECk20G6BOmuIl0CIMBQ/IEMkO0myiSSraaaBhZcbkUOs0HuBwDplz5uFJ3Z4gAAAABJRU5ErkJggg==&quot;); position: relative;">
                <span class="wp-color-result-text"><?php esc_html_e('Select Color', 'yatri'); ?></span>

                <span class="color-alpha"
                      style="<?php echo $box_shadow_bg; ?>width: 30px; height: 28px; position: absolute; top: 0px; left: 0px; border-top-left-radius: 2px; border-bottom-left-radius: 2px;"></span>
            </button>
        </div>
    </div>
    <div class="yatri-input-box-shadow-size">
        <div class="yatri-field-header">

            <div class="yatri-field-heading">
                <label class="customize-control-title"><?php echo esc_html__('Box Size Values', 'yatri'); ?></label>
            </div>


        </div>
        <div class="yatri--css-ruler yatri--field-inputs">
				<span>
					<input type="number" class="yatri-input-css yatri-change-by-js box_shadow_x"
                           value="<?php echo isset($border_value['box_shadow_x']) ? absint($border_value['box_shadow_x']) : '' ?>"
                    />
					<span class="yatri--small-label"><?php echo esc_html__('X', 'yatri'); ?></span>
				</span>
            <span>
					<input type="number" class="yatri-input-css yatri-change-by-js box_shadow_y"
                           value="<?php echo isset($border_value['box_shadow_y']) ? absint($border_value['box_shadow_y']) : '' ?>"/>
					<span class="yatri--small-label"><?php echo esc_html__('Y', 'yatri'); ?></span>
				</span>
            <span>
					<input type="number" class="yatri-input-css yatri-change-by-js box_shadow_blur"
                           value="<?php echo isset($border_value['box_shadow_blur']) ? absint($border_value['box_shadow_blur']) : '' ?>"
                    />
					<span class="yatri--small-label"><?php echo esc_html__('BLUR', 'yatri'); ?></span>
				</span>
            <span>
					<input type="number" class="yatri-input-css yatri-change-by-js box_shadow_spread"
                           value="<?php echo isset($border_value['box_shadow_spread']) ? absint($border_value['box_shadow_spread']) : '' ?>"
                    />
					<span class="yatri--small-label"><?php echo esc_html__('SPREAD', 'yatri'); ?></span>
				</span>
            <span>
						<span class="input yatri--checked">
							<input <?php echo isset($border_value['box_shadow_inset']) && (boolean)$border_value['box_shadow_inset'] ? 'checked="checked"' : '' ?>
                                    type="checkbox" class="yatri-input-css yatri-change-by-js box_shadow_inset"
                                    value="">
						</span>
						<span class="yatri--small-label"><?php echo esc_html__('inset', 'yatri'); ?></span>
					</span>
        </div>
    </div>
</div>