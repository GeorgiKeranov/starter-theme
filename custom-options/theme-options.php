<?php
use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

Container::make( 'theme_options', __( 'Theme Options', 'starter-theme' ) )
	->set_page_file( 'starter-theme-options.php' )
	->add_tab( __( 'Socials', 'starter-theme' ), array(
		Field::make( 'complex', 'starter_theme_socials', __( 'Socials', 'starter-theme' ) )
			->set_layout( 'tabbed-horizontal' )
			->add_fields( array(
				Field::make( 'image', 'logo', __( 'Logo', 'crb' ) )
					->set_help_text( __( 'Recommended logo size is 64x64 px', 'starter-theme' ) )
					->set_width( 50 ),
				Field::make( 'text', 'link', __( 'Link', 'crb' ) ),
			) ),
	) )
	->add_tab( __( 'Footer', 'starter-theme' ), array(
		Field::make( 'text', 'starter_theme_copyright', __( 'Copyright', 'starter-theme' ) )
	) );