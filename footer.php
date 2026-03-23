<?php
/**
 * The template for displaying the footer
 *
 * @package YourTheme
 */
?>

<?php $contact_details = re_get_contact_details(); ?>

	<div class="header-border"></div>

	<div class="footer-banner">
		<div class="container container--wide">
			<div class="d-md-flex align-items-center justify-content-center gap-16">
				<p class="has-lg-font-size mb-0 txt-600 has-rajdhani-font-family">Official Authorized Pioneer DJ Service center</p>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/pioneer.png" alt="Pioneer Logo" style="width: 200px; height: auto;" />
			</div>
		</div>
	</div>

	<footer class="site-footer">
		<div class="container footer-inner">

			<div class="d-md-flex">

				<!-- <div class="w-md-25 mb-1 mb-md-0">
					<div class="footer-brand">
						<?php // if (has_custom_logo()) : ?>
							<div class="footer-logo pb-md">
								<?php // the_custom_logo(); ?>
							</div>
						<?php // else : ?>
							<h4>Real Electronics</h4>
						<?php // endif; ?>
						<p>
							Authorised service and repair centre for Pioneer DJ and professional audio equipment.
						</p>
					</div>
				</div> -->

				<div class="w-md-33 mb-md mb-md-0">
					<nav class="footer-nav">
						<h4>Repairs</h4>
						<!-- <ul class="ul-reset has-sm-font-size pt-sm">
							<li><a href="/repairs/pioneer" class="txt-300">Pioneer Repairs</a></li>
							<li><a href="/repairs/guitar-amps" class="txt-300">Guitar Amps</a></li>
							<li><a href="/repairs/mixers" class="txt-300">Mixers</a></li>
							<li><a href="/repairs/speakers" class="txt-300">Speakers</a></li>
							<li><a href="/repairs/pro-audio" class="txt-300">Pro Audio</a></li>
						</ul> -->
						<?php wp_nav_menu(
							array(
								'theme_location' => 'footer-1',
								'menu_id' => 'footer-menu-1',
								'container' => false,
								'menu_class' => 'ul-reset has-sm-font-size pt-sm footer-menu',
							)
						); ?>
					</nav>
				</div>

				<div class="w-md-33 mb-md mb-md-0">
					<nav class="footer-nav">
						<h4>Company</h4>
						<?php wp_nav_menu(
							array(
								'theme_location' => 'footer-2',
								'menu_id' => 'footer-menu-2',
								'container' => false,
								'menu_class' => 'ul-reset has-sm-font-size pt-sm footer-menu',
							)
						); ?>
						<!-- <ul class="ul-reset has-sm-font-size pt-sm">
							<li><a href="/about" class="txt-300">About</a></li>
							<li><a href="/privacy-policy" class="txt-300">Privacy Policy</a></li>
							<li><a href="/terms" class="txt-300">Terms</a></li>
							<li><a href="/contact" class="txt-300">Contact</a></li>
						</ul> -->
					</nav>
				</div>

				<div class="w-md-33 mb-md mb-md-0">
					<div class="footer-contact">
						<h4>Contact</h4>
						<ul class="ul-reset has-sm-font-size pt-sm">
							<li class="d-flex align-items-start gap-8">
								<?php get_template_part('template-parts/svg/marker'); ?>
								<a href="<?php echo $contact_details['address_link']; ?>" class="txt-300" target="_blank"><?php echo $contact_details['address']; ?></a>
							</li>
							<li class="d-flex align-items-start gap-8">
								<?php get_template_part('template-parts/svg/phone'); ?>
								<a href="tel:<?php echo $contact_details['phone']; ?>" class="txt-300"><?php echo $contact_details['phone']; ?></a>
							</li>
							<li class="d-flex align-items-start gap-8">
								<?php get_template_part('template-parts/svg/email'); ?>
								<a href="mailto:<?php echo $contact_details['email']; ?>" class="txt-300"><?php echo $contact_details['email']; ?></a>
							</li>
						</ul>
					</div>
				</div>

			</div>

			<div class="footer-bottom d-md-flex justify-content-center pt-lg">
				<p class="has-sm-font-size mb-0">© <?php echo date('Y'); ?> Real Electronics. All rights reserved. Website by <a href="https://rockettwd.co.uk" target="_blank" class="txt-300 link-underline">RockettWD</a></p>
			</div>
			
		</div>

	</footer>

	<?php wp_footer(); ?>
</body>
</html>
