<?php
declare ( strict_types=1 );

namespace FP\Plugins;
use Timber;
class Timber_Settings {
	public function __construct() {
		$this->init();
	}

	public function init(): void {
		Timber\Timber::init();
		Timber::$dirname = [ 'twigs', 'inc/Gutenberg/Blocks' ];
	}
}
