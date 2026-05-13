<?php
/**
 * Reviews Custom Post Type
 */

namespace RealElectronics\CPT;

class Reviews {

	private string $post_type = 'review';

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
			'name'					=> 'Reviews',
			'singular_name'			=> 'Review',
			'menu_name'				=> 'Reviews',
			'name_admin_bar'		=> 'Review',
			'add_new'				=> 'Add New',
			'add_new_item'			=> 'Add New Review',
			'new_item'				=> 'New Review',
			'edit_item'				=> 'Edit Review',
			'view_item'				=> 'View Review',
			'all_items'				=> 'All Reviews',
			'search_items'			=> 'Search Reviews',
			'not_found'				=> 'No reviews found',
			'not_found_in_trash'	=> 'No reviews found in Trash',
		];

		$args = [
			'labels'				=> $labels,
			'public'				=> true,
			'publicly_queryable'	=> false,
			'exclude_from_search'	=> true,
			'has_archive'			=> false,
			'hierarchical'			=> false,
			'menu_position'			=> 22,
			'menu_icon'				=> 'dashicons-star-filled',
			'supports'				=> [ 'title', 'editor', 'page-attributes' ],
			'show_in_rest'			=> true,
			'rewrite'				=> false,
		];

		register_post_type($this->post_type, $args);

	}
}
