<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package rmp-base
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( [
				'before' => '<div class="page-links">' .
							esc_html__('Pages:', 'rmp-base'),
				'after'  => '</div>',
			] );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link(
			esc_html__('Edit', 'rmp-base'),
			'<span class="edit-link">',
			'</span>'
		); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

