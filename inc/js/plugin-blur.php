<?php

require_once __DIR__ . '/jQuery.php';
require_once __DIR__ . '/html2canvas.php';

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_script(
		'plugins/blur',
		get_template_directory_uri() . '/js/plugins/blur.js',
		array('jQuery', 'html2canvas'),
		'1.0.0',
		true
	);
});