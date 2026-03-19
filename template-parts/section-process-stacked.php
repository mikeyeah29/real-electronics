<?php

$options = get_option('real_electronics_global_settings') ?: [];

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
		'icon'    => 'badge-tick',
	],
	[
		'heading' => $options['repair_step_4_heading'] ?? '',
		'text'    => $options['repair_step_4_text'] ?? '',
		'icon'    => 'spanner',
	],
];

?>

<div class="process-stacked repair-process">
	<?php foreach ($steps as $index => $step) : ?>

		<div class="panel mb-md gradient-primary position-relative has-white-color">

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
