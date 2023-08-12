<?php

namespace FP\Plugins\Acf\Options;

defined( 'ABSPATH' ) || exit;

use FP\Plugins\Acf\Options_Page;

class Footer extends Options_Page {

	public function title(): string {
		return __( 'Footer Area', 'fp' );
	}

	public function init_fields(): void {
		$this->add_tab( 'Global' );

		$this->add_field( [
			'name'       => 'footer',
			'label'      => __( 'Footer', 'fp' ),
			'type'       => 'group',
			'sub_fields' => [
				[
					'label'         => __( 'Logo', 'fp' ),
					'name'          => 'logo',
					'type'          => 'image',
					'return_format' => 'array',
				],
				[
					'label'         => __( 'Copyright', 'fp' ),
					'name'          => 'copyright',
					'type'          => 'text',
					'default_value' => 'Copyright © [year] all rights reserved',
				]
			],
		] );

		$this->add_tab( 'Policy Menu' );
		$this->add_field( [
			'name'       => 'policy_menu',
			'label'      => __( 'Policy Menu', 'fp' ),
			'type'       => 'group',
			'sub_fields' => [
				[
					'label'      => __( 'Menu', 'fp' ),
					'name'       => 'menu',
					'type'       => 'repeater',
					'sub_fields' => [
						[
							'label'    => __( 'Link', 'fp' ),
							'name'     => 'link',
							'type'     => 'link',
							'required' => 1,
						],
					],
				],
			],
		] );

		$this->add_tab( 'First Menu' );
		$this->add_field( [
			'name'       => 'first_menu',
			'label'      => __( 'First Menu', 'fp' ),
			'type'       => 'group',
			'sub_fields' => [
				[
					'label'         => __( 'Title', 'fp' ),
					'name'          => 'title',
					'type'          => 'text',
					'default_value' => 'Bestsellers',
				],
				[
					'label'      => __( 'Menu', 'fp' ),
					'name'       => 'menu',
					'type'       => 'repeater',
					'sub_fields' => [
						[
							'label'    => __( 'Link', 'fp' ),
							'name'     => 'link',
							'type'     => 'link',
							'required' => 1,
						],
					],
				],
			],
		] );

		$this->add_tab( 'Second Menu' );
		$this->add_field( [
			'name'       => 'second_menu',
			'label'      => __( 'Second Menu', 'fp' ),
			'type'       => 'group',
			'sub_fields' => [
				[
					'label'         => __( 'Title', 'fp' ),
					'name'          => 'title',
					'type'          => 'text',
					'default_value' => 'General',
				],
				[
					'label'      => __( 'Menu', 'fp' ),
					'name'       => 'menu',
					'type'       => 'repeater',
					'sub_fields' => [
						[
							'label'    => __( 'Link', 'fp' ),
							'name'     => 'link',
							'type'     => 'link',
							'required' => 1,
						],
					],
				],
			],
		] );

		$this->add_tab( 'Third Menu' );
		$this->add_field( [
			'name'       => 'third_menu',
			'label'      => __( 'Third Menu', 'fp' ),
			'type'       => 'group',
			'sub_fields' => [
				[
					'label'         => __( 'Title', 'fp' ),
					'name'          => 'title',
					'type'          => 'text',
					'default_value' => 'Popular categories',
				],
				[
					'label'      => __( 'Menu', 'fp' ),
					'name'       => 'menu',
					'type'       => 'repeater',
					'sub_fields' => [
						[
							'label'    => __( 'Link', 'fp' ),
							'name'     => 'link',
							'type'     => 'link',
							'required' => 1,
						],
					],
				],
			],
		] );

	}

}
