<?php

namespace FP\Plugins;

defined( 'ABSPATH' ) || exit;

class Cf7 {
	public function __construct() {
		add_filter( 'wpcf7_autop_or_not', '__return_false' );
	}

}
