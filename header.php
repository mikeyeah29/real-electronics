<?php
/**
 * The header for our theme
 *
 * @package YourTheme
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

		<button class="site-header__toggle"
			aria-controls="primary-menu"
			aria-expanded="false"
			aria-label="<?php esc_attr_e('Toggle navigation', 'yourtheme'); ?>">
			<span></span>
			<span></span>
			<span></span>
		</button>

		<nav class="site-header__nav" id="primary-menu" aria-label="<?php esc_attr_e('Primary navigation', 'yourtheme'); ?>">
			<?php
				wp_nav_menu([
					'theme_location' => 'primary',
					'menu_class'     => 'primary-menu',
					'container'      => false,
					'fallback_cb'    => false,
				]);
			?>
		</nav>

	</div>
</header>
