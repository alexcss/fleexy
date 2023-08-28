<?php

namespace FP\Gutenberg\Blocks\Slider;

defined( 'ABSPATH' ) || exit;

use FP\Gutenberg\Gutenberg_Block;

class Block extends Gutenberg_Block {

	// dashes only
	const NAME = 'fp-slider';

	public function init_fields(): void {

		$this->add_field( [
			'name'  => 'slider',
			'label' => __( 'Slider', 'fp' ),
			'type'  => 'gallery',
		] );

	}

}
