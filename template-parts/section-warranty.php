<?php

$paragraph_left = $args['paragraph_left'] ?? 'Update in settings';
$paragraph_right = $args['paragraph_right'] ?? 'Update in settings';

// $is_authorised = $args['is_authorised'] ?? false;

$options = get_option('real_electronics_manufacturer_settings') ?: [];

// if ($is_authorised) {

$icon_left = 'shield';
$icon_right = 'spanner';

$heading_left  = 'Warranty Repairs';
$heading_right = 'Non-Warranty Repairs';

$paragraph_left  = $options['authorised_warranty_repairs'] ?? '';
$paragraph_right = $options['authorised_non_warranty_repairs'] ?? '';

// } else {

//     $icon_left = 'spanner';
//     $icon_right = 'info';

// 	$heading_left  = 'Non-Warranty Repairs';
// 	$heading_right = 'Warranty Information';

// 	$paragraph_left  = $options['non_authorised_non_warranty_repairs'] ?? '';
// 	$paragraph_right = $options['non_authorised_warranty_information'] ?? '';

// }

?>

<div class="container">
    <div class="wp-block-group pt-lg pb-lg warranty-repairs has-black-color has-white-background-color has-text-color has-background has-link-color is-layout-constrained wp-block-group-is-layout-constrained">
        <h2 class="wp-block-heading has-text-align-center has-xl-font-size">Warranty &amp; Non-Warranty Repairs</h2>

        <div class="wp-block-columns is-layout-flex wp-container-core-columns-is-layout-3be69f59 wp-block-columns-is-layout-flex" style="padding-bottom:var(--wp--preset--spacing--sm)">
            <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
                <div class="wp-block-group b-light-orange br-sm has-black-color has-text-color has-link-color is-layout-constrained wp-block-group-is-layout-constrained p-md">
                    
                    <?php echo do_shortcode('[svg_icon name="' . $icon_left . '"]'); ?>

                    <h3 class="wp-block-heading has-secondary-color has-text-color has-link-color has-lg-font-size mt-0 mb-0"><?php echo $heading_left; ?></h3>

                    <p><?php echo wpautop( esc_html( $paragraph_left ) ); ?></p>
                </div>
            </div>

            <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
                <div class="wp-block-group b-light-orange br-sm has-black-color has-white-background-color has-text-color has-background has-link-color is-layout-constrained wp-block-group-is-layout-constrained p-md">
                    
                    <?php echo do_shortcode('[svg_icon name="' . $icon_right . '"]'); ?>

                    <h3 class="wp-block-heading has-secondary-color has-text-color has-link-color has-lg-font-size mt-0 mb-0"><?php echo $heading_right; ?></h3>

                    <p><?php echo wpautop( esc_html( $paragraph_right ) ); ?></p>
                </div>
            </div>
        </div>

        <p class="has-text-align-center has-sm-font-size"><em>If you’re unsure whether your equipment is covered by warranty, </em><br><em>just get in touch and we’ll be happy to advise. </em></p>
    </div>
</div>