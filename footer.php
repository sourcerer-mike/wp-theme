<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package rmp-base
 */

if ( $footer = theme_get_footer() )
{
    $footer = siteorigin_panels_render( $footer->ID );
    $footer = do_shortcode( $footer );
}

if ( $right_sidebar = theme_get_right_sidebar() )
{
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
	</div><!-- .page-wrap -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if ($footer): ?>
			<div class="theme-footer">
				<?php echo $footer ?>
			</div>
		<?php endif; ?>
		<div class="site-info">
			<a href="<?php echo esc_url(
				__('https://github.com/sourcerer-mike/wp-theme', 'rmp-base')
			); ?>">
				<?php printf(
					esc_html__('Started with a modular base theme.', 'rmp-base'),
					'WordPress'
				); ?>
			</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
