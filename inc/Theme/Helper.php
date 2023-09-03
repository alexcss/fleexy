<?php

namespace FP\Theme;

defined( 'ABSPATH' ) || exit;

class Helper {

	public static function highlight_text( $str ): string {
		return preg_replace( "/__(.*?)__/", '<span class="fp-highlight">$1</span>', $str );
	}

	public static function phone_url( $str ): string {
		return preg_replace( '/[^0-9+]/', '', $str );
	}
}
