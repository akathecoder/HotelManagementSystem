<?php
if (!class_exists('WP_Customize_Control'))
    return;

/**
 * Class to create a custom tags control
 */
class Mantrabrain_Theme_Customizer_Control_Template extends Mantrabrain_Theme_Customizer_Control_Base
{
    private $template_id;

    public function __construct(WP_Customize_Manager $manager, $id, array $args = array())
    {
        $this->template_id = isset($args['template_id']) ? $args['template_id'] : '';

        parent::__construct($manager, $id, $args);

    }


    /**
     * The type of control being rendered
     */
    public $type = 'yatri_template_control';

    /**
     * Enqueue our scripts and styles
     */
    public function enqueue()
    {

        $script_uri = YATRI_THEME_URI . 'mantrabrain-theme/customizer/controls/template/';


        wp_enqueue_script('yatri-template-control-js', $script_uri . 'template.js', array('jquery'), YATRI_THEME_VERSION, true);

        $save_nonce_key = 'yatri_save_template_' . $this->template_id . '_nonce';
        $remove_nonce_key = 'yatri_remove_template_' . $this->template_id . '_nonce';

        $params = array(
            'ajax_url' => admin_url('admin-ajax.php'),

            '_save_nonce' => wp_create_nonce($save_nonce_key),

            '_remove_template_nonce' => wp_create_nonce($remove_nonce_key),

        );

        wp_localize_script('yatri-template-control-js', 'yatriTemplateParams', $params);


        wp_enqueue_style('yatri-template-control-css', $script_uri . 'template.css', array(), YATRI_THEME_VERSION);


    }


    /**
     * Render the control in the customizer
     */
    public function render_content()
    {
        $default = isset($this->setting->default) ? $this->setting->default : '';


        ?>
        <div class="yatri-template-control">
            <?php
            $this->field_header();
            ?>
            <div class="yatri-template-control-field">
                <div class="save-template-form">
                    <input type="text" data-template-id="<?php echo esc_attr($this->template_id); ?>"
                           class="yatri-template-name"/>
                    <button class="button button-secondary yatri-save-header-template"
                            type="button"><?php echo esc_html__('Save', 'yatri') ?></button>
                </div>
            </div>
            <ul class="template-list">

                <?php $templates = yatri_customizer_get_header_templates($this->template_id);

                foreach ($templates as $uniq_id => $template_data) {

                    $template_name = isset($template_data['template_name']) ? $template_data['template_name'] : '';

                    echo '<li data-id="' . esc_attr($this->template_id) . '" data-uniqid="' . esc_attr($uniq_id) . '">';

                    echo '<span>' . $template_name . '</span>';

                    echo '<a class="yatri-remove-template dashicons dashicons-trash" href="#"></a>';

                    echo '</li>';
                }
                ?>

            </ul>

        </div>
        <?php
    }

}