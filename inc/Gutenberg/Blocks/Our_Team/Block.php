<?php

namespace FP\Gutenberg\Blocks\Our_Team;

defined( 'ABSPATH' ) || exit;

use FP\Gutenberg\Gutenberg_Block;

class Block extends Gutenberg_Block {

	// dashes only
	const NAME = 'fp-our-team';

	public function init_fields(): void {

		global $wpdb;

		$query = "SELECT * FROM {$wpdb->prefix}bookingpress_staffmembers";

		$results = $wpdb->get_results( $query, ARRAY_A );

		$data = [];

		if ( ! empty( $results ) ) {
			foreach ( $results as $result ) {
				$data[ $result['bookingpress_staffmember_id'] ] = $result['bookingpress_staffmember_firstname'] . ' ' . $result['bookingpress_staffmember_lastname'];
			}
		}


		$this->add_field( [
			'name'          => 'title',
			'label'         => __( 'Title', 'fp' ),
			'type'          => 'textarea',
			'default_value' => 'Meet Our Team',
			'instructions'  => __( 'if you want to highlight a word use this rule __TEXT__', 'fp' ),
		] );

		$this->add_field( [
			'name'     => 'team',
			'label'    => __( 'Team', 'fp' ),
			'type'     => 'select',
			'choices'  => $data,
			'multiple' => 1,
			'ui'       => 1,
			'ajax'     => 1,
		] );

		$this->add_field( [
			'name'          => 'description',
			'label'         => __( 'Description', 'fp' ),
			'type'          => 'textarea',
			'default_value' => 'Lorem Ipsum Title',
			'instructions'  => __( 'if you want to highlight a word use this rule __TEXT__', 'fp' ),
			'new_lines'     => 'br',
		] );

		$this->add_field( [
			'name'  => 'cta',
			'label' => __( 'CTA', 'fp' ),
			'type'  => 'link',
		] );

	}

}
