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

// filters go here...

/*
===============================================
	Debug
===============================================
*/

require_once get_template_directory() . '/classes/class-debugging.php';
new \RealElectronics\Debugging\Debugging(true);