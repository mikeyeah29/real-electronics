<?php

namespace RealElectronics\ACF;

class RepairFields {

	public function __construct() {
		add_action( 'acf/init', [ $this, 'register_fields' ] );
	}

	public function register_fields() {

		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}

		// acf_add_local_field_group([
		// 	'key' => 'group_manufacturer_details',
		// 	'title' => 'Manufacturer Details',
		// 	'fields' => [

		// 		[
		// 			'key' => 'field_manufacturer_logo',
		// 			'label' => 'Manufacturer Logo',
		// 			'name' => 'manufacturer_logo',
		// 			'type' => 'image',
		// 			'return_format' => 'array',
		// 			'preview_size' => 'medium',
		// 			'library' => 'all',
		// 		],
        //         [
		// 			'key' => 'field_manufacturer_logo_alt',
		// 			'label' => 'Manufacturer Logo Alt',
		// 			'name' => 'manufacturer_logo_alt',
		// 			'type' => 'image',
        //             'instructions' => 'If set, this image will be used on the slider',
		// 			'return_format' => 'array',
		// 			'preview_size' => 'medium',
		// 			'library' => 'all',
		// 		],

		// 	],

		// 	'location' => [
		// 		[
		// 			[
		// 				'param' => 'post_type',
		// 				'operator' => '==',
		// 				'value' => 'manufacturer',
		// 			],
		// 		],
		// 	],

		// ]);

	}

}