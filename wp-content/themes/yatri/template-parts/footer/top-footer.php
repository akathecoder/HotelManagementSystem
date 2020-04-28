<?php
$class = 'top-footer yatri-top-footer-area';
$class = apply_filters('yatri_top_footer_css_class', $class);
?>
<div class="<?php echo esc_attr($class); ?>">
    <div class="yat-container">
        <?php
        $total_columns = (absint(yatri_get_option('footer_widgets_column')));

        $lg_class = 'yat-col-lg-3';
        switch ($total_columns) {
            case "1":
                $lg_class = "yat-col-lg-12";
                break;
            case "2":
                $lg_class = "yat-col-lg-6";
                break;
            case "3":
                $lg_class = "yat-col-lg-4";
                break;
            case "4":
                $lg_class = "yat-col-lg-3";
                break;
            default:
                $lg_class = "yat-col-lg-3";
                break;
                break;
        }
        ?>
        <div class="footer-widget-wrap">
            <div class="yat-row">
                <?php

                for ($start = 1; $start <= $total_columns; $start++) {
                    ?>

                    <div class="<?php echo esc_attr($lg_class); ?> lcol-md-6 yat-col-12 footer-widget-item">
                        <div class="footer-widget-sidebar">
                            <?php yatri_get_footer_widget('yatri_footer_sidebar_' . $start); ?>
                        </div>
                    </div>

                    <?php
                }

                ?>
            </div>
        </div>
    </div>
</div>
