<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package rmp-base
 */

$posts = get_posts(
	[
		'post_type'  => 'theme_footer',
		'meta_key'   => '_page_template',
		'meta_value' => get_page_template_slug()
	]
);

if (!$posts) {
	$posts = get_posts(
		[
			'post_type'  => 'theme_footer',
			'meta_key'   => '_page_template',
			'meta_value' => '_default'
		]
	);
}

$footer = '';
if ($posts) {
	$footer = current($posts);
	$footer = siteorigin_panels_render($footer->ID);
	$footer = do_shortcode($footer);
}

?>

</div><!-- #content -->
	</div><!-- .page-wrap -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if ($footer): ?>
			<div class="theme-footer">
				<?php echo $footer ?>
			</div>
		<?php endif; ?>
		<div class="site-info">
			<a href="<?php echo esc_url(
				__('http://screaming-dev.de/', 'rmp-base')
			); ?>">
				<?php printf(
					esc_html__('Proudly powered by %s', 'rmp-base'),
					'WordPress'
				); ?>
			</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
