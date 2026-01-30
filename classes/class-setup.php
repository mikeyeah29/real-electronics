<?php

namespace RealElectronics\Theme;

class Setup {

	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'setup_theme' ) );
		// add_action( 'init', [ $this, 'register_pattern_categories' ] );
	}

	public function setup_theme() {

		add_theme_support( 'editor-styles' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'align-wide' ); // optional, allows wide/full-width blocks
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'block-patterns' );

		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'h1', 'div' ),
		) );

		// You can add other setup items here later:
		// - register_nav_menus()
		// - add_image_size()
		// - load_theme_textdomain()
	}

	// public function register_pattern_categories() {

	// 	register_block_pattern_category(
	// 		'real-electronics',
	// 		[
	// 			'label' => __( 'Real Electronics', 'real-electronics' ),
	// 		]
	// 	);

	// }
}
