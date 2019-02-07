<?php
/**
 * model-uyg-2801
 */


if ( has_post_format('audio') ) {

	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

	remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
	remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
	
	remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

	add_action( 'genesis_entry_header', 'swp_genesis_do_post_image', 4 );
	/**
	 * Echo the post image on archive pages.
	 *
	 * If this an archive page and the option is set to show thumbnail, then it gets the image size as per the theme
	 * setting, wraps it in the post permalink and echoes it.
	 *
	 * @since 1.1.0
	 */
	function swp_genesis_do_post_image() {

		if ( is_singular() && genesis_get_option( 'content_archive_thumbnail' ) ) {
			$img = genesis_get_image( array(
				'format'  => 'html',
				'size'    => genesis_get_option( 'image_size' ),
				'context' => 'archive',
				'attr'    => genesis_parse_attr( 'entry-image', array() ),
			) );

			if ( ! empty( $img ) ) {
				genesis_markup( array(
					'open'    => '<a %s>',
					'close'   => '</a>',
					'content' => wp_make_content_images_responsive( $img ),
					'context' => 'entry-image-link',
				) );
			}
		}

	}

	add_action( 'genesis_entry_content', 'swp_acf_audio_embed' );
	function swp_acf_audio_embed () {

		echo '<div class="space-bottom">'; echo get_post_meta( get_the_ID(), 'alt_summary', TRUE ); echo '</div>';
		echo get_post_meta( get_the_ID(), 'audio_embed', TRUE );

	}


	// Display post navigation links to previous and next post, from a single post, in Genesis.
	//add_action('genesis_after_entry', 'genesis_prev_next_post_nav', 9);

}

genesis();