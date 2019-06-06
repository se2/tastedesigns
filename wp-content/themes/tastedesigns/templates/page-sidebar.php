<?php
/*
 * Template Name: Has Sidebar
 */

get_header();
?>

	<div id="primary" class="content-area min-h-full h-full">
		<main id="main" class="site-main min-h-full h-full">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			get_template_part( 'template-parts/page', 'blocks' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
