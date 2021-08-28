<?php
/**
 * Setup static data on the first theme activation for these types of data:
 *	- Menu
 *	- Pages
 *	- Theme Options
 */

function starter_theme_setup_static_data() {
	$static_data_directory = get_template_directory() . '/custom-options/static-data/';

	/**
	 * Add static pages in the database
	 */
	require $static_data_directory . 'static-pages.php';

	/**
	 * Add static menus in the database
	 */
	require $static_data_directory . 'static-menus.php';

	/**
	 * Add static theme options in the database
	 */
	require $static_data_directory . 'static-theme-options.php';
}

/**
 * Check if we are on the first theme activation for the database
 */
$is_static_data_inserted = get_option( '_starter_theme_is_static_data_inserted' );

if ( !$is_static_data_inserted ) {
	starter_theme_setup_static_data();

	/**
	 * Disable the setup of the static data in future theme changes
	 */
	add_option( '_starter_theme_is_static_data_inserted', true );
}
