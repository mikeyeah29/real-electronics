<?php
/**
 * Real Button block render
 */

$attributes = wp_parse_args(
	$attributes,
	[
		'label' => '',
		'url'   => '',
		'type'  => 'primary',
		'icon'  => '',
	]
);

if ( empty( $attributes['label'] ) ) {
	return;
}

$classes = [
	'real-button',
	'real-button--' . sanitize_html_class( $attributes['type'] ),
];

$wrapper_attributes = get_block_wrapper_attributes( [
	'class' => implode( ' ', $classes ),
] );

$icon_slug = sanitize_file_name( $attributes['icon'] );
?>

<a
	<?php echo $wrapper_attributes; ?>
	href="<?php echo esc_url( $attributes['url'] ?: '#' ); ?>"
>

    <span class="real-button__text d-flex align-items-center gap-2">
        <?php echo esc_html( $attributes['label'] ); ?>
        <?php if ( $icon_slug ) : ?>
            <span class="real-button__icon">
                <?php
                $icon_path = 'template-parts/svg/' . $icon_slug;
                if ( locate_template( $icon_path . '.php' ) ) {
                    get_template_part( $icon_path );
                }
                ?>
            </span>
        <?php endif; ?>
    </span>
	
</a>
