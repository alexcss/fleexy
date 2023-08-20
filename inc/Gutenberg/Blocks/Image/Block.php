<?php

namespace FP\Gutenberg\Blocks\Image;

defined( 'ABSPATH' ) || exit;

use FP\Gutenberg\Gutenberg_Block;

class Block extends Gutenberg_Block {

	// dashes only
	const NAME = 'fp-image';

	public function init_fields(): void {

		$this->add_field( [
			'name'  => 'image',
			'label' => __( 'Image', 'fp' ),
			'type'  => 'image',
		] );

	}

}
