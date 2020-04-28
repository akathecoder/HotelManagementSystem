<?php
/**
 * Custom Controls of theme
 *
 * @package Agency_Ecommerce
 */

class Mantrabrain_Theme_Customizer_Control_Radio extends Mantrabrain_Theme_Customizer_Control_Base
{
    public function __construct(WP_Customize_Manager $manager, $id, array $args = array())
    {

        parent::__construct($manager, $id, $args);

        $this->has_images = isset($args['has_images']) ? (boolean)($args['has_images']) : false;
    }

    public function enqueue()
    {
        $css_uri = YATRI_THEME_URI . 'mantrabrain-theme/customizer/controls/radio/';

        wp_enqueue_style('yatri-control-radio-style', $css_uri . 'radio.css', null, YATRI_THEME_VERSION);

    }

    public function render_content()
    {
        $name = '_customize-radio-' . $this->id;

        $choices = isset($this->choices) ? $this->choices : array();

        $class = $this->has_images ? ' with-images' : '';
        ?>
        <div class="mb-radio-control-wrap <?php echo esc_attr($class); ?>">
            <?php $this->field_header(); ?>
            <ul class="mb-radio-control">
                <?php foreach ($choices as $choice_key => $choice) { ?>
                    <li class="<?php echo $choice_key == $this->value() ? 'selected' : ''; ?>">
                        <input type="radio" value="<?php echo esc_attr($choice_key) ?>"
                               name="<?php echo esc_attr($name); ?>"
                               id="<?php echo esc_attr($this->id . $choice_key) ?>"
                               data-customize-setting-link="<?php echo esc_attr($this->id); ?>"
                            <?php checked($choice_key, $this->value()); ?>>

                        <label for="<?php echo esc_attr($this->id . $choice_key) ?>">
                            <?php
                            if ($this->has_images) {

                                $title = is_array($choice) && isset($choice['title']) ? $choice['title'] : $choice;

                                $image = is_array($choice) && isset($choice['image']) ? $choice['image'] : $choice;

                                echo '<img src="' . esc_attr($image) . '"/>';

                                if (is_array($choice) && isset($choice['title'])) {

                                    echo '<span class="choice-title">' . $title . '</span>';
                                }

                            } else {

                                echo esc_html($choice);
                            }

                            ?>
                        </label>
                        <span class="checkmark"></span>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <?php
    }
}