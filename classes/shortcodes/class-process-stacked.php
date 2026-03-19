<?php

namespace RealElectronics\Shortcodes;

class ProcessStacked {

	public function __construct() {
		add_shortcode( 'process-stacked', [ $this, 'render' ] );
	}

	/**
	 * Render the [process-stacked] shortcode.
	 *
	 * Usage: [process-stacked]
	 */
	public function render( $atts ) {

		$atts = shortcode_atts(
			[],
			$atts,
			'process-stacked'
		);

		ob_start();
		?>
		<?php get_template_part('template-parts/section-process-stacked', null, $atts); ?>
		<?php

		return ob_get_clean();
	}
}
