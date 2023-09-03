<?php

defined( 'ABSPATH' ) || exit;

/* Define Constants */
$theme_version = wp_get_theme()->get( 'Version' );
define( 'THEME_VERSION', $theme_version );
define( 'THEME_DIR', trailingslashit( get_stylesheet_directory() ) );
define( 'THEME_URI', trailingslashit( esc_url( get_stylesheet_directory_uri() ) ) );

define( 'GOOGLE_MAP_API_KEY', 'AIzaSyAs0gvLYei8eRmMho8k19jrjCLGz1V5GgA' );

$composer_autoload = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $composer_autoload ) ) {

	require_once $composer_autoload;

	/* Theme */
	new FP\Theme\Support();

	new FP\Theme\Enqueue();
	new FP\Theme\Comments();

	/* Post_Type */
	new FP\Post_Type\Manager();

	/* Gutenberg */
	new FP\Gutenberg\Core();
	new FP\Gutenberg\Categories();
	new FP\Gutenberg\Register();

	/* Plugins */
	new FP\Plugins\Timber_Settings();
	new FP\Plugins\Acf\Manager();
	new FP\Plugins\Cf7();
	new FP\Plugins\Yoast();
	new FP\Plugins\Wpml();

} elseif ( ! is_admin() ) {
	wp_die( 'Pls install composer dependency' );
}
