<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Starter_Theme
 */

?>
	</main><!-- /.main -->

	<footer class="footer">
		<div class="container">
			<div class="footer__main">
				<div class="footer__logo">
					<?php starter_theme_the_logo(); ?>
				</div><!-- /.footer__logo -->

				<div class="footer__menu">
					<?php if ( has_nav_menu( 'menu' ) ) {
						wp_nav_menu( array(
							'theme_location' => 'menu',
							'container' => 'nav',
							'container_class' => 'nav-footer'
						) );
					} ?>
				</div><!-- /.footer__menu -->

				<div class="footer__socials">
					<?php get_template_part( 'template-parts/socials' ) ?>
				</div><!-- /.footer__socials -->
			</div><!-- /.footer__main -->

			<?php
			$copyright = carbon_get_theme_option( 'starter_theme_copyright' );

			if ( !empty( $copyright ) ) : ?>
				<div class="footer__bottom">
					<p class="copyright"><?php echo do_shortcode( esc_html( $copyright ) ) ?></p>
				</div><!-- /.footer__bottom -->
			<?php endif; ?>
		</div><!-- /.container -->
	</footer>
</div><!-- /.wrapper -->

<?php wp_footer(); ?>

</body>
</html>
