<?php

namespace FP\Gutenberg\Blocks\Our_Advantages;

defined( 'ABSPATH' ) || exit;

use FP\Gutenberg\Gutenberg_Block;

class Block extends Gutenberg_Block {

	// dashes only
	const NAME = 'fp-our-advantages';

	public function init_fields(): void {

		$this->add_field( [
			'name'          => 'title',
			'label'         => __( 'Title', 'fp' ),
			'type'          => 'textarea',
			'default_value' => 'Treat Your __Soul and Body__',
			'instructions'  => __( 'if you want to highlight a word use this rule __TEXT__', 'fp' ),
			'new_lines'     => 'br',
		] );

		$this->add_field( [
			'name'       => 'advantages',
			'label'      => __( 'Advantages', 'fp' ),
			'type'       => 'repeater',
			'layout'     => 'block',
			'sub_fields' => [
				[
					'name'  => 'image',
					'label' => __( 'Image', 'fp' ),
					'type'  => 'image',
				],
				[
					'name'  => 'title',
					'label' => __( 'Title', 'fp' ),
					'type'  => 'text',
				],
				[
					'name'  => 'description',
					'label' => __( 'Description', 'fp' ),
					'type'  => 'textarea',
				],
			]
		] );

		$this->add_field( [
			'name'          => 'description',
			'label'         => __( 'Description', 'fp' ),
			'type'          => 'textarea',
			'default_value' => 'Reduce stress and anxiety. Slow your life in a big city.',
			'instructions'  => __( 'if you want to highlight a word use this rule __TEXT__', 'fp' ),
			'new_lines'     => 'br',
		] );

		$this->add_field( [
			'name'  => 'cta',
			'label' => __( 'CTA', 'fp' ),
			'type'  => 'link',
		] );

	}

}
