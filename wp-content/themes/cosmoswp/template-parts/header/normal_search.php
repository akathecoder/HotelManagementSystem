<?php 
$normal_search_placeholder = cosmoswp_get_theme_options('normal-search-placeholder');
$normal_search_placeholder = ( $normal_search_placeholder ) ? $normal_search_placeholder : 'search';
?>
<!-- Start of .cwp-search-box -->
<div class="search cwp-search-box">
	<div class="cwp-search-form-wrapper">
		<form action="<?php echo home_url( '/' ); ?>" class="search-form">
			<input type="search" class="search-field" name='s' placeholder="<?php echo esc_attr( $normal_search_placeholder ); ?>"  value="<?php echo get_search_query() ?>">
			<button class="search-submit" type="submit">
				<i class="<?php echo esc_attr(cosmoswp_get_correct_fa_font('fas fa-search'));?>"></i>
			</button>
		</form>
	</div>
</div>
<!-- End of .search-box -->