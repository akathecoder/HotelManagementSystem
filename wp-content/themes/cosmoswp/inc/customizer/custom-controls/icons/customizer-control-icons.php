<?php
if (!function_exists('cosmoswp_icon_holder')) {

	function cosmoswp_icon_holder( $value ){
		?>
        <span class="icon-preview">
            <?php if ( ! empty( $value ) ) {
                echo '<i class="' . esc_attr( cosmoswp_get_correct_fa_font($value) ) . '"></i>';
            }
            ?>
        </span>
        <span class="icon-toggle">
            <?php echo( empty( $value ) ? __( 'Add Icon', 'cosmoswp' ) : esc_html__( 'Edit Icon', 'cosmoswp' ) ); ?>
            <span class="dashicons dashicons-arrow-down"></span>
        </span>
        <span class="icons-list-wrapper hidden">
            <input class="icon-search" type="text" placeholder="<?php esc_attr_e( 'Search Icon', 'cosmoswp' ) ?>">
			<?php
			$fa_icon_list_array = cosmoswp_icons_array();
			foreach ( $fa_icon_list_array as $single_icon ) {
				if ( $value == $single_icon ) {
					echo '<span class="single-icon selected"><i data-class="' . esc_attr( $single_icon ) . '" class="' . esc_attr( cosmoswp_get_correct_fa_font( $single_icon ) ) . '"></i></span>';
				} else {
					echo '<span class="single-icon"><i data-class="' . esc_attr( $single_icon ) . '" class="' . esc_attr( cosmoswp_get_correct_fa_font( $single_icon ) ) . '" ></i></span>';
				}
			}
			?>
        </span>
		<?php
	}
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'CosmosWP_Customize_Icons_Control' )):
	/**
	 * Custom Control for Icons Controls
	 * @package CosmosWP
	 * @subpackage CosmosWP
	 * @since 1.0.0
	 *
	 */

	class CosmosWP_Customize_Icons_Control extends WP_Customize_Control {
		public $type = 'icons-control';
		public function enqueue() {}
		public function render_content() {
			$value = $this->value();
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<span class="customize-icons">
                    <?php
                    cosmoswp_icon_holder( $value);
                    ?>
                    <input type="hidden" class="cosmoswp-icon-value" value="" <?php $this->link(); ?>>
                </span>
			</label>

			<?php
		}
	}
endif;