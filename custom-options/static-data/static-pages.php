<?php
/**
 * Setup all the static pages in database on theme setup
 */

$admin_user_ids = get_users( array( 'fields' => 'role', 'role' => 'administrator' ) );

if ( empty( $admin_user_ids ) ) {
	return;
}

/**
 * Default arguments for every page so we don't have to copy them multiple times in $static_pages array
 */
$static_page_default_args = array(
	'post_status' => 'publish',
	'post_type' => 'page',
	'post_author' => $admin_user_ids[0],
);

/**
 * Declare static pages for the theme
 */
$static_pages = array(
	array(
		'post_title' => __( 'Blog', 'starter-theme' ),
	),
	array(
		'post_title' => __( 'Home', 'starter-theme' ),
	),
);

$home_page_id = 0;
$blog_page_id = 0;

foreach ( $static_pages as $static_page_args ) {
	$static_page_args = array_merge( $static_page_args, $static_page_default_args );

	$static_page_id = wp_insert_post( $static_page_args );

	if ( $static_page_args['post_title'] === 'Home' ) {
		$home_page_id = $static_page_id;
	}

	if ( $static_page_args['post_title'] === 'Blog' ) {
		$blog_page_id = $static_page_id;
	}
}

/**
 * Add 'Home' and 'Blog' pages to the default ones for Home page and Posts page
 */
update_option( 'show_on_front', 'page' );
update_option( 'page_on_front', $home_page_id );
update_option( 'page_for_posts', $blog_page_id );
