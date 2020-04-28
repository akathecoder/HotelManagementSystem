<?php
/**
 * Custom Controls of theme
 *
 * @package Agency_Ecommerce
 */

class Mantrabrain_Theme_Customizer_Control_Switch extends Mantrabrain_Theme_Customizer_Control_Base
{
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


    }

    public function enqueue()
    {
        $css_uri = YATRI_THEME_URI . 'mantrabrain-theme/customizer/controls/switch/';

        $js_uri = YATRI_THEME_URI . 'mantrabrain-theme/customizer/controls/switch/';

        wp_enqueue_style('yatri-control-switch-style', $css_uri . 'switch.css', null, YATRI_THEME_VERSION);

    }

    public function render_content()
    {
        $name = '_customize-switch-' . $this->id;
        ?>
        <div class="mb-switch-control-wrap">
            <label class="yatri-switch-label"
                   for="<?php echo esc_attr($name); ?>"><?php echo esc_html($this->label); ?></label>
            <label class="mb-switch-control">
                <input id="<?php echo esc_attr($name); ?>" type="checkbox" value="0"
                       name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($this->id) ?>"
                       data-customize-setting-link="<?php echo esc_attr($this->id); ?>"
                    <?php checked(1, $this->value()); ?>>
                <span class="slider round" data-on="<?php echo esc_attr($this->attributes['on']); ?>"
                      data-off="<?php echo esc_attr($this->attributes['off']); ?>"></span>
            </label>
        </div>
        <?php
    }
}