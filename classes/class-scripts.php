<?php

namespace RealElectronics\Theme;

/**
 * Theme scripts and styles loader
 */

class Scripts {

	public function __construct() {
		
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_assets' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_assets' ) );
		add_action('admin_enqueue_scripts', [ $this, 'enqueue_admin_styles' ]);
		add_action('admin_enqueue_scripts', [ $this, 'enqueue_admin_scripts' ]);

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

		$accordion_js_path = get_theme_file_path( 'assets/js/accordion-fallback.js' );
		if ( file_exists( $accordion_js_path ) ) {
			wp_enqueue_script(
				'real-electronics-accordion-fallback',
				get_theme_file_uri( 'assets/js/accordion-fallback.js' ),
				[],
				filemtime( $accordion_js_path ),
				true
			);
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
		$fonts_url = 'https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&family=Rajdhani:wght@400;500;600;700&display=swap'; // get_theme_mod('google_fonts_url');
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

	public function enqueue_admin_styles(): void {

		$screen = get_current_screen();

		if ($screen->id !== 'settings_page_real-electronics-manufacturers') {
			return;
		}

		wp_enqueue_style(
			'real-electronics-settings',
			get_template_directory_uri() . '/assets/admin/settings.css',
			[],
			'1.0'
		);

	}

	public function enqueue_admin_scripts(string $hook): void {

		if ($hook !== 'settings_page_real-electronics-manufacturers') {
			return;
		}

		wp_enqueue_media();

		wp_add_inline_script('jquery-core', <<<'JS'
		(function($){

			function refreshPreview($wrap, attachment){
				var url = (attachment && attachment.sizes && attachment.sizes.medium) ? attachment.sizes.medium.url : attachment.url;
				$wrap.find('.re-media-field__preview').html(
					'<img src="' + url + '" style="max-width:240px;height:auto;border:1px solid #dcdcde;border-radius:4px;" />'
				);
			}

			$(document).on('click', '.re-media-field__select', function(e){
				e.preventDefault();

				var $wrap = $(this).closest('.re-media-field');
				var $input = $wrap.find('.re-media-field__input');

				var frame = wp.media({
					title: 'Select CTA Image',
					button: { text: 'Use this image' },
					multiple: false
				});

				frame.on('select', function(){
					var attachment = frame.state().get('selection').first().toJSON();
					$input.val(attachment.id);
					refreshPreview($wrap, attachment);
				});

				frame.open();
			});

			$(document).on('click', '.re-media-field__remove', function(e){
				e.preventDefault();

				var $wrap = $(this).closest('.re-media-field');
				$wrap.find('.re-media-field__input').val('');
				$wrap.find('.re-media-field__preview').html(
					'<div style="width:240px;max-width:100%;padding:18px;border:1px dashed #c3c4c7;border-radius:4px;color:#646970;">No image selected</div>'
				);
			});

		})(jQuery);
		JS, 'after');

	}
}
