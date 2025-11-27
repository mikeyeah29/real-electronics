<?php

namespace RealElectronics\Theme;

class BlockSetup {

	public function __construct() {
		add_action('init', [ $this, 'register_pattern_categories' ]);
		add_action('init', [ $this, 'register_blocks' ]);
	}

	public function register_pattern_categories(): void {

		register_block_pattern_category(
			'real-electronics',
			[
				'label' => __('Real Electronics Patterns', 'real-electronics')
			]
		);

	}

    /**
	 * Auto-register all blocks from /blocks/
	 */
	public function register_blocks(): void {

		$blocks_path = get_theme_file_path('blocks/*/block.json');

		foreach (glob($blocks_path) as $block_json) {
			register_block_type($block_json);
		}

	}

}
