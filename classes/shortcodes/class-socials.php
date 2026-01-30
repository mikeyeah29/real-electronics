<?php

namespace RealElectronics\Shortcodes;

class Socials {

	public function __construct() {
		add_shortcode( 'socials', [ $this, 'render' ] );
	}

	/**
	 * Render the [socials] shortcode.
	 *
	 * Usage: [socials theme="light"]
	 */
	public function render( $atts ) {

		$atts = shortcode_atts(
			[
				'theme' => 'light',
			],
			$atts,
			'socials'
		);

		if ( empty( $atts['theme'] ) ) {
			return '';
		}

		ob_start();
		?>
		<?php get_template_part('template-parts/social-links', null, $atts); ?>
		<?php

		return ob_get_clean();
	}
}
