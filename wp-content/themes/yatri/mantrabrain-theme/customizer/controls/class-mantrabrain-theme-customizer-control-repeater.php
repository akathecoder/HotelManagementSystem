<?php
if (!class_exists('WP_Customize_Control'))
    return;

/**
 * Class to create a custom tags control
 */
class Mantrabrain_Theme_Customizer_Control_Repeater extends Mantrabrain_Theme_Customizer_Control_Base
{

    public function __construct(WP_Customize_Manager $manager, $id, array $args = array())
    {

        $this->fields = isset($args['fields']) ? $args['fields'] : array();

        parent::__construct($manager, $id, $args);
    }

    /**
     * The type of control being rendered
     */
    public $type = 'yatri_repeater_control';

    /**
     * Enqueue our scripts and styles
     */
    public function enqueue()
    {

        $script_uri = YATRI_THEME_URI . 'mantrabrain-theme/customizer/controls/repeater/';

        wp_enqueue_script('yatri-repeater-control-js', $script_uri . 'repeater.js', array('jquery'), YATRI_THEME_VERSION, true);

        wp_enqueue_style('yatri-repeater-control-css', $script_uri . 'repeater.css', array(), YATRI_THEME_VERSION);


    }

    function hidden_template()
    {
        ?>
        <script type="text/html" class="repeater-control">

            <?php $this->main_template(); ?>
        </script>
        <?php
    }

    function main_template($value = array())
    {
        $repeater_title = esc_html__('Repeater title', 'yatri');

        foreach ($this->fields as $id => $fd) {

            $is_title = isset($fd['is_title']) ? $fd['is_title'] : false;

            if ($is_title) {
                $repeater_title = isset($value[$id]) ? $value[$id] : $repeater_title;
            }

        }
        ?>
        <div class="repeater-wrap">
            <div class="repeater-header">
                <p><?php echo esc_html($repeater_title); ?></p>
                <div class="repeater-actions">
                    <span class="dashicons dashicons-arrow-down-alt2 toggle"></span>
                    <span class="dashicons dashicons-trash trash"></span>
                </div>
            </div>
            <div class="repeater-fields">
                <?php
                foreach ($this->fields as $field_id => $field) {

                    $field_type = isset($field['type']) ? $field['type'] : '';

                    $field_value = isset($value[$field_id]) ? $value[$field_id] : '';

                    $label = isset($field['label']) ? $field['label'] : '';

                    $is_title = isset($field['is_title']) ? $field['is_title'] : false;

                    include "repeater/fields/{$field_type}.php";

                }
                ?>
            </div>
        </div>
        <?php

    }

    /**
     * Render the control in the customizer
     */
    public function render_content()
    {

        $field_value = $this->value();

        $value_array = array();

        try {
            $value_array = yatri_maybe_json_decode($field_value);

        } catch (Exception $e) {

            $value_array = array();
        }

        ?>
        <div class="yatri-repeater-control">
            <?php
            $this->field_header();
            ?>
            <div class="yatri-repeater-control-field">
                <div class="repeater-wrap-container">
                    <?php
                    $this->hidden_template();
                    if (count($value_array) > 0) {
                        foreach ($value_array as $single_value) {
                            $this->main_template($single_value);
                        }
                    } else {
                        $this->main_template();
                    }

                    ?>
                </div>
                <button type="button" class="add-new">
                    <span class="dashicons dashicons-plus-alt"></span>
                    <p class="screen-reader-text"><?php echo esc_html__('Add New', 'yatri'); ?></p>
                </button>

            </div>
            <input type="hidden"
                   id="<?php echo esc_attr($this->id); ?>"
                   name="<?php echo esc_attr($this->id); ?>"
                   class="customize-control-repeater-value" <?php $this->link(); ?>
            />
        </div>
        <?php
    }
}