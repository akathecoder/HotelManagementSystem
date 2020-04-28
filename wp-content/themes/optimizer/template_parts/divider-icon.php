<?php 
/**
 * Posts Layout 4 for Optimizer
 *
 * Displays Divider Icons to Display Under Home Elements Title
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
global $optimizer;?>

  <!--DIVIDER-->
  <?php if($optimizer['divider_icon'] !== 'no_divider') { ?>
      <div class="optimizer_divider">
          <span class="div_left"></span>
          <span class="div_middle"><i class="fa <?php echo esc_attr($optimizer['divider_icon']); ?>"></i></span>
          <span class="div_right"></span>
      </div>
   <?php } ?>