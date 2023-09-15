<?php

namespace FP\Taxonomy;

defined( 'ABSPATH' ) || exit;

class Manager {
	private array $taxonomies = [
		Service_Category::class,
		Team_Member_Category::class,
		Team_Member_Tag::class,
	];

	public function __construct() {
		add_action( 'init', [ $this, 'register_taxonomy' ] );
	}

	/**
	 * @return void
	 *
	 * @action init
	 */
	public function register_taxonomy(): void {
		foreach ( $this->taxonomies as $taxonomy ) {
			$taxonomy = new $taxonomy;
			$taxonomy->register();
		}
	}
}
