<?php

namespace FP\Gutenberg\Blocks\Contact_Us;

defined( 'ABSPATH' ) || exit;

use FP\Gutenberg\Gutenberg_Block;

class Block extends Gutenberg_Block {

	// dashes only
	const NAME = 'fp-contact-us';

	public function init_fields(): void {

		$this->add_field( [
			'name'          => 'title',
			'label'         => __( 'Title', 'fp' ),
			'type'          => 'textarea',
			'default_value' => 'Drop Us a Line',
			'instructions'  => __( 'if you want to highlight a word use this rule __TEXT__', 'fp' ),
		] );

		$this->add_field( [
			'name'         => 'form',
			'label'        => __( 'Contact Form', 'fp' ),
			'type'         => 'text',
			'instructions' => __( 'Pls put shortcode from Contact Form 7', 'fp' ),
		] );

	}

}
