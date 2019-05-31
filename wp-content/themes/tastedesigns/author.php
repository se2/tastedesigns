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

<div class="c-header js-header-blog">
  <?php the_archive_title('<h1 class="c-header__title font-title text-center text-taste-1 text-60 leading-15 pb-46 lg:pb-65 mt-10 lg:mt-0 break-words mx-20 lg:mx-0">', '</h1>'); ?>
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

			<div class="c-button border-2 border-taste-4 px-21 inline-flex items-center fwp-load-more cursor-pointer uppercase text-14 tracking-3 text-taste-2 font-subtitle">
				<span class="c-button__text uppercase text-14 text-taste-2 font-subtitle tracking-3">View more Posts</span>
				<img src="<?php get_image_url('alternative-path.png'); ?>" alt="Arrow" class="c-button__icon h-auto ml-auto lg:ml-30">
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
