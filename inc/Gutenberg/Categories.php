<?php

namespace FP\Gutenberg;

defined( 'ABSPATH' ) || exit;

class Categories {

	public function __construct() {
		add_action( 'block_categories_all', [ $this, 'register_blocks_categories' ] );
	}

	public function register_blocks_categories( array $categories ): array {
		$custom_categories = [
			[
				'slug'  => 'custom-blocks',
				'title' => esc_html__( 'Custom Blocks', 'fp' )
			]
		];

		return array_merge( $custom_categories, $categories );
	}
}
