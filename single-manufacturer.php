<?php 

// require_once get_template_directory() . '/classes/class-options.php';

get_header(); 

?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php

            $manufacturer = new \RealElectronics\Models\Manufacturer(get_the_ID());

            $manufacturer_logo = $manufacturer->getHeroLogo();
            $manufacturer_logo_width = $manufacturer->getHeroLogoWidth();
            $hero_title = $manufacturer->getHeroTitle();

            $button_primary_text = 'Repair Enquiry';
            $button_primary_url = home_url('/request-a-repair/');
            $button_secondary_text = 'Warranty Repairs';
            $button_secondary_url = '#warranty-repairs';

            if (!$manufacturer->isAuthorised()) {
                $button_primary_text = null;
                $button_primary_url = null;
                $button_secondary_text = 'Repair Enquiry';
                $button_secondary_url = home_url('/request-a-repair/');
            }
            
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
                    'button_primary_text' => $button_primary_text,
                    'button_primary_url' => $button_primary_url,
                    'button_secondary_text' => $button_secondary_text,
                    'button_secondary_url' => $button_secondary_url,
                ]
            );
		?>

        <div class="page-start-after-hero" id="warranty-repairs">

            <?php

                if ($manufacturer->isAuthorised()) {
                    get_template_part('template-parts/section-warranty');
                }

            ?>

        </div>

		<div class="wp-block-cover pt-xl pb-xl pl-0 pr-0" id="manufacturer-info">
			<img decoding="async" class="wp-block-cover__image-background wp-image-188 size-large" alt="Guitar amp texture" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/amp-texture.jpg' ); ?>" data-object-fit="cover">
			<span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-70 has-background-dim"></span>


            <div class="container">
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
		</div>

        <?php get_template_part('template-parts/section-process', null, [
            'manufacturer_name' => get_the_title(),
        ]); ?>

        <?php

            get_template_part(
                'template-parts/section-accordion-image',
                null,
                [
                    'heading' => 'Why Choose Real Electronics?',
                    'image' => [
                        'src' => 'https://realelectronics.rwdstaging.co.uk/wp-content/uploads/2026/01/fix.jpg',
                        'alt' => get_the_title() . ' repair and service',
                        'srcset' => 'https://realelectronics.rwdstaging.co.uk/wp-content/uploads/2026/01/fix.jpg 1600w, https://realelectronics.rwdstaging.co.uk/wp-content/uploads/2026/01/fix-300x300.jpg 300w, https://realelectronics.rwdstaging.co.uk/wp-content/uploads/2026/01/fix-1024x1022.jpg 1024w, https://realelectronics.rwdstaging.co.uk/wp-content/uploads/2026/01/fix-150x150.jpg 150w, https://realelectronics.rwdstaging.co.uk/wp-content/uploads/2026/01/fix-768x767.jpg 768w, https://realelectronics.rwdstaging.co.uk/wp-content/uploads/2026/01/fix-1536x1533.jpg 1536w',
                        'sizes' => '(max-width: 1600px) 100vw, 1600px',
                        'width' => 1600,
                        'height' => 1597,
                    ],
                    'accordion_items' => [
                        [
                            'title' => 'Authorised & Trusted',
                            'content' => 'We are an authorised service and repair centre for leading professional audio manufacturers, trusted by brands, DJs, musicians, and venues alike.',
                            'open_by_default' => false,
                        ],
                        [
                            'title' => 'Experienced Technicians',
                            'content' => 'Our repairs are carried out by experienced technicians with a deep understanding of professional audio equipment and electronic systems.',
                            'open_by_default' => false,
                        ],
                        [
                            'title' => 'Reliable & Thorough',
                            'content' => 'We focus on accurate diagnosis, proper repair, and thorough testing - ensuring your equipment is returned ready for real-world use.',
                            'open_by_default' => false,
                        ],
                    ],
                ]
            );

        ?>

        <?php 
        
            $cta_args = $manufacturer->getCallToAction();

            get_template_part('template-parts/section-cta', null, [
                'image' => $cta_args['image'],
                'heading' => $cta_args['heading'],
                'description' => $cta_args['description'],
            ]); 
        
        ?>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
