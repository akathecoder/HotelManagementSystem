<?php
/*
 *FRONTPAGE - POSTS SECTION WIDGET
 */
 
/**
 * Custom walker to print category checkboxes for widget forms
 */

 
add_action( 'widgets_init', 'optimizer_register_front_posts' );

/*
 * Register widget.
 */
function optimizer_register_front_posts() {
	register_widget( 'optimizer_front_posts' );
}


/*
 * Widget class.
 */
class optimizer_front_Posts extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */

	function __construct() {
		if(is_customize_preview()){$widgetname = __( 'Posts', 'optimizer' ); }else{ $widgetname = __( '&diams; Posts Widget', 'optimizer' ); }
		
		parent::__construct( 'optimizer_front_posts', $widgetname, array(
			'classname'   => 'optimizer_front_posts postsblck',
			'description' => __( 'This Widget lets you display WordPress Posts, Pages and Woocommerce Products.', 'optimizer' ),
			'customize_selective_refresh' => true,
		) );
		$this->alt_option_name = 'optimizer_front_posts';
		add_action('wp_enqueue_scripts', array(&$this, 'optimizer_posts_enqueue_css'));
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {

		
		extract( $args );
		/* Our variables from the widget settings. */
		$title = isset( $instance['title'] ) ? wp_kses_post($instance['title']) : __('Our Work', 'optimizer');
		$subtitle = isset( $instance['subtitle'] ) ? wp_kses_post($instance['subtitle']) : __('Check Out Our Portfolio', 'optimizer');
		$layout = isset( $instance['layout'] ) ? absint($instance['layout']) : '1';
		$type = isset( $instance['type'] ) ? esc_attr($instance['type']) : 'post';
		$count = isset( $instance['count'] ) ? absint($instance['count']) : '6';
		$category = isset( $instance['category'] ) ? $instance['category'] : '';
		
		$divider = isset( $instance['divider'] ) ? apply_filters('widget_title', $instance['divider'], $this->id_base) : 'fa-stop';
		$navigation = isset( $instance['navigation'] ) ? esc_html($instance['navigation']) : 'numbered';
		$postbgcolor = isset( $instance['postbgcolor'] ) ? esc_html($instance['postbgcolor']) : '';
		$titlecolor = isset( $instance['titlecolor'] ) ? esc_html($instance['titlecolor']) : '';
		$secbgcolor = isset( $instance['secbgcolor'] ) ? esc_html($instance['secbgcolor']) : '';
		

		/* Before widget (defined by themes). */
		echo $before_widget;
		
			if(is_customize_preview()) echo '<span class="widgetname">'.$this->name.'</span>';
			
			//THE QUERY
			if(!empty($category) && $type == 'post'){	$blogcat = array_map( 'esc_html', $category );	$blogcats =implode(',', $blogcat);	}else{	$blogcats = '';	}
			
		echo '<div class="postlayout_'.$layout.'">
		<div class="lay'.$layout.' optimposts" data-post-layout="'.$layout.'" data-post-type="'.$type.'" data-post-count="'.$count.'" data-post-category="'.$blogcats.'" data-post-navigation="'.$navigation.'">
		<div class="center">';
			
            echo '<div class="homeposts_title">';
            	if($title) { echo '<h2 class="home_title">'.do_shortcode($title).'</h2>';}
                if($subtitle) { echo '<div class="home_subtitle">'.do_shortcode($subtitle).'</div>'; }
				if ( $divider ){
					if( $divider !== 'no_divider'){
							if($divider == 'underline'){ $underline= 'title_underline';}else{$underline='';}
							echo '<div class="optimizer_divider '.$underline.'"><span class="div_left"></span><span class="div_middle"><i class="fa '.$divider.'"></i></span><span class="div_right"></span></div>';
					}
				}
            echo '</div>';
			
			//Call the Posts
			optimizer_posts($layout, $type, $count, $category, $navigation);
			
			
                
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
		$instance['subtitle'] = wp_kses_post( $new_instance['subtitle'] );
		$instance['layout'] = esc_html($new_instance['layout']);
		$instance['type'] = esc_html($new_instance['type']);
		$instance['count'] = esc_html($new_instance['count']);
		$instance['category'] = $new_instance['category'];
		
		$instance['divider'] = esc_html($new_instance['divider']);
		$instance['navigation'] = esc_html($new_instance['navigation']);
		$instance['postbgcolor'] = optimizer_sanitize_hex($new_instance['postbgcolor']);
		$instance['titlecolor'] = optimizer_sanitize_hex($new_instance['titlecolor']);
		$instance['secbgcolor'] = optimizer_sanitize_hex($new_instance['secbgcolor']);

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
		'title' => __('Our Work','optimizer'),
		'subtitle' => __('Check Out Our Work','optimizer'),
		'layout' => '1',
		'type' => 'post',
		'count' => '6',
		'category' => array(),
		'divider' => 'fa-stop',
		'navigation' => 'numbered',
		'postbgcolor' => '',
		'titlecolor' => '#333333',
		'secbgcolor' => '#ffffff',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

        
		<!-- Posts Title Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'optimizer') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo htmlspecialchars($instance['title'], ENT_QUOTES, "UTF-8"); ?>" type="text" />
		</p>
        
        <!-- Posts subtitle Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>"><?php _e('Subtitle:', 'optimizer') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" value="<?php echo htmlspecialchars($instance['subtitle'], ENT_QUOTES, "UTF-8"); ?>" type="text" />
		</p>
        
        <!-- Posts Layout Field -->
        <p>
			<label for="<?php echo $this->get_field_id( 'layout' ); ?>"><?php _e('Posts Layout:', 'optimizer') ?></label>
			<select id="<?php echo $this->get_field_id( 'layout' ); ?>" name="<?php echo $this->get_field_name( 'layout' ); ?>" class="widefat">
				<option value="1" <?php if ( '1' == $instance['layout'] ) echo 'selected="selected"'; ?>><?php _e('Layout 1', 'optimizer') ?></option>
                <option value="2" <?php if ( '2' == $instance['layout'] ) echo 'selected="selected"'; ?>><?php _e('Layout 2', 'optimizer') ?></option>
                <option value="4" <?php if ( '4' == $instance['layout'] ) echo 'selected="selected"'; ?>><?php _e('Layout 4', 'optimizer') ?></option>
			</select>
            <small><?php _e('3 more layouts available in PRO', 'optimizer') ?></small>
		</p>
        
        <!-- Posts Type Field -->
        <p>
			<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e('Posts Type:', 'optimizer') ?></label>
			<select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" class="widefat">
				<option value="post" <?php if ( 'post' == $instance['type'] ) echo 'selected="selected"'; ?>><?php _e('Posts', 'optimizer') ?></option>
				<option value="page" <?php if ( 'page' == $instance['type'] ) echo 'selected="selected"'; ?>><?php _e('Pages', 'optimizer') ?></option>
                <option value="product" <?php if ( 'product' == $instance['type'] ) echo 'selected="selected"'; ?>><?php _e('Products (Woocommerce)', 'optimizer') ?></option>
			</select>
		</p>

        
        
        <!-- Posts Category Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e('Categories', 'optimizer') ?></label>
			<span class="widget_multicheck">
			<?php
				$categories = get_terms(array( 'category' ), array( 'fields' => 'ids' ));

                foreach($categories as $cat) {
            ?>
            <label><input id="<?php echo $this->get_field_id( 'category' ) . $cat; ?>" name="<?php echo $this->get_field_name('category'); ?>[]" type="checkbox" value="<?php echo $cat; ?>" <?php if(!empty($instance['category'])) { ?><?php foreach ( $instance['category'] as $checked ) { checked( $checked, $cat, true ); } ?><?php } ?>><?php echo get_cat_name($cat); ?></label><br>
            <?php
                }
            ?>
        	</span>
		</p>
        
        
		<p>
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e('Number of Posts:', 'optimizer') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo esc_attr($instance['count']); ?>" type="text" />
		</p>

        
        
        <!-- POSTS TITLE DIVIDER Field -->
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
        
        
        <!-- Posts Navigation Field -->
        <p>
			<label for="<?php echo $this->get_field_id( 'navigation' ); ?>"><?php _e('Posts Navigation:', 'optimizer') ?></label>
			<select id="<?php echo $this->get_field_id( 'navigation' ); ?>" name="<?php echo $this->get_field_name( 'navigation' ); ?>" class="widefat">
				<option value="numbered" <?php if ( 'numbered' == $instance['navigation'] ) echo 'selected="selected"'; ?>><?php _e('Numbered', 'optimizer') ?></option>
				<option value="no_nav" <?php if ( 'no_nav' == $instance['navigation'] ) echo 'selected="selected"'; ?>><?php _e('Disabled', 'optimizer') ?></option> 
			</select>
		</p>
               
        <!-- Posts Backgrounnd Color Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'postbgcolor' ); ?>"><?php _e('Post Background Color', 'optimizer') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'postbgcolor' ); ?>" name="<?php echo $this->get_field_name( 'postbgcolor' ); ?>" value="<?php echo esc_attr($instance['postbgcolor']); ?>" type="text" />
		</p>
        
        
        <!-- Posts Section Title Color Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'titlecolor' ); ?>"><?php _e('Posts Section Title Color', 'optimizer') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'titlecolor' ); ?>" name="<?php echo $this->get_field_name( 'titlecolor' ); ?>" value="<?php echo esc_attr($instance['titlecolor']); ?>" type="text" />
		</p>
        
        <!-- Posts Section Background Color Field -->
		<p>
			<label for="<?php echo $this->get_field_id( 'secbgcolor' ); ?>"><?php _e('Posts Section Background Color', 'optimizer') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'secbgcolor' ); ?>" name="<?php echo $this->get_field_name( 'secbgcolor' ); ?>" value="<?php echo esc_attr($instance['secbgcolor']); ?>" type="text" />
		</p>
        

<?php
	}
		//ENQUEUE CSS
        function optimizer_posts_enqueue_css() {
		$settings = get_option($this->option_name);

		if ( empty( $settings ) ) {
			return;
		}

		foreach ( $settings as $instance_id => $instance ) {
			$id = $this->id_base . '-' . $instance_id;

			if ( ! is_active_widget( false, $id, $this->id_base ) ) {
				continue;
			}

			$postbgcolor =		'';
			$titlecolor =		'#333333;';
			$secbgcolor =		'background-color:#ffffff;';
			if ( ! empty( $instance['layout'] ) ) {$layout = esc_html($instance['layout']);  }else{$layout = '1';}
			
			if ( ! empty( $instance['postbgcolor'] ) ) {
				$postbgcolor = 'background-color: ' . esc_html($instance['postbgcolor']) . '; ';
			}
			if ( ! empty( $instance['titlecolor'] ) ) {
				$titlecolor =  $instance['titlecolor'] . '; ';
			}
			if ( ! empty( $instance['secbgcolor'] ) ) {
				$secbgcolor = 'background-color: ' . esc_html($instance['secbgcolor']) . '; ';
			}

			
			
			$widget_style = '#'.$id.' .lay'.$layout.' .hentry{ '.$postbgcolor.' }#'.$id.' .lay'.$layout.'{ '.$secbgcolor.' }#'.$id.' .lay'.$layout.' .home_title, #'.$id.' .lay'.$layout.' .home_subtitle, #'.$id.' span.div_middle{color:'.$titlecolor.' }#'.$id.' span.div_left, #'.$id.' span.div_right{background-color:' . $titlecolor . '}';
			wp_add_inline_style( 'optimizer-style', $widget_style );
			
        }
	}
}
?>