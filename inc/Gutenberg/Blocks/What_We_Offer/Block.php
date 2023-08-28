<?php

namespace FP\Gutenberg\Blocks\What_We_Offer;

defined( 'ABSPATH' ) || exit;

use FP\Gutenberg\Gutenberg_Block;

class Block extends Gutenberg_Block {

	// dashes only
	const NAME = 'fp-what-we-offer';

	public function init_fields(): void {

		$this->add_field( [
			'name'          => 'title',
			'label'         => __( 'Title', 'fp' ),
			'type'          => 'textarea',
			'default_value' => 'What __We Offer__',
			'instructions'  => __( 'if you want to highlight a word use this rule __TEXT__', 'fp' ),
			'new_lines'     => 'br',
		] );

		$this->add_field( [
			'name'       => 'offers',
			'label'      => __( 'Offers', 'fp' ),
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
				[
					'name'  => 'link',
					'label' => __( 'Link', 'fp' ),
					'type'  => 'link',
				]
			]
		] );

		$this->add_field( [
			'name'  => 'image',
			'label' => __( 'Image', 'fp' ),
			'type'  => 'image',
		] );

		$this->add_field( [
			'name'          => 'second_title',
			'label'         => __( 'Title', 'fp' ),
			'type'          => 'textarea',
			'default_value' => 'Treat your __soul and body__',
			'instructions'  => __( 'if you want to highlight a word use this rule __TEXT__', 'fp' ),
			'new_lines'     => 'br',
		] );

		$this->add_field( [
			'name'          => 'description',
			'label'         => __( 'Description', 'fp' ),
			'type'          => 'textarea',
			'default_value' => 'Reduce stress and anxiety. Slow your life in a big city',
			'instructions'  => __( 'if you want to highlight a word use this rule __TEXT__', 'fp' ),
		] );

		$this->add_field( [
			'name'  => 'link',
			'label' => __( 'link', 'fp' ),
			'type'  => 'link',
		] );

	}

}
