<?php
namespace RealElectronics\Shortcodes;

class SvgIcon {

	public function __construct() {
		add_shortcode( 'svg_icon', [ $this, 'render' ] );
	}

	/**
	 * Render the [svg_icon] shortcode.
	 *
	 * Usage: [svg_icon name="guitar-icon"]
	 */
	public function render( $atts ) {

		$atts = shortcode_atts(
			[
				'name' => '',
			],
			$atts,
			'svg_icon'
		);

		if ( empty( $atts['name'] ) ) {
			return '';
		}

		ob_start();
		?>
		<span class="real-svg-icon">
			<?php
			get_template_part(
				'template-parts/svg/' . esc_attr( $atts['name'] )
			);
			?>
		</span>
		<?php

		return ob_get_clean();
	}
}
