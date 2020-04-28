<span class="author">
	    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
	        <?php echo get_avatar(get_the_author_meta('ID'), 32); ?>
	    </a>
	</span>
<span class="author-name">
		<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
			<?php echo get_the_author(); ?>
		</a>
	</span>
<span class="divider">/</span>