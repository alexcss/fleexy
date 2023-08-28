<?php

namespace FP\Plugins\Acf\Options;

defined( 'ABSPATH' ) || exit;

use FP\Plugins\Acf\Options_Page;

class Footer extends Options_Page {

	public function title(): string {
		return __( 'Footer Area', 'fp' );
	}

	public function init_fields(): void {
		$this->add_tab( 'Footer' );

		$this->add_field( [
			'name'       => 'footer',
			'label'      => __( 'Footer', 'fp' ),
			'type'       => 'group',
			'sub_fields' => [
				[
					'label'         => __( 'Copyright', 'fp' ),
					'name'          => 'copyright',
					'type'          => 'text',
					'default_value' => '[year] © Fleexy. All Rights Reserved.',
				],
				[
					'label' => __( 'Instagram', 'fp' ),
					'name'  => 'instagram',
					'type'  => 'url',
				],
				[
					'label' => __( 'Facebook', 'fp' ),
					'name'  => 'facebook',
					'type'  => 'url',
				],
				[
					'label' => __( 'YouTube', 'fp' ),
					'name'  => 'youtube',
					'type'  => 'url',
				],
				[
					'label' => __( 'TikTok', 'fp' ),
					'name'  => 'tiktok',
					'type'  => 'url',
				],
				[
					'label' => __( 'Twitter', 'fp' ),
					'name'  => 'twitter',
					'type'  => 'url',
				],
			],
		] );

	}

}
