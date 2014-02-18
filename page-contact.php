<?php
/**
 *	Template Name: Contact
 *
 * @package moogs
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div class="row">
			<div class="large-9 columns">
				<main id="main" class="site-main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', 'contact' ); ?>

						<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || '0' != get_comments_number() ) :
								comments_template();
							endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->
			</div>
			<div class="large-3 columns">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div><!-- #primary -->

<?php get_footer(); ?>
