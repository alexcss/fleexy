<?php

namespace FP\Gutenberg\Blocks\Services_List;

defined( 'ABSPATH' ) || exit;

use FP\Gutenberg\Gutenberg_Block;

class Block extends Gutenberg_Block {

	// dashes only
	const NAME = 'fp-services-list';

	public function init_fields(): void {

		$this->add_field( [
			'name'          => 'title',
			'label'         => __( 'Title', 'fp' ),
			'type'          => 'text',
			'default_value' => 'Treatments available',
		] );

		$this->add_field( [
			'name'          => 'service_category',
			'label'         => __( 'Service Category', 'fp' ),
			'type'          => 'taxonomy',
			'taxonomy'      => 'service_category',
			'multiple'      => 0,
			'add_term'      => 0,
			'save_terms'    => 0,
			'load_terms'    => 0,
			'return_format' => 'id',
			'field_type'    => 'select',
		] );

	}

}
