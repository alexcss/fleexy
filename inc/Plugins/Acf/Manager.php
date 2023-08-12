<?php

namespace FP\Plugins\Acf;

defined( 'ABSPATH' ) || exit;

class Manager {

	private $option_pages = [
		Options\Settings::class,
		Options\Header::class,
		Options\Footer::class,
		Post_Types\Post::class
	];

	public function __construct() {
		add_action( 'acf/init', [ $this, 'register_options' ] );
		add_action( 'acf/render_field_settings/type=image', [ $this, 'add_default_value_to_image_field' ] );
	}

	/**
	 * @return void
	 *
	 * @action acf/init
	 */
	public function register_options() {
		foreach ( $this->option_pages as $option_page ) {
			$option_page = new $option_page;
			$option_page->init();
		}
	}

	public function add_default_value_to_image_field( $field ) {
		if ( function_exists( 'acf_render_field_setting' ) ) {
			acf_render_field_setting( $field, [
				'label'        => 'Default Image',
				'instructions' => 'Appears when creating a new post',
				'type'         => 'image',
				'name'         => 'default_value',
			] );
		}
	}

}
