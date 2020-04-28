<?php 
$raw_html = cosmoswp_get_theme_options('html-container');
$raw_html = apply_filters( 'cosmoswp_header_html', $raw_html );
?>
<div class="cwp-custom-html">
	<?php echo wp_kses_post($raw_html); ?>
</div>