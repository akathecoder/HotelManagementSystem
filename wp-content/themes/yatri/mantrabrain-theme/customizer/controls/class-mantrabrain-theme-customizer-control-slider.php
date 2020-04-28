<?php
if (!class_exists('WP_Customize_Control'))
    return;

/**
 * Class to create a custom tags control
 */

/**
 * Slider Custom Control
 *
 * @author Mantrabrain <http://mantrabrain.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 * @link https://github.com/mantrabrain
 */
class Mantrabrain_Theme_Customizer_Control_Slider extends Mantrabrain_Theme_Customizer_Control_Base
{
    /**
     * The type of control being rendered
     */
    public $type = 'yatri_slider_control';

    /**
     * Enqueue our scripts and styles
     */
    public function enqueue()
    {

        $css_uri = YATRI_THEME_URI . 'mantrabrain-theme/customizer/controls/slider/';

        $js_uri = YATRI_THEME_URI . 'mantrabrain-theme/customizer/controls/slider/';

        wp_enqueue_script('yatri-slider-control-js', $js_uri . 'slider.js', array('jquery'), YATRI_THEME_VERSION, true);

        wp_enqueue_style('yatri-slider-control-css', $js_uri . 'slider.css', array(), YATRI_THEME_VERSION);


    }

    /**
     * Render the control in the customizer
     */
    public function render_content()
    {
        $default = isset($this->setting->default) ? $this->setting->default : '';
        ?>
        <div class="yatri-slider-control">
            <?php
            $this->field_header();
            ?>
            <div class="yatri-slider-control-wrap">
                <input type="number"
                       id="<?php echo esc_attr($this->id); ?>"
                       name="<?php echo esc_attr($this->id); ?>"
                       value="<?php echo esc_attr($this->value()); ?>"
                       class="customize-control-slider-value" <?php $this->link(); ?>
                       min="<?php echo esc_attr($this->input_attrs['min']); ?>"
                       max="<?php echo esc_attr($this->input_attrs['max']); ?>"
                       step="<?php echo esc_attr($this->input_attrs['step']); ?>"
                />
                <div class="yatri-slider" data-min="<?php echo esc_attr($this->input_attrs['min']); ?>"
                     data-max="<?php echo esc_attr($this->input_attrs['max']); ?>"
                     data-step="<?php echo esc_attr($this->input_attrs['step']); ?>"
                     data-default="<?php echo esc_attr($default); ?>"
                ></div>
                <span class="yatri-slider-reset dashicons dashicons-image-rotate"
                      data-reset="<?php echo esc_attr($this->value()); ?>"></span>

            </div>
        </div>
        <?php
    }
}