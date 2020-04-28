<?php
/*
 *FRONTPAGE - ABOUT WIDGET
 */
add_action( 'widgets_init', 'optimizer_register_front_about' );

/*
 * Register widget.
 */
function optimizer_register_front_about() {
	register_widget( 'optimizer_front_about' );
}


/*
 * Widget class.
 */
class optimizer_front_About extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	function __construct() {
		if(is_customize_preview()){$widgetname = __( 'About', 'optimizer' ); }else{ $widgetname = __( '&diams; About Widget', 'optimizer' ); }
		parent::__construct( 'optimizer_front_about', $widgetname, array(
			'classname'   => 'optimizer_front_about aboutblock',
			'description' => __( 'Optimizer About Section widget', 'optimizer' ),
			'customize_selective_refresh' => true,
		) );
		$this->alt_option_name = 'optimizer_front_about';
		add_action('wp_enqueue_scripts', array(&$this, 'optimizer_about_enqueue_css'));
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {

		extract( $args );
		/* Our variables from the widget settings. */
		$title = isset( $instance['title'] ) ? wp_kses_post($instance['title']) : __('THE OPTIMIZER','optimizer');
		$subtitle = isset( $instance['subtitle'] ) ? wp_kses_post($instance['subtitle']) : __('a little about..','optimizer');
		$content = isset( $instance['content'] ) ? apply_filters( 'wp_editor_widget_content', $instance['content'] ) : '<p>'.__('Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.','optimizer').'</p>';
		$divider = isset( $instance['divider'] ) ? esc_html($instance['divider']) : 'fa-stop';
		$title_color = isset( $instance['title_color'] ) ? esc_html($instance['title_color']) : '#222222';
		$content_color = isset( $instance['content_color'] ) ? esc_html($instance['content_color']) : '#a8b4bf';
		$content_bg = isset( $instance['content_bg'] ) ? esc_html($instance['content_bg']) : '#ffffff';

		/* Before widget (defined by themes). */
		echo $before_widget;
		
			if(is_customize_preview()) echo '<span class="widgetname">'.$this->name.'</span>';
			
			
		echo '<div class="text_block_wrap"><div class="center"><div class="about_inner">';
		if ( isset($subtitle) ){
			echo '<span class="about_pre">'.do_shortcode($subtitle).'</span>';
		}
		if ( !empty($title) ){
			echo '<h2 class="about_header">'.do_shortcode($title).'</h2>';
		}
		if ( $divider ){
			if( $divider !== 'no_divider'){
					if($divider == 'underline'){ $underline= 'title_underline';}else{$underline='';}
					echo '<div class="optimizer_divider '.$underline.'"><span class="div_left"></span><span class="div_middle"><i class="fa '.$divider.'"></i></span><span class="div_right"></span></div>';
			}
		}

		if ( $content ){
			echo '<div class="about_content">'.do_shortcode($content).'</div>';
		}
		echo '</div></div></div>';

		/* After widget (defined by themes). */
		echo $after_widget;
		
	}




	/* ---------------------------- */
	/* ------- Update Widget -------- */
	/* ---------------------------- */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = wp_kses_post( $new_instance['title'] );
		
		/* No need to strip tags */
		$instance['subtitle'] = wp_kses_post($new_instance['subtitle']);
		$instance['content'] = wp_kses_post($new_instance['content']);
		$instance['divider'] = wp_kses_post($new_instance['divider']);
		$instance['title_color'] = optimizer_sanitize_hex($new_instance['title_color']);
		$instance['content_color'] = optimizer_sanitize_hex($new_instance['content_color']);
		$instance['content_bg'] = optimizer_sanitize_hex($new_instance['content_bg']);

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
		'title' => __('THE OPTIMIZER','optimizer'),
		'subtitle' => __('a little about..','optimizer'),
		'content' => __('Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.','optimizer'),
		'divider' => 'fa-stop',
		'title_color' => '#222222',
		'content_color' => '#a8b4bf',
		'content_bg' => '#ffffff',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

        <!-- About Pre Heading Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>"><?php _e('Pre Heading:', 'optimizer') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" value="<?php echo htmlspecialchars($instance['subtitle'], ENT_QUOTES, "UTF-8"); ?>" type="text" />
		</p>
        
		<!-- About Heading Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Heading:', 'optimizer') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo htmlspecialchars($instance['title'], ENT_QUOTES, "UTF-8"); ?>" type="text" />
		</p>
        
        <!-- About Content Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'content' ); ?>"><?php _e('Content:', 'optimizer') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>" value="<?php echo esc_attr($instance['content']); ?>" type="hidden" />
            <a href="javascript:WPEditorWidget.showEditor('<?php echo $this->get_field_id( 'content' ); ?>');" class="button edit-content-button"><?php _e( 'Edit content', 'optimizer' ) ?></a>
		</p>
        <!-- About Content TITLE DIVIDER Field -->
        <p>
			<label for="<?php echo $this->get_field_id( 'divider' ); ?>"><?php _e('Title Divider:', 'optimizer') ?></label>
			<select id="<?php echo $this->get_field_id( 'divider' ); ?>" name="<?php echo $this->get_field_name( 'divider' ); ?>" class="widefat">
            	<option value="underline" <?php if ( 'underline' == $instance['divider'] ) echo 'selected="selected"'; ?>><?php _e('Underline', 'optimizer') ?></option>
				<option value="fa-stop" <?php if ( 'fa-stop' == $instance['divider'] ) echo 'selected="selected"'; ?>><?php _e('Rhombus', 'optimizer') ?></option>
				<option value="fa-star" <?php if ( 'fa-star' == $instance['divider'] ) echo 'selected="selected"'; ?>><?php _e('Star', 'optimizer') ?></option>
                <option value="fa-times" <?php if ( 'fa-times' == $instance['divider'] ) echo 'selected="selected"'; ?>><?php _e('Cross', 'optimizer') ?></option>
				<option value="fa-bolt" <?php if ( 'fa-bolt' == $instance['divider'] ) echo 'selected="selected"'; ?>><?php _e('Bolt', 'optimizer') ?></option>
				<option value="fa-asterisk" <?php if ( 'fa-asterisk' == $instance['divider'] ) echo 'selected="selected"'; ?>><?php _e('Asterisk', 'optimizer') ?></option>
                <option value="fa-chevron-down" <?php if ( 'fa-chevron-down' == $instance['divider'] ) echo 'selected="selected"'; ?>><?php _e('Chevron', 'optimizer') ?></option>
				<option value="fa-heart" <?php if ( 'fa-heart' == $instance['divider'] ) echo 'selected="selected"'; ?>><?php _e('Heart', 'optimizer') ?></option>
				<option value="fa-plus" <?php if ( 'fa-plus' == $instance['divider'] ) echo 'selected="selected"'; ?>><?php _e('Plus', 'optimizer') ?></option>
                <option value="fa-bookmark" <?php if ( 'fa-bookmark' == $instance['divider'] ) echo 'selected="selected"'; ?>><?php _e('Bookmark', 'optimizer') ?></option>
				<option value="fa-circle-o" <?php if ( 'fa-circle-o' == $instance['divider'] ) echo 'selected="selected"'; ?>><?php _e('Circle', 'optimizer') ?></option>
                <option value="fa-th-large" <?php if ( 'fa-th-large' == $instance['divider'] ) echo 'selected="selected"'; ?>><?php _e('Blocks', 'optimizer') ?></option>
				<option value="fa-minus" <?php if ( 'fa-minus' == $instance['divider'] ) echo 'selected="selected"'; ?>><?php _e('Sides', 'optimizer') ?></option>
				<option value="fa-cog" <?php if ( 'fa-cog' == $instance['divider'] ) echo 'selected="selected"'; ?>><?php _e('Cog', 'optimizer') ?></option>
                <option value="fa-reorder" <?php if ( 'fa-reorder' == $instance['divider'] ) echo 'selected="selected"'; ?>><?php _e('Blinds', 'optimizer') ?></option>
                <option value="no_divider" <?php if ( 'no_divider' == $instance['divider'] ) echo 'selected="selected"'; ?>><?php _e('Hide Divider', 'optimizer') ?></option>
			</select>
		</p>
		
		<!-- About Content Heading Color Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title_color' ); ?>"><?php _e('Heading Color', 'optimizer') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'title_color' ); ?>" name="<?php echo $this->get_field_name( 'title_color' ); ?>" value="<?php echo esc_attr($instance['title_color']); ?>" type="text" />
		</p>
        
		
		<!-- About Content Text Color Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'content_color' ); ?>"><?php _e('Text Color', 'optimizer') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'content_color' ); ?>" name="<?php echo $this->get_field_name( 'content_color' ); ?>" value="<?php echo esc_attr($instance['content_color']); ?>" type="text" />
		</p>
                
        <!-- About Content Background Color Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'content_bg' ); ?>"><?php _e('Background Color', 'optimizer') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'content_bg' ); ?>" name="<?php echo $this->get_field_name( 'content_bg' ); ?>" value="<?php echo esc_attr($instance['content_bg']); ?>" type="text" />
		</p>

<?php
	}
		//ENQUEUE CSS
        function optimizer_about_enqueue_css() {
		$settings = get_option( $this->option_name );

		if ( empty( $settings ) ) {
			return;
		}

		foreach ( $settings as $instance_id => $instance ) {
			$id = $this->id_base . '-' . $instance_id;

			if ( ! is_active_widget( false, $id, $this->id_base ) ) {
				continue;
			}
			
			$content_bg =		'background-color:#ffffff!important;';
			$title_color =		'#222222;';
			$content_color =	'color:#a8b4bf;';
			
			if ( ! empty( $instance['content_bg'] ) ) {
				$content_bg = 'background-color: ' . esc_html($instance['content_bg']) . '!important; ';
			}
			if ( ! empty( $instance['title_color'] ) ) {
				$title_color = '' . esc_html($instance['title_color']) . '!important; ';
			}
			if ( ! empty( $instance['content_color'] ) ) {
				$content_color = 'color: ' . esc_html($instance['content_color']) . '!important; ';
			}
			
			
			$widget_style = '#'.$id.'{ ' . $content_bg . '}#'.$id.' .about_header, #'.$id.' .about_pre, #'.$id.' span.div_middle{color: ' . $title_color . '}#'.$id.' span.div_left, #'.$id.' span.div_right{background-color: ' . $title_color . '}#'.$id.' .about_content{' . $content_color . '}';
			wp_add_inline_style( 'optimizer-style', $widget_style );
			
        }
	} //END FOREACH
}
?>