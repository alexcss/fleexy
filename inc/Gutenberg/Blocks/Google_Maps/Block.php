<?php

namespace FP\Gutenberg\Blocks\Google_Maps;

defined( 'ABSPATH' ) || exit;

use FP\Gutenberg\Gutenberg_Block;

class Block extends Gutenberg_Block {

	// dashes only
	const NAME = 'fp-google-maps';

	public function init_fields(): void {

		$this->add_field( [
			'name'          => 'title',
			'label'         => __( 'Title', 'fp' ),
			'type'          => 'textarea',
			'default_value' => 'Where to __find us__',
			'instructions'  => __( 'if you want to highlight a word use this rule __TEXT__', 'fp' ),
		] );

		$this->add_field( [
			'name'          => 'address',
			'label'         => __( 'Description', 'fp' ),
			'type'          => 'textarea',
			'new_lines'     => 'br',
			'default_value' => 'Mieszczańska 29, 50-201 Wrocław',
		] );

		$this->add_field( [
			'name'          => 'phone',
			'label'         => __( 'Phone', 'fp' ),
			'type'          => 'text',
			'default_value' => '+48 666 891 114',
		] );

		$this->add_field( [
			'name'  => 'cta',
			'label' => __( 'CTA', 'fp' ),
			'type'  => 'link',
		] );

		$this->add_field( [
			'name'       => 'map',
			'label'      => __( 'Map', 'fp' ),
			'type'       => 'google_map',
			'center_lat' => '51.120587000000008',
			'center_lng' => '17.023451699999999',
			'zoom'       => 14,
		] );

	}

}
