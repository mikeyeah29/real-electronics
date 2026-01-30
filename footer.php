<?php
/**
 * The template for displaying the footer
 *
 * @package YourTheme
 */
?>

	<div class="header-border"></div>

	<div class="footer-banner">
		<div class="container container--wide">
			<div class="d-flex align-items-center justify-content-center gap-16">
				<p class="has-lg-font-size mb-0 txt-600 has-rajdhani-font-family">Your local Pioneer DJ Authorised Service Centre</p>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pioneer.png" alt="Pioneer Logo" style="width: 200px; height: auto;" />
			</div>
		</div>
	</div>

	<footer class="site-footer">
		<div class="container container--full footer-inner">

			<div class="d-md-flex">

				<div class="w-md-25 mb-1 mb-md-0">
					<div class="footer-brand">
						<?php if (has_custom_logo()) : ?>
							<div class="footer-logo pb-md">
								<?php the_custom_logo(); ?>
							</div>
						<?php else : ?>
							<h4>Real Electronics</h4>
						<?php endif; ?>
						<p>
							Authorised service and repair centre for Pioneer DJ and professional audio equipment.
						</p>
					</div>
				</div>

				<div class="w-md-25 mb-1 mb-md-0">
					<nav class="footer-nav">
						<h4>Repairs</h4>
						<ul class="ul-reset has-sm-font-size pt-sm">
							<li><a href="/repairs/pioneer" class="txt-300">Pioneer Repairs</a></li>
							<li><a href="/repairs/guitar-amps" class="txt-300">Guitar Amps</a></li>
							<li><a href="/repairs/mixers" class="txt-300">Mixers</a></li>
							<li><a href="/repairs/speakers" class="txt-300">Speakers</a></li>
							<li><a href="/repairs/pro-audio" class="txt-300">Pro Audio</a></li>
						</ul>
					</nav>
				</div>

				<div class="w-md-25 mb-1 mb-md-0">
					<nav class="footer-nav">
						<h4>Company</h4>
						<ul class="ul-reset has-sm-font-size pt-sm">
							<li><a href="/about" class="txt-300">About</a></li>
							<li><a href="/privacy-policy" class="txt-300">Privacy Policy</a></li>
							<li><a href="/terms" class="txt-300">Terms</a></li>
							<li><a href="/contact" class="txt-300">Contact</a></li>
						</ul>
					</nav>
				</div>

				<div class="w-md-25 mb-1 mb-md-0">
					<div class="footer-contact">
						<h4>Contact</h4>
						<ul class="ul-reset has-sm-font-size pt-sm">
							<li class="d-flex align-items-start gap-8">
								<?php get_template_part('template-parts/svg/marker'); ?>
								Sheffield, UK
							</li>
							<li class="d-flex align-items-start gap-8">
								<?php get_template_part('template-parts/svg/phone'); ?>
								<a href="tel:+441234567890">01234 567890</a>
							</li>
							<li class="d-flex align-items-start gap-8">
								<?php get_template_part('template-parts/svg/email'); ?>
								<a href="mailto:info@realelectronics.co.uk">info@realelectronics.co.uk</a>
							</li>
						</ul>
					</div>
				</div>

			</div>

			<div class="footer-bottom d-md-flex justify-content-center pt-lg">
				<p class="has-sm-font-size mb-0">© <?php echo date('Y'); ?> Real Electronics. All rights reserved. Website by <a href="https://rockettwd.co.uk" target="_blank">RockettWD</a></p>
			</div>
			
		</div>

		<?php // get_template_part('template-parts/components/dj-buttons'); ?>

	</footer>

	<?php wp_footer(); ?>
</body>
</html>
