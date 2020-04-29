<?php
/**
 * Footer style 1 
 *
 * This file contains footer information
 * @package Codify
 */
 
?>

<?php 
	/**
	 * Hook - codify_action_footer_widget.
	 *
	 * @hooked codify_footer_widget -  10
	 */
	do_action( 'codify_action_footer_widget' );
?>
<div class="bottom-footer">
	<div class="container">
		<div class="footer-right-side">
			<?php 
				/**
				 * Hook - codify_action_footer_right_side.
				 *
				 * @hooked codify_footer_right_side -  10
				 */
				do_action( 'codify_action_footer_right_side' );	

			?>	
		</div>			
		<div class="copy-right-wrapper">
			<?php 
				/**
				 * Hook - codify_action_footer_info.
				 *
				 * @hooked codify_footer_info -  10
				 */
				do_action( 'codify_action_footer_info' );	

			?>
		</div>
	</div>
</div>