<?php

namespace RealElectronics\Theme;

class Options {

    public static function get_cta_args($manufacturer_name = ''): array {

        $options = get_option('real_electronics_manufacturer_settings') ?: [];

        $image_id = (int) ($options['cta_image_id'] ?? 0);

        $image_src    = $image_id ? wp_get_attachment_image_url($image_id, 'large') : '';
        $image_alt    = $image_id ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : '';
        $image_srcset = $image_id ? wp_get_attachment_image_srcset($image_id, 'large') : '';
        $image_sizes  = $image_id ? wp_get_attachment_image_sizes($image_id, 'large') : '';

        $meta = $image_id ? wp_get_attachment_metadata($image_id) : [];
        $image_width  = $meta['width'] ?? 1600;
        $image_height = $meta['height'] ?? 900;

        $heading = $options['cta_heading'] ?? 'Book a Repair';

        if ($manufacturer_name) {
            $heading = 'Book a ' . $manufacturer_name . ' repair';
        }

        return [
            'image' => [
                'src'    => $image_src ?: 'https://placehold.co/600x400',
                'alt'    => $image_alt,
                'srcset' => $image_srcset ?: 'https://placehold.co/600x400 1600w, https://placehold.co/300x200 300w, https://placehold.co/1024x768 1024w, https://placehold.co/150x100 150w, https://placehold.co/768x576 768w, https://placehold.co/1536x1152 1536w',
                'sizes'  => $image_sizes ?: '(max-width: 1600px) 100vw, 1600px',
                'width'  => $image_width,
                'height' => $image_height,
            ],
            'heading' => $heading,
            'text'    => $options['cta_content'] ?? '',
        ];

    }

}