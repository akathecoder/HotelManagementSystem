<?php
/**
 * Customize Editor control class.
 */

class Mantrabrain_Theme_Customizer_Control_Editor extends WP_Customize_Control
{

    /**
     * Customize control type.
     *
     * @access public
     * @var    string
     */
    public $type = 'yatri_editor_control';


    public function enqueue()
    {

        wp_enqueue_editor();

        $script_uri = YATRI_THEME_URI . 'mantrabrain-theme/customizer/controls/editor/';


        wp_enqueue_style('yatri-editor-control-css', $script_uri . 'editor.css', array(), YATRI_THEME_VERSION);

        wp_enqueue_script('yatri-editor-control-js', $script_uri . 'editor.js', array('jquery', 'customize-base'), YATRI_THEME_VERSION, true);


    }

    public function to_json()
    {
        parent::to_json();

        $this->json['default'] = $this->setting->default;
        if ( isset( $this->default ) ) {
            $this->json['default'] = $this->default;
        }

        $this->json['id']      = $this->id;
        $this->json['value']   = $this->value();
        $this->json['choices'] = $this->choices;
        $this->json['link']    = $this->get_link();


        $this->json['inputAttrs'] = '';
        foreach ( $this->input_attrs as $attr => $value ) {
            $this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
        }

    }

    /**
     * Renders the Underscore template for this control.
     *
     * @see    WP_Customize_Control::print_template()
     * @access protected
     * @return void
     */
    protected function content_template()
    {
        ?>
        <#
        /* Fix for option type customizer control. */
        var dataId = data.id.replace( /\[|\]/g, '' ),
        dataLink = data.link.replace( /\[|\]/g, '' );
        #>

        <label>
            <# if ( data.label ) { #><span class="customize-control-title">{{{ data.label }}}</span><# } #>
            <# if ( data.description ) { #><span class="description customize-control-description">{{{ data.description }}}</span><#
            } #>
        </label>
        <textarea class="yatri_customizer_control_editor" id="yatri_editor_control-{{{ dataId }}}" {{{ data.inputAttrs }}} {{{ data.link }}}>{{ data.value }}</textarea>

        <?php
    }

}
