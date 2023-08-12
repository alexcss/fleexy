<?php

namespace FP\Utils;

defined( 'ABSPATH' ) || exit;

/**
 * Provides functions to add async/defer attributes to enqueued / registered scripts or add a preload link.
 */
class Script_And_Style_Loader {
	/**
	 * Adds async/defer attributes to enqueued / registered scripts or add a preload link.
	 *
	 * @param string $tag The script tag.
	 * @param string $handle The script handle.
	 * @param string $src The script src.
	 *
	 * @return string Script HTML string.
	 */
	public function filter_script_loader_tag( string $tag, string $handle, string $src ): string {
		/*
		 * If #12009 lands in WordPress, this loop can no-op since it would be handled in core.
		 *
		 * @link https://core.trac.wordpress.org/ticket/12009
		 */
		foreach ( [ 'async', 'defer' ] as $attr ) {
			if ( ! wp_scripts()->get_data( $handle, $attr ) ) {
				continue;
			}
			// Prevent adding attribute when already added in #12009.
			if ( ! preg_match( ":\s$attr(=|>|\s):", $tag ) ) {
				$tag = preg_replace( ':(?=></script>):', " $attr", $tag, 1 );
			}
			// Only allow async or defer, not both.
			break;
		}

		if ( wp_scripts()->get_data( $handle, 'module' ) ) {
			$tag = preg_replace( ':(?=></script>):', " type=\"module\"", $tag, 1 );
		}

		return $tag;
	}
}
