<?php

namespace FP\Plugins\Acf;

defined( 'ABSPATH' ) || exit;

abstract class Page_Template extends Group {

	const TEMPLATE = '';

	/**
	 * ACF form init
	 *
	 * @return void
	 *
	 * @action acf/init
	 */
	public function init(): void {
		if ( empty( static::TEMPLATE ) ) {
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
				'param'    => 'page_template',
				'operator' => '==',
				'value'    => static::TEMPLATE,
			],
		];

		acf_add_local_field_group( $args );
	}

}
