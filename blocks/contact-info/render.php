<?php
/**
 * Contact Info block render callback
 */

$attributes = wp_parse_args(
	$attributes,
	[
		'address' => '',
		'phone'   => '',
		'email'   => '',
		'hours'   => '',
	]
);

if (
	empty( $attributes['address'] ) &&
	empty( $attributes['phone'] ) &&
	empty( $attributes['email'] ) &&
	empty( $attributes['hours'] )
) {
	return;
}

$wrapper_attributes = get_block_wrapper_attributes( [
	'class' => 'contact-info',
] );

/**
 * Build schema.org LocalBusiness data
 * Extend this later with logo, geo, socials, etc.
 */
$schema = [
	'@context' => 'https://schema.org',
	'@type'    => 'LocalBusiness',
	'name'     => get_bloginfo( 'name' ),
	'url'      => home_url(),
];

if ( $attributes['phone'] ) {
	$schema['telephone'] = $attributes['phone'];
}

if ( $attributes['email'] ) {
	$schema['email'] = $attributes['email'];
}

if ( $attributes['address'] ) {
	$schema['address'] = [
		'@type'           => 'PostalAddress',
		'streetAddress'  => $attributes['address'],
	];
}

if ( $attributes['hours'] ) {
	$schema['openingHours'] = $attributes['hours'];
}
?>

<div <?php echo $wrapper_attributes; ?>>
	<div class="contact-info__list">
		<?php if ( $attributes['address'] ) : ?>
			<div class="contact-info__group">
				<div class="d-flex align-items-center gap-8 contact-info__heading">
					<?php get_template_part('template-parts/svg/marker'); ?>
					<h3>
						<?php _e('Address', 'real-electronics'); ?>
					</h3>	
				</div>
				<div class="contact-info__item contact-info__item--address">
					<a href="https://www.google.com/maps/dir/?api=1&destination=Dannemora+Dr,+Sheffield+S9+5DF" target="_blank">
						<span class="contact-info__item-text">
							<?php echo wp_kses_post( $attributes['address'] ); ?>
						</span>
					</a>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( $attributes['phone'] ) : ?>
			<div class="contact-info__group">
				<div class="d-flex align-items-center gap-8 contact-info__heading">
					<?php get_template_part('template-parts/svg/phone'); ?>
					<h3>
						<?php _e('Phone', 'real-electronics'); ?>
					</h3>
				</div>
				<div class="contact-info__item contact-info__item--phone">
					<a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $attributes['phone'] ) ); ?>">
					<span class="contact-info__item-text">
						<?php echo wp_kses_post( $attributes['phone'] ); ?>
					</span>
				</a>
			</div>
		</div>
		<?php endif; ?>

		<?php if ( $attributes['email'] ) : ?>
			<div class="contact-info__group">
				<div class="d-flex align-items-center gap-8 contact-info__heading">
					<?php get_template_part('template-parts/svg/email'); ?>
					<h3>
						<?php _e('Email', 'real-electronics'); ?>
					</h3>
				</div>
				<div class="contact-info__item contact-info__item--email">
					<a href="mailto:<?php echo esc_attr( $attributes['email'] ); ?>" target="_blank">
						<span class="contact-info__item-text">
							<?php echo wp_kses_post( $attributes['email'] ); ?>
						</span>
					</a>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( $attributes['hours'] ) : ?>
			<div class="contact-info__group">
				<div class="d-flex align-items-center gap-8 contact-info__heading">
					<?php get_template_part('template-parts/svg/clock'); ?>
					<h3>
						<?php _e('Opening Hours', 'real-electronics'); ?>
					</h3>
				</div>
				<div class="contact-info__item contact-info__item--hours">
					<a href="https://www.google.com/maps/dir/?api=1&destination=Dannemora+Dr,+Sheffield+S9+5DF" target="_blank">
						<span class="contact-info__item-text">
						<?php echo wp_kses_post( $attributes['hours'] ); ?>
						</span>
					</a>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>

<script type="application/ld+json">
<?php echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?>
</script>
