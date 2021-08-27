<?php

/**
 * Returns current year
 *
 * @uses [year]
 */
add_shortcode( 'year', 'starter_theme_shortcode_year' );
function starter_theme_shortcode_year() {
	return date( 'Y' );
}
