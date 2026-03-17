<?php
$heading = $args['heading'] ?? 'Why Choose Real Electronics?';

$image = $args['image'] ?? [];
$image_src = $image['src'] ?? 'https://placehold.co/600x400';
$image_alt = $image['alt'] ?? '';
$image_srcset = $image['srcset'] ?? 'https://placehold.co/600x400 1600w, https://placehold.co/300x200 300w, https://placehold.co/1024x768 1024w, https://placehold.co/150x100 150w, https://placehold.co/768x576 768w, https://placehold.co/1536x1152 1536w';
$image_sizes = $image['sizes'] ?? '(max-width: 1600px) 100vw, 1600px';
$image_width = $image['width'] ?? 1600;
$image_height = $image['height'] ?? 1597;

$accordion_items = $args['accordion_items'] ?? [
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
];

$autoclose = ! empty( $args['autoclose'] );
$accordion_id_base = wp_unique_id( 'accordion-item-' );
?>

<div class="wp-block-group has-black-color has-black-background-color has-text-color has-background has-link-color is-layout-constrained wp-block-group-is-layout-constrained pb-md pt-lg">
	
    <div class="container">
        <div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex pb-md gap-xl">
            <div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow">
                <h2 class="wp-block-heading has-text-align-left has-white-color has-text-color has-link-color"><?php echo esc_html( $heading ); ?></h2>

                <div role="group" class="wp-block-accordion has-white-color has-text-color has-link-color is-layout-flow wp-block-accordion-is-layout-flow js-accordion" data-js-accordion="true" data-autoclose="<?php echo $autoclose ? 'true' : 'false'; ?>">
                    <?php foreach ( $accordion_items as $index => $item ) : ?>
                        <?php
                        $item_title = $item['title'] ?? '';
                        $item_content = $item['content'] ?? '';
                        $item_open_by_default = ! empty( $item['open_by_default'] );
                            $item_id = $accordion_id_base . '-' . ( $index + 1 );
                            $item_panel_id = $item_id . '-panel';
                        ?>
                        <div class="wp-block-accordion-item is-layout-flow wp-block-accordion-item-is-layout-flow<?php echo $item_open_by_default ? ' is-open' : ''; ?>">
                            <h3 class="wp-block-accordion-heading"><button aria-expanded="<?php echo $item_open_by_default ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr( $item_panel_id ); ?>" id="<?php echo esc_attr( $item_id ); ?>" type="button" class="wp-block-accordion-heading__toggle"><span class="wp-block-accordion-heading__toggle-title"><?php echo esc_html( $item_title ); ?></span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>

                            <div<?php echo $item_open_by_default ? '' : ' hidden'; ?> aria-labelledby="<?php echo esc_attr( $item_id ); ?>" id="<?php echo esc_attr( $item_panel_id ); ?>" role="region" class="wp-block-accordion-panel is-layout-flow wp-block-accordion-panel-is-layout-flow">
                                <p><?php echo esc_html( $item_content ); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex">
                    <div class="wp-block-button"><a class="wp-block-button__link has-black-color has-primary-background-color has-text-color has-background has-link-color wp-element-button">Find out more</a></div>
                </div>
            </div>

            <div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow">
                <figure class="wp-block-image size-full has-custom-border br-sm img-ratio-4-3"><img decoding="async" width="<?php echo esc_attr( $image_width ); ?>" height="<?php echo esc_attr( $image_height ); ?>" src="<?php echo esc_url( $image_src ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" class="wp-image-89" srcset="<?php echo esc_attr( $image_srcset ); ?>" sizes="<?php echo esc_attr( $image_sizes ); ?>"></figure>
            </div>
        </div>
    </div>
</div>
