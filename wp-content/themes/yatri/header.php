<?php

global $yatri_settings;

/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since 1.0.0
 */
?>
    <!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>
<?php
do_action('wp_body_open');
?>
    <a class="skip-link screen-reader-text" href="#main-content">
        <?php echo esc_html__('Skip to content', 'yatri'); ?>
    </a>
<div id="site-content" class="site">
    <header id="masthead" class="wrapper site-header site-header-primary" role="banner">
        <?php

        do_action('yatri_top_header');


        do_action('yatri_mid_header');


        do_action('yatri_bottom_header');
        ?>

    </header>

<?php

do_action('yatri_after_header');

do_action('yatri_before_breadcrumb');

do_action('yatri_breadcrumb_area');

do_action('yatri_after_breadcrumb');