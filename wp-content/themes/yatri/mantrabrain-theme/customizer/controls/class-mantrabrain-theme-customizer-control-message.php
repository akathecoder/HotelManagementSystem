<?php
/**
 * Customizer Control: Heading
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

/**
 * A text control with validation for CSS units.
 */
class Mantrabrain_Theme_Customizer_Control_Message extends Mantrabrain_Theme_Customizer_Control_Base
{


    public function __construct(WP_Customize_Manager $manager, $id, array $args = array())
    {
        parent::__construct($manager, $id, $args);

        $this->focus_id = isset($args['focus_id']) ? $args['focus_id'] : '';

        $this->message_type = isset($args['message_type']) ? $args['message_type'] : 'yatri-notice';

    }

    /**
     * The control type.
     *
     * @access public
     * @var string
     */
    public $type = 'yatri-message';


    /**
     * Enqueue our scripts and styles
     */
    public function enqueue()
    {

        $css_uri = YATRI_THEME_URI . 'mantrabrain-theme/customizer/controls/message/';

        wp_enqueue_script('yatri-message-control-js', $css_uri . 'message.js', array('jquery'), YATRI_THEME_VERSION);
        $message_args = array(
            'admin_customizer_url' => admin_url('customizer.php')
        );
        wp_localize_script('yatri-message-control-js', 'yatriMessageControlObj', $message_args);
        wp_enqueue_style('yatri-message-control-css', $css_uri . 'message.css', array(), YATRI_THEME_VERSION);


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
    protected function render_content()
    {
        $focus_id = isset($this->focus_id) && !empty($this->focus_id) ? $this->focus_id : '';

        $class = isset($this->message_type) ? $this->message_type : 'yatri-notice';
        ?>

        <div class="yatri-control-message-wrapper <?php echo esc_attr($class); ?>" <?php echo !empty($focus_id) ? 'data-click-autofocus="' . esc_attr($focus_id) . '"' : ''; ?>>
            <label>
                <?php if (!empty($this->label)) { ?>
                    <?php
                    echo wp_kses($this->label, array(
                            'a' => array('href' => array()),
                            'span' => array()
                        )
                    );
                    ?>
                <?php } ?>
            </label>
        </div>
        <?php
    }
}

