<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Buttonset control
 */
class Yatri_Tools_Prebuilt_Header_Templates extends WP_Customize_Control
{
    public $templates = array();


    /**
     * The control type.
     *
     * @access public
     * @var string
     */
    public $type = 'yatri-prebuilt-header';

    /**
     * Enqueue control related scripts/styles.
     *
     * @access public
     */
    public function enqueue()
    {

        $script_uri = YATRI_TOOLS_PLUGIN_URI . 'includes/customizer/controls/prebuilt-header/';


        //wp_enqueue_script('jquery-ui-resizable');
        wp_enqueue_script('yatri-prebuilt-header-template-control-js', $script_uri . 'prebuilt-header-template.js', array('jquery', 'customize-base'), YATRI_THEME_VERSION, true);

        wp_enqueue_style('yatri-prebuilt-header-template-control-css', $script_uri . 'prebuilt-header-template.css', array(), YATRI_THEME_VERSION);
        $customize_url = admin_url('customize.php');
        $params = array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'import_nonce' => wp_create_nonce('yatri_tools_import_template_nonce'),
            'auto_focus_url' => add_query_arg(array('autofocus' => array('section' => 'yatri_section_prebuilt_header_templates_options')), $customize_url),

        );

        wp_localize_script('yatri-prebuilt-header-template-control-js', 'yatriToolsPrebuiltHeaderTemplateParams', $params);

    }

    /**
     * Refresh the parameters passed to the JavaScript via JSON.
     *
     * @see WP_Customize_Control::to_json()
     */
    public function to_json()
    {

        parent::to_json();

        if (isset($this->default)) {
            $this->json['default'] = $this->default;
        } else {
            $this->json['default'] = $this->setting->default;
        }
        $this->json['value'] = $this->value();
        $this->json['choices'] = $this->choices;
        $this->json['link'] = $this->get_link();
        $this->json['id'] = $this->id;
        $this->json['templates'] = $this->templates;


        $this->json['inputAttrs'] = '';
        foreach ($this->input_attrs as $attr => $value) {
            $this->json['inputAttrs'] .= $attr . '="' . esc_attr($value) . '" ';
        }

    }

    /**
     * An Underscore (JS) template for this control's content (but not its container).
     *
     * Class variables for this control class are available in the `data` JS object;
     * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
     *
     * @see WP_Customize_Control::print_template()
     *
     * @access protected
     */
    protected function content_template()
    {
        $export_nonce = wp_create_nonce('yatri_tools_export_template_nonce');

        $download_link = admin_url('admin-ajax.php?nonce=' . $export_nonce . '&action=yatri_tools_export_header_template');
        ?>
        <div class="mantrabrain-customizer-prebuilt-header">
            <# if ( data.label ) { #>
            <span class="customize-control-title">{{{ data.label }}}</span>
            <# } #>
            <# if ( data.description ) { #>
            <span class="description customize-control-description">{{{ data.description }}}</span>
            <# } #>

            <input {{{ data.inputAttrs }}} type="hidden"
                   name="_customize-text-{{{ data.id }}}" id="{{ data.id }}" {{{ data.link }}}/>

            <a data-templates="{{JSON.stringify(data.templates)}}"
               class="button yatri-open-prebuilt-header-templates"><?php echo esc_html__('Open Templates', 'yatri-tools') ?></a>
            <a target="_blank" href="<?php echo esc_url($download_link); ?>"
               class="button"><?php echo esc_html__('Export Current Header', 'yatri-tools') ?></a>

        </div>
        <?php
    }
}
