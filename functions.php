<?php

/*
===============================================
	Setup
===============================================
*/

require_once get_template_directory() . '/classes/class-setup.php';
require_once get_template_directory() . '/classes/class-scripts.php';
require_once get_template_directory() . '/classes/class-traffic.php';
require_once get_template_directory() . '/classes/class-menus.php';

new \RealElectronics\Theme\Setup();
new \RealElectronics\Theme\Scripts();
new \RealElectronics\Theme\Menus();

/*
===============================================
	Register Settings
===============================================
*/

require_once get_template_directory() . '/classes/settings/class-settings-analytics.php';
new \RealElectronics\Settings\AnalyticsSettings();

/*
===============================================
	Tracking
===============================================
*/

require_once get_template_directory() . '/classes/tracking/class-analytics.php';
new \RealElectronics\Tracking\AnalyticsOutput();

/*
===============================================
	Register Blocks / Patterns
===============================================
*/

require_once get_template_directory() . '/classes/class-block-setup.php';
new \RealElectronics\Theme\BlockSetup();

/*
===============================================
	Register Shortcodes
===============================================
*/

require_once get_template_directory() . '/classes/shortcodes/class-svg-icon.php';
require_once get_template_directory() . '/classes/shortcodes/class-socials.php';
new \RealElectronics\Shortcodes\SvgIcon();
new \RealElectronics\Shortcodes\Socials();
/*
===============================================
	Register Custom Post Types
===============================================
*/

require_once get_template_directory() . '/classes/cpt/class-manufacturers.php';
require_once get_template_directory() . '/classes/cpt/class-repair-services.php';
new \RealElectronics\CPT\Manufacturers();
new \RealElectronics\CPT\RepairServices();

/*
===============================================
	Register Simple Meta Boxes
===============================================
*/

require_once get_template_directory() . '/classes/class-simple-meta-boxes.php';

// meta fields go here...
$manufacturers_meta = new \RealElectronics\Theme\SimpleMetaBoxes('manufacturer', 'Manufacturer Meta', [
    'is_authorised' => [
        'label' => 'Authorised Service Centre?',
        'type' => 'checkbox'
    ]
]);

$repair_services_meta = new \RealElectronics\Theme\SimpleMetaBoxes('repair_service', 'Repair Service Meta', [
    'repair_tab_icon' => [
        'label' => 'Tab Icon',
        'type' => 'select',
        'options' => [
            '' => 'Select icon',
            'amp' => 'Amp',
            'mixer' => 'Mixer',
            'speaker' => 'Speaker',
            'laptop' => 'Laptop',
            'pro' => 'Pro',
        ]
    ],
    'repair_tab_colour' => [
        'label' => 'Tab Colour',
        'type' => 'select',
        'options' => [
            '' => 'Default',
            'blue' => 'Blue',
            'green' => 'Green',
            'purple' => 'Purple',
            'orange' => 'Orange',
            'cyan' => 'Cyan',
        ]
    ]
]);

/*
===============================================
	Register ACF Fields
===============================================
*/

require_once get_template_directory() . '/classes/acf/class-manufacturer-fields.php';
new \RealElectronics\ACF\ManufacturerFields();

// Options Pages

require_once get_template_directory() . '/classes/settings/class-settings-manufacturer.php';
new \RealElectronics\Settings\ManufacturerSettings();

/*
===============================================
	Register Models
===============================================
*/

require_once get_template_directory() . '/classes/models/class-model-manufacturer.php';

/*
===============================================
	Functions
===============================================
*/

function getMeta($name, $post_id = null) {
	if(!$post_id) {
		$post_id = get_the_ID();
	}
	return get_post_meta($post_id, $name, true);
}

/*
===============================================
	Filters
===============================================
*/

// Populate CF7 select dropdown dynamically from 'manufacturer' CPT
add_filter('wpcf7_form_tag', 'populate_manufacturer_dropdown', 10, 2);

function populate_manufacturer_dropdown($tag, $unused) {
    if ($tag['name'] != 'manufacturer') {
        return $tag;
    }

    // Query manufacturer CPT
    $args = array(
        'post_type'      => 'manufacturer',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'title',
        'order'          => 'ASC',
    );
    $manufacturers = get_posts($args);

    // Build options array
    $options = array();
    foreach ($manufacturers as $manu) {
        $options[] = $manu->post_title;
    }

    // Add a blank first option
    array_unshift($options, '');

    // Replace tag options
    $tag['raw_values'] = $options;
    $tag['values'] = $options;

    return $tag;
}


/*
===============================================
	Debug
===============================================
*/

require_once get_template_directory() . '/classes/class-debugging.php';
new \RealElectronics\Debugging\Debugging(true);

add_shortcode( 'svg_icon', function ( $atts ) {

	$atts = shortcode_atts(
		[
			'name' => '',
		],
		$atts
	);

	if ( empty( $atts['name'] ) ) {
		return '';
	}

	ob_start();
	?>
	<span class="enigma-svg-icon">
		<?php get_template_part( 'template-parts/svg/' . esc_attr( $atts['name'] ) ); ?>
	</span>
	<?php

	return ob_get_clean();
} );

function re_get_contact_details() {

    return [
        'address' => 'Dannemora Dr, Sheffield S9 5DF',
        'address_link' => 'https://www.google.com/maps/dir/50.7315048,-1.8056281/Dannemora+Dr,+Sheffield+S9+5DF/@53.3963956,-1.4122319,50m/data=!3m1!1e3!4m9!4m8!1m1!4e1!1m5!1m1!1s0x487977f1e1d8d799:0xa7d74cfde2cbaed4!2m2!1d-1.4124559!2d53.3974775?entry=ttu&g_ep=EgoyMDI2MDMxMS4wIKXMDSoASAFQAw%3D%3D',
        'phone' => '0114 244 2969',
        'email' => 'enquiries@realelectronics.co.uk',
        'facebook' => 'https://www.facebook.com/RealElectronics',
    ];
    
}