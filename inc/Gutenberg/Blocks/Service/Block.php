<?php

namespace FP\Gutenberg\Blocks\Service;

defined( 'ABSPATH' ) || exit;

use FP\Gutenberg\Gutenberg_Block;

class Block extends Gutenberg_Block {

	// dashes only
	const NAME = 'fp-service';

	public function init_fields(): void {

		$this->add_field( [
			'name'          => 'service',
			'label'         => __( 'Service', 'fp' ),
			'type'          => 'post_object',
			'ui'            => 1,
			'post_type'     => [
				0 => 'service',
			],
			'post_status'   => [
				0 => 'publish',
			],
			'return_format' => 'id',
		] );

	}

}
