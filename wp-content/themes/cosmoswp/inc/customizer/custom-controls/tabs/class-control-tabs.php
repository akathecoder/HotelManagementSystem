<?php
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'CosmosWP_Custom_Control_Tabs' )):

	/**
	 * Custom Control Tabs
	 * @package CosmosWP
	 * @subpackage CosmosWP
	 * @since 1.0.0
	 *
	 */
	class CosmosWP_Custom_Control_Tabs extends WP_Customize_Control {
		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'tabs';

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

		protected function render() {
			$id    = 'customize-control-' . str_replace( array( '[', ']' ), array( '-', '' ), $this->id );
			$class = 'customize-control has-switchers customize-control-' . $this->type;

			?><li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<?php $this->render_content(); ?>
            </li><?php
		}

		public function render_content() {
			?>
			<span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
            </span>
			<?php if ( $this->description ) { ?>
				<span class="description customize-control-description">
                    <?php echo wp_kses_post( $this->description ); ?>
                </span>
				<?php
			}
			?>
			<ul class="tabs-field-control-wrap">
				<?php $this->get_fields(); ?>
			</ul>
			<input type="hidden" <?php $this->link(); ?> class="cosmoswp-tabs-collection" value="<?php echo esc_attr( $this->value() ); ?>"/>
			<?php
		}

		private function get_fields() {
			$fields = $this->fields;
			$tabs = $fields['tabs'];
			$tabs_fields = $fields['fields'];
			$values = json_decode( $this->value(), true );
			?>
			<li class="tabs-field-control">
				<?php
				echo '<div class="tabs-menu">';
				echo '<ul class="tabs">';
				$i = 1;
				foreach( $tabs as $tab_id => $tab_details ){
					$active = '';
					if( $i == 1){
						$active = ' class="active"';
					}
					$tab_label = esc_html( $tab_details['label'] );
					echo '<li'.$active.'><a href="#" data-id="'.esc_attr( $tab_id ).'" class="tab-trigger">'.$tab_label.'</a></li>';
					foreach( $tabs_fields as $field_id => $tab_single_field ){
						if($tab_single_field['tab'] == $tab_id ){
							/*Set array current menus sections*/
							$tabs_and_fields[$tab_id][$field_id] = $tab_single_field;
						}
					}
					$i ++;
				}
				echo '</ul>';
				echo '</div>';
				echo '<div class="cosmoswp-inner-tabs-content">';
				$i = 1;
				foreach( $tabs_and_fields as $tab_id => $tab_fields ){
					if( $i == 1){
						$active = ' active';
					}
					else{
						$active = ' ';
					}
					echo '<div class="fields-tabs-content '.$active.' '.esc_attr( $tab_id ).'">';

					foreach( $tab_fields as $key => $field ){
                        echo '<div class="single-field type-'.esc_attr( $field["type"] ).'">';


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
								$desktop_value = isset($new_value->desktop)?$new_value->desktop:'';
								$tablet_value = isset($new_value->tablet)?$new_value->tablet:'';
								$mobile_value = isset($new_value->mobile)?$new_value->mobile:'';

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

										<li class="tabs-wrap desktop_top">
											<input data-default="<?php echo esc_attr( $desktop_default );?>" min="<?php echo esc_attr($min); ?>" max="<?php echo esc_attr($max); ?>" step="<?php echo esc_attr( $step );?>" type="number" class="tabs-desktop responsive-range" value="<?php echo esc_attr( $desktop_value );?>">
										</li>
									</ul>

									<ul class="tablet control-wrap">

										<li class="tabs-wrap tablet_top">
											<input data-default="<?php echo esc_attr( $tablet_default );?>" min="<?php echo esc_attr($min); ?>" max="<?php echo esc_attr($max); ?>" step="<?php echo esc_attr( $step );?>" type="number" class="tabs-tablet responsive-range" value="<?php echo esc_attr( $tablet_value );?>">
										</li>
									</ul>

									<ul class="mobile control-wrap">

										<li class="tabs-wrap mobile_top">
											<input data-default="<?php echo esc_attr( $mobile_default );?>" min="<?php echo esc_attr($min); ?>" max="<?php echo esc_attr($max); ?>" step="<?php echo esc_attr( $step );?>"  type="number" class="tabs-mobile responsive-range" value="<?php echo esc_attr( $mobile_value );?>">
										</li>
									</ul>
								</div>

								<?php
								break;

							case 'color':
								echo '<div class="customize-control-alpha-color" data-single-name="' . esc_attr( $key ) . '"><input class="cwp-alpha-color-control" data-default-color="' . esc_attr( $default ) . '" data-default="' . esc_attr( $default ) . '" data-single-name="' . esc_attr( $key ) . '" type="text" value="' . esc_attr( $new_value ) . '"/></div>';
								break;

							case 'text':
								echo '<input data-default="' . esc_attr( $default ) . '" data-single-name="' . esc_attr( $key ) . '" type="text" value="' . esc_attr( $new_value ) . '"/>';
								break;

							case 'url':
								echo '<input data-default="' . esc_attr( $default ) . '" data-single-name="' . esc_attr( $key ) . '" type="url" value="' . esc_url( $new_value ) . '"/>';
								break;

							case 'checkbox':
								echo '<input '.checked(true, $new_value,false).' data-default="' . esc_attr( $default ) . '" data-single-name="' . esc_attr( $key ) . '" type="checkbox" value="' . esc_attr( $new_value ) . '"/>';
								?>
								<span class="customize-control-title checkbox"><?php echo esc_html( $label ); ?></span>
								<span class="description customize-control-description"><?php echo esc_html( $description ); ?></span>
								<?php
								break;

							case 'textarea':
								echo '<textarea data-default="' . esc_attr( $default ) . '"  data-single-name="' . esc_attr( $key ) . '">' . esc_textarea( $new_value ) . '</textarea>';
								break;

							case 'cssbox':
								$this->css_box( $new_value, $key, $field );
								break;

							case 'select':
								$options = $field['options'];
								echo '<select  data-default="' . esc_attr( $default ) . '"  data-single-name="' . esc_attr( $key ) . '">';
								foreach ( $options as $option => $val ) {
									printf( '<option value="%s" %s>%s</option>', esc_attr( $option ), selected( $new_value, $option, false ), esc_html( $val ) );
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
							default:
								break;
						}
                        echo '</div>';
					}
					echo '</div>';
					$i ++;
				}
				echo '</div>';/*cosmoswp-inner-tabs-menu*/
				?>
			</li>
			<?php
		}
		public function css_box( $values = array(),$key, $cssbox_fields  ) {
			$box_fields = isset( $cssbox_fields['box_fields'] )?$cssbox_fields['box_fields']:array();
			$attr = isset( $cssbox_fields['attr'] )?$cssbox_fields['attr']:array();
			$class = isset( $cssbox_fields['class'] )?$cssbox_fields['class']:'';
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
			?>
			<div class="customize-control-cosmoswp-cssbox  <?php echo esc_attr($class); ?>" data-single-name="<?php echo esc_attr($key); ?>">
				<?php
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
				echo '<ul class="tabscssbox-device-wrap control-wrap '.$device_id.' '.$active.'">';

				foreach( $box_fields_attr as $field_id => $box_single_field ){

					$value = isset( $values[$device_id][$field_id] )?$values[$device_id][$field_id]:'';
					$default = isset( $values[$device_id][$field_id] )?$values[$device_id][$field_id]:'';
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
                        <input data-device="<?php echo esc_attr( $device_id )?>" data-cssbox-name="<?php echo esc_attr( $field_id )?>" data-default="<?php echo esc_attr( $default );?>" min="<?php echo esc_attr($min); ?>" max="<?php echo esc_attr($max); ?>" step="<?php echo esc_attr( $step );?>" type="number" class="tabscssbox-field" value="<?php echo esc_attr( $value );?>">
                    </label>
					<?php
					echo "</li>";
				}
				if( $link ){
					$cssbox_link = isset( $values[$device_id]['cssbox_link'] )?$values[$device_id]['cssbox_link']:'';
					$link_toggle_class = $link_toggle?'tabscssbox_link' : '';
					?>
                    <li>
                        <label>
                            <span title="<?php echo esc_attr( $link_text ); ?>"><?php echo esc_html ( $link_text ); ?></span>
                            <span class="field-link">
                                <input data-device="<?php echo esc_attr( $device_id )?>" data-cssbox-name="cssbox_link" data-default="<?php echo esc_attr( $default );?>"  type="checkbox" class="tabscssbox-field <?php echo $link_toggle_class;?>" value="<?php echo esc_attr( $value );?>" <?php checked(true, $cssbox_link,true)?>>
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
        </div>
			<?php
		}
	}
endif;