<?php

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_script(
		'jQuery',
		get_template_directory_uri() . '/js/jQuery.js',
		array(),
		'1.0.0',
		true
	);
});