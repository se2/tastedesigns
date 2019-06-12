<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ttg-wp-theme
 */

get_header();
?>

	<header class="page-header js-header-blog">
		<h1 class="font-title text-center text-taste-1 page-title">
			<?php printf( esc_html__( 'Search Results for: %s', 'ttg-wp' ), '<span>' . get_search_query() . '</span>' ); ?>
		</h1>
	</header><!-- .page-header -->

	<section id="primary" class="content-area js-content-blog">
		<main id="main" class="site-main">

		<div class="flex flex-wrap relative">
			<div class="search-results-area">
				<?php if ( have_posts() ) : ?>
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', 'search' );
					endwhile;
					// the_posts_navigation();
					else :
					get_template_part( 'template-parts/content', 'none' );

					endif;
				?>
			</div>

			<?php get_sidebar('blogs'); ?>
		</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
