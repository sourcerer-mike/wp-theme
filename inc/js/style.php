<?php

require_once __DIR__ . '/jQuery.php';

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_script(
		'style',
		get_template_directory_uri() . '/js/style.js',
		array('jQuery', 'plugins/blur'),
		'1.0.0',
		true
	);
});