<?php
/**
 *
 * Archive for Podcasts
 *
 */

remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );

remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

add_action( 'genesis_entry_header', 'genesis_do_post_image', 4 );
add_action( 'genesis_entry_content', 'swp_acf_audio_embed' );
function swp_acf_audio_embed () {

	echo '<div class="space-bottom">'; echo get_post_meta( get_the_ID(), 'alt_summary', TRUE ); echo '</div>';
	echo get_post_meta( get_the_ID(), 'audio_embed', TRUE );

}

genesis();
