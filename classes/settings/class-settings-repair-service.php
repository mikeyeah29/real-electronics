<?php

namespace RealElectronics\Settings;

class RepairServiceSettings {

	private string $option_key = 'real_electronics_repair_service_settings';

	public function __construct() {
		add_action('admin_menu', [ $this, 'add_menu_page' ]);
		add_action('admin_init', [ $this, 'register_settings' ]);
        add_filter('option_page_capability_real_electronics_repair_service_group', [ $this, 'get_required_capability' ]);
	}

	/**
	 * Add menu item
	 */
	public function add_menu_page(): void {

		add_submenu_page(
			'edit.php?post_type=repair_service',
			'Repair Service Settings',
			'Settings',
			'edit_pages',
			'real-electronics-repair-services',
			[ $this, 'render_settings_page' ]
		);

	}

	public function get_required_capability(): string {

		return 'edit_pages';

	}

	public function register_settings(): void {

		register_setting(
			'real_electronics_repair_service_group',
			$this->option_key,
			[ $this, 'sanitize' ]
		);

		add_settings_section(
			'real_electronics_repair_service_general',
			'General',
			'__return_empty_string',
			'real-electronics-repair-services'
		);

		$this->add_field(
			'description',
			'Description',
			'textarea',
			'real_electronics_repair_service_general'
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
			'real-electronics-repair-services',
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
			'description'                          => sanitize_textarea_field($input['description'] ?? ''),
		];

	}

	/**
	 * Render admin page
	 */
	public function render_settings_page(): void {

		?>
		<div class="wrap">
			<h1>Repair Service Settings</h1>

			<form method="post" action="options.php">

				<?php
				settings_fields('real_electronics_repair_service_group');
				do_settings_sections('real-electronics-repair-services');
				submit_button();
				?>

			</form>
		</div>
		<?php

	}

}
