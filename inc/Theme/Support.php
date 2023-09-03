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
		add_action( 'acf/fields/google_map/api', [ $this, 'setup_google_api_key' ] );

		if ( ! class_exists( 'ACF' ) && ! is_admin() ) {
			wp_die( 'Pls activate ACF Plugin' );
		}
	}

	public function setup_google_api_key( $api ) {
		$api['key'] = defined(GOOGLE_MAP_API_KEY) ? GOOGLE_MAP_API_KEY : false;
		return $api;
	}

	public function big_image_size(): int {
		return 3000;
	}

	public function theme_support(): void {
		register_nav_menus(
			[
				'desktop_nav'  => esc_html__( 'Desktop Nav', 'fp' ),
				'footer_nav_1' => esc_html__( 'Footer Nav 1', 'fp' ),
				'footer_nav_2' => esc_html__( 'Footer Nav 2', 'fp' ),
				'footer_nav_3' => esc_html__( 'Footer Nav 3', 'fp' ),
				'footer_nav_4' => esc_html__( 'Footer Nav 4', 'fp' ),
				'footer_nav_5' => esc_html__( 'Footer Nav 5', 'fp' ),
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
