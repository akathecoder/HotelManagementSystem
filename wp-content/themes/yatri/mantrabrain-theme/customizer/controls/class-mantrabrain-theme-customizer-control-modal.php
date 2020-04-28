<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Typography control.
 */
class Mantrabrain_Theme_Customizer_Control_Modal extends Mantrabrain_Theme_Customizer_Control_Base
{

    /**
     * Control type.
     *
     * @since 1.0.0
     * @var string $type
     */
    public $type = 'yatri_modal';


    private $value_array = array();


    private $value_json = "{}";


    private $default_value_array = array();

    private $default_value_json = "{}";

    /**
     * Set the default font options.
     *
     * @since 1.0.8
     * @param WP_Customize_Manager $manager Customizer bootstrap instance.
     * @param string $id Control ID.
     * @param array $args Default parent's arguments.
     */
    public function __construct($manager, $id, $args = array())
    {

        $filter_id = $id;

        $filter_id = str_replace(YATRI_THEME_SETTINGS, '', $filter_id);

        $filter_id = trim(str_replace(array('[', ']'), '', $filter_id));

        $this->fields = apply_filters('yatri_customizer_modal_fields', $filter_id);

        parent::__construct($manager, $id, $args);
    }

    /**
     * Renders the content for a control based on the type
     * of control specified when this class is initialized.
     *
     * @since 1.0.0
     * @access protected
     * @return void
     */
    protected function render_content()
    {
        $value = $this->value();


        try {
            $this->value_array = json_decode($value, true);

            $this->value_json = $value;

        } catch (Exception $e) {
            $this->value_array = array();
            $this->value_json = "{}";
        }
        $this->render_default_values();

        $this->render_styling();
    }

    private function render_default_values()
    {
        $value_string = '{}';

        try {
            $this->default_value_array = json_decode($value_string, true);

            $this->default_value_json = $value_string;

        } catch (Exception $e) {

            $this->default_value_array = array();

            $this->default_value_json = "{}";
        }
    }

    /**
     * Enqueue control related scripts/styles.
     *
     * @access public
     */
    public function enqueue()
    {

        
        $css_uri = YATRI_THEME_URI . 'mantrabrain-theme/customizer/controls/modal/';

        $js_uri = YATRI_THEME_URI . 'mantrabrain-theme/customizer/controls/modal/';

        wp_enqueue_script('yatri-modal-control-js', $js_uri . 'modal.js', array('yatri-color-alpha'), YATRI_THEME_VERSION, true);

        wp_enqueue_style('yatri-modal-control-css', $js_uri . 'modal.css', array(), YATRI_THEME_VERSION);

        if ($this->has_typography_fields()) {

            $all_fonts['google'] = Mantrabrain_Theme_Helper::get_google_fonts();
            $all_fonts['normal'] = Mantrabrain_Theme_Helper::get_normal_fonts();
            $all_fonts['varients'] = Mantrabrain_Theme_Helper::all_font_varients();

            wp_localize_script('yatri-modal-control-js', 'yatriAllFonts', $all_fonts);
        }


    }

    public function has_typography_fields()
    {

        $fields = isset($this->fields['tabs']) ? $this->fields['tabs'] : $this->fields;

        $has_typo = false;

        if (isset($this->fields['tabs'])) {

            $tab_keys = array_keys($this->fields['tabs']);

            foreach ($tab_keys as $key) {

                if (isset($this->fields[$key . '_fields'])) {

                    $field_types = wp_list_pluck($this->fields[$key . '_fields'], 'type');

                    if (in_array('font', $field_types)) {
                        $has_typo = true;
                        break;
                    }

                }

            }
        } else {
            $field_types = wp_list_pluck($fields, 'type');
            if (in_array('font', $field_types)) {
                $has_typo = true;
            }
        }
        return $has_typo;
    }


    protected function render_styling()
    {


        $name = '_customize-modal-' . $this->id;

        $values = '{}';//urlencode(json_encode($this->value()));

        ?>
        <div class="yatri--settings-wrapper">
            <?php
            $this->field_header();
            ?>

            <div class="yatri--settings-fields">
                <div class="yatri--field yatri--field-styling  yatri--field-name-search_box_input_styling"
                     data-required="null" data-field-name="search_box_input_styling">

                    <div class="yatri-actions">
                        <a href="#" title="Reset to default" class="action--reset"
                           data-control="search_box_input_styling"><span
                                    class="dashicons dashicons-image-rotate"></span></a>
                        <a href="#" title="Toggle edit panel" class="action--edit"
                           data-control="search_box_input_styling"><span class="dashicons dashicons-edit"></span></a>
                    </div>
                    <div class="yatri-field-settings-inner">

                        <input type="hidden"
                               name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($this->id) ?>"
                               data-default='<?php echo $this->default_value_json; ?>'
                               data-customize-setting-link="<?php echo esc_attr($this->id); ?>"
                               class="yatri_customizer_minified_results"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="yatri-modal-settings">
            <div class="yatri-modal-settings--inner">
                <div class="yatri-modal-settings--fields">
                    <?php
                    $tabs = isset($this->fields['tabs']) ? $this->fields['tabs'] : array();

                    if (count($tabs) > 0) {
                        $tab_keys = array_keys($tabs);
                        $active_tab = isset($tab_keys[0]) ? $tab_keys[0] : '';
                        ?>
                        <div class="modal--tabs">
                            <?php foreach ($tabs as $tab_index => $tab) { ?>
                                <div><span data-tab="<?php echo esc_attr($tab_index); ?>"
                                           class="modal--tab modal-tab--<?php echo esc_attr($tab_index);
                                           echo $active_tab == $tab_index ? ' active' : ''; ?>"><?php echo esc_html($tab); ?></span>
                                </div>
                            <?php } ?>

                        </div>
                    <?php } ?>

                    <?php foreach ($tabs as $tab_content_index => $tab_for_content) { ?>

                        <div class="modal-tab-content modal-tab--<?php echo esc_attr($tab_content_index);
                        echo $active_tab == $tab_content_index ? ' active' : ''; ?>">

                            <?php
                            $all_fields = isset($this->fields[$tab_content_index . '_fields']) ? $this->fields[$tab_content_index . '_fields'] : array();

                            $this->render_all_fields($all_fields);
                            ?>

                        </div>
                    <?php }
                    if (count($tabs) < 1) {
                        $this->render_all_fields($this->fields);
                    }
                    ?>

                </div>
            </div>
        </div>
        <?php
    }

    public function render_all_fields($fields = array())
    {

        foreach ($fields as $field) {

            $is_multiple_device = isset($field['device_settings']) ? (boolean)$field['device_settings'] : false;

            $field_name = isset($field['name']) ? $field['name'] : '';

            $additional_class = isset($field['class']) ? $field['class'] : '';

            $devices = isset($field['devices']) ? $field['devices'] : array();

            $type = isset($field['type']) ? $field['type'] : '';

            if ($type == 'font_languages') {

                $mapping_font_family_id = isset($field['mapping_font_field']) ? $field['mapping_font_field'] : '';

                if ('' != $mapping_font_family_id) {

                    $font_family = yatri_get_modal_option($mapping_font_family_id, "{$mapping_font_family_id}_font_family");

                    $subsets = Mantrabrain_Theme_Helper::all_font_subsets($font_family);

                    $field['choices'] = is_array($subsets) ? $subsets : array();

                }
                if (empty($field['choices'])) {

                    $additional_class .= ' yatri-hide ';
                }
            }

            if ($type == 'font_weight') {

                $mapping_font_family_id = isset($field['mapping_font_field']) ? $field['mapping_font_field'] : '';

                if ('' != $mapping_font_family_id) {

                    $font_family = yatri_get_modal_option($mapping_font_family_id, "{$mapping_font_family_id}_font_family");

                    $varients = Mantrabrain_Theme_Helper::all_font_varients($font_family);

                    $field['options'] = is_array($varients) ? $varients : array();

                }
            }
            $additional_css = isset($field['additional_css']) ? ($field['additional_css']) : '';
            $additional_css_mobile = '';
            $additional_css_tablet = '';
            $additional_css_desktop = '';
            $additional_css_all = '';
            if (is_array($additional_css)) {
                $additional_css_tablet = isset($additional_css['tablet']) ? $additional_css['tablet'] : '';
                $additional_css_mobile = isset($additional_css['mobile']) ? $additional_css['mobile'] : '';
                $additional_css_desktop = isset($additional_css['desktop']) ? $additional_css['desktop'] : '';
            } else {
                $additional_css_all = $additional_css;
            }
            $selector = isset($field['selector']) ? ($field['selector']) : "";
            $css_property = isset($field['css_property']) ? ($field['css_property']) : "";

            ?>
            <div class="yatri--group-field ft--<?php echo esc_attr($type);
            echo $is_multiple_device ? ' yatri--multiple-devices ' : ' ';
            echo esc_attr($additional_class); ?>"
                 data-field-name="<?php echo esc_attr($field_name); ?>"
                 data-field-id="<?php echo esc_attr($field_name); ?>"
                 data-field-selector="<?php echo esc_attr($selector); ?>"
                 data-field-additional-css-mobile='<?php echo esc_attr($additional_css_mobile); ?>'
                 data-field-additional-css-tablet='<?php echo esc_attr($additional_css_tablet); ?>'
                 data-field-additional-css-desktop='<?php echo esc_attr($additional_css_desktop); ?>'
                 data-field-additional-css-all='<?php echo esc_attr($additional_css_all); ?>'
                 data-field-css-property="<?php echo esc_attr($css_property); ?>"
            >


                <div class="yatri-field-header">

                    <div class="yatri-field-heading">
                        <?php if ($type == 'heading') {

                            echo '<h3 class="yatri-heading">' . esc_html($field['label']) . '</h3>';
                        } else { ?>
                            <label class="customize-control-title"><?php echo esc_html($field['label']); ?></label>

                            <?php
                            if ($is_multiple_device) {
                                $this->device_selector($devices);
                            }

                        } ?>

                    </div>


                </div>

                <?php
                if ($is_multiple_device) {

                    foreach ($devices as $device) {

                        $this->device_template_wrap_start($device);

                        $this->single_field($field, $device, $type);

                        $this->device_template_wrap_end();
                    }
                } else {

                    $this->single_field($field, false, $type);
                }
                ?>

            </div>
            <?php

        }
    }

    private function get_field_value($field_name = '', $default_value = '', $device = false, $field_type = 'text')
    {
        $field_value = '';


        $current_value = !empty($field_name) && isset($this->value_array[$field_name]) ? $this->value_array[$field_name] : '';

        switch ($field_type) {

            case "padding":
            case "margin":
            case "color":
            case "overlay":
            case "image":
            case "border":
            case "select":
            case "text":
            case "number":
            case "range":
            case "font":
            case "font_weight":
            case "checkbox":
            case "alignment":
            case "font_languages":
                $default_value = empty($default_value) ? array() : $default_value;
                $current_value = empty($current_value) ? array() : $current_value;
                $field_value = wp_parse_args($current_value, $default_value);
                break;
        }
        return ($device && isset($field_value[$device])) ? $field_value[$device] : $field_value;

    }

    public function single_field($field = array(), $device = false, $field_type = 'text')
    {
        $field_name = $field['name'] ? $field['name'] : '';

        $device_attr = $device ? 'data-device="' . esc_attr($device) . '"' : '';

        if ($device) {

            $default_value = isset($field['default']) && isset($field['default'][$device]) ? $field['default'][$device] : '';
        } else {

            $default_value = isset($field['default']) ? $field['default'] : '';
        }


        $field_value = $this->get_field_value($field_name, $default_value, $device, $field_type);

        $disabled_fields = array();

        if (isset($field['disabled_fields'])) {

            $disabled_fields = $device && isset($field['disabled_fields'][$device]) ? $field['disabled_fields'][$device] : $field['disabled_fields'];
        }

        $extra_value_attributes = array();

        if (isset($field['extra_value_attributes'])) {

            $extra_value_attributes = $device && isset($field['extra_value_attributes'][$device]) ? $field['extra_value_attributes'][$device] : $field['extra_value_attributes'];
        }


        if ($field_type == 'heading') {
            return;
        }

        switch ($field_type) {
            case "padding":
                include "modal/fields/padding.php";
                break;
            case "font":
                include "modal/fields/font.php";
                break;
            case "font_weight":
                include "modal/fields/select.php";
                break;
            case "select":
                include "modal/fields/select.php";
                break;
            case "checkbox":
                include "modal/fields/checkbox.php";
                break;
            case "font_languages":
                include "modal/fields/font-languages.php";
                break;
            case "margin":
                include "modal/fields/margin.php";
                break;
            case "color":
                include "modal/fields/color.php";
                break;
            case "image":
                include "modal/fields/image.php";
                break;
            case "border":
                include "modal/fields/border.php";
                break;
            case "number":
                include "modal/fields/number.php";
                break;
            case "text":
                include "modal/fields/text.php";
                break;
            case "range":
                include "modal/fields/range.php";
                break;
            case "overlay":
                include "modal/fields/overlay.php";
                break;
            case "alignment":
                include "modal/fields/alignment.php";
                break;
            default:
                include "modal/fields/text.php";
                break;
        }
        ?>

        <?php

    }

}
