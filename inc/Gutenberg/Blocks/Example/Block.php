<?php

namespace FP\Gutenberg\Blocks\Example;

defined( 'ABSPATH' ) || exit;

use FP\Gutenberg\Gutenberg_Block;

class Block extends Gutenberg_Block {

	// dashes only
	const NAME = 'fp-example';

	public function init_fields() {

		$this->add_field( [
			'name'          => 'title',
			'label'         => __( 'Title', 'fp' ),
			'type'          => 'text',
			'default_value' => 'Lorem Ipsum Title'
		] );


	}

}
