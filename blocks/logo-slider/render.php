<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wrapper_attributes = get_block_wrapper_attributes();

?>

<div <?php echo $wrapper_attributes; ?>>
	<?php
	get_template_part(
		'template-parts/blocks/logo-slider/logo-slider'
	);
	?>
</div>