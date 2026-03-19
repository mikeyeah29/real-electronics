<?php

namespace RealElectronics\ACF;

class CallToActionFields {

	public function __construct() {
		add_action( 'acf/init', [ $this, 'register_fields' ] );
	}

	public function register_fields() {

		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}

		acf_add_local_field_group([
			'key' => 'group_call_to_action_details',
			'title' => 'Call To Action Details',
			'fields' => [

				[
					'key' => 'field_call_to_action_image',
					'label' => 'Call To Action Image',
					'name' => 'call_to_action_image',
					'type' => 'image',
					'return_format' => 'array',
					'preview_size' => 'medium',
					'library' => 'all',
                ],

                [
                    'key' => 'field_call_to_action_heading',
                    'label' => 'Call To Action Heading',
                    'name' => 'call_to_action_heading',
                    'type' => 'text',
                ],

                [
                    'key' => 'field_call_to_action_description',
                    'label' => 'Call To Action Description',
                    'name' => 'call_to_action_description',
                    'type' => 'textarea',
                    'rows' => 3,
                    'new_lines' => '',
                    'placeholder' => 'Enter your call to action description here',
                ]
			],

			'location' => [
				[
					[
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'repair_service',
					],
				],
				[
					[
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'manufacturer',
					],
				],
			],

		]);

	}

}
