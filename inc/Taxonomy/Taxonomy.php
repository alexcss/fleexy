<?php

namespace FP\Taxonomy;

defined( 'ABSPATH' ) || exit;

abstract class Taxonomy {

	const NAME = '';
	const POST_TYPE = '';

	public function config() : array {
		return [];
	}

	/**
	 * Register taxonomy
	 */
	public function register() : void {
		register_taxonomy( static::NAME, static::POST_TYPE, $this->config() );

	}

}
