<?php

namespace FP\Plugins\Acf\Options;

defined( 'ABSPATH' ) || exit;

use FP\Plugins\Acf\Options_Page;

class Settings extends Options_Page {

	public function title(): string {
		return __( 'Settings', 'fp' );
	}

	public function init_fields() {
		$this->add_field( [
			'name'       => 'settings',
			'label'      => __( 'Settings', 'fp' ),
			'type'       => 'group',
			'layout'     => 'block',
			'sub_fields' => [
			],
		] );
	}

}
