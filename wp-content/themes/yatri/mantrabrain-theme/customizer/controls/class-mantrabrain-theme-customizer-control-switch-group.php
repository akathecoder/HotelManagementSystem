<?php
/**
 * Custom Controls of theme
 *
 * @package Agency_Ecommerce
 */

class Mantrabrain_Theme_Customizer_Control_Switch_Group extends Mantrabrain_Theme_Customizer_Control_Base
{

    public $switch_choices = array();

    private $attributes = array();

    public function __construct(WP_Customize_Manager $manager, $id, array $args = array())
    {
        parent::__construct($manager, $id, $args);

        $atts = isset($args['attributes']) ? $args['attributes'] : array();

        $default_atts = array(
            'on' => esc_html__('on', 'yatri'),
            'off' => esc_html__('off', 'yatri'),
        );
        $this->attributes = wp_parse_args($atts, $default_atts);

        $this->switch_choices = isset($args['switch_choices']) ? $args['switch_choices'] : array();


    }

    public function enqueue()
    {
        $script_uri = YATRI_THEME_URI . 'mantrabrain-theme/customizer/controls/switch-group/';


        wp_enqueue_style('yatri-control-switch-group-style', $script_uri . 'switch-group.css', null, YATRI_THEME_VERSION);
        wp_enqueue_script('yatri-control-switch-group-script', $script_uri . 'switch-group.js', array('jquery'), YATRI_THEME_VERSION);

    }

    public function render_content()
    {
        $group_value = $this->value();

        $group_value = is_array($group_value) ? $group_value : array();

        $name = '_customize-switch-group-' . $this->id;
        ?>
        <div class="mb-switch-group-control-wrap">
            <input type="hidden"
                   id="<?php echo esc_attr($this->id); ?>"
                   name="<?php echo esc_attr($this->id); ?>"
                   class="customize-control-switch-group-value" <?php $this->link(); ?>/>
            <?php
            $this->field_header('dashicons dashicons-arrow-down-alt2 switch-group-toggle');
            ?>
            <div class="mb-switch-group-control-inner-wrap">
                <?php

                foreach ($this->switch_choices as $device_key => $device_label) {

                    $has_checked = isset($group_value[$device_key]) && $group_value[$device_key] ? 1 : 0;

                    ?>
                    <div class="switch-group-label">
                        <label for="<?php echo esc_attr($this->id) ?>[<?php echo esc_attr($device_key) ?>]"
                               class="customizer-control-title"><?php echo esc_attr($device_label); ?></label>

                        <label class="mb-switch-group-control"
                               for="<?php echo esc_attr($this->id) ?>[<?php echo esc_attr($device_key) ?>]">
                            <input type="checkbox" value="0"
                                   name="<?php echo esc_attr($name); ?>[<?php echo esc_attr($device_key) ?>]"
                                   id="<?php echo esc_attr($this->id) ?>[<?php echo esc_attr($device_key) ?>]"
                                <?php checked(1, $has_checked); ?> data-id="<?php echo esc_attr($device_key); ?>">
                            <span class="slider round" data-on="<?php echo esc_attr($this->attributes['on']); ?>"
                                  data-off="<?php echo esc_attr($this->attributes['off']); ?>"></span>
                        </label>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php
    }
}