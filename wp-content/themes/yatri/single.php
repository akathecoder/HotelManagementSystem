<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @since 1.0.0
 */
get_header();

# Print banner with breadcrumb and post title.

do_action('yatri_before_main_content');

?>
<section class="wrapper block-grid yatri-site-content-area site-content" id="main-content">
    <div class="yat-container">
        <div class="yat-row">
            <?php

            do_action('yatri_before_main_wrap');

            do_action('yatri_content_loop');

            do_action('yatri_after_main_wrap');

            ?>
        </div>
    </div>
</section>

<?php

do_action('yatri_after_main_content');


get_footer(); ?>
