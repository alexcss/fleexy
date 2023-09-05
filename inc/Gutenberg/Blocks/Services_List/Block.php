<?php

namespace FP\Gutenberg\Blocks\Services_List;

defined( 'ABSPATH' ) || exit;

use FP\Gutenberg\Gutenberg_Block;

class Block extends Gutenberg_Block {

	// dashes only
	const NAME = 'fp-services-list';

	public function init_fields(): void {

		global $wpdb;

		$query = "SELECT * FROM {$wpdb->prefix}bookingpress_categories";

		$results = $wpdb->get_results( $query, ARRAY_A );

		$data = [];

		if ( $results ) {
			foreach ( $results as $result ) {
				$data[ $result['bookingpress_category_id'] ] = $result['bookingpress_category_name'];
			}
		}

		$this->add_field( [
			'name'          => 'title',
			'label'         => __( 'Title', 'fp' ),
			'type'          => 'text',
			'default_value' => 'Treatments available',
		] );

		$this->add_field( [
			'name'     => 'service_category',
			'label'    => __( 'Service Category', 'fp' ),
			'type'     => 'select',
			'choices'  => $data,
			'multiple' => 0,
			'ui'       => 1,
			'ajax'     => 1,
			'required' => 1,
		] );

	}

}
