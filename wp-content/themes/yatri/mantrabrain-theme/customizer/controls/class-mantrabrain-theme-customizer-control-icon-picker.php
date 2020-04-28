<?php
if (!class_exists('WP_Customize_Control'))
    return;

/**
 * Class to create a custom tags control
 */
class Mantrabrain_Theme_Customizer_Control_Icon_Picker extends Mantrabrain_Theme_Customizer_Control_Base
{
    /**
     * The type of control being rendered
     */
    public $type = 'yatri_icon_picker_control';

    /**
     * Enqueue our scripts and styles
     */
    public function enqueue()
    {

        $script_uri = YATRI_THEME_URI . 'mantrabrain-theme/customizer/controls/icon-picker/';
        $fs_script_uri = YATRI_THEME_URI . 'mantrabrain-theme/assets/lib/font-awesome/css/font-awesome.min.css';


        $icon_lists = array(
            'font_awesome' => array(
                'title' => esc_html__('Font Awesome', 'yatri'),
                'icons' => Mantrabrain_Theme_Helper::font_awesome_icon_list()
            )
        );

        wp_enqueue_script('yatri-icon-picker-control-js', $script_uri . 'icon-picker.js', array('jquery'), YATRI_THEME_VERSION, true);
        wp_localize_script('yatri-icon-picker-control-js', 'yatriAllIcons', $icon_lists);


        wp_register_style('yatri-font-awesome', $fs_script_uri, array(), YATRI_THEME_VERSION);
        wp_enqueue_style('yatri-icon-picker-control-css', $script_uri . 'icon-picker.css', array('yatri-font-awesome'), YATRI_THEME_VERSION);


    }


    /**
     * Render the control in the customizer
     */
    public function render_content()
    {
        $default = isset($this->setting->default) ? $this->setting->default : '';


        ?>
        <div class="yatri-icon-picker-control">
            <?php
            $this->field_header();
            ?>
            <div class="yatri-icon-picker-control-field">
                <span class="icon-show <?php echo esc_attr($this->value()) ?>"></span>
                <input type="text"
                       id="<?php echo esc_attr($this->id); ?>"
                       name="<?php echo esc_attr($this->id); ?>"
                       value="<?php echo esc_attr($this->value()); ?>"
                       class="customize-control-icon-picker-value" <?php $this->link(); ?>
                       placeholder="Click here to pick an icon"
                       readonly
                />
                <span class="icon-clear dashicons dashicons-trash"></span>

                <?php
                $this->picker();
                ?>
            </div>

        </div>
        <?php
    }

    public function picker()
    {
        $icon_lists = array();
        ?>
        <div id="yatri-customizer-icon-picker">
            <div class="picker-header">
                <a class="customize-controls-icon-close" href="#">
                    <span class="screen-reader-text"><?php echo esc_html__('Cancel', 'yatri'); ?></span>
                </a>
                <div class="icon-type-selector">
                    <select id="yatri-icon-type">
                        <option value="all"><?php echo esc_html__('All Icon Types', 'yatri'); ?></option>
                    </select>
                </div>
            </div>
            <div class="yatri-icon-search">
                <input type="text" id="yatri-icon-search-input"
                       placeholder="<?php echo esc_html__('Type icon name here', 'yatri'); ?>">
            </div>
            <div id="yatri-icon-browser">

            </div>
        </div>
        <?php
    }
}