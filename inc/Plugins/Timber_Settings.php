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
		$context['header_style'] = get_field( 'header_style' ) ?: 'is-blur';
		$context['footer']       = get_field( 'footer', 'options' );

		return $context;
	}

}
