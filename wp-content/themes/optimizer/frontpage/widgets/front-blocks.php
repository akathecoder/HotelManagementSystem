<?php
/*
 *FRONTPAGE - ABOUT WIDGET
 */
add_action( 'widgets_init', 'optimizer_register_front_blocks' );

/*
 * Register widget.
 */
function optimizer_register_front_blocks() {
	register_widget( 'optimizer_front_blocks' );
}


/*
 * Widget class.
 */
class optimizer_front_Blocks extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	
	function __construct() {
		if(is_customize_preview()){$widgetname = __( 'Blocks', 'optimizer' ); }else{ $widgetname = __( '&diams; Blocks Widget', 'optimizer' ); }
		
		parent::__construct( 'optimizer_front_blocks', $widgetname, array(
			'classname'   => 'optimizer_front_blocks ast_blocks',
			'description' => __( 'Optimizer Blocks Section widget', 'optimizer' ),
			'customize_selective_refresh' => true,
		) );
		$this->alt_option_name = 'optimizer_front_blocks';
		add_action('wp_enqueue_scripts', array(&$this, 'optimizer_blocks_enqueue_css'));
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {

		
		extract( $args );
		/* Our variables from the widget settings. */
		$block1title = isset( $instance['block1title'] ) ? wp_kses_post($instance['block1title']) : __('Lorem Ipsum', 'optimizer');
		$block1img = isset( $instance['block1img'] ) ? esc_url($instance['block1img']) : '';
		$block1content = isset( $instance['block1content'] ) ? apply_filters( 'wp_editor_widget_content', $instance['block1content'] ) : __('Lorem ipsum dolor sit amet, consectetur dol adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibe.', 'optimizer');
		
		$block2title = isset( $instance['block2title'] ) ?  wp_kses_post($instance['block2title']) : __('Lorem Ipsum', 'optimizer');
		$block2img = isset( $instance['block2img'] ) ? esc_url($instance['block2img']) : '';
		$block2content = isset( $instance['block2content'] ) ? apply_filters( 'wp_editor_widget_content', $instance['block2content'] ) : __('Lorem ipsum dolor sit amet, consectetur dol adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibe.', 'optimizer');
		
		$block3title = isset( $instance['block3title'] ) ? wp_kses_post($instance['block3title']) : __('Lorem Ipsum', 'optimizer');
		$block3img = isset( $instance['block3img'] ) ? esc_url($instance['block3img']) : '';
		$block3content = isset( $instance['block3content'] ) ? apply_filters( 'wp_editor_widget_content', $instance['block3content'] ) : __('Lorem ipsum dolor sit amet, consectetur dol adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibe.', 'optimizer');
		
		$block4title = isset( $instance['block4title'] ) ? $instance['block4title'] : '';
		$block4img = isset( $instance['block4img'] ) ? esc_url($instance['block4img']) : '';
		$block4content = isset( $instance['block4content'] ) ? apply_filters( 'wp_editor_widget_content', $instance['block4content'] ) : '';
		
		$block5title = isset( $instance['block5title'] ) ? wp_kses_post($instance['block5title']) : '';
		$block5img = isset( $instance['block5img'] ) ? esc_url($instance['block5img']) : '';
		$block5content = isset( $instance['block5content'] ) ? apply_filters( 'wp_editor_widget_content', $instance['block5content'] ) : '';
		
		$block6title = isset( $instance['block6title'] ) ? wp_kses_post($instance['block6title']) : '';
		$block6img = isset( $instance['block6img'] ) ? esc_url($instance['block6img']) : '';
		$block6content = isset( $instance['block6content'] ) ? apply_filters( 'wp_editor_widget_content', $instance['block6content'] ) : '';
		
		$blockstitlecolor = isset( $instance['blockstitlecolor'] ) ? wp_kses_post($instance['blockstitlecolor']) : '';
		$blockstxtcolor = isset( $instance['blockstxtcolor'] ) ? esc_html($instance['blockstxtcolor']) : '';
		$blocksbgcolor = isset( $instance['blocksbgcolor'] ) ? esc_html($instance['blocksbgcolor']) : '';

		/* Before widget (defined by themes). */
		echo $before_widget;
		
			if(is_customize_preview()) echo '<span class="widgetname">'.$this->name.'</span>';
			
		echo '<div class="midrow">
				<div class="center">
					<div class="midrow_wrap">       
						<div class="midrow_blocks">   
							<div class="midrow_blocks_wrap">';
		
								//BLOCK 1 START
								if ( !empty($block1title) || !empty($block1img) || !empty($block1content) ){
									echo '<div class="midrow_block axn_block1"><div class="mid_block_content">';
										//DISPLAY BLOCK IMAGE
										if ( !empty($block1img) ){
											echo '<div class="block_img"><img '.optimizer_image_alt( $block1img ).' src="'.$block1img.'" /></div>';
										}
										
										echo '<div class="block_content">';
											//DISPLAY BLOCK TITLE
											if ( !empty($block1title) ){
												echo '<h3>'.do_shortcode( $block1title).'</h3>';
											}
											//DISPLAY BLOCK CONTENT
											if ( !empty($block1content) ){
												echo ''.do_shortcode( $block1content).'';
											}
										echo '</div>';
									echo '</div></div>';
								}

		
								//BLOCK 2 START
								if ( !empty($block2title) || !empty($block2img) || !empty($block2content) ){
									echo '<div class="midrow_block axn_block2"><div class="mid_block_content">';
										//DISPLAY BLOCK IMAGE
										if ( !empty($block2img) ){
											echo '<div class="block_img"><img '.optimizer_image_alt( $block2img ).' src="'.$block2img.'" /></div>';
										}
										
										echo '<div class="block_content">';
											//DISPLAY BLOCK TITLE
											if ( !empty($block2title) ){
												echo '<h3>'.do_shortcode( $block2title).'</h3>';
											}
											//DISPLAY BLOCK CONTENT
											if ( !empty($block2content) ){
												echo ''.do_shortcode( $block2content).'';
											}
										echo '</div>';
									echo '</div></div>';
								}
								
		
								//BLOCK 3 START
								if ( !empty($block3title) || !empty($block3img) || !empty($block3content) ){
									echo '<div class="midrow_block axn_block3"><div class="mid_block_content">';
										//DISPLAY BLOCK IMAGE
										if ( !empty($block3img) ){
											echo '<div class="block_img"><img '.optimizer_image_alt( $block3img ).' src="'.$block3img.'" /></div>';
										}
										
										echo '<div class="block_content">';
											//DISPLAY BLOCK TITLE
											if ( !empty($block3title) ){
												echo '<h3>'.do_shortcode( $block3title).'</h3>';
											}
											//DISPLAY BLOCK CONTENT
											if ( !empty($block3content) ){
												echo ''.do_shortcode( $block3content).'';
											}
										echo '</div>';
									echo '</div></div>';
								}
								
		
								//BLOCK 4 START
								if ( !empty($block4title) || !empty($block4img) || !empty($block4content) ){
									echo '<div class="midrow_block axn_block4"><div class="mid_block_content">';
										//DISPLAY BLOCK IMAGE
										if ( !empty($block4img) ){
											echo '<div class="block_img"><img '.optimizer_image_alt( $block4img ).' src="'.$block4img.'" /></div>';
										}
										
										echo '<div class="block_content">';
											//DISPLAY BLOCK TITLE
											if ( !empty($block4title) ){
												echo '<h3>'.do_shortcode( $block4title).'</h3>';
											}
											//DISPLAY BLOCK CONTENT
											if ( !empty($block4content) ){
												echo ''.do_shortcode( $block4content).'';
											}
										echo '</div>';
									echo '</div></div>';
								}
								
		
								//BLOCK 5 START
								if ( !empty($block5title) || !empty($block5img) || !empty($block5content) ){
									echo '<div class="midrow_block axn_block5"><div class="mid_block_content">';
										//DISPLAY BLOCK IMAGE
										if ( !empty($block5img) ){
											echo '<div class="block_img"><img '.optimizer_image_alt( $block5img ).' src="'.$block5img.'" /></div>';
										}
										
										echo '<div class="block_content">';
											//DISPLAY BLOCK TITLE
											if ( !empty($block5title) ){
												echo '<h3>'.do_shortcode( $block5title).'</h3>';
											}
											//DISPLAY BLOCK CONTENT
											if ( !empty($block5content) ){
												echo ''.do_shortcode( $block5content).'';
											}
										echo '</div>';
									echo '</div></div>';
								}
								
		
								//BLOCK 4 START
								if ( !empty($block6title) || !empty($block6img) || !empty($block6content) ){
									echo '<div class="midrow_block axn_block6"><div class="mid_block_content">';
										//DISPLAY BLOCK IMAGE
										if ( !empty($block6img) ){
											echo '<div class="block_img"><img '.optimizer_image_alt( $block6img ).' src="'.$block6img.'" /></div>';
										}
										
										echo '<div class="block_content">';
											//DISPLAY BLOCK TITLE
											if ( !empty($block6title) ){
												echo '<h3>'.do_shortcode( $block6title).'</h3>';
											}
											//DISPLAY BLOCK CONTENT
											if ( !empty($block6content) ){
												echo ''.do_shortcode( $block6content).'';
											}
										echo '</div>';
									echo '</div></div>';
								}
								
		
		echo '</div></div></div></div></div>';
		

		/* After widget (defined by themes). */
		echo $after_widget;
		
	}




	/* ---------------------------- */
	/* ------- Update Widget -------- */
	/* ---------------------------- */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['block1title'] = wp_kses_post( $new_instance['block1title'] );
		$instance['block1img'] = esc_url_raw($new_instance['block1img']);
		$instance['block1content'] = wp_kses_post($new_instance['block1content']);
		
		$instance['block2title'] = wp_kses_post( $new_instance['block2title'] );
		$instance['block2img'] = esc_url_raw($new_instance['block2img']);
		$instance['block2content'] = wp_kses_post($new_instance['block2content']);
		
		$instance['block3title'] = wp_kses_post( $new_instance['block3title'] );
		$instance['block3img'] = esc_url_raw($new_instance['block3img']);
		$instance['block3content'] = wp_kses_post($new_instance['block3content']);
		
		$instance['block4title'] = wp_kses_post( $new_instance['block4title'] );
		$instance['block4img'] = esc_url_raw($new_instance['block4img']);
		$instance['block4content'] = wp_kses_post($new_instance['block4content']);
		
		$instance['block5title'] = wp_kses_post( $new_instance['block5title'] );
		$instance['block5img'] = esc_url_raw($new_instance['block5img']);
		$instance['block5content'] = wp_kses_post($new_instance['block5content']);
		
		$instance['block6title'] = wp_kses_post( $new_instance['block6title'] );
		$instance['block6img'] = esc_url_raw($new_instance['block6img']);
		$instance['block6content'] = wp_kses_post($new_instance['block6content']);
		
		
		$instance['blockstitlecolor'] = optimizer_sanitize_hex($new_instance['blockstitlecolor']);
		$instance['blockstxtcolor'] = optimizer_sanitize_hex($new_instance['blockstxtcolor']);
		$instance['blocksbgcolor'] = optimizer_sanitize_hex($new_instance['blocksbgcolor']);

		return $instance;
	}
	
	/* ---------------------------- */
	/* ------- Widget Settings ------- */
	/* ---------------------------- */
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	
	function form( $instance ) {
	
		/* Set up some default widget settings. */
		$defaults = array(
		'block1title' => __('Lorem Ipsum', 'optimizer'),
		'block1img' => '',
		'block1content' =>  __('Lorem ipsum dolor sit amet, consectetur dol adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibe.', 'optimizer'),
		'block2title' => __('Lorem Ipsum', 'optimizer'),
		'block2img' => '',
		'block2content' =>  __('Lorem ipsum dolor sit amet, consectetur dol adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibe.', 'optimizer'),
		'block3title' => __('Lorem Ipsum', 'optimizer'),
		'block3img' => '',
		'block3content' =>  __('Lorem ipsum dolor sit amet, consectetur dol adipiscing elit. Nam nec rhoncus risus. In ultrices lacinia ipsum, posuere faucibus velit bibe.', 'optimizer'),
		'block4title' => '',
		'block4img' => '',
		'block4content' => '',
		'block5title' => '',
		'block5img' => '',
		'block5content' => '',
		'block6title' => '',
		'block6img' => '',
		'block6content' => '',
		
		'blockstitlecolor' => '#555555',
		'blockstxtcolor' => '#999999',
		'blocksbgcolor' => '#f5f5f5',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>


        <!-- BLOCK 1 FIELDS -->
        <div class="block_accordion">
        	<h4><?php _e('Block 1', 'optimizer') ?></h4>
            <div class="block_acc_wrap">
        		<!-- BLOCK 1 TITLE FIELD -->
                <p>
                <label for="<?php echo $this->get_field_id( 'block1title' ); ?>"><?php _e('Block 1 Title', 'optimizer') ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'block1title' ); ?>" name="<?php echo $this->get_field_name( 'block1title' ); ?>" value="<?php echo htmlspecialchars($instance['block1title'], ENT_QUOTES, "UTF-8"); ?>" type="text" />
                </p>
            
            <!-- BLOCK 1 IMAGE FIELD -->
            <div class="widget_input_wrap">
                <label for="<?php echo $this->get_field_id( 'block1img' ); ?>"><?php _e('Block 1 Image', 'optimizer') ?></label>
                <div class="media-picker-wrap">
                <?php if(!empty($instance['block1img'])) { ?>
                    <img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['block1img']); ?>" />
                    <i class="fa fa-times media-picker-remove"></i>
                <?php } ?>
                <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'block1img' ); ?>" name="<?php echo $this->get_field_name( 'block1img' ); ?>" value="<?php echo esc_url($instance['block1img']); ?>" type="hidden" />
                <a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'block1img' ).'mpick'; ?>"><?php _e('Select Image', 'optimizer') ?></a>
                </div>
            </div>
            
            <!-- BLOCK 1 CONTENT FIELD -->
                <p>
                <label for="<?php echo $this->get_field_id( 'block1content' ); ?>"><?php _e('Block 1 Content:', 'optimizer') ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'block1content' ); ?>" name="<?php echo $this->get_field_name( 'block1content' ); ?>" value="<?php echo esc_attr($instance['block1content']); ?>" type="hidden" />
                <a href="javascript:WPEditorWidget.showEditor('<?php echo $this->get_field_id( 'block1content' ); ?>');" class="button edit-content-button"><?php _e( 'Edit content', 'optimizer' ) ?></a>
                </p>
        </div>
        </div><!--block_accordion END-->
        
        
        <!-- BLOCK 2 FIELDS -->
        <div class="block_accordion">
        	<h4><?php _e('Block 2', 'optimizer') ?></h4>
            <div class="block_acc_wrap">
        		<!-- BLOCK 2 TITLE FIELD -->
                <p>
                <label for="<?php echo $this->get_field_id( 'block2title' ); ?>"><?php _e('Block 2 Title', 'optimizer') ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'block2title' ); ?>" name="<?php echo $this->get_field_name( 'block2title' ); ?>" value="<?php echo htmlspecialchars($instance['block2title'], ENT_QUOTES, "UTF-8"); ?>" type="text" />
                </p>
            
            <!-- BLOCK 2 IMAGE FIELD -->
            <div class="widget_input_wrap">
                <label for="<?php echo $this->get_field_id( 'block2img' ); ?>"><?php _e('Block 2 Image', 'optimizer') ?></label>
                <div class="media-picker-wrap">
                <?php if(!empty($instance['block2img'])) { ?>
                    <img style="max-width:200%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['block2img']); ?>" />
                    <i class="fa fa-times media-picker-remove"></i>
                <?php } ?>
                <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'block2img' ); ?>" name="<?php echo $this->get_field_name( 'block2img' ); ?>" value="<?php echo esc_url($instance['block2img']); ?>" type="hidden" />
                <a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'block2img' ).'mpick'; ?>"><?php _e('Select Image', 'optimizer') ?></a>
                </div>
            </div>
            
            <!-- BLOCK 2 CONTENT FIELD -->
                <p>
                <label for="<?php echo $this->get_field_id( 'block2content' ); ?>"><?php _e('Block 2 Content:', 'optimizer') ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'block2content' ); ?>" name="<?php echo $this->get_field_name( 'block2content' ); ?>" value="<?php echo esc_attr($instance['block2content']); ?>" type="hidden" />
                <a href="javascript:WPEditorWidget.showEditor('<?php echo $this->get_field_id( 'block2content' ); ?>');" class="button edit-content-button"><?php _e( 'Edit content', 'optimizer' ) ?></a>
                </p>
		</div>
        </div><!--block_accordion END-->
        
        
        <!-- BLOCK 3 FIELDS -->
        <div class="block_accordion">
        	<h4><?php _e('Block 3', 'optimizer') ?></h4>
            <div class="block_acc_wrap">
        		<!-- BLOCK 3 TITLE FIELD -->
                <p>
                <label for="<?php echo $this->get_field_id( 'block3title' ); ?>"><?php _e('Block 3 Title', 'optimizer') ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'block3title' ); ?>" name="<?php echo $this->get_field_name( 'block3title' ); ?>" value="<?php echo htmlspecialchars($instance['block3title'], ENT_QUOTES, "UTF-8"); ?>" type="text" />
                </p>
            
            <!-- BLOCK 3 IMAGE FIELD -->
            <div class="widget_input_wrap">
                <label for="<?php echo $this->get_field_id( 'block3img' ); ?>"><?php _e('Block 3 Image', 'optimizer') ?></label>
                <div class="media-picker-wrap">
                <?php if(!empty($instance['block3img'])) { ?>
                    <img style="max-width:300%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['block3img']); ?>" />
                    <i class="fa fa-times media-picker-remove"></i>
                <?php } ?>
                <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'block3img' ); ?>" name="<?php echo $this->get_field_name( 'block3img' ); ?>" value="<?php echo esc_url($instance['block3img']); ?>" type="hidden" />
                <a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'block3img' ).'mpick'; ?>"><?php _e('Select Image', 'optimizer') ?></a>
                </div>
            </div>
            
            <!-- BLOCK 3 CONTENT FIELD -->
                <p>
                <label for="<?php echo $this->get_field_id( 'block3content' ); ?>"><?php _e('Block 3 Content:', 'optimizer') ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'block3content' ); ?>" name="<?php echo $this->get_field_name( 'block3content' ); ?>" value="<?php echo esc_attr($instance['block3content']); ?>" type="hidden" />
                <a href="javascript:WPEditorWidget.showEditor('<?php echo $this->get_field_id( 'block3content' ); ?>');" class="button edit-content-button"><?php _e( 'Edit content', 'optimizer' ) ?></a>
                </p>
		</div>
        </div><!--block_accordion END-->
        
        
        
        <!-- BLOCK 4 FIELDS -->
        <div class="block_accordion">
        	<h4><?php _e('Block 4', 'optimizer') ?></h4>
            <div class="block_acc_wrap">
        		<!-- BLOCK 4 TITLE FIELD -->
                <p>
                <label for="<?php echo $this->get_field_id( 'block4title' ); ?>"><?php _e('Block 4 Title', 'optimizer') ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'block4title' ); ?>" name="<?php echo $this->get_field_name( 'block4title' ); ?>" value="<?php echo htmlspecialchars($instance['block4title'], ENT_QUOTES, "UTF-8"); ?>" type="text" />
                </p>
            
            <!-- BLOCK 4 IMAGE FIELD -->
            <div class="widget_input_wrap">
                <label for="<?php echo $this->get_field_id( 'block4img' ); ?>"><?php _e('Block 4 Image', 'optimizer') ?></label>
                <div class="media-picker-wrap">
                <?php if(!empty($instance['block4img'])) { ?>
                    <img style="max-width:400%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['block4img']); ?>" />
                    <i class="fa fa-times media-picker-remove"></i>
                <?php } ?>
                <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'block4img' ); ?>" name="<?php echo $this->get_field_name( 'block4img' ); ?>" value="<?php echo esc_url($instance['block4img']); ?>" type="hidden" />
                <a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'block4img' ).'mpick'; ?>"><?php _e('Select Image', 'optimizer') ?></a>
                </div>
            </div>
            
            <!-- BLOCK 4 CONTENT FIELD -->
                <p>
                <label for="<?php echo $this->get_field_id( 'block4content' ); ?>"><?php _e('Block 4 Content:', 'optimizer') ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'block4content' ); ?>" name="<?php echo $this->get_field_name( 'block4content' ); ?>" value="<?php echo esc_attr($instance['block4content']); ?>" type="hidden" />
                <a href="javascript:WPEditorWidget.showEditor('<?php echo $this->get_field_id( 'block4content' ); ?>');" class="button edit-content-button"><?php _e( 'Edit content', 'optimizer' ) ?></a>
                </p>
        </div>
        </div><!--block_accordion END-->
        
        
        

        <!-- BLOCK 5 FIELDS -->
        <div class="block_accordion">
        	<h4><?php _e('Block 5', 'optimizer') ?></h4>
            <div class="block_acc_wrap">
        		<!-- BLOCK 5 TITLE FIELD -->
                <p>
                <label for="<?php echo $this->get_field_id( 'block5title' ); ?>"><?php _e('Block 5 Title', 'optimizer') ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'block5title' ); ?>" name="<?php echo $this->get_field_name( 'block5title' ); ?>" value="<?php echo htmlspecialchars($instance['block5title'], ENT_QUOTES, "UTF-8"); ?>" type="text" />
                </p>
            
            <!-- BLOCK 5 IMAGE FIELD -->
            <div class="widget_input_wrap">
                <label for="<?php echo $this->get_field_id( 'block5img' ); ?>"><?php _e('Block 5 Image', 'optimizer') ?></label>
                <div class="media-picker-wrap">
                <?php if(!empty($instance['block5img'])) { ?>
                    <img style="max-width:500%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['block5img']); ?>" />
                    <i class="fa fa-times media-picker-remove"></i>
                <?php } ?>
                <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'block5img' ); ?>" name="<?php echo $this->get_field_name( 'block5img' ); ?>" value="<?php echo esc_url($instance['block5img']); ?>" type="hidden" />
                <a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'block5img' ).'mpick'; ?>"><?php _e('Select Image', 'optimizer') ?></a>
                </div>
            </div>
            
            <!-- BLOCK 5 CONTENT FIELD -->
                <p>
                <label for="<?php echo $this->get_field_id( 'block5content' ); ?>"><?php _e('Block 5 Content:', 'optimizer') ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'block5content' ); ?>" name="<?php echo $this->get_field_name( 'block5content' ); ?>" value="<?php echo esc_attr($instance['block5content']); ?>" type="hidden" />
                <a href="javascript:WPEditorWidget.showEditor('<?php echo $this->get_field_id( 'block5content' ); ?>');" class="button edit-content-button"><?php _e( 'Edit content', 'optimizer' ) ?></a>
                </p>
        </div>
        </div><!--block_accordion END-->




        <!-- BLOCK 6 FIELDS -->
        <div class="block_accordion">
        	<h4><?php _e('Block 6', 'optimizer') ?></h4>
            <div class="block_acc_wrap">
        		<!-- BLOCK 6 TITLE FIELD -->
                <p>
                <label for="<?php echo $this->get_field_id( 'block6title' ); ?>"><?php _e('Block 6 Title', 'optimizer') ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'block6title' ); ?>" name="<?php echo $this->get_field_name( 'block6title' ); ?>" value="<?php echo htmlspecialchars($instance['block6title'], ENT_QUOTES, "UTF-8"); ?>" type="text" />
                </p>
            
            <!-- BLOCK 6 IMAGE FIELD -->
            <div class="widget_input_wrap">
                <label for="<?php echo $this->get_field_id( 'block6img' ); ?>"><?php _e('Block 6 Image', 'optimizer') ?></label>
                <div class="media-picker-wrap">
                <?php if(!empty($instance['block6img'])) { ?>
                    <img style="max-width:600%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['block6img']); ?>" />
                    <i class="fa fa-times media-picker-remove"></i>
                <?php } ?>
                <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'block6img' ); ?>" name="<?php echo $this->get_field_name( 'block6img' ); ?>" value="<?php echo esc_url($instance['block6img']); ?>" type="hidden" />
                <a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'block6img' ).'mpick'; ?>"><?php _e('Select Image', 'optimizer') ?></a>
                </div>
            </div>
            
            <!-- BLOCK 6 CONTENT FIELD -->
                <p>
                <label for="<?php echo $this->get_field_id( 'block6content' ); ?>"><?php _e('Block 6 Content:', 'optimizer') ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'block6content' ); ?>" name="<?php echo $this->get_field_name( 'block6content' ); ?>" value="<?php echo esc_attr($instance['block6content']); ?>" type="hidden" />
                <a href="javascript:WPEditorWidget.showEditor('<?php echo $this->get_field_id( 'block6content' ); ?>');" class="button edit-content-button"><?php _e( 'Edit content', 'optimizer' ) ?></a>
                </p>
        </div>
        </div><!--block_accordion END-->


		<!-- Blocks Title Color Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'blockstitlecolor' ); ?>"><?php _e('Blocks Title Color', 'optimizer') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'blockstitlecolor' ); ?>" name="<?php echo $this->get_field_name( 'blockstitlecolor' ); ?>" value="<?php echo esc_attr($instance['blockstitlecolor']); ?>" type="text" />
		</p>
        
		
		<!-- Blocks Text Color Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'blockstxtcolor' ); ?>"><?php _e('Blocks Text Color', 'optimizer') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'blockstxtcolor' ); ?>" name="<?php echo $this->get_field_name( 'blockstxtcolor' ); ?>" value="<?php echo esc_attr($instance['blockstxtcolor']); ?>" type="text" />
		</p>
                
        <!-- Blocks Background Color Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'blocksbgcolor' ); ?>"><?php _e('Blocks Background Color', 'optimizer') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'blocksbgcolor' ); ?>" name="<?php echo $this->get_field_name( 'blocksbgcolor' ); ?>" value="<?php echo esc_attr($instance['blocksbgcolor']); ?>" type="text" />
		</p>
		

<?php
	}
		//ENQUEUE CSS
        function optimizer_blocks_enqueue_css() {
		$settings = get_option( $this->option_name );

		if ( empty( $settings ) ) {
			return;
		}

		foreach ( $settings as $instance_id => $instance ) {
			$id = $this->id_base . '-' . $instance_id;

			if ( ! is_active_widget( false, $id, $this->id_base ) ) {
				continue;
			}
			
			$blocksbgcolor =		'background-color:#f5f5f5;';
			$blockstitlecolor =		'#555555';
			$blockstxtcolor =		'color:#999999;';
			
			if ( ! empty( $instance['blocksbgcolor'] ) ) {
				$blocksbgcolor = 'background-color: ' . esc_html($instance['blocksbgcolor']) . '; ';
			}
			if ( ! empty( $instance['blockstitlecolor'] ) ) {
				$blockstitlecolor = '' . esc_html($instance['blockstitlecolor']) . '; ';
			}
			if ( ! empty( $instance['blockstxtcolor'] ) ) {
				$blockstxtcolor = 'color: ' . esc_html($instance['blockstxtcolor']) . '; ';
			}
			
			
			$widget_style = '#'.$id.' .midrow{ ' . $blocksbgcolor . '}#'.$id.' .midrow h3{color: ' . $blockstitlecolor . '}#'.$id.' .midrow, #'.$id.' .midrow a{' . $blockstxtcolor . '}';
			wp_add_inline_style( 'optimizer-style', $widget_style );
			
        }
	}
}
?>