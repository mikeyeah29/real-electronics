<?php

$title = $args['title'];
$logo = $args['logo'];
$background = $args['background'];

$logo_url = $logo ? $logo['url'] : '';
$logo_alt = $logo ? $logo['alt'] : $title;
$logo_width = $logo ? $logo['width'] : 330;

$button_primary_text = $args['button_primary_text'] ?? null;
$button_primary_url = $args['button_primary_url'] ?? null;
$button_secondary_text = $args['button_secondary_text'] ?? null;
$button_secondary_url = $args['button_secondary_url'] ?? null;

?>

<div class="wp-block-cover hero">

	<img
		class="wp-block-cover__image-background size-full greyscale"
		src="<?php echo esc_url($background); ?>"
		data-object-fit="cover"
	/>

	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-40 has-background-dim"></span>

	<div class="wp-block-cover__inner-container is-layout-constrained wp-block-cover-is-layout-constrained">

		<div class="wp-block-columns m-auto is-layout-flex wp-block-columns-is-layout-flex">

			<div class="wp-block-column m-auto is-layout-flow wp-block-column-is-layout-flow"
				style="
					padding-top:var(--wp--preset--spacing--xl);
					padding-right:var(--wp--preset--spacing--xl);
					padding-bottom:var(--wp--preset--spacing--sm);
					padding-left:var(--wp--preset--spacing--xl);
				">

				<?php if ( $logo_url ) : ?>

					<figure class="wp-block-image aligncenter size-full is-resized single-manufacturer-logo" data-aos="fade-up">

						<img
							src="<?php echo esc_url($logo_url); ?>"
							alt="<?php echo esc_attr($logo_alt); ?>"
							style="width:<?php echo esc_attr($logo_width); ?>px;height:auto"
						/>

					</figure>

				<?php endif; ?>

				<h1
					class="wp-block-heading has-text-align-center has-rajdhani-font-family has-xxl-font-size"
					data-aos="fade-up"
				>
					<?php echo esc_html( $title ); ?>
				</h1>

				<p
					class="has-text-align-center has-base-font-size"
					style="padding-bottom:var(--wp--preset--spacing--md)"
					data-aos="fade-up"
				>
					Repair and servicing for <?php echo esc_html( $manufacturer ); ?> equipment, by experienced technicians.
				</p>

				<div class="wp-block-buttons is-content-justification-center is-layout-flex wp-block-buttons-is-layout-flex" data-aos="fade-up">


					<?php if ( $button_primary_text && $button_primary_url ) : ?>
						<div class="wp-block-button">

							<a
								class="wp-block-button__link has-primary-background-color has-background has-sm-font-size wp-element-button"
								href="<?php echo esc_url($button_primary_url); ?>"
								style="border-radius:4px"
							>
								<?php echo esc_html($button_primary_text); ?>
							</a>

						</div>
					<?php endif; ?>

					<?php if ( $button_secondary_text && $button_secondary_url ) : ?>
						<div class="wp-block-button">

							<a
								class="wp-block-button__link has-black-color has-accent-background-color has-background has-sm-font-size wp-element-button"
								href="<?php echo esc_url($button_secondary_url); ?>"
								style="border-radius:4px"
							>
								<?php echo esc_html($button_secondary_text); ?>
							</a>

						</div>
					<?php endif; ?>

				</div>

			</div>

		</div>

	</div>

</div>