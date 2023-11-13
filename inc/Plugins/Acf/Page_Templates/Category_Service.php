<?php

namespace FP\Plugins\Acf\Page_Templates;

defined( 'ABSPATH' ) || exit;

use FP\Plugins\Acf\Page_Template;

class Category_Service extends Page_Template {

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
				'value'    => 'templates/category-service.php',
			],
		];

		acf_add_local_field_group( $args );
	}

	public function init_fields(): void {
		$this->add_field( [
			'name'  => 'image',
			'label' => __( 'Image', 'fp' ),
			'type'  => 'image',
		] );

		$this->add_field( [
			'name'          => 'primary_color',
			'label'         => __( 'Primary Color', 'fp' ),
			'type'          => 'button_group',
			'choices' => [
				'primary' => 'Orange',
				'green' => 'Green',
				'blue' => 'Blue',
			],
			'default_value' => 'primary'
		] );
	}
}
