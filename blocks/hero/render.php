<?php
/**
 * Render callback for Hero block
 *
 * @param array  $attributes
 * @param string $content InnerBlocks content
 */
$attributes = wp_parse_args(
    $attributes,
    [
        'backgroundImage'   => '',
        'overlayGradient'   => '',
        'responsiveHeight'  => 'none',
        'paddingTop'        => 'var(--wp--preset--spacing--40)',
        'paddingBottom'     => 'var(--wp--preset--spacing--40)',
    ]
);

$vars = [];

// $overlay = 'linear-gradient(90deg, #000000cc 0%, #ffffff00 100%)';
// $overlay = 'linear-gradient(180deg, rgba(0, 157, 255, 0.3) 0%, rgba(77, 0, 92, 0.3) 100%)';
 $overlay = $attributes['overlayGradient'];

// Background
if ( ! empty( $attributes['backgroundImage'] ) ) {
    if ( ! empty( $attributes['overlayGradient'] ) ) {
        $vars['--hero-background'] =
            esc_attr( $overlay ) . ', url(' . esc_url( $attributes['backgroundImage'] ) . ')';
            
    } else {
        $vars['--hero-background'] = 'url(' . esc_url( $attributes['backgroundImage'] ) . ')';
    }
}

// Spacing
if ( $attributes['paddingTop'] ) {
    $vars['--hero-padding-top'] = esc_attr( $attributes['paddingTop'] );
}
if ( $attributes['paddingBottom'] ) {
    $vars['--hero-padding-bottom'] = esc_attr( $attributes['paddingBottom'] );
}

// Height
if ( $attributes['responsiveHeight'] === 'all' ) {
    $vars['--hero-min-height'] = '100vh';
} elseif ( $attributes['responsiveHeight'] === 'desktop' ) {
    $vars['--hero-min-height-desktop'] = '100vh';
}

// Build inline style string
$style = '';
foreach ( $vars as $key => $value ) {
    $style .= $key . ':' . $value . ';';
}

// Pass to template part
get_template_part(
    'template-parts/blocks/hero/hero',
    null,
    [
        'attributes' => $attributes,
        'style'      => $style,
        'content'    => $content,
    ]
);
