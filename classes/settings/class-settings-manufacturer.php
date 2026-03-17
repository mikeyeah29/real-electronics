<?php

namespace RealElectronics\Settings;

class ManufacturerSettings {

	private string $option_key = 'real_electronics_manufacturer_settings';

	public function __construct() {
		add_action('admin_menu', [ $this, 'add_menu_page' ]);
		add_action('admin_init', [ $this, 'register_settings' ]);
	}

	/**
	 * Add menu item
	 */
	public function add_menu_page(): void {

		add_options_page(
			'Manufacturer Settings',
			'Manufacturers',
			'edit_pages',
			'real-electronics-manufacturers',
			[ $this, 'render_settings_page' ]
		);

	}

	public function register_settings(): void {

		register_setting(
			'real_electronics_manufacturer_group',
			$this->option_key,
			[ $this, 'sanitize' ]
		);

		/**
		 * Authorised Manufacturers
		 */
		add_settings_section(
			'real_electronics_authorised_repairs',
			'Authorised Manufacturers',
			function () {
				echo '<p>Displayed on manufacturer pages where Real Electronics is an authorised service centre.</p>';
			},
			'real-electronics-manufacturers'
		);

		$this->add_field(
			'authorised_warranty_repairs',
			'Warranty Repairs',
			'textarea',
			'real_electronics_authorised_repairs'
		);

		$this->add_field(
			'authorised_non_warranty_repairs',
			'Non-Warranty Repairs',
			'textarea',
			'real_electronics_authorised_repairs'
		);

		/**
		 * Non-Authorised Manufacturers
		 */
		// add_settings_section(
		// 	'real_electronics_non_authorised_repairs',
		// 	'Non-Authorised Manufacturers',
		// 	function () {
		// 		echo '<p>Displayed when Real Electronics is NOT an authorised service centre.</p>';
		// 	},
		// 	'real-electronics-manufacturers'
		// );

		// $this->add_field(
		// 	'non_authorised_non_warranty_repairs',
		// 	'Non-Warranty Repairs',
		// 	'textarea',
		// 	'real_electronics_non_authorised_repairs'
		// );

		// $this->add_field(
		// 	'non_authorised_warranty_information',
		// 	'Warranty Information',
		// 	'textarea',
		// 	'real_electronics_non_authorised_repairs'
		// );

		/**
		 * Repair Process
		 */
		add_settings_section(
			'real_electronics_repair_process',
			'Repair Process',
			function () {
				echo '<p>These steps explain how the repair process works. They are shown on all manufacturer repair pages.</p>';
			},
			'real-electronics-manufacturers'
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

		/**
		 * Call To Action
		 */
		add_settings_section(
			'real_electronics_manufacturer_cta',
			'Call To Action',
			function () {
				echo '<p>Global CTA shown on manufacturer pages.</p>';
			},
			'real-electronics-manufacturers'
		);

		$this->add_field(
			'cta_image_id',
			'CTA Image',
			'media',
			'real_electronics_manufacturer_cta',
			'Select an image to display in the CTA section.'
		);

		$this->add_field(
			'cta_content',
			'CTA Content',
			'textarea',
			'real_electronics_manufacturer_cta',
			'The main CTA text. New lines will be preserved on the front end.'
		);

	}

	/**
	 * Helper to register fields
	 */
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
			'real-electronics-manufacturers',
			$section
		);

	}

	/**
	 * Field renderer
	 */
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

	/**
	 * Sanitize input
	 */
	public function sanitize(array $input): array {

		return [
			'authorised_warranty_repairs'          => sanitize_textarea_field($input['authorised_warranty_repairs'] ?? ''),
			'authorised_non_warranty_repairs'      => sanitize_textarea_field($input['authorised_non_warranty_repairs'] ?? ''),
			// 'non_authorised_non_warranty_repairs'  => sanitize_textarea_field($input['non_authorised_non_warranty_repairs'] ?? ''),
			// 'non_authorised_warranty_information'  => sanitize_textarea_field($input['non_authorised_warranty_information'] ?? ''),

			'repair_step_1_heading' => sanitize_text_field($input['repair_step_1_heading'] ?? ''),
			'repair_step_1_text'    => sanitize_textarea_field($input['repair_step_1_text'] ?? ''),

			'repair_step_2_heading' => sanitize_text_field($input['repair_step_2_heading'] ?? ''),
			'repair_step_2_text'    => sanitize_textarea_field($input['repair_step_2_text'] ?? ''),

			'repair_step_3_heading' => sanitize_text_field($input['repair_step_3_heading'] ?? ''),
			'repair_step_3_text'    => sanitize_textarea_field($input['repair_step_3_text'] ?? ''),

			'repair_step_4_heading' => sanitize_text_field($input['repair_step_4_heading'] ?? ''),
			'repair_step_4_text'    => sanitize_textarea_field($input['repair_step_4_text'] ?? ''),

			'cta_image_id' => absint($input['cta_image_id'] ?? 0),
			'cta_content'  => sanitize_textarea_field($input['cta_content'] ?? ''),
		];

	}

	/**
	 * Render admin page
	 */
	public function render_settings_page(): void {

		?>
		<div class="wrap">
			<h1>Manufacturer Settings</h1>

			<p>These settings are used for gloabl content on the manufacturer pages.</p>

			<form method="post" action="options.php">

				<?php
				settings_fields('real_electronics_manufacturer_group');
				do_settings_sections('real-electronics-manufacturers');
				submit_button();
				?>

			</form>
		</div>
		<?php

	}

}