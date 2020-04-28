<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * Class to create a custom tags control
 */
class Optimizer_Editor_Control extends WP_Customize_Control
{
	public $type = 'editor';
      /**
       * Render the content on the theme customizer page
       */
	public function render_content() { ?>

		<label>
			<?php if ( !empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>
			<input type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>" id="<?php echo $this->id; ?>" class="editorfield">
			<a onclick="javascript:WPEditorWidget.showEditor('<?php echo $this->id; ?>');" class="button edit-content-button"><?php _e( 'Edit content', 'optimizer' ); ?></a>
		</label>
		<?php
	}
}