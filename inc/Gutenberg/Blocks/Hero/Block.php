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
			'name'          => 'title_size',
			'label'         => __( 'Title Size', 'fp' ),
			'type'          => 'button_group',
			'choices'       => [
				'h1' => 'H1',
				'h2' => 'H2',
			],
			'default_value' => 'h2',
		] );

		$this->add_field( [
			'name'          => 'description',
			'label'         => __( 'Description', 'fp' ),
			'type'          => 'wysiwyg',
			'default_value' => 'Take care of your health and well-being. Relax with your family or alone and melt all your troubles away.',
			'toolbar'       => 'basic',
			'media_upload'  => 0,
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

		$this->add_field( [
			'name'          => 'video',
			'label'         => __( 'Video', 'fp' ),
			'type'          => 'file',
			'instructions'  => 'Max Size 10MB',
			'return_format' => 'array',
			'max_size'      => 10,
			'mime_types'    => 'mp4, m4v, webm, ogv, wmv',
		] );

	}

}
