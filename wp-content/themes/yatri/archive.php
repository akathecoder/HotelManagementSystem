<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since 1.0.0
 */
get_header();

/**
 * Prints Title and breadcrumbs for archive pages
 * @since 1.0.0
 */
do_action('yatri_before_main_content');

?>
    <section
            class="wrapper block-grid yatri-site-content-area site-content <?php echo esc_attr(yatri_get_option('blog_archive_page_content_layout')) ?>"
            id="main-content">
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