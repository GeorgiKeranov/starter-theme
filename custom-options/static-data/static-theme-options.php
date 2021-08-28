<?php
/**
 * Setup all the static options in {prefix}_options database table on theme setup
 */

save_static_socials_options();
save_static_copyright();

/**
 * Save static social options like logo and link for each social
 */
function save_static_socials_options() {
	$static_socials = starter_theme_get_static_socials();
	$socials_details = starter_theme_save_static_socials_images( $static_socials );

	/**
	 * Save static socials options
	 */
	foreach ( $socials_details as $index => $details ) {
		$social_options = array(
			'||' . $index . '|value' => '_',
			'logo|' . $index . '|0|value' => $details['logo'],
			'link|' . $index . '|0|value' => $details['link'],
		);

		foreach ( $social_options as $name => $value ) {
			add_option( '_starter_theme_socials|' . $name, $value );
		}
	}
}

/**
 * Save static text for the copyright theme options
 */
function save_static_copyright() {
	add_option( '_starter_theme_copyright', '© Copyright [year]' );
}

/**
 * Define static socials
 */
function starter_theme_get_static_socials() {
	$static_socials = array(
		array(
			'name' => 'facebook',
			'link' => 'https://facebook.com'
		),
		array(
			'name' => 'instagram',
			'link' => 'https://instagram.com'
		),
		array(
			'name' => 'youtube',
			'link' => 'https://youtube.com'
		)
	);

	return $static_socials;
}

/**
 * Save static socials images from the theme directory/images to Wordpress Media
 * in order to use the id from image attachment for the theme options
 */
function starter_theme_save_static_socials_images( $static_socials ) {
	require_once(ABSPATH . 'wp-admin/includes/media.php');
	require_once(ABSPATH . 'wp-admin/includes/file.php');
	require_once(ABSPATH . 'wp-admin/includes/image.php');

	/**
	 * Save social images into media library to get attachment id required for the options
	 */
	foreach ( $static_socials as &$social_details ) {
		$image_url = get_template_directory_uri() . '/images/' . $social_details['name'] . '-logo.png';

		$image_id = media_sideload_image( $image_url, 0, null, 'id' );

		/**
		 * If image is not saved succesfully do not add it in the social attachment ids
		 */
		if ( is_wp_error( $image_id ) ) {
			continue;
		}

		$social_details['logo'] = $image_id;
	}

	return $static_socials;
}
