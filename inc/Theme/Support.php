<?php

namespace FP\Theme;

defined( 'ABSPATH' ) || exit;

class Support {
	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'theme_support' ] );
		// need to add padding top to body --wp-admin--admin-bar--height
//		add_theme_support( 'admin-bar', [ 'callback' => '__return_false' ] );

//		add_filter( 'big_image_size_threshold', '__return_false' );
		add_filter( 'big_image_size_threshold', [ $this, 'big_image_size' ] );

		if ( ! class_exists( 'ACF' ) && ! is_admin() ) {
			wp_die( 'Pls activate ACF Plugin' );
		}
	}

	public function big_image_size(): int {
		return 3000;
	}

	public function theme_support(): void {
		register_nav_menus(
			[
				'desktop_nav' => esc_html__( 'Desktop Nav', 'fp' ),
				'footer_nav'  => esc_html__( 'Footer Nav', 'fp' ),
			]
		);
		add_theme_support( 'menus' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', [ 'script', 'style' ] );

		add_filter( 'acf/fields/wysiwyg/toolbars', [ $this, 'custom_header_toolbar' ] );
	}

	public function custom_header_toolbar( $toolbars ): array {
		$toolbars['FP Header Toolbar'][1] = [
			'bold',
			'italic',
			'underline',
			'link',
			'unlink',
		];

		return $toolbars;
	}
}
