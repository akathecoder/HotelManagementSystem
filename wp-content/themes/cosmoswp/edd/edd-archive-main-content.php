<?php
/**
 * Template Part of edd archive
 *
 * Main Content
 *
 * @package CosmosWP
 * @subpackage CosmosWP
 */
if (have_posts()) :
    /* edd archive element with sorting */
    $edd_archive_list_elements = cosmoswp_get_theme_options('edd-archive-grid-elements');
    $edd_archive_list_elements = apply_filters('cosmoswp_edd_archive_list_elements', $edd_archive_list_elements);
    if (!is_array($edd_archive_list_elements) || empty($edd_archive_list_elements)) {
        return;
    }
    $edd_archive_show_sort_bar  = cosmoswp_get_theme_options('edd-archive-show-sort-bar');
    $edd_archive_default_view   = cosmoswp_get_theme_options('edd-archive-default-view');
    $edd_archive_elements_align = cosmoswp_get_theme_options('edd-archive-grid-elements-align');
    $edd_archive_show_grid_list = cosmoswp_get_theme_options('edd-archive-show-grid-list');

    echo '<div class="grid-row cosmoswp-edd-grid-row ' . esc_attr($edd_archive_default_view) . ' ' . esc_attr($edd_archive_elements_align) . '">';
    ?>
    <div class="grid-12">
        <div class="cwp-edd-archive-toolbar">
            <?php
            if ($edd_archive_show_grid_list) {
                ?>
                <div class="cwp-edd-view-switcher">
                    <span class="cwp-trigger-grid <?php echo esc_attr(cosmoswp_get_correct_fa_font('fas fa-th'));?> <?php echo 'grid' == $woo_archive_default_view ? 'active' : '' ?>"></span>
                    <span class="cwp-trigger-list <?php echo esc_attr(cosmoswp_get_correct_fa_font('fas fa-list'));?> <?php echo 'list' == $woo_archive_default_view ? 'active' : '' ?>"></span>
                </div>
                <?php
            }
            if ($edd_archive_show_sort_bar) {
                echo cosmoswp_edd_sorting();
            }
            ?>
        </div>
    </div>
    <?php
    /* Start the Loop */
    while (have_posts()) : the_post();

        global $post;
        $columns = cosmoswp_get_theme_options('edd-show-downloads-per-row');
        if (1 == $columns) {
            $grid = 'grid-12';
        }
        elseif (2 == $columns) {
            $grid = 'grid-6';
        }
        elseif (3 == $columns) {
            $grid = 'grid-4';
        }
        elseif (4 == $columns) {
            $grid = 'grid-3';
        }
        elseif (5 == $columns) {
            $grid = 'grid-xs-2m3';
        }
        else {
            $grid = 'grid-2';
        }
        ?>
        <div id="download-<?php the_ID(); ?>" <?php post_class($grid); ?>>
            <?php
            echo "<div class='cwp-image-box cwp-list-image-box'>";
            ?>
            <div class="cwp-elements">
                <a href="<?php the_permalink(); ?>">
                    <?php
                        the_post_thumbnail('full');
                    ?>
                </a>
            </div>
            <?php
            echo "</div>";
            echo "<div class='cwp-product-content'>";
            foreach ($edd_archive_list_elements as $element) {
                if ('image' == $element) {
                    ?>
                    <div class="cwp-image-box cwp-elements">
                        <a href="<?php the_permalink(); ?>">
                            <?php
                            the_post_thumbnail('full');
                            ?>
                        </a>
                    </div>
                    <?php
                }
                elseif ('cats' == $element) {
                    echo wp_kses_post(get_the_term_list(get_the_ID(), 'download_category', '<div class="cwp-edd-cat cwp-elements">', ',', '</div>'));
                }
                elseif ('tags' == $element) {
                    echo wp_kses_post(get_the_term_list(get_the_ID(), 'download_tag', '<div class="cwp-edd-tag cwp-elements">', ',', '</div>'));
                }
                elseif ('author' == $element) {

                    echo "<div class='cwp-elements'>";
                    echo esc_html(get_the_author());
                    echo "</div>";
                }
                elseif ('published-date' == $element) {
                    echo "<div class='cwp-elements'>";
                    echo esc_html(get_the_date());
                    echo "</div>";
                }
                elseif ('title' == $element) {
                    ?>
                    <header class="entry-header cwp-elements">
                        <?php
                        the_title('<h2 class="entry-title"><a href="' . esc_url(get_the_permalink()) . '" rel="bookmark">', '</a></h2>');
                        ?>
                    </header><!-- .entry-header -->
                    <?php
                }
                elseif ('price' == $element) {
                    if (!edd_has_variable_prices(get_the_ID())) {

                        echo esc_html(edd_get_download_price(get_the_ID()));
                    }
                }
                elseif ('cart' == $element) {
                    echo edd_get_purchase_link();

                }
                elseif ('excerpt' == $element) {
                    ?>
                    <div class="entry-excerpt">
                        <?php
                        $length = cosmoswp_get_theme_options('edd-archive-content-length');
                        if (!$length) {
                            echo wp_kses_post(strip_shortcodes($post->post_excerpt));
                        } else {
                            echo wp_trim_words(strip_shortcodes($post->post_excerpt), $length);
                        }
                        ?>
                    </div><!-- .entry-content -->
                    <?php
                }
                elseif ('content' == $element) {
                    ?>
                    <div class="entry-content">
                        <?php
                        the_content();
                        wp_link_pages(
                            array(
                                'before' => '<div class="page-links">' . __('Pages:', 'cosmoswp'),
                                'after'  => '</div>',
                            )
                        );
                        ?>
                    </div><!-- .entry-content -->
                    <?php
                }
            }
            echo "</div>";
            ?>
        </div><!---->
    <?php

    endwhile;
    echo '</div>';
    echo '<div class="grid-row">';
    echo '<div class="grid-12">';
    echo '<div class="cwp-edd-pagination">';

    /**
     * cosmoswp_action_posts_navigation hook
     * @since CosmosWP 1.0.0
     *
     * @hooked cosmoswp_action_posts_navigation - 10
     */
    do_action('cosmoswp_action_edd_navigation');
    echo '</div>';
    echo '</div>';
    echo '</div>';
else :
    get_template_part('./template-parts/content', 'none');
endif;