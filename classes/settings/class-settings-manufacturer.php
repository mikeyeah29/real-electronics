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

		add_settings_section(
			'real_electronics_manufacturers_archive',
			'Manufacturers Archive',
			function () {
				echo '<p>Additional manufacturer names displayed on the manufacturers archive page.</p>';
			},
			'real-electronics-manufacturers'
		);

		$this->add_field(
			'other_manufacturers',
			'Other Manufacturers',
			'textarea',
			'real_electronics_manufacturers_archive',
			'Enter one manufacturer name per line.',
			"B&C Speakers\nBlue Microphones\nCambridge Audio\nChord Electronics"
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
		string $description = '',
		string $placeholder = ''
	): void {

		add_settings_field(
			$key,
			$label,
			function () use ($key, $type, $description, $placeholder) {
				$this->render_field($key, $type, $description, $placeholder);
			},
			'real-electronics-manufacturers',
			$section
		);

	}

	/**
	 * Field renderer
	 */
	private function render_field(string $key, string $type, string $description = '', string $placeholder = ''): void {

		$options = get_option($this->option_key);
		$value   = $options[$key] ?? '';

		if ($type === 'textarea') {

			echo '<textarea rows="6" class="large-text" name="' . $this->option_key . '[' . $key . ']" placeholder="' . esc_attr($placeholder) . '">'
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
			'other_manufacturers'                  => sanitize_textarea_field($input['other_manufacturers'] ?? ''),
			// 'non_authorised_non_warranty_repairs'  => sanitize_textarea_field($input['non_authorised_non_warranty_repairs'] ?? ''),
			// 'non_authorised_warranty_information'  => sanitize_textarea_field($input['non_authorised_warranty_information'] ?? ''),
		];

	}

	/**
	 * Render admin page
	 */
	public function render_settings_page(): void {

		?>
		<div class="wrap">
			<h1>Manufacturer Settings</h1>

			<p>These settings are used for manufacturer-specific content.</p>

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
