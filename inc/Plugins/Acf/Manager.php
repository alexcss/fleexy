<?php

namespace FP\Plugins\Acf;

defined( 'ABSPATH' ) || exit;

class Manager {

	private array $option_pages = [
		Options\Settings::class,
		Options\Header::class,
		Options\Footer::class,
		Post_Types\Post::class
	];

	public function __construct() {
		add_action( 'acf/init', [ $this, 'register_options' ] );
	}

	/**
	 * @return void
	 *
	 * @action acf/init
	 */
	public function register_options(): void {
		foreach ( $this->option_pages as $option_page ) {
			$option_page = new $option_page;
			$option_page->init();
		}
	}

}
