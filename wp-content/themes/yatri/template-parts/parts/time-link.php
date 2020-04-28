<?php
$time_string = '<span class="entry-date published updated" datetime="%1$s">%2$s</span>';

if (get_the_time('U') !== get_the_modified_time('U')) {
    $time_string = '<span class="entry-date published" datetime="%1$s">%2$s</span><span class="updated" datetime="%3$s">%4$s</span>';
}

$time_string = sprintf($time_string,
    get_the_date(DATE_W3C),
    get_the_date(),
    get_the_modified_date(DATE_W3C),
    get_the_modified_date()
);
?>
<span class="screen-reader-text"><?php echo esc_html__('Posted on', 'yatri'); ?></span>
<span class="posted-on">
		<a href="<?php echo esc_url(yatri_get_day_link()); ?>" rel="bookmark">
			<?php echo $time_string; ?>
		</a>
	</span>
<span class="divider">/</span>