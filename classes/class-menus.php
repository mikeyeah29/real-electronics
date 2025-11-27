<?php
/**
 * Register theme menus
 */

namespace RealElectronics\Theme;

class Menus {

	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'register_menus' ) );
	}

	/**
	 * Register navigation menus
	 */
	public function register_menus() {
		register_nav_menus(
			array(
				'primary'   => __( 'Primary Menu', 'real-electronics' ),
				'secondary' => __( 'Secondary Menu', 'real-electronics' ),
				'footer'    => __( 'Footer Menu', 'real-electronics' ),
			)
		);
	}
}
