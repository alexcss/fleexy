<?php

namespace FP\Gutenberg\Blocks\Hero;

defined( 'ABSPATH' ) || exit;

use FP\Gutenberg\Gutenberg_Block;

class Block extends Gutenberg_Block {

	// dashes only
	const NAME = 'fp-hero';

	public function init_fields(): void {

		$this->add_field( [
			'name'          => 'title',
			'label'         => __( 'Title', 'fp' ),
			'type'          => 'textarea',
			'default_value' => 'Your __Health and Wellness__ Space',
			'instructions'  => __( 'if you want to highlight a word use this rule __TEXT__', 'fp' ),
		] );

		$this->add_field( [
			'name'       => 'team',
			'label'      => __( 'Team', 'fp' ),
			'type'       => 'repeater',
			'sub_fields' => [
				[
					'key'   => 'numbers_text',
					'label' => __( 'Text', 'fp' ),
					'name'  => 'numbers_text',
					'type'  => 'textarea',
					'rows'  => 4,
				],
			],
		] );

		$this->add_field( [
			'name'          => 'description',
			'label'         => __( 'Description', 'fp' ),
			'type'          => 'textarea',
			'default_value' => 'Take care of your health and well-being. Relax with your family or alone and melt all your troubles away.',
			'instructions'  => __( 'if you want to highlight a word use this rule __TEXT__', 'fp' ),
		] );

		$this->add_field( [
			'name'  => 'cta',
			'label' => __( 'CTA', 'fp' ),
			'type'  => 'link',
		] );

		$this->add_field( [
			'name'  => 'image',
			'label' => __( 'Image', 'fp' ),
			'type'  => 'image',
		] );

	}

}
