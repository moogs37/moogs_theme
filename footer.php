<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package moogs
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row">	
			<div class="site-info">
				<div class="large-6 columns"><a href="http://www.dallassmith.net/" rel="generator"><?php printf( __( 'Theme created by %s', 'moogs' ), 'Dallas Smith' ); ?></a></div>
					<span class="sep"> | </span>
				<div class="large-6 columns"><?php printf( __( 'Theme: %1$s by %2$s.', 'moogs' ), 'moogs', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?></div>
			</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

</div>