<?php
/**
 * Portfolio Custom Post Type
 */

namespace RealElectronics\CPT;

class Manufacturers {

	private string $post_type = 'manufacturer';

	public function __construct() {
		add_action('init', [ $this, 'register_post_type' ]);
		add_filter('use_block_editor_for_post_type', [ $this, 'disable_gutenberg' ], 10, 2);
	}

	public function disable_gutenberg( $use_block_editor, $post_type ) {

		if ( $post_type === $this->post_type ) {
			return false;
		}

		return $use_block_editor;

	}

	public function register_post_type(): void {

		$labels = [
			'name'					=> 'Manufacturers',
			'singular_name'			=> 'Manufacturer',
			'menu_name'				=> 'Manufacturers',
			'name_admin_bar'		=> 'Manufacturer',
			'add_new'				=> 'Add New',
			'add_new_item'			=> 'Add New Manufacturer',
			'new_item'				=> 'New Manufacturer',
			'edit_item'				=> 'Edit Manufacturer',
			'view_item'				=> 'View Manufacturer',
			'all_items'				=> 'All Manufacturers',
			'search_items'			=> 'Search Manufacturers',
			'not_found'				=> 'No manufacturers found',
			'not_found_in_trash'	=> 'No manufacturers found in Trash',
		];

		$args = [
			'labels'				=> $labels,
			'public'				=> true,
			'has_archive'			=> true,
			'hierarchical'			=> false,
			'menu_position'			=> 20,
			'menu_icon'				=> 'dashicons-store',
			'supports'				=> [ 'title', 'thumbnail' ],
			'show_in_rest'			=> true,
			'rewrite'				=> [
				'slug'				=> 'manufacturers',
				'with_front'		=> false,
			],
			// 'template'				=> [
			// 	[ 'core/pattern', [ 'slug' => 'real-electronics/manufacturer-single' ] ],
			// ],
		];

		register_post_type($this->post_type, $args);

	}
}
