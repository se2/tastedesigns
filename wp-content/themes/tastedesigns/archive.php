<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ttg-wp-theme
 */

get_header();
$theme_colors = new TasteColors(true);

if ( is_post_type_archive( 'project' ) ) {
	global $wp_query;
	$defaults = $wp_query->query_vars;

	// get exclude project types
	$excluded = get_field( 'exclude_project_types', 'option' );
	// exclude certain project types based on settings
	$args = array(
		'tax_query' => array(
			array(
					'taxonomy' => 'project_type',
					'field'    => 'term_id',
					'terms'    => $excluded,
					'operator' => 'NOT IN',
			),
		)
	);
	// merge the default with custom args
	$args = wp_parse_args( $args, $defaults );
	// query posts based on merged arguments
	query_posts( $args );
}

?>

<div class="c-header js-header-blog pb-1">
	<?php the_archive_title('<h1 class="c-header__title font-title text-center text-taste-1 text-42 leading-57 lg:text-64 lg:leading-89 pb-46 lg:pb-65 mt-10 lg:mt-0 break-words mx-20 lg:mx-0 lowercase" '.$theme_colors->getPrimaryColor(false).'>', '</h1>'); ?>
	<?php get_template_part('template-parts/shared/page_excerpt'); ?>
</div>

<?php if (get_post_type() == 'post') : ?>
	<div class="blog-content flex flex-wrap relative w-full js-content-blog">
<?php endif; ?>

<div class="c-archive lg:min-h-screen order-1">
	<?php if (have_posts()) : ?>

		<?php if (is_post_type_archive('project')) : ?>
			<div class="c-archive__filters flex flex-wrap justify-center text-center">
				<?php
				echo do_shortcode('[facetwp facet="project_type" pager="true"]');
				echo do_shortcode('[facetwp facet="room_type" pager="true"]');
				?>
				<button class="uppercase" onclick="FWP.reset()">View All</button>
			</div>
		<?php endif; ?>

		<div class="c-archive__content flex flex-wrap
		<?php if (is_post_type_archive('project')) : ?>
			lg:mx-n21
		<?php endif; ?>
		">
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

		<?php if (get_post_type() == 'post') : ?>
			<div class="c-button border-2 border-taste-4 px-21 inline-flex items-center fwp-load-more cursor-pointer uppercase">
				<span class="c-button__text uppercase font-subtitle text-14 leading-17 tracking-3.71 lg:text-18 lg:leading-21 lg:tracking-3 text-taste-2">View more Posts</span>
				<?php get_arrow_svg('c-button__icon h-auto ml-auto lg:ml-30'); ?>
			</div>
		<?php endif; ?>

		<?php
		// the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
</div>

<?php if (get_post_type() == 'post') : ?>
		<?php get_sidebar('blogs'); ?>
	</div>
<?php endif; ?>

<?php
get_footer();
