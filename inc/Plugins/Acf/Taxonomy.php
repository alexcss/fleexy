<?php

namespace FP\Plugins\Acf;

defined( 'ABSPATH' ) || exit;

abstract class Taxonomy extends Group {

	const TAXONOMY = '';

	/**
	 * ACF form init
	 *
	 * @return void
	 *
	 * @action acf/init
	 */
	public function init(): void {
		if ( empty( static::TAXONOMY ) ) {
			return;
		}

		$this->init_fields();

		$this->handle_sub_fields();

		if ( empty( $this->fields ) ) {
			return;
		}

		$args = [
			'key'    => $this->get_key( 'group' ),
			'title'  => $this->title(),
			'fields' => $this->fields,
		];

		$args['location'][] = [
			[
				'param'    => 'taxonomy',
				'operator' => '==',
				'value'    => static::TAXONOMY,
			],
		];

		acf_add_local_field_group( $args );
	}

}
