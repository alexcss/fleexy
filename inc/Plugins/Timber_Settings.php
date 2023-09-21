<?php
declare ( strict_types=1 );

namespace FP\Plugins;

use FP\Theme\Helper;
use Timber;

class Timber_Settings {
	public function __construct() {
		$this->init();
		add_filter( 'timber/context', [ $this, 'add_to_context' ] );
		add_filter( 'timber/twig', [ $this, 'add_custom_filters' ] );
	}

	public function add_custom_filters( $twig ) {
		$helper = new Helper();
		$twig->addFilter( new \Twig\TwigFilter( 'highlight_text', [ $helper, 'highlight_text' ] ) );
		$twig->addFilter( new \Twig\TwigFilter( 'phone_url', [ $helper, 'phone_url' ] ) );

		return $twig;
	}

	public function init(): void {
		Timber\Timber::init();
		Timber::$dirname = [ 'twigs', 'inc/Gutenberg/Blocks' ];
	}

	public function add_to_context( $context ): array {

		// https://timber.github.io/docs/v2/guides/menus/#set-up-all-menus-globally
		$registered_menus = get_registered_nav_menus();
		$menus            = [];

		if ( ! empty( $registered_menus ) ) {
			foreach ( $registered_menus as $location => $menu_name ) {
				$menus[ $location ] = Timber::get_menu( $location );
			}
		} else {
			$menus = Timber::get_menu();
		}

		$context['menu']         = $menus;
		$context['header_style'] = get_field( 'header_style' ) ?: 'is-black';
		$context['body_bg']      = get_field( 'body_bg' ) ?: 'body-bg-default';
		$context['footer']       = get_field( 'footer', 'options' );
		$context['header']       = get_field( 'header', 'options' );
		$context['lang']         = defined( "ICL_LANGUAGE_CODE" ) ? ICL_LANGUAGE_CODE : 'en';

		return $context;
	}

}
