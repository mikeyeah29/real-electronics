<?php

namespace RealElectronics\Theme;

class Typography_Customizer {

    public static function register($wp_customize) {

        $wp_customize->add_section('typography_options', array(
            'title'    => __('Typography Options', 'real-electronics'),
            'priority' => 31,
        ));

        $wp_customize->add_setting('google_fonts_url', array(
            'default'   => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control('google_fonts_url', array(
            'label'    => __('Google Fonts URL', 'real-electronics'),
            'section'  => 'typography_options',
            'settings' => 'google_fonts_url',
            'type'     => 'text',
        ));

        $wp_customize->add_setting('adobe_fonts_url', array(
            'default'   => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control('adobe_fonts_url', array(
            'label'    => __('Adobe Fonts URL', 'real-electronics'),
            'section'  => 'typography_options',
            'settings' => 'adobe_fonts_url',
            'type'     => 'text',
        ));
    }

}
