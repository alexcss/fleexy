<?php

namespace FP\Plugins\Acf\Post_Types;

defined( 'ABSPATH' ) || exit;

use FP\Plugins\Acf\Post_Type;

class Post extends Post_Type {

	const POST_TYPE = 'post';

	public function init(): void {

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
				'param'    => 'post_type',
				'operator' => '==',
				'value'    => static::POST_TYPE,
			],
		];

		acf_add_local_field_group( $args );
	}

	public function init_fields() {
		$this->add_tab( __( 'Settings', 'fp' ) );
	}
}
