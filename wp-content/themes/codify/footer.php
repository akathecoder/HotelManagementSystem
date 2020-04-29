<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Codify
 */

?>
	<?php
	/**
	 * Hook - codify_action_after_content.
	 *
	 * @hooked codify_content_end -  10
	 */
	do_action( 'codify_action_after_content' );

	/**
	 * Hook - codify_action_before_footer.
	 *
	 * @hooked codify_footer_start -  10
	 */
	do_action( 'codify_action_before_footer' );

	/**
	 * Hook - codify_action_footer.
	 *
	 * @hooked codify_footer -  10
	 */
	do_action( 'codify_action_footer' );

	/**
	 * Hook - codify_action_after_footer.
	 *
	 * @hooked codify_footer_end -  10
	 */
	do_action( 'codify_action_after_footer' );

	/**
	 * Hook - codify_action_after.
	 *
	 * @hooked codify_page_end -  10
	 */
	do_action( 'codify_action_after' );

	/**
	 * Hook - codify_action_backToTop.
	 *
	 * @hooked codify_backToTop -  10
	 */
	do_action( 'codify_action_backToTop' );	
	?>

<?php wp_footer(); ?>

</body>
</html>
