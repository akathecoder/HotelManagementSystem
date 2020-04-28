<?php
if (!class_exists('WP_Customize_Control'))
    return;

/**
 * Class to create a custom tags control
 */
class Mantrabrain_Theme_Customizer_Control_Sortable extends Mantrabrain_Theme_Customizer_Control_Base
{
    /**
     * The type of control being rendered
     */
    public $type = 'yatri_sortable_control';

    /**
     * Enqueue our scripts and styles
     */
    public function enqueue()
    {

        $script_uri = YATRI_THEME_URI . 'mantrabrain-theme/customizer/controls/sortable/';

        wp_enqueue_script('yatri-sortable-control-js', $script_uri . 'sortable.js', array('jquery'), YATRI_THEME_VERSION, true);

        wp_enqueue_style('yatri-sortable-control-css', $script_uri . 'sortable.css', array(), YATRI_THEME_VERSION);


    }


    /**
     * Render the control in the customizer
     */
    public function render_content()
    {
        $defaults = isset($this->setting->default) ? $this->setting->default : array();

        $field_value = $this->value();

        $value_array = array();
        try {
            $value_array = is_string($field_value) ? json_decode($field_value, true) : $field_value;

        } catch (Exception $e) {

            $value_array = array();
        }
        $value_array = empty($value_array) ? array_keys($defaults) : $value_array;

        ?>
        <div class="yatri-sortable-control">
            <?php
            $this->field_header();
            ?>
            <div class="yatri-sortable-control-field">
                <?php foreach ($value_array as $sortable_index => $sortable_value) {
                    $text = isset($defaults[$sortable_index]['title']) ? $defaults[$sortable_index]['title'] : '';
                    if (!empty($text)) {
                        $data_disable = isset($sortable_value['disable']) ? (boolean)$sortable_value['disable'] : 0;
                        ?>
                        <div class="yatri-sortable-item" data-disable="<?php echo(absint($data_disable)) ?>"
                             data-item-id="<?php echo esc_attr($sortable_index) ?>">
                            <div class="yatri-sortable-item-heading">
                                <label class="yatri-sortable-show" title="Toggle item show">
                                    <span class="rp-show-icon dashicons dashicons-visibility"></span>
                                    <span class="screen-reader-text"><?php echo esc_html__('Show', 'yatri'); ?></span></label>
                                <span class="yatri-sortable-title"><?php echo esc_html($text); ?></span>

                            </div>
                            <i class="dashicons dashicons-menu"></i>
                        </div>
                    <?php }
                }
                ?>

            </div>
            <input type="hidden"
                   id="<?php echo esc_attr($this->id); ?>"
                   name="<?php echo esc_attr($this->id); ?>"
                   class="customize-control-repeator-value" <?php $this->link(); ?>
            />
        </div>
        <?php
    }
}