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
        $hero_logo = get_field('manufacturer_logo', $this->post_id);
        return $hero_logo ? $hero_logo : [];
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

    public function getCTAHeading(): string {

        $title = trim($this->post_title);
        $firstLetter = strtolower($title[0] ?? '');

        $vowels = ['a', 'e', 'i', 'o', 'u'];

        $article = in_array($firstLetter, $vowels, true) ? 'an' : 'a';

        return "Book {$article} {$title} repair";
    }

    public function getServicingItems(): array {

        $items = get_post_meta($this->post_id, 'servicing_items', true);

        if (!is_array($items)) {
            return [];
        }

        $sanitized_items = [];

        foreach ($items as $item) {
            if (!is_array($item)) {
                continue;
            }

            $title = sanitize_text_field($item['title'] ?? '');
            $subtitle = sanitize_text_field($item['subtitle'] ?? '');
            $image_id = absint($item['image_id'] ?? 0);
            $link = esc_url_raw($item['link'] ?? '');

            if (!$title && !$image_id && !$link) {
                continue;
            }

            $sanitized_items[] = [
                'title' => $title,
                'subtitle' => $subtitle,
                'image_id' => $image_id,
                'link' => $link,
            ];
        }

        return $sanitized_items;
    }

    public function getCallToAction(): ?array {

        // Default data
        
        $data = [
            'image' => null,
            'heading' => $this->getCTAHeading(),
            'description' => null,
        ];

        // Check if override is set

        $image = get_field('call_to_action_image', $this->post_id);
        if ($image) {
            $data['image'] = [
                'src' => $image['url'],
                'alt' => $image['alt'],
            ];
        }

        $heading = get_field('call_to_action_heading', $this->post_id);
        if ($heading) {
            $data['heading'] = $heading;
        }

        $description = get_field('call_to_action_description', $this->post_id);
        if ($description) {
            $data['description'] = $description;
        }

        return $data;

    }
}
