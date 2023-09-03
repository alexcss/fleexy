<?php

namespace FP\Plugins;

defined( 'ABSPATH' ) || exit;

class Wpml {
	public function __construct() {
		define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
	}
}
