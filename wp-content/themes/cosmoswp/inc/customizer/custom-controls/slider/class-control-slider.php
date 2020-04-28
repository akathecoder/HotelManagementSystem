<?php
/**
 * Customizer Control: cosmoswp-slider.
 *
 * @package     CosmosWP WordPress theme
 * @subpackage  Controls
 * @see   		https://github.com/aristath/kirki
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Buttonset control
 */
class CosmosWP_Custom_Control_Slider extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'cosmoswp-slider';

	/**
	 * Renders the control wrapper and calls $this->render_content() for the internals.
	 *
	 * @see WP_Customize_Control::render()
	 */
	protected function render() {
		$id    = 'customize-control-' . str_replace( array( '[', ']' ), array( '-', '' ), $this->id );
		$class = 'customize-control has-switchers customize-control-' . $this->type;

		?><li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<?php $this->render_content(); ?>
		</li><?php
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();

		$this->json['id'] 		= $this->id;

		$this->json['inputAttrs'] = '';
		foreach ( $this->input_attrs as $attr => $value ) {
			$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
		}
		$this->json['link']        = $this->get_link();

		$this->json['value']       = $this->value();

		if( !empty( $this->value() )){
		    $device_values = json_decode($this->value(),true);
		    if( is_array( $device_values )){
		        foreach ( $device_values as $device => $val ){
			        $this->json[$device] = $val;
                }
            }
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
	protected function content_template() {
		?>
		<#
        if ( data.label ) { #>
			<span class="customize-control-title">
				<span>{{{ data.label }}}</span>

				<ul class="responsive-switchers">
					<li class="desktop">
						<button type="button" class="preview-desktop active" data-device="desktop">
							<i class="dashicons dashicons-desktop"></i>
						</button>
					</li>
					<li class="tablet">
						<button type="button" class="preview-tablet" data-device="tablet">
							<i class="dashicons dashicons-tablet"></i>
						</button>
					</li>
					<li class="mobile">
						<button type="button" class="preview-mobile" data-device="mobile">
							<i class="dashicons dashicons-smartphone"></i>
						</button>
					</li>
				</ul>

			</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

        <div class="desktop control-wrap active">
            <div class="cosmoswp-slider desktop-slider"></div>
            <div class="cosmoswp-slider-input">
                <input  {{{ data.inputAttrs }}} type="number" data-device="desktop" class="slider-input desktop-input" value="{{ data.desktop }}" />
            </div>
        </div>

        <div class="tablet control-wrap">
            <div class="cosmoswp-slider tablet-slider"></div>
            <div class="cosmoswp-slider-input">
                <input  {{{ data.inputAttrs }}} type="number" data-device="tablet" class="slider-input tablet-input" value="{{ data.tablet }}" />
            </div>
        </div>

        <div class="mobile control-wrap">
            <div class="cosmoswp-slider mobile-slider"></div>
            <div class="cosmoswp-slider-input">
                <input  {{{ data.inputAttrs }}} type="number" data-device="mobile" class="slider-input mobile-input" value="{{ data.mobile }}"  />
            </div>
        </div>

        <input id="{{ data.id }}" class="cosmoswp-slider-collection" type="hidden" value="{{ data.value }}" {{{ data.link }}} />
        <?php
	}
}