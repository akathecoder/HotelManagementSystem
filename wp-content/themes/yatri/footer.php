<?php
/**
 * The template for displaying the footer
 * Contains the closing of the body tag and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since 1.0.0
 */

?>

<footer id="colophon" class="wrapper site-footer site-footer-two yat-clear-before">

    <?php

    do_action('yatri_top_footer');


    do_action('yatri_bottom_footer');


    ?>

</footer>

<?php
echo '</div>';

do_action('yatri_after_footer');

wp_footer();

?>
</body>
</html>
