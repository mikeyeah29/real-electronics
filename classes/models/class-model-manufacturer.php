<?php

namespace RealElectronics\Models;

class Manufacturer {

	private int $post_id;
	private string $post_title;

	public function __construct( int $post_id ) {
		$this->post_id = $post_id;
		$this->post_title = get_the_title( $this->post_id );
	}


    public function isAuthorised(): ?bool {
        return get_post_meta( $this->post_id, 'is_authorised', true );
    }

    public function getHeroTitle(): ?string {

        $hero_title = $this->post_title . ' Service & Repair Centre';

        if ( get_post_meta( $this->post_id, 'is_authorised', true ) ) {
            $hero_title = 'Authorised ' . $hero_title;
        }

        return $hero_title;
    }

    public function getHeroLogo(): ?array {
        return get_field('manufacturer_logo', $this->post_id);
    }

    public function getHeroLogoWidth(): ?int {
        $default_width = 330;
        return get_field( 'manufacturer_logo_width', $this->post_id ) ? get_field( 'manufacturer_logo_width', $this->post_id ) : $default_width;
    }

	public function getLogo(): ?array {

        // New priority field (could be URL or image array depending on ACF setup)
        $alt_logo = get_field('manufacturer_logo_alt', $this->post_id);

        if (!empty($alt_logo)) {

            // If it's an ACF image array
            if (is_array($alt_logo) && isset($alt_logo['url'])) {
                return [
                    'url' => $alt_logo['url'],
                    'alt' => $alt_logo['alt'] ?? ''
                ];
            }

            // If it's just a URL string
            if (is_string($alt_logo)) {
                return [
                    'url' => $alt_logo,
                    'alt' => ''
                ];
            }
        }

        // Fallback to original logo
        $logo = get_field('manufacturer_logo', $this->post_id);

        if (!empty($logo) && is_array($logo)) {
            return [
                'url' => $logo['url'],
                'alt' => $logo['alt'] ?? ''
            ];
        }

        return null;
    }
}