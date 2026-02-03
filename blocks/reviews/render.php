<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wrapper_attributes = get_block_wrapper_attributes( [
	'class' => 'reviews pb-xl',
	'style' => 'background-color: var(--wp--preset--color--black);',
] );

?>

<div <?php echo $wrapper_attributes; ?>>
	<div class="container container--wide" style="color: var(--wp--preset--color--white);">
		<?php get_template_part( 'template-parts/blocks/testimonial-slider/testimonial-slider' ); ?>
	</div>
</div>
