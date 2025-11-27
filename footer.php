<?php
/**
 * The template for displaying the footer
 *
 * @package YourTheme
 */
?>

	<footer class="site-footer">
		<div class="site-footer__inner">

			<div class="site-footer__top">

				<div class="site-footer__branding">
					<?php if (has_custom_logo()) : ?>
						<div class="site-footer__logo">
							<?php the_custom_logo(); ?>
						</div>
					<?php else : ?>
						<p class="site-footer__title"><?php bloginfo('name'); ?></p>
					<?php endif; ?>

					<?php if (get_bloginfo('description')) : ?>
						<p class="site-footer__tagline"><?php bloginfo('description'); ?></p>
					<?php endif; ?>
				</div>

				<?php if (has_nav_menu('footer')) : ?>
					<nav class="site-footer__nav" aria-label="<?php esc_attr_e('Footer navigation', 'yourtheme'); ?>">
						<?php
						wp_nav_menu([
							'theme_location' => 'footer',
							'menu_class'     => 'footer-menu',
							'container'      => false,
							'fallback_cb'    => false,
						]);
						?>
					</nav>
				<?php endif; ?>

				<?php if (is_active_sidebar('footer-widgets')) : ?>
					<div class="site-footer__widgets">
						<?php dynamic_sidebar('footer-widgets'); ?>
					</div>
				<?php endif; ?>

			</div>

			<div class="site-footer__bottom">

				<p class="site-footer__copyright">
					&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
				</p>

				<button class="site-footer__back-to-top" aria-label="<?php esc_attr_e('Back to top', 'yourtheme'); ?>">
					↑ Back to top
				</button>

			</div>

		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>
