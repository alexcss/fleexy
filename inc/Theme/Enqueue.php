<?php

namespace FP\Theme;
use FP\Theme\Assets;

defined( 'ABSPATH' ) || exit;

class Enqueue {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'global_assets' ], 99 );
		add_action( 'wp_enqueue_scripts', [ $this, 'cf7_js_styles' ] );
		add_action( 'login_enqueue_scripts', [ $this, 'login_stylesheet' ], 20 );
		add_action( 'enqueue_block_editor_assets', [ $this, 'admin_styles_and_scripts' ], 999, 2 );
		//add_action( 'init', [ $this, 'admin_editor_style' ] );
	}

	public function admin_editor_style() {
		add_editor_style( THEME_URI . 'dist/assets/css/admin-editor.css' );
	}
	public function asset_path($filename)	{
		$filename_split = explode('.', $filename);
		$dir = end($filename_split);
		$manifest_path = dirname(dirname(__FILE__)) . '/dist/manifest.json';

		if (file_exists($manifest_path)) {
			$manifest = json_decode(file_get_contents($manifest_path), true);
		} else {
			$manifest = [];
		}

		if (array_key_exists($filename, $manifest)) {
			return $manifest[$filename];
		}
		return $filename;
	}
	public function admin_styles_and_scripts() {
		wp_enqueue_style( 'custom-admin', THEME_URI . 'dist/assets/css/admin-editor.css', null, THEME_VERSION );
		wp_enqueue_script( 'custom-admin', THEME_URI . 'dist/assets/js/admin.js', [
			'wp-blocks',
			'wp-dom-ready',
			'wp-edit-post'
		], THEME_VERSION, false );
	}

	public function global_assets() {

		wp_enqueue_style( 'app', Assets::requireUrl('src/assets/scss/app.scss'), [], THEME_VERSION );
		wp_enqueue_script( 'app', THEME_URI . 'dist/assets/js/app.js', null, THEME_VERSION, true );
		wp_localize_script( 'app', 'fpData', [
			'restURL' => rest_url(),
			'nonce'   => wp_create_nonce( 'wp_rest' ),
		] );

		if ( ! is_user_logged_in() ) {
			// Deregister the jquery version bundled with WordPress.
			wp_deregister_script( 'jquery' );
			// Deregister the jquery-migrate version bundled with WordPress.
			wp_deregister_script( 'jquery-migrate' );
		}

		wp_dequeue_style( 'bodhi-svgs-attachment' );
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'wc-block-style' );
		wp_dequeue_style( 'global-styles' );
		wp_deregister_script( 'wp-embed' );
	}

	public function login_stylesheet() {
		wp_enqueue_style( 'custom-login', THEME_URI . 'dist/assets/css/login.css', [], THEME_VERSION, 'all' );
	}

	// Dequeue cf7/captcha scripts and styles, preventing them from loading everywhere
	public function cf7_js_styles() {
		if ( ! has_block( 'acf/wn-contact-form' ) ) {
			wp_dequeue_script( 'contact-form-7' );
			wp_dequeue_style( 'contact-form-7' );
			remove_action( 'wp_enqueue_scripts', 'wpcf7_recaptcha_enqueue_scripts', 20 );
		}
	}
}
