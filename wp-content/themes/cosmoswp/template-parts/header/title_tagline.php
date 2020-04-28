<?php
$si_logo_position   = cosmoswp_get_theme_options('site-logo-position');
$si_sorting_element = cosmoswp_get_theme_options('site-identity-sorting');

//site identity position
$si_logo_position = cosmoswp_get_theme_options('site-logo-position');
$si_logo_position = json_decode($si_logo_position,true);

// desktop position
$si_logo_position_desktop  = cosmoswp_responsive_button_value($si_logo_position,'desktop');

// tablet position
$si_logo_position_tablet  = cosmoswp_responsive_button_value($si_logo_position,'tablet');

// mobile position
$si_logo_position_mobile  = cosmoswp_responsive_button_value($si_logo_position,'mobile');

//site identity align
$si_align = cosmoswp_get_theme_options('site-identity-align');
$si_align = json_decode($si_align,true);

// desktop align
$si_align_desktop  = cosmoswp_responsive_button_value($si_align,'desktop');

// tablet align
$si_align_tablet  = cosmoswp_responsive_button_value($si_align,'tablet');

// mobile align
$si_align_mobile  = cosmoswp_responsive_button_value($si_align,'mobile');
?>
<!-- Start of .logo -->
<div class="cwp-logo <?php echo esc_attr(cosmoswp_string_concator($si_align_desktop,$si_align_tablet,$si_align_mobile)); ?> <?php echo esc_attr(cosmoswp_string_concator($si_logo_position_desktop,$si_logo_position_tablet,$si_logo_position_mobile)); ?>">

    <?php
    if (function_exists('the_custom_logo')) {
        the_custom_logo();
    }
    echo "<span>";
    foreach ($si_sorting_element as $key => $element) {
	    if ('site-title' == $element) {

	    	if ( is_front_page() && is_home() ) : ?>
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
						
				</a>
			</h1>
		<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
		endif;
	    }
        elseif ('site-tagline' == $element) { ?>
            <p class="site-description"><?php bloginfo('description'); ?></p>
	    <?php }

    }
    echo "</span>";
    ?>
</div>
<!-- End of .logo -->