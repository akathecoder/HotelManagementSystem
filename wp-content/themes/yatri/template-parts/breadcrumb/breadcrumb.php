<?php
/**
 * Template for Inner Banner Section for all the inner pages
 *
 * @since 1.0.0
 */
?>
<section class="wrapper section-breadcrumb-wrap yatri-breadcrumb-wrap yat-clear-after">
    <section class="breadcrumb-wrap">
        <div class="yat-container">
            <?php

            yatri_get_page_title('inside_breadcrumb');



            do_action('yatri_breadcrumb');

            ?>
        </div>
    </section>
</section>