<?php

namespace FP\Plugins\Acf;

defined( 'ABSPATH' ) || exit;

class Menu extends Group {

	/**
	 * ACF form init
	 *
	 * @return void
	 *
	 * @action acf/init
	 */
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
				'param'    => 'nav_menu_item',
				'operator' => '==',
				'value'    => 'all'
			],
		];

		acf_add_local_field_group( $args );
	}

	public function init_fields(): void {

		$this->add_field( [
			'label'         => __( 'Dropdown options', 'fp' ),
			'name' => 'dropdown_options',
			'type'          => 'group',
			'sub_fields' => [
				[
					'label' => 'Bg color',
					'name' => 'bg_color',
					'type' => 'color_picker',
					'wrapper' => [
						'width' => '40%',
					],
					'default_value' => '#FDF1D7',
					'return_format' => 'string',
				],
				[
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'wrapper' => [
						'width' => '60%',
					],
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
				],
			],
		] );
	}
}
