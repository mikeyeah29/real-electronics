<?php

namespace RealElectronics\Theme;

class Setup {

	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'setup_theme' ) );
	}

	public function setup_theme() {

		add_theme_support( 'editor-styles' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'align-wide' ); // optional, allows wide/full-width blocks
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		// You can add other setup items here later:
		// - register_nav_menus()
		// - add_image_size()
		// - load_theme_textdomain()
	}
}
