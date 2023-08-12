<?php

namespace FP\Gutenberg;

defined( 'ABSPATH' ) || exit;

use FP\Plugins\Acf\Group;

abstract class Gutenberg_Block extends Group {

	// dashes only
	const NAME = '';

	private $path;
	private $assets_uri;

	public function __construct( $path, $assets_uri ) {
		$this->path       = $path;
		$this->assets_uri = $assets_uri;
	}

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

		if ( static::NAME ) {
			$args['location'][] = [
				[
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/' . static::NAME,
				],
			];
		}

		acf_add_local_field_group( $args );
	}

	public function register_block(): void {
		register_block_type( $this->path );
		$this->enqueue_styles( $this->assets_uri );
		$this->register_script( $this->assets_uri );
	}

	public function register_script( $path ): void {
		$file_js = $path . '/app.js';
		wp_register_script( 'block-' . static::NAME, $file_js, [], THEME_VERSION, true );
	}

	public static function enqueue_script(): void {
		wp_enqueue_script( 'block-' . static::NAME );
	}

	public static function enqueue_styles( $path ) {
		$file_css = $path . '/style.css';
		wp_enqueue_style( 'block-' . static::NAME, $file_css, [], THEME_VERSION, 'all' );
	}

}
