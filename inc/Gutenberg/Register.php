<?php

namespace FP\Gutenberg;

defined( 'ABSPATH' ) || exit;

class Register {

	const BLOCKS = [
		Blocks\Container\Block::class,
		Blocks\Hero\Block::class,
		Blocks\Image\Block::class,
		Blocks\Our_Team\Block::class,
		Blocks\Our_Advantages\Block::class,
		Blocks\Testimonial\Block::class,
		Blocks\Contact_Form\Block::class,
		Blocks\Slider\Block::class,
		Blocks\What_We_Offer\Block::class,
		Blocks\Google_Maps\Block::class,
		Blocks\Contact_Us\Block::class,
		Blocks\Service\Block::class,
		Blocks\Services_List\Block::class,
		Blocks\Team_Member_List\Block::class,
	];

	const BLOCKS_DIR = 'Blocks';
	const SCRIPT_DIST_DIR = 'dist';


	public function __construct() {
		add_action( 'acf/init', [ $this, 'register_blocks' ] );
		//add_filter( 'block_editor_settings_all', [ $this, 'deregister_default_styles' ], 10, 2 );
	}

	/**
	 * Deregister Gutenberg styles to match our styling
	 */
	public function deregister_default_styles( $editor_settings, $editor_context ) {
		$editor_settings['styles'] = [];

		return $editor_settings;
	}

	public function register_blocks( $registered_blocks ) {
		foreach ( self::BLOCKS as $block ) {
			$block_name = $this->get_block_name( $block );
			if ( empty( $block_name ) ) {
				continue;
			}

			$block = new $block( $this->get_block_path( $block_name ), $this->get_block_script_uri( $block_name ) );
			$block->init();
			$block->register_block();
		}
	}

	private function get_block_name( string $block_class ): string {
		$block_path = str_replace( __NAMESPACE__ . '\\' . self::BLOCKS_DIR . '\\', '', $block_class );
		$block_path = explode( '\\', $block_path );

		return $block_path[0] ?? '';
	}

	private function get_block_path( string $block_name ): string {
		return __DIR__ . '/' . self::BLOCKS_DIR . "/{$block_name}/";
	}

	private function get_block_script_uri( string $block_name ): string {
		$block_script_uri = str_replace( get_stylesheet_directory(), '', __DIR__ );

		return get_stylesheet_directory_uri() . "/{$block_script_uri}/" . self::BLOCKS_DIR . "/{$block_name}/" . self::SCRIPT_DIST_DIR;
	}


}
