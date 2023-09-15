<?php

namespace FP\Gutenberg\Blocks\Service_Bookingpress;

defined( 'ABSPATH' ) || exit;

use FP\Gutenberg\Gutenberg_Block;

class Block extends Gutenberg_Block {

	// dashes only
	const NAME = 'fp-service-bpa';

	public function init_fields(): void {

		global $wpdb;

		$query = "SELECT * FROM {$wpdb->prefix}bookingpress_services";

		$query_categories = "SELECT * FROM {$wpdb->prefix}bookingpress_categories";

		$results = $wpdb->get_results( $query, ARRAY_A );

		$results_categories = $wpdb->get_results( $query_categories, ARRAY_A );

		$data = [];

		if ( ! empty( $results ) ) {
			foreach ( $results as $result ) {
				$category_index = array_search( $result['bookingpress_category_id'], array_column( $results_categories, 'bookingpress_category_id' ) );

				$data[ $result['bookingpress_service_id'] ] = $results_categories[ $category_index ]['bookingpress_category_name'] . ' - ' . $result['bookingpress_service_name'];
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
