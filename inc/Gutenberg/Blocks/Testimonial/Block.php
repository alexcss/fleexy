<?php

namespace FP\Gutenberg\Blocks\Testimonial;

defined( 'ABSPATH' ) || exit;

use FP\Gutenberg\Gutenberg_Block;

class Block extends Gutenberg_Block {

	// dashes only
	const NAME = 'fp-testimonial';

	public function init_fields(): void {

		$this->add_field( [
			'name'          => 'title',
			'label'         => __( 'Title', 'fp' ),
			'type'          => 'textarea',
			'default_value' => 'Our __clients say__',
			'instructions'  => __( 'if you want to highlight a word use this rule __TEXT__', 'fp' ),
		] );

		$this->add_field( [
			'name'          => 'testimonials',
			'label'         => __( 'Testimonials', 'fp' ),
			'type'          => 'relationship',
			'post_status'   => [
				0 => 'publish',
			],
			'post_type'     => [
				0 => 'testimonial',
			],
			'filters'       => [
				0 => 'search',
			],
		] );

	}

}
