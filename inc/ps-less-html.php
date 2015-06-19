<?php

class LeMike_PageSpeed {
	public function __construct() {
		add_action(
			'init',
			function () {
				ob_start( array( $this, 'pack' ) );
			}
		);
	}

	public function pack( $content ) {
		// get rid of empty lines
		$content = preg_replace( '/\s*(\r?\n)(\r?\n)*/', '$1', $content );

		$html    = new Minify_HTML( $content );
		$content = $html->process();

		return $content;
	}
}

$ps = new LeMike_PageSpeed();

