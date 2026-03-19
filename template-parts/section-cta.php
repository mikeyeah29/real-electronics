<?php

$image = $args['image'] ?? [];
$image_src = $image['src'] ?? 'https://placehold.co/600x400';
$image_alt = $image['alt'] ?? '';

$heading = $args['heading'] ?? 'Book a repair';
$text = $args['description'] ?? 'Set in options or manufacturer page';


// Global settings

if( empty($image) || empty($heading) || empty($text) ) {
    $options = get_option('real_electronics_global_settings') ?: [];
    if( !empty($options['cta_image_id']) ) {
        $image_id = $options['cta_image_id'];
        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
        $image_src = wp_get_attachment_url($image_id);
    }
    if( !empty($options['cta_heading']) ) {
        $heading = $options['cta_heading'];
    }
    if( !empty($options['cta_content']) ) {
        $text = $options['cta_content'];
    }
}

?>

<div class="wp-block-group has-black-color has-white-background-color has-text-color has-background has-link-color is-layout-constrained wp-block-group-is-layout-constrained pt-lg pb-lg pl-0">

    <div class="container">

        <div class="wp-block-columns are-vertically-aligned-center is-layout-flex wp-block-columns-is-layout-flex gap-lg">
            <div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow">
                <figure class="wp-block-image size-full has-custom-border br-sm square">
                    <img decoding="async" src="<?php echo esc_url( $image_src ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
                </figure>
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
