<?php 
/**
 * The Related Posts Function for Optimizer
 *
 * Displays The Post Pagination .
 *
 * @package Optimizer
 * 
 * @since Optimizer 1.0
 */
global $optimizer;?>
<?php function optimizer_pagination($navigation='numbered', $query='') { ?>
		<?php if($navigation !== 'no_nav') { ?>
				<?php if($navigation == 'numbered' || $navigation == 'numbered_ajax') { ?>
					<div class="ast_pagenav">
                        <?php
							if($query == ''){
								global $wp_query;
								$big = 999999999; // need an unlikely integer
									echo paginate_links( array(
										'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
										'format' => '?paged=%#%',
										'current' => max( 1, get_query_var('paged') ),
										'total' => $wp_query->max_num_pages,
										'show_all'     => true,
										'prev_next'    => false,
										'add_args' => false
									) );
							}else if($query !== ''){
								$big = 999999999; // need an unlikely integer
									echo paginate_links( array(
										'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
										'format' => '?paged=%#%',
										'current' => max( 1, get_query_var('paged') ),
										'total' => $query->max_num_pages,
										'show_all'     => true,
										'prev_next'    => false,
										'add_args' => false
									) );
							}
                        ?>
                    </div>
                <?php } ?>
        <?php } ?>
<?php } ?>