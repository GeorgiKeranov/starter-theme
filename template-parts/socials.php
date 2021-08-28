<?php
$socials = carbon_get_theme_option( 'starter_theme_socials' );

if ( empty( $socials ) ) {
	return;
}
?>

<ul class="socials">
	<?php foreach ( $socials as $social  ) : ?>
		<li>
			<a href="<?php echo esc_url( $social['link'] ) ?>" style="background-image: url(<?php echo wp_get_attachment_image_url( $social['logo'], 'thumbnail' ) ?>)" target="_blank"></a>
		</li>
	<?php endforeach; ?>
</ul><!-- /.socials -->