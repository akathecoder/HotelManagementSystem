<?php
/**
 * Theme hooks.
 *
 * @package Codify
 */
if ( ! function_exists( 'codify_get_meta' ) ):
    /**
     * Function to get meta function
     *
     *  @since 1.0.0
     */
    function codify_get_meta( $post_id, $key, $default = null ){
        $value = get_post_meta( $post_id, $key, 'yes');
        if( ! $value ){
            $value = $default;
        }
        return $value;
    }
endif;

if ( ! function_exists( 'codify_single_title' ) ) :

	/**
	 * Enable Title in single page
	 *
	 * @since 1.0.0
	 *
	 */
	function codify_single_title() {
        global $post;
        $title_options = codify_get_meta( $post->ID, 'enable_title', 'yes' );
        if ( isset( $title_options ) && ! empty( $title_options ) ) {
            if( 'yes' == $title_options ){ ?>
            <header class="entry-header">
               <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
            </header>
            <?php }
        }
	}

endif;
add_action( 'codify_action_single_title', 'codify_single_title' );

if ( ! function_exists( 'codify_post_thumbnail' ) ) :

    /**
     * Add Feature Image.
     *
     * @since 1.0.0
     */
    function codify_post_thumbnail() {
        global $post;
        $image_options = codify_get_meta( $post->ID, 'enable_feature_image', 'yes' );
        if ( isset( $image_options ) && ! empty( $image_options ) ) {
            if( 'yes' == $image_options ){
                echo'<figure class="post-thumbnail">';
                    the_post_thumbnail(); 
                echo '</figure>';       
            }
        }

    }

endif;

add_action( 'codify_action_post_thumbnail', 'codify_post_thumbnail' );

if ( ! function_exists( 'codify_post_comment' ) ) :

    /**
     * Enable/Disable Comment Section
     *
     * @since 1.0.0
     */
    function codify_post_comment() {
        global $post;
        $enable_comment = codify_get_meta( $post->ID, 'enable_comment', 'yes' );
        if ( isset( $enable_comment ) && ! empty( $enable_comment ) ) {
            if( 'yes' == $enable_comment ){
                
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            }
        }

    }

endif;

add_action( 'codify_action_comment', 'codify_post_comment' );