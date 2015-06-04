<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package rmp-base
 */

$headers = get_posts(
	[
		'post_type'  => 'theme_header',
		'meta_key'   => '_page_template',
		'meta_value' => get_page_template_slug()
	]
);

if (!$headers) {
	$headers = get_posts(
		[
			'post_type'  => 'theme_header',
			'meta_key'   => '_page_template',
			'meta_value' => '_default'
		]
	);
}

$header = '';
if ($headers) {
	$header = current($headers);
	$header = siteorigin_panels_render($header->ID);
	$header = do_shortcode($header);
}

$left_sidebars = get_posts(
	[
		'post_type'  => 'theme_left_sidebar',
		'meta_key'   => '_page_template',
		'meta_value' => get_page_template_slug()
	]
);

if (!$left_sidebars) {
	$left_sidebars = get_posts(
		[
			'post_type'  => 'theme_left_sidebar',
			'meta_key'   => '_page_template',
			'meta_value' => '_default'
		]
	);
}

$left_sidebar = '';
if ($left_sidebars) {
	$left_sidebar = current( $left_sidebars );
	$left_sidebar = siteorigin_panels_render( $left_sidebar->ID );
	$left_sidebar = do_shortcode( $left_sidebar );
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<div class="page-wrap">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e(
			'Skip to content',
			'rmp-base'
		); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php if ($header): ?>
			<?php echo $header ?>
		<?php else: ?>
			<?php if ( get_header_image() ) : ?>
				<div class="header-image">
					<img src="<?php header_image(); ?>" alt="">
				</div>
			<?php endif; ?>
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div><!-- .site-branding -->
		<?php endif; ?>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu"
					aria-expanded="false"><?php esc_html_e(
					'Primary Menu',
					'rmp-base'
				); ?></button>
			<?php wp_nav_menu( [ 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ] ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">

		<?php if ($left_sidebar): ?>
			<div id="left-sidebar" class="widget-area" role="complementary">
				<?php echo $left_sidebar; ?>
			</div>
		<?php endif; ?>