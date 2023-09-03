<?php

namespace FP\Plugins\Acf\Options;

defined( 'ABSPATH' ) || exit;

use FP\Plugins\Acf\Options_Page;

class Base extends Options_Page {

	public function title(): string {
		return __( 'Base options', 'fp' );
	}

	public function init_fields(): void {
		$this->add_tab( 'Header' );

		$this->add_field( [
			'name'       => 'header',
			'label'      => __( 'Header', 'fp' ),
			'type'       => 'group',
			'sub_fields' => [
				[
					'label'         => __( 'CTA Button', 'fp' ),
					'name'          => 'cta_button',
					'type'          => 'link'
				],
			],
		] );
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
