<?php
/**
 * Repair Services Custom Post Type
 */

namespace RealElectronics\CPT;

class RepairServices {

	private string $post_type = 'repair_service';

	public function __construct() {
		add_action('init', [ $this, 'register_post_type' ]);
	}

	public function register_post_type(): void {

		$labels = [
			'name'					=> 'Repair Services',
			'singular_name'			=> 'Repair Service',
			'menu_name'				=> 'Repair Services',
			'name_admin_bar'		=> 'Repair Service',
			'add_new'				=> 'Add New',
			'add_new_item'			=> 'Add New Repair Service',
			'new_item'				=> 'New Repair Service',
			'edit_item'				=> 'Edit Repair Service',
			'view_item'				=> 'View Repair Service',
			'all_items'				=> 'All Repair Services',
			'search_items'			=> 'Search Repair Services',
			'not_found'				=> 'No repair services found',
			'not_found_in_trash'	=> 'No repair services found in Trash',
		];

		$args = [
			'labels'				=> $labels,
			'public'				=> true,
			'has_archive'			=> false,
			'hierarchical'			=> false,
			'menu_position'			=> 21,
			'menu_icon'				=> 'dashicons-admin-tools',
			'supports'				=> [ 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ],
			'show_in_rest'			=> true,
			'rewrite'				=> [
				'slug'				=> 'repair-services',
				'with_front'		=> false,
			],
			'template'				=> [
				[ 'core/pattern', [ 'slug' => 'real-electronics/repair-service-content' ] ],
			],
		];

		register_post_type($this->post_type, $args);
	}
}
