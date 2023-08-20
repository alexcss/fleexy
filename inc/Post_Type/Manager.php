<?php

namespace FP\Post_Type;


defined( 'ABSPATH' ) || exit;

class Manager {
	const POST_TYPES = [
		Testimonial\Testimonial::class,
	];

	public function __construct() {
		add_action( 'init', function () {
			foreach ( self::POST_TYPES as $post_type ) {
				$c = new $post_type;
				$c->register();
			}
		} );

	}
}
