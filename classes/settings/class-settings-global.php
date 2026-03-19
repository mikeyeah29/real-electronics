<?php

namespace RealElectronics\Settings;

class GlobalSettings {

	private string $option_key = 'real_electronics_global_settings';

	public function __construct() {
		add_action('admin_menu', [ $this, 'add_menu_page' ]);
		add_action('admin_init', [ $this, 'register_settings' ]);
	}

	public function add_menu_page(): void {

		add_options_page(
			'Global Settings',
			'Global',
			'edit_pages',
			'real-electronics-global',
			[ $this, 'render_settings_page' ]
		);

	}

	public function register_settings(): void {

		register_setting(
			'real_electronics_global_group',
			$this->option_key,
			[ $this, 'sanitize' ]
		);

		add_settings_section(
			'real_electronics_repair_process',
			'Repair Process',
			function () {
				echo '<p>These steps explain how the repair process works. They are shown on manufacturer repair pages.</p>';
			},
			'real-electronics-global'
		);

		$this->add_field(
			'repair_step_1_heading',
			'Step 1 Heading',
			'text',
			'real_electronics_repair_process',
			'Example: Submit a Repair Enquiry'
		);

		$this->add_field(
			'repair_step_1_text',
			'Step 1 Description',
			'textarea',
			'real_electronics_repair_process'
		);

		$this->add_field(
			'repair_step_2_heading',
			'Step 2 Heading',
			'text',
			'real_electronics_repair_process',
			'Example: Equipment Assessment'
		);

		$this->add_field(
			'repair_step_2_text',
			'Step 2 Description',
			'textarea',
			'real_electronics_repair_process'
		);

		$this->add_field(
			'repair_step_3_heading',
			'Step 3 Heading',
			'text',
			'real_electronics_repair_process',
			'Example: Repair Quote'
		);

		$this->add_field(
			'repair_step_3_text',
			'Step 3 Description',
			'textarea',
			'real_electronics_repair_process'
		);

		$this->add_field(
			'repair_step_4_heading',
			'Step 4 Heading',
			'text',
			'real_electronics_repair_process',
			'Example: Repair Completion'
		);

		$this->add_field(
			'repair_step_4_text',
			'Step 4 Description',
			'textarea',
			'real_electronics_repair_process'
		);

		add_settings_section(
			'real_electronics_global_cta',
			'Call To Action',
			function () {
				echo '<p>Global CTA shown on manufacturer pages. This can be overridden on each manufacturer page.</p>';
			},
			'real-electronics-global'
		);

		$this->add_field(
			'cta_image_id',
			'CTA Image',
			'media',
			'real_electronics_global_cta',
			'Select an image to display in the CTA section.'
		);

		$this->add_field(
			'cta_content',
			'CTA Content',
			'textarea',
			'real_electronics_global_cta',
			'The main CTA text. New lines will be preserved on the front end.'
		);

	}

	private function add_field(
		string $key,
		string $label,
		string $type = 'text',
		string $section = '',
		string $description = ''
	): void {

		add_settings_field(
			$key,
			$label,
			function () use ($key, $type, $description) {
				$this->render_field($key, $type, $description);
			},
			'real-electronics-global',
			$section
		);

	}

	private function render_field(string $key, string $type, string $description = ''): void {

		$options = get_option($this->option_key);
		$value   = $options[$key] ?? '';

		if ($type === 'media') {

			$image_id  = (int) $value;
			$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'medium') : '';

			echo '<div class="re-media-field" data-target="' . esc_attr($key) . '">';
			echo '<input type="hidden" class="re-media-field__input" name="' . $this->option_key . '[' . $key . ']" value="' . esc_attr($image_id) . '" />';
			echo '<div class="re-media-field__preview" style="margin-bottom:10px;">';

			if ($image_url) {
				echo '<img src="' . esc_url($image_url) . '" style="max-width:240px;height:auto;border:1px solid #dcdcde;border-radius:4px;" />';
			} else {
				echo '<div style="width:240px;max-width:100%;padding:18px;border:1px dashed #c3c4c7;border-radius:4px;color:#646970;">No image selected</div>';
			}

			echo '</div>';
			echo '<button type="button" class="button re-media-field__select">Select Image</button> ';
			echo '<button type="button" class="button re-media-field__remove">Remove</button>';
			echo '</div>';

			if ($description) {
				echo '<p class="description">' . esc_html($description) . '</p>';
			}

			return;
		}

		if ($type === 'textarea') {
			echo '<textarea rows="6" class="large-text" name="' . $this->option_key . '[' . $key . ']">'
				. esc_textarea($value)
				. '</textarea>';
		} else {
			echo '<input type="text" class="regular-text" name="' . $this->option_key . '[' . $key . ']" value="' . esc_attr($value) . '" />';
		}

		if ($description) {
			echo '<p class="description">' . esc_html($description) . '</p>';
		}

	}

	public function sanitize(array $input): array {

		return [
			'repair_step_1_heading' => sanitize_text_field($input['repair_step_1_heading'] ?? ''),
			'repair_step_1_text'    => sanitize_textarea_field($input['repair_step_1_text'] ?? ''),
			'repair_step_2_heading' => sanitize_text_field($input['repair_step_2_heading'] ?? ''),
			'repair_step_2_text'    => sanitize_textarea_field($input['repair_step_2_text'] ?? ''),
			'repair_step_3_heading' => sanitize_text_field($input['repair_step_3_heading'] ?? ''),
			'repair_step_3_text'    => sanitize_textarea_field($input['repair_step_3_text'] ?? ''),
			'repair_step_4_heading' => sanitize_text_field($input['repair_step_4_heading'] ?? ''),
			'repair_step_4_text'    => sanitize_textarea_field($input['repair_step_4_text'] ?? ''),
			'cta_image_id'          => absint($input['cta_image_id'] ?? 0),
			'cta_content'           => sanitize_textarea_field($input['cta_content'] ?? ''),
		];

	}

	public function render_settings_page(): void {

		?>
		<div class="wrap">
			<h1>Global Settings</h1>

			<p>These settings are used for shared content across the site.</p>

			<form method="post" action="options.php">

				<?php
				settings_fields('real_electronics_global_group');
				do_settings_sections('real-electronics-global');
				submit_button();
				?>

			</form>
		</div>
		<?php

	}

}
