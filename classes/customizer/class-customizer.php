<?php

namespace RealElectronics\Theme;

require_once get_template_directory() . '/classes/customizer/class-typography-customizer.php';
require_once get_template_directory() . '/classes/customizer/class-contact-customizer.php';

class Customizer {

    public function __construct() {
        add_action('customize_register', array($this, 'register_customizer_settings'));
    }

    public function register_customizer_settings($wp_customize) {
        Typography_Customizer::register($wp_customize);
        Contact_Customizer::register($wp_customize);
    }
}
