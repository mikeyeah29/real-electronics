<?php
/**
 * Title: Warranty Section
 * Slug: real-electronics/warranty-section
 * Categories: real-electronics
 * Description: To be used on the manufacturer single page.
 */
?>

<?php
get_template_part(
	'template-parts/section-warranty',
	null,
	[
		'paragraph_left' => 'If your Pioneer equipment is still under warranty, we carry out authorised warranty repairs in line with manufacturer guidelines. We assess the equipment, carry out approved repairs, and complete all required testing.',
		'paragraph_right' => 'For equipment outside of warranty, we offer professional non-warranty repairs with clear advice and transparent pricing. Where possible, we use manufacturer-approved parts and follow the same careful repair process.',
	]
);
?>
