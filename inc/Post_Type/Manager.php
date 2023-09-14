<?php

namespace FP\Post_Type;

defined( 'ABSPATH' ) || exit;

class Manager {
	private array $post_types = [
		Testimonial::class,
		Service::class,
		Team_Member::class,
	];

	public function __construct() {
		add_action( 'init', [ $this, 'register_post_type' ] );
	}

	/**
	 * @return void
	 *
	 * @action init
	 */
	public function register_post_type(): void {
		foreach ( $this->post_types as $post_type ) {
			$post_type = new $post_type;
			$post_type->register();
		}
	}
}
