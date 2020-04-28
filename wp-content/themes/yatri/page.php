<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since 1.0.0
 */
get_header();

do_action('yatri_before_main_content');
?>
    <section class="wrapper wrap-detail-page yatri-site-content-area site-content">
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

get_footer();