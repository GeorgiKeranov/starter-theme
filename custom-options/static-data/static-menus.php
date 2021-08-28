<?php
/**
 * Create static nav menu with all of the published pages
 */

$nav_menu_name = __( 'Main Menu', 'starter-theme' );

/**
 * If there is nav menu already created with this name do not create a new one
 */
$menu_exists = wp_get_nav_menu_object( $nav_menu_name );

if ( $menu_exists ) {
	return;
}

/**
 * Create the new menu
 */
$menu_id = wp_create_nav_menu( $nav_menu_name );

/**
 * Add all published pages in the menu
 */
$pages_published = get_pages( array(
	'sort_column' => 'post_date',
	'sort_order' => 'DESC'
) );

foreach ( $pages_published as $page ) {
	wp_update_nav_menu_item( $menu_id, 0, array(
		'menu-item-title' => $page->post_title,
		'menu-item-object-id' => $page->ID,
		'menu-item-object' => 'page',
		'menu-item-status' => 'publish',
		'menu-item-type' => 'post_type',
	) );
}

/**
 * Set location of the new menu
 */
$locations = get_theme_mod( 'nav_menu_locations' );
$locations['menu'] = $menu_id;
set_theme_mod( 'nav_menu_locations', $locations );
