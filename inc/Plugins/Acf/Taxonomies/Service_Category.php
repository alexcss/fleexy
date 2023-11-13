<?php

namespace FP\Plugins\Acf\Taxonomies;

defined( 'ABSPATH' ) || exit;

use FP\Plugins\Acf\Taxonomy;

class Service_Category extends Taxonomy {
	const TAXONOMY = 'service_category';

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
