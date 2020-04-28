<div class="cosmoswp-woo-single-grid-row">
    <?php

    /**
     * woocommerce_before_main_content hook.
     *
     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
     * @hooked woocommerce_breadcrumb - 20
     */
    do_action('woocommerce_before_main_content');

    while (have_posts()) : the_post();

        /* woocommerce single element with sorting */
        $woo_single_list_elements = cosmoswp_get_theme_options('cwc-single-elements');
        $woo_single_list_elements = apply_filters('cosmoswp_woo_single_list_elements', $woo_single_list_elements);
        if (!is_array($woo_single_list_elements) || empty($woo_single_list_elements)) {
            return;
        }

        /**
         * Hook: woocommerce_before_single_product.
         *
         * @hooked wc_print_notices - 10
         */
        do_action('woocommerce_before_single_product');

        if (post_password_required()) {
            echo get_the_password_form(); // WPCS: XSS ok.
            return;
        }

        ?>
        <div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>
            <?php

            echo "<div class='cwp-single-summary-wrapper '>";

            /**
             * Hook: woocommerce_before_single_product_summary.
             *
             * @hooked woocommerce_show_product_sale_flash - 10
             * @hooked woocommerce_show_product_images - 20
             */

            do_action('woocommerce_before_single_product_summary');

            echo "<div class='cwp-single-summary-content'>";

            foreach ($woo_single_list_elements as $element) {
                if ('title' == $element) {
                    woocommerce_template_single_title();
                }
                elseif ('rating' == $element) {
                    woocommerce_template_single_rating();
                }
                elseif ('price' == $element) {
                    woocommerce_template_single_price();
                }
                elseif ('excerpt' == $element) {
                    woocommerce_template_single_excerpt();
                }
                elseif ('cart' == $element) {
                    woocommerce_template_single_add_to_cart();
                }
                elseif ('metadata' == $element) {
                    woocommerce_template_single_meta();
                }
            }
            echo "</div>";
            echo "</div>";
            /**
             * Hook: woocommerce_after_single_product_summary.
             *
             * @hooked woocommerce_output_product_data_tabs - 10
             * @hooked woocommerce_upsell_display - 15
             * @hooked woocommerce_output_related_products - 20
             */
            do_action('woocommerce_after_single_product_summary');
            ?>
        </div><!---->
        <?php do_action('woocommerce_after_single_product'); ?>

    <?php
    endwhile; // end of the loop.

    /**
     * woocommerce_after_main_content hook.
     *
     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
     */
    do_action('woocommerce_after_main_content');
    ?>
</div><!--.cosmoswp-woo-single-grid-row-->