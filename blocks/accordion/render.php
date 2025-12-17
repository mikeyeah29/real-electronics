<?php
/**
 * Render callback for Accordion block
 *
 * @param array  $attributes Block attributes.
 * @param string $content    InnerBlocks content (the accordion items).
 */

$attributes = wp_parse_args(
    $attributes,
    [
        'id' => '',
    ]
);

// You could define CSS vars here if you add background/color options
$vars  = [];
$style = '';
foreach ( $vars as $key => $value ) {
    $style .= $key . ':' . $value . ';';
}

// Optional ID attribute
$id_attr = ! empty( $attributes['id'] ) ? 'id="' . esc_attr( $attributes['id'] ) . '"' : '';

// Pass to template part for markup
get_template_part(
    'template-parts/blocks/accordion/accordion',
    null,
    [
        'attributes' => $attributes,
        'style'      => $style,
        'id'         => $id_attr,
        'content'    => $content, // This contains accordion-item blocks
    ]
);
