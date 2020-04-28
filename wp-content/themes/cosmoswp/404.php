<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package CosmosWP
 * @subpackage CosmosWP
 */
get_header();

?>
    <section class="cwp-error-404 not-found cwp-text-center">
    <div class="grid-container">
        <header class="entry-header">
            <h1 class="page-title">

                <?php esc_html_e('Oops! That page can&rsquo;t be found.', 'cosmoswp'); ?>

            </h1>
            <?php
            $breadcrumb_before_content = cosmoswp_get_theme_options('breadcrumb-before-content');
            if ($breadcrumb_before_content) {
                do_action('cosmoswp_action_breadcrumb', true);
            }
            ?>
        </header>
        <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'cosmoswp'); ?></p>
        <?php get_search_form(); ?>

    </div>
    </section><!-- .cwp-error-404 -->

<?php get_footer();


