<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package rmp-base
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function _rmp_base_jetpack_setup()
{
	add_theme_support( 'infinite-scroll', [
		'container' => 'main',
		'render'    => '_rmp_base_infinite_scroll_render',
		'footer'    => 'page',
	] );
} // end function _rmp_base_jetpack_setup
add_action('after_setup_theme', '_rmp_base_jetpack_setup');

/**
 * Custom render function for Infinite Scroll.
 */
function _rmp_base_infinite_scroll_render()
{
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function _rmp_base_infinite_scroll_render
