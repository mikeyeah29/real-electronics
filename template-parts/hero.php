<?php

$title = $args['title'];
$logo = $args['logo'];
$background = $args['background'];

$logo_url = $logo ? $logo['url'] : '';
$logo_alt = $logo ? $logo['alt'] : $title;
$logo_width = $logo ? $logo['width'] : 330;

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

					<figure class="wp-block-image aligncenter size-full is-resized" data-aos="fade-up">

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

				<div class="wp-block-buttons is-content-justification-center is-layout-flex wp-block-buttons-is-layout-flex aos-init aos-animate" data-aos="fade-up">

					<div class="wp-block-button">

						<a
							class="wp-block-button__link has-primary-background-color has-background has-sm-font-size wp-element-button"
							href="/request-a-repair/"
							style="border-radius:4px"
						>
							Repair Enquiry
						</a>

					</div>

					<div class="wp-block-button">

						<a
							class="wp-block-button__link has-black-color has-accent-background-color has-background has-sm-font-size wp-element-button"
							href="#warranty-repairs"
							style="border-radius:4px"
						>
							Warranty Repairs
						</a>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>