<?php

require_once __DIR__ . '/jQuery.php';

add_action(
	'wp_enqueue_scripts',
	function () {
		$name = basename( __FILE__, '.php' );
		wp_enqueue_script(
			$name,
			get_template_directory_uri() . '/js/' . $name . '.js',
			array( 'jQuery' ),
			'1.0.0',
			true
		);
	}
);