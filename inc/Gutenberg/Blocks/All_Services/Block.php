<?php

namespace FP\Gutenberg\Blocks\All_Services;

defined( 'ABSPATH' ) || exit;

use FP\Gutenberg\Gutenberg_Block;

class Block extends Gutenberg_Block {

	// dashes only
	const NAME = 'fp-all-services';

	public function init_fields(): void {

		$this->add_field( [
			'name'          => 'title',
			'label'         => __( 'Title', 'fp' ),
			'type'          => 'text',
			'default_value' => 'Treatments available',
		] );

		$this->add_field( [
			'name'          => 'services',
			'label'         => __( 'services', 'fp' ),
			'type'          => 'post_object',
			'return_format' => 'id',
			'multiple'      => 1,
			'instructions'  => 'Select the Archive Service Page with you want to display',
		] );

//		$this->add_field( [
//			'name'          => 'services',
//			'label'         => __( 'services', 'fp' ),
//			'type'          => 'taxonomy',
//			'taxonomy'      => 'service_category',
//			'field_type'    => 'multi_select',
//			'return_format' => 'id',
//		] );

	}

}
