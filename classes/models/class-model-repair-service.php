<?php

namespace RealElectronics\Models;

class RepairService {

	private int $post_id;
	private string $post_title;

	public function __construct( int $post_id ) {
		$this->post_id = $post_id;
		$this->post_title = get_the_title( $this->post_id );
	}

    public function getCTAHeading(): string {

        $title = trim($this->post_title);
        $firstLetter = strtolower($title[0] ?? '');

        $vowels = ['a', 'e', 'i', 'o', 'u'];

        $article = in_array($firstLetter, $vowels, true) ? 'an' : 'a';

        return "Book {$article} {$title} repair";
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