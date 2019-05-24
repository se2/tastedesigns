<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ttg-wp-theme
 */

get_header();
?>

<div class="c-archive">
	<?php if ( have_posts() ) : ?>

		<div class="c-archive__header">
			<?php the_archive_title('<h1 class="c-archive__title font-title text-center lowercase text-taste-1">', '</h1>'); ?>
		</div>

		<?php if (is_post_type_archive('project')) : ?>
			<div class="c-archive__filters flex flex-wrap justify-center text-center">
				<?php
				echo do_shortcode('[facetwp facet="project_type" pager="true"]');
				echo do_shortcode('[facetwp facet="room_type" pager="true"]');
				?>
				<button onclick="FWP.reset()">VIEW ALL</button>
			</div>
		<?php endif; ?>

		<div class="c-archive__content flex flex-wrap">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
			?>
		</div>

		<?php
		the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
</div>

<?php
// get_sidebar();
get_footer();
