<?php

namespace FP\Utils;

defined( 'ABSPATH' ) || exit;

/**
 * Provides a set of methods that are used to get the url or path
 * of an asset.
 */
class Assets {
	/**
	 * The internal list (array) of assets.
	 *
	 * @var array
	 */
	protected static array $asset_manifest;

	/**
	 * Gets the asset's url.
	 *
	 * @param string $asset The filename of the required asset.
	 *
	 * @return string|boolean Returns the url or false if the asset is not found.
	 * @since 0.1.0
	 *
	 */
	public static function require_url( string $asset ): string|bool {
		return self::get( 'url', $asset );
	}

	/**
	 * Gets the asset's absolute path.
	 *
	 * @param string $asset The filename of the required asset.
	 *
	 * @return string|boolean Returns the absolute path or false if the asset is not found.
	 * @since 0.1.0
	 *
	 */
	public static function require_path( string $asset ): string|bool {
		return self::get( 'path', $asset );
	}

	/**
	 * Gets the contents of an asset.
	 * Useful for loading SVGs or other files inline.
	 *
	 * @param string $asset Asset path (relative to the theme directory).
	 *
	 * @return string|boolean Returns the file contents or false in case of failure.
	 * @since 0.2.0
	 *
	 */
	public static function get_contents( string $asset ): string|bool {
		$file = self::require_path( $asset );
		if ( file_exists( $file ) ) {
			return file_get_contents( $file );
		} else {
			trigger_error( "File not found at: {$asset}", E_USER_WARNING );

			return false;
		}
	}

	/**
	 * Gets the asset’s url or absolute path.
	 *
	 * If the asset is not found, it will return the original asset path.
	 * This is useful for loading assets from the theme directory.
	 *
	 * @param string $return_type The type of the return value. Either 'url' or 'path'.
	 * @param string $asset The filename of the required asset.
	 *
	 * @return string|false
	 */
	protected static function get( string $return_type, string $asset ): string|bool {
		if ( ! isset( self::$asset_manifest ) ) {
			$dist_path     = get_template_directory() . '/dist';
			$manifest_path = $dist_path . '/manifest.json';
			if ( is_file( $manifest_path ) ) {
				self::$asset_manifest = json_decode( file_get_contents( $manifest_path ), true );
			} else {
				self::$asset_manifest = [];
			}
		}

		$asset_suffix = self::$asset_manifest[ $asset ]['file'] ?? $asset;
		$file_path    = get_template_directory() . '/dist/' . $asset_suffix;

		if ( 'path' == $return_type ) {
			return file_exists( $file_path ) ? $file_path : get_template_directory() . '/' . $asset_suffix;
		}

		if ( 'url' == $return_type ) {
			if ( file_exists( self::vite_hot_file() ) ) {
				return trailingslashit( trim( file_get_contents( self::vite_hot_file() ) ) ) . $asset;
			}

			return file_exists( $file_path ) ? get_template_directory_uri() . '/dist/' . $asset_suffix : get_template_directory_uri() . '/' . $asset_suffix;
		}

		return false;
	}

	/**
	 * Checks if the current environment is a Vite dev server.
	 *
	 * @return boolean
	 */
	public static function is_hot_module_replacement(): bool {
		return file_exists( self::vite_hot_file() );
	}

	/**
	 * Gets the path to the Vite dev server hot file.
	 *
	 * @return string
	 */
	protected static function vite_hot_file(): string {
		return get_template_directory() . '/dist/hot';
	}
}
