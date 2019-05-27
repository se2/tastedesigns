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

<div class="c-archive">
	<?php if ( have_posts() ) : ?>

		<div class="c-archive__content flex flex-wrap">
			<?php

			while ( have_posts() ) :
				the_post();

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
get_sidebar('blogs');
get_footer();
