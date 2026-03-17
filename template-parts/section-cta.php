<?php
$image = $args['image'] ?? [];
$image_src = $image['src'] ?? 'https://placehold.co/600x400';
$image_alt = $image['alt'] ?? '';
$image_srcset = $image['srcset'] ?? 'https://placehold.co/600x400 1600w, https://placehold.co/300x200 300w, https://placehold.co/1024x768 1024w, https://placehold.co/150x100 150w, https://placehold.co/768x576 768w, https://placehold.co/1536x1152 1536w';
$image_sizes = $image['sizes'] ?? '(max-width: 1600px) 100vw, 1600px';
$image_width = $image['width'] ?? 1600;
$image_height = $image['height'] ?? 1597;

$heading = $args['heading'] ?? 'Book a Pioneer repair';
$text = $args['text'] ?? 'Set in options';
?>

<div class="wp-block-group has-black-color has-white-background-color has-text-color has-background has-link-color is-layout-constrained wp-block-group-is-layout-constrained pt-lg pb-lg pl-0">

    <div class="container">

        <div class="wp-block-columns are-vertically-aligned-center is-layout-flex wp-block-columns-is-layout-flex gap-lg">
            <div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow">
                <figure class="wp-block-image size-full has-custom-border br-sm square"><img decoding="async" width="<?php echo esc_attr( $image_width ); ?>" height="<?php echo esc_attr( $image_height ); ?>" src="<?php echo esc_url( $image_src ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" class="wp-image-27" srcset="<?php echo esc_attr( $image_srcset ); ?>" sizes="<?php echo esc_attr( $image_sizes ); ?>"></figure>
            </div>

            <div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow br-sm p-md">
                <h2 class="wp-block-heading"><?php echo esc_html( $heading ); ?></h2>

                <p><?php echo esc_html( $text ); ?></p>

                <div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex">
                    <div class="wp-block-button"><a href="<?php echo home_url('/request-a-repair'); ?>" class="wp-block-button__link has-primary-background-color has-background wp-element-button">Request a Repair</a></div>

                    <div class="wp-block-button"><a href="<?php echo home_url('/contact'); ?>" class="wp-block-button__link has-primary-background-color has-background wp-element-button">Contact Us</a></div>
                </div>
            </div>
        </div>

    </div>

</div>
