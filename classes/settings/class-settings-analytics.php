<?php

namespace RealElectronics\Settings;

class AnalyticsSettings {

	private string $option_key = 'real_electronics_analytics_settings';

	public function __construct() {
		add_action('admin_menu', [ $this, 'add_menu_page' ]);
		add_action('admin_init', [ $this, 'register_settings' ]);
	}

	/**
	 * Add menu item
	 */
	public function add_menu_page(): void {

		add_options_page(
			'Analytics Settings',
			'Analytics',
			'manage_options',
			'real-electronics-analytics',
			[ $this, 'render_settings_page' ]
		);

	}

	/**
	 * Register settings
	 */
	public function register_settings(): void {

		register_setting(
			'real_electronics_analytics_group',
			$this->option_key,
			[ $this, 'sanitize' ]
		);

		add_settings_section(
			'real_electronics_analytics_main',
			'Tracking Configuration',
			null,
			'real-electronics-analytics'
		);

		$this->add_field('enabled', 'Enable Tracking', 'checkbox');
		$this->add_field('ga4_id', 'GA4 Measurement ID');
		$this->add_field('gtm_id', 'Google Tag Manager ID');
		$this->add_field('fb_pixel', 'Facebook Pixel ID');
		$this->add_field('excluded_ips', 'Excluded IPs', 'textarea');

	}

	/**
	 * Helper to register fields
	 */
	private function add_field(string $key, string $label, string $type = 'text'): void {

		add_settings_field(
			$key,
			$label,
			function () use ($key, $type) {
				$this->render_field($key, $type);
			},
            'real-electronics-analytics',
			'real_electronics_analytics_main'
		);

	}

	/**
	 * Field renderer
	 */
	private function render_field(string $key, string $type): void {

		$options = get_option($this->option_key);
		$value   = $options[$key] ?? '';

		if ($type === 'checkbox') {
			echo '<input type="checkbox" name="' . $this->option_key . '[' . $key . ']" value="1" ' . checked($value, 1, false) . ' />';
			return;
		}

		if ($type === 'textarea') {
			echo '<textarea rows="5" class="large-text" name="' . $this->option_key . '[' . $key . ']">' . esc_textarea($value) . '</textarea>';
			echo '<p class="description">One IP per line. Add these to GA4 Internal Traffic filters.</p>';
			return;
		}

		echo '<input type="text" class="regular-text" name="' . $this->option_key . '[' . $key . ']" value="' . esc_attr($value) . '" />';

	}

	/**
	 * Sanitize input
	 */
	public function sanitize(array $input): array {

		return [
			'enabled'       => isset($input['enabled']) ? 1 : 0,
			'ga4_id'        => sanitize_text_field($input['ga4_id'] ?? ''),
			'gtm_id'        => sanitize_text_field($input['gtm_id'] ?? ''),
			'fb_pixel'     => sanitize_text_field($input['fb_pixel'] ?? ''),
			'excluded_ips' => sanitize_textarea_field($input['excluded_ips'] ?? ''),
		];

	}

	/**
	 * Render admin page
	 */
	public function render_settings_page(): void {

		?>
		<div class="wrap">
			<h1>Analytics Settings</h1>
			<form method="post" action="options.php">
				<?php
                    settings_fields('real_electronics_analytics_group');
					do_settings_sections('real-electronics-analytics');
					submit_button();
				?>
			</form>
		</div>
		<?php

	}

}
