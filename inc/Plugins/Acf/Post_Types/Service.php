<?php

namespace FP\Plugins\Acf\Post_Types;

defined( 'ABSPATH' ) || exit;

use FP\Plugins\Acf\Post_Type;

class Service extends Post_Type {

	const POST_TYPE = 'service';

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
			'name'         => 'description',
			'label'        => __( 'Description', 'fp' ),
			'type'         => 'wysiwyg',
			'required'     => true,
			'toolbar'      => 'fp_header_toolbar',
			'media_upload' => 0,
			'delay'        => 0,
		] );

		$this->add_field( [
			'name'         => 'price',
			'label'        => __( 'Price', 'fp' ),
			'type'         => 'repeater',
			'required'     => true,
			'layout'       => 'block',
			'min'          => 1,
			'max'          => 3,
			'button_label' => 'Add Price',
			'sub_fields'   => [
				[
					'name'          => 'time',
					'label'         => __( 'Time', 'fp' ),
					'type'          => 'text',
					'required'      => 1,
					'default_value' => '60 min',
					'wrapper'       => [
						'width' => '33.33',
					],
				],
				[
					'label'         => __( 'Price', 'fp' ),
					'name'          => 'price',
					'type'          => 'text',
					'required'      => 1,
					'default_value' => '150',
					'wrapper'       => [
						'width' => '33.33',
					],
				],
				[
					'label'         => __( 'Currency', 'fp' ),
					'name'          => 'currency',
					'type'          => 'text',
					'required'      => 1,
					'default_value' => 'zł',
					'wrapper'       => [
						'width' => '33.33',
					],
				]
			]
		] );
	}
}
