<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package moogs
 */

get_header(); ?>
	<!-- start row/column-->
	<div class="row">
		<div class="large-8 columns">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<hr> <!-- adding page break -->
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'page' ); ?>

							<?php
								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || '0' != get_comments_number() ) :
									comments_template();
								endif;
							?>

						<?php endwhile; // end of the loop. ?>
					<hr> <!-- adding page break -->
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
		<div class="large-4 columns">
			<?php get_sidebar(); ?>
		</div>
	</div>



<?php get_footer(); ?>
