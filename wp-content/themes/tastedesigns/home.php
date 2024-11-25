<?php
/**
 * The template for displaying blogs page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ttg-wp-theme
 */

get_header();
$theme_colors = new TasteColors(true);
?>

<div class="c-header js-header-blog pb-1">
	<h1 class="c-page__title font-title text-center text-taste-1 text-42 leading-57 lg:text-64 lg:leading-89 mt-20 xl:mt-0 lowercase mb-40 lg:mb-60" <?php $theme_colors->getPrimaryColor(); ?>><?php echo get_the_title(get_option('page_for_posts', true)); ?></h1>
	<?php get_template_part('template-parts/shared/page_excerpt'); ?>
</div>

<div class="blog-content flex flex-wrap relative w-full js-content-blog">

	<div class="c-archive lg:min-h-screen" style="order: 1;">
		<?php if ( have_posts() ) : ?>

			<div class="c-archive__content flex flex-wrap">
				<?php

				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;
				?>
			</div>

			<div class="c-button border-2 border-taste-4 px-21 inline-flex items-center fwp-load-more cursor-pointer uppercase">
				<span class="c-button__text uppercase font-subtitle text-14 leading-17 tracking-3.71 lg:text-18 lg:leading-21 lg:tracking-3 text-taste-2">View more Posts</span>
				<?php get_arrow_svg('c-button__icon h-auto ml-auto lg:ml-30 fill-taste-1'); ?>
			</div>

			<?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</div>

	<?php get_sidebar('blogs'); ?>

</div>

<?php
get_footer();
