<?php
declare ( strict_types=1 );


namespace FP\Plugins;


class Yoast {
	public function __construct() {
		add_filter( 'wpseo_metabox_prio', function () {
			return 'low';
		} );
	}
}
