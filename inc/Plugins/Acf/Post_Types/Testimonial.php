<?php

namespace FP\Plugins\Acf\Post_Types;

defined( 'ABSPATH' ) || exit;

use FP\Plugins\Acf\Post_Type;

class Testimonial extends Post_Type {

	const POST_TYPE = 'testimonial';

	public function init(): void {

		$this->init_fields();

		$this->handle_sub_fields();

		if ( empty( $this->fields ) ) {
			return;
		}

		$args = [
			'key'    => $this->get_key( 'group' ),
			'title'  => __( 'Content', 'fp' ),
			'fields' => $this->fields,
		];

		$args['location'][] = [
			[
				'param'    => 'post_type',
				'operator' => '==',
				'value'    => static::POST_TYPE,
			],
		];

		acf_add_local_field_group( $args );
	}

	public function init_fields(): void {
		$this->add_field( [
			'name'     => 'name',
			'label'    => __( 'Name', 'fp' ),
			'type'     => 'text',
			'required' => true,
			'wrapper'  => [
				'width' => '33.3',
			],
		] );

		$this->add_field( [
			'name'     => 'avatar',
			'label'    => __( 'Avatar', 'fp' ),
			'type'     => 'image',
			'required' => true,
			'wrapper'  => [
				'width' => '33.3',
			],
		] );

		$this->add_field( [
			'name'     => 'feedback',
			'label'    => __( 'Feedback', 'fp' ),
			'type'     => 'textarea',
			'required' => true
		] );
	}
}
