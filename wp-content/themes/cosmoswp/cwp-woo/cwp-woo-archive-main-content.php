<?php
$woo_archive_default_view = cosmoswp_get_theme_options('cwc-archive-default-view');
?>
<div class="grid-row cosmoswp-woo-archive-grid-row cwp-<?php echo esc_attr($woo_archive_default_view); ?>">
    <?php
    if (woocommerce_product_loop()) {

        /* woocommerce archive element with sorting */
        $woo_archive_show_result_number = cosmoswp_get_theme_options('cwc-archive-show-result-number');
        $woo_archive_show_sort_bar      = cosmoswp_get_theme_options('cwc-archive-show-sort-bar');
        $woo_archive_show_grid_list     = cosmoswp_get_theme_options('cwc-archive-show-grid-list');
        $cwc_archive_psp_sm     = cosmoswp_get_theme_options('cwc-archive-psp-sm');

        do_action('woocommerce_before_shop_loop');

        woocommerce_product_loop_start();

        if (wc_get_loop_prop('total')) {
            ?>
            <div class="grid-12">
                <div class="cwp-woo-archive-toolbar">
                    <?php
                    if( $cwc_archive_psp_sm){
                        echo '<a class="cwc-archive-psp-sm cwc-archive-psp-sm-toggle" href="#">'.wp_kses_post(cosmoswp_get_theme_options('cwc-archive-psp-sm-open-text')).'</a>';
                    }
                    if ($woo_archive_show_grid_list) {
                        ?>
                        <div class="cwp-woo-view-switcher">
                            <span class="cwp-trigger-grid <?php echo esc_attr(cosmoswp_get_correct_fa_font('fas fa-th'));?> <?php echo 'grid' == $woo_archive_default_view ? 'active' : '' ?>"></span>
                            <span class="cwp-trigger-list <?php echo esc_attr(cosmoswp_get_correct_fa_font('fas fa-list'));?> <?php echo 'list' == $woo_archive_default_view ? 'active' : '' ?>"></span>
                        </div>
                        <?php
                    }
                    if ($woo_archive_show_result_number) {
                        woocommerce_result_count();
                    }
                    if ($woo_archive_show_sort_bar) {
                        woocommerce_catalog_ordering();
                    }
                    ?>
                </div>
            </div>
            <?php

            while (have_posts()) {
                the_post();
                /**
                 * Hook: woocommerce_shop_loop.
                 *
                 * @hooked WC_Structured_Data::generate_product_data() - 10
                 */
                do_action('woocommerce_shop_loop');

                wc_get_template_part('content', 'product');

            }
        }
        woocommerce_product_loop_end();
        do_action('woocommerce_after_shop_loop');

    } else {
        /**
         * Hook: woocommerce_no_products_found.
         *
         * @hooked wc_no_products_found - 10
         */
        do_action('woocommerce_no_products_found');
    }
    ?>
</div><!--.cosmoswp-woo-archive-grid-row-->
