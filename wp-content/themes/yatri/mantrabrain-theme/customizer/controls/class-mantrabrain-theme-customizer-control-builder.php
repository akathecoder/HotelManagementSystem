<?php
if (!class_exists('WP_Customize_Control'))
    return;

/**
 * Class to create a custom tags control
 */
class Mantrabrain_Theme_Customizer_Control_Builder extends Mantrabrain_Theme_Customizer_Control_Base
{

    public function __construct(WP_Customize_Manager $manager, $id, array $args = array())
    {

        $this->fields = isset($args['fields']) ? $args['fields'] : array();


        parent::__construct($manager, $id, $args);
    }

    /**
     * The type of control being rendered
     */
    public $type = 'yatri_builder_control';

    /**
     * Enqueue our scripts and styles
     */
    public function enqueue()
    {

        $script_uri = YATRI_THEME_URI . 'mantrabrain-theme/customizer/controls/builder/';

        //wp_enqueue_script('jquery-ui-resizable');
        wp_enqueue_script('yatri-builder-builder-js', $script_uri . 'builder.js', array('jquery', 'jquery-ui-draggable'), YATRI_THEME_VERSION);

        wp_enqueue_style('yatri-builder-control-css', $script_uri . 'builder.css', array(), YATRI_THEME_VERSION);


    }


    /**
     * Render the control in the customizer
     */
    public function render_content()
    {
        $name = '_customize-modal-' . $this->id;

        $default = isset($this->setting->default) ? $this->setting->default : array();

        $value_array = $this->value();

        if (!is_array($value_array)) {

            $value_array = $default;
        }
        $json_value = yatri_maybe_json_encode($value_array);

        $added_sections = wp_list_pluck($value_array, 'section');

        ?>
        <div class="yatri-builder-control">
            <?php
            $this->field_header();
            ?>
            <div class="yatri-builder-content-wrap">
                <input type="hidden"
                       name="<?php echo esc_attr($name); ?>"
                       id="<?php echo esc_attr($this->id) ?>"
                       data-default='{}'
                       value='<?php echo $json_value; ?>'
                       data-customize-setting-link="<?php echo esc_attr($this->id); ?>"
                       class="yatri_customizer_builder_minified_results"/>
                <div class="yatri-builder-sections">

                    <?php
                    foreach ($this->fields as $section_key => $section) {

                        $title = isset($section['title']) ? $section['title'] : '';

                        if (!in_array($section_key, $added_sections)) {

                            $this->get_section_item_html($section_key, $title);
                        }
                    }
                    ?>
                </div>
                <p class="yatri-drag-drop-notice"><?php echo esc_html__('Drag & drop above item here', 'yatri'); ?> </p>
                <div class="yatri-builder-dropper">
                    <?php
                    $number_of_grid = 3;
                    ?>
                    <div class="yatri-builder-drop-area">
                        <?php for ($grid_num = 0; $grid_num < $number_of_grid; $grid_num++) { ?>
                            <div class="grid grid-<?php echo absint($grid_num); ?>"
                                 data-column="<?php echo 'col_' . ($grid_num) ?>">
                                <p><?php echo sprintf(esc_html__('Grid %d Width', 'yatri'), absint($grid_num + 1)); ?></p>
                                <?php
                                $grid_content = isset($value_array[$grid_num]) ? $value_array[$grid_num] : array();

                                $section_id = isset($grid_content['section']) ? $grid_content['section'] : '';

                                $width = isset($grid_content['width']) ? $grid_content['width'] : '';
                                ?>
                                <div class="grid-width">
                                    <input type="text" class="column-width" value="<?php echo esc_attr($width); ?>"
                                    />
                                    <span>%</span>
                                </div>
                                <div class="grid-content">
                                    <?php
                                    if (!empty($section_id) && isset($this->fields[$section_id])) {

                                        $grid_section_title = isset($this->fields[$section_id]['title']) ? $this->fields[$section_id]['title'] : '';

                                        $this->get_section_item_html($section_id, $grid_section_title);

                                    }
                                    ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>


        </div>
        <?php
    }

    private function get_section_item_html($section_key, $title)
    {
        ?>
        <div data-section-key="<?php echo esc_attr($section_key); ?>" class="item yatri-draggable-item">
            <span class="delete-icon">x</span><?php echo esc_html($title) ?></div>
        <?php

    }

}