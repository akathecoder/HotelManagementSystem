<?php

/**
 * Creates a toggle control
 */
class Optimizer_Controls_Toggle_Control extends WP_Customize_Control {

	public $type = 'toggle';

	/**
	 * Render the control's content.
	 */
	public function render_content() { ?>
		<label>
			<div class="switch-info">
				<input style="display: none;" type="checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?> />
			</div>
		<?php if ( !empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif; ?>
 
		<?php if ( !empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo $this->description; ?></span>
		<?php endif; ?>
			<?php $classes = ( esc_attr( $this->value() ) ) ? ' On' : ' Off'; ?>
			<?php $classes .= ' Round'; ?>
			<div class="Switch <?php echo $classes; ?>">
				<div class="Toggle"></div>
			</div>
		</label>
		<?php
	}
}
