<?php
/**
 * The header for our theme
 *
 * @package Real Electronics
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
	<div class="site-header__inner">

		<div class="site-header__branding">
			<?php if (has_custom_logo()) : ?>
				<div class="site-header__logo">
					<?php the_custom_logo(); ?>
				</div>
			<?php else : ?>
				<a href="<?php echo esc_url(home_url('/')); ?>" class="site-header__title">
					<?php bloginfo('name'); ?>
				</a>
				<?php if (get_bloginfo('description')) : ?>
					<p class="site-header__tagline"><?php bloginfo('description'); ?></p>
				<?php endif; ?>
			<?php endif; ?>
		</div>

		<!-- <button class="site-header__toggle d-block d-md-none"
			aria-controls="primary-menu"
			aria-expanded="false"
			aria-label="<?php // esc_attr_e('Toggle navigation', 'realelectronics'); ?>">
			<span></span>
			<span></span>
			<span></span>
		</button> -->

		<button class="hamburger hamburger--spin d-block d-md-none" type="button">
			<span class="hamburger-box d-flex">
				<span class="hamburger-inner"></span>
			</span>
		</button>

		<div class="d-none d-md-block ml-auto">
			<?php get_template_part('template-parts/header/contact'); ?>
		</div>
		
		<div class="d-none d-md-block pl-sm">
			<?php get_template_part('template-parts/social-links', null, array('theme' => 'light')); ?>
		</div>

	</div>
	<div class="header-border"></div>
	<div class="site-header__bottom d-none d-md-flex align-items-center justify-content-between">
		<?php get_template_part('template-parts/header/primary-menu'); ?>
		<?php get_template_part('template-parts/components/dj-buttons'); ?>
	</div>

</header>

<!-- Mobile menu -->
<div class="mobile-menu d-block d-md-none mt-auto">
	<div class="d-flex mb-auto mobile-menu-inner">
		<div class="w-50">
			<?php get_template_part('template-parts/header/primary-menu'); ?>
		</div>
		<div class="w-50">
			<?php get_template_part('template-parts/components/dj-buttons'); ?>
		</div>
	</div>
	<?php get_template_part('template-parts/header/contact'); ?>
</div>

<script>

	document.addEventListener('DOMContentLoaded', function() {

		const hamburger = document.querySelector('.hamburger');
		const mobileMenu = document.querySelector('.mobile-menu');

		hamburger.addEventListener('click', function() {
			hamburger.classList.toggle('is-active');
			mobileMenu.classList.toggle('is-active');
		});

	});

</script>