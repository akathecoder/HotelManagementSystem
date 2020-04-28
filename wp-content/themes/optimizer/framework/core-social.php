<?php 
/**
 * The SHARE THIS Function for Optimizer
 *
 * Displays The social Bookmark icons on single posts page.
 *
 * @package Optimizer
 * 
 * @since  Optimizer 1.0
 */
global $optimizer;?>

<div class="social_bookmarks<?php if(!empty($optimizer['social_show_color'])) { ?> social_color<?php } ?> bookmark_<?php echo esc_attr($optimizer['social_button_style']);?> bookmark_size_<?php echo esc_attr($optimizer['social_bookmark_size']); ?>">
	  <?php if(!empty($optimizer['facebook_field_id']) || is_customize_preview()){ ?>
      	<a target="_blank" class="ast_fb" href="<?php echo esc_url($optimizer['facebook_field_id']); ?>"><i class="fa-facebook"></i></a>
      <?php } ?>
      <?php if(!empty($optimizer['twitter_field_id']) || is_customize_preview()){ ?>
      	<a target="_blank" class="ast_twt" href="<?php echo esc_url($optimizer['twitter_field_id']); ?>"><i class="fa-twitter"></i></a><?php } ?>
      <?php if(!empty($optimizer['gplus_field_id']) || is_customize_preview()){ ?>
      	<a target="_blank" class="ast_gplus" href="<?php echo esc_url($optimizer['gplus_field_id']); ?>"><i class="fa-google-plus"></i></a> 
      <?php } ?>
      <?php if(!empty($optimizer['youtube_field_id']) || is_customize_preview()){ ?>
      	<a target="_blank" class="ast_ytb" href="<?php echo esc_url($optimizer['youtube_field_id']); ?>"><i class="fa-youtube-play"></i></a>
      <?php } ?>
      <?php if(!empty($optimizer['flickr_field_id']) || is_customize_preview()){ ?>
      	<a target="_blank" class="ast_flckr" href="<?php echo esc_url($optimizer['flickr_field_id']); ?>"><i class="fa-flickr"></i></a>
      <?php } ?>
      <?php if(!empty($optimizer['linkedin_field_id']) || is_customize_preview()){ ?>
      	<a target="_blank" class="ast_lnkdin" href="<?php echo esc_url($optimizer['linkedin_field_id']); ?>"><i class="fa-linkedin"></i></a>
      <?php } ?>
      <?php if(!empty($optimizer['pinterest_field_id']) || is_customize_preview()){ ?>
      	<a target="_blank" class="ast_pin" href="<?php echo esc_url($optimizer['pinterest_field_id']); ?>"><i class="fa-pinterest"></i></a>
      <?php } ?>
      <?php if(!empty($optimizer['tumblr_field_id']) || is_customize_preview()){ ?>
      	<a target="_blank" class="ast_tmblr" href="<?php echo esc_url($optimizer['tumblr_field_id']); ?>"><i class="fa-tumblr"></i></a>
      <?php } ?>
      <?php if(!empty($optimizer['dribble_field_id']) || is_customize_preview()){ ?>
      	<a target="_blank" class="ast_dribble" href="<?php echo esc_url($optimizer['dribble_field_id']); ?>"><i class="fa-dribbble"></i></a>
      <?php } ?>
      <?php if(!empty($optimizer['behance_field_id']) || is_customize_preview()){ ?>
      	<a target="_blank" class="ast_behance" href="<?php echo esc_url($optimizer['behance_field_id']); ?>"><i class="fa-behance"></i></a>
      <?php } ?>
      <?php if(!empty($optimizer['instagram_field_id']) || is_customize_preview()){ ?>
      	<a target="_blank" class="ast_insta" href="<?php echo esc_url($optimizer['instagram_field_id']); ?>"><i class="fa-instagram"></i></a>
      <?php } ?>  
      <?php if(!empty($optimizer['rss_field_id']) || is_customize_preview()){ ?>
      	<a target="_blank" class="ast_rss" href="<?php echo esc_url($optimizer['rss_field_id']); ?>"><i class="fa-rss"></i></a>
      <?php } ?>   
</div>