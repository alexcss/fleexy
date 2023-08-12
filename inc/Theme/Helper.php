<?php

namespace FP\Theme;

defined( 'ABSPATH' ) || exit;

class Helper {

	public static function highlight_text( $str ): string {
		return preg_replace( "/__(.*?)__/", '<span class="wn-highlight">$1</span>', $str );
	}
}
