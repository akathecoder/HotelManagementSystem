<?php

class Mantrabrain_Theme_Customizer_Control_Base extends WP_Customize_Control
{

    public $label = '';

    public $fields = array();

    /**
     * Option description.
     *
     * @since 1.0.0
     * @var string $description
     */
    public $description = '';

    public function field_header($icon = '')
    {
        echo '<div class="yatri-field-header">';
        if (!empty($this->label)) {
            echo '<span class="customize-control-title">' . esc_html($this->label) . '</span>';
        }
        if (!empty($this->description)) {
            echo '<span class="description customize-control-description">' . esc_html($this->description) . '</span>';
        }
        if (!empty($icon)) {
            echo '<span class="' . esc_attr($icon) . '"></span>';
        }
        echo '</div>';

    }

    public function device_selector($devices = array('desktop', 'tablet', 'mobile'))
    {
        ?>
        <div class="devices yatri-devices">
            <?php foreach ($devices as $device) { ?>
                <button type="button" class="preview-<?php echo esc_attr($device) ?> active" aria-pressed="true"
                        data-device="<?php echo esc_attr($device) ?>">
                    <span class="screen-reader-text"><?php echo sprintf(esc_html__('Enter %s preview mode', 'yatri'), $device); ?></span>
                </button>
            <?php } ?>
        </div>
        <?php
    }

    public function device_template_wrap_start($device = 'desktop')
    {
        ?>
    <div class="yatri-field-settings-inner yatri--for-<?php echo esc_attr($device) ?>"
         data-for-device="<?php echo esc_attr($device); ?>">
        <?php
    }

    public function device_template_wrap_end()
    {
        echo '</div>';
    }

}
