<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

$footers = get_posts(
	[
		'post_type'  => 'theme_footer',
		'meta_key'   => '_page_template',
		'meta_value' => get_page_template_slug()
	]
);

if (!$footers) {
    $footers = get_posts(
		[
			'post_type'  => 'theme_footer',
			'meta_key'   => '_page_template',
			'meta_value' => '_default'
		]
	);
}

$footer = '';
if ($footers) {
    $footer = current($footers);

    if (get_post_meta($footer->ID, 'panels_data', true)) {
        $footer = siteorigin_panels_render($footer->ID);
    } else {
        $footer = $footer->post_content;
    }

    $footer = do_shortcode($footer);
}

$right_sidebars = get_posts(
	[
		'post_type'  => 'theme_right_sidebar',
		'meta_key'   => '_page_template',
		'meta_value' => get_page_template_slug()
	]
);

if (!$right_sidebars) {
	$right_sidebars = get_posts(
		[
			'post_type'  => 'theme_right_sidebar',
			'meta_key'   => '_page_template',
			'meta_value' => '_default'
		]
	);
}

$right_sidebar = '';
if ($right_sidebars) {
	$right_sidebar = current( $right_sidebars );
	$right_sidebar = siteorigin_panels_render( $right_sidebar->ID );
	$right_sidebar = do_shortcode( $right_sidebar );
}

?>

<?php if ($right_sidebar): ?>
	<div id="right-sidebar" class="widget-area" role="complementary">
		<?php echo $right_sidebar; ?>
	</div>
<?php endif; ?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if ($footer): ?>
			<div class="theme-footer">
				<?php echo $footer ?>
			</div>
		<?php endif; ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', '_s' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', '_s' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', '_s' ), '_s', '<a href="http://automattic.com/" rel="designer">Automattic</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
