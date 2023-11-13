<?php

namespace FP\Plugins\Acf;

defined( 'ABSPATH' ) || exit;

class Manager {

	private array $option_pages = [
		Options\Base::class,
		Page_Templates\Single_Service::class,
		Page_Templates\Category_Service::class,
		Post_Types\Page::class,
		Post_Types\Testimonial::class,
		Post_Types\Service::class,
		Post_Types\Team_Member::class,
		Menu::class,
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
