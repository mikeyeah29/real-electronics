<?php

$manufacturer_name = $args['manufacturer_name'] ?? 'Pioneer';

$options = get_option('real_electronics_manufacturer_settings') ?: [];

$steps = [
	[
		'heading' => $options['repair_step_1_heading'] ?? '',
		'text'    => $options['repair_step_1_text'] ?? '',
		'icon'    => 'book',
	],
	[
		'heading' => $options['repair_step_2_heading'] ?? '',
		'text'    => $options['repair_step_2_text'] ?? '',
		'icon'    => 'microscope',
	],
	[
		'heading' => $options['repair_step_3_heading'] ?? '',
		'text'    => $options['repair_step_3_text'] ?? '',
		'icon'    => 'spanner',
	],
	[
		'heading' => $options['repair_step_4_heading'] ?? '',
		'text'    => $options['repair_step_4_text'] ?? '',
		'icon'    => 'package',
	],
];

?>

<div class="wp-block-group repair-process has-white-color has-text-color has-background has-link-color is-layout-constrained wp-block-group-is-layout-constrained gradient-primary pt-lg pb-lg">

	<div class="container">

		<h2 class="wp-block-heading has-xl-font-size">
			How Our <?php echo esc_html($manufacturer_name); ?> Repairs Work
		</h2>

		<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex">

			<?php foreach ($steps as $index => $step) : ?>

				<div class="wp-block-column is-vertically-aligned-stretch panel is-layout-flow wp-block-column-is-layout-flow">

					<p class="panel-badge">
						Step <?php echo $index + 1; ?>
					</p>

					<?php echo do_shortcode('[svg_icon name="' . esc_attr($step['icon']) . '"]'); ?>

					<?php if (!empty($step['heading'])) : ?>

						<h3 class="wp-block-heading has-primary-color has-text-color has-link-color has-lg-font-size mt-sm mb-0">
							<?php echo esc_html($step['heading']); ?>
						</h3>

					<?php endif; ?>

					<?php if (!empty($step['text'])) : ?>

						<?php echo wpautop(esc_html($step['text'])); ?>

					<?php endif; ?>

				</div>

			<?php endforeach; ?>

		</div>

		<div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex">
			<div class="wp-block-button">
				<?php get_template_part('template-parts/components/button', null, [
					'link' => home_url('/request-a-repair'),
					'text' => 'Book a Repair',
					'color_slug' => 'primary',
					'text_color' => 'black',
					'solid' => true,
				]); ?>
			</div>
		</div>

	</div>

</div>