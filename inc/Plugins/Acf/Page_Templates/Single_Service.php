<?php

namespace FP\Plugins\Acf\Page_Templates;

defined( 'ABSPATH' ) || exit;

use FP\Plugins\Acf\Page_Template;

class Single_Service extends Page_Template {

	public function init(): void {

		$this->init_fields();

		$this->handle_sub_fields();

		if ( empty( $this->fields ) ) {
			return;
		}

		$args = [
			'key'      => $this->get_key( 'group' ),
			'title'    => __( 'Service', 'fp' ),
			'fields'   => $this->fields,
			'position' => 'side',
		];

		$args['location'][] = [
			[
				'param'    => 'page_template',
				'operator' => '==',
				'value'    => 'templates/single-service.php',
			],
		];

		acf_add_local_field_group( $args );
	}

	public function init_fields(): void {
		$this->add_field( [
			'label'         => __( 'Service', 'fp' ),
			'name'          => 'service',
			'type'          => 'post_object',
			'post_type'     => 'service',
			'return_format' => 'id',
		] );

	}
}
