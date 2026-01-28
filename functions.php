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
	Register Custom Post Types
===============================================
*/

require_once get_template_directory() . '/classes/cpt/class-manufacturers.php';
new \RealElectronics\CPT\Manufacturers();

/*
===============================================
	Register Simple Meta Boxes
===============================================
*/

require_once get_template_directory() . '/classes/class-simple-meta-boxes.php';

// meta fields go here...

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