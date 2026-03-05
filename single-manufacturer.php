<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php
            $hero_title = get_the_title() . ' Service & Repair Centre';

            if ( get_post_meta( get_the_ID(), 'is_authorised', true ) ) {
                $hero_title = 'Authorised ' . $hero_title;
            }

            $manufacturer_logo = get_field( 'manufacturer_logo' );
            $manufacturer_logo_width = get_field( 'manufacturer_logo_width' ) ? get_field( 'manufacturer_logo_width' ) : 330;
		?>

		<?php
            get_template_part(
                'template-parts/hero',
                null,
                [
                    'title'      => $hero_title,
                    'logo'       => [
                        'url'   => $manufacturer_logo['url'],
                        'alt'   => $manufacturer_logo['alt'],
                        'width' => $manufacturer_logo_width,
                    ],
                    'background' => get_the_post_thumbnail_url(),
                ]
            );
		?>

        <div class="page-start-after-hero">

            <?php
                get_template_part(
                    'template-parts/section-warranty',
                    null,
                    [
                        'icon_left'       => 'shield',
                        'icon_right'      => 'spanner',
                        'paragraph_left'  => 'If your Pioneer equipment is still under warranty, we carry out authorised warranty repairs in line with manufacturer guidelines. We assess the equipment, carry out approved repairs, and complete all required testing.',
                        'paragraph_right' => 'For equipment outside of warranty, we offer professional non-warranty repairs with clear advice and transparent pricing. Where possible, we use manufacturer-approved parts and follow the same careful repair process.',
                    ]
                );
            ?>

        </div>

		<div class="wp-block-cover pt-xl pb-xl">
			<img decoding="async" class="wp-block-cover__image-background wp-image-188 size-large" alt="Guitar amp texture" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/amp-texture.jpg' ); ?>" data-object-fit="cover">
			<span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-70 has-background-dim"></span>
			<div class="wp-block-cover__inner-container is-layout-constrained wp-block-cover-is-layout-constrained">
				<div class="wp-block-columns is-layout-flex wp-container-core-columns-is-layout-4b12e7ec wp-block-columns-is-layout-flex">
					<div class="wp-block-column col-divider is-layout-flow wp-container-core-column-is-layout-73f83cb8 wp-block-column-is-layout-flow" style="padding-right:var(--wp--preset--spacing--lg)">
						<h2 class="wp-block-heading has-xl-font-size">Common Equipment We Repair</h2>

						<div class="wp-block-columns is-layout-flex wp-container-core-columns-is-layout-28f84493 wp-block-columns-is-layout-flex">
							<div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="padding-right:0">

                                <?php get_template_part('template-parts/components/acf-list', null, [
                                    'textarea_field' => get_field('equipment_we_repair')
                                ]); ?>

							</div>
						</div>

						<div class="wp-block-columns is-layout-flex wp-container-core-columns-is-layout-28f84493 wp-block-columns-is-layout-flex">
							<div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
								<p class="has-sm-font-size">If you’re unsure whether your equipment is covered, get in touch and we’ll be happy to advise.</p>
							</div>
						</div>
					</div>

					<div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
						<h2 class="wp-block-heading has-xl-font-size">Typical Issues We Resolve</h2>

						<div class="wp-block-columns is-layout-flex wp-container-core-columns-is-layout-28f84493 wp-block-columns-is-layout-flex">
							<div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
								<?php get_template_part('template-parts/components/acf-list', null, [
                                    'textarea_field' => get_field('common_faults')
                                ]); ?>
							</div>
						</div>

						<p>Many faults are caused by underlying electronic issues rather than simple wear and tear. Our approach focuses on identifying the root cause of the problem to ensure reliable, long-lasting repairs.</p>
					</div>
				</div>
			</div>
		</div>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
