<?php
$icon_left = $args['icon_left'] ?? 'shield';
$icon_right = $args['icon_right'] ?? 'spanner';
$paragraph_left = $args['paragraph_left'] ?? 'If your Pioneer equipment is still under warranty, we carry out authorised warranty repairs in line with manufacturer guidelines. We assess the equipment, carry out approved repairs, and complete all required testing.';
$paragraph_right = $args['paragraph_right'] ?? 'For equipment outside of warranty, we offer professional non-warranty repairs with clear advice and transparent pricing. Where possible, we use manufacturer-approved parts and follow the same careful repair process.';
?>

<!-- wp:group {"className":"warranty-repairs ","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"backgroundColor":"white","textColor":"black","layout":{"type":"constrained"}} -->
<div class="wp-block-group warranty-repairs has-black-color has-white-background-color has-text-color has-background has-link-color">
    <!-- wp:heading {"textAlign":"center","fontSize":"xl"} -->
    <h2 class="wp-block-heading has-text-align-center has-xl-font-size">Warranty &amp; Non-Warranty Repairs</h2>
    <!-- /wp:heading -->

    <!-- wp:columns {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|sm"}}}} -->
    <div class="wp-block-columns" style="padding-bottom:var(--wp--preset--spacing--sm)">
        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"className":"b-light-orange","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"border":{"radius":{"topLeft":"4px","topRight":"4px","bottomLeft":"4px","bottomRight":"4px"}}},"textColor":"black","layout":{"type":"constrained"}} -->
            <div class="wp-block-group b-light-orange has-black-color has-text-color has-link-color" style="border-top-left-radius:4px;border-top-right-radius:4px;border-bottom-left-radius:4px;border-bottom-right-radius:4px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                <!-- wp:shortcode -->
                [svg_icon name="<?php echo esc_attr( $icon_left ); ?>"]
                <!-- /wp:shortcode -->

                <!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"secondary","fontSize":"lg"} -->
                <h3 class="wp-block-heading has-secondary-color has-text-color has-link-color has-lg-font-size" style="margin-top:0;margin-bottom:0">Warranty Repairs</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php echo esc_html( $paragraph_left ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column">
            <!-- wp:group {"className":"b-light-orange","style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"border":{"radius":{"topLeft":"4px","topRight":"4px","bottomLeft":"4px","bottomRight":"4px"}}},"backgroundColor":"white","textColor":"black","layout":{"type":"constrained"}} -->
            <div class="wp-block-group b-light-orange has-black-color has-white-background-color has-text-color has-background has-link-color" style="border-top-left-radius:4px;border-top-right-radius:4px;border-bottom-left-radius:4px;border-bottom-right-radius:4px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
                <!-- wp:shortcode -->
                [svg_icon name="<?php echo esc_attr( $icon_right ); ?>"]
                <!-- /wp:shortcode -->

                <!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"secondary","fontSize":"lg"} -->
                <h3 class="wp-block-heading has-secondary-color has-text-color has-link-color has-lg-font-size" style="margin-top:0;margin-bottom:0">Non-Warranty Repairs</h3>
                <!-- /wp:heading -->

                <!-- wp:paragraph -->
                <p><?php echo esc_html( $paragraph_right ); ?></p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->

    <!-- wp:paragraph {"align":"center","fontSize":"sm"} -->
    <p class="has-text-align-center has-sm-font-size"><em>If you’re unsure whether your equipment is covered by warranty, </em><br><em>just get in touch and we’ll be happy to advise. </em></p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
