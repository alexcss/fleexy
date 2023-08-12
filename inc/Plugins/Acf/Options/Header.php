<?php

namespace FP\Plugins\Acf\Options;

defined( 'ABSPATH' ) || exit;

use FP\Plugins\Acf\Options_Page;

class Header extends Options_Page {

	public function title(): string {
		return __( 'Header Area', 'fp' );
	}

	public function init_fields() {
		$this->add_field( [
			'name'       => 'header',
			'label'      => __( 'Header', 'fp' ),
			'type'       => 'group',
			'sub_fields' => [
				[
					'label'   => __( 'Bar Text', 'fp' ),
					'name'    => 'bar_text',
					'type'    => 'wysiwyg',
					'tabs'    => 'all',
					'toolbar' => 'fp_header_toolbar',
				],
				[
					'label'         => __( 'Logo', 'fp' ),
					'name'          => 'logo',
					'type'          => 'image',
					'return_format' => 'array',
				],
			],
		] );
	}

}
