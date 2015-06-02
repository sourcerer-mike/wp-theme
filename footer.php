<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package rmp-base
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
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
