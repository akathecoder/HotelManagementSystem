<?php

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'CosmosWP_Custom_Control_Group' )):

	/**
	 * Custom Control Group
	 * @package CosmosWP
	 * @subpackage CosmosWP
	 * @since 1.0.0
	 *
	 */
	class CosmosWP_Custom_Control_Group extends WP_Customize_Control {
		
		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'group';

		public $label = '';


		/**
		 * The fields that each container row will contain.
		 *
		 * @access public
		 * @var array
		 */
		public $fields = array();

		/**
		 * Repeater drag and drop controler
		 *
		 * @since  1.0.0
		 */
		public function __construct( $manager, $id, $args = array(), $fields = array() ) {
			$this->fields         = $fields;
			$this->label          = $args['label'];
			parent::__construct( $manager, $id, $args );
		}

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

		public function render_content() {
			if( is_array( $this->value() ) && !empty( $this->value() )){
				$values = json_encode( $this->value() );
			}
			else{
				$values = $this->value();
			}
			?>
            <ul class="group-field-control-wrap">
				<?php $this->get_fields(); ?>
            </ul>
            <input type="hidden" <?php $this->link(); ?> class="cosmoswp-group-collection" value="<?php echo esc_attr( $values ); ?>"/>
			<?php
		}

		private function get_fields() {
			$fields = $this->fields;
			if( is_array( $this->value() ) && !empty( $this->value() )){
				$values = $this->value();
			}
			else{
				$values = json_decode( $this->value(),true );
			}
            ?>
            <li class="group-field-control">
                <h3 class="accordion-section-title">
					<?php
					echo "<span class='group-field-title'>".esc_html( $this->label ).'</span>';
					?>
                </h3>

				<?php if ( $this->description ) { ?>
	                <span class="description customize-control-description">
	                    <?php echo wp_kses_post( $this->description ); ?>
	                </span>
					<?php
				}
				?>
                <div class="group-fields hidden">
					<?php
					foreach ( $fields as $key => $field ) {
                        $class = isset( $field['class'] ) ? $field['class'] : '';
						?>
                        <div class="single-field type-<?php echo esc_attr( $field['type'] ) . ' ' . $class; ?>">
							<?php
							$label       = isset( $field['label'] ) ? $field['label'] : '';
							$description = isset( $field['description'] ) ? $field['description'] : '';
							if ( $field['type'] != 'checkbox' ) { ?>
                                <span class="customize-control-title"><?php echo esc_html( $label ); ?></span>
                                <span class="description customize-control-description"><?php echo esc_html( $description ); ?></span>
								<?php
							}
							$new_value = isset( $values[$key] ) ? $values[$key] : '';
							$default   = isset( $field['default'] ) ? $field['default'] : '';

							switch ( $field['type'] ) {
								case 'responsive_number':
									$desktop_value = isset($new_value['desktop'])?$new_value['desktop']:'';
									$tablet_value = isset($new_value['tablet'])?$new_value['tablet']:'';
									$mobile_value = isset($new_value['mobile'])?$new_value['mobile']:'';

									$desktop_default = isset($default['desktop'])?$default['desktop']:'';
									$tablet_default = isset($default['tablet'])?$default['tablet']:'';
									$mobile_default = isset($default['mobile'])?$default['mobile']:'';

									$min = isset( $field['min'] )?$field['min']:0;
									$max = isset( $field['max'] )?$field['max']:1000;
									$step = isset( $field['step'] )?$field['step']:1;
									?>
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
                                    <div class="responsive-switchers-fields" data-responsive-name="<?php echo esc_attr( $key );?>">
                                        <ul class="desktop control-wrap active">

                                            <li class="group-wrap desktop_top">
                                                <input data-default="<?php echo esc_attr( $desktop_default );?>" min="<?php echo esc_attr($min); ?>" max="<?php echo esc_attr($max); ?>" step="<?php echo esc_attr( $step );?>" type="number" class="group-desktop responsive-range" value="<?php echo esc_attr( $desktop_value );?>">
                                            </li>
                                        </ul>

                                        <ul class="tablet control-wrap">

                                            <li class="group-wrap tablet_top">
                                                <input data-default="<?php echo esc_attr( $tablet_default );?>" min="<?php echo esc_attr($min); ?>" max="<?php echo esc_attr($max); ?>" step="<?php echo esc_attr( $step );?>" type="number" class="group-tablet responsive-range" value="<?php echo esc_attr( $tablet_value );?>">
                                            </li>
                                        </ul>

                                        <ul class="mobile control-wrap">

                                            <li class="group-wrap mobile_top">
                                                <input data-default="<?php echo esc_attr( $mobile_default );?>" min="<?php echo esc_attr($min); ?>" max="<?php echo esc_attr($max); ?>" step="<?php echo esc_attr( $step );?>"  type="number" class="group-mobile responsive-range" value="<?php echo esc_attr( $mobile_value );?>">
                                            </li>
                                        </ul>
                                    </div>


									<?php
									break;

								case 'color':
									echo '<div class="customize-control-alpha-color" data-color-single-name="' . esc_attr( $key ) . '"><input class="cwp-alpha-color-control" data-default-color="' . esc_attr( $default ) . '" data-default="' . esc_attr( $default ) . '" data-single-name="' . esc_attr( $key ) . '" type="text" value="' . esc_attr( $new_value ) . '"/></div>';
									break;

								case 'text':
									echo '<input data-default="' . esc_attr( $default ) . '" data-single-name="' . esc_attr( $key ) . '" type="text" value="' . esc_attr( $new_value ) . '"/>';
									break;

								case 'url':
									echo '<input data-default="' . esc_attr( $default ) . '" data-single-name="' . esc_attr( $key ) . '" type="url" value="' . esc_url( $new_value ) . '"/>';
									break;

								case 'checkbox':
								    echo "<span class='customize-control-checkbox-wrap'>";
									echo '<input id="' . esc_attr( $this->id.'-checkbox' ) . '" '.checked(true, $new_value,false).' data-default="' . esc_attr( $default ) . '" data-single-name="' . esc_attr( $key ) . '" type="checkbox" value="' . esc_attr( $new_value ) . '"/>';
									?>
                                    <label for="<?php echo  esc_attr( $this->id.'-checkbox' ); ?>" class="customize-control-title checkbox"><?php echo esc_html( $label ); ?></label>
                                    </span>
                                    <span class="description customize-control-description"><?php echo esc_html( $description ); ?></span>
									<?php
									break;

								case 'textarea':
									echo '<textarea data-default="' . esc_attr( $default ) . '"  data-single-name="' . esc_attr( $key ) . '">' . esc_textarea( $new_value ) . '</textarea>';
									break;

								case 'select':
									$options = $field['options'];
									echo '<select  class="group-control-select" data-value="' . esc_attr( $new_value ) . '" data-default="' . esc_attr( $default ) . '"  data-single-name="' . esc_attr( $key ) . '">';
									if( !empty( $options )){
										foreach ( $options as $option => $val ) {
											printf( '<option value="%s" %s>%s</option>', esc_attr( $option ), selected( $new_value, $option, false ), esc_html( $val ) );
										}
                                    }
									echo '</select>';
									break;

								case 'icons':
									?>
                                    <span class="customize-icons">
										<?php
										cosmoswp_icon_holder( $new_value );
										echo '<input class="cosmoswp-icon-value"  data-default="' . esc_attr( $default ) . '" data-single-name="' . esc_attr( $key ) . '" type="hidden" value="' . esc_attr( $new_value ) . '"/>';
										?>
                                    </span>
									<?php
									break;

								case 'cssbox':
									$this->css_box( $new_value, $key, $field );
									break;

								case 'image':

									$cosmoswp_display_none = '';
									if ( empty( $new_value ) ){
										$cosmoswp_display_none = ' style="display:none;" ';
									}
									echo '<input data-default="' . esc_attr( $default ) . '" data-single-name="' . esc_attr( $key ) . '" type="text" value="' . esc_attr( $new_value ) . '" class="hidden image-value-url"/>';
									?>
                                    <span class="img-preview-wrap" <?php echo  $cosmoswp_display_none ; ?>>
                                            <img class="widefat" src="<?php echo esc_url( $new_value ); ?>" alt="<?php esc_attr_e( 'Image preview', 'cosmoswp' ); ?>"  />
                                    </span><!-- .img-preview-wrap -->
                                    <input type="button" value="<?php esc_attr_e( 'Upload Image', 'cosmoswp' ); ?>" class="button cosmoswp-image-upload" data-title="<?php esc_attr_e( 'Select Image','cosmoswp'); ?>" data-button="<?php esc_attr_e( 'Select Image','cosmoswp'); ?>"/>
                                    <input type="button" value="<?php esc_attr_e( 'Remove Image', 'cosmoswp' ); ?>" class="button cosmoswp-image-remove" />

									<?php
									break;

								default:
									break;
							}
							?>
                        </div>
						<?php
					}
					?>

                    <div class="clearfix group-footer">
                        <a class="group-field-close" href="#close">
							<?php esc_html_e( 'Close', 'cosmoswp' ) ?>
                        </a>
                    </div>
                </div>
            </li>
			<?php
		}

		public function css_box( $values = array(),$key, $cssbox_fields  ) {
			$box_fields = isset( $cssbox_fields['box_fields'] )?$cssbox_fields['box_fields']:array();
			$attr = isset( $cssbox_fields['attr'] )?$cssbox_fields['attr']:array();
			$devices = array(
				'desktop'=>array(
					'icon' => 'dashicons-laptop',
				),
				'tablet'=>array(
					'icon' => 'dashicons-tablet',

				),
				'mobile'=>array(
					'icon' => 'dashicons-smartphone ',
				),
			);
			$default_fields = array(
				'top'=> true,
				'right'=> true,
				'bottom'=> true,
				'left'=> true,
			);
			$box_fields_attr =  !empty($box_fields)? $box_fields : $default_fields;

			$min = isset( $attr['min'] )?$attr['min']:0;
			$max = isset( $attr['max'] )?$attr['max']:1000;
			$step = isset( $attr['step'] )?$attr['step']:1;
			$link = isset( $attr['link'] )?$attr['link']:1;
			$link_toggle = isset( $attr['link_toggle'] )?$attr['link_toggle']:true;
			$devices = isset( $attr['devices'] )?$attr['devices']:$devices;
			$link_text = isset( $attr['link_text'] )?$attr['link_text']:esc_html__('Link','cosmoswp');

			if( count($devices) > 1 ){
			    ?>
                <ul class="responsive-switchers">
					<?php
					$i = 1;
					foreach( $devices as $device_id => $device_details ){
						if( $i == 1){
							$active = ' active';
						}
						else{
							$active = '';
						}
						?>
                        <li class="<?php echo esc_attr( $device_id );?>">
                            <button type="button" class="preview-<?php echo esc_attr( $device_id ).' '.$active;?>" data-device="<?php echo esc_attr( $device_id );?>">
                                <i class="dashicons <?php echo esc_attr( $device_details['icon'] );?>"></i>
                            </button>
                        </li>
						<?php
						$i ++;
					}
					?>
                </ul>
                <?php
            }
			?>
            <div class="responsive-switchers-cssboxfields" data-responsive-name="<?php echo esc_attr( $key );?>">
			<?php
			$i = 1;
			foreach( $devices as $device_id => $device_details ){
				if( $i == 1){
					$active = ' active';
				}
				else{
					$active = '';
				}
				echo '<ul class="groupcssbox-device-wrap control-wrap '.$device_id.' '.$active.'">';

				foreach( $box_fields_attr as $field_id => $box_single_field ){

					$value = isset( $values[$device_id][$field_id] )?$values[$device_id][$field_id]:'';
					$default = isset( $box_single_field[$device_id][$field_id] )?$box_single_field[$device_id][$field_id]:'';
					if ( ! $value ) {
						if ( isset( $box_single_field['default'] ) ) {
							$value = $box_single_field['default'];
						}
					}
					echo "<li>";
					?>
                    <label>
                        <span>
                            <?php echo ucfirst(esc_attr( $field_id )) ?>
                        </span>
                        <input data-device="<?php echo esc_attr( $device_id )?>" data-cssbox-name="<?php echo esc_attr( $field_id )?>" data-default="<?php echo esc_attr( $default );?>" min="<?php echo esc_attr($min); ?>" max="<?php echo esc_attr($max); ?>" step="<?php echo esc_attr( $step );?>" type="number" class="groupcssbox-field" value="<?php echo esc_attr( $value );?>">
                    </label>
					<?php
					echo "</li>";
				}
				if( $link ){
					$cssbox_link = isset( $values[$device_id]['cssbox_link'] )?$values[$device_id]['cssbox_link']:'';
					$link_toggle_class = $link_toggle?'groupcssbox_link' : '';
					?>
                    <li>
                        <label>
                            <span title="<?php echo esc_attr( $link_text ); ?>"><?php echo esc_html ( $link_text ); ?></span>
                            <span class="field-link">
                                <input data-device="<?php echo esc_attr( $device_id )?>" data-cssbox-name="cssbox_link" data-default="<?php echo esc_attr( $default );?>"  type="checkbox" class="groupcssbox-field <?php echo $link_toggle_class;?>" value="<?php echo esc_attr( $value );?>" <?php checked(true, $cssbox_link,true)?>>
                                <span class="tgl-btn"></span>
                            </span>
                        </label>
                    </li>
					<?php
				}
				echo '</ul>';
				$i ++;
			}
			?>
            </div>
			<?php
		}
	}
endif;