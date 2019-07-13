<?php
/*
 * Template Name: Project Type
 */

get_header();
$theme_colors = new TasteColors(true);

$types = get_field( 'project_types' );

$args = array(
	'post_type' => 'project',
	'tax_query' => array(
		array(
				'taxonomy' => 'project_type',
				'field'    => 'term_id',
				'terms'    => $types,
				'operator' => 'IN',
		),
	)
);

$project_query = new WP_Query( $args );

?>

<div class="c-header js-header-blog pb-1">
	<?php the_title('<h1 class="c-header__title font-title text-center text-taste-1 text-42 leading-57 lg:text-66 lg:leading-89 pb-46 lg:pb-65 mt-10 lg:mt-0 break-words mx-20 lg:mx-0 lowercase" '.$theme_colors->getPrimaryColor( false ).'>', '</h1>'); ?>
	<?php get_template_part('template-parts/shared/page_excerpt'); ?>
</div>

<?php if (get_post_type() == 'post') : ?>
	<div class="blog-content flex flex-wrap relative w-full js-content-blog">
<?php endif; ?>

<div class="c-archive lg:min-h-screen order-1">
	<?php if ( $project_query->have_posts() ) : ?>

		<div class="c-archive__content flex flex-wrap lg:mx-n21 ">
			<?php
			/* Start the Loop */
			while ( $project_query->have_posts() ) :
				$project_query->the_post();

				/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
				get_template_part( 'template-parts/content', 'project' );

			endwhile;
			wp_reset_postdata();
			?>
		</div>

		<?php

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
</div>

<?php
get_footer();
