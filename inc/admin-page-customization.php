<?php

add_action( 'login_head', 'starter_theme_add_custom_login_styles' );
function starter_theme_add_custom_login_styles() {
	echo '<link rel="stylesheet" type="text/css" href="'. get_bloginfo( 'stylesheet_directory' ) . '/admin-login.css" />';
}
