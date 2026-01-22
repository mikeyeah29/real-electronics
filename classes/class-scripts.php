<?php

namespace RealElectronics\Theme;

/**
 * Theme scripts and styles loader
 */

class Scripts {

	public function __construct() {
		
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_assets' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_assets' ) );

		add_action( 'enqueue_block_assets', function() {
			$css_path = get_theme_file_path( 'build/style-index.css' );
			if ( file_exists( $css_path ) ) {
				wp_enqueue_style(
					'real-electronics-global-styles',
					get_theme_file_uri( 'build/style-index.css' ),
					[],
					filemtime( $css_path )
				);
			}
		});

		add_filter('style_loader_tag', function($html, $handle) {
			if ($handle === 'real-electronics-global-styles') {
				$html = str_replace("rel='stylesheet'", "rel='preload' as='style' onload=\"this.onload=null;this.rel='stylesheet'\"", $html);
			}
			return $html;
		}, 10, 2);

		$this->enqueue_google_fonts();

	}

	/**
	 * Enqueue frontend assets (global styles + JS)
	 */
	public function enqueue_frontend_assets() {
		// Global CSS

		// Global JS (frontend)
		$asset_file = get_theme_file_path('build/index.asset.php');
		$js_path    = get_theme_file_path('build/index.js');
		if ( file_exists($asset_file) && file_exists($js_path) ) {
			$asset = include $asset_file;
			wp_enqueue_script('rwd-frontend', get_theme_file_uri('build/index.js'), $asset['dependencies'], $asset['version'], true);
		}

	}

	private function enqueue_adobe_fonts() {
		add_action('wp_head', function() {
			$fonts_url = get_theme_mod('adobe_fonts_url');
			if($fonts_url) {
				echo '<link rel="preload" href="'.$fonts_url.'" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
				echo '<noscript><link rel="stylesheet" href="'.$fonts_url.'"></noscript>';
			}
		}, 5);
	}

	private function enqueue_google_fonts() {
		$fonts_url = 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&family=Rajdhani:wght@400;500;600;700&display=swap'; // get_theme_mod('google_fonts_url');
		if($fonts_url) {
			// Preconnects
			wp_resource_hints( 'https://fonts.googleapis.com', 'preconnect' );
			wp_resource_hints( 'https://fonts.gstatic.com', 'preconnect' );

			// Google Fonts enqueue
			wp_enqueue_style(
				'real-electronics-google-fonts',
				$fonts_url,
				array(),
				null
			);
		}
	}

	public function enqueue_editor_assets() {

        // Editor-only CSS (block editor.scss + editor-global.scss)
        $editor_css = get_theme_file_path( 'build/editor.css' );
        if ( file_exists( $editor_css ) ) {
            wp_enqueue_style(
                'real-electronics-editor-styles',
                get_theme_file_uri( 'build/editor.css' ),
                [],
                filemtime( $editor_css )
            );
        }

        // Editor JS (registers all blocks)
        $asset_path = get_theme_file_path( 'build/editor.asset.php' );
        $js_path    = get_theme_file_path( 'build/editor.js' );
        if ( file_exists( $asset_path ) && file_exists( $js_path ) ) {
            $asset = include $asset_path;
            wp_enqueue_script(
                'real-electronics-blocks-editor',
                get_theme_file_uri( 'build/editor.js' ),
                $asset['dependencies'],
                $asset['version'],
                true
            );
        }
    }
}
