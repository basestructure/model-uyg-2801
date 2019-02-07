<?php
/**
 *
 * Archive
 *
 */

remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
//remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

add_action( 'genesis_entry_header', 'genesis_do_post_image', 4 );
add_action( 'genesis_entry_header', 'genesis_post_meta', 5 );

genesis();
