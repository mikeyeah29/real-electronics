<?php
/**
 * Render callback for Accordion Item block
 *
 * @param array  $attributes Block attributes.
 * @param string $content    InnerBlocks content (the item body).
 */

$attributes = wp_parse_args(
    $attributes,
    [
        'heading' => '',
    ]
);

get_template_part(
    'template-parts/blocks/accordion/accordion-item',
    null,
    [
        'attributes' => $attributes,
        'content'    => $content,
    ]
);
