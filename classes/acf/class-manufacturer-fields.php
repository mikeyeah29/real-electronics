<?php

namespace RealElectronics\ACF;

class ManufacturerFields {

	public function __construct() {
		add_action( 'acf/init', [ $this, 'register_fields' ] );
	}

	public function register_fields() {

		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}

		acf_add_local_field_group([
			'key' => 'group_manufacturer_details',
			'title' => 'Manufacturer Details',
			'fields' => [

				[
					'key' => 'field_manufacturer_logo',
					'label' => 'Manufacturer Logo',
					'name' => 'manufacturer_logo',
					'type' => 'image',
					'return_format' => 'array',
					'preview_size' => 'medium',
					'library' => 'all',
				],
                [
					'key' => 'field_manufacturer_logo_alt',
					'label' => 'Manufacturer Logo Alt',
					'name' => 'manufacturer_logo_alt',
					'type' => 'image',
                    'instructions' => 'If set, this image will be used on the slider',
					'return_format' => 'array',
					'preview_size' => 'medium',
					'library' => 'all',
				],

			],

			'location' => [
				[
					[
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'manufacturer',
					],
				],
			],

		]);

        acf_add_local_field_group([
            'key' => 'group_manufacturer_hero',
            'title' => 'Manufacturer Hero',

            'fields' => [

                [
					'key' => 'field_manufacturer_logo_width',
					'label' => 'Manufacturer Logo Width',
					'name' => 'manufacturer_logo_width',
					'type' => 'number',
					'min' => 100,
					'default_value' => 330,
				],

                [
                    'key' => 'field_manufacturer_hero_subheading',
                    'label' => 'Hero Subheading',
                    'name' => 'hero_subheading',
                    'type' => 'text',
                    'instructions' => 'Short supporting line displayed below the heading.',
                    'required' => 0,
                    'wrapper' => [
                        'width' => '',
                    ],
                ],

            ],

            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'manufacturer',
                    ],
                ],
            ],

            'position' => 'acf_after_title',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
        ]);

        acf_add_local_field_group([
            'key' => 'group_manufacturer_service_details',
            'title' => 'Service Details',

            'fields' => [

                [
                    'key' => 'field_equipment_we_repair',
                    'label' => 'Equipment We Repair',
                    'name' => 'equipment_we_repair',
                    'type' => 'textarea',
                    'instructions' => 'Enter one item per line. Each line will become a list item.',
                    'rows' => 5,
                    'new_lines' => '',
                    'placeholder' => "Guitar Amplifiers\nBass Amplifiers\nValve Heads\nCombo Amps",
                ],

                [
                    'key' => 'field_common_faults',
                    'label' => 'Common Faults',
                    'name' => 'common_faults',
                    'type' => 'textarea',
                    'instructions' => 'Enter one fault per line. Each line will become a list item.',
                    'rows' => 5,
                    'new_lines' => '',
                    'placeholder' => "No power\nCrackling audio\nDistorted output\nBlown valves",
                ],

            ],

            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'manufacturer',
                    ],
                ],
            ],

        ]);

        acf_add_local_field_group([
			'key' => 'group_manufacturer_warranty_information',
			'title' => 'Warranty Information',

			'fields' => [

				[
					'key' => 'field_warranty_enabled',
					'label' => 'Show Warranty Information',
					'name' => 'warranty_enabled',
					'type' => 'true_false',
					'ui' => 1,
					'default_value' => 0,
				],

				[
					'key' => 'field_warranty_summary',
					'label' => 'Warranty Summary',
					'name' => 'warranty_summary',
					'type' => 'textarea',
					'instructions' => 'Short summary for the top warranty box.',
					'rows' => 3,
					'conditional_logic' => [
						[
							[
								'field' => 'field_warranty_enabled',
								'operator' => '==',
								'value' => '1',
							],
						],
					],
				],

				[
					'key' => 'field_warranty_info_heading',
					'label' => 'Warranty Info Heading',
					'name' => 'warranty_info_heading',
					'type' => 'text',
					'instructions' => 'Optional heading for the warranty information section.',
					'conditional_logic' => [
						[
							[
								'field' => 'field_warranty_enabled',
								'operator' => '==',
								'value' => '1',
							],
						],
					],
				],

				[
					'key' => 'field_warranty_cta_text',
					'label' => 'Warranty CTA Text',
					'name' => 'warranty_cta_text',
					'type' => 'text',
					'default_value' => 'View warranty details',
					'conditional_logic' => [
						[
							[
								'field' => 'field_warranty_enabled',
								'operator' => '==',
								'value' => '1',
							],
						],
					],
				],

				[
					'key' => 'field_warranty_cta_url',
					'label' => 'Warranty CTA URL',
					'name' => 'warranty_cta_url',
					'type' => 'url',
					'instructions' => 'Use an external URL, repair form URL, or leave blank if linking to an on-page anchor.',
					'conditional_logic' => [
						[
							[
								'field' => 'field_warranty_enabled',
								'operator' => '==',
								'value' => '1',
							],
						],
					],
				],

				[
					'key' => 'field_warranty_details',
					'label' => 'Warranty Details',
					'name' => 'warranty_details',
					'type' => 'wysiwyg',
					'instructions' => 'Full warranty instructions for this manufacturer. This can be reused on the single manufacturer page and the central warranty page.',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 0,
					'delay' => 0,
					'conditional_logic' => [
						[
							[
								'field' => 'field_warranty_enabled',
								'operator' => '==',
								'value' => '1',
							],
						],
					],
				],

			],

			'location' => [
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
