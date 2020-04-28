<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since 1.0.0
 */
$sidebar = apply_filters('yatri_dynamic_sidebar', 'sidebar-1');

$sidebar_class = apply_filters('yatri_dynamic_sidebar_class', 'yatri-sidebar-right');

?>
<div class="yat-col-12 yat-col-md-4 yatri-sidebar <?php echo esc_attr($sidebar_class); ?>">
    <sidebar class="sidebar clearfix" id="<?php echo esc_attr($sidebar_class); ?>">
        <?php dynamic_sidebar($sidebar); ?>
    </sidebar>
</div>