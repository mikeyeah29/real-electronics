<?php
/**
 * Portfolio Custom Post Type
 */

namespace RealElectronics\CPT;

class Manufacturers {

	private string $post_type = 'manufacturer';

	public function __construct() {
		add_action('init', [ $this, 'register_post_type' ]);
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
			'supports'				=> [ 'title', 'editor', 'thumbnail', 'excerpt' ],
			'show_in_rest'			=> true,
			'rewrite'				=> [
				'slug'				=> 'manufacturers',
				'with_front'		=> false,
			],
		];

		register_post_type($this->post_type, $args);

	}
}
