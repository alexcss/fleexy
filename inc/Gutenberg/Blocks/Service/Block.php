<?php

namespace FP\Gutenberg\Blocks\Service;

defined( 'ABSPATH' ) || exit;

use FP\Gutenberg\Gutenberg_Block;

class Block extends Gutenberg_Block {

	// dashes only
	const NAME = 'fp-service';

	public function init_fields(): void {

		global $wpdb;

		$query = "SELECT * FROM {$wpdb->prefix}bookingpress_services";

		$results = $wpdb->get_results( $query, ARRAY_A );

		$data = [];

		if ( $results ) {
			foreach ( $results as $result ) {
				$data[ $result['bookingpress_service_id'] ] = $result['bookingpress_service_name'];
			}
		}

		$this->add_field( [
			'name'     => 'service',
			'label'    => __( 'Service', 'fp' ),
			'type'     => 'select',
			'choices'  => $data,
			'multiple' => 0,
			'ui'       => 1,
			'ajax'     => 1,
		] );

	}

}
