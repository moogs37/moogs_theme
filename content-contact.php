<?php
/**
 * The template used for displaying page content in page-contact.php
 *
 * @package moogs
 */
?>
<hr><!-- adding page break -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
	<hr><!-- adding page break -->
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'moogs' ),
				'after'  => '</div>',
			) );
		?>
	<hr><!-- adding page break -->
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'moogs' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
