</main>
<!-- End of #cwp-main -->

<?php

/**
 * cosmoswp_action_before_footer hook
 * @since CosmosWP 1.0.0
 *
 * @hooked cosmoswp_skip_to_content - 10
 */
do_action('cosmoswp_action_before_footer');

/**
 * cosmoswp_action_footer hook
 * @since CosmosWP 1.0.0
 *
 * @hooked cosmoswp_action_footer
 */
do_action('cosmoswp_action_footer');


/**
 * cosmoswp_action_after_footer hook
 * @since CosmosWP 1.0.0
 *
 * @hooked null
 */
do_action('cosmoswp_action_after_footer');

?>

</div>
<!-- End of #cwp-main-wrap -->

</div>
<!-- End of .main-wrapper -->
</div>
<!-- End of .cwp-offcanvas-body-wrapper -->
<?php
wp_footer();
?>
</body>
</html>