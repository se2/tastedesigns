<?php
/**
 * The template for displaying blogs page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ttg-wp-theme
 */

get_header();
?>

<div class="c-header">
	<h1 class="c-header__title font-title text-center text-taste-1"><?php echo get_the_title(get_option('page_for_posts', true)); ?></h1>
</div>

<div class="blog-content flex flex-wrap relative">

	<div class="c-archive" style="order: 1;">
		<?php if ( have_posts() ) : ?>

			<div class="c-archive__content flex flex-wrap">
				<?php

				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;
				?>
			</div>

			<a href="/" class="c-button__link no-underline">
				<div class="c-button border-2 border-taste-4 px-21 inline-flex items-center">
					<span class="c-button__text uppercase text-14 text-taste-2 font-subtitle">View more Posts</span>
					<img src="<?php get_image_url( 'alternative-path.png' ); ?>" alt="Enter" class="c-button__icon h-auto ml-auto lg:ml-30">
				</div>
			</a>

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
